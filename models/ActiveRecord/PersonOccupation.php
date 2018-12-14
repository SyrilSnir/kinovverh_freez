<?php

namespace app\models\ActiveRecord;

use yii\db\ActiveRecord;
use Yii;

/**
 * Модель связи персоны с родом деятельности
 * @property integer $film_id
 * @property integer $genre_id
 * @property integer $occupation_id
 * @author kotov
 */
class PersonOccupation extends ActiveRecord
{
    public static function tableName() 
    {
        return Yii::$app->db->tablePrefix .'person_occupation';
    }
    
}