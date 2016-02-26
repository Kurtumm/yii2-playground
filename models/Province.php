<?php

namespace app\models;

use Yii;
use \app\models\master\ProvinceMaster;

/**
* This is the model class for table "province".
*
* @property integer $provinceId
* @property string $provinceCode
* @property string $provinceName
* @property integer $geographyId
*/

class Province extends \app\models\master\ProvinceMaster{
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

    public function getAmphurs()
    {
        return $this->hasMany(Amphur::className(), ['provinceId'=>'provinceId']);
    }

    public function getDistricts()
    {
        return $this->hasMany(District::className(), ['provinceId'=>'provinceId']);
    }
}
