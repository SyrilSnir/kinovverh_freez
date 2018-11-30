<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use \Faker\Factory as FakerFactory;
use yii\db\Expression;

/**
 * User model
 * 
 * @property integer $id
 * @property string $login
 * @property string $fio
 * @property string $password_hash write-only password 
 * @property integer $bitrix_user 
 * @property integer $external
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    
    public static function tableName() {
        return Yii::$app->db->tablePrefix .'users';
    }
    public function behaviors(){
    return [
        [
            'class' => TimestampBehavior::className(),
            'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
            ],
            // если вместо метки времени UNIX используется datetime:
            'value' => new Expression('NOW()'),
        ],
    ];
}
    
    
    /**
     * Поиск пользователя по имени
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['login' => $username, 'status' => self::STATUS_ACTIVE]);
    }
    public function setPassword($password)
    {
       // $this->password_hash = Yii::$app->security->generatePasswordHash($password);
       $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
    public function validatePassword($password)
    {
       
        if ($this->bitrix_user) {
            return $this->validateBitrixPassword($password);
        }
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
    
    public function getName() {
        return $this->fio ? $this->fio : '';
    }
 
    /**
     * Валидация старых пользователей
     * @return boolean
     */
    protected function validateBitrixPassword($password) {
        $salt = substr($this->password_hash,0,(strlen($this->password_hash) - 32));
        $realPassword = substr($this->password_hash, -32);
        $password = md5($salt.$password);
        return ($password == $realPassword);
    }


    // --------------------------------------------------//
    /**
     * Метод для использования в приемочных тестах
     * @param type $password
     */
    public function setTestUser($password =  'qwe') {
        $faker = FakerFactory::create();
        $this->fio = $faker->name;
        $this->login = $faker->email;
        $this->password_hash = $this->setPassword($password);
        //$this->first_name
    }
    public function setUserRegistrationForm (RegisterForm $registerForm) {
        $this->login = $registerForm->login;
        $this->password_hash = Yii::$app->security->generatePasswordHash($registerForm->password);        
        $this->external = 0;
        $this->bitrix_user = 0;
    }
}
