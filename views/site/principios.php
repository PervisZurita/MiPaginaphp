<?php

declare(strict_types=1);

use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'Principios Éticos | Investigación Científica';

$this->registerCssFile(
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css'
);

$this->registerCss(<<<'CSS'
.ethics-page {
    --ethics-text: #39465c;
    --ethics-muted: #788398;
    --ethics-blue: #e6eefc;
    --ethics-blue-icon: #7592cc;
    --ethics-lilac: #f0e8fa;
    --ethics-lilac-icon: #9a7dc2;
    --ethics-mint: #e2f3e9;
    --ethics-mint-icon: #65a884;
    --ethics-pink: #fbe8ee;
    --ethics-pink-icon: #cc829f;
    --ethics-peach: #fff0e2;
    --ethics-peach-icon: #ce986c;
    --ethics-aqua: #e3f2f4;
    --ethics-aqua-icon: #69a6ad;
    --ethics-border: #e8eaf1;

    width: 100%;
    min-height: calc(100vh - 78px);
    padding: 48px clamp(18px, 4vw, 60px) 65px;
    overflow: hidden;
    color: var(--ethics-text);
    background:
        radial-gradient(ellipse at 5% 5%, rgba(230, 238, 252, .75), transparent 35%),
        radial-gradient(ellipse at 95% 38%, rgba(240, 232, 250, .55), transparent 32%),
        #fbfcff;
    box-sizing: border-box;
}

.ethics-page *,
.ethics-page *::before,
.ethics-page *::after {
    box-sizing: border-box;
}

.ethics-container {
    width: 100%;
    max-width: 1450px;
    margin: 0 auto;
}

/* ENCABEZADO */

.ethics-header {
    max-width: 810px;
    margin: 0 auto 43px;
    text-align: center;
}

.ethics-label {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    padding: 10px 16px;
    margin-bottom: 20px;
    border: 1px solid #dce5f7;
    border-radius: 50px;
    background: #edf2fc;
    color: #6f86b7;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.ethics-label i {
    font-size: 14px;
}

.ethics-header h1 {
    margin: 0 0 19px;
    color: #36455d;
    font-size: clamp(31px, 4vw, 48px);
    font-weight: 800;
    line-height: 1.2;
    letter-spacing: -1.2px;
}

.ethics-header h1 span {
    display: block;
    margin-top: 5px;
    color: #8198cb;
}

.ethics-header > p {
    max-width: 690px;
    margin: 0 auto;
    color: var(--ethics-muted);
    font-size: 15px;
    line-height: 1.9;
}

/* TARJETAS */

.ethics-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 23px;
    align-items: stretch;
}

.ethics-card {
    --card-bg: var(--ethics-blue);
    --card-icon: var(--ethics-blue-icon);
    --card-border: #dce6f8;

    position: relative;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    min-width: 0;
    min-height: 260px;
    padding: 29px 28px;
    overflow: hidden;
    border: 1px solid var(--ethics-border);
    border-radius: 23px;
    background: rgba(255, 255, 255, .94);
    box-shadow: 0 9px 28px rgba(57, 70, 92, .04);
    animation: ethicsAppear .5s ease both;
    transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
}

.ethics-card:nth-child(1) {
    --card-bg: var(--ethics-blue);
    --card-icon: var(--ethics-blue-icon);
    --card-border: #dce6f8;
}

.ethics-card:nth-child(2) {
    --card-bg: var(--ethics-lilac);
    --card-icon: var(--ethics-lilac-icon);
    --card-border: #e8def5;
    animation-delay: .07s;
}

.ethics-card:nth-child(3) {
    --card-bg: var(--ethics-mint);
    --card-icon: var(--ethics-mint-icon);
    --card-border: #d8eddf;
    animation-delay: .14s;
}

.ethics-card:nth-child(4) {
    --card-bg: var(--ethics-pink);
    --card-icon: var(--ethics-pink-icon);
    --card-border: #f2dce5;
    animation-delay: .21s;
}

.ethics-card:nth-child(5) {
    --card-bg: var(--ethics-peach);
    --card-icon: var(--ethics-peach-icon);
    --card-border: #f4e3d2;
    animation-delay: .28s;
}

.ethics-card:nth-child(6) {
    --card-bg: var(--ethics-aqua);
    --card-icon: var(--ethics-aqua-icon);
    --card-border: #d8eaec;
    animation-delay: .35s;
}

.ethics-card::before {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background: var(--card-icon);
    opacity: .55;
    content: "";
}

.ethics-card:hover {
    transform: translateY(-6px);
    border-color: var(--card-border);
    box-shadow: 0 17px 35px rgba(57, 70, 92, .085);
}

.ethics-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 65px;
    height: 65px;
    margin-bottom: 22px;
    border: 1px solid rgba(255, 255, 255, .9);
    border-radius: 20px;
    background: var(--card-bg);
    color: var(--card-icon);
    font-size: 26px;
    box-shadow: 0 5px 14px rgba(57, 70, 92, .035);
    transition: transform .25s ease;
}

.ethics-card:hover .ethics-icon {
    transform: scale(1.06) rotate(-3deg);
}

.ethics-card h2 {
    margin: 0 0 12px;
    color: #3d4a60;
    font-size: 20px;
    font-weight: 800;
    line-height: 1.4;
}

.ethics-card p {
    margin: 0;
    color: var(--ethics-muted);
    font-size: 14px;
    line-height: 1.9;
}

/* RECOMENDACIÓN */

.ethics-note {
    display: grid;
    grid-template-columns: auto minmax(0, 1fr);
    align-items: center;
    gap: 22px;
    margin-top: 35px;
    padding: 28px 31px;
    border: 1px solid #e4e2f0;
    border-radius: 23px;
    background: linear-gradient(110deg, #f0eafb 0%, #f6f2fb 52%, #edf5f9 100%);
}

.ethics-note-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 65px;
    height: 65px;
    border: 1px solid #fff;
    border-radius: 20px;
    background: rgba(255, 255, 255, .8);
    color: #9a7dc2;
    font-size: 26px;
}

.ethics-note-label {
    display: block;
    margin-bottom: 7px;
    color: #8d7ab2;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.ethics-note h2 {
    margin: 0 0 8px;
    color: #46516a;
    font-size: clamp(19px, 2.3vw, 25px);
    font-weight: 800;
    line-height: 1.4;
}

.ethics-note p {
    max-width: 900px;
    margin: 0;
    color: #788398;
    font-size: 13px;
    line-height: 1.9;
}

/* NAVEGACIÓN */

.ethics-back {
    display: flex;
    justify-content: center;
    margin-top: 34px;
}

.back-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    min-height: 47px;
    padding: 13px 22px;
    border: 1px solid #dce4f5;
    border-radius: 13px;
    background: #edf2fc;
    color: #6b83b5;
    font-size: 13px;
    font-weight: 800;
    text-decoration: none;
    transition: transform .2s ease, background .2s ease, box-shadow .2s ease;
}

.back-button:hover,
.back-button:focus {
    transform: translateY(-2px);
    background: #e1eafb;
    color: #506caa;
    text-decoration: none;
    box-shadow: 0 7px 18px rgba(100, 128, 185, .1);
}

.back-button:focus-visible {
    outline: 3px solid #b8c9ee;
    outline-offset: 3px;
}

@keyframes ethicsAppear {
    from {
        opacity: 0;
        transform: translateY(10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* DISEÑO RESPONSIVO */

@media (max-width: 1050px) {
    .ethics-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }

    .ethics-card {
        min-height: 240px;
    }
}

@media (max-width: 600px) {
    .ethics-page {
        padding: 35px 16px 45px;
    }

    .ethics-header {
        margin-bottom: 29px;
    }

    .ethics-label {
        padding: 9px 13px;
        font-size: 9px;
        letter-spacing: 1px;
    }

    .ethics-header h1 {
        font-size: clamp(28px, 7vw, 36px);
        letter-spacing: -.7px;
    }

    .ethics-header > p {
        font-size: 14px;
        line-height: 1.8;
    }

    .ethics-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }

    .ethics-card {
        min-height: auto;
        padding: 24px 22px;
        border-radius: 20px;
    }

    .ethics-icon {
        width: 58px;
        height: 58px;
        margin-bottom: 18px;
        border-radius: 17px;
        font-size: 23px;
    }

    .ethics-card h2 {
        font-size: 19px;
    }

    .ethics-card p {
        font-size: 13px;
    }

    .ethics-note {
        grid-template-columns: 1fr;
        gap: 16px;
        margin-top: 25px;
        padding: 23px 21px;
        border-radius: 20px;
    }

    .ethics-note-icon {
        width: 56px;
        height: 56px;
        border-radius: 17px;
        font-size: 23px;
    }

    .ethics-back {
        margin-top: 26px;
    }

    .back-button {
        width: 100%;
    }
}

@media (prefers-reduced-motion: reduce) {
    .ethics-card,
    .ethics-icon,
    .back-button {
        animation: none;
        transition: none;
    }
}
CSS);
?>

<section class="ethics-page">

    <div class="ethics-container">

        <header class="ethics-header">

            <span class="ethics-label">
                <i class="fa-solid fa-scale-balanced" aria-hidden="true"></i>
                PRINCIPIOS ÉTICOS
            </span>

            <h1>
                Principios de la
                <span>Investigación Científica</span>
            </h1>

            <p>
                Los principios éticos orientan las decisiones y
                responsabilidades de quienes participan en procesos
                de investigación científica. Su aplicación fortalece
                la confianza, la transparencia y el respeto por el conocimiento.
            </p>

        </header>

        <div class="ethics-grid">

            <article class="ethics-card">

                <div class="ethics-icon">
                    <i class="fa-solid fa-hand-holding-heart" aria-hidden="true"></i>
                </div>

                <h2>Respeto por las personas</h2>

                <p>
                    Toda investigación debe respetar la dignidad,
                    los derechos, la autonomía y las decisiones
                    de las personas involucradas, procurando que
                    participen de manera libre e informada.
                </p>

            </article>

            <article class="ethics-card">

                <div class="ethics-icon">
                    <i class="fa-solid fa-scale-balanced" aria-hidden="true"></i>
                </div>

                <h2>Justicia</h2>

                <p>
                    Los beneficios, las oportunidades y las cargas
                    de una investigación deben distribuirse de forma
                    equitativa, evitando la discriminación y la
                    explotación de grupos vulnerables.
                </p>

            </article>

            <article class="ethics-card">

                <div class="ethics-icon">
                    <i class="fa-solid fa-shield-halved" aria-hidden="true"></i>
                </div>

                <h2>Responsabilidad</h2>

                <p>
                    El investigador debe actuar con diligencia,
                    evaluar las posibles consecuencias de sus decisiones,
                    proteger a los participantes y responder por el
                    desarrollo y los resultados del estudio.
                </p>

            </article>

            <article class="ethics-card">

                <div class="ethics-icon">
                    <i class="fa-solid fa-check-double" aria-hidden="true"></i>
                </div>

                <h2>Honestidad</h2>

                <p>
                    Los datos, métodos, resultados y conclusiones
                    deben presentarse de forma fiel y transparente,
                    sin falsificación, manipulación ni ocultamiento
                    deliberado de información relevante.
                </p>

            </article>

            <article class="ethics-card">

                <div class="ethics-icon">
                    <i class="fa-solid fa-fingerprint" aria-hidden="true"></i>
                </div>

                <h2>Integridad científica</h2>

                <p>
                    La investigación debe desarrollarse con rigor,
                    coherencia y compromiso con la verdad científica,
                    reconociendo las fuentes, respetando la autoría
                    y declarando los conflictos de interés.
                </p>

            </article>

            <article class="ethics-card">

                <div class="ethics-icon">
                    <i class="fa-solid fa-users" aria-hidden="true"></i>
                </div>

                <h2>Compromiso con la sociedad</h2>

                <p>
                    El conocimiento científico debe considerar sus
                    efectos sociales y ambientales, contribuir al
                    bienestar colectivo y comunicarse de manera
                    responsable y comprensible.
                </p>

            </article>

        </div>

        <aside class="ethics-note">

            <div class="ethics-note-icon">
                <i class="fa-solid fa-lightbulb" aria-hidden="true"></i>
            </div>

            <div>
                <span class="ethics-note-label">
                    INVESTIGAR CON RESPONSABILIDAD
                </span>

                <h2>La ética debe acompañar cada etapa de la investigación.</h2>

                <p>
                    Desde la formulación del problema hasta la difusión
                    de los resultados, las buenas prácticas científicas
                    requieren respeto por las personas, honestidad en
                    el manejo de la información y responsabilidad con
                    la comunidad y el entorno.
                </p>
            </div>

        </aside>

        <div class="ethics-back">

            <?= Html::a(
                '<i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Volver a servicios',
                ['site/servicios'],
                [
                    'class' => 'back-button',
                    'encode' => false
                ]
            ) ?>

        </div>

    </div>

</section>
