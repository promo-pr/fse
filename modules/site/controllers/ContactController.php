<?php

namespace app\modules\site\controllers;

use app\modules\site\models\ContactForm;
use app\modules\site\models\CallForm;
use yii\web\Controller;
use Yii;

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

    public function actionAjaxpop($title, $title_body)
    {

        $model = new CallForm();
        if (Yii::$app->request->isAjax) {
            if ( $model->load(Yii::$app->request->post()) && $model->sendAjaxForm(Yii::$app->params['adminEmail']) ) {
                $message = '<div class="container" ><div class="text-center thank-page ">
	<img src="img/checkmark.png" alt="" class="text-center">
	<h3 style="color: wheat">Спасибо за ваш заказ</h3>
	<p style="color: wheat">наш администратор позвонит вам в ближайшее время</p>
</div></div>'; // TODO: Refactor
                return $message;
            } else {

                return $this->renderPartial('callpop', [
                    'model' => $model,
                    'title' => $title,
                    'title_body'=>$title_body,

                ]);
            }
        } else {
            if ($model->load(Yii::$app->request->post()) && $model->sendAjaxForm(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('contactFormSubmitted');
                return $this->refresh();
            } else {
                return $this->render('callpop', [
                    'model' => $model,
                    'title' => $title,
                    'title_body'=>$title_body,

                ]);
            }
        }


    }
}
