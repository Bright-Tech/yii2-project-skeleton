<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;
use bright_tech\yii2theme\aceadmin\widgets\PageHeader;
use yii\base\Widget;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?=PageHeader::widget(['title'=>$this->title])?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="ace-icon glyphicon glyphicon-plus"></i>添加新用户', ['create'], ['class' => 'btn btn-info btn-xs']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            'id',
            'username',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
             'name',
            [
                'attribute'=>'status',
                'value'=>function($model){
                    return \Yii::t('backend', 'UserStatus:'.$model->status);
                }
            ],
             'email:email',

             'created_at:datetime',
             'updated_at:datetime',
            // 'is_deleted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
