<?php

/**
 * Description of BaseEvent
 *
 * @author Raul_Innovatic
 */
namespace common\models\eventListener;

abstract class BaseEvent {
    
    private $last_check;
    private $limit = 600;//10 min
    private $repeticiones_maximas = 3;
    private $espera = 1;// segundo
    
    
    function __construct($last_check) {
        $this->last_check = $last_check;
    }

    
    public function listen(){
        set_time_limit($this->limit);
        $repeticiones_actuales = 0;
        
        while($repeticiones_actuales < $this->repeticiones_maximas){
            // check event
            $events = $this->getEvents($this->last_check);
            
            if(count($events)){
                echo json_encode($events);
                return;
            }
            
            sleep($this->espera);
            $repeticiones_actuales++;
        }
        
        // default value
        echo json_encode([]);
        return;
    }
    
    /**
     * Devuelve un listado de eventos ocurridos
     * @timestamp $last_check momento apartir del cual escuchar
     * @return array listado de eventos ocurridos
     */
    public abstract function getEvents($last_check);
    
}
