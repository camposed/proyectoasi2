-- MySQL dump 10.13  Distrib 5.7.12, for osx10.9 (x86_64)
--
-- Host: localhost    Database: asi2
-- ------------------------------------------------------
-- Server version	5.7.13

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


create database asi2;

use asi2;

--
-- Table structure for table `actividad`
--

DROP TABLE IF EXISTS `actividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actividad` (
  `id_actividad` int(11) NOT NULL,
  `actividad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_actividad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividad`
--

LOCK TABLES `actividad` WRITE;
/*!40000 ALTER TABLE `actividad` DISABLE KEYS */;
/*!40000 ALTER TABLE `actividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actividad_planificada`
--

DROP TABLE IF EXISTS `actividad_planificada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actividad_planificada` (
  `id_actividad_planificacion` int(11) NOT NULL,
  `tipo` enum('U','P') DEFAULT NULL COMMENT 'U=> Unica\nP=> Periodica',
  `fecha_inicio` varchar(45) DEFAULT NULL,
  `fecha_final` varchar(45) DEFAULT NULL,
  `periodicidad` varchar(45) DEFAULT NULL,
  `dias` varchar(15) DEFAULT NULL,
  `id_plan` int(11) DEFAULT NULL,
  `id_ruta` int(11) DEFAULT NULL,
  `actividad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_actividad_planificacion`),
  KEY `id_actividad_fk_idx` (`actividad`),
  KEY `id_plan_fk_idx` (`id_plan`),
  KEY `fk_actividad_planificada_ruta_idx` (`id_ruta`),
  CONSTRAINT `fk_actividad_planificada_ruta` FOREIGN KEY (`id_ruta`) REFERENCES `ruta` (`id_ruta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_actividad_fk` FOREIGN KEY (`actividad`) REFERENCES `actividad` (`id_actividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_plan_fk` FOREIGN KEY (`id_plan`) REFERENCES `plan` (`id_plan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividad_planificada`
--

LOCK TABLES `actividad_planificada` WRITE;
/*!40000 ALTER TABLE `actividad_planificada` DISABLE KEYS */;
/*!40000 ALTER TABLE `actividad_planificada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `automor_equipo`
--

DROP TABLE IF EXISTS `automor_equipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `automor_equipo` (
  `id_automor` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  PRIMARY KEY (`id_automor`,`id_equipo`),
  KEY `id_equipo_idx` (`id_equipo`),
  CONSTRAINT `id_automotor` FOREIGN KEY (`id_automor`) REFERENCES `automotor` (`id_automotor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_equipo` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `automor_equipo`
--

LOCK TABLES `automor_equipo` WRITE;
/*!40000 ALTER TABLE `automor_equipo` DISABLE KEYS */;
/*!40000 ALTER TABLE `automor_equipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `automotor`
--

DROP TABLE IF EXISTS `automotor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `automotor` (
  `id_automotor` int(11) NOT NULL,
  `placa` varchar(45) DEFAULT NULL,
  `modelo` int(11) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `capacidad` varchar(45) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `chasis` varchar(45) DEFAULT NULL,
  `color` int(11) DEFAULT NULL,
  `numero_motor` varchar(45) DEFAULT NULL,
  `combustible` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_automotor`),
  KEY `id_modelo_fk_idx` (`modelo`),
  KEY `id_tipo_fk_idx` (`tipo`),
  KEY `id_estado_fk_idx` (`estado`),
  KEY `id_color_fk_idx` (`color`),
  KEY `id_combustible_fk_idx` (`combustible`),
  CONSTRAINT `id_color_fk` FOREIGN KEY (`color`) REFERENCES `color` (`id_color`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_combustible_fk` FOREIGN KEY (`combustible`) REFERENCES `combustible` (`id_combustible`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_estado_fk` FOREIGN KEY (`estado`) REFERENCES `estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_modelo_fk` FOREIGN KEY (`modelo`) REFERENCES `modelo` (`id_modelo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_tipo_fk` FOREIGN KEY (`tipo`) REFERENCES `tipo` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `automotor`
--

LOCK TABLES `automotor` WRITE;
/*!40000 ALTER TABLE `automotor` DISABLE KEYS */;
/*!40000 ALTER TABLE `automotor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `automotor_historial`
--

DROP TABLE IF EXISTS `automotor_historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `automotor_historial` (
  `id_automotor_historial` int(11) NOT NULL,
  `automotor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_automotor_historial`),
  KEY `automotor_idx` (`automotor`),
  CONSTRAINT `automotor` FOREIGN KEY (`automotor`) REFERENCES `automotor` (`id_automotor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `automotor_historial`
--

LOCK TABLES `automotor_historial` WRITE;
/*!40000 ALTER TABLE `automotor_historial` DISABLE KEYS */;
/*!40000 ALTER TABLE `automotor_historial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `activo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalogo_tabla`
--

DROP TABLE IF EXISTS `catalogo_tabla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogo_tabla` (
  `id_catalogo_tabla` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_catalogo_tabla`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogo_tabla`
--

LOCK TABLES `catalogo_tabla` WRITE;
/*!40000 ALTER TABLE `catalogo_tabla` DISABLE KEYS */;
/*!40000 ALTER TABLE `catalogo_tabla` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colonia`
--

DROP TABLE IF EXISTS `colonia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colonia` (
  `id_colonia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `id_distrito` int(11) NOT NULL,
  PRIMARY KEY (`id_colonia`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  KEY `fk_colonia_distrito1_idx` (`id_distrito`),
  CONSTRAINT `fk_colonia_distrito1` FOREIGN KEY (`id_distrito`) REFERENCES `distrito` (`id_distrito`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colonia`
--

LOCK TABLES `colonia` WRITE;
/*!40000 ALTER TABLE `colonia` DISABLE KEYS */;
/*!40000 ALTER TABLE `colonia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `color` (
  `id_color` int(11) NOT NULL,
  `color` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_color`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color`
--

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `combustible`
--

DROP TABLE IF EXISTS `combustible`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `combustible` (
  `id_combustible` int(11) NOT NULL,
  `combustible` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_combustible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `combustible`
--

LOCK TABLES `combustible` WRITE;
/*!40000 ALTER TABLE `combustible` DISABLE KEYS */;
/*!40000 ALTER TABLE `combustible` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dia_asueto`
--

DROP TABLE IF EXISTS `dia_asueto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dia_asueto` (
  `id_dia_asueto` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `plan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_dia_asueto`),
  KEY `id_plan_idx` (`plan`),
  CONSTRAINT `id_plan` FOREIGN KEY (`plan`) REFERENCES `plan` (`id_plan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dia_asueto`
--

LOCK TABLES `dia_asueto` WRITE;
/*!40000 ALTER TABLE `dia_asueto` DISABLE KEYS */;
/*!40000 ALTER TABLE `dia_asueto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distrito`
--

DROP TABLE IF EXISTS `distrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distrito` (
  `id_distrito` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_distrito`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distrito`
--

LOCK TABLES `distrito` WRITE;
/*!40000 ALTER TABLE `distrito` DISABLE KEYS */;
/*!40000 ALTER TABLE `distrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `direccion` varchar(500) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `fnacimiento` datetime NOT NULL,
  `cargo` int(11) NOT NULL,
  PRIMARY KEY (`id_empleado`),
  KEY `id_cargo_fk_idx` (`cargo`),
  CONSTRAINT `id_cargo_fk` FOREIGN KEY (`cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entrega`
--

DROP TABLE IF EXISTS `entrega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entrega` (
  `id_entrega` int(11) NOT NULL,
  `tonelada` varchar(45) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_orden_trabajo` int(11) NOT NULL,
  PRIMARY KEY (`id_entrega`),
  KEY `entrega_orden_trabajo_fk_idx` (`id_orden_trabajo`),
  CONSTRAINT `entrega_orden_trabajo_fk` FOREIGN KEY (`id_orden_trabajo`) REFERENCES `orden_trabajo` (`id_orden_trabajo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrega`
--

LOCK TABLES `entrega` WRITE;
/*!40000 ALTER TABLE `entrega` DISABLE KEYS */;
/*!40000 ALTER TABLE `entrega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipo`
--

DROP TABLE IF EXISTS `equipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipo` (
  `id_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) NOT NULL,
  `estado` enum('A','I') DEFAULT 'A',
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_plan` int(11) NOT NULL,
  PRIMARY KEY (`id_equipo`),
  KEY `fk_equipo_plan1_idx` (`id_plan`),
  CONSTRAINT `fk_equipo_plan1` FOREIGN KEY (`id_plan`) REFERENCES `plan` (`id_plan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipo`
--

LOCK TABLES `equipo` WRITE;
/*!40000 ALTER TABLE `equipo` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `id_tabla` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_estado`),
  KEY `id_tabla_idx` (`id_tabla`),
  CONSTRAINT `id_tabla` FOREIGN KEY (`id_tabla`) REFERENCES `catalogo_tabla` (`id_catalogo_tabla`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fuente`
--

DROP TABLE IF EXISTS `fuente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fuente` (
  `id_fuente` int(11) NOT NULL,
  `fuente` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_fuente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fuente`
--

LOCK TABLES `fuente` WRITE;
/*!40000 ALTER TABLE `fuente` DISABLE KEYS */;
/*!40000 ALTER TABLE `fuente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `herramienta`
--

DROP TABLE IF EXISTS `herramienta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `herramienta` (
  `id_herramienta` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `activo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_herramienta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `herramienta`
--

LOCK TABLES `herramienta` WRITE;
/*!40000 ALTER TABLE `herramienta` DISABLE KEYS */;
/*!40000 ALTER TABLE `herramienta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_usuario`
--

DROP TABLE IF EXISTS `log_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_usuario` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accion` varchar(500) NOT NULL,
  PRIMARY KEY (`id_log`),
  KEY `id_usuario_fk_idx` (`usuario`),
  CONSTRAINT `id_usuario_fk` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_usuario`
--

LOCK TABLES `log_usuario` WRITE;
/*!40000 ALTER TABLE `log_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marca`
--

DROP TABLE IF EXISTS `marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `marca` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marca`
--

LOCK TABLES `marca` WRITE;
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `label` varchar(45) NOT NULL,
  `url` varchar(500) NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_menu`),
  KEY `rol_menu_fk_idx` (`id_rol`),
  KEY `menu_menu_fk_idx` (`id_parent`),
  CONSTRAINT `menu_menu_fk` FOREIGN KEY (`id_parent`) REFERENCES `menu` (`id_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `rol_menu_fk` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modelo`
--

DROP TABLE IF EXISTS `modelo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modelo` (
  `id_modelo` int(11) NOT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `marca` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_modelo`),
  KEY `id_marca_fk_idx` (`marca`),
  CONSTRAINT `id_marca_fk` FOREIGN KEY (`marca`) REFERENCES `marca` (`id_marca`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modelo`
--

LOCK TABLES `modelo` WRITE;
/*!40000 ALTER TABLE `modelo` DISABLE KEYS */;
/*!40000 ALTER TABLE `modelo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_actividad`
--

DROP TABLE IF EXISTS `orden_actividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden_actividad` (
  `id_orden_actividad` int(11) NOT NULL,
  `id_orden` int(11) DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL,
  `dias` enum('LU','MA','MI','JU','VI','SA','DO') DEFAULT NULL,
  `fecha_inicio` varchar(45) DEFAULT NULL,
  `fecha_final` varchar(45) DEFAULT NULL,
  `periodicidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_orden_actividad`),
  KEY `id_orden_idx` (`id_orden`),
  KEY `id_actividad_idx` (`id_actividad`),
  CONSTRAINT `id_actividad` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_orden` FOREIGN KEY (`id_orden`) REFERENCES `orden_trabajo` (`id_orden_trabajo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_actividad`
--

LOCK TABLES `orden_actividad` WRITE;
/*!40000 ALTER TABLE `orden_actividad` DISABLE KEYS */;
/*!40000 ALTER TABLE `orden_actividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_automotor`
--

DROP TABLE IF EXISTS `orden_automotor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden_automotor` (
  `id_orden_automotor` int(11) NOT NULL,
  `km_inicial` varchar(45) DEFAULT NULL,
  `km_final` varchar(45) DEFAULT NULL,
  `codigo_vale` varchar(45) DEFAULT '-',
  `monto` decimal(18,2) DEFAULT '0.00',
  `id_orden` int(11) DEFAULT NULL,
  `id_automotor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_orden_automotor`),
  KEY `id_orden_fk_idx` (`id_orden`),
  KEY `id_automotor_fk_idx` (`id_automotor`),
  CONSTRAINT `id_automotor_fk` FOREIGN KEY (`id_automotor`) REFERENCES `automotor` (`id_automotor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_orden_fk` FOREIGN KEY (`id_orden`) REFERENCES `orden_trabajo` (`id_orden_trabajo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_automotor`
--

LOCK TABLES `orden_automotor` WRITE;
/*!40000 ALTER TABLE `orden_automotor` DISABLE KEYS */;
/*!40000 ALTER TABLE `orden_automotor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_empleado`
--

DROP TABLE IF EXISTS `orden_empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden_empleado` (
  `id_empleado` int(11) NOT NULL,
  `id_orden` int(11) NOT NULL,
  `observaciones` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`,`id_orden`),
  KEY `id_orden_fk_idx` (`id_orden`),
  KEY `id_empleado_fk_idx` (`id_empleado`),
  CONSTRAINT `ord_empleado_empleado_fk` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ord_empleado_orden_fk` FOREIGN KEY (`id_orden`) REFERENCES `orden_trabajo` (`id_orden_trabajo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_empleado`
--

LOCK TABLES `orden_empleado` WRITE;
/*!40000 ALTER TABLE `orden_empleado` DISABLE KEYS */;
/*!40000 ALTER TABLE `orden_empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_herramienta`
--

DROP TABLE IF EXISTS `orden_herramienta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden_herramienta` (
  `id_orden_herramienta` int(11) NOT NULL,
  `id_orden` int(11) DEFAULT NULL,
  `id_herramienta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_orden_herramienta`),
  KEY `orde_herramienta_orden_fk_idx` (`id_orden`),
  KEY `orde_herramienta_herramienta_fk_idx` (`id_herramienta`),
  CONSTRAINT `orde_herramienta_herramienta_fk` FOREIGN KEY (`id_herramienta`) REFERENCES `herramienta` (`id_herramienta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `orde_herramienta_orden_fk` FOREIGN KEY (`id_orden`) REFERENCES `orden_trabajo` (`id_orden_trabajo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_herramienta`
--

LOCK TABLES `orden_herramienta` WRITE;
/*!40000 ALTER TABLE `orden_herramienta` DISABLE KEYS */;
/*!40000 ALTER TABLE `orden_herramienta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_trabajo`
--

DROP TABLE IF EXISTS `orden_trabajo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden_trabajo` (
  `id_orden_trabajo` int(11) NOT NULL,
  `orden_trabajo` varchar(45) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_final` datetime DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `solicitud` int(11) DEFAULT NULL,
  `actividad` int(11) DEFAULT NULL,
  `actividad_planificacion` int(11) DEFAULT NULL,
  `hora_inicio` time(6) DEFAULT NULL,
  `hora_final` time(6) DEFAULT NULL,
  `id_equipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_orden_trabajo`),
  KEY `ord_trabajo_equipo_fk_idx` (`id_equipo`),
  CONSTRAINT `ord_trabajo_equipo_fk` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_trabajo`
--

LOCK TABLES `orden_trabajo` WRITE;
/*!40000 ALTER TABLE `orden_trabajo` DISABLE KEYS */;
/*!40000 ALTER TABLE `orden_trabajo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal` (
  `id_equipo` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `estado` enum('A') DEFAULT 'A',
  PRIMARY KEY (`id_equipo`,`id_empleado`),
  KEY `equipo_personal_fk_idx` (`id_empleado`),
  CONSTRAINT `equipo_personal_fk` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `personal_equipo_fk` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plan`
--

DROP TABLE IF EXISTS `plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plan` (
  `id_plan` int(11) NOT NULL,
  `fecha_inicia` datetime NOT NULL,
  `fecha_final` datetime NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` enum('R','A','C') DEFAULT NULL,
  PRIMARY KEY (`id_plan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plan`
--

LOCK TABLES `plan` WRITE;
/*!40000 ALTER TABLE `plan` DISABLE KEYS */;
/*!40000 ALTER TABLE `plan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(45) NOT NULL,
  `activo` char(1) NOT NULL DEFAULT 'A' COMMENT '		',
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ruta`
--

DROP TABLE IF EXISTS `ruta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ruta` (
  `id_ruta` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_ruta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ruta`
--

LOCK TABLES `ruta` WRITE;
/*!40000 ALTER TABLE `ruta` DISABLE KEYS */;
/*!40000 ALTER TABLE `ruta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ruta_colonia`
--

DROP TABLE IF EXISTS `ruta_colonia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ruta_colonia` (
  `id_ruta_colonia` int(11) NOT NULL,
  `id_ruta` int(11) NOT NULL,
  `id_colonia` int(11) NOT NULL,
  `orden` smallint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_ruta_colonia`),
  KEY `ruta_colonia_ruta_fk_idx` (`id_ruta`),
  KEY `ruta_colonia_colonia_idx` (`id_colonia`),
  CONSTRAINT `ruta_colonia_colonia` FOREIGN KEY (`id_colonia`) REFERENCES `colonia` (`id_colonia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ruta_colonia_ruta_fk` FOREIGN KEY (`id_ruta`) REFERENCES `ruta` (`id_ruta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ruta_colonia`
--

LOCK TABLES `ruta_colonia` WRITE;
/*!40000 ALTER TABLE `ruta_colonia` DISABLE KEYS */;
/*!40000 ALTER TABLE `ruta_colonia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitud`
--

DROP TABLE IF EXISTS `solicitud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitud` (
  `id_solicitud` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `observacion` varchar(45) DEFAULT NULL,
  `id_estado` int(11) NOT NULL,
  `id_fuente` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `referencia` varchar(45) DEFAULT NULL,
  `id_ruta` int(11) NOT NULL,
  PRIMARY KEY (`id_solicitud`),
  KEY `solicitud_estado_fk_idx` (`id_estado`),
  KEY `solicitud_fuente_fk_idx` (`id_fuente`),
  KEY `solicitud_ruta_fk_idx` (`id_ruta`),
  CONSTRAINT `solicitud_estado_fk` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `solicitud_fuente_fk` FOREIGN KEY (`id_fuente`) REFERENCES `fuente` (`id_fuente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `solicitud_ruta_fk` FOREIGN KEY (`id_ruta`) REFERENCES `ruta` (`id_ruta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitud`
--

LOCK TABLES `solicitud` WRITE;
/*!40000 ALTER TABLE `solicitud` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicitud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo`
--

LOCK TABLES `tipo` WRITE;
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` enum('A','B') DEFAULT 'A',
  `id_empleado` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  KEY `fk_usuario_empleado1_idx` (`id_empleado`),
  CONSTRAINT `fk_usuario_empleado1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_rol`
--

DROP TABLE IF EXISTS `usuario_rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_rol` (
  `id_rol` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_rol`,`id_usuario`),
  KEY `id_usuario_rol_usuario_fk_idx` (`id_usuario`),
  CONSTRAINT `id_usuario_rol_rol_fk` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_usuario_rol_usuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_rol`
--

LOCK TABLES `usuario_rol` WRITE;
/*!40000 ALTER TABLE `usuario_rol` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario_rol` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-28  7:23:03
