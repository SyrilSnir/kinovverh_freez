<?php

namespace app\kv\repositories;

use app\models\ActiveRecord\Films;

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
   public function getPopularFilms() {
       return Films::find()->orderBy('shows')->all();
   }
   /**
    * 
    * @param type $code
    * @return type
    */
   public function getFilmByCode ($code) {
       if (!$film = Films::findOne(['code' => $code])) {
           throw new NotFoundException('Фильм не найден');
       }
       return $film;
   }
}
