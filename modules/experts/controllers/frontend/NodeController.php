<?php

namespace app\modules\experts\controllers\frontend;

use yii\web\Controller;
use app\modules\experts\models\backend\search\ExpertsSearch;
use app\modules\experts\models\backend\Experts;
use app\modules\experts\models\backend\TypesExperts;

class NodeController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new ExpertsSearch();

        return $this->render('index', [
            'model' => $searchModel,
        ]);
    }

    public function actionView($slug)
    {
        $model = $this->findModelBySlug($slug);
        
        $this->actionParams = [
            'node' => $model->id,
        ];
        $itemst = $model->types;
        if ( !count($itemst) ) {
            $itemst[0] = new TypesExperts();
        }
        return $this->render('view', [
            'model' => $model,
            'typeItems' =>$itemst,
        ]);
    }

    protected function findModelBySlug($slug)
    {
        if (($model = Experts::findOne(['slug' => $slug])) !== null) {
            return $model;
        } else {
          //  throw new NotFoundHttpException();
        }
    }

}
