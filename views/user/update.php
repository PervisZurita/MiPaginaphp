<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\User $model */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = 'Editar usuario';

$esAdmin = !Yii::$app->user->isGuest
    && Yii::$app->user->identity->role === 'admin';

$esPropietario = !Yii::$app->user->isGuest
    && (int) Yii::$app->user->id === (int) $model->id;

$urlVolver = $esAdmin
    ? ['/user/index']
    : ['/site/index'];

$this->registerCssFile(
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css'
);

$this->registerCss(<<<'CSS'
.user-update-page {
    --update-primary: #879bc5;
    --update-primary-dark: #687fae;
    --update-blue-soft: #edf1fa;
    --update-blue-light: #dce8fa;
    --update-purple-soft: #e9e1f7;
    --update-green-soft: #e1f1e7;
    --update-mint-soft: #dff2ef;
    --update-pink-soft: #f9e2ea;
    --update-yellow-soft: #fbf0d6;
    --update-bg: #f8f9fd;
    --update-white: #ffffff;
    --update-border: #e8eaf2;
    --update-title: #465675;
    --update-text: #596579;
    --update-muted: #929db0;

    width: 100%;
    max-width: none;
    margin: 0;
    padding: 28px 24px 45px;
    color: var(--update-text);
    box-sizing: border-box;
}

.user-update-page *,
.user-update-page *::before,
.user-update-page *::after {
    box-sizing: border-box;
}

/* Encabezado */

.user-update-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 22px;
    margin-bottom: 26px;
    padding: 28px 30px;
    background: linear-gradient(
        125deg,
        #edf1fa 0%,
        #e3eaf8 55%,
        #e9e1f7 100%
    );
    border: 1px solid #e0e6f3;
    border-radius: 22px;
    box-shadow: 0 8px 25px rgba(83, 101, 143, .07);
}

.user-update-header-content {
    display: flex;
    align-items: center;
    gap: 18px;
    min-width: 0;
}

.user-update-header-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 64px;
    height: 64px;
    min-width: 64px;
    border: 1px solid rgba(255, 255, 255, .9);
    border-radius: 19px;
    background: rgba(255, 255, 255, .8);
    color: var(--update-primary-dark);
    font-size: 27px;
    box-shadow: 0 4px 12px rgba(83, 101, 143, .07);
}

.user-update-header h1 {
    margin: 0 0 8px;
    color: var(--update-title);
    font-size: clamp(22px, 2.3vw, 29px);
    font-weight: 750;
    line-height: 1.3;
}

.user-update-header p {
    margin: 0;
    color: #737f96;
    font-size: 14px;
    line-height: 1.7;
}

/* Botón volver */

.btn-back-user {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    flex-shrink: 0;
    padding: 12px 18px;
    border: 1px solid #d5deef;
    border-radius: 12px;
    background: rgba(255, 255, 255, .85);
    color: var(--update-primary-dark);
    font-size: 13px;
    font-weight: 700;
    text-decoration: none !important;
    white-space: nowrap;
    box-shadow: 0 4px 12px rgba(83, 101, 143, .06);
    transition: all .2s ease;
}

.btn-back-user:hover {
    background: #fff;
    color: #526b9c;
    transform: translateY(-2px);
    box-shadow: 0 7px 16px rgba(83, 101, 143, .11);
}

/* Tarjeta */

.user-update-card {
    width: 100%;
    max-width: 1100px;
    margin: 0 auto;
    overflow: hidden;
    background: var(--update-white);
    border: 1px solid var(--update-border);
    border-radius: 20px;
    box-shadow: 0 7px 25px rgba(83, 101, 143, .055);
}

.user-update-card-header {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 22px 30px;
    background: #fcfcff;
    border-bottom: 1px solid var(--update-border);
}

.user-update-card-header i {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 37px;
    height: 37px;
    border-radius: 12px;
    background: var(--update-blue-soft);
    color: var(--update-primary-dark);
    font-size: 16px;
}

.user-update-card-header h2 {
    margin: 0;
    color: var(--update-title);
    font-size: 17px;
    font-weight: 750;
}

.user-update-body {
    padding: 38px 45px 35px;
}

/* Campos */

.user-update-body .form-group {
    width: 100%;
    margin-bottom: 24px;
}

.user-update-body label {
    display: block;
    margin-bottom: 9px;
    color: #596781;
    font-size: 13px;
    font-weight: 750;
}

.user-update-body label i {
    margin-right: 7px;
    color: var(--update-primary-dark);
}

.user-update-body .form-control {
    display: block;
    width: 100%;
    min-height: 53px;
    padding: 13px 16px;
    border: 1px solid #e0e5ef;
    border-radius: 12px;
    background: #fcfcff;
    color: var(--update-title);
    font-size: 14px;
    box-shadow: none;
    transition: border-color .2s ease, background .2s ease, box-shadow .2s ease;
}

.user-update-body .form-control::placeholder {
    color: #a0a9ba;
    font-size: 13px;
}

.user-update-body .form-control:hover {
    border-color: #cbd6ea;
    background: #fff;
}

.user-update-body .form-control:focus {
    border-color: var(--update-primary);
    background: #fff;
    outline: none;
    box-shadow: 0 0 0 4px rgba(135, 155, 197, .14);
}

.user-update-body select.form-control {
    cursor: pointer;
}

.user-update-body .has-error .form-control {
    border-color: #e5a7b8;
    background: #fffafb;
}

.user-update-body .has-error .form-control:focus {
    box-shadow: 0 0 0 4px rgba(225, 160, 181, .14);
}

.user-update-body .help-block {
    margin-top: 7px;
    color: #bd7189;
    font-size: 12px;
    line-height: 1.5;
}

/* Avisos informativos */

.user-update-security-info {
    display: flex;
    align-items: flex-start;
    gap: 13px;
    margin: 8px 0 24px;
    padding: 16px 18px;
    border: 1px solid #e0e5f2;
    border-radius: 13px;
    background: #f8f9fd;
    color: #748098;
    font-size: 13px;
    line-height: 1.75;
}

.user-update-security-info > i {
    flex-shrink: 0;
    margin-top: 3px;
    color: #8a79b7;
    font-size: 16px;
}

.user-update-security-info strong {
    color: var(--update-title);
}

.user-update-security-info.role-notice {
    background: #f1f7f3;
    border-color: #dcece1;
}

.user-update-security-info.role-notice > i {
    color: #65977a;
}

/* Separador y botones */

.user-update-actions {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    flex-wrap: wrap;
    gap: 12px;
    margin-top: 30px;
    padding-top: 25px;
    border-top: 1px solid #edf0f6;
}

.btn-cancel-user,
.btn-save-user {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    min-height: 47px;
    padding: 0 22px;
    border-radius: 12px;
    font-size: 13px;
    font-weight: 750;
    text-decoration: none !important;
    transition: all .2s ease;
}

.btn-cancel-user {
    min-width: 130px;
    border: 1px solid #e3e7f0;
    background: #f5f6fb;
    color: #727f96;
}

.btn-cancel-user:hover {
    background: #eceff7;
    color: #596781;
    transform: translateY(-1px);
}

.btn-save-user {
    min-width: 185px;
    border: 1px solid #d0dcef;
    background: linear-gradient(135deg, #879bc5, #758bb9);
    color: #fff;
    cursor: pointer;
    box-shadow: 0 5px 13px rgba(104, 127, 174, .15);
}

.btn-save-user:hover {
    background: linear-gradient(135deg, #758bb9, #687fae);
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 8px 18px rgba(104, 127, 174, .22);
}

.btn-save-user:focus,
.btn-cancel-user:focus,
.btn-back-user:focus {
    outline: 3px solid rgba(135, 155, 197, .2);
    outline-offset: 3px;
}

/* Responsive */

@media (max-width: 900px) {
    .user-update-page {
        padding: 22px 16px 35px;
    }

    .user-update-card {
        max-width: 100%;
    }

    .user-update-body {
        padding: 30px;
    }
}

@media (max-width: 768px) {
    .user-update-page {
        padding: 18px 10px 30px;
    }

    .user-update-header {
        flex-direction: column;
        align-items: stretch;
        gap: 20px;
        padding: 22px;
        border-radius: 18px;
    }

    .user-update-header-content {
        align-items: flex-start;
        gap: 14px;
    }

    .user-update-header-icon {
        width: 52px;
        height: 52px;
        min-width: 52px;
        border-radius: 15px;
        font-size: 22px;
    }

    .user-update-header h1 {
        font-size: 23px;
    }

    .user-update-header p {
        font-size: 13px;
    }

    .btn-back-user {
        width: 100%;
    }

    .user-update-card {
        border-radius: 16px;
    }

    .user-update-card-header {
        padding: 19px 22px;
    }

    .user-update-body {
        padding: 25px 22px;
    }

    .user-update-actions {
        flex-direction: column-reverse;
        align-items: stretch;
    }

    .btn-save-user,
    .btn-cancel-user {
        width: 100%;
    }
}

@media (max-width: 480px) {
    .user-update-page {
        padding: 14px 6px 24px;
    }

    .user-update-header {
        padding: 18px;
    }

    .user-update-header-content {
        gap: 11px;
    }

    .user-update-header-icon {
        width: 45px;
        height: 45px;
        min-width: 45px;
        font-size: 19px;
    }

    .user-update-header h1 {
        font-size: 20px;
    }

    .user-update-header p {
        font-size: 12px;
        line-height: 1.7;
    }

    .user-update-card-header {
        padding: 17px;
    }

    .user-update-card-header h2 {
        font-size: 15px;
    }

    .user-update-body {
        padding: 22px 16px;
    }

    .user-update-body .form-control {
        min-height: 49px;
        padding: 11px 13px;
    }

    .user-update-security-info {
        padding: 14px;
        font-size: 12px;
    }
}
CSS);
?>

<div class="user-update-page">

    <div class="user-update-header">

        <div class="user-update-header-content">
            <div class="user-update-header-icon">
                <i class="fa-solid fa-user-pen"></i>
            </div>

            <div>
                <h1><?= Html::encode($this->title) ?></h1>
                <p>
                    Actualiza la información de tu cuenta de forma sencilla y segura.
                </p>
            </div>
        </div>

        <?= Html::a(
            '<i class="fa-solid fa-arrow-left"></i> Volver',
            $urlVolver,
            [
                'class' => 'btn-back-user',
                'encode' => false,
            ]
        ) ?>

    </div>

    <div class="user-update-card">

        <div class="user-update-card-header">
            <i class="fa-solid fa-user-shield"></i>
            <h2>Información de la cuenta</h2>
        </div>

        <div class="user-update-body">

            <?php $form = ActiveForm::begin([
                'id' => 'user-update-form',
                'method' => 'post',
                'options' => [
                    'autocomplete' => 'off',
                ],
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                ],
            ]); ?>

            <?= $form->field($model, 'username')->textInput([
                'maxlength' => true,
                'placeholder' => 'Ingrese el nombre de usuario',
                'autocomplete' => 'username',
            ])->label(
                '<i class="fa-solid fa-user"></i> Nombre de usuario',
                ['encode' => false]
            ) ?>

            <?= $form->field($model, 'nombre')->textInput([
                'maxlength' => true,
                'placeholder' => 'Ingrese los nombres',
                'autocomplete' => 'given-name',
            ])->label(
                '<i class="fa-solid fa-id-card"></i> Nombres',
                ['encode' => false]
            ) ?>

            <?= $form->field($model, 'apellido')->textInput([
                'maxlength' => true,
                'placeholder' => 'Ingrese los apellidos',
                'autocomplete' => 'family-name',
            ])->label(
                '<i class="fa-solid fa-address-card"></i> Apellidos',
                ['encode' => false]
            ) ?>

            <?= $form->field($model, 'correo')->textInput([
                'type' => 'email',
                'maxlength' => true,
                'placeholder' => 'Ingrese el correo electrónico',
                'autocomplete' => 'email',
            ])->label(
                '<i class="fa-solid fa-envelope"></i> Correo electrónico',
                ['encode' => false]
            ) ?>

            <?php if ($esAdmin): ?>

                <?= $form->field($model, 'role')->dropDownList([
                    'user' => 'Usuario',
                    'admin' => 'Administrador',
                ], [
                    'prompt' => 'Seleccione un rol',
                ])->label(
                    '<i class="fa-solid fa-user-shield"></i> Rol del usuario',
                    ['encode' => false]
                ) ?>

            <?php else: ?>

                <div class="user-update-security-info role-notice">
                    <i class="fa-solid fa-lock"></i>
                    <span>
                        <strong>Rol protegido.</strong>
                        Solo un administrador puede modificar los permisos
                        y el rol de una cuenta.
                    </span>
                </div>

            <?php endif; ?>

            <?= $form->field($model, 'password')->passwordInput([
                'maxlength' => true,
                'placeholder' => 'Deje vacío si no desea cambiarla',
                'autocomplete' => 'new-password',
                'value' => '',
            ])->label(
                '<i class="fa-solid fa-key"></i> Nueva contraseña (opcional)',
                ['encode' => false]
            ) ?>

            <div class="user-update-security-info">
                <i class="fa-solid fa-shield-halved"></i>
                <span>
                    Si no deseas cambiar tu contraseña, deja el campo vacío.
                    Utiliza una contraseña segura y evita compartir tus datos
                    de acceso con otras personas.
                </span>
            </div>

            <div class="user-update-actions">

                <?= Html::a(
                    '<i class="fa-solid fa-xmark"></i> Cancelar',
                    $urlVolver,
                    [
                        'class' => 'btn-cancel-user',
                        'encode' => false,
                    ]
                ) ?>

                <?= Html::submitButton(
                    '<i class="fa-solid fa-floppy-disk"></i> Guardar cambios',
                    [
                        'class' => 'btn-save-user',
                        'encode' => false,
                    ]
                ) ?>

            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
