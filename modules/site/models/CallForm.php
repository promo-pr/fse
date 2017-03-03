<?php

namespace app\modules\site\models;

use Yii;
use yii\base\Model;
use app\components\TelefonValidator;
use yii\helpers\Html;

class CallForm extends Model
{
    public $name;
    public $tel;
    public $hour;
    public $min;
    public $body;
    
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['tel','body'], 'required'],
            ['name', 'required'],
            ['tel', TelefonValidator::className()],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'tel' => 'Номер телефона',
            'body' => 'Коментарий',

        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param  string  $email the target email address
     * @return boolean whether the model passes validation
     */
    public function sendAjaxForm($email)
    {
        if ($this->validate()) {
            //$body = 'Name: '.$this->name.' Telefon: '.$this->tel.'Коментарий: '.$this->body;
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                ->setSubject(Yii::$app->name)

                ->setHtmlBody('Name: '.Html::encode($this->name).' Telefon: '.$this->tel.' Koment: '.Html::encode($this->body))
                ->send();

            return true;
        } else {
            return false;
        }
    }
}
