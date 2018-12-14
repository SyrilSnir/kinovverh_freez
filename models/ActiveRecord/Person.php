<?php

namespace app\models\ActiveRecord;

use yii\db\ActiveRecord;
use \app\models\TimestampTrait;

/**
 * Персоналии
 * @property integer $id
 * @property string $name ФИО
 * @property string $biography Биография
 * @property int $year Год рождения
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $active
 * @author kotov
 */
class Person extends ActiveRecord
{
    use TimestampTrait;
    
}
