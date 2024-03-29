-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: photoforyou2
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
  `urlPhoto` varchar(45) NOT NULL,
  `categorie` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `estSupprimee` tinyint(4) DEFAULT NULL,
  `proprietaire` varchar(45) DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`idPhoto`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` VALUES (85,'Intérieur de caserne ',612,408,57329,'185','../images/vendre_stock/185_6601c2fed4','Bâtiment,Les nouveautes','Un image représentant l\'intérieur d\'une caser',0,NULL,'2024-03-13 18:00:38',50),(86,'Camion avec pompier',612,411,74305,'185','../images/vendre_stock/185_6601c34fc8','Bâtiment,Les nouveautes','On peut apercevoir un camion avec des pompier',1,NULL,'2024-03-13 18:02:11',25),(87,'Université Paul Sabatier',1632,1224,299553,'185','../images/vendre_stock/185_65f1dc5301','Bâtiment','Photo du bâtiment principale de l\'université ',0,NULL,'2024-03-13 18:03:15',17),(88,'Caserne ',600,392,39048,'186','../images/vendre_stock/186_65fdd1cd14','Bâtiment','Une caserne de pompier',0,NULL,'2024-03-22 19:45:33',50);
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `photoforyou2`.`photos_BEFORE_INSERT` BEFORE INSERT ON `photos` FOR EACH ROW
BEGIN
	SET NEW.date_creation = NOW();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-25 19:34:42
