<?php

return [
  'adminEmail' => '',
  'itemsMenu' => [
    ['label' => 'О СОЮЗЕ',
      'items' => [
        ['label' => 'Основы деятельности', 'url' => ['/page/node/view', 'category_slug'=>'about', 'slug'=>'o_sojuze']],
        ['label' => 'Органы управления', 'url' => ['/page/node/view', 'category_slug'=>'about', 'slug'=>'control']],
      ],
    ],
    ['label' => 'ДОКУМЕНТЫ',
      'items' => [
        ['label' => 'Библиотека', 'url' => ['/page/node/view', 'category_slug'=>'docs', 'slug'=>'library']],
        ['label' => 'Документы союза', 'url' => ['/page/node/view', 'category_slug'=>'docs', 'slug'=>'main']],
        ['label' => 'Федеральные нормативные акты', 'url' => ['/page/node/view', 'category_slug'=>'docs', 'slug'=>'regulation']],
      ],
    ],
    ['label' => 'ЭКСПЕРТИЗА',
      'items' => [
        ['label' => 'Финансово-экономическая', 'url' => ['/page/node/view', 'category_slug'=>'service']],
        ['label' => 'Строительно-техническая', 'url' => ['/page/node/view', 'category_slug'=>'service']],
        ['label' => 'Стоимостная', 'url' => ['/page/node/view', 'slug'=>'category_service']],
        ['label' => 'Правовая', 'url' => ['/page/node/view', 'slug'=>'category_service']],
      ],
    ],
    ['label' => 'МЕРОПРИЯТИЯ', 'url' => ['/site/default/event']],
    ['label' => 'ЧЛЕНСТВО В СОЮЗЕ', 'url' => ['/page/node/category', 'category_slug'=>'join']],
    ['label' => 'КОНТАКТЫ', 'url' => ['/site/contact/index']],
  ],
];
