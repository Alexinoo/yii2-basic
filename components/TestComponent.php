<?php
namespace app\components;

class TestComponent extends \yii\base\Component
 {
     public $age = 18;

    public function __construct($config = []){

        echo'<pre>';
        var_dump("1111");
        echo'</pre>';
        parent::__construct($config);
    }

    public function Hello(){

        echo'<pre>';
        var_dump("Hello From Test component");
        echo'</pre>';
    }

}