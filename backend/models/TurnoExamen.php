<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "turno_examen".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property CalendarioExamen[] $calendarioExamens
 */
class TurnoExamen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'turno_examen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 45],
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
    public function getCalendarioAcademicos() 
    { 
        return $this->hasMany(CalendarioAcademico::className(), ['turno_examen_id' => 'id']);
    } 

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCalendarioExamens()
    {
        return $this->hasMany(CalendarioExamen::className(), ['turno_examen_id' => 'id']);
    }

    public static function getListaTurnos()
    {        
        $sql = self::find()->orderBy('descripcion')->all();
        return ArrayHelper::map($sql, 'id', 'descripcion');
    }
}
