<?php
use yii\helpers\Html;
/* @var $attach_image */

?>


    <div class="media-body ">
        <?= '<i class="material-icons">event</i>&nbsp;'.date('j.m.Y',$model->date) . '&nbsp;&nbsp;&nbsp;' ?>
        <p><?= $model->title ?>
        <br>
        <?= Html::a('<span class="more">подробнее...</span>', ['/event/node/view', 'slug'=>$model->slug]) ?>
        </p>
    </div>


