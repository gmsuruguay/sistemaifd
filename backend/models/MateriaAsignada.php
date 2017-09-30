<?php

namespace backend\models;

use Yii;
use common\models\FechaHelper;

/**
 * This is the model class for table "materia_asignada".
 *
 * @property integer $id
 * @property string $fecha_alta
 * @property integer $docente_id
 * @property integer $materia_id
 * @property string $fecha_baja
 *
 * @property Docente $docente
 * @property Materia $materia
 */
class MateriaAsignada extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'materia_asignada';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_alta', 'docente_id', 'materia_id'], 'required'],
            [['fecha_alta', 'fecha_baja'], 'safe'],
            [['docente_id', 'materia_id'], 'integer'],
            [['docente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Docente::className(), 'targetAttribute' => ['docente_id' => 'id']],
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
            'fecha_alta' => 'Fecha Alta',
            'docente_id' => 'Docente ID',
            'materia_id' => 'Materia ID',
            'fecha_baja' => 'Fecha Baja',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocente()
    {
        return $this->hasOne(Docente::className(), ['id' => 'docente_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMateria()
    {
        return $this->hasOne(Materia::className(), ['id' => 'materia_id']);
    }

    public function getDescripcionMateria()
    {
        return $this->materia->descripcion;
    }

     public function beforeValidate()
    {
        if ($this->fecha_alta != null) {           
            $this->fecha_alta = FechaHelper::fechaYMD($this->fecha_alta);
        }
        if ($this->fecha_baja != null) {           
            $this->fecha_baja = FechaHelper::fechaYMD($this->fecha_baja);
        }         
        
        return parent::beforeValidate();
    }

}
