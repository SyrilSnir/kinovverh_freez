<?php
namespace app\kv\filters\Films;

use app\kv\repositories\Films\FilmList;
/**
 *
 * @author kotov
 */
interface FilmListFilterInterface
{
    /**
     * return FilmList
     */
    public function getAll();
    
}
