-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: watersprinkler
-- ------------------------------------------------------
-- Server version	8.0.28

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `sprinkler_logs`
--

DROP TABLE IF EXISTS `sprinkler_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sprinkler_logs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sprinkler_id` bigint unsigned NOT NULL,
  `log` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sprinkling_logs_FK` (`sprinkler_id`),
  CONSTRAINT `sprinkling_logs_FK` FOREIGN KEY (`sprinkler_id`) REFERENCES `sprinklers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sprinkler_logs`
--

LOCK TABLES `sprinkler_logs` WRITE;
/*!40000 ALTER TABLE `sprinkler_logs` DISABLE KEYS */;
INSERT INTO `sprinkler_logs` VALUES (1,1,'New sprinker with ID 1 added','2022-09-26 07:03:15'),(2,2,'New sprinker with ID 2 added','2022-09-26 08:35:25'),(3,3,'New sprinker with ID 3 added','2022-09-26 08:35:39'),(4,4,'New sprinker with ID 4 added','2022-09-26 08:35:52'),(5,5,'New sprinker with ID 5 added','2022-09-26 08:36:44'),(6,6,'New sprinker with ID 6 added','2022-09-26 08:36:55'),(7,4,'Sprinker ID 4 has been switched on','2022-09-26 10:16:17'),(8,5,'Sprinker ID 5 has been switched ','2022-09-26 10:46:18'),(9,5,'Sprinker ID 5 has been switched off','2022-09-26 10:47:35'),(10,6,'Sprinker ID 6 has been switched off','2022-09-26 10:47:46'),(11,3,'Sprinker ID 3 has been switched on','2022-09-26 10:47:52'),(12,6,'Sprinker ID 6 has been switched on','2022-09-26 11:03:49'),(13,6,'Sprinker ID 6 has been switched off','2022-09-26 11:03:51'),(14,6,'Sprinker ID 6 has been switched on','2022-09-26 11:03:52'),(15,6,'Sprinker ID 6 has been switched off','2022-09-26 11:03:53'),(16,5,'Sprinker ID 5 image has been updated','2022-09-26 11:04:35'),(17,5,'Sprinker ID 5 image has been updated','2022-09-26 11:05:00'),(18,6,'Sprinker information has been updated','2022-09-26 11:08:28'),(19,6,'Sprinker has been switched on','2022-09-26 11:12:14'),(20,5,'Sprinker has been switched on','2022-09-26 11:12:17'),(21,6,'Sprinker has been switched off','2022-09-26 11:12:19'),(22,5,'Sprinker has been switched off','2022-09-26 11:12:22'),(23,6,'Sprinker information has been updated','2022-09-26 11:12:41'),(24,6,'Sprinker has been switched on','2022-09-26 11:13:15'),(25,6,'Sprinker has been switched off','2022-09-26 11:13:18');
/*!40000 ALTER TABLE `sprinkler_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sprinklers`
--

DROP TABLE IF EXISTS `sprinklers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sprinklers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `remarks` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `is_sprinkling` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sprinklers`
--

LOCK TABLES `sprinklers` WRITE;
/*!40000 ALTER TABLE `sprinklers` DISABLE KEYS */;
INSERT INTO `sprinklers` VALUES (1,'Lobby','Sprinkle in Lobby area','6330de33c39ff_providence-doucet-FjwtL3YSZ9U-unsplash.jpg',0,'2022-09-26 07:03:15'),(2,'Lobby2','Sprinkle in Lobby area2','6330f3cddb75c_mockup-graphics-LtWTbiTtnUk-unsplash.jpg',0,'2022-09-26 08:35:25'),(3,'Lobby3','Sprinkle in Lobby area3','6330f3db81254_bence-balla-schottner-3B5xl5yOTY4-unsplash.jpg',1,'2022-09-26 08:35:39'),(4,'Lobby4','Sprinkle in Lobby area4','6330f3e8da596_simon-berger-gxo_OrHGHUY-unsplash.jpg',1,'2022-09-26 08:35:52'),(5,'Lobby5','Sprinkle in Lobby area5','633116dc93658_sofia-ornelas-172mGIcc3xc-unsplash.jpg',0,'2022-09-26 08:36:44'),(6,'Lobby6','Sprinkle in Lobby area6','63311690e370c_tavin-dotson-WC4IWN3-fSo-unsplash.jpg',0,'2022-09-26 08:36:55');
/*!40000 ALTER TABLE `sprinklers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'watersprinkler'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-26 11:27:21
