<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\Infografia $model */

use yii\helpers\Html;

$this->title = 'Agregar infografía';

$this->registerCssFile('@web/css/infografias.css');

$this->registerCss(<<<'CSS'
.infografias-pagina {
    --inf-primary: #6688c5;
    --inf-primary-dark: #4e70ad;
    --inf-blue: #eaf2ff;
    --inf-lavender: #f0eaff;
    --inf-pink: #fff0f3;
    --inf-mint: #e8f7f0;
    --inf-yellow: #fff7df;
    --inf-text: #39465c;
    --inf-muted: #7c879b;
    --inf-border: #e5eaf2;

    width: 100%;
    min-height: calc(100vh - 78px);
    padding: 30px clamp(16px, 4vw, 55px) 45px;
    background: linear-gradient(
        135deg,
        #f8faff 0%,
        #fdf9ff 48%,
        #fffafd 100%
    );
    color: var(--inf-text);
    box-sizing: border-box;
}

.infografias-pagina *,
.infografias-pagina *::before,
.infografias-pagina *::after {
    box-sizing: border-box;
}

.infografias-hero.infografias-hero-compacto {
    position: relative;
    overflow: hidden;
    max-width: 1200px;
    margin: 0 auto 28px;
    padding: 34px 30px;
    text-align: center;
    background: linear-gradient(120deg, #e8f1ff, #f0eaff 55%, #fff0f5);
    border: 1px solid rgba(220, 227, 247, .9);
    border-radius: 24px;
    box-shadow: 0 10px 30px rgba(95, 116, 165, .08);
}

.infografias-hero.infografias-hero-compacto::before,
.infografias-hero.infografias-hero-compacto::after {
    content: "";
    position: absolute;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    pointer-events: none;
}

.infografias-hero.infografias-hero-compacto::before {
    top: -85px;
    left: -40px;
    background: rgba(255, 255, 255, .45);
}

.infografias-hero.infografias-hero-compacto::after {
    right: -55px;
    bottom: -105px;
    width: 220px;
    height: 220px;
    background: rgba(255, 255, 255, .35);
}

.infografias-hero-icon {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 68px;
    height: 68px;
    margin: 0 auto 16px;
    color: #6688c5;
    background: rgba(255, 255, 255, .8);
    border: 1px solid rgba(255, 255, 255, .95);
    border-radius: 21px;
    box-shadow: 0 7px 18px rgba(102, 136, 197, .12);
}

.infografias-hero-icon i {
    font-size: 27px;
}

.infografias-hero.infografias-hero-compacto > span {
    position: relative;
    z-index: 1;
    display: inline-block;
    margin-bottom: 9px;
    color: #7183ac;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 2px;
}

.infografias-hero.infografias-hero-compacto h1 {
    position: relative;
    z-index: 1;
    margin: 0 0 12px;
    color: #354b70;
    font-size: clamp(27px, 3vw, 38px);
    font-weight: 800;
    letter-spacing: -.8px;
}

.infografias-hero.infografias-hero-compacto p {
    position: relative;
    z-index: 1;
    max-width: 650px;
    margin: 0 auto;
    color: #68758d;
    font-size: 15px;
    line-height: 1.8;
}

.infografia-formulario-contenedor {
    max-width: 1200px;
    margin: 0 auto;
}

.infografia-migas {
    margin-bottom: 20px;
}

.infografia-migas a {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 11px 17px;
    color: #617eaf;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    background: #fff;
    border: 1px solid #e2eaf8;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(90, 112, 160, .05);
    transition: background .2s ease, color .2s ease, transform .2s ease;
}

.infografia-migas a:hover {
    color: #fff;
    background: #7897d0;
    border-color: #7897d0;
    transform: translateY(-2px);
}

.infografia-migas a i {
    font-size: 12px;
}

.infografia-formulario-contenedor form {
    width: 100%;
}

/* Adaptación de tarjetas y formularios incluidos desde _form.php */
.infografias-pagina .infografia-formulario,
.infografias-pagina .infografia-form-card,
.infografias-pagina .card {
    border-color: var(--inf-border);
    border-radius: 20px;
}

.infografias-pagina .infografia-formulario,
.infografias-pagina .infografia-form-card {
    padding: clamp(20px, 3vw, 34px);
    background: rgba(255, 255, 255, .94);
    box-shadow: 0 10px 28px rgba(90, 108, 150, .07);
}

.infografias-pagina .form-label,
.infografias-pagina label {
    margin-bottom: 9px;
    color: #4b5d7b;
    font-size: 13px;
    font-weight: 700;
}

.infografias-pagina .form-control,
.infografias-pagina input[type="text"],
.infografias-pagina input[type="url"],
.infografias-pagina input[type="file"],
.infografias-pagina textarea {
    width: 100%;
    min-height: 46px;
    padding: 12px 14px;
    color: #43516a;
    background-color: #fbfcff;
    border: 1px solid #e0e7f2;
    border-radius: 12px;
    box-shadow: none;
    transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
}

.infografias-pagina textarea {
    min-height: 125px;
    resize: vertical;
}

.infografias-pagina .form-control:focus,
.infografias-pagina input:focus,
.infografias-pagina textarea:focus {
    background-color: #fff;
    border-color: #a7bce8;
    outline: none;
    box-shadow: 0 0 0 4px rgba(139, 164, 219, .14);
}

.infografias-pagina .help-block,
.infografias-pagina .invalid-feedback {
    margin-top: 7px;
    color: #cc7187;
    font-size: 12px;
}

.infografias-pagina .has-error .form-control {
    border-color: #e9a6b6;
}

.infografias-pagina .alert-danger {
    color: #985768;
    background: #fff0f3;
    border: 1px solid #f4d4dc;
    border-radius: 12px;
}

.infografias-pagina .btn,
.infografias-pagina button[type="submit"],
.infografias-pagina input[type="submit"] {
    min-height: 44px;
    padding: 11px 20px;
    border-radius: 12px;
    font-size: 13px;
    font-weight: 700;
    transition: transform .2s ease, box-shadow .2s ease;
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
    background: #6585c0;
    border-color: #6585c0;
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

.infografias-pagina img {
    max-width: 100%;
    height: auto;
    border-radius: 14px;
}

@media (min-width: 1500px) {
    .infografias-pagina {
        padding-right: 65px;
        padding-left: 65px;
    }
}

@media (max-width: 768px) {
    .infografias-pagina {
        padding: 20px 14px 30px;
    }

    .infografias-hero.infografias-hero-compacto {
        padding: 28px 18px;
        border-radius: 19px;
    }

    .infografias-hero-icon {
        width: 58px;
        height: 58px;
        border-radius: 18px;
    }

    .infografias-hero.infografias-hero-compacto p {
        font-size: 13px;
    }

    .infografias-pagina .infografia-formulario,
    .infografias-pagina .infografia-form-card {
        padding: 20px 16px;
    }

    .infografia-migas a {
        width: 100%;
        justify-content: center;
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
            <i class="fa-solid fa-cloud-arrow-up"></i>
        </div>

        <span>GESTIÓN DE CONTENIDO</span>

        <h1>Publicar infografía</h1>

        <p>
            Agrega una imagen educativa y comparte recursos relacionados
            con el Código de Ética en la Investigación Científica.
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
