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
    public $alumno;
    public $sede;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'alumno_id', 'carrera_id', 'nro_libreta','sede'], 'integer'],
            [['fecha', 'observacion','alumno','nro_legajo'], 'safe'],
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
        $query = Inscripcion::find()->orderBy(['id' => SORT_DESC]);

        // add conditions that should always apply here
        $query->joinWith(['alumno','carrera']);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['alumno'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['alumno.apellido' => SORT_ASC],
            'desc'=> ['alumno.apellido' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'nro_legajo' => $this->nro_legajo,
            'alumno_id' => $this->alumno_id,
            'carrera_id' => $this->carrera_id,
            'nro_libreta' => $this->nro_libreta,
            'fecha' => $this->fecha,
            //'carrera.sede_id' => 1,
        ]);

        $query->orFilterWhere(['like', 'alumno.numero', $this->alumno])
              ->orFilterWhere(['like', "concat_ws(' ',alumno.apellido,alumno.nombre)", $this->alumno]);

        if(Yii::$app->user->identity->role=='PRECEPTOR'){
            
        $session = Yii::$app->session;
        $sede_id = $session->get('sede');
        $query->andFilterWhere(['=', 'carrera.sede_id', $sede_id]);
        
        }              

        return $dataProvider;
    }
}
