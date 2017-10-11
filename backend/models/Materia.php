<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
use backend\models\Condicion;
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
            [['descripcion', 'carrera_id', 'anio','periodo','condicion_id'], 'required'],
            [['carrera_id'], 'integer'],
            [['estado'], 'boolean'], 
            //[['descripcion'], 'validateDescripcion'],  
            //[['descripcion','carrera_id'],'unique','targetAttribute' => ['descripcion', 'carrera_id']],                      
            [['descripcion'], 'string', 'max' => 450],
            [['anio','periodo','condicion_examen_libre'], 'string', 'max' => 45],
            [['carrera_id'], 'exist', 'skipOnError' => true, 'targetClass' => Carrera::className(), 'targetAttribute' => ['carrera_id' => 'id']],
            [['condicion_id'], 'exist', 'skipOnError' => true, 'targetClass' => Condicion::className(), 'targetAttribute' => ['condicion_id' => 'id']],
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
            'anio' => 'Año',
            'periodo' => 'Periodo',
            'estado' => 'Estado',
            'condicion_id' => 'Condicion',
            'condicion_examen_libre' => 'Condicion Examen Libre',
        ];
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
     public function getCursadas() 
     { 
         return $this->hasMany(Cursada::className(), ['materia_id' => 'id']);
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
     public function getActa() 
     { 
         return $this->hasMany(Acta::className(), ['materia_id' => 'id']);
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

    public function getAnioMateria()
    {      
        $anio="";
        switch ($this->anio) {
            case '1':
                $anio="1° AÑO";
                break;
            case '2':
                $anio="2° AÑO";
                break;
            case '3':
                $anio="3° AÑO";
                break;
            case '4':
                $anio="4° AÑO";
                break;
            case '5':
            $anio="5° AÑO";
            break;
            
            default:
                $anio="SIN ESPECIFICAR";
                break;
        } 
        return $anio;
    }
    public function getDescripcionCarrera()
    {
        return $this->carrera ? $this->carrera->descripcion : '-Ninguno-';
    }

    public function getDescripcionAnioMateria()
    {
        return $this->descripcion.' - '.$this->anioMateria.' - '.$this->periodo;
    }

    public static function getListaMaterias()
    {        
        $sql = self::find()->orderBy('descripcion')->all();
        return ArrayHelper::map($sql, 'id', 'descripcion');
    }

    public function getListaCondicion()
    {        
        $sql = Condicion::find()->where(['id'=>[2,3,5]])->orderBy('descripcion')->all();
        return ArrayHelper::map($sql, 'id', 'descripcion');
    }

    public function getCondicionExamen()
    {
        if($this->condicion_examen_libre == 1){ // si el valor es igual a 1 significa que puede rendir libre esta materia
            return 'LIBRE';
        }elseif($this->condicion_examen_libre == 2){ //para rendir al menos debe haberse inscripto a cursar la materia.
            return 'LIBRE CON OPCION';
        }elseif($this->condicion_examen_libre == 3){
            return 'NO SE PUEDE RENDIR LIBRE';
        }
        return "No asignado";
    }

    public function getDescripcionCondicion()
    {
        return $this->condicion ? $this->condicion->descripcion : 'Ninguno';
    }   

    public function validateDescripcion()
    {
        $materia= self::find()->where(['descripcion'=>$this->descripcion, 'carrera_id'=>$this->carrera_id])->exists();
        
        if($materia){
            $this->addError('descripcion', 'Ya existe una materia con el mismo nombre para esta Carrera');
        }
    }
    
}
