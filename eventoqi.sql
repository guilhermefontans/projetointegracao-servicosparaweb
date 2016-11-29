-- MySQL dump 10.16  Distrib 10.1.19-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: localhost
-- ------------------------------------------------------
-- Server version	10.1.19-MariaDB

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
-- Table structure for table `Aluno`
--

DROP TABLE IF EXISTS `Aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Aluno` (
  `RA` int(11) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Telefone` varchar(12) DEFAULT NULL,
  `Senha` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`RA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Aluno`
--

LOCK TABLES `Aluno` WRITE;
/*!40000 ALTER TABLE `Aluno` DISABLE KEYS */;
INSERT INTO `Aluno` VALUES (20160801,'LARRY PAGE','larry@google.com','5199999991','123456'),(20160802,'ELON MUSK','musk@tesla.com','5199999992','123456'),(20160803,'MICHAEL DELL','dell@dell.com','5199999993','123456');
/*!40000 ALTER TABLE `Aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Equipe`
--

DROP TABLE IF EXISTS `Equipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Equipe` (
  `Id_Equipe` int(11) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Telefone` varchar(12) DEFAULT NULL,
  `Senha` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`Id_Equipe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Equipe`
--

LOCK TABLES `Equipe` WRITE;
/*!40000 ALTER TABLE `Equipe` DISABLE KEYS */;
INSERT INTO `Equipe` VALUES (1,'QUADRADO','QUADRADO@QI.EDU.BR','5199999999','123456'),(2,'MINUZZI','MINUZZI@QI.EDU.BR','5199999999','123456'),(3,'REUS','REUS@QI.EDU.BR','5199999999','123456'),(4,'VIEGAS','VIEGAS@QI.EDU.BR','5199999999','123456'),(5,'LANGER','LANGER@QI.EDU.BR','5199999999','123456');
/*!40000 ALTER TABLE `Equipe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Evento`
--

DROP TABLE IF EXISTS `Evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Evento` (
  `Id_Evento` int(11) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Dt_Inicial_Inscricao` date DEFAULT NULL,
  `Dt_Final_Inscricao` date DEFAULT NULL,
  `Dt_Inicial_Execucao` date DEFAULT NULL,
  `Dt_Final_Execucao` date DEFAULT NULL,
  `Dt_Final_Disponibilidade` date DEFAULT NULL,
  `Dt_Inicio_Disponibilidade` date DEFAULT NULL,
  `Id_Status` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Evento`),
  KEY `Id_Status` (`Id_Status`),
  CONSTRAINT `Evento_ibfk_1` FOREIGN KEY (`Id_Status`) REFERENCES `Status` (`Id_Status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Evento`
--

LOCK TABLES `Evento` WRITE;
/*!40000 ALTER TABLE `Evento` DISABLE KEYS */;
INSERT INTO `Evento` VALUES (1,'SEMANA ACADEMICA','2016-09-01','2016-10-15','2016-11-20','2016-11-24','2016-11-25','2016-11-19',3),(2,'SEMANA DE SEGURAN?A FAQI','2016-10-01','2016-11-15','2016-11-20','2016-11-24','2016-11-25','2016-11-19',1),(3,'EMPREENDEDORISMO','2016-08-01','2016-08-25','2016-11-20','2016-11-24','2016-11-25','2016-11-19',2);
/*!40000 ALTER TABLE `Evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Ministra`
--

DROP TABLE IF EXISTS `Ministra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ministra` (
  `Id_Palestrante` int(11) NOT NULL,
  `Id_Palestra` int(11) NOT NULL,
  PRIMARY KEY (`Id_Palestrante`,`Id_Palestra`),
  KEY `Id_Palestra` (`Id_Palestra`),
  CONSTRAINT `Ministra_ibfk_1` FOREIGN KEY (`Id_Palestrante`) REFERENCES `Palestrante` (`Id_Palestrante`),
  CONSTRAINT `Ministra_ibfk_2` FOREIGN KEY (`Id_Palestra`) REFERENCES `Palestra` (`Id_Palestra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ministra`
--

LOCK TABLES `Ministra` WRITE;
/*!40000 ALTER TABLE `Ministra` DISABLE KEYS */;
INSERT INTO `Ministra` VALUES (1,1),(2,2),(3,3);
/*!40000 ALTER TABLE `Ministra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Palestra`
--

DROP TABLE IF EXISTS `Palestra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Palestra` (
  `Id_Palestra` int(11) NOT NULL,
  `Titulo` varchar(50) DEFAULT NULL,
  `DataHora` datetime(3) DEFAULT NULL,
  `Imagem` varchar(50) DEFAULT NULL,
  `Descricao` longtext,
  `Conteudo` varchar(100) DEFAULT NULL,
  `Id_Evento` int(11) DEFAULT NULL,
  `Id_Sala` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Palestra`),
  KEY `Id_Evento` (`Id_Evento`),
  KEY `Id_Sala` (`Id_Sala`),
  CONSTRAINT `Palestra_ibfk_1` FOREIGN KEY (`Id_Evento`) REFERENCES `Evento` (`Id_Evento`),
  CONSTRAINT `Palestra_ibfk_2` FOREIGN KEY (`Id_Sala`) REFERENCES `Sala` (`Id_Sala`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Palestra`
--

LOCK TABLES `Palestra` WRITE;
/*!40000 ALTER TABLE `Palestra` DISABLE KEYS */;
INSERT INTO `Palestra` VALUES (1,'A INTERNET DAS COISAS','0000-00-00 00:00:00.000',NULL,'A INTERNET DAS COISAS',NULL,1,1),(2,'PRIVACIDADE NA INTERNET 2.0','0000-00-00 00:00:00.000',NULL,'PRIVACIDADE NA INTERNET 2.0',NULL,2,2),(3,'CRIANDO STARTUPS RENTAVEIS','0000-00-00 00:00:00.000',NULL,'CRIANDO STARTUPS RENTAVEIS',NULL,3,3);
/*!40000 ALTER TABLE `Palestra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Palestra_Recurso`
--

DROP TABLE IF EXISTS `Palestra_Recurso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Palestra_Recurso` (
  `Id_Palestra` int(11) NOT NULL,
  `Id_Recurso` int(11) NOT NULL,
  PRIMARY KEY (`Id_Palestra`,`Id_Recurso`),
  KEY `Id_Recurso` (`Id_Recurso`),
  CONSTRAINT `Palestra_Recurso_ibfk_1` FOREIGN KEY (`Id_Palestra`) REFERENCES `Palestra` (`Id_Palestra`),
  CONSTRAINT `Palestra_Recurso_ibfk_2` FOREIGN KEY (`Id_Recurso`) REFERENCES `Recurso` (`Id_Recurso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Palestra_Recurso`
--

LOCK TABLES `Palestra_Recurso` WRITE;
/*!40000 ALTER TABLE `Palestra_Recurso` DISABLE KEYS */;
/*!40000 ALTER TABLE `Palestra_Recurso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Palestrante`
--

DROP TABLE IF EXISTS `Palestrante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Palestrante` (
  `Id_Palestrante` int(11) NOT NULL,
  `Nome` varchar(50) DEFAULT NULL,
  `Minicurriculo` longtext,
  `Foto` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Palestrante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Palestrante`
--

LOCK TABLES `Palestrante` WRITE;
/*!40000 ALTER TABLE `Palestrante` DISABLE KEYS */;
INSERT INTO `Palestrante` VALUES (1,'MARK ZUKERBERG','Mark Elliot Zuckerberg ? um programador e empres?rio norte-americano, que ficou conhecido internacionalmente por ser um dos fundadores do Facebook, a maior rede social do mundo.','zuckerberg.jpg'),(2,'BILL GATES','William Henry Gates III mais conhecido como Bill Gates, ? um magnata, filantropo e autor norte-americano, que ficou conhecido por fundar junto com Paul Allen a Microsoft, a maior e mais conhecida empresa','ill.jpg'),(3,'STEVE JOBS','Steven Paul Jobs foi um inventor, empres?rio e magnata americano no setor da inform?tica. Notabilizou-se como co-fundador, presidente e diretor executivo da Apple Inc.','jobs.jpg');
/*!40000 ALTER TABLE `Palestrante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Participa`
--

DROP TABLE IF EXISTS `Participa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Participa` (
  `RA` int(11) NOT NULL,
  `Id_Palestra` int(11) NOT NULL,
  PRIMARY KEY (`RA`,`Id_Palestra`),
  KEY `Id_Palestra` (`Id_Palestra`),
  CONSTRAINT `Participa_ibfk_1` FOREIGN KEY (`RA`) REFERENCES `Aluno` (`RA`),
  CONSTRAINT `Participa_ibfk_2` FOREIGN KEY (`Id_Palestra`) REFERENCES `Palestra` (`Id_Palestra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Participa`
--

LOCK TABLES `Participa` WRITE;
/*!40000 ALTER TABLE `Participa` DISABLE KEYS */;
INSERT INTO `Participa` VALUES (20160801,1),(20160802,2),(20160803,3);
/*!40000 ALTER TABLE `Participa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Recurso`
--

DROP TABLE IF EXISTS `Recurso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Recurso` (
  `Id_Recurso` int(11) NOT NULL,
  `Descricao` varchar(50) DEFAULT NULL,
  `Quantidade` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id_Recurso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Recurso`
--

LOCK TABLES `Recurso` WRITE;
/*!40000 ALTER TABLE `Recurso` DISABLE KEYS */;
INSERT INTO `Recurso` VALUES (1,'PROJETOR',10),(2,'NOTEBOOK',5),(3,'FLIP CHART',2);
/*!40000 ALTER TABLE `Recurso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Sala`
--

DROP TABLE IF EXISTS `Sala`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Sala` (
  `Id_Sala` int(11) NOT NULL,
  `Descricao` varchar(50) DEFAULT NULL,
  `Adaptada` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`Id_Sala`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Sala`
--

LOCK TABLES `Sala` WRITE;
/*!40000 ALTER TABLE `Sala` DISABLE KEYS */;
INSERT INTO `Sala` VALUES (1,'AUDITORIO POA TERREO','SIM'),(2,'AUDITORIO POA 2? ANDAR','NAO'),(3,'AUDITORIO POA 3? ANDAR','NAO');
/*!40000 ALTER TABLE `Sala` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Status`
--

DROP TABLE IF EXISTS `Status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Status` (
  `Id_Status` int(11) NOT NULL,
  `Descricao` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Status`
--

LOCK TABLES `Status` WRITE;
/*!40000 ALTER TABLE `Status` DISABLE KEYS */;
INSERT INTO `Status` VALUES (1,'Aberto'),(2,'Em andamento'),(3,'Concluido');
/*!40000 ALTER TABLE `Status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Utiliza`
--

DROP TABLE IF EXISTS `Utiliza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Utiliza` (
  `Id_Palestra` int(11) NOT NULL,
  `Id_Equipe` int(11) NOT NULL,
  PRIMARY KEY (`Id_Palestra`,`Id_Equipe`),
  KEY `Id_Equipe` (`Id_Equipe`),
  CONSTRAINT `Utiliza_ibfk_1` FOREIGN KEY (`Id_Palestra`) REFERENCES `Palestra` (`Id_Palestra`),
  CONSTRAINT `Utiliza_ibfk_2` FOREIGN KEY (`Id_Equipe`) REFERENCES `Equipe` (`Id_Equipe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Utiliza`
--

LOCK TABLES `Utiliza` WRITE;
/*!40000 ALTER TABLE `Utiliza` DISABLE KEYS */;
INSERT INTO `Utiliza` VALUES (1,1),(1,2),(2,3),(2,4);
/*!40000 ALTER TABLE `Utiliza` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-29 18:34:50
