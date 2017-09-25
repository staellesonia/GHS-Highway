-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ghsoute
-- ------------------------------------------------------
-- Server version	5.5.16-log

DROP DATABASE IF EXISTS GHSOUTE;

CREATE DATABASE GHSOUTE
     DEFAULT CHARACTER SET latin1;
	  
USE GHSOUTE;
SHOW DATABASES;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `abonnement`
--

DROP TABLE IF EXISTS `abonnement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `abonnement` (
  `ID_ABONNEMENT` decimal(8,0) NOT NULL,
  `NUMERO_DE_BADGE` decimal(8,0) DEFAULT NULL,
  `NOM_ABONNE` longtext,
  `PRENOM_ABONNE` longtext,
  `EMAIL` longtext,
  `TELEPHONE` decimal(50,0) DEFAULT NULL,
  `RIB` longtext,
  `PASSWORD` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID_ABONNEMENT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abonnement`
--

LOCK TABLES `abonnement` WRITE;
/*!40000 ALTER TABLE `abonnement` DISABLE KEYS */;
/*!40000 ALTER TABLE `abonnement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `echangeur`
--

DROP TABLE IF EXISTS `echangeur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `echangeur` (
  `ID_ECHANGEUR` decimal(8,0) NOT NULL,
  `NOM_ECHANGEUR` longtext,
  `LOCALISATION` longtext,
  PRIMARY KEY (`ID_ECHANGEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `echangeur`
--

LOCK TABLES `echangeur` WRITE;
/*!40000 ALTER TABLE `echangeur` DISABLE KEYS */;
/*!40000 ALTER TABLE `echangeur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entree_autoroute___troncon`
--

DROP TABLE IF EXISTS `entree_autoroute___troncon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entree_autoroute___troncon` (
  `ID_ECHANGEUR` decimal(8,0) NOT NULL,
  `ID_TRONCON` decimal(8,0) NOT NULL,
  PRIMARY KEY (`ID_ECHANGEUR`,`ID_TRONCON`),
  KEY `FK_ENTREE_A_ENTREE_AU_TRONCON` (`ID_TRONCON`),
  CONSTRAINT `FK_ENTREE_A_ENTREE_AU_TRONCON` FOREIGN KEY (`ID_TRONCON`) REFERENCES `troncon` (`ID_TRONCON`),
  CONSTRAINT `FK_ENTREE_A_ENTREE_AU_ECHANGEU` FOREIGN KEY (`ID_ECHANGEUR`) REFERENCES `echangeur` (`ID_ECHANGEUR`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entree_autoroute___troncon`
--

LOCK TABLES `entree_autoroute___troncon` WRITE;
/*!40000 ALTER TABLE `entree_autoroute___troncon` DISABLE KEYS */;
/*!40000 ALTER TABLE `entree_autoroute___troncon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facture`
--

DROP TABLE IF EXISTS `facture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facture` (
  `ID_ABONNEMENT` decimal(8,0) NOT NULL,
  `ID_FACTURE` decimal(8,0) NOT NULL,
  `DATE_FACTURE` date DEFAULT NULL,
  `PRIX_FACTURE` decimal(8,0) DEFAULT NULL,
  `MONTANT_FACTURE` decimal(8,0) DEFAULT NULL,
  PRIMARY KEY (`ID_ABONNEMENT`,`ID_FACTURE`),
  CONSTRAINT `FK_FACTURE_FACTURE___ABONNEME` FOREIGN KEY (`ID_ABONNEMENT`) REFERENCES `abonnement` (`ID_ABONNEMENT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facture`
--

LOCK TABLES `facture` WRITE;
/*!40000 ALTER TABLE `facture` DISABLE KEYS */;
/*!40000 ALTER TABLE `facture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facture___passage`
--

DROP TABLE IF EXISTS `facture___passage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facture___passage` (
  `ID_PASSAGE` decimal(8,0) NOT NULL,
  `ID_ABONNEMENT` decimal(8,0) NOT NULL,
  `ID_FACTURE` decimal(8,0) NOT NULL,
  PRIMARY KEY (`ID_PASSAGE`,`ID_ABONNEMENT`,`ID_FACTURE`),
  KEY `FK_FACTURE__FACTURE___FACTURE` (`ID_ABONNEMENT`,`ID_FACTURE`),
  CONSTRAINT `FK_FACTURE__FACTURE___FACTURE` FOREIGN KEY (`ID_ABONNEMENT`, `ID_FACTURE`) REFERENCES `facture` (`ID_ABONNEMENT`, `ID_FACTURE`),
  CONSTRAINT `FK_FACTURE__FACTURE___PASSAGE` FOREIGN KEY (`ID_PASSAGE`) REFERENCES `passage` (`ID_PASSAGE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facture___passage`
--

LOCK TABLES `facture___passage` WRITE;
/*!40000 ALTER TABLE `facture___passage` DISABLE KEYS */;
/*!40000 ALTER TABLE `facture___passage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `passage`
--

DROP TABLE IF EXISTS `passage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `passage` (
  `ID_PASSAGE` decimal(8,0) NOT NULL,
  `ID_TRAJET` decimal(8,0) NOT NULL,
  `NUMERO_GUICHET` decimal(8,0) DEFAULT NULL,
  PRIMARY KEY (`ID_PASSAGE`),
  KEY `FK_PASSAGE_PASSAGE___TRAJET` (`ID_TRAJET`),
  CONSTRAINT `FK_PASSAGE_PASSAGE___TRAJET` FOREIGN KEY (`ID_TRAJET`) REFERENCES `trajet` (`ID_TRAJET`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `passage`
--

LOCK TABLES `passage` WRITE;
/*!40000 ALTER TABLE `passage` DISABLE KEYS */;
/*!40000 ALTER TABLE `passage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarif`
--

DROP TABLE IF EXISTS `tarif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarif` (
  `ID_TRONCON` decimal(8,0) NOT NULL,
  `ID_TYPE_DE_VEHICULE` decimal(8,0) NOT NULL,
  `ID_TARIF` decimal(8,0) DEFAULT NULL,
  `TARIF` decimal(8,0) DEFAULT NULL,
  PRIMARY KEY (`ID_TRONCON`,`ID_TYPE_DE_VEHICULE`),
  KEY `FK_TARIF_TARIF_TYPE_DE_` (`ID_TYPE_DE_VEHICULE`),
  CONSTRAINT `FK_TARIF_TARIF2_TRONCON` FOREIGN KEY (`ID_TRONCON`) REFERENCES `troncon` (`ID_TRONCON`),
  CONSTRAINT `FK_TARIF_TARIF_TYPE_DE_` FOREIGN KEY (`ID_TYPE_DE_VEHICULE`) REFERENCES `type_de_vehicule` (`ID_TYPE_DE_VEHICULE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarif`
--

LOCK TABLES `tarif` WRITE;
/*!40000 ALTER TABLE `tarif` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trajet`
--

DROP TABLE IF EXISTS `trajet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trajet` (
  `ID_TRAJET` decimal(8,0) NOT NULL,
  `MONTANT_TRAJET` decimal(8,0) DEFAULT NULL,
  `DATE_TRAJET` date DEFAULT NULL,
  PRIMARY KEY (`ID_TRAJET`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trajet`
--

LOCK TABLES `trajet` WRITE;
/*!40000 ALTER TABLE `trajet` DISABLE KEYS */;
/*!40000 ALTER TABLE `trajet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `troncon`
--

DROP TABLE IF EXISTS `troncon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `troncon` (
  `ID_TRONCON` decimal(8,0) NOT NULL,
  `DISTANCE` decimal(8,0) DEFAULT NULL,
  PRIMARY KEY (`ID_TRONCON`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `troncon`
--

LOCK TABLES `troncon` WRITE;
/*!40000 ALTER TABLE `troncon` DISABLE KEYS */;
/*!40000 ALTER TABLE `troncon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `troncon___trajet`
--

DROP TABLE IF EXISTS `troncon___trajet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `troncon___trajet` (
  `ID_TRONCON` decimal(8,0) NOT NULL,
  `ID_TRAJET` decimal(8,0) NOT NULL,
  PRIMARY KEY (`ID_TRONCON`,`ID_TRAJET`),
  KEY `FK_TRONCON__TRONCON___TRAJET` (`ID_TRAJET`),
  CONSTRAINT `FK_TRONCON__TRONCON___TRAJET` FOREIGN KEY (`ID_TRAJET`) REFERENCES `trajet` (`ID_TRAJET`),
  CONSTRAINT `FK_TRONCON__TRONCON___TRONCON` FOREIGN KEY (`ID_TRONCON`) REFERENCES `troncon` (`ID_TRONCON`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `troncon___trajet`
--

LOCK TABLES `troncon___trajet` WRITE;
/*!40000 ALTER TABLE `troncon___trajet` DISABLE KEYS */;
/*!40000 ALTER TABLE `troncon___trajet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_de_paiement`
--

DROP TABLE IF EXISTS `type_de_paiement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_de_paiement` (
  `ID_TYPE_DE_PAIEMENT` decimal(8,0) NOT NULL,
  `ID_PASSAGE` decimal(8,0) NOT NULL,
  `NOM_TYPE_DE_PAIEMENT` longtext,
  PRIMARY KEY (`ID_TYPE_DE_PAIEMENT`),
  KEY `FK_TYPE_DE__PASAGE____PASSAGE` (`ID_PASSAGE`),
  CONSTRAINT `FK_TYPE_DE__PASAGE____PASSAGE` FOREIGN KEY (`ID_PASSAGE`) REFERENCES `passage` (`ID_PASSAGE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_de_paiement`
--

LOCK TABLES `type_de_paiement` WRITE;
/*!40000 ALTER TABLE `type_de_paiement` DISABLE KEYS */;
/*!40000 ALTER TABLE `type_de_paiement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_de_vehicule`
--

DROP TABLE IF EXISTS `type_de_vehicule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_de_vehicule` (
  `ID_TYPE_DE_VEHICULE` decimal(8,0) NOT NULL,
  `TYPE_DE_VEHICULE` longtext,
  PRIMARY KEY (`ID_TYPE_DE_VEHICULE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_de_vehicule`
--

LOCK TABLES `type_de_vehicule` WRITE;
/*!40000 ALTER TABLE `type_de_vehicule` DISABLE KEYS */;
/*!40000 ALTER TABLE `type_de_vehicule` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-22 17:10:06
