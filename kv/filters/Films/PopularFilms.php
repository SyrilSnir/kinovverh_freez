<?php

namespace app\kv\filters\Films;

use app\kv\filters\Films\FilmListFilterInterface;
use app\kv\repositories\FilmRepository;
use app\kv\repositories\Films\FilmList;
/**
 * Description of PopularFulms
 *
 * @author kotov
 */
class PopularFilms implements FilmListFilterInterface
{
    /**
    * return FilmList[]
     */
    public function getAll()
    {        
        $filmRepository = new FilmRepository();
        $filmsList = $filmRepository->getPopularFilms();
        return [new FilmList($filmsList,'Популярные фильмы')];                
    }

}