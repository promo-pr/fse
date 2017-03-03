<?php

namespace app\modules\experts\models\backend;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "TypesExperts".
 * ВИДЫ ЭКСПЕРТИЗ ЭКСПЕРТЫ
 * @property integer $id
 * @property integer $fid
 * @property integer $type
 */
class TypesExperts extends ActiveRecord
{



    public static function tableName()
    {
        return 'Types_Experts';
    }

    public function rules()
    {
        return [
            [['id','fid','type'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Fid' => 'связь с',
            'type' => 'Тип экспертиз',
        ];
    }

    public function getExperts ()
    {
      return $this->hasMany(Experts::className(), ['id' => 'fid']);
    }

    public static function getTypes_count($id)
    {
        $mtype=TypesExperts::find()->where(['=', 'type',$id])->all();
        $count = count($mtype);
        return $count;

    }
}
