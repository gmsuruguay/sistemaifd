<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CalendarioAcademico;

/**
 * CalendarioAcademicoSearch represents the model behind the search form about `backend\models\CalendarioAcademico`.
 */
class CalendarioAcademicoSearch extends CalendarioAcademico
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id','turno_examen_id'], 'integer'],
            [[ 'tipo_inscripcion'], 'safe'],
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
        $query = CalendarioAcademico::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['fecha_desde' => SORT_ASC]],
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
            'fecha_desde' => $this->fecha_desde,
            'fecha_hasta' => $this->fecha_hasta,
        ]);

        $query->andFilterWhere(['like', 'tipo_inscripcion', $this->tipo_inscripcion])
            ->andFilterWhere(['like', 'actividad', $this->actividad]);

        return $dataProvider;
    }
}
