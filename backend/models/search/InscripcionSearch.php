<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Inscripcion;

/**
 * InscripcionSearch represents the model behind the search form about `backend\models\Inscripcion`.
 */
class InscripcionSearch extends Inscripcion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'alumno_id', 'carrera_id', 'nro_libreta'], 'integer'],
            [['fecha', 'observacion'], 'safe'],
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
        $query = Inscripcion::find();

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
            'alumno_id' => $this->alumno_id,
            'carrera_id' => $this->carrera_id,
            'nro_libreta' => $this->nro_libreta,
            'fecha' => $this->fecha,
        ]);

        $query->andFilterWhere(['like', 'observacion', $this->observacion]);

        return $dataProvider;
    }
}
