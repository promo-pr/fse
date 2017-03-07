<?php

namespace app\modules\experts\models\backend;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "obrazovanie".
 *
 * @property integer $id
 * @property integer $fid
 * @property string $type
 * @property string $name
 * @property integer $year
 * @property string $specialty
 * @property string $diplom
 * @property string $qualifications
 * @property integer $sort_order
 */
class Obrazovanie extends ActiveRecord
{



    public static function tableName()
    {
        return 'obrazovanie';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['id','fid','year','sort_order'], 'integer'],
            [['type', 'name', 'specialty','diplom','qualifications'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Fid' => 'связь с',
            'name' => 'Наименование образовательного учереждения',
            'type' => 'Тип образования',
            'specialty' => 'Специальность',
            'qualifications'=>'Квалификация',
            'diplom'=>'диплом',
        ];
    }

    public function getExperts ()
    {
      return $this->hasMany(Experts::className(), ['id' => 'fid']);
    }

}
