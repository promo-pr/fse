<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\modules\restrorg\models\backend\Restrorg;
use app\widgets\grid\SetColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\restrorg\models\backend\search\RestrorgSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Организация';
$this->params['breadcrumbs'][] = $this->title;
?>

    <h1><?= Html::encode($this->title) ?></h1>

    <p class="pull-left">
        <?= Html::a('<i class="material-icons">add</i> Добавить организацию', ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function ($model, $key, $index, $column) {
                    /** @var \app\modules\restrorg\models\backend\Restrorg $model */
                    return Html::a(Html::encode($model->name), ['/restrorg/node/view', 'slug' => $model->slug]);
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
                'filter' => Restrorg::getStatusesArray(),
                'attribute' => 'status',
                'name' => 'statusName',
                'cssCLasses' => [
                    Restrorg::STATUS_ACTIVE => 'success',
                    Restrorg::STATUS_WAIT => 'warning',
                ],
                'contentOptions' => [
                    'class' => 'status-column',
                ],
            ],
            [
                'class' => 'app\widgets\grid\ActionColumn',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        /** @var \app\modules\restrorg\models\backend\Restrorg $model */
                        return Html::a('<i class="material-icons">visibility</i>', ['/restrorg/node/view', 'slug' => $model->slug]);
                    },
                ],
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
