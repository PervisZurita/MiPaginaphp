<?php

declare(strict_types=1);

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Foro $foro */
/** @var app\models\ForoRespuesta $model */

$this->title = 'Responder debate';

$this->registerCss(<<<'CSS'
.respuesta-create {
    --r-primary: #718db8;
    --r-primary-dark: #506b96;
    --r-primary-light: #eaf0fb;
    --r-lavender: #eee9fa;
    --r-pink: #f9e8ef;
    --r-mint: #e5f4ed;
    --r-yellow: #fff3d9;
    --r-text: #46546a;
    --r-muted: #8290a4;
    --r-border: #e3e8f0;
    --r-white: #ffffff;

    width: 100%;
    min-height: 100vh;
    padding: 35px 28px 75px;
    background:
        radial-gradient(ellipse at 4% 0%, #e9effc 0, transparent 35%),
        radial-gradient(ellipse at 100% 45%, #f7eaf3 0, transparent 28%),
        #f7f8fc;
    color: var(--r-text);
    font-family: inherit;
}

.respuesta-create *,
.respuesta-create *::before,
.respuesta-create *::after {
    box-sizing: border-box;
}

.respuesta-container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    animation: respuestaEntrada .45s ease both;
}

@keyframes respuestaEntrada {
    from {
        opacity: 0;
        transform: translateY(12px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.respuesta-volver {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 23px;
    color: var(--r-primary-dark) !important;
    font-size: 13px;
    font-weight: 800;
    text-decoration: none !important;
    transition: gap .2s ease, color .2s ease;
}

.respuesta-volver:hover {
    gap: 15px;
    color: #a16c91 !important;
}

.respuesta-volver i {
    color: #8b9dc5;
}

.respuesta-header {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    display: flex;
    align-items: center;
    gap: 24px;
    padding: 43px 45px;
    border: 1px solid #dce5f5;
    border-radius: 20px 20px 0 0;
    background: linear-gradient(120deg, #e6edfb 0%, #eee9fa 58%, #f8eaf1 100%);
    color: var(--r-text);
}

.respuesta-header::before {
    content: "";
    position: absolute;
    z-index: -1;
    top: -120px;
    right: -45px;
    width: 310px;
    height: 310px;
    border: 1px solid rgba(113,141,184,.25);
    border-radius: 50%;
    box-shadow:
        0 0 0 30px rgba(255,255,255,.15),
        0 0 0 65px rgba(113,141,184,.06);
}

.respuesta-header::after {
    content: "";
    position: absolute;
    z-index: -1;
    right: 135px;
    bottom: -110px;
    width: 190px;
    height: 190px;
    border: 1px solid rgba(177,145,187,.23);
    border-radius: 50%;
}

.respuesta-header-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 76px;
    height: 76px;
    flex-shrink: 0;
    border: 1px solid #d3dff2;
    border-radius: 22px;
    background: rgba(255,255,255,.72);
    color: #728cba;
    font-size: 29px;
    box-shadow: 0 6px 18px rgba(104,126,170,.08);
}

.respuesta-header-content {
    position: relative;
    z-index: 1;
}

.respuesta-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    margin-bottom: 12px;
    color: #7e78a7;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.7px;
    line-height: 1.8;
}

.respuesta-eyebrow::before {
    content: "";
    width: 22px;
    height: 2px;
    border-radius: 5px;
    background: #c4a6d6;
}

.respuesta-header h1 {
    margin: 0 0 12px;
    color: #455a7c;
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(28px, 3vw, 39px);
    line-height: 1.25;
    font-weight: 700;
    letter-spacing: -.6px;
    overflow-wrap: anywhere;
}

.respuesta-header p {
    max-width: 680px;
    margin: 0;
    color: #69788f;
    font-size: 13px;
    line-height: 1.9;
}

.respuesta-box {
    padding: 38px 45px 42px;
    border: 1px solid var(--r-border);
    border-top: 3px solid #c9b8e7;
    border-radius: 0 0 20px 20px;
    background: rgba(255,255,255,.96);
    box-shadow: 0 12px 35px rgba(100,116,150,.07);
}

.respuesta-section-heading {
    display: flex;
    align-items: center;
    gap: 14px;
    padding-bottom: 22px;
    margin-bottom: 26px;
    border-bottom: 1px solid #edf0f7;
}

.respuesta-section-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 48px;
    height: 48px;
    flex-shrink: 0;
    border: 1px solid #ded6f2;
    border-radius: 14px;
    background: var(--r-lavender);
    color: #8b7ab6;
    font-size: 19px;
}

.respuesta-section-heading h2 {
    margin: 0 0 5px;
    color: #4b5c79;
    font-family: Georgia, "Times New Roman", serif;
    font-size: 23px;
    font-weight: 700;
}

.respuesta-section-heading p {
    margin: 0;
    color: var(--r-muted);
    font-size: 12px;
    line-height: 1.7;
}

.respuesta-info {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    padding: 19px 21px;
    margin-bottom: 30px;
    border: 1px solid #e6dfef;
    border-left: 4px solid #c6b4e5;
    border-radius: 13px;
    background: linear-gradient(110deg, #f5f1fc, #fbf7fc);
}

.respuesta-info-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 39px;
    height: 39px;
    flex-shrink: 0;
    border: 1px solid #e3d9f4;
    border-radius: 12px;
    background: #fff;
    color: #9785bf;
    font-size: 16px;
}

.respuesta-info strong {
    display: block;
    margin-bottom: 6px;
    color: #71628f;
    font-size: 12px;
    font-weight: 800;
}

.respuesta-info p {
    margin: 0;
    color: #7b7790;
    font-size: 12px;
    line-height: 1.9;
}

.respuesta-form .form-group {
    margin-bottom: 23px;
}

.respuesta-form .control-label {
    display: block;
    margin-bottom: 11px;
    color: #506487;
    font-size: 12px;
    font-weight: 800;
}

.respuesta-form .control-label i {
    margin-right: 8px;
    color: #a594cf;
    font-size: 13px;
}

.respuesta-form .form-control {
    display: block;
    width: 100%;
    min-height: 55px;
    padding: 15px 17px;
    border: 1px solid #dce3ef;
    border-radius: 12px;
    background: #fbfcff;
    color: #46546a;
    font-family: inherit;
    font-size: 14px;
    line-height: 1.85;
    box-shadow: none;
    transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
}

.respuesta-form .form-control::placeholder {
    color: #a0aabd;
}

.respuesta-form .form-control:focus {
    border-color: #a8b9df;
    background: #fff;
    box-shadow: 0 0 0 4px rgba(143,164,211,.14);
    outline: none;
}

.respuesta-form textarea.form-control {
    min-height: 240px;
    resize: vertical;
}

.respuesta-form .has-error .form-control {
    border-color: #e3a7b1;
    background: #fffafb;
}

.respuesta-form .help-block {
    margin-top: 7px;
    color: #c36f80;
    font-size: 12px;
    line-height: 1.6;
}

.respuesta-nota {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    margin-top: -3px;
    color: #8490a4;
    font-size: 11px;
    line-height: 1.8;
}

.respuesta-nota i {
    margin-top: 3px;
    color: #86b7a2;
}

.respuesta-actions {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    padding-top: 25px;
    margin-top: 29px;
    border-top: 1px solid #edf0f7;
}

.respuesta-actions-note {
    max-width: 420px;
    color: #8591a4;
    font-size: 11px;
    line-height: 1.8;
}

.respuesta-actions-buttons {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 12px;
    flex-shrink: 0;
}

.btn-respuesta-cancelar,
.btn-publicar {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    min-height: 46px;
    padding: 12px 20px;
    border: 1px solid transparent;
    border-radius: 11px;
    font-family: inherit;
    font-size: 12px;
    font-weight: 800;
    text-decoration: none !important;
    cursor: pointer;
    transition: background .2s ease, border-color .2s ease, color .2s ease, transform .2s ease, box-shadow .2s ease;
}

.btn-respuesta-cancelar {
    border-color: #dfe5ef;
    background: #f7f8fc;
    color: #68778d !important;
}

.btn-respuesta-cancelar:hover {
    border-color: #c8d2e5;
    background: #edf1fa;
    color: #506b96 !important;
    transform: translateY(-1px);
}

.btn-publicar {
    border-color: #819ac5;
    background: linear-gradient(135deg, #8fa6d0, #8298c3);
    color: #fff !important;
    box-shadow: 0 5px 13px rgba(113,141,184,.17);
}

.btn-publicar:hover,
.btn-publicar:focus {
    border-color: #718bb7;
    background: linear-gradient(135deg, #7f98c5, #718ab7);
    color: #fff !important;
    box-shadow: 0 7px 17px rgba(113,141,184,.24);
    transform: translateY(-2px);
}

.btn-publicar:focus-visible,
.btn-respuesta-cancelar:focus-visible,
.respuesta-volver:focus-visible {
    outline: 3px solid #c6b7e8;
    outline-offset: 3px;
}

@media (max-width: 768px) {
    .respuesta-create {
        padding: 27px 15px 50px;
    }

    .respuesta-header {
        padding: 30px 25px;
        gap: 17px;
    }

    .respuesta-header-icon {
        width: 58px;
        height: 58px;
        border-radius: 16px;
        font-size: 23px;
    }

    .respuesta-header h1 {
        font-size: 28px;
    }

    .respuesta-box {
        padding: 29px 24px;
    }

    .respuesta-actions {
        align-items: stretch;
        flex-direction: column;
    }

    .respuesta-actions-note {
        max-width: none;
    }

    .respuesta-actions-buttons {
        width: 100%;
    }

    .btn-respuesta-cancelar,
    .btn-publicar {
        flex: 1;
    }
}

@media (max-width: 480px) {
    .respuesta-create {
        padding-right: 12px;
        padding-left: 12px;
    }

    .respuesta-header {
        align-items: flex-start;
        padding: 25px 18px;
        gap: 13px;
    }

    .respuesta-header-icon {
        width: 43px;
        height: 43px;
        border-radius: 12px;
        font-size: 17px;
    }

    .respuesta-eyebrow {
        font-size: 9px;
        letter-spacing: 1px;
    }

    .respuesta-header h1 {
        font-size: 23px;
    }

    .respuesta-header p {
        font-size: 12px;
    }

    .respuesta-box {
        padding: 24px 17px;
    }

    .respuesta-section-heading h2 {
        font-size: 20px;
    }

    .respuesta-info {
        padding: 15px 13px;
        gap: 10px;
    }

    .respuesta-info-icon {
        width: 32px;
        height: 32px;
    }

    .respuesta-form textarea.form-control {
        min-height: 190px;
    }

    .respuesta-actions-buttons {
        flex-direction: column-reverse;
    }

    .btn-respuesta-cancelar,
    .btn-publicar {
        width: 100%;
        min-height: 46px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .respuesta-container {
        animation: none;
    }

    .respuesta-volver,
    .respuesta-form .form-control,
    .btn-respuesta-cancelar,
    .btn-publicar {
        transition: none;
    }
}
CSS);
?>

<div class="respuesta-create">
    <div class="respuesta-container">

        <?= Html::a(
            '<i class="fa-solid fa-arrow-left" aria-hidden="true"></i><span>Volver al debate</span>',
            ['/foro/view', 'id' => $foro->id],
            [
                'class' => 'respuesta-volver',
                'encode' => false,
            ]
        ) ?>

        <header class="respuesta-header">
            <div class="respuesta-header-icon" aria-hidden="true">
                <i class="fa-solid fa-scale-balanced"></i>
            </div>

            <div class="respuesta-header-content">
                <span class="respuesta-eyebrow">
                    FORO DE DEBATE · INVESTIGACIÓN CIENTÍFICA
                </span>

                <h1>Responder al debate</h1>

                <p>
                    Expresa tus ideas, aporta argumentos y contribuye
                    a una conversación académica respetuosa y constructiva.
                </p>
            </div>
        </header>

        <section class="respuesta-box">

            <div class="respuesta-section-heading">
                <div class="respuesta-section-icon" aria-hidden="true">
                    <i class="fa-solid fa-pen-to-square"></i>
                </div>

                <div>
                    <h2>Tu participación</h2>
                    <p>Redacta tu respuesta antes de publicarla en el foro.</p>
                </div>
            </div>

            <div class="respuesta-info">
                <div class="respuesta-info-icon" aria-hidden="true">
                    <i class="fa-solid fa-circle-info"></i>
                </div>

                <div>
                    <strong>Diálogo académico responsable</strong>

                    <p>
                        Fundamenta tu opinión, mantén el respeto hacia los demás
                        participantes y evita compartir información personal
                        o confidencial de terceros.
                    </p>
                </div>
            </div>

            <?php $form = ActiveForm::begin([
                'action' => Url::to([
                    '/foro-respuesta/create',
                    'foro_id' => $foro->id,
                ]),
                'method' => 'post',
                'options' => [
                    'class' => 'respuesta-form',
                ],
                'enableClientValidation' => true,
            ]); ?>

            <?= $form->field($model, 'contenido')->textarea([
                'rows' => 8,
                'placeholder' => 'Escribe aquí tu análisis, opinión o respuesta al debate...',
                'maxlength' => true,
                'aria-label' => 'Contenido de la respuesta',
            ])->label(
                '<i class="fa-solid fa-align-left" aria-hidden="true"></i> Contenido de tu respuesta',
                ['encode' => false]
            ) ?>

            <div class="respuesta-nota">
                <i class="fa-solid fa-shield-halved" aria-hidden="true"></i>

                <span>
                    Revisa tu texto antes de publicarlo. Tu respuesta debe
                    contribuir al intercambio de ideas sobre la ética
                    de la investigación científica.
                </span>
            </div>

            <div class="respuesta-actions">
                <div class="respuesta-actions-note">
                    Tu participación fortalece la reflexión y el aprendizaje
                    colaborativo de la comunidad académica.
                </div>

                <div class="respuesta-actions-buttons">
                    <?= Html::a(
                        '<i class="fa-solid fa-xmark" aria-hidden="true"></i> Cancelar',
                        ['/foro/view', 'id' => $foro->id],
                        [
                            'class' => 'btn-respuesta-cancelar',
                            'encode' => false,
                        ]
                    ) ?>

                    <?= Html::submitButton(
                        '<i class="fa-solid fa-paper-plane" aria-hidden="true"></i> Publicar respuesta',
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
