<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\InscripcionExamen;
use common\models\HelperSede;

/**
 * InscripcionExamenSearch represents the model behind the search form about `backend\models\InscripcionExamen`.
 */
class InscripcionExamenSearch extends InscripcionExamen
{
    /**
     * @inheritdoc
     */
    public $alumno;
    public $carrera;
    public $periodo;

    public function rules()
    {
        return [
            [['id', 'materia_id', 'alumno_id', 'condicion_id'], 'integer'],
            [['fecha_inscripcion', 'fecha_examen','alumno','fecha_baja','carrera','periodo'], 'safe'],
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
        $query = InscripcionExamen::find();

        // add conditions that should always apply here
        $query->joinWith(['alumno','materia','materia.carrera']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['fecha_inscripcion' => SORT_DESC]],
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
            'inscripcion_examen.id' => $this->id,
            'fecha_inscripcion' => $this->fecha_inscripcion,
            'fecha_examen' => $this->fecha_examen,
            'fecha_baja' => $this->fecha_baja,
            'materia_id' => $this->materia_id,
            'alumno_id' => $this->alumno_id,
            'condicion_id' => $this->condicion_id,
        ]);

        $query->andFilterWhere(['=','materia.carrera_id',$this->carrera])
        ->andFilterWhere(['=','YEAR(fecha_inscripcion)',$this->periodo])
        ->orFilterWhere(['like', 'alumno.numero', $this->alumno])
        ->orFilterWhere(['like', "concat_ws(' ',alumno.apellido,alumno.nombre)", $this->alumno]);

        /*if(Yii::$app->user->identity->role=='PRECEPTOR'){
            
            
            $query->andFilterWhere(['=', 'carrera.sede_id', HelperSede::obtenerSede()]);
        
        }*/

        return $dataProvider;
    }
}
