<?php

use yii\helpers\Html;
use bright_tech\yii2theme\aceadmin\widgets\PageHeader;
use yii\base\Widget;


/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = '添加用户';
$this->params['breadcrumbs'][] = ['label' => '用户管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?=PageHeader::widget(['title'=>$this->title])?>
<div class="row user-form">
	<div class="col-xs-12">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    </div>
</div>

