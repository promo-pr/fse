<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\modules\site\models\ContactForm */

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('https://api-maps.yandex.ru/2.1/?lang=ru_RU');
$this->registerJs("ymaps.ready(init);", $this::POS_END);
?>

<?php $this->beginBlock('title');
echo Html::encode($this->title);
$this->endBlock(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
            <?= $form->field($model, 'subject', ['options'=>['class'=>'element-invisible']]); ?>
            <?= $form->field($model, 'name', ['options'=>['class'=>'required-name']]) ?>
            <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
            <?= $form->field($model, 'email') ?>
            <div class="form-group">
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>

        <div class="col-md-7">
            <div class="form-group">
                <label>Схема проезда</label>
                <div id="map" style="width: 100%; height: 350px"></div>
                <script type="text/javascript">
                    var myMap,
                        myPlacemark;

                    function init(){
                        myMap = new ymaps.Map("map", {
                            center: [55.76, 37.64],
                            zoom: 14,
                            controls: ["routeEditor", "zoomControl", "fullscreenControl"]
                        });

                        myPlacemark = new ymaps.Placemark([55.76, 37.64], {
                            iconContent: 'Наш офис'
                        },{
                            preset: 'islands#yellowStretchyIcon'
                        });

                        myMap.geoObjects.add(myPlacemark);
                    }
                </script>
            </div>
        </div>

    </div>

</div>
