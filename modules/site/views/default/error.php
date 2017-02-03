<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = 'Error';
$this->params['breadcrumbs'][] = 'Что-то пошло не так...';
?>


<?php $this->beginBlock('title');
echo Html::encode($message);
$this->endBlock(); ?>


<div class="field-body">
    <h2><?= nl2br(Html::encode($name)) ?></h2>

        <div class="row">
            <div class="col-md-6">
                <label for="search-btn">Поиск по сайту:</label>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Введите запрос...">
                    <span class="input-group-btn">
        <button class="btn btn-default" name="search-btn" type="button">Найти</button>
      </span>
                </div>
            </div>
        </div>
</div>
