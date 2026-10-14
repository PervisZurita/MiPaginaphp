<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var string $content */

use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\helpers\Html;
use yii\web\YiiAsset;

$this->registerCssFile('@web/css/abaut.css');
$this->registerCssFile('@web/css/xxx.css');

$this->registerCssFile('@web/css/sidebar.css', [
    'depends' => [YiiAsset::class],
]);

$this->registerCssFile(
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css'
);

$this->registerCss(<<<'CSS'
:root {
    --sidebar-width: 270px;
    --sidebar-collapsed-width: 82px;
    --sidebar-top: 78px;
}

html,
body {
    min-height: 100%;
    width: 100%;
}

html {
    overflow-x: clip;
}

body {
    margin: 0;
    overflow-x: clip;
}

/* CONTENIDO PRINCIPAL */

#main {
    display: block;
    flex: 1 0 auto;

    box-sizing: border-box;
    min-width: 0;
    max-width: 100%;

    width: 100%;
    margin: 0;
    padding: 0;

    transition:
        margin-left .28s ease,
        width .28s ease;
}

/* SIDEBAR CERRADO */

body.sidebar-is-collapsed #main,
body.sidebar-collapsed #main {
    width: calc(100% - var(--sidebar-collapsed-width));
    margin-left: var(--sidebar-collapsed-width);
}

/* SIDEBAR ABIERTO */

body.sidebar-is-expanded #main,
body.sidebar-expanded #main {
    width: calc(100% - var(--sidebar-width));
    margin-left: var(--sidebar-width);
}

/* CONTENIDO INTERIOR */

#main > .content-full {
    box-sizing: border-box;
    width: 100%;
    min-width: 0;
    max-width: 100%;
    padding: 20px;
}

/* Evita que los elementos anchos desborden la página */

#main img,
#main video,
#main iframe {
    max-width: 100%;
}

#main .table-responsive {
    max-width: 100%;
}

#main pre {
    max-width: 100%;
    overflow-x: auto;
}

/* PIE DE PÁGINA */

.site-footer {
    position: relative;
    z-index: 1;

    flex-shrink: 0;
    width: 100%;
    margin-top: auto;
    padding: 9px 20px;

    color: #333333;
    background: #ffffff;
    border-top: 2px solid #dce8fa;

    text-align: center;
    font-size: 12px;
    line-height: 1.4;

    box-sizing: border-box;
}

.site-footer-content {
    max-width: 1200px;
    margin: 0 auto;
}

.site-footer-title {
    margin: 0 0 3px;
    color: #596579;
    font-size: 13px;
    font-weight: 700;
    line-height: 1.4;
}

.site-footer-description {
    margin: 0 0 5px;
    color: #929db0;
    font-size: 11px;
    line-height: 1.4;
}

.site-footer-divider {
    width: 40px;
    height: 2px;
    margin: 5px auto;
    background: #c9d7f1;
    border-radius: 5px;
}

.site-footer-credits {
    margin: 2px 0 0;
    color: #929db0;
    font-size: 10px;
    line-height: 1.4;
}

.site-footer-credits strong {
    color: #596579;
    font-weight: 700;
}

.site-footer-icon {
    margin-right: 4px;
    color: #879bc5;
}

.site-footer a {
    color: #7187b4;
    text-decoration: none;
}

.site-footer a:hover {
    color: #526991;
    text-decoration: underline;
}

/* TABLETAS Y MÓVILES */

@media (max-width: 768px) {
    /*
     * En móviles el sidebar se superpone al contenido.
     * El contenido principal no cambia de margen.
     */

    #main,
    body.sidebar-is-expanded #main,
    body.sidebar-is-collapsed #main,
    body.sidebar-expanded #main,
    body.sidebar-collapsed #main {
        width: 100%;
        margin-left: 0;
    }

    #main > .content-full {
        padding: 16px;
    }
}

@media (max-width: 576px) {
    #main > .content-full {
        padding: 12px;
    }

    .site-footer {
        padding: 8px 12px;
    }

    .site-footer-title {
        font-size: 12px;
    }

    .site-footer-description {
        font-size: 10px;
    }

    .site-footer-credits {
        font-size: 9px;
    }
}

@media (prefers-reduced-motion: reduce) {
    #main {
        transition: none;
    }
}
CSS);

?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100" data-bs-theme="light">

<head>
    <meta charset="<?= Yii::$app->charset ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php $this->head() ?>

    <title><?= Html::encode(
        $this->title ?: 'Código de Ética en la Investigación Científica'
    ) ?></title>
</head>

<body class="d-flex flex-column min-vh-100 sidebar-is-collapsed sidebar-collapsed">

<?php $this->beginBody() ?>

<?php if (!Yii::$app->user->isGuest): ?>
    <?= $this->render('_header') ?>

    <?= $this->render('_sidebar') ?>
<?php endif; ?>

<main id="main" class="flex-grow-1" role="main">

    <div class="content-full">

        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <?= Breadcrumbs::widget([
                'links' => $this->params['breadcrumbs'],
            ]) ?>
        <?php endif; ?>

        <?= Alert::widget() ?>

        <?= $content ?>

    </div>

</main>

<?php if (!Yii::$app->user->isGuest): ?>
    <?= $this->render('../chatbot/index') ?>
<?php endif; ?>

<footer class="site-footer">
    <div class="site-footer-content">

        <div class="site-footer-title">
            <i class="fa-solid fa-scale-balanced site-footer-icon"></i>
            Código de Ética en la Investigación Científica
        </div>

        <p class="site-footer-description">
            Universidad Técnica Luis Vargas Torres de Esmeraldas
        </p>

        <div class="site-footer-divider"></div>

        <p class="site-footer-credits">
            &copy; <?= date('Y') ?>
            <strong>UTLVTE</strong>.
            Todos los derechos reservados.
        </p>

        <p class="site-footer-credits">
            <i class="fa-solid fa-code site-footer-icon"></i>
            Sistema desarrollado con fines académicos.
        </p>

    </div>
</footer>

<?php $this->endBody() ?>

</body>
</html>

<?php $this->endPage() ?>
