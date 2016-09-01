<?php

$params = require(__DIR__ . '/params.php');
$configDB = array_merge(
    require(__DIR__ . '/db.php'),
    require(__DIR__ . '/db-local.php')
);

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'charset' => 'utf-8',
//    'sourceLanguage' => 'en-EN', // основной язык системы
//    'language' => 'ru-RU', // язык перевода
    'timeZone' => 'Europe/Kiev',
    'bootstrap' => [
        'log',
    ],
    'vendorPath'     => dirname(__DIR__) . '/libs/vendor',
    //'controllerNamespace' => 'components\default\controllers',
    'modules' => [
        'test' => [
            'class' => 'components\test\Module',
        ],
        'main' => [
            'class' => 'components\main\Module',
        ],
        'template' => [
            'class' => 'components\template\Module',
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

        'view' => [
            'class' => 'bee\view\View',
            //'theme' => [
            //    'pathMap' => [
            //        '@app/views' => '@tmpl/base',
            //        '@app/modules' => '@tmpl/base',
            //        '@app/widgets' => '@tmpl/base',
            //        '@app/components' => '@tmpl/base'
            //    ],
            //    'baseUrl' => '@tmpl',
            //    'basePath' => '@tmpl',
            //],
        ],
        'i18n' => [
            'translations' => [
                'libs/bee/*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'forceTranslation' => true,
                    'basePath' => '@app/libs/bee/messages',
                    'fileMap' => [
                        'libs/bee/messages/bee' => 'bee.php',
                        'libs/bee/messages/language' => 'language.php',
                    ],
                    'on missingTranslation' => ['bee\language\TranslationEventHandler', 'handleMissingTranslation'],
                ],
            ],
        ],

        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
            'loginUrl' => ['main/frontend/default/login']
        ],
        'errorHandler' => [
            'errorAction' => 'main/frontend/default/error',
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

        /**
         * Собствнное приложение для вывода IP пользователя
         */
        'ReadHttpHeader' => [
            'class' => 'bee\components\ReadHttpHeader\ReadHttpHeaderComponent'
        ],
        'XmlParser' => [
            'class' => 'bee\components\XmlParser\XmlParserComponent'
        ],
    ],
    'aliases' => [
        '@components' => dirname(__DIR__) . '/components',
        '@bee' => dirname(__DIR__) . '/libs/bee',
        '@tmpl' => dirname(__DIR__) . '/templates',
        '@assets' => dirname(__DIR__) . '/assets',
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // force copy assets for every refresh of the page
    $config['components']['assetManager']['forceCopy'] = true;
    $config['components']['assetManager']['appendTimestamp'] = true;

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
