<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
//defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
//defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);


require_once($yii);
Yii::$classMap=array(
'UploadHandler' =>dirname(__FILE__).'/blue/server/php/UploadHandler.php',
//'jasPHP' => dirname(__FILE__).'protected/extensions/jasphp/JasPHP.php',
);
 
Yii::createWebApplication($config)->run();