<?php

namespace app\controllers;

use Yii;
use yii\gii\generators\model\Generator;

class GenerateModelController extends \yii\web\Controller
{
    public function actionIndex()
    {
        /**
         * Multiple DB
         * change db to your connection name
         */
        $connectionName = 'db';
        $modelNameSpace = 'app\models';

        $connection = \Yii::$app->{$connectionName};

        $model = $connection->createCommand('SHOW TABLES');
        $tables = $model->queryAll();

        foreach ($tables as $table) {
            foreach ($table as $tableName) {
                $tn = explode('_', $tableName);
                $tn = array_map('ucwords', $tn);
                $modelClass = implode('', $tn);

                //Master Model
                $generator = new Generator();
                $generator->db = $connectionName;
                $generator->tableName = $tableName;
                $generator->modelClass = $modelClass.'Master';
                $generator->ns = $modelNameSpace.'\master';
                $generator->baseClass = $modelNameSpace.'\ModelMaster';
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
                $generator2->baseClass = $generator->ns.'\\'.$generator->modelClass;
                $generator2->templates['extends'] = Yii::getAlias('@app/gii/templates/model/extends');
                $generator2->template = 'extends';
                $files2 = $generator2->generate();
                $answers2 = [];
                foreach ($files2 as $file2) {
                    $answers2[$file2->id] = 1;
                }
                $result2 = '';

                if($generator->save($files, $answers, $result)){
                    echo '<p>';
                    echo 'tableName:' . $generator->tableName . ', modelClass:'.$generator->modelClass .'<br />';

                    //check file exist
                    if(!file_exists(Yii::getAlias('@' . str_replace('\\', '/', $generator2->ns)).'/'.$generator2->modelClass.'.php')) {
                        if ($generator2->save($files2, $answers2, $result2)) {
                            echo Yii::getAlias('@' . str_replace('\\', '/', $generator2->ns)) . '/' . $generator2->modelClass . '.php<br />';
                            echo 'tableName:' . $generator2->tableName . ', modelClass:' . $generator2->modelClass . '<br />';
                        }
                    }
                    echo '</p>';
                } else {
                    break;
                }
            }
        }
    }

}
