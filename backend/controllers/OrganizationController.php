<?php

namespace backend\controllers;

use Yii;
use common\models\base\Organization;
use backend\models\search\searchOrganization;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\base\District;

/**
 * OrganizationController implements the CRUD actions for Organization model.
 */
class OrganizationController extends Controller
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
     * Lists all Organization models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new searchOrganization();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Organization model.
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
     * Creates a new Organization model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Organization();
        $provincesList = District::getProvinceList();
        $citiesList = [];
        $districtsList = [];

        if ($model->load(Yii::$app->request->post())) {
            $data = Yii::$app->request->post('Organization');
            $model->province_cn = District::findOne($data['province_id'])->name;
            $model->city_cn = District::findOne($data['city_id'])->name;
            $model->district_cn = District::findOne($data['district_id'])->name;
            if ($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }else {
                var_dump($model->getErrors());
            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
                'provincesList' => $provincesList,
                'citiesList' => $citiesList,
                'districtsList' => $districtsList,
            ]);
        }
    }

    /**
     * Updates an existing Organization model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $provincesList = District::getProvinceList();
        $citiesList = District::getCitiesList($model->province_id);
        $districtsList = District::getDistrictsList($model->city_id);

        if ($model->load(Yii::$app->request->post())) {
            $data = Yii::$app->request->post('Organization');
            $model->province_cn = District::findOne($data['province_id'])->name;
            $model->city_cn = District::findOne($data['city_id'])->name;
            $model->district_cn = District::findOne($data['district_id'])->name;
            if ($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }else {
                var_dump($model->getErrors());
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'provincesList' => $provincesList,
                'citiesList' => $citiesList,
                'districtsList' => $districtsList,
            ]);
        }
    }

    /**
     * Deletes an existing Organization model.
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
     * Finds the Organization model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Organization the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Organization::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
     * 省、市、区联动
     * @return \Response
     */
    public function actionCityByProvince(){
        $provinceId = $_POST['id'];
        if ($provinceId != null) {
            $cities = District::getCitiesList($provinceId);
        }else {
            $cities = [];
        }
    
        return json_encode($cities);
    }
    
    public function actionDistrictByCity(){
        $cityId = $_POST['id'];
        if ($cityId != null){
            $districts = District::getDistrictsList($cityId);
        }else {
            $districts = [];
        }
    
        return json_encode($districts);
    }
}
