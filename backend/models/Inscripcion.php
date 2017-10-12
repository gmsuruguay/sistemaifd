<?php

namespace backend\models;

use Yii;
use common\models\FechaHelper;
/**
 * This is the model class for table "inscripcion".
 *
 * @property integer $id
 * @property integer $alumno_id
 * @property integer $carrera_id
 * @property integer $nro_libreta
 * @property string $fecha
 * @property string $observacion
 *
 * @property Alumno $alumno
 * @property Carrera $carrera
 */
class Inscripcion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inscripcion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alumno_id', 'carrera_id', 'fecha'], 'required'],
            [['alumno_id', 'carrera_id', 'nro_libreta'], 'integer'],
            [['fotocopia_dni', 'certificado_nacimiento', 'titulo_secundario', 'certificado_visual', 'certificado_auditivo', 'certificado_foniatrico', 'foto', 'constancia_cuil', 'planilla_prontuarial'], 'boolean'],
            [['fecha'], 'safe'],
            [['nro_legajo'], 'string','max'=>45],
            [['observacion'], 'string'],
            [['alumno_id'], 'exist', 'skipOnError' => true, 'targetClass' => Alumno::className(), 'targetAttribute' => ['alumno_id' => 'id']],
            [['carrera_id'], 'exist', 'skipOnError' => true, 'targetClass' => Carrera::className(), 'targetAttribute' => ['carrera_id' => 'id']],
           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Nro Inscripción',
            'nro_legajo' => 'Nro Legajo',
            'alumno_id' => 'Alumno',
            'carrera_id' => 'Carrera',
            'nro_libreta' => 'Nro Libreta',
            'fecha' => 'Fecha',
            'observacion' => 'Observacion',            
            'fotocopia_dni' => 'Fotocopia Dni',
            'certificado_nacimiento' => 'Certificado Nacimiento',            
            'certificado_visual' => 'Certificado Visual',
            'certificado_auditivo' => 'Certificado Auditivo',
            'certificado_foniatrico' => 'Certificado Foniatrico',
            'foto' => 'Foto',
            'constancia_cuil' => 'Constancia Cuil',
            'planilla_prontuarial' => 'Planilla Prontuarial',
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
    public function getCarrera()
    {
        return $this->hasOne(Carrera::className(), ['id' => 'carrera_id']);
    }
   

    public function beforeValidate()
    {
        if ($this->fecha != null) {           
            $this->fecha = FechaHelper::fechaYMD($this->fecha);
        }        
        
        return parent::beforeValidate();
    }

    public function getDescripcionCarrera()
    {
        return $this->carrera ? $this->carrera->descripcion : ' - ';
    }

    public function getNombreAlumno(){
        return $this->alumno ? $this->alumno->nombreCompleto : ' - ';
    }

    public function getResolucionCarrera(){
        return $this->carrera ? $this->carrera->nro_resolucion : ' - ';
    }
    

    public function getDatoCompletoAlumno()
    {
        return $this->alumno ? $this->alumno->datoAlumno : '-Ninguno-';
    }

    public function getAlumnoId()
    {
        return $this->alumno ? $this->alumno->id : '-Ninguno-';
    }

    public function getDocumentacion($valor)
    {
        if($valor==1){
            return "PRESENTADO";
        }
        return "FALTANTE";
    }



}
