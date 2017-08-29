<?php

namespace backend\models;


use Yii;
use common\models\User;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "perfil".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property integer $user_id
 * @property string $domicilio
 * @property string $numero
 * @property string $piso
 * @property string $dpto
 * @property string $telefono
 * @property string $celular
 * @property string $tipo_usuario
 *
 * @property HistoriaClinica[] $historiaClinicas
 * @property HorarioAtencion[] $horarioAtencions
 * @property User $user
 * @property Turno[] $turnos
 */
class Perfil extends \yii\db\ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perfil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'apellido', 'tipo_usuario'], 'required'],
            ['estado','default', 'value' =>self::STATUS_ACTIVE],
            [['user_id','numero_doc','estado'], 'integer'],
            [['numero_doc'],'unique'],
            [['nombre', 'apellido', 'domicilio'], 'string', 'max' => 450],
            [['numero'], 'string', 'max' => 15],
            [['piso', 'dpto', 'telefono', 'celular', 'tipo_usuario'], 'string', 'max' => 45],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'user_id' => 'User ID',
            'domicilio' => 'Domicilio',
            'numero' => 'Numero',
            'numero_doc' => 'DNI',
            'piso' => 'Piso',
            'dpto' => 'Dpto',
            'telefono' => 'Telefono Fijo',
            'celular' => 'Celular',
            'tipo_usuario' => 'Tipo Usuario',
            'estado'=>'Estado'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHistoriaClinicas()
    {
        return $this->hasMany(HistoriaClinica::className(), ['perfil_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHorarioAtencions()
    {
        return $this->hasMany(HorarioAtencion::className(), ['perfil_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurnos()
    {
        return $this->hasMany(Turno::className(), ['medico_id' => 'id']);
    }

    public function getNombreApellido()
    {
        return $this->apellido.' '.$this->nombre;
    }

    public static function cantidad(){        	
        $cantidad = Perfil::find()->where(['estado' => 1,'tipo_usuario'=>'medico'])->count();
        return $cantidad;        
    }
    
    public function __toString() {
        return $this->getNombreApellido();
    }

    public static function getListaMedicos()
    {        
        $medicos = self::find()->where(['estado' => 1,'tipo_usuario'=>'medico'])->orderBy('apellido')->all();
        return ArrayHelper::map($medicos, 'id', 'nombreApellido');
    }
    
//    public function getTratamientos() {
//        return $this->hasMany(Tratamiento::className(), ['id' => 'tratamiento_id'])
//                ->viaTable('horario_atencion', ['perfil_id' => 'id']);
//    }
    
    public static function getMedicoHabilitado($medico_id){
        return self::find()->where("
                tipo_usuario = 'medico' 
                and estado = 1 
                and id = $medico_id
                ")->one();
    }

}
