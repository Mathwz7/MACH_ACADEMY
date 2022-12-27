-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: mach_academy_db
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
-- Current Database: `mach_academy_db`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `mach_academy_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `mach_academy_db`;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `cli_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cli_nome` varchar(255) NOT NULL,
  `cli_data_de_nascimento` date NOT NULL,
  `cli_email` varchar(255) NOT NULL,
  `cli_senha` varchar(255) NOT NULL,
  `cli_imagem` varchar(38) DEFAULT NULL,
  PRIMARY KEY (`cli_codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'aluno','2004-08-24','aluno@gmail','MTIz','a01017c17b651af0450c3fc1b62a5f76.png'),(2,'Lanna','2022-12-21','fabialanna@gmail.com','MTIz','07a4411ea8ead0a0018f795996ba1349.png'),(3,'Yuri Gustavo','2005-02-07','gyuri8437@gmail.com','MTIzNDU2Nzg=','0f4c5be65a1ca5862bb34628d1af0830.png'),(4,'Luiz','2004-11-24','luiz@gmail.com','MTIz','37063277e3d3fe7d629536537f54eff2.png');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `criador_de_conteudo`
--

DROP TABLE IF EXISTS `criador_de_conteudo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `criador_de_conteudo` (
  `crc_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `crc_nome` varchar(255) NOT NULL,
  `crc_email` varchar(255) NOT NULL,
  `crc_senha` varchar(255) NOT NULL,
  `crc_data_de_nascimento` date DEFAULT NULL,
  `crc_CPF_CNPJ` varchar(14) DEFAULT NULL,
  `crc_imagem` varchar(38) DEFAULT NULL,
  `fk_Tipo_de_usuario_tiu_codigo` int(11) NOT NULL,
  PRIMARY KEY (`crc_codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `criador_de_conteudo`
--

LOCK TABLES `criador_de_conteudo` WRITE;
/*!40000 ALTER TABLE `criador_de_conteudo` DISABLE KEYS */;
INSERT INTO `criador_de_conteudo` VALUES (1,'professor','prof@gmail','MTIz','2022-12-10','123123123','0cfef07bee1e4ae05093a131140074ae.png',2),(2,'Joaquim','joaquim123@gmail.com','am9hcXVpbQ==','2022-12-10','11355988276','c84daa7e8a5de52b4d14727223283a1e.png',2),(3,'Sérgio ','sergioprof@gmail.com','MTIzNDU2','2022-12-10','44685284434','5242f705417f89a4b8a6b4fedd8ace34.png',2),(5,'Vanessa','vanessa@gmail.com','MTIz','2022-12-10','23123123123','02fbeb2b21ae0f02c2333aabe975a1be.png',2),(6,'Thiago Melo','thiagomelo@gmail.com','MTIz','2022-12-11','83567936810','22416cc77f6c87181d1879f89209b2d1.png',2),(7,'Gustavo','guanabara@gmail.com','NjU0MzIx','2022-12-11','13254622465','460d547180f8ee07280cf3427af8392b.png',2);
/*!40000 ALTER TABLE `criador_de_conteudo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curriculo_interprete`
--

DROP TABLE IF EXISTS `curriculo_interprete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curriculo_interprete` (
  `cui_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cui_data` date NOT NULL,
  `cui_curriculo` varchar(37) NOT NULL,
  `fk_Interprete_int_codigo` int(11) NOT NULL,
  PRIMARY KEY (`cui_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curriculo_interprete`
--

LOCK TABLES `curriculo_interprete` WRITE;
/*!40000 ALTER TABLE `curriculo_interprete` DISABLE KEYS */;
INSERT INTO `curriculo_interprete` VALUES (1,'2022-12-03','0fc8b6b8a76a52ef04f850471c098465.pdf',1),(2,'2022-12-08','6c50721e1b7eb567e0203e6280a440d2.pdf',2),(3,'2022-12-08','c2eafa80de28f90165cc6635b4f43225.pdf',3),(4,'2022-12-08','218499766b46c4e85b455e5fe6748762.pdf',1),(5,'2022-12-10','0f6a421d673be82ec60af48404c8abd8.pdf',1),(6,'2022-12-10','ea2e7a4a2050890bf0cb3927e6cd1095.pdf',1),(7,'2022-12-10','723f015a9230a1d3329f7b366162b82e.pdf',1),(8,'2022-12-10','e34aa902fc158c6db312515a907c17e0.pdf',1),(9,'2022-12-10','bfb6f7429e82662919641b20548d75ba.pdf',2),(10,'2022-12-10','b821001e76fcbeac1359698eeb6e9e45.pdf',3),(11,'2022-12-10','73c2d95d63b6958ee101218958451255.pdf',4),(12,'2022-12-11','a8122e577964db6e600b012b2406878e.pdf',5),(13,'2022-12-11','767850183367d0f95f41ff89215371f0.pdf',6);
/*!40000 ALTER TABLE `curriculo_interprete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso` (
  `cur_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `cur_nome` varchar(255) NOT NULL,
  `cur_descricao` varchar(255) NOT NULL,
  `cur_imagem` varchar(37) DEFAULT NULL,
  `fk_Tipo_de_Curso_tic_codigo` int(11) NOT NULL,
  `fk_Criador_de_Conteudo_crc_codigo` int(11) NOT NULL,
  `fk_Interprete_int_codigo` int(11) NOT NULL,
  `cur_preco` decimal(10,2) DEFAULT NULL,
  `cur_aprovado` int(2) NOT NULL,
  `cur_traducao` int(2) NOT NULL,
  PRIMARY KEY (`cur_codigo`),
  KEY `FK_Curso_3` (`fk_Criador_de_Conteudo_crc_codigo`),
  KEY `fk_Tipo_de_Curso_tic_codigo` (`fk_Tipo_de_Curso_tic_codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES (21,'PHP Básico','Aprendendo sobre PHP','fa4e176f6b7050490f11ed519811bc22.png',1,7,5,200.00,1,1),(20,'Pacote Office','Introdução ao pacote office e algumas considerações','8ccc3370e653517af941cf2d282a0078.png',1,7,5,150.00,1,1),(3,'Gramática Básica','Curso de gramática básica introdutória','1ecf7e112ab88d7899df4b4cb02313d3.png',2,2,2,100.00,1,1),(4,'Curso de Redação','Dicas sobre como redigir uma boa redação.','cd2dd62a91ddc7d1fa38101b01138fc8.png',2,2,2,300.00,1,1),(5,'Português para Concursos','Macetes para gabaritar português em concursos.','92778f9eef5b92a58857f63093b5ece9.png',2,2,2,250.00,1,1),(6,'Funções','Tudo sobre as funções','913d1ecf5f4633cd40a14c43ec7eebf3.png',3,3,3,150.00,1,1),(7,'Romantismo','Introdução ao estudo ','69b12025239f29e7172ea89bd5239cc6.png',2,2,2,500.00,1,1),(8,'Trovadorismo','Resumo geral sobre o Trovadorismo.','e471dedc11f3405fdca9a01336c2d989.png',2,2,2,150.00,1,1),(9,'A matemática nas coisas','Aprenda o básico sobre a matemática','a6bcb64449e58dbac459c902a1922994.png',3,3,3,100.00,1,1),(10,'Geometria plana','introdução à geometria plana','f323d3cb6a4a7252fcf4c205bba47fe0.png',3,3,3,200.00,1,1),(11,'Progressão Aritmética','Introdução ao mundo das P.A\'s','84184f6e0404c002ff7bf9faa36687b2.png',3,3,3,70.00,1,1),(12,'Interpretação de gráficos','Aprenda sobre todos os tipos de gráficos','e50daa753d218c8ad11e563bc167796e.png',3,3,3,200.00,1,1),(13,'Invertebrados - Ciências para crianças ','Curso educativo para crianças sobre o universo dos invertebrados','118c8a0e7625d1200d29e5ee5c9121bb.png',4,4,4,50.00,0,0),(14,'Invertebrados - Ciências para crianças','Curso educativo sobre o universo dos invertebrados','a2ca405e5d2487094588236ffc09c499.png',4,5,0,50.00,1,1),(15,'Citologia','Fundamentos da citologia','dcde5d076d035df8eba36afff1d8afba.png',4,5,4,67.00,1,1),(16,'Ecologia ','Conceitos de ecologia','8af71a0b0dca2c6743cd30747869be29.png',4,5,4,47.00,1,1),(17,'Genética ','Genética básica','1426c08576a33315e469652eb6043311.png',4,5,4,80.00,1,1),(18,'Biologia molecular','Biologia molecular para o ENEM','6a69649c786c2da25be2853a24b7062a.png',4,5,4,150.00,1,1),(24,'Design Thinking','Fundamentos e fases do Design Thinking','dd3fc9d5b0d7474358467b65a7ded8d8.png',1,6,6,200.00,1,1),(22,'Introdução ao JAVA','Aprenda o necessário para começar a utilizar o JAVA','c13a48a8b6040325070e1c9977f1bded.png',1,7,5,250.00,1,1),(23,'Fundamentos de Redes','Aprenda sobre Redes de uma maneira simplificada','7c79e99a82c8a90ff08be75da5cbeed8.png',1,7,5,90.00,1,1);
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcionario` (
  `fun_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `fun_nome` varchar(255) NOT NULL,
  `fun_data_de_nascimento` date DEFAULT NULL,
  `fun_cpf` varchar(11) NOT NULL,
  `fun_salario` decimal(6,2) DEFAULT NULL,
  `fun_funcao` varchar(255) DEFAULT NULL,
  `fun_email` varchar(255) NOT NULL,
  `fun_senha` varchar(255) NOT NULL,
  `fk_Telefone_de_Funcionario_tel_codigo` int(11) DEFAULT NULL,
  `fun_imagem` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`fun_codigo`),
  KEY `fk_Telefone_de_Funcionario` (`fk_Telefone_de_Funcionario_tel_codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` VALUES (1,'admin',NULL,'admin',NULL,NULL,'admin@gmail','YWRtaW4=',NULL,'admin.png'),(2,'admin2',NULL,'admin2',NULL,NULL,'admin2@gmail','YWRtaW4=',NULL,'admin.png');
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interprete`
--

DROP TABLE IF EXISTS `interprete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interprete` (
  `int_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `int_nome` varchar(255) NOT NULL,
  `int_email` varchar(255) NOT NULL,
  `int_senha` varchar(255) NOT NULL,
  `int_CPF` varchar(11) NOT NULL,
  `int_data_de_nascimento` date NOT NULL,
  `int_aprovado` int(2) NOT NULL,
  `int_imagem` varchar(38) DEFAULT NULL,
  PRIMARY KEY (`int_codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interprete`
--

LOCK TABLES `interprete` WRITE;
/*!40000 ALTER TABLE `interprete` DISABLE KEYS */;
INSERT INTO `interprete` VALUES (1,'interprete','int@gmail','MTIz','123123','2022-12-10',0,'5b2e92df080b19857ecc1f5e047f60d4.png'),(2,'Joana','joana123@gmail.com','am9hbmE=','21868287408','2022-12-10',0,'438ebc62a083031be84883f8dbb4ea89.png'),(3,'Elisa','elisainter@gmail.com','MTIzNDU2','43562113258','2022-12-10',0,'13e56ede93d1aaceb120501f15d5791a.png'),(4,'Georgia','Georgia@gmmail.com','MTIz','11111111113','2022-12-10',0,'8b99c96aa6ca3d5f331f07e88b6058b8.png'),(5,'Vitória','vi@gmail.com','MTIzNDU2','43562113216','2022-12-11',0,'546d446afc28dc0b138601725f952d70.png'),(6,'Roberta Luana','roberta@gmail.com','MTIz','45454534536','2022-12-11',0,'7b7f8bbac28395548059d70a88aec740.png');
/*!40000 ALTER TABLE `interprete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulo`
--

DROP TABLE IF EXISTS `modulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modulo` (
  `mod_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `mod_nome` varchar(255) DEFAULT NULL,
  `mod_descricao` varchar(255) DEFAULT NULL,
  `fk_Curso_cur_codigo` int(11) NOT NULL,
  PRIMARY KEY (`mod_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulo`
--

LOCK TABLES `modulo` WRITE;
/*!40000 ALTER TABLE `modulo` DISABLE KEYS */;
INSERT INTO `modulo` VALUES (1,'modulo_1','',1),(2,'modulo_2',NULL,1),(3,'modulo_1',NULL,2),(4,'modulo_2',NULL,2),(5,'modulo_3',NULL,2),(6,'modulo_4',NULL,2),(7,'modulo_5',NULL,2),(8,'modulo_6',NULL,2),(9,'modulo_7',NULL,2),(10,'modulo_8',NULL,2),(11,'modulo_9',NULL,2),(12,'modulo_10',NULL,2),(13,'modulo_11',NULL,2),(14,'modulo_12',NULL,2),(15,'modulo_1','Introdução',3),(16,'modulo_1','Como tirar nota mil?',4),(17,'modulo_1','O concurso do TJ-SP',5),(18,'modulo_1','Tipos de funções que existem na matemática',6),(19,'modulo_1','Obras e principais autores',7),(20,'modulo_1','Como o trovadorismo é cobrado nas provas?',8),(21,'modulo_1','O começo de tudo',9),(22,'modulo_1','Tudo sobre geometria plana',10),(23,'modulo_1','Introdução a P.A',11),(24,'modulo_1','Tipos de gráficos',12),(25,'modulo_1',NULL,13),(26,'modulo_1','O que são animais invertebrados?',14),(27,'modulo_1','O que é citologia',15),(28,'modulo_1','Conceituando ecologia',16),(29,'modulo_1','Introdução a genética',17),(30,'modulo_1','biologia molecular para o enem',18),(31,'modulo_1','Fundamentos design thinking',19),(32,'modulo_1','Introdução ao pacote Office',20),(33,'modulo_1','Introdução ao PHP',21),(34,'modulo_1','JAVA e seus princípios',22),(35,'modulo_1','Redes',23),(36,'modulo_1','Fundamentos do DT',24);
/*!40000 ALTER TABLE `modulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_de_curso`
--

DROP TABLE IF EXISTS `tipo_de_curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_de_curso` (
  `tic_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `tic_nome` varchar(255) DEFAULT NULL,
  `tic_descricao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tic_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_de_curso`
--

LOCK TABLES `tipo_de_curso` WRITE;
/*!40000 ALTER TABLE `tipo_de_curso` DISABLE KEYS */;
INSERT INTO `tipo_de_curso` VALUES (1,'informatica','cursos de informatica'),(2,'humanas','cursos de humanas'),(3,'exatas','cursos de exatas'),(4,'biologicas','cursos de biologicas');
/*!40000 ALTER TABLE `tipo_de_curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_de_video`
--

DROP TABLE IF EXISTS `tipo_de_video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_de_video` (
  `tiv_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `tiv_nome` varchar(100) DEFAULT NULL,
  `tiv_descricao` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tiv_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_de_video`
--

LOCK TABLES `tipo_de_video` WRITE;
/*!40000 ALTER TABLE `tipo_de_video` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_de_video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venda`
--

DROP TABLE IF EXISTS `venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venda` (
  `ven_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `ven_data` date DEFAULT NULL,
  `fk_Curso_cur_codigo` int(11) NOT NULL,
  `fk_Cliente_cli_codigo` int(11) NOT NULL,
  PRIMARY KEY (`ven_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venda`
--

LOCK TABLES `venda` WRITE;
/*!40000 ALTER TABLE `venda` DISABLE KEYS */;
INSERT INTO `venda` VALUES (1,'2022-12-10',1,1),(2,'2022-12-10',2,1),(3,'2022-12-10',2,2),(4,'2022-12-10',3,1),(5,'2022-12-10',11,3),(6,'2022-12-10',7,3),(7,'2022-12-11',5,3),(8,'2022-12-11',22,3),(9,'2022-12-11',21,4),(10,'2022-12-11',21,3),(11,'2022-12-11',24,4);
/*!40000 ALTER TABLE `venda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video` (
  `vid_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `vid_nome` varchar(255) DEFAULT NULL,
  `vid_duracao` varchar(100) DEFAULT NULL,
  `vid_url` varchar(255) DEFAULT NULL,
  `fk_Modulo_mod_codigo` int(11) NOT NULL,
  `fk_Tipo_de_Video_tiv_codigo` int(11) NOT NULL,
  PRIMARY KEY (`vid_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video`
--

LOCK TABLES `video` WRITE;
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` VALUES (1,'204cc50fc94f4aad3286c3e567d78713traduzido.mp4',NULL,NULL,1,3),(2,'8eaf4404bdfde09872da65fe029ccfdadatraducao.mp4',NULL,NULL,1,2),(3,'123',NULL,'https://www.youtube.com/watch?v=QY4a8jBnr4E&ab_channel=Kkauet',3,1),(4,'video2',NULL,'https://www.youtube.com/watch?v=8OL77lK4xrc&ab_channel=FabioLima',3,3),(5,'video3',NULL,'https://www.youtube.com/watch?v=Vd6MA5KGXIA&ab_channel=HansZimmer-Topic',3,3),(6,'db34c14240a3d5ad1231d441b20f8ad9semtraducao.mp4',NULL,NULL,15,1),(7,'dad4283465618cb6382f0a166af117d5semtraducao.mp4',NULL,NULL,16,1),(8,'a6a225bd00e7ddaab18fc2f13109243esemtraducao.mp4',NULL,NULL,17,1),(9,'f2aa4ec49575e7ae527dfd3a4599e960semtraducao.mp4',NULL,NULL,19,1),(10,'12c7b18f5a75b85e19098f705b2f7911semtraducao.mp4',NULL,NULL,18,1),(11,'a15f74f78bc4218f3b799778ae5e7a51semtraducao.mp4',NULL,NULL,20,1),(12,'ba8232bb3de842cca22115cbd7457208semtraducao.mp4',NULL,NULL,21,1),(13,'5bdccae07e66e629615ad6e294d3f148semtraducao.mp4',NULL,NULL,23,1),(14,'4cacab8263f7c7f6d00306718cc8e0a0semtraducao.mp4',NULL,NULL,23,1),(15,'54e386f67b7586d6c78677213aa7ef64semtraducao.mp4',NULL,NULL,23,1),(16,'a3b531a93f30e1d43f7c4a5d8d3e9c33semtraducao.mp4',NULL,NULL,24,1),(17,'808b8936d2214a804f769bad5385e3ebdatraducao.mp4',NULL,NULL,15,2),(18,'3d945a3145207cfc6fdbf5ec9afab627semtraducao.mp4',NULL,NULL,16,1),(19,'7e658a67b3fe61235355e57bd45685basemtraducao.mp4',NULL,NULL,17,1),(20,'587b4c0aa657781e5ec303130fa2addfsemtraducao.mp4',NULL,NULL,19,1),(21,'7005c2cf04fa21c08efdca6f4ec362b4datraducao.mp4',NULL,NULL,20,2),(22,'401db0becf8dd9e43452d018d0f1a4d1datraducao.mp4',NULL,NULL,15,2),(23,'bd7d6b8d41c2100b292db104e784a053datraducao.mp4',NULL,NULL,16,2),(24,'e2f26ea629c9a1a5c22ad7bff9356815datraducao.mp4',NULL,NULL,17,2),(25,'72886aa78b02b29f3d79723f75fb8eebdatraducao.mp4',NULL,NULL,19,2),(26,'e9b194aaa77774d4e2a231eb22031662datraducao.mp4',NULL,NULL,18,2),(27,'edb404e5cb2c84dfc5cb00200f197f83semtraducao.mp4',NULL,NULL,19,1),(28,'de442bec74f83d1ae882c61c9314c24cdatraducao.mp4',NULL,NULL,21,2),(29,'e89b4054b3f65dd43f601d6c96b19c98datraducao.mp4',NULL,NULL,20,2),(30,'721da601577887270805df83327921fddatraducao.mp4',NULL,NULL,22,2),(31,'20af463c3ba436c9feb9899d95b32c5edatraducao.mp4',NULL,NULL,23,2),(32,'9966a1b924c11144547d075a7df7511fdatraducao.mp4',NULL,NULL,24,2),(33,'video',NULL,'https://www.youtube.com/watch?v=poyvpdAC4xI',23,3),(34,'video1',NULL,'https://www.youtube.com/watch?v=iZ7Ryffdoc0&list=PLQkvY_B1yn9dczQZRGiz-MvAIXlhMthrf&ab_channel=ProfessorNoslen',15,3),(35,'video',NULL,'https://www.youtube.com/watch?v=nysu0K-VXR8',18,3),(36,'video1',NULL,'https://www.youtube.com/watch?v=eI8R8Eyv9vQ&ab_channel=ProfessorNoslen',16,3),(37,'video',NULL,'https://www.youtube.com/watch?v=GDEkkbwvhNg',24,3),(38,'video1',NULL,'https://www.youtube.com/watch?v=rf1AHehYwXs&ab_channel=ProfessorNoslen',17,3),(39,'video1',NULL,'https://www.youtube.com/watch?v=PyUy_9mKGCk&ab_channel=ProfessorNoslen',19,3),(40,'matematica',NULL,'https://www.youtube.com/watch?v=h3sFlP8Rmqc',21,3),(41,'video1',NULL,'https://www.youtube.com/watch?v=N8aCwmWgVyA&ab_channel=ProfessorNoslen',20,3),(42,'397a9d4bc7e4eab336b90bf591c2ea3fsemtraducao.',NULL,NULL,26,1),(43,'03176b7c828e2ea772a6ed55915f707csemtraducao.',NULL,NULL,26,1),(44,'a9867a0bd9b06eb3febc43ccf5fd628dsemtraducao.',NULL,NULL,29,1),(45,'ffa15e67bb39ed6a0fa9111313b0a887datraducao.',NULL,NULL,27,2),(46,'0c3038b18db4759f214ecfdd8ae39121datraducao.',NULL,NULL,27,2),(47,'11cea8975d5d76bb98f4cbf1021be892datraducao.',NULL,NULL,28,2),(48,'62f5e3ee6863e3963133c2080fe82021datraducao.',NULL,NULL,29,2),(49,'b3dc6af2d9841adae1bc22943f1cb73adatraducao.',NULL,NULL,30,2),(50,'biologia_molecular_traduzido',NULL,'https://www.youtube.com/watch?v=T0XUC9-ClZU',30,3),(51,'genetica_traduzido',NULL,'https://www.youtube.com/watch?v=tUtj4HIg4Wo',29,3),(52,'ecologia_traduzido',NULL,'https://www.youtube.com/watch?v=Z5cll6n3hHw',28,3),(53,'Invertebrados_traduzido',NULL,'https://www.youtube.com/watch?v=yVX9zgNW7fk',26,3),(54,'citologia_traduzido',NULL,'https://www.youtube.com/watch?v=YB-zfUXDBHA',27,3),(55,'aeee86772fe02b3f88264c2bce451debsemtraducao.',NULL,NULL,31,1),(56,'9d0d14ed06b1f4b2532700997d5b53c3datraducao.',NULL,NULL,31,2),(57,'Design_Thinking_traduzido',NULL,'https://youtu.be/1ZTta03ptwM',31,3),(58,'b3fe0f3eaa851d7cf0109d62c9618c46semtraducao.mp4',NULL,NULL,32,1),(59,'0bfb83c1f5b4672a13050ea858d14094semtraducao.mp4',NULL,NULL,33,1),(60,'c8cb9adec8ee5753b394e30932fcf6afsemtraducao.mp4',NULL,NULL,33,1),(61,'944d6c0a234c6939f16f3528b8daf752semtraducao.mp4',NULL,NULL,34,1),(62,'a7f916712c185ad1a606eb82f77e39d1semtraducao.mp4',NULL,NULL,35,1),(63,'74f3b0619b6368787c5955e574394d30datraducao.mp4',NULL,NULL,33,2),(64,'951fc24b102217adab5c513582788f47datraducao.mp4',NULL,NULL,32,2),(65,'7ce2de5c2c3a989a376898fc57d6a539datraducao.mp4',NULL,NULL,34,2),(66,'d6eb99685da6b6f45123d98137bcbf6edatraducao.mp4',NULL,NULL,35,2),(67,'video',NULL,'https://www.youtube.com/watch?v=F7KzJ7e6EAc',33,3),(68,'video',NULL,'https://www.youtube.com/watch?v=59lDXVkqlqQ&list=PLHz_AreHm4dkxM_0dinX7l_WUxpG-VrC-',32,3),(69,'video',NULL,'https://www.youtube.com/watch?v=sTX0UEplF54&list=PLJH2yd19u4hzRtpzm2dDCWZx58UrE85ye',34,3),(70,'video1',NULL,'https://www.youtube.com/watch?v=QkMbqL8QD9w',35,3),(71,'e55ee1d81de4d229d4dfe14e47d7c737semtraducao.mp4',NULL,NULL,36,1),(72,'4c8b93d261d642196ddbbcf92591971fdatraducao.mp4',NULL,NULL,36,2),(73,'Design',NULL,'https://youtu.be/1ZTta03ptwM',36,3);
/*!40000 ALTER TABLE `video` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-11  2:10:09
