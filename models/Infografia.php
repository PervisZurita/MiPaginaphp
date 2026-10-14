<?php

declare(strict_types=1);

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\UploadedFile;

class Infografia extends ActiveRecord
{
    public $imagenFile;

    public static function tableName(): string
    {
        return 'infografias';
    }

    
public function rules(): array
{
    return [
        [['titulo'], 'required'],
        [['titulo'], 'string', 'max' => 200],
        [['descripcion'], 'string'],
        [['archivo'], 'string', 'max' => 255],
        [['enlace'], 'string', 'max' => 500],
        [['enlace'], 'url', 'defaultScheme' => 'https'],

        [
            ['imagenFile'],
            'required',
            'when' => static function ($model) {
                return $model->isNewRecord;
            },
            'whenClient' => "function (attribute, value) {
                return $('#infografia-imagenfile').length &&
                    $('#infografia-imagenfile')[0].files.length === 0;
            }",
            'message' => 'Debes seleccionar una imagen.',
        ],

        [
            ['imagenFile'],
            'file',
            'skipOnEmpty' => true,
            'extensions' => ['jpg', 'jpeg', 'png', 'webp'],
            'maxSize' => 5 * 1024 * 1024,
            'tooBig' => 'La imagen no debe superar los 5 MB.',
            'wrongExtension' => 'Solo se permiten imágenes JPG, JPEG, PNG o WEBP.',
        ],

        [['fecha_creacion', 'fecha_actualizacion'], 'safe'],
    ];
}


    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'titulo' => 'Título de la infografía',
            'descripcion' => 'Descripción',
            'archivo' => 'Archivo de imagen',
            'imagenFile' => 'Seleccionar imagen',
            'enlace' => 'Enlace relacionado',
            'fecha_creacion' => 'Fecha de creación',
            'fecha_actualizacion' => 'Última actualización',
        ];
    }

    public function subirImagen(): bool
    {
        if (!$this->imagenFile instanceof UploadedFile) {
            return true;
        }

        $directorio = \Yii::getAlias('@webroot/infografias');

        if (!is_dir($directorio) &&
            !mkdir($directorio, 0775, true) &&
            !is_dir($directorio)) {
            $this->addError('imagenFile', 'No se pudo crear la carpeta de imágenes.');
            return false;
        }

        $nombre = bin2hex(random_bytes(16))
            . '.'
            . strtolower($this->imagenFile->extension);

        if (!$this->imagenFile->saveAs(
            $directorio . DIRECTORY_SEPARATOR . $nombre
        )) {
            $this->addError('imagenFile', 'No se pudo guardar la imagen.');
            return false;
        }

        $this->archivo = $nombre;

        return true;
    }

    public function eliminarImagen(): void
    {
        if (empty($this->archivo)) {
            return;
        }

        $ruta = \Yii::getAlias(
            '@webroot/infografias/' . $this->archivo
        );

        if (is_file($ruta)) {
            unlink($ruta);
        }
    }
}
