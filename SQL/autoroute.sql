-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2024 at 07:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autoroute`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `ID` int(11) NOT NULL,
  `type` enum('arrêts','dépassements de vitesse','accidents','réparations') NOT NULL,
  `mimut_event` datetime NOT NULL,
  `id_vehicule` int(11) NOT NULL,
  `id_trajet` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`ID`, `type`, `mimut_event`, `id_vehicule`, `id_trajet`, `created_at`, `updated_at`) VALUES
(1, 'arrêts', '2024-08-10 09:00:00', 1, 1, '2024-08-15 16:10:55', '2024-08-15 16:10:55'),
(2, 'dépassements de vitesse', '2024-08-11 09:45:00', 1, 2, '2024-08-15 16:10:55', '2024-08-15 16:10:55'),
(3, 'accidents', '2024-08-12 09:00:00', 2, 3, '2024-08-15 16:10:55', '2024-08-15 16:10:55'),
(4, 'réparations', '2024-08-13 07:30:00', 3, 4, '2024-08-15 16:10:55', '2024-08-15 16:10:55'),
(5, 'arrêts', '2024-08-14 13:00:00', 5, 5, '2024-08-15 16:10:55', '2024-08-15 16:10:55');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`ID`, `name`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Ahmed Ben', '0612345678', 'Rue 123, Casablanca', '2024-08-15 16:08:01', '2024-08-15 16:08:01'),
(2, 'Yassine Ali', '0623456789', 'Avenue 456, Rabat', '2024-08-15 16:08:01', '2024-08-15 16:08:01'),
(3, 'Fatima Zahra', '0634567890', 'Boulevard 789, Marrakech', '2024-08-15 16:08:01', '2024-08-15 16:08:01'),
(4, 'Said Amr', '0645678901', 'Quartier 101, Fes', '2024-08-15 16:08:01', '2024-08-15 16:08:01'),
(5, 'Imane Idrissi', '0656789012', 'Route 202, Tangier', '2024-08-15 16:08:01', '2024-08-15 16:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `peage`
--

CREATE TABLE `peage` (
  `ID` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `emplacement` varchar(255) NOT NULL,
  `id_trajet` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peage`
--

INSERT INTO `peage` (`ID`, `price`, `emplacement`, `id_trajet`, `created_at`, `updated_at`) VALUES
(1, 20, 'Casablanca-Rabat', 1, '2024-08-15 16:08:01', '2024-08-15 16:08:01'),
(2, 30, 'Rabat-Kenitra', 2, '2024-08-15 16:08:01', '2024-08-15 16:08:01'),
(3, 50, 'Kenitra-Tangier', 3, '2024-08-15 16:08:01', '2024-08-15 16:08:01'),
(4, 40, 'Marrakech-Casablanca', 4, '2024-08-15 16:08:01', '2024-08-15 16:08:01'),
(5, 60, 'Tangier-Fes', 5, '2024-08-15 16:08:01', '2024-08-15 16:08:01'),
(6, 20, 'Casablanca-Rabat', 1, '2024-08-13 23:00:00', '2024-08-13 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `trajet`
--

CREATE TABLE `trajet` (
  `ID` int(11) NOT NULL,
  `entree` varchar(255) NOT NULL,
  `date_entree` datetime NOT NULL,
  `sortie` varchar(255) NOT NULL,
  `date_sortie` datetime NOT NULL,
  `id_vehicule` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trajet`
--

INSERT INTO `trajet` (`ID`, `entree`, `date_entree`, `sortie`, `date_sortie`, `id_vehicule`, `created_at`, `updated_at`) VALUES
(1, 'Casablanca', '2024-08-10 08:00:00', 'Rabat', '2024-08-10 10:00:00', 1, '2024-08-15 16:08:01', '2024-08-15 16:08:01'),
(2, 'Rabat', '2024-08-11 09:00:00', 'Kenitra', '2024-08-11 10:30:00', 1, '2024-08-15 16:08:01', '2024-08-15 16:08:01'),
(3, 'Kenitra', '2024-08-12 07:00:00', 'Tangier', '2024-08-12 11:00:00', 2, '2024-08-15 16:08:01', '2024-08-15 16:08:01'),
(4, 'Marrakech', '2024-08-13 06:00:00', 'Casablanca', '2024-08-13 08:30:00', 3, '2024-08-15 16:08:01', '2024-08-15 16:08:01'),
(5, 'Tangier', '2024-08-14 12:00:00', 'Fes', '2024-08-14 15:00:00', 5, '2024-08-15 16:08:01', '2024-08-15 16:08:01'),
(6, 'SAFI', '2024-08-15 08:00:00', 'KECH', '2024-08-15 09:00:00', 1, '2024-08-15 17:35:51', '2024-08-15 17:35:51'),
(7, 'KECH', '2024-08-15 10:00:00', 'SAFI', '2024-08-15 11:00:00', 1, '2024-08-15 17:35:51', '2024-08-15 17:35:51'),
(8, 'SAFI', '2024-08-15 12:00:00', 'KECH', '2024-08-15 13:00:00', 1, '2024-08-15 17:35:51', '2024-08-15 17:35:51'),
(9, 'RABAT', '2024-08-15 08:30:00', 'FEZ', '2024-08-15 09:30:00', 2, '2024-08-15 17:35:51', '2024-08-15 17:35:51'),
(10, 'FEZ', '2024-08-15 10:30:00', 'RABAT', '2024-08-15 11:30:00', 2, '2024-08-15 17:35:51', '2024-08-15 17:35:51'),
(11, 'RABAT', '2024-08-15 12:30:00', 'FEZ', '2024-08-15 13:30:00', 2, '2024-08-15 17:35:51', '2024-08-15 17:35:51'),
(12, 'TANGER', '2024-08-15 09:00:00', 'AGADIR', '2024-08-15 10:00:00', 3, '2024-08-15 17:35:51', '2024-08-15 17:35:51'),
(13, 'AGADIR', '2024-08-15 11:00:00', 'TANGER', '2024-08-15 12:00:00', 3, '2024-08-15 17:35:51', '2024-08-15 17:35:51'),
(14, 'TANGER', '2024-08-15 13:00:00', 'AGADIR', '2024-08-15 14:00:00', 3, '2024-08-15 17:35:51', '2024-08-15 17:35:51'),
(16, 'Entree1', '2024-08-15 00:00:00', 'Sortie1', '2024-08-15 00:30:00', 1, '2024-08-15 18:03:05', '2024-08-15 18:03:05');

-- --------------------------------------------------------

--
-- Table structure for table `vehicule`
--

CREATE TABLE `vehicule` (
  `ID` int(11) NOT NULL,
  `type` enum('voiture','camion','moto') DEFAULT NULL,
  `matricule` varchar(255) NOT NULL,
  `id_owner` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicule`
--

INSERT INTO `vehicule` (`ID`, `type`, `matricule`, `id_owner`, `created_at`, `updated_at`) VALUES
(1, 'voiture', 'ABC-123', 1, '2024-08-15 16:08:01', '2024-08-15 16:08:01'),
(2, 'camion', 'DEF-456', 1, '2024-08-15 16:08:01', '2024-08-15 16:08:01'),
(3, 'moto', 'GHI-789', 2, '2024-08-15 16:08:01', '2024-08-15 16:08:01'),
(4, 'voiture', 'JKL-101', 3, '2024-08-15 16:08:01', '2024-08-15 16:08:01'),
(5, 'voiture', 'MNO-112', 4, '2024-08-15 16:08:01', '2024-08-15 16:08:01'),
(6, 'moto', 'BREX-35', NULL, '2024-08-15 16:21:45', '2024-08-15 16:21:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_vehicule` (`id_vehicule`),
  ADD KEY `id_trajet` (`id_trajet`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `peage`
--
ALTER TABLE `peage`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_trajet` (`id_trajet`);

--
-- Indexes for table `trajet`
--
ALTER TABLE `trajet`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_vehicule` (`id_vehicule`);

--
-- Indexes for table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `id_owner` (`id_owner`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peage`
--
ALTER TABLE `peage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trajet`
--
ALTER TABLE `trajet`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicule` (`ID`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`id_trajet`) REFERENCES `trajet` (`ID`);

--
-- Constraints for table `peage`
--
ALTER TABLE `peage`
  ADD CONSTRAINT `peage_ibfk_1` FOREIGN KEY (`id_trajet`) REFERENCES `trajet` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `trajet`
--
ALTER TABLE `trajet`
  ADD CONSTRAINT `trajet_ibfk_1` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicule` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `vehicule`
--
ALTER TABLE `vehicule`
  ADD CONSTRAINT `vehicule_ibfk_1` FOREIGN KEY (`id_owner`) REFERENCES `owner` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
