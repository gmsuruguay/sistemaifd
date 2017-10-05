<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
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
            [['descripcion', 'carrera_id', 'anio','periodo'], 'required'],
            [['carrera_id'], 'integer'],
            [['estado'], 'boolean'],
            [['descripcion'], 'string', 'max' => 450],
            [['anio','periodo'], 'string', 'max' => 45],
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
            'anio' => 'Año',
            'periodo' => 'Periodo',
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

    
}
