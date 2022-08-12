-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: veterinaria
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `con_serv`
--

DROP TABLE IF EXISTS `con_serv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `con_serv` (
  `reg_cs` int(11) NOT NULL AUTO_INCREMENT,
  `consulta` int(11) DEFAULT NULL,
  `servicio` int(11) DEFAULT NULL,
  PRIMARY KEY (`reg_cs`),
  KEY `fk_cons_cs` (`consulta`),
  KEY `fk_serv_cs` (`servicio`),
  CONSTRAINT `fk_cons_cs` FOREIGN KEY (`consulta`) REFERENCES `consultas` (`cons_id`),
  CONSTRAINT `fk_serv_cs` FOREIGN KEY (`servicio`) REFERENCES `servicios` (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1026 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `con_serv`
--

LOCK TABLES `con_serv` WRITE;
/*!40000 ALTER TABLE `con_serv` DISABLE KEYS */;
INSERT INTO `con_serv` VALUES (1000,1000,1000),(1001,1001,1000),(1002,1002,1000),(1003,1003,1000),(1004,1004,1000),(1005,1005,1000),(1006,1006,1000),(1007,1007,1000),(1008,1008,1000),(1009,1009,1000),(1010,1010,1000),(1011,1011,1000),(1012,1012,1000),(1013,1013,1000),(1014,1000,1001),(1015,1001,1002),(1016,1002,1003),(1017,1003,1004),(1018,1004,1005),(1019,1005,1005),(1020,1006,1004),(1021,1007,1003),(1022,1008,1002),(1023,1009,1001),(1024,1010,1002),(1025,1015,1000);
/*!40000 ALTER TABLE `con_serv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consultas`
--

DROP TABLE IF EXISTS `consultas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consultas` (
  `cons_id` int(11) NOT NULL AUTO_INCREMENT,
  `veterinario` int(11) DEFAULT NULL,
  `mascota` int(11) DEFAULT NULL,
  `fecha_consulta` date DEFAULT NULL,
  `hora_consulta` time DEFAULT NULL,
  `peso` char(15) CHARACTER SET utf8 NOT NULL,
  `temperatura` varchar(15) CHARACTER SET utf8 NOT NULL,
  `sintomas` varchar(100) NOT NULL,
  `operado` char(2) CHARACTER SET utf8 NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `sucursal` int(11) DEFAULT NULL,
  `tipo_pago` varchar(11) NOT NULL,
  `monto_total` decimal(10,0) NOT NULL,
  PRIMARY KEY (`cons_id`),
  KEY `fk_veterinario_cons` (`veterinario`),
  KEY `fk_mascota_cons` (`mascota`),
  KEY `fk_cts_cons` (`fecha_consulta`),
  KEY `fk_sucurs_consult` (`sucursal`),
  CONSTRAINT `fk_mascota_cons` FOREIGN KEY (`mascota`) REFERENCES `mascotas` (`m_id`),
  CONSTRAINT `fk_sucurs_consult` FOREIGN KEY (`sucursal`) REFERENCES `sucursal` (`num_s`),
  CONSTRAINT `fk_veterinario_cons` FOREIGN KEY (`veterinario`) REFERENCES `veterinarios` (`v_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1016 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultas`
--

LOCK TABLES `consultas` WRITE;
/*!40000 ALTER TABLE `consultas` DISABLE KEYS */;
INSERT INTO `consultas` VALUES (1000,1001,1000,'2018-02-10','12:30:00','2','36 C','ha estado vomitando y tiene aspecto debil','si','se encuentra mal del estomago',1000,'Efectivo',800),(1001,1000,1001,'2018-02-20','11:30:00','3','37 C','tiene una gran inflamacion en hosico','no','parece estar agonizando',1001,'Efectivo',730),(1002,1002,1002,'2018-02-11','13:00:00','4','38 C','tiene una fiebre muy grave','no','parece tener temperatura',1002,'Tarjeta',600),(1003,1003,1003,'2018-02-13','12:30:00','2','36 C','esta muy caliente y esta debil','si','parece tener fiebre',1000,'Tarjeta',780),(1004,1004,1004,'2018-03-01','13:45:00','1','39 C','esta muy caliente y esta debil','si','parece tener fiebre',1002,'Efectivo',900),(1005,1001,1005,'2018-03-01','12:45:00','.500','40 C','ha estado vomitando y tiene aspecto debil','no','se encuentra mal del estomago',1001,'Tarjeta',842),(1006,1002,1006,'2018-03-02',NULL,'1.5','41 C','tiene una gran inflamacion en hosico','si','parece estar agonizando',1001,'Tarjeta',462),(1007,1003,1007,'2018-03-06',NULL,'2.3','37 C','esta muy caliente y esta debil','no','parece tener fiebre',1000,'Efectivo',500),(1008,1004,1008,'2018-03-15','13:12:00','2.4','38 C','ha estado vomitando y tiene aspecto debil','no','se encuentra mal del estomago',1001,'Tarjeta',685),(1009,1003,1009,'2018-03-17','12:30:00','3.2','37 C','ha estado vomitando mucho','si','se encuentra mal del estomago',1002,'Efectivo',759),(1010,1002,1010,'2018-03-18','18:20:00','2.9','38 C','tiene calentura y esta debil','no','parece tener fiebre',1001,'Tarjeta',800),(1011,1001,1011,'2018-03-19','17:00:00','1.8','37 C','tiene una gran inflamacion en hosico','no','parece estar agonizando',1000,'Efectivo',839),(1012,1000,1012,'2018-03-20','16:48:00','2','39 C','tiene una gran inflamacion en hosico','si','parece estar agonizando',1002,'Tarjeta',810),(1013,1001,1013,'2018-03-20','12:23:00','2.7','40 C','esta muy caliente y esta debil','no','se encuentra mal del estomago',1001,'Efectivo',750),(1015,1002,1010,'2018-04-05','12:00:00','2.8','37 C','la mascota es vomitando mucho','no','necesita medicinas para el estomago',1000,'Tarjeta',700);
/*!40000 ALTER TABLE `consultas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacto`
--

DROP TABLE IF EXISTS `contacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacto` (
  `reg` int(11) NOT NULL AUTO_INCREMENT,
  `numero` char(10) CHARACTER SET utf8 NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `persona` int(11) DEFAULT NULL,
  PRIMARY KEY (`reg`),
  KEY `fk_per_cont` (`persona`),
  CONSTRAINT `fk_per_cont` FOREIGN KEY (`persona`) REFERENCES `persona` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1015 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacto`
--

LOCK TABLES `contacto` WRITE;
/*!40000 ALTER TABLE `contacto` DISABLE KEYS */;
INSERT INTO `contacto` VALUES (1000,'8097482934','fijo',1005),(1001,'5149677214','celular',1006),(1002,'2885929510','fijo',1007),(1003,'6648271694','celular',1008),(1004,'1567708847','fijo',1009),(1005,'8216014079','fijo',1010),(1006,'2532488761','celular',1011),(1007,'8338174513','celular',1012),(1008,'5841748927','celular',1013),(1009,'3516853689','celular',1014),(1010,'7315299256','celular',1015),(1011,'6791525335','celular',1016),(1012,'5828796901','celular',1017),(1013,'9068405811','fijo',1018);
/*!40000 ALTER TABLE `contacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidad`
--

DROP TABLE IF EXISTS `especialidad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especialidad` (
  `es_id` int(11) NOT NULL AUTO_INCREMENT,
  `especialidad` varchar(45) NOT NULL,
  PRIMARY KEY (`es_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1006 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidad`
--

LOCK TABLES `especialidad` WRITE;
/*!40000 ALTER TABLE `especialidad` DISABLE KEYS */;
INSERT INTO `especialidad` VALUES (1000,'cirugano'),(1001,'oncologia'),(1002,'fisioterapia'),(1003,'rehabilitacion'),(1004,'fauna silvestre'),(1005,'especialidad');
/*!40000 ALTER TABLE `especialidad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especies`
--

DROP TABLE IF EXISTS `especies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especies` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `especie` varchar(45) NOT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1002 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especies`
--

LOCK TABLES `especies` WRITE;
/*!40000 ALTER TABLE `especies` DISABLE KEYS */;
INSERT INTO `especies` VALUES (1000,'canino'),(1001,'felino');
/*!40000 ALTER TABLE `especies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mascotas`
--

DROP TABLE IF EXISTS `mascotas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mascotas` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `color` varchar(25) NOT NULL,
  `raza` varchar(30) NOT NULL,
  `rasgos` text DEFAULT NULL,
  `sexo` char(6) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `especie` int(11) DEFAULT NULL,
  PRIMARY KEY (`m_id`),
  KEY `fk_especie` (`especie`),
  KEY `fk_usuario_P` (`usuario`),
  CONSTRAINT `fk_especie` FOREIGN KEY (`especie`) REFERENCES `especies` (`e_id`),
  CONSTRAINT `fk_usuario_P` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1028 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mascotas`
--

LOCK TABLES `mascotas` WRITE;
/*!40000 ALTER TABLE `mascotas` DISABLE KEYS */;
INSERT INTO `mascotas` VALUES (1000,'Westleigh','Yellow','Doberman','Juega Brusco','hembra',1005,1000),(1001,'See','Turquoise','doverman','Distributed empowering concept','macho',1006,1000),(1002,'Ossie','Fuscia','siames','Inverse bandwidth-monitored application','macho',1007,1001),(1003,'Nils','Puce','sanvernardo','Team-oriented zero defect budgetary management','hembra',1008,1000),(1004,'Keary','Aquamarine','siames','Face to face discrete access','hembra',1009,1001),(1005,'Ibrahim','Orange','siames','De-engineered zero tolerance superstructure','macho',1010,1001),(1006,'Westbrook','Purple','labrador','Up-sized regional collaboration','hembra',1011,1000),(1007,'Julina','Yellow','pug','Public-key methodical service-desk','hembra',1012,1000),(1008,'Isaiah','Puce','mestizo','Balanced asynchronous task-force','macho',1013,1001),(1009,'Gago','negro,cafe,blanco','sanvernardo','Synchronised user-facing matrix','macho',1004,1000),(1010,'Daisy','negro,cafe,blanco','doverman','Distributed empowering concept','hembra',1003,1000),(1011,'Luna','cafe claro','siames','Inverse bandwidth-monitored application','hembra',1002,1001),(1012,'Joaquin','cafe','sanvernardo','Team-oriented zero defect budgetary management','macho',1001,1000),(1013,'Negra','negro','siames','Face to face discrete access','hembra',1000,1001);
/*!40000 ALTER TABLE `mascotas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persona` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `contrasena` varchar(500) NOT NULL,
  `rol` char(1) DEFAULT NULL,
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `p_id` (`p_id`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB AUTO_INCREMENT=1020 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1000,'Maxwell','Hickisson','mhickisson0@rediff.com','g9WaXX','v'),(1001,'Jane','Veare','jveare1@google.com.br','8F6r5hWm','v'),(1002,'Timmie','Sommersett','tsommersett2@nsw.gov.au','ZNxGb5r','v'),(1003,'Adiana','Callingham','acallingham3@behance.net','ggfLQy6Z1dgz','d'),(1004,'Corissa','Mustard','cmustard4@xinhuanet.com','FIfA2t','v'),(1005,'Dorrie','Trumble','dtrumble5@cocolog-nifty.com','Kwo2otmJ9c','u'),(1006,'Gibbie','Gravenor','ggravenor6@ycombinator.com','tUy5sJoZeU','u'),(1007,'Brantley','Mowling','bmowling7@dedecms.com','SxGo2T6rp5','u'),(1008,'Dexter','Mulqueen','dmulqueen8@bandcamp.com','KkkAvLxSsFG','u'),(1009,'Meghann','Mingauld','mmingauld9@csmonitor.com','1cn0Yg','u'),(1010,'Inness','Beahan','ibeahana@digg.com','YizVGUf2','u'),(1011,'Stearn','Prettyjohn','sprettyjohnb@w3.org','5gKjBGJ4K4','u'),(1012,'Mathew','Nobriga','mnobrigac@bloglovin.com','9r1UWi','u'),(1013,'Phillipe','Ickowics','pickowicsd@sciencedaily.com','kZAQNxIdmth','u'),(1014,'Bennie','Lukas','blukase@sciencedaily.com','jKwRgPhT5','u'),(1015,'Inger','Walster','iwalsterf@lulu.com','9RY0R0hpH','u'),(1016,'Coreen','Beville','cbevilleg@aol.com','MUyRxef','u'),(1017,'Shurwood','Rosborough','srosboroughh@wikispaces.com','MsdVmI','u'),(1018,'Umeko','Cheeke','ucheekei@ezinearticles.com','Oybl5VKZWeW7','u'),(1019,'rodrigo','perez','elpelao@hotmail.com','qwerty','u');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recetas`
--

DROP TABLE IF EXISTS `recetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recetas` (
  `rec_id` int(11) NOT NULL AUTO_INCREMENT,
  `medicamentos` longtext NOT NULL,
  `prescripcion` longtext NOT NULL,
  `consulta` int(11) DEFAULT NULL,
  PRIMARY KEY (`rec_id`),
  KEY `fk_cons_rct` (`consulta`),
  CONSTRAINT `fk_cons_rct` FOREIGN KEY (`consulta`) REFERENCES `consultas` (`cons_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1019 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recetas`
--

LOCK TABLES `recetas` WRITE;
/*!40000 ALTER TABLE `recetas` DISABLE KEYS */;
INSERT INTO `recetas` VALUES (1000,'antacid cherry flavored','Tomar una cada 8 horas',1001),(1001,'Tri-Sprintec','aplicarlo sobre la herida',1002),(1002,'Chlorpromazine Hydrochloride','aplicarlo sobre la herida',1003),(1003,'Loperamide Hydrochloride','Tomar una cada 8 horas',1004),(1004,'Montelukast Sodium','inyectar a la mascota cada 2 dias',1005),(1005,'clindamycin phosphate','aplicarlo sobre la herida',1006),(1006,'Lamivudine','Tomar una cada 8 horas',1007),(1007,'CLEAR AND CLEAN Neutral pH Antiseptic Hand Wash','aplicarlo sobre la herida',1008),(1008,'severe cold and sinus relief PE','Tomar una cada 8 horas',1009),(1009,'Candida I','Tomar una cada 8 horas',1010),(1010,'PENICILLIN G PROCAINE','aplicarlo sobre la herida',1011),(1011,'Heparin Sodium','aplicarlo sobre la herida',1012),(1012,'Phentermine Hydrochloride','inyectar a la mascota cada 2 dias',1013),(1013,'HAND SANITIZER ALCOHOL FREE','aplicarlo sobre la herida',1000);
/*!40000 ALTER TABLE `recetas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios`
--

DROP TABLE IF EXISTS `servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicios` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `servicio` varchar(40) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1006 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios`
--

LOCK TABLES `servicios` WRITE;
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` VALUES (1000,'consulta'),(1001,'profilaxis'),(1002,'esterilizacion'),(1003,'vacunacion'),(1004,'radiologia'),(1005,'estudios de sangre');
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sucursal`
--

DROP TABLE IF EXISTS `sucursal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sucursal` (
  `num_s` int(11) NOT NULL AUTO_INCREMENT,
  `sucursal` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`num_s`)
) ENGINE=InnoDB AUTO_INCREMENT=1003 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sucursal`
--

LOCK TABLES `sucursal` WRITE;
/*!40000 ALTER TABLE `sucursal` DISABLE KEYS */;
INSERT INTO `sucursal` VALUES (1000,'Veterinaria Huellitas'),(1001,'Veterinaria Excola'),(1002,'Domicilio');
/*!40000 ALTER TABLE `sucursal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `persona` int(11) DEFAULT NULL,
  PRIMARY KEY (`u_id`),
  KEY `fk_persona_u` (`persona`),
  CONSTRAINT `fk_persona_u` FOREIGN KEY (`persona`) REFERENCES `persona` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1014 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1000,1005),(1001,1006),(1002,1007),(1003,1008),(1004,1009),(1005,1010),(1006,1011),(1007,1012),(1008,1013),(1009,1014),(1010,1015),(1011,1016),(1012,1017),(1013,1018);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vet_esp`
--

DROP TABLE IF EXISTS `vet_esp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vet_esp` (
  `veesp_id` int(11) NOT NULL AUTO_INCREMENT,
  `veterinarios` int(11) NOT NULL,
  `especialidades` int(11) NOT NULL,
  PRIMARY KEY (`veesp_id`),
  KEY `fk_veterinarios_id` (`veterinarios`),
  KEY `fk_especialidad_id` (`especialidades`),
  CONSTRAINT `fk_especialidad_id` FOREIGN KEY (`especialidades`) REFERENCES `especialidad` (`es_id`),
  CONSTRAINT `fk_veterinarios_id` FOREIGN KEY (`veterinarios`) REFERENCES `veterinarios` (`v_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1010 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vet_esp`
--

LOCK TABLES `vet_esp` WRITE;
/*!40000 ALTER TABLE `vet_esp` DISABLE KEYS */;
INSERT INTO `vet_esp` VALUES (1000,1000,1000),(1001,1000,1001),(1002,1001,1002),(1003,1001,1003),(1004,1002,1004),(1005,1002,1005),(1006,1003,1004),(1007,1003,1003),(1008,1004,1002),(1009,1004,1001);
/*!40000 ALTER TABLE `vet_esp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `veterinarios`
--

DROP TABLE IF EXISTS `veterinarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `veterinarios` (
  `v_id` int(11) NOT NULL AUTO_INCREMENT,
  `persona` int(11) NOT NULL,
  `cedula` char(13) NOT NULL,
  PRIMARY KEY (`v_id`),
  KEY `fk_p_vet` (`persona`),
  CONSTRAINT `fk_p_vet` FOREIGN KEY (`persona`) REFERENCES `persona` (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1005 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `veterinarios`
--

LOCK TABLES `veterinarios` WRITE;
/*!40000 ALTER TABLE `veterinarios` DISABLE KEYS */;
INSERT INTO `veterinarios` VALUES (1000,1000,'1204536879206'),(1001,1001,'203050416980'),(1002,1002,'2003597846312'),(1003,1003,'0157498632561'),(1004,1004,'1547896326847');
/*!40000 ALTER TABLE `veterinarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-10 11:20:13
