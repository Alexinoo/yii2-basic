<?php

use app\assets\AppAsset;

/** @var $content string */
/** @var  \yii\web\View  $this*/
?>

<!-- Inherit from cmmon.php layout -->
<?php  $this->beginContent('@app/views/layouts/common.php')?>
      <header>
        Header Goes here
    </header>
    
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <?php echo $content ?>
                </div>

                <div class="col-sm-3">
                    <ul class="list-group">
                        <li class="list-group-item">Item 1</li>
                        <li class="list-group-item">Item 2</li>
                        <li class="list-group-item">Item 3</li>
                    </ul>
                </div>
            </div>
        </div>

        <footer>
              Footer Goes here
        </footer>

        <?php  $this->endContent()?>