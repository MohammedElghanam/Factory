
<?php
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
        // echo $this->emplacement;
        // echo $this->montant;
        // echo $this->vehicule;
    }
    
}

$vehicule = "camion";
$peage = new peage("peage lisasfa", 20, $vehicule);
$peage->display_details();
// echo $peage->get_emplacement();







