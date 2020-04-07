-- MariaDB dump 10.17  Distrib 10.4.11-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: blogapplicatie
-- ------------------------------------------------------
-- Server version	10.4.11-MariaDB

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
-- Table structure for table `attachment`
--

DROP TABLE IF EXISTS `attachment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_extension` varchar(255) DEFAULT NULL,
  `file_full_name` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-attachment-blog_id` (`blog_id`),
  CONSTRAINT `fk-attachment-blog_id` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attachment`
--

LOCK TABLES `attachment` WRITE;
/*!40000 ALTER TABLE `attachment` DISABLE KEYS */;
INSERT INTO `attachment` VALUES (1,3,'smile','png','smile.png'),(2,44,'WhatsApp Image 2020-03-16 at 09.29.23','jpeg','WhatsApp Image 2020-03-16 at 09.29.23.jpeg'),(3,3,'WhatsApp Image 2020-03-16 at 09.29.23 _1_','jpeg','WhatsApp Image 2020-03-16 at 09.29.23 _1_.jpeg'),(6,168,'WhatsApp Image 2020-03-16 at 09.29.23','jpeg','WhatsApp Image 2020-03-16 at 09.29.23.jpeg'),(7,3,'WhatsApp Image 2020-03-16 at 09.29.23','jpeg','WhatsApp Image 2020-03-16 at 09.29.23.jpeg'),(22,7,'WhatsApp Image 2020-03-16 at 09.29.23 _2_','jpeg','WhatsApp Image 2020-03-16 at 09.29.23 _2_.jpeg'),(49,7,'price','jpg','price.jpg');
/*!40000 ALTER TABLE `attachment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog`
--

DROP TABLE IF EXISTS `blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `publish_date` datetime NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  `inleiding` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-post-author_id` (`author_id`),
  CONSTRAINT `fk-post-author_id` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=360 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog`
--

LOCK TABLES `blog` WRITE;
/*!40000 ALTER TABLE `blog` DISABLE KEYS */;
INSERT INTO `blog` VALUES (3,187,'2020-03-11 11:50:17','piet','<p>pietfghgh</p>','fgfgfgfg'),(4,12,'2020-03-24 00:00:00','g','g','gfdgdgdf'),(5,12,'2020-03-17 09:22:58','lorem ipsum','<p>Bold</p>\r\n<p><em>Cursief</em></p>\r\n<p style=\"text-align: right;\"><em>aan de rechter kant</em></p>','gfdgdfgdgf'),(6,12,'2020-03-10 10:36:00','gfgfgf','gfgfgf','gdfgdfgdfgdfgdf'),(7,187,'2020-04-06 13:21:28','fefeas','<p>feaf</p>','gdfgdfgdfgdf'),(8,12,'2020-03-23 08:24:18','dfafda','dfafdaf','hhhhhhhh'),(9,13,'2020-03-09 11:37:34','afdafdafda','<p>fdadf</p>','fgfggtrrrr'),(22,12,'2020-03-06 13:20:39','upload test','<p>fffff</p>','fffff'),(23,12,'2020-03-06 13:22:24','lorem ipsum','<p>ffff</p>','fffff'),(44,12,'2020-03-06 14:18:54','cc','<p>cc</p>','cc'),(46,13,'2020-04-06 13:23:26','twee','<p>php</p>','php'),(47,12,'2020-03-06 14:38:06','php','<p>php</p>','php'),(48,12,'2020-03-06 14:39:17','php','<p>php</p>','php'),(49,12,'2020-03-06 14:40:16','php','<p>php</p>','php'),(50,12,'2020-03-06 14:40:38','php','<p>php</p>','php'),(51,12,'2021-03-06 14:42:42','php','<p>php</p>','php'),(56,13,'2020-03-09 14:51:10','sssssss','<p>ssssssssssss</p>','ssssssssss'),(89,13,'2020-03-09 15:40:47','testTitle','<p>testSlug</p>','testInleiding'),(148,187,'2020-03-11 11:27:04','chandelier','<p>chandelier</p>','chandelier'),(152,187,'2020-03-11 11:31:36','marry you','<p>marry you</p>','marry you'),(153,187,'2020-03-11 11:33:08','marry you','<p>marry you</p>','marry you'),(167,12,'2020-03-16 17:24:47','dddddddd','<p>ddddddd</p>','dddddd'),(168,187,'2020-03-17 09:47:01','Asset test','<p>Dit is voor de gekke enige echte moker stoeren Asset test</p>','Asset test'),(189,187,'2020-03-17 13:15:46','fffff','<p>&lt;p&gt;even testen toch&lt;/p&gt;</p>','ffff'),(190,12,'2020-03-17 13:40:53','testTitle','<p>some html</p>','testInleiding'),(191,12,'2020-03-17 13:42:47','testTitle','<p>even testen html</p>','testInleiding'),(349,187,'2020-03-23 14:20:59','testTitle','<p>even testen html</p>','testInleiding'),(350,12,'2020-03-23 14:21:23','testTitle','<p>even testen html</p>','testInleiding'),(351,187,'2020-03-23 14:37:00','testTitle','<p>even testen html</p>','testInleiding'),(352,12,'2020-03-23 14:37:24','testTitle','<p>even testen html</p>','testInleiding'),(353,187,'2020-04-06 11:15:12','testTitle','<p>even testen html</p>','testInleiding'),(354,13,'2020-04-06 11:18:00','testTitle','<p>even testen html</p>','testInleiding'),(355,13,'2020-04-06 12:12:08','testTitle','<p>even testen html</p>','testInleiding'),(357,187,'2020-04-06 12:17:51','testTitle','<p>even testen html</p>','testInleiding'),(358,187,'2020-04-06 13:19:57','testTitle','<p>even testen html</p>','testInleiding'),(359,13,'2020-04-06 13:22:41','testTitle','<p>even testen html</p>','testInleiding');
/*!40000 ALTER TABLE `blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL,
  `publish_date` datetime NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk-comment-blog_id` (`blog_id`),
  CONSTRAINT `fk-comment-blog_id` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=302 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (13,3,'2020-03-09 09:25:53','hh','hh'),(14,51,'2020-03-09 11:20:11','f','5'),(15,3,'2020-03-09 11:32:32','pietje toch','ja dat was pietje dit is een heel goed verhaal. Ik luister best veel muziek. Naya rivera is best een mooie vrouw, toch vind ik heather morris knapper. Zij heeft een meer natuurlijke look, geen van deze beide vrouwen kunnen op tegen piet hoor'),(16,7,'2020-03-09 11:34:26','??','leer typen man\r\n'),(46,46,'2020-03-09 11:34:37','php','jatoch php'),(97,7,'2020-03-17 09:03:03','gekkeTitle','gekkeSlug'),(98,7,'2020-03-17 09:04:28','gekkeTitle','gekkeSlug'),(99,7,'2020-03-17 09:05:29','gekkeTitle','gekkeSlug'),(100,3,'2020-03-17 09:34:21','testTitle','testSlug'),(101,168,'2020-03-17 09:47:18','Wow mooi verhaal','Jij bent echt super retarted'),(102,7,'2020-03-17 10:14:35','gekkeTitle','gekkeSlug'),(103,3,'2020-03-17 10:15:19','testTitle','testSlug'),(108,7,'2020-03-17 10:31:11','gekkeTitle','gekkeSlug'),(109,3,'2020-03-17 10:31:53','testTitle','testSlug'),(110,7,'2020-03-17 10:39:48','gekkeTitle','gekkeSlug'),(111,3,'2020-03-17 10:40:57','testTitle','testSlug'),(115,7,'2020-03-17 10:52:04','gekkeTitle','gekkeSlug'),(116,3,'2020-03-17 10:52:46','testTitle','testSlug'),(128,7,'2020-03-17 11:38:45','gekkeTitle','gekkeSlug'),(129,3,'2020-03-17 11:40:02','testTitle','testSlug'),(130,7,'2020-03-17 13:44:31','gekkeTitle','gekkeSlug'),(131,7,'2020-03-17 14:00:01','gekkeTitle','gekkeSlug'),(132,3,'2020-03-17 14:01:18','testTitle','testSlug'),(133,7,'2020-03-17 14:03:27','gekkeTitle','gekkeSlug'),(284,7,'2020-03-23 14:21:04','gekkeTitle','gekkeSlug'),(285,3,'2020-03-23 14:22:37','testTitle','testSlug'),(286,7,'2020-03-23 14:37:05','gekkeTitle','gekkeSlug'),(287,3,'2020-03-23 14:38:40','testTitle','testSlug'),(288,7,'2020-04-06 11:15:53','gekkeTitle','gekkeSlug'),(289,3,'2020-04-06 11:34:12','testTitle','testSlug'),(290,7,'2020-04-06 12:18:26','gekkeTitle','gekkeSlug'),(291,7,'2020-04-06 13:20:32','gekkeTitle','gekkeSlug'),(292,3,'2020-04-06 13:26:24','testTitle','testSlug'),(293,3,'2020-04-06 13:50:07','testTitle','testSlug'),(294,3,'2020-04-06 14:10:48','testTitle','testSlug'),(295,3,'2020-04-06 14:39:50','testTitle','testSlug'),(296,3,'2020-04-06 14:56:11','testTitle','testSlug'),(297,3,'2020-04-06 15:14:28','testTitle','testSlug'),(298,3,'2020-04-07 08:55:26','testTitle','testSlug'),(299,3,'2020-04-07 09:22:57','testTitle','testSlug'),(300,3,'2020-04-07 09:39:16','testTitle','testSlug'),(301,3,'2020-04-07 09:56:35','testTitle','testSlug');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1583319862),('m010101_100001_init_comment',1583503749),('m141119_220432_comments',1583505386),('m160629_121330_add_relatedTo_column_to_comment',1583503749),('m161109_092304_rename_comment_table',1583503750),('m161114_094902_add_url_column_to_comment_table',1583503750),('m200304_105641_create_tabel_user',1583319864),('m200304_141705_alter_user_table',1583331493),('m200305_100125_add_blog_table',1583405988),('m200306_100455_add_inleiding_blog',1583489185),('m200306_104825_alter_blog_table',1583491759),('m200306_115644_edit_file_to_attachment',1583495902),('m200306_151844_add_comment_table',1583508148),('m200312_140633_add_attachments_table',1584346695);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `authKey` varchar(255) DEFAULT NULL,
  `accessToken` varchar(255) DEFAULT NULL,
  `accessLevel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=345 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (12,'jantje','$2y$13$5zMhcnAaliGCJFbAmB893e2dZUwjyUOZW/lT5GPomB3bZG113qVbS','hakkerman','hekkermen',99),(13,'piet','$2y$13$Uvvfq/2w5Z.O89DaBn4OneYcVw5OdnNDSJmCyf/NMrreeJoMeae2O','calve','Wisselen',16),(187,'Coen','$2y$13$1vSXhNHDRssihGsRNiCRBOAg8zrFneiEXaYsPxYVNB54aeoNiw/Mm','coen','coen',123),(236,'testUser','$2y$13$YYAwflXbkhUSWlOsQV5xp.clFr.AG52v4WLia4rnNVouF2Q1BGGXu','testAuthKey','testToken',12),(237,'testUser','$2y$13$EGcJDSQreHrtFv1yjDm4tOSI0sxruVd8PBymMN4oeHLfXAAw62eHa','testAuthKey','testToken',12),(344,'testUser','$2y$13$5o5L3MI8FDbsc4uo578qjuWWJGlNOQzrb475kVVVeiny0hYqPH8.y','testAuthKey','testToken',12);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-07  9:57:25
