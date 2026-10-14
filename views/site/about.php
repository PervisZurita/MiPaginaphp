<?php

/** @var yii\web\View $this */

$this->title = 'Nosotros';

$this->params['meta_description'] =
    'Conoce nuestra misión y visión y aprende sobre los principios del Código de Ética de la Investigación Científica.';

$this->params['meta_keywords'] =
    'código de ética, investigación científica, ética científica, integridad científica, responsabilidad, investigación responsable';

$this->registerCss(<<<'CSS'
.about-page,
.about-page * {
    box-sizing: border-box;
}

.about-page {
    --blue: #dfeafb;
    --blue-dark: #718fbe;
    --lilac: #eee5f8;
    --lilac-dark: #947bb6;
    --mint: #e0f1e6;
    --mint-dark: #70a58a;
    --pink: #f8e3ea;
    --pink-dark: #c58199;
    --peach: #fbe9dc;
    --peach-dark: #c59673;
    --text: #35445a;
    --muted: #778397;
    --white: #ffffff;

    width: 100%;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background: #fffaf7;
    color: var(--text);
    font-family: inherit;
}

.about-page h1,
.about-page h2,
.about-page h3,
.about-page p {
    margin-top: 0;
}

.about-page h1,
.about-page h2,
.about-page h3 {
    color: var(--text);
    line-height: 1.35;
}

.about-page p {
    color: var(--muted);
    font-size: 0.96rem;
    line-height: 1.85;
}

.about-page a {
    text-decoration: none;
}

/* INTRODUCCIÓN */

.about-page .about-section {
    display: grid;
    grid-template-columns: minmax(0, 1.1fr) minmax(300px, 0.9fr);
    align-items: center;
    gap: 42px;
    padding: 65px clamp(22px, 5vw, 75px) 35px;
    background:
        radial-gradient(ellipse at 8% 10%, #e4edfc 0, transparent 35%),
        radial-gradient(ellipse at 92% 20%, #f2e5f8 0, transparent 35%),
        linear-gradient(135deg, #fffdfb, #f9f8fd 60%, #fff5f5);
}

.about-page .about-content {
    min-width: 0;
    max-width: 720px;
}

.about-page .section-label {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 10px 15px;
    border: 1px solid #e3d9f1;
    border-radius: 40px;
    background: #ffffffd9;
    color: #8470a9;
    font-size: 0.75rem;
    font-weight: 800;
    letter-spacing: 1.3px;
}

.about-page .section-label i {
    color: var(--pink-dark);
}

.about-page .about-content h1 {
    margin: 23px 0 20px;
    font-size: clamp(2.15rem, 3.6vw, 3.5rem);
    font-weight: 800;
    letter-spacing: -1.5px;
    line-height: 1.18;
}

.about-page .about-content h1 span {
    display: block;
    margin-top: 8px;
    color: var(--blue-dark);
}

.about-page .about-content p {
    margin-bottom: 14px;
}

.about-page .about-button {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    margin-top: 12px;
    padding: 14px 21px;
    border: 1px solid #cbdaf2;
    border-radius: 12px;
    background: #e0eafb;
    color: #526f9f;
    font-weight: 750;
    transition: 0.25s ease;
}

.about-page .about-button:hover {
    transform: translateY(-3px);
    background: #cdddf6;
    color: #405b88;
}

/* ILUSTRACIÓN */

.about-page .about-visual {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 0;
}

.about-page .about-illustration {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: min(100%, 430px);
    min-height: 375px;
    overflow: hidden;
    border: 1px solid #ffffff;
    border-radius: 45% 45% 35% 35%;
    background:
        radial-gradient(circle at 25% 25%, #f8e3eb, transparent 35%),
        radial-gradient(circle at 80% 75%, #dff1e7, transparent 38%),
        linear-gradient(135deg, #e1eafa, #eee5f8);
    box-shadow: 0 15px 40px rgba(94, 110, 145, 0.12);
}

.about-page .illustration-circle {
    position: absolute;
    border: 1px solid #ffffffa8;
    border-radius: 50%;
    background: #ffffff30;
}

.about-page .circle-one {
    width: 285px;
    height: 285px;
}

.about-page .circle-two {
    width: 205px;
    height: 205px;
}

.about-page .illustration-icon {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 145px;
    height: 145px;
    border: 8px solid #ffffffa8;
    border-radius: 38px;
    background: linear-gradient(145deg, #fff, #e8edfa);
    color: #7890bd;
    font-size: 4rem;
    box-shadow: 0 14px 30px #657ba51c;
    transform: rotate(-5deg);
}

.about-page .floating-icon {
    position: absolute;
    z-index: 2;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 58px;
    height: 58px;
    border: 4px solid #ffffffbd;
    border-radius: 18px;
    font-size: 1.4rem;
    box-shadow: 0 8px 22px #53658218;
    animation: aboutFloat 4s ease-in-out infinite;
}

.about-page .floating-one {
    top: 48px;
    left: 40px;
    background: var(--pink);
    color: var(--pink-dark);
}

.about-page .floating-two {
    top: 100px;
    right: 30px;
    background: var(--mint);
    color: var(--mint-dark);
    animation-delay: 0.7s;
}

.about-page .floating-three {
    right: 55px;
    bottom: 85px;
    background: var(--peach);
    color: var(--peach-dark);
    animation-delay: 1.2s;
}

.about-page .illustration-caption {
    position: absolute;
    right: 17px;
    bottom: 17px;
    left: 17px;
    z-index: 3;
    display: flex;
    flex-direction: column;
    gap: 5px;
    padding: 14px;
    border: 1px solid #ffffff;
    border-radius: 16px;
    background: #ffffffdf;
    text-align: center;
    backdrop-filter: blur(8px);
}

.about-page .illustration-caption strong {
    color: #586f9a;
    font-size: 0.96rem;
}

.about-page .illustration-caption span {
    color: var(--muted);
    font-size: 0.79rem;
}

/* ESTADÍSTICAS */

.about-page .about-stats {
    grid-column: 1 / -1;
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 18px;
    margin-top: 8px;
}

.about-page .stat {
    display: flex;
    align-items: center;
    gap: 15px;
    min-width: 0;
    padding: 20px;
    border: 1px solid #e8e7ef;
    border-radius: 19px;
    background: #ffffffd9;
    box-shadow: 0 5px 18px #66718b0a;
    transition: 0.25s ease;
}

.about-page .stat:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 28px #66718b17;
}

.about-page .stat-icon {
    display: flex;
    flex: 0 0 53px;
    align-items: center;
    justify-content: center;
    width: 53px;
    height: 53px;
    border-radius: 16px;
    font-size: 1.3rem;
}

.about-page .stat-blue .stat-icon {
    background: var(--blue);
    color: var(--blue-dark);
}

.about-page .stat-lilac .stat-icon {
    background: var(--lilac);
    color: var(--lilac-dark);
}

.about-page .stat-pink .stat-icon {
    background: var(--pink);
    color: var(--pink-dark);
}

.about-page .stat strong {
    display: block;
    color: var(--text);
    font-size: 1.45rem;
    font-weight: 800;
}

.about-page .stat > span {
    display: block;
    margin-top: 4px;
    color: var(--muted);
    font-size: 0.82rem;
}

/* SECCIONES */

.about-page .content-section {
    padding: 75px clamp(22px, 5vw, 75px);
}

.about-page .mission-section {
    background: #ffffff;
}

.about-page .vision-section {
    background:
        radial-gradient(circle at 5% 20%, #eee5f866, transparent 30%),
        linear-gradient(135deg, #fcfaff, #f5f9ff);
}

.about-page .resources-section {
    background:
        radial-gradient(circle at 95% 15%, #f8e3ea60, transparent 28%),
        #fffdfb;
}

.about-page .section-header {
    max-width: 850px;
    margin: 0 auto 42px;
    text-align: center;
}

.about-page .section-header .section-label {
    margin-bottom: 17px;
}

.about-page .section-header h2 {
    margin-bottom: 17px;
    font-size: clamp(1.85rem, 3vw, 2.65rem);
    font-weight: 800;
    letter-spacing: -0.7px;
}

.about-page .section-header h2 span {
    display: block;
    margin-top: 5px;
    color: var(--lilac-dark);
}

.about-page .section-header p {
    max-width: 780px;
    margin: 0 auto;
}

/* TARJETAS */

.about-page .services-grid,
.about-page .blog-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 22px;
    max-width: 1400px;
    margin: 0 auto;
}

.about-page .service-card {
    position: relative;
    min-width: 0;
    min-height: 295px;
    padding: 28px 25px;
    overflow: hidden;
    border: 1px solid transparent;
    border-radius: 22px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.about-page .service-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 35px #66718b1c;
}

.about-page .service-blue {
    border-color: #d8e4f6;
    background: linear-gradient(145deg, #f1f6ff, #e3edfc);
}

.about-page .service-lilac {
    border-color: #e4d8f2;
    background: linear-gradient(145deg, #faf6ff, #eee4f8);
}

.about-page .service-mint {
    border-color: #d6eadd;
    background: linear-gradient(145deg, #f5fcf7, #e0f1e6);
}

.about-page .service-peach {
    border-color: #f0dfd1;
    background: linear-gradient(145deg, #fffaf5, #fbe9dc);
}

.about-page .service-pink {
    border-color: #efd9e1;
    background: linear-gradient(145deg, #fff8fa, #f8e3ea);
}

.about-page .service-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 60px;
    height: 60px;
    margin-bottom: 22px;
    border: 1px solid #ffffffd9;
    border-radius: 19px;
    background: #ffffffc9;
    color: var(--blue-dark);
    font-size: 1.5rem;
}

.about-page .service-lilac .service-icon {
    color: var(--lilac-dark);
}

.about-page .service-mint .service-icon {
    color: var(--mint-dark);
}

.about-page .service-peach .service-icon {
    color: var(--peach-dark);
}

.about-page .service-pink .service-icon {
    color: var(--pink-dark);
}

.about-page .card-number {
    position: absolute;
    top: 25px;
    right: 23px;
    color: #65738c40;
    font-size: 2rem;
    font-weight: 900;
}

.about-page .service-card h3 {
    position: relative;
    z-index: 1;
    margin-bottom: 12px;
    font-size: 1.18rem;
    font-weight: 800;
}

.about-page .service-card p {
    position: relative;
    z-index: 1;
    margin-bottom: 0;
    font-size: 0.92rem;
}

.about-page .service-decoration {
    position: absolute;
    right: -35px;
    bottom: -45px;
    width: 125px;
    height: 125px;
    border: 17px solid #ffffff50;
    border-radius: 50%;
    pointer-events: none;
}

/* RECURSOS */

.about-page .blog-card {
    min-width: 0;
    overflow: hidden;
    border: 1px solid #e8e6ef;
    border-radius: 22px;
    background: #ffffff;
    box-shadow: 0 7px 22px #66718b0b;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.about-page .blog-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 35px #66718b1b;
}

.about-page .blog-image {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 185px;
    overflow: hidden;
}

.about-page .blog-blue .blog-image {
    background: linear-gradient(135deg, #e2ecfc, #d8e6f8);
}

.about-page .blog-lilac .blog-image {
    background: linear-gradient(135deg, #f0e6fa, #e6dbf4);
}

.about-page .blog-mint .blog-image {
    background: linear-gradient(135deg, #e3f4e9, #d5ecdf);
}

.about-page .blog-image::before,
.about-page .blog-image::after {
    position: absolute;
    width: 140px;
    height: 140px;
    border: 1px solid #ffffff8c;
    border-radius: 50%;
    content: "";
}

.about-page .blog-image::before {
    top: -55px;
    left: -35px;
}

.about-page .blog-image::after {
    right: -45px;
    bottom: -75px;
    width: 190px;
    height: 190px;
}

.about-page .blog-image-icon {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100px;
    height: 100px;
    border: 7px solid #ffffffad;
    border-radius: 29px;
    background: #ffffffad;
    color: var(--blue-dark);
    font-size: 2.8rem;
    box-shadow: 0 9px 24px #65718b12;
    transform: rotate(-4deg);
    transition: transform 0.3s ease;
}

.about-page .blog-lilac .blog-image-icon {
    color: var(--lilac-dark);
}

.about-page .blog-mint .blog-image-icon {
    color: var(--mint-dark);
}

.about-page .blog-card:hover .blog-image-icon {
    transform: rotate(0) scale(1.06);
}

.about-page .blog-category {
    position: absolute;
    right: 13px;
    bottom: 13px;
    z-index: 2;
    padding: 8px 11px;
    border: 1px solid #ffffffc9;
    border-radius: 30px;
    background: #ffffffdf;
    color: #5b6e88;
    font-size: 0.75rem;
    font-weight: 750;
}

.about-page .blog-content {
    padding: 24px;
}

.about-page .blog-tag {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    margin-bottom: 13px;
    color: var(--blue-dark);
    font-size: 0.71rem;
    font-weight: 800;
    letter-spacing: 0.7px;
}

.about-page .blog-lilac .blog-tag,
.about-page .blog-lilac .blog-link {
    color: var(--lilac-dark);
}

.about-page .blog-mint .blog-tag,
.about-page .blog-mint .blog-link {
    color: var(--mint-dark);
}

.about-page .blog-content h3 {
    margin-bottom: 12px;
    font-size: 1.12rem;
    font-weight: 800;
    line-height: 1.5;
}

.about-page .blog-content p {
    margin-bottom: 19px;
    font-size: 0.9rem;
}

.about-page .blog-link {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    color: var(--blue-dark);
    font-size: 0.86rem;
    font-weight: 800;
    transition: gap 0.2s ease;
}

.about-page .blog-link:hover {
    gap: 14px;
}

/* LLAMADO A LA ACCIÓN */

.about-page .about-cta {
    display: flex;
    align-items: center;
    gap: 22px;
    max-width: 1400px;
    margin: 48px auto 0;
    padding: 28px;
    border: 1px solid #e5deef;
    border-radius: 23px;
    background: linear-gradient(120deg, #e7effd, #f0e7fa 55%, #fbe9ee);
    box-shadow: 0 8px 25px #66718b0b;
}

.about-page .cta-icon {
    display: flex;
    flex: 0 0 68px;
    align-items: center;
    justify-content: center;
    width: 68px;
    height: 68px;
    border: 1px solid #ffffff;
    border-radius: 21px;
    background: #ffffffc9;
    color: var(--lilac-dark);
    font-size: 1.9rem;
}

.about-page .cta-content {
    flex: 1;
    min-width: 0;
}

.about-page .cta-content h3 {
    margin-bottom: 7px;
    font-size: 1.22rem;
    font-weight: 800;
}

.about-page .cta-content p {
    margin-bottom: 0;
    font-size: 0.91rem;
}

.about-page .cta-button {
    display: inline-flex;
    flex-shrink: 0;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 13px 20px;
    border: 1px solid #ded1f0;
    border-radius: 12px;
    background: #eee5f8;
    color: #8069a5;
    font-weight: 800;
    transition: 0.25s ease;
}

.about-page .cta-button:hover {
    transform: translateY(-3px);
    background: #dfd0f1;
    color: #665181;
}

/* ANIMACIONES */

@keyframes aboutFloat {
    0%, 100% {
        transform: translateY(0);
    }

    50% {
        transform: translateY(-8px);
    }
}

/* TABLET */

@media (max-width: 1000px) {
    .about-page .about-section {
        gap: 25px;
        padding: 50px 28px 30px;
    }

    .about-page .about-illustration {
        min-height: 330px;
    }

    .about-page .services-grid,
    .about-page .blog-grid {
        gap: 16px;
    }

    .about-page .service-card {
        padding: 23px 20px;
    }

    .about-page .blog-content {
        padding: 20px;
    }

    .about-page .content-section {
        padding: 60px 28px;
    }
}

/* MÓVILES */

@media (max-width: 700px) {
    .about-page .about-section {
        grid-template-columns: 1fr;
        gap: 30px;
        padding: 38px 19px 27px;
    }

    .about-page .about-content h1 {
        font-size: clamp(2rem, 8vw, 2.7rem);
        letter-spacing: -0.8px;
    }

    .about-page .about-visual {
        grid-row: 2;
    }

    .about-page .about-illustration {
        width: 100%;
        max-width: 400px;
        min-height: 320px;
        margin: 0 auto;
    }

    .about-page .illustration-icon {
        width: 120px;
        height: 120px;
        font-size: 3.3rem;
    }

    .about-page .circle-one {
        width: 245px;
        height: 245px;
    }

    .about-page .circle-two {
        width: 180px;
        height: 180px;
    }

    .about-page .floating-one {
        top: 35px;
        left: 22px;
    }

    .about-page .floating-two {
        top: 80px;
        right: 20px;
    }

    .about-page .floating-three {
        right: 30px;
        bottom: 80px;
    }

    .about-page .about-stats {
        grid-column: 1;
        grid-template-columns: 1fr;
        gap: 12px;
        margin-top: 0;
    }

    .about-page .stat {
        padding: 16px;
    }

    .about-page .content-section {
        padding: 52px 19px;
    }

    .about-page .section-header {
        margin-bottom: 29px;
    }

    .about-page .section-header h2 {
        font-size: 1.8rem;
    }

    .about-page .services-grid,
    .about-page .blog-grid {
        grid-template-columns: 1fr;
        gap: 17px;
    }

    .about-page .service-card {
        min-height: 0;
        padding: 24px;
    }

    .about-page .blog-image {
        min-height: 175px;
    }

    .about-page .about-cta {
        flex-direction: column;
        align-items: flex-start;
        gap: 16px;
        margin-top: 32px;
        padding: 23px;
    }

    .about-page .cta-button {
        width: 100%;
    }
}

@media (max-width: 420px) {
    .about-page .about-section,
    .about-page .content-section {
        padding-right: 15px;
        padding-left: 15px;
    }

    .about-page .section-label {
        padding: 9px 12px;
        font-size: 0.67rem;
        letter-spacing: 0.9px;
    }

    .about-page .about-content h1 {
        font-size: 1.95rem;
    }

    .about-page .about-illustration {
        min-height: 290px;
    }

    .about-page .floating-icon {
        width: 48px;
        height: 48px;
        border-radius: 15px;
        font-size: 1.1rem;
    }

    .about-page .illustration-caption {
        right: 10px;
        bottom: 10px;
        left: 10px;
        padding: 11px;
    }

    .about-page .illustration-caption span {
        font-size: 0.72rem;
    }

    .about-page .section-header h2 {
        font-size: 1.6rem;
    }

    .about-page .service-card {
        padding: 21px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .about-page *,
    .about-page *::before,
    .about-page *::after {
        animation: none !important;
        transition: none !important;
    }
}
CSS);

?>

<main class="about-page">

    <section id="nosotros" class="about-section">

        <div class="about-content">

            <span class="section-label">
                <i class="fa-solid fa-heart"></i>
                SOBRE NOSOTROS
            </span>

            <h1>
                Promoviendo una investigación
                <span>científica ética y responsable</span>
            </h1>

            <p>
                Nuestra plataforma tiene como propósito brindar
                información clara, accesible y educativa sobre el
                Código de Ética de la Investigación Científica,
                sus principios, valores y normas fundamentales.
            </p>

            <p>
                Buscamos contribuir a la formación de estudiantes,
                investigadores y miembros de la comunidad académica,
                promoviendo una investigación basada en la
                integridad, el respeto, la responsabilidad y
                la transparencia.
            </p>

            <a href="#mision" class="about-button">
                Conocer nuestra misión
                <i class="fa-solid fa-arrow-right"></i>
            </a>

        </div>

        <div class="about-visual">
            <div class="about-illustration">

                <div class="illustration-circle circle-one"></div>
                <div class="illustration-circle circle-two"></div>

                <div class="illustration-icon">
                    <i class="fa-solid fa-scale-balanced"></i>
                </div>

                <div class="floating-icon floating-one">
                    <i class="fa-solid fa-book-open"></i>
                </div>

                <div class="floating-icon floating-two">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>

                <div class="floating-icon floating-three">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>

                <div class="illustration-caption">
                    <strong>Investigación con ética</strong>
                    <span>Conocimiento, integridad y compromiso</span>
                </div>

            </div>
        </div>

        <div class="about-stats">

            <article class="stat stat-blue">
                <div class="stat-icon">
                    <i class="fa-solid fa-book-open"></i>
                </div>
                <div>
                    <strong>100%</strong>
                    <span>Enfoque educativo</span>
                </div>
            </article>

            <article class="stat stat-lilac">
                <div class="stat-icon">
                    <i class="fa-solid fa-clock"></i>
                </div>
                <div>
                    <strong>24/7</strong>
                    <span>Acceso a la información</span>
                </div>
            </article>

            <article class="stat stat-pink">
                <div class="stat-icon">
                    <i class="fa-solid fa-lightbulb"></i>
                </div>
                <div>
                    <strong>Ética</strong>
                    <span>Compromiso científico</span>
                </div>
            </article>

        </div>

    </section>

    <section id="mision" class="content-section mission-section">

        <header class="section-header">

            <span class="section-label">
                <i class="fa-solid fa-bullseye"></i>
                NUESTRA MISIÓN
            </span>

            <h2>
                Promover la ética y la integridad
                <span>en la investigación científica</span>
            </h2>

            <p>
                Facilitar el acceso, la consulta y la difusión del
                Código de Ética de Investigación de la Universidad
                Técnica “Luis Vargas Torres” de Esmeraldas, mediante
                una página web interactiva que proporcione información
                clara y accesible sobre sus principios, valores y
                disposiciones, promoviendo la formación ética y la
                responsabilidad en las actividades de investigación
                científica de los estudiantes universitarios.
            </p>

        </header>

        <div class="services-grid">

            <article class="service-card service-blue">
                <div class="service-icon">
                    <i class="fa-solid fa-scale-balanced"></i>
                </div>
                <span class="card-number">01</span>
                <h3>Integridad científica</h3>
                <p>
                    Promovemos la honestidad, transparencia y
                    responsabilidad en todas las etapas del
                    proceso de investigación científica.
                </p>
                <div class="service-decoration"></div>
            </article>

            <article class="service-card service-lilac">
                <div class="service-icon">
                    <i class="fa-solid fa-users"></i>
                </div>
                <span class="card-number">02</span>
                <h3>Respeto</h3>
                <p>
                    Fomentamos el respeto hacia las personas,
                    comunidades, participantes, instituciones
                    y demás actores involucrados en la investigación.
                </p>
                <div class="service-decoration"></div>
            </article>

            <article class="service-card service-mint">
                <div class="service-icon">
                    <i class="fa-solid fa-book-open"></i>
                </div>
                <span class="card-number">03</span>
                <h3>Formación ética</h3>
                <p>
                    Facilitamos información y recursos que
                    contribuyen a fortalecer los conocimientos
                    sobre ética e investigación científica.
                </p>
                <div class="service-decoration"></div>
            </article>

        </div>

    </section>

    <section id="vision" class="content-section vision-section">

        <header class="section-header">

            <span class="section-label">
                <i class="fa-solid fa-eye"></i>
                NUESTRA VISIÓN
            </span>

            <h2>
                Ser un referente tecnológico
                <span>en ética e integridad científica</span>
            </h2>

            <p>
                Consolidarse como una plataforma web de referencia
                para la difusión y consulta del Código de Ética en
                la Investigación Científica de la Universidad Técnica
                “Luis Vargas Torres” de Esmeraldas, contribuyendo al
                fortalecimiento de una cultura de integridad académica,
                responsabilidad científica y buenas prácticas
                investigativas en toda la comunidad universitaria.
            </p>

        </header>

        <div class="services-grid vision-grid">

            <article class="service-card service-peach">
                <div class="service-icon">
                    <i class="fa-solid fa-lightbulb"></i>
                </div>
                <span class="card-number">04</span>
                <h3>Investigación responsable</h3>
                <p>
                    Impulsamos una visión de la investigación
                    orientada al conocimiento y al bienestar
                    de la sociedad.
                </p>
                <div class="service-decoration"></div>
            </article>

            <article class="service-card service-pink">
                <div class="service-icon">
                    <i class="fa-solid fa-handshake"></i>
                </div>
                <span class="card-number">05</span>
                <h3>Compromiso</h3>
                <p>
                    Promovemos el compromiso de investigadores
                    y estudiantes con los principios y valores
                    de la ética científica.
                </p>
                <div class="service-decoration"></div>
            </article>

            <article class="service-card service-blue">
                <div class="service-icon">
                    <i class="fa-solid fa-graduation-cap"></i>
                </div>
                <span class="card-number">06</span>
                <h3>Educación científica</h3>
                <p>
                    Contribuimos a la formación de personas
                    capaces de comprender y aplicar principios
                    éticos en sus actividades de investigación.
                </p>
                <div class="service-decoration"></div>
            </article>

        </div>

    </section>

    <section id="blog" class="content-section resources-section">

        <header class="section-header">

            <span class="section-label">
                <i class="fa-solid fa-book-bookmark"></i>
                RECURSOS EDUCATIVOS
            </span>

            <h2>
                Aprende sobre
                <span>ética científica</span>
            </h2>

            <p>
                Explora contenidos educativos relacionados con
                los principios, valores y buenas prácticas de la
                investigación científica.
            </p>

        </header>

        <div class="blog-grid">

            <article class="blog-card blog-blue">
                <div class="blog-image">
                    <div class="blog-image-icon">
                        <i class="fa-solid fa-scale-balanced"></i>
                    </div>
                    <span class="blog-category">Ética científica</span>
                </div>

                <div class="blog-content">
                    <span class="blog-tag">
                        <i class="fa-solid fa-book-open"></i>
                        CONCEPTOS BÁSICOS
                    </span>

                    <h3>¿Qué es la ética de la investigación científica?</h3>

                    <p>
                        Conoce la importancia de los principios éticos
                        que orientan el desarrollo de una investigación
                        científica.
                    </p>

                    <a href="#mision" class="blog-link">
                        Conocer nuestra misión
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <article class="blog-card blog-lilac">
                <div class="blog-image">
                    <div class="blog-image-icon">
                        <i class="fa-solid fa-user-shield"></i>
                    </div>
                    <span class="blog-category">Responsabilidad</span>
                </div>

                <div class="blog-content">
                    <span class="blog-tag">
                        <i class="fa-solid fa-shield-halved"></i>
                        PRINCIPIOS
                    </span>

                    <h3>Principios fundamentales de la investigación</h3>

                    <p>
                        Descubre los principios que deben considerarse
                        para realizar investigaciones responsables
                        y éticas.
                    </p>

                    <a href="#vision" class="blog-link">
                        Conocer nuestra visión
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </article>

            <article class="blog-card blog-mint">
                <div class="blog-image">
                    <div class="blog-image-icon">
                        <i class="fa-solid fa-file-circle-check"></i>
                    </div>
                    <span class="blog-category">Buenas prácticas</span>
                </div>

                <div class="blog-content">
                    <span class="blog-tag">
                        <i class="fa-solid fa-check-circle"></i>
                        INTEGRIDAD
                    </span>

                    <h3>Integridad y buenas prácticas en la investigación</h3>

                    <p>
                        Aprende sobre la importancia de la honestidad,
                        transparencia y responsabilidad en el trabajo
                        científico.
                    </p>

                    <a href="#nosotros" class="blog-link">
                        Volver al inicio
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </article>

        </div>

        <div class="about-cta">

            <div class="cta-icon">
                <i class="fa-solid fa-book-open-reader"></i>
            </div>

            <div class="cta-content">
                <h3>La investigación comienza con la integridad</h3>
                <p>
                    Conoce los principios que orientan una investigación
                    científica ética y responsable.
                </p>
            </div>

            <a href="#mision" class="cta-button">
                Explorar
                <i class="fa-solid fa-arrow-right"></i>
            </a>

        </div>

    </section>

</main>
