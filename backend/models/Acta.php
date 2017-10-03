<?php

namespace backend\models;

use Yii;

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
            [['nota'], 'number'],
            [['asistencia'], 'boolean'],
            [['condicion_id', 'alumno_id', 'materia_id'], 'required'],
            [['fecha_examen'], 'safe'],
            [['resolucion','nro_permiso'], 'string', 'max' => 45],
        ];
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
            'resolucion' => 'Resolucion',
        ];
    }

    /** 
     * @return \yii\db\ActiveQuery 
     */ 
     public function getAlumno() 
     { 
         return $this->hasOne(Alumno::className(), ['id' => 'alumno_id']);
     } 
 
     /** 
      * @return \yii\db\ActiveQuery 
      */ 
     public function getCondicion() 
     { 
         return $this->hasOne(Condicion::className(), ['id' => 'condicion_id']);
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

    public function getDescripcionCondicion()
    {
        return $this->condicion ? $this->condicion->descripcion : 'Ninguno';
    }
}
