<?php

    class Lamp {
        private $lamp_id;
        private $lamp_name;
        private $lamp_model;
        private $lamp_zone;
        private $lamp_on;
    
    public function __construct($lamp_id, $lamp_name, $lamp_model, $lamp_zone, $lamp_on){
        $this->lamp_id = $lamp_id;
        $this->lamp_name = $lamp_name;
        $this->lamp_model = $lamp_model;
        $this->lamp_zone = $lamp_zone;
        $this->lamp_on = $lamp_on;
    }
    
    function getLamp_id(){
        return $this->lamp_id;
    }

    function setLamp_id($lamp_id){
        $this->lamp_id = $lamp_id;
    }

    function getLamp_name(){
        return $this->lamp_name;
    }

    function setLamp_name($lamp_name){
        $this->lamp_name = $lamp_name;
    }

    function getLamp_model(){
        return $this->lamp_model;
    }
    
    function setLamp_model($lamp_model){
        $this->lamp_model = $lamp_model;
    }

    function getLamp_zone(){
        return $this->lamp_zone;
    }

    function setLamp_zone($lamp_zone){
        $this->lamp_zone = $lamp_zone;
    }

    function getLamp_on(){
        return $this->lamp_on;
    }

    function setLamp_on($lamp_on){
        $this->lamp_on = $lamp_on;
    }
}

$a = new Lamp();
$a->getAll();

?>