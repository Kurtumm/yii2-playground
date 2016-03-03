<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Province */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="province-form">

    <?php $form = ActiveForm::begin([
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => '{label}<div class="col-sm-10">{input}</div>',
            'labelOptions'=>[
                'class'=>'col-sm-2 control-label'
            ]
        ]
    ])?>

    <div class="panel panel-default">
        <div class="panel-heading">Form</div>
        <div class="panel-body">

			<?= $form->field($model, 'provinceCode')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'provinceName')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'geographyId')->textInput() ?>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
