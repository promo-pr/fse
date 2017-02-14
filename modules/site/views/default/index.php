<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = Yii::$app->name;
?>


<div class="block search-block gray">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div class="block-title text-center">
                    Поиск экспертов по видам экспертиз
                </div>
                <ul class="spec-list bordered">
                    <li><i class="material-icons">done</i><a href="#"> Финансово-экономические</a> <span class="badge">142</span></li>
                    <li><i class="material-icons">done</i><a href="#"> Строительно-технические</a> <span class="badge">112</span></li>
                    <li><i class="material-icons">done</i><a href="#"> Оценочные экспертизы</a> <span class="badge">123</span></li>
                    <li><i class="material-icons">done</i><a href="#"> Оспаривание кадастровой стоимости</a> <span class="badge">45</span></li>
                    <li><i class="material-icons">done</i><a href="#"> Автотехнические</a> <span class="badge">81</span></li>
                    <li><i class="material-icons">done</i><a href="#"> Товароведческие</a> <span class="badge">34</span></li>
                    <li><i class="material-icons">done</i><a href="#"> Почерковедческие</a> <span class="badge">12</span></li>
                    <li><i class="material-icons">done</i><a href="#"> Рецензирование заключений экспертов</a> <span class="badge">27</span></li>
                </ul>
                <div class="block-title text-center">
                    Расширенный поиск
                </div>
                <form id="form-search">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control">
                                    <option value="" disabled selected="selected">Вид экспертизы</option>
                                    <option>Финансово-экономические</option>
                                    <option>Строительно-технические</option>
                                    <option>Оценочные экспертизы</option>
                                    <option>Оспаривание кадастровой стоимости</option>
                                    <option>Автотехнические</option>
                                    <option>Товароведческие</option>
                                    <option>Почерковедческие</option>
                                    <option>Рецензирование заключений экспертов</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control">
                                    <option value="" disabled selected="selected">Федеральный округ</option>
                                    <option>Центральный</option>
                                    <option>Северо-западный</option>
                                    <option>Южный</option>
                                    <option>Северо-кавказский</option>
                                    <option>Приволжский</option>
                                    <option>Уральский</option>
                                    <option>Сибирский</option>
                                    <option>Дальневосточный</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input id="form-search-name" type="text" class="form-control" placeholder="ФИО или название организации">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-warning" name="search-button">НАЙТИ</button>
                            </div>
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
        <table id="form-search-result" class="table table-hover">
            <thead> <tr> <th>#</th> <th>ФИО</th> </tr> </thead>
            <tbody id="form-search-result-body"> </tbody>
        </table>
    </div>
</div>

<div class="block slider-block">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="block-title text-center">РЕЕСТР ЧЛЕНОВ СОЮЗА ФЭСЭ</div>
            </div>
            <div class="col-sm-9">
                <div class="block-title text-center">РЕЕСТР АККРЕДИТОВАННЫХ ОРГАНИЗАЦИЙ</div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="bx-wrapper"><img src="/img/1.jpg" alt="Свидетельство" width="250" height="350"></div>
            </div>
            <div class="col-sm-9">
                <div id="slider1" class="slider">
                    <div class="slide"><img src="/img/1.jpg" alt="Свидетельство" width="250" height="350"></div>
                    <div class="slide"><img src="/img/1.jpg" alt="Свидетельство" width="250" height="350"></div>
                    <div class="slide"><img src="/img/1.jpg" alt="Свидетельство" width="250" height="350"></div>
                    <div class="slide"><img src="/img/1.jpg" alt="Свидетельство" width="250" height="350"></div>
                    <div class="slide"><img src="/img/1.jpg" alt="Свидетельство" width="250" height="350"></div>
                    <div class="slide"><img src="/img/1.jpg" alt="Свидетельство" width="250" height="350"></div>
                    <div class="slide"><img src="/img/1.jpg" alt="Свидетельство" width="250" height="350"></div>
                    <div class="slide"><img src="/img/1.jpg" alt="Свидетельство" width="250" height="350"></div>
                </div>
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

<div class="container">
    <img src="/img/111.jpg" style="max-width: 100%"/>
</div>

<div class="prefooter bg-overlay text-center">
    <div class="container">
        <div class="logo-prefooter"></div>
        <a href="/join" class="btn btn-warning btn-shadow">УСЛОВИЯ ВСТУПЛЕНИЯ <span class="hidden-xs"> В СОЮЗ ФИНАНСОВО-ЭКОНОМИЧЕСКИХ СУДЕБНЫХ ЭКСПЕРТОВ</span></a>
    </div>
</div>










