<?php
use yii\helpers\Url;
/* @var $searchModel */


?>
<ul class="row">
    <a href="<?= Url::to(['/restrorg/node/view','slug'=>$model->slug]);?>"><?= $model->name ?></a>
</ul>


