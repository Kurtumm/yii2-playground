<?php

namespace app\models\master;

use Yii;

/**
 * This is the model class for table "province".
 *
 * @property integer $provinceId
 * @property string $provinceCode
 * @property string $provinceName
 * @property integer $geographyId
 */
class ProvinceMaster extends \app\models\ModelMaster
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'province';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['provinceCode', 'provinceName'], 'required'],
            [['geographyId'], 'integer'],
            [['provinceCode'], 'string', 'max' => 2],
            [['provinceName'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'provinceId' => 'Province ID',
            'provinceCode' => 'Province Code',
            'provinceName' => 'Province Name',
            'geographyId' => 'Geography ID',
        ];
    }
}
