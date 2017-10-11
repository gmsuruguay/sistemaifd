<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "carrera".
 *
 * @property integer $id
 * @property string $descripcion
 * @property integer $duracion
 * @property string $anio_inicio
 *
 * @property Inscripcion[] $inscripcions
 * @property Materia[] $materias
 * @property Reinscripcion[] $reinscripcions
 */
class Carrera extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'carrera';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion', 'duracion'], 'required'],
            [['duracion'], 'integer'],
            [['descripcion'], 'string', 'max' => 450],
            [['cohorte','validez_nacional','cantidad_materias','cantidad_horas','nro_resolucion'], 'string', 'max' => 45],
            [['sede_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sede::className(), 'targetAttribute' => ['sede_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripción',
            'duracion' => 'Duración en años',
            'cohorte' => 'Cohorte',
            'validez_nacional',
            'cantidad_materias',
            'cantidad_horas',
            'nro_resolucion',
            'sede_id' => 'Sede',
        ];
    }

    /** 
     * @return \yii\db\ActiveQuery 
     */ 
     public function getSede() 
     { 
         return $this->hasOne(Sede::className(), ['id' => 'sede_id']);
     } 

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripcions()
    {
        return $this->hasMany(Inscripcion::className(), ['carrera_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaterias()
    {
        return $this->hasMany(Materia::className(), ['carrera_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReinscripcions()
    {
        return $this->hasMany(Reinscripcion::className(), ['carrera_id' => 'id']);
    }

    public static function getListaCarreras()
    {        
        $sql = self::find()->orderBy('descripcion')->all();
        return ArrayHelper::map($sql, 'id', 'descripcion');
    }

    public static function cantidad(){        	
        $cantidad = self::find()->count();
        return $cantidad;        

    }

    public function getDescripcionSede()
    {
        return $this->sede ? $this->sede->descripcionSede : ' - ';
    }

    public static function  nombreCarrera($id)
    {        
        $model = self::find()->where(['id'=>$id])->one();
        if($model){
           return  $model->descripcion;
        }
    }
}
