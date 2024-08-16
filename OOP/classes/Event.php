<?php

class Event implements Details {

    protected $type;
    private $description;
    private $event_time;

    public function __construct($type, $event_time, $description) {
        $this->type = $type;
        $this->event_time = $event_time;
        $this->description = $description;
    }

    // Getters
    public function getType() {
        return $this->type;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getTime() {
        return $this->event_time;
    }

    // Setters
    public function setType($type) {
        $this->type = $type;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setTime($event_time) {
        $this->event_time = $event_time;
    }

    public function afficherDetails() {
        return "Event: Type: {$this->type}, Heure de l'événement: {$this->event_time}, Description: {$this->description}";
    }
}


