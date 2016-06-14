<?php

$params = require(__DIR__ . '/params.php');
$configDB = array_merge(
    require(__DIR__ . '/db.php'),
    require(__DIR__ . '/db-local.php')
);

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'vendorPath'     => dirname(__DIR__) . '/components/core/vendor',
    //'controllerNamespace' => 'app\components\default\controllers',
    'modules' => [
        'main' => [
            'class' => 'app\components\main\Module',
        ],
        'test' => [
            'class' => 'app\components\test\Module',
        ],
    ],
    'components' => [
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true, // ЧПУ
            'showScriptName' => false, // Вывод ссылок без index.php
            'enableStrictParsing' => true, // убираем дубли ссылок
            'rules' => [
                '/' => 'main/frontend/default/index',

                '<_component:[\w\-]+>/<_controller:[\w\-]+>/<_action:[\w\-]+>' => '<_component>/frontend/<_controller>/<_action>',
                '<_zone:(admin|dev)>/<_component:[\w\-]+>/<_controller:[\w\-]+>/<_action:[\w\-]+>' => '<_component>/<_zone>/<_controller>/<_action>',
            ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'blB4ogwV-AUSdFZP5zugQNliF8uR_hyV',

            'baseUrl' => '',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'main/default/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $configDB,
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
