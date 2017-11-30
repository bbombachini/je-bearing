-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: db_jebearing
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB

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
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2017_10_05_171610_create_table_team',1),(2,'2017_10_05_171614_create_table_person',1),(3,'2017_10_05_175707_create_link_table_team_supervisor',1),(4,'2017_10_05_185632_create_table_part',1),(5,'2017_10_05_185915_create_table_quality',1),(6,'2017_10_05_185934_create_table_step',1),(7,'2017_10_05_185955_create_table_tool',1),(8,'2017_10_05_190006_create_table_material',1),(9,'2017_10_05_190027_create_table_fixture',1),(10,'2017_10_05_190100_create_table_comment',1),(11,'2017_10_05_190110_create_table_note',1),(12,'2017_10_05_192552_create_table_media',1),(13,'2017_10_05_193008_create_link_table_part_quality',1),(14,'2017_10_05_193039_create_link_table_part_step',1),(15,'2017_10_05_193052_create_link_table_part_tool',1),(16,'2017_10_05_193106_create_link_table_part_material',1),(17,'2017_10_05_193124_create_link_table_part_fixture',1),(18,'2017_10_05_193136_create_link_table_part_comment',1),(19,'2017_10_05_195355_create_link_table_quality_note',1),(20,'2017_10_05_195409_create_link_table_step_note',1),(21,'2017_10_06_164419_create_link_table_quality_media',1),(22,'2017_10_06_164440_create_link_table_note_media',1),(23,'2017_10_06_164513_create_link_table_step_media',1),(24,'2017_10_06_164525_create_link_table_tool_media',1),(25,'2017_10_06_164646_create_link_table_material_media',1),(26,'2017_10_06_164658_create_link_table_fixture_media',1),(27,'2017_10_06_164710_create_link_table_comment_media',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_comment`
--

DROP TABLE IF EXISTS `tbl_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_comment` (
  `comment_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `comment_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_person` smallint(5) unsigned NOT NULL,
  `comment_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`comment_id`),
  KEY `tbl_comment_comment_person_foreign` (`comment_person`),
  CONSTRAINT `tbl_comment_comment_person_foreign` FOREIGN KEY (`comment_person`) REFERENCES `tbl_person` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_comment`
--

LOCK TABLES `tbl_comment` WRITE;
/*!40000 ALTER TABLE `tbl_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_comment_media`
--

DROP TABLE IF EXISTS `tbl_comment_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_comment_media` (
  `comment_media_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` mediumint(9) NOT NULL,
  `media_id` mediumint(9) NOT NULL,
  `comment_media_order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`comment_media_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_comment_media`
--

LOCK TABLES `tbl_comment_media` WRITE;
/*!40000 ALTER TABLE `tbl_comment_media` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_comment_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_fixture`
--

DROP TABLE IF EXISTS `tbl_fixture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_fixture` (
  `fixture_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `fixture_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fixture_desc` text COLLATE utf8mb4_unicode_ci,
  `fixture_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`fixture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_fixture`
--

LOCK TABLES `tbl_fixture` WRITE;
/*!40000 ALTER TABLE `tbl_fixture` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_fixture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_fixture_media`
--

DROP TABLE IF EXISTS `tbl_fixture_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_fixture_media` (
  `fixture_media_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fixture_id` smallint(6) NOT NULL,
  `media_id` mediumint(9) NOT NULL,
  `fixture_media_order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`fixture_media_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_fixture_media`
--

LOCK TABLES `tbl_fixture_media` WRITE;
/*!40000 ALTER TABLE `tbl_fixture_media` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_fixture_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_material`
--

DROP TABLE IF EXISTS `tbl_material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_material` (
  `material_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `material_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `material_desc` text COLLATE utf8mb4_unicode_ci,
  `material_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `material_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`material_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_material`
--

LOCK TABLES `tbl_material` WRITE;
/*!40000 ALTER TABLE `tbl_material` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_material_media`
--

DROP TABLE IF EXISTS `tbl_material_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_material_media` (
  `material_media_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `material_id` smallint(6) NOT NULL,
  `media_id` mediumint(9) NOT NULL,
  `material_media_order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`material_media_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_material_media`
--

LOCK TABLES `tbl_material_media` WRITE;
/*!40000 ALTER TABLE `tbl_material_media` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_material_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_media`
--

DROP TABLE IF EXISTS `tbl_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_media` (
  `media_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `media_path` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_desc` text COLLATE utf8mb4_unicode_ci,
  `media_caption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`media_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_media`
--

LOCK TABLES `tbl_media` WRITE;
/*!40000 ALTER TABLE `tbl_media` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_note`
--

DROP TABLE IF EXISTS `tbl_note`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_note` (
  `note_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `note_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`note_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_note`
--

LOCK TABLES `tbl_note` WRITE;
/*!40000 ALTER TABLE `tbl_note` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_note` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_note_media`
--

DROP TABLE IF EXISTS `tbl_note_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_note_media` (
  `note_media_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `note_id` mediumint(9) NOT NULL,
  `media_id` mediumint(9) NOT NULL,
  `note_media_order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`note_media_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_note_media`
--

LOCK TABLES `tbl_note_media` WRITE;
/*!40000 ALTER TABLE `tbl_note_media` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_note_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_part`
--

DROP TABLE IF EXISTS `tbl_part`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_part` (
  `part_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `part_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_desc` text COLLATE utf8mb4_unicode_ci,
  `part_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`part_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_part`
--

LOCK TABLES `tbl_part` WRITE;
/*!40000 ALTER TABLE `tbl_part` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_part` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_part_comment`
--

DROP TABLE IF EXISTS `tbl_part_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_part_comment` (
  `part_comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `part_id` smallint(6) NOT NULL,
  `comment_id` mediumint(9) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`part_comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_part_comment`
--

LOCK TABLES `tbl_part_comment` WRITE;
/*!40000 ALTER TABLE `tbl_part_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_part_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_part_fixture`
--

DROP TABLE IF EXISTS `tbl_part_fixture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_part_fixture` (
  `part_fixture_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `part_id` smallint(6) NOT NULL,
  `fixture_id` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`part_fixture_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_part_fixture`
--

LOCK TABLES `tbl_part_fixture` WRITE;
/*!40000 ALTER TABLE `tbl_part_fixture` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_part_fixture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_part_material`
--

DROP TABLE IF EXISTS `tbl_part_material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_part_material` (
  `part_material_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `part_id` smallint(6) NOT NULL,
  `material_id` smallint(6) NOT NULL,
  `part_material_quantity` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `part_material_size` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`part_material_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_part_material`
--

LOCK TABLES `tbl_part_material` WRITE;
/*!40000 ALTER TABLE `tbl_part_material` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_part_material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_part_quality`
--

DROP TABLE IF EXISTS `tbl_part_quality`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_part_quality` (
  `part_quality_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `part_id` smallint(6) NOT NULL,
  `quality_id` mediumint(9) NOT NULL,
  `part_quality_order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`part_quality_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_part_quality`
--

LOCK TABLES `tbl_part_quality` WRITE;
/*!40000 ALTER TABLE `tbl_part_quality` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_part_quality` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_part_step`
--

DROP TABLE IF EXISTS `tbl_part_step`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_part_step` (
  `part_step_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `part_id` smallint(6) NOT NULL,
  `step_id` mediumint(9) NOT NULL,
  `part_step_order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`part_step_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_part_step`
--

LOCK TABLES `tbl_part_step` WRITE;
/*!40000 ALTER TABLE `tbl_part_step` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_part_step` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_part_tool`
--

DROP TABLE IF EXISTS `tbl_part_tool`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_part_tool` (
  `part_tool_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `part_id` smallint(6) NOT NULL,
  `tool_id` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`part_tool_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_part_tool`
--

LOCK TABLES `tbl_part_tool` WRITE;
/*!40000 ALTER TABLE `tbl_part_tool` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_part_tool` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_person`
--

DROP TABLE IF EXISTS `tbl_person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_person` (
  `person_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `person_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_position` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `person_team` smallint(5) unsigned NOT NULL,
  `person_phone` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `person_photo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/default.jpg',
  `person_active` tinyint(1) NOT NULL,
  `person_admin` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`person_id`),
  KEY `tbl_person_person_team_foreign` (`person_team`),
  CONSTRAINT `tbl_person_person_team_foreign` FOREIGN KEY (`person_team`) REFERENCES `tbl_team` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_person`
--

LOCK TABLES `tbl_person` WRITE;
/*!40000 ALTER TABLE `tbl_person` DISABLE KEYS */;
INSERT INTO `tbl_person` VALUES (1,'ObGZgQZcNG65AqpI6f4rJvSbtVLpJS','$2y$10$0IKCcj2QkCKQeyMJRokwgenXwUJoAMTypm0IoUGTrbqVnb13FXxnO','XwH3UmY9I5ZjSZvyQBdsXj7TC7tl1b',5,'yIJZpr9nWqw9yb9GoMMw','EWqRYtC16xu4GePlxiO88ccXARqCKZ','images/default.jpg',1,0,'2017-10-12 11:16:03','2017-10-12 11:16:03'),(2,'jGUcvOObcrTw75qfjJEB0F2bzdwcLu','$2y$10$7eoLCjv2mzZeKO4hoeo0puyoMdP/cd0GbPFpcLIPFp8cigNvtNl8.','r3uFWvqdComAOAzuxTS282DIjs1aSv',6,'nihH8FktVASbCRSfGZIy','nPcBM54Ur76NepLcb29DIUR88iNcM0','images/default.jpg',1,0,'2017-10-12 11:16:42','2017-10-12 11:16:42'),(3,'BwRtPWZvYSwyLYLxlW739DAAKp8SY8','$2y$10$HrA6ENF7MMEv1vv76iqN6.gw24SdMNa3uflCkKCUS7XZaE2bMKTwm','IUusLOKn6Y8EN7rtWUsF9bGXnLNyFs',5,'cxwPiuZGQaEHnIVHullv','NYlezN6WPAEAnifL5gB6AkyGnC0Spm','images/default.jpg',1,0,'2017-10-12 11:16:43','2017-10-12 11:16:43'),(4,'XJgjkZyFOARsKjqwfVDoXYYFhUqYLO','$2y$10$LoszFSw4xOdTRaPGtVFAIOv8fxqNDFaEuX8USEULnM/hgiSmJLOPO','PBxF7WpZsKaZfDMQ4QdedbuyaUnFGr',9,'3GlxwYduo1oaKLQsrsCr','jXJbt7bmR142QkHtfrM9xg9s5RkpD7','images/default.jpg',1,0,'2017-10-12 11:16:43','2017-10-12 11:16:43'),(5,'dCVadBtGy6UX7FGHNEhGFrZNmZ12pW','$2y$10$MKSff/TZqw/ge0oZ.JDaRuh7U/Y3sZ2FIA/i5DkQBI/3aS8Fg/9Py','u4vd6ZL5Di9Z6BckgT2FrViCZ3ej2I',11,'AmRO2A4ZhH72M35Xftdf','rAWTDTluzUjDopAA4cRO0RCRvG8vOl','images/default.jpg',1,0,'2017-10-12 11:16:44','2017-10-12 11:16:44'),(6,'Ixak1UJfY4vQxMUFHcItSkL7Ma48kZ','$2y$10$gVjwnGL9tAY97IOHMDQ1Vuc.q5XNkBeeXgtNnOv9xF/8C5mb8eppm','8iYozZauAunYOHRp3inTRoWSnpgPpR',10,'Xd2HGmtOgS83hwYSwktT','Sc6L7mi04RP8L9RFlqGnTbE9nWtvjF','images/default.jpg',1,0,'2017-10-12 11:16:45','2017-10-12 11:16:45'),(7,'YJfdAafUwtOcF6OMvS0YLqDHMFYcbF','$2y$10$y6iTX3Gu6hxk6QASo2c5GeLE5mIMIJi2ZiYDtqrSywYIT.AiAjCzC','0hbhxBprhgWhEze43aV80jdgi43E4v',4,'4PWbo3H3FXDDnwNuuY4I','evZLG7IVY1geer8ddsK6XXMLnilkfz','images/default.jpg',1,0,'2017-10-12 11:22:24','2017-10-12 11:22:24');
/*!40000 ALTER TABLE `tbl_person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_quality`
--

DROP TABLE IF EXISTS `tbl_quality`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_quality` (
  `quality_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `quality_title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quality_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quality_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`quality_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_quality`
--

LOCK TABLES `tbl_quality` WRITE;
/*!40000 ALTER TABLE `tbl_quality` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_quality` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_quality_media`
--

DROP TABLE IF EXISTS `tbl_quality_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_quality_media` (
  `quality_media_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quality_id` mediumint(9) NOT NULL,
  `media_id` mediumint(9) NOT NULL,
  `quality_media_order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`quality_media_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_quality_media`
--

LOCK TABLES `tbl_quality_media` WRITE;
/*!40000 ALTER TABLE `tbl_quality_media` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_quality_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_quality_note`
--

DROP TABLE IF EXISTS `tbl_quality_note`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_quality_note` (
  `quality_note_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quality_id` mediumint(9) NOT NULL,
  `note_id` mediumint(9) NOT NULL,
  `quality_note_order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`quality_note_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_quality_note`
--

LOCK TABLES `tbl_quality_note` WRITE;
/*!40000 ALTER TABLE `tbl_quality_note` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_quality_note` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_step`
--

DROP TABLE IF EXISTS `tbl_step`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_step` (
  `step_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `step_title` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `step_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `step_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`step_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_step`
--

LOCK TABLES `tbl_step` WRITE;
/*!40000 ALTER TABLE `tbl_step` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_step` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_step_media`
--

DROP TABLE IF EXISTS `tbl_step_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_step_media` (
  `step_media_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `step_id` mediumint(9) NOT NULL,
  `media_id` mediumint(9) NOT NULL,
  `step_media_order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`step_media_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_step_media`
--

LOCK TABLES `tbl_step_media` WRITE;
/*!40000 ALTER TABLE `tbl_step_media` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_step_media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_step_note`
--

DROP TABLE IF EXISTS `tbl_step_note`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_step_note` (
  `step_note_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `step_id` mediumint(9) NOT NULL,
  `note_id` mediumint(9) NOT NULL,
  `step_note_order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`step_note_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_step_note`
--

LOCK TABLES `tbl_step_note` WRITE;
/*!40000 ALTER TABLE `tbl_step_note` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_step_note` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_team`
--

DROP TABLE IF EXISTS `tbl_team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_team` (
  `team_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `team_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `team_desc` text COLLATE utf8mb4_unicode_ci,
  `team_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_team`
--

LOCK TABLES `tbl_team` WRITE;
/*!40000 ALTER TABLE `tbl_team` DISABLE KEYS */;
INSERT INTO `tbl_team` VALUES (1,'7JIL8r9EjssxQlbcWHa5M5RxKHDuTzzqK19kxN987OziMKTRhN','P0CmwzQ5ZJDP0ankdYwwrSG5oHvXUyVDUPHmtJlf5x1LoT20hKYpKn9DcroD2gcdpQberFjczFIFcXQS7rVM2J8wgxcEe3sncZ5m53yQJAZXXf5tmDcOID0i89LhsQefKmMl0IoZmYAPD9Aho850ak5ay7jTvOqzFMEzO5QEQrn24Q9l6Bcpk99w8Lni7QOof1JdcVHNNzZ4oTiK3ixLYnR9M3sBej4jQk8wQMzYoL3cZxUuQBrNaHHBAc73LlGy6XelbO3hMA7gALOIs2RrrQdqoX2uaIzPVEEYDSwCz0Wp',1,NULL,NULL),(2,'jbg6fIbjY8XUJcL8Dn61','sBfrfcQc1LrA3GmJPNS3UBvN8tXRgFevuw5Qig47OWoLmg0U7V',1,'2017-10-12 06:20:15','2017-10-12 06:20:15'),(3,'rXINeZm8Z8OXKd7WX82W','GJR3NUlhpZwo1mGnJjy3xvtZrtubu6oGtvhWx6Z1rJtFHYtesz',1,'2017-10-12 06:24:52','2017-10-12 06:24:52'),(4,'OlT9n7eSHzZHEEXMdiFx','wQMvRj9Zqxbuemwp07qUBiZMmW83vQp4LiWZFT6Pzrm1BKsb3t',1,'2017-10-12 06:25:51','2017-10-12 06:25:51'),(5,'ax33kIlcBdsI5DiVQPU5','QH3Y5aE52zmIyqLCpYiMd9QgPavHBlRyFvFZ9C6oO5Dqb8q7jD',1,'2017-10-12 06:25:52','2017-10-12 06:25:52'),(6,'eLi6qz61wEBGtSx5d20a','QwKzFMED2l6OL4fOOFMAUiQZqLJVOdpkuhi3DeTC5kKR7oRlTi',1,'2017-10-12 06:25:53','2017-10-12 06:25:53'),(7,'AolPzZKmA08X2zkSLHyt','X48qLJdjWnAi2EgXXBgPSIjcccuCgxfWxFdxPU71HrwXV3VKWe',1,'2017-10-12 06:25:54','2017-10-12 06:25:54'),(8,'XPsXPsSz1HGmikhqn2NC','2GUCa0DURRxGQVkZzQ7eeHuTAdqP1wkISN2pwSKGyQcQMLNSWx',1,'2017-10-12 06:25:54','2017-10-12 06:25:54'),(9,'oTFTmWnT5Je0Bl4hMqDp','WISCMLcYZquCFETZ3NQaLEeYokwIhsT3AvrFUtprDi5tRB31ym',1,'2017-10-12 06:25:55','2017-10-12 06:25:55'),(10,'S44XYqBqz3vIS12FSXFG','2euS7cfVBogztZDpocmfRDKqcRoa5iVs5O9dFP1zhNkZg1hhpo',1,'2017-10-12 06:25:55','2017-10-12 06:25:55'),(11,'Vv30IHfg6IYheI7jxXTK','CFf2qjHtxBvOOSGzj5aZYdGJHqjvRGNEfcANrubmd7pKsaVo83',1,'2017-10-12 06:48:18','2017-10-12 06:48:18'),(12,'jhrurt0nwEsIB5E4EHQq','FWNQyTR9ec3zCYQ8dKzZuTeKp8eq2mGAKE5YT0C1a9XNSZn5m4',1,'2017-10-12 06:48:19','2017-10-12 06:48:19'),(13,'eIRE4st4jsJsmkNgYChO','ahGP8Tb2yxrYFABUeUKcFlX76XqmzK4XrFj5hIIcIuhacdWsuy',1,'2017-10-12 06:48:19','2017-10-12 06:48:19');
/*!40000 ALTER TABLE `tbl_team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_team_supervisor`
--

DROP TABLE IF EXISTS `tbl_team_supervisor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_team_supervisor` (
  `team_supervisor_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `team_id` smallint(6) NOT NULL,
  `person_id` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`team_supervisor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_team_supervisor`
--

LOCK TABLES `tbl_team_supervisor` WRITE;
/*!40000 ALTER TABLE `tbl_team_supervisor` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_team_supervisor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tool`
--

DROP TABLE IF EXISTS `tbl_tool`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tool` (
  `tool_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `tool_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tool_desc` text COLLATE utf8mb4_unicode_ci,
  `tool_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tool_active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tool_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tool`
--

LOCK TABLES `tbl_tool` WRITE;
/*!40000 ALTER TABLE `tbl_tool` DISABLE KEYS */;
INSERT INTO `tbl_tool` VALUES (1,'Hammer','A tool consisting of a solid head, usually of metal, set crosswise on a handle, used for beating metals, driving nails, etc.','Top left shelf',1,'2017-10-12 11:32:28','2017-10-12 11:32:28'),(2,'Hammer','A tool consisting of a solid head, usually of metal, set crosswise on a handle, used for beating metals, driving nails, etc.','Top left shelf',0,'2017-10-12 11:35:43','2017-10-12 11:35:43'),(3,'Screwdriver','A hand tool for turning a screw, consisting of a handle attached to a long, narrow shank, usually of metal, which tapers and flattens out to a tip that fits into the slotted head of a screw.','Bottom right shelfssssss',1,'2017-10-12 11:35:43','2017-12-01 00:13:53'),(4,'Hammer','A tool consisting of a solid head, usually of metal, set crosswise on a handle, used for beating metals, driving nails, etc.','Top left shelf',0,'2017-11-22 13:35:37','2017-11-22 13:35:37'),(5,'Screwdriver','A hand tool for turning a screw, consisting of a handle attached to a long, narrow shank, usually of metal, which tapers and flattens out to a tip that fits into the slotted head of a screw.','Bottom right shelf',0,'2017-11-22 13:35:37','2017-11-22 13:35:37'),(6,'Saw','A tool consisting of a tough blade, wire, or chain with a hard toothed edge. It is used to cut through material, very often wood.','On blue wall',1,'2017-11-22 13:35:37','2017-11-22 13:35:37'),(7,'My tool','This is a very nice tool. You should use it.','Near boss office',1,'2017-11-24 01:52:54','2017-11-24 01:52:54'),(8,'Barbahammer','A hammer to rule all hammers','Dundas St.',1,'2017-11-24 02:00:48','2017-11-24 02:00:48'),(9,'Another tool','This is a new tool','somewhere',1,'2017-11-24 22:08:22','2017-11-24 22:08:22'),(10,'Tool #3','short description','somewhere',1,'2017-11-28 23:26:54','2017-11-28 23:26:54'),(11,'New one','sdddsdsds','sdsdsdsds',1,'2017-11-29 23:36:56','2017-11-29 23:36:56'),(12,'Barbahammer222','A hammer to rule all hammers ever and ever AGAIN AND AGAIN','666 Dundas St.',0,'2017-11-30 02:03:44','2017-12-01 00:34:01');
/*!40000 ALTER TABLE `tbl_tool` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tool_media`
--

DROP TABLE IF EXISTS `tbl_tool_media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tool_media` (
  `tool_media_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tool_id` smallint(6) NOT NULL,
  `media_id` mediumint(9) NOT NULL,
  `tool_media_order` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tool_media_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tool_media`
--

LOCK TABLES `tbl_tool_media` WRITE;
/*!40000 ALTER TABLE `tbl_tool_media` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tool_media` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-30 14:54:33
