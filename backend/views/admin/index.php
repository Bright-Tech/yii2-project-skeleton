<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use bright_tech\yii2theme\aceadmin\widgets\PageHeader;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\searchAdmin */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '管理员设置';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="admin-index">


    <?php PageHeader::begin(['title' => $this->title]) ?>
    <?= Html::tag('button', '<i class="ace-icon glyphicon glyphicon-plus"></i>添加管理员', ['class' => 'btn btn-info btn-link pull-right', 'id' => 'create-admin', 'data-target' => 'form-widget-box']) ?>
    <?php PageHeader::end() ?>

    <?= $this->render('_form', ['model' => $model]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'username',
            'name',
            'email:email',
            [
                'attribute' => 'status',
                'label' => '用户状态',
                'value' => function ($model) {
                    return \Yii::t('backend', 'UserStatus:' . $model->status);
                },
                'filter' => \backend\models\Admin::getuserStatus(),
            ],

            [
                'attribute' => 'created_at',
                'format' => ['datetime'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'buttonOptions' => ['data-pjax' => 1],
                'template' => ' {view}{update}{delete}',
                'urlCreator' => function ($action, $model, $key, $index) {
                    $params = is_array($key) ? $key : ['id' => (string)$key];
                    $params[0] = 'admin/index';
                    $params['type'] = $action;
                    return Url::toRoute($params);
                },
            ],
        ],
    ]); ?>
</div>

