<?php

namespace app\models\master;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $userId
 * @property integer $status
 * @property string $username
 * @property string $password
 * @property integer $loginFailed
 * @property string $firstName
 * @property string $lastName
 * @property string $email
 *
 * @property UserProfiles[] $userProfiles
 */
class UserMaster extends \app\models\ModelMaster
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status', 'loginFailed'], 'integer'],
            [['username', 'password', 'firstName', 'lastName'], 'required'],
            [['username', 'password', 'firstName'], 'string', 'max' => 45],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfiles()
    {
        return $this->hasMany(UserProfiles::className(), ['userId' => 'userId']);
    }
}
