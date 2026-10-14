<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var app\models\Documento $model */

use yii\helpers\Html;

$this->title = 'Editar documento';
$this->registerCssFile('@web/css/documentos.css');

$this->registerCss(<<<'CSS'
.documento-administracion {
    --dp-azul: #e3f0ff;
    --dp-azul-fuerte: #527da8;
    --dp-lavanda: #f0eaff;
    --dp-rosa: #ffe8ef;
    --dp-verde: #e4f5ec;
    --dp-texto: #344256;
    --dp-texto-suave: #718096;
    --dp-borde: #e4eaf2;

    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 32px clamp(16px, 3vw, 38px) 45px;
    color: var(--dp-texto);
    box-sizing: border-box;
}

.documento-administracion *,
.documento-administracion *::before,
.documento-administracion *::after {
    box-sizing: border-box;
}

.documento-administracion .documento-encabezado {
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    gap: 22px;
    padding: 30px;
    margin-bottom: 28px;
    background: linear-gradient(125deg, #e3f0ff 0%, #f0eaff 55%, #ffe8ef 100%);
    border: 1px solid #e7e8f6;
    border-radius: 24px;
    box-shadow: 0 8px 24px rgba(79, 105, 145, 0.07);
}

.documento-administracion .documento-encabezado::after {
    content: "";
    position: absolute;
    width: 190px;
    height: 190px;
    right: -55px;
    top: -90px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.38);
    pointer-events: none;
}

.documento-administracion .documento-icono {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 76px;
    height: 76px;
    color: #527da8;
    background: rgba(255, 255, 255, 0.78);
    border: 1px solid rgba(255, 255, 255, 0.9);
    border-radius: 22px;
    font-size: 30px;
    box-shadow: 0 5px 14px rgba(82, 125, 168, 0.08);
}

.documento-administracion .documento-encabezado h1 {
    margin: 0 0 9px;
    color: #344c69;
    font-size: clamp(24px, 3vw, 32px);
    font-weight: 750;
    letter-spacing: -0.7px;
    line-height: 1.25;
}

.documento-administracion .documento-encabezado p {
    margin: 0;
    color: #687991;
    font-size: 15px;
    line-height: 1.7;
}

.documento-administracion .documento-etiqueta {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    margin-bottom: 10px;
    padding: 6px 12px;
    color: #627ca2;
    background: rgba(255, 255, 255, 0.72);
    border: 1px solid rgba(255, 255, 255, 0.85);
    border-radius: 20px;
    font-size: 11px;
    font-weight: 750;
    letter-spacing: 0.8px;
    text-transform: uppercase;
}

.documento-administracion .documento-formulario-contenedor {
    padding: clamp(20px, 3vw, 34px);
    background: #fff;
    border: 1px solid var(--dp-borde);
    border-radius: 22px;
    box-shadow: 0 8px 28px rgba(66, 86, 120, 0.055);
}

.documento-administracion .documento-formulario-titulo {
    display: flex;
    align-items: center;
    gap: 12px;
    margin: 0 0 25px;
    padding-bottom: 19px;
    color: #455b76;
    border-bottom: 1px solid #edf0f6;
    font-size: 19px;
    font-weight: 750;
}

.documento-administracion .documento-formulario-titulo i {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    color: #7a6ab1;
    background: var(--dp-lavanda);
    border-radius: 13px;
    font-size: 17px;
}

.documento-administracion .help-block {
    color: #d16d86;
    font-size: 13px;
}

.documento-administracion .form-control {
    min-height: 46px;
    color: #344256;
    background: #fcfdff;
    border: 1px solid #dfe6f0;
    border-radius: 12px;
    box-shadow: none;
    transition: border-color 0.2s ease, box-shadow 0.2s ease;
}

.documento-administracion .form-control:focus {
    background: #fff;
    border-color: #a8c8ed;
    box-shadow: 0 0 0 4px rgba(168, 200, 237, 0.2);
}

.documento-administracion textarea.form-control {
    min-height: 125px;
    resize: vertical;
}

.documento-administracion label {
    margin-bottom: 9px;
    color: #50627a;
    font-size: 14px;
    font-weight: 650;
}

.documento-administracion input[type="file"].form-control {
    height: auto;
    min-height: 50px;
    padding: 10px;
    background: #f8faff;
}

.documento-administracion .btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 9px;
    min-height: 44px;
    padding: 11px 20px;
    border-radius: 12px;
    font-size: 14px;
    font-weight: 700;
    text-decoration: none;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.documento-administracion .btn:hover {
    transform: translateY(-2px);
}

.documento-administracion .btn-primary {
    color: #fff;
    background: #769bc4;
    border-color: #769bc4;
    box-shadow: 0 5px 12px rgba(118, 155, 196, 0.2);
}

.documento-administracion .btn-primary:hover {
    color: #fff;
    background: #6288b3;
    border-color: #6288b3;
}

.documento-administracion .btn-secondary,
.documento-administracion .btn-default {
    color: #64748b;
    background: #f0f4f9;
    border-color: #e0e7f0;
}

.documento-administracion .documento-nota {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    margin-top: 24px;
    padding: 16px 18px;
    color: #62758c;
    background: #f0f7ff;
    border: 1px solid #e0edfb;
    border-radius: 14px;
    font-size: 13px;
    line-height: 1.7;
}

.documento-administracion .documento-nota i {
    margin-top: 3px;
    color: #769bc4;
    font-size: 17px;
}

@media (max-width: 600px) {
    .documento-administracion {
        padding: 20px 12px 30px;
    }

    .documento-administracion .documento-encabezado {
        align-items: flex-start;
        gap: 15px;
        padding: 22px 18px;
        border-radius: 19px;
    }

    .documento-administracion .documento-icono {
        width: 54px;
        height: 54px;
        border-radius: 16px;
        font-size: 23px;
    }

    .documento-administracion .documento-encabezado h1 {
        font-size: 23px;
    }

    .documento-administracion .documento-encabezado p {
        font-size: 13px;
    }

    .documento-administracion .documento-formulario-contenedor {
        padding: 20px 15px;
        border-radius: 18px;
    }

    .documento-administracion .btn {
        width: 100%;
    }
}
CSS);

?>

<div class="documento-administracion">
    <header class="documento-encabezado">
        <div class="documento-icono">
            <i class="fa-solid fa-file-pen"></i>
        </div>

        <div>
            <span class="documento-etiqueta">
                <i class="fa-solid fa-folder-open"></i>
                Gestión documental
            </span>

            <h1>Editar documento</h1>

            <p>
                Actualiza la información del documento institucional
                o reemplaza el archivo PDF cuando sea necesario.
            </p>
        </div>
    </header>

    <section class="documento-formulario-contenedor">
        <h2 class="documento-formulario-titulo">
            <i class="fa-solid fa-sliders"></i>
            Información del documento
        </h2>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

        <div class="documento-nota">
            <i class="fa-solid fa-circle-info"></i>
            <div>
                <strong>Importante:</strong>
                verifica que la información esté actualizada antes de guardar.
                Si reemplazas el PDF, asegúrate de seleccionar el archivo correcto.
            </div>
        </div>
    </section>
</div>
