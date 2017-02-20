<?php

namespace app\modules\restrorg\models\backend;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;
use app\modules\file\FilesBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "reg_org_sudexp".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $adress
 * @property string $mail
 * @property string $type_work
 * @property string $site
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $status
 * @property string $slug
 * @property integer $image
 */
class Restrorg extends ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_WAIT = 0;

    public $image;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
            ],
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'slug',
                'immutable' => true,
                'ensureUnique' => true,
            ],
           [
                'class' => FilesBehavior::className(),
                'attribute' => 'image',
            ],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reg_org_sudexp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['status'], 'integer'],
            [['adress', 'phone', 'slug','mail','type_work','site'], 'string', 'max' => 255],
            [['image'], 'file', 'maxFiles' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Организация ',
            'adress' => 'Адрес',
            'phone' => 'Телефон',
            'mail' => 'e-mail',
            'type_work' => 'Виды осуществляемой деятельности',
            'site' => 'Сайт',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
            'status' => 'Статус',
            'slug' => 'ЧПУ / URL',
            'image' => 'Свидетельство',
        ];
    }

    public function getPrev ()
    {
        return $this::find()
            ->where(['>', 'updated_at', $this->updated_at])
            ->orderBy('updated_at ASC')
            ->one();
    }

    public function getNext ()
    {
        return $this::find()
            ->where(['<', 'updated_at', $this->updated_at])
            ->orderBy('updated_at DESC')
            ->one();
    }

    public function getLast ()
    {
        return $this::find()
            ->orderBy('updated_at DESC')
            ->one();
    }
    public function getFirst ()
    {
        return $this::find()
            ->orderBy('updated_at ASC')
            ->one();
    }

    public function getStatusName()
    {
        return ArrayHelper::getValue(self::getStatusesArray(), $this->status);
    }

    public static function getStatusesArray()
    {
        return [
            self::STATUS_ACTIVE => 'Опубликовано',
            self::STATUS_WAIT => 'Черновик',
        ];
    }
    
}
