<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\models\User;
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
    public function rules()
    {
        return [
            [['tipo_doc', 'numero', 'apellido', 'nombre', 'fecha_nacimiento','colegio_secundario_id','titulo_secundario_id'], 'required'],
            [['fecha_nacimiento', 'fecha_baja'], 'safe'],
            [['lugar_nacimiento_id', 'localidad_id', 'user_id'], 'integer'],
            [['tipo_doc', 'numero', 'cuil', 'sexo', 'estado_civil', 'nacionalidad', 'nro', 'telefono', 'celular'], 'string', 'max' => 45],            
            [['numero'],'unique'],
            [['apellido', 'nombre', 'domicilio', 'email'], 'string', 'max' => 450],
            ['email', 'filter', 'filter' => 'trim'],           
            ['email', 'email'],
            ['email', 'unique','message' => 'Este Email ya existe.'],  
            [['domicilio','email'], 'required', 'on'=>'actualizar'],
            [['localidad_id'], 'exist', 'skipOnError' => true, 'targetClass' => Localidad::className(), 'targetAttribute' => ['localidad_id' => 'id']],
            [['lugar_nacimiento_id'], 'exist', 'skipOnError' => true, 'targetClass' => Localidad::className(), 'targetAttribute' => ['lugar_nacimiento_id' => 'id']],
            [['colegio_secundario_id'], 'exist', 'skipOnError' => true, 'targetClass' => ColegioSecundario::className(), 'targetAttribute' => ['colegio_secundario_id' => 'id']],
            [['titulo_secundario_id'], 'exist', 'skipOnError' => true, 'targetClass' => TituloSecundario::className(), 'targetAttribute' => ['titulo_secundario_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [            
            'colegio_secundario_id' => 'Colegio Secundario',
            'titulo_secundario_id' => 'Titulo Secundario',
            'localidad_id' => 'Localidad',
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['actualizar'] = ['domicilio','email','nro','localidad_id','telefono','celular'];              
        return $scenarios;
    }

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
     public function getCursadas() 
     { 
         return $this->hasMany(Cursada::className(), ['alumno_id' => 'id']);
     } 

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
     public function getColegioSecundario() 
     { 
         return $this->hasOne(ColegioSecundario::className(), ['id' => 'colegio_secundario_id']);
     } 

    /** 
    * @return \yii\db\ActiveQuery 
    */ 
    public function getTituloSecundario() 
    { 
        return $this->hasOne(TituloSecundario::className(), ['id' => 'titulo_secundario_id']);
    } 

    /**
     * @return \yii\db\ActiveQuery
     */
     public function getHistoriaAcademicas() 
     { 
         return $this->hasMany(HistoriaAcademica::className(), ['alumno_id' => 'id']);
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


    public function getActas()
    {
        return $this->hasMany(Acta::className(), ['alumno_id' => 'id']);
    }

     public function getNombreCompleto()
    {
        return $this->apellido.' '.$this->nombre;
    }

    public static function getPromedio($query)
    {      
        $suma_nota=0;
        $cant=0;  
        foreach ($query as  $value) {
            $suma_nota += $value->nota;
            ++$cant;
        }
        if($cant!=0){
            $promedio = $suma_nota/$cant;
            return number_format($promedio,2);
        }
        return $cant;
        
    }

    public function getDatoAlumno()
    {
       return $this->numero.' '.$this->apellido.' '.$this->nombre;
    }

    public function getDescripcionTitulo()
    {
        return $this->tituloSecundario ? $this->tituloSecundario->descripcion : ' - ';
    }

    public function getDescripcionColegio()
    {
        return $this->colegioSecundario ? $this->colegioSecundario->descripcion : ' - ';
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    
}
