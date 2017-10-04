<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Acta;

/**
 * ActaSearch represents the model behind the search form about `backend\models\Acta`.
 */
class ActaSearch extends Acta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'libro', 'folio', 'condicion_id', 'alumno_id', 'materia_id', 'nro_permiso'], 'integer'],
            [['nota'], 'number'],
            [['asistencia'], 'boolean'],
            [['fecha_examen', 'resolucion'], 'safe'],
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
        $query = Acta::find();

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
            'libro' => $this->libro,
            'folio' => $this->folio,
            'nota' => $this->nota,
            'asistencia' => $this->asistencia,
            'condicion_id' => $this->condicion_id,
            'alumno_id' => $this->alumno_id,
            'materia_id' => $this->materia_id,
            'fecha_examen' => $this->fecha_examen,
            'nro_permiso' => $this->nro_permiso,
        ]);

        $query->andFilterWhere(['like', 'resolucion', $this->resolucion]);

        return $dataProvider;
    }
}
