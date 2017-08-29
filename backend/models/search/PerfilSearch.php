<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Perfil;

/**
 * PerfilSearch represents the model behind the search form about `backend\models\Perfil`.
 */
class PerfilSearch extends Perfil
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'especialidad_id','numero_doc','estado'], 'integer'],
            [['nombre', 'apellido', 'domicilio', 'numero', 'piso', 'dpto', 'telefono', 'celular', 'tipo_usuario'], 'safe'],
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
        $query = Perfil::find();
        $query->andFilterWhere(['like', 'tipo_usuario', 'medico'])
         ->orderBy(['apellido' => SORT_DESC])
         ->all();

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
           
            //'especialidad_id' => $this->especialidad_id,
            'estado'=>$this->estado,
            'numero_doc'=>$this->numero_doc,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido]) ;
           

        return $dataProvider;
    }
}
