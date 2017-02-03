<?php

namespace app\modules\site\controllers;

use yii\web\Controller;

class DefaultController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $this->layout = "@app/themes/base/layouts/front";
        return $this->render('index');
    }

}
