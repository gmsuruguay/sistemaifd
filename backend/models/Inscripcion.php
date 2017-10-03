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
            [['alumno_id', 'carrera_id', 'fecha', 'titulo_secundario_id', 'colegio_secundario_id'], 'required'],
            [['alumno_id', 'carrera_id', 'nro_libreta', 'titulo_secundario_id', 'colegio_secundario_id'], 'integer'],
            [['fotocopia_dni', 'certificado_nacimiento', 'titulo_secundario', 'certificado_visual', 'certificado_auditivo', 'certificado_foniatrico', 'foto', 'constancia_cuil', 'planilla_prontuarial'], 'boolean'],
            [['fecha'], 'safe'],
            [['observacion'], 'string'],
            [['alumno_id'], 'exist', 'skipOnError' => true, 'targetClass' => Alumno::className(), 'targetAttribute' => ['alumno_id' => 'id']],
            [['carrera_id'], 'exist', 'skipOnError' => true, 'targetClass' => Carrera::className(), 'targetAttribute' => ['carrera_id' => 'id']],
            [['colegio_secundario_id'], 'exist', 'skipOnError' => true, 'targetClass' => ColegioSecundario::className(), 'targetAttribute' => ['colegio_secundario_id' => 'id']],
            [['titulo_secundario_id'], 'exist', 'skipOnError' => true, 'targetClass' => TituloSecundario::className(), 'targetAttribute' => ['titulo_secundario_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Nro Inscripción',
            'alumno_id' => 'Alumno',
            'carrera_id' => 'Carrera',
            'nro_libreta' => 'Nro Libreta',
            'fecha' => 'Fecha',
            'observacion' => 'Observacion',
            'titulo_secundario_id' => 'Titulo Secundario',
            'colegio_secundario_id' => 'Colegio Secundario',
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

    /** 
     * @return \yii\db\ActiveQuery 
     */ 
     public function getTituloSecundario() 
     { 
         return $this->hasOne(TituloSecundario::className(), ['id' => 'titulo_secundario_id']);
     } 

     /** 
     * @return \yii\db\ActiveQuery 
     */ 
    public function getColegioSecundario() 
    { 
        return $this->hasOne(ColegioSecundario::className(), ['id' => 'colegio_secundario_id']);
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

    public function getDescripcionTitulo()
    {
        return $this->tituloSecundario ? $this->tituloSecundario->descripcion : ' - ';
    }

    public function getDescripcionColegio()
    {
        return $this->colegioSecundario ? $this->colegioSecundario->descripcion : ' - ';
    }


}
