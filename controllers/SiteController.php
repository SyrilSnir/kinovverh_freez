<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;
use app\models\RegisterForm;
use app\models\ActiveRecord\Films;
use app\models\ActiveRecord\Znak;

class SiteController extends BaseController
{
    
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

  
    
    

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        return 'logout';
        //Yii::$app->user->logout();

        //return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }    

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    public function actionEntry()
    {
        $model = new EntryForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->render('entry-confirm',['model' => $model]);
        } else {
            return $this->render('entry',['model' => $model]);
        }
    }
    public function actionTest() {
       
        $film = new Films();
        $film->id = 1;
        $film->name = 'Я верю в тебя';
        $film->year = 2017;
        $film->znak_id = 2;
        $film->preview_text = 'Как важно, чтобы в тебя верили! Лёшенька приехал в лагерь, но он чувствует себя совершенно одиноким и беспомощным, несмотря на дедушку, который работает здесь же столяром и дворником. Вожатая говорит, что Лёшенька должен участвовать в Зарнице. Лёшенька покорно принимает это «наказание», но вдруг рядом с ним оказывается Катя, благодаря которой мальчик меняется и совершает подвиг… ';
        $film->insert(false);
        unset ($film);
       
        $film = new Films();
        $film->id = 2;
        $film->name = 'Сказ о Петре и Февронии';
        $film->year = 2017;
        $film->znak_id = 2;
        $film->preview_text = '';
        $film->insert(false);
        unset ($film);
        
        $znak = new Znak();
        $znak->id = 1;
        $znak->name = '0+';
        $znak->code = '0plus';
        $znak->insert(false);
        unset ($znak);
        
        $znak = new Znak();
        $znak->id = 2;
        $znak->name = '6+';
        $znak->code = '6plus';
        $znak->insert(false);
         unset ($znak);
         
        $znak = new Znak();
        $znak->id = 3;
        $znak->name = '12+';
        $znak->code = '12plus';
        $znak->insert(false);
         unset ($znak);
         
        $znak = new Znak();
        $znak->id = 4;
        $znak->name = '16+';
        $znak->code = '16plus';
        $znak->insert(false);
         unset ($znak);
                
        $znak = new Znak();
        $znak->id = 5;
        $znak->name = '18+';
        $znak->code = '18plus';
        $znak->insert(false);
         unset ($znak);
         
        return $this->render('index');
    }

    
}
