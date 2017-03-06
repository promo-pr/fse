<?php

namespace app\modules\site\controllers;

use yii\data\ActiveDataProvider;
use app\modules\restrorg\models\backend\Restrorg;
use app\modules\post\models\backend\Post;
use app\modules\experts\models\backend\ExpertsTypes;
use app\modules\experts\models\backend\Experts;
use yii\db\ActiveQuery;
use yii\helpers\ArrayHelper;
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
        $dataImg_org_Main = new ActiveDataProvider([
            'query' => Restrorg::find()->where(['status'=>1])->orderBy('updated_at DESC'),
        ]);
        $dataPageMain = new ActiveDataProvider([
            'query' => Post::find()->where(['status'=>1])->orderBy('updated_at DESC'),
            'pagination' => [
                'pageSize' => 2,
            ],
        ]);
        $dataTypesExpert =ExpertsTypes::find()->all();

        return $this->render('index',[
            'dataImg_org_Main'=>$dataImg_org_Main,
            'dataPageMain'=>$dataPageMain,
            'dataTypesExpert'=>$dataTypesExpert

        ]);
    }


    public function actionSearch()
    {
        $post = \Yii::$app->request->post();

        if ($post) {
            //$search = new Experts();
            //$return_json = $search->find()->filterWhere(['like', 'fio', $post['fio']])->andfilterWhere(['like', 'types_work', $post['types_work']])->andfilterWhere(['=', 'county', $post['county']])->all();
            $return_json = Experts::find()
                ->joinWith(['types'])
                ->andFilterWhere(['like', 'fio', $post['fio']])->andFilterWhere(['like', 'types_work', $post['types_work']])->andFilterWhere(['=', 'county', $post['county']])
                ->andFilterWhere(['=', 'Types_Experts.type', $post['types_work']])
                ->all();
            \Yii::$app->response->format = Response::FORMAT_JSON;

            return $return_json;

        } else {
            throw new NotFoundHttpException('Страница не найдена.');
        }

    }

    public function actionEvent()
    {
        return $this->render('event');
    }

    public function actionNews()
    {$this->layout = "@app/themes/base/layouts/main";
        return $this->render('news');
    }

    public function mbCutString($str, $length, $postfix=' ...', $encoding='UTF-8')
    {
        if (mb_strlen($str, $encoding) <= $length) {
            return $str;
        }

        $tmp = mb_substr($str, 0, $length, $encoding);
        return mb_substr($tmp, 0, mb_strripos($tmp, ' ', 0, $encoding), $encoding) . $postfix;
    }
}
