<?php
namespace backend\models;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class SolicitarDniForm extends Model
{
    public $dni;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dni'], 'required'],
            [['dni'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dni' => 'DNI',
        ];
    }

}