<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "autoridades".
 *
 * @property integer $id
 * @property string $rector
 * @property string $secretario_academico
 * @property string $vice_rector
 */
class Autoridades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'autoridades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rector', 'secretario_academico', 'vice_rector'], 'string', 'max' => 450],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'rector' => 'Rector',
            'secretario_academico' => 'Secretario Academico',
            'vice_rector' => 'Vice Rector',
        ];
    }

    public static function getDatoRector(){
        $model=self::find()->one();
        return $model->rector;
    }
}
