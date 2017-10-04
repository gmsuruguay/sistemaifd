<?php

namespace backend\models;

use Yii;
use common\models\FechaHelper;

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
            [['resolucion'], 'string', 'max' => 45],
            [['nro_permiso'], 'string', 'max' => 11],
            [['alumno_id'], 'exist', 'skipOnError' => true, 'targetClass' => Alumno::className(), 'targetAttribute' => ['alumno_id' => 'id']],
            [['condicion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Condicion::className(), 'targetAttribute' => ['condicion_id' => 'id']],
            [['materia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Materia::className(), 'targetAttribute' => ['materia_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'libro' => 'Libro',
            'folio' => 'Folio',
            'nota' => 'Nota',
            'asistencia' => 'Asistencia',
            'condicion_id' => 'Condicion ID',
            'alumno_id' => 'Alumno ID',
            'materia_id' => 'Materia ID',
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
    public function getMateria()
    {
        return $this->hasOne(Materia::className(), ['id' => 'materia_id']);
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

}
