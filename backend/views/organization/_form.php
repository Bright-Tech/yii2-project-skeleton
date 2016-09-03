<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model common\models\base\Organization */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="organization-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'province_id')->dropDownList( $provincesList,['prompt'=>'请选择','style'=>'width:120px']) ?>

    <?= $form->field($model, 'city_id')->dropDownList( $citiesList,['prompt'=>'请选择','style'=>'width:120px']) ?>

    <?= $form->field($model, 'district_id')->dropDownList( $districtsList,['prompt'=>'请选择','style'=>'width:120px']) ?>

    <?= $form->field($model, 'better_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '保存', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">
$(function(){
    $("#organization-province_id").on("change", function(){
    	$.ajax({
    		url: "<?= Url::toRoute('organization/city-by-province') ?>",
    		type: 'post',
    		data: {'id':$(this).val()},
    		dataType:"json",
    		success: function( $cities )
    		{
    			$("#organization-city_id option:gt(0)").remove();
    			$("#organization-district_id option:gt(0)").remove();
    			$.each($cities,function(index, value)
    			{
    				$('<option value="' + index + '" >' + value + '</option>').appendTo("#organization-city_id");
    			});
        	}
    	});
    });
    $("#organization-city_id").on("change", function(){
    	$.ajax({
    		url: "<?= Url::toRoute('organization/district-by-city') ?>",
    		type: 'post',
    		data: {'id':$(this).val()},
    		dataType:"json",
    		success: function( $districts )
    		{
    			$("#organization-district_id option:gt(0)").remove();
    			$.each($districts,function(index, value)
    			{
    				$('<option value="' + index + '" >' + value + '</option>').appendTo("#organization-district_id");
    			});
        	}
    	});
    });
})
</script>
