<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "docente".
 *
 * @property integer $id
 * @property string $nro_legajo
 * @property string $apellido
 * @property string $nombre
 * @property string $tipo_doc
 * @property string $numero
 * @property string $fecha_nacimiento
 * @property string $lugar_nacimiento
 * @property string $domicilio
 * @property string $num
 * @property string $piso
 * @property string $dpto
 * @property string $telefono
 * @property string $celular
 * @property string $email
 * @property integer $user_id
 *
 * @property MateriaAsignada[] $materiaAsignadas
 * @property TituloDocente[] $tituloDocentes
 */
class Docente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'docente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['apellido', 'nombre', 'tipo_doc', 'numero', 'fecha_nacimiento'], 'required'],
            [['fecha_nacimiento','fecha_baja'], 'safe'],
            [['user_id'], 'integer'],
            [['nro_legajo', 'tipo_doc', 'numero', 'num', 'piso', 'dpto', 'telefono', 'celular'], 'string', 'max' => 45],
            [['apellido', 'nombre', 'lugar_nacimiento', 'domicilio', 'email'], 'string', 'max' => 450],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nro_legajo' => 'Nro legajo',
            'apellido' => 'Apellido',
            'nombre' => 'Nombre',
            'tipo_doc' => 'Tipo doc.',
            'numero' => 'Nro doc',
            'fecha_nacimiento' => 'Fecha nacimiento',
            'lugar_nacimiento' => 'Lugar nacimiento',
            'domicilio' => 'Domicilio',
            'num' => 'Nro',
            'piso' => 'Piso',
            'dpto' => 'Dpto',
            'telefono' => 'Telefono',
            'celular' => 'Celular',
            'email' => 'Email',
            'user_id' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMateriaAsignadas()
    {
        return $this->hasMany(MateriaAsignada::className(), ['docente_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTituloDocentes()
    {
        return $this->hasMany(TituloDocente::className(), ['docente_id' => 'id']);
    }
}
