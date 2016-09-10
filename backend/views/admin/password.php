<?php

use yii\helpers\Html;
use bright_tech\yii2theme\aceadmin\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\base\Admin */

$this->title = '修改管理员密码';
$this->params['breadcrumbs'][] = ['label' => '管理员设置', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$model->password_hash='';
?>
<div class="admin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="admin-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'password_old')->passwordInput() ?>

        <?= $form->field($model, 'password_hash')->passwordInput() ?>

        <?= $form->field($model, 'repeat_password')->passwordInput() ?>

        <div class="form-group">
            <?= Html::submitButton('确认修改', ['class'=> 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
