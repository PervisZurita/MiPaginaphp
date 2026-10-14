<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Recuperar contraseña';

$this->registerCssFile(
    'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css'
);

$this->registerCss(<<<CSS
html, body {
    margin: 0;
    min-height: 100%;
}

.recovery-page {
    position: relative;
    width: 100%;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 35px 20px;
    overflow: hidden;
    box-sizing: border-box;
    background: linear-gradient(135deg, #0f172a 0%, #172554 48%, #1e40af 100%);
}

.recovery-page *,
.recovery-page *::before,
.recovery-page *::after {
    box-sizing: border-box;
}

.recovery-decoration {
    position: absolute;
    border-radius: 50%;
    pointer-events: none;
}

.recovery-decoration-one {
    width: 440px;
    height: 440px;
    top: -180px;
    left: -120px;
    background: rgba(96, 165, 250, .13);
}

.recovery-decoration-two {
    width: 520px;
    height: 520px;
    right: -180px;
    bottom: -230px;
    background: rgba(147, 197, 253, .12);
}

.recovery-decoration-three {
    width: 180px;
    height: 180px;
    right: 15%;
    top: 12%;
    border: 1px solid rgba(255, 255, 255, .12);
}

.recovery-container {
    position: relative;
    z-index: 1;
    width: 100%;
    max-width: 490px;
    margin: auto;
}

.recovery-card {
    width: 100%;
    padding: 44px 42px;
    border: 1px solid rgba(255, 255, 255, .45);
    border-radius: 25px;
    background: rgba(255, 255, 255, .98);
    box-shadow: 0 28px 90px rgba(0, 0, 0, .25);
}

.recovery-logo {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 82px;
    height: 82px;
    margin: 0 auto 22px;
    border-radius: 24px;
    background: #dbeafe;
    color: #1d4ed8;
    font-size: 36px;
    box-shadow: 0 8px 22px rgba(37, 99, 235, .12);
}

.recovery-eyebrow {
    margin: 0 0 9px;
    color: #2563eb;
    text-align: center;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-size: 11px;
    font-weight: 800;
}

.recovery-card h1 {
    margin: 0;
    color: #0f172a;
    text-align: center;
    font-size: 29px;
    line-height: 1.3;
    font-weight: 800;
}

.recovery-description {
    margin: 16px 0 29px;
    color: #64748b;
    text-align: center;
    font-size: 14px;
    line-height: 1.8;
}

.recovery-card label {
    display: block;
    margin-bottom: 9px;
    color: #334155;
    font-size: 13px;
    font-weight: 700;
}

.recovery-card .form-control {
    width: 100%;
    height: 53px;
    padding: 12px 15px;
    border: 1px solid #cbd5e1;
    border-radius: 12px;
    background: #f8fafc;
    color: #0f172a;
    font-size: 14px;
    box-shadow: none;
    transition: border-color .2s, box-shadow .2s, background .2s;
}

.recovery-card .form-control:focus {
    border-color: #2563eb;
    background: #fff;
    box-shadow: 0 0 0 4px rgba(37, 99, 235, .12);
    outline: none;
}

.recovery-card .form-control::placeholder {
    color: #94a3b8;
}

.recovery-button,
.recovery-login-button {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
    min-height: 51px;
    padding: 13px 18px;
    border-radius: 12px;
    text-align: center;
    text-decoration: none;
    font-size: 14px;
    font-weight: 700;
    transition: all .2s ease;
}

.recovery-button {
    margin-top: 18px;
    border: none;
    color: #fff;
    background: linear-gradient(135deg, #2563eb, #1d4ed8);
    box-shadow: 0 8px 18px rgba(37, 99, 235, .22);
}

.recovery-button:hover {
    color: #fff;
    background: linear-gradient(135deg, #1d4ed8, #1e40af);
    transform: translateY(-1px);
    box-shadow: 0 11px 22px rgba(37, 99, 235, .28);
}

.recovery-separator {
    display: flex;
    align-items: center;
    gap: 14px;
    margin: 25px 0;
    color: #94a3b8;
    font-size: 11px;
}

.recovery-separator::before,
.recovery-separator::after {
    content: "";
    flex: 1;
    height: 1px;
    background: #e2e8f0;
}

.recovery-login-button {
    border: 1px solid #cbd5e1;
    color: #334155;
    background: #fff;
}

.recovery-login-button:hover {
    border-color: #2563eb;
    color: #1d4ed8;
    background: #eff6ff;
}

.recovery-security {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    margin-top: 25px;
    color: #64748b;
    font-size: 11px;
    text-align: center;
}

.recovery-security i {
    color: #059669;
    font-size: 16px;
}

.recovery-copyright {
    margin-top: 25px;
    color: #94a3b8;
    text-align: center;
    font-size: 11px;
}

@media (max-width: 576px) {
    .recovery-page {
        padding: 20px 14px;
    }

    .recovery-card {
        padding: 32px 23px;
        border-radius: 20px;
    }

    .recovery-card h1 {
        font-size: 25px;
    }

    .recovery-logo {
        width: 70px;
        height: 70px;
        font-size: 30px;
    }
}
CSS);
?>

<div class="recovery-page">

    <div class="recovery-decoration recovery-decoration-one"></div>
    <div class="recovery-decoration recovery-decoration-two"></div>
    <div class="recovery-decoration recovery-decoration-three"></div>

    <main class="recovery-container">

        <section class="recovery-card">

            <div class="recovery-logo">
                <i class="bi bi-shield-lock"></i>
            </div>

            <p class="recovery-eyebrow">
                Ciencia con ética
            </p>

            <h1>¿Olvidaste tu contraseña?</h1>

            <p class="recovery-description">
                No te preocupes. Ingresa el correo electrónico asociado
                a tu cuenta y te enviaremos las instrucciones para
                recuperar el acceso.
            </p>

            <?php $form = ActiveForm::begin([
                'id' => 'forgot-password-form',
                'method' => 'post',
                'options' => [
                    'autocomplete' => 'on',
                ],
            ]); ?>

            <div class="mb-3">
                <label for="correo">
                    Correo electrónico
                </label>

                <input
                    type="email"
                    id="correo"
                    name="correo"
                    class="form-control"
                    placeholder="Ingresa tu correo electrónico"
                    value="<?= Html::encode($correo) ?>"
                    autocomplete="email"
                    required
                    autofocus
                >
            </div>

            <?= Html::submitButton(
                '<i class="bi bi-envelope-arrow-up"></i> Enviar enlace de recuperación',
                [
                    'class' => 'recovery-button',
                ]
            ) ?>

            <?php ActiveForm::end(); ?>

            <div class="recovery-separator">
                <span>¿Ya recuerdas tu contraseña?</span>
            </div>

            <?= Html::a(
                '<i class="bi bi-arrow-left"></i> Volver al inicio de sesión',
                ['/site/login'],
                [
                    'class' => 'recovery-login-button',
                ]
            ) ?>

            <div class="recovery-security">
                <i class="bi bi-shield-check"></i>
                <span>Recuperación segura de tu cuenta</span>
            </div>

            <div class="recovery-copyright">
                © <?= date('Y') ?> Código de Ética en la Investigación Científica
            </div>

        </section>

    </main>

</div>
