<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\Foro $foro */
/** @var app\models\ForoRespuesta[] $respuestas */
/** @var app\models\ForoRespuesta $respuesta */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = $foro->titulo;

$this->registerCss(<<<'CSS'
.debate-page {
    --debate-primary: #7189b5;
    --debate-primary-dark: #506a96;
    --debate-lavender: #e9e3f8;
    --debate-blue: #e3edfb;
    --debate-pink: #f8e7ef;
    --debate-mint: #e2f3e9;
    --debate-text: #465671;
    --debate-muted: #8490a5;
    --debate-border: #e4e9f2;
    --debate-white: #ffffff;

    width: 100%;
    min-height: 100vh;
    padding: 35px 28px 75px;
    background:
        radial-gradient(ellipse at 0% 0%, rgba(220,234,247,.8), transparent 32%),
        radial-gradient(ellipse at 100% 10%, rgba(233,227,248,.7), transparent 30%),
        linear-gradient(145deg, #f8faff, #f8f7fc 55%, #f5faf9);
    color: var(--debate-text);
}

.debate-page *,
.debate-page *::before,
.debate-page *::after {
    box-sizing: border-box;
}

.debate-container {
    width: 100%;
    max-width: 1450px;
    margin: 0 auto;
    animation: debateReveal .45s ease both;
}

@keyframes debateReveal {
    from {
        opacity: 0;
        transform: translateY(12px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* VOLVER */

.btn-volver {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 10px 15px;
    margin-bottom: 23px;
    border: 1px solid #e2e8f2;
    border-radius: 12px;
    background: rgba(255,255,255,.82);
    color: #506a96 !important;
    text-decoration: none !important;
    font-size: 12px;
    font-weight: 800;
    box-shadow: 0 3px 12px rgba(72,91,125,.04);
    transition: all .22s ease;
}

.btn-volver:hover {
    gap: 14px;
    border-color: #cbd8ed;
    background: #fff;
    transform: translateX(-3px);
}

.btn-volver i {
    font-size: 13px;
}

/* CABECERA DEL DEBATE */

.debate-header {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    padding: 43px 45px 35px;
    margin-bottom: 24px;
    border: 1px solid rgba(255,255,255,.9);
    border-radius: 23px;
    background: linear-gradient(120deg, #e3edfb 0%, #eae7fa 55%, #f7e8f0 100%);
    box-shadow: 0 12px 35px rgba(93,110,150,.08);
}

.debate-header::before {
    content: "";
    position: absolute;
    z-index: -1;
    top: -145px;
    right: -60px;
    width: 360px;
    height: 360px;
    border: 1px solid rgba(115,132,177,.18);
    border-radius: 50%;
    box-shadow:
        0 0 0 32px rgba(255,255,255,.15),
        0 0 0 70px rgba(255,255,255,.12);
}

.debate-header::after {
    content: "";
    position: absolute;
    z-index: -1;
    bottom: -100px;
    left: 40%;
    width: 220px;
    height: 220px;
    border-radius: 50%;
    background: rgba(255,255,255,.18);
}

.debate-label {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 8px 12px;
    margin-bottom: 19px;
    border: 1px solid #ded8f1;
    border-radius: 10px;
    background: rgba(255,255,255,.65);
    color: #8178ae;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.debate-label i {
    font-size: 12px;
}

.debate-header h1 {
    position: relative;
    max-width: 1050px;
    margin: 0 0 25px;
    color: #435675;
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(28px, 3.2vw, 40px);
    line-height: 1.35;
    font-weight: 700;
    letter-spacing: -.5px;
    overflow-wrap: anywhere;
}

.debate-header h1::after {
    content: "";
    display: block;
    width: 55px;
    height: 3px;
    margin-top: 20px;
    border-radius: 4px;
    background: linear-gradient(90deg, #9b92c7, #d7b8d2);
}

.debate-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 12px 25px;
}

.debate-meta span {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    color: #697995;
    font-size: 12px;
    line-height: 1.7;
    overflow-wrap: anywhere;
}

.debate-meta i {
    color: #9586be;
    font-size: 13px;
}

/* CONTENIDO PRINCIPAL */

.debate-content {
    padding: 30px 34px 34px;
    margin-bottom: 37px;
    border: 1px solid var(--debate-border);
    border-radius: 19px;
    background: rgba(255,255,255,.96);
    box-shadow: 0 6px 22px rgba(85,102,139,.04);
}

.debate-content-label {
    display: flex;
    align-items: center;
    gap: 11px;
    padding-bottom: 18px;
    margin-bottom: 21px;
    border-bottom: 1px solid #edf0f6;
    color: #637da8;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.debate-content-label i {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 34px;
    height: 34px;
    border-radius: 10px;
    background: var(--debate-blue);
    color: #7189b5;
    font-size: 14px;
}

.debate-content p {
    margin: 0;
    color: #59677f;
    font-size: 14px;
    line-height: 2;
    white-space: pre-line;
    overflow-wrap: anywhere;
}

/* RESPUESTAS */

.respuestas-section {
    margin-top: 8px;
}

.respuestas-title {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding-bottom: 19px;
    margin-bottom: 21px;
    border-bottom: 1px solid #e5e9f2;
}

.respuestas-title h2 {
    display: flex;
    align-items: center;
    gap: 12px;
    margin: 0;
    color: #435675;
    font-family: Georgia, "Times New Roman", serif;
    font-size: 25px;
    font-weight: 700;
}

.respuestas-title h2 > i {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 42px;
    height: 42px;
    border-radius: 13px;
    background: var(--debate-lavender);
    color: #8c82ba;
    font-size: 17px;
}

.respuestas-count {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 30px;
    height: 28px;
    padding: 0 9px;
    border: 1px solid #ded8f1;
    border-radius: 9px;
    background: #f4f1fc;
    color: #8178ae;
    font-family: Arial, sans-serif;
    font-size: 12px;
    font-weight: 800;
}

/* TARJETAS DE RESPUESTA */

.respuesta-card {
    position: relative;
    padding: 24px 27px;
    margin-bottom: 16px;
    border: 1px solid var(--debate-border);
    border-left: 4px solid #c9c2e9;
    border-radius: 17px;
    background: rgba(255,255,255,.96);
    box-shadow: 0 5px 17px rgba(85,102,139,.035);
    transition: border-color .22s ease, box-shadow .22s ease, transform .22s ease;
}

.respuesta-card:hover {
    border-left-color: #93a9d1;
    box-shadow: 0 11px 27px rgba(85,102,139,.08);
    transform: translateY(-2px);
}

.respuesta-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
}

.usuario-info {
    display: flex;
    align-items: center;
    gap: 13px;
    min-width: 0;
}

.usuario-avatar {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 46px;
    height: 46px;
    flex-shrink: 0;
    border: 1px solid #dce5f4;
    border-radius: 15px;
    background: linear-gradient(135deg, #e3edfb, #eee8fa);
    color: #7a8fb8;
    font-size: 16px;
}

.usuario-nombre {
    color: #536b91;
    font-size: 13px;
    font-weight: 800;
    overflow-wrap: anywhere;
}

.usuario-fecha {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 6px;
    margin-top: 6px;
    color: var(--debate-muted);
    font-size: 11px;
}

.usuario-fecha i {
    color: #a096c8;
}

.respuesta-contenido {
    padding-top: 18px;
    margin-top: 19px;
    border-top: 1px solid #edf0f6;
    color: #59677f;
    font-size: 13px;
    line-height: 1.95;
    white-space: pre-line;
    overflow-wrap: anywhere;
}

/* ACCIONES */

.respuesta-acciones {
    display: flex;
    align-items: center;
    gap: 12px;
    padding-top: 15px;
    margin-top: 17px;
    border-top: 1px solid #edf0f6;
}

.respuesta-acciones form {
    margin: 0;
}

.btn-eliminar {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 9px 13px;
    border: 1px solid #f0d8de;
    border-radius: 10px;
    background: #fff6f8;
    color: #bd7182;
    font-size: 11px;
    font-weight: 800;
    cursor: pointer;
    transition: all .2s ease;
}

.btn-eliminar:hover {
    border-color: #d59aa7;
    background: #f7e3e9;
    color: #a84e64;
}

/* SIN RESPUESTAS */

.sin-respuestas {
    padding: 47px 24px;
    margin-bottom: 23px;
    text-align: center;
    border: 1px dashed #d8deed;
    border-radius: 19px;
    background: rgba(255,255,255,.75);
}

.sin-respuestas-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 69px;
    height: 69px;
    margin: 0 auto 18px;
    border: 1px solid #ded8f1;
    border-radius: 20px;
    background: linear-gradient(135deg, #e3edfb, #eee8fa);
    color: #8c82ba;
    font-size: 25px;
}

.sin-respuestas h3 {
    margin: 0 0 10px;
    color: #435675;
    font-family: Georgia, "Times New Roman", serif;
    font-size: 22px;
    font-weight: 700;
}

.sin-respuestas p {
    max-width: 550px;
    margin: 0 auto;
    color: var(--debate-muted);
    font-size: 12px;
    line-height: 1.9;
}

/* FORMULARIO DE RESPUESTA */

.responder-card {
    padding: 30px 34px 34px;
    margin-top: 35px;
    border: 1px solid #e2e7f0;
    border-top: 4px solid #c9c2e9;
    border-radius: 20px;
    background: rgba(255,255,255,.97);
    box-shadow: 0 8px 26px rgba(85,102,139,.05);
}

.responder-header {
    display: flex;
    align-items: center;
    gap: 15px;
    padding-bottom: 22px;
    margin-bottom: 24px;
    border-bottom: 1px solid #edf0f6;
}

.responder-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50px;
    height: 50px;
    flex-shrink: 0;
    border: 1px solid #ded8f1;
    border-radius: 15px;
    background: var(--debate-lavender);
    color: #8c82ba;
    font-size: 19px;
}

.responder-header h2 {
    margin: 0;
    color: #435675;
    font-family: Georgia, "Times New Roman", serif;
    font-size: 22px;
    font-weight: 700;
}

.responder-header p {
    margin: 6px 0 0;
    color: var(--debate-muted);
    font-size: 12px;
    line-height: 1.8;
}

.responder-card .form-group {
    margin-bottom: 19px;
}

.responder-card .control-label {
    display: block;
    margin-bottom: 10px;
    color: #536b91;
    font-size: 12px;
    font-weight: 800;
}

.responder-card .form-control {
    display: block;
    width: 100%;
    min-height: 160px;
    padding: 15px 16px;
    resize: vertical;
    border: 1px solid #e0e5ef;
    border-radius: 13px;
    background: #fbfcff;
    color: #46546e;
    font-family: inherit;
    font-size: 13px;
    line-height: 1.9;
    box-shadow: none;
    transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
}

.responder-card .form-control::placeholder {
    color: #a0aabe;
    opacity: 1;
}

.responder-card .form-control:hover {
    border-color: #cdd8e9;
    background: #fff;
}

.responder-card .form-control:focus {
    border-color: #a8bce0;
    background: #fff;
    box-shadow: 0 0 0 4px rgba(174,192,227,.2);
    outline: none;
}

.responder-card .has-error .form-control {
    border-color: #e4a5ad;
    background: #fffafa;
}

.responder-card .help-block {
    margin-top: 7px;
    color: #c16e7b;
    font-size: 12px;
    line-height: 1.6;
}

.btn-responder {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    min-height: 46px;
    padding: 12px 20px;
    border: 1px solid #8298bf;
    border-radius: 12px;
    background: linear-gradient(135deg, #8298bf, #9a9fca);
    color: #fff !important;
    font-size: 12px;
    font-weight: 800;
    text-decoration: none !important;
    cursor: pointer;
    box-shadow: 0 6px 16px rgba(112,136,181,.16);
    transition: all .22s ease;
}

.btn-responder:hover,
.btn-responder:focus {
    border-color: #7189b5;
    background: linear-gradient(135deg, #7189b5, #8a91c1);
    color: #fff !important;
    box-shadow: 0 8px 20px rgba(112,136,181,.23);
    transform: translateY(-2px);
}

/* AVISO DE SESIÓN */

.debate-login-notice {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    padding: 17px 18px;
    margin: 0 0 19px;
    border: 1px solid #dcece4;
    border-left: 4px solid #a9d8c1;
    border-radius: 12px;
    background: #f0faf5;
    color: #628573;
    font-size: 12px;
    line-height: 1.8;
}

.debate-login-notice i {
    margin-top: 3px;
    color: #70ad8d;
}

.debate-page .alert {
    padding: 14px 17px;
    margin-bottom: 20px;
    border-radius: 12px;
    font-size: 13px;
}

.debate-page .alert-success {
    border-color: #d5eadc;
    background: #f0faf4;
    color: #47765f;
}

.debate-page .alert-danger {
    border-color: #f0d8de;
    background: #fff5f7;
    color: #a84e64;
}

.debate-page .alert-warning {
    border-color: #eee3c9;
    background: #fffaf0;
    color: #927647;
}

.debate-page .alert-info {
    border-color: #d9e6f6;
    background: #f1f7ff;
    color: #5a789f;
}

@media (min-width: 1500px) {
    .debate-container {
        max-width: 1600px;
    }
}

@media (max-width: 768px) {
    .debate-page {
        padding: 27px 16px 50px;
    }

    .debate-header {
        padding: 30px 25px;
        border-radius: 19px;
    }

    .debate-header h1 {
        font-size: 28px;
    }

    .debate-meta {
        flex-direction: column;
        gap: 11px;
    }

    .debate-content {
        padding: 24px 22px;
        margin-bottom: 30px;
        border-radius: 16px;
    }

    .respuestas-title h2 {
        font-size: 22px;
    }

    .respuesta-card {
        padding: 20px 18px;
        border-radius: 15px;
    }

    .responder-card {
        padding: 24px 20px;
        border-radius: 17px;
    }

    .responder-header h2 {
        font-size: 20px;
    }
}

@media (max-width: 480px) {
    .debate-page {
        padding: 22px 12px 40px;
    }

    .debate-header {
        padding: 25px 19px;
    }

    .debate-header h1 {
        font-size: 24px;
    }

    .debate-content {
        padding: 21px 17px;
    }

    .debate-content p {
        font-size: 13px;
    }

    .respuestas-title {
        align-items: flex-start;
    }

    .respuestas-title h2 {
        gap: 8px;
        font-size: 19px;
    }

    .respuestas-title h2 > i {
        width: 36px;
        height: 36px;
    }

    .usuario-avatar {
        width: 40px;
        height: 40px;
        border-radius: 12px;
    }

    .respuesta-card {
        padding: 18px 15px;
    }

    .responder-card {
        padding: 21px 16px;
    }

    .responder-header {
        align-items: flex-start;
        gap: 11px;
    }

    .responder-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
    }

    .responder-header h2 {
        font-size: 19px;
    }

    .btn-responder {
        width: 100%;
    }
}

@media (prefers-reduced-motion: reduce) {
    .debate-container {
        animation: none;
    }

    .btn-volver,
    .respuesta-card,
    .btn-eliminar,
    .btn-responder {
        transition: none;
    }
}
CSS);
?>

<div class="debate-page">
    <div class="debate-container">

        <?= Html::a(
            '<i class="fa-solid fa-arrow-left"></i><span>Volver al foro</span>',
            ['/foro/index'],
            [
                'class' => 'btn-volver',
                'encode' => false,
            ]
        ) ?>

        <?php foreach (Yii::$app->session->getAllFlashes() as $tipo => $mensajes): ?>
            <?php foreach ((array) $mensajes as $mensaje): ?>
                <?php
                $clasesAlert = [
                    'success' => 'success',
                    'error' => 'danger',
                    'warning' => 'warning',
                    'info' => 'info',
                ];

                $clase = $clasesAlert[$tipo] ?? 'info';
                ?>

                <div class="alert alert-<?= $clase ?>" role="alert">
                    <?= Html::encode($mensaje) ?>
                </div>
            <?php endforeach; ?>
        <?php endforeach; ?>

        <header class="debate-header">

            <span class="debate-label">
                <i class="fa-solid fa-scale-balanced"></i>
                FORO DE DEBATE
            </span>

            <h1><?= Html::encode($foro->titulo) ?></h1>

            <div class="debate-meta">
                <span>
                    <i class="fa-solid fa-user"></i>

                    <?= Html::encode(
                        $foro->usuario->nombre
                        ?? $foro->usuario->username
                        ?? 'Usuario'
                    ) ?>
                </span>

                <span>
                    <i class="fa-regular fa-calendar"></i>

                    <?= Yii::$app->formatter->asDatetime(
                        $foro->fecha_creacion,
                        'php:d/m/Y H:i'
                    ) ?>
                </span>
            </div>

        </header>

        <section class="debate-content">

            <div class="debate-content-label">
                <i class="fa-solid fa-book-open"></i>
                CONTENIDO DEL DEBATE
            </div>

            <p><?= nl2br(Html::encode($foro->contenido)) ?></p>

        </section>

        <section class="respuestas-section">

            <div class="respuestas-title">
                <h2>
                    <i class="fa-solid fa-comments"></i>
                    Respuestas
                    <span class="respuestas-count">
                        <?= count($respuestas) ?>
                    </span>
                </h2>
            </div>

            <?php if (!empty($respuestas)): ?>

                <?php foreach ($respuestas as $item): ?>

                    <article class="respuesta-card">

                        <div class="respuesta-top">

                            <div class="usuario-info">

                                <div class="usuario-avatar">
                                    <i class="fa-solid fa-user"></i>
                                </div>

                                <div>
                                    <div class="usuario-nombre">
                                        <?= Html::encode(
                                            $item->usuario->nombre
                                            ?? $item->usuario->username
                                            ?? 'Usuario'
                                        ) ?>
                                    </div>

                                    <div class="usuario-fecha">
                                        <i class="fa-regular fa-clock"></i>

                                        <?= Yii::$app->formatter->asDatetime(
                                            $item->fecha_creacion,
                                            'php:d/m/Y H:i'
                                        ) ?>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="respuesta-contenido">
                            <?= nl2br(Html::encode($item->contenido)) ?>
                        </div>

                        <?php
                        $esAdmin = !Yii::$app->user->isGuest
                            && Yii::$app->user->identity->role === 'admin';

                        $esPropietario = !Yii::$app->user->isGuest
                            && (int) $item->usuario_id === (int) Yii::$app->user->id;
                        ?>

                        <?php if ($esAdmin || $esPropietario): ?>

                            <div class="respuesta-acciones">

                                <?= Html::beginForm(
                                    ['/foro/delete-reply', 'id' => $item->id],
                                    'post',
                                    [
                                        'onsubmit' => "return confirm('¿Estás seguro de que deseas eliminar esta respuesta?');",
                                    ]
                                ) ?>

                                <?= Html::submitButton(
                                    '<i class="fa-solid fa-trash"></i> Eliminar respuesta',
                                    [
                                        'class' => 'btn-eliminar',
                                        'encode' => false,
                                    ]
                                ) ?>

                                <?= Html::endForm() ?>

                            </div>

                        <?php endif; ?>

                    </article>

                <?php endforeach; ?>

            <?php else: ?>

                <div class="sin-respuestas">

                    <div class="sin-respuestas-icon">
                        <i class="fa-regular fa-comments"></i>
                    </div>

                    <h3>Inicia la conversación</h3>

                    <p>
                        Todavía no hay respuestas en este debate.
                        Comparte tu perspectiva para enriquecer el intercambio de ideas.
                    </p>

                </div>

            <?php endif; ?>

        </section>

        <section class="responder-card">

            <div class="responder-header">

                <div class="responder-icon">
                    <i class="fa-solid fa-pen-to-square"></i>
                </div>

                <div>
                    <h2>Participa en el debate</h2>

                    <p>
                        Comparte una respuesta fundamentada y respeta las opiniones
                        de los demás participantes.
                    </p>
                </div>

            </div>

            <?php if (!Yii::$app->user->isGuest): ?>

                <?php $form = ActiveForm::begin([
                    'action' => Url::to([
                        '/foro/reply',
                        'foro_id' => $foro->id,
                    ]),
                    'method' => 'post',
                    'id' => 'form-respuesta',
                    'enableClientValidation' => true,
                ]); ?>

                <?= $form->field($respuesta, 'contenido')->textarea([
                    'rows' => 5,
                    'placeholder' => 'Escribe aquí tu análisis, opinión o respuesta...',
                    'maxlength' => true,
                    'aria-label' => 'Contenido de la respuesta',
                ])->label('Tu respuesta') ?>

                <?= Html::submitButton(
                    '<i class="fa-solid fa-paper-plane"></i> Publicar respuesta',
                    [
                        'class' => 'btn-responder',
                        'encode' => false,
                    ]
                ) ?>

                <?php ActiveForm::end(); ?>

            <?php else: ?>

                <div class="debate-login-notice">
                    <i class="fa-solid fa-lock"></i>

                    <span>
                        Debes iniciar sesión para participar y publicar una respuesta
                        en este debate.
                    </span>
                </div>

                <?= Html::a(
                    '<i class="fa-solid fa-right-to-bracket"></i> Iniciar sesión',
                    ['/site/login'],
                    [
                        'class' => 'btn-responder',
                        'encode' => false,
                    ]
                ) ?>

            <?php endif; ?>

        </section>

    </div>
</div>
