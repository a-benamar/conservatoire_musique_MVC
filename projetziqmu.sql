-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 02 sep. 2022 à 11:44
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetziqmu`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

DROP TABLE IF EXISTS `adherent`;
CREATE TABLE IF NOT EXISTS `adherent` (
  `idAdherent` int(11) NOT NULL AUTO_INCREMENT,
  `nomAdherent` varchar(30) NOT NULL,
  `prenomAdherent` varchar(30) NOT NULL,
  `mailAdherent` varchar(50) NOT NULL,
  `telAdherent` varchar(30) NOT NULL,
  `dateInscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idAdherent`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`idAdherent`, `nomAdherent`, `prenomAdherent`, `mailAdherent`, `telAdherent`, `dateInscription`) VALUES
(69, 'BEN AMAR', 'Karim', 'abenamar@gmx.com', '0404040404', '2022-02-24 09:18:03');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `idSeance` int(11) NOT NULL,
  `idAdherent` int(11) NOT NULL,
  PRIMARY KEY (`idSeance`,`idAdherent`),
  KEY `fk_constraint2` (`idAdherent`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `inscription`
--

INSERT INTO `inscription` (`idSeance`, `idAdherent`) VALUES
(2, 69);

-- --------------------------------------------------------

--
-- Structure de la table `instrument`
--

DROP TABLE IF EXISTS `instrument`;
CREATE TABLE IF NOT EXISTS `instrument` (
  `idInstrument` int(11) NOT NULL AUTO_INCREMENT,
  `libInstrument` varchar(30) NOT NULL,
  PRIMARY KEY (`idInstrument`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `instrument`
--

INSERT INTO `instrument` (`idInstrument`, `libInstrument`) VALUES
(1, 'Tuba'),
(2, 'Piano'),
(3, 'Guitare'),
(4, 'Violon');

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `idProf` int(11) NOT NULL AUTO_INCREMENT,
  `nomProf` varchar(20) NOT NULL,
  `prenomProf` varchar(20) NOT NULL,
  `telProf` varchar(20) NOT NULL,
  PRIMARY KEY (`idProf`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`idProf`, `nomProf`, `prenomProf`, `telProf`) VALUES
(1, 'HAMIDOU', 'Salim', '0607080910'),
(2, 'HECKER', 'Amal', '1009080706');

-- --------------------------------------------------------

--
-- Structure de la table `seance`
--

DROP TABLE IF EXISTS `seance`;
CREATE TABLE IF NOT EXISTS `seance` (
  `idSeance` int(11) NOT NULL AUTO_INCREMENT,
  `dateSeance` varchar(30) NOT NULL,
  `idInstrument` int(11) NOT NULL,
  `idProf` int(11) NOT NULL,
  PRIMARY KEY (`idSeance`),
  KEY `idMatiere` (`idInstrument`),
  KEY `idProf` (`idProf`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `seance`
--

INSERT INTO `seance` (`idSeance`, `dateSeance`, `idInstrument`, `idProf`) VALUES
(1, 'Lundi 17h', 1, 1),
(2, 'Mardi 16h', 2, 2),
(3, 'Mercredi 18h', 3, 1),
(4, 'Samedi 10h', 4, 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `nom`, `prenom`, `email`, `mdp`, `role`) VALUES
(1, 'BEN AMAR', 'Abdelkarim', 'abenamar@gmx.com', 'Admin123@', 'Employer'),
(2, 'AZARKAN', 'Salma', 'azarkan@gmail.com', 'Admin123@', 'Secretariat');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `fk_constraint1` FOREIGN KEY (`idSeance`) REFERENCES `seance` (`idSeance`),
  ADD CONSTRAINT `fk_constraint2` FOREIGN KEY (`idAdherent`) REFERENCES `adherent` (`idAdherent`);

--
-- Contraintes pour la table `seance`
--
ALTER TABLE `seance`
  ADD CONSTRAINT `fk_constraint_3` FOREIGN KEY (`idInstrument`) REFERENCES `instrument` (`idInstrument`),
  ADD CONSTRAINT `fk_constraint_4` FOREIGN KEY (`idProf`) REFERENCES `professeur` (`idProf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
