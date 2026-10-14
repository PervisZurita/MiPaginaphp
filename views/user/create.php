<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Crear usuario';

$this->registerCssFile(
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css'
);

$this->registerCss(<<<'CSS'
/* =========================================================
   PALETA PASTEL
========================================================= */

.user-create {
    --user-primary: #879bc5;
    --user-primary-dark: #687fae;
    --user-blue: #dce8fa;
    --user-blue-soft: #edf1fa;
    --user-green: #e1f1e7;
    --user-mint: #dff2ef;
    --user-purple: #e9e1f7;
    --user-pink: #f9e2ea;
    --user-cream: #fbf0d6;

    --user-bg: #f8f9fd;
    --user-white: #ffffff;
    --user-border: #e8eaf2;

    --user-title: #465675;
    --user-text: #596579;
    --user-muted: #929db0;

    --user-shadow: 0 8px 26px rgba(83, 101, 143, .08);
    --user-shadow-hover: 0 12px 28px rgba(83, 101, 143, .13);

    width: 100%;
    max-width: none;
    margin: 0;
    padding: 30px clamp(15px, 3vw, 42px) 45px;
    box-sizing: border-box;
    color: var(--user-text);
    background: var(--user-bg);
}

.user-create *,
.user-create *::before,
.user-create *::after {
    box-sizing: border-box;
}

/* =========================================================
   ENCABEZADO
========================================================= */

.user-form-header {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 22px;

    width: 100%;
    padding: 32px;
    margin-bottom: 28px;
    overflow: hidden;

    background: linear-gradient(
        135deg,
        #edf1fa 0%,
        #e4effa 48%,
        #e4f3ef 100%
    );

    border: 1px solid #e2e9f4;
    border-radius: 23px;
    box-shadow: var(--user-shadow);
}

.user-form-header::after {
    content: "";
    position: absolute;
    top: -95px;
    right: 90px;
    width: 220px;
    height: 220px;
    border-radius: 50%;
    background: rgba(255, 255, 255, .34);
    pointer-events: none;
}

.user-form-header-content {
    position: relative;
    z-index: 1;

    display: flex;
    align-items: center;
    gap: 19px;
    min-width: 0;
}

.user-form-header-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex: 0 0 70px;

    width: 70px;
    height: 70px;

    color: #7188b7;
    background: rgba(255, 255, 255, .72);
    border: 1px solid rgba(255, 255, 255, .9);
    border-radius: 20px;

    font-size: 27px;
    box-shadow: 0 5px 15px rgba(83, 101, 143, .07);
}

.user-form-header h1 {
    margin: 0 0 8px;
    color: var(--user-title);
    font-size: clamp(22px, 2.5vw, 29px);
    font-weight: 800;
    letter-spacing: -.5px;
}

.user-form-header p {
    margin: 0;
    color: #64718a;
    font-size: 14px;
    line-height: 1.7;
}

/* =========================================================
   BOTÓN VOLVER
========================================================= */

.btn-back-users {
    position: relative;
    z-index: 1;

    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    flex-shrink: 0;

    min-height: 45px;
    padding: 11px 18px;

    color: var(--user-title) !important;
    background: rgba(255, 255, 255, .72);
    border: 1px solid rgba(255, 255, 255, .95);
    border-radius: 12px;

    text-decoration: none !important;
    font-size: 14px;
    font-weight: 700;
    white-space: nowrap;

    transition: all .25s ease;
}

.btn-back-users:hover {
    color: var(--user-primary-dark) !important;
    background: #ffffff;
    transform: translateY(-2px);
    box-shadow: 0 5px 14px rgba(83, 101, 143, .10);
}

/* =========================================================
   TARJETA PRINCIPAL
========================================================= */

.user-form-card {
    width: 100%;
    max-width: 1100px;
    margin: 0 auto;

    background: var(--user-white);
    border: 1px solid var(--user-border);
    border-radius: 22px;
    box-shadow: var(--user-shadow);
    overflow: hidden;
}

/* =========================================================
   CABECERA DE TARJETA
========================================================= */

.user-form-card-header {
    display: flex;
    align-items: center;
    gap: 13px;

    padding: 23px 32px;

    background: linear-gradient(
        100deg,
        #f5f7fc,
        #f2f7fa
    );

    border-bottom: 1px solid var(--user-border);
}

.user-form-card-header > i {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 43px;
    height: 43px;

    color: #7188b7;
    background: var(--user-blue);
    border-radius: 13px;
    font-size: 18px;
}

.user-form-card-header h2 {
    margin: 0;
    color: var(--user-title);
    font-size: 17px;
    font-weight: 800;
}

/* =========================================================
   CUERPO DEL FORMULARIO
========================================================= */

.user-form-body {
    width: 100%;
    padding: 38px 48px 42px;
}

.user-form-body form {
    width: 100%;
}

.user-form-body .form-group {
    width: 100%;
    margin-bottom: 23px;
}

.user-form-body label {
    display: block;
    width: 100%;
    margin-bottom: 9px;

    color: var(--user-title);
    font-size: 13px;
    font-weight: 750;
}

.user-form-body label i {
    margin-right: 7px;
    color: var(--user-primary);
}

/* =========================================================
   INPUTS Y SELECT
========================================================= */

.user-form-body input.form-control,
.user-form-body select.form-select,
.user-form-body select.form-control {
    display: block;
    width: 100%;
    max-width: none;
    min-width: 0;
    height: 55px;
    padding: 0 17px;

    color: var(--user-title);
    background-color: #ffffff;
    border: 1px solid #dfe5ef;
    border-radius: 12px;

    font-family: inherit;
    font-size: 14px;

    box-shadow: none;
    outline: none;

    transition:
        border-color .22s ease,
        box-shadow .22s ease,
        background-color .22s ease;
}

.user-form-body input.form-control::placeholder {
    color: #a0a9b9;
    font-size: 13px;
}

.user-form-body input.form-control:hover,
.user-form-body select.form-select:hover,
.user-form-body select.form-control:hover {
    border-color: #c6d2e6;
}

.user-form-body input.form-control:focus,
.user-form-body select.form-select:focus,
.user-form-body select.form-control:focus {
    color: var(--user-title);
    background-color: #ffffff;
    border-color: var(--user-primary);
    box-shadow: 0 0 0 4px rgba(135, 155, 197, .16);
    outline: none;
}

/* =========================================================
   VALIDACIONES
========================================================= */

.user-form-body .has-error input.form-control,
.user-form-body .has-error select.form-select,
.user-form-body .has-error select.form-control {
    border-color: #d98c9b;
    background-color: #fffafb;
}

.user-form-body .has-error input.form-control:focus,
.user-form-body .has-error select.form-select:focus,
.user-form-body .has-error select.form-control:focus {
    border-color: #d98c9b;
    box-shadow: 0 0 0 4px rgba(217, 140, 155, .14);
}

.user-form-body .help-block {
    margin-top: 7px;
    margin-bottom: 0;
    color: #bf6477;
    font-size: 12px;
    line-height: 1.6;
}

.user-form-body .has-success input.form-control {
    border-color: #a7d4bd;
}

/* =========================================================
   INFORMACIÓN DE CONTRASEÑA
========================================================= */

.password-info {
    display: flex;
    align-items: flex-start;
    gap: 13px;

    width: 100%;
    margin: 0 0 25px;
    padding: 17px 19px;

    background: linear-gradient(
        110deg,
        #f1edfa,
        #f2f5fc
    );

    border: 1px solid #e8e1f4;
    border-radius: 14px;

    color: #69728a;
    font-size: 13px;
    line-height: 1.8;
}

.password-info > i {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;

    width: 35px;
    height: 35px;
    margin-top: 1px;

    color: #8e80b7;
    background: var(--user-purple);
    border-radius: 11px;
    font-size: 15px;
}

/* =========================================================
   ACCIONES
========================================================= */

.user-form-actions {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    flex-wrap: wrap;
    gap: 13px;

    width: 100%;
    margin-top: 30px;
    padding-top: 25px;

    border-top: 1px solid var(--user-border);
}

.btn-cancel-user,
.btn-save-user {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;

    min-width: 140px;
    min-height: 47px;
    padding: 11px 20px;

    border-radius: 12px;
    font-size: 14px;
    font-weight: 700;
    text-decoration: none !important;

    transition: all .22s ease;
}

/* =========================================================
   BOTÓN CANCELAR
========================================================= */

.btn-cancel-user {
    color: #65718a !important;
    background: #f1f3f9;
    border: 1px solid #e7eaf2;
}

.btn-cancel-user:hover {
    color: var(--user-title) !important;
    background: #e7ebf5;
    border-color: #dce2ef;
}

/* =========================================================
   BOTÓN GUARDAR
========================================================= */

.btn-save-user {
    min-width: 190px;

    color: #ffffff;
    background: var(--user-primary);
    border: 1px solid transparent;

    cursor: pointer;
    box-shadow: 0 5px 13px rgba(104, 127, 174, .16);
}

.btn-save-user:hover {
    color: #ffffff;
    background: var(--user-primary-dark);
    transform: translateY(-2px);
    box-shadow: 0 8px 18px rgba(104, 127, 174, .23);
}

.btn-save-user:active {
    transform: translateY(0);
}

.btn-back-users:focus-visible,
.btn-cancel-user:focus-visible,
.btn-save-user:focus-visible {
    outline: 3px solid #c8d7f0;
    outline-offset: 3px;
}

/* =========================================================
   TABLET
========================================================= */

@media (max-width: 900px) {
    .user-form-body {
        padding: 30px;
    }
}

/* =========================================================
   MÓVILES
========================================================= */

@media (max-width: 768px) {
    .user-create {
        padding: 20px 14px 35px;
    }

    .user-form-header {
        flex-direction: column;
        align-items: flex-start;
        padding: 24px;
        border-radius: 19px;
    }

    .user-form-header-content {
        width: 100%;
        align-items: flex-start;
        gap: 15px;
    }

    .user-form-header-icon {
        width: 58px;
        height: 58px;
        flex-basis: 58px;
        border-radius: 16px;
        font-size: 23px;
    }

    .user-form-header h1 {
        font-size: 23px;
    }

    .btn-back-users {
        width: 100%;
    }

    .user-form-card {
        border-radius: 18px;
    }

    .user-form-card-header {
        padding: 19px 22px;
    }

    .user-form-body {
        padding: 25px 22px;
    }

    .user-form-actions {
        flex-direction: column-reverse;
        align-items: stretch;
    }

    .btn-save-user,
    .btn-cancel-user {
        width: 100%;
    }
}

@media (max-width: 480px) {
    .user-create {
        padding: 16px 10px 28px;
    }

    .user-form-header {
        padding: 20px 17px;
    }

    .user-form-header-content {
        gap: 12px;
    }

    .user-form-header-icon {
        width: 48px;
        height: 48px;
        flex-basis: 48px;
        font-size: 20px;
        border-radius: 14px;
    }

    .user-form-header h1 {
        font-size: 20px;
    }

    .user-form-header p {
        font-size: 12px;
    }

    .user-form-card-header {
        padding: 17px;
    }

    .user-form-card-header h2 {
        font-size: 15px;
    }

    .user-form-body {
        padding: 21px 16px;
    }

    .user-form-body input.form-control,
    .user-form-body select.form-select,
    .user-form-body select.form-control {
        height: 52px;
    }

    .password-info {
        padding: 14px;
        font-size: 12px;
    }
}

/* =========================================================
   ACCESIBILIDAD
========================================================= */

@media (prefers-reduced-motion: reduce) {
    .user-create *,
    .user-create *::before,
    .user-create *::after {
        animation-duration: .01ms !important;
        transition-duration: .01ms !important;
    }
}
CSS);

$esAdmin = !Yii::$app->user->isGuest
    && Yii::$app->user->identity->role === 'admin';
?>

<div class="user-create">

    <div class="user-form-header">

        <div class="user-form-header-content">

            <div class="user-form-header-icon">
                <i class="fa-solid fa-user-plus"></i>
            </div>

            <div>
                <h1><?= Html::encode($this->title) ?></h1>
                <p>
                    Registra una nueva cuenta y completa sus datos de acceso.
                </p>
            </div>

        </div>

        <?= Html::a(
            '<i class="fa-solid fa-arrow-left"></i> Volver a usuarios',
            ['index'],
            ['class' => 'btn-back-users']
        ) ?>

    </div>

    <div class="user-form-card">

        <div class="user-form-card-header">
            <i class="fa-solid fa-address-card"></i>
            <h2>Información del usuario</h2>
        </div>

        <div class="user-form-body">

            <?php $form = ActiveForm::begin([
                'id' => 'user-create-form',
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
                'placeholder' => 'Ingrese el nombre',
                'autocomplete' => 'given-name',
            ])->label(
                '<i class="fa-solid fa-id-card"></i> Nombre',
                ['encode' => false]
            ) ?>

            <?= $form->field($model, 'apellido')->textInput([
                'maxlength' => true,
                'placeholder' => 'Ingrese el apellido',
                'autocomplete' => 'family-name',
            ])->label(
                '<i class="fa-solid fa-id-card"></i> Apellido',
                ['encode' => false]
            ) ?>

            <?= $form->field($model, 'correo')->textInput([
                'type' => 'email',
                'maxlength' => true,
                'placeholder' => 'ejemplo@correo.com',
                'autocomplete' => 'email',
            ])->label(
                '<i class="fa-solid fa-envelope"></i> Correo electrónico',
                ['encode' => false]
            ) ?>

            <?= $form->field($model, 'password')->passwordInput([
                'maxlength' => true,
                'placeholder' => 'Ingrese una contraseña segura',
                'autocomplete' => 'new-password',
            ])->label(
                '<i class="fa-solid fa-lock"></i> Contraseña',
                ['encode' => false]
            ) ?>

            <div class="password-info">
                <i class="fa-solid fa-shield-halved"></i>
                <span>
                    Utiliza una contraseña segura. Se recomienda combinar
                    letras, números y caracteres especiales. La contraseña
                    debe procesarse con el sistema de hash de Yii2 antes
                    de guardarse en la base de datos.
                </span>
            </div>

            <?php if ($esAdmin): ?>

                <?= $form->field($model, 'role')->dropDownList(
                    [
                        'user' => 'Usuario',
                        'admin' => 'Administrador',
                    ],
                    [
                        'class' => 'form-select',
                    ]
                )->label(
                    '<i class="fa-solid fa-user-shield"></i> Rol del usuario',
                    ['encode' => false]
                ) ?>

            <?php endif; ?>

            <div class="user-form-actions">

                <?= Html::a(
                    '<i class="fa-solid fa-xmark"></i> Cancelar',
                    $esAdmin ? ['index'] : ['/site/index'],
                    ['class' => 'btn-cancel-user']
                ) ?>

                <?= Html::submitButton(
                    '<i class="fa-solid fa-floppy-disk"></i> Guardar usuario',
                    ['class' => 'btn-save-user']
                ) ?>

            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
