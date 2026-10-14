<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\Documento $model */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerCss(<<<'CSS'
.documento-form {
    --doc-azul: #789dcc;
    --doc-azul-claro: #eaf2ff;
    --doc-lavanda: #eee7fa;
    --doc-rosa: #fbe8ef;
    --doc-verde: #e2f2e8;
    --doc-texto: #34445a;
    --doc-texto-suave: #78869a;
    --doc-borde: #e3e9f2;

    width: 100%;
    max-width: 100%;
    margin: 0 auto;
    padding: 30px;
    color: var(--doc-texto);
    background: #ffffff;
    border: 1px solid var(--doc-borde);
    border-radius: 22px;
    box-shadow: 0 8px 28px rgba(77, 98, 133, 0.06);
    box-sizing: border-box;
}

.documento-form *,
.documento-form *::before,
.documento-form *::after {
    box-sizing: border-box;
}

.documento-form .form-group {
    margin-bottom: 24px;
}

.documento-form label {
    display: block;
    margin-bottom: 9px;
    color: #485a72;
    font-size: 14px;
    font-weight: 650;
}

.documento-form .form-control {
    display: block;
    width: 100%;
    min-height: 47px;
    padding: 12px 15px;
    color: #34445a;
    background: #fbfcff;
    border: 1px solid #dfe6f0;
    border-radius: 12px;
    box-shadow: none;
    font-size: 14px;
    line-height: 1.6;
    transition: border-color 0.2s ease, box-shadow 0.2s ease,
                background 0.2s ease;
}

.documento-form input.form-control::placeholder,
.documento-form textarea.form-control::placeholder {
    color: #a0aabc;
}

.documento-form .form-control:focus {
    background: #ffffff;
    border-color: #9bb9e5;
    outline: none;
    box-shadow: 0 0 0 4px rgba(177, 204, 241, 0.25);
}

.documento-form textarea.form-control {
    min-height: 130px;
    resize: vertical;
}

.documento-form input[type="file"].form-control {
    min-height: auto;
    padding: 10px;
    background: #f8faff;
    border: 1px dashed #b9cce7;
    cursor: pointer;
}

.documento-form input[type="file"]::file-selector-button {
    margin-right: 13px;
    padding: 9px 14px;
    color: #557cae;
    background: #eaf2ff;
    border: 0;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 650;
    cursor: pointer;
    transition: background 0.2s ease;
}

.documento-form input[type="file"]::file-selector-button:hover {
    background: #dceafb;
}

.documento-form .help-block,
.documento-form .invalid-feedback {
    margin-top: 7px;
    color: #cf7189;
    font-size: 12px;
}

.documento-form .has-error .form-control {
    border-color: #e7a7b8;
    background: #fffafb;
}

.documento-form .archivo-actual {
    display: flex;
    align-items: center;
    gap: 14px;
    margin: 6px 0 25px;
    padding: 17px;
    background: linear-gradient(110deg, #eef5ff, #f4effb);
    border: 1px solid #e2e8f5;
    border-radius: 14px;
    overflow-wrap: anywhere;
}

.documento-form .archivo-actual-icono {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 47px;
    height: 47px;
    color: #c7798d;
    background: #fbe8ef;
    border-radius: 13px;
    font-size: 21px;
}

.documento-form .archivo-actual-info {
    min-width: 0;
    flex: 1;
}

.documento-form .archivo-actual-titulo {
    margin: 0 0 5px;
    color: #526176;
    font-size: 12px;
    font-weight: 650;
}

.documento-form .archivo-actual a {
    color: #557cae;
    font-size: 14px;
    font-weight: 650;
    text-decoration: none;
    overflow-wrap: anywhere;
}

.documento-form .archivo-actual a:hover {
    color: #3f6598;
    text-decoration: underline;
}

.documento-form .form-group:last-child {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 12px;
    margin-top: 30px;
    margin-bottom: 0;
    padding-top: 23px;
    border-top: 1px solid #edf0f6;
}

.documento-form .btn-documento-guardar,
.documento-form .btn-documento-cancelar {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    min-height: 46px;
    padding: 12px 22px;
    border-radius: 12px;
    font-family: inherit;
    font-size: 14px;
    font-weight: 650;
    line-height: 1.4;
    text-decoration: none;
    cursor: pointer;
    transition: transform 0.2s ease, box-shadow 0.2s ease,
                background 0.2s ease;
}

.documento-form .btn-documento-guardar {
    color: #ffffff;
    background: #789dcc;
    border: 1px solid #789dcc;
    box-shadow: 0 5px 13px rgba(120, 157, 204, 0.20);
}

.documento-form .btn-documento-guardar:hover,
.documento-form .btn-documento-guardar:focus {
    color: #ffffff;
    background: #668bbd;
    border-color: #668bbd;
    box-shadow: 0 7px 17px rgba(120, 157, 204, 0.27);
    transform: translateY(-2px);
}

.documento-form .btn-documento-cancelar {
    color: #65758c;
    background: #f0f2f8;
    border: 1px solid #e2e7f0;
}

.documento-form .btn-documento-cancelar:hover,
.documento-form .btn-documento-cancelar:focus {
    color: #465872;
    background: #e6eaf3;
    transform: translateY(-2px);
}

@media (max-width: 600px) {
    .documento-form {
        padding: 21px 16px;
        border-radius: 17px;
    }

    .documento-form .form-group:last-child {
        flex-direction: column;
        align-items: stretch;
    }

    .documento-form .btn-documento-guardar,
    .documento-form .btn-documento-cancelar {
        width: 100%;
    }

    .documento-form .archivo-actual {
        align-items: flex-start;
        padding: 13px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .documento-form *,
    .documento-form *::before,
    .documento-form *::after {
        transition: none !important;
    }
}
CSS);
?>

<div class="documento-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>

    <?= $form->field($model, 'titulo')->textInput([
        'maxlength' => true,
        'placeholder' => 'Nombre del documento',
    ])->label('Título del documento') ?>

    <?= $form->field($model, 'descripcion')->textarea([
        'rows' => 4,
        'placeholder' => 'Describe el contenido y la finalidad del documento...',
    ])->label('Descripción') ?>

    <?= $form->field($model, 'archivo')->fileInput([
        'accept' => '.pdf,application/pdf',
    ])->label(
        $model->isNewRecord
            ? 'Seleccionar documento PDF'
            : 'Reemplazar PDF (opcional)'
    ) ?>

    <?php if (!$model->isNewRecord && $model->archivo): ?>
        <div class="archivo-actual">
            <div class="archivo-actual-icono">
                <i class="fa-solid fa-file-pdf"></i>
            </div>

            <div class="archivo-actual-info">
                <p class="archivo-actual-titulo">Archivo PDF actual</p>

                <?= Html::a(
                    Html::encode($model->archivo),
                    '@web/documentos/' . rawurlencode($model->archivo),
                    [
                        'target' => '_blank',
                        'rel' => 'noopener',
                    ]
                ) ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton(
            '<i class="fa-solid fa-floppy-disk"></i> Guardar documento',
            [
                'class' => 'btn-documento-guardar',
                'encode' => false,
            ]
        ) ?>

        <?= Html::a(
            '<i class="fa-solid fa-arrow-left"></i> Cancelar',
            ['index'],
            [
                'class' => 'btn-documento-cancelar',
                'encode' => false,
            ]
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
