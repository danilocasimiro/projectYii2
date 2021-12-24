<?php

namespace app\models;

use app\components\JwtMethods;
use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $email;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // email and password are both required
            [['email', 'password'], 'required'],
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

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect email or password.');
            }
        }
    }

    /**
     * Finds user by [[email]]
     *
     * @return AuthUser|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = AuthUser::findByEmail($this->email);
        }

        return $this->_user;
    }

    public function login()
    {
        if ($this->validLogin()) {
            $user = AuthUser::findByEmail($this->email);
    
            $token = JwtMethods::generateJwt($user);
    
            JwtMethods::generateRefreshToken($user);
    
            Log::addLogLogin($user, AuthUser::class);
    
            return [
            'user' => $user,
            'person' => $user->person,
            'token' => (string) $token,
            'message' => 'Logado com sucesso',
            'code' => '200'
            ];
        } else {
    
            $message = $this->getErrors();
            return [ 
            'user' => '',
            'token' => '',
            'message' => $message['password'],
            'code' => '400'
            ];
        }
    }

    /**
     * Logs in a user using the provided email and password.
     * @return bool whether the user is logged in successfully
     */
    private function validLogin()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }
}
