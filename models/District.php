<?php

namespace app\models;

use Yii;
use \app\models\master\DistrictMaster;

/**
* This is the model class for table "district".
*
* @property integer $districtId
* @property string $districtCode
* @property string $districtName
* @property integer $amphurId
* @property integer $provinceId
* @property integer $geographyId
*/

class District extends \app\models\master\DistrictMaster{
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

    public function getAmphur()
    {
        return $this->hasOne(Amphur::className(), ['amphurId'=>'amphurId']);
    }
}
