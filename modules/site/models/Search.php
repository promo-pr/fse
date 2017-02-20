<?php

namespace app\modules\site\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "reestr".
 *
 * @property integer $id
 * @property string $fio
 * @property string $work_exp
 * @property string $country
 * @property string $region
 * @property string types_work
 */
class Search extends ActiveRecord
{
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Contact_experts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fio'], 'required'],
            [['fio','work_exp','region','types_work'], 'string', 'max' => 255],
            [['country'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ФИО',
            'work_exp'=>'Стаж',
            'country'=>'Федеральный округ',
            'region'=>'Регион',
            'types_work'=>'Виды экспертиз',
        ];
    }
    
}
