<?php

declare(strict_types=1);

use yii\helpers\Html;

/** @var yii\web\View $this */

$this->title = 'Blog de Investigación Científica';

$this->registerCssFile(
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css'
);

$this->registerCss(<<<'CSS'
.research-blog {
    --blog-text: #39465c;
    --blog-muted: #788398;
    --blog-blue: #e7eefc;
    --blog-blue-dark: #7895ce;
    --blog-lilac: #f0e8fa;
    --blog-lilac-dark: #9b81c3;
    --blog-mint: #e4f3e9;
    --blog-mint-dark: #68a985;
    --blog-pink: #fbe8ee;
    --blog-pink-dark: #cb829e;
    --blog-peach: #fff0e3;
    --blog-border: #e8eaf1;

    width: 100%;
    min-height: calc(100vh - 78px);
    padding: 42px clamp(16px, 4vw, 60px) 70px;
    overflow: hidden;
    color: var(--blog-text);
    background:
        radial-gradient(ellipse at 5% 5%, rgba(226, 235, 252, .7), transparent 34%),
        radial-gradient(ellipse at 95% 35%, rgba(240, 231, 250, .6), transparent 33%),
        #fbfcff;
    box-sizing: border-box;
}

.research-blog *,
.research-blog *::before,
.research-blog *::after {
    box-sizing: border-box;
}

.research-blog [hidden] {
    display: none !important;
}

.blog-container {
    width: 100%;
    max-width: 1500px;
    margin: 0 auto;
}

/* PORTADA */

.blog-hero {
    display: grid;
    grid-template-columns: minmax(0, 1.05fr) minmax(320px, .95fr);
    align-items: center;
    gap: clamp(30px, 5vw, 75px);
    padding: clamp(26px, 4vw, 55px);
    border: 1px solid #e7eaf5;
    border-radius: 30px;
    background: linear-gradient(120deg, #f0f4fd 0%, #f5effb 58%, #fdf0f4 100%);
    box-shadow: 0 15px 45px rgba(57, 70, 92, .045);
}

.blog-hero-content {
    min-width: 0;
}

.blog-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 10px 15px;
    margin-bottom: 22px;
    border: 1px solid #dce4f5;
    border-radius: 50px;
    background: rgba(255, 255, 255, .72);
    color: #7086b6;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.blog-eyebrow i {
    font-size: 14px;
}

.blog-hero h1 {
    margin: 0 0 20px;
    color: #34445d;
    font-size: clamp(32px, 4.2vw, 53px);
    font-weight: 800;
    line-height: 1.16;
    letter-spacing: -1.5px;
}

.blog-hero h1 span {
    display: block;
    margin-top: 7px;
    color: #8198cb;
}

.blog-hero-content > p {
    max-width: 600px;
    margin: 0 0 28px;
    color: var(--blog-muted);
    font-size: 15px;
    line-height: 1.95;
}

.blog-hero-button {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    min-height: 49px;
    padding: 14px 22px;
    border: 1px solid #c8d6f2;
    border-radius: 13px;
    background: #e1eafb;
    color: #5978b3;
    font-size: 13px;
    font-weight: 800;
    text-decoration: none;
    transition: transform .2s ease, background .2s ease, box-shadow .2s ease;
}

.blog-hero-button:hover,
.blog-hero-button:focus {
    transform: translateY(-2px);
    background: #d7e3f9;
    color: #4b679f;
    text-decoration: none;
    box-shadow: 0 8px 20px rgba(100, 128, 185, .12);
}

.blog-hero-visual {
    position: relative;
    min-width: 0;
    padding: 0 0 17px 17px;
}

.blog-hero-visual::before {
    position: absolute;
    top: -13px;
    right: -10px;
    width: 100px;
    height: 100px;
    border-radius: 28px;
    background: #e5dcf6;
    content: "";
}

.blog-hero-visual::after {
    position: absolute;
    bottom: 2px;
    left: 0;
    width: 85px;
    height: 85px;
    border-radius: 50%;
    background: #dceee5;
    content: "";
}

.blog-hero-visual img {
    position: relative;
    z-index: 1;
    display: block;
    width: 100%;
    height: clamp(260px, 31vw, 405px);
    border: 5px solid rgba(255, 255, 255, .9);
    border-radius: 24px;
    object-fit: cover;
    box-shadow: 0 16px 35px rgba(57, 70, 92, .13);
}

.blog-hero-badge {
    position: absolute;
    z-index: 2;
    right: 4px;
    bottom: 35px;
    display: flex;
    align-items: center;
    gap: 10px;
    max-width: calc(100% - 35px);
    padding: 13px 17px;
    border: 1px solid rgba(255, 255, 255, .9);
    border-radius: 14px;
    background: rgba(255, 255, 255, .94);
    color: #596981;
    font-size: 12px;
    font-weight: 750;
    box-shadow: 0 8px 25px rgba(57, 70, 92, .1);
}

.blog-hero-badge i {
    color: #8b9fd0;
    font-size: 18px;
}

/* VIDEO DESTACADO */

.blog-featured {
    display: grid;
    grid-template-columns: minmax(0, 1.05fr) minmax(0, .95fr);
    align-items: center;
    gap: 35px;
    margin-top: 35px;
    padding: 28px;
    border: 1px solid var(--blog-border);
    border-radius: 25px;
    background: #fff;
    box-shadow: 0 10px 30px rgba(57, 70, 92, .035);
}

.blog-featured-video {
    position: relative;
    width: 100%;
    overflow: hidden;
    border: 5px solid #f1edfa;
    border-radius: 20px;
    background: #e9e5f2;
    aspect-ratio: 16 / 9;
}

.blog-featured-video iframe {
    position: absolute;
    inset: 0;
    width: 100%;
    height: 100%;
    border: 0;
}

.blog-featured-info {
    padding: 10px 12px 10px 0;
}

.blog-category-label {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 9px 13px;
    margin-bottom: 17px;
    border-radius: 50px;
    background: #f0e9fb;
    color: #9176ba;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.2px;
}

.blog-featured-info h2 {
    margin: 0 0 15px;
    color: #39465c;
    font-size: clamp(22px, 2.6vw, 31px);
    font-weight: 800;
    line-height: 1.35;
}

.blog-featured-info p {
    margin: 0 0 21px;
    color: var(--blog-muted);
    font-size: 14px;
    line-height: 1.9;
}

.blog-text-link {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    color: #7e6ba8;
    font-size: 13px;
    font-weight: 800;
    text-decoration: none;
}

.blog-text-link:hover,
.blog-text-link:focus {
    color: #5d4b86;
    text-decoration: underline;
}

/* BIBLIOTECA */

.blog-resources {
    padding-top: 65px;
    scroll-margin-top: 95px;
}

.blog-section-heading {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 25px;
}

.blog-section-kicker {
    display: inline-block;
    margin-bottom: 10px;
    color: #8b9bc4;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.8px;
}

.blog-section-heading h2 {
    margin: 0 0 11px;
    color: #39465c;
    font-size: clamp(25px, 3vw, 35px);
    font-weight: 800;
    letter-spacing: -.7px;
}

.blog-section-heading p {
    max-width: 700px;
    margin: 0;
    color: var(--blog-muted);
    font-size: 14px;
    line-height: 1.8;
}

/* BUSCADOR */

.blog-search {
    display: flex;
    align-items: center;
    gap: 13px;
    width: 100%;
    max-width: 600px;
    min-height: 55px;
    padding: 0 18px;
    margin-bottom: 19px;
    border: 1px solid #e4e7f0;
    border-radius: 15px;
    background: #fff;
    box-shadow: 0 5px 18px rgba(57, 70, 92, .025);
    transition: border-color .2s ease, box-shadow .2s ease;
}

.blog-search:focus-within {
    border-color: #b9c9ed;
    box-shadow: 0 0 0 4px rgba(185, 201, 237, .19);
}

.blog-search > i {
    flex-shrink: 0;
    color: #92a0ba;
    font-size: 16px;
}

.blog-search input {
    width: 100%;
    min-width: 0;
    padding: 15px 0;
    border: 0;
    outline: none;
    background: transparent;
    color: #39465c;
    font-family: inherit;
    font-size: 13px;
    box-shadow: none;
}

.blog-search input::placeholder {
    color: #a0a8b8;
}

.blog-search input:focus {
    outline: none;
    border: 0;
    box-shadow: none;
}

/* FILTROS */

.blog-filters {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 18px;
}

.blog-filter {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-height: 39px;
    padding: 10px 16px;
    border: 1px solid #e5e8f0;
    border-radius: 50px;
    background: #fff;
    color: #788398;
    font-family: inherit;
    font-size: 12px;
    font-weight: 700;
    cursor: pointer;
    transition: background .2s ease, border-color .2s ease, color .2s ease, transform .2s ease;
}

.blog-filter:hover {
    transform: translateY(-1px);
    border-color: #cfd9ed;
    background: #f5f7fd;
    color: #5d7097;
}

.blog-filter.active {
    border-color: #d4def4;
    background: #e8eefb;
    color: #5f7bb4;
}

.blog-filter:focus-visible,
.blog-hero-button:focus-visible,
.blog-text-link:focus-visible,
.blog-watch-link:focus-visible,
.blog-read-more summary:focus-visible {
    outline: 3px solid #b8c9ee;
    outline-offset: 3px;
}

.blog-result-count {
    margin: 0 0 21px;
    color: #8993a6;
    font-size: 12px;
    font-weight: 650;
}

/* TARJETAS */

.blog-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 23px;
    align-items: stretch;
}

.blog-card {
    --card-pastel: #e8eefb;
    --card-accent: #829bd0;

    display: flex;
    flex-direction: column;
    min-width: 0;
    overflow: hidden;
    border: 1px solid var(--blog-border);
    border-radius: 21px;
    background: #fff;
    box-shadow: 0 8px 25px rgba(57, 70, 92, .035);
    animation: blogCardAppear .4s ease both;
    transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
}

.blog-card:nth-child(4n + 2) {
    --card-pastel: #f0e9fb;
    --card-accent: #9a80c1;
}

.blog-card:nth-child(4n + 3) {
    --card-pastel: #e4f3e9;
    --card-accent: #69a884;
}

.blog-card:nth-child(4n + 4) {
    --card-pastel: #fbe9ef;
    --card-accent: #cb839f;
}

.blog-card:hover {
    transform: translateY(-5px);
    border-color: #d8ddec;
    box-shadow: 0 16px 32px rgba(57, 70, 92, .085);
}

.blog-card-image {
    position: relative;
    overflow: hidden;
    background: var(--card-pastel);
    aspect-ratio: 16 / 10;
}

.blog-card-image::after {
    position: absolute;
    inset: 0;
    border-bottom: 3px solid var(--card-pastel);
    content: "";
    pointer-events: none;
}

.blog-card-image img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform .4s ease;
}

.blog-card:hover .blog-card-image img {
    transform: scale(1.045);
}

.blog-image-tag {
    position: absolute;
    z-index: 1;
    top: 14px;
    left: 14px;
    padding: 7px 11px;
    border: 1px solid rgba(255, 255, 255, .85);
    border-radius: 50px;
    background: rgba(255, 255, 255, .91);
    color: var(--card-accent);
    font-size: 10px;
    font-weight: 800;
}

.blog-card-body {
    display: flex;
    flex: 1;
    flex-direction: column;
    align-items: flex-start;
    padding: 23px;
}

.blog-card-category {
    display: inline-block;
    margin-bottom: 12px;
    color: var(--card-accent);
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1px;
    text-transform: uppercase;
}

.blog-card-body h3 {
    margin: 0 0 12px;
    color: #3b485e;
    font-size: 19px;
    font-weight: 800;
    line-height: 1.45;
}

.blog-card-body > p {
    flex: 1;
    margin: 0 0 20px;
    color: #7a8497;
    font-size: 13px;
    line-height: 1.85;
}

/* ARTÍCULOS DESPLEGABLES */

.blog-read-more {
    width: 100%;
    margin-top: auto;
    border-top: 1px solid #edf0f5;
}

.blog-read-more summary {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    padding: 16px 0 2px;
    color: var(--card-accent);
    font-size: 12px;
    font-weight: 800;
    cursor: pointer;
    list-style: none;
}

.blog-read-more summary::-webkit-details-marker {
    display: none;
}

.blog-read-more summary::after {
    content: "+";
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 24px;
    height: 24px;
    flex-shrink: 0;
    border-radius: 8px;
    background: var(--card-pastel);
    color: var(--card-accent);
    font-size: 17px;
    transition: transform .2s ease;
}

.blog-read-more[open] summary::after {
    content: "−";
}

.blog-read-more > div {
    padding-top: 13px;
    animation: blogCardAppear .2s ease;
}

.blog-read-more > div p {
    margin: 0;
    color: #788398;
    font-size: 13px;
    line-height: 1.9;
}

.blog-watch-link {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    margin-top: auto;
    padding-top: 15px;
    color: var(--card-accent);
    font-size: 12px;
    font-weight: 800;
    text-decoration: none;
}

.blog-watch-link:hover {
    color: #48566d;
    text-decoration: underline;
}

.blog-watch-link i {
    font-size: 17px;
}

/* SIN RESULTADOS */

.blog-empty {
    padding: 50px 20px;
    border: 1px dashed #dfe4ef;
    border-radius: 22px;
    background: rgba(255, 255, 255, .75);
    text-align: center;
}

.blog-empty > i {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 60px;
    height: 60px;
    margin-bottom: 15px;
    border-radius: 20px;
    background: #e9eefb;
    color: #8298c9;
    font-size: 23px;
}

.blog-empty h3 {
    margin: 0 0 8px;
    color: #46536a;
    font-size: 20px;
}

.blog-empty p {
    margin: 0;
    color: var(--blog-muted);
    font-size: 13px;
    line-height: 1.8;
}

/* MENSAJE FINAL */

.blog-principles {
    display: grid;
    grid-template-columns: auto minmax(0, 1fr);
    align-items: center;
    gap: 23px;
    margin-top: 48px;
    padding: 30px 34px;
    border: 1px solid #e6e1f0;
    border-radius: 24px;
    background: linear-gradient(110deg, #f0eafb 0%, #f7f2fb 53%, #edf5f8 100%);
}

.blog-principles-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 68px;
    height: 68px;
    border: 1px solid #fff;
    border-radius: 21px;
    background: rgba(255, 255, 255, .8);
    color: #9b80c3;
    font-size: 27px;
}

.blog-principles > div:last-child > span {
    display: block;
    margin-bottom: 8px;
    color: #8e7ab5;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1.5px;
}

.blog-principles h2 {
    margin: 0 0 9px;
    color: #46516a;
    font-size: clamp(20px, 2.5vw, 27px);
    font-weight: 800;
    line-height: 1.4;
}

.blog-principles p {
    max-width: 900px;
    margin: 0;
    color: #788398;
    font-size: 13px;
    line-height: 1.9;
}

@keyframes blogCardAppear {
    from {
        opacity: 0;
        transform: translateY(8px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* RESPONSIVE */

@media (max-width: 1150px) {
    .blog-hero {
        gap: 30px;
        padding: 32px;
    }

    .blog-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }
}

@media (max-width: 800px) {
    .research-blog {
        padding: 28px 16px 45px;
    }

    .blog-hero,
    .blog-featured {
        grid-template-columns: 1fr;
    }

    .blog-hero {
        padding: 27px;
        border-radius: 24px;
    }

    .blog-hero h1 {
        font-size: clamp(30px, 7vw, 43px);
    }

    .blog-hero-visual img {
        height: clamp(230px, 55vw, 350px);
    }

    .blog-featured {
        gap: 22px;
        padding: 19px;
    }

    .blog-featured-info {
        padding: 0 3px 5px;
    }

    .blog-resources {
        padding-top: 45px;
    }

    .blog-principles {
        padding: 25px;
    }
}

@media (max-width: 520px) {
    .blog-grid {
        grid-template-columns: 1fr;
        gap: 17px;
    }

    .blog-hero {
        padding: 23px 19px;
    }

    .blog-hero h1 {
        letter-spacing: -.8px;
    }

    .blog-hero-content > p {
        font-size: 14px;
    }

    .blog-hero-visual {
        padding-left: 10px;
    }

    .blog-hero-visual img {
        height: 245px;
        border-radius: 18px;
    }

    .blog-hero-badge {
        right: 0;
        bottom: 25px;
        font-size: 10px;
    }

    .blog-section-heading h2 {
        font-size: 26px;
    }

    .blog-filters {
        gap: 8px;
    }

    .blog-filter {
        padding: 9px 12px;
        font-size: 11px;
    }

    .blog-card-body {
        padding: 21px;
    }

    .blog-card-body h3 {
        font-size: 18px;
    }

    .blog-principles {
        grid-template-columns: 1fr;
        gap: 16px;
        margin-top: 32px;
        padding: 23px;
    }

    .blog-principles-icon {
        width: 56px;
        height: 56px;
        border-radius: 17px;
        font-size: 23px;
    }
}

@media (prefers-reduced-motion: reduce) {
    .research-blog *,
    .research-blog *::before,
    .research-blog *::after {
        animation: none !important;
        transition: none !important;
        scroll-behavior: auto !important;
    }
}
CSS);

$this->registerJs(<<<'JS'
(function () {
    'use strict';

    const root = document.querySelector('.research-blog');

    if (!root) {
        return;
    }

    const search = root.querySelector('#blogSearch');
    const filters = root.querySelectorAll('.blog-filter');
    const cards = root.querySelectorAll('.blog-card');
    const count = root.querySelector('#blogCount');
    const empty = root.querySelector('#blogEmpty');

    if (!search || !count || !empty || !cards.length) {
        return;
    }

    let activeCategory = 'todos';

    function normalizeText(value) {
        return String(value || '')
            .toLocaleLowerCase('es')
            .normalize('NFD')
            .replace(/[\\u0300-\\u036f]/g, '')
            .trim();
    }

    function filterContent() {
        const term = normalizeText(search.value);
        let visible = 0;

        cards.forEach(function (card) {
            const category = card.dataset.category || '';
            const content = normalizeText(card.textContent);

            const matchesCategory =
                activeCategory === 'todos' ||
                category === activeCategory;

            const matchesSearch =
                term === '' || content.includes(term);

            const show = matchesCategory && matchesSearch;

            card.hidden = !show;

            if (show) {
                visible++;
            }
        });

        count.textContent = visible === 1
            ? '1 recurso encontrado'
            : visible + ' recursos encontrados';

        empty.hidden = visible !== 0;
    }

    filters.forEach(function (filter) {
        filter.setAttribute(
            'aria-pressed',
            filter.classList.contains('active') ? 'true' : 'false'
        );

        filter.addEventListener('click', function () {
            activeCategory = filter.dataset.filter || 'todos';

            filters.forEach(function (item) {
                const isActive = item === filter;

                item.classList.toggle('active', isActive);
                item.setAttribute('aria-pressed', isActive ? 'true' : 'false');
            });

            filterContent();
        });
    });

    search.addEventListener('input', filterContent);

    filterContent();
})();
JS);
?>

<section class="research-blog">

    <div class="blog-container">

        <header class="blog-hero">

            <div class="blog-hero-content">

                <span class="blog-eyebrow">
                    <i class="fa-solid fa-book-open" aria-hidden="true"></i>
                    BLOG ACADÉMICO
                </span>

                <h1>
                    Explora el mundo de la
                    <span>investigación científica</span>
                </h1>

                <p>
                    Videos, imágenes y recursos educativos para aprender
                    sobre investigación responsable, integridad académica
                    y principios éticos de la ciencia.
                </p>

                <a href="#blog-recursos" class="blog-hero-button">
                    Explorar recursos
                    <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                </a>

            </div>

            <div class="blog-hero-visual">

                <img
                    src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?auto=format&fit=crop&w=1000&q=85"
                    alt="Material de laboratorio para investigación científica"
                    loading="lazy"
                    decoding="async"
                >

                <div class="blog-hero-badge">
                    <i class="fa-solid fa-flask" aria-hidden="true"></i>
                    Ciencia con responsabilidad
                </div>

            </div>

        </header>

        <section class="blog-featured" aria-labelledby="blog-featured-title">

            <div class="blog-featured-video">

                <iframe
                    src="https://www.youtube-nocookie.com/embed/l6-s_nTCrsk"
                    title="Video destacado sobre investigación científica"
                    loading="lazy"
                    allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin"
                    allowfullscreen>
                </iframe>

            </div>

            <div class="blog-featured-info">

                <span class="blog-category-label">
                    <i class="fa-solid fa-star" aria-hidden="true"></i>
                    RECURSO DESTACADO
                </span>

                <h2 id="blog-featured-title">
                    La importancia de la ética en la investigación
                </h2>

                <p>
                    La investigación científica exige honestidad, rigor,
                    transparencia y respeto hacia las personas participantes,
                    la comunidad y el conocimiento.
                </p>

                <a
                    href="https://www.youtube.com/watch?v=l6-s_nTCrsk"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="blog-text-link">
                    Ver en YouTube
                    <i class="fa-solid fa-arrow-up-right-from-square" aria-hidden="true"></i>
                </a>

            </div>

        </section>

        <section class="blog-resources" id="blog-recursos">

            <div class="blog-section-heading">
                <div>
                    <span class="blog-section-kicker">BIBLIOTECA DIGITAL</span>

                    <h2>Aprende a través de recursos</h2>

                    <p>
                        Explora materiales audiovisuales y artículos
                        ilustrados sobre los temas esenciales de la ciencia.
                    </p>
                </div>
            </div>

            <label class="blog-search">
                <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>

                <input
                    type="search"
                    id="blogSearch"
                    placeholder="Buscar videos, temas o artículos..."
                    aria-label="Buscar recursos por título, tema o contenido"
                    autocomplete="off"
                >
            </label>

            <div class="blog-filters" aria-label="Filtrar recursos por categoría">

                <button
                    type="button"
                    class="blog-filter active"
                    data-filter="todos"
                    aria-pressed="true">
                    Todos
                </button>

                <button
                    type="button"
                    class="blog-filter"
                    data-filter="etica"
                    aria-pressed="false">
                    Ética científica
                </button>

                <button
                    type="button"
                    class="blog-filter"
                    data-filter="integridad"
                    aria-pressed="false">
                    Integridad
                </button>

                <button
                    type="button"
                    class="blog-filter"
                    data-filter="metodologia"
                    aria-pressed="false">
                    Metodología
                </button>

                <button
                    type="button"
                    class="blog-filter"
                    data-filter="participantes"
                    aria-pressed="false">
                    Participantes
                </button>

                <button
                    type="button"
                    class="blog-filter"
                    data-filter="publicacion"
                    aria-pressed="false">
                    Publicación
                </button>

            </div>

            <p
                class="blog-result-count"
                id="blogCount"
                aria-live="polite"
                aria-atomic="true">
                9 recursos encontrados
            </p>

            <div class="blog-grid">

                <article class="blog-card" data-category="metodologia">

                    <div class="blog-card-image">
                        <img
                            src="https://images.unsplash.com/photo-1532619675605-1ede6c2ed2b0?auto=format&fit=crop&w=800&q=80"
                            alt="Investigadora analizando información científica"
                            loading="lazy"
                            decoding="async"
                        >
                        <span class="blog-image-tag">Artículo</span>
                    </div>

                    <div class="blog-card-body">

                        <span class="blog-card-category">Metodología</span>

                        <h3>¿Qué es la investigación científica?</h3>

                        <p>
                            Descubre cómo se formula un problema, se recopilan
                            evidencias y se analizan resultados mediante métodos
                            sistemáticos y verificables.
                        </p>

                        <details class="blog-read-more">
                            <summary>Leer artículo</summary>
                            <div>
                                <p>
                                    La investigación científica es un proceso
                                    ordenado que busca responder preguntas,
                                    generar conocimientos y contrastar hipótesis.
                                    Debe describir sus métodos con claridad,
                                    fundamentar sus conclusiones en evidencias
                                    y reconocer las limitaciones del estudio.
                                </p>
                            </div>
                        </details>

                    </div>
                </article>

                <article class="blog-card" data-category="etica">

                    <div class="blog-card-image">
                        <img
                            src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?auto=format&fit=crop&w=800&q=80"
                            alt="Profesionales trabajando en un entorno sanitario"
                            loading="lazy"
                            decoding="async"
                        >
                        <span class="blog-image-tag">Artículo</span>
                    </div>

                    <div class="blog-card-body">

                        <span class="blog-card-category">Ética científica</span>

                        <h3>Principios éticos de la investigación</h3>

                        <p>
                            Conoce el respeto por las personas, la beneficencia,
                            la justicia y la responsabilidad durante el proceso
                            investigativo.
                        </p>

                        <details class="blog-read-more">
                            <summary>Leer artículo</summary>
                            <div>
                                <p>
                                    La ética orienta las decisiones del
                                    investigador. Implica proteger la dignidad,
                                    reducir los riesgos, distribuir las cargas
                                    y beneficios de forma justa y actuar con
                                    honestidad durante todas las etapas del estudio.
                                </p>
                            </div>
                        </details>

                    </div>
                </article>

                <article class="blog-card" data-category="integridad">

                    <div class="blog-card-image">
                        <img
                            src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?auto=format&fit=crop&w=800&q=80"
                            alt="Documentos y trabajo de análisis académico"
                            loading="lazy"
                            decoding="async"
                        >
                        <span class="blog-image-tag">Artículo</span>
                    </div>

                    <div class="blog-card-body">

                        <span class="blog-card-category">Integridad</span>

                        <h3>Honestidad y transparencia científica</h3>

                        <p>
                            Aprende por qué es necesario presentar datos
                            auténticos, describir los métodos y comunicar
                            resultados sin distorsionarlos.
                        </p>

                        <details class="blog-read-more">
                            <summary>Leer artículo</summary>
                            <div>
                                <p>
                                    La integridad científica requiere conservar
                                    registros adecuados, informar los resultados
                                    de manera fiel, reconocer las contribuciones
                                    de otras personas y declarar los conflictos
                                    de interés relevantes.
                                </p>
                            </div>
                        </details>

                    </div>
                </article>

                <article class="blog-card" data-category="integridad">

                    <div class="blog-card-image">
                        <img
                            src="https://images.unsplash.com/photo-1455390582262-044cdead277a?auto=format&fit=crop&w=800&q=80"
                            alt="Persona escribiendo un documento académico"
                            loading="lazy"
                            decoding="async"
                        >
                        <span class="blog-image-tag">Artículo</span>
                    </div>

                    <div class="blog-card-body">

                        <span class="blog-card-category">Integridad</span>

                        <h3>Plagio y reconocimiento de autoría</h3>

                        <p>
                            Aprende a citar fuentes, parafrasear correctamente
                            y reconocer las ideas y aportaciones de otros autores.
                        </p>

                        <details class="blog-read-more">
                            <summary>Leer artículo</summary>
                            <div>
                                <p>
                                    El plagio consiste en presentar ideas,
                                    palabras o trabajos ajenos como propios.
                                    Para prevenirlo, cita las fuentes utilizadas,
                                    diferencia las citas textuales de las
                                    paráfrasis y asigna la autoría de acuerdo
                                    con las contribuciones reales.
                                </p>
                            </div>
                        </details>

                    </div>
                </article>

                <article class="blog-card" data-category="participantes">

                    <div class="blog-card-image">
                        <img
                            src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=800&q=80"
                            alt="Personas participando en una conversación"
                            loading="lazy"
                            decoding="async"
                        >
                        <span class="blog-image-tag">Artículo</span>
                    </div>

                    <div class="blog-card-body">

                        <span class="blog-card-category">Participantes</span>

                        <h3>Consentimiento informado</h3>

                        <p>
                            Comprende el derecho de los participantes a recibir
                            información clara y decidir libremente si participan
                            en un estudio.
                        </p>

                        <details class="blog-read-more">
                            <summary>Leer artículo</summary>
                            <div>
                                <p>
                                    El consentimiento informado debe explicar
                                    el propósito del estudio, los procedimientos,
                                    los riesgos previsibles, los beneficios
                                    esperados y las condiciones para retirarse.
                                    Debe respetarse la autonomía de cada persona.
                                </p>
                            </div>
                        </details>

                    </div>
                </article>

                <article class="blog-card" data-category="participantes">

                    <div class="blog-card-image">
                        <img
                            src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=800&q=80"
                            alt="Trabajo con información en un ordenador"
                            loading="lazy"
                            decoding="async"
                        >
                        <span class="blog-image-tag">Artículo</span>
                    </div>

                    <div class="blog-card-body">

                        <span class="blog-card-category">Protección de datos</span>

                        <h3>Privacidad y confidencialidad</h3>

                        <p>
                            Conoce prácticas para proteger los datos personales
                            y evitar divulgaciones no autorizadas de información.
                        </p>

                        <details class="blog-read-more">
                            <summary>Leer artículo</summary>
                            <div>
                                <p>
                                    Los investigadores deben limitar la
                                    recopilación de datos a lo necesario,
                                    proteger los archivos, controlar los accesos
                                    y explicar cómo se almacenará y utilizará
                                    la información de los participantes.
                                </p>
                            </div>
                        </details>

                    </div>
                </article>

                <article class="blog-card" data-category="publicacion">

                    <div class="blog-card-image">
                        <img
                            src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?auto=format&fit=crop&w=800&q=80"
                            alt="Estanterías de libros y material de consulta"
                            loading="lazy"
                            decoding="async"
                        >
                        <span class="blog-image-tag">Artículo</span>
                    </div>

                    <div class="blog-card-body">

                        <span class="blog-card-category">Publicación</span>

                        <h3>Buenas prácticas en publicaciones</h3>

                        <p>
                            Revisa la importancia de citar adecuadamente,
                            informar resultados con honestidad y reconocer
                            las contribuciones de cada autor.
                        </p>

                        <details class="blog-read-more">
                            <summary>Leer artículo</summary>
                            <div>
                                <p>
                                    Una publicación responsable presenta
                                    resultados verificables, explica los métodos,
                                    identifica las fuentes, declara conflictos
                                    de interés y evita la duplicación engañosa
                                    de publicaciones.
                                </p>
                            </div>
                        </details>

                    </div>
                </article>

                <article class="blog-card" data-category="etica">

                    <div class="blog-card-image">
                        <img
                            src="https://images.unsplash.com/photo-1531482615713-2afd69097998?auto=format&fit=crop&w=800&q=80"
                            alt="Equipo de trabajo colaborando en un proyecto"
                            loading="lazy"
                            decoding="async"
                        >
                        <span class="blog-image-tag">Artículo</span>
                    </div>

                    <div class="blog-card-body">

                        <span class="blog-card-category">Responsabilidad</span>

                        <h3>Conflictos de interés</h3>

                        <p>
                            Identifica situaciones personales, económicas
                            o profesionales que podrían influir en las
                            decisiones de una investigación.
                        </p>

                        <details class="blog-read-more">
                            <summary>Leer artículo</summary>
                            <div>
                                <p>
                                    Los conflictos de interés deben identificarse,
                                    comunicarse y gestionarse de forma transparente.
                                    Su existencia no implica automáticamente una
                                    conducta incorrecta, pero ocultarlos puede
                                    comprometer la confianza en los resultados.
                                </p>
                            </div>
                        </details>

                    </div>
                </article>

                <article class="blog-card" data-category="metodologia">

                    <div class="blog-card-image">
                        <img
                            src="https://images.unsplash.com/photo-1507668077129-56e32842fceb?auto=format&fit=crop&w=800&q=80"
                            alt="Material científico para estudiar y analizar"
                            loading="lazy"
                            decoding="async"
                        >
                        <span class="blog-image-tag">Video</span>
                    </div>

                    <div class="blog-card-body">

                        <span class="blog-card-category">Metodología</span>

                        <h3>Cómo organizar un proyecto de investigación</h3>

                        <p>
                            Revisa los elementos básicos de un proyecto:
                            problema, objetivos, metodología, recursos,
                            cronograma y resultados esperados.
                        </p>

                        <a
                            class="blog-watch-link"
                            href="https://www.youtube.com/results?search_query=como+elaborar+un+proyecto+de+investigacion+cientifica"
                            target="_blank"
                            rel="noopener noreferrer">
                            <i class="fa-brands fa-youtube" aria-hidden="true"></i>
                            Buscar videos del tema
                        </a>

                    </div>
                </article>

            </div>

            <div class="blog-empty" id="blogEmpty" hidden>
                <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>

                <h3>No encontramos recursos</h3>

                <p>
                    Prueba con otra palabra o selecciona una categoría diferente.
                </p>
            </div>

        </section>

        <section class="blog-principles" aria-labelledby="blog-principles-title">

            <div class="blog-principles-icon">
                <i class="fa-solid fa-lightbulb" aria-hidden="true"></i>
            </div>

            <div>
                <span>INVESTIGAR CON RESPONSABILIDAD</span>

                <h2 id="blog-principles-title">
                    El conocimiento también requiere ética.
                </h2>

                <p>
                    Una investigación de calidad no solo busca resultados:
                    también respeta a las personas, protege la información,
                    reconoce las fuentes y contribuye al bienestar de la sociedad.
                </p>
            </div>

        </section>

    </div>

</section>
