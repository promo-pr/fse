<?php

use yii\helpers\Html;
//use app\modules\admin\rbac\Rbac as AdminRbac;
use yii\data\ActiveDataProvider;
use app\modules\post\models\backend\Post;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $model app\modules\post\models\backend\Post */
/* @var $attach_image */

$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['/news']];
$this->params['breadcrumbs'][] = $model->title;

$images = $model->getAttachFiles('image');
$dataPage = new ActiveDataProvider([
    'query' => Post::find()->where(['status'=>1])->orderBy('updated_at DESC'),
    'pagination' => [
        'pageSize' => 2,
    ],
]);

?>

<?php $this->beginBlock('title');
echo Yii::$app->user->isGuest ?
    false : Html::a('<i class="material-icons">mode_edit</i>', ['/admin/posts/default/update', 'id' => $model->id]) ;
echo Html::encode($model->title);
$this->endBlock(); ?>

<div class="container post-body" >

    <div class="col-xs-12">
    <div class="field-body">
        <?php
        foreach ($images as $image) {
            echo Html::img($image->getThumb(150,150), [
                'alt' => $image->name,
                'class' => 'media-object pull-left media-left image-item',
            ]);
        }
        ?>
        <?= $model->body ?>
    </div>
    <div class="flipper row text-center">


        <?= $last->slug ?
            Html::a('<i class="material-icons">chevron_left</i> ', ['view', 'slug' => $last->slug], ['class' => ' text-left']) :
            false ?>

            <?= $prev->slug ?
                Html::a( $prev->title, ['view', 'slug' => $prev->slug], ['class' => 'prev text-left']) :
                false ?>
<?= '&nbsp;&nbsp;|&nbsp;' ?>
            <?= $next->slug ?
                Html::a($next->title, ['view', 'slug' => $next->slug], ['class' => 'next text-right']) :
                false ?>
        <?= $first->slug ?
            Html::a('<i class="material-icons">chevron_right</i> ', ['view', 'slug' => $first->slug], ['class' => ' text-left']) :
            false ?>
    </div>

</div>



</div>

<?php $this->beginBlock('news');
echo "<h4>Последние новости</h4>";
echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataPage,
    'itemView' => '_post',
    'layout' => "{items}\n{pager}", //"{summary}\n{items}\n{pager}"
    'options' => [
        'class' => 'views-bootstrap-grid-plugin-style',
    ]
]);
$this->endBlock(); ?>
