<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "calendario_academico".
 *
 * @property integer $id
 * @property string $fecha_desde
 * @property string $fecha_hasta
 * @property string $tipo_inscripcion
 * @property string $actividad
 */
class CalendarioAcademico extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calendario_academico';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_desde', 'fecha_hasta', 'tipo_inscripcion', 'actividad'], 'required'],
            [['fecha_desde', 'fecha_hasta'], 'safe'],
            [['tipo_inscripcion'], 'string'],
            [['actividad'], 'string', 'max' => 750],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha_desde' => 'Fecha Desde',
            'fecha_hasta' => 'Fecha Hasta',
            'tipo_inscripcion' => 'Tipo Inscripcion',
            'actividad' => 'Actividad',
        ];
    }
}
