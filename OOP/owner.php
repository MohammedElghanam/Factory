

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

$owner = new Owner("MOHAMED", "SAFI", "1234567890");

$owner->set_name("simon");
echo  $owner->get_name();




