<?php

namespace app\models\Forms;

use yii\base\Model;

/**
 * Description of CommentForm
 *
 * @author kotov
 */
class CommentForm extends Model
{
    public $userId;
    public $userName;
    public $filmId;
    public $message;
    
    public function attributeLabels() 
    {
        return [
            'userName' => 'Ваше имя'
        ];
    }
    public function rules() 
    {
        return [
            ['userName','required']
        ];
        
    }
}
