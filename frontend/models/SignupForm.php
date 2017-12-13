<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $retypePassword;
    public $tipo_doc;
    public $numero;
    public $apellido;
    public $nombre;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_doc', 'numero', 'apellido', 'nombre'], 'required'],
            [['apellido', 'nombre'], 'string', 'max' => 450],
            [['tipo_doc', 'numero'], 'string', 'max' => 45],  
            ['numero', 'unique', 'targetClass' => '\backend\models\Alumno', 'message' => 'Este numero ya existe.'],
            ['username', 'filter', 'filter' => 'trim'],           
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este nombre de Usuario ya existe.'],
            ['username', 'string', 'min' => 6], 
            ['username', 'match', 'pattern' => '/^[0-9a-z]+$/i', 'message' => 'Sólo se aceptan letras y numeros'], 

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Este Email ya existe.'],
            
            ['password', 'required'],
            ['password', 'match', 'pattern' => "/^.{8,16}$/", 'message' => 'Mínimo 8 y máximo 16 caracteres'], 
            [['retypePassword'], 'compare', 'compareAttribute' => 'password'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'password' => 'Contraseña',            
            'retypePassword' => 'Confirmar contraseña',
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }

    public function sendEmail()
    {
        /* @var $user User */
        $user = User::findOne([            
            'email' => $this->email,
        ]);

        if (!$user) {
            return false;
        }
        
        if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
            if (!$user->save()) {
                return false;
            }
        }

        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'activarCuentaToken-html', 'text' => 'activarCuentaToken-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] =>'SURI - SISTEMA UNICO DE REGISTRO INSTITUCIONAL'])
            ->setTo($this->email)
            ->setSubject('Activación de cuenta')
            ->send();
    }
}
