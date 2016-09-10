<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\base\Admin */

$this->title = '修改管理员信息';
$this->params['breadcrumbs'][] = ['label' => '管理员设置', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
