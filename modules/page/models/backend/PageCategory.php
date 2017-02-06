<?php

namespace app\modules\page\models\backend;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "page_category".
 *
 * @property integer $id
 * @property string $title
 * @property string $body
 * @property string $slug
 */
class PageCategory extends ActiveRecord
{

    public function behaviors()
    {
        return [
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',
                'immutable' => true,
                'ensureUnique' => true,
            ],
        ];
    }

    public static function tableName()
    {
        return 'page_category';
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['body'], 'string'],
            [['title', 'slug'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название категории',
            'body' => 'Описание',
            'slug' => 'ЧПУ / URL',
        ];
    }

    public function getPages ()
    {
      return $this->hasMany(Page::className(), ['category_id' => 'id']);
    }

}
