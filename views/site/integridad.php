<?php

declare(strict_types=1);

use yii\helpers\Html;

$this->title = 'Integridad Científica | Investigación Responsable';

$this->registerCssFile(
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css'
);

$this->registerCss(<<<'CSS'
.integrity-page {
    --int-text: #344256;
    --int-muted: #68778b;
    --int-primary: #647bb5;
    --int-border: #e6eaf2;

    width: 100%;
    min-height: calc(100vh - 78px);
    padding: 42px clamp(16px, 4vw, 60px) 55px;
    box-sizing: border-box;
    color: var(--int-text);
    background:
        radial-gradient(ellipse at 0% 0%, #e8efff 0, transparent 34%),
        radial-gradient(ellipse at 100% 20%, #f8eafa 0, transparent 30%),
        linear-gradient(145deg, #f8faff 0%, #fdf9ff 55%, #f0faf6 100%);
    font-family: inherit;
}

.integrity-page *,
.integrity-page *::before,
.integrity-page *::after {
    box-sizing: border-box;
}

.integrity-container {
    width: 100%;
    max-width: 1450px;
    margin: 0 auto;
}

/* ENCABEZADO */

.integrity-header {
    position: relative;
    overflow: hidden;
    padding: clamp(30px, 4vw, 52px);
    margin-bottom: 30px;
    border: 1px solid rgba(255, 255, 255, .95);
    border-radius: 28px;
    background: rgba(255, 255, 255, .86);
    box-shadow: 0 14px 42px rgba(90, 105, 145, .08);
    text-align: center;
}

.integrity-header::before,
.integrity-header::after {
    position: absolute;
    border-radius: 50%;
    content: "";
    pointer-events: none;
}

.integrity-header::before {
    top: -100px;
    right: -55px;
    width: 235px;
    height: 235px;
    background: #e5eaff;
}

.integrity-header::after {
    bottom: -110px;
    left: -50px;
    width: 220px;
    height: 220px;
    background: #e0f4ec;
}

.integrity-header > * {
    position: relative;
    z-index: 1;
}

.integrity-label {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 10px 17px;
    margin-bottom: 20px;
    border: 1px solid #dce4fa;
    border-radius: 30px;
    background: #eef2ff;
    color: #5b70ad;
    font-size: 12px;
    font-weight: 800;
    letter-spacing: 1.2px;
}

.integrity-label i {
    font-size: 15px;
}

.integrity-header h1 {
    margin: 0 auto 17px;
    color: #293950;
    font-size: clamp(29px, 4vw, 46px);
    font-weight: 800;
    line-height: 1.22;
    letter-spacing: -.8px;
}

.integrity-header h1 span {
    display: block;
    margin-top: 6px;
    color: #7889c4;
}

.integrity-header p {
    max-width: 850px;
    margin: 0 auto;
    color: var(--int-muted);
    font-size: 16px;
    line-height: 1.9;
}

/* INTRODUCCIÓN */

.integrity-intro {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    padding: 24px;
    margin-bottom: 36px;
    border: 1px solid #dcefe6;
    border-radius: 21px;
    background: linear-gradient(120deg, #effaf5, #f8fdf9);
}

.integrity-intro-icon {
    display: flex;
    flex: 0 0 49px;
    align-items: center;
    justify-content: center;
    width: 49px;
    height: 49px;
    border-radius: 16px;
    background: #d9f1e6;
    color: #42866d;
    font-size: 22px;
}

.integrity-intro h2 {
    margin: 0 0 8px;
    color: #376e5a;
    font-size: 20px;
    font-weight: 800;
}

.integrity-intro p {
    margin: 0;
    color: #5b786d;
    font-size: 14px;
    line-height: 1.85;
}

/* TÍTULOS DE SECCIÓN */

.integrity-section-heading {
    margin: 0 0 23px;
    text-align: center;
}

.integrity-section-heading h2 {
    margin: 0 0 9px;
    color: #344256;
    font-size: clamp(23px, 3vw, 30px);
    font-weight: 800;
}

.integrity-section-heading p {
    margin: 0;
    color: var(--int-muted);
    font-size: 14px;
    line-height: 1.8;
}

/* TARJETAS */

.integrity-grid {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 22px;
    margin-bottom: 35px;
}

.integrity-card {
    position: relative;
    overflow: hidden;
    min-width: 0;
    padding: 27px 23px;
    border: 1px solid var(--int-border);
    border-radius: 23px;
    background: rgba(255, 255, 255, .95);
    box-shadow: 0 8px 25px rgba(80, 95, 130, .055);
    transition: transform .25s ease, box-shadow .25s ease;
}

.integrity-card::before {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 5px;
    background: var(--card-accent);
    content: "";
}

.integrity-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 17px 36px rgba(80, 95, 130, .12);
}

.integrity-card:nth-child(1) {
    --card-accent: #aabcf0;
    --card-bg: #edf1ff;
    --card-color: #6378b9;
}

.integrity-card:nth-child(2) {
    --card-accent: #9bd8c4;
    --card-bg: #e8f8f1;
    --card-color: #428c72;
}

.integrity-card:nth-child(3) {
    --card-accent: #edb8d9;
    --card-bg: #fbedf6;
    --card-color: #b36d9a;
}

.integrity-card:nth-child(4) {
    --card-accent: #f0c89d;
    --card-bg: #fff3e5;
    --card-color: #b77c40;
}

.integrity-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 61px;
    height: 61px;
    margin-bottom: 21px;
    border: 1px solid rgba(255, 255, 255, .9);
    border-radius: 19px;
    background: var(--card-bg);
    color: var(--card-color);
    font-size: 25px;
    box-shadow: 0 5px 14px rgba(70, 80, 120, .05);
}

.integrity-card h3 {
    margin: 0 0 12px;
    color: #334155;
    font-size: 18px;
    font-weight: 800;
    line-height: 1.45;
}

.integrity-card p {
    margin: 0;
    color: #65748a;
    font-size: 14px;
    line-height: 1.85;
}

/* BLOQUES INFORMATIVOS */

.integrity-feature {
    display: flex;
    align-items: flex-start;
    gap: 19px;
    padding: 27px;
    margin-bottom: 21px;
    border: 1px solid;
    border-radius: 23px;
}

.integrity-feature-icon {
    display: flex;
    flex: 0 0 55px;
    align-items: center;
    justify-content: center;
    width: 55px;
    height: 55px;
    border-radius: 18px;
    font-size: 23px;
}

.integrity-feature h3 {
    margin: 0 0 10px;
    font-size: 20px;
    font-weight: 800;
    line-height: 1.45;
}

.integrity-feature p {
    margin: 0;
    font-size: 14px;
    line-height: 1.9;
}

.integrity-warning {
    border-color: #f0dfbb;
    background: linear-gradient(120deg, #fff8e9, #fffdf7);
}

.integrity-warning .integrity-feature-icon {
    background: #ffedc9;
    color: #a77a30;
}

.integrity-warning h3 {
    color: #8d682e;
}

.integrity-warning p {
    color: #806f51;
}

.integrity-good-practices {
    border-color: #d9e7f7;
    background: linear-gradient(120deg, #eff6ff, #f8faff);
}

.integrity-good-practices .integrity-feature-icon {
    background: #dceaff;
    color: #547bb7;
}

.integrity-good-practices h3 {
    color: #47648f;
}

.integrity-good-practices p {
    color: #637792;
}

/* LISTA DE BUENAS PRÁCTICAS */

.integrity-practices {
    padding: 27px;
    margin: 30px 0;
    border: 1px solid #e5e4f4;
    border-radius: 23px;
    background: rgba(255, 255, 255, .85);
}

.integrity-practices h2 {
    margin: 0 0 8px;
    color: #394960;
    font-size: 22px;
    font-weight: 800;
}

.integrity-practices-intro {
    margin: 0 0 22px;
    color: #748095;
    font-size: 14px;
    line-height: 1.8;
}

.integrity-practices-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 13px;
}

.integrity-practice-item {
    display: flex;
    align-items: flex-start;
    gap: 11px;
    padding: 15px;
    border: 1px solid #eeecfa;
    border-radius: 15px;
    background: #f8f7ff;
    color: #59667c;
    font-size: 14px;
    line-height: 1.75;
}

.integrity-practice-item i {
    flex: 0 0 auto;
    margin-top: 4px;
    color: #7c91c5;
}

/* BOTÓN VOLVER */

.integrity-back {
    display: flex;
    justify-content: center;
    padding-top: 14px;
}

.integrity-back .back-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 11px;
    min-height: 49px;
    padding: 13px 24px;
    border: 1px solid #d7def4;
    border-radius: 15px;
    background: #eef2ff;
    color: #586da9;
    font-size: 14px;
    font-weight: 800;
    text-decoration: none;
    box-shadow: 0 5px 14px rgba(95, 110, 160, .07);
    transition: transform .2s ease, background .2s ease, color .2s ease;
}

.integrity-back .back-button:hover {
    transform: translateY(-2px);
    background: #647bb5;
    color: #fff;
    box-shadow: 0 9px 20px rgba(100, 123, 181, .2);
}

.integrity-back .back-button:focus-visible {
    outline: 3px solid #b8c7f2;
    outline-offset: 4px;
}

/* RESPONSIVE */

@media (max-width: 1150px) {
    .integrity-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 650px) {
    .integrity-page {
        padding: 22px 13px 35px;
    }

    .integrity-header {
        padding: 30px 19px;
        border-radius: 22px;
    }

    .integrity-header h1 {
        font-size: 29px;
    }

    .integrity-header p {
        font-size: 14px;
    }

    .integrity-label {
        gap: 7px;
        padding: 9px 12px;
        font-size: 10px;
        letter-spacing: .7px;
    }

    .integrity-intro {
        gap: 12px;
        padding: 18px;
    }

    .integrity-intro-icon {
        flex-basis: 42px;
        width: 42px;
        height: 42px;
    }

    .integrity-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }

    .integrity-card {
        padding: 23px;
    }

    .integrity-feature {
        gap: 13px;
        padding: 20px 17px;
    }

    .integrity-feature-icon {
        flex-basis: 43px;
        width: 43px;
        height: 43px;
        border-radius: 14px;
        font-size: 19px;
    }

    .integrity-feature h3 {
        font-size: 17px;
    }

    .integrity-practices {
        padding: 19px;
    }

    .integrity-practices h2 {
        font-size: 20px;
    }

    .integrity-practices-grid {
        grid-template-columns: 1fr;
    }
}

@media (prefers-reduced-motion: reduce) {
    .integrity-card,
    .integrity-back .back-button {
        transition: none;
    }

    .integrity-card:hover,
    .integrity-back .back-button:hover {
        transform: none;
    }
}
CSS);
?>

<section class="integrity-page">
    <div class="integrity-container">

        <header class="integrity-header">
            <span class="integrity-label">
                <i class="fa-solid fa-flask" aria-hidden="true"></i>
                INTEGRIDAD CIENTÍFICA
            </span>

            <h1>
                Integridad en la
                <span>Investigación Científica</span>
            </h1>

            <p>
                La integridad científica implica actuar con honestidad,
                transparencia, responsabilidad y rigor durante todas las
                etapas de una investigación, desde su planificación hasta
                la comunicación de sus resultados.
            </p>
        </header>

        <section class="integrity-intro" aria-labelledby="integrity-intro-title">
            <div class="integrity-intro-icon">
                <i class="fa-solid fa-handshake-angle" aria-hidden="true"></i>
            </div>

            <div>
                <h2 id="integrity-intro-title">Ciencia basada en la confianza</h2>
                <p>
                    La credibilidad de la investigación depende de la calidad
                    de los métodos utilizados y de la conducta de quienes la
                    realizan. Actuar con integridad permite generar conocimiento
                    confiable, respetar a la comunidad científica y contribuir
                    responsablemente a la sociedad.
                </p>
            </div>
        </section>

        <div class="integrity-section-heading">
            <h2>Pilares de la integridad científica</h2>
            <p>Principios esenciales para producir y comunicar conocimiento confiable.</p>
        </div>

        <div class="integrity-grid">

            <article class="integrity-card">
                <div class="integrity-icon">
                    <i class="fa-solid fa-file-circle-check" aria-hidden="true"></i>
                </div>

                <h3>Honestidad académica</h3>
                <p>
                    Presentar datos, fuentes y resultados de manera auténtica,
                    sin inventar información, alterar evidencias ni ocultar
                    deliberadamente hallazgos relevantes. Reconocer también
                    las limitaciones del trabajo realizado.
                </p>
            </article>

            <article class="integrity-card">
                <div class="integrity-icon">
                    <i class="fa-solid fa-chart-line" aria-hidden="true"></i>
                </div>

                <h3>Rigor científico</h3>
                <p>
                    Aplicar métodos apropiados, procedimientos sistemáticos y
                    análisis fundamentados. Documentar las decisiones
                    metodológicas y comprobar que las conclusiones se apoyen
                    en evidencias suficientes.
                </p>
            </article>

            <article class="integrity-card">
                <div class="integrity-icon">
                    <i class="fa-solid fa-eye" aria-hidden="true"></i>
                </div>

                <h3>Transparencia</h3>
                <p>
                    Comunicar con claridad los métodos, las fuentes, los
                    resultados y las limitaciones de la investigación.
                    Facilitar la evaluación crítica y la reproducibilidad
                    cuando las condiciones del estudio lo permitan.
                </p>
            </article>

            <article class="integrity-card">
                <div class="integrity-icon">
                    <i class="fa-solid fa-pen-nib" aria-hidden="true"></i>
                </div>

                <h3>Autoría responsable</h3>
                <p>
                    Reconocer las contribuciones reales de cada colaborador,
                    citar correctamente las fuentes y evitar la apropiación
                    de ideas ajenas. La autoría debe reflejar una contribución
                    académica efectiva.
                </p>
            </article>

        </div>

        <section class="integrity-feature integrity-warning"
                 aria-labelledby="integrity-warning-title">
            <div class="integrity-feature-icon">
                <i class="fa-solid fa-triangle-exclamation" aria-hidden="true"></i>
            </div>

            <div>
                <h3 id="integrity-warning-title">Prácticas que deben evitarse</h3>
                <p>
                    La fabricación de datos, la falsificación de resultados,
                    el plagio, la manipulación engañosa de evidencias y la
                    apropiación indebida de ideas comprometen la credibilidad
                    científica. También deben evitarse la omisión deliberada
                    de información relevante y los conflictos de interés no
                    declarados cuando puedan afectar la investigación.
                </p>
            </div>
        </section>

        <section class="integrity-feature integrity-good-practices"
                 aria-labelledby="integrity-commitment-title">
            <div class="integrity-feature-icon">
                <i class="fa-solid fa-shield-heart" aria-hidden="true"></i>
            </div>

            <div>
                <h3 id="integrity-commitment-title">Compromiso con la investigación responsable</h3>
                <p>
                    La integridad científica debe estar presente en la
                    planificación, la recolección y el análisis de datos,
                    así como en la publicación de resultados. Cada investigador
                    tiene la responsabilidad de actuar con imparcialidad,
                    proteger los registros de investigación y corregir los
                    errores identificados de manera transparente.
                </p>
            </div>
        </section>

        <section class="integrity-practices"
                 aria-labelledby="integrity-practices-title">
            <h2 id="integrity-practices-title">Buenas prácticas para investigadores</h2>

            <p class="integrity-practices-intro">
                Acciones concretas para fortalecer la calidad y la credibilidad
                del trabajo científico.
            </p>

            <div class="integrity-practices-grid">
                <div class="integrity-practice-item">
                    <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                    <span>Registrar los datos y procedimientos de forma precisa y verificable.</span>
                </div>

                <div class="integrity-practice-item">
                    <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                    <span>Citar las fuentes consultadas y respetar la propiedad intelectual.</span>
                </div>

                <div class="integrity-practice-item">
                    <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                    <span>Declarar los conflictos de interés que puedan influir en el estudio.</span>
                </div>

                <div class="integrity-practice-item">
                    <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                    <span>Presentar los resultados sin alterar ni seleccionar engañosamente las evidencias.</span>
                </div>

                <div class="integrity-practice-item">
                    <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                    <span>Reconocer las contribuciones de colaboradores y participantes.</span>
                </div>

                <div class="integrity-practice-item">
                    <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                    <span>Corregir los errores detectados y comunicar las rectificaciones necesarias.</span>
                </div>
            </div>
        </section>

        <div class="integrity-back">
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
