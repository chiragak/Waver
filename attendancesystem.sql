-- MariaDB dump 10.19  Distrib 10.5.15-MariaDB, for debian-linux-gnueabihf (armv8l)
--
-- Host: localhost    Database: attendancesystem
-- ------------------------------------------------------
-- Server version	10.5.15-MariaDB-0+deb11u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attendance` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `clock_in` timestamp NOT NULL DEFAULT current_timestamp(),
  `clock_out` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_time_daily` time NOT NULL DEFAULT curtime(),
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendance`
--

LOCK TABLES `attendance` WRITE;
/*!40000 ALTER TABLE `attendance` DISABLE KEYS */;
INSERT INTO `attendance` VALUES (1,48,'2022-10-11 12:31:23','2022-10-11 12:31:26','00:00:03','Rakshith'),(2,50,'2022-10-11 12:31:43','2022-10-11 12:31:46','00:00:03','shamanth'),(3,47,'2022-10-11 12:31:56','2022-10-11 12:32:02','00:00:06','Rashmitha'),(4,50,'2022-10-11 12:38:21','2022-10-19 11:14:39','190:36:18','shamanth'),(5,47,'2022-10-19 11:14:33','2022-10-19 11:14:51','00:00:18','Rashmitha'),(6,50,'2022-10-19 11:15:00','2022-10-19 11:15:07','00:00:07','shamanth'),(7,47,'2022-10-19 11:16:07','2022-10-19 11:16:10','00:00:03','Rashmitha'),(8,50,'2022-10-19 11:16:19','2022-10-19 11:16:23','00:00:04','shamanth'),(9,47,'2022-10-22 11:25:52','2022-10-22 11:26:13','00:00:21','Rashmitha'),(11,47,'2022-10-22 11:26:31','2022-10-22 11:26:31','00:00:00','Rashmitha'),(12,47,'2022-10-22 11:26:42','2022-10-22 11:26:42','00:00:00',NULL),(13,47,'2022-10-22 11:34:53','2022-10-22 11:34:53','00:00:00',NULL);
/*!40000 ALTER TABLE `attendance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `name` varchar(255) NOT NULL,
  `gmail` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES ('Rakshith','rakshith24kerpala@gmail.com','1234'),('shamanth','shamanthshetty51@gmail.com','345'),('bvc','rakshith24kerpala@gmail.com','12345'),('chirag','chiragajekar@gmail.com','123134');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `otp`
--

DROP TABLE IF EXISTS `otp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `otp` (
  `user_otp` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email` varchar(50) DEFAULT NULL,
  `user_email_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `otp`
--

LOCK TABLES `otp` WRITE;
/*!40000 ALTER TABLE `otp` DISABLE KEYS */;
INSERT INTO `otp` VALUES (228471,'2022-12-12 11:23:12','chiragajekar@gmail.com','verified'),(228471,'2022-12-12 11:23:12','chiragajekar@gmail.com','verified'),(228471,'2022-12-12 11:23:12','chiragajekar@gmail.com','verified'),(228471,'2022-12-12 11:23:12','chiragajekar@gmail.com','verified'),(228471,'2022-12-12 11:23:12','chiragajekar@gmail.com','verified'),(271490,'2022-12-10 09:46:11','rakshith24kerpala@gmail.com','verified'),(179309,'2022-10-15 11:04:42','shamanthshetty51@gmail.com','verified'),(179309,'2022-10-15 11:04:42','shamanthshetty51@gmail.com','verified'),(228471,'2022-12-12 11:23:12','chiragajekar@gmail.com','verified'),(228471,'2022-12-12 11:23:12','chiragajekar@gmail.com','verified'),(228471,'2022-12-12 11:23:12','chiragajekar@gmail.com','verified'),(228471,'2022-12-12 11:23:12','chiragajekar@gmail.com','verified'),(228471,'2022-12-12 11:23:12','chiragajekar@gmail.com','verified'),(228471,'2022-12-12 11:23:12','chiragajekar@gmail.com','verified'),(228471,'2022-12-12 11:23:12','chiragajekar@gmail.com','verified'),(228471,'2022-12-12 11:23:12','chiragajekar@gmail.com','verified'),(228471,'2022-12-12 11:23:12','chiragajekar@gmail.com','verified'),(228471,'2022-12-12 11:23:12','chiragajekar@gmail.com','verified'),(228471,'2022-12-12 11:23:12','chiragajekar@gmail.com','verified'),(228471,'2022-12-12 11:23:12','chiragajekar@gmail.com','verified'),(228471,'2022-12-12 11:23:12','chiragajekar@gmail.com','verified'),(228471,'2022-12-12 11:23:12','chiragajekar@gmail.com','verified'),(228471,'2022-12-12 11:23:12','chiragajekar@gmail.com','verified'),(228471,'2022-12-12 11:23:12','chiragajekar@gmail.com','verified'),(228471,'2022-12-12 11:23:12','chiragajekar@gmail.com','verified'),(228471,'2022-12-12 11:23:12','chiragajekar@gmail.com','verified'),(228471,'2022-12-12 11:23:12','chiragajekar@gmail.com','verified'),(271490,'2022-12-10 09:46:44','rakshith24kerpala@gmail.com','verified'),(271490,'2022-12-10 09:46:44','rakshith24kerpala@gmail.com','verified'),(228471,'2022-12-12 11:23:59','chiragajekar@gmail.com','verified');
/*!40000 ALTER TABLE `otp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rfid_uid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_email` varchar(50) NOT NULL,
  `access` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (59,'324235235','rakshith','2022-10-15 12:18:57','rakshith24kerpala@gmail.com','admin'),(61,'57546','dsgfdsg','2022-12-07 12:25:10','asdwqas@fewwregf','user'),(62,'3426365273','chirag','2022-12-12 11:28:29','chiragajekar@gmail.com','user');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-01 14:28:03
