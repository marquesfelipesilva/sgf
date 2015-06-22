CREATE DATABASE  IF NOT EXISTS `bd_sisfarma` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `bd_sisfarma`;
-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (x86_64)
--
-- Host: 192.168.56.115    Database: bd_sisfarma
-- ------------------------------------------------------
-- Server version	5.5.43-0ubuntu0.12.04.1

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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `COD_CATEGORIA` int(11) NOT NULL,
  `DS_CATEGORIA` varchar(100) NOT NULL,
  `NO_LABORATORIO` varchar(100) NOT NULL,
  PRIMARY KEY (`COD_CATEGORIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'REMEDIOS','FASER');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `COD_CLIENTE` int(11) NOT NULL AUTO_INCREMENT,
  `NO_CLIENTE` varchar(100) NOT NULL,
  `DS_ENDERECO` varchar(100) NOT NULL,
  `DS_EMAIL` varchar(100) NOT NULL,
  `DT_CADASTRO` date NOT NULL,
  PRIMARY KEY (`COD_CLIENTE`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (39,'Luiz Felipe Marques Silva','SHIGS 704 ASA SUL','felipe@gmail.com','2015-06-16'),(40,'d','d','d','0000-00-00'),(41,'d','d','d','0000-00-00'),(42,'dasd','asdx','asdsa','0000-00-00'),(43,'dasd','asdx','asdsa','0000-00-00'),(44,'dasd','asdx','asdsa','0000-00-00'),(45,'dasda','sad','teste','0000-00-00'),(46,'edasd','dsada','dasda','0000-00-00'),(47,'joao teste','teste end ','teste@teste.com','0000-00-00'),(48,'dasd','dasd','dasda','0000-00-00'),(49,'dsad','sdad','asdsa','0000-00-00'),(50,'dsad','sdad','asdsa','0000-00-00'),(51,'asdsa','addasd','sadsa','0000-00-00'),(52,'dasd','asdas','adsda','0000-00-00'),(53,'dsa','asd','asd','0000-00-00'),(54,'dsa','asd','asd','0000-00-00'),(55,'dsa','asd','asd','0000-00-00'),(56,'dsa','asd','asd','0000-00-00'),(57,'dsa','asd','asd','0000-00-00'),(58,'dsa','asd','asd','0000-00-00'),(59,'dsa','asd','asd','0000-00-00'),(60,'dsa','asd','asd','0000-00-00'),(61,'dsa','asd','asd','0000-00-00'),(62,'dsa','asd','asd','0000-00-00'),(63,'adsd','asd','asd','0000-00-00'),(64,'eqoekw','derwre','rewrew','0000-00-00'),(65,'eqoekw','derwre','rewrew','0000-00-00'),(66,'eqoekw','derwre','rewrew','0000-00-00'),(67,'teste telfone','sda','asd','0000-00-00'),(68,'dasd','adasd','adsad','0000-00-00');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colaborador`
--

DROP TABLE IF EXISTS `colaborador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colaborador` (
  `COD_COLABORADOR` int(11) NOT NULL AUTO_INCREMENT,
  `NO_COLABORADOR` varchar(100) CHARACTER SET latin1 NOT NULL,
  `NU_CPF_COLABORADOR` varchar(15) CHARACTER SET latin1 NOT NULL,
  `DS_FUNCAO` varchar(100) CHARACTER SET latin1 NOT NULL,
  `DS_LOGIN` varchar(100) CHARACTER SET latin1 NOT NULL,
  `DS_SENHA` varchar(100) CHARACTER SET latin1 NOT NULL,
  `NIVEL` int(11) NOT NULL,
  `STATUS` int(11) NOT NULL,
  PRIMARY KEY (`COD_COLABORADOR`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colaborador`
--

LOCK TABLES `colaborador` WRITE;
/*!40000 ALTER TABLE `colaborador` DISABLE KEYS */;
INSERT INTO `colaborador` VALUES (10,'Felipe','02047375169','Caixa','Luiz','12345678',2,1),(11,'Wilker','88899977724','Atendente','Wilker','wilkerazevedo',1,1),(12,'Gledson','99988877742','Farmaceutico','Gledson','gledsonmendes',1,1),(13,'Mã¡rcio','99988877742','Pau Mandado','login','paumandado',1,0),(14,'Newton','9899898989','Adm','Newton','12345678',1,1),(15,'Gilbertp','99999999999','Gerente','Gil','12345678',1,0),(16,'Joã£o','22222222222','Supervisor','Joao','joaobatista',1,1),(17,'Joao Batista','58215700934','desenvolvedor','joaoluz','123456789',1,1);
/*!40000 ALTER TABLE `colaborador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estabelecimento`
--

DROP TABLE IF EXISTS `estabelecimento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estabelecimento` (
  `COD_ESTABELECIMENTO` int(11) NOT NULL,
  `DS_ENDERECO` varchar(100) NOT NULL,
  `NU_CNPJ` varchar(100) NOT NULL,
  `NO_FANTASIA` varchar(100) NOT NULL,
  `RAZAO_SOCIAL` varchar(100) NOT NULL,
  `DT_CADASTRO` datetime NOT NULL,
  PRIMARY KEY (`COD_ESTABELECIMENTO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estabelecimento`
--

LOCK TABLES `estabelecimento` WRITE;
/*!40000 ALTER TABLE `estabelecimento` DISABLE KEYS */;
/*!40000 ALTER TABLE `estabelecimento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fornecedores`
--

DROP TABLE IF EXISTS `fornecedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fornecedores` (
  `COD_FORNECEDORES` int(11) NOT NULL AUTO_INCREMENT,
  `NO_FORNECEDOR` varchar(100) NOT NULL,
  `NO_FANTASIA` varchar(100) NOT NULL,
  `RAZAO_SOCIAL` varchar(100) NOT NULL,
  `NU_CNPJ` varchar(100) NOT NULL,
  `NO_CIDADE` varchar(100) NOT NULL,
  `DS_ENDERECO` varchar(100) NOT NULL,
  `DS_COMPLMENTO_END` varchar(100) NOT NULL,
  `SIGLA_UF` char(2) NOT NULL,
  `NU_TELEFONE1` varchar(100) NOT NULL,
  `NU_TELEFONE2` varchar(100) NOT NULL,
  `NU_TELEFONE3` varchar(100) NOT NULL,
  `DS_EMAIL` varchar(100) NOT NULL,
  `DS_OBSERVACAO` varchar(100) NOT NULL,
  `DT_CADASTRO` date NOT NULL,
  PRIMARY KEY (`COD_FORNECEDORES`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fornecedores`
--

LOCK TABLES `fornecedores` WRITE;
/*!40000 ALTER TABLE `fornecedores` DISABLE KEYS */;
INSERT INTO `fornecedores` VALUES (1,'','Santa Cruz','Santa Cruz','Distribuidora Santa Cruz','043039160001-71','São Paulo','Av Santa Cruz rua 2 - Guarulhos - SP','Lo','SP','11 - 3344-8899','11 - 99888-7789','11 - 39876-8976','contato@santacruz.com.br','2015-06-16'),(2,'','Santa Monica','Santa Monica','Distribuidora Santa Monica','98798898090-09','Brasilia','LAGO SUL','Lo','DF','61 - 6363-6636','61 - 9999-9999','61 - 8888-8888','marques@gmail.com','2015-06-15'),(3,'','hghgfhhggfh','jhgjhgjhgjh','jhgjgjhghj','876867868','jjh','jhgjg','jh','jhgj','616363636636','61 - 9999-9999','61 - 8888-8888','smdfsn@gmail.com','0000-00-00');
/*!40000 ALTER TABLE `fornecedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_venda`
--

DROP TABLE IF EXISTS `item_venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_venda` (
  `COD_PRODUTO` int(11) NOT NULL,
  `COD_VENDA` int(11) NOT NULL,
  `QTD_PRODUTO` int(11) NOT NULL,
  KEY `COD_PRODUTO` (`COD_PRODUTO`),
  KEY `COD_VENDA` (`COD_VENDA`),
  CONSTRAINT `item_venda_ibfk_1` FOREIGN KEY (`COD_PRODUTO`) REFERENCES `produto` (`COD_PRODUTO`),
  CONSTRAINT `item_venda_ibfk_2` FOREIGN KEY (`COD_VENDA`) REFERENCES `vendas` (`COD_VENDA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_venda`
--

LOCK TABLES `item_venda` WRITE;
/*!40000 ALTER TABLE `item_venda` DISABLE KEYS */;
/*!40000 ALTER TABLE `item_venda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `COD_PEDIDO` int(11) NOT NULL AUTO_INCREMENT,
  `COD_PRODUTO` int(11) NOT NULL,
  `COD_FORNECEDORES` int(11) NOT NULL,
  `QTD_PRODUTO` int(11) NOT NULL,
  PRIMARY KEY (`COD_PEDIDO`),
  KEY `COD_PRODUTO` (`COD_PRODUTO`),
  KEY `COD_FORNECEDORES` (`COD_FORNECEDORES`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produto` (
  `COD_PRODUTO` int(11) NOT NULL AUTO_INCREMENT,
  `COD_CATEGORIA` int(11) DEFAULT NULL,
  `DS_PRODUTO` varchar(100) NOT NULL,
  `NU_COD_BARRAS` int(11) NOT NULL,
  `NU_QTDE_PRODUTO` int(11) NOT NULL,
  `TIPO_PRODUTO` varchar(100) NOT NULL,
  `VALOR_PRODUTO` float NOT NULL,
  `DT_FABRICACAO` date NOT NULL,
  `DT_VALIDADE` date NOT NULL,
  `DT_CADASTRO` date NOT NULL,
  PRIMARY KEY (`COD_PRODUTO`),
  KEY `COD_CATEGORIA` (`COD_CATEGORIA`),
  CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`COD_CATEGORIA`) REFERENCES `categoria` (`COD_CATEGORIA`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (7,NULL,'DORFLEX',2147483647,1000,'ETICO',4.15,'2015-06-01','2016-06-01','2015-06-16'),(8,NULL,'DIPIRONA 500 mg 10cpr',2147483647,34,'ETICO',5,'2015-06-01','2016-06-01','2015-06-16');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tel_cliente`
--

DROP TABLE IF EXISTS `tel_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tel_cliente` (
  `COD_TELEFONE` int(11) NOT NULL,
  `COD_CLIENTE` int(11) NOT NULL,
  PRIMARY KEY (`COD_TELEFONE`,`COD_CLIENTE`),
  KEY `COD_CLIENTE` (`COD_CLIENTE`),
  CONSTRAINT `fk_telefone` FOREIGN KEY (`COD_TELEFONE`) REFERENCES `telefone` (`COD_TELEFONE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tel_cliente_ibfk_1` FOREIGN KEY (`COD_CLIENTE`) REFERENCES `cliente` (`COD_CLIENTE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tel_cliente`
--

LOCK TABLES `tel_cliente` WRITE;
/*!40000 ALTER TABLE `tel_cliente` DISABLE KEYS */;
INSERT INTO `tel_cliente` VALUES (1,67),(2,67),(3,67),(4,68),(5,68);
/*!40000 ALTER TABLE `tel_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `telefone`
--

DROP TABLE IF EXISTS `telefone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefone` (
  `COD_TELEFONE` int(11) NOT NULL AUTO_INCREMENT,
  `NU_TELEFONE` varchar(14) NOT NULL,
  `COD_TIPO_TELEFONE` int(11) DEFAULT NULL,
  PRIMARY KEY (`COD_TELEFONE`),
  KEY `fk_tipo_telefone_idx` (`COD_TIPO_TELEFONE`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefone`
--

LOCK TABLES `telefone` WRITE;
/*!40000 ALTER TABLE `telefone` DISABLE KEYS */;
INSERT INTO `telefone` VALUES (1,'123123',3),(2,'789456',3),(3,'789456',3),(4,'123',2),(5,'1232313',1);
/*!40000 ALTER TABLE `telefone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_telefone`
--

DROP TABLE IF EXISTS `tipo_telefone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_telefone` (
  `COD_TIPO_TELEFONE` int(11) NOT NULL,
  `NO_TIPO_TELEFONE` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`COD_TIPO_TELEFONE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_telefone`
--

LOCK TABLES `tipo_telefone` WRITE;
/*!40000 ALTER TABLE `tipo_telefone` DISABLE KEYS */;
INSERT INTO `tipo_telefone` VALUES (1,'Resodencial'),(2,'Comercial'),(3,'Recado');
/*!40000 ALTER TABLE `tipo_telefone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendas`
--

DROP TABLE IF EXISTS `vendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendas` (
  `COD_VENDA` int(11) NOT NULL AUTO_INCREMENT,
  `COD_COLABORADOR` int(11) NOT NULL,
  `DT_CADASTRO` datetime NOT NULL,
  `VALOR_PRODUTO` float NOT NULL,
  `VALOR_TOTAL` float NOT NULL,
  `VALOR_RECEBIDO` float NOT NULL,
  `VALOR_TROCO` float NOT NULL,
  `QTD_PRODUTO` int(11) NOT NULL,
  `COD_PRODUTO` int(11) NOT NULL,
  PRIMARY KEY (`COD_VENDA`),
  KEY `COD_COLABORADOR` (`COD_COLABORADOR`),
  KEY `fk_produto_idx` (`COD_PRODUTO`),
  CONSTRAINT `fk_produto` FOREIGN KEY (`COD_PRODUTO`) REFERENCES `produto` (`COD_PRODUTO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `vendas_ibfk_2` FOREIGN KEY (`COD_COLABORADOR`) REFERENCES `colaborador` (`COD_COLABORADOR`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendas`
--

LOCK TABLES `vendas` WRITE;
/*!40000 ALTER TABLE `vendas` DISABLE KEYS */;
INSERT INTO `vendas` VALUES (1,17,'0000-00-00 00:00:00',10,150,0,50,15,7),(2,17,'0000-00-00 00:00:00',15,180,0,20,12,7);
/*!40000 ALTER TABLE `vendas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-22 13:02:40
