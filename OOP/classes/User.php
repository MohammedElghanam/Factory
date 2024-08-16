<?php

abstract class User implements Details{
    
    protected $name;
    protected $adress;
    protected $phoneNumber;

    public function __construct($name, $adress, $phoneNumber) {
        $this->name = $name;
        $this->adress = $adress;
        $this->phoneNumber = $phoneNumber;
    }



    // Getters
    public function getName() {
        return $this->name;
    }

    public function getAdress() {
        return $this->adress;
    }

    public function getPhoneNumber() {
        return $this->phoneNumber;
    }

    // Setters
    public function setName($name) {
        $this->name = $name;
    }

    public function setAdress($adress) {
        $this->adress = $adress;
    }

    public function setPhoneNumber($phoneNumber) {
        $this->phoneNumber = $phoneNumber;
    }



    abstract function afficherDetails();

}