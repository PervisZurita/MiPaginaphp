<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\Infografia[] $infografias */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Infografías del Código de Ética';

$esAdmin = !Yii::$app->user->isGuest
    && Yii::$app->user->identity->role === 'admin';

$this->registerCss(<<<'CSS'
.infografias-pagina {
    --inf-blue: #7999d2;
    --inf-blue-dark: #5e7fb8;
    --inf-blue-light: #eaf1ff;
    --inf-lavender: #f0eaff;
    --inf-pink: #fff0f4;
    --inf-mint: #e6f6ee;
    --inf-yellow: #fff5dd;
    --inf-text: #394963;
    --inf-muted: #8390a5;
    --inf-border: #e6ebf4;

    width: 100%;
    min-height: calc(100vh - 78px);
    padding: 32px clamp(16px, 4vw, 58px) 50px;
    color: var(--inf-text);
    background: linear-gradient(140deg, #f7f9ff 0%, #fcf9ff 52%, #fff9fb 100%);
    box-sizing: border-box;
}

.infografias-pagina *,
.infografias-pagina *::before,
.infografias-pagina *::after {
    box-sizing: border-box;
}

.infografias-pagina a {
    text-decoration: none;
}

/* PORTADA */

.infografias-pagina .infografias-hero {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    width: 100%;
    max-width: 1500px;
    margin: 0 auto 35px;
    padding: clamp(30px, 5vw, 58px) 25px;
    text-align: center;
    background: linear-gradient(125deg, #e6efff 0%, #f0eaff 52%, #ffeff4 100%);
    border: 1px solid rgba(221, 228, 246, .9);
    border-radius: 27px;
    box-shadow: 0 12px 35px rgba(103, 125, 173, .08);
}

.infografias-pagina .infografias-hero::before,
.infografias-pagina .infografias-hero::after {
    position: absolute;
    z-index: -1;
    content: "";
    border-radius: 50%;
    pointer-events: none;
}

.infografias-pagina .infografias-hero::before {
    top: -100px;
    left: -55px;
    width: 260px;
    height: 260px;
    background: rgba(255, 255, 255, .36);
}

.infografias-pagina .infografias-hero::after {
    right: -70px;
    bottom: -145px;
    width: 350px;
    height: 350px;
    background: rgba(255, 255, 255, .3);
}

.infografias-pagina .infografias-hero-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 76px;
    height: 76px;
    margin: 0 auto 20px;
    color: #6e8fc9;
    background: rgba(255, 255, 255, .8);
    border: 1px solid rgba(255, 255, 255, .95);
    border-radius: 24px;
    box-shadow: 0 8px 22px rgba(100, 128, 184, .12);
}

.infografias-pagina .infografias-hero-icon i {
    font-size: 31px;
}

.infografias-pagina .infografias-hero > span {
    display: block;
    margin-bottom: 12px;
    color: #778bb5;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 2.5px;
}

.infografias-pagina .infografias-hero h1 {
    margin: 0 0 16px;
    color: #34496c;
    font-size: clamp(27px, 3.2vw, 43px);
    font-weight: 800;
    line-height: 1.25;
    letter-spacing: -.8px;
}

.infografias-pagina .infografias-hero p {
    max-width: 720px;
    margin: 0 auto 25px;
    color: #697991;
    font-size: 15px;
    line-height: 1.9;
}

/* BOTÓN PUBLICAR */

.infografias-pagina .btn-infografia-agregar {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    min-height: 47px;
    padding: 13px 23px;
    color: #fff;
    font-size: 13px;
    font-weight: 750;
    background: #7897d0;
    border: 1px solid #7897d0;
    border-radius: 13px;
    box-shadow: 0 6px 16px rgba(103, 135, 194, .2);
    transition: transform .2s ease, background .2s ease, box-shadow .2s ease;
}

.infografias-pagina .btn-infografia-agregar:hover {
    color: #fff;
    background: #627fb7;
    border-color: #627fb7;
    box-shadow: 0 9px 22px rgba(103, 135, 194, .27);
    transform: translateY(-2px);
}

/* CONTENEDOR */

.infografias-pagina .infografias-contenedor {
    width: 100%;
    max-width: 1500px;
    margin: 0 auto;
}

.infografias-pagina .infografias-encabezado {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 25px;
    margin-bottom: 27px;
}

.infografias-pagina .infografias-supertexto {
    display: inline-block;
    margin-bottom: 9px;
    color: #8a86ba;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 2px;
}

.infografias-pagina .infografias-encabezado h2 {
    margin: 0 0 9px;
    color: #3b4c68;
    font-size: clamp(22px, 2.4vw, 30px);
    font-weight: 800;
}

.infografias-pagina .infografias-encabezado p {
    margin: 0;
    color: var(--inf-muted);
    font-size: 13px;
    line-height: 1.7;
}

.infografias-pagina .infografias-contador {
    display: flex;
    align-items: center;
    gap: 14px;
    flex-shrink: 0;
    min-width: 175px;
    padding: 17px 21px;
    background: #fff;
    border: 1px solid var(--inf-border);
    border-radius: 17px;
    box-shadow: 0 6px 18px rgba(85, 106, 150, .05);
}

.infografias-pagina .infografias-contador > i {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 45px;
    height: 45px;
    color: #7d8fca;
    font-size: 20px;
    background: var(--inf-lavender);
    border-radius: 14px;
}

.infografias-pagina .infografias-contador strong,
.infografias-pagina .infografias-contador span {
    display: block;
}

.infografias-pagina .infografias-contador strong {
    color: #40577e;
    font-size: 23px;
    font-weight: 800;
    line-height: 1.2;
}

.infografias-pagina .infografias-contador span {
    margin-top: 4px;
    color: var(--inf-muted);
    font-size: 11px;
}

/* MENSAJES */

.infografias-pagina .alert {
    margin-bottom: 22px;
    padding: 15px 18px;
    border-radius: 13px;
    font-size: 13px;
}

.infografias-pagina .alert-success {
    color: #427660;
    background: #eaf8f0;
    border: 1px solid #d3eddf;
}

.infografias-pagina .alert-danger {
    color: #a35f72;
    background: #fff0f3;
    border: 1px solid #f3d7df;
}

/* CUADRÍCULA */

.infografias-pagina .infografias-lista {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 25px;
    align-items: stretch;
}

.infografias-pagina .infografia-card {
    display: flex;
    flex-direction: column;
    min-width: 0;
    overflow: hidden;
    background: #fff;
    border: 1px solid #e8ebf4;
    border-radius: 21px;
    box-shadow: 0 8px 25px rgba(81, 101, 146, .065);
    transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
}

.infografias-pagina .infografia-card:hover {
    border-color: #d8e1f4;
    box-shadow: 0 15px 35px rgba(81, 101, 146, .12);
    transform: translateY(-5px);
}

/* IMAGEN */

.infografias-pagina .infografia-imagen {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 245px;
    overflow: hidden;
    background: linear-gradient(135deg, #edf3ff, #f4edff 55%, #fff0f5);
}

.infografias-pagina .infografia-imagen img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: contain;
    transition: transform .35s ease;
}

.infografias-pagina .infografia-card:hover .infografia-imagen img {
    transform: scale(1.035);
}

.infografias-pagina .infografia-ver-imagen {
    position: absolute;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 25px;
    background: rgba(65, 81, 117, .28);
    opacity: 0;
    transition: opacity .25s ease;
}

.infografias-pagina .infografia-imagen:hover .infografia-ver-imagen {
    opacity: 1;
}

/* INFORMACIÓN */

.infografias-pagina .infografia-informacion {
    display: flex;
    flex: 1;
    flex-direction: column;
    align-items: flex-start;
    padding: 23px;
}

.infografias-pagina .infografia-etiqueta {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    margin-bottom: 14px;
    padding: 7px 11px;
    color: #7388b7;
    font-size: 10px;
    font-weight: 750;
    background: #eef2ff;
    border-radius: 8px;
}

.infografias-pagina .infografia-etiqueta i {
    font-size: 11px;
}

.infografias-pagina .infografia-informacion h3 {
    width: 100%;
    margin: 0 0 12px;
    color: #3b4b66;
    font-size: 18px;
    font-weight: 800;
    line-height: 1.5;
    overflow-wrap: anywhere;
}

.infografias-pagina .infografia-descripcion {
    width: 100%;
    margin: 0 0 20px;
    color: #7c879a;
    font-size: 12px;
    line-height: 1.9;
    overflow-wrap: anywhere;
}

/* VER Y DESCARGAR */

.infografias-pagina .infografia-acciones {
    display: flex;
    flex-wrap: wrap;
    gap: 9px;
    width: 100%;
    margin-top: auto;
}

.infografias-pagina .btn-infografia-ver,
.infografias-pagina .btn-infografia-descargar {
    display: inline-flex;
    flex: 1 1 auto;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 40px;
    padding: 10px 12px;
    font-size: 11px;
    font-weight: 750;
    border-radius: 10px;
    transition: background .2s ease, transform .2s ease;
}

.infografias-pagina .btn-infografia-ver {
    color: #5f7fb6;
    background: #edf3ff;
    border: 1px solid #e2eaff;
}

.infografias-pagina .btn-infografia-ver:hover {
    color: #4f6fa9;
    background: #dfeaff;
    transform: translateY(-1px);
}

.infografias-pagina .btn-infografia-descargar {
    color: #458269;
    background: #eaf7f0;
    border: 1px solid #d9eee3;
}

.infografias-pagina .btn-infografia-descargar:hover {
    color: #356d56;
    background: #d9f0e4;
    transform: translateY(-1px);
}

/* RECURSO RELACIONADO */

.infografias-pagina .infografia-enlace {
    display: inline-flex;
    align-items: flex-start;
    gap: 8px;
    margin-top: 16px;
    color: #9a7eb9;
    font-size: 11px;
    font-weight: 700;
    line-height: 1.6;
    overflow-wrap: anywhere;
    transition: color .2s ease;
}

.infografias-pagina .infografia-enlace:hover {
    color: #795a9c;
}

.infografias-pagina .infografia-enlace i {
    margin-top: 3px;
}

/* CONTROLES DEL ADMINISTRADOR */

.infografias-pagina .infografia-admin-acciones {
    display: flex;
    flex-wrap: wrap;
    gap: 9px;
    width: 100%;
    margin-top: 18px;
    padding-top: 16px;
    border-top: 1px solid #edf0f6;
}

.infografias-pagina .btn-infografia-editar,
.infografias-pagina .btn-infografia-eliminar {
    display: inline-flex;
    flex: 1 1 100px;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 39px;
    padding: 10px 12px;
    font-size: 11px;
    font-weight: 750;
    border-radius: 10px;
    transition: transform .2s ease, background .2s ease;
}

.infografias-pagina .btn-infografia-editar {
    color: #657eb4;
    background: #eef2ff;
    border: 1px solid #e0e7fb;
}

.infografias-pagina .btn-infografia-editar:hover {
    color: #4e689f;
    background: #dfe8ff;
    transform: translateY(-1px);
}

.infografias-pagina .btn-infografia-eliminar {
    color: #bd7588;
    background: #fff0f3;
    border: 1px solid #f6dfe5;
}

.infografias-pagina .btn-infografia-eliminar:hover {
    color: #a44e65;
    background: #ffe2e9;
    transform: translateY(-1px);
}

/* ESTADO VACÍO */

.infografias-pagina .infografias-vacias {
    padding: 55px 25px;
    text-align: center;
    background: rgba(255, 255, 255, .8);
    border: 1px dashed #d9e1f0;
    border-radius: 23px;
}

.infografias-pagina .infografias-vacias-icono {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 78px;
    height: 78px;
    margin: 0 auto 20px;
    color: #8a91c5;
    font-size: 30px;
    background: linear-gradient(135deg, #edf2ff, #f3eaff);
    border-radius: 24px;
}

.infografias-pagina .infografias-vacias h3 {
    margin: 0 0 12px;
    color: #435574;
    font-size: 21px;
    font-weight: 800;
}

.infografias-pagina .infografias-vacias p {
    max-width: 510px;
    margin: 0 auto 22px;
    color: var(--inf-muted);
    font-size: 13px;
    line-height: 1.9;
}

/* RESPONSIVE */

@media (min-width: 1600px) {
    .infografias-pagina .infografias-lista {
        grid-template-columns: repeat(4, minmax(0, 1fr));
    }
}

@media (max-width: 1100px) {
    .infografias-pagina .infografias-lista {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }

    .infografias-pagina .infografia-imagen {
        height: 230px;
    }
}

@media (max-width: 650px) {
    .infografias-pagina {
        padding: 20px 13px 35px;
    }

    .infografias-pagina .infografias-hero {
        margin-bottom: 27px;
        padding: 32px 18px;
        border-radius: 21px;
    }

    .infografias-pagina .infografias-hero-icon {
        width: 63px;
        height: 63px;
        margin-bottom: 17px;
        border-radius: 20px;
    }

    .infografias-pagina .infografias-hero > span {
        font-size: 9px;
        letter-spacing: 1.5px;
    }

    .infografias-pagina .infografias-hero p {
        font-size: 13px;
    }

    .infografias-pagina .infografias-encabezado {
        align-items: flex-start;
        flex-direction: column;
        gap: 17px;
    }

    .infografias-pagina .infografias-contador {
        width: 100%;
    }

    .infografias-pagina .infografias-lista {
        grid-template-columns: minmax(0, 1fr);
        gap: 19px;
    }

    .infografias-pagina .infografia-imagen {
        height: 260px;
    }

    .infografias-pagina .infografia-informacion {
        padding: 20px;
    }

    .infografias-pagina .infografias-vacias {
        padding: 38px 18px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .infografias-pagina *,
    .infografias-pagina *::before,
    .infografias-pagina *::after {
        transition: none !important;
    }
}
CSS
);
?>

<div class="infografias-pagina">

    <header class="infografias-hero">
        <div class="infografias-hero-icon">
            <i class="fa-solid fa-images"></i>
        </div>

        <span>RECURSOS VISUALES INSTITUCIONALES</span>

        <h1>Infografías del Código de Ética</h1>

        <p>
            Aprende de manera visual sobre los principios éticos,
            la integridad científica, el consentimiento informado
            y las buenas prácticas en la investigación científica.
        </p>

        <?php if ($esAdmin): ?>
            <?= Html::a(
                '<i class="fa-solid fa-plus"></i> Publicar infografía',
                ['create'],
                ['class' => 'btn-infografia-agregar']
            ) ?>
        <?php endif; ?>
    </header>

    <section class="infografias-contenedor">

        <div class="infografias-encabezado">
            <div>
                <span class="infografias-supertexto">
                    BIBLIOTECA DIGITAL
                </span>

                <h2>Explora las infografías</h2>

                <p>
                    Recursos educativos disponibles para la comunidad universitaria.
                </p>
            </div>

            <div class="infografias-contador">
                <i class="fa-solid fa-images"></i>

                <div>
                    <strong><?= count($infografias) ?></strong>
                    <span>Publicaciones</span>
                </div>
            </div>
        </div>

        <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success">
                <?= Html::encode(Yii::$app->session->getFlash('success')) ?>
            </div>
        <?php endif; ?>

        <?php if (Yii::$app->session->hasFlash('error')): ?>
            <div class="alert alert-danger">
                <?= Html::encode(Yii::$app->session->getFlash('error')) ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($infografias)): ?>

            <div class="infografias-lista">

                <?php foreach ($infografias as $infografia): ?>

                    <?php
                    $rutaImagen = Url::to(
                        '@web/infografias/' . rawurlencode($infografia->archivo)
                    );
                    ?>

                    <article class="infografia-card">

                        <a
                            class="infografia-imagen"
                            href="<?= Html::encode($rutaImagen) ?>"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="<?= Html::encode(
                                'Ver ' . $infografia->titulo
                            ) ?>"
                        >
                            <?= Html::img($rutaImagen, [
                                'alt' => $infografia->titulo,
                                'loading' => 'lazy',
                            ]) ?>

                            <span class="infografia-ver-imagen">
                                <i class="fa-solid fa-magnifying-glass-plus"></i>
                            </span>
                        </a>

                        <div class="infografia-informacion">

                            <span class="infografia-etiqueta">
                                <i class="fa-solid fa-book-open"></i>
                                Ética científica
                            </span>

                            <h3>
                                <?= Html::encode($infografia->titulo) ?>
                            </h3>

                            <p class="infografia-descripcion">
                                <?= nl2br(Html::encode(
                                    $infografia->descripcion
                                    ?: 'Material educativo sobre el Código de Ética en la Investigación Científica.'
                                )) ?>
                            </p>

                            <div class="infografia-acciones">

                                <a
                                    class="btn-infografia-ver"
                                    href="<?= Html::encode($rutaImagen) ?>"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    <i class="fa-solid fa-eye"></i>
                                    Ver imagen
                                </a>

                                <?= Html::a(
                                    '<i class="fa-solid fa-download"></i> Descargar',
                                    $rutaImagen,
                                    [
                                        'class' => 'btn-infografia-descargar',
                                        'download' => $infografia->archivo,
                                    ]
                                ) ?>

                            </div>

                            <?php if (!empty($infografia->enlace)): ?>
                                <a
                                    class="infografia-enlace"
                                    href="<?= Html::encode($infografia->enlace) ?>"
                                    target="_blank"
                                    rel="noopener noreferrer"
                                >
                                    <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                    Consultar recurso relacionado
                                </a>
                            <?php endif; ?>

                            <?php if ($esAdmin): ?>
                                <div class="infografia-admin-acciones">

                                    <?= Html::a(
                                        '<i class="fa-solid fa-pen"></i> Editar',
                                        ['update', 'id' => $infografia->id],
                                        ['class' => 'btn-infografia-editar']
                                    ) ?>

                                    <?= Html::a(
                                        '<i class="fa-solid fa-trash"></i> Eliminar',
                                        ['delete', 'id' => $infografia->id],
                                        [
                                            'class' => 'btn-infografia-eliminar',
                                            'data' => [
                                                'confirm' => '¿Estás seguro de eliminar esta infografía?',
                                                'method' => 'post',
                                            ],
                                        ]
                                    ) ?>

                                </div>
                            <?php endif; ?>

                        </div>
                    </article>

                <?php endforeach; ?>

            </div>

        <?php else: ?>

            <div class="infografias-vacias">

                <div class="infografias-vacias-icono">
                    <i class="fa-regular fa-images"></i>
                </div>

                <h3>Aún no hay infografías publicadas</h3>

                <p>
                    Aquí aparecerán los recursos visuales relacionados
                    con el Código de Ética en la Investigación Científica.
                </p>

                <?php if ($esAdmin): ?>
                    <?= Html::a(
                        '<i class="fa-solid fa-plus"></i> Publicar primera infografía',
                        ['create'],
                        ['class' => 'btn-infografia-agregar']
                    ) ?>
                <?php endif; ?>

            </div>

        <?php endif; ?>

    </section>

</div>
