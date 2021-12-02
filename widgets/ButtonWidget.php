<?php 

namespace app\widgets;

class ButtonWidget extends \yii\base\Widget
{
    public $text;

     public function init()
    {
        parent::init();
    }

     public function run()
    {
         parent::run();
         return '<button>'.$this->text .'</button>';
    }

}