<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CalendarioExamen;

/**
 * CalendarioExamenSearch represents the model behind the search form about `backend\models\CalendarioExamen`.
 */
class CalendarioExamenSearch extends CalendarioExamen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'carrera_id', 'materia_id','turno_examen_id'], 'integer'],
            [['fecha_examen', 'hora', 'aula'], 'safe'],
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
        $query = CalendarioExamen::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['fecha_examen' => SORT_DESC]],
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
            'turno_examen_id'=>$this->turno_examen_id,
            'carrera_id' => $this->carrera_id,
            'materia_id' => $this->materia_id,
            'fecha_examen' => $this->fecha_examen,
        ]);

        $query->andFilterWhere(['like', 'hora', $this->hora])
            ->andFilterWhere(['like', 'aula', $this->aula]);

        return $dataProvider;
    }
}
