<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\restrorg\models\backend\Restrorg */

$this->title = 'Создание';
$this->params['breadcrumbs'][] = ['label' => 'Эксперты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelSliderItem' => $modelSliderItem,
        'typeItems' =>$typeItems,
    ]) ?>


