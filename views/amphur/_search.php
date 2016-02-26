<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\AmphurSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="amphur-search well">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['data-pjax' => true], //add this line to use ajax search
        'fieldConfig' => [
            'template' => '{input}',
        ]
    ]); ?>

    <? //= $form->field($model, 'amphurId') ?>

    <? //= $form->field($model, 'amphurCode') ?>

    <? //= $form->field($model, 'amphurName') ?>

    <? //= $form->field($model, 'geographyId') ?>

    <? //= $form->field($model, 'provinceId') ?>

    <div class="row">
        <div class="col-md-6">
            <div class="input-group">
                <span class="input-group-btn">
                    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                </span>
                <?= Html::activeTextInput($model, 'searchText', ['class' => 'form-control']) ?>

                <? //= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
            </div>
        </div>
        <div class="col-md-6">
            <?=Html::activeDropDownList($model, 'provinceId', \yii\helpers\ArrayHelper::map(\app\models\Province::find()->orderBy('provinceName')->all(), 'provinceId', 'provinceName'), ['class'=>'form-control']);?>
        </div>
    </div>


    <?//= Html::hiddenInput('id', $model->provinceId); ?>

    <?php /*
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>
 */ ?>

    <?php ActiveForm::end(); ?>

</div>
