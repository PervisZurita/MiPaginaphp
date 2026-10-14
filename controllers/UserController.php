<?php

declare(strict_types=1);

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\ChangePasswordForm;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class UserController extends Controller
{
    


public function behaviors(): array
{
    return [
        'access' => [
            'class' => AccessControl::class,
            'only' => [
                'index',
                'view',
                'create',
                'update',
                'delete',
                'reset-password',
                'change-password',
            ],
            'rules' => [
                [
                    'allow' => true,
                    'actions' => ['change-password'],
                    'roles' => ['@'],
                ],
                [
                    'allow' => true,
                    'actions' => ['update'],
                    'roles' => ['@'],
                    'matchCallback' => static function ($rule, $action): bool {
                        $user = Yii::$app->user->identity;

                        $id = Yii::$app->request->get('id');

                        if ($id === null && Yii::$app->request->isPost) {
                            $id = Yii::$app->request->post('id');
                        }

                        return $user !== null && (
                            $user->role === 'admin'
                            || (
                                $id !== null
                                && (string) $user->id === (string) $id
                            )
                        );
                    },
                ],
                [
                    'allow' => true,
                    'actions' => [
                        'index',
                        'view',
                        'create',
                        'delete',
                        'reset-password',
                    ],
                    'roles' => ['@'],
                    'matchCallback' => static function ($rule, $action): bool {
                        $user = Yii::$app->user->identity;

                        return $user !== null
                            && $user->role === 'admin';
                    },
                ],
            ],
        ],
        'verbs' => [
            'class' => VerbFilter::class,
            'actions' => [
                'delete' => ['POST'],
                'reset-password' => ['POST'],
                'create' => ['GET', 'POST'],
                'update' => ['GET', 'POST'],
                'change-password' => ['GET', 'POST'],
            ],
        ],
    ];
}




    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ],
            ],
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new User();
        $model->scenario = 'create';
        $model->role = 'user';

        if ($model->load(Yii::$app->request->post())) {
            $model->role = 'user';

            if ($model->save()) {
                Yii::$app->session->setFlash(
                    'success',
                    'El usuario se creó correctamente.'
                );

                return $this->redirect([
                    'view',
                    'id' => $model->id,
                ]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id = null)
    {
        $usuarioActual = Yii::$app->user->identity;

        if ($usuarioActual === null) {
            return $this->redirect(['/site/login']);
        }

        $esAdmin = $usuarioActual->role === 'admin';

        if ($esAdmin) {
            if ($id === null) {
                throw new NotFoundHttpException(
                    'Debes indicar el usuario que deseas editar.'
                );
            }

            $model = $this->findModel($id);
        } else {
            $model = $this->findModel($usuarioActual->id);
        }

        $rolOriginal = $model->role;
        $passwordOriginal = $model->password_hash;

        if ($model->load(Yii::$app->request->post())) {
            if (!$esAdmin) {
                $model->role = $rolOriginal;
            }

            if (empty($model->password)) {
                $model->password = null;
                $model->password_hash = $passwordOriginal;
            }

            if ($model->save()) {
                Yii::$app->session->setFlash(
                    'success',
                    'Los datos del usuario se actualizaron correctamente.'
                );

                if ($esAdmin) {
                    return $this->redirect(['/user/index']);
                }

                return $this->redirect(['/site/index']);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionChangePassword()
    {
        $user = Yii::$app->user->identity;

        if ($user === null) {
            return $this->redirect(['/site/login']);
        }

        $model = new ChangePasswordForm();

        if (
            $model->load(Yii::$app->request->post())
            && $model->validate()
        ) {
            if (!$user->validatePassword($model->currentPassword)) {
                $model->addError(
                    'currentPassword',
                    'La contraseña actual es incorrecta.'
                );
            } else {
                $user->setPassword($model->newPassword);
                $user->generateAuthKey();
                $user->generateAccessToken();

                if ($user->save(false)) {
                    Yii::$app->session->setFlash(
                        'success',
                        'Tu contraseña se actualizó correctamente.'
                    );

                    return $this->redirect(['/site/index']);
                }

                $model->addError(
                    'newPassword',
                    'No se pudo actualizar la contraseña.'
                );
            }
        }

        return $this->render('change-password', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if ((int) $model->id === (int) Yii::$app->user->id) {
            Yii::$app->session->setFlash(
                'error',
                'No puedes eliminar tu propia cuenta desde esta opción.'
            );

            return $this->redirect(['index']);
        }

        if ($model->delete()) {
            Yii::$app->session->setFlash(
                'success',
                'El usuario se eliminó correctamente.'
            );
        } else {
            Yii::$app->session->setFlash(
                'error',
                'No se pudo eliminar el usuario.'
            );
        }

        return $this->redirect(['index']);
    }

    public function actionResetPassword($id)
    {
        $user = $this->findModel($id);

        $newPassword = Yii::$app->security->generateRandomString(12);

        $user->setPassword($newPassword);
        $user->generateAuthKey();
        $user->generateAccessToken();

        if ($user->save(false)) {
            Yii::$app->session->setFlash(
                'success',
                'La nueva contraseña temporal para el usuario '
                . $user->username
                . ' es: '
                . $newPassword
            );
        } else {
            Yii::$app->session->setFlash(
                'error',
                'No se pudo restablecer la contraseña.'
            );
        }

        return $this->redirect(['index']);
    }

    protected function findModel($id): User
    {
        $model = User::findOne($id);

        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException(
            'El usuario solicitado no existe.'
        );
    }
}
