-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: caisse
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categorie` (
  `cat_code` int NOT NULL AUTO_INCREMENT,
  `cat_nom` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `ref_abrev` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `user_code_upd` decimal(11,0) DEFAULT NULL,
  PRIMARY KEY (`cat_code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,'Huile','HUILE',1,'2024-01-03',1),(2,'Vinaigre','VINAIGRE',1,'2024-01-03',1),(8,'Produits laitiers','LAIT',1,'2024-01-03',1),(10,'Aliment infantile','ALIMENTINF',1,'2024-01-03',1),(11,'Boisson','BOISSON',1,'2024-01-03',1),(12,'Eau min&eacute;rale','EAUMINERAL',1,'2024-01-03',1),(13,'Patisserie','PATISSERIE',1,'2024-01-03',1),(14,'Epices et condiments','EPICESETCO',1,'2024-01-03',1),(15,'Produits locaux','PRDLOCAUX',1,'2024-01-03',1),(16,'Caf&eacute;, cacao et choco','CAFECACAO',1,'2024-01-03',1),(17,'P&acirc;tes et nouilles','PATESNOU',1,'2024-01-03',1),(18,'Biscuits et bonbons','BISCUITSBO',1,'2024-01-03',1),(19,'Snacks','SNACKS',1,'2024-01-03',1),(20,'Autres produits alimentaires','AUTPRODALI',1,'2024-01-03',1),(21,'Couches et lingettes','COUCHELING',1,'2024-01-03',1),(22,'Produits d&#039;hygi&egrave;ne','PRDHYGIEN',1,'2024-01-03',1),(23,'Fournitures scolaires et de bureau','FOURNSCOBU',1,'2024-01-03',1),(24,'Autres articles','AUTRES',1,'2024-01-03',1),(25,'Savon et d&eacute;tergent','SAVONDETER',1,'2024-01-03',1),(26,'Fournitures scolaires 2023','FS',1,'2024-01-03',1),(27,'Autre','AUTRE',NULL,'2024-01-03',1);
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client` (
  `cli_code` int NOT NULL AUTO_INCREMENT,
  `cli_nom` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `ref_abrev` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `cli_phone` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `user_code_upd` decimal(11,0) DEFAULT NULL,
  PRIMARY KEY (`cli_code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=353 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'Naly','1','',NULL,'2023-04-06',6),(2,'Bureau','2','',NULL,'2023-04-07',6),(3,'Hoby','3','',NULL,'2023-04-07',6),(4,'FELANA','4','',NULL,'2023-04-07',6),(5,'Tatamo','5','',NULL,'2023-04-07',6),(6,'Narindra','6','',NULL,'2023-04-07',6),(7,'Mi','7','',NULL,'2023-04-07',6),(8,'Liva','8','',NULL,'2023-04-07',6),(9,'Boda','9','',NULL,'2023-04-07',6),(10,'Mme Lalao','10','',NULL,'2023-04-07',6),(11,'Toky','11','',NULL,'2023-04-07',6),(12,'Fiderana','12','',NULL,'2023-04-07',6),(13,'Fabrice','13','',NULL,'2023-04-07',6),(14,'Boda','14','',NULL,'2023-04-07',6),(15,'Mme Manitra','15','',NULL,'2023-04-07',6),(16,'Mme Anich&agrave;','16','',NULL,'2023-04-07',6),(17,'Anicha','17','',NULL,'2023-04-08',6),(18,'Mme Vanessa','18','',NULL,'2023-04-11',6),(19,'Danica','19','',NULL,'2023-04-11',6),(20,'Mme Hanitra','20','',NULL,'2023-04-12',6),(21,'Fitahiana','21','',NULL,'2023-04-15',6),(22,'Dada','22','',NULL,'2023-04-15',6),(23,'Divers','23','',NULL,'2023-04-15',6),(24,'Mme Seheno (Maman&#039;i Adriana)','24','',NULL,'2023-05-13',6),(25,'R&eacute;gularisation','25','',NULL,'2023-04-15',6),(26,'Mme Vololona','26','',NULL,'2023-04-17',6),(27,'Mme Nan&agrave;','27','',NULL,'2023-04-17',6),(28,'P&eacute;rim&eacute;s','28','',NULL,'2023-04-17',6),(29,'Escapade','29','',NULL,'2023-07-07',6),(30,'Danic&agrave;','30','',NULL,'2023-04-19',6),(31,'Peta','31','',NULL,'2023-04-19',6),(32,'Daddy','32','',NULL,'2023-04-21',6),(33,'Mme Santatra','33','',NULL,'2023-04-21',6),(34,'M Nantenaina','34','',NULL,'2023-04-26',6),(35,'Eliane','35','',NULL,'2023-05-05',6),(36,'Niry','36','',NULL,'2023-05-10',6),(37,'Mme Aingo','37','',NULL,'2023-05-11',6),(38,'Nantenaina (tsena m/sina)','38','',NULL,'2023-05-11',6),(39,'Dr Tiana','39','',NULL,'2023-05-11',1),(40,'Masera','40','',NULL,'2023-05-12',7),(41,'2&egrave; &eacute;tage','41','',NULL,'2023-05-12',7),(42,'Mme Hary','42','',NULL,'2023-05-12',7),(43,'Mme Tsiry','43','',NULL,'2023-05-12',7),(44,'Rabebe (Tsila)','44','',NULL,'2023-05-12',7),(45,'Mme Vololona','45','',NULL,'2023-05-12',7),(46,'Mme Tiana','46','',NULL,'2023-05-12',7),(47,'Iraka','47','',NULL,'2023-05-12',7),(48,'Allegra','48','',NULL,'2023-05-12',7),(49,'Hanta','49','',NULL,'2023-05-12',7),(50,'Mme Vanilla','50','',NULL,'2023-05-12',7),(51,'Mamih','51','',NULL,'2023-05-12',7),(52,'Mme Arlette','52','',NULL,'2023-05-12',7),(53,'Mme Arlette','52','',NULL,'2023-05-12',7),(54,'Dadabe an&#039;i Mikalo','54','',NULL,'2023-05-12',7),(55,'Mme Haingo (couche)','55','',NULL,'2023-06-17',6),(56,'Dadan&#039;ny 2&egrave; &eacute;tage','56','',NULL,'2023-05-12',7),(57,'Mme Clara','57','',NULL,'2023-05-12',7),(58,'Mme Francine','58','',NULL,'2023-05-12',7),(59,'Mlle Ando','59','',NULL,'2023-05-12',7),(60,'Zoary','60','',NULL,'2023-05-12',7),(61,'M.Hermann','61','',NULL,'2023-05-12',7),(62,'Mme Domoina','62','',NULL,'2023-05-12',7),(63,'1er &eacute;tage Mme Nirina','63','',NULL,'2023-05-13',6),(64,'1er &eacute;tage Mme Nirina','63','',NULL,'2023-05-13',6),(65,'Fitahiana','65','',NULL,'2023-05-12',7),(66,'Mme Mariette','66','',NULL,'2023-05-12',7),(67,'Avotra','67','',NULL,'2023-05-12',7),(68,'Mme Vanessa','68','',NULL,'2023-05-12',7),(69,'Vanessa','69','',NULL,'2023-05-12',7),(70,'Mamie','70','',NULL,'2023-05-12',7),(71,'Mme S&eacute;raphine','71','',NULL,'2023-05-12',7),(72,'M. Talance','72','',NULL,'2023-05-12',7),(73,'M.Benja','73','',NULL,'2023-05-12',7),(74,'M.Freddy','74','',NULL,'2023-05-12',7),(75,'Mme Tiana','75','',NULL,'2023-05-12',7),(76,'Mme Holy','76','',NULL,'2023-05-12',7),(77,'Mme Clara','77','',NULL,'2023-05-12',7),(78,'Avotra','78','',NULL,'2023-05-12',7),(79,'Flora','79','',NULL,'2023-05-12',7),(80,'Fenosoa','80','',NULL,'2023-05-12',7),(81,'M.Miranto','81','',NULL,'2023-05-12',7),(82,'Daniel','82','',NULL,'2023-05-12',7),(83,'Mme Rojo','83','',NULL,'2023-05-12',7),(84,'Mme Tinah','84','',NULL,'2023-05-12',7),(85,'Mme Vola (Bota)','85','',NULL,'2023-05-15',6),(86,'Mme Narindra','86','',NULL,'2023-05-12',7),(87,'Mme Vola 2','87','',NULL,'2023-05-12',7),(88,'M.Nantenaina 2','88','',NULL,'2023-05-12',7),(89,'Mme Miora','89','',NULL,'2023-05-12',7),(90,'Mme Eva','90','',NULL,'2023-05-12',7),(91,'Mme Vololona 2','91','',NULL,'2023-05-12',7),(92,'Mme Bao','92','',NULL,'2023-05-13',6),(93,'Mme Zoary','93','',NULL,'2023-05-13',6),(94,'Mme Sarah','94','',NULL,'2023-05-13',6),(95,'Toto Jeanne','95','',NULL,'2023-05-13',6),(96,'Mme Nantsoina','96','',NULL,'2023-05-13',6),(97,'Mme Nina','97','',NULL,'2023-05-13',6),(98,'Haritiana','98','',NULL,'2023-05-22',6),(99,'M Tanjona','99','',NULL,'2023-05-13',6),(100,'M Thierry','100','',NULL,'2023-05-17',6),(101,'M Emile','101','',NULL,'2023-05-13',6),(102,'Maman&#039;i Fiderana','102','',NULL,'2023-05-13',6),(103,'Mme Nirina','103','',NULL,'2023-05-13',6),(104,'Mme A&iuml;cha','104','',NULL,'2023-05-13',6),(105,'M T&ocirc;','105','',NULL,'2023-05-13',6),(106,'M T&ocirc;','105','',NULL,'2023-05-13',6),(107,'Mme Prisca','107','',NULL,'2023-05-13',6),(108,'Mme Prisca (yama)','108','',NULL,'2023-05-13',6),(109,'Mme Justine','109','',NULL,'2023-05-13',6),(110,'Mme Vololona (Bory volo)','110','',NULL,'2023-05-13',6),(111,'M Fanilo','111','',NULL,'2023-05-13',6),(112,'M Paul','112','',NULL,'2023-05-13',6),(113,'Bebe Bakoly','113','',NULL,'2023-05-15',6),(114,'Mme Andr&eacute;a','114','',NULL,'2023-05-13',6),(115,'Mme Bako','115','',NULL,'2023-05-13',6),(116,'Bebe','116','',NULL,'2023-05-13',6),(117,'Mme Seheno 2','117','',NULL,'2023-05-13',6),(118,'Garry','118','',NULL,'2023-05-13',6),(119,'Maman&#039;i Mathias','119','',NULL,'2023-05-13',6),(120,'Mme Miray','120','',NULL,'2023-05-13',6),(121,'Melle Mamy','121','',NULL,'2023-05-13',6),(122,'Melle Mamy','121','',NULL,'2023-05-13',6),(123,'Melle Mamy','121','',NULL,'2023-05-13',6),(124,'Mme Monique','124','',NULL,'2023-05-13',6),(125,'M Raoelison','125','',NULL,'2023-05-13',6),(126,'Bebe Liza','126','',NULL,'2023-05-13',6),(127,'Mme Hasina','127','',NULL,'2023-05-13',6),(128,'Tsila','128','',NULL,'2023-05-13',6),(129,'Mme Lova','129','',NULL,'2023-05-13',6),(130,'M Yvon','130','',NULL,'2023-05-13',6),(131,'Mme Sarindra','131','',NULL,'2023-05-13',6),(132,'Mme Sarindra','131','',NULL,'2023-05-13',6),(133,'Mme Bastina','133','',NULL,'2023-05-13',6),(134,'Mme Clarisse','134','',NULL,'2023-05-13',6),(135,'Mme Fanja','135','',NULL,'2023-05-13',6),(136,'Mme Fara','136','',NULL,'2023-05-13',6),(137,'Mme Fara','136','',NULL,'2023-05-13',6),(138,'M Benja','138','',NULL,'2023-05-13',6),(139,'Mme Vero','139','',NULL,'2023-05-13',6),(140,'Mme Aim&eacute;e','140','',NULL,'2023-05-13',6),(141,'Bebe Kala','141','',NULL,'2023-05-13',6),(142,'Bebe Kala','141','',NULL,'2023-05-13',6),(143,'Mme Zo','143','',NULL,'2023-05-13',6),(144,'Mme Pierette','144','',NULL,'2023-05-15',6),(145,'M Fidy','145','',NULL,'2023-05-15',6),(146,'M Tsiva','146','',NULL,'2023-05-15',6),(147,'Mme Faniry','147','',NULL,'2023-05-15',6),(148,'M Tiavina','148','',NULL,'2023-05-15',6),(149,'Mme Noro','149','',NULL,'2023-05-15',6),(150,'Mme Finaritra','150','',NULL,'2023-05-22',6),(151,'Mme Eliane','151','',NULL,'2023-05-15',6),(152,'Mme Holy (mme Mialy)','152','',NULL,'2023-05-15',6),(153,'Mme Vola Amparibe','153','',NULL,'2023-05-15',6),(154,'M Tojo','154','',NULL,'2023-05-15',6),(155,'Mme Onja','155','',NULL,'2023-05-15',6),(156,'M Fafah','156','',NULL,'2023-05-15',6),(157,'Mme Voahangy','157','',NULL,'2023-05-15',6),(158,'Melle Domoina','158','',NULL,'2023-05-15',6),(159,'Melle Retsy','159','',NULL,'2023-05-15',6),(160,'Mme Fanja (Zoto)','160','',NULL,'2023-05-16',6),(161,'Mme Maeva','161','',NULL,'2023-05-15',6),(162,'Faniry','162','',NULL,'2023-05-15',6),(163,'Mme Mireille (avocate)','163','',NULL,'2023-05-15',6),(164,'Sephora','164','',NULL,'2023-05-15',6),(165,'Mme Holy 1','165','',NULL,'2023-05-15',6),(166,'Mme Valencia','166','',NULL,'2023-05-15',6),(167,'M Lalaina','167','',NULL,'2023-05-15',6),(168,'Lisy','168','',NULL,'2023-05-16',6),(169,'Toto','169','',NULL,'2023-05-16',6),(170,'Jos&eacute;phine','170','',NULL,'2023-05-16',6),(171,'Mme Nivo','171','',NULL,'2023-05-16',6),(172,'Franchine','172','',NULL,'2023-05-16',6),(173,'Mme Niry','173','',NULL,'2023-05-16',6),(174,'Mme Louisa','174','',NULL,'2023-05-16',6),(175,'M Ndriana','175','',NULL,'2023-05-16',6),(176,'Prisca','176','',NULL,'2023-05-16',6),(177,'Mme Mbola','177','',NULL,'2023-05-16',6),(178,'Mme Harilova','178','',NULL,'2023-05-16',6),(179,'Mme Hanitra 1','179','',NULL,'2023-05-16',6),(180,'Mme Emma','180','',NULL,'2023-05-16',6),(181,'Mme Ranja','181','',NULL,'2023-05-16',6),(182,'Manitra','182','',NULL,'2023-05-16',6),(183,'Miora (lava volo)','183','',NULL,'2023-05-16',6),(184,'Mme El&eacute;onore','184','',NULL,'2023-05-16',6),(185,'Mme Ony','185','',NULL,'2023-05-16',6),(186,'Heritiana','186','',NULL,'2023-05-16',6),(187,'Mme Domoina(cookies)','187','',NULL,'2023-05-16',6),(188,'Mme Emma 1','188','',NULL,'2023-05-16',6),(189,'Mme Nomena','189','',NULL,'2023-05-16',6),(190,'Dadan&#039;i Kambana','190','',NULL,'2023-05-16',6),(191,'Mr Mathieu','191','',NULL,'2023-05-17',6),(192,'M.Fafah','192','',NULL,'2023-05-17',6),(193,'Mme Nosy','193','',NULL,'2023-05-17',6),(194,'Mlle Sitraka','194','',NULL,'2023-05-17',6),(195,'M.Rija','195','',NULL,'2023-05-17',6),(196,'M.Hery','196','',NULL,'2023-05-17',6),(197,'Major','197','',NULL,'2023-05-17',6),(198,'M..Rolland','198','',NULL,'2023-05-17',6),(199,'Mme Sylvia','199','',NULL,'2023-05-17',6),(200,'Mr Jeremia','200','',NULL,'2023-05-17',6),(201,'Mme Ony coupe carr&eacute;','201','',NULL,'2023-05-17',6),(202,'Mr Mahandry','202','',NULL,'2023-05-17',6),(203,'vero','203','',NULL,'2023-05-17',6),(204,'Mlle Nosy','204','',NULL,'2023-05-17',6),(205,'Mme Zara','205','',NULL,'2023-05-17',6),(206,'Mr Emile','206','',NULL,'2023-05-17',6),(207,'Mme Ainasoa','207','',NULL,'2023-05-17',6),(208,'Mme Domoina kely','208','',NULL,'2023-05-17',6),(209,'Mme naly','209','',NULL,'2023-05-17',6),(210,'Mathieu&amp;Roger','210','',NULL,'2023-05-19',6),(211,'M Tsila','211','',NULL,'2023-05-19',6),(212,'Gladys','212','',NULL,'2023-05-19',6),(213,'Mme Fortuna','213','',NULL,'2023-05-19',6),(214,'Mme Sana','214','',NULL,'2023-05-19',6),(215,'M Gaby','215','',NULL,'2023-05-19',6),(216,'Mme Linda','216','',NULL,'2023-05-19',6),(217,'Navalona','217','',NULL,'2023-05-19',6),(218,'Mme Sombiniaina','218','',NULL,'2023-07-05',6),(219,'Tahiana','219','',NULL,'2023-05-20',6),(220,'Maman&#039;i Sarobidy','220','',NULL,'2023-05-20',6),(221,'Mme Liantsoa','221','',NULL,'2023-05-20',6),(222,'Mme Mihaja','222','',NULL,'2023-05-20',6),(223,'Inspecteur d&#039;Etat','223','',NULL,'2023-05-20',6),(224,'Eric caf&eacute;','224','',NULL,'2023-05-20',6),(225,'M Ramarolahy','225','',NULL,'2023-05-20',6),(226,'Dr Holy','226','',NULL,'2023-05-22',6),(227,'Mme Saholy','227','',NULL,'2023-05-22',6),(228,'Mme Lala','228','',NULL,'2023-05-22',6),(229,'Mme Hoby','229','',NULL,'2023-05-22',6),(230,'SVR','230','',NULL,'2023-05-22',6),(231,'Mme Henintsoa','231','',NULL,'2023-05-22',6),(232,'Mme Colette','232','',NULL,'2023-05-23',6),(233,'Mme Diamondra','233','',NULL,'2023-05-23',6),(234,'Mme Diamondra','233','',NULL,'2023-05-23',6),(235,'Martine','235','',NULL,'2023-05-23',6),(236,'Mme Lily','236','',NULL,'2023-05-24',6),(237,'Mme Lily','236','',NULL,'2023-05-24',6),(238,'Mme Rinah','238','',NULL,'2023-05-24',6),(239,'Mamie 2','239','',NULL,'2023-05-24',6),(240,'Mamie 2','239','',NULL,'2023-05-24',6),(241,'Mme Fara (lunettes)','241','',NULL,'2023-05-24',6),(242,'Mme Ony (solomaso)','242','',NULL,'2023-05-24',6),(243,'Mme Claudia','243','',NULL,'2023-05-25',6),(244,'Mme Claudia','243','',NULL,'2023-05-25',6),(245,'Mme Vololona (solomaso,lava volo)','245','',NULL,'2023-05-25',6),(246,'Mme Vololona (solomaso,lava volo)','245','',NULL,'2023-05-25',6),(247,'Mme Tsivery','247','',NULL,'2023-05-25',6),(248,'Mme Tsivery','247','',NULL,'2023-05-25',6),(249,'MADIS','249','',NULL,'2023-05-25',6),(250,'MADIS','249','',NULL,'2023-05-25',6),(251,'Maman&#039;i Tsiky (Mme Holy)','251','',NULL,'2023-06-03',6),(252,'Mme Patricia','252','',NULL,'2023-05-26',6),(253,'Mme Ravaka','253','',NULL,'2023-05-26',6),(254,'Mme Ravaka','253','',NULL,'2023-05-26',6),(255,'Christin&agrave;','255','',NULL,'2023-05-26',6),(256,'Jaba','256','',NULL,'2023-05-26',6),(257,'Mika','257','',NULL,'2023-05-26',6),(258,'Mika','258','',NULL,'2023-05-26',6),(259,'Mme Mihary','259','',NULL,'2023-05-26',6),(260,'M Abel','260','',NULL,'2023-05-26',6),(261,'Maman&#039;i Miangaly','261','',NULL,'2023-05-27',6),(262,'M Pierre','262','',NULL,'2023-05-27',6),(263,'STHD','263','',NULL,'2023-05-27',6),(264,'Mme Kaloy','264','',NULL,'2023-05-27',6),(265,'Mme Nambinina','265','',NULL,'2023-05-27',6),(266,'Mme Larissa','266','',NULL,'2023-05-27',6),(267,'Mme Cynthia','267','',NULL,'2023-05-27',6),(268,'Maman&#039;i Mme Mialy','268','',NULL,'2023-05-29',6),(269,'M Nirina','269','',NULL,'2023-05-29',6),(270,'Mme Liliane','270','',NULL,'2023-05-29',6),(271,'Ifaliana','271','',NULL,'2023-05-31',6),(272,'Mme Lalaina','272','',NULL,'2023-05-31',6),(273,'Pharmacie HUJRB','273','',NULL,'2023-05-31',6),(274,'Mme Blandine','274','',NULL,'2023-05-31',6),(275,'Mme Nadia','275','',NULL,'2023-05-31',6),(276,'Pota','276','',NULL,'2023-05-31',6),(277,'Mme Sedra','277','',NULL,'2023-05-31',6),(278,'Mme Voahangy (lava volo)','278','',NULL,'2023-05-31',6),(279,'Mme Henriette','279','',NULL,'2023-05-31',6),(280,'Mme Aina Fara','280','',NULL,'2023-06-01',6),(281,'Mme Charlotte','281','',NULL,'2023-06-01',6),(282,'Mme Charlotte','281','',NULL,'2023-06-01',6),(283,'Mme Tane','283','',NULL,'2023-06-02',6),(284,'M Tiana','284','',NULL,'2023-06-02',6),(285,'Fianarantsoa','285','',NULL,'2023-06-02',6),(286,'Aingo','286','',NULL,'2023-06-02',6),(287,'M Timoty','287','',NULL,'2023-06-02',6),(288,'Mme Annie','288','',NULL,'2023-06-02',6),(289,'Mme Sariaka','289','',NULL,'2023-06-02',6),(290,'Mme Tiana 1','290','',NULL,'2023-06-02',6),(291,'M Samy','291','',NULL,'2023-06-03',6),(292,'Sahondra','292','',NULL,'2023-06-03',6),(293,'Sahondra','292','',NULL,'2023-06-03',6),(294,'M Vonjy','294','',NULL,'2023-06-03',6),(295,'M Dominique','295','',NULL,'2023-06-03',6),(296,'Lahatra','296','',NULL,'2023-06-03',6),(297,'Zanak&#039;i Bebe','297','',NULL,'2023-06-03',6),(298,'Mme Jos&eacute;phine','298','',NULL,'2023-06-03',6),(299,'Mme Fanja (mpivarotra gateau)','299','',NULL,'2023-06-13',6),(300,'St&eacute;phanie (Zanak&#039;i Mme Domoina)','300','',NULL,'2023-06-06',6),(301,'Dr Sylvia','301','',NULL,'2023-06-07',6),(302,'M Andry(Benja)','302','',NULL,'2023-06-07',6),(303,'Toto Sera','303','',NULL,'2023-06-07',6),(304,'Maman&#039;i Miora','304','',NULL,'2023-06-07',6),(305,'Rose','305','',NULL,'2023-06-08',6),(306,'Soeur Philom&egrave;ne','306','',NULL,'2023-06-08',6),(307,'Mme Mamisoa','307','',NULL,'2023-06-08',6),(308,'Mme Mamisoa','307','',NULL,'2023-06-08',6),(309,'Mme Edena','309','',NULL,'2023-06-09',6),(310,'Mme Edena','309','',NULL,'2023-06-09',6),(311,'Dr Bakoly','311','',NULL,'2023-06-09',6),(312,'M Henri','312','',NULL,'2023-06-10',6),(313,'M Henri','312','',NULL,'2023-06-10',6),(314,'M Frank','314','',NULL,'2023-06-10',6),(315,'M Frank','314','',NULL,'2023-06-10',6),(316,'Mme Suzy','316','',NULL,'2023-06-10',6),(317,'Mme Holy (Itokiana&amp;Mahatoky)','317','',NULL,'2023-06-12',6),(318,'M Nary','318','',NULL,'2023-06-12',6),(319,'Mme Alida','319','',NULL,'2023-06-13',6),(320,'Mme Mirana','320','',NULL,'2023-06-13',6),(321,'M Mamisoa','321','',NULL,'2023-06-13',6),(322,'M Thierry (Vanessa)','322','',NULL,'2023-06-14',6),(323,'Mpiasan&#039;ny CNAPS','323','',NULL,'2023-06-14',6),(324,'Ravaka','324','',NULL,'2023-06-16',6),(325,'SMARTY SHOP','325','',NULL,'2023-06-17',6),(326,'Jeanne','326','',NULL,'2023-06-19',6),(327,'Maman&#039;i Linda','327','',NULL,'2023-06-19',6),(328,'Mme Lilly','328','',NULL,'2023-06-20',6),(329,'M Roger','329','',NULL,'2023-06-22',6),(330,'MBL Service','330','',NULL,'2023-06-23',6),(331,'Zo','331','',NULL,'2023-06-23',6),(332,'M.Mbola','332','',NULL,'2023-06-23',6),(333,'Mme Rondro (Ilay caf&eacute;)','333','',NULL,'2023-06-23',6),(334,'Professeur','334','',NULL,'2023-06-24',6),(335,'Mme Sahondra','335','',NULL,'2023-06-24',6),(336,'Rafredy','336','',NULL,'2023-06-26',6),(337,'Dadan&#039;i Mme mialy','337','',NULL,'2023-06-27',6),(338,'Tiana','338','',NULL,'2023-06-30',6),(339,'Toto Sa','339','',NULL,'2023-07-01',7),(340,'Toky','340','',NULL,'2023-07-01',7),(341,'Haingo','341','',NULL,'2023-07-01',7),(342,'Mme Rosette','342','',NULL,'2023-07-03',6),(343,'Bebe Hoby','343','',NULL,'2023-07-04',6),(344,'Norbert','344','',NULL,'2023-07-04',6),(345,'CHUJRB','345','',NULL,'2023-07-07',6),(346,'Pharmacie CHUJRB','346','',NULL,'2023-07-07',6),(347,'Mme Volana','347','',NULL,'2023-07-07',6),(348,'EKAR IFARIHY','348','',NULL,'2023-07-17',6),(349,'M Haingo','349','',NULL,'2023-07-18',6),(350,'Mme Volatiana','350','',NULL,'2023-07-19',6),(351,'Florence','351','',NULL,'2023-07-20',6),(352,'M Lolo/Mme Michelle','352','',NULL,'2023-07-20',6);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detentree`
--

DROP TABLE IF EXISTS `detentree`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detentree` (
  `detent_code` int NOT NULL AUTO_INCREMENT,
  `ent_code` int NOT NULL,
  `tar_code` int NOT NULL,
  `detent_qte` decimal(10,0) NOT NULL,
  `detent_pu` float(10,2) NOT NULL,
  `detent_montant` float(10,2) NOT NULL,
  `user_code_upd` int DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`detent_code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detentree`
--

LOCK TABLES `detentree` WRITE;
/*!40000 ALTER TABLE `detentree` DISABLE KEYS */;
INSERT INTO `detentree` VALUES (1,3,2,1,10000.00,10000.00,1,'2024-01-12 16:34:12');
/*!40000 ALTER TABLE `detentree` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entree`
--

DROP TABLE IF EXISTS `entree`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entree` (
  `ent_code` int NOT NULL AUTO_INCREMENT,
  `cli_code` int DEFAULT NULL,
  `user_code` int DEFAULT NULL,
  `ent_date` date DEFAULT NULL,
  `fou_code` int DEFAULT NULL,
  `ent_heure` varchar(10) DEFAULT NULL,
  `ent_facture` varchar(255) DEFAULT NULL,
  `ent_montant_payer` float(10,2) DEFAULT NULL,
  `ent_montant_encaisse` float(10,2) DEFAULT NULL,
  `ent_reste` float(10,2) DEFAULT NULL,
  `ent_payer_plus_tard` int DEFAULT NULL,
  `ent_mode_paiement` varchar(255) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `user_code_upd` int DEFAULT NULL,
  PRIMARY KEY (`ent_code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entree`
--

LOCK TABLES `entree` WRITE;
/*!40000 ALTER TABLE `entree` DISABLE KEYS */;
INSERT INTO `entree` VALUES (3,316,NULL,'2024-01-12',NULL,'11:25','00000001/01/2024',0.00,0.00,NULL,0,NULL,'2024-01-12 12:45:05',1);
/*!40000 ALTER TABLE `entree` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fournisseur` (
  `fou_code` int NOT NULL AUTO_INCREMENT,
  `fou_nom` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `ref_abrev` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `fou_phone` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `user_code_upd` decimal(11,0) DEFAULT NULL,
  PRIMARY KEY (`fou_code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fournisseur`
--

LOCK TABLES `fournisseur` WRITE;
/*!40000 ALTER TABLE `fournisseur` DISABLE KEYS */;
INSERT INTO `fournisseur` VALUES (1,'Autre','1','',NULL,'2023-04-01',1),(2,'Socobis','2','0330030030',NULL,'2023-04-01',1),(3,'SOCOLAIT','3','',NULL,'2023-04-13',6),(4,'Miangola','4','',NULL,'2023-04-08',6),(5,'Bureau','5','',NULL,'2023-04-08',6),(6,'Tiko','6','',NULL,'2023-04-08',6),(7,'Tranombarotra DYLAN','7','',NULL,'2023-05-05',6),(8,'FIOTAZANTSOA','8','',NULL,'2023-05-08',6),(9,'STAR','9','',NULL,'2023-04-08',6),(10,'yoplait','10','',NULL,'2023-04-12',6),(11,'Santatra','11','',NULL,'2023-04-12',6),(12,'cookies','12','',NULL,'2023-04-12',6),(13,'Maminiaina','13','',NULL,'2023-04-12',6),(14,'PHOENIX','14','',NULL,'2023-04-13',6),(15,'BABY MARKET','15','',NULL,'2023-04-13',6),(16,'JADIDA K&sup2;','16','',NULL,'2023-04-13',6),(17,'TANA TRADE','17','',NULL,'2023-04-13',6),(18,'MIAM','18','',NULL,'2023-04-14',6),(19,'JB','19','',NULL,'2023-04-14',6),(20,'BONGOU','20','',NULL,'2023-04-14',6),(21,'Sofia','21','',NULL,'2023-04-14',6),(22,'M&amp;G STATIONERY','22','',NULL,'2023-04-14',6),(23,'SOMAPRO','23','',NULL,'2023-04-14',6),(24,'R&eacute;gularisation','24','',NULL,'2023-04-17',6),(25,'Tr AMPASIKA','25','',NULL,'2023-04-17',6),(26,'MANGABE','26','',NULL,'2023-04-17',6),(27,'OASIS SHOP','27','',NULL,'2023-04-17',6),(28,'shopli','28','',NULL,'2023-04-17',6),(29,'DRINKS','29','',NULL,'2023-04-18',6),(30,'SALONE','30','',NULL,'2023-04-18',6),(31,'ECONO MARKET','31','',NULL,'2023-04-19',6),(32,'Mme Domoina','32','',NULL,'2023-04-19',6),(33,'Tr ALEXANDRA','33','',NULL,'2023-04-20',6),(34,'NEW VISION DISTRIBUTION SARLU','34','',NULL,'2023-04-24',6),(35,'Fromage FI','35','',NULL,'2023-04-25',6),(36,'NUTRIZAZA','36','',NULL,'2023-04-25',6),(37,'EXIMCO','37','',NULL,'2023-04-26',6),(38,'Chocolaterie ROBERT','38','',NULL,'2023-04-27',6),(39,'AKERA','39','',NULL,'2023-05-02',6),(40,'Nivo','40','',NULL,'2023-05-03',6),(41,'LANDRYS SARLU','41','',NULL,'2023-05-05',6),(42,'SANI+','42','',NULL,'2023-05-09',6),(43,'Top Cyber','43','',NULL,'2023-05-09',6),(44,'Elys&eacute;e (Tal)','44','',NULL,'2023-05-12',7),(45,'Melle Domoina','45','0342690470',NULL,'2023-05-16',6),(46,'Savonnerie Tropicale','46','',NULL,'2023-05-17',6),(47,'TAF','47','',NULL,'2023-05-19',6),(48,'HOMEOPHARMA','48','',NULL,'2023-05-20',6),(49,'SODISCO','49','',NULL,'2023-05-24',6),(50,'UNIFOODS','50','',1,'2023-05-24',6),(51,'UNIFOODS','50','',1,'2023-05-24',6),(52,'UNIFOODS','52','',NULL,'2023-05-24',6),(53,'MADIS','53','',NULL,'2023-05-25',6),(54,'MADIS','53','',NULL,'2023-05-25',6),(55,'SOAMANATOMBO','55','',NULL,'2023-06-02',6),(56,'CELLUPACK','56','',NULL,'2023-06-06',6),(57,'Leader Price','57','',NULL,'2023-06-07',6),(58,'JEDIDIA','58','',1,'2023-06-10',6),(59,'JEDIDIA','58','',1,'2023-06-10',6),(60,'MADAKALY','60','',NULL,'2023-06-10',6),(61,'JEDIDIA','61','',NULL,'2023-06-10',6),(62,'SAMIAM','62','',NULL,'2023-06-13',6),(63,'Niaina','63','',NULL,'2023-06-15',6),(64,'Agrikoba','64','',NULL,'2023-06-20',6),(65,'Nutrilait','65','',NULL,'2023-06-20',6),(66,'SEMINA','66','',NULL,'2023-06-24',6),(67,'BURONET','67','',NULL,'2023-07-06',6),(68,'CHANDARANA','68','',1,'2023-07-07',6),(69,'CHANDARANA','68','',1,'2023-07-07',6),(70,'CHANDARANA','70','',NULL,'2023-07-07',6),(71,'SHANTILAL','71','',NULL,'2023-07-12',6);
/*!40000 ALTER TABLE `fournisseur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu` (
  `men_id` int NOT NULL AUTO_INCREMENT,
  `men_icon` varchar(255) DEFAULT NULL,
  `men_parent` varchar(255) DEFAULT NULL,
  `men_nom` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `men_html` varchar(255) DEFAULT NULL,
  `men_getText` varchar(20) DEFAULT NULL,
  `men_url` varchar(255) DEFAULT NULL,
  `men_parent2` int DEFAULT NULL,
  `men_parent3` int DEFAULT NULL,
  `rang` int DEFAULT NULL,
  `men_restaure` int DEFAULT NULL,
  `deleted` int DEFAULT NULL,
  PRIMARY KEY (`men_id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'user','OPT','Utilisateur',NULL,NULL,'/caisse/pages/admin/listeutilisateur.php',NULL,NULL,1,NULL,NULL),(2,'cog','OPT','Param&egrave;tre',NULL,NULL,'/caisse/pages/admin/listeparametre.php',NULL,NULL,2,NULL,NULL),(3,'book','OPT','Autre',NULL,NULL,'/caisse/pages/parametrage/listeautre.php',NULL,NULL,3,NULL,NULL),(4,'hdd','OPT','Sauvegarde ou Restauration',NULL,NULL,'/caisse/pages/parametrage/backrestore.php',NULL,NULL,4,NULL,NULL),(5,'file','TRAIT','Importation des articles depuis xlsx',NULL,NULL,'/caisse/pages/creation/formimportarticle.php',NULL,NULL,1,NULL,NULL),(6,'text-background','TRAIT','Tarif',NULL,NULL,'/caisse/pages/creation/listearticle.php',NULL,NULL,2,1,NULL),(7,'resize-small','TRAIT','Entr&eacute;es',NULL,NULL,'/caisse/pages/creation/listeentree.php',NULL,NULL,3,1,NULL),(8,'pencil','TRAIT','Gestion des articles non vendus',NULL,NULL,'/caisse/pages/creation/listeinventaire.php',NULL,NULL,5,1,NULL),(9,'calendar','EDIT','Historique E/S',NULL,NULL,'/caisse/pages/edition/formehistoriqueES.php',NULL,NULL,1,NULL,NULL),(10,'search','EDIT','Historique des articles non vendus',NULL,NULL,'/caisse/pages/edition/formHistoInventaire.php',NULL,NULL,2,NULL,NULL),(11,'comment','EDIT','Graph sur le top vente',NULL,NULL,'/caisse/pages/edition/formInventaire.php',NULL,NULL,4,NULL,NULL),(12,'check','OPT','Habilitation Menu',NULL,NULL,'/caisse/pages/admin/habilitationMenu.php',NULL,NULL,5,NULL,NULL),(13,NULL,NULL,'Ajouter','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-plus\"></i></i>','btnAjouter','',1,NULL,NULL,NULL,NULL),(14,NULL,NULL,'Modifier','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-pencil\"></i></i>','btnModifier','',1,NULL,NULL,NULL,NULL),(15,NULL,NULL,'Supprimer','<i class=\"btn btn-danger\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-remove\"></i></i>','btnSupprimer','',1,NULL,NULL,NULL,NULL),(16,NULL,NULL,'Modifier','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-pencil\"></i></i>','btnModifier','',2,NULL,NULL,NULL,NULL),(17,NULL,NULL,'Ajouter','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-plus\"></i></i>','btnAjouter','',3,NULL,NULL,NULL,NULL),(18,NULL,NULL,'Modifier','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-pencil\"></i></i>','btnModifier','',3,NULL,NULL,NULL,NULL),(19,NULL,NULL,'Supprimer','<i class=\"btn btn-danger\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-remove\"></i></i>','btnSupprimer','',3,NULL,NULL,NULL,NULL),(21,NULL,NULL,'Modifier','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-pencil\"></i></i>','btnModifier','',6,NULL,NULL,NULL,NULL),(22,NULL,NULL,'Supprimer','<i class=\"btn btn-danger\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-remove\"></i></i>','btnSupprimer','',6,NULL,NULL,NULL,NULL),(23,NULL,NULL,'Ajouter','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-plus\"></i></i>','btnAjouter','',7,NULL,1,NULL,NULL),(24,NULL,NULL,'Modifier','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-pencil\"></i></i>','btnModifier','',7,NULL,2,NULL,NULL),(25,NULL,NULL,'Supprimer','<i class=\"btn btn-danger\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-remove\"></i></i>','btnSupprimer','',7,NULL,3,NULL,NULL),(26,NULL,NULL,'Detail','<i class=\"btn btn-info\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-book btnupdate\"></i></i>','detail','/caisse/pages/creation/listedetentree.php',7,NULL,5,1,NULL),(27,NULL,NULL,'Ajouter','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-plus\"></i></i>','btnAjouter','',NULL,26,NULL,NULL,NULL),(28,NULL,NULL,'Modifier','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-pencil\"></i></i>','btnModifier','',NULL,26,NULL,NULL,NULL),(29,NULL,NULL,'Supprimer','<i class=\"btn btn-danger\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-remove\"></i></i>','btnSupprimer','',NULL,26,NULL,NULL,NULL),(30,NULL,NULL,'Ajouter','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-plus\"></i></i>','btnAjouter','',8,NULL,NULL,NULL,NULL),(31,NULL,NULL,'Modifier','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-pencil\"></i></i>','btnModifier','',8,NULL,NULL,NULL,NULL),(32,NULL,NULL,'Supprimer','<i class=\"btn btn-danger\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-remove\"></i></i>','btnSupprimer','',8,NULL,NULL,NULL,NULL),(33,NULL,NULL,'Detail Inventaire','<i class=\"btn btn-info\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-book btnupdate\"></i></i>','detail','/caisse/pages/creation/listedetinv.php',8,NULL,NULL,1,NULL),(34,NULL,NULL,'Ajouter','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-plus\"></i></i>','btnAjouter','',NULL,33,NULL,NULL,NULL),(35,NULL,NULL,'Modifier','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-pencil\"></i></i>','btnModifier','',NULL,33,NULL,NULL,NULL),(36,NULL,NULL,'Supprimer','<i class=\"btn btn-danger\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-remove\"></i></i>','btnSupprimer','',NULL,33,NULL,NULL,NULL),(37,NULL,NULL,'T&eacute;lecharger','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-download\"></i></i>','telecharger','',4,NULL,NULL,NULL,NULL),(38,NULL,NULL,'Supprimer','<i class=\"btn btn-danger\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-remove\"></i></i>','btnSupprimer','',4,NULL,NULL,NULL,NULL),(39,NULL,NULL,'Valider','<i type=\"button\" class=\"btn btn-success\">Valider</i>','btnValider','',4,NULL,NULL,NULL,NULL),(40,NULL,NULL,'Valider','<i type=\"button\" class=\"btn btn-success\">Valider</i>','btnValider','',12,NULL,NULL,NULL,NULL),(41,'floppy-remove','TRAIT','Restauration donn&eacute;es perdues',NULL,NULL,'/caisse/pages/creation/listeDelete.php',NULL,NULL,6,NULL,NULL),(42,NULL,NULL,'Restaurer','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-pencil\"></i></i>','btnModifier','',41,NULL,NULL,NULL,NULL),(43,NULL,NULL,'Ajouter','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-plus\"></i></i>','btnAjouter','',6,NULL,NULL,NULL,NULL),(44,'search','EDIT','Stat Article',NULL,NULL,'/caisse/pages/edition/formStatArticle.php',NULL,NULL,3,NULL,NULL),(45,NULL,NULL,'Deverouiller','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-pencil\"></i></i>','btnVerouiller','',9,NULL,NULL,NULL,NULL),(46,NULL,NULL,'Deverouiller','<i class=\"btn btn-danger\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-lock\"></i></i>','btnVerouiller','',7,NULL,4,NULL,NULL),(47,'resize-full','TRAIT','Sorties',NULL,NULL,'/caisse/pages/creation/listesortie.php',NULL,NULL,4,1,NULL),(48,NULL,NULL,'Ajouter','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-plus\"></i></i>','btnAjouter','',47,NULL,1,NULL,NULL),(49,NULL,NULL,'Modifier','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-pencil\"></i></i>','btnModifier','',47,NULL,2,NULL,NULL),(50,NULL,NULL,'Supprimer','<i class=\"btn btn-danger\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-remove\"></i></i>','btnSupprimer','',47,NULL,3,NULL,NULL),(51,NULL,NULL,'Detail','<i class=\"btn btn-info\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-book btnupdate\"></i></i>','detail','/caisse/pages/creation/listedetmvt.php?mvt_type=S',47,NULL,5,1,NULL),(52,NULL,NULL,'Deverouiller','<i class=\"btn btn-danger\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-lock\"></i></i>','btnVerouiller','',47,NULL,4,NULL,NULL),(54,NULL,NULL,'Ajouter','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-plus\"></i></i>','btnAjouter','',NULL,51,NULL,NULL,NULL),(55,NULL,NULL,'Modifier','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-pencil\"></i></i>','btnModifier','',NULL,51,NULL,NULL,1),(56,NULL,NULL,'Supprimer','<i class=\"btn btn-danger\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-remove\"></i></i>','btnSupprimer','',NULL,51,NULL,NULL,NULL),(57,NULL,NULL,'Archiver','<i class=\"btn btn-warning\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-compressed\"></i></i>','btnArchiver',NULL,7,NULL,5,NULL,NULL);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parametre`
--

DROP TABLE IF EXISTS `parametre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parametre` (
  `param_key` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `param_value` varchar(255) DEFAULT NULL,
  `param_desc` text,
  `param_comment` text,
  `param_visible` int DEFAULT NULL,
  PRIMARY KEY (`param_key`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parametre`
--

LOCK TABLES `parametre` WRITE;
/*!40000 ALTER TABLE `parametre` DISABLE KEYS */;
INSERT INTO `parametre` VALUES ('ADRESSE_SOCIETE','Mahamasina Sud ','','',1),('CONTACT','0340553654',NULL,NULL,1),('DESC_SOCIETE','PPN et Marchandises g&eacute;n&eacute;rales','','',1),('DOSSIER_SAUVEGARDE','C:\\laragon\\www\\caisse\\base','','',1),('FACEBOOK','4HPPN',NULL,NULL,NULL),('HEURE_OUVERTURE','Du Lun au Ven de 7h30 &agrave;&nbsp; 17h  Sam 7h30 &agrave;&nbsp; 16h30','','',1),('LIB_AUTO_ES','ENT|SOR',NULL,NULL,0),('MENU_PARENT','OPT|Option,TRAIT|Traitement,EDIT|Edition',NULL,NULL,0),('NIF','3011752013','','',1),('NOM_MONNAIE','Ariary',NULL,NULL,1),('NOM_MONNAIE_COURT','Ar',NULL,NULL,1),('NOM_SOCIETE','Tranombarotra 4H','','',1),('NOM_SOCIETE_COURT','4H PPN',NULL,NULL,1),('STAT','46201112022010428',NULL,NULL,1);
/*!40000 ALTER TABLE `parametre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profil`
--

DROP TABLE IF EXISTS `profil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profil` (
  `prf_code` int NOT NULL AUTO_INCREMENT,
  `prf_nom` varchar(255) NOT NULL,
  `ref_abrev` varchar(10) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `user_code_upd` decimal(11,0) DEFAULT NULL,
  PRIMARY KEY (`prf_code`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil`
--

LOCK TABLES `profil` WRITE;
/*!40000 ALTER TABLE `profil` DISABLE KEYS */;
INSERT INTO `profil` VALUES (7,'Admin','ADMIN',NULL,'2022-10-11',1),(8,'Saisie','SAISIE',NULL,'2022-10-11',1),(9,'Caisse','CAISSE',NULL,'2023-03-20',1);
/*!40000 ALTER TABLE `profil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profil_autre`
--

DROP TABLE IF EXISTS `profil_autre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profil_autre` (
  `pfr_autre_id` int NOT NULL AUTO_INCREMENT,
  `prf_code` int DEFAULT NULL,
  `tpr_code` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`pfr_autre_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil_autre`
--

LOCK TABLES `profil_autre` WRITE;
/*!40000 ALTER TABLE `profil_autre` DISABLE KEYS */;
INSERT INTO `profil_autre` VALUES (24,7,'CATEGORIE'),(25,7,'CLIENT'),(26,7,'FOURNISSEUR'),(27,7,'MODE'),(28,7,'PROFIL'),(30,9,'CLIENT');
/*!40000 ALTER TABLE `profil_autre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profil_menu`
--

DROP TABLE IF EXISTS `profil_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profil_menu` (
  `pfr_men_id` int NOT NULL AUTO_INCREMENT,
  `prf_code` int DEFAULT NULL,
  `men_id` int DEFAULT NULL,
  `menu_principale` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`pfr_men_id`)
) ENGINE=InnoDB AUTO_INCREMENT=637 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil_menu`
--

LOCK TABLES `profil_menu` WRITE;
/*!40000 ALTER TABLE `profil_menu` DISABLE KEYS */;
INSERT INTO `profil_menu` VALUES (91,9,NULL,'OPT'),(92,9,3,NULL),(93,9,17,NULL),(94,9,18,NULL),(95,9,47,NULL),(96,9,48,NULL),(97,9,49,NULL),(98,9,51,NULL),(99,9,54,NULL),(100,9,56,NULL),(370,8,6,NULL),(582,7,NULL,'OPT'),(583,7,1,NULL),(584,7,13,NULL),(585,7,14,NULL),(586,7,15,NULL),(587,7,2,NULL),(588,7,16,NULL),(589,7,3,NULL),(590,7,17,NULL),(591,7,18,NULL),(592,7,19,NULL),(593,7,4,NULL),(594,7,37,NULL),(595,7,38,NULL),(596,7,39,NULL),(597,7,12,NULL),(598,7,40,NULL),(599,7,5,NULL),(600,7,6,NULL),(601,7,21,NULL),(602,7,22,NULL),(603,7,43,NULL),(604,7,7,NULL),(605,7,23,NULL),(606,7,24,NULL),(607,7,25,NULL),(608,7,46,NULL),(609,7,26,NULL),(610,7,27,NULL),(611,7,28,NULL),(612,7,29,NULL),(613,7,57,NULL),(614,7,47,NULL),(615,7,48,NULL),(616,7,49,NULL),(617,7,50,NULL),(618,7,52,NULL),(619,7,51,NULL),(620,7,54,NULL),(621,7,56,NULL),(622,7,8,NULL),(623,7,30,NULL),(624,7,31,NULL),(625,7,32,NULL),(626,7,33,NULL),(627,7,34,NULL),(628,7,35,NULL),(629,7,36,NULL),(630,7,41,NULL),(631,7,42,NULL),(632,7,9,NULL),(633,7,45,NULL),(634,7,10,NULL),(635,7,44,NULL),(636,7,11,NULL);
/*!40000 ALTER TABLE `profil_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `referentielle`
--

DROP TABLE IF EXISTS `referentielle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `referentielle` (
  `ref_code` int NOT NULL AUTO_INCREMENT,
  `tpr_code` varchar(25) NOT NULL,
  `ann_code` int DEFAULT NULL,
  `per_code` int DEFAULT NULL,
  `ref_abrev` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ref_champ1` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `ref_champ2` varchar(1000) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `ref_champ3` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `ref_champ4` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `ref_champ5` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `user_code_upd` decimal(11,0) DEFAULT NULL,
  PRIMARY KEY (`ref_code`),
  KEY `fk_association_22` (`ann_code`),
  KEY `fk_association_24` (`tpr_code`),
  KEY `fk_association_29` (`per_code`),
  CONSTRAINT `referentielle_ibfk_1` FOREIGN KEY (`tpr_code`) REFERENCES `type_reference` (`tpr_code`)
) ENGINE=InnoDB AUTO_INCREMENT=565 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referentielle`
--

LOCK TABLES `referentielle` WRITE;
/*!40000 ALTER TABLE `referentielle` DISABLE KEYS */;
INSERT INTO `referentielle` VALUES (100,'CLIENT',NULL,NULL,'1','Naly','','','','',NULL,'2023-04-06',6),(101,'CLIENT',NULL,NULL,'2','Bureau','','','','',NULL,'2023-04-07',6),(102,'CLIENT',NULL,NULL,'3','Hoby','','','','',NULL,'2023-04-07',6),(107,'PROFIL',NULL,NULL,'ADMIN','Admin','','','','',NULL,'2022-10-11',1),(108,'PROFIL',NULL,NULL,'SAISIE','Saisie','','','','',NULL,'2022-10-11',1),(109,'CLIENT',NULL,NULL,'4','FELANA','','','','',NULL,'2023-04-07',6),(112,'CATEGORIE',NULL,NULL,'HUILE','Huile','','','','',1,'2024-01-03',1),(113,'CATEGORIE',NULL,NULL,'VINAIGRE','Vinaigre','','','','',1,'2024-01-03',1),(119,'CATEGORIE',NULL,NULL,'LAIT','Produits laitiers','','','','',1,'2024-01-03',1),(121,'CATEGORIE',NULL,NULL,'ALIMENTINF','Aliment infantile','','','','',1,'2024-01-03',1),(122,'CATEGORIE',NULL,NULL,'BOISSON','Boisson','','','','',1,'2024-01-03',1),(123,'CATEGORIE',NULL,NULL,'EAUMINERAL','Eau min&eacute;rale','','','','',1,'2024-01-03',1),(124,'CATEGORIE',NULL,NULL,'PATISSERIE','Patisserie','','','','',1,'2024-01-03',1),(125,'CATEGORIE',NULL,NULL,'EPICESETCO','Epices et condiments','','','','',1,'2024-01-03',1),(126,'CATEGORIE',NULL,NULL,'PRDLOCAUX','Produits locaux','','','','',1,'2024-01-03',1),(127,'CATEGORIE',NULL,NULL,'CAFECACAO','Caf&eacute;, cacao et choco','','','','',1,'2024-01-03',1),(128,'CATEGORIE',NULL,NULL,'PATESNOU','P&acirc;tes et nouilles','','','','',1,'2024-01-03',1),(129,'CATEGORIE',NULL,NULL,'BISCUITSBO','Biscuits et bonbons','','','','',1,'2024-01-03',1),(130,'CATEGORIE',NULL,NULL,'SNACKS','Snacks','','','','',1,'2024-01-03',1),(131,'CATEGORIE',NULL,NULL,'AUTPRODALI','Autres produits alimentaires','','','','',1,'2024-01-03',1),(132,'CATEGORIE',NULL,NULL,'COUCHELING','Couches et lingettes','','','','',1,'2024-01-03',1),(133,'CATEGORIE',NULL,NULL,'PRDHYGIEN','Produits d&#039;hygi&egrave;ne','','','','',1,'2024-01-03',1),(134,'CATEGORIE',NULL,NULL,'SAVONDETER','Savon et d&eacute;tergent','','','','',1,'2024-01-03',1),(135,'CATEGORIE',NULL,NULL,'FOURNSCOBU','Fournitures scolaires et de bureau','','','','',1,'2024-01-03',1),(136,'CATEGORIE',NULL,NULL,'AUTRES','Autres articles','','','','',1,'2024-01-03',1),(137,'PROFIL',NULL,NULL,'CAISSE','Caisse','','','','',NULL,'2023-03-20',1),(141,'MODE',NULL,NULL,'CHQ','Ch&egrave;que','','','','',NULL,'2023-05-10',6),(142,'MODE',NULL,NULL,'ESP','Esp&egrave;ces','','','','',NULL,'2023-05-10',6),(143,'MODE',NULL,NULL,'MVOLA','MVola','','','','',NULL,'2023-05-10',6),(144,'FOURNISSEUR',NULL,NULL,'1','Autre','','','','',NULL,'2023-04-01',1),(145,'FOURNISSEUR',NULL,NULL,'2','Socobis','0330030030','','','',NULL,'2023-04-01',1),(146,'FOURNISSEUR',NULL,NULL,'3','SOCOLAIT','','','','',NULL,'2023-04-13',6),(147,'CLIENT',NULL,NULL,'5','Tatamo','','','','',NULL,'2023-04-07',6),(148,'CLIENT',NULL,NULL,'6','Narindra','','','','',NULL,'2023-04-07',6),(149,'CLIENT',NULL,NULL,'7','Mi','','','','',NULL,'2023-04-07',6),(150,'CLIENT',NULL,NULL,'8','Liva','','','','',NULL,'2023-04-07',6),(151,'CLIENT',NULL,NULL,'9','Boda','','','','',NULL,'2023-04-07',6),(152,'CLIENT',NULL,NULL,'10','Mme Lalao','','','','',NULL,'2023-04-07',6),(153,'CLIENT',NULL,NULL,'11','Toky','','','','',NULL,'2023-04-07',6),(154,'CLIENT',NULL,NULL,'12','Fiderana','','','','',NULL,'2023-04-07',6),(155,'CLIENT',NULL,NULL,'13','Fabrice','','','','',NULL,'2023-04-07',6),(156,'CLIENT',NULL,NULL,'14','Boda','','','','',NULL,'2023-04-07',6),(157,'CLIENT',NULL,NULL,'15','Mme Manitra','','','','',NULL,'2023-04-07',6),(158,'CLIENT',NULL,NULL,'16','Mme Anich&agrave;','','','','',NULL,'2023-04-07',6),(159,'FOURNISSEUR',NULL,NULL,'4','Miangola','','','','',NULL,'2023-04-08',6),(160,'FOURNISSEUR',NULL,NULL,'5','Bureau','','','','',NULL,'2023-04-08',6),(161,'FOURNISSEUR',NULL,NULL,'6','Tiko','','','','',NULL,'2023-04-08',6),(162,'FOURNISSEUR',NULL,NULL,'7','Tranombarotra DYLAN','','','','',NULL,'2023-05-05',6),(163,'FOURNISSEUR',NULL,NULL,'8','FIOTAZANTSOA','','','','',NULL,'2023-05-08',6),(164,'FOURNISSEUR',NULL,NULL,'9','STAR','','','','',NULL,'2023-04-08',6),(165,'CLIENT',NULL,NULL,'17','Anicha','','','','',NULL,'2023-04-08',6),(166,'CLIENT',NULL,NULL,'18','Mme Vanessa','','','','',NULL,'2023-04-11',6),(167,'CLIENT',NULL,NULL,'19','Danica','','','','',NULL,'2023-04-11',6),(168,'CLIENT',NULL,NULL,'20','Mme Hanitra','','','','',NULL,'2023-04-12',6),(169,'FOURNISSEUR',NULL,NULL,'10','yoplait','','','','',NULL,'2023-04-12',6),(170,'FOURNISSEUR',NULL,NULL,'11','Santatra','','','','',NULL,'2023-04-12',6),(171,'FOURNISSEUR',NULL,NULL,'12','cookies','','','','',NULL,'2023-04-12',6),(172,'FOURNISSEUR',NULL,NULL,'13','Maminiaina','','','','',NULL,'2023-04-12',6),(173,'FOURNISSEUR',NULL,NULL,'14','PHOENIX','','','','',NULL,'2023-04-13',6),(174,'FOURNISSEUR',NULL,NULL,'15','BABY MARKET','','','','',NULL,'2023-04-13',6),(175,'FOURNISSEUR',NULL,NULL,'16','JADIDA K&sup2;','','','','',NULL,'2023-04-13',6),(176,'FOURNISSEUR',NULL,NULL,'17','TANA TRADE','','','','',NULL,'2023-04-13',6),(177,'FOURNISSEUR',NULL,NULL,'18','MIAM','','','','',NULL,'2023-04-14',6),(178,'FOURNISSEUR',NULL,NULL,'19','JB','','','','',NULL,'2023-04-14',6),(179,'FOURNISSEUR',NULL,NULL,'20','BONGOU','','','','',NULL,'2023-04-14',6),(180,'FOURNISSEUR',NULL,NULL,'21','Sofia','','','','',NULL,'2023-04-14',6),(181,'FOURNISSEUR',NULL,NULL,'22','M&amp;G STATIONERY','','','','',NULL,'2023-04-14',6),(182,'FOURNISSEUR',NULL,NULL,'23','SOMAPRO','','','','',NULL,'2023-04-14',6),(183,'CLIENT',NULL,NULL,'21','Fitahiana','','','','',NULL,'2023-04-15',6),(184,'CLIENT',NULL,NULL,'22','Dada','','','','',NULL,'2023-04-15',6),(185,'CLIENT',NULL,NULL,'23','Divers','','','','',NULL,'2023-04-15',6),(186,'CLIENT',NULL,NULL,'24','Mme Seheno (Maman&#039;i Adriana)','','','','',NULL,'2023-05-13',6),(187,'CLIENT',NULL,NULL,'25','R&eacute;gularisation','','','','',NULL,'2023-04-15',6),(188,'CLIENT',NULL,NULL,'26','Mme Vololona','','','','',NULL,'2023-04-17',6),(189,'FOURNISSEUR',NULL,NULL,'24','R&eacute;gularisation','','','','',NULL,'2023-04-17',6),(190,'FOURNISSEUR',NULL,NULL,'25','Tr AMPASIKA','','','','',NULL,'2023-04-17',6),(191,'FOURNISSEUR',NULL,NULL,'26','MANGABE','','','','',NULL,'2023-04-17',6),(192,'CLIENT',NULL,NULL,'27','Mme Nan&agrave;','','','','',NULL,'2023-04-17',6),(193,'FOURNISSEUR',NULL,NULL,'27','OASIS SHOP','','','','',NULL,'2023-04-17',6),(194,'FOURNISSEUR',NULL,NULL,'28','shopli','','','','',NULL,'2023-04-17',6),(195,'CLIENT',NULL,NULL,'28','P&eacute;rim&eacute;s','','','','',NULL,'2023-04-17',6),(196,'FOURNISSEUR',NULL,NULL,'29','DRINKS','','','','',NULL,'2023-04-18',6),(197,'FOURNISSEUR',NULL,NULL,'30','SALONE','','','','',NULL,'2023-04-18',6),(198,'CLIENT',NULL,NULL,'29','Escapade','','','','',NULL,'2023-07-07',6),(199,'CLIENT',NULL,NULL,'30','Danic&agrave;','','','','',NULL,'2023-04-19',6),(200,'CLIENT',NULL,NULL,'31','Peta','','','','',NULL,'2023-04-19',6),(201,'FOURNISSEUR',NULL,NULL,'31','ECONO MARKET','','','','',NULL,'2023-04-19',6),(202,'FOURNISSEUR',NULL,NULL,'32','Mme Domoina','','','','',NULL,'2023-04-19',6),(203,'FOURNISSEUR',NULL,NULL,'33','Tr ALEXANDRA','','','','',NULL,'2023-04-20',6),(204,'CLIENT',NULL,NULL,'32','Daddy','','','','',NULL,'2023-04-21',6),(205,'CLIENT',NULL,NULL,'33','Mme Santatra','','','','',NULL,'2023-04-21',6),(206,'FOURNISSEUR',NULL,NULL,'34','NEW VISION DISTRIBUTION SARLU','','','','',NULL,'2023-04-24',6),(207,'FOURNISSEUR',NULL,NULL,'35','Fromage FI','','','','',NULL,'2023-04-25',6),(208,'FOURNISSEUR',NULL,NULL,'36','NUTRIZAZA','','','','',NULL,'2023-04-25',6),(209,'FOURNISSEUR',NULL,NULL,'37','EXIMCO','','','','',NULL,'2023-04-26',6),(210,'CLIENT',NULL,NULL,'34','M Nantenaina','','','','',NULL,'2023-04-26',6),(211,'FOURNISSEUR',NULL,NULL,'38','Chocolaterie ROBERT','','','','',NULL,'2023-04-27',6),(212,'FOURNISSEUR',NULL,NULL,'39','AKERA','','','','',NULL,'2023-05-02',6),(213,'FOURNISSEUR',NULL,NULL,'40','Nivo','','','','',NULL,'2023-05-03',6),(214,'FOURNISSEUR',NULL,NULL,'41','LANDRYS SARLU','','','','',NULL,'2023-05-05',6),(215,'CLIENT',NULL,NULL,'35','Eliane','','','','',NULL,'2023-05-05',6),(216,'FOURNISSEUR',NULL,NULL,'42','SANI+','','','','',NULL,'2023-05-09',6),(217,'FOURNISSEUR',NULL,NULL,'43','Top Cyber','','','','',NULL,'2023-05-09',6),(218,'CLIENT',NULL,NULL,'36','Niry','','','','',NULL,'2023-05-10',6),(219,'CLIENT',NULL,NULL,'37','Mme Aingo','','','','',NULL,'2023-05-11',6),(220,'CLIENT',NULL,NULL,'38','Nantenaina (tsena m/sina)','','','','',NULL,'2023-05-11',6),(221,'CLIENT',NULL,NULL,'39','Dr Tiana','','','','',NULL,'2023-05-11',1),(222,'CLIENT',NULL,NULL,'40','Masera','','','','',NULL,'2023-05-12',7),(223,'CLIENT',NULL,NULL,'41','2&egrave; &eacute;tage','','','','',NULL,'2023-05-12',7),(224,'FOURNISSEUR',NULL,NULL,'44','Elys&eacute;e (Tal)','','','','',NULL,'2023-05-12',7),(225,'CLIENT',NULL,NULL,'42','Mme Hary','','','','',NULL,'2023-05-12',7),(226,'CLIENT',NULL,NULL,'43','Mme Tsiry','','','','',NULL,'2023-05-12',7),(227,'CLIENT',NULL,NULL,'44','Rabebe (Tsila)','','','','',NULL,'2023-05-12',7),(228,'CLIENT',NULL,NULL,'45','Mme Vololona','','','','',NULL,'2023-05-12',7),(229,'CLIENT',NULL,NULL,'46','Mme Tiana','','','','',NULL,'2023-05-12',7),(230,'CLIENT',NULL,NULL,'47','Iraka','','','','',NULL,'2023-05-12',7),(231,'CLIENT',NULL,NULL,'48','Allegra','','','','',NULL,'2023-05-12',7),(232,'CLIENT',NULL,NULL,'49','Hanta','','','','',NULL,'2023-05-12',7),(233,'CLIENT',NULL,NULL,'50','Mme Vanilla','','','','',NULL,'2023-05-12',7),(234,'CLIENT',NULL,NULL,'51','Mamih','','','','',NULL,'2023-05-12',7),(235,'CLIENT',NULL,NULL,'52','Mme Arlette','','','','',NULL,'2023-05-12',7),(236,'CLIENT',NULL,NULL,'52','Mme Arlette','','','','',NULL,'2023-05-12',7),(237,'CLIENT',NULL,NULL,'54','Dadabe an&#039;i Mikalo','','','','',NULL,'2023-05-12',7),(238,'CLIENT',NULL,NULL,'55','Mme Haingo (couche)','','','','',NULL,'2023-06-17',6),(239,'CLIENT',NULL,NULL,'56','Dadan&#039;ny 2&egrave; &eacute;tage','','','','',NULL,'2023-05-12',7),(240,'CLIENT',NULL,NULL,'57','Mme Clara','','','','',NULL,'2023-05-12',7),(241,'CLIENT',NULL,NULL,'58','Mme Francine','','','','',NULL,'2023-05-12',7),(242,'CLIENT',NULL,NULL,'59','Mlle Ando','','','','',NULL,'2023-05-12',7),(243,'CLIENT',NULL,NULL,'60','Zoary','','','','',NULL,'2023-05-12',7),(244,'CLIENT',NULL,NULL,'61','M.Hermann','','','','',NULL,'2023-05-12',7),(245,'CLIENT',NULL,NULL,'62','Mme Domoina','','','','',NULL,'2023-05-12',7),(246,'CLIENT',NULL,NULL,'63','1er &eacute;tage Mme Nirina','','','','',NULL,'2023-05-13',6),(247,'CLIENT',NULL,NULL,'63','1er &eacute;tage','','','','',NULL,'2023-05-12',7),(248,'CLIENT',NULL,NULL,'65','Fitahiana','','','','',NULL,'2023-05-12',7),(249,'CLIENT',NULL,NULL,'66','Mme Mariette','','','','',NULL,'2023-05-12',7),(250,'CLIENT',NULL,NULL,'67','Avotra','','','','',NULL,'2023-05-12',7),(251,'CLIENT',NULL,NULL,'68','Mme Vanessa','','','','',NULL,'2023-05-12',7),(252,'CLIENT',NULL,NULL,'69','Vanessa','','','','',NULL,'2023-05-12',7),(253,'CLIENT',NULL,NULL,'70','Mamie','','','','',NULL,'2023-05-12',7),(254,'CLIENT',NULL,NULL,'71','Mme S&eacute;raphine','','','','',NULL,'2023-05-12',7),(255,'CLIENT',NULL,NULL,'72','M. Talance','','','','',NULL,'2023-05-12',7),(256,'CLIENT',NULL,NULL,'73','M.Benja','','','','',NULL,'2023-05-12',7),(257,'CLIENT',NULL,NULL,'74','M.Freddy','','','','',NULL,'2023-05-12',7),(258,'CLIENT',NULL,NULL,'75','Mme Tiana','','','','',NULL,'2023-05-12',7),(259,'CLIENT',NULL,NULL,'76','Mme Holy','','','','',NULL,'2023-05-12',7),(260,'CLIENT',NULL,NULL,'77','Mme Clara','','','','',NULL,'2023-05-12',7),(261,'CLIENT',NULL,NULL,'78','Avotra','','','','',NULL,'2023-05-12',7),(262,'CLIENT',NULL,NULL,'79','Flora','','','','',NULL,'2023-05-12',7),(263,'CLIENT',NULL,NULL,'80','Fenosoa','','','','',NULL,'2023-05-12',7),(264,'CLIENT',NULL,NULL,'81','M.Miranto','','','','',NULL,'2023-05-12',7),(265,'CLIENT',NULL,NULL,'82','Daniel','','','','',NULL,'2023-05-12',7),(266,'CLIENT',NULL,NULL,'83','Mme Rojo','','','','',NULL,'2023-05-12',7),(267,'CLIENT',NULL,NULL,'84','Mme Tinah','','','','',NULL,'2023-05-12',7),(268,'CLIENT',NULL,NULL,'85','Mme Vola (Bota)','','','','',NULL,'2023-05-15',6),(269,'CLIENT',NULL,NULL,'86','Mme Narindra','','','','',NULL,'2023-05-12',7),(270,'CLIENT',NULL,NULL,'87','Mme Vola 2','','','','',NULL,'2023-05-12',7),(271,'CLIENT',NULL,NULL,'88','M.Nantenaina 2','','','','',NULL,'2023-05-12',7),(272,'CLIENT',NULL,NULL,'89','Mme Miora','','','','',NULL,'2023-05-12',7),(273,'CLIENT',NULL,NULL,'90','Mme Eva','','','','',NULL,'2023-05-12',7),(274,'CLIENT',NULL,NULL,'91','Mme Vololona 2','','','','',NULL,'2023-05-12',7),(275,'CLIENT',NULL,NULL,'92','Mme Bao','','','','',NULL,'2023-05-13',6),(276,'CLIENT',NULL,NULL,'93','Mme Zoary','','','','',NULL,'2023-05-13',6),(277,'CLIENT',NULL,NULL,'94','Mme Sarah','','','','',NULL,'2023-05-13',6),(278,'CLIENT',NULL,NULL,'95','Toto Jeanne','','','','',NULL,'2023-05-13',6),(279,'CLIENT',NULL,NULL,'96','Mme Nantsoina','','','','',NULL,'2023-05-13',6),(280,'CLIENT',NULL,NULL,'97','Mme Nina','','','','',NULL,'2023-05-13',6),(281,'CLIENT',NULL,NULL,'98','Haritiana','','','','',NULL,'2023-05-22',6),(282,'CLIENT',NULL,NULL,'99','M Tanjona','','','','',NULL,'2023-05-13',6),(283,'CLIENT',NULL,NULL,'100','M Thierry','','','','',NULL,'2023-05-17',6),(284,'CLIENT',NULL,NULL,'101','M Emile','','','','',NULL,'2023-05-13',6),(285,'CLIENT',NULL,NULL,'102','Maman&#039;i Fiderana','','','','',NULL,'2023-05-13',6),(286,'CLIENT',NULL,NULL,'103','Mme Nirina','','','','',NULL,'2023-05-13',6),(287,'CLIENT',NULL,NULL,'104','Mme A&iuml;cha','','','','',NULL,'2023-05-13',6),(288,'CLIENT',NULL,NULL,'105','M T&ocirc;','','','','',NULL,'2023-05-13',6),(289,'CLIENT',NULL,NULL,'105','M T&ocirc;','','','','',NULL,'2023-05-13',6),(290,'CLIENT',NULL,NULL,'107','Mme Prisca','','','','',NULL,'2023-05-13',6),(291,'CLIENT',NULL,NULL,'108','Mme Prisca (yama)','','','','',NULL,'2023-05-13',6),(292,'CLIENT',NULL,NULL,'109','Mme Justine','','','','',NULL,'2023-05-13',6),(293,'CLIENT',NULL,NULL,'110','Mme Vololona (Bory volo)','','','','',NULL,'2023-05-13',6),(294,'CLIENT',NULL,NULL,'111','M Fanilo','','','','',NULL,'2023-05-13',6),(295,'CLIENT',NULL,NULL,'112','M Paul','','','','',NULL,'2023-05-13',6),(296,'CLIENT',NULL,NULL,'113','Bebe Bakoly','','','','',NULL,'2023-05-15',6),(297,'CLIENT',NULL,NULL,'114','Mme Andr&eacute;a','','','','',NULL,'2023-05-13',6),(298,'CLIENT',NULL,NULL,'115','Mme Bako','','','','',NULL,'2023-05-13',6),(299,'CLIENT',NULL,NULL,'116','Bebe','','','','',NULL,'2023-05-13',6),(300,'CLIENT',NULL,NULL,'117','Mme Seheno 2','','','','',NULL,'2023-05-13',6),(301,'CLIENT',NULL,NULL,'118','Garry','','','','',NULL,'2023-05-13',6),(302,'CLIENT',NULL,NULL,'119','Maman&#039;i Mathias','','','','',NULL,'2023-05-13',6),(303,'CLIENT',NULL,NULL,'120','Mme Miray','','','','',NULL,'2023-05-13',6),(304,'CLIENT',NULL,NULL,'121','Melle Mamy','','','','',NULL,'2023-05-13',6),(305,'CLIENT',NULL,NULL,'121','Melle Mamy','','','','',NULL,'2023-05-13',6),(306,'CLIENT',NULL,NULL,'121','Melle Mamy','','','','',NULL,'2023-05-13',6),(307,'CLIENT',NULL,NULL,'124','Mme Monique','','','','',NULL,'2023-05-13',6),(308,'CLIENT',NULL,NULL,'125','M Raoelison','','','','',NULL,'2023-05-13',6),(309,'CLIENT',NULL,NULL,'126','Bebe Liza','','','','',NULL,'2023-05-13',6),(310,'CLIENT',NULL,NULL,'127','Mme Hasina','','','','',NULL,'2023-05-13',6),(311,'CLIENT',NULL,NULL,'128','Tsila','','','','',NULL,'2023-05-13',6),(312,'CLIENT',NULL,NULL,'129','Mme Lova','','','','',NULL,'2023-05-13',6),(313,'CLIENT',NULL,NULL,'130','M Yvon','','','','',NULL,'2023-05-13',6),(314,'CLIENT',NULL,NULL,'131','Mme Sarindra','','','','',NULL,'2023-05-13',6),(315,'CLIENT',NULL,NULL,'131','Mme Sarindra','','','','',NULL,'2023-05-13',6),(316,'CLIENT',NULL,NULL,'133','Mme Bastina','','','','',NULL,'2023-05-13',6),(317,'CLIENT',NULL,NULL,'134','Mme Clarisse','','','','',NULL,'2023-05-13',6),(318,'CLIENT',NULL,NULL,'135','Mme Fanja','','','','',NULL,'2023-05-13',6),(319,'CLIENT',NULL,NULL,'136','Mme Fara','','','','',NULL,'2023-05-13',6),(320,'CLIENT',NULL,NULL,'136','Mme Fara','','','','',NULL,'2023-05-13',6),(321,'CLIENT',NULL,NULL,'138','M Benja','','','','',NULL,'2023-05-13',6),(322,'CLIENT',NULL,NULL,'139','Mme Vero','','','','',NULL,'2023-05-13',6),(323,'CLIENT',NULL,NULL,'140','Mme Aim&eacute;e','','','','',NULL,'2023-05-13',6),(324,'CLIENT',NULL,NULL,'141','Bebe Kala','','','','',NULL,'2023-05-13',6),(325,'CLIENT',NULL,NULL,'141','Bebe Kala','','','','',NULL,'2023-05-13',6),(326,'CLIENT',NULL,NULL,'143','Mme Zo','','','','',NULL,'2023-05-13',6),(327,'CLIENT',NULL,NULL,'144','Mme Pierette','','','','',NULL,'2023-05-15',6),(328,'CLIENT',NULL,NULL,'145','M Fidy','','','','',NULL,'2023-05-15',6),(329,'CLIENT',NULL,NULL,'146','M Tsiva','','','','',NULL,'2023-05-15',6),(330,'CLIENT',NULL,NULL,'147','Mme Faniry','','','','',NULL,'2023-05-15',6),(331,'CLIENT',NULL,NULL,'148','M Tiavina','','','','',NULL,'2023-05-15',6),(332,'CLIENT',NULL,NULL,'149','Mme Noro','','','','',NULL,'2023-05-15',6),(333,'CLIENT',NULL,NULL,'150','Mme Finaritra','','','','',NULL,'2023-05-22',6),(334,'CLIENT',NULL,NULL,'151','Mme Eliane','','','','',NULL,'2023-05-15',6),(335,'CLIENT',NULL,NULL,'152','Mme Holy (mme Mialy)','','','','',NULL,'2023-05-15',6),(336,'CLIENT',NULL,NULL,'153','Mme Vola Amparibe','','','','',NULL,'2023-05-15',6),(337,'CLIENT',NULL,NULL,'154','M Tojo','','','','',NULL,'2023-05-15',6),(338,'CLIENT',NULL,NULL,'155','Mme Onja','','','','',NULL,'2023-05-15',6),(339,'CLIENT',NULL,NULL,'156','M Fafah','','','','',NULL,'2023-05-15',6),(340,'CLIENT',NULL,NULL,'157','Mme Voahangy','','','','',NULL,'2023-05-15',6),(341,'CLIENT',NULL,NULL,'158','Melle Domoina','','','','',NULL,'2023-05-15',6),(342,'CLIENT',NULL,NULL,'159','Melle Retsy','','','','',NULL,'2023-05-15',6),(343,'CLIENT',NULL,NULL,'160','Mme Fanja (Zoto)','','','','',NULL,'2023-05-16',6),(344,'CLIENT',NULL,NULL,'161','Mme Maeva','','','','',NULL,'2023-05-15',6),(345,'CLIENT',NULL,NULL,'162','Faniry','','','','',NULL,'2023-05-15',6),(346,'CLIENT',NULL,NULL,'163','Mme Mireille (avocate)','','','','',NULL,'2023-05-15',6),(347,'CLIENT',NULL,NULL,'164','Sephora','','','','',NULL,'2023-05-15',6),(348,'CLIENT',NULL,NULL,'165','Mme Holy 1','','','','',NULL,'2023-05-15',6),(349,'CLIENT',NULL,NULL,'166','Mme Valencia','','','','',NULL,'2023-05-15',6),(350,'CLIENT',NULL,NULL,'167','M Lalaina','','','','',NULL,'2023-05-15',6),(351,'CLIENT',NULL,NULL,'168','Lisy','','','','',NULL,'2023-05-16',6),(352,'CLIENT',NULL,NULL,'169','Toto','','','','',NULL,'2023-05-16',6),(353,'CLIENT',NULL,NULL,'170','Jos&eacute;phine','','','','',NULL,'2023-05-16',6),(354,'CLIENT',NULL,NULL,'171','Mme Nivo','','','','',NULL,'2023-05-16',6),(355,'CLIENT',NULL,NULL,'172','Franchine','','','','',NULL,'2023-05-16',6),(356,'CLIENT',NULL,NULL,'173','Mme Niry','','','','',NULL,'2023-05-16',6),(357,'CLIENT',NULL,NULL,'174','Mme Louisa','','','','',NULL,'2023-05-16',6),(358,'CLIENT',NULL,NULL,'175','M Ndriana','','','','',NULL,'2023-05-16',6),(359,'CLIENT',NULL,NULL,'176','Prisca','','','','',NULL,'2023-05-16',6),(360,'CLIENT',NULL,NULL,'177','Mme Mbola','','','','',NULL,'2023-05-16',6),(361,'CLIENT',NULL,NULL,'178','Mme Harilova','','','','',NULL,'2023-05-16',6),(362,'CLIENT',NULL,NULL,'179','Mme Hanitra 1','','','','',NULL,'2023-05-16',6),(363,'CLIENT',NULL,NULL,'180','Mme Emma','','','','',NULL,'2023-05-16',6),(364,'CLIENT',NULL,NULL,'181','Mme Ranja','','','','',NULL,'2023-05-16',6),(365,'CLIENT',NULL,NULL,'182','Manitra','','','','',NULL,'2023-05-16',6),(366,'CLIENT',NULL,NULL,'183','Miora (lava volo)','','','','',NULL,'2023-05-16',6),(367,'FOURNISSEUR',NULL,NULL,'45','Melle Domoina','0342690470','','','',NULL,'2023-05-16',6),(368,'CLIENT',NULL,NULL,'184','Mme El&eacute;onore','','','','',NULL,'2023-05-16',6),(369,'CLIENT',NULL,NULL,'185','Mme Ony','','','','',NULL,'2023-05-16',6),(370,'CLIENT',NULL,NULL,'186','Heritiana','','','','',NULL,'2023-05-16',6),(371,'CLIENT',NULL,NULL,'187','Mme Domoina(cookies)','','','','',NULL,'2023-05-16',6),(372,'CLIENT',NULL,NULL,'188','Mme Emma 1','','','','',NULL,'2023-05-16',6),(373,'CLIENT',NULL,NULL,'189','Mme Nomena','','','','',NULL,'2023-05-16',6),(374,'CLIENT',NULL,NULL,'190','Dadan&#039;i Kambana','','','','',NULL,'2023-05-16',6),(375,'CLIENT',NULL,NULL,'191','Mr Mathieu','','','','',NULL,'2023-05-17',6),(376,'CLIENT',NULL,NULL,'192','M.Fafah','','','','',NULL,'2023-05-17',6),(377,'CLIENT',NULL,NULL,'193','Mme Nosy','','','','',NULL,'2023-05-17',6),(378,'CLIENT',NULL,NULL,'194','Mlle Sitraka','','','','',NULL,'2023-05-17',6),(379,'CLIENT',NULL,NULL,'195','M.Rija','','','','',NULL,'2023-05-17',6),(380,'CLIENT',NULL,NULL,'196','M.Hery','','','','',NULL,'2023-05-17',6),(381,'CLIENT',NULL,NULL,'197','Major','','','','',NULL,'2023-05-17',6),(382,'CLIENT',NULL,NULL,'198','M..Rolland','','','','',NULL,'2023-05-17',6),(383,'CLIENT',NULL,NULL,'199','Mme Sylvia','','','','',NULL,'2023-05-17',6),(384,'CLIENT',NULL,NULL,'200','Mr Jeremia','','','','',NULL,'2023-05-17',6),(385,'CLIENT',NULL,NULL,'201','Mme Ony coupe carr&eacute;','','','','',NULL,'2023-05-17',6),(386,'CLIENT',NULL,NULL,'202','Mr Mahandry','','','','',NULL,'2023-05-17',6),(387,'CLIENT',NULL,NULL,'203','vero','','','','',NULL,'2023-05-17',6),(388,'CLIENT',NULL,NULL,'204','Mlle Nosy','','','','',NULL,'2023-05-17',6),(389,'CLIENT',NULL,NULL,'205','Mme Zara','','','','',NULL,'2023-05-17',6),(390,'CLIENT',NULL,NULL,'206','Mr Emile','','','','',NULL,'2023-05-17',6),(391,'FOURNISSEUR',NULL,NULL,'46','Savonnerie Tropicale','','','','',NULL,'2023-05-17',6),(392,'CLIENT',NULL,NULL,'207','Mme Ainasoa','','','','',NULL,'2023-05-17',6),(393,'CLIENT',NULL,NULL,'208','Mme Domoina kely','','','','',NULL,'2023-05-17',6),(394,'CLIENT',NULL,NULL,'209','Mme naly','','','','',NULL,'2023-05-17',6),(395,'CLIENT',NULL,NULL,'210','Mathieu&amp;Roger','','','','',NULL,'2023-05-19',6),(396,'CLIENT',NULL,NULL,'211','M Tsila','','','','',NULL,'2023-05-19',6),(397,'CLIENT',NULL,NULL,'212','Gladys','','','','',NULL,'2023-05-19',6),(398,'CLIENT',NULL,NULL,'213','Mme Fortuna','','','','',NULL,'2023-05-19',6),(399,'CLIENT',NULL,NULL,'214','Mme Sana','','','','',NULL,'2023-05-19',6),(400,'FOURNISSEUR',NULL,NULL,'47','TAF','','','','',NULL,'2023-05-19',6),(401,'CLIENT',NULL,NULL,'215','M Gaby','','','','',NULL,'2023-05-19',6),(402,'CLIENT',NULL,NULL,'216','Mme Linda','','','','',NULL,'2023-05-19',6),(403,'CLIENT',NULL,NULL,'217','Navalona','','','','',NULL,'2023-05-19',6),(404,'CLIENT',NULL,NULL,'218','Mme Sombiniaina','','','','',NULL,'2023-07-05',6),(405,'CLIENT',NULL,NULL,'219','Tahiana','','','','',NULL,'2023-05-20',6),(406,'CLIENT',NULL,NULL,'220','Maman&#039;i Sarobidy','','','','',NULL,'2023-05-20',6),(407,'CLIENT',NULL,NULL,'221','Mme Liantsoa','','','','',NULL,'2023-05-20',6),(408,'CLIENT',NULL,NULL,'222','Mme Mihaja','','','','',NULL,'2023-05-20',6),(409,'CLIENT',NULL,NULL,'223','Inspecteur d&#039;Etat','','','','',NULL,'2023-05-20',6),(410,'CLIENT',NULL,NULL,'224','Eric caf&eacute;','','','','',NULL,'2023-05-20',6),(411,'FOURNISSEUR',NULL,NULL,'48','HOMEOPHARMA','','','','',NULL,'2023-05-20',6),(412,'CLIENT',NULL,NULL,'225','M Ramarolahy','','','','',NULL,'2023-05-20',6),(413,'CLIENT',NULL,NULL,'226','Dr Holy','','','','',NULL,'2023-05-22',6),(414,'CLIENT',NULL,NULL,'227','Mme Saholy','','','','',NULL,'2023-05-22',6),(415,'CLIENT',NULL,NULL,'228','Mme Lala','','','','',NULL,'2023-05-22',6),(416,'CLIENT',NULL,NULL,'229','Mme Hoby','','','','',NULL,'2023-05-22',6),(417,'CLIENT',NULL,NULL,'230','SVR','','','','',NULL,'2023-05-22',6),(418,'CLIENT',NULL,NULL,'231','Mme Henintsoa','','','','',NULL,'2023-05-22',6),(419,'CLIENT',NULL,NULL,'232','Mme Colette','','','','',NULL,'2023-05-23',6),(420,'CLIENT',NULL,NULL,'233','Mme Diamondra','','','','',NULL,'2023-05-23',6),(421,'CLIENT',NULL,NULL,'233','Mme Diamondra','','','','',NULL,'2023-05-23',6),(422,'CLIENT',NULL,NULL,'235','Martine','','','','',NULL,'2023-05-23',6),(423,'CLIENT',NULL,NULL,'236','Mme Lily','','','','',NULL,'2023-05-24',6),(424,'CLIENT',NULL,NULL,'236','Mme Lily','','','','',NULL,'2023-05-24',6),(425,'CLIENT',NULL,NULL,'238','Mme Rinah','','','','',NULL,'2023-05-24',6),(426,'FOURNISSEUR',NULL,NULL,'49','SODISCO','','','','',NULL,'2023-05-24',6),(427,'CLIENT',NULL,NULL,'239','Mamie 2','','','','',NULL,'2023-05-24',6),(428,'CLIENT',NULL,NULL,'239','Mamie 2','','','','',NULL,'2023-05-24',6),(429,'FOURNISSEUR',NULL,NULL,'50','UNIFOODS','','','','',1,'2023-05-24',6),(430,'FOURNISSEUR',NULL,NULL,'50','UNIFOODS','','','','',1,'2023-05-24',6),(431,'FOURNISSEUR',NULL,NULL,'52','UNIFOODS','','','','',NULL,'2023-05-24',6),(432,'CLIENT',NULL,NULL,'241','Mme Fara (lunettes)','','','','',NULL,'2023-05-24',6),(433,'CLIENT',NULL,NULL,'242','Mme Ony (solomaso)','','','','',NULL,'2023-05-24',6),(434,'CLIENT',NULL,NULL,'243','Mme Claudia','','','','',NULL,'2023-05-25',6),(435,'CLIENT',NULL,NULL,'243','Mme Claudia','','','','',NULL,'2023-05-25',6),(436,'CLIENT',NULL,NULL,'245','Mme Vololona (solomaso,lava volo)','','','','',NULL,'2023-05-25',6),(437,'CLIENT',NULL,NULL,'245','Mme Vololona (solomaso,lava volo)','','','','',NULL,'2023-05-25',6),(438,'CLIENT',NULL,NULL,'247','Mme Tsivery','','','','',NULL,'2023-05-25',6),(439,'CLIENT',NULL,NULL,'247','Mme Tsivery','','','','',NULL,'2023-05-25',6),(440,'CLIENT',NULL,NULL,'249','MADIS','','','','',NULL,'2023-05-25',6),(441,'CLIENT',NULL,NULL,'249','MADIS','','','','',NULL,'2023-05-25',6),(442,'FOURNISSEUR',NULL,NULL,'53','MADIS','','','','',NULL,'2023-05-25',6),(443,'FOURNISSEUR',NULL,NULL,'53','MADIS','','','','',NULL,'2023-05-25',6),(444,'CLIENT',NULL,NULL,'251','Maman&#039;i Tsiky (Mme Holy)','','','','',NULL,'2023-06-03',6),(445,'CLIENT',NULL,NULL,'252','Mme Patricia','','','','',NULL,'2023-05-26',6),(446,'CLIENT',NULL,NULL,'253','Mme Ravaka','','','','',NULL,'2023-05-26',6),(447,'CLIENT',NULL,NULL,'253','Mme Ravaka','','','','',NULL,'2023-05-26',6),(448,'CLIENT',NULL,NULL,'255','Christin&agrave;','','','','',NULL,'2023-05-26',6),(449,'CLIENT',NULL,NULL,'256','Jaba','','','','',NULL,'2023-05-26',6),(450,'CLIENT',NULL,NULL,'257','Mika','','','','',NULL,'2023-05-26',6),(451,'CLIENT',NULL,NULL,'258','Mika','','','','',NULL,'2023-05-26',6),(452,'CLIENT',NULL,NULL,'259','Mme Mihary','','','','',NULL,'2023-05-26',6),(453,'CLIENT',NULL,NULL,'260','M Abel','','','','',NULL,'2023-05-26',6),(454,'CLIENT',NULL,NULL,'261','Maman&#039;i Miangaly','','','','',NULL,'2023-05-27',6),(455,'CLIENT',NULL,NULL,'262','M Pierre','','','','',NULL,'2023-05-27',6),(456,'CLIENT',NULL,NULL,'263','STHD','','','','',NULL,'2023-05-27',6),(457,'CLIENT',NULL,NULL,'264','Mme Kaloy','','','','',NULL,'2023-05-27',6),(458,'CLIENT',NULL,NULL,'265','Mme Nambinina','','','','',NULL,'2023-05-27',6),(459,'CLIENT',NULL,NULL,'266','Mme Larissa','','','','',NULL,'2023-05-27',6),(460,'CLIENT',NULL,NULL,'267','Mme Cynthia','','','','',NULL,'2023-05-27',6),(461,'CLIENT',NULL,NULL,'268','Maman&#039;i Mme Mialy','','','','',NULL,'2023-05-29',6),(462,'CLIENT',NULL,NULL,'269','M Nirina','','','','',NULL,'2023-05-29',6),(463,'CLIENT',NULL,NULL,'270','Mme Liliane','','','','',NULL,'2023-05-29',6),(464,'CLIENT',NULL,NULL,'271','Ifaliana','','','','',NULL,'2023-05-31',6),(465,'CLIENT',NULL,NULL,'272','Mme Lalaina','','','','',NULL,'2023-05-31',6),(466,'CLIENT',NULL,NULL,'273','Pharmacie HUJRB','','','','',NULL,'2023-05-31',6),(467,'CLIENT',NULL,NULL,'274','Mme Blandine','','','','',NULL,'2023-05-31',6),(468,'CLIENT',NULL,NULL,'275','Mme Nadia','','','','',NULL,'2023-05-31',6),(469,'CLIENT',NULL,NULL,'276','Pota','','','','',NULL,'2023-05-31',6),(470,'CLIENT',NULL,NULL,'277','Mme Sedra','','','','',NULL,'2023-05-31',6),(471,'CLIENT',NULL,NULL,'278','Mme Voahangy (lava volo)','','','','',NULL,'2023-05-31',6),(472,'CLIENT',NULL,NULL,'279','Mme Henriette','','','','',NULL,'2023-05-31',6),(473,'CLIENT',NULL,NULL,'280','Mme Aina Fara','','','','',NULL,'2023-06-01',6),(474,'CLIENT',NULL,NULL,'281','Mme Charlotte','','','','',NULL,'2023-06-01',6),(475,'CLIENT',NULL,NULL,'281','Mme Charlotte','','','','',NULL,'2023-06-01',6),(476,'CLIENT',NULL,NULL,'283','Mme Tane','','','','',NULL,'2023-06-02',6),(477,'CLIENT',NULL,NULL,'284','M Tiana','','','','',NULL,'2023-06-02',6),(478,'CLIENT',NULL,NULL,'285','Fianarantsoa','','','','',NULL,'2023-06-02',6),(479,'CLIENT',NULL,NULL,'286','Aingo','','','','',NULL,'2023-06-02',6),(480,'CLIENT',NULL,NULL,'287','M Timoty','','','','',NULL,'2023-06-02',6),(481,'FOURNISSEUR',NULL,NULL,'55','SOAMANATOMBO','','','','',NULL,'2023-06-02',6),(482,'CLIENT',NULL,NULL,'288','Mme Annie','','','','',NULL,'2023-06-02',6),(483,'CLIENT',NULL,NULL,'289','Mme Sariaka','','','','',NULL,'2023-06-02',6),(484,'CLIENT',NULL,NULL,'290','Mme Tiana 1','','','','',NULL,'2023-06-02',6),(485,'CLIENT',NULL,NULL,'291','M Samy','','','','',NULL,'2023-06-03',6),(486,'CLIENT',NULL,NULL,'292','Sahondra','','','','',NULL,'2023-06-03',6),(487,'CLIENT',NULL,NULL,'292','Sahondra','','','','',NULL,'2023-06-03',6),(488,'CLIENT',NULL,NULL,'294','M Vonjy','','','','',NULL,'2023-06-03',6),(489,'CLIENT',NULL,NULL,'295','M Dominique','','','','',NULL,'2023-06-03',6),(490,'CLIENT',NULL,NULL,'296','Lahatra','','','','',NULL,'2023-06-03',6),(491,'CLIENT',NULL,NULL,'297','Zanak&#039;i Bebe','','','','',NULL,'2023-06-03',6),(492,'CLIENT',NULL,NULL,'298','Mme Jos&eacute;phine','','','','',NULL,'2023-06-03',6),(493,'CLIENT',NULL,NULL,'299','Mme Fanja (mpivarotra gateau)','','','','',NULL,'2023-06-13',6),(494,'CLIENT',NULL,NULL,'300','St&eacute;phanie (Zanak&#039;i Mme Domoina)','','','','',NULL,'2023-06-06',6),(495,'FOURNISSEUR',NULL,NULL,'56','CELLUPACK','','','','',NULL,'2023-06-06',6),(496,'CLIENT',NULL,NULL,'301','Dr Sylvia','','','','',NULL,'2023-06-07',6),(497,'CLIENT',NULL,NULL,'302','M Andry(Benja)','','','','',NULL,'2023-06-07',6),(498,'CLIENT',NULL,NULL,'303','Toto Sera','','','','',NULL,'2023-06-07',6),(499,'CLIENT',NULL,NULL,'304','Maman&#039;i Miora','','','','',NULL,'2023-06-07',6),(500,'FOURNISSEUR',NULL,NULL,'57','Leader Price','','','','',NULL,'2023-06-07',6),(501,'CLIENT',NULL,NULL,'305','Rose','','','','',NULL,'2023-06-08',6),(502,'CLIENT',NULL,NULL,'306','Soeur Philom&egrave;ne','','','','',NULL,'2023-06-08',6),(503,'CLIENT',NULL,NULL,'307','Mme Mamisoa','','','','',NULL,'2023-06-08',6),(504,'CLIENT',NULL,NULL,'307','Mme Mamisoa','','','','',NULL,'2023-06-08',6),(505,'FOURNISSEUR',NULL,NULL,'58','JEDIDIA','','','','',1,'2023-06-09',6),(506,'FOURNISSEUR',NULL,NULL,'58','JEDIDIA','','','','',1,'2023-06-10',6),(507,'CLIENT',NULL,NULL,'309','Mme Edena','','','','',NULL,'2023-06-09',6),(508,'CLIENT',NULL,NULL,'309','Mme Edena','','','','',NULL,'2023-06-09',6),(509,'CLIENT',NULL,NULL,'311','Dr Bakoly','','','','',NULL,'2023-06-09',6),(510,'CLIENT',NULL,NULL,'312','M Henri','','','','',NULL,'2023-06-10',6),(511,'CLIENT',NULL,NULL,'312','M Henri','','','','',NULL,'2023-06-10',6),(512,'CLIENT',NULL,NULL,'314','M Frank','','','','',NULL,'2023-06-10',6),(513,'CLIENT',NULL,NULL,'314','M Frank','','','','',NULL,'2023-06-10',6),(514,'FOURNISSEUR',NULL,NULL,'60','MADAKALY','','','','',NULL,'2023-06-10',6),(515,'FOURNISSEUR',NULL,NULL,'61','JEDIDIA','','','','',NULL,'2023-06-10',6),(516,'CLIENT',NULL,NULL,'316','Mme Suzy','','','','',NULL,'2023-06-10',6),(517,'CLIENT',NULL,NULL,'317','Mme Holy (Itokiana&amp;Mahatoky)','','','','',NULL,'2023-06-12',6),(518,'CLIENT',NULL,NULL,'318','M Nary','','','','',NULL,'2023-06-12',6),(519,'CLIENT',NULL,NULL,'319','Mme Alida','','','','',NULL,'2023-06-13',6),(520,'FOURNISSEUR',NULL,NULL,'62','SAMIAM','','','','',NULL,'2023-06-13',6),(521,'CLIENT',NULL,NULL,'320','Mme Mirana','','','','',NULL,'2023-06-13',6),(522,'CLIENT',NULL,NULL,'321','M Mamisoa','','','','',NULL,'2023-06-13',6),(523,'CLIENT',NULL,NULL,'322','M Thierry (Vanessa)','','','','',NULL,'2023-06-14',6),(524,'CLIENT',NULL,NULL,'323','Mpiasan&#039;ny CNAPS','','','','',NULL,'2023-06-14',6),(525,'FOURNISSEUR',NULL,NULL,'63','Niaina','','','','',NULL,'2023-06-15',6),(526,'CLIENT',NULL,NULL,'324','Ravaka','','','','',NULL,'2023-06-16',6),(527,'CLIENT',NULL,NULL,'325','SMARTY SHOP','','','','',NULL,'2023-06-17',6),(528,'CLIENT',NULL,NULL,'326','Jeanne','','','','',NULL,'2023-06-19',6),(529,'CLIENT',NULL,NULL,'327','Maman&#039;i Linda','','','','',NULL,'2023-06-19',6),(530,'FOURNISSEUR',NULL,NULL,'64','Agrikoba','','','','',NULL,'2023-06-20',6),(531,'FOURNISSEUR',NULL,NULL,'65','Nutrilait','','','','',NULL,'2023-06-20',6),(532,'CLIENT',NULL,NULL,'328','Mme Lilly','','','','',NULL,'2023-06-20',6),(533,'CLIENT',NULL,NULL,'329','M Roger','','','','',NULL,'2023-06-22',6),(534,'CLIENT',NULL,NULL,'330','MBL Service','','','','',NULL,'2023-06-23',6),(535,'CLIENT',NULL,NULL,'331','Zo','','','','',NULL,'2023-06-23',6),(536,'CLIENT',NULL,NULL,'332','M.Mbola','','','','',NULL,'2023-06-23',6),(537,'CLIENT',NULL,NULL,'333','Mme Rondro (Ilay caf&eacute;)','','','','',NULL,'2023-06-23',6),(538,'CLIENT',NULL,NULL,'334','Professeur','','','','',NULL,'2023-06-24',6),(539,'CLIENT',NULL,NULL,'335','Mme Sahondra','','','','',NULL,'2023-06-24',6),(540,'FOURNISSEUR',NULL,NULL,'66','SEMINA','','','','',NULL,'2023-06-24',6),(541,'CLIENT',NULL,NULL,'336','Rafredy','','','','',NULL,'2023-06-26',6),(542,'CLIENT',NULL,NULL,'337','Dadan&#039;i Mme mialy','','','','',NULL,'2023-06-27',6),(543,'CLIENT',NULL,NULL,'338','Tiana','','','','',NULL,'2023-06-30',6),(544,'CLIENT',NULL,NULL,'339','Toto Sa','','','','',NULL,'2023-07-01',7),(545,'CLIENT',NULL,NULL,'340','Toky','','','','',NULL,'2023-07-01',7),(546,'CLIENT',NULL,NULL,'341','Haingo','','','','',NULL,'2023-07-01',7),(547,'CLIENT',NULL,NULL,'342','Mme Rosette','','','','',NULL,'2023-07-03',6),(548,'CLIENT',NULL,NULL,'343','Bebe Hoby','','','','',NULL,'2023-07-04',6),(549,'CLIENT',NULL,NULL,'344','Norbert','','','','',NULL,'2023-07-04',6),(550,'CATEGORIE',NULL,NULL,'FS','Fournitures scolaires 2023','','','','',1,'2024-01-03',1),(551,'FOURNISSEUR',NULL,NULL,'67','BURONET','','','','',NULL,'2023-07-06',6),(552,'CLIENT',NULL,NULL,'345','CHUJRB','','','','',NULL,'2023-07-07',6),(553,'CLIENT',NULL,NULL,'346','Pharmacie CHUJRB','','','','',NULL,'2023-07-07',6),(554,'CLIENT',NULL,NULL,'347','Mme Volana','','','','',NULL,'2023-07-07',6),(555,'FOURNISSEUR',NULL,NULL,'68','CHANDARANA','','','','',1,'2023-07-07',6),(556,'FOURNISSEUR',NULL,NULL,'68','CHANDARANA','','','','',1,'2023-07-07',6),(557,'FOURNISSEUR',NULL,NULL,'70','CHANDARANA','','','','',NULL,'2023-07-07',6),(558,'FOURNISSEUR',NULL,NULL,'71','SHANTILAL','','','','',NULL,'2023-07-12',6),(559,'CLIENT',NULL,NULL,'348','EKAR IFARIHY','','','','',NULL,'2023-07-17',6),(560,'CLIENT',NULL,NULL,'349','M Haingo','','','','',NULL,'2023-07-18',6),(561,'CLIENT',NULL,NULL,'350','Mme Volatiana','','','','',NULL,'2023-07-19',6),(562,'CLIENT',NULL,NULL,'351','Florence','','','','',NULL,'2023-07-20',6),(563,'CLIENT',NULL,NULL,'352','M Lolo/Mme Michelle','','','','',NULL,'2023-07-20',6),(564,'CATEGORIE',NULL,NULL,'AUTRE','Autre','','','','',NULL,'2024-01-03',1);
/*!40000 ALTER TABLE `referentielle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarif`
--

DROP TABLE IF EXISTS `tarif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tarif` (
  `tar_code` int NOT NULL AUTO_INCREMENT,
  `cat_code` int DEFAULT NULL,
  `tar_nom` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `tar_unite` varchar(25) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `tar_prix1` decimal(10,2) DEFAULT NULL,
  `tar_prix2` decimal(10,2) DEFAULT NULL,
  `tar_prix3` decimal(10,2) DEFAULT NULL,
  `tar_prix4` decimal(10,2) DEFAULT NULL,
  `tar_prix5` decimal(10,2) DEFAULT NULL,
  `tar_prix6` decimal(10,2) DEFAULT NULL,
  `tar_prix7` decimal(10,2) DEFAULT NULL,
  `tar_prix8` decimal(10,2) DEFAULT NULL,
  `tar_prix9` decimal(10,2) DEFAULT NULL,
  `tar_prix10` decimal(10,2) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `user_code_upd` int DEFAULT NULL,
  PRIMARY KEY (`tar_code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarif`
--

LOCK TABLES `tarif` WRITE;
/*!40000 ALTER TABLE `tarif` DISABLE KEYS */;
INSERT INTO `tarif` VALUES (1,27,'test','Nombre',10000.00,20000.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,1,'2024-01-11 08:13:46',1),(2,27,'Tacos','Nombre',10000.00,20000.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,NULL,'2024-01-12 14:08:35',1),(3,27,'Panini','Nombre',1000.00,2000.00,3000.00,0.00,0.00,0.00,0.00,0.00,0.00,0.00,NULL,'2024-01-12 14:09:02',1);
/*!40000 ALTER TABLE `tarif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_reference`
--

DROP TABLE IF EXISTS `type_reference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type_reference` (
  `tpr_code` varchar(25) NOT NULL,
  `tpr_nom` varchar(50) NOT NULL,
  `tpr_table` varchar(50) DEFAULT NULL,
  `tpr_champ` varchar(255) DEFAULT NULL,
  `tpr_libelle` varchar(255) DEFAULT NULL,
  `tpr_type` varchar(255) DEFAULT NULL,
  `tpr_annee_scolaire` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`tpr_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_reference`
--

LOCK TABLES `type_reference` WRITE;
/*!40000 ALTER TABLE `type_reference` DISABLE KEYS */;
INSERT INTO `type_reference` VALUES ('CATEGORIE','Cat&eacute;gories','categorie','cat_nom','Nom','T',NULL),('CLIENT','Clients','client','cli_nom|cli_phone','Nom|Phone','T|P',NULL),('FOURNISSEUR','Fournisseurs','fournisseur','fou_nom|fou_phone','Nom|Phone','T|P',NULL),('MODE','Mode de paiement','modepaiement','mod_nom','Nom','T',NULL),('PROFIL','Profils des utilisateurs','profil','prf_nom','Nom','T',NULL);
/*!40000 ALTER TABLE `type_reference` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateur` (
  `user_code` int NOT NULL AUTO_INCREMENT,
  `prf_code` int DEFAULT NULL,
  `user_nom` varchar(255) NOT NULL,
  `user_prenom` varchar(255) DEFAULT NULL,
  `user_matricule` varchar(25) NOT NULL,
  `user_login` varchar(25) NOT NULL,
  `user_pwd` varchar(255) NOT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `user_code_upd` decimal(11,0) DEFAULT NULL,
  `user_question` varchar(100) DEFAULT NULL,
  `user_reponse` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_code`),
  KEY `fk_association_19` (`prf_code`),
  CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`prf_code`) REFERENCES `profil` (`prf_code`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (1,7,'ADMIN','admin','0000','admin','c4ca4238a0b923820dcc509a6f75849b',NULL,'2023-05-11',1,'za','za'),(2,8,'SAISIE','SAISIE','0001','SAISIE','c4ca4238a0b923820dcc509a6f75849b',NULL,'2023-03-26',1,NULL,NULL),(3,7,'xx','xx','13123123','yyy','c4ca4238a0b923820dcc509a6f75849b',1,'2019-10-07',1,NULL,NULL),(4,7,'cc','cc','11212131','cc','c4ca4238a0b923820dcc509a6f75849b',1,'2022-09-14',1,NULL,NULL),(5,9,'Caisse','Caisse','0002','Caisse','c4ca4238a0b923820dcc509a6f75849b',NULL,'2023-03-26',1,NULL,NULL),(6,7,'Felana','Felana','0000','FELANA','bbaccb394b6909d18ae24b3376618beb',NULL,'2023-05-04',6,NULL,NULL),(7,7,'Hoby','Hoby','00001','Hoby','dbc4d84bfcfe2284ba11beffb853a8c4',NULL,'2023-05-05',7,NULL,NULL),(8,8,'Tatamo','Tatamo','0000','Tatamo','c4ca4238a0b923820dcc509a6f75849b',NULL,'2023-04-18',1,NULL,NULL);
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vw_detentree`
--

DROP TABLE IF EXISTS `vw_detentree`;
/*!50001 DROP VIEW IF EXISTS `vw_detentree`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_detentree` AS SELECT 
 1 AS `detent_code`,
 1 AS `ent_code`,
 1 AS `tar_code`,
 1 AS `detent_qte`,
 1 AS `detent_pu`,
 1 AS `detent_montant`,
 1 AS `user_code_upd`,
 1 AS `updated`,
 1 AS `tar_nom`,
 1 AS `tar_unite`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_entree`
--

DROP TABLE IF EXISTS `vw_entree`;
/*!50001 DROP VIEW IF EXISTS `vw_entree`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_entree` AS SELECT 
 1 AS `ent_code`,
 1 AS `cli_code`,
 1 AS `user_code`,
 1 AS `ent_date`,
 1 AS `fou_code`,
 1 AS `ent_heure`,
 1 AS `ent_facture`,
 1 AS `ent_montant_payer`,
 1 AS `ent_montant_encaisse`,
 1 AS `ent_reste`,
 1 AS `ent_payer_plus_tard`,
 1 AS `ent_mode_paiement`,
 1 AS `updated`,
 1 AS `cli_nom`,
 1 AS `fou_nom`,
 1 AS `nbdet`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_profil_menu`
--

DROP TABLE IF EXISTS `vw_profil_menu`;
/*!50001 DROP VIEW IF EXISTS `vw_profil_menu`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_profil_menu` AS SELECT 
 1 AS `men_id`,
 1 AS `men_parent`,
 1 AS `men_icon`,
 1 AS `men_nom`,
 1 AS `men_url`,
 1 AS `mem_parent2`,
 1 AS `prf_code`,
 1 AS `rang`,
 1 AS `men_getText`,
 1 AS `men_restaure`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vw_detentree`
--

/*!50001 DROP VIEW IF EXISTS `vw_detentree`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_detentree` AS select `d`.`detent_code` AS `detent_code`,`d`.`ent_code` AS `ent_code`,`d`.`tar_code` AS `tar_code`,`d`.`detent_qte` AS `detent_qte`,`d`.`detent_pu` AS `detent_pu`,`d`.`detent_montant` AS `detent_montant`,`d`.`user_code_upd` AS `user_code_upd`,`d`.`updated` AS `updated`,`t`.`tar_nom` AS `tar_nom`,`t`.`tar_unite` AS `tar_unite` from (`detentree` `d` join `tarif` `t` on((`d`.`tar_code` = `t`.`tar_code`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_entree`
--

/*!50001 DROP VIEW IF EXISTS `vw_entree`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_entree` AS select `e`.`ent_code` AS `ent_code`,`e`.`cli_code` AS `cli_code`,`e`.`user_code` AS `user_code`,`e`.`ent_date` AS `ent_date`,`e`.`fou_code` AS `fou_code`,`e`.`ent_heure` AS `ent_heure`,`e`.`ent_facture` AS `ent_facture`,`e`.`ent_montant_payer` AS `ent_montant_payer`,`e`.`ent_montant_encaisse` AS `ent_montant_encaisse`,`e`.`ent_reste` AS `ent_reste`,`e`.`ent_payer_plus_tard` AS `ent_payer_plus_tard`,`e`.`ent_mode_paiement` AS `ent_mode_paiement`,`e`.`updated` AS `updated`,`c`.`cli_nom` AS `cli_nom`,`f`.`fou_nom` AS `fou_nom`,100 AS `nbdet` from ((`entree` `e` left join `client` `c` on((`e`.`cli_code` = `c`.`cli_code`))) left join `fournisseur` `f` on((`e`.`fou_code` = `f`.`fou_code`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_profil_menu`
--

/*!50001 DROP VIEW IF EXISTS `vw_profil_menu`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_profil_menu` AS select `m`.`men_id` AS `men_id`,`m`.`men_parent` AS `men_parent`,`m`.`men_icon` AS `men_icon`,`m`.`men_nom` AS `men_nom`,`m`.`men_url` AS `men_url`,(case when (`m`.`men_parent2` is null) then `m`.`men_parent3` else `m`.`men_parent2` end) AS `mem_parent2`,`pm`.`prf_code` AS `prf_code`,`m`.`rang` AS `rang`,`m`.`men_getText` AS `men_getText`,`m`.`men_restaure` AS `men_restaure` from (`menu` `m` left join `profil_menu` `pm` on((`m`.`men_id` = `pm`.`men_id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-12 16:57:55
