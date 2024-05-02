-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 02 mai 2024 à 15:21
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
  `idPanier` int(11) NOT NULL,
  `payer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `envisager`
--

INSERT INTO `envisager` (`valeur_bon`, `nb_produit`, `idProduit`, `idPanier`, `payer`) VALUES
(30, 2, 3, 4, 0);

-- --------------------------------------------------------

--
-- Structure de la table `escape_game`
--

CREATE TABLE `escape_game` (
  `idEscapeGame` int(11) NOT NULL,
  `idPhoto` int(11) NOT NULL,
  `prix_game` int(11) NOT NULL,
  `niveau_parcours` int(11) NOT NULL,
  `niveau_puzzle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `escape_game`
--

INSERT INTO `escape_game` (`idEscapeGame`, `idPhoto`, `prix_game`, `niveau_parcours`, `niveau_puzzle`) VALUES
(5, 77, 45, 2, 1),
(6, 81, 34, 3, 3),
(7, 82, 76, 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `groupe_heure`
--

CREATE TABLE `groupe_heure` (
  `idGroupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

--
-- Déchargement des données de la table `illustrer`
--

INSERT INTO `illustrer` (`idProduit`, `idPhoto`) VALUES
(1, 90),
(3, 94),
(3, 95),
(3, 96);

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
  `nom_lieu` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idPhoto` int(11) NOT NULL,
  `video` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `lieu`
--

INSERT INTO `lieu` (`idLieu`, `nom_lieu`, `logo`, `idPhoto`, `video`) VALUES
(11, 'Mulhouse', 'Kaiserstuhl-Escape-v1.png', 76, 'https://www.youtube.com/embed/nB4EnEo39N8'),
(12, 'Colmar', 'Kaiserstuhl-Escape-v1.png', 97, 'https://www.youtube.com/embed/nB4EnEo39N8'),
(13, 'Strasbourg', 'Kaiserstuhl-Escape-v1.png', 99, 'https://www.youtube.com/embed/nB4EnEo39N8');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `idPanier` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`idPanier`, `idUtilisateur`) VALUES
(1, 10),
(2, 10),
(3, 10),
(4, 10);

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `idPhoto` int(11) NOT NULL,
  `lien_photo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`idPhoto`, `lien_photo`) VALUES
(76, 'mulhouse.jpg'),
(77, 'inVinoVeritas-Kaiserstuhl-Escape-Room-Walk.jpg'),
(78, 'big-ticket-image-641c2ee7c3d21237975441-cropped600-400.jpg'),
(79, 'big-ticket-image-641c2eec81a12910288474-cropped600-400.jpg'),
(80, 'big-ticket-image-641c2ef055fae439179468-cropped600-400.jpg'),
(81, '9Linden.jpg'),
(82, 'In-Cantata-Vinum-Escape-Abenteuer.jpg'),
(83, 'big-ticket-image-641c332e0d5ee629314407-cropped600-400.jpg'),
(84, 'big-ticket-image-641c333bcb068492355830-cropped600-400.jpg'),
(85, 'big-ticket-image-641c3337e389d920220740-cropped600-400.jpg'),
(86, 'big-ticket-image-641c33257c0e4362308687-cropped600-400.jpg'),
(87, 'big-ticket-image-641c33322cb90128075773-cropped600-400.jpg'),
(88, 'big-ticket-image-641c33297764a925337214-cropped600-400.jpg'),
(89, 'bon.png'),
(90, 'big-ticket-image-65e03b952c579647504659-cropped600-400.jpg'),
(91, 'big-ticket-image-6437cb39868cb428580910-cropped600-400.jpg'),
(92, 'coffre_puzzle.PNG'),
(93, 'coffre_puzzle.jpg'),
(94, 'coffre_puzzle2.jpg'),
(95, 'coffre_puzzle3.jpg'),
(96, 'coffre_puzzle4.jpg'),
(97, 'colmar.jpg'),
(98, 'strasbourg.jpg'),
(99, 'koenigsbourg.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idProduit` int(11) NOT NULL,
  `idPhoto` int(11) NOT NULL,
  `prix_produit` decimal(10,0) NOT NULL,
  `valeur_bon` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taille_colis` int(11) NOT NULL,
  `delai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `idPhoto`, `prix_produit`, `valeur_bon`, `taille_colis`, `delai`) VALUES
(1, 89, 50, '[\"50\"]', 1, 5),
(2, 91, 45, '[\"50\",\"100\",\"150\",\"200\",\"250\",\"300\"]', 2, 5),
(3, 93, 30, '[\"30\"]', 1, 7);

-- --------------------------------------------------------

--
-- Structure de la table `représenter`
--

CREATE TABLE `représenter` (
  `idVersion` int(11) NOT NULL,
  `idPhoto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `représenter`
--

INSERT INTO `représenter` (`idVersion`, `idPhoto`) VALUES
(5, 78),
(5, 79),
(5, 80),
(7, 83),
(7, 84),
(7, 85),
(7, 86),
(7, 87),
(7, 88),
(8, 81),
(9, 77),
(10, 77),
(11, 77);

-- --------------------------------------------------------

--
-- Structure de la table `reserver`
--

CREATE TABLE `reserver` (
  `date_reservation` datetime NOT NULL,
  `nb_reservation` int(11) NOT NULL,
  `payer` tinyint(1) NOT NULL,
  `idVersion` int(11) NOT NULL,
  `idPanier` int(11) NOT NULL,
  `prix` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `reserver`
--

INSERT INTO `reserver` (`date_reservation`, `nb_reservation`, `payer`, `idVersion`, `idPanier`, `prix`) VALUES
('2024-05-17 18:00:00', 10, 0, 6, 1, 322),
('2024-05-14 18:00:00', 10, 0, 6, 2, 322),
('2024-05-14 18:00:00', 10, 0, 6, 3, 322),
('2024-05-22 18:00:00', 10, 0, 6, 4, 322);

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
(10, 'admin', 'admin', '$2y$10$SzNZNZ6mDwcU5yf9Af/ciOoBkokFEjvoF87PPQJXQN/5vZtW96Id2', 'admin@wescape.com', '', '', '', '', ''),
(14, 'HAUPTMANN-HERBETTE', 'Aurélien', '$2y$10$aylGq2jKmK.ERkwJk0.aoOBuYHyp/OFNSt54cK.uEAYvMWqUoxeva', 'aurehau6@gmail.com', '06 26 50 93 95', '14 Rue Principale', 'Fulleren', '68210', 'France');

-- --------------------------------------------------------

--
-- Structure de la table `version`
--

CREATE TABLE `version` (
  `idVersion` int(11) NOT NULL,
  `idEscapeGame` int(11) NOT NULL,
  `idLieu` int(11) NOT NULL,
  `durée` int(11) NOT NULL,
  `langues` json NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordonne_GPS` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parking` tinyint(1) NOT NULL,
  `train` tinyint(1) NOT NULL,
  `bus` tinyint(1) NOT NULL,
  `nbclient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `version`
--

INSERT INTO `version` (`idVersion`, `idEscapeGame`, `idLieu`, `durée`, `langues`, `ville`, `code_postal`, `coordonne_GPS`, `parking`, `train`, `bus`, `nbclient`) VALUES
(5, 5, 11, 2, '[\"fr\", \"en\"]', 'Mulhouse', '68100', '', 1, 1, 1, 10),
(6, 6, 11, 3, '[\"fr\", \"en\"]', 'Mulhouse', '68100', '', 1, 1, 1, 10),
(7, 7, 11, 2, '[\"fr\", \"en\"]', 'Mulhouse', '68100', '', 1, 1, 1, 10),
(8, 6, 12, 10, '[\"fr\", \"en\"]', 'Colmar', '68026', '', 1, 1, 1, 10),
(9, 5, 12, 10, '[\"fr\"]', 'Colmar', '68026', '', 1, 1, 1, 10),
(10, 7, 13, 10, '[\"fr\", \"en\"]', 'Strasbourg', '67000', '', 1, 1, 1, 10),
(11, 5, 13, 10, '[\"fr\", \"en\"]', 'Strasbourg', '67000', '', 1, 1, 1, 10);

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
  ADD KEY `idUtilisateur` (`idPanier`);

--
-- Index pour la table `escape_game`
--
ALTER TABLE `escape_game`
  ADD PRIMARY KEY (`idEscapeGame`),
  ADD KEY `idPhoto` (`idPhoto`);

--
-- Index pour la table `groupe_heure`
--
ALTER TABLE `groupe_heure`
  ADD PRIMARY KEY (`idGroupe`);

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
  ADD PRIMARY KEY (`idLieu`),
  ADD KEY `idPhoto` (`idPhoto`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`idPanier`),
  ADD KEY `idUtilisateur` (`idUtilisateur`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`idPhoto`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`),
  ADD KEY `idPhoto` (`idPhoto`);

--
-- Index pour la table `représenter`
--
ALTER TABLE `représenter`
  ADD KEY `idEscapeGame` (`idVersion`),
  ADD KEY `idPhoto` (`idPhoto`);

--
-- Index pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD KEY `idEscapeGame` (`idVersion`),
  ADD KEY `idUtilisateur` (`idPanier`);

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
-- Index pour la table `version`
--
ALTER TABLE `version`
  ADD PRIMARY KEY (`idVersion`),
  ADD KEY `idEscapeGame` (`idEscapeGame`),
  ADD KEY `idLieu` (`idLieu`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `escape_game`
--
ALTER TABLE `escape_game`
  MODIFY `idEscapeGame` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `idLieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `idPanier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `idPhoto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `version`
--
ALTER TABLE `version`
  MODIFY `idVersion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  ADD CONSTRAINT `envisager_ibfk_2` FOREIGN KEY (`idPanier`) REFERENCES `panier` (`idPanier`);

--
-- Contraintes pour la table `escape_game`
--
ALTER TABLE `escape_game`
  ADD CONSTRAINT `escape_game_ibfk_1` FOREIGN KEY (`idPhoto`) REFERENCES `photo` (`idPhoto`);

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
-- Contraintes pour la table `lieu`
--
ALTER TABLE `lieu`
  ADD CONSTRAINT `lieu_ibfk_1` FOREIGN KEY (`idPhoto`) REFERENCES `photo` (`idPhoto`);

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `panier_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`idPhoto`) REFERENCES `photo` (`idPhoto`);

--
-- Contraintes pour la table `représenter`
--
ALTER TABLE `représenter`
  ADD CONSTRAINT `représenter_ibfk_1` FOREIGN KEY (`idVersion`) REFERENCES `version` (`idVersion`),
  ADD CONSTRAINT `représenter_ibfk_2` FOREIGN KEY (`idPhoto`) REFERENCES `photo` (`idPhoto`);

--
-- Contraintes pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD CONSTRAINT `reserver_ibfk_1` FOREIGN KEY (`idVersion`) REFERENCES `escape_game` (`idEscapeGame`),
  ADD CONSTRAINT `reserver_ibfk_2` FOREIGN KEY (`idPanier`) REFERENCES `panier` (`idPanier`);

--
-- Contraintes pour la table `survenir`
--
ALTER TABLE `survenir`
  ADD CONSTRAINT `survenir_ibfk_1` FOREIGN KEY (`idEscapeGame`) REFERENCES `escape_game` (`idEscapeGame`),
  ADD CONSTRAINT `survenir_ibfk_2` FOREIGN KEY (`idJour`) REFERENCES `jour` (`idJour`);

--
-- Contraintes pour la table `version`
--
ALTER TABLE `version`
  ADD CONSTRAINT `version_ibfk_1` FOREIGN KEY (`idEscapeGame`) REFERENCES `escape_game` (`idEscapeGame`),
  ADD CONSTRAINT `version_ibfk_2` FOREIGN KEY (`idLieu`) REFERENCES `lieu` (`idLieu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
