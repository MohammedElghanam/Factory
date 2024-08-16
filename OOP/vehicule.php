# CLASS VEHICULE

<?php
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

$owner = "mohammed";
$vehicule = new Vehicle("AXBO123", "VOITURE", $owner);
$vehicule->display_details();
echo $vehicule->get_owner();