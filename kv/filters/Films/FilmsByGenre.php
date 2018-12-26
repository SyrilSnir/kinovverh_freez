<?php

namespace app\kv\filters\Films;

use app\kv\filters\Films\FilmListFilterInterface;
use app\kv\repositories\FilmRepository;
use app\models\ActiveRecord\Genre;
use app\kv\exceptions\NotFoundException;
use app\kv\exceptions\TypeMissmatchException;
use app\kv\repositories\Films\FilmList;
/**
 * Description of FilmsByGenre
 *
 * @author kotov
 */
class FilmsByGenre implements FilmListFilterInterface
{
    /**
     *
     * @var array|Genre
     */
    protected $genre;
    
    /**
     * 
     * @param array|Genre $genre
     */
    public function __construct($genre)
    {
        if (is_array($genre)) {
            $this->genre = array();
            foreach ($genre as $element) {
                if (!$element instanceof Genre) {
                    throw new TypeMissmatchException();
                }
                $this->genre[] = $element;
            }
        } else {
            if (!$genre instanceof Genre) {
                throw new TypeMissmatchException();
            }
            $this->genre = $genre;   
        }  
    }
    /**
     * 
     * @param string $genreCode символьный код жанра
     * @return type
     */
    public function getAll()
    {
      
        if (!$this->genre) {
            throw new NotFoundException();
        }
        if (!is_array($this->genre)) {
            $filmRepository = new FilmRepository();
            $filmsList = $filmRepository->getFilmsByGenre($this->genre);
            return [new FilmList($filmsList,$genre->name)];  
        }
        $result = array();
        foreach ($this->genre as $genre) {
            $filmRepository = new FilmRepository();
            $filmsList = $filmRepository->getFilmsByGenre($genre);
            $result[] = new FilmList($filmsList,$genre->name);            
        }
        return $result;
        
    }

}
