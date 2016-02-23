<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Amphur */

$this->title = $model->amphurId;
$this->params['breadcrumbs'][] = ['label' => 'Amphurs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="amphur-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->amphurId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->amphurId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'amphurId',
            'amphurCode',
            'amphurName',
            'geographyId',
            'provinceId',
        ],
    ]) ?>

</div>
