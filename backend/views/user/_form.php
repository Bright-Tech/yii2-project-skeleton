<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\AuthItem;
use common\models\AuthAssignment;
$AuthItem=AuthItem::find()->all();
foreach ($AuthItem as $value){
    $select[$value['name']]=$value['description'];
}
$Auth=AuthAssignment::find()->where(['user_id'=>$model->id])->all();
$check=array();
foreach ($Auth as $value){
    $check[]=$value['item_name'];
}

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
$model->password_hash=$model->password_hash?'':'';
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput() ?>
    <?= $form->field($model, 'name')->textInput() ?>
    <?= $form->field($model, 'email')->textInput() ?>
    <?= $form->field($model, 'password_hash')->passwordInput()?>
    <?= $form->field($model, 'repeat_password')->passwordInput()->label('确认密码') ?>
    <?= Html::checkboxList('rabc',$check,$select) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '确认添加' : '确认修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
