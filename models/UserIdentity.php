<?php

namespace app\models;

use yii\web\IdentityInterface;
use app\models\ActiveRecord\User;

class UserIdentity extends User implements IdentityInterface
{
    
    public function getAuthKey() {
        return $this->autokey;
    }
    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int an ID that uniquely identifies a user identity.
     */
    public function getId() {
       return $this->id; 
    }

    public function validateAuthKey($authKey) 
    {
        return $this->getAuthKey() === $authKey;
    }
    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id) {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
}