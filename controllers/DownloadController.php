<?php

namespace app\controllers;

use app\kv\repositories\FilmRepository;
/**
 * Description of DownloadController
 *
 * @author kotov
 */
class DownloadController extends BaseController
{
    public function actionIndex($film) 
    {
        $filmRepository = new FilmRepository();
        $film = $filmRepository->getFilmByCode($film);
        header("X-Sendfile: /files/films/Alice.mp4");
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"Alice.mp4\"");
        die();
        //return $film->name;
    }
    
}
