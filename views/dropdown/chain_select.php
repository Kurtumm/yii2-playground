<?php
/* @var $this yii\web\View */
use yii\widgets\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use kartik\select2\Select2;

?>
<h1>dropdown/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

<div class="panel panel-default">
    <div class="panel-heading">Basic Chain Select</div>
    <div class="panel-body">
        <ul>
            <li>install widget :: composer require kartik-v/yii2-widget-depdrop "@dev"</li>
            <li>use kartik\depdrop\DepDrop;</li>
        </ul>

        <hr>

        <?php $form = \yii\widgets\ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-4">
                <?= $form->field($districtModel, 'provinceId')->dropDownList(
                    ArrayHelper::map(\app\models\Province::find()->orderBy('provinceName')->all(), 'provinceId', 'provinceName'),
                    ['id' => 'provinceId', 'prompt'=>'Select...']
                )?>
            </div>
            <div class="col-md-4">
                <?= $form->field($districtModel, 'amphurId')->widget(DepDrop::classname(), [
                    'options' => ['id' => 'amphurId'],
                    'pluginOptions' => [
                        'depends' => ['provinceId'],
                        'placeholder' => 'Select...',
                        'url' => Url::to(['/amphur/amphur'])
                    ]
                ]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($districtModel, 'districtId')->widget(DepDrop::classname(), [
                    'options' => ['id' => 'districtId'],
                    'pluginOptions' => [
                        'depends' => ['amphurId'],
                        'placeholder' => 'Select...',
                        'url' => Url::to(['/district/district'])
                    ]
                ]) ?>
            </div>
        </div>
        <?php \yii\widgets\ActiveForm::end(); ?>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">Basic Chain Select with Select2</div>
    <div class="panel-body">
        <ul>
            <li>install widget :: composer require kartik-v/yii2-widget-depdrop "@dev"</li>
            <li>use kartik\depdrop\DepDrop;</li>
            <li>use kartik\select2\Select2;</li>
        </ul>

        <hr>

        <?php $form2 = \yii\widgets\ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-4">
                <?/*= $form->field($districtModel, 'provinceId')->dropDownList(
                    ArrayHelper::map(\app\models\Province::find()->orderBy('provinceName')->all(), 'provinceId', 'provinceName'),
                    ['id' => 'provinceId', 'prompt'=>'Select...']
                ) */?>

                <?=$form2->field($districtModel, 'provinceId')->widget(
                    Select2::className(),
                    [
                        'data'=>ArrayHelper::map(\app\models\Province::find()->orderBy('provinceName')->all(), 'provinceId', 'provinceName'),
                        'options'=>['id'=>'provinceId2']
                    ]
                )?>
            </div>
            <div class="col-md-4">
                <?= $form2->field($districtModel, 'amphurId')->widget(DepDrop::classname(), [
                    'type'=>DepDrop::TYPE_SELECT2,
                    'options' => ['id' => 'amphurId2'],
                    'pluginOptions' => [
                        'depends' => ['provinceId2'],
                        'placeholder' => 'Select...',
                        'url' => Url::to(['/amphur/amphur'])
                    ]
                ]) ?>
            </div>
            <div class="col-md-4">
                <?= $form2->field($districtModel, 'districtId')->widget(DepDrop::classname(), [
                    'type'=>DepDrop::TYPE_SELECT2,
                    'options' => ['id' => 'districtId2'],
                    'pluginOptions' => [
                        'depends' => ['amphurId2'],
                        'placeholder' => 'Select...',
                        'url' => Url::to(['/district/district'])
                    ]
                ]) ?>
            </div>
        </div>
        <?php \yii\widgets\ActiveForm::end(); ?>
    </div>
</div>