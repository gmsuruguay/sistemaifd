<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\InscripcionMateria;

/**
 * InscripcionMateriaSearch represents the model behind the search form about `backend\models\InscripcionMateria`.
 */
class InscripcionMateriaSearch extends InscripcionMateria
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'alumno_id', 'materia_id', 'condicion_id'], 'integer'],
            [['fecha_inscripcion', 'fecha', 'nro_acta'], 'safe'],
            [['nota'], 'number'],
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
        $query = InscripcionMateria::find();

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
            'fecha_inscripcion' => $this->fecha_inscripcion,
            'alumno_id' => $this->alumno_id,
            'materia_id' => $this->materia_id,
            'nota' => $this->nota,
            'fecha' => $this->fecha,
            'condicion_id' => $this->condicion_id,
        ]);

        $query->andFilterWhere(['like', 'nro_acta', $this->nro_acta]);

        return $dataProvider;
    }
}
