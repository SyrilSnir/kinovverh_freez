<?php

namespace app\controllers;

/**
 * Description of AboutController
 *
 * @author kotov
 */
class AboutController extends BaseController
{
    public function actionIndex() 
    {
        return $this->render('index');
    }
    public function actionConditions() 
    {
        return $this->render('conditions');
    }
    
}
