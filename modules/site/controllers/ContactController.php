<?php

namespace app\modules\site\controllers;

use app\modules\site\models\ContactForm;
use yii\web\Controller;
use Yii;
use yii\web\HttpException;

class ContactController extends Controller
{
    public function actionIndex()
    {
        $this->layout = "@app/themes/base/layouts/front";
        $model = new ContactForm();
        $post = Yii::$app->request->post();
        $err = $post['ContactForm']['subject'] == '';
        if ($err && $model->load($post) && $model->contact(Yii::$app->params['supportEmail'])) {
            Yii::$app->session->setFlash('success', "Ваше сообщение отправлено!");
            return $this->refresh();
        } else {
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }
}
