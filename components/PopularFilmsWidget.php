<?php

namespace app\components;

use yii\base\Widget;
use app\kv\helpers\ShowFilmListHelper;
use app\kv\services\FilmManager;
use app\kv\services\FilmManagerFactory;
use app\kv\filters\Films\PopularFilms;


/**
 * Виджет, реализующий вывод популярных фильмов
 *
 * @author kotov
 */
class PopularFilmsWidget extends Widget
{
    /**     
     * @var FilmManager
     */
    public $filmsManager;
    
    public function init() 
    {
        $this->filmsManager = FilmManagerFactory::getFilmManager(new PopularFilms(),new ShowFilmListHelper());        
    }

    public function run() 
    {
        return $this->filmsManager->show();
        //return $this->render('popular_films',['filmsList' => $this->filmsList]);
    }
}
