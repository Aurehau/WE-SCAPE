-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2024 at 06:49 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wescape`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigner`
--

CREATE TABLE `assigner` (
  `idHeure` int NOT NULL,
  `idGroupe` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `envisager`
--

CREATE TABLE `envisager` (
  `valeur_bon` int NOT NULL,
  `nb_produit` int NOT NULL,
  `idProduit` int NOT NULL,
  `idPanier` int NOT NULL,
  `payer` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `envisager`
--

INSERT INTO `envisager` (`valeur_bon`, `nb_produit`, `idProduit`, `idPanier`, `payer`) VALUES
(5, 4, 93, 3, 0),
(6, 1, 114, 19, 0),
(0, 3, 115, 19, 0),
(0, 10, 115, 19, 0),
(2, 1, 92, 19, 0),
(2, 2, 92, 21, 0),
(2, 26, 92, 22, 0),
(6, 7, 114, 25, 0),
(2, 3, 92, 26, 0),
(0, 24, 115, 27, 0),
(6, 7, 114, 27, 0),
(6, 2, 114, 28, 0),
(6, 2, 114, 29, 0),
(78, 7, 108, 30, 0),
(2, 6, 92, 31, 0),
(2, 80, 92, 32, 0),
(2, 99, 92, 33, 0),
(2, 5, 92, 34, 0),
(2, 3, 92, 36, 0),
(2, 3, 92, 36, 0),
(2, 5, 92, 38, 0),
(2, 2, 95, 47, 0),
(2, 89, 95, 47, 0);

-- --------------------------------------------------------

--
-- Table structure for table `escape_game`
--

CREATE TABLE `escape_game` (
  `idEscapeGame` int NOT NULL,
  `idPhoto` int NOT NULL,
  `prix_game` int NOT NULL,
  `niveau_parcours` int NOT NULL,
  `niveau_puzzle` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `escape_game`
--

INSERT INTO `escape_game` (`idEscapeGame`, `idPhoto`, `prix_game`, `niveau_parcours`, `niveau_puzzle`) VALUES
(1, 21, 25, 1, 2),
(2, 22, 75, 3, 2),
(3, 29, 14, 1, 2),
(4, 25, 1, 1, 1),
(5, 25, 1, 1, 1),
(6, 25, 1, 1, 1),
(7, 31, 45, 2, 3),
(8, 31, 45, 2, 3),
(9, 31, 45, 2, 3),
(10, 31, 45, 2, 3),
(11, 31, 45, 2, 3),
(12, 37, 2, 2, 3),
(13, 37, 2, 2, 3),
(14, 46, 2, 2, 2),
(15, 50, 1, 1, 1),
(16, 51, 1, 1, 1),
(17, 25, 12, 3, 2),
(18, 25, 12, 3, 2),
(19, 25, 12, 3, 2),
(20, 38, 12, 3, 3),
(21, 38, 12, 3, 3),
(22, 38, 1, 1, 1),
(23, 38, 12, 1, 1),
(24, 38, 12, 1, 1),
(25, 54, 2, 1, 1),
(26, 54, 2, 1, 1),
(27, 54, 2, 1, 1),
(28, 54, 2, 1, 1),
(29, 54, 2, 1, 1),
(30, 54, 2, 1, 1),
(31, 54, 2, 1, 1),
(32, 54, 2, 1, 1),
(33, 54, 2, 1, 1),
(34, 54, 2, 1, 1),
(35, 54, 2, 1, 1),
(36, 54, 2, 1, 1),
(37, 54, 2, 1, 1),
(38, 56, 20, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `groupe_heure`
--

CREATE TABLE `groupe_heure` (
  `idGroupe` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `horaire`
--

CREATE TABLE `horaire` (
  `idHeure` int NOT NULL,
  `horaire` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `illustrer`
--

CREATE TABLE `illustrer` (
  `idProduit` int NOT NULL,
  `idPhoto` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `illustrer`
--

INSERT INTO `illustrer` (`idProduit`, `idPhoto`) VALUES
(113, 27),
(115, 60),
(115, 54),
(115, 61);

-- --------------------------------------------------------

--
-- Table structure for table `jour`
--

CREATE TABLE `jour` (
  `idJour` int NOT NULL,
  `date_jour` date NOT NULL,
  `idGroupe` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lieu`
--

CREATE TABLE `lieu` (
  `idLieu` int NOT NULL,
  `nom_lieu` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `idPhoto` int NOT NULL,
  `video` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lieu`
--

INSERT INTO `lieu` (`idLieu`, `nom_lieu`, `logo`, `idPhoto`, `video`) VALUES
(1, 'Stuttgart', 'lienlogo', 17, 'lienvidéo'),
(2, 'Rhin', 'lienlogdela', 18, 'lienvideodela'),
(3, 'Fulleren', 'logo_wigo_media.png', 29, 'rfjilienfvbhdevbglavgrndjnvideo'),
(4, 'juju', 'Capture d\'écran 2023-03-14 190633.png', 30, 'bgg'),
(5, 'Sundgau', 'Capture d\'écran_20230112_204132.png', 52, 'https://www.youtube.com/watch?v=UNQDpL-Qd8k'),
(6, 'test', 'Capture d\'écran 2023-04-11 103756.png', 27, 'https://youtu.be/UNQDpL-Qd8k?si=IM9odhd7VgUUR2i5'),
(7, 'test2', 'Capture d\'écran 2023-05-16 164651.png', 53, 'https://www.youtube.com/embed/UNQDpL-Qd8k?si=IM9odhd7VgUUR2i5'),
(8, 'test3', 'Capture d\'écran 2023-06-10 103204.png', 25, 'https://www.youtube.com/embed/UNQDpL-Qd8k?si=IM9odhd7VgUUR2i5'),
(9, 'test4', 'Capture d\'écran 2023-06-10 103204.png', 57, 'https://www.youtube.com/embed/UNQDpL-Qd8k?si=IM9odhd7VgUUR2i5');

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `idPanier` int NOT NULL,
  `idUtilisateur` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `panier`
--

INSERT INTO `panier` (`idPanier`, `idUtilisateur`) VALUES
(19, 3),
(42, 3),
(43, 3),
(44, 3),
(45, 3),
(46, 3),
(3, 10),
(4, 10),
(5, 10),
(6, 10),
(7, 10),
(8, 10),
(9, 10),
(10, 10),
(11, 10),
(12, 10),
(13, 10),
(14, 10),
(15, 10),
(16, 10),
(17, 10),
(18, 10),
(20, 10),
(21, 10),
(22, 10),
(25, 10),
(26, 10),
(27, 10),
(29, 10),
(30, 10),
(31, 10),
(32, 10),
(33, 10),
(34, 10),
(28, 14),
(35, 15),
(36, 15),
(37, 15),
(38, 15),
(39, 15),
(40, 15),
(41, 15),
(47, 16);

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `idPhoto` int NOT NULL,
  `lien_photo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`idPhoto`, `lien_photo`) VALUES
(17, 'Screenshot_20230212-113807_Twitter.jpg'),
(18, 'logo_wigo_media.png'),
(19, 'sac mcqueen.jpeg'),
(20, 'DSC_9048.jpg'),
(21, 'logo_evidence_footer.png'),
(22, 'logo_Youtube_chaine2.png'),
(23, 'evidence_logo.png'),
(24, 'Capture d\'écran 2023-03-14 141923.png'),
(25, 'Capture d\'écran 2023-03-14 190633.png'),
(26, 'Capture d\'écran 2023-05-17 155103.png'),
(27, 'Capture d\'écran 2023-05-02 161127.png'),
(28, 'Capture d\'écran_20221123_144947.png'),
(29, 'Capture d\'écran 2023-09-05 091108.png'),
(30, 'Capture d\'écran_20230108_203035.png'),
(31, 'Capture d\'écran 2023-06-06 204721.png'),
(32, 'Capture d\'écran_20230212_214314.png'),
(33, 'Capture d\'écran 2023-03-14 141754.png'),
(34, 'Capture d\'écran 2023-06-06 164433.png'),
(35, 'Capture d\'écran 2023-06-06 160629.png'),
(36, 'Capture d\'écran 2023-03-14 150559.png'),
(37, 'Capture d\'écran 2023-06-11 194820.png'),
(38, 'Capture d\'écran 2023-03-14 203054.png'),
(39, 'Capture d\'écran 2023-06-09 164512.png'),
(40, 'Capture d\'écran 2023-11-13 192705.png'),
(41, 'Capture d\'écran 2023-11-29 142242.png'),
(42, 'Capture d\'écran 2023-12-08 140653.png'),
(43, 'Capture d\'écran 2023-06-08 105936.png'),
(44, 'Capture d\'écran 2023-06-08 110119.png'),
(45, 'Capture d\'écran 2023-06-08 110255.png'),
(46, 'Capture d\'écran 2024-04-02 135747.png'),
(47, 'étoffe.jpg'),
(48, 'ILLICOLOG.png'),
(49, 'logo_2_Youtube_chaine2.png'),
(50, 'Capture d\'écran_20230212_214459.png'),
(51, 'Capture d\'écran 2024-04-02 135616.png'),
(52, 'Capture d\'écran 2023-03-14 205315.png'),
(53, 'Capture d\'écran 2023-04-11 103756.png'),
(54, 'Capture-d_écran-2023-03-14-150559.png'),
(55, 'Capture-d_écran-2023-03-14-203054.png'),
(56, 'Capture-d_écran-2023-03-14-205315.png'),
(57, 'Capture-d_écran-2023-04-11-103756.png'),
(58, 'Capture-d_écran-2023-05-02-161127.png'),
(59, 'Capture-d_écran-2023-05-17-154628.png'),
(60, 'Capture-d_écran-2023-03-14-142015.png'),
(61, 'Capture-d_écran-2023-03-14-190633.png');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `idProduit` int NOT NULL,
  `idPhoto` int NOT NULL,
  `prix_produit` decimal(10,0) NOT NULL,
  `valeur_bon` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `taille_colis` int NOT NULL,
  `delai` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`idProduit`, `idPhoto`, `prix_produit`, `valeur_bon`, `taille_colis`, `delai`) VALUES
(91, 17, '2', '[\"3\"]', 1, 1),
(92, 18, '1', '[\"2\"]', 1, 3),
(93, 18, '1', '[\"2\"]', 1, 3),
(94, 18, '1', '[\"2\"]', 1, 3),
(95, 18, '1', '[\"2\"]', 1, 3),
(97, 19, '1', '[\"2\"]', 1, 3),
(98, 19, '12', '[\"15\"]', 2, 32),
(99, 20, '12', '[\"15\"]', 2, 2),
(100, 21, '12', '[\"\",\"\"]', 2, 2),
(101, 21, '12', '[\"2\"]', 2, 2),
(102, 21, '12', '[\"2\",\"3\"]', 2, 2),
(103, 22, '89', '[\"1\",\"2\",\"3\"]', 1, 12),
(104, 23, '2', '[\"1\"]', 1, 3),
(105, 18, '1', '[\"42\",\"50\"]', 1, 2),
(106, 18, '21', '[\"12\",\"45\",\"78\"]', 1, 32),
(107, 18, '21', '[\"12\",\"45\",\"78\"]', 1, 32),
(108, 18, '21', '[\"12\",\"45\",\"78\"]', 1, 32),
(109, 18, '21', '[\"12\",\"45\",\"78\"]', 1, 32),
(110, 25, '1', '[\"2\",\"54\",\"55\"]', 3, 2),
(111, 25, '1', '[\"2\",\"15\",\"17\"]', 3, 2),
(112, 25, '1', '[\"2\",\"15\",\"17\"]', 3, 2),
(113, 25, '1', '[\"2\",\"15\",\"17\"]', 3, 2),
(114, 35, '5', '[\"6\"]', 2, 4),
(115, 56, '56', '[\"\"]', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `représenter`
--

CREATE TABLE `représenter` (
  `idVersion` int NOT NULL,
  `idPhoto` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `représenter`
--

INSERT INTO `représenter` (`idVersion`, `idPhoto`) VALUES
(7, 32),
(8, 32),
(9, 32),
(11, 34),
(12, 38),
(13, 43),
(13, 44),
(13, 45),
(14, 47),
(14, 23),
(14, 48),
(14, 49),
(33, 55),
(33, 56),
(33, 57),
(34, 55),
(34, 56),
(34, 57),
(34, 58);

-- --------------------------------------------------------

--
-- Table structure for table `reserver`
--

CREATE TABLE `reserver` (
  `date_reservation` datetime NOT NULL,
  `nb_reservation` int NOT NULL,
  `payer` tinyint(1) NOT NULL,
  `idVersion` int NOT NULL,
  `idPanier` int NOT NULL,
  `prix` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reserver`
--

INSERT INTO `reserver` (`date_reservation`, `nb_reservation`, `payer`, `idVersion`, `idPanier`, `prix`) VALUES
('2024-04-29 12:21:19', 2, 0, 2, 8, 5),
('2024-05-01 18:00:00', 2, 0, 38, 19, 5),
('2024-05-01 18:00:00', 2, 0, 38, 19, 5),
('2024-04-30 18:00:00', 2, 0, 38, 19, 5),
('2024-05-09 11:00:00', 9, 0, 34, 19, 167),
('2024-05-17 16:00:00', 2, 0, 38, 20, 5),
('2024-05-24 16:00:00', 2, 0, 37, 22, 5),
('2024-05-24 18:00:00', 2, 0, 37, 32, 5),
('2024-05-17 18:00:00', 2, 0, 28, 33, 5),
('2024-05-23 15:00:00', 2, 0, 38, 47, 5);

-- --------------------------------------------------------

--
-- Table structure for table `survenir`
--

CREATE TABLE `survenir` (
  `idJour` int NOT NULL,
  `idEscapeGame` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int NOT NULL,
  `nom` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `mdp`, `mail`, `tel`, `adresse`, `ville`, `code_postal`, `pays`) VALUES
(3, 'Biden', 'Joe', '$2y$10$O1r1SOGe/lwQeyBhw6WK.OyDBRt5lA2naGR0TsmOvUXP8czrt73pi', 'trump@gmail.com', '06 05 12 89 74', '14 Rue Principale', 'Fulleren', '68210', 'France'),
(9, 'hau', 'ludo', '$2y$10$tvzlrAG0GgqESLKUeZCdZOWkD3dzAU1EaiME3OTwyY.gJgZYb.0Hq', 'ludo@gmail.com', '', '', '', '', ''),
(10, 'admin', 'admin', '$2y$10$SzNZNZ6mDwcU5yf9Af/ciOoBkokFEjvoF87PPQJXQN/5vZtW96Id2', 'admin@wescape.com', '', '', '', '', ''),
(11, 'Bloublou', 'Bernard', '$2y$10$5udOlzrC2DDYT2EhpVI5J.CeIT45CY2Q8uln.gMHdthLbeAmbVfaS', 'bernard@uha.fr', '', '', '', '', ''),
(14, 'HAUPTMANN-HERBETTE', 'Aurélien', '$2y$10$aylGq2jKmK.ERkwJk0.aoOBuYHyp/OFNSt54cK.uEAYvMWqUoxeva', 'aurehau6@gmail.com', '06 26 50 93 95', '14 Rue Principale', 'Fulleren', '68210', 'France'),
(15, 'fbfbf', 'Joe', '$2y$10$CHa8rsettmXP5TvwD6vwyOhMdtXkK4wjrxSFuvLAWQUIRJCcnxHEO', 'jo@gmail.com', '12 32 65 45 78', 'jij', 'jij', 'jiij', 'France'),
(16, 'HAUPTMANN-HERBETTE', 'Aurélien', '$2y$10$uebOFZhHkda1AcXkpR46S.Anhfz2waNMiuox713rBQrH3LerIJXke', 'negan@gmail.com', '48 48 45 45 49', '14 Rue Principale', 'Fulleren', '68210', 'France');

-- --------------------------------------------------------

--
-- Table structure for table `version`
--

CREATE TABLE `version` (
  `idVersion` int NOT NULL,
  `idEscapeGame` int NOT NULL,
  `idLieu` int NOT NULL,
  `durée` int NOT NULL,
  `langues` json NOT NULL,
  `ville` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordonne_GPS` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parking` tinyint(1) NOT NULL,
  `train` tinyint(1) NOT NULL,
  `bus` tinyint(1) NOT NULL,
  `nbclient` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `version`
--

INSERT INTO `version` (`idVersion`, `idEscapeGame`, `idLieu`, `durée`, `langues`, `ville`, `code_postal`, `coordonne_GPS`, `parking`, `train`, `bus`, `nbclient`) VALUES
(1, 1, 1, 2, '{\"0\": \"francais\", \"1\": \"anglais\", \"2\": \"allemand\"}', '23 rue des cigognes', '0', '2,002 4.001', 5, 1, 0, 0),
(2, 2, 1, 2, '{\"0\": \"francais\", \"1\": \"anglais\"}', 'l\'adresse', '0', '1.03 1.05', 1, 0, 1, 0),
(3, 1, 2, 4, '{\"0\": \"francais\"}', '15 rue des chocolatiers ', '0', '3.006 3.04', 1, 0, 1, 0),
(4, 1, 1, 2, '{\"0\": \"francais\", \"1\": \"anglais\", \"2\": \"allemand\"}', '23 rue des cigognes', '0', '2,002 4.001', 5, 1, 0, 0),
(5, 2, 1, 2, '{\"0\": \"francais\", \"1\": \"anglais\"}', 'l\'adresse', '0', '1.03 1.05', 1, 0, 1, 0),
(6, 1, 2, 4, '{\"0\": \"francais\"}', '15 rue des chocolatiers ', '0', '3.006 3.04', 1, 0, 1, 0),
(7, 2, 1, 2, '[\"fr\", \"en\"]', 'Mulhouse', '68200', '47.746175, 7.343086', 1, 0, 1, 0),
(8, 6, 3, 2, '[\"fr\"]', 'jij', 'jiij', 'jiji', 1, 1, 1, 0),
(9, 7, 3, 2, '[\"fr\", \"en\"]', 'jij', 'jiij', 'jiji', 1, 1, 1, 0),
(10, 8, 3, 2, '[\"fr\", \"en\"]', 'jij', 'jiij', 'jiji', 1, 1, 1, 0),
(11, 9, 3, 2, '[\"fr\", \"en\"]', 'jij', 'jiij', 'jiji', 1, 1, 1, 0),
(12, 10, 3, 2, '[\"fr\", \"en\"]', 'jij', 'jiij', 'jiji', 1, 1, 1, 0),
(13, 11, 3, 2, '[\"fr\", \"en\"]', 'jij', 'jiij', 'jiji', 1, 1, 1, 0),
(14, 12, 3, 3, '[\"fr\", \"en\"]', 'yy', 'gyui', 'gyiu', 1, 0, 1, 0),
(15, 13, 3, 3, '[\"fr\", \"en\"]', 'yy', 'gyui', 'gyiu', 1, 0, 1, 0),
(16, 3, 1, 3, '[\"fr\"]', 'Fulleren', '68210', '', 1, 1, 0, 10),
(17, 14, 1, 3, '[\"fr\"]', 'saint eric', 'saint bernard', '2.20,5.50', 1, 0, 1, 15),
(18, 15, 1, 2, '[\"fr\", \"en\"]', 'a', 'z', '2.00,0.2', 1, 0, 0, 2),
(19, 16, 2, 2, '[\"fr\"]', 't', 'r', '0.2,2.0', 1, 0, 0, 1),
(20, 24, 1, 15, '[\"fr\", \"en\"]', 'uo', 'uio', '2.00,0.2', 1, 0, 0, 10),
(21, 25, 7, 3, '[\"fr\", \"en\"]', 'hjkl', 'jhkl', '2.20,5.50', 1, 1, 1, 2),
(22, 26, 7, 3, '[\"fr\", \"en\"]', 'hjkl', 'jhkl', '2.20,5.50', 1, 1, 1, 2),
(23, 27, 7, 3, '[\"fr\", \"en\"]', 'hjkl', 'jhkl', '2.20,5.50', 1, 1, 1, 2),
(24, 28, 7, 3, '[\"fr\", \"en\"]', 'hjkl', 'jhkl', '2.20,5.50', 1, 1, 1, 2),
(25, 29, 7, 3, '[\"fr\", \"en\"]', 'hjkl', 'jhkl', '2.20,5.50', 1, 1, 1, 2),
(26, 30, 7, 3, '[\"fr\", \"en\"]', 'hjkl', 'jhkl', '2.20,5.50', 1, 1, 1, 2),
(27, 31, 7, 3, '[\"fr\", \"en\"]', 'hjkl', 'jhkl', '2.20,5.50', 1, 1, 1, 2),
(28, 32, 7, 3, '[\"fr\", \"en\"]', 'hjkl', 'jhkl', '2.20,5.50', 1, 1, 1, 2),
(29, 33, 7, 3, '[\"fr\", \"en\"]', 'hjkl', 'jhkl', '2.20,5.50', 1, 1, 1, 2),
(30, 34, 7, 3, '[\"fr\", \"en\"]', 'hjkl', 'jhkl', '2.20,5.50', 1, 1, 1, 2),
(31, 35, 7, 3, '[\"fr\", \"en\"]', 'hjkl', 'jhkl', '2.20,5.50', 1, 1, 1, 2),
(32, 36, 7, 3, '[\"fr\", \"en\"]', 'hjkl', 'jhkl', '2.20,5.50', 1, 1, 1, 2),
(33, 37, 7, 3, '[\"fr\", \"en\"]', 'hjkl', 'jhkl', '2.20,5.50', 1, 1, 1, 2),
(34, 38, 9, 1, '[\"fr\", \"en\"]', 'uhp', 'huip', 'huip', 1, 0, 0, 9),
(35, 37, 9, 2, '[\"fr\"]', 'vde', 'hththt', 'grgrbr', 1, 0, 0, 2),
(36, 36, 9, 2, '[\"fr\"]', 'jmol', 'bio', 'bio', 1, 0, 0, 2),
(37, 35, 9, 2, '[\"fr\"]', 'hi', 'uhip', 'hup', 1, 0, 0, 2),
(38, 34, 9, 2, '[\"fr\"]', 'jkj', 'hjkl', 'hjkl', 1, 0, 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assigner`
--
ALTER TABLE `assigner`
  ADD KEY `idGroupe` (`idGroupe`),
  ADD KEY `idHeure` (`idHeure`);

--
-- Indexes for table `envisager`
--
ALTER TABLE `envisager`
  ADD KEY `idProduit` (`idProduit`),
  ADD KEY `idUtilisateur` (`idPanier`);

--
-- Indexes for table `escape_game`
--
ALTER TABLE `escape_game`
  ADD PRIMARY KEY (`idEscapeGame`),
  ADD KEY `idPhoto` (`idPhoto`);

--
-- Indexes for table `groupe_heure`
--
ALTER TABLE `groupe_heure`
  ADD PRIMARY KEY (`idGroupe`);

--
-- Indexes for table `horaire`
--
ALTER TABLE `horaire`
  ADD PRIMARY KEY (`idHeure`);

--
-- Indexes for table `illustrer`
--
ALTER TABLE `illustrer`
  ADD KEY `idPhoto` (`idPhoto`),
  ADD KEY `idProduit` (`idProduit`);

--
-- Indexes for table `jour`
--
ALTER TABLE `jour`
  ADD PRIMARY KEY (`idJour`),
  ADD KEY `idGroupe` (`idGroupe`);

--
-- Indexes for table `lieu`
--
ALTER TABLE `lieu`
  ADD PRIMARY KEY (`idLieu`),
  ADD KEY `idPhoto` (`idPhoto`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`idPanier`),
  ADD KEY `idUtilisateur` (`idUtilisateur`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`idPhoto`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`),
  ADD KEY `idPhoto` (`idPhoto`);

--
-- Indexes for table `représenter`
--
ALTER TABLE `représenter`
  ADD KEY `idEscapeGame` (`idVersion`),
  ADD KEY `idPhoto` (`idPhoto`);

--
-- Indexes for table `reserver`
--
ALTER TABLE `reserver`
  ADD KEY `idEscapeGame` (`idVersion`),
  ADD KEY `idUtilisateur` (`idPanier`);

--
-- Indexes for table `survenir`
--
ALTER TABLE `survenir`
  ADD KEY `idEscapeGame` (`idEscapeGame`),
  ADD KEY `idJour` (`idJour`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- Indexes for table `version`
--
ALTER TABLE `version`
  ADD PRIMARY KEY (`idVersion`),
  ADD KEY `idEscapeGame` (`idEscapeGame`),
  ADD KEY `idLieu` (`idLieu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `escape_game`
--
ALTER TABLE `escape_game`
  MODIFY `idEscapeGame` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `groupe_heure`
--
ALTER TABLE `groupe_heure`
  MODIFY `idGroupe` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `horaire`
--
ALTER TABLE `horaire`
  MODIFY `idHeure` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jour`
--
ALTER TABLE `jour`
  MODIFY `idJour` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lieu`
--
ALTER TABLE `lieu`
  MODIFY `idLieu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
  MODIFY `idPanier` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `idPhoto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `version`
--
ALTER TABLE `version`
  MODIFY `idVersion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigner`
--
ALTER TABLE `assigner`
  ADD CONSTRAINT `assigner_ibfk_1` FOREIGN KEY (`idGroupe`) REFERENCES `groupe_heure` (`idGroupe`),
  ADD CONSTRAINT `assigner_ibfk_2` FOREIGN KEY (`idHeure`) REFERENCES `horaire` (`idHeure`);

--
-- Constraints for table `envisager`
--
ALTER TABLE `envisager`
  ADD CONSTRAINT `envisager_ibfk_1` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`),
  ADD CONSTRAINT `envisager_ibfk_2` FOREIGN KEY (`idPanier`) REFERENCES `panier` (`idPanier`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `escape_game`
--
ALTER TABLE `escape_game`
  ADD CONSTRAINT `escape_game_ibfk_1` FOREIGN KEY (`idPhoto`) REFERENCES `photo` (`idPhoto`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `illustrer`
--
ALTER TABLE `illustrer`
  ADD CONSTRAINT `illustrer_ibfk_1` FOREIGN KEY (`idPhoto`) REFERENCES `photo` (`idPhoto`),
  ADD CONSTRAINT `illustrer_ibfk_2` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`);

--
-- Constraints for table `jour`
--
ALTER TABLE `jour`
  ADD CONSTRAINT `jour_ibfk_1` FOREIGN KEY (`idGroupe`) REFERENCES `groupe_heure` (`idGroupe`);

--
-- Constraints for table `lieu`
--
ALTER TABLE `lieu`
  ADD CONSTRAINT `lieu_ibfk_1` FOREIGN KEY (`idPhoto`) REFERENCES `photo` (`idPhoto`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`idPhoto`) REFERENCES `photo` (`idPhoto`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `représenter`
--
ALTER TABLE `représenter`
  ADD CONSTRAINT `représenter_ibfk_1` FOREIGN KEY (`idVersion`) REFERENCES `version` (`idVersion`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `représenter_ibfk_2` FOREIGN KEY (`idPhoto`) REFERENCES `photo` (`idPhoto`);

--
-- Constraints for table `reserver`
--
ALTER TABLE `reserver`
  ADD CONSTRAINT `reserver_ibfk_1` FOREIGN KEY (`idVersion`) REFERENCES `escape_game` (`idEscapeGame`),
  ADD CONSTRAINT `reserver_ibfk_2` FOREIGN KEY (`idPanier`) REFERENCES `panier` (`idPanier`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `survenir`
--
ALTER TABLE `survenir`
  ADD CONSTRAINT `survenir_ibfk_1` FOREIGN KEY (`idEscapeGame`) REFERENCES `escape_game` (`idEscapeGame`),
  ADD CONSTRAINT `survenir_ibfk_2` FOREIGN KEY (`idJour`) REFERENCES `jour` (`idJour`);

--
-- Constraints for table `version`
--
ALTER TABLE `version`
  ADD CONSTRAINT `version_ibfk_1` FOREIGN KEY (`idEscapeGame`) REFERENCES `escape_game` (`idEscapeGame`),
  ADD CONSTRAINT `version_ibfk_2` FOREIGN KEY (`idLieu`) REFERENCES `lieu` (`idLieu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
