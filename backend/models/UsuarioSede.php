<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "usuario_sede".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $sede_id
 */
class UsuarioSede extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario_sede';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'sede_id'], 'required'],
            [['user_id', 'sede_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'sede_id' => 'Sede ID',
        ];
    }

    /** 
     * @return \yii\db\ActiveQuery 
     */ 
    public function getUser() 
    { 
         return $this->hasOne(User::className(), ['id' => 'user_id']);
    } 

    public function getSede() 
    { 
         return $this->hasOne(Sede::className(), ['id' => 'sede_id']);
    }   

}
