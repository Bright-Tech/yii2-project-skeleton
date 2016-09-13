<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use bright_tech\yii2theme\aceadmin\widgets\PageHeader;
$this->title='系统设置';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">


    <?php PageHeader::begin(['title'=>$this->title, 'subTitle'=>'test'])?>
    <?php PageHeader::end()?>
    <?php $form=ActiveForm::begin()?>
    <?php foreach ($model as $value):?>
        <?=$form->field($value,'value')->textInput(['name'=>'key['.$value->key.']'])->label($value->label)?>
    <?php endforeach;?>
    <div class="form-group">
        <?= Html::submitButton('确认修改', ['class'=> 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end()?>
</div>