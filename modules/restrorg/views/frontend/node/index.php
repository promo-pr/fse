<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\data\ActiveDataProvider;
use app\modules\restrorg\models\backend\Restrorg;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \app\modules\site\models\ContactForm */

$this->title = 'Организации';
$this->params['breadcrumbs'][] = $this->title;
$dataProvider = new ActiveDataProvider([
    'query' => Restrorg::find()->where(['status'=>1])->orderBy('updated_at DESC'),
    'pagination' => [
        'pageSize' => 20,

    ],
]);
?>
<?php $this->beginBlock('title');
echo 'Организации';
echo Html::encode($model->name);
$this->endBlock(); ?>
<table class="table table-bordered">
    <ul class="title row">
        <b>Название организации</b>
    </ul>
    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_item_org',
        'layout' => "{items}\n{pager}", //"{summary}\n{items}\n{pager}"
    ]);?>
</table>