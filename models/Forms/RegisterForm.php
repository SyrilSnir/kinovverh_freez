<?php

namespace app\models\Forms;

use Yii;
use yii\base\Model;
use app\models\ActiveRecord\User;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class RegisterForm extends Model
{
    public $login;
    public $password;
    public $password_repeat;
   // public $rememberMe = true;

   // private $_user = false;
    /**     
     * @var User
     */
    protected $user = false;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['login', 'password','password_repeat'], 'required'],
            ['login', 'email'],
            // rememberMe must be a boolean value
         //   ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['login', 'errorIfLoginExists'],
            ['password',  'compare', 'compareAttribute'=>'password_repeat','message' => 'Введенные пароли не совпадают'],
            
        ];
    }
    /**
     * Названия полей
     * @return array
     */
    public function attributeLabels() {
        return [
            'login' => 'E-mail',
            'password' => 'Пароль',
            'password' => 'Подтверждение пароля',
        ];
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

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }        
        $user = new UserIdentity();
        $user->login = $this->login;
        $user->setPassword($this->password);
        //$user->generateAuthKey();        
        return $user->save() ? $user : null;   
    }
    public function errorIfLoginExists() {
        $this->user = User::findByUsername($this->login);
        if ($this->user != null) {
            $this->addError('login','Пользователь с таким e-mail уже зарегистрирован');
        }
    }
}
