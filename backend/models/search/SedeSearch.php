<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Sede;

/**
 * SedeSearch represents the model behind the search form about `backend\models\Sede`.
 */
class SedeSearch extends Sede
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['cue', 'descripcion', 'secretario_academico', 'rector', 'vice_rector', 'direccion', 'localidad', 'logo'], 'safe'],
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
        $query = Sede::find();

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
        ]);

        $query->andFilterWhere(['like', 'cue', $this->cue])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'secretario_academico', $this->secretario_academico])
            ->andFilterWhere(['like', 'rector', $this->rector])
            ->andFilterWhere(['like', 'vice_rector', $this->vice_rector])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'localidad', $this->localidad])
            ->andFilterWhere(['like', 'logo', $this->logo]);

        return $dataProvider;
    }
}
