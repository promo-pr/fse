<?php
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $item app\modules\experts\models\backend\obrazovanie */

?>

<div class="dynamic-form-item">
    <div class="form-group field-slider-item-title">
        <div class="col-xs-12 col-md-12">
            <label class="control-label"> <i class="material-icons" style="  font-size: 14px; ">work</i> Добавить образование</label>
            <div class="form-group field-slider-action pull-right">
                <div class="btn btn-default sort-item"><i class="material-icons">swap_vert</i></div>
                <div class="btn btn-danger remove-item"><i class="material-icons">delete_forever</i></div>
                <div class="btn btn-primary add-item"><i class="material-icons">add</i></div>
            </div>
        </div>
    <div class="row">
            <div class="col-xs-8 col-md-8">
                <input type="hidden" class="slider-item-id" name = "SliderItem[<?= $i ?>][id]" value="<?= $item->id; ?>">
                <label class="control-label">Наименование образовательного учереждения</label>
                <input type="text" class="slider-item-name form-control" name="SliderItem[<?= $i ?>][name]" value="<?= $item->name; ?>" maxlength="255">
            </div>
            <div class="col-xs-4 col-md-4">
                <label class="control-label">Тип образования</label>
                <select class="slider-item-type form-control" name="SliderItem[<?= $i ?>][type]">
                    <option value="1" <?php if ($item->type==1) echo 'selected';?>>Сведения о высшем образовании</option>
                    <option value="2" <?php if ($item->type==2) echo 'selected';?>>Сведения о дополнительном образовании</option>
                    <option value="3" <?php if ($item->type==3) echo 'selected';?>>Сведения о повышении квалификации</option>
                    <option value="4" <?php if ($item->type==4) echo 'selected';?>>Наличие дополнительных квалификационных аттестатов</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3 col-md-3">
                <label class="control-label">Номер диплома и дата выдачи</label>
                <input type="text" class="slider-item-diplom form-control" name="SliderItem[<?= $i ?>][diplom]" value="<?= $item->diplom; ?>" maxlength="255">
            </div>
            <div class="col-xs-2 col-md-2">
                <label class="control-label">Год окончания</label>
                <input type="text" class="slider-item-year form-control" name="SliderItem[<?= $i ?>][year]" value="<?= $item->year; ?>">
            </div>
            <div class="col-xs-3 col-md-3">
            <label class="control-label">Специальность</label>
            <input type="text" class="slider-item-specialty form-control" name="SliderItem[<?= $i ?>][specialty]" value="<?= $item->specialty; ?>" maxlength="255">
            </div>

            <div class="col-xs-4 col-md-4">
            <label class="control-label">Квалификация, профессия</label>
            <input type="text" class="slider-item-qualifications form-control" name="SliderItem[<?= $i ?>][qualifications]" value="<?= $item->qualifications; ?>" maxlength="255">
            </div>

        </div>
    </div>


    <div class="help-block"></div>
</div>