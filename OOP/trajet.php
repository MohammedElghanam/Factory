<?php
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

$vehicule = "voiture";
$trajet = new trajet($vehicule, "safi", "paris", "16-08-2024", "12:00:00");
$trajet->display_details();