<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\event\models\backend\Event */

$this->title = 'Редактирование: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Мероприятие', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['/event/node/view', 'slug' => $model->slug]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


