<?php

class Vehicule implements Details {

    private $matricule;
    private $type;
    protected $proprietaire;

    public function __construct($matricule, $type, $proprietaire = null) {
        $this->matricule = $matricule;
        $this->type = $type;
        $this->proprietaire = $proprietaire;
    }

    // Getters
    public function getMatricule() {
        return $this->matricule;
    }

    public function getType() {
        return $this->type;
    }

    public function getProprietaire() {
        return $this->proprietaire;
    }

    // Setters
    public function setMatricule($matricule) {
        $this->matricule = $matricule;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function setProprietaire($proprietaire) {
        $this->proprietaire = $proprietaire;
    }

    public function afficherDetails() {
        $details = "Véhicule: {$this->matricule}, Type: {$this->type}";
        if ($this->proprietaire !== null) {
            $details .= ", Proprietaire: {$this->proprietaire->getName()}";
        } else {
            $details .= ", Proprietaire: Null";
        }
        return $details;
    }
}
