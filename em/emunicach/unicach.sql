-- MySQL dump 10.13  Distrib 5.6.24, for Win64 (x86_64)
--
-- Host: 107.170.186.55    Database: unicach
-- ------------------------------------------------------
-- Server version	5.5.32-0ubuntu7

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
-- Table structure for table `admgrupo`
--

DROP TABLE IF EXISTS `admgrupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admgrupo` (
  `idadmgrupo` int(11) NOT NULL AUTO_INCREMENT,
  `fh` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `grupo` varchar(250) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idadmgrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admgrupo`
--

LOCK TABLES `admgrupo` WRITE;
/*!40000 ALTER TABLE `admgrupo` DISABLE KEYS */;
INSERT INTO `admgrupo` VALUES (1,'2016-08-08 05:56:55','ADMINISTRADOR','',1),(2,'2016-08-08 05:56:55','DIRECTOR','',1),(3,'2016-08-08 05:56:55','ACADEMICO','',1),(4,'2016-08-08 05:56:55','MANTENIMIENTO','',1),(5,'2016-08-08 05:56:56','DOCENTE','',1),(6,'2016-08-08 05:56:56','ESTUDIANTE','',1);
/*!40000 ALTER TABLE `admgrupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admmodulo`
--

DROP TABLE IF EXISTS `admmodulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admmodulo` (
  `idadmmodulo` int(11) NOT NULL AUTO_INCREMENT,
  `fh` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fk_admmodulop` int(11) DEFAULT NULL,
  `modulo` varchar(250) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idadmmodulo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admmodulo`
--

LOCK TABLES `admmodulo` WRITE;
/*!40000 ALTER TABLE `admmodulo` DISABLE KEYS */;
INSERT INTO `admmodulo` VALUES (1,'2016-08-08 06:11:42',NULL,'DASHBOARD',1),(2,'2016-08-08 06:11:42',NULL,'MI CUENTA / INFORMACION',1),(3,'2016-08-08 06:11:42',NULL,'GRUPOS / REGISTRAR',1),(4,'2016-08-08 06:11:42',NULL,'GRUPOS / LISTADO DE GRUPOS',1),(5,'2016-08-08 06:11:43',NULL,'CICLO ESCOLAR / REGISTRAR',1),(6,'2016-08-08 06:11:43',NULL,'CICLO ESCOLAR / LISTADO DE CICLOS ESCOLARES',1),(7,'2016-08-08 06:11:43',NULL,'SALONES / REGISTRAR',1),(8,'2016-08-08 06:11:43',NULL,'SALONES / LISTADO DE SALONES',1),(9,'2016-08-08 06:11:43',NULL,'USUARIOS / USUARIOS NUEVOS',1),(10,'2016-08-11 14:48:51',NULL,'DOCENTES / LISTADO DE DOCENTES',1),(11,'2016-08-11 14:48:51',NULL,'MATERIAS / LISTADO DE MATERIAS',1);
/*!40000 ALTER TABLE `admmodulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admpermiso`
--

DROP TABLE IF EXISTS `admpermiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admpermiso` (
  `idadmpermiso` int(11) NOT NULL AUTO_INCREMENT,
  `fkgrupo` int(11) NOT NULL,
  `fkmodulo` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idadmpermiso`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admpermiso`
--

LOCK TABLES `admpermiso` WRITE;
/*!40000 ALTER TABLE `admpermiso` DISABLE KEYS */;
INSERT INTO `admpermiso` VALUES (1,1,1,1),(2,1,2,1),(3,1,3,1),(4,1,4,1),(5,1,5,1),(6,1,6,1),(7,1,7,1),(8,1,8,1),(9,1,9,1),(10,3,1,1),(11,3,2,1),(12,3,3,1),(13,3,4,1),(14,3,9,1),(15,4,1,1),(16,4,2,1),(17,4,3,1),(18,4,4,1),(19,4,5,1),(20,4,6,1),(21,4,7,1),(22,4,8,1),(23,6,1,1),(24,6,2,1);
/*!40000 ALTER TABLE `admpermiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admusuariogrupo`
--

DROP TABLE IF EXISTS `admusuariogrupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admusuariogrupo` (
  `idadmusuariogrupo` int(11) NOT NULL AUTO_INCREMENT,
  `fkgrupo` int(11) NOT NULL,
  `fkusuario` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idadmusuariogrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admusuariogrupo`
--

LOCK TABLES `admusuariogrupo` WRITE;
/*!40000 ALTER TABLE `admusuariogrupo` DISABLE KEYS */;
INSERT INTO `admusuariogrupo` VALUES (1,1,1,1),(2,6,4,1),(3,6,5,1),(4,6,6,1),(5,6,7,1),(6,6,8,1);
/*!40000 ALTER TABLE `admusuariogrupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admusuariomodulo`
--

DROP TABLE IF EXISTS `admusuariomodulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admusuariomodulo` (
  `idadmusuariomodulo` int(11) NOT NULL AUTO_INCREMENT,
  `fkmodulo` int(11) NOT NULL,
  `fkusuario` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idadmusuariomodulo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admusuariomodulo`
--

LOCK TABLES `admusuariomodulo` WRITE;
/*!40000 ALTER TABLE `admusuariomodulo` DISABLE KEYS */;
/*!40000 ALTER TABLE `admusuariomodulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cicloescolar`
--

DROP TABLE IF EXISTS `cicloescolar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cicloescolar` (
  `idcicloescolar` int(11) NOT NULL AUTO_INCREMENT,
  `fh` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ciclo` varchar(250) NOT NULL,
  `finscripcioni` date NOT NULL,
  `finscripcionf` date NOT NULL,
  `fcicloi` date NOT NULL,
  `fciclof` date NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idcicloescolar`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cicloescolar`
--

LOCK TABLES `cicloescolar` WRITE;
/*!40000 ALTER TABLE `cicloescolar` DISABLE KEYS */;
INSERT INTO `cicloescolar` VALUES (1,'2016-08-08 05:41:01','2016','2016-08-01','2016-08-16','2016-09-01','2016-12-01',1);
/*!40000 ALTER TABLE `cicloescolar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo`
--

DROP TABLE IF EXISTS `grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupo` (
  `idgrupo` int(11) NOT NULL AUTO_INCREMENT,
  `fh` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `k` varchar(100) NOT NULL,
  `cvegrupo` varchar(50) NOT NULL,
  `fkcicloescolar` int(11) NOT NULL,
  `fkmodalidad` int(11) NOT NULL,
  `fkofertaeducativa` int(11) NOT NULL,
  `fkturno` int(11) NOT NULL,
  `cupo` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idgrupo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo`
--

LOCK TABLES `grupo` WRITE;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
INSERT INTO `grupo` VALUES (1,'2016-08-08 05:43:56','Z8D0A741701AB1E1331B47A98B1898EE','LMJ2016-2',1,3,2,1,30,1);
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupousuario`
--

DROP TABLE IF EXISTS `grupousuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupousuario` (
  `idgrupousuario` int(11) NOT NULL AUTO_INCREMENT,
  `fh` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fkgrupo` int(11) NOT NULL,
  `fkusuario` int(11) NOT NULL,
  `refbanco` varchar(50) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idgrupousuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupousuario`
--

LOCK TABLES `grupousuario` WRITE;
/*!40000 ALTER TABLE `grupousuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupousuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modalidad`
--

DROP TABLE IF EXISTS `modalidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modalidad` (
  `idmodalidad` int(11) NOT NULL AUTO_INCREMENT,
  `fh` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modalidad` varchar(250) NOT NULL,
  `descripcion` varchar(5000) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idmodalidad`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modalidad`
--

LOCK TABLES `modalidad` WRITE;
/*!40000 ALTER TABLE `modalidad` DISABLE KEYS */;
INSERT INTO `modalidad` VALUES (1,'2016-08-04 04:21:20','INFANTIL',NULL,1),(2,'2016-08-02 02:01:47','PRE-UNIVERSITARIO',NULL,1),(3,'2016-08-04 04:21:20','LICENCIATURA',NULL,1);
/*!40000 ALTER TABLE `modalidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ofertaeducativa`
--

DROP TABLE IF EXISTS `ofertaeducativa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ofertaeducativa` (
  `idofertaeducativa` int(11) NOT NULL AUTO_INCREMENT,
  `fh` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nombre` varchar(250) NOT NULL,
  `descripcion` varchar(5000) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idofertaeducativa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ofertaeducativa`
--

LOCK TABLES `ofertaeducativa` WRITE;
/*!40000 ALTER TABLE `ofertaeducativa` DISABLE KEYS */;
INSERT INTO `ofertaeducativa` VALUES (1,'2016-08-02 01:59:00','MUSICA CLASICA',NULL,1),(2,'2016-08-02 01:59:00','MUSICA JAZZ',NULL,1);
/*!40000 ALTER TABLE `ofertaeducativa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salon`
--

DROP TABLE IF EXISTS `salon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salon` (
  `idsalon` int(11) NOT NULL AUTO_INCREMENT,
  `fh` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `salon` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `ubicacion` varchar(500) NOT NULL,
  `cupo` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idsalon`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salon`
--

LOCK TABLES `salon` WRITE;
/*!40000 ALTER TABLE `salon` DISABLE KEYS */;
INSERT INTO `salon` VALUES (1,'2016-08-03 16:30:18','A','Salón de usos múltiples.','EDIFICIO 1',45,1),(2,'2016-08-03 16:39:34','B','Salón principal.','EDIFICIO 1 PLANTA ALTA',45,1),(3,'2016-08-03 16:50:27','C','Salón estandar.','EDIFICIO 1',15,1);
/*!40000 ALTER TABLE `salon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turno`
--

DROP TABLE IF EXISTS `turno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turno` (
  `idturno` int(11) NOT NULL AUTO_INCREMENT,
  `fh` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `turno` varchar(150) NOT NULL,
  `descripcion` varchar(2500) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idturno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turno`
--

LOCK TABLES `turno` WRITE;
/*!40000 ALTER TABLE `turno` DISABLE KEYS */;
INSERT INTO `turno` VALUES (1,'2016-08-02 02:55:02','MATUTINO','',1),(2,'2016-08-02 02:55:02','VESPERTINO','',1);
/*!40000 ALTER TABLE `turno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `fh` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `k` varchar(45) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'2016-08-11 03:14:42','C8D0A741701AB1E1331B47A98B1898EE','Admin','General','admin@hotmail.com','827ccb0eea8a706c4c34a16891f84e7b',1),(2,'2016-08-03 20:59:47','1B5CCBBEF8502E2AC0F3867EB172FC8E','Jose','Perez','mantenimiento@hotmail.com','827ccb0eea8a706c4c34a16891f84e7b',1),(3,'2016-08-06 04:23:08','A56DEFA3EF0B6DF89B90460F165FF52B','Docente','Normal','docente@hotmail.com','827ccb0eea8a706c4c34a16891f84e7b',1),(4,'2016-08-11 03:46:33','169604706551D4D54725F7128010DFD5','Juanito','Torres','estudiante@hotmail.com','827ccb0eea8a706c4c34a16891f84e7b',1),(5,'2016-08-09 17:16:34','597AE44C1C6D362399D414AA8C342838','Alejandro','Hernàndez Arce','alejandro02_70@hotmail.com','25d55ad283aa400af464c76d713c07ad',1),(6,'2016-08-11 03:47:19','D515DB3754D4104FD56CC980C291987C','Academico','Titular','academico@hotmail.com','827ccb0eea8a706c4c34a16891f84e7b',1),(7,'2016-08-11 03:48:30','1052502A0BD9E115BBF3F98A63C393FE','Director','De La Escuela','director@hotmail.com','827ccb0eea8a706c4c34a16891f84e7b',1),(8,'2016-08-11 05:03:38','03FDF0A1E852AB6EC972B5F83D57E33D','Daniel Eduardo','Aguilar Soto','aguilasoto_@hotmail.com','fcea920f7412b5da7be0cf42b8c93759',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuariodet`
--

DROP TABLE IF EXISTS `usuariodet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuariodet` (
  `idusuariodet` int(11) NOT NULL AUTO_INCREMENT,
  `fh` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fkusuario` varchar(45) NOT NULL,
  `fnacimiento` date NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `direccion` varchar(500) DEFAULT NULL,
  `ciudad` varchar(250) DEFAULT NULL,
  `estado` varchar(250) DEFAULT NULL,
  `cp` varchar(25) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idusuariodet`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuariodet`
--

LOCK TABLES `usuariodet` WRITE;
/*!40000 ALTER TABLE `usuariodet` DISABLE KEYS */;
INSERT INTO `usuariodet` VALUES (1,'2016-08-11 03:20:20','1','1987-10-20','M','cerrada rosa','tuxtla','chiapas','29000','12345',1);
/*!40000 ALTER TABLE `usuariodet` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-11 10:11:45
