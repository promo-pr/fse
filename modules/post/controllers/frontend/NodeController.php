<?php

namespace app\modules\post\controllers\frontend;

use Yii;
use yii\web\Controller;
use app\modules\post\models\backend\Post;
use yii\web\NotFoundHttpException;
use yii\data\Pagination;

class NodeController extends Controller
{
    public function actionView($slug)
    {
        $model = $this->findModelBySlug($slug);
        
        $this->actionParams = [
            'node' => $model->id,
        ];
        $model->seotitle ? Yii::$app->view->title = $model->seotitle : Yii::$app->view->title = $model->title;
        Yii::$app->view->registerMetaTag([
            'name' => 'keywords',
            'content' => $model->keywords,
        ]);
        Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $model->description,
        ]);

        $prev = $model->getPrev();
        $next = $model->getNext();
        $last=$model->getLast();
        $first=$model->getfirst();


        return $this->render('view', [
            'model' => $model,
            'next' => $next,
            'prev' => $prev,
            'last' => $last,
            'first' => $first,
        ]);
    }

    protected function findModelBySlug($slug)
    {
        if (($model = Post::findOne(['slug' => $slug])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException();
        }
    }

}
