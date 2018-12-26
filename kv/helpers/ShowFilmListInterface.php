<?php
namespace app\kv\helpers;

use app\kv\repositories\Films\FilmList;
/**
 *
 * @author kotov
 */
interface ShowFilmListInterface
{    
    public function show();    
    public function addFilmList(FilmList $filmList);
    public function setFilmList(array $filmList);
}
