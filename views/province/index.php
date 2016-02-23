<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ProvinceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Provinces';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="province-index">
    <?php \yii\widgets\Pjax::begin();?>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Province', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'id'=>'province-grid',
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'provinceId',
            'provinceCode',
            'provinceName',
            'geographyId',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php \yii\widgets\Pjax::end();?>

</div>
