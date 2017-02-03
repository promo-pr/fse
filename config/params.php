<?php

return [
    'adminEmail' => '',
    'itemsMenu' => [
        ['label' => 'О СОЮЗЕ',
            'items' => [
                ['label' => 'О нас', 'url' => ['/page/node/view', 'slug'=>'about']],
                ['label' => 'Органы управления', 'url' => ['/page/node/view', 'slug'=>'control']],
            ],
        ],
        ['label' => 'УСЛУГИ',
            'items' => [
                ['label' => 'Финансово-экономическая экспертиза', 'url' => ['/page/node/view', 'slug'=>'service']],
                ['label' => 'Строительно-техническая экспертиза', 'url' => ['/page/node/view', 'slug'=>'service']],
                ['label' => 'Стоимостная экспертиза', 'url' => ['/page/node/view', 'slug'=>'service']],
                ['label' => 'Правовая экспертиза', 'url' => ['/page/node/view', 'slug'=>'service']],
            ],
        ],
        ['label' => 'ДОКУМЕНТЫ',
            'items' => [
                ['label' => 'Библиотека', 'url' => ['/page/node/view', 'slug'=>'docs']],
                ['label' => 'Документы общества', 'url' => ['/page/node/view', 'slug'=>'docs']],
                ['label' => 'Федеральные нормативные акты', 'url' => ['/page/node/view', 'slug'=>'docs']],
            ],
        ],
        ['label' => 'КОНТАКТЫ', 'url' => ['/site/contact/index']],
    ],
];
