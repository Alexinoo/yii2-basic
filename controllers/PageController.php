<?php
namespace app\controllers;

class PageController extends \yii\web\Controller{

    public function actionAbout(){

        // return $this->renderContent('<h1>Hello World</h1>'); // renders whole content in html

        // return $this->renderPartial('about'); // renders without layout

        // return $this->renderAjax('about'); 
        // renders when the request or the current action is  made using Ajax - 
        //Renders without layout but able to register css/js files ..

          return $this->render('about');
    }
}