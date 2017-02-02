<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;

class DefaultController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'flush' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionFlush()
    {
        Yii::$app->cache->flush() ?
            Yii::$app->session->setFlash('success', "Все данные на сайте обновлены.") :
            Yii::$app->session->setFlash('danger', "Что-то пошло не так. Попробуйте очистить кэш позднее.");
        Yii::$app->request->referrer ? $this->redirect(Yii::$app->request->referrer) : $this->goHome();
    }
    
}
