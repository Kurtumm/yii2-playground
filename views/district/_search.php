<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\search\DistrictSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="district-search well">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['data-pjax' => true], //add this line to use ajax search
        'fieldConfig' => [
            'template' => '{input}',
        ]
    ]); ?>

    <? /*= $form->field($model, 'districtId') ?>

    <?= $form->field($model, 'districtCode') ?>

    <?= $form->field($model, 'districtName') ?>

    <?= $form->field($model, 'amphurId') ?>

    <?= $form->field($model, 'provinceId')*/ ?>

    <?php // echo $form->field($model, 'geographyId') ?>

    <?php /*
    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>
    */ ?>

    <div class="row">
        <div class="col-md-4">
            <div class="input-group">
                <span class="input-group-btn">
                    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                </span>
                <?= Html::activeTextInput($model, 'searchText', ['class' => 'form-control']) ?>

                <? //= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
            </div>
        </div>
        <div class="col-md-4">
            <?= Html::activeDropDownList($model, 'provinceId', \yii\helpers\ArrayHelper::map(\app\models\Province::find()->orderBy('provinceName')->all(), 'provinceId', 'provinceName'), ['class' => 'form-control', 'id' => 'provinceId']); ?>
        </div>
        <div class="col-md-4">
            <? //=Html::activeDropDownList($model, 'amphurId', \yii\helpers\ArrayHelper::map(\app\models\Amphur::find()->where(['provinceId'=>$model->provinceId])->orderBy('amphurName')->all(), 'amphurId', 'amphurName'), ['class'=>'form-control'])?>
            <?= $form->field($model, 'amphurId')->widget(DepDrop::classname(), [
                'data'=>\yii\helpers\ArrayHelper::map(\app\models\Amphur::find()->where(['provinceId'=>$model->provinceId])->orderBy('amphurName')->all(), 'amphurId', 'amphurName'),
                'options' => ['id' => 'amphurId'],
                'pluginOptions' => [
                    'depends' => ['provinceId'],
                    'placeholder' => 'Select...',
                    'url' => Url::to(['/amphur/amphur'])
                ]
            ]) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
