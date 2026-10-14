<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\Infografia $model */

use yii\helpers\Html;

$this->title = 'Editar infografía';

$this->registerCssFile('@web/css/infografias.css');

$this->registerCss(<<<'CSS'
.infografias-pagina {
    --edit-primary: #7897d0;
    --edit-primary-dark: #5e7fb8;
    --edit-blue: #eaf1ff;
    --edit-lavender: #f0eaff;
    --edit-pink: #fff0f4;
    --edit-text: #394963;
    --edit-muted: #8390a5;
    --edit-border: #e4eaf4;

    width: 100%;
    min-height: calc(100vh - 78px);
    padding: 32px clamp(16px, 4vw, 58px) 50px;
    color: var(--edit-text);
    background: linear-gradient(140deg, #f7f9ff, #fcf9ff 55%, #fff9fb);
    box-sizing: border-box;
}

.infografias-pagina *,
.infografias-pagina *::before,
.infografias-pagina *::after {
    box-sizing: border-box;
}

.infografias-pagina .infografias-hero.infografias-hero-compacto {
    position: relative;
    isolation: isolate;
    overflow: hidden;
    width: 100%;
    max-width: 1200px;
    margin: 0 auto 28px;
    padding: clamp(30px, 4vw, 45px) 24px;
    text-align: center;
    background: linear-gradient(125deg, #e6efff 0%, #f0eaff 52%, #ffeff4 100%);
    border: 1px solid #e2e7f5;
    border-radius: 25px;
    box-shadow: 0 10px 30px rgba(103, 125, 173, .08);
}

.infografias-pagina .infografias-hero-compacto::before,
.infografias-pagina .infografias-hero-compacto::after {
    position: absolute;
    z-index: -1;
    content: "";
    border-radius: 50%;
    pointer-events: none;
}

.infografias-pagina .infografias-hero-compacto::before {
    top: -90px;
    left: -45px;
    width: 230px;
    height: 230px;
    background: rgba(255, 255, 255, .42);
}

.infografias-pagina .infografias-hero-compacto::after {
    right: -65px;
    bottom: -125px;
    width: 290px;
    height: 290px;
    background: rgba(255, 255, 255, .35);
}

.infografias-pagina .infografias-hero-icon {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 70px;
    height: 70px;
    margin: 0 auto 17px;
    color: #718fc8;
    background: rgba(255, 255, 255, .85);
    border: 1px solid rgba(255, 255, 255, .95);
    border-radius: 22px;
    box-shadow: 0 7px 20px rgba(103, 135, 194, .12);
}

.infografias-pagina .infografias-hero-icon i {
    font-size: 28px;
}

.infografias-pagina .infografias-hero-compacto > span {
    position: relative;
    display: block;
    margin-bottom: 10px;
    color: #7c8eb6;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 2.3px;
}

.infografias-pagina .infografias-hero-compacto h1 {
    position: relative;
    margin: 0 0 12px;
    color: #35496b;
    font-size: clamp(27px, 3vw, 37px);
    font-weight: 800;
    line-height: 1.3;
    letter-spacing: -.6px;
}

.infografias-pagina .infografias-hero-compacto p {
    position: relative;
    max-width: 650px;
    margin: 0 auto;
    color: #697991;
    font-size: 14px;
    line-height: 1.9;
}

/* CONTENEDOR DEL FORMULARIO */

.infografias-pagina .infografia-formulario-contenedor {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
}

.infografias-pagina .infografia-migas {
    margin-bottom: 21px;
}

.infografias-pagina .infografia-migas a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    min-height: 43px;
    padding: 11px 17px;
    color: #617eaf;
    font-size: 12px;
    font-weight: 750;
    background: #fff;
    border: 1px solid #e2eaf8;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(90, 112, 160, .05);
    transition: color .2s ease, background .2s ease, transform .2s ease;
}

.infografias-pagina .infografia-migas a:hover {
    color: #fff;
    background: var(--edit-primary);
    border-color: var(--edit-primary);
    transform: translateY(-2px);
}

/* TARJETA DEL FORMULARIO */

.infografias-pagina .infografia-formulario,
.infografias-pagina .infografia-form-card {
    padding: clamp(20px, 3vw, 36px);
    background: rgba(255, 255, 255, .95);
    border: 1px solid var(--edit-border);
    border-radius: 21px;
    box-shadow: 0 10px 28px rgba(90, 108, 150, .07);
}

.infografias-pagina .form-group,
.infografias-pagina .mb-3 {
    margin-bottom: 22px;
}

.infografias-pagina label,
.infografias-pagina .form-label {
    display: block;
    margin-bottom: 9px;
    color: #4b5d7b;
    font-size: 13px;
    font-weight: 750;
}

.infografias-pagina .form-control,
.infografias-pagina input[type="text"],
.infografias-pagina input[type="url"],
.infografias-pagina input[type="file"],
.infografias-pagina textarea {
    display: block;
    width: 100%;
    min-height: 46px;
    padding: 12px 14px;
    color: #43516a;
    background: #fbfcff;
    border: 1px solid #e0e7f2;
    border-radius: 12px;
    box-shadow: none;
    font-size: 13px;
    transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
}

.infografias-pagina textarea {
    min-height: 125px;
    resize: vertical;
}

.infografias-pagina .form-control:focus,
.infografias-pagina input:focus,
.infografias-pagina textarea:focus {
    color: #43516a;
    background: #fff;
    border-color: #a7bce8;
    outline: none;
    box-shadow: 0 0 0 4px rgba(139, 164, 219, .14);
}

.infografias-pagina input[type="file"] {
    padding: 9px;
    background: #f8faff;
}

.infografias-pagina input[type="file"]::file-selector-button {
    margin-right: 12px;
    padding: 8px 12px;
    color: #617eaf;
    background: #eaf1ff;
    border: 0;
    border-radius: 8px;
    cursor: pointer;
}

.infografias-pagina .help-block,
.infografias-pagina .invalid-feedback,
.infografias-pagina .help-block-error {
    margin-top: 7px;
    color: #c8798c;
    font-size: 12px;
}

.infografias-pagina .has-error .form-control {
    border-color: #e9a6b6;
}

.infografias-pagina .alert-danger {
    padding: 14px 16px;
    color: #985768;
    background: #fff0f3;
    border: 1px solid #f4d4dc;
    border-radius: 12px;
}

/* IMAGEN ACTUAL */

.infografias-pagina .infografia-formulario img,
.infografias-pagina .infografia-form-card img,
.infografias-pagina .infografia-formulario-contenedor form img {
    display: block;
    max-width: 100%;
    max-height: 330px;
    margin: 12px 0 18px;
    padding: 7px;
    object-fit: contain;
    background: #f8faff;
    border: 1px solid #e5eaf4;
    border-radius: 15px;
}

/* BOTONES */

.infografias-pagina .btn,
.infografias-pagina button[type="submit"],
.infografias-pagina input[type="submit"] {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 44px;
    padding: 11px 20px;
    border-radius: 12px;
    font-size: 12px;
    font-weight: 750;
    transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
}

.infografias-pagina .btn:hover,
.infografias-pagina button[type="submit"]:hover,
.infografias-pagina input[type="submit"]:hover {
    transform: translateY(-2px);
}

.infografias-pagina .btn-primary {
    color: #fff;
    background: #7897d0;
    border-color: #7897d0;
    box-shadow: 0 5px 13px rgba(120, 151, 208, .2);
}

.infografias-pagina .btn-primary:hover {
    color: #fff;
    background: #617fb8;
    border-color: #617fb8;
    box-shadow: 0 8px 18px rgba(120, 151, 208, .25);
}

.infografias-pagina .btn-success {
    color: #356f5b;
    background: #e5f5ed;
    border-color: #d1ebdf;
}

.infografias-pagina .btn-secondary,
.infografias-pagina .btn-default {
    color: #65738a;
    background: #f2f4f9;
    border-color: #e5e9f1;
}

/* RESPONSIVE */

@media (max-width: 768px) {
    .infografias-pagina {
        padding: 20px 14px 32px;
    }

    .infografias-pagina .infografias-hero.infografias-hero-compacto {
        padding: 30px 18px;
        border-radius: 20px;
    }

    .infografias-pagina .infografias-hero-icon {
        width: 60px;
        height: 60px;
        border-radius: 19px;
    }

    .infografias-pagina .infografias-hero-compacto > span {
        font-size: 9px;
        letter-spacing: 1.5px;
    }

    .infografias-pagina .infografias-hero-compacto p {
        font-size: 13px;
    }

    .infografias-pagina .infografia-migas a {
        width: 100%;
    }

    .infografias-pagina .infografia-formulario,
    .infografias-pagina .infografia-form-card {
        padding: 20px 16px;
    }

    .infografias-pagina .btn,
    .infografias-pagina button[type="submit"],
    .infografias-pagina input[type="submit"] {
        max-width: 100%;
    }
}

@media (prefers-reduced-motion: reduce) {
    .infografias-pagina *,
    .infografias-pagina *::before,
    .infografias-pagina *::after {
        transition: none !important;
    }
}
CSS
);
?>

<div class="infografias-pagina">

    <header class="infografias-hero infografias-hero-compacto">
        <div class="infografias-hero-icon">
            <i class="fa-solid fa-pen-to-square"></i>
        </div>

        <span>GESTIÓN DE CONTENIDO</span>

        <h1>Editar infografía</h1>

        <p>
            Actualiza el título, la descripción, la imagen o el enlace
            del recurso publicado.
        </p>
    </header>

    <div class="infografia-formulario-contenedor">

        <div class="infografia-migas">
            <?= Html::a(
                '<i class="fa-solid fa-arrow-left"></i> Volver a infografías',
                ['index']
            ) ?>
        </div>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>

</div>
