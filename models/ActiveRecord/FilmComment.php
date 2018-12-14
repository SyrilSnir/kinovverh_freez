<?php

namespace app\models\ActiveRecord;

use yii\db\ActiveRecord;
use \app\models\TimestampTrait;
use \Yii;
/**
 * Description of FilmComment
 * @property integer $id
 * @property integer $user_id
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
    
}
