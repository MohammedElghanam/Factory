<?php

class owner {
    
    public $name;
    public $address;
    public $phone;
    
    public function __construct($name, $address, $phone){
        $this->name = $name;
        $this->address = $address;
        $this->phone = $phone;
    }
    
    // Getters
    public function get_name(){
        return $this->name;
    }
    
    public function get_address(){
         return $this->address;
    }
    
    public function get_phone(){
         return $this->phone;
    }
    
    
    // Setters
    public function set_name($name){
        $this->name = $name;
    }
    
    public function set_address($address){
        $this->address = $address;
    }
    
    public function set_phone($phone){
        $this->phone = $phone; 
    }
    
    // display details owner
    public function display_details(){
        echo "DISPLAY DETAILS OWNER : \n";
        echo "name : " . $this->name . "\n";
        echo "address : " . $this->address . "\n";
        echo "phone : " . $this->phone . "\n";
    }
    
}
$owner = new Owner("HASSAN", "SAFI", "1234567890");
// $owner->display_details();



class Vehicle{
    
    public $matricule;
    public $type;
    public $owner;

    public function __construct($matricule, $type, $owner= NULL){
        $this->matricule = $matricule;
        $this->type = $type;
        $this->owner = $owner;
    }
    
    // Getters 
    public function get_matricule(){
        return $this->matricule;
    }
    
    public function get_type(){
        return $this->type;
    }
    
    public function get_owner(){
        return $this->owner;
    }
    
    
    // Setters
    public function set_matricule($matricule){
        $this->matricule = $matricule;
    }
    
    public function set_type($type){
        $this->type = $type;
    }
    
    public function set_owner($owner){
        $this->owner = $owner;
    }
    
    
    // DISPLAY DETAILS OF VEHICULE
    public function display_details(){
        echo "DETAILS OF VEHICULE : \n";
        echo "matricule : " . $this->matricule . "\n";
        echo "type : " . $this->type . "\n";
        if($this->owner == NULL){
            echo "owner : This car has no owner. \n";
        }else{
            echo "owner : " . $this->owner . "\n";
        }
    }
    
}
$vehicule = new Vehicle("AXBO123", "VOITURE", $owner->get_name());
// $vehicule->display_details();


class Trajet{
    
    public $vehicule;
    public $entre;
    public $sortie;
    public $Date;
    public $heur;
    
    public function __construct($vehicule, $entre, $sortie, $Date, $heur){
        $this->vehicule = $vehicule;
        $this->entre = $entre;
        $this->sortie = $sortie;
        $this->Date = $Date;
        $this->heur = $heur;
    }
    
    // Getters
    public function get_vehicule(){
        return $this->vahicule;
    }
    
    public function get_entre(){
        return $this->entre;
    }
    
    public function get_sortie(){
        return $this->sortie;
    }
    
    public function get_Date(){
        return $this->Date;
    }
    
    public function get_heur(){
        return $this->heur;
    }
    
    
    // Setters
    public function set_vehicule(){
        $this->vehicule = $vehicule;
    }
    
    public function set_entre(){
        $this->entre = $entre;
    }
    
    public function set_sortie(){
        $this->sortie = $sortie;
    }
    
    public function set_Date(){
        $this->Date = $Date;
    }
    
    public function set_heur(){
        $this->heur = $heur;
    }
    
    
    // DISPLAY DETAILS OF TRAJET 
    public function display_details(){
        echo "DETAILS OF TRAJET : \n";
        if($this->vehicule != NULL){
            echo "vehicule : " . $this->vehicule . "\n";
            echo "entre : " . $this->entre . "\n";
            echo "sortie : " . $this->sortie . "\n";
            echo "Date : " . $this->Date . "\n";
            echo "heur : " . $this->heur . "\n";
        }else{
            echo "this trajet not found";
        }
        
    }
}
$trajet = new trajet($vehicule->get_type(), "safi", "paris", "16-08-2024", "12:00:00");
// $trajet->display_details();




class Peage{
    
    public $emplacement;
    public $montant;
    public $vehicule;

    public function __construct($emplacement, $montant, $vehicule){
        $this->emplacement = $emplacement;
        $this->montant = $montant;
        $this->vehicule = $vehicule;
    }
    
    // Getters 
    public function get_emplacement(){
        return $this->emplacement;
    }
    
    public function get_montant(){
        return $this->montant;
    }
    
    public function get_vehicule(){
        return $this->vehicule;
    }
    
    
    // Setters
    public function set_emplacement($emplacement){
        $this->emplacement = $emplacement;
    }
    
    public function set_montant($montant){
        $this->montant = $montant;
    }
    
    public function set_vehicule($vehicule){
        $this->vehicule = $vehicule;
    }
    
    
    // DISPLAY DETAILS OF PEAGE
    public function display_details(){
        echo "DETAILS OF PEAGE : \n";
        echo "emplacement : " . $this->emplacement . "\n";
        echo "montant : " . $this->montant . "DH \n";
        echo "vehicule : " . $this->vehicule . "\n";
    }
    
}
$peage = new peage("peage lisasfa", 20, $vehicule->get_matricule());
// $peage->display_details();