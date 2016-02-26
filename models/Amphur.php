<?php

namespace app\models;

use Yii;
use \app\models\master\AmphurMaster;

/**
* This is the model class for table "amphur".
*
* @property integer $amphurId
* @property string $amphurCode
* @property string $amphurName
* @property integer $geographyId
* @property integer $provinceId
*/

class Amphur extends \app\models\master\AmphurMaster{
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

    public function getProvince()
    {
        return $this->hasOne(Province::className(), ['provinceId'=>'provinceId']);
    }

    public function getDistricts()
    {
        return $this->hasMany(Province::className(), ['amphurId'=>'amphurId']);
    }
}
