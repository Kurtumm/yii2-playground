<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\UsersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-search well">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => ['data-pjax' => true], //add this line to use ajax search
    ]); ?>

    <div class="input-group">
        <span class="input-group-btn">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        </span>
        <?= Html::activeTextInput($model, 'searchText', ['class'=>'form-control'])?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
