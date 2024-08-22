<?php
require_once 'classes/Details.php';
require_once 'classes/User.php';
require_once 'classes/Proprietaire.php';
require_once 'classes/Vehicule.php';
require_once 'classes/Trajet.php';
require_once 'classes/Peage.php';
require_once 'classes/Event.php';

// Création des propriétaires
$proprietaire1 = new Proprietaire("John Doe", "123 Elm St", "123456");
$proprietaire2 = new Proprietaire("Jane Smith", "456 Oak St", "67890");

// Création des véhicules
$vehicule1 = new Vehicule("ABC123", "voiture", $proprietaire1);
$vehicule2 = new Vehicule("XYZ789", "camion", $proprietaire2);
$vehicule3 = new Vehicule("LMN456", "moto");

// Création des trajets
$trajet1 = new Trajet($vehicule1, "City A", "City B", "2024-06-01 08:00", []);
$trajet2 = new Trajet($vehicule2, "City C", "City D", "2024-06-02 10:00", []);

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

