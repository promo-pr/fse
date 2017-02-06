<?php

namespace app\modules\site\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "reestr".
 *
 * @property integer $id
 * @property string $name
 */
class Search extends ActiveRecord
{
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reestr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
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
        ];
    }
    
}
