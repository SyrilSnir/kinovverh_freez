<?php
namespace app\kv\services;

use app\kv\repositories\Films\FilmList;
use app\kv\filters\Films\FilmListFilterInterface;
use app\kv\helpers\ShowFilmListInterface;

/**
 * Description of FilmManager
 *
 * @author kotov
 */
class FilmManager
{
    /** @var FilmList[] Закешированный список фильмов */
    protected $filmsCache;
    
    /** @var FilmListFilterInterface  */
    protected $filmsFilter;
 
    /** @var ShowFilmListInterface  */
    protected $showFilmsHelper;


    public function __construct(FilmListFilterInterface $filmsFilter, ShowFilmListInterface $showFilmList)
    {
        $this->filmsFilter = $filmsFilter;
        $this->showFilmsHelper = $showFilmList;        
    }
    public function show()
    {
        if (empty($this->filmsCache)) {
            $this->filmsCache = $this->filmsFilter->getAll();
        }
        $this->showFilmsHelper->setFilmList($this->filmsCache);
        return $this->showFilmsHelper->show();
    }
}
