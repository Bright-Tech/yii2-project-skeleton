<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\base\Admin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="admin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

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
