<?php

use yii\helpers\Html;
use yii\data\ActiveDataProvider;
use app\modules\post\models\backend\Post;
use app\modules\restrorg\models\backend\Restrorg;
use app\modules\experts\models\backend\ExpertsTypes;
use yii\widgets\LinkPager;
use yii\helpers\Url;


/* @var $this yii\web\View */

$this->title = Yii::$app->name;

?>
<div class="block news-block">
    <div class="container">
        <div class="block-title text-center">
            Новости
        </div>
        <?= \yii\widgets\ListView::widget([
            'dataProvider' => $dataPageMain,
            'itemView' => '_main_news',
            'layout' => "{items}", //"{summary}\n{items}\n{pager}"
            'options' => [
                'class' => 'row',
            ],
            'itemOptions' => [
                'class' => 'col-md-6 media',
            ]
        ]);?>
        <div class="col-md-12 text-center">
            <?=Html::a('ЗАГРУЗИТЬ ЕЩЁ', ['/site/default/news'],['class'=>'btn btn-warning']) ?>
        </div>
    </div>
</div>


<div class="block search-block gray">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="block-title text-center">
                    Поиск экспертов по видам экспертиз
                </div>
                <ul class="spec-list bordered">
                    <!--<li><i class="material-icons">done</i><a href="#"> Финансово-экономические</a> <span class="badge">142</span></li>
                    <li><i class="material-icons">done</i><a href="#"> Строительно-технические</a> <span class="badge">112</span></li>
                    <li><i class="material-icons">done</i><a href="#"> Оценочные экспертизы</a> <span class="badge">123</span></li>
                    <li><i class="material-icons">done</i><a href="#"> Оспаривание кадастровой стоимости</a> <span class="badge">45</span></li>
                    <li><i class="material-icons">done</i><a href="#"> Автотехнические</a> <span class="badge">81</span></li>
                    <li><i class="material-icons">done</i><a href="#"> Товароведческие</a> <span class="badge">34</span></li>
                    <li><i class="material-icons">done</i><a href="#"> Почерковедческие</a> <span class="badge">12</span></li>
                    <li><i class="material-icons">done</i><a href="#"> Рецензирование заключений экспертов</a> <span class="badge">27</span></li>
                    -->
                    <?php foreach ($dataTypesExpert as $item){echo '<li value="'.$item->id.'" class="types_work"><i class="material-icons">done</i><a>'.$item->name.'</a> <span class="badge">'.ExpertsTypes::getTypes_work($item->id).'</span></li>';}?>
                </ul>
                <div class="block-title text-center">
                    Расширенный поиск
                </div>
                <form id="form-search">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select id="form-search-experts"  class="form-control">
                                    <option value="" disabled selected="selected">Вид экспертизы</option>
                                    <?php foreach ($dataTypesExpert as $item){echo '<option value="'.$item->id.'" class="types_work">'.$item->name.'</option>';}?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select id="form-search-country" class="form-control">
                                    <option value="" disabled selected="selected">Федеральный округ</option>
                                    <option value="1">Центральный</option>
                                    <option value="2">Северо-западный</option>
                                    <option value="3">Южный</option>
                                    <option value="4">Северо-кавказский</option>
                                    <option value="5">Приволжский</option>
                                    <option value="6">Уральский</option>
                                    <option value="7">Сибирский</option>
                                    <option value="8">Дальневосточный</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input id="form-search-name" type="text" class="form-control" placeholder="ФИО эксперта">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p class="text-muted">
                                Начните вводить фамилию эксперта, поиск начнется автоматически
                            </p>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3 col-md-pull-9 text-center">
                <div class="block-title text-center">
                    Справочник
                </div>
                <div class="download">
                    <img src="/img/spr.jpg" alt="Справочник">
                    <a href="/doc/SudExpert_a4_2016.pdf" target="_blank">ОТКРЫТЬ</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="block form-search-result-wrapper" style="display: none">
    <div class="container">
        <div class="block-title text-center">РЕЗУЛЬТАТЫ ПОИСКА</div>
        <div class="pull-right"><a href="">Показать подробное описание</a>|<i class="material-icons">list</i></div>
        <table id="form-search-result" class="table table-hover">
            <thead> <tr> <!--<th>#</th>--> <th>ФИО</th> <th>Стаж</th></tr> </thead>
            <tbody id="form-search-result-body"> </tbody>
        </table>
    </div>
</div>

<div class="block slider-block">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block-title text-center">РЕЕСТР АККРЕДИТОВАННЫХ НЕГОСУДАРСТВЕННЫХ СУДЕБНО-ЭКСПЕРТНЫХ ОРГАНИЗАЦИЙ</div>
            </div>
            <div class="col-sm-3">
                <?= \yii\widgets\ListView::widget([
                    'dataProvider' => $dataImg_org_Main,
                    'itemView' => '_main_img',
                    'layout' => "{items}", //"{summary}\n{items}\n{pager}"
                    'itemOptions'=>[
                        'tag'=>'div',
                        'class'=>'slide',
                    ],
                    'options'=>[
                        'tag'=>'div',
                        'class'=>'slider',
                        'id'=>'slider1',
                    ],
                ]);?>
            </div>
            <div class="col-sm-9">
                <blockquote>
                <h4>Федеральный закон от 31 мая 2001 г. N 73-ФЗ "О государственной судебно-экспертной деятельности в Российской Федерации"</h4>
                <strong>Статья 41. Распространение действия настоящего Федерального закона на судебно-экспертную деятельность лиц, не являющихся государственными судебными экспертами
</strong>
                <p>В соответствии с нормами процессуального законодательства Российской Федерации судебная экспертиза может производиться вне государственных судебно-экспертных учреждений лицами, обладающими специальными знаниями в области науки, техники, искусства или ремесла, но не являющимися государственными судебными экспертами.
</p>
                <p>На судебно-экспертную деятельность лиц, указанных в части первой настоящей статьи, распространяется действие статей 2, 3, 4, 6 - 8, 16 и 17, части второй статьи 18, статей 24 и 25 настоящего Федерального закона.
            </p>
                </blockquote>
            </div>
        </div>
    </div>

</div>



<div class="block prof-block bg-overlay">
    <div class="container">
        <div class="row">
            <div class="col-md-12 block-title text-center">
                ПРОФЕССИОНАЛЬНАЯ ПЕРЕПОДГОТОВКА ЭКСПЕРТОВ
            </div>
            <div class="col-sm-4">
                <div class="lavr img1"></div>
                <div class="lavr-bt">
                    СУДЕБНАЯ <br>
                    финансово-экономическая <br>
                    экспертиза
                </div>
            </div>
            <div class="col-sm-4">
                <div class="lavr img2"></div>
                <div class="lavr-bt">
                    СУДЕБНАЯ <br>
                    строительно-техническая <br>
                    экспертиза
                </div>
            </div>
            <div class="col-sm-4">
                <div class="lavr img3"></div>
                <div class="lavr-bt">
                    СУДЕБНАЯ <br>
                    оценочная <br>
                    экспертиза
                </div>
            </div>
        </div>
    </div>
</div>

<div class="block book-block">
    <div class="container">
        <div class="block-title text-center">
            НАСТОЛЬНАЯ КНИГА ОЦЕНЩИКА, СУДЬИ и  ЮРИСТА
        </div>
        <div class="media">
            <div class="media-left">
                <img class="media-object" src="/img/8.jpg" alt="Книга">
            </div>
            <div class="media-body">
                <p>
                    Оценочная деятельность играет важную роль во многих областях современной экономики – от макроэкономических общегосударственных масштабов до управления отдельно взятым предприятием. В целом ряде случаев закон требует обязательного проведения оценки – при сделках с государственным и муниципальным имуществом, операциях с ценными бумагами, недвижимостью, при наследовании, причинении имущественного вреда, а также начислении имущественных налогов с величины кадастровой стоимости, определяемой оценщиком, и т.д. однако в настоящее время на пути эффективного функционирования института оценки В России встают проблемы, связанные с качественной стороной методов регулирования. Общее назначение регулирования оценочной деятельности – способствовать решению экономических проблем.
                </p>
                <p>
                    Книга будет полезна как для широкого круга практикующих оценщиков и юристов, так и для преподавателей, студентов юридических и экономических вузов, лиц, проходящих профессиональную переподготовку по специальности «оценщик», в качестве учебного пособия. Данное издание вызовет интерес и у заказчиков оценки.
                </p>
                <p>Цена: 800 руб</p>
            </div>
        </div>
        <div class="text-center">
            <a href="http://fsosro.ru/01.01.08.02/book_list.aspx" class="btn btn-warning" target="_blank">КУПИТЬ КНИГУ</a>
            <?=  Html::button("КУПИТЬ КНИГУ", ['class'=>'btn btn-warning ajax-popup',
                    'href'=>Url::to(['/site/contact/ajaxpop','title' => 'Заказать книгу', 'title_body' => 'Чтобы заказать книгу, оставьте заявку
']),
                ]
            )?>
        </div>
    </div>
</div>

<div class="prefooter bg-overlay text-center">
    <div class="container">
        <div class="logo-prefooter"></div>
        <a href="/join" class="btn btn-warning btn-shadow">УСЛОВИЯ ВСТУПЛЕНИЯ <span class="hidden-xs"> В СОЮЗ ФИНАНСОВО-ЭКОНОМИЧЕСКИХ СУДЕБНЫХ ЭКСПЕРТОВ</span></a>
    </div>
</div>










