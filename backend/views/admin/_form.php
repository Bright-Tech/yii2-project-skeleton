<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\base\Admin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box light-border form-widget-box" id="form-widget-box" style="<?= $model->isNewRecord?'display: none':'' ?>">
    <div class="widget-header widget-header-flat">
        <h4 class="widget-title lighter">创建/编辑</h4>
        <div class="widget-toolbar no-border">
            <a href="#" data-action="close">
                <i class="ace-icon fa fa-times"></i>
            </a>
        </div>

    </div>

    <div class="widget-body">
        <div class="widget-main">
            <?php $form = ActiveForm::begin(['options' => ['data-pjax' => '']]); ?>
            <?= $form->field($model, 'id')->hiddenInput()->label(false) ?>
            <div class="row">
                <div class="col-xs-6">
                    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-xs-6">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
                </div>
                <div class="col-xs-6">
                    <?= $form->field($model, 'repeatPassword')->passwordInput(['maxlength' => true]) ?>
                </div>
            </div>




            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? '确认添加' : '确认修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
