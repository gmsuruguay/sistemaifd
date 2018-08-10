<?php
namespace common\models;
use yii;
use yii\base\Model;


class HelperSede extends Model
{   
    
   
    public static function obtenerSede(){

        $session = Yii::$app->session;
        $sede = $session->get('sede');

        return $sede;
        
    } 
    
    
    
}