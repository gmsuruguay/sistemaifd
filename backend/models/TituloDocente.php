<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "titulo_docente".
 *
 * @property integer $id
 * @property integer $docente_id
 * @property integer $titulo_id
 *
 * @property Docente $docente
 * @property Titulo $titulo
 */
class TituloDocente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'titulo_docente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['docente_id', 'titulo_id'], 'required'],
            [['docente_id', 'titulo_id'], 'integer'],
            [['docente_id'], 'exist', 'skipOnError' => true, 'targetClass' => Docente::className(), 'targetAttribute' => ['docente_id' => 'id']],
            [['titulo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Titulo::className(), 'targetAttribute' => ['titulo_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'docente_id' => 'Docente ID',
            'titulo_id' => 'Titulo ID',
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
    public function getTitulo()
    {
        return $this->hasOne(Titulo::className(), ['id' => 'titulo_id']);
    }
}
