<?php

namespace app\controllers;

use app\models\Forms\LoginForm;
use app\models\Forms\RegisterForm;
use app\models\UserIdentity;
use app\models\User;
use \Yii;
use yii\web\NotFoundHttpException;
use app\kv\exceptions\DefaultException;
use app\kv\tools\Messages;

class UserController extends BaseController
{ 
    
    public function init() {
        parent::init();
        $this->viewPath = '@app/views/site';
    }

    /**
     * Форма авторизации
     * @var LoginForm
     */
    protected $loginForm; 
    /**
     * Форма регистрации
     * @var Register
     */
    protected $registerForm; 


    /**
     * Авторизация
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        $this->loginForm = new LoginForm();
        if (Yii::$app->request->isPost) {
            return $this->actionLoginPost();
        }
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        
        /*
        return $this->render('index', [
            'model' => $model,
        ]);*/
    }    
    protected function actionLoginPost() {
        if ($this->loginForm->load(Yii::$app->request->post())) {
            if ($this->loginForm->validate()) {
                $this->loginForm->login();
                return $this->redirect('/');
            }           
        }        
        Yii::$app->view->params['showLoginForm'] = true; // показать форму входа
        Yii::$app->view->params['LoginFormModel'] = $this->loginForm; // модель для формы ввода
        return $this->render('index');
    }
    
    public function actionRegister () {
        $this->registerForm = new RegisterForm();
        if (Yii::$app->request->isPost) {
            return $this->actionRegisterPost();
        }
            
     //   if ($model->load(Yii::$app->request->post())) {
          /*  if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }*/        
      //  Yii::$app->view->params['model']= $model;
     //   return $this->render('index', [
          //  'model' => $model,
     //   ]);
    }
    public function actionRegisterPost () {
        if ($this->registerForm->load(Yii::$app->request->post())) {
            if ($this->registerForm->validate()) {
                $userRecord = new UserIdentity();
                $userRecord->setUserRegistrationForm($this->registerForm);
                $userRecord->save();
                Yii::$app->getUser()->login($userRecord);
                return  $this->redirect("/");
                
            }
        }
        Yii::$app->view->params['showRegisterForm'] = true; // показать форму регистрации
        Yii::$app->view->params['RegisterFormModel'] = $this->registerForm; // модель для формы ввода
        return $this->render('index');
    }
    
    public function actionLogout() {
        Yii::$app->user->logout();
        return $this->redirect("/");
    }
    /**
     * Личный кабинет пользователя
     * @return string
     */
    public function actionLk() {        
        return $this->render('lk');
    }
    public function actionSave() {
        if (Yii::$app->user->isGuest || !Yii::$app->request->isAjax) {
            return 'error';
        }
        $model = $this->findModel(Yii::$app->user->id);
        $dataToSave = Yii::$app->request->post();
        
        if (key_exists('name', $dataToSave) && key_exists('value', $dataToSave)) {
            if ($model->hasProperty($dataToSave['name'])) {
                if ($dataToSave['name'] !== 'password_hash') {
                    $model->setAttribute($dataToSave['name'], $dataToSave['value']);
                } else {
                    $passHash = Yii::$app->security->generatePasswordHash($dataToSave['value']); 
                    $model->bitrix_user = 0;
                    $model->setAttribute($dataToSave['name'], $passHash);
                }
                $model->save();                
                return Messages::getMessage('Данные успешно сохранены');
            }
            throw new DefaultException('RequestError','Ошибка в параметрах запроса');
            
        }        
    }
      /**
     * Finds the Monstertest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }    
    
}
