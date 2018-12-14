<?php

namespace app\components;

use yii\base\Widget;
use app\kv\repositories\FilmRepository;

/**
 * Виджет, реализующий вывод популярных фильмов
 *
 * @author kotov
 */
class PopularFilmsWidget extends Widget
{
    public $filmsList;
    
    public function init() 
    {
        $filmsRepository = new FilmRepository();
        $this->filmsList = $filmsRepository->getPopularFilms();
    }

    public function run() 
    {
        return $this->render('popular_films',['filmsList' => $this->filmsList]);
    }
}
