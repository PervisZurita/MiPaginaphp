<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Iniciar sesión';

$this->registerCssFile(
    'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'
);

$this->registerCssFile(
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css'
);

$this->registerCssFile('@web/css/login.css');

$this->registerCss(<<<CSS
html,
body {
    width: 100%;
    min-height: 100%;
    margin: 0 !important;
    padding: 0 !important;
}

body:has(.login-page) .wrap,
body:has(.login-page) main,
body:has(.login-page) .container,
body:has(.login-page) .container-fluid {
    width: 100%;
    max-width: none;
    margin: 0 !important;
    padding: 0 !important;
}

.login-page {
    position: fixed;
    inset: 0;
    z-index: 999;
    display: flex;
    width: 100%;
    height: 100vh;
    height: 100dvh;
    overflow: auto;
    margin: 0;
    padding: 0;
    background: #f8fafc;
}

.login-page *,
.login-page *::before,
.login-page *::after {
    box-sizing: border-box;
}

.login-showcase {
    width: 43%;
    min-height: 100%;
    flex-shrink: 0;
    position: relative;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    overflow: hidden;
    padding: 45px clamp(25px, 4vw, 60px);
    color: #fff;
    background:
        radial-gradient(circle at 15% 15%, rgba(56,189,248,.23), transparent 32%),
        radial-gradient(circle at 90% 85%, rgba(129,140,248,.23), transparent 35%),
        linear-gradient(145deg, #0f172a 0%, #172554 55%, #1d4ed8 100%);
}

.login-showcase::before,
.login-showcase::after {
    content: "";
    position: absolute;
    border: 1px solid rgba(255,255,255,.12);
    border-radius: 50%;
    pointer-events: none;
}

.login-showcase::before {
    width: 450px;
    height: 450px;
    right: -190px;
    top: -130px;
}

.login-showcase::after {
    width: 330px;
    height: 330px;
    left: -170px;
    bottom: -110px;
}

.login-brand,
.login-showcase-content,
.login-showcase-footer {
    position: relative;
    z-index: 1;
}

.login-brand {
    display: flex;
    align-items: center;
    gap: 15px;
}

.login-brand-logo {
    width: 60px;
    height: 60px;
    flex-shrink: 0;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(255,255,255,.25);
    border-radius: 17px;
    background: rgba(255,255,255,.12);
    backdrop-filter: blur(10px);
}

.login-brand-logo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.login-brand-name {
    margin: 0 0 5px;
    font-size: 17px;
    font-weight: 800;
    letter-spacing: .3px;
}

.login-brand-caption {
    margin: 0;
    color: #bfdbfe;
    font-size: 12px;
}

.login-showcase-content {
    max-width: 500px;
    margin: 35px 0;
}

.login-showcase-tag {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 10px 14px;
    margin-bottom: 25px;
    border: 1px solid rgba(255,255,255,.2);
    border-radius: 30px;
    background: rgba(255,255,255,.09);
    color: #dbeafe;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1.3px;
    text-transform: uppercase;
}

.login-showcase-tag i {
    color: #7dd3fc;
    font-size: 15px;
}

.login-showcase-content h2 {
    margin: 0 0 22px;
    font-size: clamp(32px, 3.5vw, 49px);
    line-height: 1.15;
    letter-spacing: -1.5px;
    font-weight: 800;
}

.login-showcase-content h2 span {
    color: #7dd3fc;
}

.login-showcase-description {
    max-width: 410px;
    color: #cbd5e1;
    font-size: 14px;
    line-height: 1.9;
    margin-bottom: 30px;
}

.login-benefits {
    display: flex;
    flex-direction: column;
    gap: 18px;
}

.login-benefit {
    display: flex;
    align-items: flex-start;
    gap: 14px;
}

.login-benefit-icon {
    width: 42px;
    height: 42px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(255,255,255,.15);
    border-radius: 13px;
    color: #7dd3fc;
    background: rgba(255,255,255,.08);
    font-size: 18px;
}

.login-benefit strong {
    display: block;
    margin: 2px 0 5px;
    font-size: 13px;
    color: #fff;
}

.login-benefit p {
    margin: 0;
    color: #bfdbfe;
    font-size: 12px;
    line-height: 1.7;
}

.login-showcase-footer {
    padding-top: 24px;
    border-top: 1px solid rgba(255,255,255,.15);
    color: #cbd5e1;
    font-size: 11px;
    line-height: 1.8;
}

.login-form-panel {
    flex: 1;
    min-width: 0;
    min-height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 30px clamp(18px, 4vw, 60px);
    position: relative;
    background:
        radial-gradient(circle at 90% 5%, rgba(191,219,254,.36), transparent 30%),
        radial-gradient(circle at 5% 95%, rgba(224,231,255,.45), transparent 32%),
        #f8fafc;
}

.login-container {
    width: 100%;
    max-width: 450px;
    margin: auto;
}

.login-card {
    width: 100%;
    padding: 35px 38px;
    border: 1px solid rgba(226,232,240,.9);
    border-radius: 24px;
    background: rgba(255,255,255,.96);
    box-shadow: 0 24px 70px rgba(15,23,42,.08);
    backdrop-filter: blur(12px);
}

.login-header {
    text-align: center;
    margin-bottom: 27px;
}

.login-logo {
    width: 70px;
    height: 70px;
    margin: 0 auto 14px;
    overflow: hidden;
    border: 1px solid #dbeafe;
    border-radius: 19px;
    background: #eff6ff;
    box-shadow: 0 8px 20px rgba(37,99,235,.08);
}

.login-logo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.login-header p:first-of-type {
    color: #2563eb;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.8px;
    text-transform: uppercase;
    margin: 0 0 8px;
}

.login-header h1 {
    color: #0f172a;
    font-size: 31px;
    line-height: 1.25;
    font-weight: 800;
    letter-spacing: -.7px;
    margin: 0 0 10px;
}

.login-header p:last-of-type {
    color: #64748b;
    font-size: 12px;
    line-height: 1.8;
    margin: 0;
}

.modern-login-form .input-group-modern {
    margin-bottom: 18px;
}

.modern-login-form .input-group-modern > label {
    display: block;
    color: #334155;
    font-size: 12px;
    font-weight: 750;
    margin-bottom: 8px;
}

.input-wrapper {
    position: relative;
}

.input-icon {
    position: absolute;
    top: 16px;
    left: 15px;
    z-index: 2;
    color: #64748b;
    font-size: 16px;
    pointer-events: none;
}

.field-container {
    margin: 0;
}

.modern-input {
    display: block;
    width: 100%;
    min-height: 49px;
    padding: 12px 43px 12px 44px;
    border: 1px solid #dbe3ef;
    border-radius: 12px;
    background: #f8fafc;
    color: #0f172a;
    font-size: 12px;
    transition: border-color .2s, box-shadow .2s, background .2s;
}

.modern-input:focus {
    background: #fff;
    border-color: #3b82f6;
    outline: none;
    box-shadow: 0 0 0 4px rgba(37,99,235,.10);
}

.modern-input::placeholder {
    color: #94a3b8;
}

.show-password {
    position: absolute;
    right: 8px;
    top: 7px;
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 0;
    border-radius: 9px;
    background: transparent;
    color: #64748b;
    cursor: pointer;
}

.show-password:hover {
    background: #e0e7ff;
    color: #1d4ed8;
}

.field-container .help-block,
.field-container .invalid-feedback {
    display: block;
    color: #dc2626;
    font-size: 11px;
    margin-top: 5px;
}

.login-options {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    margin: 2px 0 20px;
}

.remember-container {
    display: flex;
    align-items: center;
    gap: 7px;
    margin: 0;
    color: #475569;
    font-size: 11px;
}

.remember-field {
    margin: 0;
}

.remember-field .form-check {
    margin: 0;
    min-height: 0;
}

.remember-field input {
    width: 15px;
    height: 15px;
    margin: 0;
    cursor: pointer;
    accent-color: #2563eb;
}

.forgot-password {
    color: #2563eb;
    font-size: 11px;
    font-weight: 700;
    text-decoration: none;
}

.forgot-password:hover {
    color: #1e40af;
    text-decoration: underline;
}

.login-submit {
    width: 100%;
}

.login-button {
    width: 100%;
    min-height: 49px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    border: 0;
    border-radius: 12px;
    background: linear-gradient(110deg, #1d4ed8, #2563eb 55%, #3b82f6);
    color: #fff;
    font-size: 13px;
    font-weight: 750;
    box-shadow: 0 9px 22px rgba(37,99,235,.22);
    transition: transform .2s, box-shadow .2s;
}

.login-button:hover {
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 13px 28px rgba(37,99,235,.3);
}

.register-section {
    text-align: center;
    margin-top: 23px;
}

.register-section p {
    margin-bottom: 11px;
    color: #64748b;
    font-size: 12px;
}

.register-button {
    width: 100%;
    min-height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    border: 1px solid #bfdbfe;
    border-radius: 11px;
    background: #eff6ff;
    color: #1d4ed8;
    font-size: 12px;
    font-weight: 750;
    text-decoration: none;
    transition: background .2s, border-color .2s;
}

.register-button:hover {
    color: #1e40af;
    background: #dbeafe;
    border-color: #93c5fd;
}

.login-divider {
    display: flex;
    align-items: center;
    gap: 12px;
    margin: 22px 0 15px;
    color: #94a3b8;
    font-size: 10px;
}

.login-divider::before,
.login-divider::after {
    content: "";
    height: 1px;
    flex: 1;
    background: #e2e8f0;
}

.security-message {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    color: #64748b;
    font-size: 10px;
    text-align: center;
}

.security-message i {
    color: #059669;
    font-size: 14px;
}

.login-copyright {
    margin-top: 13px;
    color: #94a3b8;
    font-size: 9px;
    text-align: center;
}

@media (max-width: 1100px) {
    .login-showcase {
        width: 38%;
        padding: 30px 25px;
    }

    .login-showcase-content h2 {
        font-size: 34px;
    }

    .login-form-panel {
        padding: 22px;
    }

    .login-card {
        padding: 29px 25px;
    }
}

@media (max-height: 760px) and (min-width: 761px) {
    .login-showcase {
        padding-top: 20px;
        padding-bottom: 20px;
    }

    .login-showcase-content {
        margin: 12px 0;
    }

    .login-showcase-content h2 {
        font-size: clamp(26px, 2.7vw, 35px);
    }

    .login-showcase-description {
        margin-bottom: 16px;
        line-height: 1.6;
    }

    .login-benefits {
        gap: 10px;
    }

    .login-benefit-icon {
        width: 34px;
        height: 34px;
    }

    .login-card {
        padding-top: 22px;
        padding-bottom: 22px;
    }

    .login-header {
        margin-bottom: 17px;
    }

    .login-logo {
        width: 55px;
        height: 55px;
        margin-bottom: 9px;
    }

    .login-header h1 {
        font-size: 27px;
    }

    .modern-login-form .input-group-modern {
        margin-bottom: 12px;
    }

    .modern-input {
        min-height: 43px;
    }

    .input-icon {
        top: 13px;
    }

    .show-password {
        top: 4px;
    }

    .login-options {
        margin-bottom: 13px;
    }

    .login-button {
        min-height: 43px;
    }

    .register-section {
        margin-top: 15px;
    }

    .login-divider {
        margin: 14px 0 10px;
    }
}

@media (max-width: 760px) {
    .login-page {
        display: block;
        padding: 20px 14px;
        overflow-y: auto;
        background:
            radial-gradient(circle at 90% 5%, rgba(191,219,254,.36), transparent 30%),
            #f1f5f9;
    }

    .login-showcase {
        display: none;
    }

    .login-form-panel {
        width: 100%;
        min-height: 100%;
        padding: 0;
        background: transparent;
    }

    .login-container {
        max-width: 450px;
    }

    .login-card {
        padding: 29px 23px;
        border-radius: 21px;
    }

    .login-header h1 {
        font-size: 27px;
    }
}

@media (max-width: 400px) {
    .login-page {
        padding: 12px 10px;
    }

    .login-card {
        padding: 24px 17px;
    }

    .login-header h1 {
        font-size: 24px;
    }

    .login-options {
        align-items: flex-start;
    }

    .forgot-password {
        text-align: right;
    }
}
CSS);
?>

<div class="login-page">

    <aside class="login-showcase">

        <div class="login-brand">
            <div class="login-brand-logo">
                <?= Html::img('@web/images/iconoEtica.jpg', [
                    'alt' => 'Logo institucional',
                ]) ?>
            </div>

            <div>
                <p class="login-brand-name">Ciencia con ética</p>
                <p class="login-brand-caption">Investigación responsable</p>
            </div>
        </div>

        <div class="login-showcase-content">

            <div class="login-showcase-tag">
                <i class="bi bi-shield-check"></i>
                Ética e investigación
            </div>

            <h2>
                La ciencia avanza cuando
                <span>actuamos con ética.</span>
            </h2>

            <p class="login-showcase-description">
                Conoce los principios, valores y buenas prácticas que
                fortalecen una investigación científica responsable.
                Accede a recursos para promover la integridad académica.
            </p>

            <div class="login-benefits">

                <div class="login-benefit">
                    <div class="login-benefit-icon">
                        <i class="bi bi-book-half"></i>
                    </div>
                    <div>
                        <strong>Conocimiento y orientación</strong>
                        <p>Consulta principios y recursos de ética científica.</p>
                    </div>
                </div>

                <div class="login-benefit">
                    <div class="login-benefit-icon">
                        <i class="bi bi-patch-check"></i>
                    </div>
                    <div>
                        <strong>Integridad investigativa</strong>
                        <p>Promueve buenas prácticas y responsabilidad científica.</p>
                    </div>
                </div>

                <div class="login-benefit">
                    <div class="login-benefit-icon">
                        <i class="bi bi-person-lock"></i>
                    </div>
                    <div>
                        <strong>Acceso seguro</strong>
                        <p>Ingresa a tu cuenta y consulta los contenidos disponibles.</p>
                    </div>
                </div>

            </div>

        </div>

        <div class="login-showcase-footer">
            <i class="bi bi-quote"></i>
            Investigar con ciencia, actuar con ética.
            <br>
            © <?= date('Y') ?> Código de Ética en la Investigación Científica
        </div>

    </aside>

    <main class="login-form-panel">

        <div class="login-container">

            <div class="login-card">

                <div class="login-header">

                    <div class="login-logo">
                        <?= Html::img('@web/images/iconoEtica.jpg', [
                            'alt' => 'Icono de investigación científica',
                            'class' => 'mi-icono',
                        ]) ?>
                    </div>

                    <p>Ciencia con ética</p>

                    <h1>¡Bienvenido!</h1>

                    <p>
                        Ingresa para conocer el código de ética de investigación científica.
                    </p>

                </div>

                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'options' => [
                        'class' => 'modern-login-form',
                        'autocomplete' => 'on',
                    ],
                ]); ?>

                <div class="input-group-modern">

                    <label for="loginform-username">
                        Usuario o correo electrónico
                    </label>

                    <div class="input-wrapper">

                        <i class="bi bi-person input-icon"></i>

                        <?= $form->field($model, 'username', [
                            'template' => '{input}{error}',
                            'options' => [
                                'class' => 'field-container',
                            ],
                        ])->textInput([
                            'class' => 'modern-input',
                            'id' => 'loginform-username',
                            'placeholder' => 'Ingresa tu usuario o correo electrónico',
                            'autocomplete' => 'username',
                            'autofocus' => true,
                        ]) ?>

                    </div>

                </div>

                <div class="input-group-modern">

                    <label for="loginform-password">
                        Contraseña
                    </label>

                    <div class="input-wrapper">

                        <i class="bi bi-lock input-icon"></i>

                        <?= $form->field($model, 'password', [
                            'template' => '{input}{error}',
                            'options' => [
                                'class' => 'field-container',
                            ],
                        ])->passwordInput([
                            'class' => 'modern-input password-field',
                            'id' => 'loginform-password',
                            'placeholder' => 'Ingresa tu contraseña',
                            'autocomplete' => 'current-password',
                        ]) ?>

                        <button
                            type="button"
                            class="show-password"
                            onclick="togglePassword()"
                            aria-label="Mostrar contraseña"
                        >
                            <i class="bi bi-eye" id="passwordIcon"></i>
                        </button>

                    </div>

                </div>

                <div class="login-options">

                    <label class="remember-container">

                        <?= $form->field($model, 'rememberMe', [
                            'template' => '{input}',
                            'options' => [
                                'class' => 'remember-field',
                            ],
                        ])->checkbox([
                            'label' => false,
                        ]) ?>

                        <span>Recordarme</span>

                    </label>

                    <?= Html::a(
                        '¿Olvidaste tu contraseña?',
                        ['/site/forgot-password'],
                        ['class' => 'forgot-password']
                    ) ?>

                </div>

                <div class="login-submit">

                    <?= Html::submitButton(
                        '<span>Iniciar sesión</span> <i class="bi bi-arrow-right"></i>',
                        [
                            'class' => 'login-button',
                            'name' => 'login-button',
                        ]
                    ) ?>

                </div>

                <?php ActiveForm::end(); ?>

                <div class="register-section">

                    <p>¿No tienes una cuenta?</p>

                    <?= Html::a(
                        '<i class="fa-solid fa-user-plus"></i> Crear una cuenta',
                        ['/site/register'],
                        ['class' => 'register-button']
                    ) ?>

                </div>

                <div class="login-divider">
                    <span>Acceso seguro</span>
                </div>

                <div class="security-message">
                    <i class="bi bi-shield-check"></i>
                    <span>Investigar con ciencia, actuar con ética.</span>
                </div>

                <div class="login-copyright">
                    © <?= date('Y') ?> Código de Ética en la Investigación Científica
                </div>

            </div>

        </div>

    </main>

</div>

<script>
function togglePassword() {
    const password = document.querySelector('.password-field');
    const icon = document.getElementById('passwordIcon');

    if (!password || !icon) {
        return;
    }

    const mostrar = password.type === 'password';

    password.type = mostrar ? 'text' : 'password';

    icon.classList.toggle('bi-eye', !mostrar);
    icon.classList.toggle('bi-eye-slash', mostrar);
}
</script>
