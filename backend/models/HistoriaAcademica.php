<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "historia_academica".
 *
 * @property integer $id
 * @property string $fecha_inscripcion
 * @property integer $alumno_id
 * @property integer $materia_id
 * @property integer $condicion_id
 * @property integer $libro
 * @property integer $folio
 * @property string $fecha
 * @property string $nota
 * @property string $asistencia
 * @property string $tipo_inscripcion
 * @property string $fecha_vencimiento
 *
 * @property Alumno $alumno
 * @property Condicion $condicion
 * @property Materia $materia
 */
class HistoriaAcademica extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'historia_academica';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_inscripcion', 'alumno_id', 'materia_id', 'tipo_inscripcion'], 'required'],
            [['fecha_inscripcion', 'fecha', 'fecha_vencimiento'], 'safe'],
            [['alumno_id', 'materia_id', 'condicion_id', 'libro', 'folio'], 'integer'],
            [['nota'], 'number'],
            [['asistencia', 'tipo_inscripcion'], 'string', 'max' => 45],
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
            'fecha_inscripcion' => 'Fecha Inscripcion',
            'alumno_id' => 'Alumno ID',
            'materia_id' => 'Materia ID',
            'condicion_id' => 'Condicion ID',
            'libro' => 'Libro',
            'folio' => 'Folio',
            'fecha' => 'Fecha',
            'nota' => 'Nota',
            'asistencia' => 'Asistencia',
            'tipo_inscripcion' => 'Tipo Inscripcion',
            'fecha_vencimiento' => 'Fecha Vencimiento',
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
}
