<?php

declare(strict_types=1);

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'Protección de Participantes | Investigación Científica';

$this->registerCssFile(
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css'
);

$this->registerCss(<<<'CSS'
.ethics-page {
    --ep-text: #334155;
    --ep-muted: #64748b;
    --ep-primary: #6579b8;
    --ep-primary-dark: #4c609b;
    --ep-border: #e7eaf3;
    --ep-white: #ffffff;

    width: 100%;
    min-height: calc(100vh - 78px);
    padding: 42px clamp(16px, 4vw, 60px) 55px;
    box-sizing: border-box;
    background:
        radial-gradient(ellipse at 5% 5%, #e6efff 0, transparent 32%),
        radial-gradient(ellipse at 95% 25%, #f9e9f4 0, transparent 30%),
        linear-gradient(145deg, #f8faff 0%, #fdf9ff 52%, #f2fbf8 100%);
    color: var(--ep-text);
    font-family: inherit;
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
    position: relative;
    overflow: hidden;
    padding: clamp(28px, 4vw, 52px);
    margin-bottom: 30px;
    border: 1px solid rgba(255, 255, 255, .9);
    border-radius: 28px;
    background: rgba(255, 255, 255, .82);
    box-shadow: 0 14px 45px rgba(100, 116, 160, .09);
    text-align: center;
}

.ethics-header::before {
    position: absolute;
    top: -100px;
    right: -65px;
    width: 240px;
    height: 240px;
    border-radius: 50%;
    background: #e7eaff;
    content: "";
    opacity: .7;
}

.ethics-header::after {
    position: absolute;
    bottom: -100px;
    left: -45px;
    width: 200px;
    height: 200px;
    border-radius: 50%;
    background: #e2f5ee;
    content: "";
    opacity: .75;
}

.ethics-header > * {
    position: relative;
    z-index: 1;
}

.ethics-label {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 10px 17px;
    margin-bottom: 19px;
    border: 1px solid #dce4fb;
    border-radius: 30px;
    background: #eef2ff;
    color: #586ba7;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 1.3px;
}

.ethics-label i {
    font-size: 15px;
}

.ethics-header h1 {
    max-width: 950px;
    margin: 0 auto 17px;
    color: #263650;
    font-size: clamp(28px, 4vw, 46px);
    font-weight: 800;
    line-height: 1.2;
    letter-spacing: -.8px;
}

.ethics-header h1 span {
    display: block;
    margin-top: 7px;
    color: #7889c5;
}

.ethics-header p {
    max-width: 850px;
    margin: 0 auto;
    color: var(--ep-muted);
    font-size: 16px;
    line-height: 1.9;
}

/* INTRODUCCIÓN */

.ethics-intro {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    padding: 23px 25px;
    margin-bottom: 34px;
    border: 1px solid #dcefe9;
    border-radius: 20px;
    background: #f0faf6;
}

.ethics-intro-icon {
    display: flex;
    flex: 0 0 48px;
    align-items: center;
    justify-content: center;
    width: 48px;
    height: 48px;
    border-radius: 15px;
    background: #d9f1e7;
    color: #39856d;
    font-size: 21px;
}

.ethics-intro h2 {
    margin: 0 0 7px;
    color: #326d5c;
    font-size: 19px;
    font-weight: 750;
}

.ethics-intro p {
    margin: 0;
    color: #58766d;
    font-size: 14px;
    line-height: 1.85;
}

/* TÍTULO DE SECCIÓN */

.ethics-section-heading {
    margin: 0 0 22px;
    text-align: center;
}

.ethics-section-heading h2 {
    margin: 0 0 9px;
    color: #334155;
    font-size: clamp(23px, 3vw, 30px);
    font-weight: 800;
}

.ethics-section-heading p {
    margin: 0;
    color: var(--ep-muted);
    font-size: 14px;
    line-height: 1.7;
}

/* TARJETAS */

.ethics-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 22px;
    margin-bottom: 34px;
}

.ethics-card {
    position: relative;
    overflow: hidden;
    min-width: 0;
    padding: 27px 23px;
    border: 1px solid var(--ep-border);
    border-radius: 23px;
    background: rgba(255, 255, 255, .94);
    box-shadow: 0 8px 25px rgba(80, 95, 130, .055);
    transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
}

.ethics-card::before {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 5px;
    background: var(--card-accent, #c9d5f5);
    content: "";
}

.ethics-card:hover {
    transform: translateY(-6px);
    border-color: #d7dff4;
    box-shadow: 0 18px 38px rgba(80, 95, 130, .12);
}

.ethics-card:nth-child(1) {
    --card-accent: #a9baf0;
    --card-bg: #edf0ff;
    --card-color: #6276b8;
}

.ethics-card:nth-child(2) {
    --card-accent: #9bd8c3;
    --card-bg: #e8f8f1;
    --card-color: #408c72;
}

.ethics-card:nth-child(3) {
    --card-accent: #edb8d9;
    --card-bg: #fbedf6;
    --card-color: #b36d9a;
}

.ethics-card:nth-child(4) {
    --card-accent: #f0c89d;
    --card-bg: #fff3e5;
    --card-color: #b77c40;
}

.ethics-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 61px;
    height: 61px;
    margin-bottom: 21px;
    border: 1px solid rgba(255, 255, 255, .8);
    border-radius: 19px;
    background: var(--card-bg);
    color: var(--card-color);
    font-size: 25px;
    box-shadow: 0 5px 13px rgba(70, 80, 120, .045);
}

.ethics-card h3 {
    margin: 0 0 12px;
    color: #334155;
    font-size: 18px;
    font-weight: 750;
    line-height: 1.45;
}

.ethics-card p {
    margin: 0;
    color: #64748b;
    font-size: 14px;
    line-height: 1.85;
}

/* BLOQUES DESTACADOS */

.ethics-feature {
    display: flex;
    align-items: flex-start;
    gap: 20px;
    padding: 28px;
    margin-bottom: 20px;
    border: 1px solid;
    border-radius: 23px;
}

.ethics-feature-icon {
    display: flex;
    flex: 0 0 55px;
    align-items: center;
    justify-content: center;
    width: 55px;
    height: 55px;
    border-radius: 18px;
    font-size: 23px;
}

.ethics-feature h3 {
    margin: 0 0 10px;
    font-size: 20px;
    font-weight: 800;
    line-height: 1.45;
}

.ethics-feature p {
    margin: 0;
    font-size: 14px;
    line-height: 1.9;
}

.ethics-warning {
    border-color: #f1e1bc;
    background: linear-gradient(120deg, #fff9eb, #fffdf7);
}

.ethics-warning .ethics-feature-icon {
    background: #ffedc8;
    color: #a9792d;
}

.ethics-warning h3 {
    color: #8c682c;
}

.ethics-warning p {
    color: #806e50;
}

.ethics-highlight {
    border-color: #d8e7f8;
    background: linear-gradient(120deg, #eff6ff, #f8faff);
}

.ethics-highlight .ethics-feature-icon {
    background: #dceaff;
    color: #5279b6;
}

.ethics-highlight h3 {
    color: #46628f;
}

.ethics-highlight p {
    color: #627792;
}

/* RECOMENDACIONES */

.ethics-checklist {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 14px;
    padding: 26px;
    margin: 30px 0;
    border: 1px solid #e7e5f5;
    border-radius: 23px;
    background: rgba(255, 255, 255, .8);
}

.ethics-checklist h3 {
    grid-column: 1 / -1;
    margin: 0 0 5px;
    color: #475569;
    font-size: 20px;
    font-weight: 800;
}

.ethics-check-item {
    display: flex;
    align-items: flex-start;
    gap: 11px;
    padding: 13px;
    border-radius: 14px;
    background: #f7f6ff;
    color: #5b647b;
    font-size: 14px;
    line-height: 1.7;
}

.ethics-check-item i {
    flex: 0 0 auto;
    margin-top: 4px;
    color: #7b91c7;
}

/* BOTÓN VOLVER */

.ethics-back {
    display: flex;
    justify-content: center;
    padding-top: 15px;
}

.ethics-back .back-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 11px;
    min-height: 49px;
    padding: 13px 23px;
    border: 1px solid #d7def4;
    border-radius: 15px;
    background: #eef2ff;
    color: #586ba7;
    font-size: 14px;
    font-weight: 750;
    text-decoration: none;
    box-shadow: 0 5px 13px rgba(95, 110, 160, .07);
    transition: background .2s ease, color .2s ease, transform .2s ease;
}

.ethics-back .back-button:hover {
    transform: translateY(-2px);
    background: #6579b8;
    color: #fff;
    box-shadow: 0 9px 20px rgba(101, 121, 184, .2);
}

.ethics-back .back-button:focus-visible {
    outline: 3px solid #b8c7f2;
    outline-offset: 4px;
}

/* RESPONSIVE */

@media (max-width: 1150px) {
    .ethics-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 650px) {
    .ethics-page {
        padding: 22px 13px 35px;
    }

    .ethics-header {
        padding: 30px 19px;
        border-radius: 22px;
    }

    .ethics-header h1 {
        font-size: 29px;
    }

    .ethics-header p {
        font-size: 14px;
        line-height: 1.8;
    }

    .ethics-label {
        gap: 7px;
        padding: 9px 12px;
        font-size: 10px;
        letter-spacing: .8px;
    }

    .ethics-intro {
        gap: 12px;
        padding: 18px;
    }

    .ethics-intro-icon {
        flex-basis: 42px;
        width: 42px;
        height: 42px;
    }

    .ethics-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }

    .ethics-card {
        padding: 23px;
    }

    .ethics-feature {
        gap: 13px;
        padding: 20px 17px;
        border-radius: 19px;
    }

    .ethics-feature-icon {
        flex-basis: 43px;
        width: 43px;
        height: 43px;
        border-radius: 14px;
        font-size: 19px;
    }

    .ethics-feature h3 {
        font-size: 17px;
    }

    .ethics-checklist {
        grid-template-columns: 1fr;
        padding: 17px;
    }

    .ethics-checklist h3 {
        font-size: 18px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .ethics-card,
    .ethics-back .back-button {
        transition: none;
    }

    .ethics-card:hover,
    .ethics-back .back-button:hover {
        transform: none;
    }
}
CSS);
?>

<section class="ethics-page">
    <div class="ethics-container">

        <header class="ethics-header">
            <span class="ethics-label">
                <i class="fa-solid fa-user-shield" aria-hidden="true"></i>
                PROTECCIÓN DE PARTICIPANTES
            </span>

            <h1>
                Protección de las personas
                <span>en la Investigación Científica</span>
            </h1>

            <p>
                Toda investigación que involucre personas debe respetar su
                dignidad, autonomía, privacidad y derechos fundamentales,
                procurando proteger su bienestar durante cada etapa del
                proceso investigativo.
            </p>
        </header>

        <section class="ethics-intro" aria-labelledby="ethics-intro-title">
            <div class="ethics-intro-icon">
                <i class="fa-solid fa-hand-holding-heart" aria-hidden="true"></i>
            </div>

            <div>
                <h2 id="ethics-intro-title">La persona es lo más importante</h2>
                <p>
                    La investigación científica debe desarrollarse con respeto,
                    transparencia y responsabilidad. Ningún objetivo académico
                    justifica ignorar los derechos, la seguridad o la dignidad
                    de quienes participan en un estudio.
                </p>
            </div>
        </section>

        <div class="ethics-section-heading">
            <h2>Principios de protección</h2>
            <p>Cuatro aspectos fundamentales para una investigación responsable.</p>
        </div>

        <div class="ethics-grid">

            <article class="ethics-card">
                <div class="ethics-icon">
                    <i class="fa-solid fa-file-signature" aria-hidden="true"></i>
                </div>

                <h3>Consentimiento informado</h3>
                <p>
                    Los participantes deben recibir información clara y suficiente
                    sobre los objetivos, procedimientos, riesgos y beneficios
                    previsibles del estudio antes de decidir libremente si desean
                    participar. El consentimiento debe obtenerse conforme a las
                    normas éticas aplicables.
                </p>
            </article>

            <article class="ethics-card">
                <div class="ethics-icon">
                    <i class="fa-solid fa-lock" aria-hidden="true"></i>
                </div>

                <h3>Confidencialidad</h3>
                <p>
                    La información recopilada debe protegerse contra el acceso,
                    uso o divulgación no autorizados. Los investigadores deben
                    establecer medidas adecuadas para preservar la identidad y
                    la confianza de las personas participantes.
                </p>
            </article>

            <article class="ethics-card">
                <div class="ethics-icon">
                    <i class="fa-solid fa-user-secret" aria-hidden="true"></i>
                </div>

                <h3>Privacidad y datos personales</h3>
                <p>
                    Los datos deben recopilarse y utilizarse para fines legítimos
                    y previamente informados. Es necesario aplicar medidas de
                    seguridad, limitar el acceso y respetar las disposiciones
                    correspondientes sobre protección de datos personales.
                </p>
            </article>

            <article class="ethics-card">
                <div class="ethics-icon">
                    <i class="fa-solid fa-heart-pulse" aria-hidden="true"></i>
                </div>

                <h3>Bienestar de los participantes</h3>
                <p>
                    Antes y durante el estudio, los investigadores deben evaluar
                    los riesgos previsibles, reducir los daños potenciales y
                    proteger la seguridad física, emocional y social de las
                    personas involucradas.
                </p>
            </article>

        </div>

        <section class="ethics-feature ethics-warning" aria-labelledby="ethics-rights-title">
            <div class="ethics-feature-icon">
                <i class="fa-solid fa-scale-balanced" aria-hidden="true"></i>
            </div>

            <div>
                <h3 id="ethics-rights-title">Derechos de las personas participantes</h3>
                <p>
                    La participación debe ser voluntaria y basarse en información
                    suficiente. Cada persona debe poder formular preguntas,
                    rechazar su participación o retirarse de acuerdo con las
                    condiciones éticas y legales aplicables, sin sufrir coerción
                    ni represalias. También deben adoptarse salvaguardas
                    adicionales cuando existan situaciones de vulnerabilidad.
                    Los estudios deben someterse a la revisión ética que corresponda.
                </p>
            </div>
        </section>

        <section class="ethics-feature ethics-highlight" aria-labelledby="ethics-commitment-title">
            <div class="ethics-feature-icon">
                <i class="fa-solid fa-shield-heart" aria-hidden="true"></i>
            </div>

            <div>
                <h3 id="ethics-commitment-title">Compromiso con una investigación responsable</h3>
                <p>
                    Proteger a los participantes no es únicamente un requisito
                    formal, sino una responsabilidad ética. Los investigadores
                    deben actuar con honestidad, anticipar posibles riesgos,
                    explicar las condiciones de participación y establecer
                    procedimientos que permitan proteger los derechos y la
                    información personal durante todo el estudio.
                </p>
            </div>
        </section>

        <section class="ethics-checklist" aria-labelledby="ethics-checklist-title">
            <h3 id="ethics-checklist-title">Buenas prácticas antes de iniciar una investigación</h3>

            <div class="ethics-check-item">
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                <span>Explicar el propósito y los procedimientos de la investigación.</span>
            </div>

            <div class="ethics-check-item">
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                <span>Obtener el consentimiento correspondiente antes de la participación.</span>
            </div>

            <div class="ethics-check-item">
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                <span>Evaluar los riesgos y establecer medidas preventivas.</span>
            </div>

            <div class="ethics-check-item">
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                <span>Restringir el acceso a los datos personales y proteger su almacenamiento.</span>
            </div>

            <div class="ethics-check-item">
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                <span>Respetar la autonomía y las decisiones de cada participante.</span>
            </div>

            <div class="ethics-check-item">
                <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                <span>Solicitar la revisión o autorización ética que corresponda al estudio.</span>
            </div>
        </section>

        <div class="ethics-back">
            <?= Html::a(
                '<i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Volver a servicios',
                ['site/servicios'],
                [
                    'class' => 'back-button',
                    'encode' => false,
                    'aria-label' => 'Volver a la página de servicios',
                ]
            ) ?>
        </div>

    </div>
</section>
