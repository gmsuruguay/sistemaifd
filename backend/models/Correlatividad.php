<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "correlatividad".
 *
 * @property integer $id
 * @property integer $materia_id
 * @property integer $materia_id_correlativa
 *
 * @property Materia $materia
 * @property Materia $materiaIdCorrelativa
 */
class Correlatividad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'correlatividad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['materia_id', 'materia_id_correlativa'], 'required'],
            [['materia_id', 'materia_id_correlativa'], 'integer'],
            [['materia_id'], 'exist', 'skipOnError' => true, 'targetClass' => Materia::className(), 'targetAttribute' => ['materia_id' => 'id']],
            [['materia_id_correlativa'], 'exist', 'skipOnError' => true, 'targetClass' => Materia::className(), 'targetAttribute' => ['materia_id_correlativa' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'materia_id' => 'Materia ID',
            'materia_id_correlativa' => 'Correlativas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMateria()
    {
        return $this->hasOne(Materia::className(), ['id' => 'materia_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMateriaIdCorrelativa()
    {
        return $this->hasOne(Materia::className(), ['id' => 'materia_id_correlativa']);
    }

    public function getDescripcionMateria()
    {
        return $this->materiaIdCorrelativa ? $this->materiaIdCorrelativa->descripcion : 'Ninguno';
    }
}
