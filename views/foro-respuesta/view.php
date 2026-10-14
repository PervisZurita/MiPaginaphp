<?php

declare(strict_types=1);

use yii\helpers\Html;

$this->title = 'Respuesta';

$this->registerCss(<<<'CSS'
.respuesta-view {
    --respuesta-primary: #7189b5;
    --respuesta-primary-dark: #536c98;
    --respuesta-lavender: #eae6f8;
    --respuesta-blue: #e8f0fc;
    --respuesta-pink: #f9e8ef;
    --respuesta-mint: #e5f4ec;
    --respuesta-yellow: #fff5df;
    --respuesta-muted: #8490a3;
    --respuesta-border: #e3e8f1;
    --respuesta-text: #4b586e;

    width: 100%;
    min-height: 100vh;
    padding: 38px 24px 65px;
    background:
        radial-gradient(circle at 5% 5%, rgba(234,230,248,.8), transparent 27%),
        radial-gradient(circle at 95% 8%, rgba(232,240,252,.9), transparent 28%),
        #f8f9fd;
    color: var(--respuesta-text);
    box-sizing: border-box;
}

.respuesta-view *,
.respuesta-view *::before,
.respuesta-view *::after {
    box-sizing: border-box;
}

.respuesta-container {
    width: 100%;
    max-width: 1100px;
    margin: 0 auto;
}

.respuesta-volver {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 23px;
    padding: 9px 0;
    color: var(--respuesta-primary-dark) !important;
    font-size: 13px;
    font-weight: 800;
    text-decoration: none !important;
    transition: color .2s ease, gap .2s ease;
}

.respuesta-volver:hover {
    color: #b07e98 !important;
    gap: 15px;
}

.respuesta-header {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    display: flex;
    align-items: center;
    gap: 23px;
    margin-bottom: 25px;
    padding: 37px 40px;
    color: var(--respuesta-primary-dark);
    background: linear-gradient(
        120deg,
        #e5effb 0%,
        #eae6f8 55%,
        #f9e8ef 100%
    );
    border: 1px solid #dfe6f4;
    border-radius: 20px;
}

.respuesta-header::before,
.respuesta-header::after {
    content: "";
    position: absolute;
    z-index: -1;
    border: 1px solid rgba(113,137,181,.17);
    border-radius: 50%;
    pointer-events: none;
}

.respuesta-header::before {
    top: -105px;
    right: -25px;
    width: 270px;
    height: 270px;
}

.respuesta-header::after {
    top: -65px;
    right: 15px;
    width: 190px;
    height: 190px;
}

.respuesta-header-icono {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 66px;
    height: 66px;
    color: #7189b5;
    background: rgba(255,255,255,.76);
    border: 1px solid rgba(113,137,181,.17);
    border-radius: 19px;
    font-size: 25px;
    box-shadow: 0 5px 15px rgba(113,137,181,.08);
}

.respuesta-header-texto {
    position: relative;
    z-index: 1;
}

.respuesta-eyebrow {
    display: block;
    margin-bottom: 9px;
    color: #9180b7;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.7px;
    text-transform: uppercase;
}

.respuesta-titulo {
    margin: 0 0 9px;
    color: #4e6388;
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(27px, 4vw, 36px);
    font-weight: 700;
    line-height: 1.3;
}

.respuesta-subtitulo {
    margin: 0;
    color: #697790;
    font-size: 13px;
    line-height: 1.9;
}

.respuesta-card {
    overflow: hidden;
    background: #fff;
    border: 1px solid var(--respuesta-border);
    border-radius: 20px;
    box-shadow: 0 12px 35px rgba(91,108,145,.07);
}

.respuesta-card-acento {
    height: 5px;
    background: linear-gradient(
        90deg,
        #a8b9df 0%,
        #c9bfe9 35%,
        #edcbd8 70%,
        #c5e5d4 100%
    );
}

.respuesta-card-contenido {
    padding: 34px 40px 35px;
}

.respuesta-seccion-titulo {
    display: flex;
    align-items: center;
    gap: 12px;
    margin: 0 0 25px;
    padding-bottom: 19px;
    color: #536c98;
    border-bottom: 1px solid #edf0f6;
    font-family: Georgia, "Times New Roman", serif;
    font-size: 22px;
    font-weight: 700;
}

.respuesta-seccion-titulo i {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 42px;
    height: 42px;
    flex-shrink: 0;
    color: #8a7bb5;
    background: var(--respuesta-lavender);
    border: 1px solid #e1daf4;
    border-radius: 13px;
    font-size: 16px;
}

.respuesta-usuario {
    display: flex;
    align-items: center;
    gap: 16px;
    margin-bottom: 30px;
    padding: 21px;
    background: linear-gradient(110deg, #f4f7fe, #faf8ff);
    border: 1px solid #e6eaf5;
    border-radius: 15px;
}

.respuesta-avatar {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 56px;
    height: 56px;
    color: #7189b5;
    background: #e5effb;
    border: 1px solid #d5e2f6;
    border-radius: 17px;
    font-size: 21px;
}

.respuesta-usuario-info {
    min-width: 0;
}

.respuesta-usuario-etiqueta {
    display: block;
    margin-bottom: 6px;
    color: #8a95a8;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.2px;
    text-transform: uppercase;
}

.respuesta-nombre {
    margin: 0 0 7px;
    color: #536c98;
    font-size: 15px;
    font-weight: 800;
    overflow-wrap: anywhere;
}

.respuesta-fecha {
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--respuesta-muted);
    font-size: 12px;
    line-height: 1.7;
}

.respuesta-fecha i {
    color: #a193c8;
}

.respuesta-contenido-etiqueta {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 14px;
    color: #536c98;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: .5px;
    text-transform: uppercase;
}

.respuesta-contenido-etiqueta i {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 34px;
    height: 34px;
    color: #b47f9b;
    background: var(--respuesta-pink);
    border: 1px solid #f0d9e3;
    border-radius: 11px;
    font-size: 14px;
}

.respuesta-contenido {
    min-height: 130px;
    padding: 25px 27px;
    color: var(--respuesta-text);
    background: linear-gradient(135deg, #fcfcff, #f9faff);
    border: 1px solid #e9edf5;
    border-left: 4px solid #b7c5e5;
    border-radius: 0 14px 14px 0;
    font-size: 15px;
    line-height: 2;
    overflow-wrap: anywhere;
    white-space: pre-line;
}

.respuesta-separador {
    height: 1px;
    margin: 30px 0 23px;
    background: #edf0f6;
}

.respuesta-pie {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 17px;
    flex-wrap: wrap;
}

.respuesta-nota {
    display: flex;
    align-items: center;
    gap: 10px;
    max-width: 500px;
    padding: 11px 14px;
    color: #718b7d;
    background: var(--respuesta-mint);
    border: 1px solid #d8ecdf;
    border-radius: 11px;
    font-size: 11px;
    line-height: 1.8;
}

.respuesta-nota i {
    flex-shrink: 0;
    color: #7caf96;
    font-size: 14px;
}

.btn-respuesta-volver {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    min-height: 45px;
    padding: 12px 20px;
    color: #fff !important;
    background: linear-gradient(135deg, #8299c5, #7189b5);
    border: 1px solid #8299c5;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 800;
    text-decoration: none !important;
    box-shadow: 0 5px 13px rgba(113,137,181,.16);
    transition: background .2s ease, box-shadow .2s ease, transform .2s ease;
}

.btn-respuesta-volver:hover {
    color: #fff !important;
    background: linear-gradient(135deg, #7189b5, #607aa8);
    border-color: #7189b5;
    box-shadow: 0 7px 17px rgba(100,125,168,.23);
    transform: translateY(-1px);
}

@media (max-width: 768px) {
    .respuesta-view {
        padding: 28px 16px 45px;
    }

    .respuesta-header {
        gap: 17px;
        padding: 29px 24px;
    }

    .respuesta-header-icono {
        width: 55px;
        height: 55px;
        font-size: 21px;
    }

    .respuesta-card-contenido {
        padding: 28px 24px;
    }

    .respuesta-contenido {
        padding: 21px;
    }

    .respuesta-pie {
        align-items: stretch;
        flex-direction: column;
    }

    .btn-respuesta-volver {
        align-self: flex-start;
    }
}

@media (max-width: 480px) {
    .respuesta-view {
        padding: 22px 12px 35px;
    }

    .respuesta-header {
        align-items: flex-start;
        gap: 13px;
        padding: 24px 17px;
        border-radius: 16px;
    }

    .respuesta-header-icono {
        width: 44px;
        height: 44px;
        border-radius: 13px;
        font-size: 17px;
    }

    .respuesta-eyebrow {
        font-size: 9px;
        letter-spacing: 1px;
        line-height: 1.8;
    }

    .respuesta-titulo {
        font-size: 25px;
    }

    .respuesta-subtitulo {
        font-size: 12px;
    }

    .respuesta-card {
        border-radius: 16px;
    }

    .respuesta-card-contenido {
        padding: 23px 16px;
    }

    .respuesta-seccion-titulo {
        gap: 10px;
        font-size: 19px;
    }

    .respuesta-seccion-titulo i {
        width: 37px;
        height: 37px;
    }

    .respuesta-usuario {
        gap: 12px;
        padding: 15px;
    }

    .respuesta-avatar {
        width: 45px;
        height: 45px;
        border-radius: 13px;
        font-size: 17px;
    }

    .respuesta-contenido {
        min-height: 110px;
        padding: 17px;
        font-size: 14px;
        line-height: 1.9;
    }

    .respuesta-nota {
        align-items: flex-start;
        padding: 12px;
    }

    .btn-respuesta-volver {
        width: 100%;
        min-height: 46px;
    }
}
CSS);
?>

<div class="respuesta-view">
    <div class="respuesta-container">

        <?= Html::a(
            '<i class="fa-solid fa-arrow-left"></i><span>Volver al debate</span>',
            ['/foro/view', 'id' => $model->foro_id],
            [
                'class' => 'respuesta-volver',
                'encode' => false,
                'aria-label' => 'Volver al debate'
            ]
        ) ?>

        <header class="respuesta-header">
            <div class="respuesta-header-icono">
                <i class="fa-solid fa-comments"></i>
            </div>

            <div class="respuesta-header-texto">
                <span class="respuesta-eyebrow">
                    Foro de debate académico
                </span>

                <h1 class="respuesta-titulo">
                    Respuesta
                </h1>

                <p class="respuesta-subtitulo">
                    Consulta el contenido de esta intervención dentro del debate.
                </p>
            </div>
        </header>

        <section class="respuesta-card">
            <div class="respuesta-card-acento"></div>

            <div class="respuesta-card-contenido">

                <h2 class="respuesta-seccion-titulo">
                    <i class="fa-solid fa-message"></i>
                    Detalle de la respuesta
                </h2>

                <div class="respuesta-usuario">
                    <div class="respuesta-avatar">
                        <i class="fa-solid fa-user"></i>
                    </div>

                    <div class="respuesta-usuario-info">
                        <span class="respuesta-usuario-etiqueta">
                            Publicado por
                        </span>

                        <div class="respuesta-nombre">
                            <?= Html::encode(
                                $model->usuario->nombre
                                ?? $model->usuario->username
                                ?? 'Usuario'
                            ) ?>
                        </div>

                        <div class="respuesta-fecha">
                            <i class="fa-regular fa-calendar"></i>

                            <span>
                                <?= Yii::$app->formatter->asDatetime(
                                    $model->fecha_creacion,
                                    'php:d/m/Y H:i'
                                ) ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="respuesta-contenido-etiqueta">
                    <i class="fa-solid fa-quote-left"></i>
                    Contenido de la intervención
                </div>

                <div class="respuesta-contenido"><?= Html::encode(
                    $model->contenido
                ) ?></div>

                <div class="respuesta-separador"></div>

                <div class="respuesta-pie">
                    <div class="respuesta-nota">
                        <i class="fa-solid fa-shield-halved"></i>
                        <span>
                            Espacio de participación y reflexión académica.
                        </span>
                    </div>

                    <?= Html::a(
                        '<i class="fa-solid fa-arrow-left"></i> Volver al debate',
                        ['/foro/view', 'id' => $model->foro_id],
                        [
                            'class' => 'btn-respuesta-volver',
                            'encode' => false
                        ]
                    ) ?>
                </div>

            </div>
        </section>

    </div>
</div>
