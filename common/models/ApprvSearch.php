<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Apprv;

/**
 * ApprvSearch represents the model behind the search form of `common\models\Apprv`.
 */
class ApprvSearch extends Apprv
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['apprv_id', 'brlst_id'], 'integer'],
            [['enccode', 'patient', 'dateadmitted', 'status', 'linen', 'daterequested', 'remarks', 'dateapproved'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Apprv::find();

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
            'apprv_id' => $this->apprv_id,
            'brlst_id' => $this->brlst_id,
            'dateadmitted' => $this->dateadmitted,
            'daterequested' => $this->daterequested,
            'dateapproved' => $this->dateapproved,
        ]);

        $query->andFilterWhere(['like', 'enccode', $this->enccode])
            ->andFilterWhere(['like', 'patient', $this->patient])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'linen', $this->linen])
            ->andFilterWhere(['like', 'remarks', $this->remarks]);

        return $dataProvider;
    }
}
