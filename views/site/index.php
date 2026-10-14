<?php

declare(strict_types=1);

/** @var yii\web\View $this */

use app\models\Categorias2;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Código de Ética de la Investigación Científica';

$this->params['meta_description'] =
    'Consulta los capítulos y artículos del Código de Ética de la Investigación Científica.';

$this->params['meta_keywords'] =
    'código de ética, investigación científica, principios éticos, UTLVTE';

$this->registerCssFile('@web/css/codigo-etica.css');

$this->registerJsFile('@web/js/codigo-etica.js', [
    'depends' => [\yii\web\YiiAsset::class],
]);

$this->registerCss(<<<'CSS'
:root {
    --pastel-fondo: #faf8fd;
    --pastel-blanco: #ffffff;
    --pastel-lila: #eee7fa;
    --pastel-lila-medio: #dcd0f2;
    --pastel-lila-fuerte: #8e7bb8;
    --pastel-azul: #e6f1fb;
    --pastel-azul-medio: #cfe3f5;
    --pastel-azul-fuerte: #6d94b8;
    --pastel-verde: #e5f4eb;
    --pastel-verde-medio: #cce8d7;
    --pastel-verde-fuerte: #61977a;
    --pastel-rosa: #fbeaf0;
    --pastel-rosa-medio: #f2d4df;
    --pastel-rosa-fuerte: #bd8197;
    --pastel-crema: #fff4e3;
    --pastel-texto: #48546a;
    --pastel-texto-secundario: #818b9d;
    --pastel-borde: #ece7f2;
    --pastel-sombra: 0 8px 25px rgba(116, 99, 148, .08);
}

/* Fondo general */

.site-index {
    min-height: 100vh;
    color: var(--pastel-texto);
    background:
        radial-gradient(circle at 5% 5%, rgba(238, 231, 250, .65), transparent 24%),
        radial-gradient(circle at 95% 25%, rgba(230, 241, 251, .65), transparent 25%),
        var(--pastel-fondo);
}
```css
/* Aumentar ligeramente el tamaño del logo */
.codigo-hero-image {
    width: 190px;
    min-width: 190px;
    height: 190px;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
}

.codigo-hero-img {
    width: 100%;
    height: 100%;
    max-width: 100%;
    object-fit: contain;
    border-radius: 18px;
}

/* Ajuste para móviles */
@media (max-width: 768px) {
    .codigo-hero-image {
        width: 155px;
        min-width: 155px;
        height: 155px;
    }
}


/* Encabezado principal */

.codigo-hero {
    background: linear-gradient(
        135deg,
        #ffffff 0%,
        #f0eafb 48%,
        #e8f3fc 100%
    );
    border: 1px solid #eee8f6;
    box-shadow: var(--pastel-sombra);
}

.codigo-hero-badge {
    color: #8270ad;
    background: rgba(255, 255, 255, .88);
    border: 1px solid #e8def7;
}

.badge-icon {
    color: var(--pastel-lila-fuerte);
    background: var(--pastel-lila);
}

.codigo-hero-line {
    background: linear-gradient(
        90deg,
        #b7a4df,
        #d5c9ee,
        transparent
    );
}

.codigo-hero h1 {
    color: var(--pastel-texto);
}

.codigo-hero h1 span {
    color: var(--pastel-lila-fuerte);
}

.codigo-hero-text > p {
    color: var(--pastel-texto-secundario);
}

.codigo-hero-image {
    background: #f0eafb;
    border-color: #e5dcf5;
}

.codigo-hero-img {
    border-radius: 18px;
}

.codigo-hero-info {
    color: #66758b;
}

.hero-info-item i {
    color: var(--pastel-lila-fuerte);
}

.hero-info-divider {
    background: #ded6eb;
}

/* Introducción */

.codigo-intro {
    color: var(--pastel-texto);
    background: rgba(255, 255, 255, .96);
    border: 1px solid var(--pastel-borde);
    box-shadow: var(--pastel-sombra);
}

.codigo-intro-icon {
    color: var(--pastel-lila-fuerte);
    background: var(--pastel-lila);
}

.section-label {
    color: var(--pastel-lila-fuerte);
}

.codigo-intro h2 {
    color: var(--pastel-texto);
}

.codigo-intro-line {
    background: linear-gradient(
        90deg,
        #c8b8e9,
        #e5dcf4,
        transparent
    );
}

.codigo-intro > p {
    color: var(--pastel-texto-secundario);
}

/* Características informativas */

.codigo-intro-features {
    gap: 15px;
}

.intro-feature {
    background: #fcfbfe;
    border: 1px solid #f0ecf6;
    border-radius: 14px;
    transition: background .25s ease, border-color .25s ease;
}

.intro-feature:hover {
    background: #f7f3fd;
    border-color: #ded3f3;
}

.intro-feature:nth-child(1) .intro-feature-icon {
    color: var(--pastel-lila-fuerte);
    background: var(--pastel-lila);
}

.intro-feature:nth-child(2) .intro-feature-icon {
    color: var(--pastel-azul-fuerte);
    background: var(--pastel-azul);
}

.intro-feature:nth-child(3) .intro-feature-icon {
    color: var(--pastel-verde-fuerte);
    background: var(--pastel-verde);
}

.intro-feature strong {
    color: var(--pastel-texto);
}

.intro-feature span {
    color: var(--pastel-texto-secundario);
}

/* Sección de capítulos */

.codigo-capitulos {
    color: var(--pastel-texto);
    background: rgba(255, 255, 255, .96);
    border: 1px solid var(--pastel-borde);
    box-shadow: var(--pastel-sombra);
}

.capitulos-encabezado h2 {
    color: var(--pastel-texto);
}

.capitulos-encabezado p {
    color: var(--pastel-texto-secundario);
}

/* Botón para agregar artículos */

.btn-agregar-articulo {
    color: #fff;
    background: linear-gradient(135deg, #a99ad1, #9180bd);
    border: 1px solid #a99ad1;
    border-radius: 11px;
    box-shadow: 0 5px 14px rgba(142, 123, 184, .15);
    transition: background .25s ease, box-shadow .25s ease;
}

.btn-agregar-articulo:hover {
    color: #fff;
    background: linear-gradient(135deg, #9584c2, #8270ad);
    box-shadow: 0 8px 18px rgba(142, 123, 184, .22);
}

/* Tarjetas de capítulos */

.capitulo {
    overflow: hidden;
    background: #fff;
    border: 1px solid #ece7f3;
    border-radius: 15px;
    box-shadow: 0 3px 12px rgba(116, 99, 148, .035);
    transition: border-color .25s ease, box-shadow .25s ease;
}

.capitulo:hover {
    border-color: #dcd0f2;
    box-shadow: 0 7px 20px rgba(116, 99, 148, .08);
}

.capitulo:nth-child(3n + 1) .capitulo-btn {
    background: #f7f3fd;
}

.capitulo:nth-child(3n + 2) .capitulo-btn {
    background: #f1f7fd;
}

.capitulo:nth-child(3n) .capitulo-btn {
    background: #f1f8f3;
}

.capitulo-btn {
    color: var(--pastel-texto);
    border: 1px solid transparent;
    transition: background .25s ease;
}

.capitulo-btn:hover {
    filter: brightness(.985);
}

.capitulo-titulo strong {
    color: var(--pastel-lila-fuerte);
}

.capitulo:nth-child(3n + 2) .capitulo-titulo strong {
    color: var(--pastel-azul-fuerte);
}

.capitulo:nth-child(3n) .capitulo-titulo strong {
    color: var(--pastel-verde-fuerte);
}

.capitulo-titulo small {
    color: var(--pastel-texto);
}

.flecha {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: var(--pastel-lila-fuerte);
    background: #eae2f8;
    border-radius: 10px;
}

/* Contenido de los capítulos */

.capitulo-contenido {
    color: var(--pastel-texto);
    background: #fff;
    border-top: 1px solid #f0ecf6;
}

/* Artículos */

.articulo-etica {
    color: var(--pastel-texto);
    background: #fcfbfe;
    border: 1px solid #eee9f5;
    border-radius: 13px;
    box-shadow: 0 3px 10px rgba(116, 99, 148, .025);
    transition: background .25s ease, border-color .25s ease;
}

.articulo-etica:nth-child(3n + 1) {
    background: #fcfaff;
}

.articulo-etica:nth-child(3n + 2) {
    background: #f9fcff;
}

.articulo-etica:nth-child(3n) {
    background: #f9fdf9;
}

.articulo-etica:hover {
    background: #fff;
    border-color: #ded5f0;
}

.articulo-etica-encabezado {
    border-bottom-color: #eee9f5;
}

.articulo-etica-icono {
    color: var(--pastel-lila-fuerte);
    background: var(--pastel-lila);
}

.articulo-numero {
    color: var(--pastel-lila-fuerte);
    background: #eee7fa;
    border-radius: 8px;
}

.articulo-etica-titulo h3 {
    color: var(--pastel-texto);
}

.articulo-etica-contenido {
    color: #69758a;
    line-height: 1.85;
}

/* Botones de edición y eliminación */

.btn-editar-articulo {
    color: #6385a7;
    background: var(--pastel-azul);
    border: 1px solid #d8e8f7;
    border-radius: 9px;
    transition: background .25s ease, color .25s ease;
}

.btn-editar-articulo:hover {
    color: #4e7195;
    background: #d8eafb;
}

.btn-eliminar-articulo {
    color: #b77790;
    background: var(--pastel-rosa);
    border: 1px solid #f2dbe4;
    border-radius: 9px;
    transition: background .25s ease, color .25s ease;
}

.btn-eliminar-articulo:hover {
    color: #a35e79;
    background: #f7dce6;
}

/* Categorías sin artículos */

.articulos-vacios {
    color: var(--pastel-texto-secundario);
    background: #faf8fd;
    border: 1px dashed #dcd3ed;
    border-radius: 13px;
}

.articulos-vacios > i {
    color: var(--pastel-lila-fuerte);
}

.articulos-vacios h3 {
    color: var(--pastel-texto);
}

.articulos-vacios p {
    color: var(--pastel-texto-secundario);
}

/* Formularios y botones */

.form-eliminar-articulo {
    display: inline-block;
    margin: 0;
}

.codigo-capitulos a,
.codigo-capitulos button {
    transition:
        background-color .25s ease,
        color .25s ease,
        border-color .25s ease;
}

/* Adaptación a pantallas pequeñas */

@media (max-width: 768px) {
    .codigo-hero {
        background: linear-gradient(
            145deg,
            #fff,
            #f0eafb 65%,
            #e8f3fc
        );
    }

    .codigo-intro,
    .codigo-capitulos {
        background: #fff;
    }

    .capitulo-btn {
        border-radius: 12px;
    }
}
CSS);

$capitulosRomanos = [
    'I', 'II', 'III', 'IV', 'V',
    'VI', 'VII', 'VIII', 'IX',
];

$esAdmin = !Yii::$app->user->isGuest
    && Yii::$app->user->identity->role === 'admin';

$categorias = Categorias2::find()
    ->with([
        'codigoEticas' => function ($query) {
            $query->orderBy(['id' => SORT_ASC]);
        },
    ])
    ->orderBy(['id' => SORT_ASC])
    ->all();

?>

<div class="site-index">

    <section class="codigo-hero">

        <div class="codigo-hero-content">

            <div class="codigo-hero-main">

                <div class="codigo-hero-image">
                    <?= Html::img('@web/images/logo.png', [
                        'alt' => 'Código de Ética en la Investigación Científica',
                        'class' => 'codigo-hero-img',
                    ]) ?>
                </div>

                <div class="codigo-hero-text">

                    <div class="codigo-hero-badge">
                        <span class="badge-icon">
                            <i class="fa-solid fa-scale-balanced"></i>
                        </span>

                        <span>CÓDIGO DE ÉTICA EN LA INVESTIGACIÓN</span>
                    </div>

                    <div class="codigo-hero-line"></div>

                    <h1>
                        Ética de la
                        <span>Investigación Científica</span>
                    </h1>

                    <p>
                        Principios, valores y normas éticas que orientan la
                        investigación científica y fortalecen su compromiso
                        con la sociedad.
                    </p>

                    <div class="codigo-hero-info">

                        <div class="hero-info-item">
                            <i class="fa-solid fa-building-columns"></i>

                            <div>
                                <strong>Universidad Técnica</strong>
                                <small>Luis Vargas Torres de Esmeraldas</small>
                            </div>
                        </div>

                        <div class="hero-info-divider"></div>

                        <div class="hero-info-item">
                            <i class="fa-solid fa-book-open"></i>

                            <div>
                                <strong>Documento institucional</strong>
                                <small>Investigación científica</small>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section class="codigo-section">

        <div class="codigo-container">

            <div class="codigo-intro">

                <div class="codigo-intro-header">

                    <div class="codigo-intro-icon">
                        <i class="fa-solid fa-book-open-reader"></i>
                    </div>

                    <div>
                        <span class="section-label">
                            UNIVERSIDAD TÉCNICA “LUIS VARGAS TORRES”
                        </span>

                        <h2>
                            Código de Ética de la Investigación Científica
                        </h2>
                    </div>

                </div>

                <div class="codigo-intro-line"></div>

                <p>
                    Conoce los capítulos, artículos, principios y
                    disposiciones que orientan la actividad científica
                    dentro de la Universidad Técnica “Luis Vargas Torres”
                    de Esmeraldas.
                </p>

                <div class="codigo-intro-features">

                    <div class="intro-feature">
                        <div class="intro-feature-icon">
                            <i class="fa-solid fa-scale-balanced"></i>
                        </div>

                        <div>
                            <strong>Principios éticos</strong>
                            <span>
                                Orientaciones para una investigación responsable.
                            </span>
                        </div>
                    </div>

                    <div class="intro-feature">
                        <div class="intro-feature-icon">
                            <i class="fa-solid fa-file-lines"></i>
                        </div>

                        <div>
                            <strong>Normativa</strong>
                            <span>
                                Artículos y disposiciones institucionales.
                            </span>
                        </div>
                    </div>

                    <div class="intro-feature">
                        <div class="intro-feature-icon">
                            <i class="fa-solid fa-users"></i>
                        </div>

                        <div>
                            <strong>Comunidad científica</strong>
                            <span>
                                Compromiso con la sociedad y la investigación.
                            </span>
                        </div>
                    </div>

                </div>

            </div>

            <div class="codigo-capitulos">

                <div class="capitulos-encabezado">

                    <h2>Capítulos y artículos</h2>

                    <p>
                        Selecciona un capítulo para consultar sus artículos
                        y disposiciones.
                    </p>

                    <?php if ($esAdmin): ?>

                        <div class="acciones-codigo">

                            <?= Html::a(
                                '<i class="fa-solid fa-plus"></i> Agregar artículo',
                                ['/codigo-etica/create'],
                                [
                                    'class' => 'btn-agregar-articulo',
                                    'encode' => false,
                                ]
                            ) ?>

                        </div>

                    <?php endif; ?>

                </div>

                <?php if (!empty($categorias)): ?>

                    <?php foreach ($categorias as $indice => $categoria): ?>

                        <div class="capitulo">

                            <button
                                type="button"
                                class="capitulo-btn"
                                onclick="toggleCapitulo(this)"
                                aria-expanded="false"
                            >

                                <span class="capitulo-titulo">

                                    <strong>
                                        CAPÍTULO
                                        <?= Html::encode(
                                            $capitulosRomanos[$indice]
                                                ?? (string) ($indice + 1)
                                        ) ?>
                                    </strong>

                                    <small>
                                        <?= Html::encode($categoria->nombre) ?>
                                    </small>

                                </span>

                                <span class="flecha">+</span>

                            </button>

                            <div class="capitulo-contenido">

                                <?php if (!empty($categoria->codigoEticas)): ?>

                                    <?php foreach ($categoria->codigoEticas as $articulo): ?>

                                        <article class="articulo-etica">

                                            <div class="articulo-etica-encabezado">

                                                <span class="articulo-etica-icono">
                                                    <i class="fa-solid fa-file-lines"></i>
                                                </span>

                                                <div class="articulo-etica-titulo">

                                                    <span class="articulo-numero">
                                                        <?= Html::encode(
                                                            $articulo->articulo
                                                                ?: 'Artículo ' . $articulo->id
                                                        ) ?>
                                                    </span>

                                                    <h3>
                                                        <?= Html::encode($articulo->titulo) ?>
                                                    </h3>

                                                </div>

                                            </div>

                                            <div class="articulo-etica-contenido">
                                                <?= nl2br(
                                                    Html::encode($articulo->contenido)
                                                ) ?>
                                            </div>

                                            <?php if ($esAdmin): ?>

                                                <div class="acciones-articulo">

                                                    <?= Html::a(
                                                        '<i class="fa-solid fa-pen-to-square"></i> Editar',
                                                        [
                                                            '/codigo-etica/update',
                                                            'id' => $articulo->id,
                                                        ],
                                                        [
                                                            'class' => 'btn-editar-articulo',
                                                            'encode' => false,
                                                        ]
                                                    ) ?>

                                                    <?= Html::beginForm(
                                                        Url::to([
                                                            '/codigo-etica/delete',
                                                            'id' => $articulo->id,
                                                        ]),
                                                        'post',
                                                        [
                                                            'class' => 'form-eliminar-articulo',
                                                            'style' => 'display:inline-block; margin:0;',
                                                        ]
                                                    ) ?>

                                                    <?= Html::submitButton(
                                                        '<i class="fa-solid fa-trash"></i> Eliminar',
                                                        [
                                                            'class' => 'btn-eliminar-articulo',
                                                            'encode' => false,
                                                        ]
                                                    ) ?>

                                                    <?= Html::endForm() ?>

                                                </div>

                                            <?php endif; ?>

                                        </article>

                                    <?php endforeach; ?>

                                <?php else: ?>

                                    <div class="articulos-vacios">

                                        <i class="fa-regular fa-folder-open"></i>

                                        <p>
                                            Esta categoría todavía no tiene
                                            artículos registrados.
                                        </p>

                                        <?php if ($esAdmin): ?>

                                            <?= Html::a(
                                                '<i class="fa-solid fa-plus"></i> Agregar artículo a esta categoría',
                                                [
                                                    '/codigo-etica/create',
                                                    'categoria_id' => $categoria->id,
                                                ],
                                                [
                                                    'class' => 'btn-agregar-articulo',
                                                    'encode' => false,
                                                ]
                                            ) ?>

                                        <?php endif; ?>

                                    </div>

                                <?php endif; ?>

                            </div>

                        </div>

                    <?php endforeach; ?>

                <?php else: ?>

                    <div class="articulos-vacios">

                        <i class="fa-regular fa-folder-open"></i>

                        <h3>No hay capítulos registrados</h3>

                        <p>
                            Registra las categorías para mostrar los capítulos
                            del Código de Ética.
                        </p>

                    </div>

                <?php endif; ?>

            </div>

        </div>

    </section>

</div>