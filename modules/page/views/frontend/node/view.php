<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\page\models\backend\Page */

$this->params['breadcrumbs'][] = ['label' => $model->category->title, 'url' => ['/'.$model->category->slug]];
$this->params['breadcrumbs'][] = $model->title;
?>

<?php $this->beginBlock('title');
echo Yii::$app->user->isGuest ?
    false : Html::a('<i class="material-icons">mode_edit</i>', ['/admin/pages/default/update', 'id' => $model->id]);
echo Html::encode($model->title);
$this->endBlock(); ?>


<div class="field-body">
    <?= $model->body ?>
</div>

