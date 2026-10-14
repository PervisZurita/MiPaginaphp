<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\Documento[] $documentos */

use yii\helpers\Html;

$this->title = 'Documentos institucionales';

$this->registerCssFile('@web/css/documentos.css');

$usuario = Yii::$app->user->identity;

$esAdmin = $usuario !== null
    && $usuario->role === 'admin';

$this->registerCss(<<<'CSS'
.documentos-pagina {
    --dp-azul: #dceafb;
    --dp-azul-fuerte: #789dcc;
    --dp-lavanda: #eee7fa;
    --dp-rosa: #fbe8ef;
    --dp-verde: #e2f2e8;
    --dp-texto: #34445a;
    --dp-texto-suave: #78869a;
    --dp-borde: #e5eaf2;

    width: 100%;
    max-width: 100%;
    min-height: calc(100vh - 78px);
    margin: 0 auto;
    padding: 30px clamp(16px, 3vw, 42px) 45px;
    color: var(--dp-texto);
    background: #f8faff;
    font-family: inherit;
    box-sizing: border-box;
}

.documentos-pagina *,
.documentos-pagina *::before,
.documentos-pagina *::after {
    box-sizing: border-box;
}

.documentos-hero {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    padding: 38px 28px;
    margin-bottom: 30px;
    overflow: hidden;
    text-align: center;
    background: linear-gradient(120deg, #e5efff 0%, #f0eafa 52%, #fcebf0 100%);
    border: 1px solid #e5e8f5;
    border-radius: 24px;
    box-shadow: 0 8px 25px rgba(104, 125, 165, 0.07);
}

.documentos-hero::before,
.documentos-hero::after {
    content: "";
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.35);
    pointer-events: none;
}

.documentos-hero::before {
    width: 200px;
    height: 200px;
    top: -115px;
    left: -55px;
}

.documentos-hero::after {
    width: 240px;
    height: 240px;
    right: -80px;
    bottom: -160px;
}

.documentos-hero-icon {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 76px;
    height: 76px;
    margin-bottom: 19px;
    color: #668dc1;
    background: rgba(255, 255, 255, 0.82);
    border: 1px solid rgba(255, 255, 255, 0.9);
    border-radius: 23px;
    font-size: 32px;
    box-shadow: 0 5px 16px rgba(103, 130, 175, 0.10);
}

.documentos-hero > span {
    position: relative;
    z-index: 1;
    margin-bottom: 10px;
    color: #7893b7;
    font-size: 11px;
    font-weight: 750;
    letter-spacing: 2px;
}

.documentos-hero h1 {
    position: relative;
    z-index: 1;
    margin: 0 0 12px;
    color: #30445f;
    font-size: clamp(30px, 3vw, 39px);
    font-weight: 800;
    line-height: 1.25;
    letter-spacing: -0.8px;
}

.documentos-hero p {
    position: relative;
    z-index: 1;
    max-width: 660px;
    margin: 0;
    color: #718098;
    font-size: 15px;
    line-height: 1.8;
}

.documentos-contenedor {
    width: 100%;
    padding: 30px;
    background: #fff;
    border: 1px solid var(--dp-borde);
    border-radius: 22px;
    box-shadow: 0 8px 28px rgba(77, 98, 133, 0.05);
}

.documentos-encabezado {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 18px;
    margin-bottom: 26px;
    padding-bottom: 23px;
    border-bottom: 1px solid #edf0f6;
}

.documentos-encabezado h2 {
    margin: 0 0 7px;
    color: #34445a;
    font-size: 23px;
    font-weight: 750;
    line-height: 1.4;
}

.documentos-encabezado p {
    margin: 0;
    color: var(--dp-texto-suave);
    font-size: 13px;
    line-height: 1.7;
}

.btn-documento-agregar {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    min-height: 45px;
    padding: 12px 19px;
    color: #fff;
    background: #789dcc;
    border: 1px solid #789dcc;
    border-radius: 12px;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    box-shadow: 0 5px 13px rgba(120, 157, 204, 0.18);
    transition: background 0.2s ease, transform 0.2s ease;
}

.btn-documento-agregar:hover,
.btn-documento-agregar:focus {
    color: #fff;
    background: #668bbd;
    border-color: #668bbd;
    transform: translateY(-2px);
}

.documentos-pagina .alert {
    padding: 15px 18px;
    margin-bottom: 24px;
    border-radius: 13px;
    font-size: 14px;
    line-height: 1.6;
}

.documentos-pagina .alert-success {
    color: #477761;
    background: #e8f5ed;
    border: 1px solid #d4eadc;
}

.documentos-lista {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 20px;
}

.documento-card {
    display: flex;
    align-items: flex-start;
    gap: 18px;
    min-width: 0;
    padding: 23px;
    background: linear-gradient(135deg, #fff 0%, #fbfcff 100%);
    border: 1px solid #e7ecf4;
    border-radius: 18px;
    box-shadow: 0 4px 15px rgba(77, 98, 133, 0.035);
    transition: transform 0.22s ease, box-shadow 0.22s ease;
}

.documento-card:hover {
    transform: translateY(-3px);
    border-color: #d5e1f2;
    box-shadow: 0 10px 24px rgba(77, 98, 133, 0.08);
}

.documento-icono {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 57px;
    height: 57px;
    color: #c7798d;
    background: var(--dp-rosa);
    border: 1px solid #f6dce5;
    border-radius: 16px;
    font-size: 25px;
}

.documento-informacion {
    min-width: 0;
    flex: 1;
}

.documento-informacion h3 {
    margin: 2px 0 10px;
    color: #34445a;
    font-size: 17px;
    font-weight: 750;
    line-height: 1.5;
    overflow-wrap: anywhere;
}

.documento-informacion > p {
    margin: 0 0 15px;
    color: #718098;
    font-size: 13px;
    line-height: 1.8;
    overflow-wrap: anywhere;
}

.documento-informacion small {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    margin-bottom: 19px;
    color: #8995a8;
    font-size: 12px;
}

.documento-informacion small i {
    color: #91a9cb;
}

.documento-acciones {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 9px;
    padding-top: 15px;
    border-top: 1px solid #edf0f6;
}

.documento-acciones a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    min-height: 36px;
    padding: 9px 12px;
    border: 1px solid transparent;
    border-radius: 9px;
    font-size: 12px;
    font-weight: 700;
    line-height: 1.3;
    text-decoration: none;
    transition: background 0.2s ease, transform 0.2s ease;
}

.documento-acciones a:hover {
    transform: translateY(-1px);
}

.btn-documento-ver {
    color: #557cae;
    background: #eaf2ff;
    border-color: #dce8fa !important;
}

.btn-documento-ver:hover {
    color: #3f6598;
    background: #dceafb;
}

.btn-documento-descargar {
    color: #477761;
    background: #e8f5ed;
    border-color: #d4eadc !important;
}

.btn-documento-descargar:hover {
    color: #35664e;
    background: #d9eee1;
}

.btn-documento-editar {
    color: #7a68a5;
    background: #f0eafa;
    border-color: #e3d9f5 !important;
}

.btn-documento-editar:hover {
    color: #65528e;
    background: #e5dcf6;
}

.btn-documento-eliminar {
    color: #b96f83;
    background: #fff0f3;
    border-color: #f5dce3 !important;
}

.btn-documento-eliminar:hover {
    color: #a6536a;
    background: #fbe1e8;
}

.documentos-vacios {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 55px 25px;
    text-align: center;
    background: linear-gradient(135deg, #fbfcff, #f7f5fc);
    border: 1px dashed #dce3ef;
    border-radius: 18px;
}

.documentos-vacios > i {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 75px;
    height: 75px;
    margin-bottom: 18px;
    color: #8ca8cf;
    background: #eaf2ff;
    border-radius: 23px;
    font-size: 32px;
}

.documentos-vacios h3 {
    margin: 0 0 10px;
    color: #465872;
    font-size: 19px;
    font-weight: 750;
}

.documentos-vacios p {
    max-width: 420px;
    margin: 0;
    color: #8591a4;
    font-size: 13px;
    line-height: 1.8;
}

@media (max-width: 1100px) {
    .documentos-lista {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 650px) {
    .documentos-pagina {
        padding: 20px 13px 30px;
    }

    .documentos-hero {
        padding: 29px 19px;
        margin-bottom: 20px;
        border-radius: 19px;
    }

    .documentos-hero-icon {
        width: 62px;
        height: 62px;
        border-radius: 18px;
        font-size: 27px;
    }

    .documentos-hero h1 {
        font-size: 30px;
    }

    .documentos-hero p {
        font-size: 13px;
    }

    .documentos-contenedor {
        padding: 20px 15px;
        border-radius: 18px;
    }

    .documentos-encabezado {
        align-items: stretch;
        flex-direction: column;
        gap: 15px;
        padding-bottom: 19px;
    }

    .documentos-encabezado h2 {
        font-size: 21px;
    }

    .btn-documento-agregar {
        width: 100%;
    }

    .documento-card {
        gap: 13px;
        padding: 17px 14px;
        border-radius: 15px;
    }

    .documento-icono {
        width: 45px;
        height: 45px;
        border-radius: 13px;
        font-size: 21px;
    }

    .documento-informacion h3 {
        font-size: 15px;
    }

    .documento-acciones {
        gap: 8px;
    }

    .documento-acciones a {
        flex: 1 1 auto;
    }

    .documentos-vacios {
        padding: 40px 17px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .documentos-pagina *,
    .documentos-pagina *::before,
    .documentos-pagina *::after {
        transition: none !important;
    }
}
CSS);
?>

<div class="documentos-pagina">

    <header class="documentos-hero">
        <div class="documentos-hero-icon">
            <i class="fa-solid fa-folder-open"></i>
        </div>

        <span>RECURSOS INSTITUCIONALES</span>

        <h1>Documentos institucionales</h1>

        <p>
            Consulta y descarga documentos relacionados con la ética
            y la investigación científica.
        </p>
    </header>

    <main class="documentos-contenedor">

        <div class="documentos-encabezado">
            <div>
                <h2>Biblioteca documental</h2>
                <p>
                    <?= $esAdmin
                        ? 'Administra, publica y actualiza los documentos institucionales.'
                        : 'Consulta y descarga los documentos disponibles.' ?>
                </p>
            </div>

            <?php if ($esAdmin): ?>
                <?= Html::a(
                    '<i class="fa-solid fa-plus"></i> Agregar documento',
                    ['create'],
                    [
                        'class' => 'btn-documento-agregar',
                        'encode' => false,
                    ]
                ) ?>
            <?php endif; ?>
        </div>

        <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success">
                <i class="fa-solid fa-circle-check"></i>
                <?= Html::encode(Yii::$app->session->getFlash('success')) ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($documentos)): ?>

            <div class="documentos-lista">

                <?php foreach ($documentos as $documento): ?>

                    <article class="documento-card">

                        <div class="documento-icono">
                            <i class="fa-solid fa-file-pdf"></i>
                        </div>

                        <div class="documento-informacion">

                            <h3>
                                <?= Html::encode($documento->titulo) ?>
                            </h3>

                            <p>
                                <?= nl2br(Html::encode(
                                    $documento->descripcion
                                    ?: 'Documento institucional disponible para consulta.'
                                )) ?>
                            </p>

                            <small>
                                <i class="fa-regular fa-calendar"></i>
                                <?= Yii::$app->formatter->asDate(
                                    $documento->fecha_creacion
                                ) ?>
                            </small>

                            <div class="documento-acciones">

                                <?= Html::a(
                                    '<i class="fa-solid fa-eye"></i> Ver documento',
                                    '@web/documentos/' . rawurlencode($documento->archivo),
                                    [
                                        'class' => 'btn-documento-ver',
                                        'target' => '_blank',
                                        'rel' => 'noopener',
                                        'encode' => false,
                                    ]
                                ) ?>

                                <?= Html::a(
                                    '<i class="fa-solid fa-download"></i> Descargar',
                                    '@web/documentos/' . rawurlencode($documento->archivo),
                                    [
                                        'class' => 'btn-documento-descargar',
                                        'download' => $documento->archivo,
                                        'encode' => false,
                                    ]
                                ) ?>

                                <?php if ($esAdmin): ?>

                                    <?= Html::a(
                                        '<i class="fa-solid fa-pen"></i> Editar',
                                        ['update', 'id' => $documento->id],
                                        [
                                            'class' => 'btn-documento-editar',
                                            'encode' => false,
                                        ]
                                    ) ?>

                                    <?= Html::a(
                                        '<i class="fa-solid fa-trash"></i> Eliminar',
                                        ['delete', 'id' => $documento->id],
                                        [
                                            'class' => 'btn-documento-eliminar',
                                            'encode' => false,
                                            'data' => [
                                                'confirm' => '¿Estás seguro de que deseas eliminar este documento?',
                                                'method' => 'post',
                                            ],
                                        ]
                                    ) ?>

                                <?php endif; ?>

                            </div>
                        </div>
                    </article>

                <?php endforeach; ?>

            </div>

        <?php else: ?>

            <div class="documentos-vacios">
                <i class="fa-regular fa-folder-open"></i>

                <h3>No hay documentos publicados</h3>

                <p>
                    Los documentos institucionales aparecerán aquí
                    cuando se registren.
                </p>

                <?php if ($esAdmin): ?>
                    <?= Html::a(
                        '<i class="fa-solid fa-plus"></i> Agregar primer documento',
                        ['create'],
                        [
                            'class' => 'btn-documento-agregar',
                            'encode' => false,
                        ]
                    ) ?>
                <?php endif; ?>
            </div>

        <?php endif; ?>

    </main>
</div>
