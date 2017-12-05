<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Carrera;

/**
 * CarreraSearch represents the model behind the search form about `backend\models\Carrera`.
 */
class CarreraSearch extends Carrera
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'duracion'], 'integer'],
            [['descripcion', 'cohorte','nro_resolucion'], 'safe'],
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
        $query = Carrera::find();

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
            'duracion' => $this->duracion,
        ]);

        $query->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'cohorte', $this->cohorte])
            ->andFilterWhere(['like', 'nro_resolucion', $this->nro_resolucion]);

            if(Yii::$app->user->identity->role=='PRECEPTOR'){
                
                $session = Yii::$app->session;
                $sede_id = $session->get('sede');
                $query->andFilterWhere(['=', 'sede_id', $sede_id]);
            
            }


        return $dataProvider;
    }
}
