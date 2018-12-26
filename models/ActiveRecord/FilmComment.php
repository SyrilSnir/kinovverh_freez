<?php

namespace app\models\ActiveRecord;

use yii\db\ActiveRecord;
use app\models\Forms\CommentForm;
use \app\models\TimestampTrait;
use \Yii;
/**
 * Description of FilmComment
 * @property integer $id
 * @property integer $user_id
 * @property string $user_name
 * @property integer $film_id
 * @property string $message
 * @property integer $moderate
 * @property integer $created_at
 * @property integer $updated_at
 * @author kotov
 */
class FilmComment extends ActiveRecord
{
    use TimestampTrait;
    
    public static function tableName() 
    {
        return Yii::$app->db->tablePrefix .'film_comment';
    }
    public function setDataFromForm(CommentForm $form) 
    {
        if (Yii::$app->user->isGuest) {
            $this->user_id  = -1;
        } else {
            $this->user_id = Yii::$app->user->getId();
        }
        $this->film_id = $form->filmId; 
        $this->message = $form->message;
        $this->user_name = $form->userName;       
    }
    
}
