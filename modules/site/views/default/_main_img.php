<?php
use yii\helpers\Html;
use app\modules\file\FilesBehavior;
/* @var $attach_image */

$images = $model->getAttachFiles('image',250,350,1);
?>



<a href='/restrorg/node/view?slug=<?=$model->slug?>'>
            <?php

            foreach ($images as $image) {
           echo  Html::img($image->thumb, [
                    'alt' => $image->name,
                  //'class' => 'media-object pull-left media-left image-item',
                    'style'=>'width: 250px; height: 350px;',
                ]);
            }

            ?>
</a>