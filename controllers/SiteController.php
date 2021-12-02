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
    // public $layout = 'base';

    public $enableCsrfValidation = false;
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

    // public function beforeAction($action)
    // {
    //      echo'<pre>';
    //     var_dump("Controller before Action");
    //     echo'</pre>'; 
    //     // exit;
    //     return parent::beforeAction($action);
    // }

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


        // Create an instance of Timeline component
        // $timeline = Yii::createObject([
        //     'class' => \app\components\TimelineComponent::class ,
        //     'numberOfEvent' => 20 ,
        //     'visibility' => 'public' ,
        //     'on addNewEvent' => function(){

        //     }
        // ]);

        // echo'<pre>';
        // var_dump($timeline);
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
        $this->layout = 'login';
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
        
        // 1. ) Using object notation /brackets/array notation
        $test->name ='John';
        $test['surname'] ='Doe';
        $test->email ='john@example.com';
        $test->myAge = 18;

        
        // iterate over attributes and their values
        foreach( $test as $attr=>$value){
            echo $test->getAttributeLabel($attr). ' = ' . $value. '<br>';
        }

        // Validate rules

        if( $test->validate()){
            echo "OK";
        }else{
               echo '<pre>';
                var_dump($test->errors);
                echo '</pre>';
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

    public function actionRequest()
    {

     $request =   Yii::$app->request;

     $data =  $request->post(); // same as $_GET[' ']
    echo '<pre>';
    var_dump($data);//gets data appended in the URL
    echo '</pre>';

    // check if the data was sent through Post or Get
    $isGet = $request->isGet;
    $isPost = $request->isPost;

     // check host Information
    $host = $request->hostInfo;
    echo '<pre>';
    var_dump($host);//gets data appended in the URL
    echo '</pre>';

     // check path info
    $path = $request->pathInfo;
    echo '<pre>';
    var_dump($path);//gets data appended in the URL
    echo '</pre>';


//    Use PUT / PATCH /DELETE
    echo '<pre>';
    var_dump($request->getBodyParams());//gets data appended in the URL
    echo '</pre>';

//    Check headers
    echo '<pre>';
    var_dump($request->headers);//gets data appended in the URL
    echo '</pre>';

//    Current user IP
    echo '<pre>';
    var_dump($request->userIP);//gets data appended in the URL
    echo '</pre>';

//    Current user IP
    echo '<pre>';
    var_dump($_SERVER['REMOTE_ADDR']);//gets data appended in the URL
    echo '</pre>';
   
    }
    
    public function actionResponse()
    {
         $response =   Yii::$app->response;
        // Works as well
        // $response->content = "Hello from Thecodeholic";

        $response->format =\yii\web\Response::FORMAT_JSON;
        
        return [
            'name' => 'Alex',
            'surname' => 'Something'
        ];
    }

}
