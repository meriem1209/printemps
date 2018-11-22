drop database if exists ppe_event; 
create database ppe_event; 
use ppe_event;

-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 26 oct. 2018 à 10:00
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ppe_event`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `iduser` int(11) NOT NULL,
  `droits` varchar(100) NOT NULL,
  `poste` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mdp` varchar(200) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idcategorie` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`idcategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `iduser` int(11) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adressepersonnelle` varchar(200) NOT NULL,
  `datenaissance` int(11) NOT NULL,
  `adressefacturation` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mdp` varchar(200) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

DROP TABLE IF EXISTS `devis`;
CREATE TABLE IF NOT EXISTS `devis` (
  `iddevis` int(11) NOT NULL AUTO_INCREMENT,
  `datedevis` date NOT NULL,
  `datevalidite` date NOT NULL,
  `montant` float NOT NULL,
  `accord` varchar(50) NOT NULL,
  PRIMARY KEY (`iddevis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `idevenement` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) NOT NULL,
  `dateevenement` date NOT NULL,
  `heuredebut` time NOT NULL,
  `heurefin` time NOT NULL,
  `nbinvites` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idcategorie` int(11) NOT NULL,
  PRIMARY KEY (`idevenement`),
  KEY `Evenement_Client_FK` (`iduser`),
  KEY `Evenement_Categorie0_FK` (`idcategorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `idfacture` int(11) NOT NULL AUTO_INCREMENT,
  `datefacture` date NOT NULL,
  `totalapayer` float NOT NULL,
  `totaltva` float NOT NULL,
  `modepaiement` varchar(50) NOT NULL,
  `iddevis` int(11) NOT NULL,
  PRIMARY KEY (`idfacture`),
  UNIQUE KEY `Facture_Devis_AK` (`iddevis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `necessiter`
--

DROP TABLE IF EXISTS `necessiter`;
CREATE TABLE IF NOT EXISTS `necessiter` (
  `idprestation` int(11) NOT NULL,
  `idevenement` int(11) NOT NULL,
  `iddevis` int(11) NOT NULL,
  PRIMARY KEY (`idprestation`,`idevenement`,`iddevis`),
  KEY `necessiter_Evenement0_FK` (`idevenement`),
  KEY `necessiter_Devis1_FK` (`iddevis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `prestataire`
--

DROP TABLE IF EXISTS `prestataire`;
CREATE TABLE IF NOT EXISTS `prestataire` (
  `iduser` int(11) NOT NULL,
  `service` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `codepostal` varchar(10) NOT NULL,
  `telephone` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mdp` varchar(200) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `prestation`
--

DROP TABLE IF EXISTS `prestation`;
CREATE TABLE IF NOT EXISTS `prestation` (
  `idprestation` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(100) NOT NULL,
  `prixheure` float NOT NULL,
  `tauxtva` float NOT NULL,
  `forfait` float NOT NULL,
  `iduser` int(11) NOT NULL,
  PRIMARY KEY (`idprestation`),
  KEY `Prestation_Prestataire_FK` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mdp` varchar(200) NOT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `Admin_User_FK` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `Client_User_FK` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);

--
-- Contraintes pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `Evenement_Categorie0_FK` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `Evenement_Client_FK` FOREIGN KEY (`iduser`) REFERENCES `client` (`iduser`);

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `Facture_Devis_FK` FOREIGN KEY (`iddevis`) REFERENCES `devis` (`iddevis`);

--
-- Contraintes pour la table `necessiter`
--
ALTER TABLE `necessiter`
  ADD CONSTRAINT `necessiter_Devis1_FK` FOREIGN KEY (`iddevis`) REFERENCES `devis` (`iddevis`),
  ADD CONSTRAINT `necessiter_Evenement0_FK` FOREIGN KEY (`idevenement`) REFERENCES `evenement` (`idevenement`),
  ADD CONSTRAINT `necessiter_Prestation_FK` FOREIGN KEY (`idprestation`) REFERENCES `prestation` (`idprestation`);

--
-- Contraintes pour la table `prestataire`
--
ALTER TABLE `prestataire`
  ADD CONSTRAINT `Prestataire_User_FK` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`);

--
-- Contraintes pour la table `prestation`
--
ALTER TABLE `prestation`
  ADD CONSTRAINT `Prestation_Prestataire_FK` FOREIGN KEY (`iduser`) REFERENCES `prestataire` (`iduser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
