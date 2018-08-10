<?php

namespace backend\models;

use Yii;
use common\models\FechaHelper;
/**
 * This is the model class for table "docente".
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
            [['tipo_doc', 'numero', 'apellido', 'nombre', 'fecha_nacimiento','sede_id'], 'required'],
            [['fecha_nacimiento', 'fecha_baja'], 'safe'],
            //[['fecha_nacimiento','fecha_baja'], 'date', 'format'=>'php:Y/m/d'],
            [['lugar_nacimiento_id', 'localidad_id', 'user_id'], 'integer'],
            [['numero'],'unique'],
            [['nro_legajo', 'tipo_doc', 'numero', 'cuil', 'sexo', 'estado_civil', 'nacionalidad', 'nro', 'telefono', 'celular'], 'string', 'max' => 45],
            [['apellido', 'nombre', 'domicilio','ubicacion_legajo'], 'string', 'max' => 450],
            ['email', 'filter', 'filter' => 'trim'],           
            ['email', 'email'],
            ['email', 'unique', 'message' => 'Este email ya existe.'],
            [['localidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Localidad::className(), 'targetAttribute' => ['localidad_id' => 'id']],
            [['lugar_nacimiento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Localidad::className(), 'targetAttribute' => ['lugar_nacimiento_id' => 'id']],
            [['sede_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sede::className(), 'targetAttribute' => ['sede_id' => 'id']],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
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
            'lugar_nacimiento_id' => 'Lugar Nacimiento',
            'domicilio' => 'Domicilio',
            'nro' => 'Nro',
            'localidad_id' => 'Localidad',
            'telefono' => 'Telefono',
            'celular' => 'Celular',
            'email' => 'Email',
            'fecha_baja' => 'Fecha Baja',
            'user_id' => 'User',
            'sede_id'=>'Lugar de Residencia de Legajo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocalidad()
    {
        return $this->hasOne(Localidad::className(), ['id' => 'localidad_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLugarNacimiento()
    {
        return $this->hasOne(Localidad::className(), ['id' => 'lugar_nacimiento_id']);
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

    /** 
     * @return \yii\db\ActiveQuery 
     */ 
    public function getSede() 
    { 
        return $this->hasOne(Sede::className(), ['id' => 'sede_id']);
    } 

    /**
    * Formatear fechas antes de insertar en base de datos
    *
    */
    public function beforeValidate()
    {
        if ($this->fecha_nacimiento != null) {           
            $this->fecha_nacimiento = FechaHelper::fechaYMD($this->fecha_nacimiento);
        }        
        
        return parent::beforeValidate();
    }

    public function getApellidoNombre()
    {
        return $this->numero.' '.$this->apellido.' '.$this->nombre;
    }

    public function getNombreCompleto()
    {
        return $this->apellido.' '.$this->nombre;
    }

    public static function cantidad(){        	
        $cantidad = self::find()->where(['fecha_baja' => null])->count();
        return $cantidad;        

    }

    public function getDescripcionLocalidad()
    {
        return $this->localidad ? $this->localidad->descripcion : ' - ';
    }

    public function getDescripcionLocalidadNacimiento()
    {
        return $this->lugarNacimiento ? $this->lugarNacimiento->descripcion : ' - ';
    }

}
