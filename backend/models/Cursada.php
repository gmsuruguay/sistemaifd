<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cursada".
 *
 * @property integer $id
 * @property string $fecha_inscripcion
 * @property integer $condicion_id
 * @property integer $alumno_id
 * @property integer $materia_id
 * @property string $nota
 * @property string $fecha_vencimiento
 *
 * @property Alumno $alumno
 * @property Condicion $condicion
 * @property Materia $materia
 */
class Cursada extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cursada';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_inscripcion', 'fecha_vencimiento'], 'safe'],
            [['condicion_id', 'alumno_id', 'materia_id'], 'required'],
            [['condicion_id', 'alumno_id', 'materia_id'], 'integer'],
            [['nota'], 'number'],
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
            'condicion_id' => 'Condicion ID',
            'alumno_id' => 'Alumno ID',
            'materia_id' => 'Materia ID',
            'nota' => 'Nota',
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
