<?php

use promo\widgets\Alert;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\SiteAsset;


/* @var $this \yii\web\View */
/* @var $content string */

SiteAsset::register($this);
$this->registerLinkTag(['rel' => 'canonical', 'href' => Url::canonical()]);
?>
<?php $this->beginContent('@app/themes/layout.php'); ?>

<header id="header">
    <div class="header-top">
        <div class="container">
            <ul class="nav nav-front">
                    <li>
                        <i class="material-icons">phone_iphone</i> <span class="hidden-xs hidden-sm"> +7 495 226 63 39,</span> +7 916 238 08 00
                    </li>
                    <li class="xs-right">
                        <i class="material-icons">email</i> finsudexpert@mail.ru
                    </li>
                    <li class="hidden-xs">
                        <i class="material-icons">place</i> 121170, Москва, ул. Генерала Ермолова, д.2
                    </li>
            </ul>
        </div>
    </div>

    <div class="header-title">
        <div class="container">
            <?= isset($this->blocks['title']) ? "<h1>" . $this->blocks['title'] . "</h1>" : false ?>
        </div>
    </div>
    <div class="header-nav">
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-default',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'encodeLabels' => false,
            'activateParents' => true,
            'items' => array_filter([
                ['label' => 'Главная', 'url' => ['/site/default/index']],
                ['label' => 'Контакты', 'url' => ['/site/contact/index']],
            ]),
        ]);
        NavBar::end();
        ?>
    </div>
</header>

<section id="main">
    <?= $content ?>
</section>

<footer id="footer" ondblclick="location.href = '<?= \yii\helpers\Url::to(['/user/default/login'])?>'">
    <div class="container">
        <p class="pull-left">&copy; <?= Yii::$app->name ?></p>
        <p class="pull-right"><?= date('Y') ?></p>
    </div>
</footer>

<div class="alert-container container">
    <?= Alert::widget() ?>
</div>

<?php $this->endContent(); ?>
