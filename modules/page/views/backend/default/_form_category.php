<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use app\widgets\date\Picker;
use yii\helpers\ArrayHelper;
use app\modules\page\models\backend\PageCategory;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\page\models\backend\Page */
/* @var $form yii\widgets\ActiveForm */

?>

<?php $form = ActiveForm::begin([
    'options'=>['enctype'=>'multipart/form-data']
]); ?>
<div class="row">
    <div class="col-xs-12">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    </div>
</div>

<?= $form->field($model, 'body')->widget(Widget::className(), [
    'settings' => [
        'lang' => 'ru',
        'minHeight' => 200,
        'toolbarFixedTopOffset' => 28,
        'formatting' => ['blockquote', 'h2', 'h3', 'h4', 'h5'],
        'fileUpload' => Url::to(['/file/upload/file']),
        'imageUpload' => Url::to(['/file/upload/image']),
        'imageFloatMargin' => '15px',
        'plugins' => [
            'fontcolor',
            'table',
            'video',
            'fullscreen'
        ]
    ]
]); ?>

<?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

<div class="btn-toolbar">
  <?= Html::submitButton('<i class="material-icons">check</i> Сохранить', ['class' => 'btn btn-success']) ?>
  <?= $model->isNewRecord ? false : Html::a('<i class="material-icons">delete</i> Удалить', ['delete', 'id'=>$model->id], [
    'class' => 'btn btn-danger',
    'data' => [
      'confirm' => "Эта операция не может быть отменена. Продолжить?",
    ]]) ?>
  <?= Html::a('Отмена', Yii::$app->request->referrer, ['class' => 'btn btn-default']) ?>
</div>

<?php ActiveForm::end(); ?>


