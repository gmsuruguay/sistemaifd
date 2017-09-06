<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "alumno".
 *
 * @property integer $id
 * @property string $nro_legajo
 * @property string $tipo_doc
 * @property string $numero
 * @property string $cuil
 * @property string $apellido
 * @property string $nombre
 * @property string $sexo
 * @property string $estado_civil
 * @property string $nacionalidad
 * @property string $fecha_nacimiento
 * @property integer $lugar_nacimiento_id
 * @property string $domicilio
 * @property string $nro
 * @property integer $localidad_id
 * @property string $telefono
 * @property string $celular
 * @property string $email
 * @property string $fecha_baja
 * @property integer $user_id
 *
 * @property Localidad $localidad
 * @property Localidad $lugarNacimiento
 * @property Inscripcion[] $inscripcions
 * @property InscripcionMateria[] $inscripcionMaterias
 * @property Reinscripcion[] $reinscripcions
 */
class Alumno extends Docente
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alumno';
    }

    /**
     * @inheritdoc
     */
    /*public function rules()
    {
        return [
            [['tipo_doc', 'numero', 'apellido', 'nombre', 'fecha_nacimiento'], 'required'],
            [['fecha_nacimiento', 'fecha_baja'], 'safe'],
            [['lugar_nacimiento_id', 'localidad_id', 'user_id'], 'integer'],
            [['nro_legajo', 'tipo_doc', 'numero', 'cuil', 'sexo', 'estado_civil', 'nacionalidad', 'nro', 'telefono', 'celular'], 'string', 'max' => 45],
            [['apellido', 'nombre', 'domicilio', 'email'], 'string', 'max' => 450],
            [['localidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Localidad::className(), 'targetAttribute' => ['localidad_id' => 'id']],
            [['lugar_nacimiento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Localidad::className(), 'targetAttribute' => ['lugar_nacimiento_id' => 'id']],
        ];
    }*/

    /**
     * @inheritdoc
     */
    /*public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nro_legajo' => 'Nro Legajo',
            'tipo_doc' => 'Tipo Doc',
            'numero' => 'Numero',
            'cuil' => 'Cuil',
            'apellido' => 'Apellido',
            'nombre' => 'Nombre',
            'sexo' => 'Sexo',
            'estado_civil' => 'Estado Civil',
            'nacionalidad' => 'Nacionalidad',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'lugar_nacimiento_id' => 'Lugar Nacimiento ID',
            'domicilio' => 'Domicilio',
            'nro' => 'Nro',
            'localidad_id' => 'Localidad ID',
            'telefono' => 'Telefono',
            'celular' => 'Celular',
            'email' => 'Email',
            'fecha_baja' => 'Fecha Baja',
            'user_id' => 'User ID',
        ];
    }*/

    /**
     * @return \yii\db\ActiveQuery
     */
    /*public function getLocalidad()
    {
        return $this->hasOne(Localidad::className(), ['id' => 'localidad_id']);
    }*/

    /**
     * @return \yii\db\ActiveQuery
     */
    /*public function getLugarNacimiento()
    {
        return $this->hasOne(Localidad::className(), ['id' => 'lugar_nacimiento_id']);
    }*/

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripcions()
    {
        return $this->hasMany(Inscripcion::className(), ['alumno_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscripcionMaterias()
    {
        return $this->hasMany(InscripcionMateria::className(), ['alumno_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReinscripcions()
    {
        return $this->hasMany(Reinscripcion::className(), ['alumno_id' => 'id']);
    }

    public static function getListaAlumnos()
    {        
        $alumnos = self::find()->where(['fecha_baja' => null])->orderBy('apellido')->all();
        return ArrayHelper::map($alumnos, 'id', 'apellidoNombre');
    }

    
}
