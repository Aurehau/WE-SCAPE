-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 16, 2024 at 06:31 AM
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
  `idUtilisateur` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `escape_game`
--

CREATE TABLE `escape_game` (
  `idEscapeGame` int NOT NULL,
  `img_game` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix_game` int NOT NULL,
  `niveau_parcours` int NOT NULL,
  `niveau_puzzle` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `escape_game`
--

INSERT INTO `escape_game` (`idEscapeGame`, `img_game`, `prix_game`, `niveau_parcours`, `niveau_puzzle`) VALUES
(1, 'lienimggame', 25, 1, 2),
(2, 'liendeimagegame', 75, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `groupe_heure`
--

CREATE TABLE `groupe_heure` (
  `idGroupe` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `heberger`
--

CREATE TABLE `heberger` (
  `idEscapeGame` int NOT NULL,
  `idLieu` int NOT NULL,
  `durée` int NOT NULL,
  `langues` json NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordonne_GPS` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parking` tinyint(1) NOT NULL,
  `train` tinyint(1) NOT NULL,
  `bus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `heberger`
--

INSERT INTO `heberger` (`idEscapeGame`, `idLieu`, `durée`, `langues`, `adresse`, `coordonne_GPS`, `parking`, `train`, `bus`) VALUES
(1, 1, 2, '{\"0\": \"francais\", \"1\": \"anglais\", \"2\": \"allemand\"}', '23 rue des cigognes', '2,002 4.001', 5, 1, 0),
(2, 1, 2, '{\"0\": \"francais\", \"1\": \"anglais\"}', 'l\'adresse', '1.03 1.05', 1, 0, 1),
(1, 2, 4, '{\"0\": \"francais\"}', '15 rue des chocolatiers ', '3.006 3.04', 1, 0, 1);

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
  `ville` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_lieu` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lieu`
--

INSERT INTO `lieu` (`idLieu`, `ville`, `logo`, `img_lieu`, `video`) VALUES
(1, 'Stuttgart', 'lienlogo', 'lienimg', 'lienvidéo'),
(2, 'Rhin', 'lienlogdela', 'lienimgdela', 'lienvideodela');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `idPhoto` int NOT NULL,
  `lien_photo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `idProduit` int NOT NULL,
  `img_produit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix_produit` int NOT NULL,
  `valeur_bon` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`idProduit`, `img_produit`, `prix_produit`, `valeur_bon`) VALUES
(1, 'img catre cadeaux', 45, '[45,25,75]'),
(2, 'img carte cadeaux et coffre', 60, '[45,25,60]');

-- --------------------------------------------------------

--
-- Table structure for table `représenter`
--

CREATE TABLE `représenter` (
  `idEscapeGame` int NOT NULL,
  `idPhoto` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reserver`
--

CREATE TABLE `reserver` (
  `date_reservation` date NOT NULL,
  `heure_reservation` int NOT NULL,
  `nb_reservation` int NOT NULL,
  `payer` tinyint(1) NOT NULL,
  `idEscapeGame` int NOT NULL,
  `idUtilisateur` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `nom` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  ADD KEY `idUtilisateur` (`idUtilisateur`);

--
-- Indexes for table `escape_game`
--
ALTER TABLE `escape_game`
  ADD PRIMARY KEY (`idEscapeGame`);

--
-- Indexes for table `groupe_heure`
--
ALTER TABLE `groupe_heure`
  ADD PRIMARY KEY (`idGroupe`);

--
-- Indexes for table `heberger`
--
ALTER TABLE `heberger`
  ADD KEY `idEscapeGame` (`idEscapeGame`),
  ADD KEY `idLieu` (`idLieu`);

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
  ADD PRIMARY KEY (`idLieu`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`idPhoto`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`);

--
-- Indexes for table `représenter`
--
ALTER TABLE `représenter`
  ADD KEY `idEscapeGame` (`idEscapeGame`),
  ADD KEY `idPhoto` (`idPhoto`);

--
-- Indexes for table `reserver`
--
ALTER TABLE `reserver`
  ADD KEY `idEscapeGame` (`idEscapeGame`),
  ADD KEY `idUtilisateur` (`idUtilisateur`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `escape_game`
--
ALTER TABLE `escape_game`
  MODIFY `idEscapeGame` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `idLieu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `idPhoto` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigner`
--
ALTER TABLE `assigner`
  ADD CONSTRAINT `assigner_ibfk_1` FOREIGN KEY (`idGroupe`) REFERENCES `groupe_heure` (`idGroupe`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `assigner_ibfk_2` FOREIGN KEY (`idHeure`) REFERENCES `horaire` (`idHeure`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `envisager`
--
ALTER TABLE `envisager`
  ADD CONSTRAINT `envisager_ibfk_1` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `envisager_ibfk_2` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `heberger`
--
ALTER TABLE `heberger`
  ADD CONSTRAINT `heberger_ibfk_1` FOREIGN KEY (`idEscapeGame`) REFERENCES `escape_game` (`idEscapeGame`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `heberger_ibfk_2` FOREIGN KEY (`idLieu`) REFERENCES `lieu` (`idLieu`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `illustrer`
--
ALTER TABLE `illustrer`
  ADD CONSTRAINT `illustrer_ibfk_1` FOREIGN KEY (`idPhoto`) REFERENCES `photo` (`idPhoto`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `illustrer_ibfk_2` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `jour`
--
ALTER TABLE `jour`
  ADD CONSTRAINT `jour_ibfk_1` FOREIGN KEY (`idGroupe`) REFERENCES `groupe_heure` (`idGroupe`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `représenter`
--
ALTER TABLE `représenter`
  ADD CONSTRAINT `représenter_ibfk_1` FOREIGN KEY (`idEscapeGame`) REFERENCES `escape_game` (`idEscapeGame`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `représenter_ibfk_2` FOREIGN KEY (`idPhoto`) REFERENCES `photo` (`idPhoto`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `reserver`
--
ALTER TABLE `reserver`
  ADD CONSTRAINT `reserver_ibfk_1` FOREIGN KEY (`idEscapeGame`) REFERENCES `escape_game` (`idEscapeGame`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `reserver_ibfk_2` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `survenir`
--
ALTER TABLE `survenir`
  ADD CONSTRAINT `survenir_ibfk_1` FOREIGN KEY (`idEscapeGame`) REFERENCES `escape_game` (`idEscapeGame`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `survenir_ibfk_2` FOREIGN KEY (`idJour`) REFERENCES `jour` (`idJour`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
