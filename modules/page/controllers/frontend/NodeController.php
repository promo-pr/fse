<?php

namespace app\modules\page\controllers\frontend;

use app\modules\page\models\backend\PageCategory;
use Yii;
use yii\web\Controller;
use app\modules\page\models\backend\Page;
use yii\web\NotFoundHttpException;

class NodeController extends Controller
{
    public function actionView($category_slug, $slug)
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

        return $this->render('view', [
            'model' => $model
        ]);
    }

  public function actionCategory($category_slug)
  {
    $model = $this->findModelCategory($category_slug);

    $this->actionParams = [
      'node' => 'category-' . $model->id,
    ];

    $pages = $model->pages;

    return $this->render('category', [
      'model' => $model,
      'pages' => $pages
    ]);
  }

    protected function findModelBySlug($slug)
    {
        if (($model = Page::findOne(['slug' => $slug])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('Страница не найдена');
        }
    }

  protected function findModelCategory($category_slug)
  {
    if (($model = PageCategory::findOne(['slug' => $category_slug])) !== null) {
      return $model;
    } else {
      throw new NotFoundHttpException('Страница не найдена');
    }
  }

}
