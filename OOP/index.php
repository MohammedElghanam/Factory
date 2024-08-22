<?php
interface Details{
    public function afficherDetails();
}

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

class Proprietaire extends User{

    public function afficherDetails()
    {
        echo "Nom du propitaire: {$this->name} \n" . "Adresse du proprietaire: {$this->adress} \n" . "phoneNumber du proprietaire: {$this->phoneNumber}\n\n";
    }

}

class Vehicule implements Details {

    private $matricule;
    private $type;
    private $proprietaire;

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
        $details = "Véhicule: {$this->matricule}\nType: {$this->type}\n";
        if ($this->proprietaire !== null) {
            $details .= "Proprietaire: {$this->proprietaire->getName()}\n\n";
        } else {
            $details .= " Proprietaire: Null\n\n";
        }
        return $details;
    }
}

class Trajet implements Details {

    protected $vehicule;
    private $pointEntre;
    private $pointSortie;
    private $dateEntre;
    private $HeurEntre;
    private $events = [];

    public function __construct($vehicule, $pointEntre, $pointSortie, $dateEntre, $HeurEntre) {
        $this->vehicule = $vehicule;
        $this->pointEntre = $pointEntre;
        $this->pointSortie = $pointSortie;
        $this->dateEntre = $dateEntre;
        $this->HeurEntre = $HeurEntre;
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
    
    public function getHeurEntre() {
        return $this->HeurEntre;
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
    
    public function setHeurEntre($HeurEntre) {
        $this->HeurEntre = $HeurEntre;
    }

    public function setEvents($events) {
        $this->events = $events;
    }

    public function afficherDetails() {
        
        $details = "Véhicule: {$this->vehicule->getMatricule()}" .
        "\nEntre: {$this->pointEntre}" .
        "\nSortie: {$this->pointSortie}" .
        "\nDate d'entrée: {$this->dateEntre}" .
        "\nHeur d'entrée: {$this->HeurEntre}\n";
        
        foreach ($this->events as $event) {
            $details .= $event->afficherDetails() . "\n";
        }
        return $details;
    }
}

class Event implements Details {

    private $type;
    private $description;
    private $event_time;

    public function __construct($type, $event_time, $description) {
        $this->type = $type;
        $this->event_time = $event_time;
        $this->description = $description;
    }

    // Getters
    public function getType() {
        return $this->type;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getTime() {
        return $this->event_time;
    }

    // Setters
    public function setType($type) {
        $this->type = $type;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setTime($event_time) {
        $this->event_time = $event_time;
    }

    public function afficherDetails() {
        return "\nEvent_Type: {$this->type}" . 
        "\nHeure de l'événement: {$this->event_time}" . 
        "\nEvent_Description: {$this->description}\n";
    }
}

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
        return "Emplacement: {$this->emplacement}" . 
        "\nPrix: {$this->price}" . 
        "\nVéhicule: {$this->vehicule->getMatricule()}\n\n";
    }
}







// Création des propriétaires
$proprietaire1 = new Proprietaire("John Doe", "123 Elm St", "123456");
$proprietaire2 = new Proprietaire("Jane Smith", "456 Oak St", "67890");

// Création des véhicules
$vehicule1 = new Vehicule("ABC123", "voiture", $proprietaire1);
$vehicule2 = new Vehicule("XYZ789", "camion", $proprietaire2);
$vehicule3 = new Vehicule("LMN456", "moto");

// Création des trajets
$trajet1 = new Trajet($vehicule1, "City A", "City B", "2024-06-01", "08:00", []);
$trajet2 = new Trajet($vehicule2, "City C", "City D", "2024-06-02", "10:00", []);

// Ajout d'événements aux trajets
$event1 = new Event("arrêt"," 10:15", "testtesttesttesttest");
$event2 = new Event("dépassement de vitesse", "21:55", "testtesttesttesttest");

$trajet1->setEvents([$event1, $event2]);

// Création des péages
$peage1 = new Peage("péage 1", 50, $vehicule1);
$peage2 = new Peage("péage 2", 75, $vehicule2);

// Affichage des détails
echo "\n";
echo "--- Détails des propriétaires ---:\n";
$proprietaire1->afficherDetails();
$proprietaire2->afficherDetails();
echo "\n\n";

echo "--- Détails des véhicules ---:\n";
echo $vehicule1->afficherDetails();
echo "\n";
echo $vehicule2->afficherDetails();
echo "\n";
echo $vehicule3->afficherDetails();
echo "\n\n";
echo "\n";


echo "--- Détails des trajets ---:\n";
echo $trajet1->afficherDetails();
echo "\n";
echo $trajet2->afficherDetails();
echo "\n\n";


echo "--- Détails des péages ---:\n";
echo $peage1->afficherDetails();
echo "\n";
echo $peage2->afficherDetails();
echo "\n\n";