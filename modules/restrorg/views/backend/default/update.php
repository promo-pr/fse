<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\restrorg\models\backend\Restrorg */

$this->title = 'Редактирование: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Организации', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['/restrorg/node/view', 'slug' => $model->slug]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


