<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "condicion".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property InscripcionMateria[] $inscripcionMaterias
 */
class Condicion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'condicion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 450],
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
        ];
    }

    /** 
     * @return \yii\db\ActiveQuery 
     */ 
     public function getCursadas() 
     { 
         return $this->hasMany(Cursada::className(), ['condicion_id' => 'id']);
     } 

    /**
     * @return \yii\db\ActiveQuery
     */
     public function getHistoriaAcademicas() 
     { 
         return $this->hasMany(HistoriaAcademica::className(), ['condicion_id' => 'id']);
     } 

     public static function getListaCondicion()
     {        
         $sql = self::find()->orderBy('descripcion')->all();
         return ArrayHelper::map($sql, 'id', 'descripcion');
     }
}
