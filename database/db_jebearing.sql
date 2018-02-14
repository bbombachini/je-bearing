-- MySQL dump 10.16  Distrib 10.2.12-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: db_jebearing
-- ------------------------------------------------------
-- Server version	10.2.12-MariaDB

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
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `person` smallint(5) unsigned NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_person_foreign` (`person`),
  CONSTRAINT `comment_person_foreign` FOREIGN KEY (`person`) REFERENCES `person` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment_media`
--

DROP TABLE IF EXISTS `comment_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment_media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` mediumint(9) NOT NULL,
  `media_id` mediumint(9) NOT NULL,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment_media`
--

LOCK TABLES `comment_media` WRITE;
/*!40000 ALTER TABLE `comment_media` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fixture`
--

DROP TABLE IF EXISTS `fixture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fixture` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fixture`
--

LOCK TABLES `fixture` WRITE;
/*!40000 ALTER TABLE `fixture` DISABLE KEYS */;
INSERT INTO `fixture` VALUES (1,'Fixture 1','001','Fixture 1 Fixture 1 Fixture 1 Fixture 1 Fixture 1 Fixture 1 Fixture 1 Fixture 1 Fixture 1 Fixture 1 Fixture 1 Fixture 1 Fixture 1 Fixture 1 Fixture 1 Fixture 1',1,'2018-01-29 05:00:00','2018-01-29 05:00:00'),(2,'Fixture 2','002','Fixture with a photo',1,'2018-01-29 05:00:00','2018-02-07 19:26:40'),(3,'Fixture 3','003','Fixture 3 Fixture 3 Fixture 3 Fixture 3 Fixture 3 Fixture 3 Fixture 3 Fixture 3 Fixture 3 Fixture 3 Fixture 3 Fixture 3',1,'2018-01-29 05:00:00','2018-01-29 05:00:00'),(4,'Fixture 4','004','Fixture 4 Fixture 4 Fixture 4 Fixture 4 Fixture 4 Fixture 4 Fixture 4 Fixture 4 Fixture 4 Fixture 4 Fixture 4 Fixture 4',1,'2018-01-29 05:00:00','2018-01-29 05:00:00');
/*!40000 ALTER TABLE `fixture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fixture_media`
--

DROP TABLE IF EXISTS `fixture_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fixture_media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fixture_id` smallint(6) NOT NULL,
  `media_id` mediumint(9) NOT NULL,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fixture_media`
--

LOCK TABLES `fixture_media` WRITE;
/*!40000 ALTER TABLE `fixture_media` DISABLE KEYS */;
INSERT INTO `fixture_media` VALUES (2,1,16,1,'2018-01-31 22:04:46','2018-01-31 22:04:46'),(3,2,19,1,'2018-02-07 19:26:41','2018-02-07 19:26:41');
/*!40000 ALTER TABLE `fixture_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
INSERT INTO `material` VALUES (1,'Wood','001','Wood is a porous and fibrous structural tissue found in the stems and roots of trees and other woody plants.',1,'2018-01-29 05:00:00','2018-01-29 05:00:00'),(2,'Iron','002','Iron is a chemical element with symbol Fe and atomic number 26. It is a metal in the first transition series. It is by mass the most common element on Earth, forming much of Earth\'s outer and inner core.',1,'2018-01-29 05:00:00','2018-01-29 05:00:00'),(3,'Steel','003','Steel is an alloy of iron and carbon and other elements. Because of its high tensile strength and low cost, it is a major component used in buildings, infrastructure, tools, ships, automobiles, machines, appliances, and weapons.',1,'2018-01-29 05:00:00','2018-01-29 05:00:00'),(4,'Glass','004','Glass is a non-crystalline amorphous solid that is often transparent and has widespread practical, technological, and decorative usage in, for example, window panes, tableware, and optoelectronics.',1,'2018-01-29 05:00:00','2018-01-29 05:00:00'),(5,'Plastic','005','Plastic is material consisting of any of a wide range of synthetic or semi-synthetic organic compounds that are malleable and so can be molded into solid objects.',1,'2018-01-29 05:00:00','2018-01-29 05:00:00');
/*!40000 ALTER TABLE `material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material_media`
--

DROP TABLE IF EXISTS `material_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material_media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `material_id` smallint(6) NOT NULL,
  `media_id` mediumint(9) NOT NULL,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material_media`
--

LOCK TABLES `material_media` WRITE;
/*!40000 ALTER TABLE `material_media` DISABLE KEYS */;
INSERT INTO `material_media` VALUES (1,2,17,1,'2018-02-07 19:22:43','2018-02-07 19:22:43'),(2,1,18,1,'2018-02-07 19:25:41','2018-02-07 19:25:41');
/*!40000 ALTER TABLE `material_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `path` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (1,'1516819843.jpg',NULL,NULL,'2018-01-24 23:50:44','2018-01-24 23:50:44'),(2,'1516819892.jpg',NULL,NULL,'2018-01-24 23:51:32','2018-01-24 23:51:32'),(4,'1516819950.jpg',NULL,NULL,'2018-01-24 23:52:30','2018-01-24 23:52:30'),(5,'1516819992.jpg',NULL,NULL,'2018-01-24 23:53:12','2018-01-24 23:53:12'),(6,'1516820081.jpg',NULL,NULL,'2018-01-24 23:54:41','2018-01-24 23:54:41'),(7,'1516820125.jpg',NULL,NULL,'2018-01-24 23:55:25','2018-01-24 23:55:25'),(8,'1516820186.jpg',NULL,NULL,'2018-01-24 23:56:27','2018-01-24 23:56:27'),(9,'1516820275.jpg',NULL,NULL,'2018-01-24 23:57:55','2018-01-24 23:57:55'),(10,'1516820328.jpg',NULL,NULL,'2018-01-24 23:58:48','2018-01-24 23:58:48'),(11,'1517417574.JPG',NULL,NULL,'2018-01-31 21:52:55','2018-01-31 21:52:55'),(12,'1517417943.JPG',NULL,NULL,'2018-01-31 21:59:04','2018-01-31 21:59:04'),(13,'1517418079.JPG',NULL,NULL,'2018-01-31 22:01:20','2018-01-31 22:01:20'),(15,'1517418199.JPG',NULL,NULL,'2018-01-31 22:03:20','2018-01-31 22:03:20'),(16,'1517418285.JPG',NULL,NULL,'2018-01-31 22:04:46','2018-01-31 22:04:46'),(17,'1518013363.png',NULL,NULL,'2018-02-07 19:22:43','2018-02-07 19:22:43'),(18,'1518013541.jpg',NULL,NULL,'2018-02-07 19:25:41','2018-02-07 19:25:41'),(19,'1518013600.jpg',NULL,NULL,'2018-02-07 19:26:40','2018-02-07 19:26:40');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2017_10_05_171610_create_table_team',1),(3,'2017_10_05_171614_create_table_person',1),(4,'2017_10_05_175707_create_link_table_team_supervisor',1),(5,'2017_10_05_185632_create_table_part',1),(6,'2017_10_05_185915_create_table_quality',1),(7,'2017_10_05_185934_create_table_step',1),(8,'2017_10_05_185955_create_table_tool',1),(9,'2017_10_05_190006_create_table_material',1),(10,'2017_10_05_190027_create_table_fixture',1),(11,'2017_10_05_190100_create_table_comment',1),(12,'2017_10_05_190110_create_table_note',1),(13,'2017_10_05_192552_create_table_media',1),(14,'2017_10_05_193008_create_link_table_part_quality',1),(15,'2017_10_05_193039_create_link_table_part_step',1),(16,'2017_10_05_193052_create_link_table_part_tool',1),(17,'2017_10_05_193106_create_link_table_part_material',1),(18,'2017_10_05_193124_create_link_table_part_fixture',1),(19,'2017_10_05_193136_create_link_table_part_comment',1),(20,'2017_10_05_195355_create_link_table_quality_note',1),(21,'2017_10_05_195409_create_link_table_step_note',1),(22,'2017_10_06_164419_create_link_table_quality_media',1),(23,'2017_10_06_164440_create_link_table_note_media',1),(24,'2017_10_06_164513_create_link_table_step_media',1),(25,'2017_10_06_164525_create_link_table_tool_media',1),(26,'2017_10_06_164646_create_link_table_material_media',1),(27,'2017_10_06_164658_create_link_table_fixture_media',1),(28,'2017_10_06_164710_create_link_table_comment_media',1),(29,'2018_02_05_213904_create_table_setup',2),(30,'2018_02_07_131124_create_link_table_part_setup',2),(31,'2018_02_07_131151_create_link_table_setup_step',2),(32,'2017_10_05_171614_create_table_new_users',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `note`
--

DROP TABLE IF EXISTS `note`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `note` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `note`
--

LOCK TABLES `note` WRITE;
/*!40000 ALTER TABLE `note` DISABLE KEYS */;
/*!40000 ALTER TABLE `note` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `note_media`
--

DROP TABLE IF EXISTS `note_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `note_media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `note_id` mediumint(9) NOT NULL,
  `media_id` mediumint(9) NOT NULL,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `note_media`
--

LOCK TABLES `note_media` WRITE;
/*!40000 ALTER TABLE `note_media` DISABLE KEYS */;
/*!40000 ALTER TABLE `note_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `part`
--

DROP TABLE IF EXISTS `part`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `part` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `part`
--

LOCK TABLES `part` WRITE;
/*!40000 ALTER TABLE `part` DISABLE KEYS */;
INSERT INTO `part` VALUES (1,'001','Part 1','Part 1 Part 1 Part 1 Part 1 Part 1 Part 1 Part 1 Part 1 Part 1 Part 1 Part 1 Part 1',1,'2018-01-29 05:00:00','2018-01-29 05:00:00'),(2,'002','Part 2','Part 2 Part 2 Part 2 Part 2 Part 2 Part 2 Part 2 Part 2 Part 2 Part 2 Part 2 Part 2',1,'2018-01-29 05:00:00','2018-01-29 05:00:00'),(3,'003','Part 3','Part 3 Part 3 Part 3 Part 3 Part 3 Part 3 Part 3 Part 3 Part 3 Part 3 Part 3 Part 3',1,'2018-01-29 05:00:00','2018-01-29 05:00:00'),(4,'004','Part 4','Part 4 Part 4 Part 4 Part 4 Part 4 Part 4 Part 4 Part 4 Part 4 Part 4 Part 4 Part 4',1,'2018-01-29 05:00:00','2018-01-29 05:00:00'),(5,'005','Part 5','Part 5 Part 5 Part 5 Part 5 Part 5 Part 5 Part 5 Part 5 Part 5 Part 5 Part 5 Part 5',1,'2018-01-29 05:00:00','2018-01-29 05:00:00');
/*!40000 ALTER TABLE `part` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `part_comment`
--

DROP TABLE IF EXISTS `part_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `part_comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `part_id` smallint(6) NOT NULL,
  `comment_id` mediumint(9) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `part_comment`
--

LOCK TABLES `part_comment` WRITE;
/*!40000 ALTER TABLE `part_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `part_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `part_fixture`
--

DROP TABLE IF EXISTS `part_fixture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `part_fixture` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `part_id` smallint(6) NOT NULL,
  `fixture_id` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `part_fixture`
--

LOCK TABLES `part_fixture` WRITE;
/*!40000 ALTER TABLE `part_fixture` DISABLE KEYS */;
INSERT INTO `part_fixture` VALUES (1,1,1,'2018-01-29 19:22:21','2018-01-29 19:22:21'),(2,1,3,'2018-01-29 19:22:21','2018-01-29 19:22:21'),(3,2,2,'2018-01-29 19:22:21','2018-01-29 19:22:21'),(4,3,1,'2018-01-29 19:22:21','2018-01-29 19:22:21'),(5,3,2,'2018-01-29 19:22:21','2018-01-29 19:22:21'),(6,3,3,'2018-01-29 19:22:21','2018-01-29 19:22:21'),(7,3,4,'2018-01-29 19:22:21','2018-01-29 19:22:21'),(8,4,4,'2018-01-29 19:22:21','2018-01-29 19:22:21'),(9,4,3,'2018-01-29 19:22:21','2018-01-29 19:22:21');
/*!40000 ALTER TABLE `part_fixture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `part_material`
--

DROP TABLE IF EXISTS `part_material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `part_material` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `part_id` smallint(6) NOT NULL,
  `material_id` smallint(6) NOT NULL,
  `quantity` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `part_material`
--

LOCK TABLES `part_material` WRITE;
/*!40000 ALTER TABLE `part_material` DISABLE KEYS */;
INSERT INTO `part_material` VALUES (1,1,1,NULL,NULL,'2018-01-29 19:21:02','2018-01-29 19:21:02'),(2,1,5,NULL,NULL,'2018-01-29 19:21:02','2018-01-29 19:21:02'),(3,2,1,NULL,NULL,'2018-01-29 19:21:02','2018-01-29 19:21:02'),(4,2,2,NULL,NULL,'2018-01-29 19:21:02','2018-01-29 19:21:02'),(5,2,4,NULL,NULL,'2018-01-29 19:21:02','2018-01-29 19:21:02'),(6,3,4,NULL,NULL,'2018-01-29 19:21:02','2018-01-29 19:21:02'),(7,4,3,NULL,NULL,'2018-01-29 19:21:02','2018-01-29 19:21:02'),(8,4,4,NULL,NULL,'2018-01-29 19:21:02','2018-01-29 19:21:02'),(9,4,5,NULL,NULL,'2018-01-29 19:21:02','2018-01-29 19:21:02'),(10,5,1,NULL,NULL,'2018-01-29 19:21:02','2018-01-29 19:21:02');
/*!40000 ALTER TABLE `part_material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `part_quality`
--

DROP TABLE IF EXISTS `part_quality`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `part_quality` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `part_id` smallint(6) NOT NULL,
  `quality_id` mediumint(9) NOT NULL,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `part_quality`
--

LOCK TABLES `part_quality` WRITE;
/*!40000 ALTER TABLE `part_quality` DISABLE KEYS */;
/*!40000 ALTER TABLE `part_quality` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `part_setup`
--

DROP TABLE IF EXISTS `part_setup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `part_setup` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `part_id` smallint(6) NOT NULL,
  `setup_id` mediumint(9) NOT NULL,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `part_setup`
--

LOCK TABLES `part_setup` WRITE;
/*!40000 ALTER TABLE `part_setup` DISABLE KEYS */;
/*!40000 ALTER TABLE `part_setup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `part_step`
--

DROP TABLE IF EXISTS `part_step`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `part_step` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `part_id` smallint(6) NOT NULL,
  `step_id` mediumint(9) NOT NULL,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `part_step`
--

LOCK TABLES `part_step` WRITE;
/*!40000 ALTER TABLE `part_step` DISABLE KEYS */;
INSERT INTO `part_step` VALUES (1,1,1,1,'2018-01-29 19:32:05','2018-01-29 19:32:05'),(2,1,3,2,'2018-01-29 19:32:05','2018-01-29 19:32:05'),(3,1,14,3,'2018-01-29 19:32:05','2018-01-29 19:32:05'),(4,1,5,4,'2018-01-29 19:32:05','2018-01-29 19:32:05'),(5,1,8,5,'2018-01-29 19:32:05','2018-01-29 19:32:05'),(6,2,2,1,'2018-01-29 19:32:05','2018-01-29 19:32:05'),(7,2,3,2,'2018-01-29 19:32:05','2018-01-29 19:32:05'),(8,2,11,3,'2018-01-29 19:32:05','2018-01-29 19:32:05'),(9,2,6,4,'2018-01-29 19:32:05','2018-01-29 19:32:05'),(10,3,4,1,'2018-01-29 19:32:05','2018-01-29 19:32:05'),(11,3,5,2,'2018-01-29 19:32:05','2018-01-29 19:32:05'),(12,4,7,1,'2018-01-29 19:32:05','2018-01-29 19:32:05'),(13,4,8,2,'2018-01-29 19:32:05','2018-01-29 19:32:05'),(14,4,1,3,'2018-01-29 19:32:05','2018-01-29 19:32:05'),(15,4,13,4,'2018-01-29 19:32:05','2018-01-29 19:32:05'),(16,5,9,1,'2018-01-29 19:32:05','2018-01-29 19:32:05'),(17,5,12,2,'2018-01-29 19:32:05','2018-01-29 19:32:05'),(18,5,2,3,'2018-01-29 19:32:05','2018-01-29 19:32:05'),(19,5,14,4,'2018-01-29 19:32:05','2018-01-29 19:32:05'),(20,5,15,5,'2018-01-29 19:32:05','2018-01-29 19:32:05');
/*!40000 ALTER TABLE `part_step` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `part_tool`
--

DROP TABLE IF EXISTS `part_tool`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `part_tool` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `part_id` smallint(6) NOT NULL,
  `tool_id` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `part_tool`
--

LOCK TABLES `part_tool` WRITE;
/*!40000 ALTER TABLE `part_tool` DISABLE KEYS */;
INSERT INTO `part_tool` VALUES (1,1,1,'2018-01-29 19:17:41','2018-01-29 19:17:41'),(2,1,3,'2018-01-29 19:17:41','2018-01-29 19:17:41'),(3,2,2,'2018-01-29 19:17:41','2018-01-29 19:17:41'),(4,2,3,'2018-01-29 19:17:41','2018-01-29 19:17:41'),(5,2,9,'2018-01-29 19:17:41','2018-01-29 19:17:41'),(6,2,10,'2018-01-29 19:17:41','2018-01-29 19:17:41'),(7,3,5,'2018-01-29 19:17:41','2018-01-29 19:17:41'),(8,3,4,'2018-01-29 19:17:41','2018-01-29 19:17:41'),(9,4,1,'2018-01-29 19:17:41','2018-01-29 19:17:41'),(10,5,10,'2018-01-29 19:17:41','2018-01-29 19:17:41'),(11,5,9,'2018-01-29 19:17:41','2018-01-29 19:17:41'),(12,5,2,'2018-01-29 19:17:41','2018-01-29 19:17:41');
/*!40000 ALTER TABLE `part_tool` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `person` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/default.jpg',
  `active` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person`
--

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quality`
--

DROP TABLE IF EXISTS `quality`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quality` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quality`
--

LOCK TABLES `quality` WRITE;
/*!40000 ALTER TABLE `quality` DISABLE KEYS */;
/*!40000 ALTER TABLE `quality` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quality_media`
--

DROP TABLE IF EXISTS `quality_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quality_media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quality_id` mediumint(9) NOT NULL,
  `media_id` mediumint(9) NOT NULL,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quality_media`
--

LOCK TABLES `quality_media` WRITE;
/*!40000 ALTER TABLE `quality_media` DISABLE KEYS */;
/*!40000 ALTER TABLE `quality_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quality_note`
--

DROP TABLE IF EXISTS `quality_note`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quality_note` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quality_id` mediumint(9) NOT NULL,
  `note_id` mediumint(9) NOT NULL,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quality_note`
--

LOCK TABLES `quality_note` WRITE;
/*!40000 ALTER TABLE `quality_note` DISABLE KEYS */;
/*!40000 ALTER TABLE `quality_note` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setup`
--

DROP TABLE IF EXISTS `setup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setup` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setup`
--

LOCK TABLES `setup` WRITE;
/*!40000 ALTER TABLE `setup` DISABLE KEYS */;
/*!40000 ALTER TABLE `setup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setup_step`
--

DROP TABLE IF EXISTS `setup_step`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setup_step` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `setup_id` smallint(6) NOT NULL,
  `step_id` mediumint(9) NOT NULL,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setup_step`
--

LOCK TABLES `setup_step` WRITE;
/*!40000 ALTER TABLE `setup_step` DISABLE KEYS */;
/*!40000 ALTER TABLE `setup_step` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `step`
--

DROP TABLE IF EXISTS `step`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `step` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `step`
--

LOCK TABLES `step` WRITE;
/*!40000 ALTER TABLE `step` DISABLE KEYS */;
INSERT INTO `step` VALUES (1,'Step 1','Step 1 Step 1 Step 1 Step 1 Step 1 Step 1 Step 1 Step 1 Step 1',1,'2018-01-29 19:29:03','2018-01-29 19:29:03'),(2,'Step 2','Step 2 Step 2 Step 2 Step 2 Step 2 Step 2 Step 2 Step 2 Step 2 Step 2',1,'2018-01-29 19:29:03','2018-01-29 19:29:03'),(3,'Step 3','Step 3 Step 3 Step 3 Step 3 Step 3 Step 3 Step 3 Step 3 Step 3 Step 3 Step 3',1,'2018-01-29 19:29:03','2018-01-29 19:29:03'),(4,'Step 4','Step 4 Step 4 Step 4 Step 4 Step 4 Step 4 Step 4 Step 4 Step 4 Step 4',1,'2018-01-29 19:29:03','2018-01-29 19:29:03'),(5,'Step 5','Step 5 Step 5 Step 5 Step 5 Step 5 Step 5 Step 5 Step 5 Step 5 Step 5 Step 5 Step 5 ',1,'2018-01-29 19:29:03','2018-01-29 19:29:03'),(6,'Step 6','Step 6 Step 6 Step 6 Step 6 Step 6 Step 6 Step 6 Step 6 Step 6 Step 6 Step 6 Step 6 Step 6 Step 6 Step 6 Step 6 Step 6',1,'2018-01-29 19:29:03','2018-01-29 19:29:03'),(7,'Step 7','Step 7 Step 7 Step 7 Step 7 Step 7 Step 7 Step 7 Step 7 Step 7',1,'2018-01-29 19:29:03','2018-01-29 19:29:03'),(8,'Step 8','Step 8 Step 8 Step 8 Step 8 Step 8 Step 8 Step 8 Step 8 Step 8 Step 8',1,'2018-01-29 19:29:03','2018-01-29 19:29:03'),(9,'Step 9','Step 9 Step 9 Step 9 Step 9 Step 9 Step 9 Step 9 Step 9',1,'2018-01-29 19:29:03','2018-01-29 19:29:03'),(10,'Step 10','Step 10 Step 10 Step 10 Step 10 Step 10 Step 10 Step 10',1,'2018-01-29 19:29:03','2018-01-29 19:29:03'),(11,'Step 11','Step 11 Step 11 Step 11 Step 11 Step 11 Step 11 Step 11 Step 11',1,'2018-01-29 19:29:03','2018-01-29 19:29:03'),(12,'Step 12','Step 12 Step 12 Step 12 Step 12 Step 12 Step 12 Step 12 Step 12 Step 12 Step 12 Step 12',1,'2018-01-29 19:29:03','2018-01-29 19:29:03'),(13,'Step 13','Step 13 Step 13 Step 13 Step 13 Step 13 Step 13 Step 13 Step 13 Step 13',1,'2018-01-29 19:29:03','2018-01-29 19:29:03'),(14,'Step 14','Step 14 Step 14 Step 14 Step 14 Step 14 Step 14 Step 14 Step 14',1,'2018-01-29 19:29:03','2018-01-29 19:29:03'),(15,'Step 15','Step 15 Step 15 Step 15 Step 15 Step 15 Step 15 Step 15 Step 15 Step 15',1,'2018-01-29 19:29:03','2018-01-29 19:29:03');
/*!40000 ALTER TABLE `step` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `step_media`
--

DROP TABLE IF EXISTS `step_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `step_media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `step_id` mediumint(9) NOT NULL,
  `media_id` mediumint(9) NOT NULL,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `step_media`
--

LOCK TABLES `step_media` WRITE;
/*!40000 ALTER TABLE `step_media` DISABLE KEYS */;
/*!40000 ALTER TABLE `step_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `step_note`
--

DROP TABLE IF EXISTS `step_note`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `step_note` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `step_id` mediumint(9) NOT NULL,
  `note_id` mediumint(9) NOT NULL,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `step_note`
--

LOCK TABLES `step_note` WRITE;
/*!40000 ALTER TABLE `step_note` DISABLE KEYS */;
/*!40000 ALTER TABLE `step_note` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team`
--

LOCK TABLES `team` WRITE;
/*!40000 ALTER TABLE `team` DISABLE KEYS */;
/*!40000 ALTER TABLE `team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `team_supervisor`
--

DROP TABLE IF EXISTS `team_supervisor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `team_supervisor` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` smallint(6) NOT NULL,
  `person_id` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `team_supervisor`
--

LOCK TABLES `team_supervisor` WRITE;
/*!40000 ALTER TABLE `team_supervisor` DISABLE KEYS */;
/*!40000 ALTER TABLE `team_supervisor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tool`
--

DROP TABLE IF EXISTS `tool`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tool` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tool`
--

LOCK TABLES `tool` WRITE;
/*!40000 ALTER TABLE `tool` DISABLE KEYS */;
INSERT INTO `tool` VALUES (1,'Hammer','123-345','A hammer is a tool or device that delivers a blow to an object. Most hammers are hand tools used to drive nails, fit parts, forge metal, and break apart objects.',1,'2018-01-24 23:44:10','2018-01-29 05:01:37'),(2,'Mallet','345-643','Mallets come in different types, the most common of which are: Rubber mallets are used when a softer blow is called for than that delivered by a metal hammer.',1,'2018-01-24 23:44:42','2018-01-24 23:44:42'),(3,'Hacksaw','356-345','A hacksaw is a fine-toothed saw, originally and mainly made for cutting metal. The equivalent saw for cutting wood is usually called bow saw.',1,'2018-01-24 23:45:16','2018-01-24 23:45:16'),(4,'Screwdriver','345-234','A screwdriver is a tool, manual or powered, for screwing and unscrewing screws. A typical simple screwdriver has a handle and a shaft, ending in a tip the user puts into the screw head before turning the handle.',1,'2018-01-24 23:45:40','2018-01-24 23:45:40'),(5,'Wire Stripper','654-533','A wire stripper is a small, hand-held device used to strip the electrical insulation from electric wires.',1,'2018-01-24 23:46:17','2018-01-24 23:46:17'),(6,'Electric Drill','234-342','A drill is a tool fitted with a cutting tool attachment or driving tool attachment, usually a drill bit or driver bit, used for boring holes in various materials or fastening various materials together.',1,'2018-01-24 23:46:46','2018-01-24 23:46:46'),(7,'Belt Sander','345-345','Belt Sanders are the best!!!',0,'2018-01-24 23:47:32','2018-01-29 21:09:50'),(8,'Saw','345-353','A saw is a tool consisting of a tough blade, wire, or chain with a hard toothed edge. It is used to cut through material, very often wood.',1,'2018-01-24 23:48:12','2018-01-24 23:48:12'),(9,'Sandpaper','245-352','Sandpaper is produced in a range of grit sizes and is used to remove material from surfaces, either to make them smoother (for example, in painting and wood finishing), to remove a layer of material (such as old paint).',1,'2018-01-24 23:49:00','2018-01-24 23:49:00'),(10,'Clamp','234-253','A clamp is a fastening device used to hold or secure objects tightly together to prevent movement or separation through the application of inward pressure.',0,'2018-01-24 23:51:04','2018-01-31 22:03:26'),(11,'Clara','123-345','Clara is the best tool!',1,'2018-01-29 21:10:09','2018-01-29 21:10:09');
/*!40000 ALTER TABLE `tool` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tool_media`
--

DROP TABLE IF EXISTS `tool_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tool_media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tool_id` smallint(6) NOT NULL,
  `media_id` mediumint(9) NOT NULL,
  `order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tool_media`
--

LOCK TABLES `tool_media` WRITE;
/*!40000 ALTER TABLE `tool_media` DISABLE KEYS */;
INSERT INTO `tool_media` VALUES (1,7,1,1,'2018-01-24 23:50:44','2018-01-24 23:50:44'),(2,6,2,1,'2018-01-24 23:51:32','2018-01-24 23:51:32'),(4,3,4,1,'2018-01-24 23:52:30','2018-01-24 23:52:30'),(5,1,5,1,'2018-01-24 23:53:12','2018-01-24 23:53:12'),(6,2,6,1,'2018-01-24 23:54:42','2018-01-24 23:54:42'),(7,9,7,1,'2018-01-24 23:55:25','2018-01-24 23:55:25'),(8,8,8,1,'2018-01-24 23:56:27','2018-01-24 23:56:27'),(9,4,9,1,'2018-01-24 23:57:55','2018-01-24 23:57:55'),(10,5,10,1,'2018-01-24 23:58:48','2018-01-24 23:58:48'),(11,10,15,2,'2018-01-31 22:03:20','2018-01-31 22:03:20');
/*!40000 ALTER TABLE `tool_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/default.jpg',
  `role` tinyint(4) NOT NULL,
  `assembly_access` tinyint(1) NOT NULL DEFAULT 0,
  `repair_access` tinyint(1) NOT NULL DEFAULT 0,
  `instructions_access` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_old`
--

DROP TABLE IF EXISTS `users_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_old` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_old`
--

LOCK TABLES `users_old` WRITE;
/*!40000 ALTER TABLE `users_old` DISABLE KEYS */;
INSERT INTO `users_old` VALUES (1,'Clara','claramarshall@rogers.com','$2y$10$0cyApPyAPSdn/ooZYEjpv.N.bmUKsq6eDx0V.t0CW/50H7qCu5Saa','default.jpg','DXkXBA12qxy9Mn5ywTjCmtH3R9RB2GkWOn78Rhqnu85vI7zq2yx5v3ukvW9L','2018-01-24 18:07:53','2018-01-24 18:07:53'),(2,'Barbara','email@email.com','$2y$10$3xooU/fADHPDmT.bF74N0O28GeiQedrbrwoyw5fo2QCiDJiPTigoW','default.jpg','emwZNtxWj54tGGXmeTmv1zgLI6v8LEVgJxxyExriGaE4BDOb3B3dUIcaFQvl','2018-01-24 18:11:11','2018-01-24 18:11:11'),(3,'John Doe','john@email.com','$2y$10$kEVqrYPCWWqGhwLDwZkIle9oSxGTuXJmGqornjfnF.jFAbkRPG/yi','default.jpg','2uJvmHaJg96Z6rRMwdaYhNt84smXkEPJZ7P8m3SaDNiNEpMf1pZR5tyRzSDc','2018-01-24 19:04:27','2018-01-24 19:04:27'),(4,'Johnny Cash','johnny@cash.ca','$2y$10$Cnn4M.LEQQvHghMfQbXBtOq3NFw17HeYQwBW5x/q1KNE0.IdjU4xW','default.jpg','iknR7QH51HWG02j64hIqWROPgV9q5ZBJhDdnCxeoHaAEBBpC7Z85uETH45i0','2018-01-24 23:35:07','2018-01-24 23:35:07'),(5,'Clara Marsh','clara@email.com','$2y$10$OP3HrPK/XYmVyG55yRenVOGChW.Kps/UTfCYC.MTzMhQAr8MJxtcW','default.jpg','m2dCpruOmEE4yRpkUCCAv2mLTFyrqLdjEBCRvxCcmMJdRJK2Q2951RHXW8zr','2018-01-24 23:42:00','2018-01-24 23:42:00'),(6,'Jimi Hendrix','jimi@hendrix.ca','$2y$10$R8a79TctBnLCZp01Qlxc8eqbODHdJlrSqhu7hboq9u9sYIyeSBLQ6','default.jpg','DtroSFoCgNUg0wkFPO2YmLF9iCifBJJjXUQLXTuUoChOLpXr5ZOp3YtZCTiy','2018-01-24 23:44:42','2018-01-24 23:44:42'),(7,'Barbara','barbarafrancob@gmail.com','$2y$10$dWFjTB7JXSbEL6ZTem7C3.Ny5vG3JPNW546hqq3E2XO3afql.5V1S','default.jpg','flXD9WzvWDhDJdNiIvjRtI7SlmXrzzoiyfvet2L2M9vWJtw0kqrEQl0tsQEM','2018-01-24 23:49:35','2018-01-24 23:49:35');
/*!40000 ALTER TABLE `users_old` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-12 13:49:27
