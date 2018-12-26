<?php
namespace app\kv\services;

use app\kv\filters\Films\FilmListFilterInterface;
use app\kv\helpers\ShowFilmListHelper;
/**
 * Description of FilmManagerFactory
 *
 * @author kotov
 */
class FilmManagerFactory
{
    /**
     * 
     * @param FilmListFilterInterface $filter
     * @return \app\kv\services\FilmManager
     */
    public static function getFilmManager(FilmListFilterInterface $filter, ShowFilmListHelper $showHelper) 
    {
        return new FilmManager($filter, $showHelper);
        
    }
}
