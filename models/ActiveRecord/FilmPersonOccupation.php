<?php

namespace app\models\ActiveRecord;

use yii\db\ActiveRecord;
use Yii;
/**
 * Модель связи фильма с его создателями
 * @property integer $film_id
 * @property integer $person_id
 * @property integer $occupation_id
 * @author kotov
 */
class FilmPersonOccupation extends ActiveRecord
{
    public static function tableName() 
    {
        return Yii::$app->db->tablePrefix .'film_person_occupation';
    }
    
}
