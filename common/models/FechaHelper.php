<?php

namespace common\models;

class FechaHelper {
    
    const DIA_SHORT_DOM  = 'dom.';
    const DIA_SHORT_LUN  = 'lun.';
    const DIA_SHORT_MAR  = 'mart.';
    const DIA_SHORT_MIER = 'mié.';
    const DIA_SHORT_JUE  = 'jue.';
    const DIA_SHORT_VIE  = 'vie.';
    const DIA_SHORT_SAB  = 'sáb.';
    
    const DIAS_SHORT = array(
        'Sunday'    => self::DIA_SHORT_DOM,
        'Monday'    => self::DIA_SHORT_LUN,
        'Tuesday'   => self::DIA_SHORT_MAR,
        'Wednesday' => self::DIA_SHORT_MIER,
        'Thursday'  => self::DIA_SHORT_JUE,
        'Friday'    => self::DIA_SHORT_VIE,
        'Saturday'  => self::DIA_SHORT_SAB,
    );
    
    const DIAS_ORDER = array(
        'Sunday'    => 0,
        'Monday'    => 1,
        'Tuesday'   => 2,
        'Wednesday' => 3,
        'Thursday'  => 4,
        'Friday'    => 5,
        'Saturday'  => 6,
    );
    
    const SHORT_SPANISH_DAYS = array(
        self::DIA_SHORT_DOM => 'Domingo',
        self::DIA_SHORT_LUN => 'Lunes',
        self::DIA_SHORT_MAR => 'Martes',
        self::DIA_SHORT_MIER=> 'Miércoles',
        self::DIA_SHORT_JUE => 'Jueves',
        self::DIA_SHORT_VIE => 'Viernes',
        self::DIA_SHORT_SAB => 'Sábado',
    );
    
    public static function dateToDiaShort($fechaYMD){
        $str = date('l', strtotime($fechaYMD));
        $ds = self::DIAS_SHORT;
        return $ds[$str];
    }
    
    public static function dateToOrder($fechaYMD){
        $str = date('l', strtotime($fechaYMD));
        $ds = self::DIAS_ORDER;
        return $ds[$str];
    }
    
    public static function shortToSpanishDay($shortDay){
        $ssd = self::SHORT_SPANISH_DAYS;
        return $ssd[$shortDay];
    }
    
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
        return self::convertirFecha($fecha, '/', '-', 'Y-m-d');
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
