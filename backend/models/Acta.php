<?php

namespace backend\models;

use Yii;

use common\models\FechaHelper;
use backend\models\Condicion;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "acta".
 *
 * @property integer $id
 * @property integer $libro
 * @property integer $folio
 * @property string $nota
 * @property boolean $asistencia
 * @property integer $condicion_id
 * @property integer $alumno_id
 * @property integer $materia_id
 * @property string $fecha_examen
 * @property string $resolucion
 */
class Acta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'acta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['libro', 'folio', 'condicion_id', 'alumno_id', 'materia_id'], 'integer'],
            [['condicion_id', 'alumno_id', 'materia_id','fecha_examen'], 'required'],
            [['nota'], 'number','min'=>0, 'max'=>10],
            [['asistencia'], 'boolean'],
            [['condicion_id', 'alumno_id', 'materia_id','nota'], 'required'],
            [['fecha_examen'], 'safe'],
            [['resolucion'], 'string', 'max' => 45],
            [['tipo_equivalencia'], 'string', 'max' => 20],
            [['descripcion'], 'string'],
            [['libro', 'folio'], 'required', 'on'=>'load'],
            [['nro_permiso'], 'string', 'max' => 11],
            [['alumno_id'], 'exist', 'skipOnError' => true, 'targetClass' => Alumno::className(), 'targetAttribute' => ['alumno_id' => 'id']],
            [['condicion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Condicion::className(), 'targetAttribute' => ['condicion_id' => 'id']],
            [['materia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Materia::className(), 'targetAttribute' => ['materia_id' => 'id']],

        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['load'] = ['libro', 'folio','condicion_id', 'alumno_id', 'materia_id','fecha_examen'];              
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nro_permiso' => 'Nro Permiso',
            'libro' => 'Libro',
            'folio' => 'Folio',
            'nota' => 'Nota',
            'asistencia' => 'Asistencia',
            'condicion_id' => 'Condicion',
            'alumno_id' => 'Alumno',
            'materia_id' => 'Materia',
            'fecha_examen' => 'Fecha Examen',
            'resolucion' => 'Resolución',
            'tipo_equivalencia'=>'Equivalencia',
            'descripcion'=>'Descripción'
        ];
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlumno()
    {
        return $this->hasOne(Alumno::className(), ['id' => 'alumno_id']);
    }

    

     public function getCondicion()
    {
        return $this->hasOne(Condicion::className(), ['id' => 'condicion_id']);
    }

    public function beforeValidate()
    {
        if ($this->fecha_examen != null) {           
            $this->fecha_examen = FechaHelper::fechaYMD($this->fecha_examen);
        }  
        
        return parent::beforeValidate();
    }


 
     /** 
      * @return \yii\db\ActiveQuery 
      */ 
     public function getMateria() 
     { 
         return $this->hasOne(Materia::className(), ['id' => 'materia_id']);
     } 

    public function getAnioMateria()
    {
        return $this->materia ? $this->materia->anio : null;
    }

    public function getPeriodoMateria()
    {
        return $this->materia ? $this->materia->periodo : null;
    }

    public function getDescripcionMateria()
    {
        return $this->materia ? $this->materia->descripcion : 'Ninguno';
    }

    public function getDatoCompletoAlumno()
    {
        return $this->alumno ? $this->alumno->datoAlumno : '-Ninguno-';
    }

    public function getAlumnoId()
    {
        return $this->alumno ? $this->alumno->id : '-Ninguno-';
    }

    public function getDescripcionCondicion()
    {
        return $this->condicion ? $this->condicion->descripcion : 'Ninguno';
    }

    public function getListaCondicion()
    {        
        $sql = Condicion::find()->where(['id'=>[1,2,3]])->orderBy('descripcion')->all();
        return ArrayHelper::map($sql, 'id', 'descripcion');
    }

}
