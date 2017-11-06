<?php

namespace backend\models;

use Yii;
use common\models\FechaHelper;
/**
 * This is the model class for table "calendario_examen".
 *
 * @property integer $id
 * @property integer $carrera_id
 * @property integer $materia_id
 * @property string $fecha_examen
 * @property string $hora
 * @property string $aula
 *
 * @property Carrera $carrera
 * @property Materia $materia
 */
class CalendarioExamen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calendario_examen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['carrera_id', 'materia_id','turno_examen_id', 'fecha_examen', 'hora'], 'required'],
            [['carrera_id', 'materia_id','turno_examen_id'], 'integer'],
            [['materia_id','fecha_examen','turno_examen_id'],'unique','targetAttribute' => ['fecha_examen'],'message' => 'Ya existe una fecha de examen para la Materia actual.'],
            [['fecha_examen'], 'safe'],
            [['hora', 'aula'], 'string', 'max' => 45],
            [['carrera_id'], 'exist', 'skipOnError' => true, 'targetClass' => Carrera::className(), 'targetAttribute' => ['carrera_id' => 'id']],
            [['materia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Materia::className(), 'targetAttribute' => ['materia_id' => 'id']],
            [['turno_examen_id'], 'exist', 'skipOnError' => true, 'targetClass' => TurnoExamen::className(), 'targetAttribute' => ['turno_examen_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'carrera_id' => 'Carrera',
            'materia_id' => 'Materia',
            'fecha_examen' => 'Fecha Examen',
            'hora' => 'Hora',
            'aula' => 'Aula',
            'turno_examen_id'=>'Turno Examen',
        ];
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
    public function getMateria()
    {
        return $this->hasOne(Materia::className(), ['id' => 'materia_id']);
    }

    public function getTurnoExamen() 
    { 
        return $this->hasOne(TurnoExamen::className(), ['id' => 'turno_examen_id']);
    } 

    public function beforeValidate()
    {
        if ($this->fecha_examen != null) {           
            $this->fecha_examen = FechaHelper::fechaYMD($this->fecha_examen);
        }        
        
        return parent::beforeValidate();
    }

    public function getDescripcionMateria()
    {
        return $this->materia ? $this->materia->descripcion : 'Ninguno';
    }

    public function getDescripcionCarrera()
    {
        return $this->carrera ? $this->carrera->descripcion : 'Ninguno';
    }

    public function getDescripcionTurno()
    {
        return $this->turnoExamen ? $this->turnoExamen->descripcion : 'Ninguno';
    }
}
