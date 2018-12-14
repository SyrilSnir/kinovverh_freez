<?php

namespace app\models\ActiveRecord;

use yii\db\ActiveRecord;
use Yii;

/**
 * Хранит знаки информационной продукции
 * @property integer $id
 * @property string $name
 * @property string $code
 * @author kotov
 */
class Category extends ActiveRecord
{
    public static function tableName() {
        return Yii::$app->db->tablePrefix .'categories';
    }
    
}
