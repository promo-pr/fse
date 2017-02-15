<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\modules\event\models\backend\Event;
use app\widgets\grid\SetColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\event\models\backend\search\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Мероприятие';
$this->params['breadcrumbs'][] = $this->title;
?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="pull-left">
        <?= Html::a('<i class="material-icons">add</i> Добавить мероприятие', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php Pjax::begin(['enablePushState' => false]); ?>
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\CheckboxColumn',
                'contentOptions' => [
                    'class' => 'check-column',
                ],
            ],
            [
                'attribute' => 'title',
                'format' => 'raw',
                'value' => function ($model, $key, $index, $column) {
                    /** @var \app\modules\event\models\backend\Event $model */
                    return Html::a(Html::encode($model->title), ['/event/node/view', 'slug' => $model->slug]);
                }
            ],
            [
                'attribute' => 'updated_at',
                'format' => 'datetime',
                'contentOptions' => [
                    'class' => 'at-column',
                ],
            ],
            [
                'class' => SetColumn::className(),
                'filter' => Event::getStatusesArray(),
                'attribute' => 'status',
                'name' => 'statusName',
                'cssCLasses' => [
                    Event::STATUS_ACTIVE => 'success',
                    Event::STATUS_WAIT => 'warning',
                ],
                'contentOptions' => [
                    'class' => 'status-column',
                ],
            ],
            [
                'class' => 'app\widgets\grid\ActionColumn',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        /** @var \app\modules\event\models\backend\Event $model */
                        return Html::a('<i class="material-icons">visibility</i>', ['/event/node/view', 'slug' => $model->slug]);
                    },
                ],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
