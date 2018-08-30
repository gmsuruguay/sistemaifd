<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "sede".
 *
 * @property integer $id
 * @property string $cue
 * @property string $descripcion
 * @property string $secretario_academico
 * @property string $rector
 * @property string $vice_rector
 * @property string $direccion
 * @property string $localidad
 * @property string $logo
 *
 * @property Carrera[] $carreras
 * @property Docente[] $docentes
 */
class Sede extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sede';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cue', 'descripcion', 'direccion', 'localidad'], 'required'],
            [['cue'], 'string', 'max' => 45],
            [['descripcion', 'secretario_academico', 'rector', 'vice_rector', 'direccion', 'localidad', 'logo'], 'string', 'max' => 450],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cue' => 'Cue',
            'descripcion' => 'Descripcion',
            'secretario_academico' => 'Secretario Academico',
            'rector' => 'Rector',
            'vice_rector' => 'Vice Rector',
            'direccion' => 'Direccion',
            'localidad' => 'Localidad',
            'logo' => 'Logo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarreras()
    {
        return $this->hasMany(Carrera::className(), ['sede_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocentes()
    {
        return $this->hasMany(Docente::className(), ['sede_id' => 'id']);
    }

    public function getDescripcionSede()
    {
        return $this->descripcion.'-'.$this->localidad;
    }

    public static function getListaSedes()
    {        
        $sql = self::find()->orderBy('descripcion')->all();
        return ArrayHelper::map($sql, 'id', 'descripcionSede');
    }

    public static function getNombre()
    {        
        $model = self::findOne(1);
        return 'SEDE '.$model->localidad;

    }
    public static function getRegistro()
    {
        $model = self::find()->one();
        return $model;
    }
    
}
