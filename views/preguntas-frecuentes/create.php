<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\PreguntasFrecuentes $model */

use yii\helpers\Html;

$this->title = 'Crear pregunta frecuente';

$this->registerCssFile('@web/css/paginacion.css');

$this->registerCss(<<<'CSS'
.faq-create-page {
    --create-primary: #819bd5;
    --create-text: #46536d;
    --create-muted: #8791a5;
    --create-border: #e7eaf3;

    width: 100%;
    max-width: none;
    margin: 0;
    padding: 28px clamp(14px, 2.5vw, 38px) 40px;
    color: var(--create-text);
    box-sizing: border-box;
}

.faq-create-page *,
.faq-create-page *::before,
.faq-create-page *::after {
    box-sizing: border-box;
}

/* Encabezado pastel */

.faq-create-page .faq-header {
    position: relative;
    overflow: hidden;
    padding: 36px 25px;
    margin-bottom: 25px;
    text-align: center;
    background:
        radial-gradient(circle at 8% 15%, #fceaf1 0, transparent 29%),
        radial-gradient(circle at 92% 90%, #e2f5ed 0, transparent 30%),
        linear-gradient(135deg, #edf3ff 0%, #f3efff 55%, #fff3f5 100%);
    border: 1px solid #e3e9fa;
    border-radius: 24px;
    box-shadow: 0 8px 28px rgba(112, 132, 177, .08);
}

.faq-create-page .faq-header-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 68px;
    height: 68px;
    margin: 0 auto 17px;
    color: #7a91ce;
    background: #fff;
    border: 1px solid #e0e7fb;
    border-radius: 21px;
    box-shadow: 0 6px 18px rgba(111, 134, 197, .12);
    font-size: 27px;
}

.faq-create-page .faq-header h1 {
    margin: 0 0 12px;
    color: #394766;
    font-size: clamp(25px, 3vw, 34px);
    font-weight: 800;
    letter-spacing: -.6px;
}

.faq-create-page .faq-header p {
    max-width: 650px;
    margin: 0 auto;
    color: #7b8498;
    font-size: 14px;
    line-height: 1.8;
}

/* Contenedor del formulario */

.faq-create-page .faq-table-card {
    width: 100%;
    overflow: hidden;
    background: #fff;
    border: 1px solid var(--create-border);
    border-radius: 21px;
    box-shadow: 0 8px 28px rgba(75, 91, 132, .055);
}

.faq-create-page .faq-table-heading {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 23px 28px;
    background: linear-gradient(110deg, #fff 0%, #fafaff 100%);
    border-bottom: 1px solid #eff0f6;
}

.faq-create-page .faq-heading-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex: 0 0 46px;
    width: 46px;
    height: 46px;
    color: #8296ce;
    background: #eaf0ff;
    border: 1px solid #e0e8fc;
    border-radius: 14px;
    font-size: 18px;
}

.faq-create-page .faq-table-heading h2 {
    margin: 0 0 7px;
    color: #46536d;
    font-size: 18px;
    font-weight: 800;
}

.faq-create-page .faq-table-heading h2 i {
    display: none;
}

.faq-create-page .faq-table-heading p {
    margin: 0;
    color: #8992a5;
    font-size: 13px;
    line-height: 1.7;
}

/* Espacio interior del formulario */

.faq-create-page .faq-form {
    margin: 0;
    padding: 28px;
    background: #fff;
    border: 0;
    border-radius: 0;
    box-shadow: none;
}

.faq-create-page .faq-form .faq-form-group {
    margin-bottom: 24px;
}

.faq-create-page .faq-form .control-label {
    color: #53617c;
}

.faq-create-page .faq-form .faq-select,
.faq-create-page .faq-form .faq-input,
.faq-create-page .faq-form .faq-textarea {
    background-color: #fafbff;
}

.faq-create-page .faq-form .faq-select:focus,
.faq-create-page .faq-form .faq-input:focus,
.faq-create-page .faq-form .faq-textarea:focus {
    background: #fff;
}

/* Mensajes de validación */

.faq-create-page .faq-form .help-block {
    color: #d4778b;
    font-size: 12px;
}

.faq-create-page .faq-form .has-error .faq-select,
.faq-create-page .faq-form .has-error .faq-input,
.faq-create-page .faq-form .has-error .faq-textarea {
    border-color: #edb4c0;
    background: #fffafb;
}

/* Adaptación a móviles */

@media (max-width: 900px) {
    .faq-create-page {
        padding: 20px 16px 30px;
    }

    .faq-create-page .faq-header {
        padding: 30px 20px;
    }

    .faq-create-page .faq-table-heading {
        padding: 21px;
    }

    .faq-create-page .faq-form {
        padding: 24px 21px;
    }
}

@media (max-width: 600px) {
    .faq-create-page {
        padding: 14px 10px 24px;
    }

    .faq-create-page .faq-header {
        padding: 25px 16px;
        border-radius: 18px;
    }

    .faq-create-page .faq-header-icon {
        width: 58px;
        height: 58px;
        border-radius: 17px;
        font-size: 24px;
    }

    .faq-create-page .faq-header h1 {
        font-size: 25px;
    }

    .faq-create-page .faq-header p {
        font-size: 13px;
    }

    .faq-create-page .faq-table-card {
        border-radius: 17px;
    }

    .faq-create-page .faq-table-heading {
        align-items: flex-start;
        padding: 18px 15px;
    }

    .faq-create-page .faq-heading-icon {
        flex-basis: 40px;
        width: 40px;
        height: 40px;
        border-radius: 12px;
    }

    .faq-create-page .faq-table-heading h2 {
        font-size: 16px;
    }

    .faq-create-page .faq-form {
        padding: 20px 15px;
    }
}
CSS);

?>

<div class="faq-create-page">

    <div class="faq-header">
        <div class="faq-header-icon">
            <i class="fas fa-circle-question"></i>
        </div>

        <h1>Crear pregunta frecuente</h1>

        <p>
            Registra una nueva pregunta y su respuesta para facilitar
            la consulta de información sobre ética e investigación científica.
        </p>
    </div>

    <div class="faq-table-card faq-create-card">

        <div class="faq-table-heading">
            <div class="faq-heading-icon">
                <i class="fas fa-file-circle-plus"></i>
            </div>

            <div>
                <h2>Información de la pregunta</h2>
                <p>Completa los campos para registrar una nueva pregunta frecuente.</p>
            </div>
        </div>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>

</div>
