<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\data\ActiveDataProvider;
use app\modules\post\models\backend\Post;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\modules\site\models\ContactForm */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
$dataPageMain = new ActiveDataProvider([
    'query' => Post::find()->where(['status'=>1])->orderBy('updated_at DESC'),
    'pagination' => [
        'pageSize' => 10,

    ],
]);
?>
<?php $this->beginBlock('title');
echo 'Новости';
echo Html::encode($model->title);
$this->endBlock(); ?>

<div class="">
    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataPageMain,
        'itemView' => '_main_news',
        'layout' => "{items}\n{pager}", //"{summary}\n{items}\n{pager}"
        'options' => [
            'class' => 'row',
        ],
        'itemOptions' => [
            'class' => 'media',
        ],
    ]);?>
</div>


