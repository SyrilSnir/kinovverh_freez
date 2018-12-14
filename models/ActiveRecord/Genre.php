<?php

namespace app\models\ActiveRecord;

use yii\db\ActiveRecord;
use Yii;
use app\kv\tools\Strings;
/**
 * Description of Genre
 * @property integer $id
 * @property string $name
 * @property string $code
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
    
}
