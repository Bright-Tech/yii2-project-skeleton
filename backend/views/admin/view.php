<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\base\Admin */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '管理员设置', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改管理员信息', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('修改管理员密码', ['password', 'id' => $model->id], ['class' => 'btn btn-info']) ?>
        <?= Html::a('删除该管理员', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '是否删除该管理员?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'username',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
            'name',
            'email:email',
            [
                'attribute'=>'status',
                'label'=>'用户状态',
                'format'=>'raw',
                'value'=>\Yii::t('backend', 'UserStatus:'.$model->status),

            ],
//             'status',

            [
                'attribute'=>'created_at',
                'format'=>['datetime'],
            ],
            [
                'attribute'=>  'updated_at',
                'format'=>['datetime'],
            ],

        ],
    ]) ?>

</div>
