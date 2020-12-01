<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use backend\models\Perfil;
use backend\models\TipoUsuario;
use common\models\User;
use backend\models\Alumno;
use yii\helpers\ArrayHelper;
/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    //const STATUS_DELETED = 0;
    //const STATUS_ACTIVE = 10;
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 10;
    public $password;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE]],
            ['username', 'filter', 'filter' => 'trim'],           
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este nombre de Usuario ya existe.'],
            ['username', 'string', 'min' => 6], 
            ['username', 'match', 'pattern' => '/^[0-9a-z]+$/i', 'message' => 'Sólo se aceptan letras y numeros'],    
            ['role', 'string', 'max' => 64],
            ['email', 'filter', 'filter' => 'trim'],           
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este Email ya existe.'],

            [['username','email','password','role'], 'required', 'on'=>'create'],
            [['email'], 'required', 'on'=>'update'],
            ['password', 'match', 'pattern' => "/^.{8,16}$/", 'message' => 'Mínimo 8 y máximo 16 caracteres'], 
            //[['tipo_usuario_id'], 'required'],
            //[['tipo_usuario_id'], 'integer'],
            //[['tipo_usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoUsuario::className(), 'targetAttribute' => ['tipo_usuario_id' => 'id']],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['create'] = ['username','email','password','role']; 
        $scenarios['update'] = ['email'];       
        return $scenarios;
    }

    public function attributeLabels()
    {
        return [
            'username'=>"Username",
            'password'=>"Password",
            'email'=> "Email",
            'role' => 'Tipo Usuario',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    public static function findByToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_INACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public function getPerfil()
    {
        return $this->hasOne(Perfil::className(), ['user_id' => 'id']);
    }

    public function getAlumno()
    {
        return $this->hasOne(Alumno::className(), ['user_id' => 'id']);
    }

    /*public function getTipoUsuario() 
    { 
        return $this->hasOne(TipoUsuario::className(), ['id' => 'tipo_usuario_id']);
    } */

    public static function getListaTipo()
    {        
        $tipo_usuarios = TipoUsuario::find()->all();
        return ArrayHelper::map($tipo_usuarios, 'id', 'descripcion');
    }

    public function getPerfilApellido()
    {
        return $this->perfil ? $this->perfil->apellido : 'ninguno';
    }
    public function getPerfilNombre()
    {
        return $this->perfil ? $this->perfil->nombre : 'ninguno';
    }

    public function getIdAlumno()
    {
        return $this->alumno ? $this->alumno->id : 'ninguno';
    }

    public function getNombreAlumno()
    {
        return $this->alumno ? $this->alumno->nombreCompleto : 'ninguno';
    }

    public function getNombreRole()
    {
        return $this->role ;
    }

    public function getListaRoles()
    {
        $query= $posts = Yii::$app->db->createCommand('SELECT * FROM auth_item WHERE type=1')->queryAll();
        

        return ArrayHelper::map($query, 'name','name');
    }

    /**
     * Informa si el usuario tiene rol de PRECEPTOR
     */
    public function getIsPreceptor()
    {
        if($this->role == 'PRECEPTOR')
        {
            return true;
        }
        return false;
    }
   

    public function getTipoUsuario()
    {
    return $this->hasOne(TipoUsuario::className(), ['id' => 'tipo_usuario_id']);
    }
   

    public function getEstado()
    {
        return ($this->status == 10) ? 'Activo': 'Inactivo';
    }

}
