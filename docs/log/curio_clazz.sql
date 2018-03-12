-- MySQL dump 10.13  Distrib 5.7.20, for osx10.11 (x86_64)
--
-- Host: localhost    Database: curio
-- ------------------------------------------------------
-- Server version	5.7.20

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
-- Table structure for table `curio_clazz`
--

DROP TABLE IF EXISTS `curio_clazz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curio_clazz` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `name_en` varchar(255) DEFAULT NULL COMMENT '分类英文',
  `name_tc` varchar(255) DEFAULT NULL COMMENT '分类繁体',
  `parent_id` int(11) DEFAULT '0' COMMENT '父级分类id',
  `sort` int(8) DEFAULT '0' COMMENT '排序。数值越大，越靠前',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='内容分类表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curio_clazz`
--

LOCK TABLES `curio_clazz` WRITE;
/*!40000 ALTER TABLE `curio_clazz` DISABLE KEYS */;
INSERT INTO `curio_clazz` VALUES (1,'PRESS RELEASE AND PHOTO ALBUM','新聞稿及相冊',0,5),(2,'IN THE NEWS','媒體報導',0,5),(10,'2013-06-22 - Auction 1','2013-06-22 - 第一屆拍賣會',1,7),(3,'upcoming auction','今日拍賣',0,5),(4,'buy','參與拍賣',0,5),(5,'sell','委託拍賣',0,5),(6,'about','公司簡介',0,5),(7,'contact','聯絡我們',0,5),(11,'2nd','第2屆',1,6),(8,'Terms and Condition of Sale','條款及細則',0,5),(9,'privacy','個人隱私',0,5);
/*!40000 ALTER TABLE `curio_clazz` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-09 10:29:07
