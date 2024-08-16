<?php

class Trajet implements Details {

    protected $vehicule;
    private $pointEntre;
    private $pointSortie;
    private $dateEntre;
    private $events = [];

    public function __construct($vehicule, $pointEntre, $pointSortie, $dateEntre) {
        $this->vehicule = $vehicule;
        $this->pointEntre = $pointEntre;
        $this->pointSortie = $pointSortie;
        $this->dateEntre = $dateEntre;
    }

    // Getters
    public function getVehicule() {
        return $this->vehicule;
    }

    public function getPointEntre() {
        return $this->pointEntre;
    }

    public function getPointSortie() {
        return $this->pointSortie;
    }

    public function getDateEntre() {
        return $this->dateEntre;
    }

    public function getEvents() {
        return $this->events;
    }

    // Setters
    public function setVehicule($vehicule) {
        $this->vehicule = $vehicule;
    }

    public function setPointEntre($pointEntre) {
        $this->pointEntre = $pointEntre;
    }

    public function setPointSortie($pointSortie) {
        $this->pointSortie = $pointSortie;
    }

    public function setDateEntre($dateEntre) {
        $this->dateEntre = $dateEntre;
    }

    public function setEvents($events) {
        $this->events = $events;
    }

    public function afficherDetails() {
        $details = "Trajet: Véhicule: {$this->vehicule->getMatricule()}, Entre: {$this->pointEntre}, Sortie: {$this->pointSortie}, Date d'entrée: {$this->dateEntre}\n";
        foreach ($this->events as $event) {
            $details .= $event->afficherDetails() . "\n";
        }
        return $details;
    }
}
