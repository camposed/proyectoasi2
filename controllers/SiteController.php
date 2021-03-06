<?php

namespace app\controllers;


use Yii;
use app\models\LoginForm;
use app\models\ContactForm;
use util\Log;
use util\Acf;


class SiteController extends BaseController
{

    /**
     * @inheritdoc
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
        $this->layout = 'login';
        return $this->render('login');
    }

    public function actionMain()
    {
        return $this->render('main');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        /*if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
        	Log::log(Log::LOGIN);
            return $this->goBack();
        }*/
        
//return $this->render('index');
        //return $this->goHome();
        $this->layout = 'login';
        return $this->render('login');
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {	
    	Log::log(Log::LOGOUT);
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
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
    
    
    function defineRules(){
    }
    
    function chekAuthRules($action,$rule){
    	
    }
    
}
