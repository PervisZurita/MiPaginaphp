<?php

/** @var yii\web\View $this */
/** @var app\models\User $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Crear una cuenta';

$this->registerCssFile(
    'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'
);

$this->registerCssFile(
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css'
);

$this->registerCss(<<<CSS
```css
html,
body {
    width: 100%;
    height: 100%;
    margin: 0 !important;
    padding: 0 !important;
    overflow: hidden;
}

body:has(.register-page) .wrap,
body:has(.register-page) main,
body:has(.register-page) .container,
body:has(.register-page) .container-fluid {
    width: 100%;
    max-width: none;
    margin: 0 !important;
    padding: 0 !important;
}

.register-page {
    position: fixed;
    inset: 0;
    z-index: 999;
    display: flex;
    width: 100%;
    height: 100vh;
    height: 100dvh;
    margin: 0;
    padding: 0;
    overflow-x: hidden;
    overflow-y: auto;
    background: #f1f5f9;
}

.register-page *,
.register-page *::before,
.register-page *::after {
    box-sizing: border-box;
}

.register-showcase {
    width: 40%;
    height: 100%;
    min-height: 0;
    flex-shrink: 0;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    position: relative;
    overflow: hidden;
    padding: clamp(20px, 3vh, 38px) clamp(22px, 3vw, 48px);
    color: #fff;
    background:
        radial-gradient(circle at 15% 15%, rgba(56,189,248,.23), transparent 32%),
        radial-gradient(circle at 90% 85%, rgba(129,140,248,.23), transparent 35%),
        linear-gradient(145deg, #0f172a, #172554 55%, #1d4ed8);
}

.register-showcase::before,
.register-showcase::after {
    content: "";
    position: absolute;
    border: 1px solid rgba(255,255,255,.12);
    border-radius: 50%;
    pointer-events: none;
}

.register-showcase::before {
    width: 350px;
    height: 350px;
    right: -180px;
    top: -140px;
}

.register-showcase::after {
    width: 270px;
    height: 270px;
    left: -150px;
    bottom: -130px;
}

.register-brand,
.register-showcase-content,
.register-showcase-footer {
    position: relative;
    z-index: 1;
}

.register-brand {
    display: flex;
    align-items: center;
    gap: 12px;
}

.register-brand-logo {
    width: 48px;
    height: 48px;
    flex-shrink: 0;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(255,255,255,.25);
    border-radius: 13px;
    background: rgba(255,255,255,.12);
}

.register-brand-logo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.register-brand-name {
    margin: 0 0 4px;
    font-size: 15px;
    font-weight: 800;
}

.register-brand-caption {
    margin: 0;
    color: #bfdbfe;
    font-size: 11px;
}

.register-showcase-content {
    width: 100%;
    max-width: 460px;
    margin: 15px 0;
}

.register-tag {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 8px 11px;
    margin-bottom: 15px;
    border: 1px solid rgba(255,255,255,.2);
    border-radius: 25px;
    background: rgba(255,255,255,.09);
    color: #dbeafe;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 1px;
}

.register-tag i {
    color: #7dd3fc;
    font-size: 13px;
}

.register-showcase-content h2 {
    margin: 0 0 14px;
    font-size: clamp(25px, 2.7vw, 40px);
    line-height: 1.16;
    letter-spacing: -1px;
    font-weight: 800;
}

.register-showcase-content h2 span {
    color: #7dd3fc;
}

.register-showcase-description {
    max-width: 390px;
    margin: 0 0 20px;
    color: #cbd5e1;
    font-size: 12px;
    line-height: 1.7;
}

.register-benefits {
    display: flex;
    flex-direction: column;
    gap: 13px;
}

.register-benefit {
    display: flex;
    align-items: flex-start;
    gap: 11px;
}

.register-benefit-icon {
    width: 35px;
    height: 35px;
    flex-shrink: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(255,255,255,.15);
    border-radius: 10px;
    color: #7dd3fc;
    background: rgba(255,255,255,.08);
    font-size: 15px;
}

.register-benefit strong {
    display: block;
    margin: 1px 0 3px;
    font-size: 11px;
}

.register-benefit p {
    margin: 0;
    color: #bfdbfe;
    font-size: 10px;
    line-height: 1.5;
}

.register-showcase-footer {
    padding-top: 13px;
    border-top: 1px solid rgba(255,255,255,.15);
    color: #cbd5e1;
    font-size: 9px;
    line-height: 1.6;
}

.register-main {
    flex: 1;
    min-width: 0;
    min-height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 16px clamp(15px, 3vw, 40px);
    position: relative;
    background:
        radial-gradient(circle at 90% 5%, rgba(191,219,254,.36), transparent 30%),
        radial-gradient(circle at 5% 95%, rgba(224,231,255,.45), transparent 32%),
        #f8fafc;
}

.register-container {
    width: 100%;
    max-width: 470px;
    margin: auto;
    position: relative;
    z-index: 1;
}

.register-card {
    width: 100%;
    padding: clamp(18px, 3vh, 30px) clamp(20px, 3vw, 35px);
    border: 1px solid #e2e8f0;
    border-radius: 19px;
    background: rgba(255,255,255,.97);
    box-shadow: 0 18px 50px rgba(15,23,42,.08);
}

.register-header {
    text-align: center;
    margin-bottom: 16px;
}

.register-mobile-logo {
    display: none;
}

.register-eyebrow {
    color: #2563eb;
    text-transform: uppercase;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 1.6px;
    margin: 0 0 5px;
}

.register-header h1 {
    color: #0f172a;
    font-size: clamp(23px, 2vw, 29px);
    line-height: 1.2;
    font-weight: 800;
    margin: 0 0 6px;
}

.register-header p:last-child {
    color: #64748b;
    font-size: 11px;
    line-height: 1.55;
    margin: 0;
}

.register-form .form-group,
.register-form .mb-3 {
    margin-bottom: 9px;
}

.register-form .control-label {
    display: block;
    color: #334155;
    font-size: 10px;
    font-weight: 750;
    margin-bottom: 4px;
}

.register-input-wrapper {
    position: relative;
}

.register-input-icon {
    position: absolute;
    left: 12px;
    top: 12px;
    color: #64748b;
    font-size: 14px;
    z-index: 2;
    pointer-events: none;
}

.register-input {
    display: block;
    width: 100%;
    height: 39px;
    min-height: 39px;
    padding: 8px 12px 8px 36px;
    border: 1px solid #dbe3ef;
    border-radius: 9px;
    background: #f8fafc;
    color: #0f172a;
    font-size: 11px;
    transition: border-color .2s, box-shadow .2s, background .2s;
}

.register-input:focus {
    background: #fff;
    border-color: #3b82f6;
    outline: none;
    box-shadow: 0 0 0 3px rgba(37,99,235,.10);
}

.register-input::placeholder {
    color: #94a3b8;
}

.register-password-input {
    padding-right: 43px;
}

.register-toggle-password {
    position: absolute;
    right: 5px;
    top: 3px;
    width: 32px;
    height: 32px;
    border: 0;
    border-radius: 7px;
    background: transparent;
    color: #64748b;
    cursor: pointer;
    z-index: 3;
}

.register-toggle-password:hover {
    background: #e0e7ff;
    color: #1d4ed8;
}

.register-submit {
    width: 100%;
    min-height: 42px;
    margin-top: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    border: 0;
    border-radius: 9px;
    color: #fff;
    background: linear-gradient(110deg, #1d4ed8, #2563eb 55%, #3b82f6);
    font-size: 12px;
    font-weight: 750;
    box-shadow: 0 7px 18px rgba(37,99,235,.2);
    transition: transform .2s, box-shadow .2s;
}

.register-submit:hover {
    color: #fff;
    transform: translateY(-1px);
    box-shadow: 0 10px 22px rgba(37,99,235,.28);
}

.register-footer {
    text-align: center;
    border-top: 1px solid #e9eef5;
    margin-top: 13px;
    padding-top: 11px;
}

.register-footer p {
    color: #64748b;
    font-size: 10px;
    margin-bottom: 5px;
}

.register-login-link {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
    color: #2563eb;
    font-size: 11px;
    font-weight: 750;
    text-decoration: none;
}

.register-login-link:hover {
    color: #1e40af;
    text-decoration: underline;
}

.register-security {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 6px;
    color: #64748b;
    font-size: 9px;
    line-height: 1.5;
    margin-top: 11px;
    text-align: center;
}

.register-security i {
    color: #059669;
    font-size: 12px;
}

.register-copyright {
    text-align: center;
    margin-top: 7px;
    color: #94a3b8;
    font-size: 8px;
}

.register-form .invalid-feedback {
    display: block;
    font-size: 10px;
    margin-top: 4px;
}

.register-form .has-error .register-input,
.register-form .is-invalid {
    border-color: #dc2626;
}

/* Portátiles y pantallas de poca altura */
@media (min-width: 761px) and (max-height: 760px) {
    .register-showcase {
        padding-top: 18px;
        padding-bottom: 18px;
    }

    .register-showcase-content {
        margin: 8px 0;
    }

    .register-showcase-content h2 {
        font-size: clamp(23px, 2.4vw, 32px);
    }

    .register-showcase-description {
        margin-bottom: 12px;
        line-height: 1.5;
    }

    .register-benefits {
        gap: 8px;
    }

    .register-benefit-icon {
        width: 30px;
        height: 30px;
    }

    .register-card {
        padding-top: 15px;
        padding-bottom: 15px;
    }

    .register-header {
        margin-bottom: 10px;
    }

    .register-form .form-group,
    .register-form .mb-3 {
        margin-bottom: 6px;
    }

    .register-input {
        height: 35px;
        min-height: 35px;
        padding-top: 6px;
        padding-bottom: 6px;
    }

    .register-input-icon {
        top: 10px;
    }

    .register-toggle-password {
        top: 1px;
    }

    .register-submit {
        min-height: 38px;
    }

    .register-footer {
        margin-top: 9px;
        padding-top: 8px;
    }

    .register-security {
        margin-top: 7px;
    }
}

/* Tablets y celulares */
@media (max-width: 760px) {
    html,
    body {
        height: auto;
        min-height: 100%;
        overflow: auto;
    }

    .register-page {
        position: fixed;
        inset: 0;
        display: block;
        width: 100%;
        height: 100vh;
        height: 100dvh;
        min-height: 0;
        padding: 15px;
        overflow-y: auto;
        background:
            radial-gradient(circle at 90% 5%, rgba(191,219,254,.4), transparent 30%),
            #f1f5f9;
    }

    .register-showcase {
        display: none;
    }

    .register-main {
        width: 100%;
        min-height: 100%;
        padding: 0;
        background: transparent;
    }

    .register-container {
        max-width: 440px;
    }

    .register-card {
        padding: 25px 22px;
        border-radius: 17px;
    }

    .register-mobile-logo {
        width: 52px;
        height: 52px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 12px;
        border: 1px solid #dbeafe;
        border-radius: 14px;
        overflow: hidden;
        background: #eff6ff;
    }

    .register-mobile-logo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .register-header h1 {
        font-size: 25px;
    }

    .register-form .form-group,
    .register-form .mb-3 {
        margin-bottom: 11px;
    }

    .register-input {
        height: 43px;
        min-height: 43px;
        font-size: 12px;
    }

    .register-input-icon {
        top: 14px;
    }

    .register-toggle-password {
        top: 5px;
    }

    .register-submit {
        min-height: 45px;
    }
}

@media (max-width: 400px) {
    .register-page {
        padding: 10px;
    }

    .register-card {
        padding: 21px 16px;
    }

    .register-header h1 {
        font-size: 23px;
    }

    .register-input {
        font-size: 11px;
    }
}

CSS);
?>

<div class="register-page">

    <aside class="register-showcase">

        <div class="register-brand">
            <div class="register-brand-logo">
                <?= Html::img('@web/images/iconoEtica.jpg', [
                    'alt' => 'Logo institucional',
                ]) ?>
            </div>

            <div>
                <p class="register-brand-name">Ciencia con ética</p>
                <p class="register-brand-caption">Investigación responsable</p>
            </div>
        </div>

        <div class="register-showcase-content">

            <div class="register-tag">
                <i class="bi bi-shield-check"></i>
                Ética e investigación
            </div>

            <h2>
                La ciencia avanza cuando
                <span>actuamos con ética.</span>
            </h2>

            <p class="register-showcase-description">
                Crea tu cuenta y accede a información, principios,
                recursos y herramientas para fortalecer una cultura
                de investigación científica responsable.
            </p>

            <div class="register-benefits">

                <div class="register-benefit">
                    <div class="register-benefit-icon">
                        <i class="bi bi-book-half"></i>
                    </div>
                    <div>
                        <strong>Conocimiento y orientación</strong>
                        <p>Consulta los principios y recursos de ética científica.</p>
                    </div>
                </div>

                <div class="register-benefit">
                    <div class="register-benefit-icon">
                        <i class="bi bi-patch-check"></i>
                    </div>
                    <div>
                        <strong>Compromiso responsable</strong>
                        <p>Promueve la integridad y las buenas prácticas investigativas.</p>
                    </div>
                </div>

                <div class="register-benefit">
                    <div class="register-benefit-icon">
                        <i class="bi bi-person-lock"></i>
                    </div>
                    <div>
                        <strong>Acceso personal</strong>
                        <p>Gestiona tu cuenta y consulta los contenidos disponibles.</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="register-showcase-footer">
            <i class="bi bi-quote"></i>
            Investigar con ciencia, actuar con ética.
            <br>
            © <?= date('Y') ?> Código de Ética en la Investigación Científica
        </div>

    </aside>

    <main class="register-main">

        <div class="register-container">

            <div class="register-card">

                <div class="register-header">

                    <div class="register-mobile-logo">
                        <?= Html::img('@web/images/iconoEtica.jpg', [
                            'alt' => 'Código de ética en la investigación científica',
                        ]) ?>
                    </div>

                    <p class="register-eyebrow">Únete a nuestra comunidad</p>

                    <h1>Crear una cuenta</h1>

                    <p>
                        Completa tus datos para crear tu cuenta y acceder
                        a los recursos de investigación científica.
                    </p>

                </div>

                <?php $form = ActiveForm::begin([
                    'id' => 'register-form',
                    'options' => [
                        'class' => 'register-form',
                        'autocomplete' => 'on',
                    ],
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"register-input-wrapper\">{input}{error}</div>",
                        'labelOptions' => [
                            'class' => 'control-label',
                        ],
                        'errorOptions' => [
                            'class' => 'invalid-feedback',
                        ],
                    ],
                ]); ?>

                <?= $form->field($model, 'nombre')->textInput([
                    'class' => 'register-input',
                    'placeholder' => 'Ingresa tus nombres',
                    'autocomplete' => 'given-name',
                    'maxlength' => true,
                    'required' => true,
                ])->label('Nombres') ?>

                <?= $form->field($model, 'apellido')->textInput([
                    'class' => 'register-input',
                    'placeholder' => 'Ingresa tus apellidos',
                    'autocomplete' => 'family-name',
                    'maxlength' => true,
                    'required' => true,
                ])->label('Apellidos') ?>

                <?= $form->field($model, 'username')->textInput([
                    'class' => 'register-input',
                    'placeholder' => 'Crea un nombre de usuario',
                    'autocomplete' => 'username',
                    'maxlength' => true,
                    'required' => true,
                ])->label('Nombre de usuario') ?>

                <?= $form->field($model, 'correo')->input('email', [
                    'class' => 'register-input',
                    'placeholder' => 'ejemplo@correo.com',
                    'autocomplete' => 'email',
                    'maxlength' => true,
                    'required' => true,
                ])->label('Correo electrónico') ?>

                <div class="form-group">
                    <label class="control-label" for="register-password">
                        Contraseña
                    </label>

                    <div class="register-input-wrapper">
                        <i class="bi bi-lock register-input-icon"></i>

                        <input
                            type="password"
                            id="register-password"
                            name="User[password]"
                            class="register-input register-password-input"
                            placeholder="Crea una contraseña segura"
                            autocomplete="new-password"
                            minlength="8"
                            required
                        >

                        <button
                            type="button"
                            class="register-toggle-password"
                            onclick="toggleRegisterPassword('register-password', 'register-password-icon')"
                            aria-label="Mostrar contraseña"
                        >
                            <i class="bi bi-eye" id="register-password-icon"></i>
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label" for="register-password-confirm">
                        Confirmar contraseña
                    </label>

                    <div class="register-input-wrapper">
                        <i class="bi bi-shield-lock register-input-icon"></i>

                        <input
                            type="password"
                            id="register-password-confirm"
                            name="confirmPassword"
                            class="register-input register-password-input"
                            placeholder="Escribe nuevamente tu contraseña"
                            autocomplete="new-password"
                            minlength="8"
                            required
                        >

                        <button
                            type="button"
                            class="register-toggle-password"
                            onclick="toggleRegisterPassword('register-password-confirm', 'register-confirm-icon')"
                            aria-label="Mostrar confirmación de contraseña"
                        >
                            <i class="bi bi-eye" id="register-confirm-icon"></i>
                        </button>
                    </div>

                    <div id="register-password-error" class="invalid-feedback"></div>
                </div>

                <?= Html::submitButton(
                    '<i class="fa-solid fa-user-plus"></i> Crear mi cuenta <i class="bi bi-arrow-right"></i>',
                    [
                        'class' => 'register-submit',
                        'name' => 'register-button',
                    ]
                ) ?>

                <?php ActiveForm::end(); ?>

                <div class="register-footer">
                    <p>¿Ya tienes una cuenta?</p>

                    <?= Html::a(
                        '<i class="bi bi-box-arrow-in-right"></i> Iniciar sesión',
                        ['/site/login'],
                        ['class' => 'register-login-link']
                    ) ?>
                </div>

                <div class="register-security">
                    <i class="bi bi-shield-check"></i>
                    <span>Protege tus datos y utiliza una contraseña segura.</span>
                </div>

                <div class="register-copyright">
                    © <?= date('Y') ?> Código de Ética en la Investigación Científica
                </div>

            </div>

        </div>

    </main>

</div>

<script>
function toggleRegisterPassword(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);

    if (!input || !icon) {
        return;
    }

    const mostrar = input.type === 'password';

    input.type = mostrar ? 'text' : 'password';

    icon.classList.toggle('bi-eye', !mostrar);
    icon.classList.toggle('bi-eye-slash', mostrar);
}

const registerForm = document.getElementById('register-form');

if (registerForm) {
    registerForm.addEventListener('submit', function (event) {
        const password = document.getElementById('register-password');
        const confirmPassword = document.getElementById('register-password-confirm');
        const error = document.getElementById('register-password-error');

        error.textContent = '';
        error.style.display = 'none';

        if (password.value !== confirmPassword.value) {
            event.preventDefault();
            error.textContent = 'Las contraseñas no coinciden.';
            error.style.display = 'block';
            confirmPassword.focus();
        }
    });
}
</script>