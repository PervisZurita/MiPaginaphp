<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public $password;

    public static function tableName()
    {
        return '{{%user}}';
    }

    public function rules()
    {
        return [
            [['username', 'nombre', 'apellido', 'correo'], 'required'],

            [['username', 'correo', 'password_hash'], 'string', 'max' => 255],
            [['nombre', 'apellido'], 'string', 'max' => 150],
            [['auth_key', 'access_token', 'role'], 'string', 'max' => 45],

            [['username'], 'unique'],
            [['correo'], 'email'],
            [['correo'], 'unique'],

            [['password'], 'string', 'min' => 8],
            [['password'], 'required', 'on' => 'create'],

            [['role'], 'default', 'value' => 'user'],
            [['role'], 'in', 'range' => ['user', 'admin']],

            [['auth_key', 'access_token'], 'safe'],
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public static function findByCorreo($correo)
    {
        return static::findOne(['correo' => $correo]);
    }

    public static function findByUsernameOrCorreo($login)
    {
        return static::find()
            ->where(['username' => trim($login)])
            ->orWhere(['correo' => trim($login)])
            ->one();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security
            ->generatePasswordHash($password);
    }

    public function validatePassword($password)
    {
        if (empty($this->password_hash)) {
            return false;
        }

        return Yii::$app->security->validatePassword(
            $password,
            $this->password_hash
        );
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security
            ->generateRandomString();
    }

    public function generateAccessToken()
    {
        $this->access_token = Yii::$app->security
            ->generateRandomString();
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if ($insert) {
            $this->generateAuthKey();
            $this->generateAccessToken();
        }

        if ($this->password !== null && $this->password !== '') {
            $this->setPassword($this->password);
        }

        return true;
    }
}
