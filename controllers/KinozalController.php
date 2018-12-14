<?php

namespace app\controllers;


use Yii;
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
        $showUpBlock = false;
        if (in_array($action, $this->upBlockExist)) {
            $showUpBlock = true;
        }
        if (isset($film)) {
            $this->viewParams['tabsConfig']['view'] = $this->getFilmNavViewConfig($action);
            $this->viewParams['tabsConfig']['comment'] = $this->getFilmNavCommentsConfig($action);
            $this->viewParams['tabsConfig']['creators'] = $this->getFilmNavCreatorsConfig($action);         
            $this->viewParams['model'] = $film;
            $this->viewParams['action'] = $action;
            $this->viewParams['showUpBlock'] = $showUpBlock;
            $this->viewParams['slug'] = $slug;
            return $this->render('view', $this->viewParams);
            //return print_r(Yii::$app->view->params['findedElement'],true);
        }
        return print_r($slug,true);
        //return print_r($route,true);
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
