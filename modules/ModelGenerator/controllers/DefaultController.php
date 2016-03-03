<?php

namespace app\modules\ModelGenerator\controllers;

use app\modules\ModelGenerator\models\ModelGenerator;
use yii\db\Exception;
use yii\web\Controller;
use Yii;
use yii\gii\generators\model\Generator;

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


        $tables = [];

        if (isset($_POST['ModelGenerator'])) {
            $tables = [];
            $connectionName = $_POST['ModelGenerator']['dbName'];
            $model->nameSpace = $_POST['ModelGenerator']['nameSpace'];
            $model->folderName = $_POST['ModelGenerator']['folderName'];

            $modelNameSpace = $model->nameSpace . '\\' . $model->folderName;

            $connection = Yii::$app->{$connectionName};

            $cmd = $connection->createCommand('SHOW TABLES');
            $tbs = $cmd->queryAll();

            foreach ($tbs as $tb) {
                foreach ($tb as $tableName) {
                    $tn = explode('_', $tableName);
                    $tn = array_map('ucwords', $tn);
                    $modelClass = implode('', $tn);

                    //Master Model
                    $generator = new Generator();
                    $generator->db = $connectionName;
                    $generator->tableName = $tableName;
                    $generator->modelClass = $modelClass . 'Master';
                    $generator->ns = $modelNameSpace . '\master';
                    $generator->baseClass = $modelNameSpace . '\ModelMaster';
                    $files = $generator->generate();
                    $answers = [];
                    foreach ($files as $file) {
                        $answers[$file->id] = 1;
                    }
                    $result = '';

                    //Extend Model
                    $generator2 = new Generator();
                    $generator2->db = $connectionName;
                    $generator2->tableName = $tableName;
                    $generator2->modelClass = $modelClass;
                    $generator2->ns = $modelNameSpace;
                    $generator2->baseClass = $generator->ns . '\\' . $generator->modelClass;
                    $generator2->templates['extends'] = Yii::getAlias('@app/gii/templates/model/extends');
                    $generator2->template = 'extends';
                    $files2 = $generator2->generate();
                    $answers2 = [];
                    foreach ($files2 as $file2) {
                        $answers2[$file2->id] = 1;
                    }
                    $result2 = '';

                    if ($generator->save($files, $answers, $result)) {
//                        echo '<p>';
//                        echo 'tableName:' . $generator->tableName . ', modelClass:' . $generator->modelClass . '<br />';

                        //check file exist
                        if (!file_exists(Yii::getAlias('@' . str_replace('\\', '/', $generator2->ns)) . '/' . $generator2->modelClass . '.php')) {
                            if ($generator2->save($files2, $answers2, $result2)) {
//                                echo Yii::getAlias('@' . str_replace('\\', '/', $generator2->ns)) . '/' . $generator2->modelClass . '.php<br />';
//                                echo 'tableName:' . $generator2->tableName . ', modelClass:' . $generator2->modelClass . '<br />';
                            }
                        }
//                        echo '</p>';

                        $tables[] = [
                            'name' => $generator->tableName,
                            'master' => $generator->modelClass,
                            'model' => $generator2->modelClass
                        ];
                    } else {
                        break;
                    }
                }
            }
        }

//        if (isset($_POST['generate'])) {
//
//        }

//        throw new Exception(print_r($tables, true));
        return $this->render('index', compact('model', 'tables'));
    }

    public function genModelName($tableName, $nameSpace)
    {

    }
}
