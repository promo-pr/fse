<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\modules\site\models\ContactForm */

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = ['label' => 'О нас', 'url' => ['/about']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="container">
    <div class="field-body">
        <div class="row">
            <div class="col-md-6">
                <h4>ГЕНЕРАЛЬНЫЙ ДИРЕКТОР</h4>
                <p><strong>ВЕРХОЗИНА - РОГИЧ Алена Валерьевна</strong>
                </p>
                <p><i class="material-icons">contact_phone</i> +7 (916)238-08-00 (WhatsApp, Viber)
                </p>
                <p><i class="material-icons">contact_mail</i>  finsudexpert@mail.ru
                </p>
                <h4>ИСПОЛНИТЕЛЬНЫЙ ДИРЕКТОР</h4>
                <p><strong>ЦОЙ Агата Робертовна</strong>
                </p>
                <p><i class="material-icons">contact_phone</i> +7 (495) 22-66-33-9
                </p>
                <p><i class="material-icons">contact_mail</i> finsudexpert@mail.ru
                </p>
                <h4>ЗАМЕСТИТЕЛЬ ГЕНЕРАЛЬНОГО ДИРЕКТОРА</h4>
                <p><strong>КОМАР Ирина Алексеевна</strong>
                </p>
                <p><i class="material-icons">contact_phone</i> +7 (903) 16-959-16
                </p>
                <p><i class="material-icons">contact_mail</i> i.komar@pgo.ru
                </p>
            </div>

            <div class="col-md-6">
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <?= $form->field($model, 'subject', ['options'=>['class'=>'element-invisible']]); ?>
                <?= $form->field($model, 'name', ['options'=>['class'=>'required-name']]) ?>
                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
                <?= $form->field($model, 'email') ?>
                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-warning', 'name' => 'contact-button']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

<?php $this->beginBlock('map');
$this->registerJsFile('https://api-maps.yandex.ru/2.1/?lang=ru_RU');
$this->registerJs("ymaps.ready(init);", $this::POS_END);
?>
<div id="map" style="width: 100%; height: 400px; margin-bottom: -30px; margin-top: 20px"></div>
<script type="text/javascript">
    var myMap,
        myPlacemark;

    function init(){
        myMap = new ymaps.Map("map", {
            center: [55.733665, 37.519234],
            zoom: 14,
            controls: ["routeEditor", "zoomControl", "fullscreenControl"]
        });

        myPlacemark = new ymaps.Placemark([55.733665, 37.519234], {
            iconContent: 'Наш офис'
        },{
            preset: 'islands#darkBlueStretchyIcon' // https://tech.yandex.ru/maps/doc/jsapi/2.1/ref/reference/option.presetStorage-docpage/
        });

        myMap.geoObjects.add(myPlacemark);
    }
</script>
<?php $this->endBlock(); ?>

