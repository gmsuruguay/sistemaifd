<?php
namespace frontend\models;


use yii\base\Model;
use yii\base\InvalidParamException;
use common\models\User;

/**
 * Password reset form
 */
class ActivarCuentaUser extends Model
{
    
    /**
     * @var \common\models\User
     */
    private $_user;

    /**
     * Creates a form model given a token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */
    public function __construct($token, $config = [])
    {
        if (empty($token) || !is_string($token)) {
            throw new InvalidParamException('Token no puede estar vacio.');
        }
        $this->_user = User::findByToken($token);
        if (!$this->_user) {
            throw new InvalidParamException('Error con el Token.');
        }
        parent::__construct($config);
    }  


    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function activar()
    {
        $user = $this->_user;
        $user->status=10;
        $user->removePasswordResetToken();

        return $user->save(false);
    }
}
