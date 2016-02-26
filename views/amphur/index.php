<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AmphurSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

\yii\widgets\Pjax::begin();
$this->title = 'Amphurs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="province-view">
    <h1><?= Html::encode($provinceName) ?></h1>
</div>

<div class="amphur-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Amphur', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'amphurId',
//            'amphurCode',
            'amphurName',
            [
                'attribute'=>'amphurName',
                'format'=>'html',
                'value'=>function($model){
                    return Html::a($model->amphurName, ['/district?amphurId='.$model->amphurId]);
                }
            ],
//            'geographyId',
//            'provinceId',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
<?php \yii\widgets\Pjax::end();?>
