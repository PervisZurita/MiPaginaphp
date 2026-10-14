<?php

declare(strict_types=1);

use yii\helpers\Html;

$this->title = $esAdmin
    ? 'Historial de evaluaciones'
    : 'Mis resultados';

$this->registerCss(<<<'CSS'
.resultados-page {
    --res-primary: #647fa3;
    --res-primary-dark: #506987;
    --res-primary-light: #a7bfdc;
    --res-lavender: #e9e5f7;
    --res-blue: #e5effb;
    --res-mint: #e1f1e8;
    --res-pink: #f8e7ec;
    --res-cream: #fbf3e5;
    --res-text: #455568;
    --res-muted: #8794a5;
    --res-border: #e4e9f0;
    --res-bg: #f8f9fc;

    display: block;
    width: 100%;
    max-width: none;
    min-height: calc(100vh - 80px);
    margin: 0;
    padding: 28px 24px 45px;
    color: var(--res-text);
    background:
        radial-gradient(circle at 90% 0%, rgba(233,229,247,.65), transparent 27%),
        radial-gradient(circle at 0% 40%, rgba(225,241,232,.55), transparent 30%),
        var(--res-bg);
    font-family: "Segoe UI", Arial, sans-serif;
    box-sizing: border-box;
}

.resultados-page *,
.resultados-page *::before,
.resultados-page *::after {
    box-sizing: border-box;
}

#main,
#main > .content-full {
    width: 100%;
    max-width: none;
    min-width: 0;
    margin: 0;
    box-sizing: border-box;
}

#main > .content-full {
    padding: 0;
}

#main .resultados-page {
    width: 100%;
    max-width: none;
}

.resultados-page .resultados-inner {
    width: 100%;
    max-width: none;
    min-width: 0;
    margin: 0;
}

.resultados-page .resultados-encabezado {
    position: relative;
    display: flex;
    align-items: center;
    gap: 23px;
    overflow: hidden;
    width: 100%;
    padding: 35px 38px;
    margin: 0 0 25px;
    border: 1px solid #dce5f1;
    border-radius: 20px;
    background: linear-gradient(
        120deg,
        #dce8f7 0%,
        #e9e5f7 52%,
        #f7e9ee 100%
    );
    color: var(--res-text);
    box-shadow: 0 8px 24px rgba(111,132,165,.09);
}

.resultados-page .resultados-encabezado::before,
.resultados-page .resultados-encabezado::after {
    position: absolute;
    content: "";
    border: 1px solid rgba(100,127,163,.17);
    border-radius: 50%;
    pointer-events: none;
}

.resultados-page .resultados-encabezado::before {
    width: 250px;
    height: 250px;
    right: -65px;
    top: -145px;
}

.resultados-page .resultados-encabezado::after {
    width: 180px;
    height: 180px;
    right: 35px;
    bottom: -130px;
}

.resultados-page .encabezado-icono {
    position: relative;
    z-index: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    flex: 0 0 76px;
    width: 76px;
    height: 76px;
    border: 1px solid rgba(100,127,163,.20);
    border-radius: 19px;
    background: rgba(255,255,255,.68);
    color: #718bb2;
    font-size: 30px;
}

.resultados-page .encabezado-texto {
    position: relative;
    z-index: 1;
    min-width: 0;
}

.resultados-page .encabezado-etiqueta {
    display: inline-block;
    margin-bottom: 8px;
    color: #7186a5;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 2px;
    text-transform: uppercase;
}

.resultados-page .resultados-encabezado h1 {
    margin: 0 0 9px;
    color: #425570;
    font-family: Georgia, "Times New Roman", serif;
    font-size: clamp(25px, 3vw, 35px);
    font-weight: 700;
    line-height: 1.25;
}

.resultados-page .resultados-encabezado p {
    max-width: 850px;
    margin: 0;
    color: #687b94;
    font-size: 14px;
    line-height: 1.7;
}

.resultados-page .resultados-resumen {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 22px;
    width: 100%;
    margin-bottom: 25px;
}

.resultados-page .resumen-card {
    position: relative;
    display: flex;
    align-items: center;
    gap: 19px;
    min-width: 0;
    min-height: 125px;
    padding: 24px 27px;
    overflow: hidden;
    border: 1px solid var(--res-border);
    border-radius: 18px;
    background: rgba(255,255,255,.88);
    box-shadow: 0 5px 18px rgba(111,132,165,.055);
    transition: transform .2s ease, box-shadow .2s ease;
}

.resultados-page .resumen-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(111,132,165,.12);
}

.resultados-page .resumen-card::after {
    position: absolute;
    content: "";
    right: -23px;
    bottom: -37px;
    width: 105px;
    height: 105px;
    border: 15px solid rgba(167,191,220,.15);
    border-radius: 50%;
    pointer-events: none;
}

.resultados-page .resumen-icono {
    display: flex;
    align-items: center;
    justify-content: center;
    flex: 0 0 60px;
    width: 60px;
    height: 60px;
    border-radius: 17px;
    background: var(--res-blue);
    color: #718eb5;
    font-size: 24px;
}

.resultados-page .resumen-card:nth-child(2) .resumen-icono {
    background: var(--res-lavender);
    color: #9385bc;
}

.resultados-page .resumen-datos {
    position: relative;
    z-index: 1;
    display: flex;
    flex-direction: column;
    gap: 7px;
    min-width: 0;
}

.resultados-page .resumen-datos span {
    color: var(--res-muted);
    font-size: 13px;
    font-weight: 600;
}

.resultados-page .resumen-datos strong {
    color: #5d7699;
    font-family: Georgia, "Times New Roman", serif;
    font-size: 31px;
    line-height: 1.1;
}

.resultados-page .resultados-tabla-contenedor {
    width: 100%;
    min-width: 0;
    overflow: hidden;
    border: 1px solid var(--res-border);
    border-radius: 19px;
    background: rgba(255,255,255,.95);
    box-shadow: 0 7px 25px rgba(111,132,165,.055);
}

.resultados-page .tabla-encabezado {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    padding: 23px 27px;
    border-bottom: 1px solid var(--res-border);
    background: linear-gradient(110deg, #ffffff, #fbfaff);
}

.resultados-page .tabla-titulo-grupo {
    display: flex;
    align-items: center;
    gap: 13px;
    min-width: 0;
}

.resultados-page .tabla-titulo-icono {
    display: flex;
    align-items: center;
    justify-content: center;
    flex: 0 0 43px;
    width: 43px;
    height: 43px;
    border-radius: 14px;
    background: var(--res-lavender);
    color: #9184ba;
    font-size: 18px;
}

.resultados-page .tabla-encabezado h2 {
    margin: 0;
    color: #526982;
    font-family: Georgia, "Times New Roman", serif;
    font-size: 21px;
    font-weight: 700;
}

.resultados-page .tabla-encabezado p {
    margin: 5px 0 0;
    color: var(--res-muted);
    font-size: 12px;
}

.resultados-page .contador-registros {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    flex-shrink: 0;
    padding: 9px 13px;
    border: 1px solid #eadff1;
    border-radius: 30px;
    background: #f5effa;
    color: #8877a8;
    font-size: 12px;
    font-weight: 700;
}

.resultados-page .tabla-responsive {
    width: 100%;
    min-width: 0;
    overflow-x: auto;
}

.resultados-page .tabla-resultados {
    width: 100%;
    min-width: 760px;
    border-collapse: separate;
    border-spacing: 0;
}

.resultados-page .tabla-resultados thead th {
    padding: 16px 18px;
    border-bottom: 1px solid #e7ebf2;
    background: #f4f6fb;
    color: #718096;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: .65px;
    text-align: left;
    text-transform: uppercase;
    white-space: nowrap;
}

.resultados-page .tabla-resultados thead th:first-child,
.resultados-page .tabla-resultados tbody td:first-child {
    padding-left: 27px;
}

.resultados-page .tabla-resultados tbody td {
    padding: 18px;
    border-bottom: 1px solid #edf0f5;
    color: #58697d;
    font-size: 13px;
    vertical-align: middle;
}

.resultados-page .tabla-resultados tbody tr:last-child td {
    border-bottom: none;
}

.resultados-page .tabla-resultados tbody tr {
    transition: background .18s ease;
}

.resultados-page .tabla-resultados tbody tr:hover {
    background: #f8f9fe;
}

.resultados-page .numero-fila {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 31px;
    height: 31px;
    border: 1px solid #dfe7f2;
    border-radius: 10px;
    background: #eef3fb;
    color: #7189ad;
    font-size: 12px;
    font-weight: 800;
}

.resultados-page .participante {
    display: flex;
    align-items: center;
    gap: 11px;
    min-width: 175px;
}

.resultados-page .participante-icono {
    display: flex;
    align-items: center;
    justify-content: center;
    flex: 0 0 39px;
    width: 39px;
    height: 39px;
    border: 1px solid #dfe8f3;
    border-radius: 50%;
    background: #edf3fb;
    color: #7992b7;
    font-size: 15px;
}

.resultados-page .participante-datos {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.resultados-page .participante strong {
    color: #455a73;
    font-size: 13px;
    font-weight: 700;
}

.resultados-page .participante small {
    color: #929eae;
    font-size: 11px;
}

.resultados-page .nota {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 8px 11px;
    border: 1px solid transparent;
    border-radius: 9px;
    font-size: 12px;
    font-weight: 800;
    white-space: nowrap;
}

.resultados-page .nota-alta {
    border-color: #cce8d9;
    background: #e7f5ec;
    color: #438363;
}

.resultados-page .nota-baja {
    border-color: #f0dce0;
    background: #fbecef;
    color: #b56f7c;
}

.resultados-page .dato-numero {
    color: #53677e;
    font-size: 14px;
    font-weight: 700;
}

.resultados-page .dato-correctas {
    color: #579475;
}

.resultados-page .fecha-realizacion {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #78889a;
    white-space: nowrap;
}

.resultados-page .fecha-realizacion i {
    color: #9c8fc3;
}

.resultados-page .resultados-vacio {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 58px 24px 62px;
    text-align: center;
}

.resultados-page .vacio-icono {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 84px;
    height: 84px;
    margin-bottom: 22px;
    border: 1px solid #e2e5f1;
    border-radius: 25px;
    background: linear-gradient(135deg, #edf3fb, #f1edf9);
    color: #9a9fc4;
    font-size: 34px;
}

.resultados-page .resultados-vacio h3 {
    margin: 0 0 10px;
    color: #526982;
    font-family: Georgia, "Times New Roman", serif;
    font-size: 23px;
}

.resultados-page .resultados-vacio p {
    max-width: 430px;
    margin: 0 0 24px;
    color: var(--res-muted);
    font-size: 14px;
    line-height: 1.7;
}

.resultados-page .btn-evaluacion,
.resultados-page .btn-volver {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    min-height: 44px;
    padding: 12px 19px;
    border: 1px solid #9aafd0;
    border-radius: 11px;
    background: #dfeafa;
    color: #536e94 !important;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none !important;
    transition: background .2s ease, transform .2s ease, box-shadow .2s ease;
}

.resultados-page .btn-evaluacion:hover,
.resultados-page .btn-volver:hover {
    transform: translateY(-2px);
    border-color: #8ca4c8;
    background: #d0e0f5;
    color: #425d82 !important;
    box-shadow: 0 7px 16px rgba(111,132,165,.14);
}

.resultados-page .resultados-acciones {
    display: flex;
    justify-content: flex-start;
    margin-top: 23px;
}

.resultados-page .btn-volver {
    border-color: #e1e5ee;
    background: #fff;
    color: #687d99 !important;
    box-shadow: 0 3px 10px rgba(111,132,165,.04);
}

.resultados-page .btn-volver:hover {
    border-color: #cbd8eb;
    background: #edf3fb;
    color: #536e94 !important;
}

@media (max-width: 768px) {
    .resultados-page {
        padding: 22px 14px 35px;
    }

    .resultados-page .resultados-encabezado {
        align-items: flex-start;
        gap: 16px;
        padding: 25px 21px;
        border-radius: 17px;
    }

    .resultados-page .encabezado-icono {
        flex-basis: 54px;
        width: 54px;
        height: 54px;
        border-radius: 14px;
        font-size: 23px;
    }

    .resultados-page .resultados-encabezado h1 {
        font-size: 25px;
    }

    .resultados-page .resultados-encabezado p {
        font-size: 13px;
    }

    .resultados-page .resultados-resumen {
        gap: 13px;
    }

    .resultados-page .resumen-card {
        gap: 13px;
        min-height: 110px;
        padding: 18px;
    }

    .resultados-page .resumen-icono {
        flex-basis: 46px;
        width: 46px;
        height: 46px;
        border-radius: 13px;
        font-size: 19px;
    }

    .resultados-page .resumen-datos span {
        font-size: 12px;
    }

    .resultados-page .resumen-datos strong {
        font-size: 26px;
    }

    .resultados-page .tabla-encabezado {
        align-items: flex-start;
        padding: 19px;
    }

    .resultados-page .tabla-encabezado h2 {
        font-size: 18px;
    }

    .resultados-page .tabla-titulo-icono {
        display: none;
    }

    .resultados-page .contador-registros {
        padding: 7px 9px;
        font-size: 10px;
    }

    .resultados-page .tabla-resultados thead th:first-child,
    .resultados-page .tabla-resultados tbody td:first-child {
        padding-left: 18px;
    }
}

@media (max-width: 480px) {
    .resultados-page .resultados-encabezado {
        flex-direction: column;
    }

    .resultados-page .resultados-resumen {
        grid-template-columns: 1fr;
    }

    .resultados-page .resumen-card {
        min-height: 100px;
    }

    .resultados-page .tabla-encabezado {
        flex-direction: column;
    }

    .resultados-page .resultados-vacio {
        padding: 42px 20px;
    }

    .resultados-page .resultados-vacio h3 {
        font-size: 20px;
    }

    .resultados-page .resultados-acciones,
    .resultados-page .btn-volver {
        width: 100%;
    }
}

@media (prefers-reduced-motion: reduce) {
    .resultados-page *,
    .resultados-page *::before,
    .resultados-page *::after {
        transition: none !important;
    }
}
CSS);

$totalEvaluaciones = count($resultados);

$promedio = $totalEvaluaciones > 0
    ? array_sum(array_map(
        static fn($r) => (float) ($r['puntuacion'] ?? 0),
        $resultados
    )) / $totalEvaluaciones
    : 0;
?>

<main class="resultados-page">
    <div class="resultados-inner">

        <section class="resultados-encabezado">
            <div class="encabezado-icono">
                <i class="fa-solid fa-chart-column" aria-hidden="true"></i>
            </div>

            <div class="encabezado-texto">
                <span class="encabezado-etiqueta">
                    <?= $esAdmin ? 'Panel de administración' : 'Área personal' ?>
                </span>

                <h1><?= Html::encode($this->title) ?></h1>

                <p>
                    <?= $esAdmin
                        ? 'Consulta y supervisa las evaluaciones realizadas por los participantes.'
                        : 'Revisa tu historial, tus calificaciones y tu progreso en la autoevaluación.' ?>
                </p>
            </div>
        </section>

        <section class="resultados-resumen" aria-label="Resumen de evaluaciones">
            <article class="resumen-card">
                <div class="resumen-icono">
                    <i class="fa-solid fa-file-circle-check" aria-hidden="true"></i>
                </div>

                <div class="resumen-datos">
                    <span>Total de evaluaciones</span>
                    <strong><?= $totalEvaluaciones ?></strong>
                </div>
            </article>

            <article class="resumen-card">
                <div class="resumen-icono">
                    <i class="fa-solid fa-bullseye" aria-hidden="true"></i>
                </div>

                <div class="resumen-datos">
                    <span>Promedio de puntuación</span>
                    <strong><?= number_format($promedio, 2) ?>%</strong>
                </div>
            </article>
        </section>

        <section class="resultados-tabla-contenedor">
            <div class="tabla-encabezado">
                <div class="tabla-titulo-grupo">
                    <div class="tabla-titulo-icono">
                        <i class="fa-solid fa-clock-rotate-left" aria-hidden="true"></i>
                    </div>

                    <div>
                        <h2>Historial de evaluaciones</h2>
                        <p>Detalle de las evaluaciones registradas en el sistema</p>
                    </div>
                </div>

                <span class="contador-registros">
                    <i class="fa-solid fa-layer-group" aria-hidden="true"></i>
                    <?= $totalEvaluaciones ?>
                    <?= $totalEvaluaciones === 1 ? 'registro' : 'registros' ?>
                </span>
            </div>

            <?php if (empty($resultados)): ?>

                <div class="resultados-vacio">
                    <div class="vacio-icono">
                        <i class="fa-regular fa-folder-open" aria-hidden="true"></i>
                    </div>

                    <h3>No hay evaluaciones registradas</h3>

                    <p>
                        Cuando se complete una evaluación, sus resultados
                        aparecerán aquí para que puedas consultarlos.
                    </p>

                    <?= Html::a(
                        '<i class="fa-solid fa-clipboard-check" aria-hidden="true"></i> Realizar evaluación',
                        ['realizar'],
                        [
                            'class' => 'btn-evaluacion',
                            'encode' => false,
                        ]
                    ) ?>
                </div>

            <?php else: ?>

                <div class="tabla-responsive">
                    <table class="tabla-resultados">
                        <thead>
                            <tr>
                                <th scope="col">N.º</th>

                                <?php if ($esAdmin): ?>
                                    <th scope="col">Participante</th>
                                <?php endif; ?>

                                <th scope="col">Calificación</th>
                                <th scope="col">Respuestas correctas</th>
                                <th scope="col">Total de preguntas</th>
                                <th scope="col">Fecha de realización</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($resultados as $i => $resultado): ?>
                                <?php
                                $puntuacion = (float) ($resultado['puntuacion'] ?? 0);

                                $claseNota = $puntuacion >= 70
                                    ? 'nota-alta'
                                    : 'nota-baja';

                                $nombreParticipante = trim(
                                    ($resultado['nombre'] ?? '') . ' ' .
                                    ($resultado['apellido'] ?? '')
                                );

                                if ($nombreParticipante === '') {
                                    $nombreParticipante = $resultado['username']
                                        ?? 'Visitante';
                                }

                                $usuarioId = $resultado['usuario_id'] ?? null;
                                ?>

                                <tr>
                                    <td>
                                        <span class="numero-fila">
                                            <?= $i + 1 ?>
                                        </span>
                                    </td>

                                    <?php if ($esAdmin): ?>
                                        <td>
                                            <div class="participante">
                                                <span class="participante-icono">
                                                    <i class="fa-solid fa-user" aria-hidden="true"></i>
                                                </span>

                                                <div class="participante-datos">
                                                    <strong>
                                                        <?= Html::encode($nombreParticipante) ?>
                                                    </strong>

                                                    <small>
                                                        <?= $usuarioId === null
                                                            ? 'Evaluación de visitante'
                                                            : 'Usuario registrado' ?>
                                                    </small>
                                                </div>
                                            </div>
                                        </td>
                                    <?php endif; ?>

                                    <td>
                                        <span class="nota <?= $claseNota ?>">
                                            <i
                                                class="fa-solid <?= $puntuacion >= 70
                                                    ? 'fa-circle-check'
                                                    : 'fa-circle-exclamation' ?>"
                                                aria-hidden="true"
                                            ></i>

                                            <?= number_format($puntuacion, 2) ?>%
                                        </span>
                                    </td>

                                    <td>
                                        <span class="dato-numero dato-correctas">
                                            <?= (int) ($resultado['respuestas_correctas'] ?? 0) ?>
                                        </span>
                                    </td>

                                    <td>
                                        <span class="dato-numero">
                                            <?= (int) ($resultado['total_preguntas'] ?? 0) ?>
                                        </span>
                                    </td>

                                    <td>
                                        <div class="fecha-realizacion">
                                            <i class="fa-regular fa-calendar-days" aria-hidden="true"></i>

                                            <span>
                                                <?= !empty($resultado['fecha_realizacion'])
                                                    ? Html::encode(
                                                        Yii::$app->formatter->asDatetime(
                                                            $resultado['fecha_realizacion'],
                                                            'php:d/m/Y H:i'
                                                        )
                                                    )
                                                    : 'No disponible' ?>
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            <?php endif; ?>
        </section>

        <div class="resultados-acciones">
            <?= Html::a(
                '<i class="fa-solid fa-arrow-left" aria-hidden="true"></i> Volver al cuestionario',
                ['index'],
                [
                    'class' => 'btn-volver',
                    'encode' => false,
                ]
            ) ?>
        </div>

    </div>
</main>
