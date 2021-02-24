-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 20, 2020 at 04:10 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bikerental_bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `NomClient` varchar(255) DEFAULT NULL,
  `prenomClient` varchar(255) DEFAULT NULL,
  `dateNaissanceClient` datetime DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `emailClient` varchar(255) DEFAULT NULL,
  `ville_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`idClient`),
  KEY `fk_ville` (`ville_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`idClient`, `NomClient`, `prenomClient`, `dateNaissanceClient`, `telephone`, `emailClient`, `ville_id`) VALUES
(1, 'fotchepi', 'laurica', '0000-00-00 00:00:00', '671766875', 'test@test.com', 21),
(2, 'kuate', 'marcelle', '0000-00-00 00:00:00', '670110929', 'test@test.com', 28),
(3, 'dongmo', 'poupi', '0000-00-00 00:00:00', '675301911', 'test@test.com', 6),
(4, 'tsafack', 'mandefo', '0000-00-00 00:00:00', '674552219', 'test@test.com', 25),
(5, 'ebwea', 'manolap', '0000-00-00 00:00:00', '670592486', 'test@test.com', 24),
(6, 'nkoro', 'fingon', '0000-00-00 00:00:00', '674070557', 'test@test.com', 8),
(7, 'loga', 'takam', '0000-00-00 00:00:00', '674208671', 'test@test.com', 13),
(8, 'njopnang', 'willy', '0000-00-00 00:00:00', '674698609', 'test@test.com', 10),
(9, 'ndjeng', 'rojas', '0000-00-00 00:00:00', '677578975', 'test@test.com', 10),
(10, 'fouenang', 'josepha', '0000-00-00 00:00:00', '678858850', 'test@test.com', 12),
(11, 'ndoumbe', 'stela', '0000-00-00 00:00:00', '670503792', 'test@test.com', 29),
(12, 'kamogne', 'mariette', '0000-00-00 00:00:00', '674979856', 'test@test.com', 30),
(13, 'mba', 'edair', '0000-00-00 00:00:00', '670660851', 'test@test.com', 29),
(14, 'lekama', 'michelle', '0000-00-00 00:00:00', '673545129', 'test@test.com', 6),
(15, 'anya', 'andrea', '0000-00-00 00:00:00', '671146035', 'test@test.com', 12),
(16, 'moukam', 'patricia', '0000-00-00 00:00:00', '673966321', 'test@test.com', 20),
(17, 'fagoue', 'bello', '0000-00-00 00:00:00', '676591525', 'test@test.com', 2),
(18, 'folefack', 'luc', '0000-00-00 00:00:00', '678632493', 'test@test.com', 30),
(19, 'atsafack', 'gerard', '0000-00-00 00:00:00', '676859815', 'test@test.com', 5),
(20, 'nguemegne', 'alex', '0000-00-00 00:00:00', '674726360', 'test@test.com', 6),
(21, 'badjeck', 'emmato', '0000-00-00 00:00:00', '677543583', 'test@test.com', 30),
(22, 'tadzotsa', 'pascal', '0000-00-00 00:00:00', '679433207', 'test@test.com', 26),
(23, 'simo', 'raoul', '0000-00-00 00:00:00', '679628191', 'test@test.com', 16),
(24, 'kuetche', 'elie', '0000-00-00 00:00:00', '675143218', 'test@test.com', 18),
(25, 'njakwa', 'gisele', '0000-00-00 00:00:00', '678103039', 'test@test.com', 5),
(26, 'tankeu', 'samuel', '0000-00-00 00:00:00', '670249176', 'test@test.com', 17),
(27, 'makembe', 'leon', '0000-00-00 00:00:00', '677754893', 'test@test.com', 11),
(28, 'kamlo', 'joel', '0000-00-00 00:00:00', '670146615', 'test@test.com', 3),
(29, 'ndjama', 'simeon', '0000-00-00 00:00:00', '676570854', 'test@test.com', 3),
(30, 'wamba', 'polycarpe', '0000-00-00 00:00:00', '676418860', 'test@test.com', 4);

-- --------------------------------------------------------

--
-- Table structure for table `localisation`
--

DROP TABLE IF EXISTS `localisation`;
CREATE TABLE IF NOT EXISTS `localisation` (
  `idLocalisation` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomLocalisation` varchar(255) DEFAULT NULL,
  `descriptionLocalisation` varchar(255) DEFAULT NULL,
  `ville_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`idLocalisation`),
  KEY `fk_ville_id` (`ville_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `localisation`
--

INSERT INTO `localisation` (`idLocalisation`, `nomLocalisation`, `descriptionLocalisation`, `ville_id`) VALUES
(1, 'Bepanda', 'quartier chaud ', 7),
(2, 'Village', 'coin des borbor caches', 3),
(3, 'Deido', 'celebre pour le poisson', 8),
(4, 'Ndogpassi', 'un grand lycee', 7),
(5, 'Bonas', 'quartier des etudiants', 13),
(6, 'Bonanjo', 'secteur administratif', 10),
(7, 'Bali', 'coin prive', 17),
(8, 'Akwa', 'maximum des entreprises privees', 25),
(9, 'Bonapriso', 'quartier des expatries', 8),
(10, 'Damas', 'un truc de yaounde', 15),
(11, 'New Bell', 'la prison', 27),
(12, 'Nkoulouloun', 'marche', 21),
(13, 'Cite cic', 'etudiants de douala', 25),
(14, 'Cite Cicam', 'étudiants encore de douala', 21),
(15, 'Bonamoussadi', 'une autre generation de borbor', 10),
(16, 'Makepe', 'proche de bonamoussadi ', 8),
(17, 'Ndogbong', 'proche du campus 2 ', 9),
(18, 'Kotto', 'tres eloigne de la ville', 18),
(19, 'Nyalla', 'proche de village', 22),
(20, 'Essos', 'quartier de la vie et la joie', 25),
(21, 'Mimboman', 'loin quelque part à yaounde', 19),
(22, 'Biyemassi', 'la chapelle saint marc', 29),
(23, 'Nlongkak', 'maison de la radio', 13),
(24, 'Ndokoti', 'toujours embouteillage', 25),
(25, 'Ekounou', 'le quartier du don man', 11),
(26, 'Obobogo', 'super meric 25', 23),
(27, 'Soa ', 'les etudiants ', 16),
(28, 'Ngoaekelle', 'universite de yaounde 1', 4),
(29, 'Melen', 'polytech', 7),
(30, 'Obili', 'la chapelle obili ', 28);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `idLocation` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dateLocation` datetime DEFAULT NULL,
  `dureeLocation` int(11) DEFAULT NULL,
  `commentaires` text,
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `velo_id` int(10) UNSIGNED DEFAULT NULL,
  `responsable_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`idLocation`),
  KEY `fk_client` (`client_id`),
  KEY `fk_respo` (`responsable_id`),
  KEY `fk_vtt` (`velo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`idLocation`, `dateLocation`, `dureeLocation`, `commentaires`, `client_id`, `velo_id`, `responsable_id`) VALUES
(3, '2020-01-05 00:00:00', 158, 'commentaire 1', 12, 6, 13),
(4, '2020-01-05 00:00:00', 149, 'commentaire 2', 17, 27, 2),
(5, '2020-01-05 00:00:00', 23, 'commentaire 3', 19, 2, 18),
(6, '2020-01-05 00:00:00', 35, 'commentaire 4', 23, 2, 13),
(7, '2020-01-05 00:00:00', 77, 'commentaire 5', 30, 3, 26),
(8, '2020-01-05 00:00:00', 122, 'commentaire 6', 24, 8, 6),
(9, '2020-01-05 00:00:00', 158, 'commentaire 7', 21, 4, 17),
(10, '2020-01-05 00:00:00', 166, 'commentaire 8', 27, 2, 19),
(11, '2020-01-05 00:00:00', 46, 'commentaire 9', 11, 13, 23),
(12, '2020-01-05 00:00:00', 76, 'commentaire 10', 25, 3, 5),
(13, '2020-01-05 00:00:00', 152, 'commentaire 11', 26, 20, 21),
(14, '2020-01-05 00:00:00', 123, 'commentaire 12', 27, 26, 20),
(15, '2020-01-05 00:00:00', 36, 'commentaire 13', 30, 3, 29),
(16, '2020-01-05 00:00:00', 40, 'commentaire 14', 21, 6, 15),
(17, '2020-01-05 00:00:00', 82, 'commentaire 15', 20, 10, 1),
(18, '2020-01-05 00:00:00', 95, 'commentaire 16', 17, 23, 17),
(19, '2020-01-05 00:00:00', 55, 'commentaire 17', 13, 26, 24),
(20, '2020-01-05 00:00:00', 13, 'commentaire 18', 19, 28, 22),
(21, '2020-01-05 00:00:00', 33, 'commentaire 19', 19, 28, 28),
(22, '2020-01-05 00:00:00', 93, 'commentaire 20', 16, 5, 26),
(23, '2020-01-05 00:00:00', 12, 'commentaire 21', 27, 9, 25),
(24, '2020-01-05 00:00:00', 92, 'commentaire 22', 29, 16, 27),
(25, '2020-01-05 00:00:00', 128, 'commentaire 24', 26, 10, 13),
(26, '2020-01-05 00:00:00', 128, 'commentaire 25', 15, 27, 8),
(27, '2020-01-05 00:00:00', 167, 'commentaire 26', 18, 19, 21),
(28, '2020-01-05 00:00:00', 43, 'commentaire 27', 9, 26, 11),
(29, '2020-01-05 00:00:00', 29, 'commentaire 28', 22, 29, 7),
(30, '2020-01-05 00:00:00', 64, 'commentaire 29', 17, 4, 27),
(31, '2020-01-05 00:00:00', 100, 'commentaire 30', 14, 29, 5);

-- --------------------------------------------------------

--
-- Table structure for table `responsable`
--

DROP TABLE IF EXISTS `responsable`;
CREATE TABLE IF NOT EXISTS `responsable` (
  `idResponsable` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomResponsable` varchar(255) DEFAULT NULL,
  `prenomResponsable` varchar(255) DEFAULT NULL,
  `dateNaissanceResponsable` datetime DEFAULT NULL,
  `telephoneResponsable` varchar(255) DEFAULT NULL,
  `emailResponsable` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `passwordResponsable` varchar(255) DEFAULT NULL,
  `localisation_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`idResponsable`),
  KEY `fk_localiser` (`localisation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `responsable`
--

INSERT INTO `responsable` (`idResponsable`, `nomResponsable`, `prenomResponsable`, `dateNaissanceResponsable`, `telephoneResponsable`, `emailResponsable`, `login`, `passwordResponsable`, `localisation_id`) VALUES
(1, 'olama', 'Marcellin', '1999-12-05 00:00:00', '694016508', 'email1@gmail.com', 'login 1', 'pass 1', 30),
(2, 'kamga', 'Chloé ', '1999-12-05 00:00:00', '695403552', 'email2@gmail.com', 'login 2', 'pass 2', 3),
(3, 'kengne', 'Hédi ', '1999-12-05 00:00:00', '690051787', 'email1@gmail.com', 'login 3', 'pass 3', 5),
(4, 'owona', 'Arol', '1999-12-05 00:00:00', '698418037', 'email2@gmail.com', 'login 4', 'pass 4', 28),
(5, 'sopfossi', 'Christian', '1999-12-05 00:00:00', '696248827', 'email1@gmail.com', 'login 5', 'pass 5', 12),
(6, 'tsafack', 'Emilie', '1999-12-05 00:00:00', '698530080', 'email2@gmail.com', 'login 6', 'pass 6', 28),
(7, 'kameni', 'joseph', '1999-12-05 00:00:00', '696099847', 'email1@gmail.com', 'login 7', 'pass 7', 8),
(8, 'djommou', 'armelle', '1999-12-05 00:00:00', '694046906', 'email2@gmail.com', 'login 8', 'pass 8', 20),
(9, 'tagne', 'kelly', '1999-12-05 00:00:00', '691377354', 'email1@gmail.com', 'login 9', 'pass 9', 25),
(10, 'kamnang', 'sabine', '1999-12-05 00:00:00', '695581632', 'email2@gmail.com', 'login 10', 'pass 10', 3),
(11, 'jiokeng', 'andre', '1999-12-05 00:00:00', '694542742', 'email1@gmail.com', 'login 11', 'pass 11', 22),
(12, 'talla', 'jean', '1999-12-05 00:00:00', '690692834', 'email2@gmail.com', 'login 12', 'pass 12', 25),
(13, 'fossap', 'junior', '1999-12-05 00:00:00', '691735301', 'email1@gmail.com', 'login 13', 'pass 13', 23),
(14, 'tamno', 'henri', '1999-12-05 00:00:00', '693099610', 'email2@gmail.com', 'login 14', 'pass 14', 10),
(15, 'njopnang', 'michael', '1999-12-05 00:00:00', '698727510', 'email1@gmail.com', 'login 15', 'pass 15', 28),
(16, 'loga', 'scolastica', '1999-12-05 00:00:00', '696633273', 'email2@gmail.com', 'login 16', 'pass 16', 3),
(17, 'tsemi', 'priscille', '1999-12-05 00:00:00', '699650893', 'email1@gmail.com', 'login 17', 'pass 17', 29),
(18, 'ngangou', 'astride', '1999-12-05 00:00:00', '697215099', 'email2@gmail.com', 'login 18', 'pass 18', 8),
(19, 'epane', 'jeanne', '1999-12-05 00:00:00', '696461550', 'email1@gmail.com', 'login 19', 'pass 19', 13),
(20, 'djengue', 'nathalie', '1999-12-05 00:00:00', '695125370', 'email2@gmail.com', 'login 20', 'pass 20', 2),
(21, 'ombede', 'ingrid', '1999-12-05 00:00:00', '696519478', 'email1@gmail.com', 'login 21', 'pass 21', 17),
(22, 'onguene', 'jenny', '1999-12-05 00:00:00', '695286381', 'email2@gmail.com', 'login 22', 'pass 22', 28),
(23, 'noutah', 'evaline', '1999-12-05 00:00:00', '693966161', 'email1@gmail.com', 'login 23', 'pass 23', 5),
(24, 'eyee', 'arnaud', '1999-12-05 00:00:00', '699854480', 'email2@gmail.com', 'login 24', 'pass 24', 18),
(25, 'tifang', 'denise', '1999-12-05 00:00:00', '692425849', 'email1@gmail.com', 'login 25', 'pass 25', 22),
(26, 'fodoup', 'stephane', '1999-12-05 00:00:00', '699279117', 'email2@gmail.com', 'login 26', 'pass 26', 6),
(27, 'amarane', 'abdou', '1999-12-05 00:00:00', '691789489', 'email1@gmail.com', 'login 27', 'pass 27', 10),
(28, 'etame', 'frederic', '1999-12-05 00:00:00', '696911686', 'email2@gmail.com', 'login 28', 'pass 28', 27),
(29, 'fotso', 'christine', '1999-12-05 00:00:00', '691464122', 'email1@gmail.com', 'login 29', 'pass 29', 30),
(30, 'momo', 'jacques', '1999-12-05 00:00:00', '691524182', 'email2@gmail.com', 'login 30', 'pass 30', 14);

-- --------------------------------------------------------

--
-- Table structure for table `typevelo`
--

DROP TABLE IF EXISTS `typevelo`;
CREATE TABLE IF NOT EXISTS `typevelo` (
  `idType` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomType` varchar(255) DEFAULT NULL,
  `descriptionType` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idType`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typevelo`
--

INSERT INTO `typevelo` (`idType`, `nomType`, `descriptionType`) VALUES
(1, 'Type 1', 'velo puissant \r'),
(2, 'Type 2', 'grand consommateur\r'),
(3, 'Type 3', 'puissant mais efficace\r'),
(4, 'Type 4', 'juste et bon \r'),
(5, 'Type 5', 'cordial\r'),
(6, 'Type 6', 'bon travailleur \r'),
(7, 'Type 7', 'ideal pour montagnes\r'),
(8, 'Type 8', 'idoine\r'),
(9, 'Type 9', 'courageux\r'),
(10, 'Type 10', 'devoue\r'),
(11, 'Type 11', 'merveilleux \r'),
(12, 'Type 12', 'bienveillant \r'),
(13, 'Type 13', 'super bien \r'),
(14, 'Type 14', 'gestionnaire\r'),
(15, 'Type 15', 'coordinateur \r'),
(16, 'Type 16', 'superviseur \r'),
(17, 'Type 17', 'projet \r'),
(18, 'Type 18', 'planification\r'),
(19, 'Type 19', 'excellent \r'),
(20, 'Type 20', 'travail bien fait\r'),
(21, 'Type 21', 'toujours le service \r'),
(22, 'Type 22', 'dur bosseur \r'),
(23, 'Type 23', 'le sens du devoir \r'),
(24, 'Type 24', 'toujours prêt\r'),
(25, 'Type 25', 'intelligent \r'),
(26, 'Type 26', 'dynamique\r'),
(27, 'Type 27', 'motive \r'),
(28, 'Type 28', 'vaillant \r'),
(29, 'Type 29', 'genial\r'),
(30, 'Type 30', 'compréhensif\r');

-- --------------------------------------------------------

--
-- Table structure for table `velo`
--

DROP TABLE IF EXISTS `velo`;
CREATE TABLE IF NOT EXISTS `velo` (
  `idVelo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nomVelo` varchar(255) DEFAULT NULL,
  `dateAchat` date DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `description` text,
  `prixLocation` float DEFAULT NULL,
  `type_id` int(10) UNSIGNED DEFAULT NULL,
  `localisation_id` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`idVelo`),
  KEY `fk_velo_typeVelo` (`type_id`),
  KEY `fk_localisation_id` (`localisation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `velo`
--

INSERT INTO `velo` (`idVelo`, `nomVelo`, `dateAchat`, `prix`, `description`, `prixLocation`, `type_id`, `localisation_id`) VALUES
(2, 'velo 1', '2020-02-05', 66640, 'descriptionVelo 1', 6490, 24, 16),
(3, 'velo 2', '2020-02-05', 90363, 'descriptionVelo 2', 18988, 18, 20),
(4, 'velo 3', '2020-02-05', 72175, 'descriptionVelo 3', 11976, 18, 24),
(5, 'velo 4', '2020-02-05', 53646, 'descriptionVelo 4', 19324, 16, 8),
(6, 'velo 5', '2020-02-05', 65272, 'descriptionVelo 5', 18574, 11, 7),
(7, 'velo 6', '2020-02-05', 53363, 'descriptionVelo 6', 14774, 3, 27),
(8, 'velo 7', '2020-02-05', 55982, 'descriptionVelo 7', 11944, 1, 3),
(9, 'velo 8', '2020-02-05', 92637, 'descriptionVelo 8', 12201, 27, 22),
(10, 'velo 9', '2020-02-05', 56967, 'descriptionVelo 9', 13387, 6, 28),
(11, 'velo 10', '2020-02-05', 88462, 'descriptionVelo 10', 17156, 11, 9),
(12, 'velo 11', '2020-02-05', 85214, 'descriptionVelo 11', 17424, 12, 20),
(13, 'velo 12', '2020-02-05', 66760, 'descriptionVelo 12', 16846, 20, 12),
(14, 'velo 13', '2020-02-05', 65714, 'descriptionVelo 13', 14723, 1, 3),
(15, 'velo 14', '2020-02-05', 71907, 'descriptionVelo 14', 17861, 9, 7),
(16, 'velo 15', '2020-02-05', 76612, 'descriptionVelo 15', 12199, 30, 24),
(17, 'velo 16', '2020-02-05', 84281, 'descriptionVelo 16', 8325, 14, 11),
(18, 'velo 17', '2020-02-05', 97897, 'descriptionVelo 17', 18650, 8, 28),
(19, 'velo 18', '2020-02-05', 91710, 'descriptionVelo 18', 17095, 30, 6),
(20, 'velo 19', '2020-02-05', 53891, 'descriptionVelo 19', 14867, 18, 24),
(21, 'velo 20', '2020-02-05', 93443, 'descriptionVelo 20', 10545, 6, 22),
(22, 'velo 21', '2020-02-05', 93762, 'descriptionVelo 21', 13465, 19, 17),
(23, 'velo 22', '2020-02-05', 69642, 'descriptionVelo 22', 15133, 12, 5),
(24, 'velo 23', '2020-02-05', 69141, 'descriptionVelo 23', 13190, 2, 18),
(25, 'velo 24', '2020-02-05', 59342, 'descriptionVelo 24', 14353, 21, 6),
(26, 'velo 25', '2020-02-05', 55302, 'descriptionVelo 25', 9878, 4, 7),
(27, 'velo 26', '2020-02-05', 90937, 'descriptionVelo 26', 18209, 8, 26),
(28, 'velo 27', '2020-02-05', 77616, 'descriptionVelo 27', 15273, 6, 5),
(29, 'velo 28', '2020-02-05', 74167, 'descriptionVelo 28', 13827, 6, 8),
(30, 'velo 29', '2020-02-05', 73006, 'descriptionVelo 29', 18544, 20, 26),
(31, 'velo 30', '2020-02-05', 84964, 'descriptionVelo 30', 15526, 4, 26);

-- --------------------------------------------------------

--
-- Table structure for table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `idVille` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `codePostal` varchar(255) DEFAULT NULL,
  `NomVille` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idVille`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ville`
--

INSERT INTO `ville` (`idVille`, `codePostal`, `NomVille`) VALUES
(1, '6314', 'Douala\r'),
(2, '4946', 'Yaounde\r'),
(3, '1062', 'Kribi\r'),
(4, '6623', 'Bafoussam\r'),
(5, '2786', 'Mbouda\r'),
(6, '1761', 'Bafang\r'),
(7, '2396', 'Limbe\r'),
(8, '6136', 'Garoua\r'),
(9, '4845', 'Maroua\r'),
(10, '3234', 'Edea\r'),
(11, '9300', 'Dschang\r'),
(12, '2088', 'Bafoussam\r'),
(13, '2628', 'Tiko\r'),
(14, '1887', 'Buea \r'),
(15, '6263', 'Nkongsamba\r'),
(16, '5215', 'Bagangte\r'),
(17, '8733', 'Ebolowa\r'),
(18, '9767', 'Bertoua\r'),
(19, '7275', 'Loum\r'),
(20, '9191', 'Balengou\r'),
(21, '2918', 'Kekem\r'),
(22, '7989', 'Pouma\r'),
(23, '9253', 'Boumnyebel\r'),
(24, '1317', 'Obala\r'),
(25, '4565', 'Ngaoundere\r'),
(26, '4699', 'Bafia\r'),
(27, '3774', 'Sangmelima\r'),
(28, '7787', 'Figuil\r'),
(29, '3366', 'Mbalmayo\r'),
(30, '2335', 'Foumbot\r');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_ville` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`idVille`);

--
-- Constraints for table `localisation`
--
ALTER TABLE `localisation`
  ADD CONSTRAINT `fk_ville_id` FOREIGN KEY (`ville_id`) REFERENCES `ville` (`idVille`);

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `fk_client` FOREIGN KEY (`client_id`) REFERENCES `client` (`idClient`),
  ADD CONSTRAINT `fk_respo` FOREIGN KEY (`responsable_id`) REFERENCES `responsable` (`idResponsable`),
  ADD CONSTRAINT `fk_vtt` FOREIGN KEY (`velo_id`) REFERENCES `velo` (`idVelo`);

--
-- Constraints for table `responsable`
--
ALTER TABLE `responsable`
  ADD CONSTRAINT `fk_localiser` FOREIGN KEY (`localisation_id`) REFERENCES `localisation` (`idLocalisation`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
