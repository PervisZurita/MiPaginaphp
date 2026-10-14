<?php

declare(strict_types=1);

use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'Servicios | Código de Ética de la Investigación Científica';

$this->registerCssFile(
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css'
);

$this->registerCss(<<<'CSS'
.content-section {
    --srv-text: #344054;
    --srv-muted: #748094;
    --srv-blue: #e5edfc;
    --srv-blue-strong: #6689c9;
    --srv-lilac: #f0e8fb;
    --srv-lilac-strong: #9a7bc5;
    --srv-mint: #e2f3e9;
    --srv-mint-strong: #5eaa83;
    --srv-pink: #fbe8ee;
    --srv-pink-strong: #d681a0;
    --srv-peach: #fff0e2;
    --srv-peach-strong: #d99b69;
    --srv-border: #e9eaf1;

    width: 100%;
    min-height: calc(100vh - 78px);
    padding: 56px clamp(18px, 4vw, 64px) 70px;
    background:
        radial-gradient(ellipse at 5% 5%, rgba(229, 237, 252, .65), transparent 35%),
        radial-gradient(ellipse at 95% 45%, rgba(240, 232, 251, .55), transparent 32%),
        #fbfcff;
    color: var(--srv-text);
    box-sizing: border-box;
    overflow: hidden;
}

.content-section *,
.content-section *::before,
.content-section *::after {
    box-sizing: border-box;
}

.section-container {
    width: 100%;
    max-width: 1500px;
    margin: 0 auto;
}

.section-header {
    max-width: 790px;
    margin: 0 auto 48px;
    text-align: center;
}

.section-label {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    padding: 10px 17px;
    margin-bottom: 20px;
    border: 1px solid #dce6fa;
    border-radius: 50px;
    background: #eef3fd;
    color: #5d78ad;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.section-label i {
    font-size: 14px;
}

.section-header h1 {
    margin: 0 0 20px;
    color: #34445d;
    font-size: clamp(30px, 4vw, 48px);
    font-weight: 800;
    line-height: 1.2;
    letter-spacing: -1.4px;
}

.section-header h1 span {
    display: block;
    margin-top: 5px;
    color: #819bd0;
}

.section-header > p {
    max-width: 680px;
    margin: 0 auto;
    color: var(--srv-muted);
    font-size: 16px;
    line-height: 1.9;
}

.services-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 22px;
    align-items: stretch;
}

.service-card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    padding: 29px 24px 25px;
    overflow: hidden;
    border: 1px solid var(--srv-border);
    border-radius: 23px;
    background: rgba(255, 255, 255, .94);
    box-shadow: 0 9px 28px rgba(55, 71, 103, .045);
    transition: transform .28s ease, box-shadow .28s ease, border-color .28s ease;
    animation: srvFadeIn .55s ease both;
}

.service-card:nth-child(2) {
    animation-delay: .08s;
}

.service-card:nth-child(3) {
    animation-delay: .16s;
}

.service-card:nth-child(4) {
    animation-delay: .24s;
}

.service-card::before {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 5px;
    content: "";
    background: var(--card-accent, #b9ccef);
}

.service-card:nth-child(1) {
    --card-bg: var(--srv-blue);
    --card-accent: #a8bee9;
    --card-icon: #6d8dc9;
}

.service-card:nth-child(2) {
    --card-bg: var(--srv-lilac);
    --card-accent: #d0b8ec;
    --card-icon: #9a7bc5;
}

.service-card:nth-child(3) {
    --card-bg: var(--srv-mint);
    --card-accent: #afdcc3;
    --card-icon: #5eaa83;
}

.service-card:nth-child(4) {
    --card-bg: var(--srv-pink);
    --card-accent: #edbfd0;
    --card-icon: #ce809e;
}

.service-card:hover {
    transform: translateY(-7px);
    border-color: var(--card-accent);
    box-shadow: 0 18px 38px rgba(55, 71, 103, .10);
}

.service-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 66px;
    height: 66px;
    margin-bottom: 23px;
    border: 1px solid rgba(255, 255, 255, .85);
    border-radius: 20px;
    background: var(--card-bg);
    color: var(--card-icon);
    font-size: 27px;
    box-shadow: 0 5px 14px rgba(55, 71, 103, .04);
    transition: transform .25s ease;
}

.service-card:hover .service-icon {
    transform: scale(1.06) rotate(-3deg);
}

.service-content {
    display: flex;
    flex: 1;
    flex-direction: column;
    align-items: flex-start;
}

.service-number {
    display: inline-block;
    margin-bottom: 10px;
    color: var(--card-icon);
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 2px;
}

.service-content h2 {
    margin: 0 0 13px;
    color: #39485e;
    font-size: 20px;
    font-weight: 750;
    line-height: 1.4;
}

.service-content p {
    flex: 1;
    margin: 0 0 24px;
    color: #788397;
    font-size: 14px;
    line-height: 1.85;
}

.service-link {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    margin-top: auto;
    color: var(--card-icon);
    font-size: 13px;
    font-weight: 750;
    text-decoration: none;
    transition: gap .2s ease, color .2s ease;
}

.service-link:hover,
.service-link:focus {
    gap: 15px;
    color: #34445d;
    text-decoration: none;
}

.service-link i {
    font-size: 12px;
}

.resources-panel {
    position: relative;
    display: grid;
    grid-template-columns: auto minmax(0, 1fr) auto;
    align-items: center;
    gap: 25px;
    margin-top: 38px;
    padding: 30px 34px;
    border: 1px solid #e8e3f3;
    border-radius: 25px;
    background: linear-gradient(110deg, #f0eafb 0%, #f6f2fc 48%, #eaf4fb 100%);
    box-shadow: 0 10px 30px rgba(83, 77, 125, .045);
}

.resources-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 72px;
    height: 72px;
    flex-shrink: 0;
    border: 1px solid rgba(255, 255, 255, .9);
    border-radius: 22px;
    background: rgba(255, 255, 255, .75);
    color: #9a7bc5;
    font-size: 29px;
}

.resources-content > span {
    display: inline-block;
    margin-bottom: 8px;
    color: #8d79b4;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.resources-content h2 {
    margin: 0 0 9px;
    color: #46506a;
    font-size: clamp(19px, 2vw, 25px);
    font-weight: 800;
    line-height: 1.4;
}

.resources-content p {
    max-width: 650px;
    margin: 0;
    color: #778096;
    font-size: 14px;
    line-height: 1.8;
}

.resources-actions {
    display: flex;
    flex-direction: column;
    align-items: stretch;
    gap: 11px;
    min-width: 205px;
}

.resource-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    min-height: 45px;
    padding: 12px 17px;
    border: 1px solid #dcd5ee;
    border-radius: 12px;
    background: rgba(255, 255, 255, .75);
    color: #75649c;
    font-size: 12px;
    font-weight: 750;
    text-align: center;
    text-decoration: none;
    transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
}

.resource-button:hover,
.resource-button:focus {
    transform: translateY(-2px);
    background: #fff;
    color: #65558c;
    text-decoration: none;
    box-shadow: 0 5px 14px rgba(80, 68, 120, .09);
}

.resource-button.primary {
    border-color: #d2c2ed;
    background: #e7ddf7;
    color: #71599d;
}

.resource-button.primary:hover,
.resource-button.primary:focus {
    background: #ded0f2;
    color: #5f4889;
}

@keyframes srvFadeIn {
    from {
        opacity: 0;
        transform: translateY(12px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (max-width: 1200px) {
    .services-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }

    .service-card {
        padding: 27px;
    }

    .resources-panel {
        grid-template-columns: auto minmax(0, 1fr);
    }

    .resources-actions {
        grid-column: 1 / -1;
        flex-direction: row;
        flex-wrap: wrap;
        min-width: 0;
    }

    .resource-button {
        flex: 1;
    }
}

@media (max-width: 700px) {
    .content-section {
        padding: 38px 16px 45px;
    }

    .section-header {
        margin-bottom: 30px;
    }

    .section-label {
        padding: 9px 13px;
        font-size: 9px;
        letter-spacing: 1px;
    }

    .section-header h1 {
        font-size: clamp(28px, 7vw, 38px);
        letter-spacing: -.7px;
    }

    .section-header > p {
        font-size: 14px;
        line-height: 1.8;
    }

    .services-grid {
        grid-template-columns: 1fr;
        gap: 17px;
    }

    .service-card {
        padding: 25px 23px;
        border-radius: 20px;
    }

    .service-icon {
        width: 59px;
        height: 59px;
        margin-bottom: 19px;
        border-radius: 17px;
        font-size: 24px;
    }

    .service-content h2 {
        font-size: 19px;
    }

    .resources-panel {
        grid-template-columns: 1fr;
        gap: 17px;
        margin-top: 25px;
        padding: 24px 21px;
        border-radius: 21px;
    }

    .resources-icon {
        width: 59px;
        height: 59px;
        border-radius: 18px;
        font-size: 24px;
    }

    .resources-actions {
        grid-column: auto;
        flex-direction: column;
        width: 100%;
    }

    .resource-button {
        width: 100%;
        flex: initial;
    }
}

@media (prefers-reduced-motion: reduce) {
    .service-card,
    .service-icon,
    .service-link,
    .resource-button {
        animation: none;
        transition: none;
    }
}
CSS);
?>

<section id="servicios" class="content-section">

    <div class="section-container">

        <header class="section-header">

            <span class="section-label">
                <i class="fa-solid fa-book-open" aria-hidden="true"></i>
                RECURSOS ACADÉMICOS
            </span>

            <h1>
                Código de Ética de la
                <span>Investigación Científica</span>
            </h1>

            <p>
                Explora recursos diseñados para conocer, comprender
                y aplicar los principios éticos que orientan una
                investigación científica responsable.
            </p>

        </header>

        <div class="services-grid">

            <article class="service-card">
                <div class="service-icon">
                    <i class="fa-solid fa-scale-balanced" aria-hidden="true"></i>
                </div>

                <div class="service-content">
                    <span class="service-number">01 / PRINCIPIOS</span>

                    <h2>Principios éticos</h2>

                    <p>
                        Conoce los principios fundamentales que
                        orientan una investigación científica,
                        como respeto, responsabilidad, honestidad,
                        justicia e integridad.
                    </p>

                    <?= Html::a(
                        'Conocer principios <i class="fa-solid fa-arrow-right"></i>',
                        ['site/principios'],
                        [
                            'class' => 'service-link',
                            'encode' => false,
                            'aria-label' => 'Conocer los principios éticos'
                        ]
                    ) ?>
                </div>
            </article>

            <article class="service-card">
                <div class="service-icon">
                    <i class="fa-solid fa-flask" aria-hidden="true"></i>
                </div>

                <div class="service-content">
                    <span class="service-number">02 / INTEGRIDAD</span>

                    <h2>Integridad científica</h2>

                    <p>
                        Aprende sobre honestidad académica,
                        transparencia, rigor científico y
                        responsabilidad en la generación y
                        comunicación de conocimientos.
                    </p>

                    <?= Html::a(
                        'Explorar integridad <i class="fa-solid fa-arrow-right"></i>',
                        ['site/integridad'],
                        [
                            'class' => 'service-link',
                            'encode' => false,
                            'aria-label' => 'Explorar integridad científica'
                        ]
                    ) ?>
                </div>
            </article>

            <article class="service-card">
                <div class="service-icon">
                    <i class="fa-solid fa-user-shield" aria-hidden="true"></i>
                </div>

                <div class="service-content">
                    <span class="service-number">03 / PROTECCIÓN</span>

                    <h2>Protección de participantes</h2>

                    <p>
                        Comprende la importancia del consentimiento
                        informado, la confidencialidad, la privacidad
                        y el respeto de los derechos de las personas
                        que participan en una investigación.
                    </p>

                    <?= Html::a(
                        'Conocer más <i class="fa-solid fa-arrow-right"></i>',
                        ['site/participantes'],
                        [
                            'class' => 'service-link',
                            'encode' => false,
                            'aria-label' => 'Conocer protección de participantes'
                        ]
                    ) ?>
                </div>
            </article>

            <article class="service-card">
                <div class="service-icon">
                    <i class="fa-solid fa-graduation-cap" aria-hidden="true"></i>
                </div>

                <div class="service-content">
                    <span class="service-number">04 / FORMACIÓN</span>

                    <h2>Buenas prácticas</h2>

                    <p>
                        Fortalece tus conocimientos sobre buenas
                        prácticas de investigación, prevención del
                        plagio, conflictos de interés y comunicación
                        responsable de resultados.
                    </p>

                    <?= Html::a(
                        'Aprender más <i class="fa-solid fa-arrow-right"></i>',
                        ['site/buenas-practicas'],
                        [
                            'class' => 'service-link',
                            'encode' => false,
                            'aria-label' => 'Aprender sobre buenas prácticas'
                        ]
                    ) ?>
                </div>
            </article>

        </div>

        <div class="resources-panel">

            <div class="resources-icon">
                <i class="fa-solid fa-lightbulb" aria-hidden="true"></i>
            </div>

            <div class="resources-content">
                <span>APRENDE Y REFLEXIONA</span>

                <h2>Recursos para tu formación científica</h2>

                <p>
                    Consulta preguntas frecuentes, videos educativos
                    y otros recursos para fortalecer tus conocimientos
                    sobre ética e integridad en la investigación.
                </p>
            </div>

            <div class="resources-actions">

                <?= Html::a(
                    '<i class="fa-solid fa-circle-play" aria-hidden="true"></i> Videos',
                    ['site/videos'],
                    [
                        'class' => 'resource-button primary',
                        'encode' => false
                    ]
                ) ?>

                <?= Html::a(
                    '<i class="fa-solid fa-comments" aria-hidden="true"></i> Preguntas frecuentes',
                    ['preguntas-frecuentes/index'],
                    [
                        'class' => 'resource-button',
                        'encode' => false
                    ]
                ) ?>

            </div>

        </div>

    </div>

</section>
