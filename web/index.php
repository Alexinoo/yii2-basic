<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();

// Define Aliases

Yii::setAlias('@home','/home/thecodeholic/public_html');
Yii::setAlias('@domain','http://yii2-basic.test');

// sub aliases
Yii::setAlias('@test','/something/test');
Yii::setAlias('@test/test2','/something/test/test2');


// Get Aliases
Yii::getAlias('@home');
Yii::getAlias('@domain');