<?php

/**
 * Description of TestEvent
 *
 * @author Raul_Innovatic
 */

namespace common\models\eventListener;
use backend\models\Turno;

class TestEvent extends BaseEvent{
    
    
    function __construct($last_check) {
        parent::__construct($last_check);
    }

    
    public function getEvents($last_check) {
        $turnos = Turno::find()
                ->andWhere("ultima_modificacion >= '$last_check' ")
                ->all();
        
        $array = [];
        foreach ($turnos as $turno) {
            $array[] = [
                'id' => $turno->id,
                'horario' => $turno->horario,
                'fecha' => $turno->fecha,
            ];
        }
        
        return $array;
    }

}
