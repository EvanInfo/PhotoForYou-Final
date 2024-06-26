-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: photoforyou2
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `photos` (
  `idPhoto` int(11) NOT NULL AUTO_INCREMENT,
  `nomPhoto` varchar(50) NOT NULL,
  `taillePixelX` int(11) NOT NULL,
  `taillePixelY` int(11) NOT NULL,
  `poids` int(11) NOT NULL,
  `idUser` varchar(45) NOT NULL,
  `urlPhoto` varchar(50) NOT NULL,
  `categorie` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `estSupprimee` tinyint(4) DEFAULT NULL,
  `proprietaire` varchar(45) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`idPhoto`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` VALUES (85,'Intérieur de caserne ',612,408,57329,'185','../images/vendre_stock/185_6601c2fed4','Bâtiment','Un image représentant l\'intérieur d\'une caser',0,NULL,'2024-03-13 18:00:38',50),(86,'Google Icone',512,512,21503,'185','../images/vendre_stock/185_660ac28a7b','Portrait ','Image de l\'icone google ',0,NULL,'2024-03-13 18:02:11',25),(87,'Université Paul Sabatier',1632,1224,299553,'185','../images/vendre_stock/185_65f1dc5301','Bâtiment','Photo du bâtiment principale de l\'université ',0,NULL,'2024-03-13 18:03:15',17),(88,'Caserne ',600,392,39048,'186','../images/vendre_stock/186_65fdd1cd14','Bâtiment','Une caserne de pompier',0,NULL,'2024-03-22 19:45:33',50),(89,'Filezila',1200,1200,55536,'185','../images/vendre_stock/185_660ac34680','Portrait ','Icone',0,NULL,'2024-04-01 16:23:02',10),(90,'Paysage',1500,1000,174828,'186','../images/vendre_stock/186_6630fe12b7','Portrait ','Une homme observant une montagne',0,NULL,'2024-04-30 16:20:02',50),(91,'Sukuna',293,172,9592,'187','../images/vendre_stock/187_6631007c72.jpg','Portrait ','Sukuna effectuant son extension de territoire',0,NULL,'2024-04-30 16:30:20',666),(92,'Ville en rouge',1800,1800,132893,'187','../images/vendre_stock/187_66333fa38c.jpg','Paysage,Les nouveautes','Ville en rouge',0,NULL,NULL,20);
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-02  9:40:02
