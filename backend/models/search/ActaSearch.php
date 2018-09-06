<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Acta;
use common\models\HelperSede;
/**
 * ActaSearch represents the model behind the search form about `backend\models\Acta`.
 */
class ActaSearch extends Acta
{
    public $alumno;
    public $sede;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'libro', 'folio', 'condicion_id', 'alumno_id', 'materia_id', 'nro_permiso','sede'], 'integer'],
            [['nota'], 'number'],
            [['asistencia'], 'boolean'],
            [['fecha_examen', 'resolucion','alumno'], 'safe'],
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
        $query = Acta::find()->select(['libro','folio','fecha_examen','condicion_id','materia_id'])->where('condicion_id <>4')->distinct();

        // add conditions that should always apply here
        //$query->joinWith(['alumno','materia.carrera']);
        //$query->joinWith(['carrera']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['libro' => SORT_ASC,'folio' => SORT_ASC]],
        ]);

        /*$dataProvider->sort->attributes['alumno'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['alumno.apellido' => SORT_ASC],
            'desc'=> ['alumno.apellido' => SORT_DESC],
        ];*/

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
            //'nota' => $this->nota,
            //'asistencia' => $this->asistencia,
            'condicion_id' => $this->condicion_id,
            //'alumno_id' => $this->alumno_id,
            'materia_id' => $this->materia_id,
            'fecha_examen' => $this->fecha_examen,
            //'nro_permiso' => $this->nro_permiso,
        ]);

        /*$query->orFilterWhere(['like', 'alumno.numero', $this->alumno])
              ->orFilterWhere(['like', "concat_ws(' ',alumno.apellido,alumno.nombre)", $this->alumno]);*/
        
        /*if(Yii::$app->user->identity->role=='PRECEPTOR'){
            
            
            $query->andFilterWhere(['=', 'carrera.sede_id', HelperSede::obtenerSede()]);
        
        }*/

        return $dataProvider;
    }
}
