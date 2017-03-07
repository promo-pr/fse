<?php

namespace app\modules\experts\models\backend;

use yii\behaviors\TimestampBehavior;
use yii\behaviors\SluggableBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "Contact_experts".
 *
 * @property integer $id
 * @property string $county
 * @property string $fio
 * @property string $work_exp
 * @property string $region
 * @property string $company
 * @property string $post
 * @property integer $types_work
 * @property integer $adress
 * @property integer $phone
 * @property string $mail
 * @property string $site
 * @property string $created_at
 * @property string $updated_at
 * @property string $status
 * @property string $slug
 * @property string $degree
 * @property string $partaker
 */
class Experts extends ActiveRecord
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
         /*   [
                'class' => FilesBehavior::className(),
                'attribute' => 'image',
            ],*/
        ];
    }
    
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
            [['types_work','created_at', 'updated_at'], 'safe'],
            [['status','county'], 'integer'],
            [['adress', 'phone', 'slug','mail','site','post','company','region','work_exp','degree','partaker'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'county' =>'Федеральный округ',
            'fio' => 'Фамилия Имя Отчество ',
            'post' => 'Должность ',
            'company' => 'Компания ',
            'region' => 'Регион',
            'work_exp' => 'Стаж ',
            'degree'=>'Ученая степень, звание',
            'partaker'=>'Членство в организациях',
            'adress' => 'Адрес',
            'phone' => 'Контактный телефон',
            'mail' => 'e-mail',
            'types_work' => 'Виды экспертиз',
            'site' => 'Сайт',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
            'status' => 'Статус',
            'slug' => 'ЧПУ / URL',
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
    public function getObrazovanie ()
    {
        return $this->hasMany(Obrazovanie::className(), ['fid' => 'id'])
            ->orderBy(['sort_order' => SORT_ASC]);
    }

    public function getItems()
    {
        return $this->hasMany(Obrazovanie::className(), ['fid' => 'id'])
            ->orderBy(['sort_order' => SORT_ASC]);
    }

    public function getTypes()
    {
        return $this->hasMany(TypesExperts::className(), ['fid' => 'id']);
    }

    public static function getStatusesArray()
    {
        return [
            self::STATUS_ACTIVE => 'Опубликовано',
            self::STATUS_WAIT => 'Черновик',
        ];
    }
    
}
