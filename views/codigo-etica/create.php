<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\CodigoEtica2 $model */
/** @var app\models\Categorias2[] $categorias */

use yii\helpers\Html;

$this->title = 'Agregar artículo';

$this->registerCssFile('@web/css/codigo-etica.css');

$this->registerCss(<<<'CSS'
.administrar-codigo {
    --ac-azul: #dceafb;
    --ac-azul-fuerte: #739bc9;
    --ac-lavanda: #eee7fa;
    --ac-verde: #e0f1e8;
    --ac-rosa: #fbe5ec;
    --ac-texto: #34445a;
    --ac-texto-suave: #78869a;
    --ac-borde: #e6eaf1;

    width: 100%;
    max-width: 100%;
    margin: 0 auto;
    padding: 30px clamp(16px, 3vw, 42px) 45px;
    box-sizing: border-box;
    color: var(--ac-texto);
    background: #f8faff;
    min-height: calc(100vh - 78px);
    font-family: inherit;
}

.administrar-codigo *,
.administrar-codigo *::before,
.administrar-codigo *::after {
    box-sizing: border-box;
}

.administrar-codigo-header {
    position: relative;
    display: flex;
    align-items: center;
    gap: 22px;
    width: 100%;
    margin: 0 auto 30px;
    padding: 28px 32px;
    overflow: hidden;
    background: linear-gradient(115deg, #e5efff 0%, #f0eafa 55%, #fcebf0 100%);
    border: 1px solid #e5e8f5;
    border-radius: 22px;
    box-shadow: 0 8px 25px rgba(104, 125, 165, 0.08);
}

.administrar-codigo-header::after {
    content: "";
    position: absolute;
    width: 180px;
    height: 180px;
    right: -45px;
    top: -85px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.35);
    pointer-events: none;
}

.administrar-codigo-header > i {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 72px;
    height: 72px;
    color: #668dc1;
    background: rgba(255, 255, 255, 0.78);
    border: 1px solid rgba(255, 255, 255, 0.9);
    border-radius: 21px;
    font-size: 30px;
    box-shadow: 0 5px 15px rgba(103, 130, 175, 0.10);
}

.administrar-codigo-header > div {
    position: relative;
    z-index: 1;
}

.administrar-codigo-header h1 {
    margin: 0 0 8px;
    color: #30445f;
    font-size: clamp(24px, 2.5vw, 32px);
    font-weight: 750;
    line-height: 1.25;
    letter-spacing: -0.6px;
}

.administrar-codigo-header p {
    margin: 0;
    color: #718098;
    font-size: 15px;
    line-height: 1.7;
}

.administrar-codigo > form,
.administrar-codigo > .codigo-etica-form,
.administrar-codigo > .formulario-codigo {
    width: 100%;
}

.administrar-codigo .codigo-etica-form {
    width: 100%;
    max-width: 100%;
    margin: 0 auto;
    padding: 30px;
    background: #ffffff;
    border: 1px solid var(--ac-borde);
    border-radius: 22px;
    box-shadow: 0 8px 28px rgba(77, 98, 133, 0.06);
}

.administrar-codigo .form-group {
    margin-bottom: 22px;
}

.administrar-codigo label {
    display: block;
    margin-bottom: 9px;
    color: #485a72;
    font-size: 14px;
    font-weight: 650;
}

.administrar-codigo .form-control,
.administrar-codigo select,
.administrar-codigo textarea,
.administrar-codigo input[type="text"],
.administrar-codigo input[type="number"] {
    width: 100%;
    min-height: 46px;
    padding: 12px 15px;
    color: #34445a;
    background: #fbfcff;
    border: 1px solid #dfe6f0;
    border-radius: 12px;
    outline: none;
    box-shadow: none;
    font-size: 14px;
    transition: border-color 0.2s ease, box-shadow 0.2s ease,
                background 0.2s ease;
}

.administrar-codigo textarea {
    min-height: 170px;
    resize: vertical;
    line-height: 1.7;
}

.administrar-codigo .form-control:focus,
.administrar-codigo select:focus,
.administrar-codigo textarea:focus,
.administrar-codigo input:focus {
    background: #ffffff;
    border-color: #9bb9e5;
    box-shadow: 0 0 0 4px rgba(177, 204, 241, 0.25);
}

.administrar-codigo .help-block,
.administrar-codigo .invalid-feedback {
    margin-top: 7px;
    color: #cf7189;
    font-size: 12px;
}

.administrar-codigo .has-error .form-control {
    border-color: #e7a7b8;
    background: #fffafb;
}

.administrar-codigo .btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    min-height: 45px;
    padding: 11px 22px;
    border-radius: 12px;
    font-size: 14px;
    font-weight: 650;
    text-decoration: none;
    transition: transform 0.2s ease, box-shadow 0.2s ease,
                background 0.2s ease;
}

.administrar-codigo .btn:hover {
    transform: translateY(-2px);
}

.administrar-codigo .btn-primary {
    color: #ffffff;
    background: #789dcc;
    border: 1px solid #789dcc;
    box-shadow: 0 5px 13px rgba(120, 157, 204, 0.20);
}

.administrar-codigo .btn-primary:hover,
.administrar-codigo .btn-primary:focus {
    color: #ffffff;
    background: #668bbd;
    border-color: #668bbd;
    box-shadow: 0 7px 17px rgba(120, 157, 204, 0.28);
}

.administrar-codigo .btn-secondary,
.administrar-codigo .btn-default {
    color: #65758c;
    background: #f0f2f8;
    border: 1px solid #e2e7f0;
}

.administrar-codigo .btn-secondary:hover,
.administrar-codigo .btn-default:hover {
    color: #465872;
    background: #e6eaf3;
}

.administrar-codigo .alert {
    padding: 15px 18px;
    margin-bottom: 22px;
    border-radius: 13px;
    font-size: 14px;
}

.administrar-codigo .alert-success {
    color: #477761;
    background: #e8f5ed;
    border: 1px solid #d4eadc;
}

.administrar-codigo .alert-danger {
    color: #a85f72;
    background: #fff0f3;
    border: 1px solid #f5d7df;
}

@media (max-width: 768px) {
    .administrar-codigo {
        padding: 20px 14px 30px;
    }

    .administrar-codigo-header {
        gap: 15px;
        padding: 22px 18px;
        margin-bottom: 22px;
        border-radius: 18px;
    }

    .administrar-codigo-header > i {
        width: 56px;
        height: 56px;
        border-radius: 16px;
        font-size: 24px;
    }

    .administrar-codigo-header h1 {
        font-size: 23px;
    }

    .administrar-codigo-header p {
        font-size: 13px;
    }

    .administrar-codigo .codigo-etica-form {
        padding: 20px 16px;
        border-radius: 17px;
    }

    .administrar-codigo .btn {
        width: 100%;
    }
}

@media (prefers-reduced-motion: reduce) {
    .administrar-codigo *,
    .administrar-codigo *::before,
    .administrar-codigo *::after {
        transition: none !important;
    }
}
CSS);

?>

<div class="administrar-codigo">

    <div class="administrar-codigo-header">
        <i class="fa-solid fa-file-circle-plus"></i>

        <div>
            <h1>Agregar artículo</h1>
            <p>Registra un nuevo artículo en el Código de Ética.</p>
        </div>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'categorias' => $categorias,
    ]) ?>

</div>
