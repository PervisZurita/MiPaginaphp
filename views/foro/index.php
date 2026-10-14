<?php

declare(strict_types=1);

use yii\helpers\Html;

$this->title = 'Foro de Debate';

$this->registerCss(<<<'CSS'
.foro-page {
    --f-primary: #7189b5;
    --f-primary-dark: #506a96;
    --f-lavender: #e9e3f8;
    --f-blue: #e3edfb;
    --f-pink: #f8e7ef;
    --f-mint: #e2f3e9;
    --f-ink: #435675;
    --f-muted: #8490a5;
    --f-border: #e4e9f2;
    --f-white: #ffffff;

    width: 100%;
    min-height: 100vh;
    padding: 35px 28px 75px;
    background:
        radial-gradient(ellipse at 0% 0%, rgba(220,234,247,.8), transparent 32%),
        radial-gradient(ellipse at 100% 10%, rgba(233,227,248,.7), transparent 30%),
        linear-gradient(145deg, #f8faff, #f8f7fc 55%, #f5faf9);
    color: var(--f-ink);
    font-family: inherit;
}

.foro-page *,
.foro-page *::before,
.foro-page *::after {
    box-sizing: border-box;
}

.foro-container {
    width: 100%;
    max-width: 1450px;
    margin: 0 auto;
    animation: foroReveal .45s ease both;
}

@keyframes foroReveal {
    from {
        opacity: 0;
        transform: translateY(12px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* CABECERA */

.foro-header {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    display: grid;
    grid-template-columns: minmax(0, 1fr) 175px;
    align-items: center;
    gap: 35px;
    min-height: 295px;
    padding: 45px 48px;
    margin-bottom: 35px;
    border: 1px solid rgba(255,255,255,.9);
    border-radius: 24px;
    background: linear-gradient(120deg, #e3edfb 0%, #eae7fa 55%, #f7e8f0 100%);
    box-shadow: 0 12px 35px rgba(93,110,150,.08);
}

.foro-header::before {
    content: "";
    position: absolute;
    z-index: -1;
    top: -160px;
    right: 10px;
    width: 430px;
    height: 430px;
    border: 1px solid rgba(115,132,177,.18);
    border-radius: 50%;
    box-shadow:
        0 0 0 32px rgba(255,255,255,.15),
        0 0 0 70px rgba(255,255,255,.12),
        0 0 0 110px rgba(255,255,255,.09);
    pointer-events: none;
}

.foro-header::after {
    content: "";
    position: absolute;
    z-index: -1;
    bottom: -120px;
    left: 35%;
    width: 250px;
    height: 250px;
    border-radius: 50%;
    background: rgba(255,255,255,.16);
    filter: blur(2px);
}

.foro-header-content {
    position: relative;
    z-index: 1;
    max-width: 800px;
}

.foro-eyebrow {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 22px;
    color: #7b79a8;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 2px;
    line-height: 1.8;
    text-transform: uppercase;
}

.foro-eyebrow::before {
    content: "";
    width: 25px;
    height: 2px;
    flex-shrink: 0;
    border-radius: 5px;
    background: #a99bcf;
}

.foro-header h1 {
    margin: 0 0 18px;
    color: #435675;
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(37px, 4vw, 54px);
    font-weight: 700;
    letter-spacing: -1px;
    line-height: 1.12;
}

.foro-header h1 span {
    display: block;
    margin-top: 5px;
    color: #8b82b8;
    font-style: italic;
}

.foro-header p {
    max-width: 690px;
    margin: 0;
    color: #687793;
    font-size: 13px;
    line-height: 2;
}

.foro-header-symbol {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    justify-self: center;
    width: 145px;
    height: 145px;
    border: 1px solid rgba(255,255,255,.95);
    border-radius: 38px;
    background: rgba(255,255,255,.55);
    color: #8194bd;
    box-shadow: 0 12px 30px rgba(100,118,158,.08);
    transform: rotate(3deg);
}

.foro-header-symbol::before {
    content: "";
    position: absolute;
    inset: 9px;
    border: 1px solid rgba(145,153,192,.22);
    border-radius: 30px;
}

.foro-header-symbol i {
    font-size: 53px;
    transform: rotate(-3deg);
}

/* BARRA DE CONTENIDO */

.foro-toolbar {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 25px;
    margin-bottom: 25px;
}

.foro-toolbar-info {
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.foro-section-label {
    color: #9586be;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.8px;
    text-transform: uppercase;
}

.foro-toolbar h2 {
    margin: 0;
    color: #435675;
    font-family: Georgia, "Times New Roman", serif;
    font-size: 30px;
    font-weight: 700;
    letter-spacing: -.4px;
    line-height: 1.4;
}

.foro-toolbar p {
    margin: 0;
    color: var(--f-muted);
    font-size: 12px;
    line-height: 1.8;
}

.foro-toolbar-action {
    display: flex;
    align-items: center;
    gap: 12px;
    flex-shrink: 0;
}

/* BOTÓN NUEVO */

.btn-nuevo {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    min-height: 47px;
    padding: 13px 20px;
    border: 1px solid #8097bd;
    border-radius: 12px;
    background: linear-gradient(135deg, #8298bf, #9a9fca);
    color: #fff !important;
    font-size: 12px;
    font-weight: 800;
    text-decoration: none !important;
    white-space: nowrap;
    box-shadow: 0 6px 16px rgba(112,136,181,.16);
    transition: all .22s ease;
}

.btn-nuevo i {
    color: #fff;
    font-size: 12px;
}

.btn-nuevo:hover {
    transform: translateY(-2px);
    border-color: #7189b5;
    background: linear-gradient(135deg, #7189b5, #8a91c1);
    box-shadow: 0 9px 21px rgba(112,136,181,.25);
}

.btn-nuevo:focus-visible,
.btn-ver:focus-visible,
.foro-card h3 a:focus-visible {
    outline: 3px solid #c4d5f1;
    outline-offset: 4px;
}

/* LISTA DE DEBATES */

.foro-lista {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 20px;
}

.foro-card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    min-height: 270px;
    padding: 27px 28px 23px;
    overflow: hidden;
    border: 1px solid var(--f-border);
    border-radius: 20px;
    background: rgba(255,255,255,.94);
    box-shadow: 0 5px 18px rgba(85,102,139,.035);
    transition: border-color .25s ease, box-shadow .25s ease, transform .25s ease;
}

.foro-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: linear-gradient(90deg, #c7d9f3, #d9cff2, #f1d5e2);
    opacity: .85;
}

.foro-card:hover {
    transform: translateY(-4px);
    border-color: #d4dced;
    box-shadow: 0 15px 32px rgba(78,96,133,.09);
}

.foro-card-top {
    display: flex;
    flex: 1;
    flex-direction: column;
    min-width: 0;
}

.foro-card-content {
    flex: 1;
    min-width: 0;
}

.foro-card-overline {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 16px;
}

.foro-card-category {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 7px 11px;
    border: 1px solid #e5e0f5;
    border-radius: 9px;
    background: #f4f1fc;
    color: #8178ae;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: .9px;
    line-height: 1.5;
    text-transform: uppercase;
}

.foro-card-category::before {
    content: "";
    width: 6px;
    height: 6px;
    flex-shrink: 0;
    border-radius: 50%;
    background: #aa9bd7;
}

.foro-card h3 {
    margin: 0 0 13px;
    color: #435675;
    font-family: Georgia, "Times New Roman", serif;
    font-size: 22px;
    font-weight: 700;
    letter-spacing: -.2px;
    line-height: 1.45;
}

.foro-card h3 a {
    color: #435675;
    text-decoration: none;
    overflow-wrap: anywhere;
    transition: color .2s ease;
}

.foro-card h3 a:hover {
    color: #8b80b9;
}

.foro-contenido {
    display: -webkit-box;
    margin: 0 0 23px;
    overflow: hidden;
    color: #77849a;
    font-size: 12px;
    line-height: 1.95;
    overflow-wrap: anywhere;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 3;
}

/* PIE DE TARJETA */

.foro-card-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    padding-top: 17px;
    margin-top: auto;
    border-top: 1px solid #edf0f6;
}

.foro-meta {
    display: flex;
    flex-direction: column;
    gap: 9px;
    min-width: 0;
    color: var(--f-muted);
    font-size: 11px;
}

.foro-meta span {
    display: flex;
    align-items: center;
    gap: 9px;
    min-width: 0;
    line-height: 1.7;
    overflow-wrap: anywhere;
}

.foro-meta i {
    width: 14px;
    flex-shrink: 0;
    color: #a096c8;
    text-align: center;
}

.foro-meta .foro-autor {
    color: #5b6d8c;
    font-weight: 800;
}

/* BOTÓN LEER */

.btn-ver {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    flex-shrink: 0;
    padding: 10px 0 10px 10px;
    border: none;
    background: transparent;
    color: #7189b5 !important;
    font-size: 11px;
    font-weight: 800;
    text-decoration: none !important;
    white-space: nowrap;
    transition: color .2s ease;
}

.btn-ver i {
    color: #a096c8;
    font-size: 11px;
    transition: transform .2s ease;
}

.btn-ver:hover {
    color: #8b80b9 !important;
}

.btn-ver:hover i {
    transform: translateX(4px);
}

/* ESTADO VACÍO */

.foro-empty {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 70px 25px;
    border: 1px solid var(--f-border);
    border-radius: 22px;
    background: rgba(255,255,255,.94);
    text-align: center;
    box-shadow: 0 8px 25px rgba(85,102,139,.04);
}

.foro-empty-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 88px;
    height: 88px;
    margin-bottom: 24px;
    border: 1px solid #e3ddf4;
    border-radius: 25px;
    background: linear-gradient(135deg, #e3edfb, #eee8fa);
    color: #8993bf;
    font-size: 32px;
}

.foro-empty .foro-section-label {
    margin-bottom: 12px;
}

.foro-empty h3 {
    max-width: 650px;
    margin: 0 0 13px;
    color: #435675;
    font-family: Georgia, "Times New Roman", serif;
    font-size: 28px;
    font-weight: 700;
    line-height: 1.45;
}

.foro-empty p {
    max-width: 530px;
    margin: 0 0 25px;
    color: var(--f-muted);
    font-size: 12px;
    line-height: 2;
}

/* RESPONSIVE */

@media (min-width: 1500px) {
    .foro-container {
        max-width: 1600px;
    }

    .foro-header {
        padding: 52px 55px;
    }

    .foro-card {
        padding: 30px 32px 25px;
    }
}

@media (max-width: 1000px) {
    .foro-page {
        padding-right: 22px;
        padding-left: 22px;
    }

    .foro-header {
        grid-template-columns: minmax(0, 1fr) 125px;
        gap: 22px;
        padding: 38px;
    }

    .foro-header-symbol {
        width: 110px;
        height: 110px;
        border-radius: 30px;
    }

    .foro-header-symbol i {
        font-size: 40px;
    }

    .foro-lista {
        gap: 16px;
    }

    .foro-card {
        padding: 23px;
    }

    .foro-card h3 {
        font-size: 20px;
    }

    .foro-card-footer {
        align-items: flex-start;
        flex-direction: column;
        gap: 10px;
    }

    .btn-ver {
        padding-left: 0;
    }
}

@media (max-width: 700px) {
    .foro-page {
        padding: 20px 13px 45px;
    }

    .foro-header {
        display: block;
        min-height: auto;
        padding: 30px 23px;
        margin-bottom: 28px;
        border-radius: 20px;
    }

    .foro-header-symbol {
        display: none;
    }

    .foro-header::before {
        right: -220px;
    }

    .foro-eyebrow {
        gap: 8px;
        margin-bottom: 19px;
        font-size: 9px;
        letter-spacing: 1.3px;
    }

    .foro-header h1 {
        font-size: 39px;
        letter-spacing: -.7px;
    }

    .foro-header p {
        font-size: 12px;
        line-height: 1.9;
    }

    .foro-toolbar {
        align-items: stretch;
        flex-direction: column;
        gap: 19px;
        margin-bottom: 20px;
    }

    .foro-toolbar h2 {
        font-size: 26px;
    }

    .foro-toolbar-action,
    .foro-toolbar-action .btn-nuevo {
        width: 100%;
    }

    .foro-lista {
        grid-template-columns: minmax(0, 1fr);
        gap: 15px;
    }

    .foro-card {
        min-height: 0;
        padding: 24px 21px 19px;
        border-radius: 17px;
    }

    .foro-card h3 {
        font-size: 21px;
    }

    .foro-card-footer {
        align-items: center;
        flex-direction: row;
        gap: 12px;
    }

    .foro-meta {
        font-size: 10px;
    }

    .btn-ver {
        padding-top: 5px;
        white-space: normal;
    }

    .foro-empty {
        padding: 48px 20px;
        border-radius: 18px;
    }

    .foro-empty h3 {
        font-size: 24px;
    }
}

@media (max-width: 390px) {
    .foro-header {
        padding: 25px 18px;
    }

    .foro-header h1 {
        font-size: 33px;
    }

    .foro-card {
        padding-right: 17px;
        padding-left: 17px;
    }

    .foro-card-footer {
        align-items: flex-start;
        flex-direction: column;
    }

    .btn-ver {
        padding-left: 0;
    }

    .foro-empty h3 {
        font-size: 22px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .foro-container {
        animation: none;
    }

    .foro-card,
    .foro-card h3 a,
    .btn-nuevo,
    .btn-ver,
    .btn-ver i {
        transition: none;
    }
}
CSS);
?>

<div class="foro-page">
    <main class="foro-container">

        <header class="foro-header">

            <div class="foro-header-content">

                <div class="foro-eyebrow">
                    Comunidad académica
                </div>

                <h1>
                    Foro de
                    <span>Debate</span>
                </h1>

                <p>
                    Un espacio de encuentro para el pensamiento crítico,
                    el intercambio de conocimientos y la reflexión sobre
                    los principios éticos que orientan la investigación
                    científica responsable.
                </p>

            </div>

            <div class="foro-header-symbol" aria-hidden="true">
                <i class="fa-solid fa-scale-balanced"></i>
            </div>

        </header>

        <section class="foro-toolbar">

            <div class="foro-toolbar-info">

                <span class="foro-section-label">
                    Intercambio de ideas
                </span>

                <h2>Conversaciones académicas</h2>

                <p>
                    Descubre otras perspectivas y aporta tus propias reflexiones.
                </p>

            </div>

            <div class="foro-toolbar-action">

                <?= Html::a(
                    '<i class="fa-solid fa-plus" aria-hidden="true"></i> Iniciar un debate',
                    ['create'],
                    ['class' => 'btn-nuevo', 'encode' => false]
                ) ?>

            </div>

        </section>

        <?php if (!empty($foros)): ?>

            <section class="foro-lista" aria-label="Debates publicados">

                <?php foreach ($foros as $foro): ?>

                    <article class="foro-card">

                        <div class="foro-card-top">

                            <div class="foro-card-content">

                                <div class="foro-card-overline">
                                    <span class="foro-card-category">
                                        Ética e investigación
                                    </span>
                                </div>

                                <h3>
                                    <?= Html::a(
                                        Html::encode($foro->titulo),
                                        ['view', 'id' => $foro->id]
                                    ) ?>
                                </h3>

                                <div class="foro-contenido">
                                    <?= nl2br(Html::encode($foro->contenido)) ?>
                                </div>

                            </div>

                            <footer class="foro-card-footer">

                                <div class="foro-meta">

                                    <span class="foro-autor">
                                        <i class="fa-regular fa-user"
                                           aria-hidden="true"></i>

                                        <?= Html::encode(
                                            $foro->usuario->nombre
                                            ?? $foro->usuario->username
                                            ?? 'Usuario'
                                        ) ?>
                                    </span>

                                    <span>
                                        <i class="fa-regular fa-calendar"
                                           aria-hidden="true"></i>

                                        <?= Html::encode(
                                            Yii::$app->formatter->asDatetime(
                                                $foro->fecha_creacion,
                                                'php:d/m/Y · H:i'
                                            )
                                        ) ?>
                                    </span>

                                </div>

                                <?= Html::a(
                                    'Leer debate <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>',
                                    ['view', 'id' => $foro->id],
                                    [
                                        'class' => 'btn-ver',
                                        'encode' => false,
                                    ]
                                ) ?>

                            </footer>

                        </div>

                    </article>

                <?php endforeach; ?>

            </section>

        <?php else: ?>

            <section class="foro-empty">

                <div class="foro-empty-icon">
                    <i class="fa-regular fa-comments"
                       aria-hidden="true"></i>
                </div>

                <span class="foro-section-label">
                    Un espacio por construir
                </span>

                <h3>Las grandes ideas comienzan con una pregunta</h3>

                <p>
                    Aún no hay debates publicados. Abre una conversación,
                    plantea una inquietud ética o comparte una reflexión
                    que contribuya al diálogo de la comunidad investigadora.
                </p>

                <?= Html::a(
                    '<i class="fa-solid fa-plus" aria-hidden="true"></i> Crear el primer debate',
                    ['create'],
                    [
                        'class' => 'btn-nuevo',
                        'encode' => false,
                    ]
                ) ?>

            </section>

        <?php endif; ?>

    </main>
</div>
