<?php

declare(strict_types=1);

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Nuevo debate';

$this->registerCss(<<<'CSS'
.foro-create-page {
    --pastel-blue: #dceaf7;
    --pastel-lavender: #e9e3f8;
    --pastel-pink: #f8e3ec;
    --pastel-mint: #dff2e8;
    --primary: #526b91;
    --primary-dark: #354d70;
    --text: #44516a;
    --muted: #8390a5;
    --border: #e4e8f0;
    --white: #ffffff;

    width: 100%;
    min-height: 100vh;
    padding: 35px 28px 70px;
    background:
        radial-gradient(ellipse at 5% 5%, rgba(220,234,247,.75), transparent 30%),
        radial-gradient(ellipse at 95% 15%, rgba(233,227,248,.65), transparent 28%),
        linear-gradient(145deg, #f8faff 0%, #f8f7fc 55%, #f5faf9 100%);
    color: var(--text);
    font-family: inherit;
}

.foro-create-page *,
.foro-create-page *::before,
.foro-create-page *::after {
    box-sizing: border-box;
}

.foro-create-container {
    width: 100%;
    max-width: 1120px;
    margin: 0 auto;
}

.create-back {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 23px;
    padding: 10px 15px;
    border: 1px solid #e2e8f2;
    border-radius: 12px;
    background: rgba(255,255,255,.82);
    color: var(--primary-dark) !important;
    text-decoration: none !important;
    font-size: 13px;
    font-weight: 700;
    box-shadow: 0 3px 12px rgba(72,91,125,.04);
    transition: all .25s ease;
}

.create-back:hover {
    gap: 14px;
    border-color: #c8d8ed;
    background: #fff;
    transform: translateX(-3px);
}

.create-header {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    display: flex;
    align-items: center;
    gap: 24px;
    padding: 42px 45px;
    border: 1px solid rgba(255,255,255,.8);
    border-radius: 24px 24px 0 0;
    background: linear-gradient(120deg, #e3edfb 0%, #eae7fa 52%, #f7e8f0 100%);
    box-shadow: 0 12px 35px rgba(93,110,150,.08);
}

.create-header::before {
    content: "";
    position: absolute;
    z-index: -1;
    top: -115px;
    right: -50px;
    width: 310px;
    height: 310px;
    border: 1px solid rgba(115,132,177,.16);
    border-radius: 50%;
}

.create-header::after {
    content: "";
    position: absolute;
    z-index: -1;
    right: 65px;
    bottom: -145px;
    width: 260px;
    height: 260px;
    border: 1px solid rgba(163,139,187,.18);
    border-radius: 50%;
}

.create-header-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 76px;
    height: 76px;
    flex-shrink: 0;
    border: 1px solid rgba(255,255,255,.9);
    border-radius: 22px;
    background: rgba(255,255,255,.72);
    color: #637da8;
    font-size: 29px;
    box-shadow: 0 8px 20px rgba(100,118,158,.09);
}

.create-header-content {
    position: relative;
    z-index: 1;
}

.create-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 11px;
    color: #6c78a0;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.6px;
}

.create-eyebrow::before {
    content: "";
    width: 22px;
    height: 2px;
    border-radius: 5px;
    background: #a99bcf;
}

.create-header h1 {
    margin: 0 0 11px;
    color: #3f5276;
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(27px, 3vw, 36px);
    line-height: 1.25;
    font-weight: 700;
}

.create-header p {
    max-width: 650px;
    margin: 0;
    color: #687793;
    font-size: 13px;
    line-height: 1.9;
}

.create-body {
    padding: 38px 45px 42px;
    border: 1px solid var(--border);
    border-top: 0;
    border-radius: 0 0 24px 24px;
    background: rgba(255,255,255,.96);
    box-shadow: 0 18px 45px rgba(78,96,133,.07);
}

.create-section-heading {
    display: flex;
    align-items: center;
    gap: 14px;
    padding-bottom: 23px;
    margin-bottom: 25px;
    border-bottom: 1px solid #edf0f6;
}

.create-section-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 49px;
    height: 49px;
    flex-shrink: 0;
    border: 1px solid #e3ddf4;
    border-radius: 15px;
    background: var(--pastel-lavender);
    color: #7770a9;
    font-size: 19px;
}

.create-section-heading h2 {
    margin: 0 0 5px;
    color: #435675;
    font-family: Georgia, "Times New Roman", serif;
    font-size: 22px;
    font-weight: 700;
}

.create-section-heading p {
    margin: 0;
    color: var(--muted);
    font-size: 12px;
    line-height: 1.7;
}

.create-info {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    padding: 19px 21px;
    margin-bottom: 30px;
    border: 1px solid #dcece4;
    border-left: 4px solid #a9d8c1;
    border-radius: 15px;
    background: linear-gradient(120deg, #f0faf5, #f8fcfa);
}

.create-info-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 39px;
    height: 39px;
    flex-shrink: 0;
    border: 1px solid #d6eade;
    border-radius: 12px;
    background: #fff;
    color: #6aab8a;
    font-size: 16px;
}

.create-info strong {
    display: block;
    margin-bottom: 6px;
    color: #47765f;
    font-size: 13px;
    font-weight: 800;
}

.create-info p {
    margin: 0;
    color: #6b8a7b;
    font-size: 12px;
    line-height: 1.9;
}

.foro-form .form-group {
    margin-bottom: 25px;
}

.foro-form .control-label {
    display: block;
    margin-bottom: 10px;
    color: #4c5f80;
    font-size: 13px;
    font-weight: 800;
}

.foro-form .control-label i {
    margin-right: 8px;
    color: #9587c5;
    font-size: 14px;
}

.foro-form .form-control {
    display: block;
    width: 100%;
    min-height: 53px;
    padding: 14px 16px;
    border: 1px solid #e0e5ef;
    border-radius: 13px;
    background: #fbfcff;
    color: #46546e;
    font-family: inherit;
    font-size: 13px;
    line-height: 1.8;
    box-shadow: 0 2px 7px rgba(85,102,139,.025);
    transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
}

.foro-form .form-control::placeholder {
    color: #a0aabe;
    opacity: 1;
}

.foro-form .form-control:hover {
    border-color: #cdd8e9;
    background: #fff;
}

.foro-form .form-control:focus {
    border-color: #a8bce0;
    background: #fff;
    box-shadow: 0 0 0 4px rgba(174,192,227,.2);
    outline: none;
}

.foro-form textarea.form-control {
    min-height: 235px;
    resize: vertical;
}

.foro-form .has-error .form-control {
    border-color: #e4a5ad;
    background: #fffafa;
}

.foro-form .has-error .form-control:focus {
    box-shadow: 0 0 0 4px rgba(228,165,173,.15);
}

.foro-form .help-block {
    margin-top: 7px;
    color: #c16e7b;
    font-size: 12px;
    line-height: 1.6;
}

.create-form-note {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    padding: 13px 15px;
    margin-top: -3px;
    border-radius: 11px;
    background: #f8f6fd;
    color: #85829e;
    font-size: 11px;
    line-height: 1.8;
}

.create-form-note i {
    margin-top: 3px;
    color: #9c91c9;
    font-size: 13px;
}

.form-buttons {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    padding-top: 25px;
    margin-top: 28px;
    border-top: 1px solid #edf0f6;
}

.form-buttons-left {
    max-width: 440px;
    color: #8993a8;
    font-size: 11px;
    line-height: 1.9;
}

.form-buttons-right {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 12px;
    flex-shrink: 0;
}

.btn-cancelar,
.btn-publicar {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    min-height: 46px;
    padding: 13px 20px;
    border: 1px solid transparent;
    border-radius: 12px;
    font-family: inherit;
    font-size: 12px;
    font-weight: 800;
    text-decoration: none !important;
    cursor: pointer;
    transition: all .22s ease;
}

.btn-cancelar {
    border-color: #e2e6ef;
    background: #fff;
    color: #758198 !important;
}

.btn-cancelar:hover {
    border-color: #cbd6e8;
    background: #f5f8fd;
    color: #526b91 !important;
    transform: translateY(-2px);
}

.btn-publicar {
    border-color: #8298bf;
    background: linear-gradient(135deg, #7189b5, #8e9dc7);
    color: #fff;
    box-shadow: 0 6px 15px rgba(112,136,181,.2);
}

.btn-publicar:hover,
.btn-publicar:focus {
    border-color: #667fae;
    background: linear-gradient(135deg, #617eac, #7e91bf);
    color: #fff;
    box-shadow: 0 8px 19px rgba(112,136,181,.27);
    transform: translateY(-2px);
}

.btn-publicar i,
.btn-cancelar i {
    font-size: 12px;
}

@media (min-width: 1400px) {
    .foro-create-container {
        max-width: 1250px;
    }

    .create-header {
        padding: 48px 52px;
    }

    .create-body {
        padding: 44px 52px 48px;
    }
}

@media (max-width: 768px) {
    .foro-create-page {
        padding: 27px 16px 50px;
    }

    .create-header {
        padding: 30px 25px;
        gap: 17px;
    }

    .create-header-icon {
        width: 59px;
        height: 59px;
        border-radius: 17px;
        font-size: 23px;
    }

    .create-header h1 {
        font-size: 27px;
    }

    .create-body {
        padding: 29px 25px;
    }

    .form-buttons {
        align-items: stretch;
        flex-direction: column;
    }

    .form-buttons-left {
        max-width: none;
    }

    .form-buttons-right {
        width: 100%;
    }

    .btn-cancelar,
    .btn-publicar {
        flex: 1;
    }
}

@media (max-width: 480px) {
    .foro-create-page {
        padding: 22px 12px 40px;
    }

    .create-back {
        margin-bottom: 17px;
    }

    .create-header {
        align-items: flex-start;
        gap: 13px;
        padding: 25px 18px;
        border-radius: 19px 19px 0 0;
    }

    .create-header-icon {
        width: 43px;
        height: 43px;
        border-radius: 12px;
        font-size: 18px;
    }

    .create-eyebrow {
        font-size: 8px;
        letter-spacing: .8px;
        line-height: 1.7;
    }

    .create-header h1 {
        font-size: 23px;
    }

    .create-header p {
        font-size: 12px;
        line-height: 1.8;
    }

    .create-body {
        padding: 24px 17px;
        border-radius: 0 0 19px 19px;
    }

    .create-section-heading {
        align-items: flex-start;
        gap: 11px;
    }

    .create-section-icon {
        width: 41px;
        height: 41px;
        border-radius: 12px;
        font-size: 16px;
    }

    .create-section-heading h2 {
        font-size: 19px;
    }

    .create-info {
        gap: 11px;
        padding: 15px 13px;
    }

    .create-info-icon {
        width: 32px;
        height: 32px;
        border-radius: 10px;
    }

    .foro-form textarea.form-control {
        min-height: 190px;
    }

    .form-buttons-right {
        flex-direction: column-reverse;
    }

    .btn-cancelar,
    .btn-publicar {
        width: 100%;
        min-height: 46px;
    }
}
CSS);
?>

<div class="foro-create-page">
    <div class="foro-create-container">

        <?= Html::a(
            '<i class="fa-solid fa-arrow-left"></i><span>Volver al foro</span>',
            ['index'],
            [
                'class' => 'create-back',
                'encode' => false,
            ]
        ) ?>

        <header class="create-header">
            <div class="create-header-icon">
                <i class="fa-solid fa-scale-balanced"></i>
            </div>

            <div class="create-header-content">
                <span class="create-eyebrow">
                    FORO DE DEBATE · INVESTIGACIÓN CIENTÍFICA
                </span>

                <h1>Crear nuevo debate</h1>

                <p>
                    Comparte una pregunta, idea o reflexión y contribuye
                    al diálogo académico sobre la ética de la investigación.
                </p>
            </div>
        </header>

        <section class="create-body">

            <div class="create-section-heading">
                <div class="create-section-icon">
                    <i class="fa-solid fa-pen-to-square"></i>
                </div>

                <div>
                    <h2>Información del debate</h2>
                    <p>
                        Completa los siguientes campos para iniciar una conversación.
                    </p>
                </div>
            </div>

            <div class="create-info">
                <div class="create-info-icon">
                    <i class="fa-solid fa-circle-info"></i>
                </div>

                <div>
                    <strong>Participación ética y responsable</strong>

                    <p>
                        Publica contenido relacionado con la ética de la investigación
                        científica. Expresa tus argumentos con claridad, respeta las
                        opiniones de los demás y promueve un diálogo constructivo.
                    </p>
                </div>
            </div>

            <?php $form = ActiveForm::begin([
                'options' => [
                    'class' => 'foro-form',
                ],
                'enableClientValidation' => true,
            ]); ?>

            <?= $form->field($foro, 'titulo')->textInput([
                'maxlength' => true,
                'placeholder' => 'Ej.: La importancia del consentimiento informado',
                'autocomplete' => 'off',
            ])->label(
                '<i class="fa-solid fa-heading"></i> Título del debate',
                ['encode' => false]
            ) ?>

            <?= $form->field($foro, 'contenido')->textarea([
                'rows' => 8,
                'placeholder' => 'Explica tu pregunta, argumento o reflexión. Puedes incluir el contexto y los aspectos que te gustaría debatir con la comunidad...',
            ])->label(
                '<i class="fa-solid fa-align-left"></i> Descripción y contenido',
                ['encode' => false]
            ) ?>

            <div class="create-form-note">
                <i class="fa-solid fa-shield-halved"></i>

                <span>
                    Antes de publicar, revisa que el título y el contenido sean claros,
                    respetuosos y pertinentes para el tema del foro.
                </span>
            </div>

            <div class="form-buttons">
                <div class="form-buttons-left">
                    Tu aporte puede ayudar a fortalecer la reflexión
                    y el intercambio de conocimientos dentro de la comunidad académica.
                </div>

                <div class="form-buttons-right">
                    <?= Html::a(
                        '<i class="fa-solid fa-xmark"></i> Cancelar',
                        ['index'],
                        [
                            'class' => 'btn-cancelar',
                            'encode' => false,
                        ]
                    ) ?>

                    <?= Html::submitButton(
                        '<i class="fa-solid fa-paper-plane"></i> Publicar debate',
                        [
                            'class' => 'btn-publicar',
                            'encode' => false,
                        ]
                    ) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </section>
    </div>
</div>
