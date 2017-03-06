<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\data\ActiveDataProvider;
use app\modules\experts\models\backend\Experts;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\modules\site\models\ContactForm */

$this->title = 'Эксперты';
$this->params['breadcrumbs'][] = $this->title;
$dataProvider = new ActiveDataProvider([
    'query' => Experts::find()->where(['status'=>1])->orderBy('updated_at DESC'),
    'pagination' => [
        'pageSize' => 20,

    ],
]);
?>
<?php $this->beginBlock('title');
echo 'Эксперты';
echo Html::encode($model->fio);
$this->endBlock(); ?>
<table class="table table-bordered">
    <ul class="title row">
        <div class="col-xs-11"><b>Фамилия Имя Отчетсво</b></div>
        <div class="col-xs-1"><b>Стаж</b></div>
    </ul>
    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item_expert',
        'layout' => "{items}\n{pager}", //"{summary}\n{items}\n{pager}"
    ]);?>
</table>