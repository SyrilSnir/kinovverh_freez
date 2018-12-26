<?php
namespace app\kv\helpers;

use app\kv\repositories\Films\FilmList;
use app\kv\exceptions\TypeMissmatchException;
use app\kv\exceptions\NotFoundException;
use Yii;
/**
 * Description of ShowFilmsHelper
 *
 * @author kotov
 */
class ShowFilmListHelper implements ShowFilmListInterface
{
    /** @var FilmList[] Список фильмов */
    protected $filmLists;
    
    /**
     * Вывод списка фильмов
     * @param bool $return
     * @return null|string
     */
    public function show($return = true)
    {
        if (empty($this->filmLists)) {
            throw new NotFoundException();
        }
        $result = Yii::$app->view->render('@views/blocks/film_list.php',['filmLists' => $this->filmLists]);
        if ($return) {
            return $result;
        }
        echo $result;
    }
   /**
    * ДОбавить упорядоченный список фильмов
    * @param FilmList[] $filmList
    * @throws TypeMissmatchException
    */
    public function setFilmList(array $filmLists)
    {
        foreach ($filmLists as $filmList ) {
            if (! $filmList instanceof FilmList) {
                throw new TypeMissmatchException();
            }
            $this->filmLists[] = $filmList;
        }
    }
    /**
     * Добавить категорию фильмов для вывода
     * @param FilmList $filmList
     */
    public function addFilmList(FilmList $filmList)
    {
        $this->filmLists[] = $filmList;
    }

}
