<?php

use yii\helpers\Html;
//use app\modules\admin\rbac\Rbac as AdminRbac;
use yii\data\ActiveDataProvider;
use app\modules\event\models\backend\Event;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $model app\modules\event\models\backend\Event */
/* @var $attach_image */

$this->params['breadcrumbs'][] = ['label' => 'Мероприятия', 'url' => ['/site/default/event']];
$this->params['breadcrumbs'][] = $model->title;

$images = $model->getAttachFiles('image');

$dataPage = new ActiveDataProvider([
    'query' => Event::find()->where(['status'=>1])->orderBy('updated_at DESC'),
    'pagination' => [
        'pageSize' => 2,
    ],
]);
?>

<?php $this->beginBlock('title');
echo Yii::$app->user->isGuest ?
    false : Html::a('<i class="material-icons">mode_edit</i>', ['/admin/events/default/update', 'id' => $model->id]) ;
echo Html::encode($model->title);
$this->endBlock(); ?>

<div class="event-body" >
    <div class="col-xs-12">
     <div class="field-date-event">
         <h3 class="event_date"> Дата начала мероприятия: <?= date('d.m.Y в H:i',$model->date) ?></h3>
     </div>
    <div class="field-body">

        <?= $model->body ?>
    </div>
    <div class="flipper row text-center">


        <?= $last->slug ?
            Html::a('<i class="material-icons">chevron_left</i> ', ['view', 'slug' => $last->slug], ['class' => ' text-left']) :
            false ?>

            <?= $prev->slug ?
                Html::a( $prev->title, ['view', 'slug' => $prev->slug], ['class' => 'prev text-left']) :
                false ?>
<?= '&nbsp;&nbsp;|&nbsp;' ?>
            <?= $next->slug ?
                Html::a($next->title, ['view', 'slug' => $next->slug], ['class' => 'next text-right']) :
                false ?>
        <?= $first->slug ?
            Html::a('<i class="material-icons">chevron_right</i> ', ['view', 'slug' => $first->slug], ['class' => ' text-left']) :
            false ?>
    </div>

</div>


</div>

<?php $this->beginBlock('evens');
echo "<h4>Ближайшие мероприятия</h4>";
echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataPage,
    'itemView' => '_post',
    'layout' => "{items}\n{pager}", //"{summary}\n{items}\n{pager}"
    'options' => [
        'class' => 'views-bootstrap-grid-plugin-style',
    ]
]);
$this->endBlock(); ?>