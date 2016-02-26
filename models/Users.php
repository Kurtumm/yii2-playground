<?php

namespace app\models;

use Yii;
use \app\models\master\UsersMaster;

/**
* This is the model class for table "users".
*
* @property integer $userId
* @property integer $status
* @property string $username
* @property string $password
* @property integer $loginFailed
* @property string $firstName
* @property string $lastName
* @property string $email
*/

class Users extends \app\models\master\UsersMaster{
    /**
    * @inheritdoc
    */
    public function rules()
    {
        return array_merge(parent::rules(), []);
    }

    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), []);
    }
}
