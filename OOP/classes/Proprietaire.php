<?php

class Proprietaire extends User{

    public function afficherDetails()
    {
        echo "Nom du propitaire: {$this->name}, Adresse du proprietaire: {$this->adress}, phoneNumber du proprietaire: {$this->phoneNumber}\n";
    }

}

