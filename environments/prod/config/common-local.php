<?php

return [
    'components' => [
        'db' => [
            'dsn' => 'mysql:host=localhost;dbname=fse',
            'username' => 'root',
            'password' => '',
            'tablePrefix' => '',
            'enableSchemaCache' => true,
        ],
        'mailer' => [],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
 