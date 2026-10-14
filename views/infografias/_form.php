<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\Infografia $model */
/** @var yii\widgets\ActiveForm $form */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerCss(<<<'CSS'
.infografia-formulario {
    --info-primary: #7189b5;
    --info-primary-dark: #536c98;
    --info-lavender: #eae6f8;
    --info-blue: #e8f0fc;
    --info-pink: #f9e8ef;
    --info-mint: #e5f4ec;
    --info-yellow: #fff5df;
    --info-text: #4b586e;
    --info-muted: #8490a3;
    --info-border: #e3e8f1;

    width: 100%;
    padding: 30px;
    border: 1px solid var(--info-border);
    border-radius: 20px;
    background: #fff;
    color: var(--info-text);
    box-shadow: 0 12px 35px rgba(91,108,145,.07);
}

.infografia-formulario *,
.infografia-formulario *::before,
.infografia-formulario *::after {
    box-sizing: border-box;
}

.infografia-formulario-intro {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 23px 24px;
    margin-bottom: 30px;
    border: 1px solid #e0e6f5;
    border-radius: 16px;
    background: linear-gradient(120deg, #e8f0fc 0%, #eae6f8 65%, #f9e8ef 100%);
}

.infografia-formulario-icono {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 55px;
    height: 55px;
    border: 1px solid #d7e1f4;
    border-radius: 16px;
    background: rgba(255,255,255,.8);
    color: #7189b5;
    font-size: 22px;
    box-shadow: 0 4px 12px rgba(113,137,181,.08);
}

.infografia-formulario-intro h2 {
    margin: 0 0 7px;
    color: #536c98;
    font-family: Georgia, "Times New Roman", serif;
    font-size: 22px;
    font-weight: 700;
    line-height: 1.4;
}

.infografia-formulario-intro p {
    margin: 0;
    color: #748097;
    font-size: 12px;
    line-height: 1.8;
}

.infografia-formulario .form-group {
    margin-bottom: 23px;
}

.infografia-formulario .infografia-label {
    display: block;
    margin-bottom: 10px;
    color: #536c98;
    font-size: 13px;
    font-weight: 800;
}

.infografia-formulario .form-control.infografia-input {
    display: block;
    width: 100%;
    min-height: 49px;
    padding: 13px 15px;
    border: 1px solid #dce3ef;
    border-radius: 11px;
    background: #fbfcff;
    color: #4b586e;
    font-family: inherit;
    font-size: 13px;
    line-height: 1.8;
    box-shadow: none;
    transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
}

.infografia-formulario .form-control.infografia-input::placeholder {
    color: #a2adbf;
}

.infografia-formulario .form-control.infografia-input:focus {
    border-color: #a9b9df;
    background: #fff;
    box-shadow: 0 0 0 4px rgba(169,185,223,.18);
    outline: none;
}

.infografia-formulario textarea.form-control.infografia-input,
.infografia-formulario textarea.infografia-textarea {
    min-height: 130px;
    resize: vertical;
}

.infografia-formulario .form-group.has-error .form-control {
    border-color: #dfa3b1;
    background: #fffafb;
}

.infografia-formulario .help-block {
    margin-top: 7px;
    color: #bd7288;
    font-size: 11px;
    line-height: 1.8;
}

.infografia-formulario .hint-block {
    display: block;
    margin-top: 8px;
    color: #8792a5;
    font-size: 11px;
    line-height: 1.8;
}

.infografia-campo-archivo {
    padding: 20px;
    margin-bottom: 25px;
    border: 1px dashed #c9d5eb;
    border-radius: 15px;
    background: linear-gradient(135deg, #f4f7fe, #faf8ff);
}

.infografia-campo-archivo .form-group {
    margin-bottom: 0;
}

.infografia-formulario .infografia-input-archivo {
    display: block;
    width: 100%;
    padding: 13px;
    border: 1px solid #e0e5f0;
    border-radius: 10px;
    background: #fff;
    color: #64738b;
    font-family: inherit;
    font-size: 12px;
}

.infografia-formulario .infografia-input-archivo::file-selector-button {
    padding: 9px 13px;
    margin-right: 12px;
    border: 0;
    border-radius: 8px;
    background: #e8f0fc;
    color: #536c98;
    font-family: inherit;
    font-size: 11px;
    font-weight: 800;
    cursor: pointer;
    transition: background .2s ease;
}

.infografia-formulario .infografia-input-archivo::file-selector-button:hover {
    background: #dbe7fa;
}

.infografia-imagen-actual {
    padding: 20px;
    margin: 0 0 25px;
    border: 1px solid #dceee5;
    border-radius: 15px;
    background: linear-gradient(135deg, #f2faf6, #fbfdfb);
}

.infografia-imagen-actual .infografia-label {
    margin-bottom: 14px;
    color: #648d78;
}

.infografia-preview-actual {
    display: block;
    width: 100%;
    max-width: 390px;
    max-height: 280px;
    object-fit: contain;
    object-position: left center;
    padding: 8px;
    border: 1px solid #e0e9e3;
    border-radius: 12px;
    background: #fff;
}

.infografia-imagen-actual p {
    margin: 12px 0 0;
    color: #789083;
    font-size: 11px;
    line-height: 1.8;
}

.infografia-formulario-nota {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    padding: 16px 18px;
    margin: 25px 0;
    border: 1px solid #f0e3c6;
    border-left: 4px solid #e5ca8b;
    border-radius: 12px;
    background: linear-gradient(110deg, #fff8e8, #fffdf7);
    color: #8a795c;
    font-size: 12px;
    line-height: 1.9;
}

.infografia-formulario-nota i {
    margin-top: 3px;
    color: #c2a15e;
    font-size: 16px;
}

.infografia-formulario .alert-danger {
    padding: 17px 19px;
    margin: 22px 0;
    border: 1px solid #f0d3dc;
    border-left: 4px solid #d89aaa;
    border-radius: 12px;
    background: #fff5f7;
    color: #a45f73;
    font-size: 12px;
    line-height: 1.8;
}

.infografia-resumen-errores {
    margin: 10px 0 0;
    padding-left: 20px;
}

.infografia-resumen-errores li {
    margin-bottom: 5px;
}

.infografia-formulario-acciones {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 12px;
    flex-wrap: wrap;
    padding-top: 23px;
    margin-top: 28px;
    border-top: 1px solid #edf0f6;
}

.btn-infografia-guardar,
.btn-infografia-cancelar {
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

.btn-infografia-guardar {
    border-color: #8299c5;
    background: linear-gradient(135deg, #8299c5, #7189b5);
    color: #fff;
    box-shadow: 0 5px 13px rgba(113,137,181,.17);
}

.btn-infografia-guardar:hover,
.btn-infografia-guardar:focus {
    border-color: #647da8;
    background: linear-gradient(135deg, #7189b5, #607aa8);
    color: #fff;
    box-shadow: 0 7px 17px rgba(100,125,168,.22);
    transform: translateY(-1px);
}

.btn-infografia-cancelar {
    border-color: #e0e5ed;
    background: #f8f9fc;
    color: #68758b !important;
}

.btn-infografia-cancelar:hover {
    border-color: #d8d0ef;
    background: #f0edf9;
    color: #77669f !important;
}

@media (max-width: 600px) {
    .infografia-formulario {
        padding: 20px 16px;
        border-radius: 15px;
    }

    .infografia-formulario-intro {
        align-items: flex-start;
        gap: 12px;
        padding: 18px 15px;
        margin-bottom: 25px;
    }

    .infografia-formulario-icono {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        font-size: 18px;
    }

    .infografia-formulario-intro h2 {
        font-size: 19px;
    }

    .infografia-formulario-intro p {
        font-size: 11px;
    }

    .infografia-campo-archivo,
    .infografia-imagen-actual {
        padding: 15px;
    }

    .infografia-formulario-acciones {
        align-items: stretch;
        flex-direction: column-reverse;
    }

    .btn-infografia-guardar,
    .btn-infografia-cancelar {
        width: 100%;
        min-height: 46px;
    }
}
CSS);
?>

<?php $form = ActiveForm::begin([
    'id' => 'form-infografia',
    'options' => [
        'enctype' => 'multipart/form-data',
        'class' => 'formulario-infografia',
    ],
    'fieldConfig' => [
        'template' => "{label}\n{input}\n{hint}\n{error}",
        'labelOptions' => [
            'class' => 'infografia-label',
        ],
        'errorOptions' => [
            'class' => 'help-block',
        ],
        'inputOptions' => [
            'class' => 'infografia-input',
        ],
    ],
]); ?>

<div class="infografia-formulario">

    <div class="infografia-formulario-intro">
        <div class="infografia-formulario-icono">
            <i class="fa-solid fa-file-image"></i>
        </div>

        <div>
            <h2>Información de la infografía</h2>
            <p>
                Completa los campos para publicar el recurso en la biblioteca digital.
            </p>
        </div>
    </div>

    <?= $form->field($model, 'titulo')->textInput([
        'maxlength' => 200,
        'placeholder' => 'Ej. Principios éticos de la investigación',
        'autocomplete' => 'off',
    ]) ?>

    <?= $form->field($model, 'descripcion')->textarea([
        'rows' => 4,
        'placeholder' => 'Describe brevemente el contenido de la infografía...',
        'class' => 'infografia-input infografia-textarea',
    ]) ?>

    <div class="infografia-campo-archivo">
        <?= $form->field($model, 'imagenFile')->fileInput([
            'accept' => '.jpg,.jpeg,.png,.webp',
            'class' => 'infografia-input-archivo',
        ])->hint(
            'Formatos permitidos: JPG, JPEG, PNG y WebP. Tamaño máximo: 5 MB.'
        ) ?>
    </div>

    <?php if (!$model->isNewRecord && !empty($model->archivo)): ?>
        <div class="infografia-imagen-actual">
            <span class="infografia-label">Imagen actual</span>

            <?= Html::img(
                '@web/infografias/' . rawurlencode($model->archivo),
                [
                    'alt' => $model->titulo,
                    'class' => 'infografia-preview-actual',
                ]
            ) ?>

            <p>
                Si no seleccionas otra imagen, se conservará la actual.
            </p>
        </div>
    <?php endif; ?>

    <?= $form->field($model, 'enlace')->textInput([
        'maxlength' => 500,
        'type' => 'url',
        'placeholder' => 'https://ejemplo.com/recurso',
    ])->hint(
        'Enlace opcional a un documento, artículo o recurso relacionado.'
    ) ?>

    <div class="infografia-formulario-nota">
        <i class="fa-solid fa-circle-info"></i>

        <span>
            Verifica que el recurso publicado sea pertinente para la ética
            en la investigación científica.
        </span>
    </div>

    <?php if ($model->hasErrors()): ?>
        <div class="alert alert-danger">
            <strong>No se pudo guardar la infografía.</strong>
            Revisa los siguientes campos:

            <?= Html::errorSummary($model, [
                'header' => '',
                'class' => 'infografia-resumen-errores',
            ]) ?>
        </div>
    <?php endif; ?>

    <div class="infografia-formulario-acciones">

        <?= Html::submitButton(
            '<i class="fa-solid fa-floppy-disk"></i> ' .
            ($model->isNewRecord
                ? 'Guardar infografía'
                : 'Actualizar infografía'),
            [
                'class' => 'btn-infografia-guardar',
                'encode' => false,
                'name' => 'guardar-infografia',
                'value' => '1',
            ]
        ) ?>

        <?= Html::a(
            '<i class="fa-solid fa-arrow-left"></i> Cancelar',
            ['index'],
            [
                'class' => 'btn-infografia-cancelar',
                'encode' => false,
            ]
        ) ?>

    </div>

</div>

<?php ActiveForm::end(); ?>
