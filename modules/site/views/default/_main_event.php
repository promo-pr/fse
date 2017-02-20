<?php
use yii\helpers\Html;
/* @var $attach_image */

$images = $model->getAttachFiles('image');
?>


<div class="col-lg-6" style="padding: 10px">
    <div class="col-xs-12">
        <div >
            <?php
            foreach ($images as $image) {
                echo Html::img($image->getThumb(100,100), [
                    'alt' => $image->name,
                    'class' => 'media-object /pull-left media-left image-item',
                    'style'=>'float:left; width:100px;height:100px',
                ]);
            }
            ?>
        </div>
    <div class="">
        <?= '<span class="event_time"><i class="material-icons">event</i>&nbsp;'.date('j.m.Y в H:i',$model->date) . '</span>' ?>
         <?=Html::a('<h4>'.$model->title.'</h4>', ['/event/node/view', 'slug'=>$model->slug],['class'=>'item'])?>
    </div>
    </div>

    <div class="col-xs-12">
        <smail> <?= mb_substr(strip_tags($model->body),0,400); ?></smail>
    </div>



</div>

