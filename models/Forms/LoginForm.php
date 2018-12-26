<?php

namespace app\models\Forms;

use Yii;
use yii\base\Model;
use app\models\ActiveRecord\User;
use app\models\UserIdentity;


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
    public $rememberMe = false;

    /**     
     * @var UserIdentity
     */
    protected $user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            ['username', 'errorIfUsernameNotFound'], // функция проверки существования пользователя
            // password is validated by validatePassword()
            ['password', 'errorIfPasswordWrong'], // функция проверки правильности введенного пароля
        ];
    }
    /**
     * Названия полей
     * @return array
     */
    public function attributeLabels() {
        return [
            'username' => 'E-mail',
            'password' => 'Пароль'
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->hasErrors()) {
            return ;
        }
        $userIdentity = UserIdentity::findIdentity($this->user->id);
        Yii::$app->user->login($userIdentity);
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->user === false) {
            $this->user = UserIdentity::findByUsername($this->username);
        }

        return $this->user;
    }
    public function errorIfUsernameNotFound() {
        $this->user = UserIdentity::findByUsername($this->username);
        if ($this->user == null) {
            $this->addError('username','Пользователь с таким e-mail не зарегистрирован');
        }
    }
    public function errorIfPasswordWrong() {
        if ($this->hasErrors()) {
            return ;
        }
        if (!$this->user->validatePassword($this->password)) {
            $this->addError('password','Неверный пароль');
        }
    }
}
