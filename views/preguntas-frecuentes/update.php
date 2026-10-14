<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\PreguntasFrecuentes $model */

use yii\helpers\Html;

$this->title = 'Actualizar pregunta frecuente';

$this->registerCssFile('@web/css/paginacion.css');

$this->registerCss(<<<'CSS'
.faq-update-page {
    --update-primary: #819bd5;
    --update-text: #46536d;
    --update-muted: #8791a5;
    --update-border: #e7eaf3;

    width: 100%;
    max-width: none;
    margin: 0;
    padding: 28px clamp(14px, 2.5vw, 38px) 40px;
    color: var(--update-text);
    box-sizing: border-box;
}

.faq-update-page *,
.faq-update-page *::before,
.faq-update-page *::after {
    box-sizing: border-box;
}

/* Encabezado */

.faq-update-page .faq-header {
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

.faq-update-page .faq-header-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 68px;
    height: 68px;
    margin: 0 auto 17px;
    color: #8b7bc3;
    background: #fff;
    border: 1px solid #e8e0fb;
    border-radius: 21px;
    box-shadow: 0 6px 18px rgba(139, 123, 195, .12);
    font-size: 27px;
}

.faq-update-page .faq-header h1 {
    margin: 0 0 12px;
    color: #394766;
    font-size: clamp(25px, 3vw, 34px);
    font-weight: 800;
    letter-spacing: -.6px;
}

.faq-update-page .faq-header p {
    max-width: 650px;
    margin: 0 auto;
    color: #7b8498;
    font-size: 14px;
    line-height: 1.8;
}

/* Tarjeta de edición */

.faq-update-page .faq-table-card {
    width: 100%;
    overflow: hidden;
    background: #fff;
    border: 1px solid var(--update-border);
    border-radius: 21px;
    box-shadow: 0 8px 28px rgba(75, 91, 132, .055);
}

.faq-update-page .faq-table-heading {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 23px 28px;
    background: linear-gradient(110deg, #fff 0%, #fafaff 100%);
    border-bottom: 1px solid #eff0f6;
}

.faq-update-page .faq-heading-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    flex: 0 0 46px;
    width: 46px;
    height: 46px;
    color: #8b7bc3;
    background: #f0eaff;
    border: 1px solid #e6ddfb;
    border-radius: 14px;
    font-size: 18px;
}

.faq-update-page .faq-table-heading h2 {
    margin: 0 0 7px;
    color: #46536d;
    font-size: 18px;
    font-weight: 800;
}

.faq-update-page .faq-table-heading p {
    margin: 0;
    color: #8992a5;
    font-size: 13px;
    line-height: 1.7;
}

/* Formulario integrado */

.faq-update-page .faq-form {
    margin: 0;
    padding: 28px;
    background: #fff;
    border: 0;
    border-radius: 0;
    box-shadow: none;
}

.faq-update-page .faq-form .faq-form-group {
    margin-bottom: 24px;
}

.faq-update-page .faq-form .control-label {
    color: #53617c;
}

.faq-update-page .faq-form .faq-select,
.faq-update-page .faq-form .faq-input,
.faq-update-page .faq-form .faq-textarea {
    background-color: #fafbff;
}

.faq-update-page .faq-form .faq-select:focus,
.faq-update-page .faq-form .faq-input:focus,
.faq-update-page .faq-form .faq-textarea:focus {
    background: #fff;
    border-color: #a4b6e5;
    box-shadow: 0 0 0 4px rgba(164, 182, 229, .17);
}

.faq-update-page .faq-form .help-block {
    color: #d4778b;
    font-size: 12px;
}

.faq-update-page .faq-form .has-error .faq-select,
.faq-update-page .faq-form .has-error .faq-input,
.faq-update-page .faq-form .has-error .faq-textarea {
    border-color: #edb4c0;
    background: #fffafb;
}

/* Botones */

.faq-update-page .faq-form-actions {
    padding-top: 23px;
    border-top: 1px solid #eff0f6;
}

.faq-update-page .faq-form .btn-faq-primary {
    background: #819bd5;
}

.faq-update-page .faq-form .btn-faq-primary:hover {
    background: #6d86c1;
}

.faq-update-page .faq-form .btn-faq-secondary {
    background: #f4f5fa;
}

/* Adaptación responsive */

@media (max-width: 900px) {
    .faq-update-page {
        padding: 20px 16px 30px;
    }

    .faq-update-page .faq-header {
        padding: 30px 20px;
    }

    .faq-update-page .faq-table-heading {
        padding: 21px;
    }

    .faq-update-page .faq-form {
        padding: 24px 21px;
    }
}

@media (max-width: 600px) {
    .faq-update-page {
        padding: 14px 10px 24px;
    }

    .faq-update-page .faq-header {
        padding: 25px 16px;
        border-radius: 18px;
    }

    .faq-update-page .faq-header-icon {
        width: 58px;
        height: 58px;
        border-radius: 17px;
        font-size: 24px;
    }

    .faq-update-page .faq-header h1 {
        font-size: 25px;
    }

    .faq-update-page .faq-header p {
        font-size: 13px;
    }

    .faq-update-page .faq-table-card {
        border-radius: 17px;
    }

    .faq-update-page .faq-table-heading {
        align-items: flex-start;
        padding: 18px 15px;
    }

    .faq-update-page .faq-heading-icon {
        flex-basis: 40px;
        width: 40px;
        height: 40px;
        border-radius: 12px;
    }

    .faq-update-page .faq-table-heading h2 {
        font-size: 16px;
    }

    .faq-update-page .faq-form {
        padding: 20px 15px;
    }
}
CSS);

?>

<div class="faq-update-page">

    <div class="faq-header">
        <div class="faq-header-icon">
            <i class="fas fa-pen-to-square"></i>
        </div>

        <h1>Actualizar pregunta frecuente</h1>

        <p>
            Modifica la pregunta, su respuesta o la categoría
            y guarda los cambios realizados.
        </p>
    </div>

    <div class="faq-table-card faq-create-card">

        <div class="faq-table-heading">
            <div class="faq-heading-icon">
                <i class="fas fa-edit"></i>
            </div>

            <div>
                <h2>Editar información</h2>
                <p>Actualiza los campos que necesites y guarda los cambios.</p>
            </div>
        </div>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>

</div>
