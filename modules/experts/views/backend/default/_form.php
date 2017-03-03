<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\experts\Asset;
use app\modules\experts\models\backend\ExpertsTypes;
use app\modules\experts\models\backend\TypesExperts;
/* @var $this yii\web\View */
/* @var $model app\modules\experts\models\backend\Experts */
/* @var $modelSliderItem app\modules\experts\models\backend\Obrazovanie */
/* @var $form yii\widgets\ActiveForm */
Asset::register($this);
?>

<?php $form = ActiveForm::begin([
    'options'=>['enctype'=>'multipart/form-data'] // important
]); ?>
<div class="row">
    <div class="col-xs-9 col-md-9">
        <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-1">
        <?= $form->field($model, 'work_exp')->textInput(['maxlength' => true]) ?>
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
    <div class="col-sm-4">
        <?=$form->field($model, 'types_work[]')->checkboxList(ArrayHelper::map(ExpertsTypes::find()->all(), 'id', 'name'),['value' => true,'multiple' =>true,'size'=>'5']);
        ?>
    </div>
    <div class="col-sm-4">
        <?= //$form->field($model, 'county')->textInput(['maxlength' => true])
        $form->field($model, 'county')->dropDownList([
            '1' => 'Центральный',
            '2' => 'Южный',
            '3' => 'Северо Западный',
            '4' => 'Дальневосточный',
            '5' => 'Сибирский',
            '6' => 'Уральский',
            '7' => 'Приволжский',
            '8' => 'Северо-Кавказский',
        ]);
        ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'region')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'post')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'degree')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'partaker')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-sm-4">
        <?= $form->field($model, 'adress')->textInput(['maxlength' => true]) ?>
    </div>
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

<div class="panel panel-primary gray">
    <div class="panel-body">
        <div id="dynamic-form">
            <?php foreach($modelSliderItem as $i => $item) { ?>
                <?= $this->render('_item', [
                    'i' => $i,
                    'item' => $item,
                ]) ?>
            <?php } ?>
        </div>
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


