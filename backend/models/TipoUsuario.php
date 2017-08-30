<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "tipo_usuario".
 *
 * @property integer $id
 * @property string $descripcion
 *
 * @property User[] $users
 */
class TipoUsuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 345],
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
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['tipo_usuario_id' => 'id']);
    }

    public static function getListaTipo()
    {        
        $tipo_usuarios = self::find()->all();
        return ArrayHelper::map($tipo_usuarios, 'id', 'descripcion');
    }
}
