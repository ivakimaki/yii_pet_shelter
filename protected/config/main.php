<?php
Yii::setPathOfAlias('components', dirname(__FILE__) . '/../components');

header('Content-Type: text/html; charset=utf-8');

return [
    'timeZone'=>'Europe/Moscow',
    'sourceLanguage' => 'en',
    'language' => 'ru',
    'defaultController' => 'shelter',
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Pet Shelter',
    'layout'=>'main',
    'preload' => ['log'],

    'import' => [
        'application.models.*',
    ],
    'components' => [
        'format' => [
            'datetimeFormat' => 'd.m.Y H:i'
        ],
        'urlManager' => [
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<id:\d+>/<extraParam:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
        'db' => [
            'connectionString' => 'sqlite:pet_shelter.sqlite',
        ],
		'log' => [
            'class' => 'CLogRouter',
            'routes' => [
                [
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ],
            ],
        ],
    ],

];