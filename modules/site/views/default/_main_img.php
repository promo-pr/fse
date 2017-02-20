<?php
use yii\helpers\Html;
use app\modules\file\FilesBehavior;
/* @var $attach_image */

$images = $model->getAttachFiles('image');
?>



<a href='/restrorg/node/view?slug=<?=$model->slug?>'>
            <?php

            foreach ($images as $image) {
           echo  Html::img($image->getThumb(250,350), [
                    'alt' => $image->name,
                  //'class' => 'media-object pull-left media-left image-item',
                    'style'=>'',
                ]);
            }

            ?>
</a>