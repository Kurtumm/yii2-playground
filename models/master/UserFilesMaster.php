<?php

namespace app\models\master;

use Yii;

/**
 * This is the model class for table "user_files".
 *
 * @property integer $userFilesId
 * @property integer $userId
 * @property string $url
 */
class UserFilesMaster extends \app\models\ModelMaster
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_files';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'url'], 'required'],
            [['userId'], 'integer'],
            [['url'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userFilesId' => 'User Files ID',
            'userId' => 'User ID',
            'url' => 'Url',
        ];
    }
}
