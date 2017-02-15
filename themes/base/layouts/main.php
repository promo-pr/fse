<?php

use app\widgets\Alert;
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
    <div class="header-top" data-spy="affix" data-offset-top="100">
        <div class="container">
            <ul class="nav nav-front <?= $front ? 'text-center' : ''?>">
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
            <?= isset($this->blocks['title']) ?
                "<div class='header-title-h1'><div class='to-front'></div><span>СОЮЗ ФИНАНСОВО-ЭКОНОМИЧЕСКИХ СУДЕБНЫХ ЭКСПЕРТОВ</span><h1>" . $this->blocks['title'] . "</h1></div>" :
                "<div class='header-logo-front'><span>СОЮЗ<br>ФИНАНСОВО-ЭКОНОМИЧЕСКИХ<br>СУДЕБНЫХ ЭКСПЕРТОВ</span></div>"
            ?>
        </div>
    </div>
    <div class="header-nav hidden-lg">
        <?php
        NavBar::begin([
            'options' => [
                'class' => 'navbar-inverse',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav'],
            'encodeLabels' => false,
            'activateParents' => true,
            'items' => Yii::$app->params['itemsMenu'],
        ]);
        NavBar::end();
        ?>
    </div>
</header>

<section id="main">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]); ?>

        <div class="row">
            <div class="col-lg-3 visible-lg">
                <?= Nav::widget([
                    'options' => ['class' => 'nav nav-side'],
                    'encodeLabels' => false,
                    'activateParents' => true,
                    'items' => Yii::$app->params['itemsMenu'],
                ]); ?>
                <?= isset($this->blocks['news']) ?
                    $this->blocks['news'] :
                    false
                ?>
            </div>
            <div class="col-lg-9">
                <?= $content ?>
            </div>
        </div>
    </div>

</section>

<footer id="footer" ondblclick="location.href = '<?= Url::to(['/user/default/login'])?>'">
    <div class="container">
        <p class="text-center">&copy; СОЮЗ "ФЭСЭ" <?= date('Y') ?></p>
    </div>
</footer>

<div class="alert-container container">
    <?= Alert::widget() ?>
</div>

<?php $this->endContent(); ?>
