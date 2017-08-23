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
-- Dumping data for table `m_log`
--

LOCK TABLES `m_log` WRITE;
/*!40000 ALTER TABLE `m_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `m_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `m_menu`
--

LOCK TABLES `m_menu` WRITE;
/*!40000 ALTER TABLE `m_menu` DISABLE KEYS */;
INSERT INTO `m_menu` VALUES (1,0,'Overview','dashboard',1,1,'',''),(2,0,'System Admin','',1,1,'class=\"sub-menu\"',''),(4,2,'Manage User','user',1,1,NULL,NULL);
/*!40000 ALTER TABLE `m_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `m_users`
--

LOCK TABLES `m_users` WRITE;
/*!40000 ALTER TABLE `m_users` DISABLE KEYS */;
INSERT INTO `m_users` VALUES (1,1,1,9,84,'admin','administrator','oke','kresida.w@gmail.com','di depok',16435,2147483647,NULL,'c84258e9c39059a89ab77d846ddab909','$2y$10$g1pPG9Nu/PtOdRMW0Zk50e2YSe4ngUcv2Y3GFfF9jpXjLPtsL7oWK','2017-08-17 23:52:36','2015-07-07 07:18:09','192.168.33.1','192.168.33.1',1,'0000-00-00 00:00:00','2014-12-29 10:17:46',1,'10019',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'1108',NULL,NULL,'SS'),(2,1,1,15,201,'','Oaathm a n ','','kresida2014@gmail.com','Hossssssssssss',222233111,2147483647,NULL,'97265ae89ab509a0e969a024b73f8e1e','$2y$10$90tIi.XltGTPRXW//fPYvueoyXiTeaXfJX7W26.tnTTbmwnBtGpQa','2015-12-15 18:47:42',NULL,NULL,NULL,1,'2016-02-26 23:48:32','0000-00-00 00:00:00',NULL,'1001',1,1,0,'laki-laki','7777777777777',2,3,'11233333',1,'12222222',4,2147483647,2,1,'2015-12-01','2017-01-01','22222111111','555555555555',1,'4444442222222','','cdn/images/user/2016/02/21/14560727772089265426.png','1986-01-20','7006',NULL,'2016-01-01','SF'),(3,1,1,NULL,NULL,NULL,NULL,NULL,'test@mailedit.com',NULL,NULL,NULL,NULL,'63ee451939ed580ef3c4b6f0109d1fd0','$2y$10$CesjqZ6kaGcyIppPm8/lOOkJF3XGgABWPIEjGtF.vF//JpAxO7mFi','2017-08-17 16:39:23',NULL,NULL,NULL,1,'2017-08-17 23:40:48','0000-00-00 00:00:00',NULL,'123',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `m_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `s_menulevel`
--

LOCK TABLES `s_menulevel` WRITE;
/*!40000 ALTER TABLE `s_menulevel` DISABLE KEYS */;
INSERT INTO `s_menulevel` VALUES (1,1);
/*!40000 ALTER TABLE `s_menulevel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `s_menuuser`
--

LOCK TABLES `s_menuuser` WRITE;
/*!40000 ALTER TABLE `s_menuuser` DISABLE KEYS */;
INSERT INTO `s_menuuser` VALUES (0,0),(1,1),(2,1),(4,1);
/*!40000 ALTER TABLE `s_menuuser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `s_userlevel`
--

LOCK TABLES `s_userlevel` WRITE;
/*!40000 ALTER TABLE `s_userlevel` DISABLE KEYS */;
INSERT INTO `s_userlevel` VALUES (1,'admin'),(2,'support_admin'),(3,'support_operational'),(4,'user');
/*!40000 ALTER TABLE `s_userlevel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `t_country`
--

LOCK TABLES `t_country` WRITE;
/*!40000 ALTER TABLE `t_country` DISABLE KEYS */;
INSERT INTO `t_country` VALUES (1,NULL,NULL,'IDR','Indonesia',1);
/*!40000 ALTER TABLE `t_country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `t_district`
--

LOCK TABLES `t_district` WRITE;
/*!40000 ALTER TABLE `t_district` DISABLE KEYS */;
INSERT INTO `t_district` VALUES (1,1,'Kab. Badung',1),(2,1,'Kab. Bangli',1),(3,1,'Kab. Buleleng',1),(4,1,'Kab. Gianyar',1),(5,1,'Kab. Jembrana',1),(6,1,'Kab. Karangasem',1),(7,1,'Kab. Klungkung',1),(8,1,'Kab. Tabanan',1),(9,1,'Kota Denpasar',1),(10,2,'Kab. Bangka',1),(11,2,'Kab. Bangka Barat',1),(12,2,'Kab. Bangka Selatan',1),(13,2,'Kab. Bangka Tengah',1),(14,2,'Kab. Belitung',1),(15,2,'Kab. Belitung Timur',1),(16,2,'Kota Pangkal Pinang',1),(17,3,'Kab. Lebak',1),(18,3,'Kab. Pandeglang',1),(19,3,'Kab. Serang',1),(20,3,'Kab. Tangerang',1),(21,3,'Kota Cilegon',1),(22,3,'Kota Serang',1),(23,3,'Kota Tangerang',1),(24,4,'Kab. Bengkulu Selatan',1),(25,4,'Kab. Bengkulu Utara',1),(26,4,'Kab. Kaur',1),(27,4,'Kab. Kepahiang',1),(28,4,'Kab. Lebong',1),(29,4,'Kab. Muko-muko',1),(30,4,'Kab. Rejang Lebong',1),(31,4,'Kab. Seluma',1),(32,4,'Kota Bengkulu',1),(33,5,'Kab. Bantul',1),(34,5,'Kab. Gunung Kidul',1),(35,5,'Kab. Kulon Progo',1),(36,5,'Kab. Sleman',1),(37,5,'Kota Yogyakarta',1),(38,6,'Dki Jakarta',1),(39,6,'Kota Administrasi Jakarta Barat',1),(40,6,'Kota Administrasi Jakarta Pusat',1),(41,6,'Kota Administrasi Jakarta Selatan',1),(42,6,'Kota Administrasi Jakarta Timur',1),(43,6,'Kota Administrasi Jakarta Utara',1),(44,6,'Kota Administrasi Kepulauan Seribu',1),(45,7,'Kab. Boalemo',1),(46,7,'Kab. Gorontalo',1),(47,7,'Kab. Gorontalo Utara',1),(48,7,'Kab. Pahuwalo',1),(49,7,'Kota Bone Bolango',1),(50,7,'Kota Gorontalo',1),(51,8,'Kab. Batang Hari',1),(52,8,'Kab. Bungo',1),(53,8,'Kab. Kerinci',1),(54,8,'Kab. Merangin',1),(55,8,'Kab. Muaro Jambi',1),(56,8,'Kab. Sarolangun',1),(57,8,'Kab. Tanjung Jabung Barat',1),(58,8,'Kab. Tanjung Jabung Timur',1),(59,8,'Kab. Tebo',1),(60,8,'Kota Jambi',1),(61,9,'Kab. Bandung',1),(62,9,'Kab. Bandung Barat',1),(63,9,'Kab. Bekasi',1),(64,9,'Kab. Bogor',1),(65,9,'Kab. Ciamis',1),(66,9,'Kab. Cianjur',1),(67,9,'Kab. Cirebon',1),(68,9,'Kab. Garut',1),(69,9,'Kab. Indramayu',1),(70,9,'Kab. Karawang',1),(71,9,'Kab. Kuningan',1),(72,9,'Kab. Majalengka',1),(73,9,'Kab. Purwakarta',1),(74,9,'Kab. Subang',1),(75,9,'Kab. Sukabumi',1),(76,9,'Kab. Sumedang',1),(77,9,'Kab. Tasikmalaya',1),(78,9,'Kota Bandung',1),(79,9,'Kota Banjar',1),(80,9,'Kota Bekasi',1),(81,9,'Kota Bogor',1),(82,9,'Kota Cimahi',1),(83,9,'Kota Cirebon',1),(84,9,'Kota Depok',1),(85,9,'Kota Sukabumi',1),(86,9,'Kota Tasikmalaya',1),(87,10,'Kab. Banjarnegara',1),(88,10,'Kab. Banyumas',1),(89,10,'Kab. Batang',1),(90,10,'Kab. Blora',1),(91,10,'Kab. Bojonegoro',1),(92,10,'Kab. Boyolali',1),(93,10,'Kab. Brebes',1),(94,10,'Kab. Cilacap',1),(95,10,'Kab. Demak',1),(96,10,'Kab. Grobogan',1),(97,10,'Kab. Jepara',1),(98,10,'Kab. Karang Anyar',1),(99,10,'Kab. Kebumen',1),(100,10,'Kab. Kendal',1),(101,10,'Kab. Klaten',1),(102,10,'Kab. Kudus',1),(103,10,'Kab. Magelang',1),(104,10,'Kab. Pati',1),(105,10,'Kab. Pekalongan',1),(106,10,'Kab. Pemalang',1),(107,10,'Kab. Purbalingga',1),(108,10,'Kab. Purworejo',1),(109,10,'Kab. Rembang',1),(110,10,'Kab. Semarang',1),(111,10,'Kab. Sragen',1),(112,10,'Kab. Sukoharjo',1),(113,10,'Kab. Tegal',1),(114,10,'Kab. Temanggung',1),(115,10,'Kab. Wonogiri',1),(116,10,'Kab. Wonosobo',1),(117,10,'Kota Magelang',1),(118,10,'Kota Pekalongan',1),(119,10,'Kota Salatiga',1),(120,10,'Kota Semarang',1),(121,10,'Kota Surakarta',1),(122,10,'Kota Tegal',1),(123,11,'Kab. Bangkalan',1),(124,11,'Kab. Banyuwangi',1),(125,11,'Kab. Blitar',1),(126,11,'Kab. Bondowoso',1),(127,11,'Kab. Gresik',1),(128,11,'Kab. Jember',1),(129,11,'Kab. Jombang',1),(130,11,'Kab. Kediri',1),(131,11,'Kab. Lamongan',1),(132,11,'Kab. Lumajang',1),(133,11,'Kab. Madiun',1),(134,11,'Kab. Magetan',1),(135,11,'Kab. Malang',1),(136,11,'Kab. Mojokerto',1),(137,11,'Kab. Nganjuk',1),(138,11,'Kab. Ngawi',1),(139,11,'Kab. Pacitan',1),(140,11,'Kab. Pamekasan',1),(141,11,'Kab. Pasuruan',1),(142,11,'Kab. Ponorogo',1),(143,11,'Kab. Probolinggo',1),(144,11,'Kab. Sampang',1),(145,11,'Kab. Sidoarjo',1),(146,11,'Kab. Situbondo',1),(147,11,'Kab. Sumenep',1),(148,11,'Kab. Trenggalek',1),(149,11,'Kab. Tuban',1),(150,11,'Kab. Tulungagung',1),(151,11,'Kota Batu',1),(152,11,'Kota Blitar',1),(153,11,'Kota Kediri',1),(154,11,'Kota Madiun',1),(155,11,'Kota Malang',1),(156,11,'Kota Mojokerto',1),(157,11,'Kota Pasuruan',1),(158,11,'Kota Probolinggo',1),(159,11,'Kota Surabaya',1),(160,12,'Kab. Bengkayang',1),(161,12,'Kab. Kapuas Hulu',1),(162,12,'Kab. Kayong Utara',1),(163,12,'Kab. Ketapang',1),(164,12,'Kab. Kubu Raya',1),(165,12,'Kab. Landak',1),(166,12,'Kab. Melawi',1),(167,12,'Kab. Pontianak',1),(168,12,'Kab. Sambas',1),(169,12,'Kab. Sanggau',1),(170,12,'Kab. Sekadau',1),(171,12,'Kab. Sintang',1),(172,12,'Kota Pontianak',1),(173,12,'Kota Singkawang',1),(174,13,'Kab. Balangan',1),(175,13,'Kab. Banjar',1),(176,13,'Kab. Barito Kuala',1),(177,13,'Kab. Barito Selatan',1),(178,13,'Kab. Barito Timur',1),(179,13,'Kab. Barito Utara',1),(180,13,'Kab. Hulu Sungai Selatan',1),(181,13,'Kab. Hulu Sungai Tengah',1),(182,13,'Kab. Hulu Sungai Utara',1),(183,13,'Kab. Kota Baru',1),(184,13,'Kab. Murung Raya',1),(185,13,'Kab. Tabalong',1),(186,13,'Kab. Tampin',1),(187,13,'Kab. Tanah Bambu',1),(188,13,'Kab. Tanah Laut',1),(189,13,'Kota Banjarbaru',1),(190,13,'Kota Banjarmasin',1),(191,14,'Kab. Gunung Mas',1),(192,14,'Kab. Kapuas',1),(193,14,'Kab. Katingan',1),(194,14,'Kab. Kotawaringin Barat',1),(195,14,'Kab. Kotawaringin Timur',1),(196,14,'Kab. Lamandau',1),(197,14,'Kab. Pulang Pisau',1),(198,14,'Kab. Seruyan',1),(199,14,'Kab. Sukamara',1),(200,14,'Kota Palangkaraya',1),(201,15,'Kab. Berau',1),(202,15,'Kab. Bulungan',1),(203,15,'Kab. Kutai Barat',1),(204,15,'Kab. Kutai Kartanegara',1),(205,15,'Kab. Kutai Timur',1),(206,15,'Kab. Malinau',1),(207,15,'Kab. Nunukan',1),(208,15,'Kab. Panajam Paser Utara',1),(209,15,'Kab. Paser',1),(210,15,'Kab. Tana Tidung',1),(211,15,'Kota Balikpapan',1),(212,15,'Kota Bontang',1),(213,15,'Kota Samarinda',1),(214,15,'Kota Tarakan',1),(215,16,'Kab. Bintan',1),(216,16,'Kab. Karimun',1),(217,16,'Kab. Lingga',1),(218,16,'Kab. Natuna',1),(219,16,'Kota Batam',1),(220,16,'Kota Tanjung Pinang',1),(221,17,'Kab. Lampung Barat',1),(222,17,'Kab. Lampung Selatan',1),(223,17,'Kab. Lampung Tengah',1),(224,17,'Kab. Lampung Timur',1),(225,17,'Kab. Lampung Utara',1),(226,17,'Kab. Pesawaran',1),(227,17,'Kab. Tanggamus',1),(228,17,'Kab. Tulang Bawang',1),(229,17,'Kab. Way Kanan',1),(230,17,'Kota Bandar Lampung',1),(231,17,'Kota Metro',1),(232,18,'Kab. Buru',1),(233,18,'Kab. Kepulauan Aru',1),(234,18,'Kab. Maluku Tengah',1),(235,18,'Kab. Maluku Tenggara',1),(236,18,'Kab. Maluku Tenggara Barat',1),(237,18,'Kab. Seram Bagian Barat',1),(238,18,'Kab. Seram Bagian Timur',1),(239,18,'Kota Ambon',1),(240,19,'Kab. Halmahera Barat',1),(241,19,'Kab. Halmahera Selatan',1),(242,19,'Kab. Halmahera Tengah',1),(243,19,'Kab. Halmahera Timur',1),(244,19,'Kab. Halmahera Utara',1),(245,19,'Kab. Kepulauan Sula',1),(246,19,'Kota Ternate',1),(247,19,'Kota Tidore',1),(248,20,'Kab. Aceh Barat',1),(249,20,'Kab. Aceh Barat Daya',1),(250,20,'Kab. Aceh Besar',1),(251,20,'Kab. Aceh Jaya',1),(252,20,'Kab. Aceh Selatan',1),(253,20,'Kab. Aceh Singkil',1),(254,20,'Kab. Aceh Tamiang',1),(255,20,'Kab. Aceh Tengah',1),(256,20,'Kab. Aceh Tenggara',1),(257,20,'Kab. Aceh Timur',1),(258,20,'Kab. Aceh Utara',1),(259,20,'Kab. Bener Meriah',1),(260,20,'Kab. Bireuen',1),(261,20,'Kab. Gayo Lues',1),(262,20,'Kab. Nagan Raya',1),(263,20,'Kab. Pidie',1),(264,20,'Kab. Pidie Jaya',1),(265,20,'Kab. Simeuleu',1),(266,20,'Kota Banda Aceh',1),(267,20,'Kota Langsa',1),(268,20,'Kota Lhokseumawe',1),(269,20,'Kota Sabang',1),(270,20,'Kota Subulussalam',1),(271,21,'Kab. Bima',1),(272,21,'Kab. Dompu',1),(273,21,'Kab. Lombok Barat',1),(274,21,'Kab. Lombok Tengah',1),(275,21,'Kab. Lombok Timur',1),(276,21,'Kab. Sumbawa',1),(277,21,'Kab. Sumbawa Barat',1),(278,21,'Kota Bima',1),(279,21,'Kota Mataram',1),(280,22,'Kab. Alor',1),(281,22,'Kab. Belu',1),(282,22,'Kab. Ende',1),(283,22,'Kab. Flores Timur',1),(284,22,'Kab. Kupang',1),(285,22,'Kab. Lembata',1),(286,22,'Kab. Manggarai',1),(287,22,'Kab. Manggarai Barat',1),(288,22,'Kab. Manggarai Timur',1),(289,22,'Kab. Nagekeo',1),(290,22,'Kab. Ngada',1),(291,22,'Kab. Rote Ndao',1),(292,22,'Kab. Sikka',1),(293,22,'Kab. Sumba Barat',1),(294,22,'Kab. Sumba Barat Daya',1),(295,22,'Kab. Sumba Tengah',1),(296,22,'Kab. Sumba Timur',1),(297,22,'Kab. Timor Tengah Selatan',1),(298,22,'Kab. Timor Tengah Utara',1),(299,22,'Kota Kupang',1),(300,23,'Kab. Asmat',1),(301,23,'Kab. Biak Numfor',1),(302,23,'Kab. Boven Digoel',1),(303,23,'Kab. Deiyai',1),(304,23,'Kab. Dogiyai',1),(305,23,'Kab. Fak-fak',1),(306,23,'Kab. Intan Jaya',1),(307,23,'Kab. Jayapura',1),(308,23,'Kab. Jayawijaya',1),(309,23,'Kab. Kaimana',1),(310,23,'Kab. Keerom',1),(311,23,'Kab. Mamberamo Raya',1),(312,23,'Kab. Manokwari',1),(313,23,'Kab. Mappi',1),(314,23,'Kab. Merauke',1),(315,23,'Kab. Mimika',1),(316,23,'Kab. Nabire',1),(317,23,'Kab. Paniai',1),(318,23,'Kab. Pegunungan Bintang',1),(319,23,'Kab. Puncak Jaya',1),(320,23,'Kab. Raja Ampat',1),(321,23,'Kab. Sarmi',1),(322,23,'Kab. Sorong',1),(323,23,'Kab. Sorong Selatan',1),(324,23,'Kab. Supiori',1),(325,23,'Kab. Talikora',1),(326,23,'Kab. Teluk Bintuni',1),(327,23,'Kab. Teluk Wondama',1),(328,23,'Kab. Waropen',1),(329,23,'Kab. Yahukimo',1),(330,23,'Kab. Yapen Waropen',1),(331,23,'Kota Jayapura',1),(332,23,'Kota Sorong',1),(333,24,'Kab. Bengkalis',1),(334,24,'Kab. Indragiri Hilir',1),(335,24,'Kab. Indragiri Hulu',1),(336,24,'Kab. Kampar',1),(337,24,'Kab. Kuantan Sengingi',1),(338,24,'Kab. Meranti',1),(339,24,'Kab. Palalawan',1),(340,24,'Kab. Rokan Hilir',1),(341,24,'Kab. Rokan Hulu',1),(342,24,'Kab. Siak',1),(343,24,'Kota Dumai',1),(344,24,'Kota Pekanbaru',1),(345,25,'Kab. Bantaeng',1),(346,25,'Kab. Barru',1),(347,25,'Kab. Bone',1),(348,25,'Kab. Bulukumba',1),(349,25,'Kab. Enrekang',1),(350,25,'Kab. Goa',1),(351,25,'Kab. Jeneponto',1),(352,25,'Kab. Luwu Timur',1),(353,25,'Kab. Luwu Utara',1),(354,25,'Kab. Majene',1),(355,25,'Kab. Mamasa',1),(356,25,'Kab. Mamuju',1),(357,25,'Kab. Mamuju Utara',1),(358,25,'Kab. Maros',1),(359,25,'Kab. Pangkajene Kepulauan',1),(360,25,'Kab. Pinrang',1),(361,25,'Kab. Polewali Mandar',1),(362,25,'Kab. Selayar',1),(363,25,'Kab. Sindenreng Rappang',1),(364,25,'Kab. Sinjai',1),(365,25,'Kab. Soppeng',1),(366,25,'Kab. Takalar',1),(367,25,'Kab. Tana Toraja',1),(368,25,'Kab. Tana Toraja Utara',1),(369,25,'Kab. Wajo',1),(370,25,'Kota Makassar',1),(371,25,'Kota Palopo',1),(372,25,'Kota Pare-pare',1),(373,26,'Kab. Banggai',1),(374,26,'Kab. Banggai Kepulauan',1),(375,26,'Kab. Buol',1),(376,26,'Kab. Donggala',1),(377,26,'Kab. Morowali',1),(378,26,'Kab. Parigi Moutong',1),(379,26,'Kab. Poso',1),(380,26,'Kab. Tojo Una-una',1),(381,26,'Kab. Toli-toli',1),(382,26,'Kota Palu',1),(383,27,'Kab. Bombana',1),(384,27,'Kab. Buton & Buton Utara',1),(385,27,'Kab. Kolaka',1),(386,27,'Kab. Kolaka Utara',1),(387,27,'Kab. Konawe',1),(388,27,'Kab. Konawe Utara/ Selatan',1),(389,27,'Kab. Kota Bau-bau',1),(390,27,'Kab. Muna',1),(391,27,'Kab. Wakatobi',1),(392,27,'Kota Kendari',1),(393,28,'Kab. Bolaang Mongondow',1),(394,28,'Kab. Bolaang Mongondow Utara',1),(395,28,'Kab. Kepulauan Sangihe',1),(396,28,'Kab. Kepulauan Talaud',1),(397,28,'Kab. Minahasa',1),(398,28,'Kab. Minahasa Selatan',1),(399,28,'Kab. Minahasa Tenggara',1),(400,28,'Kab. Minahasa Utara',1),(401,28,'Kota Bitung',1),(402,28,'Kota Manado',1),(403,28,'Kota Tomohon',1),(404,29,'Kab. Agam',1),(405,29,'Kab. Dharmasraya',1),(406,29,'Kab. Kepulauan Mentawai',1),(407,29,'Kab. Lima Puluh Kota',1),(408,29,'Kab. Padang Pariaman',1),(409,29,'Kab. Pasaman',1),(410,29,'Kab. Pasaman Barat',1),(411,29,'Kab. Pesisir Selatan',1),(412,29,'Kab. Sijunjung',1),(413,29,'Kab. Solok',1),(414,29,'Kab. Solok Selatan',1),(415,29,'Kab. Tanah Datar',1),(416,29,'Kota Bukit Tinggi',1),(417,29,'Kota Padang',1),(418,29,'Kota Padang Panjang',1),(419,29,'Kota Pariaman',1),(420,29,'Kota Payakumbuh',1),(421,29,'Kota Sawahlunto',1),(422,29,'Kota Solok',1),(423,30,'Kab. Banyuasin',1),(424,30,'Kab. Empat Lawang',1),(425,30,'Kab. Lahat',1),(426,30,'Kab. Muara Enim',1),(427,30,'Kab. Musi Banyuasin',1),(428,30,'Kab. Musi Rawas',1),(429,30,'Kab. Ogan Ilir',1),(430,30,'Kab. Ogan Komering Ilir',1),(431,30,'Kab. Ogan Komering Ulu',1),(432,30,'Kab. Ogan Komering Ulu Selatan',1),(433,30,'Kab. Ogan Komering Ulu Timur',1),(434,30,'Kota Lubuk Linggau',1),(435,30,'Kota Pagar Alam',1),(436,30,'Kota Palembang',1),(437,30,'Kota Prabumulih',1),(438,31,'Kab. Asahan',1),(439,31,'Kab. Batubara',1),(440,31,'Kab. Dairi',1),(441,31,'Kab. Deli Serdang',1),(442,31,'Kab. Humbang Hasudutan',1),(443,31,'Kab. Karo',1),(444,31,'Kab. Labuhan Batu',1),(445,31,'Kab. Langkat',1),(446,31,'Kab. Mandailing Natal',1),(447,31,'Kab. Nias',1),(448,31,'Kab. Nias Selatan',1),(449,31,'Kab. Padang Lawas',1),(450,31,'Kab. Padang Lawas Utara',1),(451,31,'Kab. Pakpak Barat',1),(452,31,'Kab. Samosir',1),(453,31,'Kab. Serdang Bedagai',1),(454,31,'Kab. Simalungun',1),(455,31,'Kab. Tapanuli Selatan',1),(456,31,'Kab. Tapanuli Tengah',1),(457,31,'Kab. Tapanuli Utara',1),(458,31,'Kab. Tebing Tinggi',1),(459,31,'Kab. Toba Samosir',1),(460,31,'Kota Binjai',1),(461,31,'Kota Medan',1),(462,31,'Kota Padang Sidempuan',1),(463,31,'Kota Pematangsiantar',1),(464,31,'Kota Sibolga',1),(465,31,'Kota Tanjung Balai',1),(466,31,'Kota Tebing Tinggi',1);
/*!40000 ALTER TABLE `t_district` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `t_province`
--

LOCK TABLES `t_province` WRITE;
/*!40000 ALTER TABLE `t_province` DISABLE KEYS */;
INSERT INTO `t_province` VALUES (1,1,'Bali',1),(2,1,'Bangka Belitung',1),(3,1,'Banten',1),(4,1,'Bengkulu',1),(5,1,'D.I. Yogyakarta',1),(6,1,'DKI Jakarta',1),(7,1,'Gorontalo',1),(8,1,'Jambi',1),(9,1,'Jawa Barat',1),(10,1,'Jawa Tengah',1),(11,1,'Jawa Timur',1),(12,1,'Kalimantan Barat',1),(13,1,'Kalimantan Selatan',1),(14,1,'Kalimantan Tengah',1),(15,1,'Kalimantan Timur',1),(16,1,'Kepulauan Riau',1),(17,1,'Lampung',1),(18,1,'Maluku',1),(19,1,'Maluku Utara',1),(20,1,'Nangroe Aceh Darussalam',1),(21,1,'Nusa Tenggara Barat',1),(22,1,'Nusa Tenggara Timur',1),(23,1,'Papua',1),(24,1,'Riau',1),(25,1,'Sulawesi Selatan',1),(26,1,'Sulawesi Tengah',1),(27,1,'Sulawesi Tenggara',1),(28,1,'Sulawesi Utara',1),(29,1,'Sumatera Barat',1),(30,1,'Sumatera Selatan',1),(31,1,'Sumatera Utara',1);
/*!40000 ALTER TABLE `t_province` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-23  1:23:09
