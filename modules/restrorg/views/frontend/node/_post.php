<?php
use yii\helpers\Html;
/* @var $attach_image */

//$images = $model->getAttachFiles('image',150,150,1);
?>


<div class="tiser fr">
<?php /*
    empty( $image = $model->getAttachFiles('image',150,150,1) ) ? false : Html::a(Html::img($image->url, [
        'alt'=>$image->filename,
        'width'=>$image->width,
        'height'=>$image->height,
        'class' => 'media-object',
    ]), $image->original, ['class'=>'pull-left media-left image-item']) ;
*/
 ?>


    <div class="media-body ">
        <h6 class="media-heading"><?= Html::a($model->name, ['/restrorg/node/view', 'slug'=>$model->slug]) ?></h6>
        <?= '<i class="material-icons">event</i>&nbsp;'.date('j.m.Y',$model->created_at) . '&nbsp;&nbsp;&nbsp;' ?>
       <smail style="font-size: 12px; line-height:0.1"> </smail>
        <?= Html::a('<span class="more"></span>', ['/restrorg/node/view', 'slug'=>$model->slug]) ?>
    </div>
</div>