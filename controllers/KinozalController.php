<?php

namespace app\controllers;

use app\models\ActiveRecord\Films;
use app\models\Forms\CommentForm;
use app\models\ActiveRecord\FilmComment;
use Yii;
use app\models\ActiveRecord\Genre;
use app\kv\repositories\CategoriesRepository;
use app\kv\repositories\GenreRepository;
use app\kv\filters\Films\FilmsByGenre;
use app\kv\filters\Films\FilmsByCategory;
use app\kv\services\FilmManagerFactory;
use app\kv\helpers\ShowFilmListHelper;
/**
 * Description of KinozalController
 *
 * @author kotov
 */
class KinozalController extends BaseController
{
    /**
     * Показывать верхний блок для следующих action
     */
    protected $upBlockExist = [
        'panorama',
        'trailers'
    ];
    protected $viewParams = array();

    public function actionIndex()
    {
        return '';
    }
    public function actionView($slug,$action = 'view') 
    {
        $film = Yii::$app->view->params['findedElement'];        
        if (isset($film)) {
            $this->setParamsForView($film,$slug,$action);
            return $this->render('view', $this->viewParams);
            //return print_r(Yii::$app->view->params['findedElement'],true);
        }
     //   return print_r($slug,true);
        //return print_r($route,true);
    }
    public function actionSaveComment() 
    {        
        $commentForm = new CommentForm();
        if ($commentForm->load(Yii::$app->request->post())) {
            if (!Yii::$app->user->isGuest) {
                $user = Yii::$app->user->getIdentity();
                if (empty($user->first_name)) {
                    $commentForm->userName = $user->login;
                } else {
                    $commentForm->userName = $user->first_name;
                }                
            }
            if ($commentForm->validate()) {
                $filmComment = new FilmComment();
                $filmComment->setDataFromForm($commentForm);
                $filmComment->save();
                Yii::$app->session->setFlash('comment_saved','Комментарий сохранен. Он будет доступен после проверки модератором.');
                return $this->redirect('/kinozal/'.$commentForm->filmSlug.'/comment');
            }            
        }
       return 'camcel';
    }
    public function actionCategories($cat = '') 
    {     
        
        //$filmsList = [];
        if (!empty($cat)) {
            $genre = (new GenreRepository())->getGenreByCode($cat);
            $filmsManager = FilmManagerFactory::getFilmManager(new FilmsByGenre($genre),new ShowFilmListHelper());
            $showedCategories =  $filmsManager->show();
            return $this->render('categories',['showedCategories' => $showedCategories]);
        } else {
            $categoriesList = (new GenreRepository())->getAll();
            $filmsManager = FilmManagerFactory::getFilmManager(new FilmsByGenre($categoriesList),new ShowFilmListHelper());
            $showedCategories =  $filmsManager->show();
            return $this->render('categories',['showedCategories' => $showedCategories]);
            //return (print_r($categoriesList,true));
        }
    }
    public function actionZnak($znak = '') 
    {     
       // return $znak;
        //$filmsList = [];
        if (!empty($znak)) {        
            $category = (new CategoriesRepository())->getCategoryByCode($znak);
            $filmsManager = FilmManagerFactory::getFilmManager(new \app\kv\filters\Films\FilmsByCategory($category),new ShowFilmListHelper());
            $showedCategories =  $filmsManager->show();
            return $this->render('categories',['showedCategories' => $showedCategories]);
        }
    }
    
    
    protected function setParamsForView (Films $film,$slug,$action = 'view')
    {
        $showUpBlock = false;
        if (in_array($action, $this->upBlockExist)) {
            $showUpBlock = true;
        }
        $this->viewParams['tabsConfig']['view'] = $this->getFilmNavViewConfig($action);
        $this->viewParams['tabsConfig']['comment'] = $this->getFilmNavCommentsConfig($action);
        $this->viewParams['tabsConfig']['creators'] = $this->getFilmNavCreatorsConfig($action);         
        $this->viewParams['model'] = $film;
        $this->viewParams['action'] = $action;
        $this->viewParams['showUpBlock'] = $showUpBlock;
        $this->viewParams['slug'] = $slug;        
    }
    protected function getFilmNavViewConfig($action) 
    {
        $config = [];
        if (empty($action) || $action == 'view' ) {
            $config[] = 'active';
        }
        return implode(' ', $config);
        // раздел 
    }
    protected function getFilmNavCommentsConfig($action) 
    {
        $config = [];
        $film = Yii::$app->view->params['findedElement'];
        $comments = $film->availableComments;
        if (count($comments) > 0) {
            $this->viewParams['showComments'] = true;
            if ($action == 'comment' ) {
               $config[] = 'active';
            }
        } else {
            $config[] = 'film-tabs__hidden';
        }                        
        return implode(' ', $config);
        // раздел 
    }
    protected function getFilmNavCreatorsConfig($action) 
    {
        $config = [];
        if ($action == 'creators' ) {
            $config[] = 'active';
        }
        return implode(' ', $config);
        // раздел 
    }
    
}

