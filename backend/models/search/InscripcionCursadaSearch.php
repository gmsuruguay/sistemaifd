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
    
    public $anio;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'materia_id','anio'], 'integer'],
            [['fecha_inscripcion'], 'safe'],           
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
        
        /*$session = Yii::$app->session;
        $sede_id = $session->get('sede');*/

        if( is_null($this->materia_id) || empty($this->materia_id) ) {

                $cant= 'SELECT COUNT(DISTINCT m.id,m.descripcion,m.periodo)
                FROM cursada        
                JOIN materia as m ON m.id=cursada.materia_id
                JOIN carrera as c ON c.id=m.carrera_id
                WHERE YEAR(fecha_inscripcion)=:anio';                
                
                $totalCount = Yii::$app->db->createCommand($cant,[':anio'=>$this->anio])
                ->queryScalar();
        
                $sql='SELECT m.id,YEAR(fecha_inscripcion) as anio,m.descripcion as materia, COUNT(*) as cant FROM cursada 
                JOIN materia as m ON m.id=cursada.materia_id
                JOIN carrera as c ON c.id=m.carrera_id
                WHERE YEAR(fecha_inscripcion)=:anio
                GROUP BY m.periodo,YEAR(fecha_inscripcion),m.id,m.descripcion';
                
        
                // add conditions that should always apply here
            
        
                $dataProvider = new SqlDataProvider([
                    'sql' => $sql,
                    'params' => [':anio'=>$this->anio],
                    'totalCount' => $totalCount,
                    'pagination' => [
                        'pageSize' => 20,
                    ],
                    //'sort'=> ['defaultOrder' => ['fecha_inscripcion' => SORT_DESC]],
                ]);              
                
                return $dataProvider;            
        
        }        
        

        $cant= 'SELECT COUNT(DISTINCT m.id,m.descripcion,m.periodo)
        FROM cursada        
        JOIN materia as m ON m.id=cursada.materia_id
        JOIN carrera as c ON c.id=m.carrera_id
        WHERE cursada.materia_id=:materia AND YEAR(fecha_inscripcion)=:anio';
        
        $totalCount = Yii::$app->db->createCommand($cant,[':materia' => $this->materia_id, ':anio'=>$this->anio])
        ->queryScalar();

        $sql='SELECT m.id,YEAR(fecha_inscripcion) as anio,m.descripcion as materia, COUNT(*) as cant FROM cursada 
        JOIN materia as m ON m.id=cursada.materia_id
        JOIN carrera as c ON c.id=m.carrera_id
        WHERE cursada.materia_id=:materia AND YEAR(fecha_inscripcion)=:anio
        GROUP BY m.periodo,YEAR(fecha_inscripcion),m.id,m.descripcion';
        

        // add conditions that should always apply here
       

        $dataProvider = new SqlDataProvider([
            'sql' => $sql,
            'params' => [':materia' => $this->materia_id, ':anio'=>$this->anio],
            'totalCount' => $totalCount,
            'pagination' => [
                'pageSize' => 20,
            ],
            //'sort'=> ['defaultOrder' => ['fecha_inscripcion' => SORT_DESC]],
        ]);      

        return $dataProvider;
    }
}
