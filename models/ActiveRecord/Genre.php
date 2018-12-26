<?php

namespace app\models\ActiveRecord;

use yii\db\ActiveRecord;
use Yii;
use app\kv\tools\Strings;
use app\models\ActiveRecord\Films;
/**
 * Description of Genre
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property Films[] $films
 * @author kotov
 */
class Genre extends ActiveRecord
{
    public function beforeSave($insert) {
        if (empty($this->code)) {
            $this->code = strtolower(Strings::getTransliterateString($this->name));
        }
        return parent::beforeSave($insert);
    }
    public function getFilms() 
    {
        $junctionTableName = Yii::$app->db->tablePrefix .'film_genre'; // промежуточная связующая таблица
        return $this->hasMany(Films::className(),['id' => 'film_id'])
                ->viaTable($junctionTableName, ['genre_id' => 'id']);
    }
    
}
