-- MySQL dump 10.11
--
-- Host: localhost    Database: postgrado_uni
-- ------------------------------------------------------
-- Server version	5.0.51b-community-nt-log

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
-- Table structure for table `adm_users`
--

DROP TABLE IF EXISTS `adm_users`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `adm_users` (
  `username` varchar(50) NOT NULL default '',
  `password` blob,
  `nombre` varchar(100) default NULL,
  `foto` varchar(20) default NULL,
  `cod_unidad` varchar(10) default NULL,
  `nivel` int(11) default NULL,
  PRIMARY KEY  (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `adm_users`
--

LOCK TABLES `adm_users` WRITE;
/*!40000 ALTER TABLE `adm_users` DISABLE KEYS */;
INSERT INTO `adm_users` VALUES ('ctic','k…¥†{T$Á‡&¢ç}∏«','CTIC','123456.jpg','FIEE',1);
/*!40000 ALTER TABLE `adm_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `info_institucion`
--

DROP TABLE IF EXISTS `info_institucion`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `info_institucion` (
  `id` int(11) NOT NULL auto_increment,
  `nombre` varchar(50) default NULL,
  `direccion` varchar(100) default NULL,
  `telefono` varchar(20) default NULL,
  `web` varchar(100) default NULL,
  `mail` varchar(50) default NULL,
  `logo` varchar(20) default NULL,
  `notas` varchar(200) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `info_institucion`
--

LOCK TABLES `info_institucion` WRITE;
/*!40000 ALTER TABLE `info_institucion` DISABLE KEYS */;
INSERT INTO `info_institucion` VALUES (1,'CTIC','Av. Tupac Amaru','123456','paginaweb.com','correo@cticuni.pe','1_11621.jpeg','notas del ctic');
/*!40000 ALTER TABLE `info_institucion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programa_academico`
--

DROP TABLE IF EXISTS `programa_academico`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `programa_academico` (
  `codigo` varchar(50) NOT NULL default '',
  `tipo` varchar(50) default NULL,
  `nombre` varchar(50) default NULL,
  `facultad` varchar(50) default NULL,
  `resolucion` varchar(50) default NULL,
  `fecha` varchar(50) default NULL,
  `pdf` varchar(50) default NULL,
  `estado` varchar(50) default NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `programa_academico`
--

LOCK TABLES `programa_academico` WRITE;
/*!40000 ALTER TABLE `programa_academico` DISABLE KEYS */;
/*!40000 ALTER TABLE `programa_academico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_cursos`
--

DROP TABLE IF EXISTS `tb_cursos`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `tb_cursos` (
  `codigo_curso` varchar(20) NOT NULL,
  `nombre_curso` varchar(100) default NULL,
  `metodologia` varchar(45) default NULL,
  `modalidad` varchar(45) default NULL,
  `nro_creditos` decimal(5,2) default NULL,
  `created_at` timestamp NULL default NULL,
  `updated_at` timestamp NULL default NULL,
  PRIMARY KEY  (`codigo_curso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `tb_cursos`
--

LOCK TABLES `tb_cursos` WRITE;
/*!40000 ALTER TABLE `tb_cursos` DISABLE KEYS */;
INSERT INTO `tb_cursos` VALUES ('10','hola','1','3','123.50','2015-11-25 02:40:58','2015-11-25 02:41:32'),('123','Curso de prueba','1','1','10.00','2015-11-25 02:39:36','2015-11-25 02:39:36');
/*!40000 ALTER TABLE `tb_cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_grupos`
--

DROP TABLE IF EXISTS `tb_grupos`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `tb_grupos` (
  `id_grupo` int(11) NOT NULL auto_increment,
  `nombre_grupo` varchar(45) default NULL,
  `descripcion` varchar(200) default NULL,
  PRIMARY KEY  (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `tb_grupos`
--

LOCK TABLES `tb_grupos` WRITE;
/*!40000 ALTER TABLE `tb_grupos` DISABLE KEYS */;
INSERT INTO `tb_grupos` VALUES (1,'Superadministrador','Cuenta con todos los provilegios'),(2,'Coordinador','Cuenta de los coordinadores de facultad'),(3,'Profesor',NULL),(4,'Alumno',NULL);
/*!40000 ALTER TABLE `tb_grupos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_plan_estudio`
--

DROP TABLE IF EXISTS `tb_plan_estudio`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `tb_plan_estudio` (
  `codigo_plan` varchar(20) NOT NULL,
  `nombre_plan_estudio` varchar(100) NOT NULL,
  `id_programa` varchar(20) default NULL,
  `fecha_aprobacion` datetime default NULL,
  `nro_resolucion` varchar(20) default NULL,
  `id_pdf_resolucion` varchar(20) default NULL,
  `estado` tinyint(1) default NULL,
  `metodologia` varchar(45) default NULL,
  `nro_ciclos` int(11) default NULL,
  `nro_creditos_obligatorios` int(11) default NULL,
  `nro_creditos_electivos` int(11) default NULL,
  `created_at` timestamp NULL default NULL,
  `updated_at` timestamp NULL default NULL,
  `nombre_pdf_resolucion` varchar(200) default NULL,
  PRIMARY KEY  (`codigo_plan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `tb_plan_estudio`
--

LOCK TABLES `tb_plan_estudio` WRITE;
/*!40000 ALTER TABLE `tb_plan_estudio` DISABLE KEYS */;
INSERT INTO `tb_plan_estudio` VALUES ('123456','Plan de estudios','FIEE','2015-11-12 00:00:00','123','123456_18516.pdf',0,'2',6,10,10,'2015-11-25 01:39:58','2015-11-25 01:41:01','DIAGNOSTICO Y VALIDACION DE COMPETENCIAS.pdf'),('123456789','pLAN DE ESTUDIOS 2','FIEE','2015-11-05 00:00:00','555','123456789_22033.pdf',0,'3',10,5,5,'2015-11-25 01:41:50','2015-11-25 01:42:23','CIRCUITOS DOMESTICOS SEGUROS.pdf');
/*!40000 ALTER TABLE `tb_plan_estudio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_programa_academico`
--

DROP TABLE IF EXISTS `tb_programa_academico`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `tb_programa_academico` (
  `codigo` varchar(20) NOT NULL default '',
  `id_tipo_programa` int(10) unsigned NOT NULL,
  `nombre_programa` varchar(200) default NULL,
  `id_unidad` varchar(10) default NULL,
  `fecha_aprobacion` datetime default NULL,
  `nro_resolucion` varchar(20) default NULL,
  `id_pdf_resolucion` varchar(20) default NULL,
  `estado_programa` tinyint(1) default NULL,
  `created_at` timestamp NULL default NULL,
  `updated_at` timestamp NULL default NULL,
  `nombre_pdf_resolucion` varchar(100) default NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `tb_programa_academico`
--

LOCK TABLES `tb_programa_academico` WRITE;
/*!40000 ALTER TABLE `tb_programa_academico` DISABLE KEYS */;
INSERT INTO `tb_programa_academico` VALUES ('MACA001',1,'Maestria en ciencias','1','2015-08-20 00:00:00','123456789','MACA001_22926.pdf',1,'0000-00-00 00:00:00','2015-11-25 00:42:12','397_descarga-COACHING.pdf'),('MACA002',1,'Programa de prueba','FIEE','2013-12-31 00:00:00','123',NULL,0,'2015-11-25 00:26:06','2015-11-25 00:26:06',NULL);
/*!40000 ALTER TABLE `tb_programa_academico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_tipo_documento`
--

DROP TABLE IF EXISTS `tb_tipo_documento`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `tb_tipo_documento` (
  `id_tipo_documento` int(11) NOT NULL auto_increment,
  `tipo_documento` varchar(45) default NULL,
  PRIMARY KEY  (`id_tipo_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `tb_tipo_documento`
--

LOCK TABLES `tb_tipo_documento` WRITE;
/*!40000 ALTER TABLE `tb_tipo_documento` DISABLE KEYS */;
INSERT INTO `tb_tipo_documento` VALUES (1,'DNI'),(2,'Can? de Extranjer?a'),(3,'Pasaporte');
/*!40000 ALTER TABLE `tb_tipo_documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_tipo_programa`
--

DROP TABLE IF EXISTS `tb_tipo_programa`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `tb_tipo_programa` (
  `id_tipo_programa` int(10) unsigned NOT NULL auto_increment,
  `tipo_programa` varchar(45) NOT NULL,
  PRIMARY KEY  (`id_tipo_programa`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `tb_tipo_programa`
--

LOCK TABLES `tb_tipo_programa` WRITE;
/*!40000 ALTER TABLE `tb_tipo_programa` DISABLE KEYS */;
INSERT INTO `tb_tipo_programa` VALUES (1,'Maestr?a'),(2,'Doctorado'),(3,'Diplomado');
/*!40000 ALTER TABLE `tb_tipo_programa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_unidad`
--

DROP TABLE IF EXISTS `tb_unidad`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `tb_unidad` (
  `nombre_unidad` varchar(100) NOT NULL,
  `codigo` varchar(10) NOT NULL default '',
  PRIMARY KEY  (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `tb_unidad`
--

LOCK TABLES `tb_unidad` WRITE;
/*!40000 ALTER TABLE `tb_unidad` DISABLE KEYS */;
INSERT INTO `tb_unidad` VALUES ('Facultad de Arquitectura Urbanismo y Arte','FAUA'),('Facultad de Ciencias','FC'),('Facultad de Ingenier?a Ambiental','FIA'),('Facultad de Ingenier?a Civ?l','FIC'),('Facultad de Ingenieria Electrica y Electronica','FIEE'),('F. Ingenier?a Econ?mica, Estad?stica y Ciencias Sociales','FIEECS'),('F. Ingener?a Geol?gica Minera y Metalurgia','FIGMM'),('Facultad de Ingenier?a industrial y Sistemas','FIIS'),('Facultad de Ingenier?a Mec?nica ','FIM'),('F.Ingenier?a de Petroleo Gas Natural y Petroqu?mica','FIP'),('Facultad de Ingenier?a Qu?mica y Text?l','FIQT');
/*!40000 ALTER TABLE `tb_unidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_usuarios`
--

DROP TABLE IF EXISTS `tb_usuarios`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `tb_usuarios` (
  `id_usuario` int(11) NOT NULL auto_increment,
  `username` varchar(45) default NULL,
  `password` blob,
  `nombres` varchar(100) default NULL,
  `apellido_paterno` varchar(100) default NULL,
  `apellido_materno` varchar(100) default NULL,
  `id_grupo` int(11) NOT NULL,
  `id_unidad` varchar(10) default NULL,
  `id_tipo_documento` int(11) NOT NULL,
  `nro_documento` varchar(20) default NULL,
  `sexo` varchar(20) default NULL,
  `fecha_nacimiento` date default NULL,
  `direccion` varchar(200) default NULL,
  `referencia` varchar(200) default NULL,
  `telefono` varchar(20) default NULL,
  `celular` varchar(20) default NULL,
  `correo_personal` varchar(100) default NULL,
  `correo_uni` varchar(100) default NULL,
  `created_at` timestamp NULL default NULL,
  `updated_at` timestamp NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `last_login` timestamp NULL default NULL,
  PRIMARY KEY  (`id_usuario`),
  KEY `fk_tb_usuarios_tb_tipo_documento1_idx` (`id_tipo_documento`),
  KEY `fk_tb_usuarios_tb_grupos1_idx` (`id_grupo`),
  KEY `fk_tb_usuarios_tb_unidad1_idx` (`id_unidad`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `tb_usuarios`
--

LOCK TABLES `tb_usuarios` WRITE;
/*!40000 ALTER TABLE `tb_usuarios` DISABLE KEYS */;
INSERT INTO `tb_usuarios` VALUES (1,'gpaoli','k…¥†{T$Á‡&¢ç}∏«','Giancarlo','Paoli','Rosas',1,'FIEE',1,'42867509','Masculino','1985-03-09','Ca. Mendiburu 960 - Miraflores','Alt. Av El Ejercito Cdra 9','3630597','998102921','giancarlopaoli@gmail.com','gpaoli@uni.edu.pe','2015-11-18 21:10:01','2015-11-24 22:01:48',NULL),(2,'jfuertes','k…¥†{T$Á‡&¢ç}∏«','PaJair','Fuertes','Lino',4,'FIEE',3,'71948276','Masculino','1994-08-31','cualquier cosa 666',NULL,'2015-11-18 16:27:39',NULL,'jfuertesl2@gmail.com',NULL,'2015-11-18 21:10:01','2015-11-24 22:01:56',NULL),(5,'mfigueroa','k…¥†{T$Á‡&¢ç}∏«','Manuel','Figueroa','Hoces',1,'FIEE',1,'45420910','Masculino','1988-09-27','Urb. Santa Isolina Mz F Lt 44 - Comas',NULL,'956411224','956411224','manuel.f27@hotmail.com','manuel.figueroa@uni.edu.pe','2015-11-23 19:36:24','2015-11-24 22:02:04',NULL),(6,'dantevidal','k…¥†{T$Á‡&¢ç}∏«','Dante','Vidal','Tueros',2,'FIEE',1,'70440138','Masculino','1989-12-13','Av. Las Dunas',NULL,'990467367','990467367','dvt@hotmail.com','dvt@uni.edu.pe','0000-00-00 00:00:00','2015-11-24 22:02:23',NULL);
/*!40000 ALTER TABLE `tb_usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidades`
--

DROP TABLE IF EXISTS `unidades`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `unidades` (
  `codigo` varchar(10) NOT NULL default '',
  `nombre` varchar(100) default NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `unidades`
--

LOCK TABLES `unidades` WRITE;
/*!40000 ALTER TABLE `unidades` DISABLE KEYS */;
INSERT INTO `unidades` VALUES ('FIEE','Facultad de Ingenieria Electronica y Electrica');
/*!40000 ALTER TABLE `unidades` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-11-25  3:34:23
