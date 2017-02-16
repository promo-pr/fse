<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\experts\models\backend\Experts */

$this->title = 'Редактирование: ' . $model->fio;
$this->params['breadcrumbs'][] = ['label' => 'эксперты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fio, 'url' => ['/expert/node/view', 'slug' => $model->slug]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


