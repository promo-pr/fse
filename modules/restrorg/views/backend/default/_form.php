<?php

use yii\helpers\Html;
use app\modules\file\widgets\FileInput;
use yii\bootstrap\ActiveForm;
use vova07\imperavi\Widget;
use app\widgets\date\Picker;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\restrorg\models\backend\Restrorg */
/* @var $form yii\widgets\ActiveForm */

?>

<?php $form = ActiveForm::begin([
    'options'=>['enctype'=>'multipart/form-data'] // important
]); ?>
<div class="row">
    <div class="col-xs-9 col-md-10">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-xs-3 col-md-2">
        <?php $model->status = $model->isNewRecord ? 1 : $model->status; ?>
        <?= $form->field($model, 'status')->dropDownList([
            '0' => 'Черновик',
            '1' => 'Опубликовано',
        ]) ?>
    </div>
</div>

    <div class="row" style="clear: both">
        <div class="col-sm-6">
            <?= $form->field($model, 'type_work')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-6">
        <?= $form->field($model, 'adress')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
<div class="row" style="clear: both">
    <div class="col-sm-4">
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'mail')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'site')->textInput(['maxlength' => true]) ?>
    </div>

</div>
<div class="pull-right">
    <a class="btn btn-default" role="button" data-toggle="collapse" href="#collapseSEO" aria-expanded="false" aria-controls="collapseSEO">
        <i class="material-icons">settings</i>
    </a>
</div>

<div class="collapse" id="collapseSEO">
    <div class="row" style="clear: both">
    <div class="col-sm-4">
        <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
    </div>
        </div>
</div>


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


