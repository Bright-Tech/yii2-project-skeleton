<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\base\Organization */

$this->title = 'Create Organization';
$this->params['breadcrumbs'][] = ['label' => 'Organizations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organization-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'provincesList' => $provincesList,
        'citiesList' => $citiesList,
        'districtsList' => $districtsList,
    ]) ?>

</div>
