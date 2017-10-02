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
            [['resolucion'], 'string', 'max' => 45],
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
}
