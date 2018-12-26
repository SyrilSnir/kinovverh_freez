<?php
namespace app\kv\repositories\Films;


use app\models\ActiveRecord\Films;

/**
 * Description of FilmList
 *
 * @author kotov
 */
class FilmList
{
    /** @var string Название группы фильмов (категория) */
    protected $name;    
    /** @var Films[] */
    protected $films; 
    /** @var string Сообщение при отсутствии фильмов в данной категории */
    protected $filmNotFoundMessage;
    
    public function __construct( 
            array $films,
            $name = 'Default Name',
            $filmNotFoundMessage = 'Отсутствуют фильмы в данной категории')
    {
        $this->name = $name;
        $this->films = $films;
        $this->filmNotFoundMessage = $filmNotFoundMessage;
    }
    /**
     * 
     * @return string
     */
    public function getErrorMessage() 
    {
        return $this->filmNotFoundMessage;
    }
    /**
     * Вернуть название категории
     * @return string
     */
    public function getName() 
    {
        return $this->name;
    }

    /**
     * 
     * @return Films[]
     */
    public function getFilms() {
        return $this->films;
    }
}
