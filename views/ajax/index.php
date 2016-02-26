<?php
/* @var $this yii\web\View */
$this->title = 'Ajax';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1 class="page-header">Ajax</h1>

<div class="panel panel-default">
    <div class="panel-heading">Ajax Link</div>
    <div class="panel-body">
        <?php \yii\widgets\Pjax::begin(); ?>
        <ul>
            <li><?=\yii\helpers\Html::a('Date', ['ajax/show-date'], ['class'=>'', 'role'=>'button'])?></li>
            <li><?=\yii\helpers\Html::a('Time', ['ajax/show-time'], ['class'=>'', 'role'=>'button'])?></li>
        </ul>

        <h1>Show Date : <?=$response?></h1>
        <?php \yii\widgets\Pjax::end();?>
    </div>
</div>
