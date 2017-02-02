<?php

$config = [
    'id' => 'my_app',
    'modules' => [
        'admin' => [
            'class' => 'app\modules\admin\Module',
            'layout' => '@app/themes/base/layouts/admin',
            'modules' => [
                'pages' => [
                    'class' => 'app\modules\page\Module',
                    'controllerNamespace' => 'app\modules\page\controllers\backend',
                    'viewPath' => '@app/modules/page/views/backend',
                ],
            ],
        ],
        'file' => [
            'class' => 'app\modules\file\Module',
        ],
        'page' => [
            'class' => 'app\modules\page\Module',
            'controllerNamespace' => 'app\modules\page\controllers\frontend',
            'viewPath' => '@app/modules/page/views/frontend',
        ],
        'site' => [
            'class' => 'app\modules\site\Module',
        ],
        'user' => [
            'class' => 'app\modules\user\Module',
        ],
    ],
    'components' => [
        'view' => [
            'theme' => [
                'basePath' => '@app/themes/base',
                'baseUrl' => '@web/themes/base',
                'pathMap' => [
                    '@app/views' => '@app/themes/base',
                    '@app/modules' => '@app/themes/base/modules',
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'app\modules\user\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/default/error',
        ],
        'request' => [
            'cookieValidationKey' => '',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
        ],
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = 'yii\gii\Module';
}

return $config;
