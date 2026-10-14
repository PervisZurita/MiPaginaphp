<?php
declare(strict_types=1);

use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\View;

$this->title = 'Estadísticas por pregunta';

$this->registerJsFile(
    'https://cdn.jsdelivr.net/npm/chart.js',
    ['position' => View::POS_END]
);

$this->registerCss(<<<'CSS'
.estadisticas-page {
    --azul: #596b9b;
    --azul-claro: #a9c5f2;
    --menta: #a8d8c2;
    --rosa: #f0b8c5;
    --lila: #c7a6dc;
    --crema: #fff4dc;
    --texto: #596579;
    --borde: #e8e6f0;

    min-height: 80vh;
    width: 100%;
    padding: 30px;
    box-sizing: border-box;
    background:
        radial-gradient(circle at 90% 0%, #f1e7fa 0, transparent 28%),
        #fbf9ff;
    color: var(--texto);
}

.estadisticas-container {
    width: 100%;
    max-width: 1600px;
    margin: 0 auto;
}

.estadisticas-header {
    position: relative;
    display: flex;
    align-items: center;
    gap: 22px;
    overflow: hidden;
    margin-bottom: 30px;
    padding: 34px;
    color: #fff;
    background: linear-gradient(125deg, #465780, #7186b5, #9aabd0);
    border: 1px solid rgba(255,255,255,.7);
    border-radius: 22px;
    box-shadow: 0 12px 30px rgba(89,107,155,.15);
}

.estadisticas-header::after {
    content: "";
    position: absolute;
    width: 210px;
    height: 210px;
    top: -100px;
    right: -45px;
    border: 1px solid rgba(255,255,255,.35);
    border-radius: 50%;
    box-shadow: 0 0 0 25px rgba(255,255,255,.07),
                0 0 0 50px rgba(255,255,255,.05);
}

.estadisticas-header-icono {
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 65px;
    height: 65px;
    color: #fff4dc;
    background: rgba(255,255,255,.15);
    border: 1px solid rgba(255,255,255,.3);
    border-radius: 18px;
    font-size: 26px;
}

.estadisticas-header-texto {
    z-index: 1;
}

.estadisticas-eyebrow {
    display: block;
    margin-bottom: 8px;
    color: #f7e6ff;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
}

.estadisticas-titulo {
    margin: 0 0 10px;
    color: #fff;
    font-family: Georgia, serif;
    font-size: clamp(26px, 4vw, 36px);
    font-weight: 500;
}

.estadisticas-descripcion {
    max-width: 760px;
    margin: 0;
    color: rgba(255,255,255,.86);
    font-size: 13px;
    line-height: 1.8;
}

.estadisticas-seccion {
    margin-bottom: 35px;
}

.estadisticas-seccion-heading {
    display: flex;
    align-items: center;
    gap: 12px;
    margin: 0 0 22px;
    padding-bottom: 15px;
    color: var(--azul);
    border-bottom: 1px solid var(--borde);
    font-family: Georgia, serif;
    font-size: 23px;
    font-weight: 500;
}

.estadisticas-seccion-heading i {
    color: #a58bc6;
}

.resumen-tarjetas {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 20px;
    margin-bottom: 35px;
}

.resumen-tarjeta {
    position: relative;
    overflow: hidden;
    min-width: 0;
    padding: 24px;
    background: #fff;
    border: 1px solid var(--borde);
    border-radius: 20px;
    box-shadow: 0 7px 22px rgba(89,107,155,.06);
    transition: transform .25s ease, box-shadow .25s ease;
}

.resumen-tarjeta::before {
    content: "";
    position: absolute;
    inset: 0 auto 0 0;
    width: 5px;
    background: var(--azul-claro);
}

.resumen-tarjeta:nth-child(2)::before {
    background: var(--menta);
}

.resumen-tarjeta:nth-child(3)::before {
    background: var(--lila);
}

.resumen-tarjeta:nth-child(4)::before {
    background: #f2d69a;
}

.resumen-tarjeta:hover,
.pregunta-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 13px 30px rgba(89,107,155,.12);
}

.resumen-tarjeta-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 20px;
}

.resumen-tarjeta-label {
    color: #7c8498;
    font-size: 12px;
    font-weight: 600;
    line-height: 1.6;
}

.resumen-tarjeta-icono {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 43px;
    height: 43px;
    color: #718ec4;
    background: #edf3ff;
    border-radius: 14px;
    font-size: 17px;
}

.resumen-tarjeta:nth-child(2) .resumen-tarjeta-icono {
    color: #6da88e;
    background: #eaf8f1;
}

.resumen-tarjeta:nth-child(3) .resumen-tarjeta-icono {
    color: #a47db8;
    background: #f8effb;
}

.resumen-tarjeta:nth-child(4) .resumen-tarjeta-icono {
    color: #b99a5e;
    background: #fff7e7;
}

.resumen-tarjeta-valor {
    display: block;
    color: var(--azul);
    font-family: Georgia, serif;
    font-size: clamp(27px, 2.5vw, 36px);
    font-weight: 700;
    overflow-wrap: anywhere;
}

.resumen-tarjeta-pie {
    margin-top: 10px;
    color: #929bb0;
    font-size: 11px;
    line-height: 1.6;
}

.preguntas-grid {
    display: grid;
    grid-template-columns: repeat(3, minmax(0, 1fr));
    gap: 22px;
}

.pregunta-card {
    display: flex;
    flex-direction: column;
    min-width: 0;
    padding: 24px;
    background: #fff;
    border: 1px solid var(--borde);
    border-radius: 22px;
    box-shadow: 0 7px 24px rgba(89,107,155,.06);
    transition: transform .25s ease, box-shadow .25s ease;
}

.pregunta-card-header {
    display: flex;
    align-items: flex-start;
    gap: 14px;
    padding-bottom: 18px;
    border-bottom: 1px solid #f0edf7;
}

.pregunta-numero {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    width: 45px;
    height: 45px;
    color: #596b9b;
    background: #edf3ff;
    border: 1px solid #dce7fc;
    border-radius: 14px;
    font-size: 18px;
    font-weight: 700;
}

.pregunta-card-titulo {
    margin: 3px 0 7px;
    color: var(--azul);
    font-family: Georgia, serif;
    font-size: 19px;
    font-weight: 500;
    overflow-wrap: anywhere;
}

.pregunta-subtitulo {
    margin: 0;
    color: #929bb0;
    font-size: 11px;
    line-height: 1.7;
}

.pregunta-grafico-contenedor {
    padding: 22px 0 10px;
}

.grafico-pastel {
    position: relative;
    width: 100%;
    height: 230px;
    max-width: 300px;
    margin: 0 auto;
}

.pregunta-porcentaje {
    margin: 5px 0 22px;
    color: var(--azul);
    font-family: Georgia, serif;
    font-size: 32px;
    font-weight: 700;
    text-align: center;
}

.pregunta-porcentaje small {
    display: block;
    margin-top: 5px;
    color: #929bb0;
    font-family: Arial, sans-serif;
    font-size: 11px;
    font-weight: 500;
}

.pregunta-progreso {
    height: 7px;
    margin-top: 14px;
    overflow: hidden;
    background: #f0edf7;
    border-radius: 20px;
}

.pregunta-progreso-valor {
    height: 100%;
    background: linear-gradient(90deg, #a9c5f2, #a8d8c2);
    border-radius: 20px;
    transition: width .3s ease;
}

.pregunta-detalles {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 11px;
    margin-top: auto;
}

.detalle-item {
    min-width: 0;
    padding: 15px;
    background: #f8f6ff;
    border: 1px solid #f0edf7;
    border-radius: 14px;
}

.detalle-item span {
    display: block;
    margin-bottom: 7px;
    color: #7c8498;
    font-size: 10px;
    line-height: 1.5;
}

.detalle-item strong {
    display: block;
    color: var(--azul);
    font-family: Georgia, serif;
    font-size: 24px;
    overflow-wrap: anywhere;
}

.detalle-item-correctas {
    background: #eff9f3;
    border-left: 4px solid #a8d8c2;
}

.detalle-item-incorrectas {
    background: #fff2f5;
    border-left: 4px solid #f0b8c5;
}

.detalle-item-total {
    background: #f7f1fc;
    border-left: 4px solid #c7a6dc;
}

.detalle-item-errores {
    background: #f0f4ff;
    border-left: 4px solid #a9c5f2;
}

.sin-datos {
    padding: 45px 25px;
    text-align: center;
    background: #fff;
    border: 1px solid var(--borde);
    border-radius: 22px;
    box-shadow: 0 7px 24px rgba(89,107,155,.06);
}

.sin-datos-icono {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 70px;
    height: 70px;
    margin: 0 auto 18px;
    color: #b99a5e;
    background: var(--crema);
    border: 1px solid #f4e4bb;
    border-radius: 50%;
    font-size: 26px;
}

.sin-datos h3 {
    margin: 0 0 10px;
    color: var(--azul);
    font-family: Georgia, serif;
    font-size: 23px;
    font-weight: 500;
}

.sin-datos p {
    max-width: 520px;
    margin: 0 auto;
    color: #7c8498;
    font-size: 13px;
    line-height: 1.9;
}

.estadisticas-leyenda {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    gap: 22px;
    margin-bottom: 24px;
    padding: 17px;
    background: #fff;
    border: 1px solid var(--borde);
    border-radius: 15px;
}

.estadisticas-leyenda-item {
    display: inline-flex;
    align-items: center;
    gap: 9px;
    color: #7c8498;
    font-size: 12px;
}

.estadisticas-leyenda-punto {
    width: 10px;
    height: 10px;
    border-radius: 50%;
}

@media (max-width: 1100px) {
    .resumen-tarjetas {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .preguntas-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 768px) {
    .estadisticas-page {
        padding: 22px 16px 35px;
    }

    .estadisticas-header {
        gap: 15px;
        padding: 25px 20px;
    }

    .estadisticas-header-icono {
        width: 52px;
        height: 52px;
        font-size: 21px;
    }

    .pregunta-card {
        padding: 18px;
    }
}

@media (max-width: 560px) {
    .estadisticas-page {
        padding: 16px 10px 28px;
    }

    .estadisticas-header {
        align-items: flex-start;
        padding: 22px 16px;
    }

    .estadisticas-header-icono {
        width: 42px;
        height: 42px;
        font-size: 18px;
    }

    .estadisticas-titulo {
        font-size: 25px;
    }

    .estadisticas-descripcion {
        font-size: 12px;
    }

    .resumen-tarjetas {
        gap: 11px;
    }

    .resumen-tarjeta {
        padding: 17px 14px;
    }

    .resumen-tarjeta-valor {
        font-size: 25px;
    }

    .preguntas-grid {
        grid-template-columns: 1fr;
    }

    .grafico-pastel {
        height: 230px;
    }
}

@media (max-width: 360px) {
    .resumen-tarjetas {
        grid-template-columns: 1fr;
    }
}
CSS);
?>

<div class="estadisticas-page">
    <div class="estadisticas-container">

        <header class="estadisticas-header">
            <div class="estadisticas-header-icono">
                <i class="fas fa-chart-pie"></i>
            </div>

            <div class="estadisticas-header-texto">
                <span class="estadisticas-eyebrow">
                    Panel de análisis académico
                </span>

                <h1 class="estadisticas-titulo">
                    Estadísticas por pregunta
                </h1>

                <p class="estadisticas-descripcion">
                    Analiza los resultados de la autoevaluación y conoce la distribución de respuestas correctas e incorrectas.
                </p>
            </div>
        </header>

        <section class="estadisticas-seccion">
            <h2 class="estadisticas-seccion-heading">
                <i class="fas fa-chart-line"></i>
                Resumen general
            </h2>

            <div class="resumen-tarjetas">

                <div class="resumen-tarjeta">
                    <div class="resumen-tarjeta-top">
                        <span class="resumen-tarjeta-label">
                            Total de intentos
                        </span>
                        <div class="resumen-tarjeta-icono">
                            <i class="fas fa-rotate"></i>
                        </div>
                    </div>

                    <strong class="resumen-tarjeta-valor">
                        <?= (int) ($resumen['total_intentos'] ?? 0) ?>
                    </strong>

                    <div class="resumen-tarjeta-pie">
                        Evaluaciones registradas
                    </div>
                </div>

                <div class="resumen-tarjeta">
                    <div class="resumen-tarjeta-top">
                        <span class="resumen-tarjeta-label">
                            Usuarios participantes
                        </span>
                        <div class="resumen-tarjeta-icono">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>

                    <strong class="resumen-tarjeta-valor">
                        <?= (int) ($resumen['total_usuarios'] ?? 0) ?>
                    </strong>

                    <div class="resumen-tarjeta-pie">
                        Participantes registrados
                    </div>
                </div>

                <div class="resumen-tarjeta">
                    <div class="resumen-tarjeta-top">
                        <span class="resumen-tarjeta-label">
                            Promedio de puntuación
                        </span>
                        <div class="resumen-tarjeta-icono">
                            <i class="fas fa-percent"></i>
                        </div>
                    </div>

                    <strong class="resumen-tarjeta-valor">
                        <?= number_format(
                            (float) ($resumen['promedio_puntuacion'] ?? 0),
                            2
                        ) ?>%
                    </strong>

                    <div class="resumen-tarjeta-pie">
                        Rendimiento promedio
                    </div>
                </div>

                <div class="resumen-tarjeta">
                    <div class="resumen-tarjeta-top">
                        <span class="resumen-tarjeta-label">
                            Promedio de aciertos
                        </span>
                        <div class="resumen-tarjeta-icono">
                            <i class="fas fa-check-double"></i>
                        </div>
                    </div>

                    <strong class="resumen-tarjeta-valor">
                        <?= number_format(
                            (float) ($resumen['promedio_correctas'] ?? 0),
                            2
                        ) ?>
                    </strong>

                    <div class="resumen-tarjeta-pie">
                        Respuestas correctas por evaluación
                    </div>
                </div>

            </div>
        </section>

        <section class="estadisticas-seccion">
            <h2 class="estadisticas-seccion-heading">
                <i class="fas fa-chart-column"></i>
                Análisis individual de preguntas
            </h2>

            <?php if (empty($estadisticasPreguntas)): ?>

                <div class="sin-datos">
                    <div class="sin-datos-icono">
                        <i class="fas fa-chart-pie"></i>
                    </div>

                    <h3>Sin estadísticas disponibles</h3>

                    <p>
                        Todavía no existen respuestas registradas para mostrar estadísticas. Los gráficos estarán disponibles cuando se registren respuestas de las evaluaciones.
                    </p>
                </div>

            <?php else: ?>

                <div class="estadisticas-leyenda">
                    <span class="estadisticas-leyenda-item">
                        <span
                            class="estadisticas-leyenda-punto"
                            style="background: #a8d8c2;"
                        ></span>
                        Respuestas correctas
                    </span>

                    <span class="estadisticas-leyenda-item">
                        <span
                            class="estadisticas-leyenda-punto"
                            style="background: #f0b8c5;"
                        ></span>
                        Respuestas incorrectas
                    </span>
                </div>

                <div class="preguntas-grid">

                    <?php foreach ($estadisticasPreguntas as $pregunta): ?>
                        <?php
                        $total = (int) ($pregunta['total_respuestas'] ?? 0);
                        $correctas = (int) ($pregunta['correctas'] ?? 0);
                        $incorrectas = (int) ($pregunta['incorrectas'] ?? 0);

                        $porcentaje = $total > 0
                            ? round(($correctas / $total) * 100, 2)
                            : 0;

                        $porcentajeErrores = $total > 0
                            ? round(($incorrectas / $total) * 100, 2)
                            : 0;

                        $idPregunta = (int) $pregunta['pregunta_id'];
                        $idGrafico = 'graficoPregunta' . $idPregunta;
                        ?>

                        <article class="pregunta-card">
                            <div class="pregunta-card-header">
                                <div class="pregunta-numero">
                                    <?= $idPregunta ?>
                                </div>

                                <div>
                                    <h3 class="pregunta-card-titulo">
                                        Pregunta <?= $idPregunta ?>
                                    </h3>

                                    <p class="pregunta-subtitulo">
                                        Distribución de respuestas registradas
                                    </p>
                                </div>
                            </div>

                            <div class="pregunta-grafico-contenedor">
                                <div class="grafico-pastel">
                                    <canvas
                                        id="<?= Html::encode($idGrafico) ?>"
                                        aria-label="<?= Html::encode(
                                            'Gráfico de respuestas correctas e incorrectas de la pregunta ' . $idPregunta
                                        ) ?>"
                                        role="img"
                                    ></canvas>
                                </div>
                            </div>

                            <div class="pregunta-porcentaje">
                                <?= number_format($porcentaje, 1) ?>%

                                <small>Porcentaje de aciertos</small>

                                <div
                                    class="pregunta-progreso"
                                    role="progressbar"
                                    aria-label="Porcentaje de aciertos"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                    aria-valuenow="<?= $porcentaje ?>"
                                >
                                    <div
                                        class="pregunta-progreso-valor"
                                        style="width: <?= $porcentaje ?>%;"
                                    ></div>
                                </div>
                            </div>

                            <div class="pregunta-detalles">
                                <div class="detalle-item detalle-item-correctas">
                                    <span>Correctas</span>
                                    <strong><?= $correctas ?></strong>
                                </div>

                                <div class="detalle-item detalle-item-incorrectas">
                                    <span>Incorrectas</span>
                                    <strong><?= $incorrectas ?></strong>
                                </div>

                                <div class="detalle-item detalle-item-total">
                                    <span>Total respondidas</span>
                                    <strong><?= $total ?></strong>
                                </div>

                                <div class="detalle-item detalle-item-errores">
                                    <span>Porcentaje de errores</span>
                                    <strong>
                                        <?= number_format($porcentajeErrores, 1) ?>%
                                    </strong>
                                </div>
                            </div>
                        </article>

                    <?php endforeach; ?>

                </div>

            <?php endif; ?>
        </section>

    </div>
</div>

<?php
$graficos = [];

foreach ($estadisticasPreguntas as $pregunta) {
    $graficos[] = [
        'id' => 'graficoPregunta' . (int) $pregunta['pregunta_id'],
        'correctas' => (int) ($pregunta['correctas'] ?? 0),
        'incorrectas' => (int) ($pregunta['incorrectas'] ?? 0),
    ];
}

$js = '
const datosGraficos = ' . Json::htmlEncode($graficos) . ';

function crearGraficosEstadisticas() {
    if (typeof Chart === "undefined") {
        return;
    }

    datosGraficos.forEach(function (dato) {
        const canvas = document.getElementById(dato.id);

        if (!canvas || canvas.dataset.graficoCreado === "1") {
            return;
        }

        canvas.dataset.graficoCreado = "1";

        new Chart(canvas, {
            type: "pie",
            data: {
                labels: ["Correctas", "Incorrectas"],
                datasets: [{
                    data: [dato.correctas, dato.incorrectas],
                    backgroundColor: ["#a8d8c2", "#f0b8c5"],
                    borderColor: ["#ffffff", "#ffffff"],
                    borderWidth: 4,
                    hoverOffset: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: "bottom",
                        labels: {
                            color: "#7c8498",
                            padding: 18,
                            usePointStyle: true,
                            pointStyle: "circle",
                            font: {
                                size: 11
                            }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                const total = context.dataset.data.reduce(
                                    function (a, b) {
                                        return a + b;
                                    },
                                    0
                                );

                                const valor = Number(context.raw) || 0;

                                const porcentaje = total > 0
                                    ? ((valor / total) * 100).toFixed(1)
                                    : "0.0";

                                return context.label + ": " + valor
                                    + " (" + porcentaje + "%)";
                            }
                        }
                    }
                }
            }
        });
    });
}

if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", crearGraficosEstadisticas);
} else {
    crearGraficosEstadisticas();
}
';

$this->registerJs($js, View::POS_END);
?>
