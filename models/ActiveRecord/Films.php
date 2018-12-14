<?php

namespace app\models\ActiveRecord;


use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use \Faker\Factory as FakerFactory;
use yii\db\Expression;
use app\kv\tools\Strings;
use \app\models\TimestampTrait;
use app\models\ActiveRecord\FilmComment;
use Yii;
/**
 * Информация о звгруженных фильмах
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $preview_text
 * @property string $detail_text
 * @property integer $year 
 * @property integer $categories_id 
 * @property integer $rating
 * @property string $images
 * @property integer $shows
 * @property Person[] $actors
 * @property Person[] $editors
 * @property Category $category
 * @property Comments[] $comments все комментарии
 * @property Comments[] $moderateComments комментарии на модерации
 * @property Comments[] $availableComments доступные комментарии
 * @property integer $downloads
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $active
 * 
 * @author kotov
 */
class Films extends ActiveRecord
{
    public $editor = 1;
    use TimestampTrait;
    
    public function beforeSave($insert) {
        if (empty($this->code)) {
            $this->code = strtolower(Strings::getTransliterateString($this->name));
        }
        return parent::beforeSave($insert);
    }
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }
    public function getEditors() 
    {
        $junctionTableName = Yii::$app->db->tablePrefix .'film_person_occupation'; // промежуточная связующая таблица
        return $this->hasMany(Person::className(), ['id' => 'person_id'])
                ->viaTable($junctionTableName, ['film_id' => 'id'],function ($query) {
                    $query->andWhere(['occupation_id' => 1]);
        });
    }
    public function getComments() {
        return $this->hasMany(FilmComment::class, ['film_id' => 'id']);
    }
    public function getModerateComments() {
        return $this->hasMany(FilmComment::class, ['film_id' => 'id'])->where('moderate = 0');
    }
    public function getAvailableComments() {
        return $this->hasMany(FilmComment::class, ['film_id' => 'id'])->where('moderate = 1');
    }

    public function getActors() 
    {
        $junctionTableName = Yii::$app->db->tablePrefix .'film_person_occupation'; // промежуточная связующая таблица
        return $this->hasMany(Person::className(), ['id' => 'person_id'])
                ->viaTable($junctionTableName, ['film_id' => 'id'],function ($query) {
                    $query->andWhere(['occupation_id' => 2]);
              });
    }
    

            
}
