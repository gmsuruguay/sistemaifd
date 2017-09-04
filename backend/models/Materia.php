<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "materia".
 *
 * @property integer $id
 * @property string $descripcion
 * @property integer $carrera_id
 * @property string $anio
 * @property boolean $estado
 *
 * @property Correlatividad[] $correlatividads
 * @property Correlatividad[] $correlatividads0
 * @property InscripcionMateria[] $inscripcionMaterias
 * @property Carrera $carrera
 * @property MateriaAsignada[] $materiaAsignadas
 */
class Materia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'materia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'carrera_id', 'anio'], 'required'],
            [['carrera_id'], 'integer'],
            [['estado'], 'boolean'],
            [['descripcion'], 'string', 'max' => 450],
            [['anio'], 'string', 'max' => 45],
            [['carrera_id'], 'exist', 'skipOnError' => true, 'targetClass' => Carrera::className(), 'targetAttribute' => ['carrera_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
            'carrera_id' => 'Carrera ID',
            'anio' => 'Anio',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCorrelatividads()
    {
        return $this->hasMany(Correlatividad::className(), ['materia_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCorrelatividads0()
    {
        return $this->hasMany(Correlatividad::className(), ['materia_id_correlativa' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripcionMaterias()
    {
        return $this->hasMany(InscripcionMateria::className(), ['materia_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarrera()
    {
        return $this->hasOne(Carrera::className(), ['id' => 'carrera_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMateriaAsignadas()
    {
        return $this->hasMany(MateriaAsignada::className(), ['materia_id' => 'id']);
    }
}
