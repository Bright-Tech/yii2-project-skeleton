<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use bright_tech\yii2theme\aceadmin\widgets\PageHeader;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = '个人中心';
$this->params['breadcrumbs'][] = '个人中心';
?>
<div class="user-update">

    <?= PageHeader::widget(['title' => $this->title]) ?>
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1">
            <?php $form = ActiveForm::begin(['options' => ['data-pjax' => '']]); ?>
            <?= $form->field($model, 'id')->hiddenInput()->label(false) ?>

            <h4 class="header blue bolder smaller">个人信息</h4>
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            <h4 class="header blue bolder smaller">登陆信息</h4>
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'repeatPassword')->passwordInput(['maxlength' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? '确认添加' : '确认修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
