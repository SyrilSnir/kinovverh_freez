<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use app\models\ActiveRecord\Films;
use app\models\ActiveRecord\Category;
use app\models\ActiveRecord\Genre;
use app\models\ActiveRecord\Occupation;
use app\models\ActiveRecord\Person;
use app\models\ActiveRecord\PersonOccupation;
use app\models\ActiveRecord\FilmPersonOccupation;
use app\models\ActiveRecord\FilmGenre;
use app\models\ActiveRecord\FilmComment;
use Yii;

/**
 * Description of AdminController
 *
 * @author kotov
 */
class AdminController extends Controller
{
     
    public function actionClearTables() {
        $prefix = Yii::$app->db->tablePrefix;
        $sql = 'TRUNCATE TABLE '.$prefix.'users;
                TRUNCATE TABLE '.$prefix.'film_person_occupation;
                TRUNCATE TABLE '.$prefix.'film_genre;
                TRUNCATE TABLE '.$prefix.'film_comment;
                TRUNCATE TABLE '.$prefix.'person_occupation;
                TRUNCATE TABLE '.$prefix.'occupation;
                TRUNCATE TABLE '.$prefix.'films;
                TRUNCATE TABLE '.$prefix.'person;
                TRUNCATE TABLE '.$prefix.'genre;
                TRUNCATE TABLE '.$prefix.'categories;';
        try {     
            $this->query($sql);
            echo "Tables cleared\n";
        } catch (Exception $ex) {
            echo "Request error\n";
        }        
        return ExitCode::OK;
    }
    public function actionDropTables() {
        $prefix = Yii::$app->db->tablePrefix;
        $sql = 'TRUNCATE TABLE '.$prefix.'migration;                
                DROP TABLE '.$prefix.'users;
                DROP TABLE '.$prefix.'categories;
                DROP TABLE '.$prefix.'film_person_occupation;
                DROP TABLE '.$prefix.'film_genre;
                DROP TABLE '.$prefix.'film_comment;
                DROP TABLE '.$prefix.'person_occupation;
                DROP TABLE '.$prefix.'films;
                DROP TABLE '.$prefix.'person;
                DROP TABLE '.$prefix.'genre;
                DROP TABLE '.$prefix.'occupation;';
                try {     
        $this->query($sql);
            echo "Tables dropped\n";
        } catch (Exception $ex) {
            echo "Request error\n";
        }      
        
        return ExitCode::OK;
    } 
    public function actionAddData() 
    {                   
                       
        $category = new Category();
        $category->id = 1;
        $category->name = '0+';
        $category->code = '0plus';
        $category->insert(false);
        unset ($category);
        
        $category = new Category();
        $category->id = 2;
        $category->name = '6+';
        $category->code = '6plus';
        $category->insert(false);
         unset ($category);
         
        $category = new Category();
        $category->id = 3;
        $category->name = '12+';
        $category->code = '12plus';
        $category->insert(false);
         unset ($category);
         
        $category = new Category();
        $category->id = 4;
        $category->name = '16+';
        $category->code = '16plus';
        $category->insert(false);
         unset ($category);
                
        $category = new Category();
        $category->id = 5;
        $category->name = '18+';
        $category->code = '18plus';
        $category->insert(false);
        unset ($category);
        
        $this->setFilms();
        $this->setOccupation();
        $this->setPerson();
        $this->setGenre();
        $this->setPersonOccupation();
        $this->setFilmPersonOccupation();
        $this->setFilmGenre();
        $this->setFilmComment();
        echo 'Data Added' . "\n";

        return ExitCode::OK;
    }
    protected function query($sql) {
        $link = Yii::$app->db;
        $link->open();
        $state = $link->createCommand($sql);
        return $state->query();
    }
    protected function setFilms() 
    {
        $filmsList = require 'fixture/film.php';
        foreach ($filmsList as $item) {
            $film = new Films();
            $film->setAttributes($item,false);
            $film->save(false);
            unset($film);
        }                
    }

    protected function setOccupation() 
    {
        $data = [
            'Режиссер',
            'Актер',
            'Сценарист',
            'Исполнитель'
        ];
        foreach ($data as $idx => $item) {
            $occupation = new Occupation();
            $occupation->id = $idx+1;
            $occupation->name = $item;
            $occupation->insert(false);
            unset($occupation);
        }            
    }
    protected function setPerson() 
    {
        $personList = require 'fixture/person.php';
        foreach ($personList as $item) {
            $person = new Person();
            $person->setAttributes($item,false);
            $person->save(false);
            unset($person);
        }
    }
    protected function setGenre() 
    {
        $genreList = require 'fixture/genre.php';
        foreach ($genreList as $item) {
            $genre = new Genre();
            $genre->setAttributes($item,false);
            $genre->save(false);
            unset($genre);
        }                
    }
    protected function setPersonOccupation() 
    {
        $personOccupationList = require 'fixture/person_occupation.php';
        foreach ($personOccupationList as $item) {
            $personOccupation = new PersonOccupation();
            $personOccupation->setAttributes($item,false);
            $personOccupation->save(false);
            unset($personOccupation);
        }                
    }
    protected function setFilmPersonOccupation() 
    {
        $filmPersonOccupationList = require 'fixture/film_person_occupation.php';
        foreach ($filmPersonOccupationList as $item) {
            $filmPersonOccupation = new FilmPersonOccupation();
            $filmPersonOccupation->setAttributes($item,false);
            $filmPersonOccupation->save(false);
            unset($filmPersonOccupation);
        }                
    }
    protected function setFilmGenre() 
    {
        $filmGenreList = require 'fixture/film_genre.php';
        foreach ($filmGenreList as $item) {
            $filmGenre = new FilmGenre();
            $filmGenre->setAttributes($item,false);
            $filmGenre->save(false);
            unset($filmGenre);
        }                
    }
    protected function setFilmComment() 
    {
        $filmCommentList = require 'fixture/film_comment.php';
        foreach ($filmCommentList as $item) {
            $filmComment = new FilmComment();
            $filmComment->setAttributes($item,false);
            $filmComment->save(false);
            unset($filmComment);
        }                
    }
    
}
