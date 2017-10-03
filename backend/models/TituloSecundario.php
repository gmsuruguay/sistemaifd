<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "titulo_secundario".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property Inscripcion[] $inscripcions
 */
class TituloSecundario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'titulo_secundario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
    public function getInscripcions()
    {
        return $this->hasMany(Inscripcion::className(), ['titulo_secundario_id' => 'id']);
    }

    public static function getListaTitulos()
    {        
        $sql = self::find()->orderBy('descripcion')->all();
        return ArrayHelper::map($sql, 'id', 'descripcion');
    }
}
