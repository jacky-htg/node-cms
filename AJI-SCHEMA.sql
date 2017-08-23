-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: aji
-- ------------------------------------------------------
-- Server version	5.7.18

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
-- Table structure for table `m_log`
--

DROP TABLE IF EXISTS `m_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `iduser` int(11) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `date` datetime NOT NULL,
  `page_url` varchar(200) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `m_menu`
--

DROP TABLE IF EXISTS `m_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_menu` (
  `idmenu` int(11) NOT NULL AUTO_INCREMENT,
  `idparent` int(11) DEFAULT NULL,
  `nama_menu` varchar(50) DEFAULT NULL,
  `url_menu` varchar(200) DEFAULT NULL,
  `flagstate` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `class` varchar(50) DEFAULT NULL,
  `icon` text,
  PRIMARY KEY (`idmenu`),
  KEY `idmenu` (`idmenu`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `m_users`
--

DROP TABLE IF EXISTS `m_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_users` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `levelid` int(11) DEFAULT NULL,
  `id_country` int(11) DEFAULT NULL,
  `id_province` int(11) DEFAULT NULL,
  `id_district` int(11) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` text,
  `pos_code` int(11) DEFAULT NULL,
  `phone` int(20) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `hash_` varchar(255) DEFAULT NULL,
  `lastlogin` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastlogout` timestamp NULL DEFAULT NULL,
  `lastip` varchar(50) DEFAULT NULL,
  `lastip_logout` varchar(50) DEFAULT NULL,
  `flagstate` int(11) DEFAULT NULL,
  `date_create` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updateby` int(11) DEFAULT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `id_area` int(11) DEFAULT NULL,
  `id_division` int(11) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `ktp` varchar(100) DEFAULT NULL,
  `id_darah` int(11) DEFAULT NULL,
  `id_sim_satu` int(11) DEFAULT NULL,
  `sim_satu_nomor` varchar(50) DEFAULT NULL,
  `id_sim_dua` int(11) DEFAULT NULL,
  `sim_dua_nomor` varchar(50) DEFAULT NULL,
  `id_agama` int(11) DEFAULT NULL,
  `handphone` int(50) DEFAULT NULL,
  `id_kawin` int(11) DEFAULT NULL,
  `id_status_karyawan` int(11) DEFAULT NULL,
  `date_join` date DEFAULT NULL,
  `date_join_end` date DEFAULT NULL,
  `jamsostek` varchar(50) DEFAULT NULL,
  `npwp` varchar(50) DEFAULT NULL,
  `id_bank` int(11) DEFAULT NULL,
  `bank_rekening` varchar(50) DEFAULT NULL,
  `referensi` varchar(200) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_absen` varchar(200) DEFAULT NULL,
  `resign` int(11) DEFAULT NULL,
  `resign_date` date DEFAULT NULL,
  `absen_config` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`iduser`),
  KEY `iduser` (`iduser`,`levelid`),
  KEY `id_country` (`id_country`),
  KEY `id_province` (`id_province`),
  KEY `id_district` (`id_district`),
  CONSTRAINT `id_country` FOREIGN KEY (`id_country`) REFERENCES `t_country` (`id_country`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `id_district` FOREIGN KEY (`id_district`) REFERENCES `t_district` (`id_district`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `id_province` FOREIGN KEY (`id_province`) REFERENCES `t_province` (`id_province`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `s_menulevel`
--

DROP TABLE IF EXISTS `s_menulevel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_menulevel` (
  `menuid` int(11) NOT NULL,
  `levelid` int(11) NOT NULL,
  KEY `menuid` (`menuid`,`levelid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `s_menuuser`
--

DROP TABLE IF EXISTS `s_menuuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_menuuser` (
  `menuid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  KEY `menuid` (`menuid`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `s_userlevel`
--

DROP TABLE IF EXISTS `s_userlevel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `s_userlevel` (
  `levelid` int(11) NOT NULL AUTO_INCREMENT,
  `namelevel` varchar(200) NOT NULL,
  PRIMARY KEY (`levelid`),
  KEY `levelid` (`levelid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_country`
--

DROP TABLE IF EXISTS `t_country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_country` (
  `id_country` int(11) NOT NULL AUTO_INCREMENT,
  `iso_2` varchar(2) DEFAULT NULL,
  `iso_3` varchar(3) DEFAULT NULL,
  `currency_code` varchar(3) DEFAULT NULL,
  `country_name` varchar(50) DEFAULT NULL,
  `status_country` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_country`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_district`
--

DROP TABLE IF EXISTS `t_district`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_district` (
  `id_district` int(11) NOT NULL AUTO_INCREMENT,
  `id_province` int(11) DEFAULT NULL,
  `district_name` varchar(50) DEFAULT NULL,
  `status_district` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_district`),
  KEY `fk_t_district_t_province1_idx` (`id_province`),
  CONSTRAINT `fk_t_district_t_province1` FOREIGN KEY (`id_province`) REFERENCES `t_province` (`id_province`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=467 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `t_province`
--

DROP TABLE IF EXISTS `t_province`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_province` (
  `id_province` int(11) NOT NULL AUTO_INCREMENT,
  `id_country` int(11) DEFAULT NULL,
  `province_name` varchar(50) DEFAULT NULL,
  `status_province` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_province`),
  KEY `fk_t_province_t_country1_idx` (`id_country`),
  CONSTRAINT `fk_t_province_t_country1` FOREIGN KEY (`id_country`) REFERENCES `t_country` (`id_country`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-23  1:21:51
