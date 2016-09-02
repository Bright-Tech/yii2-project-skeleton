<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\base\Organization;

/**
 * searchOrganization represents the model behind the search form of `common\models\base\Organization`.
 */
class searchOrganization extends Organization
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'province_id', 'city_id', 'district_id', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['name', 'province_cn', 'city_cn', 'district_cn', 'better_address', 'contact'], 'safe'],
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
        $query = Organization::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'province_id' => $this->province_id,
            'city_id' => $this->city_id,
            'district_id' => $this->district_id,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'province_cn', $this->province_cn])
            ->andFilterWhere(['like', 'city_cn', $this->city_cn])
            ->andFilterWhere(['like', 'district_cn', $this->district_cn])
            ->andFilterWhere(['like', 'better_address', $this->better_address])
            ->andFilterWhere(['like', 'contact', $this->contact]);

        return $dataProvider;
    }
}
