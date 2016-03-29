<?php

namespace app\models;

use Yii;
use app\models\ModelMaster;

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
 * @property string $image
 * @property string $url
 */
class Users extends ModelMaster
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'loginFailed'], 'integer'],
            [['username', 'password', 'firstName', 'lastName', 'email', 'image', 'url'], 'required'],
            [['username', 'password', 'firstName', 'image', 'url'], 'string', 'max' => 45],
            [['lastName'], 'string', 'max' => 80],
            [['email'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userId' => 'User ID',
            'status' => 'Status',
            'username' => 'Username',
            'password' => 'Password',
            'loginFailed' => 'Login Failed',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'email' => 'Email',
            'image' => 'Image',
            'url' => 'Url',
        ];
    }
}
