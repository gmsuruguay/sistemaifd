<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "inscripcion_materia".
 *
 * @property integer $id
 * @property string $fecha_inscripcion
 * @property integer $alumno_id
 * @property integer $materia_id
 * @property string $nota
 * @property string $fecha
 * @property string $nro_acta
 * @property integer $condicion_id
 *
 * @property Alumno $alumno
 * @property Condicion $condicion
 * @property Materia $materia
 */
class InscripcionMateria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inscripcion_materia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_inscripcion', 'alumno_id', 'materia_id', 'condicion_id'], 'required'],
            [['fecha_inscripcion', 'fecha'], 'safe'],
            [['alumno_id', 'materia_id', 'condicion_id'], 'integer'],
            [['nota'], 'number'],
            [['nro_acta'], 'string', 'max' => 45],
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
            'nota' => 'Nota',
            'fecha' => 'Fecha',
            'nro_acta' => 'Nro Acta',
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
