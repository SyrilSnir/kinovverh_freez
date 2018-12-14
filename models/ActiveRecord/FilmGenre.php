<?php

namespace app\models\ActiveRecord;

use yii\db\ActiveRecord;
use Yii;
/**
 * Связь фильма и жанра
 *
 * @property integer $film_id
 * @property integer $genre_id
 * @author kotov
 */
class FilmGenre extends ActiveRecord
{
    public static function tableName() {
        return Yii::$app->db->tablePrefix .'film_genre';
    }
}
