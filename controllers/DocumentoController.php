<?php

declare(strict_types=1);

namespace app\controllers;

use Yii;
use app\models\Documento;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Response;

class DocumentoController extends Controller
{
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => [
                    'index',
                    'view',
                    'create',
                    'update',
                    'delete',
                    'download',
                ],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'download'],
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create', 'update', 'delete'],
                        'roles' => ['@'],
                        'matchCallback' => static function (): bool {
                            return Yii::$app->user->identity !== null
                                && Yii::$app->user->identity->role === 'admin';
                        },
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex(): string
    {
        $documentos = Documento::find()
            ->orderBy(['fecha_creacion' => SORT_DESC])
            ->all();

        return $this->render('index', [
            'documentos' => $documentos,
        ]);
    }

    public function actionView(int $id): string
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate(): Response|string
    {
        $model = new Documento();

        if ($model->load(Yii::$app->request->post())) {
            $archivo = UploadedFile::getInstance($model, 'archivo');

            if ($archivo === null) {
                $model->addError('archivo', 'Selecciona un archivo PDF.');
            } elseif (strtolower($archivo->extension ?? '') !== 'pdf') {
                $model->addError('archivo', 'Solo se permiten archivos PDF.');
            } elseif ($archivo->size > 10 * 1024 * 1024) {
                $model->addError('archivo', 'El archivo no puede superar 10 MB.');
            } else {
                $directorio = Yii::getAlias('@webroot/documentos');

                if (!is_dir($directorio)
                    && !mkdir($directorio, 0755, true)
                    && !is_dir($directorio)
                ) {
                    $model->addError(
                        'archivo',
                        'No se pudo crear el directorio de documentos.'
                    );
                } else {
                    $nombreArchivo = Yii::$app->security
                        ->generateRandomString(24) . '.pdf';

                    $rutaArchivo = $directorio . DIRECTORY_SEPARATOR
                        . $nombreArchivo;

                    if ($archivo->saveAs($rutaArchivo)) {
                        $model->archivo = $nombreArchivo;

                        if ($model->save()) {
                            Yii::$app->session->setFlash(
                                'success',
                                'Documento agregado correctamente.'
                            );

                            return $this->redirect(['index']);
                        }

                        @unlink($rutaArchivo);
                        $model->archivo = null;
                    } else {
                        $model->addError(
                            'archivo',
                            'No se pudo guardar el archivo.'
                        );
                    }
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate(int $id): Response|string
    {
        $model = $this->findModel($id);
        $archivoAnterior = $model->archivo;

        if ($model->load(Yii::$app->request->post())) {
            $archivo = UploadedFile::getInstance($model, 'archivo');

            if ($archivo === null) {
                $model->archivo = $archivoAnterior;

                if ($model->save()) {
                    Yii::$app->session->setFlash(
                        'success',
                        'Documento actualizado correctamente.'
                    );

                    return $this->redirect(['index']);
                }
            } elseif (strtolower($archivo->extension ?? '') !== 'pdf') {
                $model->addError('archivo', 'Solo se permiten archivos PDF.');
            } elseif ($archivo->size > 10 * 1024 * 1024) {
                $model->addError('archivo', 'El archivo no puede superar 10 MB.');
            } else {
                $directorio = Yii::getAlias('@webroot/documentos');

                if (!is_dir($directorio)
                    && !mkdir($directorio, 0755, true)
                    && !is_dir($directorio)
                ) {
                    $model->addError(
                        'archivo',
                        'No se pudo crear el directorio de documentos.'
                    );
                } else {
                    $nombreArchivo = Yii::$app->security
                        ->generateRandomString(24) . '.pdf';

                    $rutaNueva = $directorio . DIRECTORY_SEPARATOR
                        . $nombreArchivo;

                    if ($archivo->saveAs($rutaNueva)) {
                        $model->archivo = $nombreArchivo;

                        if ($model->save()) {
                            $rutaAnterior = $directorio
                                . DIRECTORY_SEPARATOR . $archivoAnterior;

                            if (
                                $archivoAnterior !== null
                                && $archivoAnterior !== ''
                                && is_file($rutaAnterior)
                            ) {
                                @unlink($rutaAnterior);
                            }

                            Yii::$app->session->setFlash(
                                'success',
                                'Documento actualizado correctamente.'
                            );

                            return $this->redirect(['index']);
                        }

                        @unlink($rutaNueva);
                        $model->archivo = $archivoAnterior;
                    } else {
                        $model->addError(
                            'archivo',
                            'No se pudo guardar el archivo.'
                        );
                    }
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete(int $id): Response
    {
        $model = $this->findModel($id);

        $ruta = Yii::getAlias('@webroot/documentos/')
            . $model->archivo;

        if ($model->delete() !== false) {
            if (is_file($ruta)) {
                @unlink($ruta);
            }

            Yii::$app->session->setFlash(
                'success',
                'Documento eliminado correctamente.'
            );
        }

        return $this->redirect(['index']);
    }

    public function actionDownload(int $id): Response
    {
        $model = $this->findModel($id);

        $directorio = Yii::getAlias('@webroot/documentos');
        $nombreArchivo = basename((string) $model->archivo);
        $ruta = $directorio . DIRECTORY_SEPARATOR . $nombreArchivo;

        if (
            $nombreArchivo === ''
            || !is_file($ruta)
            || !is_readable($ruta)
        ) {
            throw new NotFoundHttpException(
                'El archivo solicitado no existe.'
            );
        }

        return Yii::$app->response->sendFile(
            $ruta,
            $nombreArchivo,
            ['mimeType' => 'application/pdf']
        );
    }

    protected function findModel(int $id): Documento
    {
        $model = Documento::findOne($id);

        if ($model !== null) {
            return $model;
        }

        throw new NotFoundHttpException(
            'El documento solicitado no existe.'
        );
    }
}
