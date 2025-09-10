-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 19, 2021 at 08:04 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `veloconcept`
--

-- --------------------------------------------------------

--
-- Table structure for table `composer`
--

DROP TABLE IF EXISTS `composer`;
CREATE TABLE IF NOT EXISTS `composer` (
  `refproduit` varchar(10) COLLATE utf8_bin NOT NULL,
  `refpiece` varchar(10) COLLATE utf8_bin NOT NULL,
  `qte` int(11) NOT NULL,
  PRIMARY KEY (`refproduit`,`refpiece`),
  KEY `refpiece` (`refpiece`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `composer`
--

INSERT INTO `composer` (`refproduit`, `refpiece`, `qte`) VALUES
('R1218', '1-002', 2),
('R1218', '2-009', 1),
('R1218', '3-010', 1),
('R1218', '4-009', 1),
('R1218', '5-005', 2),
('R1218', '6-006', 2),
('R1218', '7-009', 2),
('R1256', '1-002', 2),
('R1256', '2-009', 1),
('R1256', '3-009', 1),
('R1256', '4-010', 1),
('R1256', '5-005', 2),
('R1256', '6-006', 2),
('R1256', '7-011', 2),
('R302', '1-007', 2),
('R302', '2-003', 1),
('R302', '3-005', 1),
('R302', '4-007', 1),
('R302', '5-004', 2),
('R302', '6-003', 2),
('R302', '7-007', 2),
('R309', '1-009', 2),
('R309', '2-002', 1),
('R309', '3-005', 1),
('R309', '4-007', 1),
('R309', '5-003', 2),
('R309', '6-004', 2),
('R309', '7-006', 2),
('R415', '1-007', 2),
('R415', '2-001', 1),
('R415', '3-006', 1),
('R415', '4-008', 1),
('R415', '5-003', 2),
('R415', '6-003', 2),
('R415', '7-005', 2),
('V0822', '1-004', 2),
('V0822', '2-004', 1),
('V0822', '3-002', 1),
('V0822', '4-003', 1),
('V0822', '5-001', 2),
('V0822', '6-002', 2),
('V0822', '7-001', 2),
('V1166', '1-005', 2),
('V1166', '2-004', 1),
('V1166', '3-001', 1),
('V1166', '4-001', 1),
('V1166', '5-001', 2),
('V1166', '6-001', 2),
('V1166', '7-004', 2),
('V1256', '1-003', 2),
('V1256', '2-004', 1),
('V1256', '3-001', 1),
('V1256', '4-003', 1),
('V1256', '5-002', 2),
('V1256', '6-002', 2),
('V1256', '7-002', 2);

-- --------------------------------------------------------

--
-- Table structure for table `detaillant`
--

DROP TABLE IF EXISTS `detaillant`;
CREATE TABLE IF NOT EXISTS `detaillant` (
  `numero` varchar(10) COLLATE utf8_bin NOT NULL,
  `raisonsociale` varchar(50) COLLATE utf8_bin NOT NULL,
  `adresse` varchar(50) COLLATE utf8_bin NOT NULL,
  `cp` varchar(5) COLLATE utf8_bin NOT NULL,
  `ville` varchar(40) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `detaillant`
--

INSERT INTO `detaillant` (`numero`, `raisonsociale`, `adresse`, `cp`, `ville`) VALUES
('Aut_001', 'Vélos Keroux', '14 boulevard des peupliers', '22000', 'Saint Brieuc'),
('Aut_002', 'Vélos Leroy', '17 rue du Général Leclerc', '22000', 'Saint Brieuc'),
('Aut_003', 'Aux cycles d\'or', '15 rue des pommiers', '22000', 'Saint Brieuc'),
('Dec_001', 'Decathlon', '17 rue des lilas', '22000', 'Saint Brieuc'),
('Dec_002', 'Decathlon', '5 avenue du Général De Gaulle', '22200', 'Guingamp'),
('Dec_003', 'Decathlon', '15 boulevard Clémenceau', '22300', 'Lannion'),
('Int_001', 'Intersport', '140 boulevard de la liberté', '22000', 'Saint Brieuc'),
('Int_002', 'Intersport', '12 place des capucins', '22200', 'Guingamp'),
('Int_003', 'Intersport', '20 allée des acacias', '22300', 'Lannion');

-- --------------------------------------------------------

--
-- Table structure for table `pieces`
--

DROP TABLE IF EXISTS `pieces`;
CREATE TABLE IF NOT EXISTS `pieces` (
  `reference` varchar(10) COLLATE utf8_bin NOT NULL,
  `modele` varchar(40) COLLATE utf8_bin NOT NULL,
  `type` varchar(20) COLLATE utf8_bin NOT NULL,
  `stockqte` int(11) NOT NULL,
  `stockmaxi` int(11) NOT NULL,
  PRIMARY KEY (`reference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `pieces`
--

INSERT INTO `pieces` (`reference`, `modele`, `type`, `stockqte`, `stockmaxi`) VALUES
('1-001', 'OEN 905400167 Chevrolet A', 'Frein VTC', 120, 218),
('1-002', 'OEN 90544027 Chevrolet B', 'Frein VTC', 101, 200),
('1-003', '3T', 'Frein VTT', 26, 65),
('1-004', 'Enve 400', 'Frein VTT', 22, 48),
('1-005', 'Manitou 12', 'Frein VTT', 18, 42),
('1-006', 'Socitche Cane Creek', 'Frein VTT', 12, 16),
('1-007', '542161 OPEL A', 'Frein route', 40, 142),
('1-008', '542274 OPEL B', 'Frein route', 100, 320),
('1-009', '542292 OPEL C', 'Frein route', 88, 155),
('2-001', 'Selle Italia slx', 'Selle route', 144, 300),
('2-002', 'AXEL 207', 'Selle route', 18, 196),
('2-003', 'AXIS 8812', 'Selle route', 55, 142),
('2-004', 'Myriam 18', 'Selle VTT', 44, 46),
('2-005', 'Myriam 27', 'Selle VTT', 18, 120),
('2-006', 'SELLIUM 1215', 'Selle VTT', 77, 120),
('2-007', 'GREEN 14', 'Selle VTT', 18, 44),
('2-008', 'GREEN 27', 'Selle VTT', 6, 44),
('2-009', 'ARGEN X200', 'Selle VTC', 14, 32),
('2-010', 'ARGEN X208', 'Selle VTC', 44, 150),
('2-011', 'ARSA 21', 'Selle VTC', 12, 26),
('3-001', 'VINDI ALU123', 'Fourche VTT', 12, 48),
('3-002', 'VINDI ALU125', 'Fourche VTT', 18, 80),
('3-003', 'VINDI CARBO12', 'Fourche VTT', 89, 182),
('3-004', 'VINDI CARBO14', 'Fourche VTT', 44, 46),
('3-005', 'MAGIC 2000', 'Fourche route', 14, 28),
('3-006', 'MAGIC 2011', 'Fourche route', 10, 40),
('3-008', 'AMIONS 10000', 'Fourche route', 52, 60),
('3-009', 'AMIONS 2530', 'Fourche VTC', 22, 80),
('3-010', 'AMIONS 1827', 'Fourche VTC', 19, 33),
('4-001', 'SUPERSIX Canondale', 'Cadre VTT', 42, 63),
('4-002', 'VARGENT Canondale', 'Cadre VTT', 56, 122),
('4-003', 'GIAVON Canondale', 'Cadre VTT', 120, 120),
('4-004', 'GREES Canondale', 'Cadre VTT', 22, 110),
('4-005', 'JULY Giant', 'Cadre route', 12, 128),
('4-006', 'MARCH Giant', 'Cadre route', 25, 144),
('4-007', 'AUGUST Giant', 'Cadre route', 125, 140),
('4-008', 'OCTOBER Giant', 'Cadre route', 18, 133),
('4-009', 'COLUMBUS 24p', 'Cadre VTC', 41, 66),
('4-010', 'COLUMBUS 26p', 'Cadre VTC', 8, 125),
('4-011', 'SIXTEES 12jk56', 'Cadre VTC', 120, 125),
('5-001', 'Shimano ulteg', 'Derailleur VTT', 148, 500),
('5-002', 'SRAM Gx eagle', 'Derailleur VTT', 120, 400),
('5-003', 'Shimano grx', 'Derailleur route', 100, 480),
('5-004', 'Shimano Acema', 'Derailleur route', 44, 300),
('5-005', 'Shimano PRN12', 'Derailleur VTC', 68, 200),
('5-006', 'Shimano PRN23', 'Derailleur VTC', 44, 220),
('6-001', 'Suality mtb', 'Roue VTT', 44, 120),
('6-002', 'ENVO ses 3.4', 'Roue VTT', 80, 140),
('6-003', 'MAVIC Ellipse', 'Roue route', 125, 200),
('6-004', 'MAVIC Aksium', 'Roue route', 133, 240),
('6-005', 'Michelin Actium 12', 'Roue VTC', 22, 80),
('6-006', 'Michelin Actium 18', 'Roue VTC', 28, 60),
('7-001', 'Roto Vegas 24', 'Pedalier VTT', 20, 100),
('7-002', 'Roto Aldhu 3d7', 'Pedalier VTT', 27, 100),
('7-003', 'Shimano FC m31', 'Pedalier VTT', 25, 150),
('7-004', 'Shimano FC ty50', 'Pedalier VTT', 29, 100),
('7-005', 'Shimano FC ty260', 'Pedalier route', 18, 200),
('7-006', 'Shimano FC ty330', 'Pedalier route', 55, 150),
('7-007', 'Shimano 11v 10j', 'Pedalier route', 28, 200),
('7-009', '9/100 Strong Light', 'Pedalier VTC', 100, 100),
('7-010', 'Shimano 25K 18', 'Pedalier VTC', 44, 200),
('7-011', 'Shimano 27K 21', 'Pedalier VTC', 18, 100);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `reference` varchar(10) COLLATE utf8_bin NOT NULL,
  `modele` varchar(40) COLLATE utf8_bin NOT NULL,
  `type` varchar(20) COLLATE utf8_bin NOT NULL,
  `stockqte` int(11) NOT NULL,
  `stockmaxi` int(11) NOT NULL,
  PRIMARY KEY (`reference`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`reference`, `modele`, `type`, `stockqte`, `stockmaxi`) VALUES
('R1218', 'VTC 504', 'VTC', 14, 30),
('R1256', 'VTC 804', 'VTC', 18, 36),
('R302', 'Route 1222', 'Route', 2, 25),
('R309', 'Route 1229', 'Route', 10, 62),
('R415', 'Route 1206', 'Route', 21, 55),
('V0822', 'VTT 400', 'VTT', 2, 40),
('V1166', 'VTT 418', 'VTT', 16, 32),
('V1256', 'VTT 512', 'VTT', 8, 42);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `composer`
--
ALTER TABLE `composer`
  ADD CONSTRAINT `composer_ibfk_1` FOREIGN KEY (`refproduit`) REFERENCES `produit` (`reference`),
  ADD CONSTRAINT `composer_ibfk_2` FOREIGN KEY (`refpiece`) REFERENCES `pieces` (`reference`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
