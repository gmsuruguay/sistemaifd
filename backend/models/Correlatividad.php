<?php

namespace backend\models;

use Yii;
use backend\models\Materia;
use yii\helpers\ArrayHelper;

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
            [['materia_id', 'materia_id_correlativa','tipo'], 'required'],
            [['tipo'],'string','max' => 45],
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
            'tipo'=>'Condicion',
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
        return $this->materiaIdCorrelativa ? $this->materiaIdCorrelativa->descripcionAnioMateria : 'Ninguno';
    }

    public static function getListaMaterias($id,$carrera_id,$anio)
    {        
        $materias_registradas= self::find()->select('materia_id_correlativa')->where(['materia_id' => $id]);
        $query = Materia::find()->where(['NOT IN', 'id', $materias_registradas ])->andWhere(['carrera_id' => $carrera_id]); 
        $lista = $query                 
                ->andWhere(['<=','anio',$anio]) 
                ->andWhere(['<>','id',$id])                               
                ->orderBy('anio')
                ->all();
        return ArrayHelper::map($lista, 'id', 'descripcionAnioMateria');
    }

    public function getIdCarrera()
    {
        return $this->materia ? $this->materia->carrera_id : 'Ninguno';
    }
}
