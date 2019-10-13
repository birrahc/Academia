CREATE DATABASE  IF NOT EXISTS `academia_lr` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `academia_lr`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: academia_lr
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `aluno`
--

DROP TABLE IF EXISTS `aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aluno` (
  `id_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `telefone` varchar(12) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_aluno`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno`
--

LOCK TABLES `aluno` WRITE;
/*!40000 ALTER TABLE `aluno` DISABLE KEYS */;
/*!40000 ALTER TABLE `aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aluno_turma`
--

DROP TABLE IF EXISTS `aluno_turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aluno_turma` (
  `id_al_tur` int(11) NOT NULL AUTO_INCREMENT,
  `aluno` int(11) DEFAULT NULL,
  `turma` int(11) DEFAULT NULL,
  `situacao_aluno` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_al_tur`),
  KEY `aluno` (`aluno`),
  KEY `turma` (`turma`),
  KEY `situacao` (`situacao_aluno`),
  CONSTRAINT `aluno_turma_ibfk_1` FOREIGN KEY (`aluno`) REFERENCES `aluno` (`id_aluno`),
  CONSTRAINT `aluno_turma_ibfk_2` FOREIGN KEY (`turma`) REFERENCES `turma` (`id_turma`),
  CONSTRAINT `aluno_turma_ibfk_3` FOREIGN KEY (`situacao_aluno`) REFERENCES `status_turma` (`id_st`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aluno_turma`
--

LOCK TABLES `aluno_turma` WRITE;
/*!40000 ALTER TABLE `aluno_turma` DISABLE KEYS */;
/*!40000 ALTER TABLE `aluno_turma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento_aluno`
--

DROP TABLE IF EXISTS `evento_aluno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento_aluno` (
  `id_ev_al` int(11) NOT NULL AUTO_INCREMENT,
  `evento` int(11) DEFAULT NULL,
  `evento_aluno` int(11) DEFAULT NULL,
  `status_evento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ev_al`),
  KEY `evento` (`evento`),
  KEY `evento_aluno` (`evento_aluno`),
  KEY `status_evento` (`status_evento`),
  CONSTRAINT `evento_aluno_ibfk_1` FOREIGN KEY (`evento`) REFERENCES `eventos` (`id_evento`),
  CONSTRAINT `evento_aluno_ibfk_2` FOREIGN KEY (`evento_aluno`) REFERENCES `aluno` (`id_aluno`),
  CONSTRAINT `evento_aluno_ibfk_3` FOREIGN KEY (`status_evento`) REFERENCES `status_evento` (`id_st_ev`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento_aluno`
--

LOCK TABLES `evento_aluno` WRITE;
/*!40000 ALTER TABLE `evento_aluno` DISABLE KEYS */;
/*!40000 ALTER TABLE `evento_aluno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL AUTO_INCREMENT,
  `envento_nome` varchar(45) DEFAULT NULL,
  `data_evento` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `Obs` text,
  `evento_status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_evento`),
  KEY `evento_status` (`evento_status`),
  CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`evento_status`) REFERENCES `status_evento` (`id_st_ev`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `permissao` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_login`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pagamentos`
--

DROP TABLE IF EXISTS `pagamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pagamentos` (
  `id_pgt` int(11) NOT NULL AUTO_INCREMENT,
  `aluno_pgt` int(11) DEFAULT NULL,
  `data_pgt` date DEFAULT NULL,
  `ref_incial` date DEFAULT NULL,
  `ref_final` date DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `desconto` double DEFAULT NULL,
  PRIMARY KEY (`id_pgt`),
  KEY `aluno_pgt` (`aluno_pgt`),
  CONSTRAINT `pagamentos_ibfk_1` FOREIGN KEY (`aluno_pgt`) REFERENCES `aluno` (`id_aluno`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pagamentos`
--

LOCK TABLES `pagamentos` WRITE;
/*!40000 ALTER TABLE `pagamentos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_evento`
--

DROP TABLE IF EXISTS `status_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_evento` (
  `id_st_ev` int(11) NOT NULL AUTO_INCREMENT,
  `situacao_evento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_st_ev`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_evento`
--

LOCK TABLES `status_evento` WRITE;
/*!40000 ALTER TABLE `status_evento` DISABLE KEYS */;
/*!40000 ALTER TABLE `status_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_turma`
--

DROP TABLE IF EXISTS `status_turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_turma` (
  `id_st` int(11) NOT NULL AUTO_INCREMENT,
  `situacao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_st`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_turma`
--

LOCK TABLES `status_turma` WRITE;
/*!40000 ALTER TABLE `status_turma` DISABLE KEYS */;
INSERT INTO `status_turma` VALUES (1,'Ativo'),(2,'Inativo');
/*!40000 ALTER TABLE `status_turma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turma`
--

DROP TABLE IF EXISTS `turma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turma` (
  `id_turma` int(11) NOT NULL AUTO_INCREMENT,
  `turma_nome` varchar(60) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  PRIMARY KEY (`id_turma`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turma`
--

LOCK TABLES `turma` WRITE;
/*!40000 ALTER TABLE `turma` DISABLE KEYS */;
INSERT INTO `turma` VALUES (1,'Turma',160);
/*!40000 ALTER TABLE `turma` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-13 12:31:26
