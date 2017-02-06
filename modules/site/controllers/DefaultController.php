<?php

namespace app\modules\site\controllers;

use app\modules\site\models\Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

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

    public function actionSearch()
    {
        $post = \Yii::$app->request->post();

        if ($post) {
            $search = new Search();

            $return_json = $search->find()->where(['like', 'name', $post['name']])->all();

            \Yii::$app->response->format = Response::FORMAT_JSON;

            return $return_json;

        } else {
            throw new NotFoundHttpException('Страница не найдена.');
        }
    }

}
