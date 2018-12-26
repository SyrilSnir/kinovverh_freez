<?php

namespace app\kv\repositories;

use app\models\ActiveRecord\Films;
use app\kv\exceptions\NotFoundException;
use app\models\ActiveRecord\Genre;
use app\models\ActiveRecord\Category;

/**
 * Description of FilmRepository
 *
 * @author kotov
 */
class FilmRepository 
{    
   /**
    * 
    * @param int $id
    * @return Film
    * @throws NotFoundException
    */
   public function get($id)
   {
       if (!$film = Films::findOne($id)) {
           throw new NotFoundException('Фильм не найден');
       }
       return $film;
   }
   /**
    * Вернуть популярные фильмы
    * @return Film[]
    */
   public function getPopularFilms() {
       return Films::find()->orderBy('shows')->all();
   }
   /**
   * Вернуть фильм по их жанру
   * @string $genre жанр
   * @return Film[]
    */
   public function getFilmsByGenre(Genre $genre) 
   {
       return $genre->films;                  
   }
   /**
    * Вернуть фильи по возрастной категории
    * @param Category $category возрастная категория
    */
   public function getFilmsByCategory(Category $category) {
       return Films::find()->where(['category_id' => $category->id ])->all();
   }

   /**
    * 
    * @param type $code
    * @return Films
    */
   public function getFilmByCode ($code) {
       if (!$film = Films::findOne(['code' => $code])) {
           throw new NotFoundException('Фильм не найден');
       }
       return $film;
   }
}
