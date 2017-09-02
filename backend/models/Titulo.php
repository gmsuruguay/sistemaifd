<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "titulo".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property TituloDocente[] $tituloDocentes
 */
class Titulo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'titulo';
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
    public function getTituloDocentes()
    {
        return $this->hasMany(TituloDocente::className(), ['titulo_id' => 'id']);
    }

    public static function getListaTitulos()
    {        
        $sql = self::find()->orderBy('descripcion')->all();
        return ArrayHelper::map($sql, 'id', 'descripcion');
    }
}
