
CREATE TABLE OWNER (
    ID int AUTO_INCREMENT PRIMARY KEY,
    name varchar(255),
    phone varchar(255),
    address varchar(255)
);

CREATE TABLE VEHCULE (
    ID int AUTO_INCREMENT PRIMARY KEY,
    matrecul varchar(255),
    type varchar(255) CHECK(type IN ('voiture', 'camion', 'moto')) NOT NULL,
    id_owner int NULL,
    FOREIGN KEY (id_owner) REFERENCES OWNER(ID)
);

CREATE TABLE TRAJET(
    ID int AUTO_INCREMENT PRIMARY KEY,
    entree varchar(255),
    date_entree DateTime,
    sortie varchar(255),
    date_sortie DateTime,
    id_vehcule int,
    FOREIGN KEY (id_vehcule) REFERENCES VEHCULE(ID)
);

CREATE TABLE EVENTS(
    ID int AUTO_INCREMENT PRIMARY KEY,
    menut_event DateTime,
    type varchar(255) CHECK(type IN ('arrêts', 'dépassements de vitesse', 'accidents', 'réparations')) NOT NULL,
    id_trajet int,
    id_vehcule int,
    FOREIGN KEY (id_trajet) REFERENCES TRAJET(ID),
    FOREIGN KEY (id_vehcule) REFERENCES VEHCULE(ID)
);

CREATE TABLE PEAGE(
    ID int AUTO_INCREMENT PRIMARY KEY,
    price int,
    emplacement varchar(255),
    id_trajet int,
    FOREIGN KEY (id_trajet) REFERENCES TRAJET(ID)
);

        



INSERT INTO OWNER (ID, name, phone, address) VALUES 
(1, 'John Doe', '123-456-7890', '123 Elm Street'),
(2, 'Jane Smith', '987-654-3210', '456 Oak Avenue');

INSERT INTO VEHCULE (ID, matrecul, type, id_owner) VALUES 
(1, 'ABC123', 'voiture', 1),
(2, 'XYZ789', 'camion', 2);

INSERT INTO TRAJET (ID, entree, date_entree, sortie, date_sortie, id_vehcule) VALUES 
(1, 'Paris', '2024-08-01 08:00:00', 'Lyon', '2024-08-01 12:00:00', 1),
(2, 'Lyon', '2024-08-02 09:00:00', 'Marseille', '2024-08-02 13:00:00', 2);

INSERT INTO EVENTS (ID, menut_event, type, id_trajet, id_vehcule) VALUES 
(1, '2024-08-01 10:00:00', 'arrêts', 1, 1),
(2, '2024-08-02 11:00:00', 'réparations', 2, 2);

INSERT INTO PEAGE (ID, price, emplacement, id_trajet) VALUES 
(1, 5, 'Peage Paris-Lyon', 1),
(2, 8, 'Peage Lyon-Marseille', 2);

-- 3. Requêtes SQL :


-- 1. Sélectionner tous les véhicules et leurs propriétaires.
SELECT  OWNER.name, VEHCULE.type, VEHCULE.matrecul
FROM VEHCULE
JOIN OWNER ON OWNER.ID = VEHCULE.id_owner;

-- 2. Trouver tous les trajets effectués par un véhicule spécifique.
SELECT *
FROM TRAJET WHERE id_vehcule = 1;

-- 3. Identifier tous les péages enregistrés pour aujourd'hui.

-- 4. Calculer la moyenne des trajets par jour pour chaque véhicule.

-- 5. Trouver le nombre total de trajets enregistrés sur l'autoroute.
SELECT COUNT(*) AS Number_trajet
FROM TRAJET;


-- 6. Identifier les véhicules qui ont le plus de trajets ce mois-ci. 