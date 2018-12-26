<?php

namespace app\kv\repositories;
use app\models\ActiveRecord\Genre;

/**
 * Description of GenreRepository
 *
 * @author kotov
 */
class GenreRepository
{
    public function getAll() 
   {
       return Genre::find()->limit(CATEGORIES_COUNT)->all();
   }
    public function getGenreByCode($code) 
    {
        if (!$category = Genre::findOne(['code' => $code])) {
           throw new NotFoundException('Не верный идентификатор категории');
       }
       return $category;
       
    }
}
