<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\base\Admin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="widget-box light-border" id="widget-box-12" style="display: none">
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
            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-xs-6">
                    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-xs-6">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
            </div>



            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
            <?php if ($model->isNewRecord):?>
                <?= $form->field($model, 'password_hash')->passwordInput() ?>

            <?php else:?>
                <?= $form->field($model, 'status')->radioList(\backend\models\Admin::getuserStatus()) ?>
            <?php endif;?>




            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? '确认添加' : '确认修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<script>
    $('#widget-box-12').on('close.ace.widget', function(event) {
        $(this).slideUp();
        event.preventDefault();//action will be cancelled, widget box won't close
    });
    $("#create-admin").on('click', function(){
        $('#widget-box-12').slideDown();
    });
</script>