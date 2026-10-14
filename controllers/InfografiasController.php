<?php

declare(strict_types=1);

namespace app\controllers;

use Yii;
use app\models\Infografia;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

use yii\helpers\FileHelper;

class InfografiasController extends Controller
{
    public function behaviors(): array
{
    return [
        'access' => [
            'class' => AccessControl::class,
            'rules' => [
                [
                    'allow' => true,
                    'actions' => ['index', 'view'],
                    'roles' => ['@'],
                ],
                [
                    'allow' => true,
                    'actions' => ['index', 'view'],
                    'roles' => ['?'],
                ],
                [
                    'allow' => true,
                    'actions' => ['create', 'update', 'delete'],
                    'matchCallback' => static function (): bool {
                        return !Yii::$app->user->isGuest
                            && Yii::$app->user->identity->role === 'admin';
                    },
                ],
            ],
        ],
        'verbs' => [
            'class' => VerbFilter::class,
            'actions' => [
                'delete' => ['POST'],
            ],
        ],
    ];
}

    public function actionIndex()
    {
        $infografias = Infografia::find()
            ->orderBy(['fecha_creacion' => SORT_DESC])
            ->all();

        return $this->render('index', [
            'infografias' => $infografias,
        ]);
    }

    
public function actionCreate()
{
    $model = new \app\models\Infografia();

    if ($this->request->isPost) {
        $model->load($this->request->post());
        $model->imagenFile = \yii\web\UploadedFile::getInstance(
            $model,
            'imagenFile'
        );

        if ($model->validate()) {
            if (!$model->subirImagen()) {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }

            if ($model->save(false)) {
                \Yii::$app->session->setFlash(
                    'success',
                    'La infografía se agregó correctamente.'
                );

                return $this->redirect(['index']);
            }

            $model->eliminarImagen();
            $model->addError(
                'titulo',
                'No se pudo guardar la infografía en la base de datos.'
            );
        }
    } else {
        $model->loadDefaultValues();
    }

    return $this->render('create', [
        'model' => $model,
    ]);
}

    public function actionUpdate($id)
    {
        $model = $this->findModel((int) $id);
        $archivoAnterior = $model->archivo;

        if ($model->load(Yii::$app->request->post())) {
            $model->imagenFile = UploadedFile::getInstance(
                $model,
                'imagenFile'
            );

            if ($model->validate()) {
                if ($model->subirImagen()) {
                    if ($model->save(false)) {
                        if ($archivoAnterior !== $model->archivo) {
                            $rutaAnterior = Yii::getAlias(
                                '@webroot/infografias/' . $archivoAnterior
                            );

                            if (is_file($rutaAnterior)) {
                                unlink($rutaAnterior);
                            }
                        }

                        Yii::$app->session->setFlash(
                            'success',
                            'La infografía se ha actualizado correctamente.'
                        );

                        return $this->redirect(['index']);
                    }
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel((int) $id);

        $archivo = $model->archivo;

        if ($model->delete() !== false) {
            $ruta = Yii::getAlias(
                '@webroot/infografias/' . $archivo
            );

            if (is_file($ruta)) {
                unlink($ruta);
            }

            Yii::$app->session->setFlash(
                'success',
                'La infografía se ha eliminado correctamente.'
            );
        }

        return $this->redirect(['index']);
    }

    protected function findModel(int $id): Infografia
    {
        $model = Infografia::findOne($id);

        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException(
            'La infografía solicitada no existe.'
        );
    }
}
