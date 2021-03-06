<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Province */

$this->title = 'Update Province: ' . ' ' . $model->provinceId;
$this->params['breadcrumbs'][] = ['label' => 'Provinces', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->provinceId, 'url' => ['view', 'id' => $model->provinceId]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="province-update">

    <h1 class="page-header"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
