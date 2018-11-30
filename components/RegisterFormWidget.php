<?php

namespace app\components;

use yii\base\Widget;
use app\models\RegisterForm;

class RegisterFormWidget  extends Widget {
    
    public $model;
    
    public function init() {
        parent::init();
        if(empty($this->model)) {
            $this->model = new RegisterForm();
        }
    }

        public function run() {

        return $this->render('register_form', [
            'model' => $this->model,
        ]);
    }
    
}
