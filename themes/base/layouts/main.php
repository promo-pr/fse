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

<header id="Header">
    <div class="header-top">

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
    <div class="header-title">
        <div class="container">
            <?= isset($this->blocks['title']) ? "<h1>" . $this->blocks['title'] . "</h1>" : false ?>
        </div>
    </div>
</header>

<section id="Main">
    <?= $content ?>
</section>

<footer id="Footer" ondblclick="location.href = '<?= \yii\helpers\Url::to(['/user/default/login'])?>'">
    <div class="container">
        <p class="pull-left">&copy; <?= Yii::$app->name ?></p>
        <p class="pull-right"><?= date('Y') ?></p>
    </div>
</footer>

<div class="alert-container container">
    <?= Alert::widget() ?>
</div>

<?php $this->endContent(); ?>
