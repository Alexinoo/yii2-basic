<?php

namespace app\controllers;


// Naming conventions

// my-article/hello

// my-article => My-article => MyArticle => MyArticleController =>  app\controllers\MyArticleController

// Then an instance of the class is created and action is run


class MyArticleController extends \yii\web\Controller
{
    // create an inline action - prefix action is mandatory
    // hello-world => Hello-world => HelloWorld => actionHelloWorld
    // route with arguments my-article/hello-world?id=15
    // Add ?id=15

    // Multiple arguments
    //  Add ?id=15&message=Hello

    public function actionHelloWorld($id){
        echo "Hello world ".$id;
    }
    
    // // Default value 14 - If you don't pass the parameters 14 is picked
    // public function actionHelloWorld($id = 14){

    //     echo "Hello world ".$id;
    // }

}