<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ChangePasswordForm $model */

$this->title = 'Cambiar contraseña';

$this->registerCss(<<<'CSS'
/* =========================================================
   PALETA PASTEL
========================================================= */

.change-password-page {
    --cp-primary: #879bc5;
    --cp-primary-dark: #687fae;
    --cp-blue: #dce8fa;
    --cp-blue-soft: #edf1fa;
    --cp-green: #e1f1e7;
    --cp-mint: #dff2ef;
    --cp-purple: #e9e1f7;
    --cp-pink: #f9e2ea;
    --cp-cream: #fbf0d6;

    --cp-bg: #f8f9fd;
    --cp-white: #ffffff;
    --cp-border: #e8eaf2;

    --cp-title: #465675;
    --cp-text: #596579;
    --cp-muted: #929db0;

    --cp-shadow: 0 8px 26px rgba(83, 101, 143, .08);
    --cp-shadow-hover: 0 12px 30px rgba(83, 101, 143, .13);

    width: 100%;
    max-width: none;
    margin: 0;
    padding: 30px clamp(15px, 3vw, 42px) 45px;
    color: var(--cp-text);
    background: var(--cp-bg);
    box-sizing: border-box;
}

.change-password-page *,
.change-password-page *::before,
.change-password-page *::after {
    box-sizing: border-box;
}

/* =========================================================
   ENCABEZADO
========================================================= */

.change-password-header {
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
    box-shadow: var(--cp-shadow);
}

.change-password-header::after {
    content: "";
    position: absolute;
    top: -85px;
    right: 100px;
    width: 210px;
    height: 210px;
    border-radius: 50%;
    background: rgba(255, 255, 255, .32);
    pointer-events: none;
}

.change-password-header-content {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    gap: 19px;
    min-width: 0;
}

.change-password-header-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;

    width: 70px;
    height: 70px;

    color: #7188b7;
    background: rgba(255, 255, 255, .72);
    border: 1px solid rgba(255, 255, 255, .9);
    border-radius: 20px;

    font-size: 28px;
    box-shadow: 0 5px 15px rgba(83, 101, 143, .07);
}

.change-password-header h1 {
    margin: 0 0 8px;
    color: var(--cp-title);
    font-size: clamp(22px, 2.5vw, 29px);
    font-weight: 800;
    letter-spacing: -.5px;
}

.change-password-header p {
    margin: 0;
    color: #64718a;
    font-size: 14px;
    line-height: 1.7;
}

/* =========================================================
   BOTÓN VOLVER
========================================================= */

.btn-back-password {
    position: relative;
    z-index: 1;

    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    flex-shrink: 0;

    min-height: 44px;
    padding: 11px 18px;

    color: var(--cp-title) !important;
    background: rgba(255, 255, 255, .72);
    border: 1px solid rgba(255, 255, 255, .95);
    border-radius: 12px;

    text-decoration: none !important;
    font-size: 14px;
    font-weight: 700;

    transition: all .25s ease;
}

.btn-back-password:hover {
    background: #ffffff;
    color: var(--cp-primary-dark) !important;
    transform: translateY(-2px);
    box-shadow: 0 5px 14px rgba(83, 101, 143, .10);
}

/* =========================================================
   TARJETA PRINCIPAL
========================================================= */

.change-password-card {
    width: 100%;
    max-width: 1050px;
    margin: 0 auto;

    background: var(--cp-white);
    border: 1px solid var(--cp-border);
    border-radius: 22px;
    box-shadow: var(--cp-shadow);
    overflow: hidden;
}

/* =========================================================
   CABECERA DE LA TARJETA
========================================================= */

.change-password-card-header {
    display: flex;
    align-items: center;
    gap: 13px;

    padding: 23px 32px;

    background: linear-gradient(
        100deg,
        #f5f7fc,
        #f2f7fa
    );

    border-bottom: 1px solid var(--cp-border);
}

.change-password-card-header > i {
    display: flex;
    align-items: center;
    justify-content: center;

    width: 43px;
    height: 43px;

    color: #7188b7;
    background: var(--cp-blue);
    border-radius: 13px;
    font-size: 18px;
}

.change-password-card-header h2 {
    margin: 0;
    color: var(--cp-title);
    font-size: 17px;
    font-weight: 800;
}

/* =========================================================
   CUERPO DEL FORMULARIO
========================================================= */

.change-password-body {
    padding: 38px 48px 42px;
}

.change-password-body form {
    width: 100%;
}

.change-password-body .form-group {
    width: 100%;
    margin-bottom: 24px;
}

.change-password-body label {
    display: block;
    margin-bottom: 9px;

    color: var(--cp-title);
    font-size: 13px;
    font-weight: 750;
}

.change-password-body label i {
    margin-right: 7px;
    color: var(--cp-primary);
}

/* =========================================================
   CAMPOS DE CONTRASEÑA
========================================================= */

.password-input-wrapper {
    width: 100%;
    position: relative;
}

.password-input-wrapper .form-control {
    display: block;
    width: 100%;
    height: 55px;
    padding: 12px 17px;

    color: var(--cp-title);
    background: #ffffff;
    border: 1px solid #dfe5ef;
    border-radius: 12px;

    font-family: inherit;
    font-size: 14px;
    line-height: 1.5;

    box-shadow: none;
    outline: none;

    transition:
        border-color .22s ease,
        box-shadow .22s ease,
        background-color .22s ease;
}

.password-input-wrapper .form-control::placeholder {
    color: #a0a9b9;
    font-size: 13px;
}

.password-input-wrapper .form-control:hover {
    border-color: #c6d2e6;
}

.password-input-wrapper .form-control:focus {
    color: var(--cp-title);
    background: #ffffff;
    border-color: var(--cp-primary);

    box-shadow: 0 0 0 4px rgba(135, 155, 197, .16);
    outline: none;
}

/* =========================================================
   ERRORES DE VALIDACIÓN
========================================================= */

.change-password-body .has-error .form-control {
    border-color: #d98c9b;
    background: #fffafb;
}

.change-password-body .has-error .form-control:focus {
    border-color: #d98c9b;
    box-shadow: 0 0 0 4px rgba(217, 140, 155, .14);
}

.change-password-body .help-block {
    margin-top: 7px;
    margin-bottom: 0;
    color: #bf6477;
    font-size: 12px;
    line-height: 1.6;
}

.change-password-body .has-success .form-control {
    border-color: #a7d4bd;
}

/* =========================================================
   INFORMACIÓN DE SEGURIDAD
========================================================= */

.password-security-info {
    display: flex;
    align-items: flex-start;
    gap: 13px;

    margin: 5px 0 27px;
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

.password-security-info > i {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;

    width: 35px;
    height: 35px;
    margin-top: 1px;

    color: #8e80b7;
    background: #e9e1f7;
    border-radius: 11px;
    font-size: 15px;
}

/* =========================================================
   ACCIONES DEL FORMULARIO
========================================================= */

.change-password-actions {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    flex-wrap: wrap;
    gap: 13px;

    margin-top: 30px;
    padding-top: 25px;

    border-top: 1px solid var(--cp-border);
}

/* =========================================================
   BOTÓN CANCELAR
========================================================= */

.btn-cancel-password {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;

    min-width: 130px;
    min-height: 47px;
    padding: 11px 20px;

    color: #65718a !important;
    background: #f1f3f9;
    border: 1px solid #e7eaf2;
    border-radius: 12px;

    text-decoration: none !important;
    font-size: 14px;
    font-weight: 700;

    transition: all .22s ease;
}

.btn-cancel-password:hover {
    color: var(--cp-title) !important;
    background: #e7ebf5;
    border-color: #dce2ef;
}

/* =========================================================
   BOTÓN GUARDAR
========================================================= */

.btn-save-password {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;

    min-width: 205px;
    min-height: 47px;
    padding: 11px 22px;

    color: #ffffff;
    background: var(--cp-primary);
    border: 1px solid transparent;
    border-radius: 12px;

    font-family: inherit;
    font-size: 14px;
    font-weight: 750;
    cursor: pointer;

    box-shadow: 0 5px 13px rgba(104, 127, 174, .16);

    transition:
        background-color .22s ease,
        transform .22s ease,
        box-shadow .22s ease;
}

.btn-save-password:hover {
    color: #ffffff;
    background: var(--cp-primary-dark);
    transform: translateY(-2px);
    box-shadow: 0 8px 18px rgba(104, 127, 174, .23);
}

.btn-save-password:focus-visible,
.btn-cancel-password:focus-visible,
.btn-back-password:focus-visible {
    outline: 3px solid #c8d7f0;
    outline-offset: 3px;
}

.btn-save-password:active {
    transform: translateY(0);
}

/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 900px) {
    .change-password-body {
        padding: 30px;
    }
}

@media (max-width: 768px) {
    .change-password-page {
        padding: 20px 14px 35px;
    }

    .change-password-header {
        flex-direction: column;
        align-items: flex-start;
        padding: 24px;
        border-radius: 19px;
    }

    .change-password-header-content {
        width: 100%;
        align-items: flex-start;
        gap: 15px;
    }

    .change-password-header-icon {
        width: 58px;
        height: 58px;
        border-radius: 16px;
        font-size: 23px;
    }

    .change-password-header h1 {
        font-size: 23px;
    }

    .btn-back-password {
        width: 100%;
    }

    .change-password-card {
        border-radius: 18px;
    }

    .change-password-card-header {
        padding: 19px 22px;
    }

    .change-password-body {
        padding: 25px 22px;
    }

    .password-input-wrapper .form-control {
        height: 53px;
    }

    .change-password-actions {
        flex-direction: column-reverse;
        align-items: stretch;
    }

    .btn-save-password,
    .btn-cancel-password {
        width: 100%;
    }
}

@media (max-width: 480px) {
    .change-password-page {
        padding: 16px 10px 28px;
    }

    .change-password-header {
        padding: 20px 17px;
    }

    .change-password-header-content {
        gap: 12px;
    }

    .change-password-header-icon {
        width: 48px;
        height: 48px;
        font-size: 20px;
        border-radius: 14px;
    }

    .change-password-header h1 {
        font-size: 19px;
    }

    .change-password-header p {
        font-size: 12px;
    }

    .change-password-card-header {
        padding: 17px;
    }

    .change-password-card-header h2 {
        font-size: 15px;
    }

    .change-password-body {
        padding: 21px 16px;
    }

    .password-security-info {
        padding: 14px;
        font-size: 12px;
    }
}

/* =========================================================
   ACCESIBILIDAD
========================================================= */

@media (prefers-reduced-motion: reduce) {
    .change-password-page *,
    .change-password-page *::before,
    .change-password-page *::after {
        animation-duration: .01ms !important;
        transition-duration: .01ms !important;
    }
}
CSS);
?>

<div class="change-password-page">

    <div class="change-password-header">

        <div class="change-password-header-content">
            <div class="change-password-header-icon">
                <i class="fa-solid fa-key"></i>
            </div>

            <div>
                <h1><?= Html::encode($this->title) ?></h1>
                <p>
                    Actualiza la contraseña de tu cuenta de forma segura.
                </p>
            </div>
        </div>

        <?= Html::a(
            '<i class="fa-solid fa-arrow-left"></i> Volver',
            ['site/index'],
            ['class' => 'btn-back-password']
        ) ?>

    </div>

    <div class="change-password-card">

        <div class="change-password-card-header">
            <i class="fa-solid fa-shield-halved"></i>
            <h2>Seguridad de la cuenta</h2>
        </div>

        <div class="change-password-body">

            <?php $form = ActiveForm::begin([
                'options' => [
                    'autocomplete' => 'off',
                ],
            ]); ?>

            <div class="password-input-wrapper">
                <?= $form->field($model, 'currentPassword')
                    ->passwordInput([
                        'placeholder' => 'Ingrese su contraseña actual',
                        'autocomplete' => 'current-password',
                    ])
                    ->label(
                        '<i class="fa-solid fa-lock"></i> Contraseña actual',
                        ['encode' => false]
                    ) ?>
            </div>

            <div class="password-input-wrapper">
                <?= $form->field($model, 'newPassword')
                    ->passwordInput([
                        'placeholder' => 'Ingrese una nueva contraseña',
                        'autocomplete' => 'new-password',
                    ])
                    ->label(
                        '<i class="fa-solid fa-key"></i> Nueva contraseña',
                        ['encode' => false]
                    ) ?>
            </div>

            <div class="password-input-wrapper">
                <?= $form->field($model, 'confirmPassword')
                    ->passwordInput([
                        'placeholder' => 'Confirme su nueva contraseña',
                        'autocomplete' => 'new-password',
                    ])
                    ->label(
                        '<i class="fa-solid fa-check-double"></i> Confirmar contraseña',
                        ['encode' => false]
                    ) ?>
            </div>

            <div class="password-security-info">
                <i class="fa-solid fa-shield-halved"></i>
                <span>
                    Utiliza una contraseña segura y evita compartirla con
                    otras personas. Se recomienda combinar letras,
                    números y caracteres especiales.
                </span>
            </div>

            <div class="change-password-actions">

                <?= Html::a(
                    '<i class="fa-solid fa-xmark"></i> Cancelar',
                    ['site/index'],
                    ['class' => 'btn-cancel-password']
                ) ?>

                <?= Html::submitButton(
                    '<i class="fa-solid fa-floppy-disk"></i> Actualizar contraseña',
                    ['class' => 'btn-save-password']
                ) ?>

            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
