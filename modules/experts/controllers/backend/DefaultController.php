<?php

namespace app\modules\experts\controllers\backend;

use Yii;
use app\modules\experts\models\backend\Experts;
use app\modules\experts\models\backend\search\ExpertsSearch;
use app\modules\experts\models\backend\Obrazovanie;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DefaultController implements the CRUD actions for Experts model.
 */
class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Experts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExpertsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new expert model.
     * If creation is successful, the browser will be redirected to the 'view' post.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = '@app/views/layouts/admin';
        $model = new Experts();
        $post = Yii::$app->request->post();
        if ($model->load($post) && $model->save()) {
            $transaction = Yii::$app->db->beginTransaction();
            try  {
                $items = $post['SliderItem'];
                $i = 0;
                foreach ($items as $item) {

                        $sliderItem = new Obrazovanie();
                        $sliderItem->name = $item['name'];
                        $sliderItem->type = $item['type'];
                        $sliderItem->specialty = $item['specialty'];
                        $sliderItem->diplom = $item['diplom'];
                        $sliderItem->qualifications = $item['qualifications'];
                        $sliderItem->year = $item['year'];
                        $sliderItem->fid = $model->id;
                        $sliderItem->sort_order = $i;
                        $sliderItem->save();

                    $i++;
                }
                $transaction->commit();
            } catch (\Exception $e) {
                $transaction->rollBack();
            }

            $model->types_work = implode(",", $_POST['Experts']['types_work']);
            $model->save();
            return $this->redirect(['/expert/node/view', 'slug' => $model->slug]);
        } else {
            $modelSliderItem[0] = new Obrazovanie();
            return $this->render('create', [
                'model' => $model,
                'modelSliderItem' => $modelSliderItem,
            ]);
        }
    }

    /**
     * Updates an existing Experts model.
     * If update is successful, the browser will be redirected to the 'view' post.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = '@app/views/layouts/admin';
        $model = $this->findModel($id);
        $post = Yii::$app->request->post();
        if ($model->load($post)) {

            $transaction = Yii::$app->db->beginTransaction();
            try  {
                $i = 0;
                foreach ($post['SliderItem'] as $item) {
                    $err = $_FILES['slide-' . $i]['error'];
                    if ( $item['id'] > 0 || $err == 0 || $item['title'] !== '' || $item['body'] !== '' ) {
                        if ($item['id'] > 0) {
                            $sliderItem = Obrazovanie::findOne($item['id']);
                        } else {
                            $sliderItem = new Obrazovanie();
                        }

                        $sliderItem->name = $item['name'];
                        $sliderItem->type = $item['type'];
                        $sliderItem->specialty = $item['specialty'];
                        $sliderItem->diplom = $item['diplom'];
                        $sliderItem->qualifications = $item['qualifications'];
                        $sliderItem->year = $item['year'];
                        $sliderItem->fid = $model->id;
                        $sliderItem->sort_order = $i;
                        $sliderItem->save();
                    }
                    $i++;
                }
                $transaction->commit();
            } catch (\Exception $e) {
                $transaction->rollBack();
            }

            $model->types_work = implode(",", $_POST['Experts']['types_work']);
            if ($model->save()) {
                return $this->redirect(['/expert/node/view', 'slug' => $model->slug]);
            }
        } else {
            $items = $model->obrazovanie;
            if ( !count($items) ) {
                $items[0] = new Obrazovanie();
            }
            return $this->render('update', [
                'model' => $model,
                'modelSliderItem' => $items,
            ]);
        }
    }

    /**
     * Deletes an existing Restorg model.
     * If deletion is successful, the browser will be redirected to the 'index' Expert.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionObrazovanieItemDelete($id)
    {
        return Obrazovanie::findOne($id)->delete();
    }

    /**
     * Finds the Restorg model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Experts the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Experts::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested post does not exist.');
        }
    }
}
