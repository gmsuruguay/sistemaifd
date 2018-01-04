<?php

namespace backend\models;

use Yii;
use backend\models\Condicion;
use yii\helpers\ArrayHelper;
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
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

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
            ['estado', 'default', 'value' => self::STATUS_INACTIVE],
            [['fecha_inscripcion', 'fecha_examen', 'fecha_baja'], 'safe'],
            [['materia_id', 'alumno_id', 'condicion_id'], 'integer'],
            [['condicion_id','materia_id'], 'required'],
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
            'id' => 'Nro. Permiso',
            'fecha_inscripcion' => 'Fecha Inscripcion',
            'fecha_examen' => 'Fecha Examen',
            'fecha_baja' => 'Fecha Baja',
            'materia_id' => 'Materia',
            'alumno_id' => 'Alumno',
            'condicion_id' => 'Condicion',
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

    /*public function beforeValidate()
    {
        if ($this->fecha_examen != null) {           
            $this->fecha_examen = FechaHelper::fechaYMD($this->fecha_examen);
        }  
        
        return parent::beforeValidate();
    }*/

     /** 
     * @return \yii\db\ActiveQuery 
     */ 
    public function getCondicion() 
    { 
        return $this->hasOne(Condicion::className(), ['id' => 'condicion_id']);
    } 


    public function getListaCondicion()
    {        
        $sql = Condicion::find()->where(['id'=>[1,3]])->orderBy('descripcion')->all();
        return ArrayHelper::map($sql, 'id', 'descripcion');
    }

    public function getDescripcionMateria()
    {
        return $this->materia ? $this->materia->descripcionAnioMateria : 'Ninguno';
    }

    public function getDescripcionCondicion()
    {
        return $this->condicion ? $this->condicion->descripcion : 'Ninguno';
    }

    public function getDatoCompletoAlumno()
    {
        return $this->alumno ? $this->alumno->datoAlumno : '-Ninguno-';
    }

    public function getNombreAlumno(){
        return $this->alumno ? $this->alumno->nombreCompleto : ' - ';
    }
}
