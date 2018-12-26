<?php

namespace app\kv\filters\Films;

use app\kv\repositories\Films\FilmList;
use app\models\ActiveRecord\Category;
use app\kv\repositories\FilmRepository;
use app\kv\filters\Films\FilmListFilterInterface;
use app\kv\exceptions\TypeMissmatchException;
/**
 * Description of FilmsByCategory
 *
 * @author kotov
 */
class FilmsByCategory implements FilmListFilterInterface
{
    /**
     *
     * @var Category|Category[]
     */
    protected $category; 
    
    /**
     * 
     * @param Category|array $category
     * @throws TypeMissmatchException
     */
    public function __construct($category)
    {
        if (is_array($category)) {
            $this->category = array();
            foreach ($category as $element) {
                if (!element instanceof Category) {
                    throw new TypeMissmatchException();
                }
                $this->category[] = $element;
            }
        } else {
            if (!$category instanceof Category) {
                throw new TypeMissmatchException();
            }
            $this->category = $category;   
        }        
    }

    public function getAll()
    {
        if (!$this->category) {
            throw new NotFoundException();
        }
        if (!is_array($this->category)) {
            $filmRepository = new FilmRepository();
            $filmsList = $filmRepository->getFilmsByCategory($this->category);
            return [new FilmList($filmsList,$this->category->name)];
        }
        $result = array();
        foreach ($this->category as $category) {
            $filmRepository = new FilmRepository();
            $filmsList = $filmRepository->getFilmsByCategory($category);
            $result[] = new FilmList($filmsList,$category->name);
        }
        return $result;
    }

}
