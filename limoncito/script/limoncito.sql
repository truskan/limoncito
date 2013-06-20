-- MySQL dump 10.13  Distrib 5.5.31, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: limoncito
-- ------------------------------------------------------
-- Server version	5.5.31-0ubuntu0.12.04.1

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
-- Current Database: `limoncito`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `limoncito` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `limoncito`;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ruc` varchar(11) CHARACTER SET utf8 DEFAULT NULL,
  `nombre` tinytext NOT NULL,
  `direccion` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'11234567865','Zadith Alania','Jr. Piura N° 123'),(2,'','Carmen Recuay',''),(3,'','Carmen Recuay',''),(4,'','Carmen Recuay',''),(5,'','Lorena','');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ingredientes` text NOT NULL,
  `total` float NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` VALUES (1,'12*1*4.5/12*4*3/10*3*3.5',125,1),(2,'12*9*4.5',54,1),(3,'12*1*4.5/12*4*3/10*3*3.5',125,1);
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_venta`
--

DROP TABLE IF EXISTS `detalle_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_venta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_evento_mesa` int(11) NOT NULL,
  `fecha` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_venta`
--

LOCK TABLES `detalle_venta` WRITE;
/*!40000 ALTER TABLE `detalle_venta` DISABLE KEYS */;
INSERT INTO `detalle_venta` VALUES (1,3,'1234567896');
/*!40000 ALTER TABLE `detalle_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` tinytext NOT NULL,
  `usuario` tinytext NOT NULL,
  `clave` varchar(32) CHARACTER SET utf8 NOT NULL,
  `email` tinytext,
  `dni` varchar(8) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES (1,'Naydu Leyva','naydu','e10adc3949ba59abbe56e057f20f883e','','12345678');
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento_mesa`
--

DROP TABLE IF EXISTS `evento_mesa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento_mesa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mesa` int(11) NOT NULL,
  `contenido` text NOT NULL,
  `estado` varchar(1) CHARACTER SET utf8 NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento_mesa`
--

LOCK TABLES `evento_mesa` WRITE;
/*!40000 ALTER TABLE `evento_mesa` DISABLE KEYS */;
INSERT INTO `evento_mesa` VALUES (1,1,'1*3/1*1/2*1/6*2','1'),(2,2,'1*3','1'),(3,3,'1*3','0'),(4,4,'1*3','1'),(5,5,'1*3','0'),(6,5,'1*3','1'),(7,5,'1*3','0'),(8,6,'1*3','1');
/*!40000 ALTER TABLE `evento_mesa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingrediente`
--

DROP TABLE IF EXISTS `ingrediente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingrediente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ingrediente` text,
  `stock` int(11) DEFAULT NULL,
  `costo` float DEFAULT NULL,
  `unidad_medida` tinytext NOT NULL,
  `estado` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingrediente`
--

LOCK TABLES `ingrediente` WRITE;
/*!40000 ALTER TABLE `ingrediente` DISABLE KEYS */;
INSERT INTO `ingrediente` VALUES (2,'pescado jurel',12,4.5,'3','1'),(3,'pescado bonito',12,4.5,'3','1'),(4,'papa',12,4.5,'3','1'),(5,'ajos',12,4.5,'3','1'),(6,'kion',12,4.5,'3','1'),(7,'limon',12,4.5,'3','1'),(8,'apio',12,4.5,'3','1'),(9,'pota',12,4.5,'3','1');
/*!40000 ALTER TABLE `ingrediente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto` tinytext,
  `precio_venta` float NOT NULL,
  `costo` float NOT NULL,
  `stock` int(11) NOT NULL,
  `categoria` varchar(1) CHARACTER SET utf8 NOT NULL,
  `descripcion` text,
  `foto` text,
  `estado` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,'Ceviche Simple',7.5,4.5,10,'1','Un delicioso plato de la costa con mucha carne y bla bla bla bla|2,3,4,5,6','img/d_avatar.png','1'),(2,'Ceviche Especial',10,7.5,5,'1','Un delicioso plato de la costa con mucha carne y bla bla bla bla|2,3,4,5,6','img/d_avatar.png','1'),(3,'Ceviche Napolitano',7.5,4.5,8,'1','Un delicioso plato de la costa con mucha carne y bla bla bla bla|2,3,4,5,6','img/d_avatar.png','1'),(4,'Leche de Pantera',10,7.5,5,'1','Un delicioso plato de la costa con mucha carne y bla bla bla bla|2,3,4,5,6','img/d_avatar.png','1'),(5,'Leche de Tigre',5.5,3.5,15,'1','Un delicioso plato de la costa con mucha carne y bla bla bla bla|2,3,4,5,6','img/d_avatar.png','0'),(6,'Parihuela',15.5,10.5,10,'1','Un delicioso plato de la costa con mucha carne y bla bla bla bla|2,3,4,5,6','img/d_avatar.png','1'),(7,'Gaseosa Inca Kola 1.5',4.5,2,15,'0',NULL,NULL,'0'),(8,'Cerveza Pilsen',5,3.5,30,'0',NULL,NULL,'1'),(9,'Cerveza Cristal',4,2.5,35,'0',NULL,NULL,'1'),(10,'Cerveza Cuzquenia',6,4.5,42,'0',NULL,NULL,'1'),(11,'Gaseosa Coca Cola 2.5',6,3.5,22,'0',NULL,NULL,'1');
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proveedor` text NOT NULL,
  `ruc` varchar(11) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (1,'Bodega \"La Pepita\"','12345678900'),(2,'Mercado \"Raez Patino\"','12345678900'),(3,'Mercado Modelo del Sur','12345678923');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidad`
--

DROP TABLE IF EXISTS `unidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prefijo` varchar(50) CHARACTER SET utf8 NOT NULL,
  `nombre` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidad`
--

LOCK TABLES `unidad` WRITE;
/*!40000 ALTER TABLE `unidad` DISABLE KEYS */;
INSERT INTO `unidad` VALUES (1,'Unid','Unidad'),(2,'Lt','Litro'),(3,'Kg','Kilogramo'),(4,'Porc','Porcentaje'),(5,'Caj','Cajas');
/*!40000 ALTER TABLE `unidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_documento` int(11) NOT NULL,
  `tipo_documento` varchar(1) CHARACTER SET utf8 DEFAULT NULL,
  `fecha` varchar(11) CHARACTER SET utf8 NOT NULL,
  `forma_pago` varchar(1) CHARACTER SET utf8 NOT NULL,
  `total_venta` float NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_mesa` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` VALUES (1,12345678,'0','12345678998','0',7.5,1,1,3),(2,12345678,'0','12345678998','0',7.5,1,1,5),(3,12345678,'0','12345678998','0',7.5,1,1,7);
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-06-19 21:04:34
