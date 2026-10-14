<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\CategoriasFaq[] $categorias */
/** @var string|int|null $categoriaId */


use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use yii\widgets\LinkPager;

$this->title = 'Preguntas frecuentes';
$this->registerCssFile('@web/css/paginacion.css');

$esAdmin = !Yii::$app->user->isGuest
    && Yii::$app->user->identity->role === 'admin';

$this->registerCss(<<<'CSS'
.faq-container {
    --faq-primary: #819bd5;
    --faq-primary-dark: #637fbf;
    --faq-blue: #e8efff;
    --faq-lavender: #eee8ff;
    --faq-pink: #ffebf0;
    --faq-mint: #e1f5ec;
    --faq-yellow: #fff4d9;
    --faq-text: #374151;
    --faq-muted: #8590a3;
    --faq-border: #e9eaf2;
    --faq-surface: #ffffff;

    width: 100%;
    max-width: none;
    margin: 0;
    padding: 28px clamp(14px, 2.5vw, 38px) 40px;
    color: var(--faq-text);
    font-family: inherit;
    box-sizing: border-box;
}

.faq-container *,
.faq-container *::before,
.faq-container *::after {
    box-sizing: border-box;
}

/* Encabezado */

.faq-header {
    position: relative;
    overflow: hidden;
    padding: 36px 30px;
    margin-bottom: 25px;
    text-align: center;
    border: 1px solid #e3e9fb;
    border-radius: 24px;
    background:
        radial-gradient(circle at 8% 15%, #fceaf1 0, transparent 28%),
        radial-gradient(circle at 92% 90%, #e3f5ed 0, transparent 30%),
        linear-gradient(135deg, #f0f4ff 0%, #f7f2ff 52%, #fff5f6 100%);
    box-shadow: 0 8px 28px rgba(112, 132, 177, .08);
}

.faq-header::before,
.faq-header::after {
    position: absolute;
    content: "";
    border-radius: 50%;
    pointer-events: none;
}

.faq-header::before {
    width: 125px;
    height: 125px;
    top: -65px;
    right: 8%;
    background: rgba(216, 206, 255, .25);
}

.faq-header::after {
    width: 85px;
    height: 85px;
    bottom: -45px;
    left: 8%;
    background: rgba(195, 235, 220, .4);
}

.faq-header-icon {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 68px;
    height: 68px;
    margin: 0 auto 16px;
    color: #6f86c5;
    background: #fff;
    border: 1px solid #e0e7fb;
    border-radius: 21px;
    box-shadow: 0 6px 18px rgba(111, 134, 197, .12);
    font-size: 28px;
}

.faq-header h1 {
    position: relative;
    z-index: 1;
    margin: 0 0 12px;
    color: #394766;
    font-size: clamp(25px, 3vw, 35px);
    font-weight: 800;
    letter-spacing: -.7px;
}

.faq-header p {
    position: relative;
    z-index: 1;
    max-width: 650px;
    margin: 0 auto;
    color: #7b8498;
    font-size: 15px;
    line-height: 1.8;
}

.faq-header-actions {
    position: relative;
    z-index: 1;
    margin-top: 22px;
}

/* Botones */

.faq-container .btn-faq-primary,
.faq-container .btn-faq-secondary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    min-height: 43px;
    padding: 11px 19px;
    border: 1px solid transparent;
    border-radius: 12px;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    cursor: pointer;
    transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
}

.faq-container .btn-faq-primary {
    color: #fff;
    background: #819bd5;
    box-shadow: 0 5px 12px rgba(129, 155, 213, .19);
}

.faq-container .btn-faq-primary:hover {
    color: #fff;
    background: #6d87c3;
    box-shadow: 0 7px 16px rgba(109, 135, 195, .23);
    transform: translateY(-2px);
}

.faq-container .btn-faq-secondary {
    color: #68758c;
    background: #f4f5fa;
    border-color: #e7e9f1;
}

.faq-container .btn-faq-secondary:hover {
    color: #53617b;
    background: #eceef7;
    transform: translateY(-2px);
}

/* Tarjetas */

.faq-filter-card,
.faq-table-card {
    width: 100%;
    min-width: 0;
    margin-bottom: 25px;
    overflow: hidden;
    background: var(--faq-surface);
    border: 1px solid var(--faq-border);
    border-radius: 20px;
    box-shadow: 0 7px 25px rgba(70, 85, 125, .055);
}

.faq-filter-card {
    padding: 23px 25px;
}

.faq-filter-title {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 20px;
    color: #4b5874;
    font-size: 16px;
    font-weight: 800;
}

.faq-filter-title i {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 35px;
    height: 35px;
    color: #788ec9;
    background: var(--faq-blue);
    border-radius: 11px;
    font-size: 15px;
}

.faq-filter-form {
    display: flex;
    align-items: flex-end;
    gap: 18px;
    flex-wrap: wrap;
}

.faq-filter-field {
    flex: 1 1 280px;
    min-width: 0;
}

.faq-filter-field label {
    display: block;
    margin-bottom: 9px;
    color: #59657b;
    font-size: 13px;
    font-weight: 700;
}

.faq-container .faq-select {
    display: block;
    width: 100%;
    min-height: 46px;
    padding: 10px 14px;
    color: #4c5870;
    background-color: #fafbff;
    border: 1px solid #e1e6f2;
    border-radius: 11px;
    outline: none;
    font-size: 13px;
    transition: border-color .2s ease, box-shadow .2s ease;
}

.faq-container .faq-select:focus {
    background: #fff;
    border-color: #a8b9e5;
    box-shadow: 0 0 0 4px rgba(168, 185, 229, .17);
}

.faq-filter-buttons {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
}

/* Encabezado de tabla */

.faq-table-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    padding: 24px 25px;
    border-bottom: 1px solid #eff0f6;
    background: linear-gradient(110deg, #fff 0%, #fafaff 100%);
}

.faq-table-heading h2 {
    margin: 0 0 7px;
    color: #3e4a65;
    font-size: 19px;
    font-weight: 800;
}

.faq-table-heading p {
    margin: 0;
    color: #8992a5;
    font-size: 13px;
    line-height: 1.6;
}

.faq-total {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    flex-shrink: 0;
    padding: 11px 15px;
    color: #6b80b8;
    background: var(--faq-blue);
    border: 1px solid #dfe7fc;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 800;
    white-space: nowrap;
}

.faq-total i {
    font-size: 15px;
}

/* Tabla */

.faq-table-card .table-responsive {
    width: 100%;
    margin: 0;
}

.faq-container .faq-table {
    width: 100%;
    min-width: 760px;
    margin: 0;
    border-collapse: separate;
    border-spacing: 0;
    table-layout: auto;
}

.faq-container .faq-table thead th {
    padding: 16px 19px;
    color: #77829a;
    background: #f8f9fd;
    border-top: 0;
    border-bottom: 1px solid #e9ecf4;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: .7px;
    text-transform: uppercase;
    white-space: nowrap;
}

.faq-container .faq-table tbody td {
    padding: 18px 19px;
    color: #626e83;
    background: #fff;
    border-top: 0;
    border-bottom: 1px solid #f0f1f6;
    font-size: 13px;
    line-height: 1.75;
    vertical-align: middle;
}

.faq-container .faq-table tbody tr:last-child td {
    border-bottom: 0;
}

.faq-container .faq-table tbody tr {
    transition: background .2s ease;
}

.faq-container .faq-table tbody tr:hover td {
    background: #fafaff;
}

.faq-question-cell {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    min-width: 190px;
    color: #48556f;
    font-weight: 700;
    line-height: 1.7;
}

.faq-question-cell > i {
    display: flex;
    align-items: center;
    justify-content: center;
    flex: 0 0 31px;
    width: 31px;
    height: 31px;
    margin-top: 1px;
    color: #7e94ce;
    background: #eaf0ff;
    border-radius: 10px;
    font-size: 13px;
}

.faq-category-tag {
    display: inline-flex;
    align-items: center;
    max-width: 200px;
    padding: 7px 11px;
    color: #8171b3;
    background: #f0eaff;
    border: 1px solid #e6dcff;
    border-radius: 9px;
    font-size: 11px;
    font-weight: 700;
    line-height: 1.5;
    overflow-wrap: anywhere;
}

.faq-answer-cell {
    min-width: 180px;
    max-width: 460px;
    color: #818a9d;
    line-height: 1.8;
    overflow-wrap: anywhere;
}

/* Acciones */

.faq-container .faq-actions {
    min-width: 125px;
    text-align: center;
    white-space: nowrap;
}

.faq-container .faq-action-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 35px;
    height: 35px;
    margin: 2px;
    border: 1px solid transparent;
    border-radius: 11px;
    text-decoration: none;
    font-size: 13px;
    transition: transform .2s ease, box-shadow .2s ease;
}

.faq-container .faq-action-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 10px rgba(60, 70, 100, .09);
}

.faq-container .faq-view-btn {
    color: #6c91c9;
    background: #eaf3ff;
    border-color: #dceaff;
}

.faq-container .faq-edit-btn {
    color: #9a80ca;
    background: #f1eaff;
    border-color: #e7dcff;
}

.faq-container .faq-delete-btn {
    color: #d77f91;
    background: #fff0f2;
    border-color: #ffe0e6;
}

/* Estado vacío */

.faq-container .faq-empty-cell {
    padding: 0 !important;
}

.faq-empty {
    padding: 55px 20px;
    text-align: center;
}

.faq-empty > i {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 65px;
    height: 65px;
    margin: 0 auto 18px;
    color: #9a8acb;
    background: #f0eaff;
    border-radius: 21px;
    font-size: 26px;
}

.faq-empty h3 {
    margin: 0 0 9px;
    color: #4b5873;
    font-size: 18px;
    font-weight: 800;
}

.faq-empty p {
    margin: 0;
    color: #929bad;
    font-size: 13px;
}

/* Pie y paginación */

.faq-pagination-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 18px;
    flex-wrap: wrap;
    padding: 20px 25px;
    background: #fcfcff;
    border-top: 1px solid #eff0f6;
}

.faq-pagination-footer .summary {
    margin: 0;
    color: #8992a5;
    font-size: 12px;
    line-height: 1.8;
}

.faq-pagination-footer .summary strong {
    color: #596782;
}

.faq-container .faq-pagination {
    display: flex;
    align-items: center;
    gap: 6px;
    flex-wrap: wrap;
    margin: 0;
    padding: 0;
    list-style: none;
}

.faq-container .faq-pagination .page-item {
    margin: 0;
}

.faq-container .faq-pagination .page-link {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 36px;
    height: 36px;
    padding: 0 10px;
    color: #73809b;
    background: #fff;
    border: 1px solid #e7eaf3;
    border-radius: 10px;
    text-decoration: none;
    font-size: 12px;
    font-weight: 700;
    box-shadow: none;
    transition: all .2s ease;
}

.faq-container .faq-pagination .page-link:hover {
    color: #637fbf;
    background: #edf2ff;
    border-color: #dce5fc;
}

.faq-container .faq-pagination .page-item.active .page-link {
    color: #fff;
    background: #819bd5;
    border-color: #819bd5;
    box-shadow: 0 4px 10px rgba(129, 155, 213, .2);
}

.faq-container .faq-pagination .page-item.disabled .page-link {
    color: #c3c8d3;
    background: #f7f8fb;
    cursor: not-allowed;
}

/* Alertas */

.faq-container .alert {
    margin-bottom: 20px;
    padding: 14px 18px;
    border-radius: 13px;
    font-size: 13px;
}

/* Adaptación a pantallas */

@media (min-width: 1600px) {
    .faq-container {
        padding-right: 40px;
        padding-left: 40px;
    }

    .faq-container .faq-table thead th,
    .faq-container .faq-table tbody td {
        padding-right: 23px;
        padding-left: 23px;
    }
}

@media (max-width: 900px) {
    .faq-container {
        padding: 20px 16px 30px;
    }

    .faq-header {
        padding: 30px 20px;
    }

    .faq-table-heading {
        align-items: flex-start;
        flex-direction: column;
        padding: 21px;
    }

    .faq-pagination-footer {
        align-items: flex-start;
        flex-direction: column;
        padding: 18px 21px;
    }
}

@media (max-width: 600px) {
    .faq-container {
        padding: 14px 10px 24px;
    }

    .faq-header {
        padding: 25px 16px;
        border-radius: 18px;
    }

    .faq-header-icon {
        width: 58px;
        height: 58px;
        border-radius: 17px;
        font-size: 24px;
    }

    .faq-header h1 {
        font-size: 25px;
    }

    .faq-header p {
        font-size: 13px;
    }

    .faq-filter-card {
        padding: 18px 15px;
    }

    .faq-filter-form,
    .faq-filter-buttons {
        width: 100%;
    }

    .faq-filter-buttons {
        align-items: stretch;
    }

    .faq-filter-buttons .btn-faq-primary,
    .faq-filter-buttons .btn-faq-secondary {
        flex: 1;
        padding: 10px 12px;
    }

    .faq-table-heading {
        padding: 19px 16px;
    }

    .faq-table-heading h2 {
        font-size: 17px;
    }

    .faq-container .faq-table thead th,
    .faq-container .faq-table tbody td {
        padding: 14px 12px;
    }

    .faq-pagination-footer {
        padding: 17px 15px;
    }

    .faq-container .faq-pagination {
        gap: 4px;
    }

    .faq-container .faq-pagination .page-link {
        min-width: 32px;
        height: 32px;
        padding: 0 8px;
    }
}
CSS);

?>

<div class="faq-container">

    <div class="faq-header">
        <div class="faq-header-icon">
            <i class="fas fa-circle-question"></i>
        </div>

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            Encuentra respuestas a las preguntas más importantes
            sobre ética e investigación científica.
        </p>

        <?php if ($esAdmin): ?>
            <div class="faq-header-actions">
                <?= Html::a(
                    '<i class="fas fa-plus"></i> Nueva pregunta',
                    ['create'],
                    ['class' => 'btn-faq-primary']
                ) ?>
            </div>
        <?php endif; ?>
    </div>

    <?php foreach (Yii::$app->session->getAllFlashes() as $tipo => $mensaje): ?>
        <div class="alert alert-<?= Html::encode($tipo) ?>">
            <?= Html::encode($mensaje) ?>
        </div>
    <?php endforeach; ?>

    <div class="faq-filter-card">

        <div class="faq-filter-title">
            <i class="fas fa-filter"></i>
            Filtrar preguntas
        </div>

        <?= Html::beginForm(['index'], 'get', [
            'class' => 'faq-filter-form',
        ]) ?>

            <div class="faq-filter-field">
                <?= Html::label('Categoría', 'categoria_id') ?>

                <?= Html::dropDownList(
                    'categoria_id',
                    $categoriaId,
                    ArrayHelper::map(
                        $categorias,
                        'id',
                        'categoria'
                    ),
                    [
                        'id' => 'categoria_id',
                        'class' => 'faq-select',
                        'prompt' => 'Todas las categorías',
                    ]
                ) ?>
            </div>

            <div class="faq-filter-buttons">
                <?= Html::submitButton(
                    '<i class="fas fa-search"></i> Buscar',
                    ['class' => 'btn-faq-primary']
                ) ?>

                <?= Html::a(
                    '<i class="fas fa-rotate-left"></i> Limpiar',
                    ['index'],
                    ['class' => 'btn-faq-secondary']
                ) ?>
            </div>

        <?= Html::endForm() ?>

    </div>

    <div class="faq-table-card">

        <div class="faq-table-heading">
            <div>
                <h2>Listado de preguntas</h2>
                <p>
                    <?= $esAdmin
                        ? 'Consulta, crea, modifica o elimina preguntas frecuentes.'
                        : 'Consulta las preguntas frecuentes y sus respuestas.' ?>
                </p>
            </div>

            <div class="faq-total">
                <i class="fas fa-list-check"></i>
                <?= (int) $dataProvider->getTotalCount() ?>
                registros
            </div>
        </div>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'tableOptions' => [
                'class' => 'table faq-table',
            ],
            'options' => [
                'class' => 'table-responsive',
            ],
            'layout' => "{items}\n<div class=\"faq-pagination-footer\">{summary}\n{pager}</div>",
            'summary' => 'Mostrando <strong>{begin}-{end}</strong> de <strong>{totalCount}</strong> preguntas',
            'summaryOptions' => [
                'class' => 'summary',
            ],
            'emptyText' => '<div class="faq-empty">
                <i class="fas fa-inbox"></i>
                <h3>No hay preguntas disponibles</h3>
                <p>Prueba con otra categoría.</p>
            </div>',
            'emptyTextOptions' => [
                'class' => 'faq-empty-cell',
            ],
            'columns' => [
                [
                    'attribute' => 'pregunta',
                    'label' => 'Pregunta',
                    'format' => 'raw',
                    'value' => static function ($model) {
                        return '<div class="faq-question-cell">'
                            . '<i class="fas fa-circle-question"></i>'
                            . '<span>'
                            . Html::encode($model->pregunta)
                            . '</span></div>';
                    },
                ],
                [
                    'label' => 'Categoría',
                    'format' => 'raw',
                    'value' => static function ($model) {
                        return Html::tag(
                            'span',
                            Html::encode(
                                $model->categoria->categoria ?? 'Sin categoría'
                            ),
                            ['class' => 'faq-category-tag']
                        );
                    },
                ],
                [
                    'label' => 'Respuesta',
                    'format' => 'raw',
                    'value' => static function ($model) {
                        $respuesta = strip_tags(
                            (string) $model->respuestas
                        );

                        $respuesta = mb_strlen($respuesta) > 100
                            ? mb_substr($respuesta, 0, 100) . '...'
                            : $respuesta;

                        return Html::tag(
                            'div',
                            Html::encode($respuesta),
                            ['class' => 'faq-answer-cell']
                        );
                    },
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Acciones',
                    'template' => $esAdmin
                        ? '{view} {update} {delete}'
                        : '{view}',
                    'contentOptions' => [
                        'class' => 'faq-actions',
                    ],
                    'buttons' => [
                        'view' => static function ($url, $model) {
                            return Html::a(
                                '<i class="fas fa-eye"></i>',
                                $url,
                                [
                                    'class' => 'faq-action-btn faq-view-btn',
                                    'title' => 'Ver pregunta',
                                    'aria-label' => 'Ver pregunta',
                                ]
                            );
                        },
                        'update' => static function ($url, $model) {
                            return Html::a(
                                '<i class="fas fa-pen"></i>',
                                $url,
                                [
                                    'class' => 'faq-action-btn faq-edit-btn',
                                    'title' => 'Editar pregunta',
                                    'aria-label' => 'Editar pregunta',
                                ]
                            );
                        },
                        'delete' => static function ($url, $model) {
                            return Html::a(
                                '<i class="fas fa-trash"></i>',
                                $url,
                                [
                                    'class' => 'faq-action-btn faq-delete-btn',
                                    'title' => 'Eliminar pregunta',
                                    'aria-label' => 'Eliminar pregunta',
                                    'data-confirm' => '¿Deseas eliminar esta pregunta frecuente?',
                                    'data-method' => 'post',
                                ]
                            );
                        },
                    ],
                ],
            ],
            'pager' => [
                'class' => LinkPager::class,
                'maxButtonCount' => 5,
                'firstPageLabel' => '<i class="fas fa-angles-left"></i>',
                'lastPageLabel' => '<i class="fas fa-angles-right"></i>',
                'prevPageLabel' => '<i class="fas fa-chevron-left"></i>',
                'nextPageLabel' => '<i class="fas fa-chevron-right"></i>',
                'options' => [
                    'class' => 'pagination faq-pagination',
                ],
                'linkOptions' => [
                    'class' => 'page-link',
                ],
                'disabledListItemSubTagOptions' => [
                    'class' => 'page-link',
                ],
                'activePageCssClass' => 'active',
                'disabledPageCssClass' => 'disabled',
                'prevPageCssClass' => 'page-item',
                'nextPageCssClass' => 'page-item',
                'firstPageCssClass' => 'page-item',
                'lastPageCssClass' => 'page-item',
                'pageCssClass' => 'page-item',
            ],
        ]) ?>

    </div>

</div>
