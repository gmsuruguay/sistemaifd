<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\SqlDataProvider;
use backend\models\Cursada;

/**
 * CursadaSearch represents the model behind the search form about `backend\models\Cursada`.
 */
class InscripcionCursadaSearch extends Cursada
{
    public $alumno;
    public $carrera;
    public $periodo;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'condicion_id', 'alumno_id', 'materia_id'], 'integer'],
            [['fecha_inscripcion', 'fecha_vencimiento','alumno','fecha_cierre','carrera','periodo'], 'safe'],
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
        $cant= 'SELECT COUNT(DISTINCT m.descripcion,m.periodo)
                FROM cursada
                JOIN materia as m ON m.id=cursada.materia_id';
        $totalCount = Yii::$app->db->createCommand($cant)
        ->queryScalar();

        $sql='SELECT m.id,m.descripcion as materia, COUNT(*) as cant FROM cursada 
        JOIN materia as m ON m.id=cursada.materia_id
        GROUP BY m.periodo,m.id,m.descripcion';
        

        // add conditions that should always apply here
       

        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => $totalCount,
            'pagination' => [
                'pageSize' => 20,
            ],
            //'sort'=> ['defaultOrder' => ['fecha_inscripcion' => SORT_DESC]],
        ]);        
        

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        /*$query->andFilterWhere([
            'id' => $this->id,
            'fecha_inscripcion' => $this->fecha_inscripcion,
            'fecha_cierre'=>$this->fecha_cierre,
            'condicion_id' => $this->condicion_id,
            'alumno_id' => $this->alumno_id,
            'materia_id' => $this->materia_id,
            'nota' => $this->nota,
            'fecha_vencimiento' => $this->fecha_vencimiento,
        ]);

        $query->andFilterWhere(['=','materia.carrera_id',$this->carrera])
              ->andFilterWhere(['=','YEAR(fecha_inscripcion)',$this->periodo])
              ->orFilterWhere(['like', 'alumno.numero', $this->alumno])
              ->orFilterWhere(['like', "concat_ws(' ',alumno.apellido,alumno.nombre)", $this->alumno]);/
              */
        return $dataProvider;
    }
}
