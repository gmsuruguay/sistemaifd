<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "inscripcion_examen".
 *
 * @property integer $id
 * @property string $fecha_inscripcion
 * @property string $fecha_examen
 * @property string $fecha_baja
 * @property integer $materia_id
 * @property integer $alumno_id
 * @property integer $condicion_id
 *
 * @property Alumno $alumno
 * @property Materia $materia
 */
class InscripcionExamen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inscripcion_examen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_inscripcion', 'fecha_examen', 'fecha_baja'], 'safe'],
            [['materia_id', 'alumno_id', 'condicion_id'], 'integer'],
            [['condicion_id'], 'required'],
            [['alumno_id'], 'exist', 'skipOnError' => true, 'targetClass' => Alumno::className(), 'targetAttribute' => ['alumno_id' => 'id']],
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
            'fecha_inscripcion' => 'Fecha Inscripcion',
            'fecha_examen' => 'Fecha Examen',
            'fecha_baja' => 'Fecha Baja',
            'materia_id' => 'Materia ID',
            'alumno_id' => 'Alumno ID',
            'condicion_id' => 'Condicion ID',
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

    public function beforeValidate()
    {
        if ($this->fecha_examen != null) {           
            $this->fecha_examen = FechaHelper::fechaYMD($this->fecha_examen);
        }  
        
        return parent::beforeValidate();
    }
}
