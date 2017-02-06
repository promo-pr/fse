<?php

use yii\helpers\Html;
use app\modules\admin\rbac\Rbac as AdminRbac;

/* @var $this yii\web\View */
/* @var $model app\modules\post\models\backend\Post */

$this->params['breadcrumbs'][] = $model->title;
?>

<?php $this->beginBlock('title');
echo Yii::$app->user->isGuest ?
    false : Html::a('<i class="material-icons">mode_edit</i>', ['/admin/posts/default/update', 'id' => $model->id]);
echo Html::encode($model->title);
$this->endBlock(); ?>


<div class="field-body">
    <?= $model->body ?>
</div>

