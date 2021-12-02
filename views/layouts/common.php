<?php

use app\assets\AppAsset;

/** @var $content string */
/** @var  \yii\web\View  $this*/

AppAsset::register($this);
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php $this->registerCsrfMetaTags()?> 
    <title>Document</title>
    <?php $this->head()?>
</head>
<body>  
    <?php $this->beginBody()?>
            <?php echo $content ?>
    <?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>