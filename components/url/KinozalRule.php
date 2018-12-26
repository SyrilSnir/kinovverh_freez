<?php

namespace app\components\url;

use yii\web\UrlRuleInterface;
use yii\web\UrlManager;
use yii\web\Request;
use app\kv\tools\Url;
use app\kv\repositories\FilmRepository;
use Yii;

/**
 * Description of KinozalRule
 *
 * @author kotov
 */
class KinozalRule implements UrlRuleInterface
{
    
    public $prefix = 'kinozal';
    public $noneFilmCode = [
      'save-comment',
      'categories',
      'znak'
    ];
    
    public function createUrl($manager, $route, $params) 
    {
        $url = $route;
        foreach ($params as $name => $value) {
            $url .= "/$name/$value";
        }
        return $url;
    }
    /**
     * 
     * @param UrlManager $manager
     * @param Request $request
     */
    public function parseRequest($manager,$request) 
    {

        if(Url::getValFromURI(0,$request->pathInfo) != $this->prefix) {
            return false;
        }
        
        $filmCode = Url::getValFromURI(1,$request->pathInfo);
        if (empty($filmCode) || in_array($filmCode, $this->noneFilmCode)) {
            return false;
        }
        //return ['kinozal/view',['slug' => 'lkkol']];
       $filmRepository = new FilmRepository();
       
       $film = $filmRepository->getFilmByCode($filmCode);
       Yii::$app->view->params['findedElement'] = $film;
        if (!$film) {
            die('Not Found');
        }
        $params = ['slug' => $film->code];
        $action = Url::getValFromURI(2,$request->pathInfo);
        if (!empty($action)) {
            $params['action'] = $action;
        }
        return ['kinozal/view',$params];
       // var_dump($film);
        
        /* if (preg_match('#^' . $this->prefix . '/(.*[a-z])$#is', $request->pathInfo, $matches)) {
             var_dump($matches);
         }*/
     //   var_dump($request->pathInfo);
      //  var_dump($manager,$request);
        //die(); 
    }

}
