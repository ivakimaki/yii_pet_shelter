<?php
$yii=dirname(__FILE__).'/protected/vendor/yiisoft/yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';
//
//if (APPLICATION_ENV == 'develop'){
    defined('YII_DEBUG') or define('YII_DEBUG',true);
    defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
//}

header('Con');

require_once($yii);
Yii::createWebApplication($config)->run();
