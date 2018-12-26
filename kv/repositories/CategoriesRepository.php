<?php

namespace app\kv\repositories;

use app\models\ActiveRecord\Category;
use app\kv\exceptions\NotFoundException;
/**
 * Description of CategoriesRepository
 *
 * @author kotov
 */
class CategoriesRepository
{
    /**
    * 
    * @param int $id
    * @return Film
    * @throws NotFoundException
    */
   public function get($id)
   {
       if (!$category = Category::findOne($id)) {
           throw new NotFoundException('Не верный идентификатор категории');
       }
       return $category;
   }
   public function getAll() 
   {
       return Category::find()->limit(CATEGORIES_COUNT)->all();
   }

   public function getCategoryByCode($code) 
    {
        if (!$category = Category::findOne(['code' => $code])) {
           throw new NotFoundException('Не верный идентификатор категории');
       }
       return $category;
       
    }
    
}
