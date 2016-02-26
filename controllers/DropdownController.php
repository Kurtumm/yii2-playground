<?php

namespace app\controllers;

use app\models\Amphur;
use app\models\District;
use app\models\Province;

class DropdownController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionChainSelect()
    {
        $districtModel = new District();
        return $this->render('chain_select', compact('districtModel'));
    }

}
