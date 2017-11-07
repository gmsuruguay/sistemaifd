<?php

namespace backend\models;

use Yii;
use common\models\FechaHelper;

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
            [['fecha_desde', 'fecha_hasta', 'tipo_inscripcion', 'actividad', 'fecha_inicio_inscripcion', 'fecha_fin_inscripcion'], 'required'],
            [['fecha_desde', 'fecha_hasta', 'fecha_inicio_inscripcion', 'fecha_fin_inscripcion'], 'safe'],
            [['tipo_inscripcion', 'actividad'], 'string'],       
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
            'fecha_inicio_inscripcion' => 'Fecha Inicio Inscripcion',
            'fecha_fin_inscripcion' => 'Fecha Fin Inscripcion',
        ];
    }

    /**
    * Formatear fechas antes de insertar en base de datos
    *
    */
    public function beforeValidate()
    {
        if ($this->fecha_desde != null) {           
            $this->fecha_desde = FechaHelper::fechaYMD($this->fecha_desde);
        }   
        
        if ($this->fecha_hasta != null) {           
            $this->fecha_hasta = FechaHelper::fechaYMD($this->fecha_hasta);
        }

        if ($this->fecha_inicio_inscripcion != null) {           
            $this->fecha_inicio_inscripcion = FechaHelper::fechaYMD($this->fecha_inicio_inscripcion);
        }

        if ($this->fecha_fin_inscripcion != null) {           
            $this->fecha_fin_inscripcion = FechaHelper::fechaYMD($this->fecha_fin_inscripcion);
        }
        
        return parent::beforeValidate();
    }

    public static function estaHabilitado($tipo)
    {
        $fecha_actual= date('Y-m-d');
        $calendario= self::find()
                            ->where(['like', 'tipo_inscripcion', $tipo])
                            ->andWhere(['>=', 'fecha_inicio_inscripcion', $fecha_actual])
                            ->orderBy(['fecha_inicio_inscripcion' => SORT_ASC])
                            ->limit(1)
                            ->one();

        if( $calendario != null ){            
            if(($fecha_actual >= $calendario->fecha_inicio_inscripcion) && ($fecha_actual <= $calendario->fecha_fin_inscripcion)){
                return true;
            }
            
        }

        return false;
    }
}
