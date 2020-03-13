<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if($user === NULL) {
                $this->addError($attribute, 'Incorrect username or password.');
            } else {
                $password = $this->$attribute;
                $hashedPassword = Yii::$app->getSecurity()->generatePasswordHash($password);
                $hash = $user->getPassword();
            }


            if (!$user || !Yii::$app->getSecurity()->validatePassword($password, $hash)) {
                $this->addError($attribute, 'Incorrect username or password.');
            } elseif (Yii::$app->getSecurity()->validatePassword($hashedPassword, $hash)) {
                echo "";
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return bool|Object
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $var = User::findByUsername($this->username);
            $this->_user = $var;
        }

        return $this->_user;
    }
}
