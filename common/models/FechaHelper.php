<?php

namespace common\models;

class FechaHelper {    
    
    /**
     * Calcula los dias entre dos fecha 
     * @param type $desdeYMD
     * @param type $hastaYMD
     * @return type integer el numero entero de dias de diferencia
     */
    public static function diferenciaDias($desdeYMD, $hastaYMD){
        $fechaDesdeTime = strtotime($desdeYMD);
        $fechaHastaTime = strtotime($hastaYMD);
        $diff = $fechaHastaTime - $fechaDesdeTime;
        $dias = round($diff / (60 * 60 * 24),0);
        
        return $dias;
    }
    
    
    public static function diferenciaTimestamps($desdeTimestamp, $hastaTimestamp){
        $fechaDesdeTime = strtotime($desdeTimestamp);
        $fechaHastaTime = strtotime($hastaTimestamp);
        $diff = $fechaHastaTime - $fechaDesdeTime;
        
        return $diff;
    }
    
    public static function addDay($fechaYMD, $cantidadDias) {
        return date('Y-m-d', strtotime("$fechaYMD $cantidadDias day"));
    }

    /**
     * Convertir una fecha en formato YMD al formato DMY.
     * 
     * @param string $fecha La fecha en formato YMD.
     * @return string La fecha en formato DMY, o la fecha original si la conversión no puede realizarse.
     */
    public static function fechaDMY($fecha) {
        return self::convertirFecha($fecha, '-', '/', 'd/m/Y');
    }

    /**
     * Convertir una fecha en formato DMY al formato YMD.
     * 
     * @param string $fecha La fecha en formato DMY.
     * @return string La fecha en formato YMD, o la fecha original si la conversión no puede realizarse.
     */
    public static function fechaYMD($fecha) {
        return self::convertirFecha($fecha, '/', '-', 'Y/m/d');
    }

    /**
     * Convertir una fecha a un formato en particular.
     *
     * @param string fecha La fecha a convertir.
     * @param string separadorOrigen El separador de fecha en el formato de origen.
     * @param string separadorDestino El separador de fecha en el formato de destino.
     * @param string formato El formato de destino al cual se desea convertir la fecha ingresada.
     * @return string La fecha en el formato de destino, o la fecha original si la conversión no puede realizarse.
     */
    private static function convertirFecha($fecha, $separadorOrigen, $separadorDestino, $formato) {
        $time = strtotime(str_replace($separadorOrigen, $separadorDestino, $fecha));

        if (!$time) {
            return $fecha;
        }

        return date($formato, $time);
    }

    /**
    * Convertir una fecha a un formato en letra
    */
    public static function obtenerFechaEnLetra($fecha){
        
        if(empty($fecha)){
           return null; 
        }
        setlocale(LC_ALL,"es_ES","esp");        
        $fecha_en_letra = strftime("%A %d de %B de %Y", strtotime($fecha));
        return utf8_encode($fecha_en_letra);
        
       
    } 

    /**
    * Formatear fecha a dd-mm-aaaa
    */
    public static function formatearFecha($fecha)
    {       
        return isset($fecha) ? date('d-m-Y', strtotime($fecha)): '-'; 
    }

}
