<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Amphur */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="amphur-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'amphurCode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amphurName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'geographyId')->textInput() ?>

    <?= $form->field($model, 'provinceId')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
