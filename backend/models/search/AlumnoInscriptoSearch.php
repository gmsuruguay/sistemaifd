<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\SqlDataProvider;
use backend\models\Alumno;

/**
 * AlumnoSearch represents the model behind the search form about `backend\models\Alumno`.
 */
class AlumnoInscriptoSearch extends Alumno
{    
    public $sede;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'lugar_nacimiento_id', 'localidad_id', 'user_id','sede'], 'integer'],
            [['tipo_doc', 'numero', 'cuil', 'apellido', 'nombre', 'sexo', 'estado_civil', 'nacionalidad', 'fecha_nacimiento', 'domicilio', 'nro', 'telefono', 'celular', 'email', 'fecha_baja'], 'safe'],
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
        
        $this->load($params);

        $cant='SELECT count(*) 
        FROM alumno AS a 
        JOIN inscripcion as i ON i.alumno_id=a.id 
        JOIN carrera as c on c.id=i.carrera_id 
        WHERE a.numero LIKE :dni AND a.apellido LIKE :ape AND a.nombre LIKE :nom AND c.sede_id=:sede';

        /*$cant='SELECT count(*) 
        FROM alumno AS a 
        JOIN inscripcion as i ON i.alumno_id=a.id 
        JOIN carrera as c on c.id=i.carrera_id 
        WHERE c.sede_id=:sede';*/

        $totalCount = Yii::$app->db->createCommand($cant,[':dni'=>$this->numero,':ape'=>$this->apellido,':nom'=>$this->nombre,':sede' => $this->sede ])
        ->queryScalar();

        /*$totalCount = Yii::$app->db->createCommand($cant,[':sede' => $this->sede ])
        ->queryScalar();*/

        $sql='SELECT a.id, a.numero, a.apellido, a.nombre, a.user_id
        FROM alumno AS a 
        JOIN inscripcion as i ON i.alumno_id=a.id 
        JOIN carrera as c on c.id=i.carrera_id
        WHERE a.numero LIKE :dni AND a.apellido LIKE :ape AND a.nombre LIKE :nom AND c.sede_id=:sede';

        /*$sql='SELECT a.id, a.numero, a.apellido, a.nombre, a.user_id
        FROM alumno AS a 
        JOIN inscripcion as i ON i.alumno_id=a.id 
        JOIN carrera as c on c.id=i.carrera_id
        WHERE c.sede_id=:sede';*/
       
       $dataProvider = new SqlDataProvider([
        'sql' => $sql,
        //'params' => [':sede' => $this->sede ],
        'params' => [':dni'=>$this->numero,':ape'=>$this->apellido,':nom'=>$this->nombre,':sede' => $this->sede ],
        'totalCount' => $totalCount,
        'pagination' => [
            'pageSize' => 20,
        ],
        //'sort'=> ['defaultOrder' => ['fecha_inscripcion' => SORT_DESC]],
        ]);      

        return $dataProvider;
    }
}
