<?php

return [
    'components' => [
        'db' => [
            'dsn' => 'mysql:host=localhost;dbname=fse',
            'username' => 'root',
            'password' => '',
            'tablePrefix' => '',
            'enableSchemaCache' => false,
        ],
        'mailer' => [
            'useFileTransport' => true,
        ],
        'cache' => [
            'class' => 'yii\caching\DummyCache',
        ],
    ],
];
 