<?php

namespace app\controllers;

use app\models\Amphur;
use app\models\Province;
use Yii;
use app\models\District;
use app\models\search\DistrictSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * DistrictController implements the CRUD actions for District model.
 */
class DistrictController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all District models.
     * @return mixed
     */
    public function actionIndex($amphurId=null, $provinceId=null)
    {
        $searchModel = new DistrictSearch();
        $searchModel->amphurId = isset($amphurId) ? $amphurId : $_GET['DistrictSearch']['amphurId'];

        $amphurModel = Amphur::find()->where(['amphurId'=>$searchModel->amphurId])->one();

        $searchModel->provinceId = $amphurModel->provinceId;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single District model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new District model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new District();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->districtId]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing District model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->districtId]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing District model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the District model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return District the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = District::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDistrict()
    {
        if (isset($_POST['depdrop_parents'])) {
            $parent = $_POST['depdrop_parents'];
            $amphurId = $parent[0];

            $districts = District::find()->where(['amphurId' => $amphurId])->all();

            $output = [];
            foreach ($districts as $district) {
                $output[] = ['id'=>$district->districtId, 'name'=>$district->districtName];
            }

            echo Json::encode(['output' => $output, 'selected' => '']);
        } else
            echo Json::encode(['output' => '', 'selected' => '']);
    }
}
