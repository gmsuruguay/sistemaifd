<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TituloDocente;

/**
 * TituloDocenteSearch represents the model behind the search form about `backend\models\TituloDocente`.
 */
class TituloDocenteSearch extends TituloDocente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'docente_id', 'titulo_id'], 'integer'],
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
        $query = TituloDocente::find();

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
            'docente_id' => $this->docente_id,
            'titulo_id' => $this->titulo_id,
        ]);

        return $dataProvider;
    }
}
