-- MySQL dump 10.13  Distrib 8.0.24, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: forsakringarna_se
-- ------------------------------------------------------
-- Server version	8.0.24

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
-- Table structure for table `insurances_accidents`
--

DROP TABLE IF EXISTS `insurances_accidents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurances_accidents` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) DEFAULT NULL,
  `locale` varchar(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tracking_link` text,
  `name` varchar(100) DEFAULT NULL,
  `rating` float DEFAULT '3',
  `rating_amount` float DEFAULT NULL,
  `rating_price` float DEFAULT NULL,
  `rating_extent` float DEFAULT NULL,
  `rating_terms` float DEFAULT NULL,
  `rating_feeling` float DEFAULT NULL,
  `benefits` longtext,
  `drawbacks` longtext,
  `introduction` longtext,
  `email` varchar(60) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  `org_number` varchar(20) DEFAULT NULL,
  `open_monday` varchar(50) DEFAULT NULL,
  `open_tuesday` varchar(50) DEFAULT NULL,
  `open_wednesday` varchar(50) DEFAULT NULL,
  `open_thursday` varchar(50) DEFAULT NULL,
  `open_friday` varchar(50) DEFAULT NULL,
  `open_saturday` varchar(50) DEFAULT NULL,
  `open_sunday` varchar(50) DEFAULT NULL,
  `price_1p` int DEFAULT NULL,
  `price_2p` int DEFAULT NULL,
  `price_3p` int DEFAULT NULL,
  `price_4p` int DEFAULT NULL,
  `hospital_stay_compensation` int DEFAULT NULL,
  `hospital_stay_compensation_addition` int DEFAULT NULL,
  `invalidity_compensation` int DEFAULT NULL,
  `economic_invalidity_compensation` int DEFAULT NULL,
  `teeth_damage_compensation` int DEFAULT NULL,
  `death_compensation` int DEFAULT NULL,
  `without_deductible` tinyint(1) DEFAULT '0',
  `valid_abroad_months` int DEFAULT NULL,
  `pain_and_suffering` tinyint(1) DEFAULT '0',
  `scars` tinyint(1) DEFAULT '0',
  `compensation_max_amount` int DEFAULT NULL,
  `trustpilot_rating` float DEFAULT NULL,
  `trustpilot_rating_count` int DEFAULT NULL,
  `front_page_url` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurances_accidents`
--

LOCK TABLES `insurances_accidents` WRITE;
/*!40000 ALTER TABLE `insurances_accidents` DISABLE KEYS */;
INSERT INTO `insurances_accidents` VALUES (18,'ica-forsakring','se','2019-02-19 13:34:23','2019-11-14 10:30:09','https://track.adtraction.com/t/t?a=1145683379&as=1250442318&t=2&tk=1&url=https://www.icaforsakring.se/person/olycksfallsforsakring/','ICA Försäkring',5,NULL,NULL,5,5,5,'Ingen självrisk;Skydd utomlands 12 månader;Bra pris','Du måste vara yngre än 65 år','<p>ICA Banken har en mängd olika försäkringar utformade för att passa gemene man. Deras olycksfallsförsäkring är både omfattande och prisvärd. Du kan dessutom spara både tid och pengar genom att medförsäkra flera familjemedlemmar samtidigt.</p>','forsakring@ica.se','033474790','Framtidsvägen 12a','352 22','Växjö','556966-2975','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00',NULL,NULL,99,184,219,229,200,500,1000000,1,50000,50000,1,12,1,1,1000000,3.6,492,'https://www.icaforsakring.se/'),(19,'moderna-forsakringar','se','2019-02-19 14:08:12','2019-11-20 20:00:07',NULL,'Moderna Försäkringar',2.83333,NULL,NULL,2,4,2.5,NULL,NULL,NULL,'info@modernadjurforsakringar.se','0200438590','Sveavägen 167','104 51','Stockholm','516403-8662','08:00 - 20:00','08:00 - 20:00','08:00 - 20:00','08:00 - 20:00','08:00 - 17:00','0','09:00 - 15:00',NULL,NULL,NULL,NULL,150,0,1,0,NULL,50000,1,NULL,0,1,1500000,2.6,5,'https://www.modernaforsakringar.se/'),(20,'folksam','se','2019-02-19 14:10:02','2019-11-20 20:00:07',NULL,'Folksam',3.66667,NULL,NULL,4.5,4,2.5,NULL,NULL,NULL,'kundservice@folksam.se','0771950950','Bohusgatan 14','106 60','Stockholm',NULL,'07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','09:00 - 19:00','09:00 - 19:00',NULL,NULL,NULL,NULL,200,700,1,1,NULL,40000,1,NULL,1,1,2000000,1.6,150,'https://www.folksam.se/'),(22,'if','se','2019-02-19 14:15:02','2019-11-20 20:00:07',NULL,'IF',3.33333,NULL,NULL,3,4,3,NULL,NULL,NULL,NULL,'0771655655','Flöjelbergsgatan 4','106 80','Stockholm',NULL,'07:30 - 21:00','07:30 - 21:00','07:30 - 21:00','07:30 - 21:00','07:30 - 21:00','09:00 - 18:00','10:00 - 18:00',NULL,NULL,NULL,NULL,100,0,800000,1,NULL,50000,1,NULL,0,1,2000000,1.7,108,'https://www.if.se/privat'),(23,'aig','se','2019-02-24 13:20:02','2019-10-21 14:55:06','https://online.adservicemedia.dk/cgi-bin/click.pl?cid=7664&pid=7983&deeplink=https%3A//www.aigdirekt.se/vara-forsakringar/olycksfallsforsakringar/olycksfallsforsakring-vuxen/','AIG',3,NULL,NULL,2,4,3,NULL,NULL,NULL,'kundservice@aig.com','0850692000','Västra Järnvägsgatan 7','103 69','Stockholm',NULL,'08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00',NULL,NULL,63,120,NULL,NULL,200,3000,500000,0,0,150000,1,NULL,0,0,NULL,NULL,NULL,NULL),(24,'gjensidige','se','2019-02-24 13:20:02','2019-11-12 22:30:10',NULL,'Gjensidige',3,NULL,NULL,5,1,3,NULL,NULL,NULL,'info@gjensidige.se','0771326326','Karlavägen 108','103 61','Stockholm','516407-0384','08:30 - 17:00','08:30 - 17:00','08:30 - 17:00','08:30 - 17:00','08:30 - 17:00',NULL,NULL,NULL,NULL,NULL,NULL,200,500,1,1,1,50000,0,NULL,1,1,2000000,2.3,37,'https://www.gjensidige.se/'),(25,'handelsbanken','se','2019-02-24 13:25:02','2019-11-20 20:00:08',NULL,'Handelsbanken',2.33333,NULL,NULL,3,1,3,NULL,NULL,NULL,NULL,NULL,'Kungsträdgårdsgatan 2','106 70','Stockholm',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,0,930000,1,NULL,23250,0,NULL,0,0,910000,3,16,'https://www.handelsbanken.se/sv/'),(26,'lansforsakringar','se','2019-02-24 13:25:02','2019-11-20 20:00:08',NULL,'Länsförsäkringar',3.83333,NULL,NULL,4.5,4,3,NULL,NULL,NULL,'info@sth.lansforsakringar.se','0856283000',NULL,NULL,NULL,NULL,'07:30 - 22:00','07:30 - 22:00','07:30 - 22:00','07:30 - 22:00','07:30 - 22:00','10:00 - 15:00','10:00 - 15:00',NULL,NULL,NULL,NULL,200,500,1,1,NULL,46500,1,NULL,1,1,2275000,1.7,130,'https://www.lansforsakringar.se/stockholm/privat/'),(27,'tre-kronor','se','2019-02-24 13:25:02','2019-11-20 20:00:08',NULL,'Tre Kronor',2.33333,NULL,NULL,3,1,3,NULL,NULL,NULL,NULL,'0771233333',NULL,'106 60','Stockholm',NULL,'08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00',NULL,NULL,NULL,NULL,NULL,NULL,200,0,1,1,NULL,40000,0,NULL,0,1,2000000,NULL,NULL,NULL),(28,'trygg-hansa','se','2019-02-24 13:25:02','2019-11-18 22:30:10',NULL,'Trygg-Hansa',3,NULL,NULL,2,4,3,NULL,NULL,NULL,NULL,'0771111110',NULL,NULL,NULL,NULL,'07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','09:00 - 17:00','09:00 - 17:00',NULL,NULL,NULL,NULL,150,500,1,0,NULL,50000,1,NULL,0,1,1000000,1.2,142,'https://www.trygghansa.se/'),(29,'movestic','se','2019-02-24 13:30:02','2019-11-20 20:00:08',NULL,'Movestic',2.33333,NULL,NULL,3,1,3,NULL,NULL,NULL,'kund@movestic.se','0812039320',NULL,NULL,NULL,NULL,'08:30 - 17:00','08:30 - 17:00','08:30 - 17:00','08:30 - 17:00','08:30 - 17:00',NULL,NULL,NULL,NULL,NULL,NULL,0,0,1000000,1,NULL,23250,0,NULL,0,1,2000000,NULL,NULL,NULL),(30,'watercircles','se','2019-02-24 13:30:02','2019-10-15 15:40:09',NULL,'WaterCircles',3,NULL,NULL,2,4,3,NULL,NULL,NULL,'info@watercircles.se','0104900999','Torshamnsgatan 35',NULL,NULL,'556807-9056','08:15 - 16:45','08:15 - 16:45','08:15 - 16:45','08:15 - 16:45','08:15 - 16:45',NULL,NULL,NULL,NULL,NULL,NULL,100,500,250000,0,NULL,50000,1,NULL,0,1,1000000,NULL,NULL,'https://www.watercircles.se/');
/*!40000 ALTER TABLE `insurances_accidents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurances_boats`
--

DROP TABLE IF EXISTS `insurances_boats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurances_boats` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) DEFAULT NULL,
  `locale` varchar(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tracking_link` text,
  `name` varchar(100) DEFAULT NULL,
  `rating` float DEFAULT '3',
  `benefits` longtext,
  `drawbacks` longtext,
  `email` varchar(60) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  `org_number` varchar(20) DEFAULT NULL,
  `open_monday` varchar(50) DEFAULT NULL,
  `open_tuesday` varchar(50) DEFAULT NULL,
  `open_wednesday` varchar(50) DEFAULT NULL,
  `open_thursday` varchar(50) DEFAULT NULL,
  `open_friday` varchar(50) DEFAULT NULL,
  `open_saturday` varchar(50) DEFAULT NULL,
  `open_sunday` varchar(50) DEFAULT NULL,
  `trustpilot_rating` float DEFAULT NULL,
  `trustpilot_rating_count` int DEFAULT NULL,
  `front_page_url` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurances_boats`
--

LOCK TABLES `insurances_boats` WRITE;
/*!40000 ALTER TABLE `insurances_boats` DISABLE KEYS */;
INSERT INTO `insurances_boats` VALUES (29,'moderna-forsakringar','se','2019-03-01 13:40:04','2019-11-19 16:00:20','https://track.adtraction.com/t/t?a=54202769&as=1250442318&t=2&tk=1&url=https://www.modernaforsakringar.se/forsakringar/batforsakring/','Moderna Försäkringar',4.5,'Självriskreducering upp till 1 000 kr som bonuskund',NULL,'info@modernadjurforsakringar.se','0200437097','Sveavägen 167','106 56','Stockholm','516403-8662','08:00 - 20:00','08:00 - 20:00','08:00 - 20:00','08:00 - 20:00','08:00 - 17:00','0','09:00 - 15:00',2.6,5,'https://www.modernaforsakringar.se/'),(30,'svedea','se','2019-03-01 13:40:04','2019-10-13 18:45:16','https://track.adtraction.com/t/t?a=1127458242&as=1250442318&t=2&tk=1&url=https://www.svedea.se/batforsakring','Svedea',5,'Bästa båtförsäkringen enligt oss;Snabb och smidig handläggning av skadeärenden',NULL,'kundnavet@svedea.se','0771160190','Fleminggatan 18','103 69','Stockholm','556786-1678','07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','07:30 - 18:00',NULL,NULL,3.5,3,'https://www.svedea.se/'),(31,'folksam','se','2019-03-01 13:40:04','2019-11-20 12:00:16',NULL,'Folksam',3.5,NULL,NULL,'kundservice@folksam.se','0771950950','Bohusgatan 14','106 60','Stockholm',NULL,'07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','09:00 - 19:00','09:00 - 19:00',1.6,150,'https://www.folksam.se/'),(32,'if','se','2019-03-01 15:30:04','2019-11-15 22:30:27',NULL,'If',3.5,NULL,NULL,NULL,'0771655655','Flöjelbergsgatan 4','106 80','Stockholm',NULL,'07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','09:00 - 18:00','10:00 - 18:00',1.7,108,'https://www.if.se/privat'),(33,'atlantica','se','2019-03-01 15:30:05','2019-11-19 16:00:21',NULL,'Atlantica',3.5,NULL,NULL,NULL,'0200438867',NULL,'104 51','Stockholm','516403-8662',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(34,NULL,NULL,'2019-03-01 15:30:05','2019-03-01 15:30:05',NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(35,'dina-forsakringar','se','2019-03-01 15:35:04','2019-10-12 10:05:12',NULL,'Dina Försäkringar',3.5,NULL,NULL,'dina@dina.se',NULL,NULL,NULL,NULL,'516401-8029',NULL,NULL,NULL,NULL,NULL,NULL,NULL,2.2,11,'https://www.dina.se/'),(36,'lansforsakringar','se','2019-03-01 15:35:04','2019-11-15 22:30:27',NULL,'Länsförsäkringar',1.5,NULL,NULL,'info@sth.lansforsakringar.se','0856283000',NULL,NULL,NULL,NULL,'07:30 - 22:00','07:30 - 22:00','07:30 - 22:00','07:30 - 22:00','07:30 - 22:00','10:00 - 15:00','10:00 - 15:00',1.7,130,'https://www.lansforsakringar.se/stockholm/privat/'),(37,'pantaenius','se','2019-03-01 15:35:04','2019-03-14 20:10:06',NULL,'Pantaenius',3.5,NULL,NULL,'info@pantaenius.se','00303445000','Hamngatan 25','442 67','Marstrand',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'https://www.pantaenius.com/se-sv/'),(38,'trygg-hansa','se','2019-03-01 15:40:04','2019-11-18 22:30:19',NULL,'Trygg-Hansa',3.5,NULL,NULL,NULL,'0771111110',NULL,NULL,NULL,NULL,'08:00 - 19:00','08:00 - 19:00','08:00 - 19:00','08:00 - 19:00','08:00 - 19:00','09:00 - 17:00','09:00 - 17:00',1.2,142,'https://www.trygghansa.se/'),(39,'vardia','se','2019-03-01 15:40:04','2019-11-12 22:30:22',NULL,'Vardia',2.5,NULL,NULL,'kundservice@vardia.se','0771614614','Box 4430','203 15','Malmö',NULL,'08:30 - 17:00','08:30 - 17:00','08:30 - 17:00','08:30 - 17:00','08:30 - 17:00',NULL,NULL,1.4,71,'https://www.vardia.se/'),(40,'watercircles','se','2019-03-01 15:40:04','2019-10-13 18:45:17',NULL,'WaterCircles',2,NULL,NULL,'info@watercircles.se','0104900999','Torshamnsgatan 35',NULL,NULL,NULL,'08:15 - 16:45','08:15 - 16:45','08:15 - 16:45','08:15 - 16:45','08:15 - 16:45',NULL,NULL,NULL,NULL,'https://www.watercircles.se/');
/*!40000 ALTER TABLE `insurances_boats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurances_cars`
--

DROP TABLE IF EXISTS `insurances_cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurances_cars` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) DEFAULT NULL,
  `locale` varchar(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tracking_link` text,
  `name` varchar(100) DEFAULT NULL,
  `rating` float DEFAULT '3',
  `benefits` longtext,
  `drawbacks` longtext,
  `email` varchar(60) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  `org_number` varchar(20) DEFAULT NULL,
  `open_monday` varchar(50) DEFAULT NULL,
  `open_tuesday` varchar(50) DEFAULT NULL,
  `open_wednesday` varchar(50) DEFAULT NULL,
  `open_thursday` varchar(50) DEFAULT NULL,
  `open_friday` varchar(50) DEFAULT NULL,
  `open_saturday` varchar(50) DEFAULT NULL,
  `open_sunday` varchar(50) DEFAULT NULL,
  `deductible_traffic` int DEFAULT NULL,
  `deductible_traffic_culpable` int DEFAULT NULL,
  `deductible_traffic_crime` int DEFAULT NULL,
  `front_page_url` text,
  `deductible_fire` int DEFAULT NULL,
  `deductible_equipment` int DEFAULT NULL,
  `deductible_rescue` int DEFAULT NULL,
  `deductible_glass` int DEFAULT NULL,
  `deductible_theft` int DEFAULT NULL,
  `deductible_theft_unlocked` int DEFAULT NULL,
  `deductible_theft_unlocked_percent` int DEFAULT NULL,
  `equipment_insurance_expires_years` int DEFAULT NULL,
  `equipment_insurance_expires_distance` int DEFAULT NULL,
  `rental_car_max_days` int DEFAULT NULL,
  `trustpilot_rating` float DEFAULT NULL,
  `trustpilot_rating_count` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurances_cars`
--

LOCK TABLES `insurances_cars` WRITE;
/*!40000 ALTER TABLE `insurances_cars` DISABLE KEYS */;
INSERT INTO `insurances_cars` VALUES (18,'enerfy','se','2019-02-19 15:10:03','2019-11-15 03:30:12',NULL,'Enerfy',3,NULL,NULL,'info@enerfy.se','0855593200','Ab Karlavägen 60','114 49','Stockholm','556965-2885','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00',NULL,NULL,1200,NULL,NULL,'https://enerfy.se/',1200,1200,1200,1200,1200,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(19,'svedea','se','2019-02-19 15:10:03','2019-10-13 18:45:10','https://track.adtraction.com/t/t?a=1127458242&as=1250442318&t=2&tk=1&url=https://www.svedea.se/bilforsakring','Svedea',4,NULL,NULL,'kundnavet@svedea.se','0771160190','Fleminggatan 18','103 69','Stockholm','556786-1678','07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','07:30 - 18:00',NULL,NULL,NULL,NULL,NULL,'https://www.svedea.se/',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3.5,3),(20,'moderna-forsakringar','se','2019-02-19 15:10:03','2019-11-19 16:00:10','https://track.adtraction.com/t/t?a=54202769&as=1250442318&t=2&tk=1&url=https://www.modernaforsakringar.se/forsakringar/bilforsakring/','Moderna Försäkringar',4.5,NULL,NULL,'info@modernadjurforsakringar.se','0200438868','Sveavägen 167','106 56','Stockholm','516403-8662','08:00 - 20:00','08:00 - 20:00','08:00 - 20:00','08:00 - 20:00','08:00 - 17:00','0','09:00 - 15:00',1000,NULL,NULL,'https://www.modernaforsakringar.se/',1500,0,1500,0,1500,NULL,NULL,NULL,NULL,NULL,2.6,5),(21,'ica-forsakring','se','2019-02-19 15:10:03','2019-11-14 10:30:12','https://track.adtraction.com/t/t?a=1145683379&as=1250442318&t=2&tk=1&url=https://www.icaforsakring.se/bilforsakring/','ICA Försäkring',4.5,NULL,NULL,'forsakring@ica.se','033474790','Framtidsvägen 12','164 04','Solna','556966-2975','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00',NULL,NULL,0,NULL,NULL,'https://www.icaforsakring.se/',1500,1500,1500,1500,1500,NULL,NULL,NULL,NULL,NULL,3.6,492),(22,'folksam','se','2019-02-19 15:10:03','2019-11-20 12:00:08','https://track.adtraction.com/t/t?a=1231336978&as=1250442318&t=2&tk=1&url=https://www.folksam.se/forsakringar/bilforsakring?icmp=f_bilforsakring','Folksam',3.5,NULL,NULL,'kundservice@folksam.se','0771950950','Bohusgatan 14','106 60','Stockholm',NULL,'07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','09:00 - 19:00','09:00 - 19:00',NULL,NULL,NULL,'https://www.folksam.se/',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1.6,150),(23,'if','se','2019-02-19 15:10:03','2019-11-15 22:30:16',NULL,'IF',4,NULL,NULL,NULL,'0770117177','Flöjelbergsgatan 4','106 80','Stockholm',NULL,'07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','09:00 - 18:00','10:00 - 18:00',NULL,NULL,NULL,'https://www.if.se/privat',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1.7,108),(24,'trygg-hansa','se','2019-02-19 15:10:03','2019-11-18 22:30:11',NULL,'Trygg-Hansa',3.5,NULL,NULL,'forsakringsnamnden@trygghansa.se','0771111110',NULL,'101 23','Stockholm',NULL,'07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','09:00 - 17:00','09:00 - 17:00',NULL,NULL,NULL,'https://www.trygghansa.se/',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1.2,142),(25,NULL,NULL,'2019-02-19 17:00:02','2019-02-19 17:00:02',NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(26,'vardia','se','2019-02-21 13:40:02','2019-11-19 16:00:11',NULL,'Vardia',3,NULL,NULL,'kundservice@vardia.se','0850112150','Box 4430','203 15','Malmö',NULL,'08:30 - 17:00','08:30 - 17:00','08:30 - 17:00','08:30 - 17:00','08:30 - 17:00',NULL,NULL,NULL,NULL,NULL,'https://www.vardia.se/',NULL,NULL,NULL,1500,NULL,NULL,NULL,NULL,NULL,NULL,1.4,71),(27,'sveland','se','2019-02-21 13:40:02','2019-10-13 18:45:11',NULL,'Sveland',3,NULL,NULL,'dpo@trygghansa.se','0771388300','Östergatan 15','106 26','Stockholm','516404-4405','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00',NULL,NULL,NULL,NULL,NULL,'https://www.sveland.se/',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,3),(28,'safetown','se','2019-02-21 13:40:02','2019-03-06 09:35:03',NULL,'SafeTown',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1500,NULL,NULL,0,2000,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(29,'paydrive','se','2019-02-21 15:50:02','2019-11-11 10:30:14','https://click.adrecord.com?c=31521&p=803','Paydrive',4.5,NULL,NULL,'info@paydrive.se','084110200','Rosenlundsgatan 60','100 64','Stockholm','556942-1257','09:00 - 17:00','09:00 - 17:00','09:00 - 17:00','09:00 - 17:00','09:00 - 17:00',NULL,NULL,1000,NULL,NULL,'https://www.paydrive.se/',NULL,NULL,NULL,1500,NULL,NULL,NULL,NULL,NULL,NULL,2.9,2);
/*!40000 ALTER TABLE `insurances_cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurances_cats`
--

DROP TABLE IF EXISTS `insurances_cats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurances_cats` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) DEFAULT NULL,
  `locale` varchar(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `tracking_link` text,
  `rating` float DEFAULT NULL,
  `benefits` longtext,
  `drawbacks` longtext,
  `insurable_from_weeks` int DEFAULT NULL,
  `insurable_to_years` int DEFAULT NULL,
  `deductible_fixed_from` int DEFAULT NULL,
  `deductible_fixed_to` int DEFAULT NULL,
  `deductible_variable_from` int DEFAULT NULL,
  `deductible_variable_to` int DEFAULT NULL,
  `deductible_period` int DEFAULT NULL,
  `life_insurance_reduction_age` int DEFAULT NULL,
  `life_insurance_reduction_percent` int DEFAULT NULL,
  `life_insurance_reduction_kr` int DEFAULT NULL,
  `life_insurance_expires` int DEFAULT NULL,
  `compensation_amount_to` int DEFAULT NULL,
  `compensation_amount_reduction_age` int DEFAULT NULL,
  `compensation_amount_reduction_percent` int DEFAULT NULL,
  `compensation_amount_reduction_kr` int DEFAULT NULL,
  `waiting_period` int DEFAULT NULL,
  `firstvet_included` tinyint(1) DEFAULT NULL,
  `veterinary_certificate_max_age` int DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  `org_number` varchar(20) DEFAULT NULL,
  `open_monday` varchar(50) DEFAULT NULL,
  `open_tuesday` varchar(50) DEFAULT NULL,
  `open_wednesday` varchar(50) DEFAULT NULL,
  `open_thursday` varchar(50) DEFAULT NULL,
  `open_friday` varchar(50) DEFAULT NULL,
  `open_saturday` varchar(50) DEFAULT NULL,
  `open_sunday` varchar(50) DEFAULT NULL,
  `rating_veterinary` float DEFAULT NULL,
  `rating_deductible` float DEFAULT NULL,
  `rating_waiting` float DEFAULT NULL,
  `rating_age` float DEFAULT NULL,
  `rating_life_insurance` float DEFAULT NULL,
  `rating_price` float DEFAULT NULL,
  `trustpilot_rating` float DEFAULT NULL,
  `trustpilot_rating_count` int DEFAULT NULL,
  `front_page_url` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurances_cats`
--

LOCK TABLES `insurances_cats` WRITE;
/*!40000 ALTER TABLE `insurances_cats` DISABLE KEYS */;
INSERT INTO `insurances_cats` VALUES (1,'folksam','se','2018-11-24 04:37:06','2019-11-20 20:00:03','Folksam','https://track.adtraction.com/t/t?a=1231336978&as=1250442318&t=2&tk=1&url=https://www.folksam.se/forsakringar/kattforsakring',4.58333,NULL,NULL,6,7,1800,3000,25,NULL,125,7,20,NULL,13,50000,8,NULL,2500,20,1,NULL,'kundservice@folksam.se','0771950950','Bohusgatan 14','106 60','STOCKHOLM',NULL,'07:30 - 21:00','07:30 - 21:00','07:30 - 21:00','07:30 - 21:00','07:30 - 21:00','09:00 - 19:00','09:00 - 19:00',4,4.5,4,5,5,5,1.6,150,'https://www.folksam.se/'),(2,'moderna-forsakringar','se','2018-12-01 01:40:41','2019-11-20 20:00:03','Moderna Försäkringar','https://track.adtraction.com/t/t?a=54202769&as=1250442318&t=2&tk=1&url=https://www.modernaforsakringar.se/djurforsakringar/kattforsakring/rakna-har/',4.91667,NULL,NULL,6,8,900,3600,15,25,365,NULL,0,0,13,75000,0,0,0,20,1,NULL,'info@modernadjurforsakringar.se','060663032','Sveavägen 167','106 56','Stockholm',NULL,'08:00 - 20:00','08:00 - 20:00','08:00 - 20:00','08:00 - 20:00','08:00 - 17:00','0','09:00 - 15:00',5,5,5,4.5,5,5,2.6,5,'https://www.modernaforsakringar.se/'),(3,'sveland','se','2018-12-13 06:07:47','2019-11-20 20:00:03','Sveland',NULL,3.33333,NULL,NULL,6,7,1700,2300,15,25,125,NULL,0,0,10,100000,10,0,NULL,NULL,1,NULL,'djur@sveland.se','0462769200','Östergatan 15','281 32','Hässleholm','516404-4405','09:00 - 17:00','09:00 - 17:00','09:00 - 17:00','09:00 - 17:00','09:00 - 17:00',NULL,NULL,3.5,3,3.5,3,3,4,3,3,'https://www.sveland.se/'),(4,'agria','se','2018-12-13 06:08:11','2019-11-20 20:00:03','Agria',NULL,4.66667,NULL,NULL,0,0,1200,5000,15,25,135,8,20,NULL,13,60000,0,0,0,20,1,30,NULL,'0775888888','Agria Djurförsäkring','838 83','Frösön',NULL,'08:00 - 20:00','08:00 - 20:00','08:00 - 20:00','08:00 - 20:00','08:00 - 20:00','10:00 - 15:00','10:00 - 15:00',4.5,5,5,5,5,3.5,NULL,NULL,NULL),(5,'svedea','se','2018-12-13 06:40:13','2019-11-20 20:00:04','Svedea','https://track.adtraction.com/t/t?a=1127458242&as=1250442318&t=2&tk=1&url=https://www.svedea.se/kattforsakring',4.58333,NULL,NULL,6,NULL,1500,4500,15,25,130,NULL,NULL,NULL,13,90000,0,NULL,NULL,NULL,1,NULL,'kundnavet@svedea.se','0771160190','Fleminggatan 18','103 69','Stockholm','556786-1678','07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','07:30 - 18:00',NULL,NULL,4,5,5,4,4.5,5,3.5,3,'https://www.svedea.se/'),(6,'ica-forsakring','se','2018-12-13 06:49:24','2019-11-20 20:00:04','ICA Försäkring','https://track.adtraction.com/t/t?a=1145683379&as=1250442318&t=2&tk=1&url=https://www.icaforsakring.se/djurforsakring/kattforsakring/kop/?sc=BankWeb',4.66667,NULL,NULL,6,NULL,2000,3000,15,25,130,8,20,NULL,13,60000,NULL,NULL,NULL,20,1,30,'forsakring@ica.se','033474790',NULL,'504 82','Borås','556966-2975','08:00 - 17:30','08:00 - 17:30','08:00 - 17:30','08:00 - 17:30','08:00 - 17:30',NULL,NULL,4.5,5,4.5,4.5,4.5,5,3.6,492,'https://www.icaforsakring.se/'),(7,'if','se','2018-12-14 03:51:20','2019-11-20 20:00:04','If',NULL,4.08333,NULL,NULL,6,10,1500,1900,15,15,125,7,20,NULL,12,60000,10,NULL,5000,20,1,NULL,'kundservice@if.se','0770117177','Flöjelbergsgatan 4','106 80','Stockholm','516401-8102','07:30 - 21:00','07:30 - 21:00','07:30 - 21:00','07:30 - 21:00','07:30 - 21:00','09:00 - 18:00','10:00 - 18:00',4.5,4.5,4,3.5,4.5,3.5,1.7,108,'https://www.if.se/privat'),(8,'dina-forsakringar','se','2018-12-16 14:43:13','2019-11-20 20:00:04','Dina Försäkringar',NULL,4.16667,NULL,NULL,6,NULL,2000,NULL,20,NULL,120,NULL,NULL,NULL,11,60000,NULL,NULL,NULL,NULL,1,NULL,'hundkatt@dina.se',NULL,'Torggatan 9','722 15','Västerås','516401-8029','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00',NULL,NULL,3.5,4,4.5,5,4.5,3.5,2.2,11,'https://www.dina.se/'),(9,'trygg-hansa','se','2019-02-25 11:10:01','2019-11-18 22:30:06','Trygg-Hansa',NULL,3,NULL,NULL,6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,'0771111110',NULL,NULL,NULL,NULL,'07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','09:00 - 17:00','09:00 - 17:00',3,3,3,3,3,3,1.2,142,'https://www.trygghansa.se/'),(10,'bought-by-many','se','2019-09-26 18:45:04','2019-11-15 03:00:07','Bought by Many','https://vstatic.se/tr/clk?t=c546633195',5,NULL,NULL,4,NULL,NULL,NULL,15,NULL,365,NULL,NULL,NULL,9,140000,NULL,NULL,NULL,14,1,NULL,'djursupport@boughtbymany.com','0410880202',NULL,NULL,NULL,'7886430','09:00 - 17:30','09:00 - 17:30','09:00 - 17:30','09:00 - 17:30','09:00 - 17:30',NULL,NULL,5,5,5,5,5,5,NULL,NULL,NULL);
/*!40000 ALTER TABLE `insurances_cats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurances_comments`
--

DROP TABLE IF EXISTS `insurances_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurances_comments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `insurance_type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `insurance_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `set_later_publish` tinyint(1) DEFAULT '0',
  `publish_at` timestamp NULL DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `title` text,
  `comment` longtext,
  `answer_by` varchar(100) DEFAULT NULL,
  `answer` longtext,
  `email` longtext,
  `name` longtext,
  `created_at_unix` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `insurance_type` (`insurance_type`,`insurance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurances_comments`
--

LOCK TABLES `insurances_comments` WRITE;
/*!40000 ALTER TABLE `insurances_comments` DISABLE KEYS */;
INSERT INTO `insurances_comments` VALUES (4,'foretagsforsakring','svedea',1,0,NULL,5,'','Haft Svedea till mitt lilla aktiebolag i 3 år nu och har inget negativt att säga...hittills :)',NULL,NULL,'eyJpdiI6IlVVV3RSTkRnTkF6S2JrdnFXQ0lmYkE9PSIsInZhbHVlIjoiSFNqQWd4bmZMNTJKcTl1aVNnMTRCNDZRMlZtTUs5VnlUZU96blBMTDlmND0iLCJtYWMiOiJmNDAwZDc3YmU3ZWQwYmI0YTk1MTU4YzFiM2ZmNGMwZGFjOWRlNzFhM2Y4YTAyZTljYTI1NmFhZThmYjE3ZDZjIn0=','eyJpdiI6InVWT3ZQYXpiWkRGb0pPeTJuSDZvZnc9PSIsInZhbHVlIjoiMFlLeGo4bHR0dXdERit2RlJTeXNIUT09IiwibWFjIjoiZDg5OTU0YmU0OGU5N2FmYWM2YjZmMTliOTI3YWY2YzkwZGM1YTE5NGUwNjllNTdiNDZiMTZkNGMwMWIxZGI3MiJ9',1552592275,'2019-03-14 19:37:55','2019-03-14 19:37:55'),(5,'hundforsakring','svedea',1,0,NULL,5,'Nöjd kund','Inga konstigheter när man (tyvärr) måste anlita veterinär. Rekommenderas varmt.',NULL,NULL,'eyJpdiI6InVqUXM2UzR3MmxFRnBQZDNHNFRsWnc9PSIsInZhbHVlIjoicEZnck9nY2RvdStoYzQ5R3RqNEJHUnhTOUZhRmJUdG82SjRjcTZoQzJrbz0iLCJtYWMiOiJmYWRmNTllYWYzMGZkN2EwYTEzOWViOTkwZmQ0ZTNiYWMzNDZjNTRhYTc3ZjkzNTExMmE5M2I5YzdkNTJhZGExIn0=','eyJpdiI6IitwdUVzYlJyeUEyRGpBUDRYNXFpU3c9PSIsInZhbHVlIjoieDZjZHZFWm5GQ0I0VUR5R0JoKzRPdz09IiwibWFjIjoiM2I3ZDUyMTA1NjM2YjhiMzE1NDA0YTE4MDZlNjE0NmY5ODhiMjc3ZmQ2NDAxODUxOGQzM2QyOWMxZDY2YzI0MiJ9',1557310319,'2019-05-08 10:11:59','2019-05-08 10:11:59'),(6,'hundforsakring','agria',1,0,NULL,1,'Chock höjning','Hemskt företag chock höjt hundförsäkring  4500kr till 8050 på tre år',NULL,NULL,'eyJpdiI6IkpiYkd2blJuUUNhMDFmaUF2bmk2K1E9PSIsInZhbHVlIjoiNENjMFpla1VqOUdBMitlVjlNN3d4UG05eWZcL3pZYndpZDRiTEtzXC9DeWF4RnhxclVJTklsTDNZYmZ6U3ZpMktMIiwibWFjIjoiYjNhNmU1NDYxZmQ5NGEyZmUwYTZhZWU1NzQ4NTUzMGVkZGY5MmU2MDhhYzNmMzY2ZjQzOGI4NTE2MGY3M2I2ZiJ9','eyJpdiI6IkNZcDJsdStBWGlLa1FrWEpHWVwvSkhnPT0iLCJ2YWx1ZSI6Iml5ZnlrRHd6RlJIK0t0aU1VYjV1bk9hWkVRUkc1RUJrMlpmYm54Q0ZWekE9IiwibWFjIjoiOWJiYWQ2ZmJjNWMyYWNhOTg4YmU0MTk4ZWM3MmZiZjgyNjkyMGEyMDJiODU4Yzg3YzE1MjNmMzZhODg5NmQxMCJ9',1558206272,'2019-05-18 19:04:32','2019-05-18 19:04:32'),(7,'hemforsakring','ica-forsakring',1,0,NULL,5,'','Fixade allt när jag fick vattenskada. Sjukt tacksamt när sånt händer!',NULL,NULL,'eyJpdiI6IlRqVkZTY0JMNnZXRW5zY0FBWkl0T3c9PSIsInZhbHVlIjoicU1XdmFiVU5lVVhKdHZ2Z1lJOTY4b0dGNHQzZCtyT1ljVklUZXZaVHQ2az0iLCJtYWMiOiI4NDFjYjhhMTI2ZjY2YTlmYmMyN2MyYmM3ZjAxNTRhZTVmM2ViYzNlNGE0NzExZGZjOGQyNTUyY2Y4MjhiNzVlIn0=','eyJpdiI6InlMbkYxTFVEYTBhMm5ZRHdZVGhaSXc9PSIsInZhbHVlIjoiXC81Tk1RSGN5YVpwRzR2RERVbnRzNnc9PSIsIm1hYyI6ImUyZDhiOGZkZjRjNTcwOTA2MGU3ZWRiNjBmZDFlNWI2OGM1ZmJiZjA1MjViZjA2MDVmNjhlY2ZlZjkwMDNmY2YifQ==',1560255751,'2019-06-11 12:22:31','2019-06-11 12:22:31'),(8,'hundforsakring','moderna-forsakringar',1,0,NULL,1,'Sämsta bolaget för dig som försäkringstagare','Sämsta försäkringsbolaget. Skurit mig i två fingrar på arbetet som lämnat 2 fula och framträdande ärr rakt över fingrarna som är helt synliga även vid fotografering från 1meters avstånd. Enligt dem uppfyller det inte minimikravet från trafikskadenämdens bilder på ärr som är på trafikolyckor och ska därför inte ersättas. Så mycket för olycksfallsförsäkring. De är bara ute efter dina pengar. Tack och hej byter bolag direkt',NULL,NULL,'eyJpdiI6IlhNS3ZQY1FaaXIyd3pnMFpJUGczMlE9PSIsInZhbHVlIjoiZVhXcUtRS0xRVjdmSzI4aG03WlljeHZMaW4rRVNOQkpuOHI2dU9GbWZIQmNYb0dIZGloaXJkVkIwYmVRWlozUiIsIm1hYyI6ImUxYjc3NTllNTMzM2UzYTFhYTllOTE1MDlhMDBhOTQ5YzkwMGYyMGVlODMzNmQ3MWQ4NzkwYjJkOWY3YWRjOWUifQ==','eyJpdiI6IlNBTzUyWUt5M1wvWkNkZWFxQ3lUOVB3PT0iLCJ2YWx1ZSI6IjJRS3RxbW5BeVplUlJqUHkyb2JuMGc9PSIsIm1hYyI6ImI0YjBkNDY2MWE4NjgyNDBjMmVjM2JiYjE2YmFmN2YzMGY0OGFkZjIyODlhMDRjMmQ1OTBiOTU5ZTkxOWMwYTgifQ==',1562769088,'2019-07-10 14:31:28','2019-07-10 14:31:28'),(9,'kattforsakring','agria',1,0,NULL,1,'Värdelösa','Ett bolag som har en doldafel försäkring som inte gäller för något. Kommer byta snarast möjligt!',NULL,NULL,'eyJpdiI6IkN1NmxxSVVRRGpXenBlMFdEMVE0R1E9PSIsInZhbHVlIjoicmNGZHF4eCsrRUhaVjVMNituVVNxYUNVUXhjRWZxb2VRbWc1MGpXS1d3TT0iLCJtYWMiOiI4ODc4OTdlY2UyMThmNzI2Y2YyYjE0MWQ0ZTI4MTllZDcyMGVhNDcyZDhhYTU2ZTBkNjYwZTUzMWU5N2RlMWU3In0=','eyJpdiI6IndRZUtIdnJENWZ5TlhyQ0hUM3VMU2c9PSIsInZhbHVlIjoiRjFiMTN4djNOZ0ZSYlBGN3habUYzckFhbHp6U1B0azhoKzR0S0xrS3I3TT0iLCJtYWMiOiJkYjU2MTY1Zjg1N2I4MGM4ZTVlMTAwMmI2NWNlNmJiZDU0YTFlZDI5MmYwNjZkMzU4MWRhYTQ0ZWU5MDgwMjM3In0=',1563634683,'2019-07-20 14:58:03','2019-07-20 14:58:03'),(10,'hundforsakring','folksam',1,0,NULL,1,'Tragiskt','Riktigt bajs försäkringsbolag, otrevliga idioter jobbar på kundtjänst som tror att sitter på andra sidan lur och är skydd! haft den skit försäkringsbolag nästan 4år aldrig har använd förut och nu när man verkligen behöver hjälp dom skiter i på kunden. Om du läser mitt rekommendation så ALDRIG UNDERTECKNA EN AVTAL MED DOM EFTERSOM DET ÄR BARA KASTAD PENGAR!!!!',NULL,NULL,'eyJpdiI6InB4YUE4XC9HZjJLTHl0UTcyK3JrS1RRPT0iLCJ2YWx1ZSI6Imt4NXBpcmJocGRNUVRRY21qQ2pjWkJoczBUYVM1VUYrOTZaUEF5M3RBQ2s9IiwibWFjIjoiOWJkMmE2MWY3OGNmMDA2OGNhZTYyYTAxNzQyYWQ5MWMwY2MxNDQ4YTQzMzg1ZDc0OWFmMTZlMTNiOGVlMjBlZCJ9','eyJpdiI6InJBUzZvV2R2MnQxQnVTOTN5WDFqd0E9PSIsInZhbHVlIjoiMjZTMmlaM05mcDZvemM5dktsY0RNZz09IiwibWFjIjoiZTAxMmY0OWM2NzcyZjE2YThiN2RkYTMxNmIyMDI0ZWY1ZGFhZGYxYTFhOWQ4ZjI5MmMyMzU5ZGFjOGM1MTNjNSJ9',1568060236,'2019-09-09 20:17:16','2019-09-09 20:17:16'),(11,'hundforsakring','moderna-forsakringar',1,0,NULL,1,'Dom sa upp min försäkring utan varning.','Dom höjde min premie utan att säga till och sen när autogirot inte gick igenom sa dom upp min försäkring utan att säga till och skickade en faktura till mig på posten. RIKTIGT DÅLIGT!',NULL,NULL,'eyJpdiI6IngxMnNUUVNkXC9QYzRQT1ExT1FsenpRPT0iLCJ2YWx1ZSI6ImxlVnFxXC9KTkZOUEdJUWVOMXNsRkZWb29YMTJ0eXk4XC9xTzYrVjZxc2VCdmRrOFV1NDdQYUFwY0tnNHp3S1ZkRSIsIm1hYyI6IjM1NmNlOWRjYjliZjYzYjZiMmJlMmM2YjU4NjcxOTU5ZDg4NzVmYjE0ZWUwYTViMTgyNTU1NGQ2ODA5NzlmZTEifQ==','eyJpdiI6Ik5PWmNjRVc4dk91YndzRGl6MDN2Q1E9PSIsInZhbHVlIjoiVWthMDhKUjRBejBrSEdteVhZXC90a1hNWlljS3grWjk4cDg0UXhEMkxoek09IiwibWFjIjoiNThhMmZiMGYwNDIwYjVmYmI5N2JlMWY0ZGM3NTkzYzZhZTEyYTBhNzVlYzI1Y2Y1YTA0MzUyYWZkY2RiZDEwNSJ9',1568483357,'2019-09-14 17:49:17','2019-09-14 17:49:17'),(12,'hundforsakring','bought-by-many',2,0,NULL,5,'title','y yg gdsg dsg dsg dsg dsg dfsg sdg',NULL,NULL,'eyJpdiI6Ill4blErSUVMOVZjaVFGa3VqVzl6V3c9PSIsInZhbHVlIjoiZkNmbmxLd2t3MnEycWFcL1RLbFFRWXdVb3NcL0YwV0VxQ0ZYbU5qWmpEYVFYbkRqOXBPVWZoVmZzNU40MmptY3pHIiwibWFjIjoiYzM4ODA0MTVhNjllNTE2ZjE5MmE1MjliYTY4ZmE1MzYzMmYwODQ4OTAwNmU3ZTEzYTZhNWRiN2U1OGViODg0MSJ9','eyJpdiI6ImVxWVwvTWh3SEk5YkNnTW9aNVRrNXJ3PT0iLCJ2YWx1ZSI6ImhYdnJrNVNBYTkrMGtTWEJcL0p1ZGFpRGF6aFh3aFR6Z2pVd3VjbUdiRTNZPSIsIm1hYyI6IjI0MjY4ODM0NDg2NTE5ZDkyYmVkOTdiYjI2YTE2NTQ4MjVjYTgwZDU1YzVhMmU3YjI3YmNmYWMyMDc2ZWFlZjYifQ==',1570878339,'2019-10-12 11:05:39','2019-10-12 11:05:39'),(13,'hemforsakring','lansforsakringar',1,0,NULL,5,'','De är enkla att ha att göra med. Det mesta går att sköta online. Utbetalningen kom efter bara några dagar.',NULL,NULL,'eyJpdiI6Ilhaczg4RU94dnQxb0kxTHo5WVwveFlnPT0iLCJ2YWx1ZSI6IjRzQWluZFdaTW1CRTJjVTFqNHJnQmppVXRiZEY2SDI3dGFGc3NUYWI0TnM9IiwibWFjIjoiMzFmMTQ1OTA3ZWIwYzk2MzA1MmEyMDIwOWE4ZjFmMjIyOTMxZGYyMTAwNDEzOTJkODI2M2JmZjdlNmVlYzdhNiJ9','eyJpdiI6ImF5aXc5d3VEZElJc1lIazRcL0tcL1Nudz09IiwidmFsdWUiOiJ5UTRCcHN2dndwSHZ3TmZITWx1V0FBPT0iLCJtYWMiOiI2ZWZkYzkwZWNlZGFlYTM4ZmY4ZjE4NWM5MmU0ZDA0YzE4Mjg3M2ZkNDViOTY3NTc2YzllMmIwNTYzNTAxMjAyIn0=',1571666729,'2019-10-21 14:05:29','2019-10-21 14:05:29'),(14,'hemforsakring','lansforsakringar',1,0,NULL,4,'','Dyrt med försäkringen, men i och med att vi är guldkunder får vi 25% rabatt. Länsab är enkla att ha att göra med. De skickar regelbundet ut en inspektör som går igenom risker med vårt boende och ger tips. Smart drag av dem och vi uppskattar att få råd innan skada uppstår. Vi har, så här långt, inte haft anledning att klaga.',NULL,NULL,'eyJpdiI6ImZtVXhkMnhnVERzQ05HZkZqVVN3UFE9PSIsInZhbHVlIjoibVBhRmViSGNKa0lia1hYWFZtajl4MURsb0RSeEtBc3AxWlpONmJOK1h3bz0iLCJtYWMiOiJhMTBiMTBlNWRjYTRjMjJlYzIwNGU4NGFkZTg1MzgwODI5ZTdmZGQyNWM1MzJmMTIzMGJkNWI5ZDdhMzA5ZGU2In0=','eyJpdiI6IkxpaTFlcGlHbVwvWldLZzJMVm94ak13PT0iLCJ2YWx1ZSI6IlpQK3BUVlM4a2YyNHRuenRhcldWekE9PSIsIm1hYyI6IjdmZjA2MjBlMjllZTNjOGQ4NmU3MDg3MWU1NzQ4ZGM0MzdkMjU1YjZiYWVmZDEwZTU0NDhkNThiOGVhNTA2ZTgifQ==',1571666807,'2019-10-21 14:06:47','2019-10-21 14:06:47'),(15,'hemforsakring','folksam',1,0,NULL,5,'','Vi blev bestulna på cykeln i föreningens cykelförråd, och fick då marknadspriset på cykeln, vilket var över förväntan. Ingen lång väntetid i telefon samt att vi kom fram till rätt person med detsamma.',NULL,NULL,'eyJpdiI6Imp1M2J1VEdtaDJkT2p3Z2NMNFQ4WFE9PSIsInZhbHVlIjoiU2FpYnNFa2k0M3puSWpjeVhHRnNpVmFJY21IM2x5SXdiSjRQRXE2MDB0MD0iLCJtYWMiOiJjNTIzNDE4NDRlMzY5YzllNmJiYjE5MWUyYjZhMWQzN2UzMjNlNDIxOWU1MTQ4MTljODIzM2E2YjNmMDMwZDk2In0=','eyJpdiI6Iks1Nm96N1VUTldxN243eU1aR1IwNmc9PSIsInZhbHVlIjoidnBQSzZwWjVybTByMG5tUjZOZElcL3c9PSIsIm1hYyI6ImExMmE2MjZlNjZmODY5M2UxOTNkZTdjMjUyNzFlN2YzZWIwNzM2ZDAzOWIxNDE0ODZlN2RmOGYxZWI1MTcwN2EifQ==',1571666865,'2019-10-21 14:07:45','2019-10-21 14:07:45'),(16,'hemforsakring','if',1,0,NULL,3,'','Lite dålig kundservice',NULL,NULL,'eyJpdiI6IkU2YVhxc1paVkplTzhFdkQ5OHFVMFE9PSIsInZhbHVlIjoiYUNPY3F0Yk9sZEUzQkxcLzh2OUdaSHhJMDF0YXNnKzRUa0N4ZFd5VmtVNWc9IiwibWFjIjoiZWRhYzZjZDI3M2U2NDc4Yjg5MzVmYzc0YmQ4YjkxOTczNTg0MWEzM2U1YTE0NDE5MThiNmViNjI2NzY0ZjgxMSJ9','eyJpdiI6IklPWkVxOTJyaTdkZ2x6emtpdCt1RXc9PSIsInZhbHVlIjoiZGREXC8zNzNrVkF2NUxZcTdWbWdRM0k1S1Vza1BrSjlZQUtGNWV3bEhhSEU9IiwibWFjIjoiZmQyNjQ3OTM0YWZjNTA0NjJkYjQxNWFjYjNhNjNhODYxYjFiODY2MmVkOWY1M2M5MzFmMDYwNDQyMzAyMGYzYSJ9',1571666924,'2019-10-21 14:08:44','2019-10-21 14:08:44'),(17,'hemforsakring','if',1,0,NULL,4,'','Det är lite dyrt men det är väldigt sällan jag får nej när jag ansöker om ersättning. Bra bonussystem om du har flera saker försäkrade hos dem, har bostaden, husdjur etc vilket ger ett mer förmånligt pris.',NULL,NULL,'eyJpdiI6IjcyaytlQkJBZmxmT3hpYUZZSTRcLzh3PT0iLCJ2YWx1ZSI6IkUyNlp6RTZxQ0YrZFZXRXlXdXNjMlNFY25rb2Z6MWVkSGVlNkd6VG1mbHM9IiwibWFjIjoiYzA5MWJjODk2YzcwNmIzODg3N2YxMmVkYTVmNzczNWUyOTk0Nzg0YTczMjFmYjM2MzU3NDcwOGI4OTc1MTAzMCJ9','eyJpdiI6InBnY0dPQTFIczFcLytUd3Vxd1lpVjRRPT0iLCJ2YWx1ZSI6IlgwVit6aVdobzJcL0VcL0VOamZHZ2JGQT09IiwibWFjIjoiODU0NzA1ZDU3YzgwNGI0YzAyMmE5ODYwNjQ5NDFiYjNmZmY2Y2ZmMjNhODVjZDlhOWYxMDgwYjVhOGZhZGIxZiJ9',1571667034,'2019-10-21 14:10:34','2019-10-21 14:10:34'),(18,'hemforsakring','folksam',1,0,NULL,2,'','Väldigt dålig kontakt, ersätter inte fastän jag har rätt till ersättning.  Otrevliga och oprofessionellt kundservice',NULL,NULL,'eyJpdiI6IkNqOEpXNlYxNW0rVTZ5OWQyQVFSN2c9PSIsInZhbHVlIjoiZmVoMzVHd1wvM1BUUW9NSXpcLytlelRDdTNXMXBtQUUxajc3MXFcLzVvNFZpYz0iLCJtYWMiOiJjNjc4ZTg2NWE0OGM4OTljNjllM2Q3NTA0MzhmNDBkZmNhYzU2YzQyZTQyYmE4MTc3NGY0MjVkMzJlNzgwYjc2In0=','eyJpdiI6IjhVOHFnRlZuTkhySEhMM2xqRTdFRlE9PSIsInZhbHVlIjoiU2pqSDI1dWhnS0NtNXBqb283T3JZQT09IiwibWFjIjoiOTNlYzk1NDI2NmM2OThjYWE4NTRjYWFjYmVkMmRiZTc3MzQ3MjczMzgzZWM4MDNlYTZjNzY2ZjcwODVjNzgzMSJ9',1571667095,'2019-10-21 14:11:35','2019-10-21 14:11:35');
/*!40000 ALTER TABLE `insurances_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurances_companies`
--

DROP TABLE IF EXISTS `insurances_companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurances_companies` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) DEFAULT NULL,
  `locale` varchar(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tracking_link` text,
  `name` varchar(100) DEFAULT NULL,
  `rating` float DEFAULT '3',
  `benefits` longtext,
  `drawbacks` longtext,
  `email` varchar(60) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  `org_number` varchar(20) DEFAULT NULL,
  `open_monday` varchar(50) DEFAULT NULL,
  `open_tuesday` varchar(50) DEFAULT NULL,
  `open_wednesday` varchar(50) DEFAULT NULL,
  `open_thursday` varchar(50) DEFAULT NULL,
  `open_friday` varchar(50) DEFAULT NULL,
  `open_saturday` varchar(50) DEFAULT NULL,
  `open_sunday` varchar(50) DEFAULT NULL,
  `trustpilot_rating` float DEFAULT NULL,
  `trustpilot_rating_count` int DEFAULT NULL,
  `front_page_url` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurances_companies`
--

LOCK TABLES `insurances_companies` WRITE;
/*!40000 ALTER TABLE `insurances_companies` DISABLE KEYS */;
INSERT INTO `insurances_companies` VALUES (31,'svedea','se','2019-02-27 14:42:06','2019-10-01 21:55:10','https://track.adtraction.com/t/t?a=1127458242&as=1250442318&t=2&tk=1&url=https://www.svedea.se/foretagsforsakring','Svedea',5,'Bästa företagsförsäkringen 2019; Bra för: it-konsult, hantverkare, detaljhandel; Billig företagsförsäkring',NULL,'foretag@svedea.se','0771160190','Fleminggatan 18','103 69','Stockholm','556786-1678','07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','07:30 - 18:00',NULL,NULL,3.5,3,'https://www.svedea.se/'),(32,'unionen','se','2019-02-27 14:42:06','2019-03-06 13:40:05','https://track.adtraction.com/t/t?a=382148936&as=1250442318&t=2&tk=1&url=https://www.unionen.se/bli-medlem/egenforetagare','Unionen',4.5,'Bra komplement till företagsförsäkring; Inkomstförsäkring, A-kassa, rådgivning, m.m.; Lång erfarenhet av att hjälpa företagare',NULL,'egenforetagare@unionen.se','020743743',NULL,NULL,NULL,NULL,'07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','09:00 - 17:00',NULL,NULL,NULL,NULL,NULL),(33,'trygg-hansa','se','2019-02-27 14:42:06','2019-11-18 22:30:17',NULL,'Trygg-Hansa',3,NULL,NULL,NULL,'0771111110',NULL,NULL,NULL,NULL,'08:00 - 19:00','08:00 - 19:00','08:00 - 19:00','08:00 - 19:00','08:00 - 19:00','09:00 - 17:00','09:00 - 17:00',1.2,142,'https://www.trygghansa.se/'),(34,'solid-forsakring','se','2019-02-27 14:42:06','2019-02-27 14:42:06',NULL,'Solid Försäkring',3,NULL,NULL,NULL,NULL,'Landskronavägen 23',NULL,NULL,'516401-8482',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(35,'swedbank','se','2019-02-27 14:42:06','2019-10-16 13:20:13',NULL,'Swedbank',3,NULL,NULL,NULL,'0771233333',NULL,'106 60','Stockholm',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(36,'if','se','2019-02-27 14:42:06','2019-11-15 22:30:23',NULL,'If',3,NULL,NULL,NULL,'0771560000','Flöjelbergsgatan 4','106 80','Stockholm',NULL,'07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','09:00 - 18:00','10:00 - 18:00',1.7,108,'https://www.if.se/privat'),(37,'folksam','se','2019-02-27 14:42:06','2019-11-20 12:00:14',NULL,'Folksam',3,NULL,NULL,'foretag@folksam.se','0771950950','Bohusgatan 14','106 60','Stockholm',NULL,'07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','09:00 - 19:00','09:00 - 19:00',1.6,150,'https://www.folksam.se/'),(38,'moderna-forsakringar','se','2019-02-27 14:42:06','2019-09-08 16:10:13',NULL,'Moderna Försäkringar',3,NULL,NULL,'foretag@modernaforsakringar.se','0200259259','Sveavägen 167','106 56','Stockholm',NULL,'08:00 - 20:00','08:00 - 20:00','08:00 - 20:00','08:00 - 20:00','08:00 - 17:00','0','09:00 - 15:00',2.6,5,'https://www.modernaforsakringar.se/'),(39,'dina-forsakringar','se','2019-02-27 14:42:06','2019-10-28 16:00:24',NULL,'Dina Försäkringar',3,NULL,NULL,'foretag.malardalen@dina.se','0706714804','Torggatan 9','722 15','Västerås','516401-8029','08:00 - 16:45','08:00 - 16:45','08:00 - 16:45','08:00 - 16:45','08:00 - 17:00',NULL,NULL,2.2,11,'https://www.dina.se/'),(40,'lansforsakringar','se','2019-02-27 14:42:06','2019-11-15 22:30:24',NULL,'Länsförsäkringar',3,NULL,NULL,'foretag@sth.lansforsakringar.se','0856283000',NULL,NULL,NULL,NULL,'07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','10:00 - 15:00','10:00 - 15:00',1.7,130,'https://www.lansforsakringar.se/stockholm/privat/');
/*!40000 ALTER TABLE `insurances_companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurances_dogs`
--

DROP TABLE IF EXISTS `insurances_dogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurances_dogs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) DEFAULT NULL,
  `locale` varchar(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `tracking_link` text,
  `rating` float DEFAULT NULL,
  `benefits` longtext,
  `drawbacks` longtext,
  `insurable_from_weeks` int DEFAULT NULL,
  `insurable_to_years` int DEFAULT NULL,
  `deductible_fixed_from` int DEFAULT NULL,
  `deductible_fixed_to` int DEFAULT NULL,
  `deductible_variable_from` int DEFAULT NULL,
  `deductible_variable_to` int DEFAULT NULL,
  `deductible_period` int DEFAULT NULL,
  `life_insurance_reduction_age` int DEFAULT NULL,
  `life_insurance_reduction_percent` int DEFAULT NULL,
  `life_insurance_reduction_kr` int DEFAULT NULL,
  `life_insurance_expires` int DEFAULT NULL,
  `compensation_amount_to` int DEFAULT NULL,
  `compensation_amount_reduction_age` int DEFAULT NULL,
  `compensation_amount_reduction_percent` int DEFAULT NULL,
  `compensation_amount_reduction_kr` int DEFAULT NULL,
  `waiting_period` int DEFAULT NULL,
  `firstvet_included` tinyint(1) DEFAULT NULL,
  `veterinary_certificate_max_age` int DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  `org_number` varchar(20) DEFAULT NULL,
  `open_monday` varchar(50) DEFAULT NULL,
  `open_tuesday` varchar(50) DEFAULT NULL,
  `open_wednesday` varchar(50) DEFAULT NULL,
  `open_thursday` varchar(50) DEFAULT NULL,
  `open_friday` varchar(50) DEFAULT NULL,
  `open_saturday` varchar(50) DEFAULT NULL,
  `open_sunday` varchar(50) DEFAULT NULL,
  `rating_veterinary` float DEFAULT NULL,
  `rating_deductible` float DEFAULT NULL,
  `rating_waiting` float DEFAULT NULL,
  `rating_life_insurance` float DEFAULT NULL,
  `rating_age` float DEFAULT NULL,
  `rating_price` float DEFAULT NULL,
  `trustpilot_rating` float DEFAULT NULL,
  `trustpilot_rating_count` int DEFAULT NULL,
  `front_page_url` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurances_dogs`
--

LOCK TABLES `insurances_dogs` WRITE;
/*!40000 ALTER TABLE `insurances_dogs` DISABLE KEYS */;
INSERT INTO `insurances_dogs` VALUES (9,'ica-forsakring','se','2018-12-16 16:46:04','2019-11-20 20:00:05','ICA Försäkring','https://track.adtraction.com/t/t?a=1145683379&as=1250442318&t=2&tk=1&url=https://www.icaforsakring.se/djurforsakring/hundforsakring/kop?sc=BankWeb',4.41667,'Ingen karenstid',NULL,6,0,2000,3000,15,25,130,7,20,NULL,NULL,60000,NULL,NULL,NULL,20,1,30,'forsakring@ica.se','033474790','Sveavägen 38','103 69','Stockholm','556966-2975','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00',NULL,NULL,4.5,3,5,4.5,5,4.5,3.6,492,'https://www.icaforsakring.se/'),(10,'svedea','se','2018-12-16 16:46:05','2019-11-20 20:00:05','Svedea','https://track.adtraction.com/t/t?a=1127458242&as=1250442318&t=2&tk=1&url=https://www.svedea.se/hundforsakring',4.58333,'Billigaste hundförsäkringen;Bra service',NULL,6,0,1500,4500,15,25,130,NULL,NULL,NULL,NULL,90000,0,NULL,NULL,0,1,NULL,'kundnavet@svedea.se','0771160190','Fleminggatan 18','103 69','Stockholm','556786-1678','07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','07:30 - 18:00',NULL,NULL,3.5,5,4.5,4.5,5,5,3.5,3,'https://www.svedea.se/'),(11,'dina-forsakringar','se','2018-12-16 16:46:07','2019-10-22 07:45:05','Dina Försäkringar',NULL,3,NULL,NULL,6,NULL,2000,NULL,20,NULL,120,NULL,NULL,NULL,11,60000,NULL,NULL,NULL,20,1,NULL,'dina@dina.se','0771818283','Torggatan 9','722 15','Västerås','516401-8029','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00',NULL,NULL,3,3,3,3,3,3,2.2,11,'https://www.dina.se/'),(12,'sveland','se','2018-12-16 16:46:09','2019-09-08 16:25:04','Sveland',NULL,3,NULL,NULL,6,7,1800,2700,15,25,125,NULL,NULL,NULL,10,100000,NULL,NULL,NULL,20,1,NULL,'djur@sveland.se','0462769200','Östergatan 15','281 32','Lund','545000-7165','09:00 - 17:00','09:00 - 17:00','09:00 - 17:00','09:00 - 17:00','09:00 - 17:00',NULL,NULL,3,3,3,3,3,3,3,3,'https://www.sveland.se/'),(13,'folksam','se','2018-12-16 16:46:11','2019-11-20 12:00:05','Folksam','https://track.adtraction.com/t/t?a=1231336978&as=1250442318&t=2&tk=1&url=https://www.folksam.se/forsakringar/hundforsakring',3,NULL,NULL,6,NULL,1800,3000,25,25,NULL,NULL,NULL,NULL,10,NULL,NULL,NULL,NULL,NULL,1,NULL,'kundservice@folksam.se','0771950950','Bohusgatan 14','106 60','STOCKHOLM',NULL,'07:30 - 21:00','07:30 - 21:00','07:30 - 21:00','07:30 - 21:00','07:30 - 21:00','09:00 - 19:00','09:00 - 19:00',3,3,3,3,3,3,1.6,150,'https://www.folksam.se/'),(14,'moderna-forsakringar','se','2018-12-16 16:46:13','2019-11-20 20:00:06','Moderna Försäkringar','https://track.adtraction.com/t/t?a=54202769&as=1250442318&t=2&tk=1&url=https://www.modernaforsakringar.se/djurforsakringar/hundforsakring/rakna-har/',4.91667,'Bäst hundförsäkring just nu;Heltäckande skydd','Kunde varit lite billigare',6,8,900,3600,15,25,365,NULL,NULL,NULL,NULL,120000,0,NULL,NULL,20,1,NULL,'info@modernadjurforsakringar.se','060663030','Sveavägen 167','113 46','Stockholm','516403-8662','08:00 - 20:00','08:00 - 20:00','08:00 - 20:00','08:00 - 20:00','08:00 - 17:00','09:00 - 15:00','09:00 - 15:00',5,5,5,5,5,4.5,2.6,5,'https://www.modernaforsakringar.se/'),(15,'if','se','2018-12-16 16:46:15','2019-11-15 22:30:09','If',NULL,3,NULL,NULL,NULL,NULL,1500,2700,15,15,NULL,NULL,NULL,NULL,10,60000,NULL,NULL,NULL,NULL,1,NULL,NULL,'0770117177','Flöjelbergsgatan 4','106 80','Stockholm',NULL,'07:30 - 17:30','07:30 - 17:30','07:30 - 17:30','07:30 - 17:30','07:30 - 17:30','09:00 - 18:00','10:00 - 18:00',3,3,3,3,3,3,1.7,108,'https://www.if.se/privat'),(16,'agria','se','2018-12-16 16:46:17','2019-10-13 18:45:08','Agria',NULL,4.75,'Låg självrisk;Ingen övre åldersgräns för att teckna',NULL,NULL,NULL,1200,5000,15,25,125,NULL,NULL,NULL,NULL,120000,0,NULL,NULL,20,1,NULL,NULL,'0775888888','Tegeluddsvägen 11','115 41','Stockholm',NULL,'08:00 - 20:00','08:00 - 20:00','08:00 - 20:00','08:00 - 20:00','08:00 - 20:00','10:00 - 15:00','10:00 - 15:00',4.5,5,5,5,5,4,NULL,NULL,NULL),(18,'trygg-hansa','se','2019-02-25 11:15:02','2019-11-18 22:30:08','Trygg-Hansa',NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,'0771111110',NULL,NULL,NULL,NULL,'07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','09:00 - 17:00','09:00 - 17:00',3,3,3,3,3,3,1.2,142,'https://www.trygghansa.se/'),(19,NULL,NULL,'2019-03-04 11:10:03','2019-03-04 11:10:03',NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,3,3,3,3,3,NULL,NULL,NULL),(20,'bought-by-many','se','2019-09-26 18:45:06','2019-11-19 16:00:07','Bought by Many','https://vstatic.se/tr/clk?t=2c18118ddd',5,NULL,NULL,4,NULL,NULL,NULL,15,NULL,365,NULL,NULL,NULL,9,140000,NULL,NULL,NULL,14,1,NULL,'djursupport@boughtbymany.com','0410880202',NULL,NULL,NULL,'7886430','09:00 - 17:30','09:00 - 17:30','09:00 - 17:30','09:00 - 17:30','09:00 - 17:30',NULL,NULL,5,5,5,5,5,5,NULL,NULL,NULL);
/*!40000 ALTER TABLE `insurances_dogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurances_homes`
--

DROP TABLE IF EXISTS `insurances_homes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurances_homes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) DEFAULT NULL,
  `locale` varchar(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tracking_link` text,
  `name` varchar(100) DEFAULT NULL,
  `rating` float DEFAULT '3',
  `benefits` longtext,
  `drawbacks` longtext,
  `email` varchar(60) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  `org_number` varchar(20) DEFAULT NULL,
  `open_monday` varchar(50) DEFAULT NULL,
  `open_tuesday` varchar(50) DEFAULT NULL,
  `open_wednesday` varchar(50) DEFAULT NULL,
  `open_thursday` varchar(50) DEFAULT NULL,
  `open_friday` varchar(50) DEFAULT NULL,
  `open_saturday` varchar(50) DEFAULT NULL,
  `open_sunday` varchar(50) DEFAULT NULL,
  `travel_days` int DEFAULT NULL,
  `bike_compensation` int DEFAULT NULL,
  `goods_compensation` int DEFAULT NULL,
  `goods_compensation_minimum` int DEFAULT NULL,
  `legal_aid_compensation` int DEFAULT NULL,
  `deductible_default` int DEFAULT NULL,
  `id_theft_compensation` int DEFAULT NULL,
  `assault_compensation` int DEFAULT NULL,
  `liability_compensation` int DEFAULT NULL,
  `comprehensive_compensation` int DEFAULT NULL,
  `theft_home_compensation` int DEFAULT NULL,
  `theft_away_compensation` int DEFAULT NULL,
  `trustpilot_rating` float DEFAULT NULL,
  `trustpilot_rating_count` int DEFAULT NULL,
  `front_page_url` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurances_homes`
--

LOCK TABLES `insurances_homes` WRITE;
/*!40000 ALTER TABLE `insurances_homes` DISABLE KEYS */;
INSERT INTO `insurances_homes` VALUES (31,'ica-forsakring','se','2019-02-25 15:32:22','2019-11-14 10:30:14','https://track.adtraction.com/t/t?a=1145683379&as=1250442318&t=2&tk=1&url=https://www.icaforsakring.se/hemforsakring/hyresratt-och-bostadsratt/','ICA Försäkring',5,'Upp till 500 kr i ICA-bonus;Reseskydd i 60 dagar',NULL,'forsakring@ica.se','033474790',NULL,'504 82','Borås','556966-2975','08:00 - 17:30','08:00 - 17:30','08:00 - 17:30','08:00 - 17:30','08:00 - 17:30',NULL,NULL,60,50000,1000000,NULL,400000,1500,22000,1000000,5000000,NULL,NULL,NULL,3.6,492,'https://www.icaforsakring.se/'),(32,'moderna-forsakringar','se','2019-02-25 15:32:22','2019-09-08 16:10:10','https://track.adtraction.com/t/t?a=54202769&as=1250442318&t=2&tk=1&url=https://www.modernaforsakringar.se/forsakringar/hemforsakring/','Moderna Försäkringar',4.5,NULL,'Allriskförsäkring (drulle) ingår inte automatiskt','info@modernadjurforsakringar.se','0200259259','Sveavägen 167','106 56','Stockholm','516403-8662','08:00 - 20:00','08:00 - 20:00','08:00 - 20:00','08:00 - 20:00','08:00 - 17:00','0','09:00 - 15:00',60,50000,NULL,1000000,300000,1500,20000,NULL,5000000,100000,NULL,100000,2.6,5,'https://www.modernaforsakringar.se/'),(33,'folksam','se','2019-02-25 15:32:22','2019-11-20 12:00:10','https://track.adtraction.com/t/t?a=1231336978&as=1250442318&t=2&tk=1&url=https://www.folksam.se/forsakringar/hemforsakring?icmp=f_hemforsakring','Folksam',3.5,NULL,NULL,'kundservice@folksam.se','0771950950','Bohusgatan 14','106 60','Stockholm',NULL,'07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','09:00 - 19:00','09:00 - 19:00',45,20000,80000,NULL,100000,1800,NULL,120000,5000000,80000,NULL,NULL,1.6,150,'https://www.folksam.se/'),(34,'trygg-hansa','se','2019-02-25 15:32:22','2019-11-18 22:30:13','https://www.trygghansa.se/forsakringar/hemforsakring','Trygg-Hansa',3.5,NULL,NULL,'forsakringsnamnden@trygghansa.se','0771111110','Karlavägen 108','106 26','Stockholm',NULL,'08:00 - 19:00','08:00 - 19:00','08:00 - 19:00','08:00 - 19:00','08:00 - 19:00','09:00 - 17:00','09:00 - 17:00',45,1500,1,NULL,NULL,NULL,NULL,30000,NULL,NULL,NULL,NULL,1.2,142,'https://www.trygghansa.se/'),(35,'if','se','2019-02-25 15:32:22','2019-11-15 22:30:19','https://www.if.se/privat/forsakringar/hemforsakring','IF',4,NULL,NULL,NULL,'0771655655','Flöjelbergsgatan 4','106 80','Stockholm',NULL,'07:30 - 21:00','07:30 - 21:00','07:30 - 21:00','07:30 - 21:00','07:30 - 21:00','09:00 - 18:00','10:00 - 18:00',45,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1.7,108,'https://www.if.se/privat'),(36,'dina-forsakringar','se','2019-02-25 15:32:22','2019-10-12 10:05:09','https://www.dina.se/forsakringar/hemforsakring.html','Dina Försäkringar',3,NULL,NULL,'dina@dina.se',NULL,'Karlavägen 108','106 26','Stockholm','516401-8029','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00',NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,1500000,5000000,50000,NULL,50000,2.2,11,'https://www.dina.se/'),(37,'aktsam','se','2019-02-25 15:32:22','2019-11-19 16:30:11',NULL,'Aktsam',3,NULL,NULL,'kundsynpunkter@trygghansa.se','0771311020',NULL,'106 26','Stockholm','516404-4405','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 16:30',NULL,NULL,NULL,NULL,1000000,NULL,NULL,NULL,NULL,35000,NULL,NULL,NULL,10000,3.2,1,'https://www.aktsam.se/'),(38,'gjensidige','se','2019-02-25 15:32:22','2019-11-12 22:30:15',NULL,'Gjensidige',3,NULL,NULL,'info@gjensidige.se','0771326326','Karlavägen 108','103 61','Stockholm','516407-0384','08:30 - 17:00','08:30 - 17:00','08:30 - 17:00','08:30 - 17:00','08:30 - 17:00',NULL,NULL,NULL,NULL,1000000,200000,150000,1500,NULL,1000000,5000000,50000,NULL,50000,2.3,37,'https://www.gjensidige.se/'),(39,'lansforsakringar','se','2019-02-25 15:32:22','2019-11-15 22:30:20',NULL,'Länsförsäkringar',3,NULL,NULL,'info@sth.lansforsakringar.se','0856283000',NULL,NULL,NULL,NULL,'07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','10:00 - 15:00','10:00 - 15:00',NULL,NULL,1,NULL,NULL,1500,NULL,NULL,NULL,NULL,NULL,NULL,1.7,130,'https://www.lansforsakringar.se/stockholm/privat/'),(40,'sveland','se','2019-02-25 15:32:22','2019-11-19 16:30:11',NULL,'Sveland',3,NULL,NULL,'djur@sveland.se','0771388300','Karlavägen 108','106 26','Stockholm','516404-4405','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00',NULL,NULL,NULL,500,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,3,'https://www.sveland.se/'),(41,'tre-kronor','se','2019-02-25 15:32:22','2019-10-14 16:05:09',NULL,'Tre Kronor',3.5,NULL,NULL,NULL,'0771233333',NULL,'106 60','Stockholm',NULL,'08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00',NULL,NULL,45,NULL,1500000,NULL,260000,1500,NULL,1000000,5000000,100000,NULL,100000,NULL,NULL,NULL),(42,'vardia','se','2019-02-25 15:32:22','2019-11-12 22:30:16',NULL,'Vardia',3,NULL,NULL,'kundservice@vardia.se','0771614614','Box 4430','203 15','Malmö',NULL,'08:30 - 17:00','08:30 - 17:00','08:30 - 17:00','08:30 - 17:00','08:30 - 17:00',NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1.4,71,'https://www.vardia.se/'),(43,'watercircles','se','2019-02-25 15:32:22','2019-03-14 20:10:05',NULL,'WaterCircles',3,NULL,NULL,'info@watercircles.se','0104900999','Torshamnsgatan 35',NULL,NULL,NULL,'08:15 - 16:45','08:15 - 16:45','08:15 - 16:45','08:15 - 16:45','08:15 - 16:45',NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'https://www.watercircles.se/'),(44,'hedvig','se','2019-10-03 08:30:13','2019-11-19 16:30:12','https://track.adtraction.com/t/t?a=1412531812&as=1250442318&t=2&tk=1','Hedvig hemförsäkring',4,NULL,NULL,'help@hedvig.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,45,15000,1000000,NULL,250000,1500,NULL,8000,5000000,NULL,NULL,50000,NULL,NULL,NULL);
/*!40000 ALTER TABLE `insurances_homes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurances_incomes`
--

DROP TABLE IF EXISTS `insurances_incomes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurances_incomes` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) DEFAULT NULL,
  `locale` varchar(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tracking_link` text,
  `name` varchar(100) DEFAULT NULL,
  `rating` float DEFAULT '3',
  `benefits` longtext,
  `drawbacks` longtext,
  `email` varchar(60) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  `org_number` varchar(20) DEFAULT NULL,
  `open_monday` varchar(50) DEFAULT NULL,
  `open_tuesday` varchar(50) DEFAULT NULL,
  `open_wednesday` varchar(50) DEFAULT NULL,
  `open_thursday` varchar(50) DEFAULT NULL,
  `open_friday` varchar(50) DEFAULT NULL,
  `open_saturday` varchar(50) DEFAULT NULL,
  `open_sunday` varchar(50) DEFAULT NULL,
  `max_salary` int DEFAULT NULL,
  `max_days` int DEFAULT NULL,
  `max_salary_addition` int DEFAULT NULL,
  `max_days_addition` int DEFAULT NULL,
  `min_age` int DEFAULT NULL,
  `max_age` int DEFAULT NULL,
  `trustpilot_rating` float DEFAULT NULL,
  `trustpilot_rating_count` int DEFAULT NULL,
  `front_page_url` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurances_incomes`
--

LOCK TABLES `insurances_incomes` WRITE;
/*!40000 ALTER TABLE `insurances_incomes` DISABLE KEYS */;
INSERT INTO `insurances_incomes` VALUES (72,'accept','se','2019-02-26 13:33:05','2019-09-04 21:40:12','https://track.adtraction.com/t/t?a=56804152&as=1250442318&t=2&tk=1','Accept',4.5,NULL,NULL,'info@accept.se','086292490','Box 2068','174 02','Sundbyberg','556851-2312','10:00 - 16:00','10:00 - 16:00','10:00 - 16:00','10:00 - 16:00','10:00 - 15:00',NULL,NULL,85000,300,85000,NULL,NULL,55,3.2,2,'https://www.accept.se/'),(73,'unionen','se','2019-02-26 13:33:05','2019-10-22 07:50:13','https://track.adtraction.com/t/t?a=382148936&as=1250442318&t=2&tk=1','Unionen',5,NULL,NULL,'medlemsforsakring@unionen.se','0771272800',NULL,'105 32','Stockholm',NULL,'10:00 - 15:00','Stängt','10:00 - 15:00','10:00 - 15:00','10:00 - 15:00',NULL,NULL,60000,150,150000,200,NULL,65,NULL,NULL,NULL),(74,'ledarna','se','2019-02-26 13:33:05','2019-02-26 13:33:05','https://track.adtraction.com/t/t?a=1113850088&as=1250442318&t=2&tk=1','Ledarna',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,80000,150,120000,250,NULL,NULL,NULL,NULL,NULL),(75,'akademikerforbundet-ssr','se','2019-02-26 13:33:05','2019-03-14 20:10:05',NULL,'Akademikerförbundet SSR',3,NULL,NULL,'medlem@akademssr.se','0771950950','Mariedalsvägen 4','112 96','Stockholm',NULL,'08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00',NULL,NULL,80000,140,100000,300,NULL,65,NULL,NULL,'https://akademssr.se/'),(76,'handels','se','2019-02-26 13:33:05','2019-02-26 13:33:05',NULL,'Handels',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,35000,100,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(77,'livs','se','2019-02-26 13:33:05','2019-02-26 13:33:05',NULL,'Livs',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,35000,100,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(78,'jusek','se','2019-02-26 13:33:06','2019-03-14 20:10:05','https://track.adtraction.com/t/t?a=1263158646&as=1250442318&t=2&tk=1','Jusek',4,NULL,NULL,'medlem@jusek.se','086652900','Nybrogatan 30','102 44','Stockholm','802001-6591','08:30 - 17:00','08:30 - 17:00','08:30 - 17:00','08:30 - 17:00','08:30 - 16:00',NULL,NULL,80000,120,80000,300,NULL,60,NULL,NULL,'https://www.jusek.se/'),(79,'finansforbundet','se','2019-02-26 13:33:06','2019-02-26 13:33:06',NULL,'Finansförbundet',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,60000,120,100000,300,NULL,NULL,NULL,NULL,NULL),(80,'jobbgarant','se','2019-02-26 13:33:06','2019-02-26 13:33:06',NULL,'Jobbgarant',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,160000,264,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(81,'civilekonomerna','se','2019-02-26 13:33:06','2019-10-13 18:45:14',NULL,'Civilekonomerna',3,NULL,NULL,'kontakt@civilekonomerna.se','0770782050','Västgötagatan 2','116 92','Stockholm',NULL,'08:30 - 11:30','08:30 - 11:30','08:30 - 11:30','08:30 - 16:30','08:30 - 15:45',NULL,NULL,NULL,120,NULL,180,NULL,NULL,NULL,NULL,'https://civilekonomerna.se/'),(82,'ftf','se','2019-02-26 13:33:06','2019-02-26 13:33:06',NULL,'FTF',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,80000,120,80000,300,NULL,NULL,NULL,NULL,NULL),(83,'saljarnas','se','2019-02-26 13:33:06','2019-02-26 13:33:06',NULL,'Säljarnas',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,50000,60,50000,120,NULL,NULL,NULL,NULL,NULL),(84,'st','se','2019-02-26 13:33:06','2019-02-26 13:33:06',NULL,'ST',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,80000,150,80000,300,NULL,NULL,NULL,NULL,NULL),(85,'seko','se','2019-02-26 13:33:06','2019-02-26 13:33:06',NULL,'Seko',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(86,'vardforbundet','se','2019-02-26 13:33:06','2019-11-15 03:00:20',NULL,'Vårdförbundet',3,NULL,NULL,'info@vardforbundet.se','0771420420','* Adolf Fredriks Kyrkogata 11','103 65','Stockholm','802001-5239','08:00 - 18:00','08:00 - 18:00','08:00 - 18:00','08:00 - 18:00','08:00 - 18:00',NULL,NULL,60000,200,NULL,NULL,NULL,65,NULL,NULL,'https://www.vardforbundet.se/'),(87,'sveriges-arbetsterapeuter','se','2019-02-26 13:33:06','2019-02-26 13:33:06',NULL,'Sveriges Arbetsterapeuter',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,50000,120,80000,300,NULL,NULL,NULL,NULL,NULL),(88,'sveriges-psykologforbund','se','2019-02-26 13:33:06','2019-02-26 13:33:06',NULL,'Sveriges Psykologförbund',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,50000,120,80000,300,NULL,NULL,NULL,NULL,NULL),(89,'sveriges-lakarforbund','se','2019-02-26 13:33:06','2019-02-26 13:33:06',NULL,'Sveriges Läkarförbund',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,100000,120,100000,300,NULL,NULL,NULL,NULL,NULL),(90,'naturvetarna','se','2019-02-26 13:33:06','2019-02-26 13:33:06',NULL,'Naturvetarna',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,80000,150,80000,330,NULL,NULL,NULL,NULL,NULL),(91,'srat','se','2019-02-26 13:33:06','2019-02-26 13:33:06',NULL,'SRAT',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,80000,120,80000,300,NULL,NULL,NULL,NULL,NULL),(92,'sveriges-farmaceuter','se','2019-02-26 13:33:06','2019-02-26 13:33:06',NULL,'Sveriges Farmaceufter',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,80000,120,80000,300,NULL,NULL,NULL,NULL,NULL),(93,'fysioterapeuterna','se','2019-02-26 13:33:06','2019-02-26 13:33:06',NULL,'Fysioterapeuterna',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,50000,120,80000,300,NULL,NULL,NULL,NULL,NULL),(94,'kommunal','se','2019-02-26 13:33:06','2019-03-14 20:10:05',NULL,'Kommunal',3,NULL,NULL,'kundservice@folksam.se','0771950950',NULL,'104 32','Stockholm',NULL,'07:30 - 21:00','07:30 - 21:00','07:30 - 21:00','07:30 - 21:00','07:30 - 21:00',NULL,NULL,35000,100,NULL,NULL,NULL,NULL,NULL,NULL,'https://www.kommunal.se/'),(95,'kyrkans-akademikerforbund','se','2019-02-26 13:33:06','2019-02-26 13:33:06',NULL,'Kyrkans Akademikerförbund',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(96,'dik','se','2019-02-26 13:33:06','2019-03-03 12:35:03',NULL,'DIK',3,NULL,NULL,'info@dik.se','0848004000',NULL,NULL,NULL,NULL,'08:30 - 12:00','08:30 - 12:00','08:30 - 12:00','08:30 - 12:00','13:00 - 15:00',NULL,NULL,100000,120,100000,120,NULL,65,NULL,NULL,NULL),(97,'tj','se','2019-02-26 13:33:06','2019-02-26 13:33:06',NULL,'TJ',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,50000,120,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(98,'transport','se','2019-02-26 13:33:06','2019-02-26 13:33:06',NULL,'Transport',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(99,'sveriges-arkitekter','se','2019-02-26 13:33:06','2019-02-26 13:33:06',NULL,'Sveriges Arkitekter',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,60000,120,80000,300,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `insurances_incomes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurances_mcs`
--

DROP TABLE IF EXISTS `insurances_mcs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurances_mcs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) DEFAULT NULL,
  `locale` varchar(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tracking_link` text,
  `name` varchar(100) DEFAULT NULL,
  `rating` float DEFAULT '3',
  `benefits` longtext,
  `drawbacks` longtext,
  `email` varchar(60) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  `org_number` varchar(20) DEFAULT NULL,
  `open_monday` varchar(50) DEFAULT NULL,
  `open_tuesday` varchar(50) DEFAULT NULL,
  `open_wednesday` varchar(50) DEFAULT NULL,
  `open_thursday` varchar(50) DEFAULT NULL,
  `open_friday` varchar(50) DEFAULT NULL,
  `open_saturday` varchar(50) DEFAULT NULL,
  `open_sunday` varchar(50) DEFAULT NULL,
  `deductible_traffic` int DEFAULT NULL,
  `deductible_fire` int DEFAULT NULL,
  `deductible_glass` int DEFAULT NULL,
  `deductible_equipment` int DEFAULT NULL,
  `deductible_rescue` int DEFAULT NULL,
  `trustpilot_rating` float DEFAULT NULL,
  `trustpilot_rating_count` int DEFAULT NULL,
  `front_page_url` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurances_mcs`
--

LOCK TABLES `insurances_mcs` WRITE;
/*!40000 ALTER TABLE `insurances_mcs` DISABLE KEYS */;
INSERT INTO `insurances_mcs` VALUES (29,'svedea','se','2019-03-01 13:35:03','2019-10-01 21:55:11','https://track.adtraction.com/t/t?a=1127458242&as=1250442318&t=2&tk=1&url=https://www.svedea.se/mc-forsakring','Svedea',5,'Bästa MC-försäkringen enligt oss;Bra skydd till ett bra pris',NULL,'kundnavet@svedea.se','0771160190','Fleminggatan 18','103 69','Stockholm','556786-1678','07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','07:30 - 18:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3.5,3,'https://www.svedea.se/'),(30,'ica-forsakring','se','2019-03-01 13:35:03','2019-11-14 10:30:20',NULL,'ICA Försäkring',4.5,NULL,NULL,'forsakring@ica.se','033474790',NULL,'504 82','Borås','556966-2975','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,3.6,492,'https://www.icaforsakring.se/'),(31,'moderna-forsakringar','se','2019-03-01 13:35:03','2019-10-07 14:10:14','https://track.adtraction.com/t/t?a=54202769&as=1250442318&t=2&tk=1&url=https://www.modernaforsakringar.se/forsakringar/motorcykelforsakring/','Moderna Försäkringar',4.5,NULL,NULL,'info@modernadjurforsakringar.se','0102191090','Sveavägen 167','106 56','Stockholm','516403-8662','08:00 - 20:00','08:00 - 20:00','08:00 - 20:00','08:00 - 20:00','08:00 - 17:00','0','09:00 - 15:00',NULL,NULL,NULL,NULL,NULL,2.6,5,'https://www.modernaforsakringar.se/'),(32,'folksam','se','2019-03-01 15:25:04','2019-11-20 12:00:15',NULL,'Folksam',3.5,NULL,NULL,'kundservice@folksam.se','0771950950','Bohusgatan 14','106 60','Stockholm',NULL,'07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','07:30 - 17:00','09:00 - 19:00','09:00 - 19:00',NULL,NULL,NULL,NULL,NULL,1.6,150,'https://www.folksam.se/'),(33,'lansforsakringar','se','2019-03-01 15:30:04','2019-11-15 22:30:25',NULL,'Länsförsäkringar',2.5,NULL,NULL,'info@sth.lansforsakringar.se','0856283000',NULL,NULL,NULL,NULL,'07:30 - 22:00','07:30 - 22:00','07:30 - 22:00','07:30 - 22:00','07:30 - 22:00','10:00 - 15:00','10:00 - 15:00',NULL,NULL,NULL,NULL,NULL,1.7,130,'https://www.lansforsakringar.se/stockholm/privat/'),(34,'if','se','2019-03-01 15:30:04','2019-11-15 22:30:25',NULL,'If',3.5,NULL,NULL,NULL,'0770117177','Flöjelbergsgatan 4','106 80','Stockholm',NULL,'07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','09:00 - 18:00','10:00 - 18:00',NULL,NULL,NULL,NULL,NULL,1.7,108,'https://www.if.se/privat'),(35,'dina-forsakringar','se','2019-03-01 15:30:04','2019-10-12 10:05:11',NULL,'Dina Försäkringar',2.5,NULL,NULL,'dina@dina.se',NULL,'Torggatan 9','722 15','Västerås','516401-8029','08:00 - 16:45','08:00 - 16:45','08:00 - 16:45','08:00 - 16:45','08:00 - 16:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,2.2,11,'https://www.dina.se/'),(36,'trygg-hansa','se','2019-03-01 15:30:04','2019-11-18 22:30:18',NULL,'Trygg-Hansa',3,NULL,NULL,NULL,'0771111110',NULL,NULL,NULL,NULL,'08:00 - 19:00','08:00 - 19:00','08:00 - 19:00','08:00 - 19:00','08:00 - 19:00','09:00 - 17:00','09:00 - 17:00',NULL,NULL,NULL,NULL,NULL,1.2,142,'https://www.trygghansa.se/'),(37,'gjensidige','se','2019-03-01 15:30:04','2019-11-12 22:30:21',NULL,'Gjensidige',2.5,NULL,NULL,'info@gjensidige.se','0771326326','Karlavägen 108','103 61','Stockholm','516407-0384','08:30 - 17:00','08:30 - 17:00','08:30 - 17:00','08:30 - 17:00','08:30 - 17:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,2.3,37,'https://www.gjensidige.se/'),(38,'testing','se','2019-10-18 13:00:23','2019-10-18 13:00:23',NULL,'Testing',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `insurances_mcs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insurances_pregnancies`
--

DROP TABLE IF EXISTS `insurances_pregnancies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `insurances_pregnancies` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) DEFAULT NULL,
  `locale` varchar(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tracking_link` text,
  `name` varchar(100) DEFAULT NULL,
  `rating` float DEFAULT '3',
  `benefits` longtext,
  `drawbacks` longtext,
  `without_deductible` tinyint(1) DEFAULT '0',
  `valid_from_week` int DEFAULT NULL,
  `complication_compensation` int DEFAULT NULL,
  `hospital_stay_compensation` int DEFAULT NULL,
  `life_insurance_amount` int DEFAULT NULL,
  `invalidity_compensation_amount` int DEFAULT NULL,
  `diagnosis_compensation` int DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  `org_number` varchar(20) DEFAULT NULL,
  `open_monday` varchar(50) DEFAULT NULL,
  `open_tuesday` varchar(50) DEFAULT NULL,
  `open_wednesday` varchar(50) DEFAULT NULL,
  `open_thursday` varchar(50) DEFAULT NULL,
  `open_friday` varchar(50) DEFAULT NULL,
  `open_saturday` varchar(50) DEFAULT NULL,
  `open_sunday` varchar(50) DEFAULT NULL,
  `trustpilot_rating` float DEFAULT NULL,
  `trustpilot_rating_count` int DEFAULT NULL,
  `front_page_url` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insurances_pregnancies`
--

LOCK TABLES `insurances_pregnancies` WRITE;
/*!40000 ALTER TABLE `insurances_pregnancies` DISABLE KEYS */;
INSERT INTO `insurances_pregnancies` VALUES (24,'moderna-forsakringar','se','2019-02-21 18:09:06','2019-11-19 16:30:09','https://track.adtraction.com/t/t?a=54202769&as=1250442318&t=2&tk=1&url=https://www.modernaforsakringar.se/forsakringar/gravidforsakring/','Moderna Försäkringar',5,NULL,NULL,1,22,3000,200,25000,500000,NULL,'info@modernadjurforsakringar.se','0200438443','Sveavägen 167','106 56','Stockholm','516403-8662','08:00 - 20:00','08:00 - 20:00','08:00 - 20:00','08:00 - 20:00','08:00 - 17:00','0','09:00 - 15:00',2.6,5,'https://www.modernaforsakringar.se/'),(25,'trygg-hansa','se','2019-02-21 18:09:16','2019-11-18 22:30:12','https://www.trygghansa.se/forsakringar/gravidforsakring','Trygg-Hansa',3,NULL,NULL,0,NULL,NULL,200,NULL,600000,48000,'dpo@trygghansa.se','0771111110',NULL,NULL,NULL,NULL,'08:00 - 19:00','08:00 - 19:00','08:00 - 19:00','08:00 - 19:00','08:00 - 19:00','09:00 - 17:00','09:00 - 17:00',1.2,142,'https://www.trygghansa.se/'),(26,'if','se','2019-02-21 18:09:27','2019-11-15 22:30:18','https://www.if.se/privat/forsakringar/personforsakring/gravidforsakring','If',4,NULL,NULL,1,NULL,3000,250,25000,500000,50000,NULL,'0771655655','Flöjelbergsgatan 4','106 80','Stockholm',NULL,'07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','07:30 - 19:00','09:00 - 18:00','10:00 - 18:00',1.7,108,'https://www.if.se/privat'),(27,'lansforsakringar','se','2019-02-21 18:09:40','2019-11-15 22:30:18','https://www.lansforsakringar.se/privat/forsakring/personforsakring/gravidforsakring/','Länsförsäkringar',4,NULL,NULL,1,NULL,NULL,800,NULL,NULL,NULL,'info@sth.lansforsakringar.se','0856283000',NULL,NULL,NULL,NULL,'07:30 - 22:00','07:30 - 22:00','07:30 - 22:00','07:30 - 22:00','07:30 - 22:00','10:00 - 15:00','10:00 - 15:00',1.7,130,'https://www.lansforsakringar.se/stockholm/privat/'),(28,'folksam','se','2019-02-21 18:09:55','2019-11-20 12:00:09','https://www.folksam.se/forsakringar/gravidforsakring','Folksam',3.5,NULL,NULL,0,NULL,2000,200,50000,600000,50000,'kundservice@folksam.se','0771950950','Bohusgatan 14','106 60','Stockholm',NULL,'07:30 - 21:00','07:30 - 21:00','07:30 - 21:00','07:30 - 21:00','07:30 - 21:00','09:00 - 19:00','09:00 - 19:00',1.6,150,'https://www.folksam.se/'),(29,'gjensidige','se','2019-02-21 18:10:08','2019-11-12 22:30:14','https://www.gjensidige.se/forsakring/privat/gravidforsakring','Gjensidige',2.5,NULL,NULL,0,NULL,2000,200,50000,800000,50000,'info@gjensidige.se','0771326326','Karlavägen 108','103 61','Stockholm','516407-0384','08:30 - 17:00','08:30 - 17:00','08:30 - 17:00','08:30 - 17:00','08:30 - 17:00',NULL,NULL,2.3,37,'https://www.gjensidige.se/'),(30,'ica-forsakring','se','2019-02-25 15:30:03','2019-11-14 10:30:14','https://track.adtraction.com/t/t?a=1145683379&as=1250442318&t=2&tk=1&url=https://www.icaforsakring.se/person/gravidforsakring/','ICA Försäkring',5,NULL,NULL,0,NULL,3000,NULL,25000,500000,50000,'forsakring@ica.se','033474790',NULL,'504 82','Borås','556966-2975','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00','08:00 - 17:00',NULL,NULL,3.6,492,'https://www.icaforsakring.se/');
/*!40000 ALTER TABLE `insurances_pregnancies` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-01-18  8:49:31
