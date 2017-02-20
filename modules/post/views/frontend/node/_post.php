<?php
use yii\helpers\Html;
/* @var $attach_image */

$images = $model->getAttachFiles('image');
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

    <?php
    foreach ($images as $image) {
        echo Html::img($image->getThumb(150,150), [
            'alt' => $image->name,
            'class' => 'media-object media-center',//pull-left media-left image-item
        ]);
           }
    ?>
    <div class="media-body ">
        <h6 class="media-heading"><?= Html::a($model->title, ['/post/node/view', 'slug'=>$model->slug]) ?></h6>
        <?= '<i class="material-icons">event</i>&nbsp;'.date('j.m.Y',$model->created_at) . '&nbsp;&nbsp;&nbsp;' ?>
       <smail> <?= mb_substr(strip_tags($model->body),0,400); ?></smail>
        <?= Html::a('<span class="more"></span>', ['/post/node/view', 'slug'=>$model->slug]) ?>
    </div>
</div>
