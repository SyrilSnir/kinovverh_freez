<?php

namespace app\models\ActiveRecord;

use Yii;
use yii\db\ActiveRecord;
use \Faker\Factory as FakerFactory;
use \app\models\TimestampTrait;

use yii\db\Expression;

/**
 * User model
 * 
 * @property integer $id
 * @property string $login
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
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
    const STATUS_ACTIVE = 1;
    
    use TimestampTrait;
    
    public static function tableName() {
        return Yii::$app->db->tablePrefix .'users';
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
    public function getFio() {
        return trim($this->last_name.' '.$this->first_name,' ').' '.$this->middle_name;
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
        $this->first_name = $faker->firstName;
        $this->last_name = $faker->lastName;
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
