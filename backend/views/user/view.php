<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '用户管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改用户信息', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除该用户', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除该用户?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
            'name',
            'email:email',
            [
                'label' =>'状态',
                'attribute'=> 'status',
                'value'=>User::getstatus($model->status),

            ],
            'created_at:datetime',
            'updated_at:datetime',
//            'is_deleted',
        ],
    ]) ?>

</div>
