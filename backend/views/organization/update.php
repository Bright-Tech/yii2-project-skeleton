<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\base\Organization */

$this->title = 'Update Organization: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Organizations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="organization-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'provincesList' => $provincesList,
        'citiesList' => $citiesList,
        'districtsList' => $districtsList,
    ]) ?>

</div>
