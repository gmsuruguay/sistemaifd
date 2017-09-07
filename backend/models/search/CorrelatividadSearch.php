<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Correlatividad;

/**
 * CorrelatividadSearch represents the model behind the search form about `backend\models\Correlatividad`.
 */
class CorrelatividadSearch extends Correlatividad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'materia_id', 'materia_id_correlativa'], 'integer'],
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
        $query = Correlatividad::find();

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
            'materia_id' => $this->materia_id,
            'materia_id_correlativa' => $this->materia_id_correlativa,
        ]);

        return $dataProvider;
    }
}
