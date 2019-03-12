-- MySQL dump 10.13  Distrib 5.6.39, for Linux (x86_64)
--
-- Host: localhost    Database: emunicach
-- ------------------------------------------------------
-- Server version	5.6.39-cll-lve

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
-- Table structure for table `contenido`
--

DROP TABLE IF EXISTS `contenido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contenido` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descrip` text COLLATE utf8_unicode_ci NOT NULL,
  `conten` text COLLATE utf8_unicode_ci NOT NULL,
  `idmenu` tinyint(3) unsigned DEFAULT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT '0',
  `registrado_por` smallint(5) unsigned NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado_por` smallint(5) unsigned DEFAULT NULL,
  `fecha_modificacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contenido`
--

LOCK TABLES `contenido` WRITE;
/*!40000 ALTER TABLE `contenido` DISABLE KEYS */;
/*!40000 ALTER TABLE `contenido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `groups_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'ADMINISTRADOR','{\"users\":1}','2015-07-10 09:00:00','2015-07-10 09:00:00'),(2,'NORMAL',NULL,'2015-07-16 08:35:29','2015-07-16 08:35:29');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` smallint(5) unsigned NOT NULL DEFAULT '0',
  `estatus` tinyint(1) NOT NULL DEFAULT '1',
  `registrado_por` smallint(5) unsigned NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado_por` smallint(5) unsigned DEFAULT NULL,
  `fecha_modificacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (11,'imagen2.jpg',1,1,1,'2015-08-10 22:16:02',NULL,NULL),(13,'logo_isc.jpg',2,1,1,'2015-08-11 17:15:53',NULL,NULL),(18,'convocatoria.jpg',3,1,1,'2016-01-04 16:55:02',NULL,NULL),(19,'11401190_961815977201907_4107061209733815983_n.jpg',0,1,1,'2016-01-04 17:10:56',NULL,NULL);
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `padre` tinyint(3) unsigned DEFAULT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT '0',
  `registrado_por` smallint(5) unsigned NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado_por` smallint(5) unsigned DEFAULT NULL,
  `fecha_modificacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'EMunicach',0,1,1,'2015-07-28 01:35:52',1,'2015-08-03 04:54:52'),(12,'Licenciaturas ',0,1,1,'2015-07-30 05:11:53',1,'2015-08-10 18:10:51'),(18,'Licenciatura en Música ',12,1,1,'2015-08-06 15:25:38',NULL,NULL),(22,'Extensión ',0,1,1,'2015-08-06 15:27:51',NULL,NULL);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2012_12_06_225921_migration_cartalyst_sentry_install_users',1),('2012_12_06_225929_migration_cartalyst_sentry_install_groups',1),('2012_12_06_225945_migration_cartalyst_sentry_install_users_groups_pivot',1),('2012_12_06_225988_migration_cartalyst_sentry_install_throttle',1),('2015_07_10_020858_create_menu_table',2),('2015_07_10_020940_create_contenido_table',2),('2015_07_17_062213_create_menu_table',3),('2015_07_17_062240_create_contenido_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noticias`
--

DROP TABLE IF EXISTS `noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noticias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enlace` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `noticia` text COLLATE utf8_unicode_ci NOT NULL,
  `estatus` tinyint(1) NOT NULL DEFAULT '0',
  `registrado_por` smallint(5) unsigned NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado_por` smallint(5) unsigned DEFAULT NULL,
  `fecha_modificacion` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticias`
--

LOCK TABLES `noticias` WRITE;
/*!40000 ALTER TABLE `noticias` DISABLE KEYS */;
INSERT INTO `noticias` VALUES (7,'INSCRIPCIONES GRATIS','http://www.google.com','<p>EN ESTE MES SE PUEDE TENER INSCRIPCIONES <span style=\"color: rgb(84, 141, 212);\">GRATIS</span></p><p><span style=\"color: rgb(84, 141, 212);\"><br></span></p><p><img src=\"http://www.emunicach.ittg.mx/img/6c8884660d53cef87bb11045871b01b8.jpg\" width=\"115\" height=\"119\" alt=\"\" style=\"width: 115px; height: 119px; display: block; margin: auto;\"></p>',1,1,'2015-08-11 17:07:27',1,'2015-08-31 16:36:52'),(8,'nueva noticia','','<p><strong>7o Congreso Nacional de Maestros de Canto</strong></p><p><strong><em>23 - 25 Enero 2016</em></strong></p><p>El próximo año se llevará a cabo el 7to Congreso Nacional de Maestros de Canto, en las instalaciones de la Escuela de Música de la Univesidad de Ciencias y Artes de Chiapas, sede Tuxtla Gutiérrez. </p>',0,1,'2015-08-14 07:26:34',NULL,NULL),(12,'noticia2','','<p>noticia22222</p>',0,5,'2016-01-12 03:24:19',NULL,NULL);
/*!40000 ALTER TABLE `noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `throttle`
--

DROP TABLE IF EXISTS `throttle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `throttle` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `attempts` int(11) NOT NULL DEFAULT '0',
  `suspended` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `last_attempt_at` timestamp NULL DEFAULT NULL,
  `suspended_at` timestamp NULL DEFAULT NULL,
  `banned_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `throttle_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `throttle`
--

LOCK TABLES `throttle` WRITE;
/*!40000 ALTER TABLE `throttle` DISABLE KEYS */;
INSERT INTO `throttle` VALUES (19,1,'189.132.202.49',0,0,0,NULL,NULL,NULL),(20,5,'189.132.202.49',2,0,0,'2015-08-04 06:35:04',NULL,NULL),(21,6,'189.132.202.49',0,0,0,NULL,NULL,NULL),(22,1,'189.132.214.135',0,0,0,NULL,NULL,NULL),(23,5,'189.132.214.135',0,0,0,NULL,NULL,NULL),(24,1,'187.188.174.46',0,0,0,NULL,NULL,NULL),(25,5,'187.188.174.46',0,0,0,NULL,NULL,NULL),(26,1,'189.236.126.21',0,0,0,NULL,NULL,NULL),(27,1,'189.132.165.15',0,0,0,NULL,NULL,NULL),(28,5,'189.132.165.15',0,0,0,NULL,NULL,NULL),(29,1,'187.217.218.174',0,0,0,'2015-08-07 21:20:44',NULL,NULL),(30,7,'187.188.174.46',0,0,0,NULL,NULL,NULL),(31,1,'189.236.86.199',0,0,0,NULL,NULL,NULL),(32,1,'187.175.64.23',0,0,0,NULL,NULL,NULL),(33,8,'187.175.64.23',0,0,0,NULL,NULL,NULL),(34,1,'189.236.69.237',0,0,0,NULL,NULL,NULL),(35,1,'189.236.12.206',0,0,0,NULL,NULL,NULL),(36,1,'189.132.143.128',0,0,0,NULL,NULL,NULL),(37,1,'189.132.168.183',0,0,0,NULL,NULL,NULL),(38,1,'189.236.38.244',0,0,0,NULL,NULL,NULL),(39,1,'189.236.89.95',0,0,0,NULL,NULL,NULL),(40,1,'187.157.36.66',0,0,0,NULL,NULL,NULL),(41,1,'189.132.188.183',0,0,0,NULL,NULL,NULL),(42,1,'189.236.82.104',0,0,0,NULL,NULL,NULL),(43,1,'177.231.233.156',0,0,0,NULL,NULL,NULL),(44,1,'189.132.128.56',0,0,0,NULL,NULL,NULL),(45,1,'189.132.128.231',0,0,0,NULL,NULL,NULL),(46,1,'189.132.190.27',0,0,0,NULL,NULL,NULL),(47,1,'187.191.10.105',0,0,0,NULL,NULL,NULL),(48,1,'189.132.167.244',0,0,0,NULL,NULL,NULL),(49,1,'189.236.94.202',0,0,0,NULL,NULL,NULL),(50,1,'200.68.136.234',0,0,0,NULL,NULL,NULL),(51,1,'189.236.40.17',0,0,0,NULL,NULL,NULL),(52,1,'189.132.183.65',0,0,0,NULL,NULL,NULL),(53,8,'189.132.183.65',0,0,0,NULL,NULL,NULL),(54,1,'189.236.68.209',0,0,0,NULL,NULL,NULL),(55,1,'189.236.4.251',0,0,0,NULL,NULL,NULL),(56,5,'189.236.4.251',0,0,0,NULL,NULL,NULL),(57,1,'187.191.10.97',1,0,0,'2016-10-21 03:28:00',NULL,NULL);
/*!40000 ALTER TABLE `throttle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8_unicode_ci,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activated_at` timestamp NULL DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `persist_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reset_password_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_activation_code_index` (`activation_code`),
  KEY `users_reset_password_code_index` (`reset_password_code`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','$2y$10$c3T0HUVYrmu07ZT4H7lLg.bVs5Ag0XthdbN8uKpCEcoJxllvZbiTa',NULL,1,NULL,NULL,'2016-01-12 10:25:18','$2y$10$4UT7OnK2gkYN9ODP5UxqXuvMKTaAHumS91qKODT.BUXP4s6/FLKxO',NULL,'Roberto Hernandez','GRAMAJO','2015-07-10 09:00:00','2016-01-12 10:25:18'),(5,'neto','$2y$10$acmuwusmeJzUQ73XjmhAy.kqhBwYt6OhvJfraN6DOII/MnEpSthLW','{\"12.update\":1,\"12.delete\":1}',1,NULL,NULL,'2016-01-12 10:23:49','$2y$10$Y4fCA4eYS7kideP2uAWbNeTPaBbwDM57vWUh/OCpK3TsKPsp4mVJG',NULL,'ERNESTO GRAMAJO',NULL,'2015-08-03 10:01:21','2016-01-12 10:25:53'),(7,'usuario','$2y$10$Gzv/7TRBAgdlDTfkU2e52uUZ16XDqrnSnOE.VDphtkg.IKuE1zndW','{\"1.create\":1,\"1.update\":1,\"16.update\":1,\"1.delete\":1}',1,NULL,NULL,'2015-08-07 22:56:30','$2y$10$MWb1BPSGNAI99XTGV4QdNucLd.qo9opmn8gRhnBuZalr0aDnnVS0S',NULL,'Gisela Aguilar',NULL,'2015-08-07 22:56:04','2016-01-05 00:14:01'),(8,'pepe','$2y$10$mWNBun1ddzflxXZNaTV36uQDZ3YOX3zyt1fBr4NkH/C5tqCWiDgGa','{\"noticias.create\":1,\"noticias.update\":1,\"noticias.delete\":1}',1,NULL,NULL,'2016-01-06 09:46:56','$2y$10$Ii8udiDlUtmSlD5sBBRpteBGLqFkPVVIYO3EwsQBEMyVOFdn0Erri',NULL,'jose trinidad',NULL,'2016-01-05 00:15:35','2016-01-07 23:25:49');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `user_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (1,1),(2,2),(3,2),(4,2),(5,2),(6,2),(7,2),(8,2),(9,2);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-19 16:47:20
