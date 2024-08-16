<?php
class Event{
    
    public $minut_event;
    public $description;
    public $type = [];
    
    
    public function __construct($type, $minut_event, $description){
        $this->type = $type;
        $this->minut_event = $minut_event;
        $this->description = $description;
    }
    
    // Getters 
    public function get_type(){
        return $this->type;
    }
    
    public function get_minut_event(){
        return $this->minut_event;
    }
    
    public function get_description(){
        return $this->description;
    }
    
    // Setters
    public function set_type($type){
        $this->type = $type;
    }
    
    public function set_minut_event($minut_event){
        $this->minut_event = $minut_event;
    }
    
    public function set_description($description){
         $this->description = $description;
    }
    
    // DISPLAYE DETAILS OF EVENTS
    public function display_details(){
        echo "DETAILS OF EVENTS : \n";
        foreach($this->type as $event){
            echo "type : " . $event . "\n";
        }
        echo "minut_event : " . $this->minut_event . "\n";
        echo "description : " . $this->description . "\n\n\n";
    }
    
    public function event(){
        foreach($this->type as $event){
            echo $event . "\n";
        }
    }
    
    
}

$event = new Event([], "12:00:00", "mgari fi autoroute");

$event->set_type(["slm", "cv"]);
$event->display_details();

$event1 = new Event([], "08:00:00", "BIN LHYA WLMOT");
$event->set_type(["labas ", "wnta"]);
$event->display_details();