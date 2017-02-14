<?php

use yii\helpers\ArrayHelper;

$params = ArrayHelper::merge(
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
//1
return [
    'name' => 'FSE',
    'language' => 'ru_RU',
    'timeZone' => 'Europe/Moscow',
    'basePath' => dirname(__DIR__),
    'components' => [
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'normalizer' => [
                'class' => 'yii\web\UrlNormalizer',
            ],
            'rules' => [
                [
                    'class' => 'yii\web\GroupUrlRule',
                    'prefix' => 'admin',
                    'routePrefix' => 'admin',
                    'rules' => [
                        '' => 'default/index',
                        '<_a:(flush)>' => 'default/<_a>',
                        '<_m>/create' => '<_m>s/default/create',
                        '<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>' => '<_m>/<_c>/view',
                        '<_m:[\w\-]+>/<id:\d+>/<_a:[\w\-]+>' => '<_m>/default/<_a>',
                        '<_m:[\w\-]+>/<_c:[\w\-]+>/<id:\d+>/<_a:[\w\-]+>' => '<_m>/<_c>/<_a>',
                        '<_m:[\w\-]+>' => '<_m>/default/index',
                        '<_m:[\w\-]+>/<_c:[\w\-]+>' => '<_m>/<_c>/index',
                    ],
                ],
                '' => 'site/default/index',
                'contact' => 'site/contact/index',
                '<_a:(error|search)>' => 'site/default/<_a>',
                '<_a:(login|logout|signup|email-confirm|password-reset-request|password-reset)>' => 'user/default/<_a>',
                '<category_slug:[\w\-]+>' => 'page/node/category',
                '<category_slug:[\w\-]+>/<slug:[\w\-]+>' => 'page/node/view',
                '<_m:[\w\-]+>/<_a:[\w-]+>' => '<_m>/default/<_a>',
                '<_m:[\w\-]+>/<_c:[\w\-]+>/<_a:[\w-]+>' => '<_m>/<_c>/<_a>',
            ],
        ],
        'formatter' => [
            'dateFormat' => 'dd.MM.yyyy',
            'timeFormat' => 'HH:mm:ss',
            'datetimeFormat' => 'HH:mm - dd.MM.yyyy',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
        ],
        'log' => [
            'class' => 'yii\log\Dispatcher',
        ],
    ],
    'params' => $params,
];