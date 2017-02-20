<?php
use yii\helpers\Html;
/* @var $attach_image */

$images = $model->getAttachFiles('image');
?>


<div class=" col col-lg-6" style="padding-bottom: 10px">
    <div class="col-xs-12">
        <div >
            <?php
            foreach ($images as $image) {
                echo Html::img($image->getThumb(100,100), [
                    'alt' => $image->name,
                    'class' => 'media-object pull-left media-left image-item',
                    'style'=>'float:left; ',
                ]);
            }
            ?>
        </div>
        <div>
            <h4> <?=Html::a('<h4>'.$model->title.'</h4>', ['/post/node/view', 'slug'=>$model->slug],['class'=>'item']) ?>
                <?= '<i class="material-icons">event</i>&nbsp;'.date('j.m.Y',$model->updated_at) . '&nbsp;&nbsp;&nbsp;' ?></h4>
    </div>
    </div>
        <div class="col-xs-12   ">
            <smail> <?= mb_substr(strip_tags($model->body),0,400); ?></smail>
        </div>

</div>
