<?php

use yii\helpers\Html;
//use app\modules\admin\rbac\Rbac as AdminRbac;
use yii\data\ActiveDataProvider;
use app\modules\experts\models\backend\Experts;
use yii\helpers\ArrayHelper;
use app\modules\experts\models\backend\ExpertsTypes;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $model app\modules\experts\models\backend\Experts */
/* @var $attach_image */

//$images = $model->getAttachFiles('image');
$country = [
    '1' => 'Центральный',
    '2' => 'Южный',
    '3' => 'Северо Западный',
    '4' => 'Дальневосточный',
    '5' => 'Сибирский',
    '6' => 'Уральский',
    '7' => 'Приволжский',
    '8' => 'Северо-Кавказский',
];
$types_expertize = ArrayHelper::map(ExpertsTypes::find()->all(), 'id', 'name');
$dataPage = new ActiveDataProvider([
    'query' => Experts::find()->where(['status'=>1])->orderBy('updated_at DESC'),
    'pagination' => [
        'pageSize' => 2,
    ],
]);
$model->types_work=explode(",",$model->types_work);
?>

<?php $this->beginBlock('title');
echo Yii::$app->user->isGuest ?
    false : Html::a('<i class="material-icons">mode_edit</i>', ['/admin/experts/default/update', 'id' => $model->id]) ;
echo Html::encode($model->fio);
$this->endBlock(); ?>

<div class="container experts-body" >

    <div class="col-xs-12">
    <div class="field-body">
        <div class="name"><h4>Фамилия Имя Отчетво: </h4><?= $model->fio ?></div>
        <div class="name"><h4>Федеральный округ: </h4><?= $country[$model->county] ?></div>
        <div class="name"><h4>Стаж работы: </h4><?= $model->work_exp ?></div>
        <div class="name"><h4>Регион: </h4><?= $model->region ?></div>
        <div class="name"><h4>Компания: </h4><?= $model->company ?></div>
        <div class="name"><h4>Должность: </h4><?= $model->post ?></div>
        <div class="type_work"><h4>Виды экспертиз: </h4>
            <ul>
            <?php foreach ($model->types_work as $item){echo '<li>'.$types_expertize[$item].'</li>';} ?>
            </ul>
        </div>
        <div class="adress"><h4>Адрес: </h4><?= $model->adress ?></div>
        <div class="phone"><h4>Контактный телефон: </h4><?= $model->phone ?></div>
        <div class="mail"><h4>E-mail: </h4><?= $model->mail ?></div>
        <div class="site"><h4 >Сайт: </h4><?= $model->site ?></div>
    </div>
</div>



</div>

<?php $this->beginBlock('experts');
echo "<h4>Эксперты</h4>";
echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataPage,
    'itemView' => '_post',
    'layout' => "{items}\n{pager}", //"{summary}\n{items}\n{pager}"
    'options' => [
        'class' => 'views-bootstrap-grid-plugin-style',
    ]
]);
$this->endBlock(); ?>
