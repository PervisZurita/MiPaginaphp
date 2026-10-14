<?php

declare(strict_types=1);

use yii\helpers\Html;

$this->title = 'Buenas Prácticas | Investigación Científica';

$this->registerCssFile(
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css'
);

$this->registerCss(<<<'CSS'
.practices-page {
    --bp-text: #344256;
    --bp-muted: #68778b;
    --bp-border: #e6eaf2;

    width: 100%;
    min-height: calc(100vh - 78px);
    padding: 42px clamp(16px, 4vw, 60px) 55px;
    box-sizing: border-box;
    color: var(--bp-text);
    background:
        radial-gradient(ellipse at 0% 0%, #e8efff 0, transparent 34%),
        radial-gradient(ellipse at 100% 20%, #f8eafa 0, transparent 30%),
        linear-gradient(145deg, #f8faff 0%, #fdf9ff 55%, #f0faf6 100%);
    font-family: inherit;
}

.practices-page *,
.practices-page *::before,
.practices-page *::after {
    box-sizing: border-box;
}

.practices-container {
    width: 100%;
    max-width: 1450px;
    margin: 0 auto;
}

/* ENCABEZADO */

.practices-header {
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

.practices-header::before,
.practices-header::after {
    position: absolute;
    border-radius: 50%;
    content: "";
    pointer-events: none;
}

.practices-header::before {
    top: -100px;
    right: -55px;
    width: 235px;
    height: 235px;
    background: #e5eaff;
}

.practices-header::after {
    bottom: -110px;
    left: -50px;
    width: 220px;
    height: 220px;
    background: #e0f4ec;
}

.practices-header > * {
    position: relative;
    z-index: 1;
}

.practices-label {
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

.practices-label i {
    font-size: 15px;
}

.practices-header h1 {
    margin: 0 auto 17px;
    color: #293950;
    font-size: clamp(29px, 4vw, 46px);
    font-weight: 800;
    line-height: 1.22;
    letter-spacing: -.8px;
}

.practices-header h1 span {
    display: block;
    margin-top: 6px;
    color: #7889c4;
}

.practices-header p {
    max-width: 850px;
    margin: 0 auto;
    color: var(--bp-muted);
    font-size: 16px;
    line-height: 1.9;
}

/* INTRODUCCIÓN */

.practices-intro {
    display: flex;
    align-items: flex-start;
    gap: 16px;
    padding: 24px;
    margin-bottom: 36px;
    border: 1px solid #dcefe6;
    border-radius: 21px;
    background: linear-gradient(120deg, #effaf5, #f8fdf9);
}

.practices-intro-icon {
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

.practices-intro h2 {
    margin: 0 0 8px;
    color: #376e5a;
    font-size: 20px;
    font-weight: 800;
}

.practices-intro p {
    margin: 0;
    color: #5b786d;
    font-size: 14px;
    line-height: 1.85;
}

/* TÍTULO DE SECCIÓN */

.practices-section-heading {
    margin: 0 0 23px;
    text-align: center;
}

.practices-section-heading h2 {
    margin: 0 0 9px;
    color: #344256;
    font-size: clamp(23px, 3vw, 30px);
    font-weight: 800;
}

.practices-section-heading p {
    margin: 0;
    color: var(--bp-muted);
    font-size: 14px;
    line-height: 1.8;
}

/* TARJETAS */

.practices-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 22px;
    margin-bottom: 35px;
}

.practices-card {
    position: relative;
    overflow: hidden;
    min-width: 0;
    padding: 27px 24px;
    border: 1px solid var(--bp-border);
    border-radius: 23px;
    background: rgba(255, 255, 255, .95);
    box-shadow: 0 8px 25px rgba(80, 95, 130, .055);
    transition: transform .25s ease, box-shadow .25s ease;
}

.practices-card::before {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 5px;
    background: var(--card-accent);
    content: "";
}

.practices-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 17px 36px rgba(80, 95, 130, .12);
}

.practices-card:nth-child(1) {
    --card-accent: #aabcf0;
    --card-bg: #edf1ff;
    --card-color: #6378b9;
}

.practices-card:nth-child(2) {
    --card-accent: #9bd8c4;
    --card-bg: #e8f8f1;
    --card-color: #428c72;
}

.practices-card:nth-child(3) {
    --card-accent: #edb8d9;
    --card-bg: #fbedf6;
    --card-color: #b36d9a;
}

.practices-card:nth-child(4) {
    --card-accent: #f0c89d;
    --card-bg: #fff3e5;
    --card-color: #b77c40;
}

.practices-card:nth-child(5) {
    --card-accent: #b9d9e9;
    --card-bg: #eaf6fb;
    --card-color: #51849b;
}

.practices-card:nth-child(6) {
    --card-accent: #c7b9ec;
    --card-bg: #f1edfc;
    --card-color: #826bb6;
}

.practices-icon {
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

.practices-card h3 {
    margin: 0 0 12px;
    color: #334155;
    font-size: 18px;
    font-weight: 800;
    line-height: 1.45;
}

.practices-card p {
    margin: 0;
    color: #65748a;
    font-size: 14px;
    line-height: 1.85;
}

/* BLOQUE DESTACADO */

.practices-feature {
    display: flex;
    align-items: flex-start;
    gap: 19px;
    padding: 27px;
    margin-bottom: 21px;
    border: 1px solid #d9e7f7;
    border-radius: 23px;
    background: linear-gradient(120deg, #eff6ff, #f8faff);
}

.practices-feature-icon {
    display: flex;
    flex: 0 0 55px;
    align-items: center;
    justify-content: center;
    width: 55px;
    height: 55px;
    border-radius: 18px;
    background: #dceaff;
    color: #547bb7;
    font-size: 23px;
}

.practices-feature h3 {
    margin: 0 0 10px;
    color: #47648f;
    font-size: 20px;
    font-weight: 800;
    line-height: 1.45;
}

.practices-feature p {
    margin: 0;
    color: #637792;
    font-size: 14px;
    line-height: 1.9;
}

/* LISTA DE RECOMENDACIONES */

.practices-checklist {
    padding: 27px;
    margin: 30px 0;
    border: 1px solid #e5e4f4;
    border-radius: 23px;
    background: rgba(255, 255, 255, .85);
}

.practices-checklist h2 {
    margin: 0 0 8px;
    color: #394960;
    font-size: 22px;
    font-weight: 800;
}

.practices-checklist > p {
    margin: 0 0 22px;
    color: #748095;
    font-size: 14px;
    line-height: 1.8;
}

.practices-checklist-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 13px;
}

.practices-check-item {
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

.practices-check-item i {
    flex: 0 0 auto;
    margin-top: 4px;
    color: #7c91c5;
}

/* BOTÓN VOLVER */

.practices-back {
    display: flex;
    justify-content: center;
    padding-top: 14px;
}

.practices-back .back-button {
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

.practices-back .back-button:hover {
    transform: translateY(-2px);
    background: #647bb5;
    color: #fff;
    box-shadow: 0 9px 20px rgba(100, 123, 181, .2);
}

.practices-back .back-button:focus-visible {
    outline: 3px solid #b8c7f2;
    outline-offset: 4px;
}

/* RESPONSIVE */

@media (max-width: 1100px) {
    .practices-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 650px) {
    .practices-page {
        padding: 22px 13px 35px;
    }

    .practices-header {
        padding: 30px 19px;
        border-radius: 22px;
    }

    .practices-header h1 {
        font-size: 29px;
    }

    .practices-header p {
        font-size: 14px;
    }

    .practices-label {
        gap: 7px;
        padding: 9px 12px;
        font-size: 10px;
        letter-spacing: .7px;
    }

    .practices-intro {
        gap: 12px;
        padding: 18px;
    }

    .practices-intro-icon {
        flex-basis: 42px;
        width: 42px;
        height: 42px;
    }

    .practices-grid {
        grid-template-columns: 1fr;
        gap: 16px;
    }

    .practices-card {
        padding: 23px;
    }

    .practices-feature {
        gap: 13px;
        padding: 20px 17px;
    }

    .practices-feature-icon {
        flex-basis: 43px;
        width: 43px;
        height: 43px;
        border-radius: 14px;
        font-size: 19px;
    }

    .practices-feature h3 {
        font-size: 17px;
    }

    .practices-checklist {
        padding: 19px;
    }

    .practices-checklist h2 {
        font-size: 20px;
    }

    .practices-checklist-grid {
        grid-template-columns: 1fr;
    }
}

@media (prefers-reduced-motion: reduce) {
    .practices-card,
    .practices-back .back-button {
        transition: none;
    }

    .practices-card:hover,
    .practices-back .back-button:hover {
        transform: none;
    }
}
CSS);
?>

<section class="practices-page">
    <div class="practices-container">

        <header class="practices-header">
            <span class="practices-label">
                <i class="fa-solid fa-graduation-cap" aria-hidden="true"></i>
                BUENAS PRÁCTICAS
            </span>

            <h1>
                Buenas prácticas de
                <span>investigación científica</span>
            </h1>

            <p>
                Las buenas prácticas permiten desarrollar investigaciones
                responsables, transparentes y respetuosas de los principios
                de la ética científica, fortaleciendo la confianza en el
                conocimiento y sus resultados.
            </p>
        </header>

        <section class="practices-intro" aria-labelledby="practices-intro-title">
            <div class="practices-intro-icon">
                <i class="fa-solid fa-lightbulb" aria-hidden="true"></i>
            </div>

            <div>
                <h2 id="practices-intro-title">Investigar con responsabilidad</h2>
                <p>
                    Una investigación de calidad requiere planificación,
                    honestidad, respeto por las personas y cuidado en el
                    tratamiento de la información. Estas prácticas deben
                    mantenerse desde la formulación del proyecto hasta
                    la publicación y difusión de sus resultados.
                </p>
            </div>
        </section>

        <div class="practices-section-heading">
            <h2>Seis pilares de las buenas prácticas</h2>
            <p>Acciones esenciales para una investigación ética y confiable.</p>
        </div>

        <div class="practices-grid">

            <article class="practices-card">
                <div class="practices-icon">
                    <i class="fa-solid fa-book-open" aria-hidden="true"></i>
                </div>

                <h3>Prevención del plagio</h3>
                <p>
                    Reconocer correctamente las ideas, palabras, datos e
                    imágenes de otros autores. Citar las fuentes consultadas,
                    utilizar referencias verificables y distinguir con claridad
                    las contribuciones propias de las ajenas.
                </p>
            </article>

            <article class="practices-card">
                <div class="practices-icon">
                    <i class="fa-solid fa-handshake-angle" aria-hidden="true"></i>
                </div>

                <h3>Colaboración responsable</h3>
                <p>
                    Promover relaciones profesionales basadas en el respeto,
                    la comunicación y la responsabilidad compartida. Definir
                    las funciones del equipo y reconocer las contribuciones
                    reales de cada colaborador.
                </p>
            </article>

            <article class="practices-card">
                <div class="practices-icon">
                    <i class="fa-solid fa-scale-balanced" aria-hidden="true"></i>
                </div>

                <h3>Conflictos de interés</h3>
                <p>
                    Identificar y comunicar oportunamente intereses personales,
                    económicos o profesionales que puedan influir en la
                    objetividad del estudio. Adoptar medidas para gestionar
                    estas situaciones con transparencia.
                </p>
            </article>

            <article class="practices-card">
                <div class="practices-icon">
                    <i class="fa-solid fa-database" aria-hidden="true"></i>
                </div>

                <h3>Manejo responsable de datos</h3>
                <p>
                    Recopilar, almacenar, analizar y comunicar los datos de
                    forma segura y verificable. Proteger la información
                    confidencial, conservar registros adecuados y respetar
                    las normas aplicables de privacidad.
                </p>
            </article>

            <article class="practices-card">
                <div class="practices-icon">
                    <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                </div>

                <h3>Revisión responsable</h3>
                <p>
                    Realizar evaluaciones científicas con imparcialidad,
                    criterios objetivos y respeto. Mantener la confidencialidad
                    de los documentos revisados y declarar cualquier conflicto
                    de interés que pueda afectar el juicio evaluador.
                </p>
            </article>

            <article class="practices-card">
                <div class="practices-icon">
                    <i class="fa-solid fa-comments" aria-hidden="true"></i>
                </div>

                <h3>Comunicación científica</h3>
                <p>
                    Presentar los resultados con claridad, precisión y
                    fidelidad a las evidencias. Explicar las limitaciones
                    del estudio, evitar conclusiones engañosas y comunicar
                    las correcciones necesarias cuando corresponda.
                </p>
            </article>

        </div>

        <section class="practices-feature" aria-labelledby="practices-commitment-title">
            <div class="practices-feature-icon">
                <i class="fa-solid fa-shield-heart" aria-hidden="true"></i>
            </div>

            <div>
                <h3 id="practices-commitment-title">Compromiso con la calidad científica</h3>
                <p>
                    Las buenas prácticas no deben aplicarse únicamente al
                    momento de publicar. Forman parte de todas las decisiones
                    de investigación: elegir métodos apropiados, registrar
                    información de manera fiel, proteger a los participantes,
                    reconocer las fuentes y comunicar los hallazgos con
                    responsabilidad.
                </p>
            </div>
        </section>

        <section class="practices-checklist" aria-labelledby="practices-checklist-title">
            <h2 id="practices-checklist-title">Lista de verificación del investigador</h2>

            <p>
                Antes de presentar o publicar una investigación, comprueba
                que se hayan considerado estas acciones fundamentales.
            </p>

            <div class="practices-checklist-grid">
                <div class="practices-check-item">
                    <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                    <span>Verificar las fuentes y citar correctamente las ideas utilizadas.</span>
                </div>

                <div class="practices-check-item">
                    <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                    <span>Registrar los datos y métodos de forma clara y verificable.</span>
                </div>

                <div class="practices-check-item">
                    <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                    <span>Proteger la privacidad y los datos de los participantes.</span>
                </div>

                <div class="practices-check-item">
                    <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                    <span>Reconocer las contribuciones de todas las personas involucradas.</span>
                </div>

                <div class="practices-check-item">
                    <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                    <span>Declarar los conflictos de interés relevantes para el estudio.</span>
                </div>

                <div class="practices-check-item">
                    <i class="fa-solid fa-circle-check" aria-hidden="true"></i>
                    <span>Presentar resultados y limitaciones sin distorsionar las evidencias.</span>
                </div>
            </div>
        </section>

        <div class="practices-back">
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
