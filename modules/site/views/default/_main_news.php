<?php
use yii\helpers\Html;
/* @var $attach_image */

$images = $model->getAttachFiles('image');
?>


<div class="media-left">
            <?php
            foreach ($images as $image) {
                echo Html::img($image->getThumb(100,100), [
                    'alt' => $image->name,
                    'class' => 'media-object image-item',
                ]);
            }
            ?>
    </div>
    <div class="media-body">
        <h4 class="media-heading">
            <?=Html::a($model->title, ['/post/node/view', 'slug'=>$model->slug],['class'=>'item']) ?>

        </h4>
        <p><?= '<i class="material-icons">event</i>&nbsp;'.date('j.m.Y',$model->updated_at) . '&nbsp;&nbsp;&nbsp;' ?> <?= mb_substr(strip_tags($model->body),0,200); ?></p>
    </div>

