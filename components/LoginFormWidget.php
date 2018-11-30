<?php

namespace app\components;

use yii\base\Widget;
use app\models\LoginForm;

class LoginFormWidget  extends Widget {
    
    public $model;
     
    public function init() {
        parent::init();
        if(empty($this->model)) {
            $this->model = new LoginForm();
        }
    }
    public function run() {

        return $this->render('login_form', [
            'model' => $this->model
        ]);
    }
    
}

