<?php

namespace app\modules\adminka\controllers;

use yii\web\Controller;
/**
 * Description of MainController
 *
 * @author kotov
 */
class MainController extends Controller
{
    public function init() {
        parent::init();
        $this->setViewPath('@module_admin_views/default');
    }

   public function actionTest() {
       // return 'Админка';
        return 'test';
    }
    public function actionIndex() {
       return 'Админка';
    }
}
