<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\CodigoEtica2 $model */
/** @var app\models\Categorias2[] $categorias */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

$this->registerCss(<<<'CSS'
.codigo-etica-form {
    --form-primary: #718bb2;
    --form-primary-dark: #536e94;
    --form-blue: #e5effb;
    --form-lavender: #ece8f8;
    --form-mint: #e4f2e9;
    --form-pink: #f8e9ed;
    --form-text: #465970;
    --form-muted: #8593a5;
    --form-border: #e2e8f0;
    --form-background: #ffffff;

    width: calc(100% - 48px);
    max-width: 1100px;
    margin: 30px auto;
    padding: 36px;
    color: var(--form-text);
    background: var(--form-background);
    border: 1px solid var(--form-border);
    border-radius: 22px;
    box-shadow: 0 10px 32px rgba(111, 132, 165, .09);
    font-family: "Segoe UI", Arial, sans-serif;
    box-sizing: border-box;
}

.codigo-etica-form *,
.codigo-etica-form *::before,
.codigo-etica-form *::after {
    box-sizing: border-box;
}

.codigo-etica-form .form-header {
    position: relative;
    display: flex;
    align-items: center;
    gap: 20px;
    overflow: hidden;
    margin: 0 0 30px;
    padding: 26px;
    border: 1px solid #e0e6f2;
    border-radius: 18px;
    background: linear-gradient(
        120deg,
        #e4eefb 0%,
        #eee9f8 58%,
        #f8ebef 100%
    );
}

.codigo-etica-form .form-header::after {
    position: absolute;
    content: "";
    width: 170px;
    height: 170px;
    top: -100px;
    right: -35px;
    border: 1px solid rgba(113, 139, 178, .17);
    border-radius: 50%;
    box-shadow: 0 0 0 22px rgba(255, 255, 255, .12),
                0 0 0 45px rgba(255, 255, 255, .10);
    pointer-events: none;
}

.codigo-etica-form .form-icon {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    flex: 0 0 66px;
    width: 66px;
    height: 66px;
    border: 1px solid rgba(113, 139, 178, .20);
    border-radius: 18px;
    background: rgba(255, 255, 255, .75);
    color: #718bb2;
    font-size: 27px;
}

.codigo-etica-form .form-header > div:last-child {
    position: relative;
    z-index: 1;
    min-width: 0;
}

.codigo-etica-form .form-header h2 {
    margin: 0 0 9px;
    color: #4c617c;
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(22px, 2.5vw, 28px);
    font-weight: 700;
    line-height: 1.3;
}

.codigo-etica-form .form-header p {
    margin: 0;
    color: #74849a;
    font-size: 13px;
    line-height: 1.8;
}

.codigo-etica-form .control-label {
    display: block;
    margin-bottom: 9px;
    color: #52647b;
    font-size: 13px;
    font-weight: 700;
}

.codigo-etica-form .form-group {
    margin-bottom: 23px;
}

.codigo-etica-form .form-control,
.codigo-etica-form .form-select {
    display: block;
    width: 100%;
    min-height: 49px;
    padding: 13px 15px;
    color: #485b72;
    background-color: #fbfcff;
    border: 1px solid #dfe6f0;
    border-radius: 11px;
    font-family: "Segoe UI", Arial, sans-serif;
    font-size: 14px;
    box-shadow: none;
    outline: none;
    transition: border-color .2s ease,
                box-shadow .2s ease,
                background .2s ease;
}

.codigo-etica-form .form-control::placeholder {
    color: #a2adbd;
    opacity: 1;
}

.codigo-etica-form .form-control:hover,
.codigo-etica-form .form-select:hover {
    border-color: #c6d5e9;
    background-color: #ffffff;
}

.codigo-etica-form .form-control:focus,
.codigo-etica-form .form-select:focus {
    color: #465970;
    background-color: #ffffff;
    border-color: #9eb7da;
    box-shadow: 0 0 0 4px rgba(167, 191, 220, .20);
    outline: none;
}

.codigo-etica-form textarea.form-control {
    min-height: 280px;
    padding: 16px;
    line-height: 1.9;
    resize: vertical;
}

.codigo-etica-form select.form-select {
    cursor: pointer;
}

.codigo-etica-form .help-block,
.codigo-etica-form .invalid-feedback {
    display: block;
    margin-top: 7px;
    color: #b86f7d;
    font-size: 12px;
    line-height: 1.5;
}

.codigo-etica-form .has-error .form-control,
.codigo-etica-form .has-error .form-select,
.codigo-etica-form .is-invalid {
    border-color: #e3aab5;
    background-color: #fffafb;
}

.codigo-etica-form .has-error .form-control:focus,
.codigo-etica-form .has-error .form-select:focus {
    box-shadow: 0 0 0 4px rgba(227, 170, 181, .17);
}

.codigo-etica-form .formulario-acciones {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    flex-wrap: wrap;
    gap: 13px;
    margin-top: 30px;
    padding-top: 24px;
    border-top: 1px solid #e8edf4;
}

.codigo-etica-form .btn-guardar-articulo,
.codigo-etica-form .btn-cancelar-articulo {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    min-height: 47px;
    padding: 12px 23px;
    border-radius: 11px;
    font-family: "Segoe UI", Arial, sans-serif;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none !important;
    transition: transform .2s ease,
                background .2s ease,
                border-color .2s ease,
                box-shadow .2s ease;
}

.codigo-etica-form .btn-guardar-articulo {
    color: #506b91;
    background: #dfeafa;
    border: 1px solid #ccdbef;
    cursor: pointer;
    box-shadow: 0 4px 10px rgba(113, 139, 178, .08);
}

.codigo-etica-form .btn-guardar-articulo:hover {
    color: #405a7c;
    background: #d1e0f5;
    border-color: #b9cce7;
    transform: translateY(-2px);
    box-shadow: 0 7px 16px rgba(113, 139, 178, .14);
}

.codigo-etica-form .btn-cancelar-articulo {
    color: #748196;
    background: #f7f8fc;
    border: 1px solid #e1e6ef;
}

.codigo-etica-form .btn-cancelar-articulo:hover {
    color: #586982;
    background: #eeeff8;
    border-color: #d8dced;
    transform: translateY(-2px);
}

.codigo-etica-form .btn-guardar-articulo:focus-visible,
.codigo-etica-form .btn-cancelar-articulo:focus-visible {
    outline: 3px solid rgba(143, 163, 201, .35);
    outline-offset: 3px;
}

@media (min-width: 1400px) {
    .codigo-etica-form {
        max-width: 1200px;
        padding: 42px;
    }
}

@media (max-width: 768px) {
    .codigo-etica-form {
        width: calc(100% - 30px);
        margin: 22px auto;
        padding: 24px;
        border-radius: 18px;
    }

    .codigo-etica-form .form-header {
        gap: 15px;
        padding: 21px;
    }

    .codigo-etica-form .form-icon {
        flex-basis: 55px;
        width: 55px;
        height: 55px;
        border-radius: 15px;
        font-size: 23px;
    }

    .codigo-etica-form .form-header h2 {
        font-size: 23px;
    }

    .codigo-etica-form textarea.form-control {
        min-height: 240px;
    }
}

@media (max-width: 480px) {
    .codigo-etica-form {
        width: calc(100% - 20px);
        margin: 15px auto;
        padding: 17px 14px;
        border-radius: 15px;
    }

    .codigo-etica-form .form-header {
        align-items: flex-start;
        flex-direction: column;
        gap: 13px;
        padding: 19px 16px;
    }

    .codigo-etica-form .form-header h2 {
        font-size: 22px;
    }

    .codigo-etica-form .form-header p {
        font-size: 12px;
    }

    .codigo-etica-form .form-group {
        margin-bottom: 19px;
    }

    .codigo-etica-form .form-control,
    .codigo-etica-form .form-select {
        font-size: 13px;
    }

    .codigo-etica-form textarea.form-control {
        min-height: 220px;
    }

    .codigo-etica-form .formulario-acciones {
        flex-direction: column-reverse;
        align-items: stretch;
        gap: 10px;
    }

    .codigo-etica-form .btn-guardar-articulo,
    .codigo-etica-form .btn-cancelar-articulo {
        width: 100%;
    }
}

@media (prefers-reduced-motion: reduce) {
    .codigo-etica-form *,
    .codigo-etica-form *::before,
    .codigo-etica-form *::after {
        transition: none !important;
    }
}
CSS);
?>

<div class="codigo-etica-form">

    <div class="form-header">
        <div class="form-icon">
            <i class="fa-solid fa-scale-balanced" aria-hidden="true"></i>
        </div>

        <div>
            <h2>
                <?= $model->isNewRecord
                    ? 'Registrar artículo'
                    : 'Editar artículo' ?>
            </h2>

            <p>
                Código de Ética en la Investigación Científica.
                <?= Html::encode(
                    'Universidad Técnica Luis Vargas Torres de Esmeraldas'
                ) ?>
            </p>
        </div>
    </div>

    <?php $form = ActiveForm::begin([
        'id' => 'formulario-codigo-etica',
        'options' => ['autocomplete' => 'off'],
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            'labelOptions' => ['class' => 'control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'categoria_id')->dropDownList(
        ArrayHelper::map($categorias, 'id', 'nombre'),
        [
            'prompt' => 'Selecciona un capítulo',
            'class' => 'form-select',
        ]
    ) ?>

    <?= $form->field($model, 'articulo')->textInput([
        'maxlength' => true,
        'placeholder' => 'Ejemplo: Artículo 1',
    ]) ?>

    <?= $form->field($model, 'titulo')->textInput([
        'maxlength' => true,
        'placeholder' => 'Escribe el título del artículo',
    ]) ?>

    <?= $form->field($model, 'contenido')->textarea([
        'rows' => 12,
        'placeholder' => 'Escribe aquí el contenido completo del artículo...',
    ]) ?>

    <div class="formulario-acciones">

        <?= Html::submitButton(
            '<i class="fa-solid fa-floppy-disk" aria-hidden="true"></i> ' .
            ($model->isNewRecord
                ? 'Guardar artículo'
                : 'Actualizar artículo'),
            [
                'class' => 'btn-guardar-articulo',
                'encode' => false,
            ]
        ) ?>

        <?= Html::a(
            '<i class="fa-solid fa-xmark" aria-hidden="true"></i> Cancelar',
            ['/site/index'],
            [
                'class' => 'btn-cancelar-articulo',
                'encode' => false,
            ]
        ) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
