<?php 

namespace app\widgets;
use yii\helpers\HTML;

class BgWidget extends \yii\base\Widget
{
    public $bgColor = 'white';
     public function init()
    {
        parent::init();
        ob_start();
    }

     public function run()
    {
         parent::run();
         $output = ob_get_clean();

         return HTML::tag('div', $output ,[
             'style' => 'background-color : '.$this->bgColor,
         ]);
    }

}