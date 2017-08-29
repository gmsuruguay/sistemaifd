<?php
namespace common\models;
use yii;
use backend\models\Perfil;


class ValorHelper
{   
    
    public static function nombreMes($mes)
    {
        switch ($mes) {
            case 3:
                return "Mar";
                break;
            case 4:
                return "Abr";
                break;
            case 5:
                return "May";
                break;
            case 6:
                return "Jun";
                break;
            case 7:
                return "Jul";
                break;
            case 8:
                return "Ago";
                break;
            case 9:
                return "Sep";
                break;
            case 10:
                return "Oct";
                break;
            case 11:
                return "Nov";
                break;
            case 12:
                return "Dic";
                break;
        }
    }

    public static function obtenerFechaEnLetra($fecha){
        setlocale(LC_ALL,"es_ES","esp");        
        $fecha_en_letra = strftime("%d de %B de %Y", strtotime($fecha));
        return $fecha_en_letra;
    } 
    
    
    
}