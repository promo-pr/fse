<?php

use yii\helpers\Html;
use promo\icons\Icon;
use promo\admin\AdminMenu;

/* @var $this \yii\web\View */
/* @var $content string */
?>

<?= AdminMenu::widget([
    'itemsLeft' => [
        ['label' => Icon::name('library_books') . ' Содержимое', 'items' => [
            ['label' => 'Страницы' . Html::a(Icon::name('add_circle_outline'), ['/admin/pages/default/create']), 'url' => ['/admin/pages/default/index']],
            ['label' => 'Новости'. Html::a(Icon::name('add_circle_outline'), ['/admin/posts/default/create']), 'url' => ['/admin/posts/default/index']],
            ['label' => 'Мероприятия'. Html::a(Icon::name('add_circle_outline'), ['/admin/events/default/create']), 'url' => ['/admin/events/default/index']],
        ]],
    ],
    'itemsRight' => [
        ['label' => '<i class="material-icons">build</i>', 'items' => [
            ['label' => '<i class="material-icons">cached</i> Очистить кэш', 'url' => ['/admin/default/flush'], 'linkOptions' => ['data-method' => 'post']],
        ]],
        ['label' => '<i class="material-icons">power_settings_new</i>', 'url' => ['/user/default/logout'], 'linkOptions' => ['data-method' => 'post']],
    ],
]) ?>


