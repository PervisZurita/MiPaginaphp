<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\PreguntasFrecuentes $model */
use yii\helpers\Html;

$this->title = 'Detalle de pregunta frecuente';

$this->registerCssFile('@web/css/paginacion.css');

$categoria = $model->categoria
    ? $model->categoria->categoria
    : 'Sin categoría';

$esAdmin = !Yii::$app->user->isGuest
    && Yii::$app->user->identity->role === 'admin';

$this->registerCss(<<<'CSS'
.faq-detail-page {
    --detail-primary: #819bd5;
    --detail-text: #46536d;
    --detail-muted: #8791a5;
    --detail-border: #e7eaf3;

    width: 100%;
    max-width: none;
    margin: 0;
    padding: 28px clamp(14px, 2.5vw, 38px) 40px;
    color: var(--detail-text);
    box-sizing: border-box;
}

.faq-detail-page *,
.faq-detail-page *::before,
.faq-detail-page *::after {
    box-sizing: border-box;
}

/* Encabezado */

.faq-detail-page .faq-header {
    position: relative;
    overflow: hidden;
    padding: 36px 25px;
    margin-bottom: 25px;
    text-align: center;
    background:
        radial-gradient(circle at 8% 15%, #fceaf1 0, transparent 29%),
        radial-gradient(circle at 92% 90%, #e2f5ed 0, transparent 30%),
        linear-gradient(135deg, #edf3ff 0%, #f3efff 55%, #fff3f5 100%);
    border: 1px solid #e3e9fa;
    border-radius: 24px;
    box-shadow: 0 8px 28px rgba(112, 132, 177, .08);
}

.faq-detail-page .faq-header-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 68px;
    height: 68px;
    margin: 0 auto 17px;
    color: #7a91ce;
    background: #fff;
    border: 1px solid #e0e7fb;
    border-radius: 21px;
    box-shadow: 0 6px 18px rgba(111, 134, 197, .12);
    font-size: 27px;
}

.faq-detail-page .faq-header h1 {
    margin: 0 0 12px;
    color: #394766;
    font-size: clamp(25px, 3vw, 34px);
    font-weight: 800;
    letter-spacing: -.6px;
}

.faq-detail-page .faq-header p {
    max-width: 650px;
    margin: 0 auto;
    color: #7b8498;
    font-size: 14px;
    line-height: 1.8;
}

/* Tarjeta principal */

.faq-detail-page .faq-detail-card {
    width: 100%;
    overflow: hidden;
    background: #fff;
    border: 1px solid var(--detail-border);
    border-radius: 21px;
    box-shadow: 0 8px 28px rgba(75, 91, 132, .055);
}

/* Cabecera de información */

.faq-detail-page .faq-table-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 18px;
    padding: 23px 28px;
    background: linear-gradient(110deg, #fff 0%, #fafaff 100%);
    border-bottom: 1px solid #eff0f6;
}

.faq-detail-page .faq-heading-content {
    display: flex;
    align-items: center;
    gap: 14px;
    min-width: 0;
}

.faq-detail-page .faq-heading-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex: 0 0 46px;
    width: 46px;
    height: 46px;
    color: #8296ce;
    background: #eaf0ff;
    border: 1px solid #e0e8fc;
    border-radius: 14px;
    font-size: 18px;
}

.faq-detail-page .faq-table-heading h2 {
    margin: 0 0 7px;
    color: #46536d;
    font-size: 18px;
    font-weight: 800;
}

.faq-detail-page .faq-table-heading p {
    margin: 0;
    color: #8992a5;
    font-size: 13px;
    line-height: 1.7;
}

.faq-detail-page .faq-detail-id {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    padding: 10px 14px;
    color: #7e70b0;
    background: #f0eaff;
    border: 1px solid #e5dcfb;
    border-radius: 11px;
    font-size: 12px;
    font-weight: 800;
}

/* Contenido */

.faq-detail-page .faq-detail-content {
    display: flex;
    flex-direction: column;
    gap: 21px;
    padding: 28px;
}

.faq-detail-page .faq-detail-item {
    padding: 21px 23px;
    background: #fcfcff;
    border: 1px solid #eceef6;
    border-radius: 16px;
    transition: border-color .2s ease, box-shadow .2s ease;
}

.faq-detail-page .faq-detail-item:hover {
    border-color: #dfe5f5;
    box-shadow: 0 4px 15px rgba(75, 91, 132, .04);
}

.faq-detail-page .faq-detail-label {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 15px;
    color: #68758f;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: .45px;
    text-transform: uppercase;
}

.faq-detail-page .faq-detail-label i {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 34px;
    height: 34px;
    border-radius: 11px;
    font-size: 14px;
}

.faq-detail-page .faq-detail-item:nth-child(1) .faq-detail-label i {
    color: #7d8fca;
    background: #eaf0ff;
}

.faq-detail-page .faq-detail-item:nth-child(2) .faq-detail-label i {
    color: #987fc4;
    background: #f0eaff;
}

.faq-detail-page .faq-detail-item:nth-child(3) .faq-detail-label i {
    color: #69a58b;
    background: #e5f6ee;
}

/* Categoría */

.faq-detail-page .faq-detail-category {
    display: inline-flex;
    align-items: center;
    max-width: 100%;
    padding: 10px 15px;
    color: #8171b3;
    background: #f0eaff;
    border: 1px solid #e5dcfb;
    border-radius: 11px;
    font-size: 13px;
    font-weight: 750;
    line-height: 1.7;
    overflow-wrap: anywhere;
}

/* Pregunta */

.faq-detail-page .faq-detail-question {
    margin: 0;
    padding: 17px 19px;
    color: #46536d;
    background: #edf3ff;
    border-left: 4px solid #9aafe0;
    border-radius: 0 12px 12px 0;
    font-size: 17px;
    font-weight: 750;
    line-height: 1.9;
    overflow-wrap: anywhere;
}

/* Respuesta */

.faq-detail-page .faq-detail-answer {
    padding: 20px 21px;
    color: #667187;
    background: #f0faf5;
    border: 1px solid #e0f1e8;
    border-radius: 13px;
    font-size: 14px;
    line-height: 2;
    overflow-wrap: anywhere;
    word-break: normal;
}

/* Acciones */

.faq-detail-page .faq-form-actions {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-wrap: wrap;
    padding: 22px 28px;
    background: #fcfcff;
    border-top: 1px solid #eff0f6;
}

.faq-detail-page .btn-faq-primary,
.faq-detail-page .btn-faq-secondary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    min-height: 45px;
    padding: 12px 20px;
    border: 1px solid transparent;
    border-radius: 12px;
    font-size: 13px;
    font-weight: 750;
    text-decoration: none;
    cursor: pointer;
    transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
}

.faq-detail-page .btn-faq-primary {
    color: #fff;
    background: #819bd5;
    border-color: #819bd5;
    box-shadow: 0 5px 13px rgba(129, 155, 213, .2);
}

.faq-detail-page .btn-faq-primary:hover {
    color: #fff;
    background: #6d86c1;
    box-shadow: 0 7px 17px rgba(109, 134, 193, .22);
    transform: translateY(-2px);
}

.faq-detail-page .btn-faq-secondary {
    color: #74809a;
    background: #f4f5fa;
    border-color: #e6e9f2;
}

.faq-detail-page .btn-faq-secondary:hover {
    color: #586782;
    background: #eaeefa;
    border-color: #dfe5f4;
    transform: translateY(-2px);
}

.faq-detail-page .btn-faq-primary:focus-visible,
.faq-detail-page .btn-faq-secondary:focus-visible {
    outline: 3px solid rgba(129, 155, 213, .3);
    outline-offset: 3px;
}

/* Responsive */

@media (max-width: 900px) {
    .faq-detail-page {
        padding: 20px 16px 30px;
    }

    .faq-detail-page .faq-header {
        padding: 30px 20px;
    }

    .faq-detail-page .faq-table-heading {
        padding: 21px;
    }

    .faq-detail-page .faq-detail-content {
        padding: 21px;
    }

    .faq-detail-page .faq-form-actions {
        padding: 20px 21px;
    }
}

@media (max-width: 600px) {
    .faq-detail-page {
        padding: 14px 10px 24px;
    }

    .faq-detail-page .faq-header {
        padding: 25px 16px;
        border-radius: 18px;
    }

    .faq-detail-page .faq-header-icon {
        width: 58px;
        height: 58px;
        border-radius: 17px;
        font-size: 24px;
    }

    .faq-detail-page .faq-header h1 {
        font-size: 25px;
    }

    .faq-detail-page .faq-header p {
        font-size: 13px;
    }

    .faq-detail-page .faq-detail-card {
        border-radius: 17px;
    }

    .faq-detail-page .faq-table-heading {
        align-items: flex-start;
        flex-direction: column;
        padding: 18px 15px;
    }

    .faq-detail-page .faq-heading-icon {
        flex-basis: 40px;
        width: 40px;
        height: 40px;
    }

    .faq-detail-page .faq-table-heading h2 {
        font-size: 16px;
    }

    .faq-detail-page .faq-detail-content {
        gap: 15px;
        padding: 15px;
    }

    .faq-detail-page .faq-detail-item {
        padding: 17px 14px;
    }

    .faq-detail-page .faq-detail-question {
        padding: 14px;
        font-size: 15px;
    }

    .faq-detail-page .faq-detail-answer {
        padding: 15px;
        font-size: 13px;
    }

    .faq-detail-page .faq-form-actions {
        align-items: stretch;
        flex-direction: column;
        padding: 17px 15px;
    }

    .faq-detail-page .btn-faq-primary,
    .faq-detail-page .btn-faq-secondary {
        width: 100%;
        min-height: 45px;
    }
}
CSS);

?>

<div class="faq-detail-page">

    <div class="faq-header">
        <div class="faq-header-icon">
            <i class="fas fa-circle-question"></i>
        </div>

        <h1>Detalle de pregunta frecuente</h1>

        <p>
            Consulta la información completa de esta pregunta frecuente
            sobre ética e investigación científica.
        </p>
    </div>

    <div class="faq-table-card faq-detail-card">

        <div class="faq-table-heading">

            <div class="faq-heading-content">
                <div class="faq-heading-icon">
                    <i class="fas fa-file-lines"></i>
                </div>

                <div>
                    <h2>Información registrada</h2>
                    <p>Detalles de la pregunta seleccionada.</p>
                </div>
            </div>

            <span class="faq-detail-id">
                <i class="fas fa-hashtag"></i>
                ID: <?= Html::encode($model->id) ?>
            </span>

        </div>

        <div class="faq-detail-content">

            <div class="faq-detail-item">
                <span class="faq-detail-label">
                    <i class="fas fa-layer-group"></i>
                    Categoría
                </span>

                <div class="faq-detail-category">
                    <?= Html::encode($categoria) ?>
                </div>
            </div>

            <div class="faq-detail-item">
                <span class="faq-detail-label">
                    <i class="fas fa-circle-question"></i>
                    Pregunta
                </span>

                <h3 class="faq-detail-question">
                    <?= Html::encode($model->pregunta) ?>
                </h3>
            </div>

            <div class="faq-detail-item">
                <span class="faq-detail-label">
                    <i class="fas fa-comment-dots"></i>
                    Respuesta
                </span>

                <div class="faq-detail-answer">
                    <?= nl2br(Html::encode($model->respuestas)) ?>
                </div>
            </div>

        </div>

        <div class="faq-form-actions">

            <?php if ($esAdmin): ?>
                <?= Html::a(
                    '<i class="fas fa-pen-to-square"></i> Actualizar',
                    ['update', 'id' => $model->id],
                    ['class' => 'btn-faq-primary']
                ) ?>
            <?php endif; ?>

            <?= Html::a(
                '<i class="fas fa-arrow-left"></i> Volver al listado',
                ['index'],
                ['class' => 'btn-faq-secondary']
            ) ?>

        </div>

    </div>

</div>
