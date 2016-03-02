<?php

namespace app\modules\ModelGenerator\controllers;

use app\modules\ModelGenerator\models\ModelGenerator;
use yii\web\Controller;
use Yii;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        $model = new ModelGenerator();
        $model->dbName = 'db';
//        $model->nameSpace = 'app\models';

//        $dsn = Yii::$app->db->dsn;
//        $dsn = explode('dbname=', $dsn);
//        $dbName = end($dsn);
//        $dbNames = explode('_', $dbName);
//
//        $name = '';
//        foreach ($dbNames as $item) {
//            $item = ucfirst($item);
//            $name .= $item;
//        }
//
//        $model->folderName = $name;


        $tables = null;

        if (isset($_POST['preview'])) {
            $tables = [];
        }

        if (isset($_POST['generate'])) {

        }

        return $this->render('index', compact('model', 'tables'));
    }
}
