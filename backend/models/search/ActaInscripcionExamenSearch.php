<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\SqlDataProvider;
use backend\models\InscripcionExamen;
use common\models\HelperSede;

/**
 * InscripcionExamenSearch represents the model behind the search form about `backend\models\InscripcionExamen`.
 */
class ActaInscripcionExamenSearch extends InscripcionExamen
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

   
}
