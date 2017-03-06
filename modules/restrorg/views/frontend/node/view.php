<?php

use yii\helpers\Html;
//use app\modules\admin\rbac\Rbac as AdminRbac;
use yii\data\ActiveDataProvider;
use app\modules\restrorg\models\backend\Restrorg;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $model app\modules\restrorg\models\backend\Restrorg */
/* @var $attach_image */

$this->params['breadcrumbs'][] = ['label' => 'Организации', 'url' => ['/restrorg/node/index']];
$this->params['breadcrumbs'][] = $model->name;
$images = $model->getAttachFiles('image');

$dataPage = new ActiveDataProvider([
    'query' => Restrorg::find()->where(['status'=>1])->orderBy('updated_at DESC'),
    'pagination' => [
        'pageSize' => 2,
    ],
]);
?>

<?php $this->beginBlock('title');
echo Yii::$app->user->isGuest ?
    false : Html::a('<i class="material-icons">mode_edit</i>', ['/admin/restrorgs/default/update', 'id' => $model->id]) ;
echo Html::encode($model->name);
$this->endBlock(); ?>

<div class="container restrorg-body" >

    <div class="col-xs-12">
    <div class="field-body">
        <div class="name"><h4>Название организации: </h4><?= $model->name ?></div>
        <div class="type_work"><h4>Виды осуществляемой деятельности: </h4><?= $model->type_work ?></div>
        <div class="adress"><h4>Адрес: </h4><?= $model->adress ?></div>
        <div class="phone"><h4>Телефон: </h4><?= $model->phone ?></div>
        <div class="mail"><h4>E-mail: </h4><?= $model->mail ?></div>
        <div class="site"><h4 >Сайт: </h4><?= $model->site ?></div>
        <div class="site"><h4 >Свидетельство: </h4>
        <?php
        foreach ($images as $image) {
            echo Html::img($image->getThumb(250,350), [
                'alt' => $image->name,
                'class' => 'media-object pull-left media-left image-item',

            ]);
        }
        ?></div>
    </div>
</div>



</div>

<?php $this->beginBlock('organ');
echo "<h4>Организации</h4>";
echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataPage,
    'itemView' => '_post',
    'layout' => "{items}\n{pager}", //"{summary}\n{items}\n{pager}"
    'options' => [
        'class' => 'views-bootstrap-grid-plugin-style',
    ]
]);
$this->endBlock(); ?>
