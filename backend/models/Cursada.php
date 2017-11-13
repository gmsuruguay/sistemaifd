<?php

namespace backend\models;

use Yii;
use common\models\FechaHelper;
use yii\helpers\ArrayHelper;
use backend\models\Condicion;
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
            [['fecha_inscripcion', 'fecha_vencimiento','fecha_cierre'], 'safe'],
            //[['fecha_inscripcion', 'fecha_vencimiento','fecha_cierre'], 'date'],
            [['alumno_id', 'materia_id'], 'required'],
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
            'condicion_id' => 'Condicion',
            'alumno_id' => 'Alumno',
            'materia_id' => 'Materia',
            'nota' => 'Nota',
            'fecha_vencimiento' => 'Fecha Vencimiento',
            'fecha_cierre'=>'Fecha Cierre'
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

    public function beforeValidate()
    {
        if ($this->fecha_inscripcion != null) {           
            $this->fecha_inscripcion = FechaHelper::fechaYMD($this->fecha_inscripcion);
        }  

        if ($this->fecha_vencimiento != null) {           
            $this->fecha_vencimiento = FechaHelper::fechaYMD($this->fecha_vencimiento);
        }  

        if ($this->fecha_cierre != null) {           
            $this->fecha_cierre = FechaHelper::fechaYMD($this->fecha_cierre);
        }  
        
        return parent::beforeValidate();
    }

    public function getDatoCompletoAlumno()
    {
        return $this->alumno ? $this->alumno->datoAlumno : '-Ninguno-';
    }

    public function getAlumnoId()
    {
        return $this->alumno ? $this->alumno->id : '-Ninguno-';
    }

    public function getDescripcionMateria()
    {
        return $this->materia ? $this->materia->descripcionAnioMateria : 'Ninguno';
    }

    public function getDescripcionCondicion()
    {
        return $this->condicion ? $this->condicion->descripcion : 'Ninguno';
    }   

    public function getListaCondicion()
    {        
        $sql = Condicion::find()->where(['id'=>[1,2,3]])->orderBy('descripcion')->all();
        return ArrayHelper::map($sql, 'id', 'descripcion');
    }

    public function getAnioMateria()
    {
        return $this->materia ? $this->materia->anio : null;
    }

    public function getPeriodoMateria()
    {
        return $this->materia ? $this->materia->periodo : null;
    }
}
