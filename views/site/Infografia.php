<?php

declare(strict_types=1);

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Infografías del Código de Ética';

$infografias = [
    [
        'titulo' => 'Principios éticos de la investigación',
        'descripcion' => 'Conoce los principios fundamentales que orientan una investigación científica responsable.',
        'categoria' => 'Principios éticos',
        'imagen' => 'principios-eticos.jpg',
    ],
    [
        'titulo' => 'Consentimiento informado',
        'descripcion' => 'La importancia de informar a los participantes y respetar su decisión voluntaria.',
        'categoria' => 'Derechos humanos',
        'imagen' => 'consentimiento-informado.jpg',
    ],
    [
        'titulo' => 'Integridad científica',
        'descripcion' => 'Buenas prácticas para prevenir el plagio, la falsificación y la manipulación de resultados.',
        'categoria' => 'Integridad científica',
        'imagen' => 'integridad-cientifica.jpg',
    ],
    [
        'titulo' => 'Protección de los participantes',
        'descripcion' => 'Respeto, privacidad, confidencialidad y protección de las personas involucradas.',
        'categoria' => 'Protección de personas',
        'imagen' => 'proteccion-participantes.jpg',
    ],
];

$this->registerCss(<<<CSS
.infografias-page {
    padding: 30px 20px 50px;
    max-width: 1400px;
    margin: 0 auto;
    color: #172033;
}

.infografias-hero {
    background: linear-gradient(135deg, #102a43, #176b87);
    color: #fff;
    padding: 42px 35px;
    border-radius: 20px;
    margin-bottom: 30px;
    position: relative;
    overflow: hidden;
}

.infografias-hero h1 {
    font-size: clamp(26px, 4vw, 38px);
    font-weight: 800;
    margin-bottom: 14px;
}

.infografias-hero p {
    font-size: 16px;
    line-height: 1.8;
    max-width: 760px;
    margin-bottom: 22px;
    color: #e5f2f8;
}

.infografias-btn {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    padding: 12px 20px;
    border-radius: 10px;
    text-decoration: none;
    font-weight: 700;
    transition: .2s ease;
}

.infografias-btn-primary {
    background: #fff;
    color: #12344b;
}

.infografias-btn-primary:hover {
    background: #dff4ff;
    color: #102a43;
    transform: translateY(-2px);
}

.infografias-section-title {
    font-size: 25px;
    font-weight: 800;
    margin: 32px 0 8px;
    color: #102a43;
}

.infografias-subtitle {
    color: #64748b;
    margin-bottom: 24px;
    line-height: 1.7;
}

.infografias-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(245px, 1fr));
    gap: 24px;
}

.infografia-card {
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(15, 23, 42, .06);
    transition: transform .25s ease, box-shadow .25s ease;
}

.infografia-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 14px 30px rgba(15, 23, 42, .12);
}

.infografia-image-wrap {
    height: 245px;
    background: #f1f5f9;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}

.infografia-image {
    width: 100%;
    height: 100%;
    object-fit: contain;
    background: #f8fafc;
    transition: transform .3s ease;
}

.infografia-card:hover .infografia-image {
    transform: scale(1.03);
}

.infografia-placeholder {
    text-align: center;
    color: #64748b;
    padding: 20px;
}

.infografia-placeholder i {
    font-size: 42px;
    color: #176b87;
    margin-bottom: 12px;
}

.infografia-body {
    padding: 22px;
}

.infografia-category {
    display: inline-block;
    background: #e0f2fe;
    color: #075985;
    font-size: 12px;
    font-weight: 800;
    padding: 6px 10px;
    border-radius: 30px;
    margin-bottom: 13px;
}

.infografia-body h3 {
    font-size: 19px;
    line-height: 1.4;
    font-weight: 800;
    color: #172033;
    margin-bottom: 10px;
}

.infografia-body p {
    color: #64748b;
    font-size: 14px;
    line-height: 1.7;
    min-height: 72px;
}

.infografia-actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    margin-top: 18px;
}

.infografia-link {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: #102a43;
    color: #fff;
    padding: 10px 13px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 13px;
    font-weight: 700;
}

.infografia-link:hover {
    background: #176b87;
    color: #fff;
}

.infografia-empty {
    padding: 35px 20px;
    text-align: center;
    color: #64748b;
}

@media (max-width: 600px) {
    .infografias-page {
        padding: 18px 12px 35px;
    }

    .infografias-hero {
        padding: 28px 22px;
    }

    .infografia-image-wrap {
        height: 220px;
    }
}
CSS);
?>

<div class="infografias-page">

    <section class="infografias-hero">
        <h1>
            <i class="fa-solid fa-images"></i>
            Infografías del Código de Ética
        </h1>

        <p>
            Explora recursos visuales que facilitan la comprensión de los
            principios, valores y buenas prácticas de la ética en la
            investigación científica.
        </p>

        <?php if (!Yii::$app->user->isGuest &&
            Yii::$app->user->identity->role === 'admin'): ?>
            <?= Html::a(
                '<i class="fa-solid fa-plus"></i> Agregar infografía',
                ['/infografias/create'],
                ['class' => 'infografias-btn infografias-btn-primary']
            ) ?>
        <?php endif; ?>
    </section>

    <h2 class="infografias-section-title">Biblioteca de infografías</h2>

    <p class="infografias-subtitle">
        Consulta y aprende sobre los temas más importantes de la ética
        científica.
    </p>

    <div class="infografias-grid">

        <?php foreach ($infografias as $infografia): ?>

            <?php
            $rutaImagen = Yii::getAlias(
                '@webroot/uploads/infografias/' . $infografia['imagen']
            );

            $imagenExiste = is_file($rutaImagen);
            ?>

            <article class="infografia-card">

                <div class="infografia-image-wrap">

                    <?php if ($imagenExiste): ?>

                        <?= Html::img(
                            '@web/uploads/infografias/' . $infografia['imagen'],
                            [
                                'class' => 'infografia-image',
                                'alt' => $infografia['titulo'],
                                'loading' => 'lazy',
                            ]
                        ) ?>

                    <?php else: ?>

                        <div class="infografia-placeholder">
                            <i class="fa-solid fa-file-image"></i>
                            <div>Imagen pendiente de publicación</div>
                        </div>

                    <?php endif; ?>

                </div>

                <div class="infografia-body">

                    <span class="infografia-category">
                        <?= Html::encode($infografia['categoria']) ?>
                    </span>

                    <h3>
                        <?= Html::encode($infografia['titulo']) ?>
                    </h3>

                    <p>
                        <?= Html::encode($infografia['descripcion']) ?>
                    </p>

                    <div class="infografia-actions">

                        <?php if ($imagenExiste): ?>

                            <?= Html::a(
                                '<i class="fa-solid fa-eye"></i> Ver infografía',
                                '@web/uploads/infografias/' . rawurlencode($infografia['imagen']),
                                [
                                    'class' => 'infografia-link',
                                    'target' => '_blank',
                                    'rel' => 'noopener noreferrer',
                                ]
                            ) ?>

                        <?php endif; ?>

                    </div>

                </div>

            </article>

        <?php endforeach; ?>

    </div>

</div>
