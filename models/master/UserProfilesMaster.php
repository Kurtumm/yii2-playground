<?php

namespace app\models\master;

use Yii;

/**
 * This is the model class for table "user_profiles".
 *
 * @property integer $userProfilesId
 * @property integer $userId
 * @property string $address
 * @property integer $provinceId
 * @property string $mobile
 */
class UserProfilesMaster extends \app\models\ModelMaster
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_profiles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['userId', 'address'], 'required'],
            [['userId', 'provinceId'], 'integer'],
            [['address'], 'string', 'max' => 200],
            [['mobile'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userProfilesId' => 'User Profiles ID',
            'userId' => 'User ID',
            'address' => 'Address',
            'provinceId' => 'Province ID',
            'mobile' => 'Mobile',
        ];
    }
}
