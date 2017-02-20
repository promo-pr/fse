<?php
use yii\helpers\Html;
/* @var $attach_image */

$images = $model->getAttachFiles('image',100,100,1);
?>


<div class=" col col-lg-6" style="padding-bottom: 10px">
    <div class="col-xs-12">
        <div >
            <?php
            foreach ($images as $image) {
                echo Html::img($image->thumb, [
                    'alt' => $image->name,
                    'class' => 'media-object pull-left media-left image-item',
                    'style'=>'float:left; width:100px;height:100px',
                ]);
            }
            ?>
        </div>
        <div>
            <h4 style="margin-top: -10px;"> <?=Html::a('<h4>'.$model->title.'</h4>', ['/post/node/view', 'slug'=>$model->slug],['class'=>'item']) ?>
                <?= '<i class="material-icons">event</i>&nbsp;'.date('j.m.Y',$model->updated_at) . '&nbsp;&nbsp;&nbsp;' ?></h4>
    </div>
    </div>
        <div class="col-xs-12   ">
            <smail> <?= substr(strip_tags($model->body),0,400); ?></smail>
        </div>

</div>
