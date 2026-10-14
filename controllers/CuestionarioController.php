<?php

declare(strict_types=1);

namespace app\controllers;

use Yii;
use yii\db\Query;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\BadRequestHttpException;

class CuestionarioController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => [
                    'index',
                    'realizar',
                    'resultado',
                    'resultados',
                    'estadisticas',
                ],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => [
                            'index',
                            'realizar',
                            'resultado',
                            'resultados',
                        ],
                        'roles' => ['?', '@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['estadisticas'],
                        'roles' => ['@'],
                        'matchCallback' => static function () {
                            return !Yii::$app->user->isGuest
                                && Yii::$app->user->identity->role === 'admin';
                        },
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $totalPreguntas = (int) (new Query())
            ->from('cuestionario_preguntas')
            ->where(['estado' => 1])
            ->count();

        return $this->render('index', [
            'totalPreguntas' => $totalPreguntas,
        ]);
    }

    public function actionRealizar()
    {
        $preguntas = (new Query())
            ->from('cuestionario_preguntas')
            ->where(['estado' => 1])
            ->all();

        foreach ($preguntas as &$pregunta) {
            $pregunta['opciones'] = (new Query())
                ->from('cuestionario_opciones')
                ->where(['pregunta_id' => $pregunta['id']])
                ->all();
        }
        unset($pregunta);

        if (!Yii::$app->request->isPost) {
            return $this->render('realizar', [
                'preguntas' => $preguntas,
            ]);
        }

        $respuestas = Yii::$app->request->post('respuestas', []);

        if (!is_array($respuestas)) {
            throw new BadRequestHttpException('Las respuestas enviadas no son válidas.');
        }

        if (empty($preguntas)) {
            Yii::$app->session->setFlash(
                'error',
                'No hay preguntas disponibles para evaluar.'
            );

            return $this->redirect(['index']);
        }

        $correctas = 0;
        $revision = [];
        $respuestasValidadas = [];

        foreach ($preguntas as $pregunta) {
            $preguntaId = (int) $pregunta['id'];
            $opcionId = $respuestas[$preguntaId] ?? null;
            $opcion = null;

            if ($opcionId !== null && $opcionId !== '') {
                $opcion = (new Query())
                    ->from('cuestionario_opciones')
                    ->where([
                        'id' => $opcionId,
                        'pregunta_id' => $preguntaId,
                    ])
                    ->one();
            }

            $esCorrecta = $opcion !== null
                && (int) $opcion['es_correcta'] === 1;

            if ($esCorrecta) {
                $correctas++;
            }

            $respuestaCorrecta = (new Query())
                ->select('opcion')
                ->from('cuestionario_opciones')
                ->where([
                    'pregunta_id' => $preguntaId,
                    'es_correcta' => 1,
                ])
                ->scalar();

            $revision[] = [
                'pregunta' => $pregunta['pregunta'],
                'explicacion' => $pregunta['explicacion'] ?? '',
                'seleccionada' => $opcion['opcion'] ?? 'Sin responder',
                'correcta' => $respuestaCorrecta ?: 'No disponible',
                'es_correcta' => $esCorrecta,
            ];

            $respuestasValidadas[$preguntaId] = [
                'opcion_id' => $opcion['id'] ?? null,
                'es_correcta' => $esCorrecta,
            ];
        }

        $totalPreguntas = count($preguntas);
        $puntuacion = round(($correctas / $totalPreguntas) * 100, 2);

        $db = Yii::$app->db;
        $transaction = $db->beginTransaction();

        try {
            $db->createCommand()->insert(
                'cuestionario_resultados',
                [
                    'usuario_id' => Yii::$app->user->isGuest
                        ? null
                        : Yii::$app->user->id,
                    'puntuacion' => $puntuacion,
                    'total_preguntas' => $totalPreguntas,
                    'respuestas_correctas' => $correctas,
                ]
            )->execute();

            $resultadoId = $db->getLastInsertID();

            foreach ($preguntas as $pregunta) {
                $preguntaId = (int) $pregunta['id'];
                $respuesta = $respuestasValidadas[$preguntaId];

                $db->createCommand()->insert(
                    'cuestionario_respuestas',
                    [
                        'resultado_id' => $resultadoId,
                        'pregunta_id' => $preguntaId,
                        'opcion_id' => $respuesta['opcion_id'],
                        'es_correcta' => $respuesta['es_correcta'] ? 1 : 0,
                    ]
                )->execute();
            }

            $transaction->commit();
        } catch (\Throwable $e) {
            $transaction->rollBack();
            throw $e;
        }

        return $this->render('resultado', [
            'correctas' => $correctas,
            'totalPreguntas' => $totalPreguntas,
            'puntuacion' => $puntuacion,
            'revision' => $revision,
        ]);
    }
    
public function actionResultados()
{
    $consulta = (new Query())
        ->select([
            'r.id',
            'r.usuario_id',
            'r.puntuacion',
            'r.total_preguntas',
            'r.respuestas_correctas',
            'r.fecha_realizacion',
            'u.username',
            'u.nombre',
            'u.apellido',
        ])
        ->from(['r' => 'cuestionario_resultados'])
        ->leftJoin(['u' => 'user'], 'u.id = r.usuario_id')
        ->orderBy(['r.fecha_realizacion' => SORT_DESC]);

    $esAdmin = !Yii::$app->user->isGuest
        && Yii::$app->user->identity->role === 'admin';

    if (!$esAdmin) {
        if (Yii::$app->user->isGuest) {
            $consulta->andWhere(['r.usuario_id' => null]);
        } else {
            $consulta->andWhere([
                'r.usuario_id' => Yii::$app->user->id,
            ]);
        }
    }

    $resultados = $consulta->all();

    return $this->render('resultados', [
        'resultados' => $resultados,
        'esAdmin' => $esAdmin,
    ]);
}


    



    public function actionEstadisticas()
    {
        $db = Yii::$app->db;

        $resumen = $db->createCommand("
            SELECT
                COUNT(*) AS total_intentos,
                COUNT(DISTINCT usuario_id) AS total_usuarios,
                COALESCE(AVG(puntuacion), 0) AS promedio_puntuacion,
                COALESCE(AVG(respuestas_correctas), 0) AS promedio_correctas
            FROM cuestionario_resultados
        ")->queryOne();

        $estadisticasPreguntas = $db->createCommand("
            SELECT
                pregunta_id,
                COUNT(*) AS total_respuestas,
                SUM(es_correcta = 1) AS correctas,
                SUM(es_correcta = 0) AS incorrectas,
                ROUND(AVG(es_correcta) * 100, 2) AS porcentaje_aciertos
            FROM cuestionario_respuestas
            GROUP BY pregunta_id
            ORDER BY pregunta_id ASC
        ")->queryAll();

        $historial = $db->createCommand("
            SELECT
                DATE(fecha_realizacion) AS fecha,
                COUNT(*) AS intentos,
                ROUND(AVG(puntuacion), 2) AS promedio
            FROM cuestionario_resultados
            GROUP BY DATE(fecha_realizacion)
            ORDER BY fecha ASC
        ")->queryAll();

        return $this->render('estadisticas', [
            'resumen' => $resumen,
            'estadisticasPreguntas' => $estadisticasPreguntas,
            'historial' => $historial,
        ]);
    }
}
