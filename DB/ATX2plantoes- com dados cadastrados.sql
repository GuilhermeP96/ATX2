-- MySQL dump 10.13  Distrib 5.7.14, for Win64 (x86_64)
--
-- Host: localhost    Database: ATX2plantoes
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Current Database: `ATX2plantoes`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `ATX2plantoes` /*!40100 DEFAULT CHARACTER SET utf8 */;

FLUSH PRIVILEGES;

CREATE USER IF NOT EXISTS 'ATX2Sys'@'%' IDENTIFIED BY 'SysATX2';


GRANT DELETE ON ATX2plantoes.* TO 'ATX2Sys'@'%';

GRANT INSERT ON ATX2plantoes.* TO 'ATX2Sys'@'%';

GRANT SELECT ON ATX2plantoes.* TO 'ATX2Sys'@'%';

GRANT UPDATE ON ATX2plantoes.* TO 'ATX2Sys'@'%';

GRANT EXECUTE ON ATX2plantoes.* TO 'ATX2Sys'@'%';

GRANT SHOW VIEW ON ATX2plantoes.* TO 'ATX2Sys'@'%';


FLUSH PRIVILEGES;

USE `ATX2plantoes`;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `idCargo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fkidSetor` int(10) unsigned NOT NULL,
  `nomeCargo` varchar(20) NOT NULL,
  PRIMARY KEY (`idCargo`),
  KEY `Setor_FKIndex1` (`fkidSetor`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,1,'Secretário'),(20,32,'AUXILIAR'),(19,31,'ANALISTA'),(18,29,'PROJETOS'),(17,29,'SUPORTE');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa` (
  `idPessoa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `cPF` decimal(11,0) NOT NULL,
  `dataAtualizacao` datetime DEFAULT CURRENT_TIMESTAMP,
  `dataCadastro` datetime DEFAULT CURRENT_TIMESTAMP,
  `fkidCargo` int(10) unsigned NOT NULL,
  `observacoes` varchar(250) DEFAULT NULL,
  `systemUser` varchar(20) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `userAdmin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idPessoa`),
  UNIQUE KEY `cPF` (`cPF`),
  UNIQUE KEY `systemUser` (`systemUser`),
  KEY `Cargo_FKIndex1` (`fkidCargo`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa`
--

LOCK TABLES `pessoa` WRITE;
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
INSERT INTO `pessoa` VALUES (1,'Camila C. G. Souza',12345678998,'2016-12-09 12:22:25','2016-12-09 12:22:25',17,'Tem o comportamento similar ao Mestre dos Magos, aproveitar sua presença ao máximo para tirar dúvidas','Cah','fa44f45cbe3cf2a44f43301d3702e15d',0),(2,'Guilherme Pinheiro',98765432112,'2016-12-09 12:23:03','2016-12-09 12:23:03',18,'Acentos ok','Guilherme','ae653e4f46c5928cc4b4b171efbcf881',1),(4,'Lucas',31264597887,'2016-12-11 14:50:45','2016-12-11 14:50:45',17,'Testar páginas e fazer manuais.','Lucas','b5e49ebd339e525cff5f90bcb36c3012',1),(5,'Gerson',31264597999,'2016-12-11 14:52:13','2016-12-11 14:52:13',1,'Testar páginas e fazer manuais.','Gerson','8a89ab039bb7430b0ce91faee1981953',1),(7,'Leandro',32178912354,'2016-12-11 19:06:05','2016-12-11 19:06:05',18,'Fazer testes','Leandro','afee4ab9e375898568c8cff206b6cff1',1),(6,'Bruno do Prado',19283746569,'2016-12-11 16:13:28','2016-12-11 16:13:28',18,'Testar páginas e fazer manuais.','Bruno','e79f52c92049c4af09fceb25c3ec333c',1),(9,'JOSEFINA DE JESUS',19736845152,'2016-12-12 12:19:17','2016-12-12 12:19:17',19,'PRIMEIRO EMPREGO','JOSEF.JESUS','14a78bce485249b8c1d3c08141b447d8',0);
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plantao`
--

DROP TABLE IF EXISTS `plantao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plantao` (
  `idPlantao` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fkidPessoa` int(11) NOT NULL,
  `fkidTurno` int(11) NOT NULL,
  `dataInício` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `codPlantao` int(11) NOT NULL,
  PRIMARY KEY (`idPlantao`),
  KEY `Pessoa_FKIndex1` (`fkidPessoa`),
  KEY `Turno_FKIndex2` (`fkidTurno`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plantao`
--

LOCK TABLES `plantao` WRITE;
/*!40000 ALTER TABLE `plantao` DISABLE KEYS */;
INSERT INTO `plantao` VALUES (1,1,1,'2016-11-30 02:00:00',1),(2,1,2,'2016-11-30 02:00:00',1),(3,6,6,'2016-12-12 02:00:00',1),(6,2,2,'2016-12-14 02:00:00',1);
/*!40000 ALTER TABLE `plantao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setor`
--

DROP TABLE IF EXISTS `setor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setor` (
  `idSetor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomeSetor` varchar(20) NOT NULL,
  PRIMARY KEY (`idSetor`),
  UNIQUE KEY `nomeSetor` (`nomeSetor`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setor`
--

LOCK TABLES `setor` WRITE;
/*!40000 ALTER TABLE `setor` DISABLE KEYS */;
INSERT INTO `setor` VALUES (1,'Administrativo'),(32,'DESENHISTA TECNICO'),(29,'TI'),(30,'FINANCEIRO'),(31,'RECURSOS HUMANOS');
/*!40000 ALTER TABLE `setor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turno`
--

DROP TABLE IF EXISTS `turno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turno` (
  `idTurno` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomeTurno` varchar(20) DEFAULT NULL,
  `horaInício` time NOT NULL,
  `horaIntervalo` time NOT NULL,
  `tempoIntervalo` time NOT NULL,
  `horaTérmino` time NOT NULL,
  `horasFolga` time NOT NULL,
  PRIMARY KEY (`idTurno`),
  UNIQUE KEY `nomeTurno` (`nomeTurno`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turno`
--

LOCK TABLES `turno` WRITE;
/*!40000 ALTER TABLE `turno` DISABLE KEYS */;
INSERT INTO `turno` VALUES (6,'CLT DIURNO','08:00:00','12:00:00','01:00:00','17:00:00','15:00:00'),(2,'CLT NOTURNO','17:00:00','21:00:00','01:00:00','02:00:00','15:00:00'),(3,'CLT TARDE','14:00:00','16:30:00','01:00:00','22:00:00','15:00:00');
/*!40000 ALTER TABLE `turno` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-13 18:52:24
