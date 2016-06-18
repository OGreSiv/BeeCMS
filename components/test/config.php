<?php
return [
    'components' => [
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'rules' => [
                [   // Правило для Controller/Action/ID без использования alias
                    'pattern' => '<controller:\w+>/<action:\w+>/<id:\w+>',
                    'route' => '<controller>/<action>',
                ],
            ],
        ],
        // список конфигураций компонентов
    ],
    'params' => [
        'contentPerPage' => 20,
        'OLOLOOO' => 123,
        'cache' => true
        // список параметров
    ],
];