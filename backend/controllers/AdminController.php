<?php

namespace backend\controllers;

use Yii;
use backend\models\Admin;
use backend\models\search\searchAdmin;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdminController implements the CRUD actions for Admin model.
 */
class AdminController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
            ],
        ];
    }

    /**
     * Lists all Admin models.
     * @return mixed
     */
    public function actionIndex()
    {

        $type = Yii::$app->request->get('type', 'create');
        $id = Yii::$app->request->get('id', 0);
        $model = null;
        switch ($type) {
            case 'create':
                $model = $this->createModel();
                break;
            case 'update':
                $model = $this->editModel($id);
                break;
            case 'delete':
                $model = $this->deleteModel($id);
                break;

        }
        $searchModel = new searchAdmin();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model
        ]);
    }

    /**
     * Displays a single Admin model.
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
     * Creates a new Admin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return Admin
     */
    public function createModel()
    {
        $model = new Admin();
        $session = Yii::$app->session;
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->generateAuthKey();
            $model->setPassword($model->password);
            if ($model->save()) {
                $session->addFlash('success', '管理员' . $model->name . '已创建');
            } else {
                $session->addFlash('error', '管理员创建失败');
            }

        }
        return $model;
    }

    /**
     * Updates an existing Admin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function editModel($id)
    {
        $model = $this->findModel($id);
        $session = Yii::$app->session;

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            if (!empty($model->password)){
                $model->setPassword($model->password);
            }
            if ($model->save()) {
                $session->addFlash('success', '管理员 ' . $model->name . ' 已更新');
            } else {
                $session->addFlash('error', '管理员更新失败');
            }
        }
        return $model;
    }



    /**
     * Updates an existing Admin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionProfile()
    {
        $id = Yii::$app->user->id;
        $model = $this->findModel($id);
        $session = Yii::$app->session;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $session->addFlash('success',  $model->name . ' 已更新');
        }
        return $this->render('profile', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Admin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function deleteModel($id)
    {
        $model = $this->findModel($id);
        $session = Yii::$app->session;

        if($model->softDelete()){
            $session->addFlash('success', $model->name . '已删除');
        }else{
            $session->addFlash('error', '删除失败');
        }


        return new Admin();
    }

    /**
     * Finds the Admin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Admin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Admin::findOne($id)) !== null) {
            return $model;
        } else {
//            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
