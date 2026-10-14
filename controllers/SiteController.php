<?php

declare(strict_types=1);

namespace app\controllers;

use Yii;
use app\models\ContactForm;
use app\models\LoginForm;
use app\models\User;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\ErrorAction;
use yii\web\Response;

class SiteController extends Controller
{
    /**
     * Control de acceso.
     */
    
public function behaviors(): array
{
    return [
        'access' => [
            'class' => AccessControl::class,
            'rules' => [
                [
                    'allow' => true,
                    'actions' => [
                        'login',
                        'register',
                        'error',
                        'forgot-password',
    'reset-password',
                    ],
                    'roles' => ['?'],
                ],
                [
                    'allow' => true,
                    'actions' => [
                        'login',
                        'register',
                    ],
                    'roles' => ['@'],
                    'denyCallback' => static function () {
                        return Yii::$app->response->redirect(['site/index']);
                    },
                ],
                [
                    'allow' => true,
                    'roles' => ['@'],
                ],
            ],
            'denyCallback' => static function ($rule, $action) {
                return Yii::$app->response->redirect(['site/login']);
            },
        ],
        'verbs' => [
            'class' => VerbFilter::class,
            'actions' => [
                'logout' => ['POST'],
            ],
        ],
    ];
}



    /**
     * Página principal.
     */
    public function actionIndex(): string
    {
        return $this->render('index');
    }


    /**
     * Página Nosotros.
     */
    public function actionAbout(): string
    {
        return $this->render('about');
    }


    /**
     * Página Conceptos.
     */
    public function actionConceptos(): string
    {
        return $this->render('conceptos');
    }


    /**
     * Página Servicios.
     */
    public function actionServicios(): string
    {
        return $this->render('servicios');
    }


    /**
     * Página Blog.
     */
    public function actionBlog(): string
    {
        return $this->render('blog');
    }


    /*
     * =====================================================
     * PÁGINAS DEL CÓDIGO DE ÉTICA
     * =====================================================
     */


    /**
     * Principios éticos.
     */
    public function actionPrincipios(): string
    {
        return $this->render('principios');
    }


    /**
     * Integridad científica.
     */
    public function actionIntegridad(): string
    {
        return $this->render('integridad');
    }


    /**
     * Protección de participantes.
     */
    public function actionParticipantes(): string
    {
        return $this->render('participantes');
    }


    /**
     * Buenas prácticas.
     */
    public function actionBuenasPracticas(): string
    {
        return $this->render('buenas-practicas');
    }


    /**
     * Videos sobre ética científica.
     */
    public function actionVideos(): string
    {
        return $this->render('videos');
    }


    /*
     * =====================================================
     * ACCIONES ANTIGUAS
     * =====================================================
     *
     * Se mantienen para evitar romper enlaces existentes
     * en otras partes de tu proyecto.
     */


    /**
     * Página Seguridad.
     */
    public function actionSeguridad(): string
    {
        return $this->render('seguridad');
    }


    /**
     * Página Privacidad.
     */
    public function actionPrivacidad(): string
    {
        return $this->render('privacidad');
    }
    
public function actionForgotPassword()
{
    $correo = '';

    if (Yii::$app->request->isPost) {
        $correo = trim((string) Yii::$app->request->post('correo', ''));

        if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $user = \app\models\User::find()
                ->where(['correo' => $correo])
                ->one();

            if ($user !== null) {
                $token = Yii::$app->security->generateRandomString(64);

                $user->password_reset_token = hash('sha256', $token);
                $user->password_reset_expires_at = date(
                    'Y-m-d H:i:s',
                    time() + 1800
                );

                if ($user->save(false)) {
                    $url = \yii\helpers\Url::to(
                        ['/site/reset-password', 'token' => $token],
                        true
                    );

                    $remitente = Yii::$app->params['senderEmail']
                        ?? Yii::$app->params['adminEmail']
                        ?? 'noreply@example.com';

                    try {
                        $enviado = Yii::$app->mailer->compose()
                            ->setFrom($remitente)
                            ->setTo($user->correo)
                            ->setSubject('Recuperación de contraseña')
                            ->setHtmlBody(
                                '<p>Hola ' .
                                \yii\helpers\Html::encode($user->nombre) .
                                ',</p>' .
                                '<p>Solicitaste recuperar tu contraseña.</p>' .
                                '<p><a href="' .
                                \yii\helpers\Html::encode($url) .
                                '">Haz clic aquí para crear una nueva contraseña</a>.</p>' .
                                '<p>Este enlace caduca en 30 minutos. ' .
                                'Si no solicitaste esta recuperación, ignora este mensaje.</p>'
                            )
                            ->send();

                        if (!$enviado) {
                            Yii::error(
                                'No se pudo enviar el correo de recuperación.',
                                __METHOD__
                            );
                        }
                    } catch (\Throwable $e) {
                        Yii::error($e->getMessage(), __METHOD__);
                    }
                }
            }
        }

        Yii::$app->session->setFlash(
            'success',
            'Si el correo está registrado, recibirás instrucciones para recuperar tu contraseña.'
        );

        return $this->refresh();
    }

    return $this->render('forgotPassword', [
        'correo' => $correo,
    ]);
}

public function actionResetPassword($token)
{
    $tokenHash = hash('sha256', (string) $token);

    $user = \app\models\User::find()
        ->where(['password_reset_token' => $tokenHash])
        ->andWhere(['>', 'password_reset_expires_at', date('Y-m-d H:i:s')])
        ->one();

    if ($user === null) {
        Yii::$app->session->setFlash(
            'error',
            'El enlace es inválido o ha caducado. Solicita uno nuevo.'
        );

        return $this->redirect(['forgot-password']);
    }

    if (Yii::$app->request->isPost) {
        $password = (string) Yii::$app->request->post('password', '');
        $confirmPassword = (string) Yii::$app->request->post('confirmPassword', '');

        if (strlen($password) < 8) {
            Yii::$app->session->setFlash(
                'error',
                'La contraseña debe tener al menos 8 caracteres.'
            );
        } elseif ($password !== $confirmPassword) {
            Yii::$app->session->setFlash(
                'error',
                'Las contraseñas no coinciden.'
            );
        } else {
            $user->setPassword($password);
            $user->password_reset_token = null;
            $user->password_reset_expires_at = null;

            if ($user->save()) {
                Yii::$app->session->setFlash(
                    'success',
                    'Tu contraseña se cambió correctamente. Ya puedes iniciar sesión.'
                );

                return $this->redirect(['login']);
            }

            Yii::$app->session->setFlash(
                'error',
                'No se pudo actualizar la contraseña. Inténtalo nuevamente.'
            );
        }
    }

    return $this->render('resetPassword', [
        'token' => $token,
    ]);
}

    


    /**
     * Página Ética Tecnológica.
     */
    public function actionEticaTecnologica(): string
    {
        return $this->render('etica-tecnologica');
    }


    /**
     * Página Educación.
     */
    public function actionEducacion(): string
    {
        return $this->render('educacion');
    }


    /**
     * Login.
     */
    public function actionLogin(): Response|string
    {
        /*
         * Si ya está autenticado,
         * regresar al inicio.
         */
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if (
            $model->load(Yii::$app->request->post()) &&
            $model->login()
        ) {
            return $this->goBack();
        }

        /*
         * No conservar la contraseña.
         */
        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }


    /**
     * Cerrar sesión.
     */
    public function actionLogout(): Response
    {
        Yii::$app->user->logout();

        return $this->redirect([
            '/site/login',
        ]);
    }


    /**
     * Registro público.
     */
    public function actionRegister(): Response|string
    {
        /*
         * Si ya inició sesión,
         * volver al inicio.
         */
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new User();

        if ($model->load(Yii::$app->request->post())) {

            /*
             * =========================================
             * SEGURIDAD
             * =========================================
             *
             * Los registros públicos siempre
             * tendrán el rol "user".
             */
            $model->role = 'user';


            /*
             * =========================================
             * CONTRASEÑA
             * =========================================
             */
            if (!empty($model->password)) {

                $model->password_hash =
                    Yii::$app->security->generatePasswordHash(
                        $model->password
                    );
            }


            /*
             * =========================================
             * AUTH KEY
             * =========================================
             */
            $model->auth_key =
                Yii::$app->security->generateRandomString();


            /*
             * =========================================
             * GUARDAR
             * =========================================
             */
            if ($model->save()) {

                Yii::$app->session->setFlash(
                    'success',
                    'Cuenta creada correctamente. Ahora puedes iniciar sesión.'
                );

                return $this->redirect([
                    '/site/login',
                ]);
            }
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }


    /**
     * Contacto.
     */
    public function actionContact(): string
    {
        $model = new ContactForm();

        if (
            $model->load(Yii::$app->request->post()) &&
            $model->validate()
        ) {

            if (
                $model->sendEmail(
                    Yii::$app->params['adminEmail']
                )
            ) {

                Yii::$app->session->setFlash(
                    'contactFormSubmitted'
                );

                return $this->refresh();
            }
        }

        return $this->render('contact', [
            'model' => $model,
        ]);
    }


    /**
     * Acciones especiales de Yii.
     */
    public function actions(): array
    {
        return [

            /*
             * Página de errores.
             */
            'error' => [
                'class' => ErrorAction::class,
            ],

            /*
             * CAPTCHA.
             */
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',

                'fixedVerifyCode' => YII_ENV_TEST
                    ? 'testme'
                    : null,
            ],
        ];
    }
}