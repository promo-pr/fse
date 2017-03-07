<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\data\ActiveDataProvider;
use app\modules\event\models\backend\Event;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\modules\site\models\ContactForm */

$this->title = 'Мероприятия';
$this->params['breadcrumbs'][] = $this->title;
$dataPageMain = new ActiveDataProvider([
    'query' => Event::find()->where(['status'=>1])->orderBy('updated_at DESC'),
    'pagination' => [
        'pageSize' => 10,

    ],
]);
?>

<?php $this->beginBlock('title');
echo 'Мероприятия';
echo Html::encode($model->title);
$this->endBlock(); ?>

<div class="">

        <?= \yii\widgets\ListView::widget([
            'dataProvider' => $dataPageMain,
            'itemView' => '_main_event',
            'layout' => "{items}\n{pager}", //"{summary}\n{items}\n{pager}" 
            'options' => [
                'class' => 'row',
            ],
            'itemOptions' => [
                'class' => 'media',
            ],
        ]);?>
</div>

