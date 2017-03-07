<?php
use yii\helpers\Html;
/* @var $attach_image */

?>



    <div class="media-body ">
        <h5 class="media-heading"><?= '<i class="material-icons">event</i>&nbsp;'.date('j.m.Y',$model->created_at) . '&nbsp;&nbsp;&nbsp;' ?> <?= Html::a($model->title, ['/post/node/view', 'slug'=>$model->slug]) ?></h5>
    </div>

