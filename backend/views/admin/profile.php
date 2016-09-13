<?php

use yii\helpers\Html;
use bright_tech\yii2theme\aceadmin\widgets\PageHeader;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = '个人中心';
$this->params['breadcrumbs'][] = '个人中心';
?>
<div class="user-update">

    <?= PageHeader::widget(['title'=>$this->title])?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
