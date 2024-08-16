<?php

class Peage implements Details {

    private $price;
    private $emplacement;
    protected $vehicule;

    public function __construct($emplacement, $price, $vehicule) {
        $this->emplacement = $emplacement;
        $this->price = $price;
        $this->vehicule = $vehicule;
    }

    // Getters
    public function getEmplacement() {
        return $this->emplacement;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getVehicule() {
        return $this->vehicule;
    }

    // Setters
    public function setEmplacement($emplacement) {
        $this->emplacement = $emplacement;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setVehicule($vehicule) {
        $this->vehicule = $vehicule;
    }

    public function afficherDetails() {
        return "Péage: Emplacement: {$this->emplacement}, Prix: {$this->price}, Véhicule: {$this->vehicule->getMatricule()}";
    }
}

