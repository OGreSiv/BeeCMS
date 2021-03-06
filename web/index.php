<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../libs/vendor/autoload.php');
require(__DIR__ . '/../libs/bee/Bee.php');
require(__DIR__ . '/../libs/bee/web/BeeApplication.php');

$config = require(__DIR__ . '/../config/web.php');

(new bee\web\BeeApplication($config))->run();