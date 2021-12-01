<?php
/**
 *   Means variable $this is an instance of \yii\web\View
 * @var \yii\web\View $this
 * 
 */

$this->title =' About Us';

$this->registerMetaTag(['name' => 'keywords' , 'content' => 'yii2']);

?>

<h1>  Page Controller's footer..</h1>

<div >
    <?php echo  Yii::$app->view->params['sharedVariable'] ;?>
</div>

