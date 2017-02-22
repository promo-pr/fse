<?php

namespace app\modules\experts\models\backend;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "types_expertiz".
 *
 * @property integer $id
 * @property string $name
 */
class ExpertsTypes extends ActiveRecord
{

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'immutable' => true,
                'ensureUnique' => true,
            ],
        ];
    }

    public static function tableName()
    {
        return 'types_expertiz';
    }

    public function rules()
    {
        return [
            [['name'], 'required'],
            [['id'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Вид экспертизы',
        ];
    }

    public static function getTypes_work($id)
    {
        $mtype=Experts::find()->where(['like', 'types_work', strval($id)])->all();
        $count = count($mtype);
        return $count;

    }

    public function getExpert ()
    {
      return $this->hasMany(ExpertsTypes::className(), ['id' => 'id']);
    }

}
