<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加新用户', ['create'], ['class' => 'btn btn-success']) ?>
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
                    return User::getstatus($model->status);
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
