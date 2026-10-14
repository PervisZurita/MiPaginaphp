<?php

declare(strict_types=1);

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ForoRespuesta $model */

$this->title = 'Editar respuesta';

$this->registerCss(<<<'CSS'
.respuesta-update {
    --update-primary: #647da8;
    --update-primary-dark: #455d85;
    --update-lavender: #e9e5f7;
    --update-blue: #e5effb;
    --update-pink: #f8e7ed;
    --update-mint: #e2f2e9;
    --update-yellow: #fff4d9;
    --update-muted: #7b8799;
    --update-border: #e3e8f0;

    width: 100%;
    min-height: 100vh;
    padding: 38px 28px 70px;
    background:
        radial-gradient(circle at 5% 5%, rgba(233,229,247,.75), transparent 27%),
        radial-gradient(circle at 96% 8%, rgba(229,239,251,.85), transparent 28%),
        #f8f9fd;
    color: #46546b;
    box-sizing: border-box;
}

.respuesta-update *,
.respuesta-update *::before,
.respuesta-update *::after {
    box-sizing: border-box;
}

.update-container {
    width: 100%;
    max-width: 1100px;
    margin: 0 auto;
}

.update-back {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 22px;
    color: var(--update-primary-dark) !important;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none !important;
    transition: gap .2s ease, color .2s ease;
}

.update-back:hover {
    gap: 15px;
    color: #a16e8c !important;
}

.update-header {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    display: flex;
    align-items: center;
    gap: 23px;
    padding: 38px 42px;
    border: 1px solid #dfe7f5;
    border-radius: 22px 22px 0 0;
    background: linear-gradient(120deg, #e5effb 0%, #e9e5f7 55%, #f8e7ed 100%);
    color: #455d85;
}

.update-header::before,
.update-header::after {
    content: "";
    position: absolute;
    z-index: -1;
    border: 1px solid rgba(100,125,168,.15);
    border-radius: 50%;
    pointer-events: none;
}

.update-header::before {
    width: 290px;
    height: 290px;
    top: -145px;
    right: -40px;
}

.update-header::after {
    width: 200px;
    height: 200px;
    top: -100px;
    right: 10px;
}

.update-header-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 68px;
    height: 68px;
    flex-shrink: 0;
    border: 1px solid rgba(100,125,168,.15);
    border-radius: 20px;
    background: rgba(255,255,255,.72);
    color: #647da8;
    font-size: 25px;
    box-shadow: 0 5px 15px rgba(100,125,168,.08);
}

.update-header-content {
    position: relative;
    z-index: 1;
}

.update-eyebrow {
    display: inline-block;
    margin-bottom: 9px;
    color: #8a79ad;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.6px;
}

.update-header h1 {
    margin: 0 0 10px;
    color: #455d85;
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(27px, 3vw, 36px);
    line-height: 1.25;
    font-weight: 700;
}

.update-header p {
    max-width: 650px;
    margin: 0;
    color: #68758b;
    font-size: 13px;
    line-height: 1.9;
}

.update-box {
    padding: 36px 42px 40px;
    border: 1px solid var(--update-border);
    border-top: 4px solid #c9c1e8;
    border-radius: 0 0 22px 22px;
    background: rgba(255,255,255,.96);
    box-shadow: 0 15px 40px rgba(91,108,145,.07);
}

.update-section-heading {
    display: flex;
    align-items: center;
    gap: 13px;
    padding-bottom: 21px;
    margin-bottom: 25px;
    border-bottom: 1px solid #edf0f6;
}

.update-section-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 45px;
    height: 45px;
    flex-shrink: 0;
    border: 1px solid #e0d9f3;
    border-radius: 14px;
    background: var(--update-lavender);
    color: #8272ad;
    font-size: 17px;
}

.update-section-heading h2 {
    margin: 0 0 5px;
    color: #455d85;
    font-family: Georgia, "Times New Roman", serif;
    font-size: 22px;
    font-weight: 700;
}

.update-section-heading p {
    margin: 0;
    color: var(--update-muted);
    font-size: 12px;
    line-height: 1.7;
}

.update-info {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    padding: 19px 20px;
    margin-bottom: 30px;
    border: 1px solid #e9dfb9;
    border-left: 4px solid #e7cb88;
    border-radius: 13px;
    background: linear-gradient(110deg, #fff9e9, #fffdf7);
}

.update-info-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 37px;
    height: 37px;
    flex-shrink: 0;
    border: 1px solid #f0dfb4;
    border-radius: 12px;
    background: #fff;
    color: #c09b52;
    font-size: 15px;
}

.update-info strong {
    display: block;
    margin-bottom: 6px;
    color: #927440;
    font-size: 12px;
    font-weight: 800;
}

.update-info p {
    margin: 0;
    color: #84775f;
    font-size: 12px;
    line-height: 1.9;
}

.update-form .form-group {
    margin-bottom: 23px;
}

.update-form .control-label {
    display: block;
    margin-bottom: 11px;
    color: #526b91;
    font-size: 13px;
    font-weight: 800;
}

.update-form .control-label i {
    margin-right: 8px;
    color: #a18cc9;
    font-size: 14px;
}

.update-form .form-control {
    display: block;
    width: 100%;
    min-height: 55px;
    padding: 15px 17px;
    border: 1px solid #dce3ef;
    border-radius: 12px;
    background: #fbfcff;
    color: #46546b;
    font-family: inherit;
    font-size: 14px;
    line-height: 1.9;
    box-shadow: none;
    transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
}

.update-form .form-control::placeholder {
    color: #a2adbf;
}

.update-form .form-control:focus {
    border-color: #a9b9df;
    background: #fff;
    box-shadow: 0 0 0 4px rgba(169,185,223,.18);
    outline: none;
}

.update-form textarea.form-control {
    min-height: 230px;
    resize: vertical;
}

.update-form .has-error .form-control {
    border-color: #dfa3b1;
    background: #fffafb;
}

.update-form .help-block {
    margin-top: 7px;
    color: #c16e82;
    font-size: 12px;
    line-height: 1.7;
}

.update-note {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    padding: 13px 15px;
    margin-top: 3px;
    border: 1px solid #dceee5;
    border-radius: 11px;
    background: #f2faf6;
    color: #708b7d;
    font-size: 11px;
    line-height: 1.8;
}

.update-note i {
    margin-top: 3px;
    color: #7cae96;
}

.update-actions {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 18px;
    padding-top: 25px;
    margin-top: 28px;
    border-top: 1px solid #edf0f6;
}

.update-actions-note {
    max-width: 390px;
    color: var(--update-muted);
    font-size: 11px;
    line-height: 1.8;
}

.update-actions-buttons {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 12px;
    flex-shrink: 0;
}

.btn-update-cancelar,
.btn-guardar {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    min-height: 46px;
    padding: 12px 20px;
    border: 1px solid transparent;
    border-radius: 12px;
    font-family: inherit;
    font-size: 12px;
    font-weight: 800;
    text-decoration: none !important;
    cursor: pointer;
    transition: background .2s ease, border-color .2s ease, color .2s ease, transform .2s ease, box-shadow .2s ease;
}

.btn-update-cancelar {
    border-color: #e0e5ed;
    background: #f8f9fc;
    color: #65738a !important;
}

.btn-update-cancelar:hover {
    border-color: #d5cdeb;
    background: #f0edf9;
    color: #74659d !important;
}

.btn-guardar {
    border-color: #9cadd2;
    background: linear-gradient(135deg, #8299c5, #7189b5);
    color: #fff;
    box-shadow: 0 5px 13px rgba(113,137,181,.18);
}

.btn-guardar:hover,
.btn-guardar:focus {
    border-color: #647da8;
    background: linear-gradient(135deg, #7189b5, #647da8);
    color: #fff;
    box-shadow: 0 7px 17px rgba(100,125,168,.25);
    transform: translateY(-1px);
}

@media (max-width: 768px) {
    .respuesta-update {
        padding: 28px 15px 50px;
    }

    .update-header {
        padding: 30px 25px;
        gap: 16px;
    }

    .update-header-icon {
        width: 56px;
        height: 56px;
        font-size: 21px;
    }

    .update-header h1 {
        font-size: 28px;
    }

    .update-box {
        padding: 28px 23px;
    }

    .update-actions {
        align-items: stretch;
        flex-direction: column;
    }

    .update-actions-note {
        max-width: none;
    }

    .update-actions-buttons {
        width: 100%;
    }

    .btn-update-cancelar,
    .btn-guardar {
        flex: 1;
    }
}

@media (max-width: 480px) {
    .respuesta-update {
        padding: 22px 12px 40px;
    }

    .update-header {
        align-items: flex-start;
        padding: 25px 18px;
        gap: 13px;
    }

    .update-header-icon {
        width: 44px;
        height: 44px;
        border-radius: 13px;
        font-size: 17px;
    }

    .update-eyebrow {
        font-size: 9px;
        letter-spacing: 1px;
        line-height: 1.8;
    }

    .update-header h1 {
        font-size: 24px;
    }

    .update-header p {
        font-size: 12px;
    }

    .update-box {
        padding: 24px 17px;
    }

    .update-section-heading h2 {
        font-size: 19px;
    }

    .update-info {
        padding: 15px 13px;
        gap: 10px;
    }

    .update-info-icon {
        width: 31px;
        height: 31px;
    }

    .update-form textarea.form-control {
        min-height: 190px;
    }

    .update-actions-buttons {
        flex-direction: column-reverse;
    }

    .btn-update-cancelar,
    .btn-guardar {
        width: 100%;
        min-height: 46px;
    }
}
CSS);
?>

<div class="respuesta-update">
    <div class="update-container">

        <?= Html::a(
            '<i class="fa-solid fa-arrow-left"></i><span>Volver al debate</span>',
            ['/foro/view', 'id' => $model->foro_id],
            [
                'class' => 'update-back',
                'encode' => false,
            ]
        ) ?>

        <header class="update-header">
            <div class="update-header-icon">
                <i class="fa-solid fa-pen-to-square"></i>
            </div>

            <div class="update-header-content">
                <span class="update-eyebrow">
                    FORO DE DEBATE · INVESTIGACIÓN CIENTÍFICA
                </span>

                <h1>Editar respuesta</h1>

                <p>
                    Revisa y mejora tu aportación para expresar tus ideas
                    con claridad y fortalecer el diálogo académico.
                </p>
            </div>
        </header>

        <section class="update-box">

            <div class="update-section-heading">
                <div class="update-section-icon">
                    <i class="fa-solid fa-pen-to-square"></i>
                </div>

                <div>
                    <h2>Modificar tu respuesta</h2>
                    <p>Realiza los cambios necesarios antes de guardar.</p>
                </div>
            </div>

            <div class="update-info">
                <div class="update-info-icon">
                    <i class="fa-solid fa-circle-info"></i>
                </div>

                <div>
                    <strong>Comunicación académica responsable</strong>

                    <p>
                        Procura mantener argumentos claros, respetuosos y
                        relacionados con el tema del debate. Evita incluir
                        información personal o confidencial de terceros.
                    </p>
                </div>
            </div>

            <?php $form = ActiveForm::begin([
                'options' => [
                    'class' => 'update-form',
                ],
                'enableClientValidation' => true,
            ]); ?>

            <?= $form->field($model, 'contenido')->textarea([
                'rows' => 8,
                'placeholder' => 'Modifica aquí el contenido de tu respuesta...',
                'aria-label' => 'Contenido de la respuesta',
            ])->label(
                '<i class="fa-solid fa-align-left"></i> Contenido de tu respuesta',
                ['encode' => false]
            ) ?>

            <div class="update-note">
                <i class="fa-solid fa-shield-halved"></i>

                <span>
                    Comprueba que tu respuesta refleje correctamente tu opinión
                    antes de guardar los cambios.
                </span>
            </div>

            <div class="update-actions">
                <div class="update-actions-note">
                    Los cambios se enviarán al servidor para su validación
                    antes de actualizar la respuesta.
                </div>

                <div class="update-actions-buttons">
                    <?= Html::a(
                        '<i class="fa-solid fa-xmark"></i> Cancelar',
                        ['/foro/view', 'id' => $model->foro_id],
                        [
                            'class' => 'btn-update-cancelar',
                            'encode' => false,
                        ]
                    ) ?>

                    <?= Html::submitButton(
                        '<i class="fa-solid fa-floppy-disk"></i> Guardar cambios',
                        [
                            'class' => 'btn-guardar',
                            'encode' => false,
                        ]
                    ) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </section>
    </div>
</div>
