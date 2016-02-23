<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Amphur;

/**
 * AmphurSearch represents the model behind the search form about `app\models\Amphur`.
 */
class AmphurSearch extends Amphur
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['amphurId', 'geographyId', 'provinceId'], 'integer'],
            [['amphurCode', 'amphurName', 'searchText'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Amphur::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

//        $query->andFilterWhere([
//            'amphurId' => $this->amphurId,
//            'geographyId' => $this->geographyId,
//            'provinceId' => $this->provinceId,
//        ]);
        $query->andFilterWhere(['provinceId'=>$this->provinceId]);

//        $query->andFilterWhere(['like', 'amphurCode', $this->amphurCode])
//            ->andFilterWhere(['like', 'amphurName', $this->amphurName]);

        $query->andFilterWhere(['like', 'amphurName', $this->searchText]);

        return $dataProvider;
    }
}
