<?php
use yii\widgets\ActiveForm;


?>
<div class="ModelGenerator-default-index">
    <h1 class="page-header">Model Generator</h1>

    <div class="panel panel-default">
        <div class="panel-heading">Form</div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'dbName')->hint('db is default value'); ?>
            <?= $form->field($model, 'nameSpace')->hint('Ex. app\models'); ?>
            <?= $form->field($model, 'folderName')->hint('all model files will save in this folder'); ?>

            <?= \yii\helpers\Html::submitButton('Preview', ['class' => 'btn btn-primary', 'name' => 'preview']) ?>

            <?php ActiveForm::end(); ?>
        </div>
    </div>


    <?php if (isset($tables)): ?>

        <div class="panel panel-default">
            <div class="panel-heading"></div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin();?>


                <?=\yii\helpers\Html::submitButton('Generate', ['class'=>'btn btn-success', 'name'=>'generate'])?>

                <?php ActiveForm::end();?>
            </div>
        </div>

    <?php endif; ?>
</div>
