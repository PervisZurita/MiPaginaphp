<?php

declare(strict_types=1);

/** @var app\models\PreguntasFrecuentes $model */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\CategoriasFaq;

$categorias = ArrayHelper::map(
    CategoriasFaq::find()
        ->orderBy(['categoria' => SORT_ASC])
        ->all(),
    'id',
    'categoria'
);

$this->registerCss(<<<'CSS'
.faq-form {
    --form-primary: #819bd5;
    --form-primary-dark: #687fb9;
    --form-blue: #edf2ff;
    --form-lavender: #f0eaff;
    --form-pink: #fff0f3;
    --form-mint: #e5f6ee;
    --form-text: #46536d;
    --form-muted: #8791a5;
    --form-border: #e5e9f3;

    width: 100%;
    padding: 28px;
    color: var(--form-text);
    background: #fff;
    border: 1px solid var(--form-border);
    border-radius: 22px;
    box-shadow: 0 8px 28px rgba(75, 91, 132, .06);
}

.faq-form .faq-form-group {
    margin-bottom: 24px;
}

.faq-form .form-group {
    margin-bottom: 0;
}

.faq-form .control-label {
    display: block;
    margin-bottom: 10px;
    color: #53617c;
    font-size: 13px;
    font-weight: 750;
}

.faq-form .control-label::before {
    content: "";
    display: inline-block;
    width: 5px;
    height: 15px;
    margin-right: 9px;
    vertical-align: -3px;
    background: #b7c5ed;
    border-radius: 5px;
}

.faq-form .faq-select,
.faq-form .faq-input,
.faq-form .faq-textarea {
    display: block;
    width: 100%;
    max-width: 100%;
    padding: 13px 15px;
    color: #4e5b74;
    background-color: #fafbff;
    border: 1px solid #e3e8f4;
    border-radius: 12px;
    outline: none;
    font-family: inherit;
    font-size: 13px;
    line-height: 1.7;
    box-shadow: none;
    transition:
        border-color .2s ease,
        background .2s ease,
        box-shadow .2s ease;
}

.faq-form .faq-select {
    min-height: 49px;
    cursor: pointer;
}

.faq-form .faq-input {
    min-height: 49px;
}

.faq-form .faq-textarea {
    min-height: 175px;
    resize: vertical;
}

.faq-form .faq-select:hover,
.faq-form .faq-input:hover,
.faq-form .faq-textarea:hover {
    border-color: #cbd5ef;
    background: #fff;
}

.faq-form .faq-select:focus,
.faq-form .faq-input:focus,
.faq-form .faq-textarea:focus {
    color: #45536f;
    background: #fff;
    border-color: #a4b6e5;
    box-shadow: 0 0 0 4px rgba(164, 182, 229, .17);
}

.faq-form .faq-select::placeholder,
.faq-form .faq-input::placeholder,
.faq-form .faq-textarea::placeholder {
    color: #a6aebe;
    opacity: 1;
}

.faq-form .help-block {
    margin: 7px 0 0;
    color: #d4778b;
    font-size: 12px;
    line-height: 1.6;
}

.faq-form .has-error .faq-select,
.faq-form .has-error .faq-input,
.faq-form .has-error .faq-textarea {
    border-color: #edb4c0;
    background: #fffafb;
}

.faq-form .has-error .control-label {
    color: #bf7185;
}

.faq-form .has-success .faq-select,
.faq-form .has-success .faq-input,
.faq-form .has-success .faq-textarea {
    border-color: #b9dfcd;
}

.faq-form-actions {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
    margin-top: 30px;
    padding-top: 23px;
    border-top: 1px solid #eff0f6;
}

.faq-form .btn-faq-primary,
.faq-form .btn-faq-secondary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    min-height: 45px;
    padding: 12px 20px;
    border: 1px solid transparent;
    border-radius: 12px;
    font-family: inherit;
    font-size: 13px;
    font-weight: 750;
    text-decoration: none;
    cursor: pointer;
    transition:
        transform .2s ease,
        box-shadow .2s ease,
        background .2s ease;
}

.faq-form .btn-faq-primary {
    color: #fff;
    background: #819bd5;
    border-color: #819bd5;
    box-shadow: 0 5px 13px rgba(129, 155, 213, .2);
}

.faq-form .btn-faq-primary:hover,
.faq-form .btn-faq-primary:focus {
    color: #fff;
    background: #6d86c1;
    border-color: #6d86c1;
    box-shadow: 0 7px 17px rgba(109, 134, 193, .24);
    transform: translateY(-2px);
}

.faq-form .btn-faq-secondary {
    color: #74809a;
    background: #f4f5fa;
    border-color: #e6e9f2;
}

.faq-form .btn-faq-secondary:hover,
.faq-form .btn-faq-secondary:focus {
    color: #586782;
    background: #eaeefa;
    border-color: #dfe5f4;
    transform: translateY(-2px);
}

.faq-form .btn-faq-primary:focus-visible,
.faq-form .btn-faq-secondary:focus-visible {
    outline: 3px solid rgba(129, 155, 213, .3);
    outline-offset: 3px;
}

@media (max-width: 600px) {
    .faq-form {
        padding: 20px 15px;
        border-radius: 17px;
    }

    .faq-form .faq-form-group {
        margin-bottom: 20px;
    }

    .faq-form-actions {
        align-items: stretch;
        flex-direction: column;
        gap: 10px;
    }

    .faq-form .btn-faq-primary,
    .faq-form .btn-faq-secondary {
        width: 100%;
        min-height: 46px;
    }

    .faq-form .faq-textarea {
        min-height: 150px;
    }
}
CSS);
?>

<?php $form = ActiveForm::begin([
    'options' => [
        'class' => 'faq-form',
    ],
]); ?>

<div class="faq-form-group">
    <?= $form->field($model, 'categoria_id')->dropDownList(
        $categorias,
        [
            'prompt' => 'Selecciona una categoría',
            'class' => 'faq-select',
        ]
    ) ?>
</div>

<div class="faq-form-group">
    <?= $form->field($model, 'pregunta')->textInput([
        'maxlength' => true,
        'placeholder' => 'Escribe la pregunta frecuente',
        'class' => 'form-control faq-input',
    ]) ?>
</div>

<div class="faq-form-group">
    <?= $form->field($model, 'respuestas')->textarea([
        'rows' => 7,
        'placeholder' => 'Escribe una respuesta clara y completa...',
        'class' => 'form-control faq-textarea',
    ]) ?>
</div>

<div class="faq-form-actions">
    <?= Html::submitButton(
        '<i class="fas fa-floppy-disk"></i> Guardar pregunta',
        [
            'class' => 'btn-faq-primary',
            'encode' => false,
        ]
    ) ?>

    <?= Html::a(
        '<i class="fas fa-arrow-left"></i> Volver al listado',
        ['index'],
        [
            'class' => 'btn-faq-secondary',
        ]
    ) ?>
</div>

<?php ActiveForm::end(); ?>
