-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mer. 29 mai 2019 à 12:29
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `lesson_database`
--

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

CREATE TABLE `demande` (
  `id_dem` int(11) NOT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `descr` varchar(255) DEFAULT NULL,
  `etat` enum('en cours de validation','validee par un enseignant','validee par un expert','') DEFAULT NULL,
  `id_fic` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `demande`
--

INSERT INTO `demande` (`id_dem`, `titre`, `descr`, `etat`, `id_fic`) VALUES
(1, 'Révisions rattrapages', 'Bonjour', 'en cours de validation', NULL),
(2, 'Heures communes entre les groupes', 'd', 'en cours de validation', NULL),
(3, 'Approfondir la DataScience en 3A', 'd', 'en cours de validation', NULL),
(4, 'lol', 'd', 'en cours de validation', NULL),
(5, 'lol', 'd', 'en cours de validation', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `expertise`
--

CREATE TABLE `expertise` (
  `id_exp` int(11) NOT NULL,
  `domaine` varchar(100) DEFAULT NULL,
  `descr` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `expertise`
--

INSERT INTO `expertise` (`id_exp`, `domaine`, `descr`) VALUES
(1, 'Data-Science', 'Collecte, Traitement et Exploitation des données'),
(2, 'Physique', 'Théorie des cordes'),
(3, 'Orienté Objet', 'Programmation et conception orientés objet');

-- --------------------------------------------------------

--
-- Structure de la table `exp_to_pers`
--

CREATE TABLE `exp_to_pers` (
  `id_exp` int(11) NOT NULL,
  `id_pers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `exp_to_pers`
--

INSERT INTO `exp_to_pers` (`id_exp`, `id_pers`) VALUES
(1, 205),
(3, 207);

-- --------------------------------------------------------

--
-- Structure de la table `fichier`
--

CREATE TABLE `fichier` (
  `id_fic` int(11) NOT NULL,
  `chemin` varchar(100) DEFAULT NULL,
  `extension` enum('pdf','txt','png','jpeg') DEFAULT NULL,
  `taille` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id_form` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id_form`, `nom`) VALUES
(1, 'IDU'),
(2, 'IAI'),
(3, 'MM'),
(4, 'ITII');

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

CREATE TABLE `intervention` (
  `id_int` int(11) NOT NULL,
  `nb_heures` time DEFAULT NULL,
  `nature` varchar(30) DEFAULT NULL,
  `id_dem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `id_mat` int(11) NOT NULL,
  `libelle` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id_mat`, `libelle`) VALUES
(1, 'INFO642'),
(2, 'MATH641'),
(3, 'ISOC531'),
(4, 'PROJ631'),
(5, 'INFO642');

-- --------------------------------------------------------

--
-- Structure de la table `mat_to_pers`
--

CREATE TABLE `mat_to_pers` (
  `id_mat` int(11) NOT NULL,
  `id_pers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `mat_to_pers`
--

INSERT INTO `mat_to_pers` (`id_mat`, `id_pers`) VALUES
(5, 204),
(4, 206);

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

CREATE TABLE `personne` (
  `id_pers` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `prenom` varchar(100) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `mdp` varchar(50) NOT NULL,
  `statut` enum('etu','prof','interv') DEFAULT NULL,
  `id_form` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`id_pers`, `nom`, `prenom`, `mail`, `mdp`, `statut`, `id_form`) VALUES
(0, 'GOD', 'Mister', 'god@gmail.com', 'a4757d7419ff3b48e92e90596f0e7548', 'prof', NULL),
(103, 'DECOOPMAN', 'Clément', 'clem@gmail.com', 'ab6c040066603ef2519d512b21dce9ab', 'etu', 1),
(204, 'Mariton', 'Tanguy', 'randoo@gmail.com', '7ddf32e17a6ac5ce04a8ecbf782ca509', 'prof', NULL),
(205, 'Rosa-Martin', 'Jesus', 'jesus@gmail.com', '110d46fcd978c24f306cd7fa23464d73', 'interv', NULL),
(206, 'Petit', 'David', 'dadou@gmail.com', '4cb9749ed0deccc9927687401967a193', 'prof', NULL),
(207, 'Nasri', 'Chiheb', 'chichi@gmail.com', '4805df3f93d2fd44d85d536abab5b7a8', 'interv', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `traite`
--

CREATE TABLE `traite` (
  `id_dem` int(11) NOT NULL,
  `id_etu` int(11) NOT NULL,
  `id_prof` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `traite`
--

INSERT INTO `traite` (`id_dem`, `id_etu`, `id_prof`) VALUES
(1, 103, 0),
(2, 103, 0),
(3, 103, 0),
(5, 103, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `demande`
--
ALTER TABLE `demande`
  ADD PRIMARY KEY (`id_dem`),
  ADD KEY `FK_DemFic` (`id_fic`);

--
-- Index pour la table `expertise`
--
ALTER TABLE `expertise`
  ADD PRIMARY KEY (`id_exp`);

--
-- Index pour la table `exp_to_pers`
--
ALTER TABLE `exp_to_pers`
  ADD PRIMARY KEY (`id_exp`,`id_pers`),
  ADD KEY `FK_Exp2Pers2` (`id_pers`);

--
-- Index pour la table `fichier`
--
ALTER TABLE `fichier`
  ADD PRIMARY KEY (`id_fic`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id_form`);

--
-- Index pour la table `intervention`
--
ALTER TABLE `intervention`
  ADD PRIMARY KEY (`id_int`),
  ADD KEY `FK_InterDem` (`id_dem`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id_mat`);

--
-- Index pour la table `mat_to_pers`
--
ALTER TABLE `mat_to_pers`
  ADD PRIMARY KEY (`id_mat`,`id_pers`),
  ADD KEY `FK_Mat2Pers2` (`id_pers`);

--
-- Index pour la table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`id_pers`),
  ADD KEY `FK_PersFormation` (`id_form`);

--
-- Index pour la table `traite`
--
ALTER TABLE `traite`
  ADD PRIMARY KEY (`id_dem`,`id_etu`,`id_prof`),
  ADD KEY `FK_TraiteProf` (`id_prof`),
  ADD KEY `FK_TraiteEtu` (`id_etu`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `demande`
--
ALTER TABLE `demande`
  MODIFY `id_dem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `expertise`
--
ALTER TABLE `expertise`
  MODIFY `id_exp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `fichier`
--
ALTER TABLE `fichier`
  MODIFY `id_fic` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id_form` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `intervention`
--
ALTER TABLE `intervention`
  MODIFY `id_int` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id_mat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `personne`
--
ALTER TABLE `personne`
  MODIFY `id_pers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `demande`
--
ALTER TABLE `demande`
  ADD CONSTRAINT `FK_DemFic` FOREIGN KEY (`id_fic`) REFERENCES `fichier` (`id_fic`);

--
-- Contraintes pour la table `exp_to_pers`
--
ALTER TABLE `exp_to_pers`
  ADD CONSTRAINT `FK_Exp2Pers1` FOREIGN KEY (`id_exp`) REFERENCES `expertise` (`id_exp`),
  ADD CONSTRAINT `FK_Exp2Pers2` FOREIGN KEY (`id_pers`) REFERENCES `personne` (`id_pers`);

--
-- Contraintes pour la table `intervention`
--
ALTER TABLE `intervention`
  ADD CONSTRAINT `FK_InterDem` FOREIGN KEY (`id_dem`) REFERENCES `demande` (`id_dem`);

--
-- Contraintes pour la table `mat_to_pers`
--
ALTER TABLE `mat_to_pers`
  ADD CONSTRAINT `FK_Mat2Pers1` FOREIGN KEY (`id_mat`) REFERENCES `matiere` (`id_mat`),
  ADD CONSTRAINT `FK_Mat2Pers2` FOREIGN KEY (`id_pers`) REFERENCES `personne` (`id_pers`);

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `FK_PersFormation` FOREIGN KEY (`id_form`) REFERENCES `formation` (`id_form`);

--
-- Contraintes pour la table `traite`
--
ALTER TABLE `traite`
  ADD CONSTRAINT `FK_TraiteDem` FOREIGN KEY (`id_dem`) REFERENCES `demande` (`id_dem`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TraiteEtu` FOREIGN KEY (`id_etu`) REFERENCES `personne` (`id_pers`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TraiteProf` FOREIGN KEY (`id_prof`) REFERENCES `personne` (`id_pers`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
