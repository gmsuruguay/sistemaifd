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
            [['anio_inicio'], 'string', 'max' => 45],
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
            'duracion' => 'Duración',
            'anio_inicio' => 'Año Inicio',
        ];
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
}
