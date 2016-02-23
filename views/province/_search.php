<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\ProvinceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="province-search well">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['data-pjax' => true], //add this line to use ajax search
        'fieldConfig' => [
            'template' => '{input}',
        ]
    ]); ?>

    <? //= $form->field($model, 'provinceId') ?>

    <? //= $form->field($model, 'provinceCode') ?>

    <? //= $form->field($model, 'provinceName') ?>
    <?//= $form->field($model, 'searchText', ['template'=>'{input}'])->textInput() ?>


    <? //= $form->field($model, 'geographyId') ?>

    <div class="input-group">
        <span class="input-group-btn">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
      </span>
        <?= Html::activeTextInput($model, 'searchText', ['class'=>'form-control'])?>

        <?//= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
