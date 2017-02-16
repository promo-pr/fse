<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\modules\experts\models\backend\Experts;
use app\widgets\grid\SetColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\experts\models\backend\search\Experts */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="pull-left">
        <?= Html::a('<i class="material-icons">add</i> Добавить эксперта', ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'fio',
                'format' => 'raw',
                'value' => function ($model, $key, $index, $column) {
                    /** @var \app\modules\experts\models\backend\Experts $model */
                    return Html::a(Html::encode($model->fio), ['/expert/node/view', 'slug' => $model->slug]);
                }
            ],
        /*    [
                'attribute' => 'post',
                'format' => 'raw',
                 'value' => function ($model, $key, $index, $column) {
                   /** @var \app\modules\experts\models\backend\Experts $model */
         /*          return Html::a(Html::encode($model->post), ['/expert/node/view', 'slug' => $model->slug]);
                }
            ],*/
            [
                'attribute' => 'updated_at',
                'format' => 'datetime',
                'contentOptions' => [
                    'class' => 'at-column',
                ],
            ],
            [
                'class' => SetColumn::className(),
                'filter' => Experts::getStatusesArray(),
                'attribute' => 'status',
                'name' => 'statusName',
                'cssCLasses' => [
                    Experts::STATUS_ACTIVE => 'success',
                    Experts::STATUS_WAIT => 'warning',
                ],
                'contentOptions' => [
                    'class' => 'status-column',
                ],
            ],
            [
                'class' => 'app\widgets\grid\ActionColumn',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        /** @var \app\modules\experts\models\backend\Experts $model */
                        return Html::a('<i class="material-icons">visibility</i>', ['/expert/node/view', 'slug' => $model->slug]);
                    },
                ],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
