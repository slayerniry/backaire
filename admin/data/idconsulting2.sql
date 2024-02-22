-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: idconsulting2
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
  `cat_nom` varchar(255) NOT NULL,
  `ref_abrev` varchar(20) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `user_code_upd` decimal(11,0) DEFAULT NULL,
  PRIMARY KEY (`cat_code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,'Huile','HUILE',1,'2024-01-03',1),(2,'Vinaigre','VINAIGRE',1,'2024-01-03',1),(8,'Produits laitiers','LAIT',1,'2024-01-03',1),(10,'Aliment infantile','ALIMENTINF',1,'2024-01-03',1),(11,'Boisson','BOISSON',1,'2024-01-03',1),(12,'Eau min&eacute;rale','EAUMINERAL',1,'2024-01-03',1),(13,'Patisserie','PATISSERIE',1,'2024-01-03',1),(14,'Epices et condiments','EPICESETCO',1,'2024-01-03',1),(15,'Produits locaux','PRDLOCAUX',1,'2024-01-03',1),(16,'Caf&eacute;, cacao et choco','CAFECACAO',1,'2024-01-03',1),(17,'P&acirc;tes et nouilles','PATESNOU',1,'2024-01-03',1),(18,'Biscuits et bonbons','BISCUITSBO',1,'2024-01-03',1),(19,'Snacks','SNACKS',1,'2024-01-03',1),(20,'Autres produits alimentaires','AUTPRODALI',1,'2024-01-03',1),(21,'Couches et lingettes','COUCHELING',1,'2024-01-03',1),(22,'Produits d&#039;hygi&egrave;ne','PRDHYGIEN',1,'2024-01-03',1),(23,'Fournitures scolaires et de bureau','FOURNSCOBU',1,'2024-01-03',1),(24,'Autres articles','AUTRES',1,'2024-01-03',1),(25,'Savon et d&eacute;tergent','SAVONDETER',1,'2024-01-03',1),(26,'Fournitures scolaires 2023','FS',1,'2024-01-03',1),(27,'Autre','AUTRE',NULL,'2024-01-03',1),(28,'test','test',1,'2024-01-18',1);
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
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
  `men_nom` varchar(255) DEFAULT NULL,
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
INSERT INTO `menu` VALUES (1,'user','OPT','Utilisateur',NULL,NULL,'/backconsulting/pages/admin/listeutilisateur.php',NULL,NULL,1,NULL,NULL),(2,'cog','OPT','Param&egrave;tre',NULL,NULL,'/backconsulting/pages/admin/listeparametre.php',NULL,NULL,2,NULL,NULL),(3,'book','OPT','Autre',NULL,NULL,'/backconsulting/pages/parametrage/listeautre.php',NULL,NULL,3,NULL,NULL),(4,'hdd','OPT','Sauvegarde ou Restauration',NULL,NULL,'/backconsulting/pages/parametrage/backrestore.php',NULL,NULL,4,NULL,NULL),(5,'home','TRAIT','Societe',NULL,NULL,'/backconsulting/pages/creation/listesociete.php',NULL,NULL,1,NULL,NULL),(6,'briefcase','TRAIT','Consultant',NULL,NULL,'/backconsulting/pages/creation/listeconsultant.php',NULL,NULL,2,1,NULL),(7,'calendar','TRAIT','Ev&eacute;n&eacute;ment',NULL,NULL,'/backconsulting/pages/creation/listeevenement.php',NULL,NULL,3,1,NULL),(8,'pencil','TRAIT','Expertise',NULL,NULL,'/backconsulting/pages/creation/listeexpertise.php',NULL,NULL,5,1,NULL),(9,'calendar','EDIT','...',NULL,NULL,'/backconsulting/pages/edition/formehistoriqueES.php',NULL,NULL,1,NULL,NULL),(10,'search','EDIT','...',NULL,NULL,'/backconsulting/pages/edition/formHistoInventaire.php',NULL,NULL,2,NULL,NULL),(11,'comment','EDIT','...',NULL,NULL,'/backconsulting/pages/edition/formInventaire.php',NULL,NULL,4,NULL,NULL),(12,'check','OPT','Habilitation Menu',NULL,NULL,'/backconsulting/pages/admin/habilitationMenu.php',NULL,NULL,5,NULL,NULL),(13,NULL,NULL,'Ajouter','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-plus\"></i></i>','btnAjouter','',1,NULL,NULL,NULL,NULL),(14,NULL,NULL,'Modifier','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-pencil\"></i></i>','btnModifier','',1,NULL,NULL,NULL,NULL),(15,NULL,NULL,'Supprimer','<i class=\"btn btn-danger\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-remove\"></i></i>','btnSupprimer','',1,NULL,NULL,NULL,NULL),(16,NULL,NULL,'Modifier','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-pencil\"></i></i>','btnModifier','',2,NULL,NULL,NULL,NULL),(17,NULL,NULL,'Ajouter','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-plus\"></i></i>','btnAjouter','',3,NULL,NULL,NULL,NULL),(18,NULL,NULL,'Modifier','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-pencil\"></i></i>','btnModifier','',3,NULL,NULL,NULL,NULL),(19,NULL,NULL,'Supprimer','<i class=\"btn btn-danger\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-remove\"></i></i>','btnSupprimer','',3,NULL,NULL,NULL,NULL),(21,NULL,NULL,'Modifier','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-pencil\"></i></i>','btnModifier','',6,NULL,NULL,NULL,NULL),(22,NULL,NULL,'Supprimer','<i class=\"btn btn-danger\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-remove\"></i></i>','btnSupprimer','',6,NULL,NULL,NULL,NULL),(23,NULL,NULL,'Ajouter','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-plus\"></i></i>','btnAjouter','',7,NULL,1,NULL,NULL),(24,NULL,NULL,'Modifier','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-pencil\"></i></i>','btnModifier','',7,NULL,2,NULL,NULL),(25,NULL,NULL,'Supprimer','<i class=\"btn btn-danger\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-remove\"></i></i>','btnSupprimer','',7,NULL,3,NULL,NULL),(30,NULL,NULL,'Ajouter','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-plus\"></i></i>','btnAjouter','',8,NULL,NULL,NULL,NULL),(31,NULL,NULL,'Modifier','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-pencil\"></i></i>','btnModifier','',8,NULL,NULL,NULL,NULL),(32,NULL,NULL,'Supprimer','<i class=\"btn btn-danger\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-remove\"></i></i>','btnSupprimer','',8,NULL,NULL,NULL,NULL),(37,NULL,NULL,'T&eacute;lecharger','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-download\"></i></i>','telecharger','',4,NULL,NULL,NULL,NULL),(38,NULL,NULL,'Supprimer','<i class=\"btn btn-danger\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-remove\"></i></i>','btnSupprimer','',4,NULL,NULL,NULL,NULL),(39,NULL,NULL,'Valider','<i type=\"button\" class=\"btn btn-success\">Valider</i>','btnValider','',4,NULL,NULL,NULL,NULL),(40,NULL,NULL,'Valider','<i type=\"button\" class=\"btn btn-success\">Valider</i>','btnValider','',12,NULL,NULL,NULL,NULL),(41,'blackboard','TRAIT','Accueil',NULL,NULL,'/backconsulting/pages/creation/listedataeccueil.php',NULL,NULL,6,NULL,NULL),(43,NULL,NULL,'Ajouter','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-plus\"></i></i>','btnAjouter','',6,NULL,NULL,NULL,NULL),(44,'search','EDIT','...',NULL,NULL,'/backconsulting/pages/edition/formStatArticle.php',NULL,NULL,3,NULL,NULL),(45,NULL,NULL,'Deverouiller','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-pencil\"></i></i>','btnVerouiller','',9,NULL,NULL,NULL,NULL),(47,'phone-alt','TRAIT','Apporteur',NULL,NULL,'/backconsulting/pages/creation/listeapporteur.php',NULL,NULL,4,1,NULL),(48,NULL,NULL,'Ajouter','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-plus\"></i></i>','btnAjouter','',47,NULL,1,NULL,NULL),(49,NULL,NULL,'Modifier','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-pencil\"></i></i>','btnModifier','',47,NULL,2,NULL,NULL),(50,NULL,NULL,'Supprimer','<i class=\"btn btn-danger\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-remove\"></i></i>','btnSupprimer','',47,NULL,3,NULL,NULL),(58,NULL,NULL,'Modifier','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-pencil\"></i></i>','btnModifier','',5,NULL,NULL,NULL,NULL),(59,NULL,NULL,'Supprimer','<i class=\"btn btn-danger\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-remove\"></i></i>','btnSupprimer','',5,NULL,NULL,NULL,NULL),(60,NULL,NULL,'Ajouter','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-plus\"></i></i>','btnAjouter','',5,NULL,NULL,NULL,NULL),(61,NULL,NULL,'Modifier','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-pencil\"></i></i>','btnModifier','',41,NULL,NULL,NULL,NULL),(62,NULL,NULL,'Supprimer','<i class=\"btn btn-danger\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-remove\"></i></i>','btnSupprimer','',41,NULL,NULL,NULL,NULL),(63,NULL,NULL,'Ajouter','<i class=\"btn btn-success\" href=\"#\" title=\"\"><i class=\"glyphicon glyphicon-plus\"></i></i>','btnAjouter','',41,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parametre`
--

DROP TABLE IF EXISTS `parametre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parametre` (
  `param_key` varchar(30) NOT NULL,
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
INSERT INTO `parametre` VALUES ('DOSSIER_SAUVEGARDE','C:\\laragon\\www\\backconsulting\\base','dfdfd\r\nsdfdf\r\nsfsdf','',1),('MENU_PARENT','OPT|Option,TRAIT|Traitement,EDIT|Edition',NULL,NULL,0);
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
  `tpr_code` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`pfr_autre_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil_autre`
--

LOCK TABLES `profil_autre` WRITE;
/*!40000 ALTER TABLE `profil_autre` DISABLE KEYS */;
INSERT INTO `profil_autre` VALUES (52,7,'CATEGORIE'),(53,7,'PROFIL'),(54,7,'T_LANGUE'),(55,7,'T_TYPE_APPORTEUR'),(56,7,'T_TYPE_EVENEMENT'),(57,7,'T_TYPE_EXPERTISE');
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
) ENGINE=InnoDB AUTO_INCREMENT=739 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profil_menu`
--

LOCK TABLES `profil_menu` WRITE;
/*!40000 ALTER TABLE `profil_menu` DISABLE KEYS */;
INSERT INTO `profil_menu` VALUES (91,9,NULL,'OPT'),(92,9,3,NULL),(93,9,17,NULL),(94,9,18,NULL),(95,9,47,NULL),(96,9,48,NULL),(97,9,49,NULL),(98,9,51,NULL),(99,9,54,NULL),(100,9,56,NULL),(370,8,6,NULL),(694,7,1,NULL),(695,7,13,NULL),(696,7,14,NULL),(697,7,15,NULL),(698,7,2,NULL),(699,7,16,NULL),(700,7,3,NULL),(701,7,17,NULL),(702,7,18,NULL),(703,7,19,NULL),(704,7,4,NULL),(705,7,37,NULL),(706,7,38,NULL),(707,7,39,NULL),(708,7,12,NULL),(709,7,40,NULL),(710,7,5,NULL),(711,7,58,NULL),(712,7,59,NULL),(713,7,60,NULL),(714,7,6,NULL),(715,7,21,NULL),(716,7,22,NULL),(717,7,43,NULL),(718,7,7,NULL),(719,7,23,NULL),(720,7,24,NULL),(721,7,25,NULL),(722,7,47,NULL),(723,7,48,NULL),(724,7,49,NULL),(725,7,50,NULL),(726,7,8,NULL),(727,7,30,NULL),(728,7,31,NULL),(729,7,32,NULL),(730,7,41,NULL),(731,7,61,NULL),(732,7,62,NULL),(733,7,63,NULL),(734,7,9,NULL),(735,7,45,NULL),(736,7,10,NULL),(737,7,44,NULL),(738,7,11,NULL);
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
  `ref_abrev` varchar(20) DEFAULT NULL,
  `ref_champ1` varchar(255) DEFAULT NULL,
  `ref_champ2` varchar(1000) DEFAULT NULL,
  `ref_champ3` varchar(255) DEFAULT NULL,
  `ref_champ4` varchar(255) DEFAULT NULL,
  `ref_champ5` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `user_code_upd` decimal(11,0) DEFAULT NULL,
  PRIMARY KEY (`ref_code`),
  KEY `fk_association_22` (`ann_code`),
  KEY `fk_association_24` (`tpr_code`),
  KEY `fk_association_29` (`per_code`),
  CONSTRAINT `referentielle_ibfk_1` FOREIGN KEY (`tpr_code`) REFERENCES `type_reference` (`tpr_code`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `referentielle`
--

LOCK TABLES `referentielle` WRITE;
/*!40000 ALTER TABLE `referentielle` DISABLE KEYS */;
INSERT INTO `referentielle` VALUES (107,'PROFIL',NULL,NULL,'ADMIN','Admin','','','','',NULL,'2022-10-11',1),(108,'PROFIL',NULL,NULL,'SAISIE','Saisie','','','','',NULL,'2022-10-11',1),(137,'PROFIL',NULL,NULL,'CAISSE','Caisse','','','','',NULL,'2023-03-20',1),(138,'T_LANGUE',NULL,NULL,'MG','Malagasy','','','','',1,'2024-01-18',1),(139,'T_LANGUE',NULL,NULL,'MG','Malagasy','','','','',NULL,'2024-01-16',1),(140,'T_LANGUE',NULL,NULL,'FR','Fran&ccedil;ais','','','','',NULL,'2024-01-16',1),(142,'T_TYPE_EXPERTISE',NULL,NULL,'1','Type Expertise 1','','','','',NULL,'2024-01-17',1),(143,'T_TYPE_APPORTEUR',NULL,NULL,'1','Type Apporteur 1','','','','',NULL,'2024-01-17',1),(144,'T_TYPE_APPORTEUR',NULL,NULL,'2','Type Apporteur 2','','','','',NULL,'2024-01-17',1),(145,'T_TYPE_EVENEMENT',NULL,NULL,'1','Type Evenement 1','','','','',NULL,'2024-01-17',1),(146,'T_TYPE_EVENEMENT',NULL,NULL,'2','Type Evenement 2','','','','',NULL,'2024-01-17',1),(147,'T_TYPE_EXPERTISE',NULL,NULL,'1','Type expertise 2','','','','',1,'2024-01-17',1),(148,'T_TYPE_EXPERTISE',NULL,NULL,'2','Type expertise 2','','','','',NULL,'2024-01-17',1),(149,'CATEGORIE',NULL,NULL,'test','test','','','','',1,'2024-01-18',1);
/*!40000 ALTER TABLE `referentielle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_accueil`
--

DROP TABLE IF EXISTS `t_accueil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_accueil` (
  `id_accueil` int NOT NULL AUTO_INCREMENT COMMENT 'ID_info sur la page d''accueil',
  `contenu` text COMMENT 'contenu de la page accueil',
  `id_info_societe` varchar(5) NOT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `user_code_upd` decimal(11,0) DEFAULT NULL,
  PRIMARY KEY (`id_accueil`,`id_info_societe`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_accueil`
--

LOCK TABLES `t_accueil` WRITE;
/*!40000 ALTER TABLE `t_accueil` DISABLE KEYS */;
INSERT INTO `t_accueil` VALUES (1,'test 2','1',NULL,'2024-01-23',1);
/*!40000 ALTER TABLE `t_accueil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_apporteur`
--

DROP TABLE IF EXISTS `t_apporteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_apporteur` (
  `id_apporteur_affaire` int NOT NULL AUTO_INCREMENT,
  `id_type_apporteur` int NOT NULL,
  `nom_apporteur` varchar(255) DEFAULT NULL,
  `activite_apporteur` text,
  `expertise_apporteur` text,
  `logo_apporteur` text COMMENT 'logo si societe',
  `mail_apporteur` varchar(255) DEFAULT NULL,
  `tel_apporteur` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `user_code_upd` decimal(11,0) DEFAULT NULL,
  PRIMARY KEY (`id_apporteur_affaire`,`id_type_apporteur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_apporteur`
--

LOCK TABLES `t_apporteur` WRITE;
/*!40000 ALTER TABLE `t_apporteur` DISABLE KEYS */;
INSERT INTO `t_apporteur` VALUES (1,2,'test','xx','','<img class=\"logo_apporteur\" src=\"data:image/jpg;base64,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\" />','','',NULL,'2024-01-23 08:58:42',1),(2,1,'test','test','test','<img class=\"logo_apporteur\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKoAAACqBAMAAADPWMmxAAAAJFBMVEUAMWj///8ZRXdbep7m6/Ctvc+BmbSbr8TM1uH2+PovV4RCZo8nAuG0AAAEYElEQVRo3u2Zz08TQRTHJ0sUs724utVOvGBVMOWigqBwWq2RxhNoleJFDSmiFwWhQS9WRNd4aqw/0ItpjVG5VCHGH/+cM29+7Gy7baXIweS9A2U7s5/59s17b2Z2ibMdRpCKVKQiFalIRer/T6Ur2RZW7JDqHiMt7DpSkYpUpCJ1q1S70GiLI1+ErXVK7WrVaCEVqUhFKlKRilSkIhWpSEUqUjdLvf1b2PpCoxVqHVKdMV/YcjLCSKdUZftanWc7pu7dFipqRa2oFbVuj9Z4voXNdErtzJCKVKRuP/XNlUKhMOkZ35Ta3k/TzDItqOdHkkkrmVrP6W9eH29LTfAn/BvNqa96ZH3rVy9xX3472JYa53ccbUpN1HTZ7BY//FyNbJl6wSjG4wA9Qf6W+qkZ1b1m1PgfXDuDbllrAryaqgB1J3PBa0K2rvUVb+3NlOfgiOFtjtpU6zve+pP14pqt4j/S+pa3nmZRDaeeceovgwjfh9bySj6/8FjfVF5ZzM+IdFFaXTibFKOofazjVHU0ny+6t8DDtniFFb/Nrqy1m0rfKG9Mfc8ZWs/CC6+lKKr18ZJTTqdXV423Zjw+bsiImxZJekK2HfK0VnpNzUeI+kL2rE5mQsc/Tr2qIi72jLc91xH4SWuFySbT9X6N6xQYelx3qHz53sSYSRjzlNY7EJBeQxYErx+rubBWI+sYxrxk0yu0QuQEUjWVTgV9e72QVnCZVZFvN4UHyRfgHJFap0JeNepAvCfAnnJkDMTWqo4rXJYG2gfHhX4/0k/4Z1cJqEe4U6zBqEp4NsDyUferLIBdYZ9DYUK6hbgultJzxEpWi3CZkr8wgkovBrOyZOTWO5kfbg0eF8CG9jCPmvWhbCaYZbIRvRbQpyNGD009A8nmCIfGvAP8kq8RrheKHebjJqvh2GUZ4LsCKn0kC4PDC49d3MO/vxuuA6RuskwPsJSiZRHx3YbWCUWdAOpuKb2BSpYaqNQvLA4MsTmgUAp3tqFGaTUrFzGKtl1SqWtStQd4/theUw9ArQ9TRRQWVSB118/WXTVbJT1b8fzCpIoBq6aGDvu1JuNHaN3RJrI+QMdkai0nqL0P+d+vDVQoD4cyzuqcvAuoh+mqFF8SZUmmKJtvegNWY7i0c3tFqtRTH8GYH7MP4HNWOqzryrBwjnXTh8rw2XEhV076FyFjPZGxYl5iXuRqqMxmHkroZ2+iuoiHWOMOvSMuQ9VFLvyzDSt3zaD2ldRSTmKsQISn2bgkg3rdmgrFls4CoxJas0HBtUMDboTHtz29br0Ile2gEga1RXh9QoxQMqqZKEsXzEGU1sR7M+eMSlhRa0HR2CPyIKT3BbZf7EHpLTnKdy9YY8WKv9FYXZ6OVnqI1T/0TFXGCrFS61xeYv5bD1up76k5mP+VZE3DfPTEADO+tCzzfwaj9tp+Npv1dXi47NJPyzKRzU4GO2o6tqI7qr12aNPd2bmg3c4eT0ZIRSpSkYpUpP5P1D9WIQY+ydwXNAAAAABJRU5ErkJggg==\" />','test','1212',NULL,'2024-01-23 09:16:51',1);
/*!40000 ALTER TABLE `t_apporteur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_cv_consultant`
--

DROP TABLE IF EXISTS `t_cv_consultant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_cv_consultant` (
  `id_consultant` int NOT NULL AUTO_INCREMENT COMMENT 'ID CV consultant',
  `id_langue` int NOT NULL COMMENT 'choix langue',
  `login_compte` varchar(255) NOT NULL COMMENT 'login ou adresse mail de connexion lors de creation de compte et upload cv',
  `password_compte` varchar(40) NOT NULL COMMENT 'mot de passe lors de creation de compte',
  `nom_consultant` varchar(255) NOT NULL,
  `prenom_consultant` varchar(255) DEFAULT NULL,
  `photo_consultant` text,
  `date_naissance` date DEFAULT NULL,
  `tel_consultant` varchar(255) DEFAULT NULL,
  `mail_consultant` varchar(255) DEFAULT NULL COMMENT 'mail dans le cv',
  `linkedin_consultant` varchar(255) DEFAULT NULL COMMENT 'lien linkedin du consultant',
  `competence_consultant` text COMMENT 'Competence',
  `deleted` tinyint(1) DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `user_code_upd` decimal(11,0) DEFAULT NULL,
  PRIMARY KEY (`id_consultant`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_cv_consultant`
--

LOCK TABLES `t_cv_consultant` WRITE;
/*!40000 ALTER TABLE `t_cv_consultant` DISABLE KEYS */;
INSERT INTO `t_cv_consultant` VALUES (1,1,'niry','c4ca4238a0b923820dcc509a6f75849b','RAVELOMANANTSOA','Niry',NULL,'2024-01-27','','','','xx',NULL,'2024-01-27',NULL);
/*!40000 ALTER TABLE `t_cv_consultant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_cv_tem_societe`
--

DROP TABLE IF EXISTS `t_cv_tem_societe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_cv_tem_societe` (
  `id_cv_tmp_societe` varchar(5) NOT NULL COMMENT 'id info de la societe',
  `id_consultant` int NOT NULL COMMENT 'id_consultant table cv_consultant (information a recuperer NOM et PRENOM, DIPLOME, EXPERIENCE)',
  `id_info_societe` varchar(5) NOT NULL COMMENT 'tous les infos de la societe a recuperer a partir de t_societe',
  `deleted` tinyint(1) DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `user_code_upd` decimal(11,0) DEFAULT NULL,
  PRIMARY KEY (`id_cv_tmp_societe` DESC,`id_consultant`,`id_info_societe`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_cv_tem_societe`
--

LOCK TABLES `t_cv_tem_societe` WRITE;
/*!40000 ALTER TABLE `t_cv_tem_societe` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_cv_tem_societe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_diplome`
--

DROP TABLE IF EXISTS `t_diplome`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_diplome` (
  `id_diplome` int NOT NULL AUTO_INCREMENT,
  `id_consultant` int NOT NULL,
  `institution_diplome` varchar(255) DEFAULT NULL COMMENT 'universite ',
  `date_diplome` date DEFAULT NULL,
  `pj_diplome` text COMMENT 'un pj par diplome',
  `diplome_consultant` text COMMENT 'un consultant peut avoir plusieurs diplome',
  `deleted` tinyint(1) DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `user_code_upd` decimal(11,0) DEFAULT NULL,
  PRIMARY KEY (`id_diplome`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_diplome`
--

LOCK TABLES `t_diplome` WRITE;
/*!40000 ALTER TABLE `t_diplome` DISABLE KEYS */;
INSERT INTO `t_diplome` VALUES (1,1,'AA','2024-02-03','_pj_diplome_1706338255.pdf','x',NULL,'2024-01-27',NULL),(2,1,'CC','2024-01-27',NULL,'cc',NULL,'2024-01-27',NULL);
/*!40000 ALTER TABLE `t_diplome` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_event`
--

DROP TABLE IF EXISTS `t_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_event` (
  `id_event` int NOT NULL AUTO_INCREMENT COMMENT 'page actualite et event',
  `contenu` text COMMENT 'contenu',
  `id_type_event` int NOT NULL,
  `date_event` date DEFAULT NULL,
  `photo_event` text,
  `deleted` tinyint(1) DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `user_code_upd` decimal(11,0) DEFAULT NULL,
  PRIMARY KEY (`id_event`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_event`
--

LOCK TABLES `t_event` WRITE;
/*!40000 ALTER TABLE `t_event` DISABLE KEYS */;
INSERT INTO `t_event` VALUES (1,'test test',1,'2024-01-11',NULL,NULL,'2024-01-20 09:47:01',1),(2,'test',2,'2024-01-17','<img class=\"photo_event\" src=\"data:image/jpg;base64,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\" />',NULL,'2024-01-22 10:09:44',1),(3,'test 3',2,'2024-01-22','<img class=\"photo_event\" src=\"data:image/jpg;base64,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\" />',NULL,'2024-01-22 10:23:05',1);
/*!40000 ALTER TABLE `t_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_experience`
--

DROP TABLE IF EXISTS `t_experience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_experience` (
  `id_experience` int NOT NULL AUTO_INCREMENT,
  `id_consultant` int NOT NULL,
  `experience_consultant` text COMMENT 'plusieurs experience',
  `societe_experience` varchar(255) DEFAULT NULL COMMENT 'la societe ou le consultant travail pour acquerir l''experience',
  `date_debut_experience` date DEFAULT NULL,
  `date_fin_experience` date DEFAULT NULL,
  `pj_certificat_travail` text COMMENT 'certificat de travail',
  `deleted` tinyint(1) DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `user_code_upd` decimal(11,0) DEFAULT NULL,
  PRIMARY KEY (`id_experience`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_experience`
--

LOCK TABLES `t_experience` WRITE;
/*!40000 ALTER TABLE `t_experience` DISABLE KEYS */;
INSERT INTO `t_experience` VALUES (1,1,'ex','eeee','2024-01-27','2024-01-27','_pj_certificat_travail_1706338255.pdf',NULL,'2024-01-27',NULL);
/*!40000 ALTER TABLE `t_experience` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_expertise`
--

DROP TABLE IF EXISTS `t_expertise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_expertise` (
  `id_expertise` int NOT NULL AUTO_INCREMENT COMMENT 'ID infos de la page expertise',
  `contenu` text COMMENT 'information sur la page experise',
  `id_type_expertise` int NOT NULL COMMENT 'par domaine d''expertise',
  `deleted` tinyint(1) DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `user_code_upd` decimal(11,0) DEFAULT NULL,
  PRIMARY KEY (`id_expertise` DESC,`id_type_expertise` DESC)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_expertise`
--

LOCK TABLES `t_expertise` WRITE;
/*!40000 ALTER TABLE `t_expertise` DISABLE KEYS */;
INSERT INTO `t_expertise` VALUES (1,'test 2',2,NULL,'2024-01-23',1);
/*!40000 ALTER TABLE `t_expertise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_langue`
--

DROP TABLE IF EXISTS `t_langue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_langue` (
  `id_langue` int NOT NULL AUTO_INCREMENT COMMENT 'id langue',
  `langue` varchar(255) DEFAULT NULL COMMENT 'langue a choisir',
  `ref_abrev` varchar(20) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `user_code_upd` decimal(11,0) DEFAULT NULL,
  PRIMARY KEY (`id_langue`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_langue`
--

LOCK TABLES `t_langue` WRITE;
/*!40000 ALTER TABLE `t_langue` DISABLE KEYS */;
INSERT INTO `t_langue` VALUES (1,'Malagasy','MG',NULL,'2024-01-18',1),(2,'Fran&ccedil;ais','FR',NULL,'2024-01-16',1);
/*!40000 ALTER TABLE `t_langue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_societe`
--

DROP TABLE IF EXISTS `t_societe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_societe` (
  `id_info_societe` int NOT NULL AUTO_INCREMENT COMMENT 'id info de la societe',
  `detail_societe` text COMMENT 'information sur la societe',
  `logo_societe` text COMMENT 'logo ',
  `tel_societe` varchar(20) DEFAULT NULL COMMENT 'telephone de la societe',
  `mail_societe` varchar(64) DEFAULT NULL COMMENT 'mail de la societe',
  `adresse_societe` varchar(255) DEFAULT NULL COMMENT 'adresse de la societe',
  `compte_fb` varchar(512) DEFAULT NULL COMMENT 'compte fb de la societe',
  `compte_tweet` varchar(512) DEFAULT NULL COMMENT 'compte tweeter societe',
  `compte_linkedin` varchar(512) DEFAULT NULL COMMENT 'compte linkedin societe',
  `ref_abrev` varchar(20) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `user_code_upd` decimal(11,0) DEFAULT NULL,
  PRIMARY KEY (`id_info_societe` DESC) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_societe`
--

LOCK TABLES `t_societe` WRITE;
/*!40000 ALTER TABLE `t_societe` DISABLE KEYS */;
INSERT INTO `t_societe` VALUES (1,'societe 1','<img class=\"logo_societe\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAKoAAACqBAMAAADPWMmxAAAAJFBMVEUAMWj///8ZRXdbep7m6/Ctvc+BmbSbr8TM1uH2+PovV4RCZo8nAuG0AAAEYElEQVRo3u2Zz08TQRTHJ0sUs724utVOvGBVMOWigqBwWq2RxhNoleJFDSmiFwWhQS9WRNd4aqw/0ItpjVG5VCHGH/+cM29+7Gy7baXIweS9A2U7s5/59s17b2Z2ibMdRpCKVKQiFalIRer/T6Ur2RZW7JDqHiMt7DpSkYpUpCJ1q1S70GiLI1+ErXVK7WrVaCEVqUhFKlKRilSkIhWpSEUqUjdLvf1b2PpCoxVqHVKdMV/YcjLCSKdUZftanWc7pu7dFipqRa2oFbVuj9Z4voXNdErtzJCKVKRuP/XNlUKhMOkZ35Ta3k/TzDItqOdHkkkrmVrP6W9eH29LTfAn/BvNqa96ZH3rVy9xX3472JYa53ccbUpN1HTZ7BY//FyNbJl6wSjG4wA9Qf6W+qkZ1b1m1PgfXDuDbllrAryaqgB1J3PBa0K2rvUVb+3NlOfgiOFtjtpU6zve+pP14pqt4j/S+pa3nmZRDaeeceovgwjfh9bySj6/8FjfVF5ZzM+IdFFaXTibFKOofazjVHU0ny+6t8DDtniFFb/Nrqy1m0rfKG9Mfc8ZWs/CC6+lKKr18ZJTTqdXV423Zjw+bsiImxZJekK2HfK0VnpNzUeI+kL2rE5mQsc/Tr2qIi72jLc91xH4SWuFySbT9X6N6xQYelx3qHz53sSYSRjzlNY7EJBeQxYErx+rubBWI+sYxrxk0yu0QuQEUjWVTgV9e72QVnCZVZFvN4UHyRfgHJFap0JeNepAvCfAnnJkDMTWqo4rXJYG2gfHhX4/0k/4Z1cJqEe4U6zBqEp4NsDyUferLIBdYZ9DYUK6hbgultJzxEpWi3CZkr8wgkovBrOyZOTWO5kfbg0eF8CG9jCPmvWhbCaYZbIRvRbQpyNGD009A8nmCIfGvAP8kq8RrheKHebjJqvh2GUZ4LsCKn0kC4PDC49d3MO/vxuuA6RuskwPsJSiZRHx3YbWCUWdAOpuKb2BSpYaqNQvLA4MsTmgUAp3tqFGaTUrFzGKtl1SqWtStQd4/theUw9ArQ9TRRQWVSB118/WXTVbJT1b8fzCpIoBq6aGDvu1JuNHaN3RJrI+QMdkai0nqL0P+d+vDVQoD4cyzuqcvAuoh+mqFF8SZUmmKJtvegNWY7i0c3tFqtRTH8GYH7MP4HNWOqzryrBwjnXTh8rw2XEhV076FyFjPZGxYl5iXuRqqMxmHkroZ2+iuoiHWOMOvSMuQ9VFLvyzDSt3zaD2ldRSTmKsQISn2bgkg3rdmgrFls4CoxJas0HBtUMDboTHtz29br0Ile2gEga1RXh9QoxQMqqZKEsXzEGU1sR7M+eMSlhRa0HR2CPyIKT3BbZf7EHpLTnKdy9YY8WKv9FYXZ6OVnqI1T/0TFXGCrFS61xeYv5bD1up76k5mP+VZE3DfPTEADO+tCzzfwaj9tp+Npv1dXi47NJPyzKRzU4GO2o6tqI7qr12aNPd2bmg3c4eT0ZIRSpSkYpUpP5P1D9WIQY+ydwXNAAAAABJRU5ErkJggg==\" />','033333333','societe12311@gmail.com','d','d','d','d',NULL,NULL,'2024-01-23',1);
/*!40000 ALTER TABLE `t_societe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_type_apporteur`
--

DROP TABLE IF EXISTS `t_type_apporteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_type_apporteur` (
  `id_type_apporteur` int NOT NULL AUTO_INCREMENT,
  `detail_type` varchar(255) DEFAULT NULL,
  `ref_abrev` varchar(20) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `user_code_upd` decimal(11,0) DEFAULT NULL,
  PRIMARY KEY (`id_type_apporteur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_type_apporteur`
--

LOCK TABLES `t_type_apporteur` WRITE;
/*!40000 ALTER TABLE `t_type_apporteur` DISABLE KEYS */;
INSERT INTO `t_type_apporteur` VALUES (1,'Type Apporteur 1','1',NULL,'2024-01-17',1),(2,'Type Apporteur 2','2',NULL,'2024-01-17',1);
/*!40000 ALTER TABLE `t_type_apporteur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_type_event`
--

DROP TABLE IF EXISTS `t_type_event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_type_event` (
  `id_type_event` int NOT NULL AUTO_INCREMENT,
  `type_event` varchar(255) NOT NULL,
  `ref_abrev` varchar(20) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `user_code_upd` decimal(11,0) DEFAULT NULL,
  PRIMARY KEY (`id_type_event`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_type_event`
--

LOCK TABLES `t_type_event` WRITE;
/*!40000 ALTER TABLE `t_type_event` DISABLE KEYS */;
INSERT INTO `t_type_event` VALUES (1,'Type Evenement 1','1',NULL,'2024-01-17',1),(2,'Type Evenement 2','2',NULL,'2024-01-17',1);
/*!40000 ALTER TABLE `t_type_event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_type_expertise`
--

DROP TABLE IF EXISTS `t_type_expertise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `t_type_expertise` (
  `id_type_expertise` int NOT NULL AUTO_INCREMENT COMMENT 'type expertise',
  `type_expertise` text COMMENT 'type des expertise',
  `ref_abrev` varchar(20) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `updated` date DEFAULT NULL,
  `user_code_upd` decimal(11,0) DEFAULT NULL,
  PRIMARY KEY (`id_type_expertise`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_type_expertise`
--

LOCK TABLES `t_type_expertise` WRITE;
/*!40000 ALTER TABLE `t_type_expertise` DISABLE KEYS */;
INSERT INTO `t_type_expertise` VALUES (1,'Type expertise 2','1',1,'2024-01-17',1),(2,'Type expertise 2','2',NULL,'2024-01-17',1);
/*!40000 ALTER TABLE `t_type_expertise` ENABLE KEYS */;
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
INSERT INTO `type_reference` VALUES ('CATEGORIE','Cat&eacute;gories','categorie','cat_nom','Nom','T',NULL),('PROFIL','Profils des utilisateurs','profil','prf_nom','Nom','T',NULL),('T_LANGUE','Langue','t_langue','langue','Nom','T',NULL),('T_TYPE_APPORTEUR','Type Apporteur','t_type_apporteur','detail_type','Nom','T',NULL),('T_TYPE_EVENEMENT','Type Evenement','t_type_event','type_event','Nom','T',NULL),('T_TYPE_EXPERTISE','Type expertise','t_type_expertise','type_expertise','Nom','T',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

LOCK TABLES `utilisateur` WRITE;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (1,7,'ADMIN','admin','0000','admin','c4ca4238a0b923820dcc509a6f75849b',NULL,'2024-01-20',1,'za','za');
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Temporary view structure for view `vw_t_accueil`
--

DROP TABLE IF EXISTS `vw_t_accueil`;
/*!50001 DROP VIEW IF EXISTS `vw_t_accueil`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_t_accueil` AS SELECT 
 1 AS `left_contenu`,
 1 AS `id_accueil`,
 1 AS `contenu`,
 1 AS `id_info_societe`,
 1 AS `deleted`,
 1 AS `updated`,
 1 AS `user_code_upd`,
 1 AS `detail_societe`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_t_apporteur`
--

DROP TABLE IF EXISTS `vw_t_apporteur`;
/*!50001 DROP VIEW IF EXISTS `vw_t_apporteur`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_t_apporteur` AS SELECT 
 1 AS `id_apporteur_affaire`,
 1 AS `id_type_apporteur`,
 1 AS `nom_apporteur`,
 1 AS `activite_apporteur`,
 1 AS `expertise_apporteur`,
 1 AS `logo_apporteur`,
 1 AS `mail_apporteur`,
 1 AS `tel_apporteur`,
 1 AS `deleted`,
 1 AS `updated`,
 1 AS `user_code_upd`,
 1 AS `detail_type`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_t_cv_consultant`
--

DROP TABLE IF EXISTS `vw_t_cv_consultant`;
/*!50001 DROP VIEW IF EXISTS `vw_t_cv_consultant`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_t_cv_consultant` AS SELECT 
 1 AS `id_consultant`,
 1 AS `id_langue`,
 1 AS `login_compte`,
 1 AS `password_compte`,
 1 AS `nom_consultant`,
 1 AS `prenom_consultant`,
 1 AS `photo_consultant`,
 1 AS `date_naissance`,
 1 AS `tel_consultant`,
 1 AS `mail_consultant`,
 1 AS `linkedin_consultant`,
 1 AS `competence_consultant`,
 1 AS `deleted`,
 1 AS `updated`,
 1 AS `user_code_upd`,
 1 AS `langue`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_t_event`
--

DROP TABLE IF EXISTS `vw_t_event`;
/*!50001 DROP VIEW IF EXISTS `vw_t_event`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_t_event` AS SELECT 
 1 AS `id_event`,
 1 AS `contenu`,
 1 AS `left_contenu`,
 1 AS `id_type_event`,
 1 AS `date_event`,
 1 AS `deleted`,
 1 AS `updated`,
 1 AS `user_code_upd`,
 1 AS `type_event`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `vw_t_expertise`
--

DROP TABLE IF EXISTS `vw_t_expertise`;
/*!50001 DROP VIEW IF EXISTS `vw_t_expertise`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vw_t_expertise` AS SELECT 
 1 AS `id_expertise`,
 1 AS `contenu`,
 1 AS `type_expertise`,
 1 AS `left_contenu`,
 1 AS `id_type_expertise`,
 1 AS `deleted`,
 1 AS `updated`,
 1 AS `user_code_upd`,
 1 AS `t`*/;
SET character_set_client = @saved_cs_client;

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

--
-- Final view structure for view `vw_t_accueil`
--

/*!50001 DROP VIEW IF EXISTS `vw_t_accueil`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_t_accueil` AS select left(`a`.`contenu`,50) AS `left_contenu`,`a`.`id_accueil` AS `id_accueil`,`a`.`contenu` AS `contenu`,`a`.`id_info_societe` AS `id_info_societe`,`a`.`deleted` AS `deleted`,`a`.`updated` AS `updated`,`a`.`user_code_upd` AS `user_code_upd`,`t_societe`.`detail_societe` AS `detail_societe` from (`t_accueil` `a` join `t_societe` on((`a`.`id_info_societe` = `t_societe`.`id_info_societe`))) where ((`a`.`deleted` is null) or (`a`.`deleted` = 0)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_t_apporteur`
--

/*!50001 DROP VIEW IF EXISTS `vw_t_apporteur`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_t_apporteur` AS select `a`.`id_apporteur_affaire` AS `id_apporteur_affaire`,`a`.`id_type_apporteur` AS `id_type_apporteur`,`a`.`nom_apporteur` AS `nom_apporteur`,`a`.`activite_apporteur` AS `activite_apporteur`,`a`.`expertise_apporteur` AS `expertise_apporteur`,`a`.`logo_apporteur` AS `logo_apporteur`,`a`.`mail_apporteur` AS `mail_apporteur`,`a`.`tel_apporteur` AS `tel_apporteur`,`a`.`deleted` AS `deleted`,`a`.`updated` AS `updated`,`a`.`user_code_upd` AS `user_code_upd`,`t`.`detail_type` AS `detail_type` from (`t_apporteur` `a` join `t_type_apporteur` `t` on((`a`.`id_type_apporteur` = `t`.`id_type_apporteur`))) where ((`a`.`deleted` is null) or (`a`.`deleted` = 0)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_t_cv_consultant`
--

/*!50001 DROP VIEW IF EXISTS `vw_t_cv_consultant`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_t_cv_consultant` AS select `c`.`id_consultant` AS `id_consultant`,`c`.`id_langue` AS `id_langue`,`c`.`login_compte` AS `login_compte`,`c`.`password_compte` AS `password_compte`,`c`.`nom_consultant` AS `nom_consultant`,`c`.`prenom_consultant` AS `prenom_consultant`,`c`.`photo_consultant` AS `photo_consultant`,`c`.`date_naissance` AS `date_naissance`,`c`.`tel_consultant` AS `tel_consultant`,`c`.`mail_consultant` AS `mail_consultant`,`c`.`linkedin_consultant` AS `linkedin_consultant`,`c`.`competence_consultant` AS `competence_consultant`,`c`.`deleted` AS `deleted`,`c`.`updated` AS `updated`,`c`.`user_code_upd` AS `user_code_upd`,`l`.`langue` AS `langue` from (`t_cv_consultant` `c` join `t_langue` `l` on((`c`.`id_langue` = `l`.`id_langue`))) where ((`c`.`deleted` is null) or (`c`.`deleted` = 0)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_t_event`
--

/*!50001 DROP VIEW IF EXISTS `vw_t_event`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_t_event` AS select `e`.`id_event` AS `id_event`,`e`.`contenu` AS `contenu`,left(`e`.`contenu`,50) AS `left_contenu`,`e`.`id_type_event` AS `id_type_event`,`e`.`date_event` AS `date_event`,`e`.`deleted` AS `deleted`,`e`.`updated` AS `updated`,`e`.`user_code_upd` AS `user_code_upd`,`t`.`type_event` AS `type_event` from (`t_event` `e` join `t_type_event` `t` on((`e`.`id_type_event` = `t`.`id_type_event`))) where ((`e`.`deleted` is null) or (`e`.`deleted` = 0)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_t_expertise`
--

/*!50001 DROP VIEW IF EXISTS `vw_t_expertise`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_t_expertise` AS select `e`.`id_expertise` AS `id_expertise`,`e`.`contenu` AS `contenu`,`t`.`type_expertise` AS `type_expertise`,left(`e`.`contenu`,50) AS `left_contenu`,`e`.`id_type_expertise` AS `id_type_expertise`,`e`.`deleted` AS `deleted`,`e`.`updated` AS `updated`,`e`.`user_code_upd` AS `user_code_upd`,`t`.`type_expertise` AS `t` from (`t_expertise` `e` join `t_type_expertise` `t` on((`e`.`id_type_expertise` = `t`.`id_type_expertise`))) where ((`e`.`deleted` is null) or (`e`.`deleted` = 0)) */;
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

-- Dump completed on 2024-01-27  9:56:17
