<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();

//echo phpinfo();


//require(__DIR__ . '/../vendor/autoload.php');
//
////if (is_file(__DIR__ . '/../.env')) {
////    $dotEnv = Dotenv\Dotenv::create(__DIR__ . '/../', '.env');
////    $dotEnv->load();
////}
//
//// Comment out the following two lines when deployed to production
//defined('YII_DEBUG') or define('YII_DEBUG', env('YII_DEBUG', false));
//defined('YII_ENV') or define('YII_ENV', env('YII_ENV', 'prod'));
//
//require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';
//
//// Vault secret loading
//\KebaCorp\VaultSecret\VaultSecret::load('/secrets/secrets.json', ['saveTemplate' => false]);
//
//$config = require __DIR__ . '/../config/web.php';
//
//(new yii\web\Application($config))->run();
