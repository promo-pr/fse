<?php

use yii\helpers\Html;
use app\widgets\AjaxForm;

/* @var $this \yii\web\View */
/* @var $title  */
/* @var $title_body  */
/* @var $form \app\widgets\AjaxForm */
/* @var $model \app\modules\site\models\ContactForm */

$form = AjaxForm::begin(['action' =>['id'=>'Ajax-form-5','/site/contact/ajaxpop', 'title'=>$title,'title_body'=>$title_body],'options' => ['class' => 'white-popup-block']]); ?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button title="Закрыть (Esc)" type="button" class="mfp-close" style="color: black">×</button>
            <h4 class="modal-title text-center" id="myModalLabel"><?php echo $title;?></h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="footerFormWrapper">
                    <div class="footerForm form-modal">
                        <div class="col-md-12 col-sm-12">
                            <p>
                            </p><h4 class="text-center"><?php echo $title_body;?></h4>
                            <p></p>
                        </div>
                        <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <?=  Html::input('hidden', 'nospam:blank',""),
                            $form->field($model, 'name', ['options'=>['class'=>'']])->textInput(['placeholder' => 'Ваше имя'])->label(false)
                            ?>
                        </div>
                        <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <?= $form->field($model, 'tel')->textInput(['placeholder' => 'Ваш номер'])->label(false) ?>
                        </div>
                        <div class="col-md-12 col-sm-12 text-center">
                            <?= $form->field($model, 'body')->hiddenInput(['value' => 'Заказ книги'])->label(false);?>
                            <?= Html::submitButton('Заказать', ['class' => 'btn btn-warning', 'name' => 'contact-button']) ?>
                        </div> </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php AjaxForm::end();?>

