<?php
namespace backend\controllers;
use common\models\Property;
use yii\web\Controller;
use Yii;
/**
 * Created by PhpStorm.
 * User: JX
 * Date: 2016/9/13
 * Time: 16:45
 */

class SystemController extends Controller{
    public function actionIndex(){
        $model=Property::find()->all();
        $post=yii::$app->request->post();
        if(yii::$app->request->isPost){
            foreach ($post['key'] as$key =>$value){
               $Property=Property::findOne(['key'=>$key]);
               $Property->value=$value;
                $Property->save();
            }
            Yii::$app->cache->flush();
            Yii::$app->session->setFlash('success', '更新成功');
            return $this->render('index',['model'=>$model]);
        }else{
            return $this->render('index',['model'=>$model]);
        }

    }
}