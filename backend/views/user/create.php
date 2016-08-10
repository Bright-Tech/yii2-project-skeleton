<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = '添加用户';
$this->params['breadcrumbs'][] = ['label' => '用户管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">
<?if(!empty($errors)){
    var_dump($errors);
}?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
