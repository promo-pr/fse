<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\page\models\backend\PageCategory */

$this->params['breadcrumbs'][] = $model->title;
?>

<?php $this->beginBlock('title');
echo Yii::$app->user->isGuest ?
  false : Html::a('<i class="material-icons">mode_edit</i>', ['/admin/pages/default/update', 'id' => $model->id]);
echo Html::encode($model->title);
$this->endBlock(); ?>


<div class="field-body">
  <?= $model->body ?>

  <?php foreach ($pages as $page)
  {
    $this->render('_item', [
      'page' => $page
    ]);
  }
  ?>

</div>

