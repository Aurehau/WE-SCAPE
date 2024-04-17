-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 17 avr. 2024 à 11:58
-- Version du serveur : 5.7.43
-- Version de PHP : 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `wescape`
--

-- --------------------------------------------------------

--
-- Structure de la table `assigner`
--

CREATE TABLE `assigner` (
  `idHeure` int(11) NOT NULL,
  `idGroupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `envisager`
--

CREATE TABLE `envisager` (
  `valeur_bon` int(11) NOT NULL,
  `nb_produit` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `escape_game`
--

CREATE TABLE `escape_game` (
  `idEscapeGame` int(11) NOT NULL,
  `img_game` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix_game` int(11) NOT NULL,
  `niveau_parcours` int(11) NOT NULL,
  `niveau_puzzle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `escape_game`
--

INSERT INTO `escape_game` (`idEscapeGame`, `img_game`, `prix_game`, `niveau_parcours`, `niveau_puzzle`) VALUES
(1, 'lienimggame', 25, 1, 2),
(2, 'liendeimagegame', 75, 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `groupe_heure`
--

CREATE TABLE `groupe_heure` (
  `idGroupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `heberger`
--

CREATE TABLE `heberger` (
  `idEscapeGame` int(11) NOT NULL,
  `idLieu` int(11) NOT NULL,
  `durée` int(11) NOT NULL,
  `langues` json NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordonne_GPS` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parking` tinyint(1) NOT NULL,
  `train` tinyint(1) NOT NULL,
  `bus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `heberger`
--

INSERT INTO `heberger` (`idEscapeGame`, `idLieu`, `durée`, `langues`, `adresse`, `coordonne_GPS`, `parking`, `train`, `bus`) VALUES
(1, 1, 2, '{\"0\": \"francais\", \"1\": \"anglais\", \"2\": \"allemand\"}', '23 rue des cigognes', '2,002 4.001', 5, 1, 0),
(2, 1, 2, '{\"0\": \"francais\", \"1\": \"anglais\"}', 'l\'adresse', '1.03 1.05', 1, 0, 1),
(1, 2, 4, '{\"0\": \"francais\"}', '15 rue des chocolatiers ', '3.006 3.04', 1, 0, 1),
(1, 1, 2, '{\"0\": \"francais\", \"1\": \"anglais\", \"2\": \"allemand\"}', '23 rue des cigognes', '2,002 4.001', 5, 1, 0),
(2, 1, 2, '{\"0\": \"francais\", \"1\": \"anglais\"}', 'l\'adresse', '1.03 1.05', 1, 0, 1),
(1, 2, 4, '{\"0\": \"francais\"}', '15 rue des chocolatiers ', '3.006 3.04', 1, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

CREATE TABLE `horaire` (
  `idHeure` int(11) NOT NULL,
  `horaire` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `illustrer`
--

CREATE TABLE `illustrer` (
  `idProduit` int(11) NOT NULL,
  `idPhoto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jour`
--

CREATE TABLE `jour` (
  `idJour` int(11) NOT NULL,
  `date_jour` date NOT NULL,
  `idGroupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

CREATE TABLE `lieu` (
  `idLieu` int(11) NOT NULL,
  `ville` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_lieu` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `lieu`
--

INSERT INTO `lieu` (`idLieu`, `ville`, `logo`, `img_lieu`, `video`) VALUES
(1, 'Stuttgart', 'lienlogo', 'lienimg', 'lienvidéo'),
(2, 'Rhin', 'lienlogdela', 'lienimgdela', 'lienvideodela');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `idPhoto` int(11) NOT NULL,
  `lien_photo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idProduit` int(11) NOT NULL,
  `img_produit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix_produit` int(11) NOT NULL,
  `valeur_bon` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `img_produit`, `prix_produit`, `valeur_bon`) VALUES
(1, 'img catre cadeaux', 45, '[45,25,75]'),
(2, 'img carte cadeaux et coffre', 60, '[45,25,60]');

-- --------------------------------------------------------

--
-- Structure de la table `représenter`
--

CREATE TABLE `représenter` (
  `idEscapeGame` int(11) NOT NULL,
  `idPhoto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reserver`
--

CREATE TABLE `reserver` (
  `date_reservation` date NOT NULL,
  `heure_reservation` int(11) NOT NULL,
  `nb_reservation` int(11) NOT NULL,
  `payer` tinyint(1) NOT NULL,
  `idEscapeGame` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `survenir`
--

CREATE TABLE `survenir` (
  `idJour` int(11) NOT NULL,
  `idEscapeGame` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `nom` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pays` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nom`, `prenom`, `mdp`, `mail`, `tel`, `adresse`, `ville`, `code_postal`, `pays`) VALUES
(1, 'Hauptmann', 'Aurélien', '12345', 'aurehau6@gmail.com', '0626509395', '14 rue Principale', 'Fulleren', '68210', 'France'),
(2, 'Trump', 'Donald', '1234', 'trump@gmail.com', '06 05 12 89 74', '14 Rue Principale', 'Fulleren', '68210', 'France'),
(3, 'Biden', 'Joe', '$2y$10$O1r1SOGe/lwQeyBhw6WK.OyDBRt5lA2naGR0TsmOvUXP8czrt73pi', 'trump@gmail.com', '06 05 12 89 74', '14 Rue Principale', 'Fulleren', '68210', 'France'),
(5, 'Macron', 'Emmenuel', '$2y$10$CX8vS.gxw5v2GvWcZl4JIekDO3T67aO7Vu2YJn6zIetBR57FKf8z.', 'trump@gmail.com', '06 40 50 89 25', '14 Rue Principale', 'Fulleren', '', ''),
(6, 'Macron', 'Emmenuel', '$2y$10$5.8x6SlpLFBmc7fbDzIHX.IYsVS7yoofYqvOwz0PVa3U7SmqgQktC', 'trump@gmail.com', '06 40 50 89 25', '14 Rue Principale', 'Fulleren', '', ''),
(7, 'Macron', 'Emmenuel', '$2y$10$vDWXDMUxfIy/qXKiBRg7oO5Jw4kkfx5IN1.XM0dsv1uERUHuyoEba', 'trump@gmail.com', '06 40 50 89 25', '14 Rue Principale', 'Fulleren', '', ''),
(8, 'Macron', 'Emmenuel', '$2y$10$k2Mvf/InyAsmtyGf/D8DTu6sx83CNkS75xdnhR9UEx1dR8pcwLIyG', 'trump@gmail.com', '06 40 50 89 25', '14 Rue Principale', 'Fulleren', '', ''),
(9, 'hau', 'ludo', '$2y$10$tvzlrAG0GgqESLKUeZCdZOWkD3dzAU1EaiME3OTwyY.gJgZYb.0Hq', 'ludo@gmail.com', '', '', '', '', ''),
(10, 'admin', 'admin', '$2y$10$SzNZNZ6mDwcU5yf9Af/ciOoBkokFEjvoF87PPQJXQN/5vZtW96Id2', 'admin@wescape.com', '', '', '', '', ''),
(11, 'Bloublou', 'Bernard', '$2y$10$5udOlzrC2DDYT2EhpVI5J.CeIT45CY2Q8uln.gMHdthLbeAmbVfaS', 'bernard@uha.fr', '', '', '', '', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `assigner`
--
ALTER TABLE `assigner`
  ADD KEY `idGroupe` (`idGroupe`),
  ADD KEY `idHeure` (`idHeure`);

--
-- Index pour la table `envisager`
--
ALTER TABLE `envisager`
  ADD KEY `idProduit` (`idProduit`),
  ADD KEY `idUtilisateur` (`idUtilisateur`);

--
-- Index pour la table `escape_game`
--
ALTER TABLE `escape_game`
  ADD PRIMARY KEY (`idEscapeGame`);

--
-- Index pour la table `groupe_heure`
--
ALTER TABLE `groupe_heure`
  ADD PRIMARY KEY (`idGroupe`);

--
-- Index pour la table `heberger`
--
ALTER TABLE `heberger`
  ADD KEY `idEscapeGame` (`idEscapeGame`),
  ADD KEY `idLieu` (`idLieu`);

--
-- Index pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD PRIMARY KEY (`idHeure`);

--
-- Index pour la table `illustrer`
--
ALTER TABLE `illustrer`
  ADD KEY `idPhoto` (`idPhoto`),
  ADD KEY `idProduit` (`idProduit`);

--
-- Index pour la table `jour`
--
ALTER TABLE `jour`
  ADD PRIMARY KEY (`idJour`),
  ADD KEY `idGroupe` (`idGroupe`);

--
-- Index pour la table `lieu`
--
ALTER TABLE `lieu`
  ADD PRIMARY KEY (`idLieu`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`idPhoto`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`);

--
-- Index pour la table `représenter`
--
ALTER TABLE `représenter`
  ADD KEY `idEscapeGame` (`idEscapeGame`),
  ADD KEY `idPhoto` (`idPhoto`);

--
-- Index pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD KEY `idEscapeGame` (`idEscapeGame`),
  ADD KEY `idUtilisateur` (`idUtilisateur`);

--
-- Index pour la table `survenir`
--
ALTER TABLE `survenir`
  ADD KEY `idEscapeGame` (`idEscapeGame`),
  ADD KEY `idJour` (`idJour`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `escape_game`
--
ALTER TABLE `escape_game`
  MODIFY `idEscapeGame` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `groupe_heure`
--
ALTER TABLE `groupe_heure`
  MODIFY `idGroupe` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `horaire`
--
ALTER TABLE `horaire`
  MODIFY `idHeure` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `jour`
--
ALTER TABLE `jour`
  MODIFY `idJour` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `lieu`
--
ALTER TABLE `lieu`
  MODIFY `idLieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `idPhoto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `assigner`
--
ALTER TABLE `assigner`
  ADD CONSTRAINT `assigner_ibfk_1` FOREIGN KEY (`idGroupe`) REFERENCES `groupe_heure` (`idGroupe`),
  ADD CONSTRAINT `assigner_ibfk_2` FOREIGN KEY (`idHeure`) REFERENCES `horaire` (`idHeure`);

--
-- Contraintes pour la table `envisager`
--
ALTER TABLE `envisager`
  ADD CONSTRAINT `envisager_ibfk_1` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`),
  ADD CONSTRAINT `envisager_ibfk_2` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `heberger`
--
ALTER TABLE `heberger`
  ADD CONSTRAINT `heberger_ibfk_1` FOREIGN KEY (`idEscapeGame`) REFERENCES `escape_game` (`idEscapeGame`),
  ADD CONSTRAINT `heberger_ibfk_2` FOREIGN KEY (`idLieu`) REFERENCES `lieu` (`idLieu`);

--
-- Contraintes pour la table `illustrer`
--
ALTER TABLE `illustrer`
  ADD CONSTRAINT `illustrer_ibfk_1` FOREIGN KEY (`idPhoto`) REFERENCES `photo` (`idPhoto`),
  ADD CONSTRAINT `illustrer_ibfk_2` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`);

--
-- Contraintes pour la table `jour`
--
ALTER TABLE `jour`
  ADD CONSTRAINT `jour_ibfk_1` FOREIGN KEY (`idGroupe`) REFERENCES `groupe_heure` (`idGroupe`);

--
-- Contraintes pour la table `représenter`
--
ALTER TABLE `représenter`
  ADD CONSTRAINT `représenter_ibfk_1` FOREIGN KEY (`idEscapeGame`) REFERENCES `escape_game` (`idEscapeGame`),
  ADD CONSTRAINT `représenter_ibfk_2` FOREIGN KEY (`idPhoto`) REFERENCES `photo` (`idPhoto`);

--
-- Contraintes pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD CONSTRAINT `reserver_ibfk_1` FOREIGN KEY (`idEscapeGame`) REFERENCES `escape_game` (`idEscapeGame`),
  ADD CONSTRAINT `reserver_ibfk_2` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `survenir`
--
ALTER TABLE `survenir`
  ADD CONSTRAINT `survenir_ibfk_1` FOREIGN KEY (`idEscapeGame`) REFERENCES `escape_game` (`idEscapeGame`),
  ADD CONSTRAINT `survenir_ibfk_2` FOREIGN KEY (`idJour`) REFERENCES `jour` (`idJour`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
