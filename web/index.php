<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');


require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

    $config = (YII_DEBUG) ? require __DIR__  . '/../config/web-debug.php' :
                            require __DIR__  . '/../config/web.php';
    
require __DIR__  . '/../config/functions.php';
require __DIR__  . '/../config/defines.inc.php';
/**
 * Настройка алиасов
 */    
Yii::setAlias('@views', dirname(__DIR__) . '/views');
Yii::setAlias('@module_admin_views', dirname(__DIR__) . '/modules/adminka/views');
//-----------------------------------------------------------------------
(new yii\web\Application($config))->run();
