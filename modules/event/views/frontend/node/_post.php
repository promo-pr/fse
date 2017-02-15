<?php
use yii\helpers\Html;
/* @var $attach_image */

$images = $model->getAttachFiles('image',64,64,1);
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
        <?= '<i class="material-icons">event</i>&nbsp;'.date('j.m.Y',$model->date) . '&nbsp;&nbsp;&nbsp;' ?>
        <h6 class="media-heading"><?= Html::a($model->title, ['/event/node/view', 'slug'=>$model->slug]) ?></h6>

       <smail style="font-size: 12px; line-height:0.1"> <?= substr(strip_tags($model->body),0,400); ?></smail>
        <?= Html::a('<span class="more"></span>', ['/event/node/view', 'slug'=>$model->slug]) ?>
    </div>
</div>