<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
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

    public function beforeAction($action)
    {
         echo'<pre>';
        var_dump("Controller before Action");
        echo'</pre>'; 
        // exit;
        return parent::beforeAction($action);
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        // Yii::$app->test->hello();
        // echo'<pre>';
        // var_dump(Yii::$app->test);
        // echo'</pre>'; 
        // exit;
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
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
    
    public function actionTest()
    {
        $test = new \app\models\TestModel();     
        
        // Shows all attributes of the TestModel
        echo '<pre>';
        var_dump($test->attributes());
        echo '</pre>';


        // Attribute Labels
        // Turns camel-case variable names into multiple words with the first letter in each word in upper case. 
         echo '<pre>';
        var_dump($test->getAttributeLabel('name'));
        var_dump($test->getAttributeLabel('surname'));
        var_dump($test->getAttributeLabel('myAge'));
        echo '</pre>';

        // We can assign values to the properties through
        
        // 1. ) Using object notation 
        $test->name ='John';

        // 2. ) Using brackets/array notation
        $test['surname'] ='Doe';
         $test->email ='john@example.com';
          $test->myAge = 18;

        
        // iterate over attributes and their values
        foreach( $test as $attr=>$value){
            echo $test->getAttributeLabel($attr). ' = ' . $value. '<br>';
        }
    }


    public function actionHello($message)
    {
        // second argument is an associative array []
        // Associative array is key - value pair 
        return $this->render('hello',[
            'message' => $message ,
        ]);
    }
}
