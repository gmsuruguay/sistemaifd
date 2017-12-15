<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Materia;

/**
 * MateriaSearch represents the model behind the search form about `backend\models\Materia`.
 */
class MateriaSearch extends Materia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'carrera_id'], 'integer'],
            [['descripcion', 'anio'], 'safe'],
            [['estado'], 'boolean'],
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
        $query = Materia::find();

        // add conditions that should always apply here
        $query->joinWith(['carrera']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['anio' => SORT_ASC]],
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
            'carrera_id' => $this->carrera_id,
            'estado' => $this->estado,
        ]);

        $query->andFilterWhere(['like', 'materia.descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'periodo', $this->periodo])
            ->andFilterWhere(['like', 'anio', $this->anio]);

        if(Yii::$app->user->identity->role=='PRECEPTOR'){
            
        $session = Yii::$app->session;
        $sede_id = $session->get('sede');
        $query->andFilterWhere(['=', 'carrera.sede_id', $sede_id]);
        
        }

        return $dataProvider;
    }
}
