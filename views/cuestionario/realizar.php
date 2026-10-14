<?php

declare(strict_types=1);

/** @var yii\web\View $this */
/** @var array $preguntas */

use yii\helpers\Html;

$this->title = 'Cuestionario de autoevaluación';

$this->registerCss(<<<'CSS'
.cuestionario-realizar {
    --cuestionario-primary: #7c83bd;
    --cuestionario-primary-dark: #626ba5;
    --cuestionario-accent: #d6a6c1;
    --cuestionario-accent-light: #f0d6e4;
    --cuestionario-muted: #777b91;
    --cuestionario-border: #e5e4f0;
    --cuestionario-lavanda: #f2f0fb;
    --cuestionario-azul: #edf5fc;
    --cuestionario-rosa: #fff0f5;
    --cuestionario-verde: #edf8f1;

    width: 100%;
    min-height: 70vh;
    padding: 35px 24px 55px;
    background:
        radial-gradient(circle at 90% 4%, rgba(214,166,193,.18), transparent 28%),
        radial-gradient(circle at 5% 90%, rgba(169,197,235,.17), transparent 28%),
        #faf9fd;
    box-sizing: border-box;
}

.cuestionario-realizar *,
.cuestionario-realizar *::before,
.cuestionario-realizar *::after {
    box-sizing: border-box;
}

.cuestionario-contenedor {
    width: 100%;
    max-width: 1150px;
    margin: 0 auto;
}

.cuestionario-hero {
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    gap: 22px;
    margin-bottom: 25px;
    padding: 32px 35px;
    color: #fff;
    background: linear-gradient(120deg, #777eb5, #9399cd 60%, #b5acd9);
    border: 1px solid rgba(255,255,255,.65);
    border-radius: 20px;
    box-shadow: 0 12px 30px rgba(124,131,189,.17);
}

.cuestionario-hero::before {
    content: "";
    position: absolute;
    top: -100px;
    right: -35px;
    width: 250px;
    height: 250px;
    border: 1px solid rgba(255,255,255,.25);
    border-radius: 50%;
    box-shadow: 0 0 0 25px rgba(255,255,255,.06),
                0 0 0 50px rgba(255,255,255,.04);
}

.cuestionario-hero::after {
    content: "";
    position: absolute;
    bottom: 0;
    left: 35px;
    width: 75px;
    height: 4px;
    background: #f5d9e7;
    border-radius: 5px 5px 0 0;
}

.cuestionario-hero-icono {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 65px;
    height: 65px;
    color: #fff;
    background: rgba(255,255,255,.17);
    border: 1px solid rgba(255,255,255,.4);
    border-radius: 18px;
    font-size: 27px;
}

.cuestionario-hero-texto {
    position: relative;
    z-index: 1;
}

.cuestionario-eyebrow {
    display: block;
    margin-bottom: 8px;
    color: #f9e9f2;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 2px;
    text-transform: uppercase;
}

.cuestionario-hero h1 {
    margin: 0 0 9px;
    color: #fff;
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(25px, 4vw, 35px);
    font-weight: 500;
    line-height: 1.3;
}

.cuestionario-hero p {
    max-width: 650px;
    margin: 0;
    color: rgba(255,255,255,.9);
    font-size: 13px;
    line-height: 1.8;
}

.cuestionario-panel {
    overflow: hidden;
    background: #fff;
    border: 1px solid var(--cuestionario-border);
    border-radius: 18px;
    box-shadow: 0 8px 25px rgba(110,104,151,.07);
}

.cuestionario-panel-acento {
    height: 5px;
    background: linear-gradient(90deg, #b8bde9, #e9bfd5, #c2e4d1);
}

.cuestionario-panel-contenido {
    padding: 30px;
}

.cuestionario-progreso-cabecera {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 15px;
    margin-bottom: 12px;
}

.cuestionario-progreso-titulo {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #626ba5;
    font-size: 13px;
    font-weight: 800;
}

.cuestionario-progreso-titulo i {
    color: #c58eaf;
    font-size: 17px;
}

.cuestionario-progreso-contador {
    padding: 7px 12px;
    color: #777b91;
    background: #f3f1fb;
    border: 1px solid #e7e3f5;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 700;
}

.cuestionario-progreso {
    height: 9px;
    margin-bottom: 25px;
    overflow: hidden;
    background: #efedf7;
    border-radius: 20px;
}

.cuestionario-progreso-barra {
    width: 0;
    height: 100%;
    background: linear-gradient(90deg, #a8b5e8, #d7add0, #a8d8c2);
    border-radius: 20px;
    transition: width .25s ease;
}

.cuestionario-instruccion {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    margin-bottom: 25px;
    padding: 15px 17px;
    color: #74778d;
    background: #f6f3fc;
    border: 1px solid #e9e2f6;
    border-left: 4px solid #c6b4e4;
    border-radius: 10px;
    font-size: 12px;
    line-height: 1.8;
}

.cuestionario-instruccion i {
    margin-top: 3px;
    color: #9a8bc5;
    font-size: 16px;
}

.pregunta-card {
    margin-bottom: 20px;
    overflow: hidden;
    background: #fff;
    border: 1px solid var(--cuestionario-border);
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(110,104,151,.045);
    transition: border-color .2s ease, box-shadow .2s ease;
}

.pregunta-card:focus-within {
    border-color: #c4b9e8;
    box-shadow: 0 5px 20px rgba(124,131,189,.12);
}

.pregunta-card-cabecera {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    padding: 23px 24px 20px;
    background: linear-gradient(110deg, #f7f5fd, #fbf8fc);
    border-bottom: 1px solid #efedf6;
}

.pregunta-numero {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 45px;
    height: 45px;
    color: #626ba5;
    background: #e9eafa;
    border: 1px solid #d9dcf4;
    border-radius: 13px;
    font-family: Georgia, "Times New Roman", serif;
    font-size: 19px;
    font-weight: 700;
}

.pregunta-cabecera-texto {
    min-width: 0;
    flex: 1;
}

.pregunta-categoria {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    margin-bottom: 10px;
    padding: 6px 11px;
    color: #7770a6;
    background: #f0ebfa;
    border: 1px solid #e4dcf5;
    border-radius: 20px;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: .3px;
}

.pregunta-categoria i {
    color: #c58eaf;
}

.pregunta-titulo {
    margin: 0;
    color: #505775;
    font-family: Georgia, "Times New Roman", serif;
    font-size: 18px;
    font-weight: 500;
    line-height: 1.65;
    overflow-wrap: anywhere;
}

.pregunta-obligatoria {
    display: inline-block;
    margin-top: 9px;
    color: #b4779a;
    font-size: 10px;
    font-weight: 700;
}

.pregunta-opciones {
    display: grid;
    gap: 10px;
    padding: 20px 24px 24px;
}

.opcion-respuesta {
    position: relative;
    display: flex;
    align-items: flex-start;
    gap: 13px;
    margin: 0;
    padding: 15px 16px;
    background: #fff;
    border: 1px solid #e8e6f1;
    border-radius: 12px;
    cursor: pointer;
    transition: background .2s ease, border-color .2s ease, box-shadow .2s ease;
}

.opcion-respuesta:hover {
    background: #f8f7fd;
    border-color: #c9c5e8;
}

.opcion-respuesta:has(input:checked) {
    background: #f0effb;
    border-color: #aaa8db;
    box-shadow: inset 4px 0 0 #aaa8db;
}

.opcion-respuesta input[type="radio"] {
    flex-shrink: 0;
    width: 17px;
    height: 17px;
    margin: 3px 0 0;
    accent-color: #858bc3;
    cursor: pointer;
}

.opcion-letra {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 28px;
    height: 28px;
    margin-top: -5px;
    color: #7770a6;
    background: #f0ebfa;
    border: 1px solid #e3dcf3;
    border-radius: 9px;
    font-size: 11px;
    font-weight: 800;
}

.opcion-respuesta:has(input:checked) .opcion-letra {
    color: #fff;
    background: #858bc3;
    border-color: #858bc3;
}

.opcion-texto {
    flex: 1;
    min-width: 0;
    color: #656a82;
    font-size: 13px;
    line-height: 1.75;
    overflow-wrap: anywhere;
}

.opcion-respuesta:has(input:checked) .opcion-texto {
    color: #555d8d;
    font-weight: 700;
}

.pregunta-sin-opciones {
    margin: 20px 24px;
    padding: 14px 16px;
    color: #a16f83;
    background: #fff1f5;
    border: 1px solid #f2dce5;
    border-radius: 10px;
    font-size: 12px;
    line-height: 1.7;
}

.cuestionario-final {
    margin-top: 28px;
    padding: 28px 25px;
    text-align: center;
    background: linear-gradient(135deg, #f7f5fd, #fff5f8, #f1faf5);
    border: 1px solid #e8e3f2;
    border-radius: 16px;
}

.cuestionario-final-icono {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 55px;
    height: 55px;
    margin: 0 auto 14px;
    color: #777eb5;
    background: #e9eafa;
    border: 1px solid #d9dcf4;
    border-radius: 17px;
    font-size: 22px;
}

.cuestionario-final h3 {
    margin: 0 0 9px;
    color: #626ba5;
    font-family: Georgia, "Times New Roman", serif;
    font-size: 23px;
    font-weight: 500;
}

.cuestionario-final p {
    max-width: 540px;
    margin: 0 auto 20px;
    color: #777b91;
    font-size: 12px;
    line-height: 1.8;
}

.btn-cuestionario {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    min-height: 47px;
    padding: 13px 25px;
    color: #fff !important;
    background: linear-gradient(110deg, #858bc3, #a29bcf);
    border: 1px solid #858bc3;
    border-radius: 12px;
    box-shadow: 0 6px 15px rgba(124,131,189,.2);
    font-size: 12px;
    font-weight: 800;
    text-decoration: none !important;
    cursor: pointer;
    transition: transform .2s ease, box-shadow .2s ease;
}

.btn-cuestionario:hover {
    color: #fff !important;
    background: linear-gradient(110deg, #747cb5, #928bc2);
    box-shadow: 0 8px 18px rgba(124,131,189,.28);
    transform: translateY(-2px);
}

.btn-cuestionario i {
    color: #f9e5ef;
    font-size: 15px;
}

.btn-cuestionario:disabled {
    opacity: .65;
    cursor: not-allowed;
    transform: none;
}

.cuestionario-vacio {
    padding: 45px 25px;
    text-align: center;
    background: #fff;
    border: 1px solid var(--cuestionario-border);
    border-radius: 18px;
    box-shadow: 0 8px 25px rgba(110,104,151,.06);
}

.cuestionario-vacio-icono {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 68px;
    height: 68px;
    margin: 0 auto 17px;
    color: #9388c3;
    background: #f0ebfa;
    border: 1px solid #e4dcf5;
    border-radius: 20px;
    font-size: 25px;
}

.cuestionario-vacio h2 {
    margin: 0 0 10px;
    color: #626ba5;
    font-family: Georgia, "Times New Roman", serif;
    font-size: 24px;
    font-weight: 500;
}

.cuestionario-vacio p {
    max-width: 480px;
    margin: 0 auto;
    color: var(--cuestionario-muted);
    font-size: 13px;
    line-height: 1.8;
}

@media (max-width: 768px) {
    .cuestionario-realizar {
        padding: 25px 15px 40px;
    }

    .cuestionario-hero {
        gap: 16px;
        padding: 26px 22px;
        border-radius: 16px;
    }

    .cuestionario-hero-icono {
        width: 53px;
        height: 53px;
        border-radius: 14px;
        font-size: 22px;
    }

    .cuestionario-panel-contenido {
        padding: 23px 18px;
    }

    .pregunta-card-cabecera {
        padding: 20px;
    }

    .pregunta-opciones {
        padding: 18px 20px 21px;
    }
}

@media (max-width: 480px) {
    .cuestionario-realizar {
        padding: 20px 10px 32px;
    }

    .cuestionario-hero {
        align-items: flex-start;
        gap: 13px;
        padding: 22px 16px;
    }

    .cuestionario-hero-icono {
        width: 43px;
        height: 43px;
        font-size: 18px;
    }

    .cuestionario-hero h1 {
        font-size: 23px;
    }

    .cuestionario-hero p {
        font-size: 12px;
    }

    .cuestionario-panel-contenido {
        padding: 18px 12px;
    }

    .pregunta-card-cabecera {
        gap: 11px;
        padding: 16px 13px;
    }

    .pregunta-numero {
        width: 37px;
        height: 37px;
        border-radius: 10px;
        font-size: 16px;
    }

    .pregunta-titulo {
        font-size: 16px;
    }

    .pregunta-opciones {
        gap: 9px;
        padding: 14px;
    }

    .opcion-respuesta {
        gap: 9px;
        padding: 13px 10px;
    }

    .opcion-texto {
        font-size: 12px;
    }

    .cuestionario-progreso-cabecera {
        align-items: flex-start;
        flex-direction: column;
        gap: 8px;
    }

    .cuestionario-final {
        padding: 22px 14px;
    }

    .btn-cuestionario {
        width: 100%;
        padding: 13px 14px;
    }
}
CSS);
?>

<div class="cuestionario-realizar">
    <div class="cuestionario-contenedor">

        <header class="cuestionario-hero">
            <div class="cuestionario-hero-icono">
                <i class="fas fa-clipboard-check"></i>
            </div>

            <div class="cuestionario-hero-texto">
                <span class="cuestionario-eyebrow">
                    Ética de la investigación científica
                </span>

                <h1>Autoevaluación de ética científica</h1>

                <p>
                    Evalúa tus conocimientos sobre los principios éticos,
                    la integridad científica y la responsabilidad investigadora.
                </p>
            </div>
        </header>

        <?php if (empty($preguntas)): ?>

            <section class="cuestionario-vacio">
                <div class="cuestionario-vacio-icono">
                    <i class="fas fa-inbox"></i>
                </div>

                <h2>No hay preguntas disponibles</h2>

                <p>
                    Actualmente no existen preguntas habilitadas para esta
                    evaluación. Vuelve a intentarlo más tarde.
                </p>
            </section>

        <?php else: ?>

            <section class="cuestionario-panel">
                <div class="cuestionario-panel-acento"></div>

                <div class="cuestionario-panel-contenido">

                    <div class="cuestionario-progreso-cabecera">
                        <div class="cuestionario-progreso-titulo">
                            <i class="fas fa-list-check"></i>
                            <span>Progreso de la evaluación</span>
                        </div>

                        <span
                            class="cuestionario-progreso-contador"
                            id="contador-respuestas"
                            aria-live="polite"
                        >
                            0 de <?= count($preguntas) ?> respondidas
                        </span>
                    </div>

                    <div
                        class="cuestionario-progreso"
                        role="progressbar"
                        aria-label="Progreso del cuestionario"
                        aria-valuemin="0"
                        aria-valuemax="<?= count($preguntas) ?>"
                        aria-valuenow="0"
                        id="progreso-accesible"
                    >
                        <div
                            class="cuestionario-progreso-barra"
                            id="barra-progreso"
                        ></div>
                    </div>

                    <div class="cuestionario-instruccion">
                        <i class="fas fa-circle-info"></i>

                        <span>
                            Lee cuidadosamente cada pregunta y selecciona
                            una sola respuesta. El indicador de progreso se
                            actualizará automáticamente.
                        </span>
                    </div>

                    <?= Html::beginForm(
                        ['realizar'],
                        'post',
                        ['id' => 'form-cuestionario']
                    ) ?>

                    <?php foreach ($preguntas as $indice => $pregunta): ?>

                        <article class="pregunta-card">

                            <div class="pregunta-card-cabecera">
                                <div class="pregunta-numero">
                                    <?= (int) ($indice + 1) ?>
                                </div>

                                <div class="pregunta-cabecera-texto">

                                    <span class="pregunta-categoria">
                                        <i class="fas fa-bookmark"></i>
                                        <?= Html::encode(
                                            $pregunta['categoria'] ?? 'General'
                                        ) ?>
                                    </span>

                                    <h2 class="pregunta-titulo">
                                        <?= Html::encode(
                                            $pregunta['pregunta'] ?? ''
                                        ) ?>
                                    </h2>

                                    <span class="pregunta-obligatoria">
                                        <i class="fas fa-asterisk"></i>
                                        Selecciona una respuesta
                                    </span>
                                </div>
                            </div>

                            <?php if (empty($pregunta['opciones'])): ?>

                                <div class="pregunta-sin-opciones">
                                    <i class="fas fa-triangle-exclamation"></i>
                                    Esta pregunta no tiene opciones registradas.
                                </div>

                            <?php else: ?>

                                <div class="pregunta-opciones">

                                    <?php foreach (
                                        array_values($pregunta['opciones'])
                                        as $indiceOpcion => $opcion
                                    ): ?>

                                        <label class="opcion-respuesta">

                                            <?= Html::radio(
                                                'respuestas[' . (int) $pregunta['id'] . ']',
                                                false,
                                                [
                                                    'value' => (int) $opcion['id'],
                                                    'required' => true,
                                                ]
                                            ) ?>

                                            <span class="opcion-letra">
                                                <?= chr(65 + ($indiceOpcion % 26)) ?>
                                            </span>

                                            <span class="opcion-texto">
                                                <?= Html::encode(
                                                    $opcion['opcion'] ?? ''
                                                ) ?>
                                            </span>

                                        </label>

                                    <?php endforeach; ?>

                                </div>

                            <?php endif; ?>

                        </article>

                    <?php endforeach; ?>

                    <div class="cuestionario-final">
                        <div class="cuestionario-final-icono">
                            <i class="fas fa-graduation-cap"></i>
                        </div>

                        <h3>Finalizar autoevaluación</h3>

                        <p>
                            Antes de enviar, verifica que hayas respondido
                            todas las preguntas. Al finalizar, tus respuestas
                            serán enviadas para calcular tu calificación.
                        </p>

                        <?= Html::submitButton(
                            '<i class="fas fa-check-circle"></i> Finalizar autoevaluación',
                            [
                                'class' => 'btn-cuestionario',
                                'data-confirm' => '¿Deseas enviar tus respuestas y calcular tu calificación?',
                                'encode' => false,
                            ]
                        ) ?>
                    </div>

                    <?= Html::endForm() ?>

                </div>
            </section>

            <?php
            $this->registerJs(<<<'JS'
(function () {
    const formulario = document.getElementById('form-cuestionario');

    if (!formulario) {
        return;
    }

    const radios = formulario.querySelectorAll('input[type="radio"]');
    const contador = document.getElementById('contador-respuestas');
    const barra = document.getElementById('barra-progreso');
    const progresoAccesible = document.getElementById('progreso-accesible');

    function actualizarProgreso() {
        const grupos = new Set(
            Array.from(radios).map(function (radio) {
                return radio.name;
            })
        );

        let respondidas = 0;

        grupos.forEach(function (nombre) {
            const seleccionada = Array.from(radios).some(function (radio) {
                return radio.name === nombre && radio.checked;
            });

            if (seleccionada) {
                respondidas++;
            }
        });

        const cantidad = grupos.size;
        const porcentaje = cantidad > 0
            ? (respondidas / cantidad) * 100
            : 0;

        contador.textContent =
            respondidas + ' de ' + cantidad + ' respondidas';

        barra.style.width = porcentaje + '%';

        if (progresoAccesible) {
            progresoAccesible.setAttribute('aria-valuenow', respondidas);
        }
    }

    radios.forEach(function (radio) {
        radio.addEventListener('change', actualizarProgreso);
    });

    actualizarProgreso();
})();
JS);
            ?>

        <?php endif; ?>

    </div>
</div>
