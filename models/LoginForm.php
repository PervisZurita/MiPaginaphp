<?php

namespace app\models;

use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $username = '';
    public $password = '';
    public $rememberMe = true;

    private $_user = false;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username'], 'trim'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Usuario o correo electrónico',
            'password' => 'Contraseña',
            'rememberMe' => 'Recordarme',
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if ($this->hasErrors()) {
            return;
        }

        $user = $this->getUser();

        if (!$user || !$user->validatePassword($this->password)) {
            $this->addError(
                $attribute,
                'Usuario, correo electrónico o contraseña incorrectos.'
            );
        }
    }

    public function login()
    {
        if (!$this->validate()) {
            return false;
        }

        return Yii::$app->user->login(
            $this->getUser(),
            $this->rememberMe ? 3600 * 24 * 30 : 0
        );
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $login = trim((string) $this->username);

            $this->_user = User::find()
                ->where(['username' => $login])
                ->orWhere(['correo' => $login])
                ->one();
        }

        return $this->_user;
    }
}
