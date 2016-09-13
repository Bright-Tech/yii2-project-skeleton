<?php

use yii\helpers\Html;
use yii\grid\GridView;
use bright_tech\yii2theme\aceadmin\widgets\PageHeader;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\searchAdmin */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '管理员设置';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">


    <?php PageHeader::begin(['title'=>$this->title, 'subTitle'=>'test'])?>
    <?= Html::a('<i class="ace-icon glyphicon glyphicon-plus"></i>添加管理员', ['create'], ['class' => 'btn btn-info btn-link pull-right']) ?>
    <?php PageHeader::end()?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'username',
            [
                'attribute'=>'username',
                'label'=>'登录名'
            ],
            [
                'attribute'=>'name',
                'label'=>'昵称'
            ],
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
////             'name',
//             'email:email',
            [
                'attribute'=>'email',
                'label'=>'用户邮箱'
            ],
            [
                'attribute'=>'status',
                'label'=>'用户状态',
                'value'=>function($model){
                    return \Yii::t('backend', 'UserStatus:'.$model->status);
                },
                'filter'=>\backend\models\Admin::getuserStatus(),
            ],
//             'status',

            [
                'attribute'=>'created_at',
                'format'=>['datetime'],
            ],


            // 'is_deleted',

            ['class' => 'yii\grid\ActionColumn','template' => ' {view}{update} {password}{delete}',
            'buttons'=>[
                'password'=>function ($url, $model, $key) {
                    $options = [
                        'title' => Yii::t('yii', '修改用户密码'),
                        'aria-label' => Yii::t('yii', '修改用户密码'),
                        'data-pjax' => '0',
                    ];
                    return Html::a('<span class="glyphicon glyphicon-cog"></span>',$url,$options);
//                                    '<a class="glyphicon glyphicon-qrcode" data-toggle="modal" data-target="#myModal"></a>';
                }
            ],
            ],
        ],
    ]); ?>
</div>
