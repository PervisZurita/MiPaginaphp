<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\Documento $model */

use yii\helpers\Html;

$this->title = 'Agregar documento';

$this->registerCssFile('@web/css/documentos.css');

$this->registerCss(<<<'CSS'
.documento-administracion {
    --da-azul: #dceafb;
    --da-azul-fuerte: #789dcc;
    --da-lavanda: #eee7fa;
    --da-rosa: #fbe8ef;
    --da-verde: #e2f2e8;
    --da-texto: #34445a;
    --da-texto-suave: #78869a;
    --da-borde: #e5eaf2;

    width: 100%;
    max-width: 100%;
    min-height: calc(100vh - 78px);
    margin: 0 auto;
    padding: 30px clamp(16px, 3vw, 42px) 45px;
    color: var(--da-texto);
    background: #f8faff;
    font-family: inherit;
    box-sizing: border-box;
}

.documento-administracion *,
.documento-administracion *::before,
.documento-administracion *::after {
    box-sizing: border-box;
}

.documento-administracion-header {
    position: relative;
    display: flex;
    align-items: center;
    gap: 22px;
    width: 100%;
    margin-bottom: 28px;
    padding: 28px 32px;
    overflow: hidden;
    background: linear-gradient(
        115deg,
        #e5efff 0%,
        #f0eafa 55%,
        #fcebf0 100%
    );
    border: 1px solid #e5e8f5;
    border-radius: 22px;
    box-shadow: 0 8px 25px rgba(104, 125, 165, 0.08);
}

.documento-administracion-header::after {
    content: "";
    position: absolute;
    top: -85px;
    right: -45px;
    width: 185px;
    height: 185px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.35);
    pointer-events: none;
}

.documento-administracion-icono {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 72px;
    height: 72px;
    color: #668dc1;
    background: rgba(255, 255, 255, 0.82);
    border: 1px solid rgba(255, 255, 255, 0.9);
    border-radius: 21px;
    font-size: 30px;
    box-shadow: 0 5px 15px rgba(103, 130, 175, 0.10);
}

.documento-administracion-texto {
    position: relative;
    z-index: 1;
}

.documento-administracion h1 {
    margin: 0 0 8px;
    color: #30445f;
    font-size: clamp(24px, 2.5vw, 32px);
    font-weight: 750;
    line-height: 1.3;
    letter-spacing: -0.5px;
}

.documento-administracion > .documento-administracion-header p {
    margin: 0;
    color: #718098;
    font-size: 14px;
    line-height: 1.7;
}

.documento-administracion-contenido {
    width: 100%;
    padding: 30px;
    background: #ffffff;
    border: 1px solid var(--da-borde);
    border-radius: 22px;
    box-shadow: 0 8px 28px rgba(77, 98, 133, 0.06);
}

.documento-administracion .documento-form {
    width: 100%;
    max-width: 100%;
    margin: 0;
    padding: 0;
    background: transparent;
    border: 0;
    border-radius: 0;
    box-shadow: none;
}

@media (max-width: 768px) {
    .documento-administracion {
        padding: 20px 14px 30px;
    }

    .documento-administracion-header {
        gap: 15px;
        padding: 22px 18px;
        margin-bottom: 20px;
        border-radius: 18px;
    }

    .documento-administracion-icono {
        width: 56px;
        height: 56px;
        border-radius: 16px;
        font-size: 24px;
    }

    .documento-administracion h1 {
        font-size: 23px;
    }

    .documento-administracion > .documento-administracion-header p {
        font-size: 13px;
    }

    .documento-administracion-contenido {
        padding: 20px 16px;
        border-radius: 17px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .documento-administracion *,
    .documento-administracion *::before,
    .documento-administracion *::after {
        transition: none !important;
    }
}
CSS);

?>

<div class="documento-administracion">

    <div class="documento-administracion-header">
        <div class="documento-administracion-icono">
            <i class="fa-solid fa-file-circle-plus"></i>
        </div>

        <div class="documento-administracion-texto">
            <h1>Agregar documento</h1>
            <p>Completa los datos y selecciona el archivo PDF.</p>
        </div>
    </div>

    <div class="documento-administracion-contenido">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>

</div>
