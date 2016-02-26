<?php

namespace app\controllers;

class AjaxController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index', ['response'=>date('Y-m-d')]);
    }

    public function actionShowDate()
    {
        return $this->render('index', ['response'=>date('Y-m-d')]);
    }

    public function actionShowTime()
    {
        return $this->render('index', ['response'=>date('H:i:s')]);
    }

}
