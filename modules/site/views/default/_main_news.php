<?php
use yii\helpers\Html;
/* @var $attach_image */

$images = $model->getAttachFiles('image',100,100,1);
?>


<div class="col col-lg-6" style="padding: 10px">
    <div class="row">
        <div class="image col-xs-3">
            <?php
            foreach ($images as $image) {
                echo Html::img($image->thumb, [
                    'alt' => $image->name,
                    'class' => 'media-object /pull-left media-left image-item',
                    'style'=>'float:left; width:100px',
                ]);
            }
            ?>
        </div>
    <div class="col-xs-9">
        <h4> <?=Html::a('<h4>'.$model->title.'</h4>', ['/post/node/view', 'slug'=>$model->slug],['class'=>'item']) ?>
        <?= '<i class="material-icons">event</i>&nbsp;'.date('j.m.Y',$model->updated_at) . '&nbsp;&nbsp;&nbsp;' ?>
    </div>
    </div>
    <div class="row">
    <div class="col-xs-12">
        <smail style="font-size: 12px; line-height:0.1"> <?= substr(strip_tags($model->body),0,500); ?></smail>
    </div>
    </div>


</div>

