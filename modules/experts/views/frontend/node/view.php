<?php

use yii\helpers\Html;
//use app\modules\admin\rbac\Rbac as AdminRbac;
use yii\data\ActiveDataProvider;
use app\modules\experts\models\backend\Experts;
use yii\helpers\ArrayHelper;
use app\modules\experts\models\backend\ExpertsTypes;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $model app\modules\experts\models\backend\Experts */
/* @var $attach_image */

//$images = $model->getAttachFiles('image');
$country = [
    '1' => 'Центральный',
    '2' => 'Южный',
    '3' => 'Северо Западный',
    '4' => 'Дальневосточный',
    '5' => 'Сибирский',
    '6' => 'Уральский',
    '7' => 'Приволжский',
    '8' => 'Северо-Кавказский',
];
$type_obrazovanie = [
    '1' => 'Сведения о высшем образовании',
    '2' => 'Сведения о дополнительном образовании',
    '3' => 'Сведения о повышении квалификации',
];
$types_expertize = ArrayHelper::map(ExpertsTypes::find()->all(), 'id', 'name');
$dataPage = new ActiveDataProvider([
    'query' => Experts::find()->where(['status'=>1])->orderBy('updated_at DESC'),
    'pagination' => [
        'pageSize' => 2,
    ],
]);
$model->types_work=explode(",",$model->types_work);
?>

<?php $this->beginBlock('title');
echo Yii::$app->user->isGuest ?
    false : Html::a('<i class="material-icons">mode_edit</i>', ['/admin/experts/default/update', 'id' => $model->id]) ;
echo Html::encode($model->fio);
$this->endBlock(); ?>

<div class="container experts-body" >
    <div class="col-xs-12">
    <div class="field-body">
        <table class="table table-bordered table-expert">
            <thead>
            <tr>
                <td class="title title_item">Фамилия, Имя, Отчество</td><td><?= $model->fio ?></td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="title_item">Федеральный округ</td><td><?= $country[$model->county] ?></td>
            </tr>
            <tr>
                <td class="title_item">Город</td><td><?=$model->adress ?></td>
            </tr>
            <tr>
                <td class="title_item">Виды экспертиз</td><td>
                    <ul>
                        <?php foreach ($model->types_work as $item){echo '<li>'.$types_expertize[$item].'</li>';} ?>
                    </ul>
                </td>
            </tr>
            </tbody>
            <thead>
            <tr>
                <td class="title_item text-center" colspan="2">Сведения об образовании</td>
            </tr>
            </thead>
            <tbody>

            <?php
            $i=1;
            while($i <4 ){
            foreach ($model->obrazovanie as $obraz) {
                if ($obraz->type==$i){ //Сведения о  образовании?>
                    <tr>
                        <td class="title_item"><?= $type_obrazovanie[$i];?></td>
                        <td>
                            <?php foreach ($model->obrazovanie as $obraz) {
                            if ($obraz->type==$i){?>
                                <table class="table table-bordered">
                                    <tr>
                                        <td class="title_item">Наименование образовательного учереждения</td><td><?= $obraz->name ?></td>
                                    </tr>
                                    <tr>
                                        <td class="title_item">Год окончания</td><td><?=$obraz->year;?></td>
                                    </tr>
                                    <tr>
                                        <td class="title_item">Номер диплома и дата выдачи</td><td><?=$obraz->diplom;?></td>
                                    </tr>
                                    <tr>
                                        <td class="title_item">Специальность</td><td><?=$obraz->specialty;?></td>
                                    </tr>
                                    <tr>
                                        <td class="title_item">Квалификация, профессия</td><td><?=$obraz->qualifications?></td>
                                    </tr>
                                </table>
                            <?php  }}break;?>

                        </td>
                    </tr>
          <?php  }
            }$i++;}?>

            <tr>
                <td class="title_item">Наличие дополнительных квалификационных аттестатов</td>
                <td>
Проф аттестат
                </td>
            </tr>
            <tr>
                <td class="title_item">Сведения о наличии ученной степени, ученого звания</td>
                <td>
                   нет
                </td>
            </tr>
            <tr>
                <td class="title_item">Членство в саморегулируемых организациях и иных некомерческих организациях</td>
                <td>
                    нет
                </td>
            </tr>
            </tbody>
            <thead>
            <tr>
                <td class="title_item text-center" colspan="2">Сведения о стаже</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="title_item">Стаж работы по специальности</td>
                <td><?= $model->work_exp ?></td>
            </tr>
            <tr>
                <td class="title_item">Стаж судебной экспертной деятльности</td>
                <td><?= $model->work_exp ?></td>
            </tr>
            </tbody>
            <thead>
            <tr>
                <td class="title_item text-center" colspan="2">Сведения о месте работы</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="title_item">Должность</td>
                <td><?= $model->post ?></td>
            </tr>
            <tr>
                <td class="title_item">Организация</td>
                <td><?= $model->company ?></td>
            </tr>
            <tr>
                <td class="title_item">Работа по совместительству</td>
                <td>Нет</td>
            </tr>
            </tbody>
            <thead>
            <tr>
                <td class="title_item text-center" colspan="2">Контактные данные</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="title_item">Место нахождение организации</td>
                <td><?= $model->adress ?></td>
            </tr>
            <tr>
                <td class="title_item">Почтовый адресс</td>
                <td><?= $model->adress ?></td>
            </tr>
            <tr>
                <td class="title_item">Телефон рабочий</td>
                <td><?= $model->phone ?></td>
            </tr>
            <tr>
                <td class="title_item">Электронная почта</td>
                <td><?= $model->mail ?></td>
            </tr>
            <tr>
                <td class="title_item">Сайт</td>
                <td><?= $model->site ?></td>
            </tr>
            </tbody>
        </table>

    </div>
</div>



</div>

<?php $this->beginBlock('experts');
echo "<h4>Эксперты</h4>";
echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataPage,
    'itemView' => '_post',
    'layout' => "{items}\n{pager}", //"{summary}\n{items}\n{pager}"
    'options' => [
        'class' => 'views-bootstrap-grid-plugin-style',
    ]
]);
$this->endBlock(); ?>
