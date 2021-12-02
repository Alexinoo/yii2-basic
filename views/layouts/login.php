<?php

use app\assets\AppAsset;

/** @var $content string */
/** @var  \yii\web\View  $this*/
?>

<!-- Inherit from cmmon.php layout -->
<?php  $this->beginContent('@app/views/layouts/common.php')?>
        <div class="container">
            <?php echo $content ?>
        </div>
<?php  $this->endContent()?>