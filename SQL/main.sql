-- 1. Créer la base de données :

CREATE DATABASE autoroute;
USE autoroute;

CREATE TABLE OWNER (
    ID int AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL UNIQUE,
    address VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE VEHICULE (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    type ENUM('voiture', 'camion', 'moto'),
    matricule VARCHAR(255) NOT NULL,
    id_owner INT,
    FOREIGN KEY (id_owner) REFERENCES OWNER(ID) ON DELETE CASCADE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE TRAJET (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    entree VARCHAR(255) NOT NULL,
    date_entree DATETIME NOT NULL,
    sortie VARCHAR(255) NOT NULL,
    date_sortie DATETIME NOT NULL,
    id_vehicule INT NOT NULL,
    FOREIGN KEY (id_vehicule) REFERENCES VEHICULE(ID) ON DELETE CASCADE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE PEAGE (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    price INT NOT NULL,
    emplacement VARCHAR(255) NOT NULL,
    id_trajet INT,
    FOREIGN KEY (id_trajet) REFERENCES TRAJET(ID) ON DELETE SET NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE EVENTS (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    type ENUM('arrêts', 'dépassements de vitesse', 'accidents', 'réparations') NOT NULL,
    minute_event DATETIME NOT NULL,
    id_vehicule INT NOT NULL,
    id_trajet INT NOT NULL,
    FOREIGN KEY (id_vehicule) REFERENCES VEHICULE(ID),
    FOREIGN KEY (id_trajet) REFERENCES TRAJET(ID),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


-- 2. Insertion de données :

-- Insert data into OWNER table
INSERT INTO OWNER (name, phone, address)
VALUES 
('Ahmed Ben', '0612345678', 'Rue 123, Casablanca'),
('Yassine Ali', '0623456789', 'Avenue 456, Rabat'),
('Fatima Zahra', '0634567890', 'Boulevard 789, Marrakech'),
('Said Amr', '0645678901', 'Quartier 101, Fes'),
('Imane Idrissi', '0656789012', 'Route 202, Tangier');

-- Insert data into VEHICULE table
INSERT INTO VEHICULE (type, matricule, id_owner)
VALUES 
('voiture', 'ABC-123', 1),
('camion', 'DEF-456', 1),  -- Ahmed has two vehicles
('moto', 'GHI-789', 2),
('voiture', 'JKL-101', 3),
('voiture', 'MNO-112', 4);

-- Insert data into TRAJET table
INSERT INTO TRAJET (entree, date_entree, sortie, date_sortie, id_vehicule)
VALUES 
('Casablanca', '2024-08-10 08:00:00', 'Rabat', '2024-08-10 10:00:00', 1),
('Rabat', '2024-08-11 09:00:00', 'Kenitra', '2024-08-11 10:30:00', 1), -- Same car as first trip
('Kenitra', '2024-08-12 07:00:00', 'Tangier', '2024-08-12 11:00:00', 2), -- Different vehicle
('Marrakech', '2024-08-13 06:00:00', 'Casablanca', '2024-08-13 08:30:00', 3),
('Tangier', '2024-08-14 12:00:00', 'Fes', '2024-08-14 15:00:00', 5);

-- Insert data into PEAGE table
INSERT INTO PEAGE (price, emplacement, id_trajet)
VALUES 
(20, 'Casablanca-Rabat', 1),
(30, 'Rabat-Kenitra', 2),
(50, 'Kenitra-Tangier', 3),
(40, 'Marrakech-Casablanca', 4),
(60, 'Tangier-Fes', 5);

-- Insert data into EVENTS table
INSERT INTO EVENTS (type, minute_event, id_vehicule, id_trajet)
VALUES 
('arrêts', '2024-08-10 09:00:00', 1, 1),
('dépassements de vitesse', '2024-08-11 09:45:00', 1, 2),
('accidents', '2024-08-12 09:00:00', 2, 3),
('réparations', '2024-08-13 07:30:00', 3, 4),
('arrêts', '2024-08-14 13:00:00', 5, 5);






-- 3. Requêtes SQL :


-- 1. Sélectionner tous les véhicules et leurs propriétaires.
SELECT vehicule.type, vehicule.matricule, owner.ID, owner.name
FROM vehicule 
JOIN owner ON vehicule.id_owner = owner.ID;

--1.1 Identifiez tous les véhicules qui n’ont pas de propriétaire
SELECT * FROM vehicule WHERE id_owner IS NULL;

-- 2. Trouver tous les trajets effectués par un véhicule spécifique.
SELECT * FROM trajet WHERE id_vehicule = 1

-- 3. Identifier tous les péages enregistrés pour aujourd'hui.
SELECT * FROM peage 
WHERE DATE(created_at) = '2024-08-14'; 
-- ou CURDATE() ou CURRENT_DATE()


-- 4. Calculer la moyenne des trajets par jour pour chaque véhicule.
SELECT id_vehicule,
	COUNT(id_vehicule),
	COUNT(DISTINCT DATE(date_entree)),
    COUNT(id_vehicule) / COUNT(DISTINCT DATE(date_entree))
    
FROM trajet
GROUP BY id_vehicule


-- 5. Trouver le nombre total de trajets enregistrés sur l'autoroute.
SELECT COUNT(*) AS Number_trajet
FROM TRAJET;


-- 6. Identifier les véhicules qui ont le plus de trajets ce mois-ci. 

SELECT  
	v.ID, 
	v.matricule,
	t.id_vehicule,
	COUNT(t.id_vehicule) AS number_trajet 
FROM trajet t 
JOIN vehicule v ON t.id_vehicule = v.ID
WHERE MONTH(date_entree) = MONTH(CURDATE()) OR YEAR(date_entree) = YEAR(CURDATE())
GROUP BY t.id_vehicule
ORDER BY number_trajet DESC;

