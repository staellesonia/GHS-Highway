-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Sam 23 Septembre 2017 à 22:14
-- Version du serveur: 5.5.16
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `ghs-highway`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnement`
--

CREATE TABLE IF NOT EXISTS `abonnement` (
  `ID_ABONNEMENT` int(11) NOT NULL AUTO_INCREMENT,
  `NUMERO_DE_BADGE` int(11) NOT NULL,
  `NOM_ABONNE` varchar(20) NOT NULL,
  `PRENOM_ABONNE` varchar(20) NOT NULL,
  `EMAIL` varchar(40) NOT NULL,
  `TELEPHONE` decimal(50,0) NOT NULL,
  `RIB` varchar(50) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_ABONNEMENT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `echangeur`
--

CREATE TABLE IF NOT EXISTS `echangeur` (
  `ID_ECHANGEUR` int(11) NOT NULL AUTO_INCREMENT,
  `NOM_ECHANGEUR` varchar(20) DEFAULT NULL,
  `LOCALISATION` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_ECHANGEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `entree_autoroute___troncon`
--

CREATE TABLE IF NOT EXISTS `entree_autoroute___troncon` (
  `ID_ECHANGEUR` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TRONCON` int(11) NOT NULL,
  PRIMARY KEY (`ID_ECHANGEUR`),
  KEY `FK_ENTREE_A_ENTREE_AU_TRONCON` (`ID_TRONCON`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE IF NOT EXISTS `facture` (
  `ID_ABONNEMENT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_FACTURE` int(11) NOT NULL,
  `DATE_FACTURE` datetime NOT NULL,
  `PRIX_FACTURE` decimal(8,0) DEFAULT NULL,
  `MONTANT_FACTURE` decimal(8,0) DEFAULT NULL,
  PRIMARY KEY (`ID_ABONNEMENT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `passage`
--

CREATE TABLE IF NOT EXISTS `passage` (
  `ID_PASSAGE` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TRAJET` int(11) NOT NULL,
  `NUMERO_GUICHET` int(11) NOT NULL,
  PRIMARY KEY (`ID_PASSAGE`),
  KEY `FK_PASSAGE_PASSAGE___TRAJET` (`ID_TRAJET`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

CREATE TABLE IF NOT EXISTS `trajet` (
  `ID_TRAJET` int(11) NOT NULL AUTO_INCREMENT,
  `MONTANT_TRAJET` int(11) NOT NULL,
  `DATE_TRAJET` date NOT NULL,
  PRIMARY KEY (`ID_TRAJET`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `troncon`
--

CREATE TABLE IF NOT EXISTS `troncon` (
  `ID_TRONCON` int(11) NOT NULL AUTO_INCREMENT,
  `DISTANCE` int(11) NOT NULL,
  PRIMARY KEY (`ID_TRONCON`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `entree_autoroute___troncon`
--
ALTER TABLE `entree_autoroute___troncon`
  ADD CONSTRAINT `FK_ENTREE_A_ENTREE_AU_TRONCON` FOREIGN KEY (`ID_TRONCON`) REFERENCES `troncon` (`ID_TRONCON`),
  ADD CONSTRAINT `FK_ENTREE_A_ENTREE_AU_ECHANGEU` FOREIGN KEY (`ID_ECHANGEUR`) REFERENCES `echangeur` (`ID_ECHANGEUR`);

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `FK_FACTURE_FACTURE___ABONNEME` FOREIGN KEY (`ID_ABONNEMENT`) REFERENCES `abonnement` (`ID_ABONNEMENT`);

--
-- Contraintes pour la table `passage`
--
ALTER TABLE `passage`
  ADD CONSTRAINT `FK_PASSAGE_PASSAGE___TRAJET` FOREIGN KEY (`ID_TRAJET`) REFERENCES `trajet` (`ID_TRAJET`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
