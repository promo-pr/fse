<?php

use yii\helpers\Html;
use app\modules\file\widgets\FileInput;
use yii\bootstrap\ActiveForm;
use vova07\imperavi\Widget;
use app\widgets\date\Picker;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\experts\models\backend\Experts */
/* @var $form yii\widgets\ActiveForm */

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
    <div class="col-sm-8">
        <?= $form->field($model, 'region')->textInput(['maxlength' => true]) ?>
    </div>
</div>

    <div class="row" style="clear: both">
        <div class="col-sm-4">
            <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'post')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-4">
        <?=
//        $form->field($model, 'types_work')->textInput(['maxlength' => true])
          $form->field($model, 'types_work[]')->dropDownList([
              '1' => 'Финансово-экономические',
              '2' => 'Строительно-технические',
              '3,' => 'Оценочные экспертизы',
              '4' => 'Оспаривание кадастровой стоимости',
              '5' => 'Автотехнические',
              '6' => 'Товароведческие',
              '7' => 'Почерковедческие',
              '8' => 'Рецензирование заключений экспертов',
          ],['multiple' =>true]);
        ?>
        </div>
        <div class="col-sm-12">
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


