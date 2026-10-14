<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\CodigoEtica2 $model */

use yii\helpers\Html;

$this->title = $model->titulo ?: 'Detalle del artículo';

$this->registerCss(<<<'CSS'
.codigo-articulo-view {
    --ca-azul: #dceafb;
    --ca-azul-fuerte: #789dcc;
    --ca-lavanda: #eee7fa;
    --ca-rosa: #fbe8ef;
    --ca-verde: #e2f2e8;
    --ca-texto: #34445a;
    --ca-texto-suave: #78869a;
    --ca-borde: #e5eaf2;

    width: 100%;
    max-width: 100%;
    margin: 0 auto;
    padding: 30px clamp(16px, 3vw, 42px) 45px;
    color: var(--ca-texto);
    background: #f8faff;
    min-height: calc(100vh - 78px);
    font-family: inherit;
    box-sizing: border-box;
}

.codigo-articulo-view *,
.codigo-articulo-view *::before,
.codigo-articulo-view *::after {
    box-sizing: border-box;
}

.codigo-articulo-header {
    position: relative;
    display: flex;
    align-items: center;
    gap: 22px;
    padding: 30px 32px;
    overflow: hidden;
    background: linear-gradient(
        115deg,
        #e5efff 0%,
        #f0eafa 55%,
        #fcebf0 100%
    );
    border: 1px solid #e5e8f5;
    border-radius: 22px 22px 0 0;
}

.codigo-articulo-header::after {
    content: "";
    position: absolute;
    top: -85px;
    right: -45px;
    width: 190px;
    height: 190px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.35);
    pointer-events: none;
}

.codigo-articulo-header .icono {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 72px;
    height: 72px;
    flex-shrink: 0;
    color: #668dc1;
    background: rgba(255, 255, 255, 0.82);
    border: 1px solid rgba(255, 255, 255, 0.9);
    border-radius: 21px;
    font-size: 30px;
    box-shadow: 0 5px 15px rgba(103, 130, 175, 0.10);
}

.codigo-articulo-header > div:last-child {
    position: relative;
    z-index: 1;
}

.codigo-articulo-header h1 {
    margin: 0 0 8px;
    color: #30445f;
    font-size: clamp(22px, 2.5vw, 30px);
    font-weight: 750;
    line-height: 1.4;
    letter-spacing: -0.5px;
}

.codigo-articulo-header p {
    margin: 0;
    color: #718098;
    font-size: 14px;
    line-height: 1.7;
}

.codigo-articulo-contenido {
    padding: clamp(22px, 3vw, 38px);
    background: #ffffff;
    border: 1px solid var(--ca-borde);
    border-top: 0;
    border-radius: 0 0 22px 22px;
    box-shadow: 0 10px 30px rgba(77, 98, 133, 0.06);
}

.codigo-articulo-etiqueta {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    max-width: 100%;
    padding: 10px 15px;
    margin-bottom: 22px;
    color: #557cae;
    background: #eaf2ff;
    border: 1px solid #dce8fa;
    border-radius: 12px;
    font-size: 13px;
    font-weight: 700;
    overflow-wrap: anywhere;
}

.codigo-articulo-etiqueta i {
    color: #789dcc;
    font-size: 15px;
}

.codigo-articulo-titulo {
    margin: 0 0 24px;
    color: #34445a;
    font-size: clamp(23px, 2.5vw, 31px);
    font-weight: 750;
    line-height: 1.5;
    letter-spacing: -0.4px;
    overflow-wrap: anywhere;
}

.codigo-articulo-separador {
    width: 76px;
    height: 5px;
    margin-bottom: 28px;
    background: linear-gradient(90deg, #91b4e1, #c5b3e8, #e9b9cb);
    border-radius: 10px;
}

.codigo-articulo-texto {
    color: #526176;
    font-size: 16px;
    line-height: 2;
    overflow-wrap: anywhere;
    white-space: pre-line;
}

.codigo-articulo-acciones {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 14px;
    margin-top: 38px;
    padding-top: 25px;
    border-top: 1px solid #edf0f6;
}

.codigo-articulo-acciones .btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    min-height: 46px;
    padding: 12px 20px;
    border-radius: 12px;
    font-size: 14px;
    font-weight: 650;
    text-decoration: none;
    transition: background 0.2s ease, transform 0.2s ease,
                box-shadow 0.2s ease;
}

.codigo-articulo-acciones .btn:hover {
    transform: translateY(-2px);
}

.btn-volver-articulo {
    color: #5e6f86;
    background: #f0f3f9;
    border: 1px solid #e0e6f0;
}

.btn-volver-articulo:hover,
.btn-volver-articulo:focus {
    color: #40536c;
    background: #e5ebf5;
    border-color: #d6dfed;
}

.btn-editar-articulo {
    color: #ffffff;
    background: #789dcc;
    border: 1px solid #789dcc;
    box-shadow: 0 5px 13px rgba(120, 157, 204, 0.18);
}

.btn-editar-articulo:hover,
.btn-editar-articulo:focus {
    color: #ffffff;
    background: #668bbd;
    border-color: #668bbd;
    box-shadow: 0 7px 17px rgba(120, 157, 204, 0.25);
}

@media (max-width: 600px) {
    .codigo-articulo-view {
        padding: 20px 13px 30px;
    }

    .codigo-articulo-header {
        gap: 14px;
        align-items: flex-start;
        padding: 23px 17px;
        border-radius: 17px 17px 0 0;
    }

    .codigo-articulo-header .icono {
        width: 49px;
        height: 49px;
        border-radius: 14px;
        font-size: 22px;
    }

    .codigo-articulo-header h1 {
        font-size: 20px;
    }

    .codigo-articulo-header p {
        font-size: 12px;
    }

    .codigo-articulo-contenido {
        padding: 23px 18px;
        border-radius: 0 0 17px 17px;
    }

    .codigo-articulo-etiqueta {
        font-size: 12px;
    }

    .codigo-articulo-titulo {
        font-size: 23px;
    }

    .codigo-articulo-texto {
        font-size: 15px;
        line-height: 1.9;
    }

    .codigo-articulo-acciones {
        flex-direction: column;
        align-items: stretch;
        gap: 12px;
    }

    .codigo-articulo-acciones .btn {
        width: 100%;
    }
}

@media (prefers-reduced-motion: reduce) {
    .codigo-articulo-view *,
    .codigo-articulo-view *::before,
    .codigo-articulo-view *::after {
        transition: none !important;
    }
}
CSS);
?>

<div class="codigo-articulo-view">

    <div class="codigo-articulo-header">
        <div class="icono">
            <i class="fa-solid fa-scale-balanced"></i>
        </div>

        <div>
            <h1>Código de Ética en la Investigación Científica</h1>
            <p>
                Universidad Técnica Luis Vargas Torres de Esmeraldas
            </p>
        </div>
    </div>

    <div class="codigo-articulo-contenido">

        <div class="codigo-articulo-etiqueta">
            <i class="fa-solid fa-book-open"></i>
            <?= Html::encode($model->articulo) ?>
        </div>

        <h2 class="codigo-articulo-titulo">
            <?= Html::encode($model->titulo) ?>
        </h2>

        <div class="codigo-articulo-separador"></div>

        <div class="codigo-articulo-texto"><?= Html::encode($model->contenido) ?></div>

        <div class="codigo-articulo-acciones">

            <?= Html::a(
                '<i class="fa-solid fa-arrow-left"></i> Volver a los artículos',
                ['site/index'],
                [
                    'class' => 'btn btn-volver-articulo',
                    'encode' => false,
                ]
            ) ?>

            <?php if (
                !Yii::$app->user->isGuest
                && Yii::$app->user->identity->role === 'admin'
            ): ?>

                <?= Html::a(
                    '<i class="fa-solid fa-pen-to-square"></i> Editar artículo',
                    ['update', 'id' => $model->id],
                    [
                        'class' => 'btn btn-editar-articulo',
                        'encode' => false,
                    ]
                ) ?>

            <?php endif; ?>

        </div>

    </div>

</div>
