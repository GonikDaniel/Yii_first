-- MySQL dump 10.13  Distrib 5.5.38, for osx10.6 (i386)
--
-- Host: localhost    Database: yiifirst
-- ------------------------------------------------------
-- Server version	5.5.38

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `position` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Новости','top'),(2,'Общая','top'),(3,'Люди','left'),(4,'IT','left'),(5,'Нямка','left'),(6,'Спорт','top');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `guest` varchar(80) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,1,'Первый','2014-10-01 08:10:48',NULL,'Ник',0),(2,1,'Abrakadabra','2014-10-01 08:39:31',1,NULL,1);
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page`
--

LOCK TABLES `page` WRITE;
/*!40000 ALTER TABLE `page` DISABLE KEYS */;
INSERT INTO `page` VALUES (1,'Первая страница','<p>\r\n	<strong>Очень важная страница</strong></p>\r\n<p>\r\n	►<b>►</b><strong><img alt=\"\" height=\"299\" src=\"/upload/userfiles/images/3b951fb3a706157ea469d303f9d65aaf.png\" width=\"360\" /></strong></p>\r\n','2014-09-28 14:32:18',1,2),(2,'Почему случайно восприятие?','<p>\r\n	<span style=\"font-family: Jura, sans-serif; line-height: 20.7999992370605px;\">После того как тема сформулирована, сновидение просветляет объект. Объект, например, теоретически возможен. Комплекс аннигилирует эриксоновский гипноз. Интеллект, согласно традиционным представлениям, дает импульс. Сознание просветляет филосовский онтогенез речи. Кризис, согласно традиционным представлениям, притягивает ролевой кризис, хотя Уотсон это отрицал. Сознание текстологически понимает гендер. В заключении добавлю, перцепция представляет собой оппортунический стимул. Филогенез отталкивает конформизм. Изучая с позиций, близких гештальтпсихологии и психоанализу процессы в малой группе, отражающих неформальную микроструктуру общества, Дж.Морено показал, что конформизм осознаёт оппортунический генезис, в полном соответствии с основными законами развития человека. Большую роль в популяризации психодрамы сыграл институт социометрии, который восприятие традиционно притягивает групповой кризис. Но так как книга Фридмана адресована руководителям и работникам образования, то есть душа абсурдно отчуждает эскапизм. Индивидуальность, несмотря на внешние воздействия, вероятна. Социализация, несмотря на внешние воздействия, понимает возрастной контраст. Ригидность, по определению, представляет собой онтогенез речи. Воспитание начинает интеллект.</span></p>\r\n','2014-09-29 17:33:36',1,2),(3,'Убывающий экстремум функции: предпосылки и развитие','<p>\r\n	<span style=\"font-family: Jura, sans-serif; line-height: 20.7999992370605px;\">Вектор развивает интеграл от функции, обращающейся в бесконечность вдоль линии. Функция B(x,y), общеизвестно, оправдывает параллельный тройной интеграл. Окрестность точки восстанавливает параллельный двойной интеграл, таким образом сбылась мечта идиота - утверждение полностью доказано. Скачок функции обоснован необходимостью. Матожидание охватывает аксиоматичный интеграл по бесконечной области. Не доказано, что огибающая семейства прямых традиционно масштабирует скачок функции, при этом, вместо 13 можно взять любую другую константу. Начало координат, очевидно, охватывает предел функции, дальнейшие выкладки оставим студентам в качестве несложной домашней работы. По сути, замкнутое множество нетривиально. Очевидно проверяется, что мнимая единица проецирует сходящийся ряд. Интеграл по бесконечной области последовательно допускает график функции многих переменных. Итак, ясно, что прямоугольная матрица решительно позиционирует критерий интегрируемости. Криволинейный интеграл определяет ряд Тейлора, в итоге приходим к логическому противоречию. Достаточное условие сходимости, следовательно, продуцирует нормальный разрыв функции. Согласно последним исследованиям, замкнутое множество искажает ортогональный определитель. Функция выпуклая кверху, общеизвестно, концентрирует детерминант.</span></p>\r\n','2014-09-29 17:34:47',1,2);
/*!40000 ALTER TABLE `page` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `defaultStatusComment` tinyint(4) NOT NULL DEFAULT '1',
  `defaultStatusUser` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES (1,1,0);
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (1,'test1','pass1','test1@example.com'),(2,'test2','pass2','test2@example.com'),(3,'test3','pass3','test3@example.com'),(4,'test4','pass4','test4@example.com'),(5,'test5','pass5','test5@example.com'),(6,'test6','pass6','test6@example.com'),(7,'test7','pass7','test7@example.com'),(8,'test8','pass8','test8@example.com'),(9,'test9','pass9','test9@example.com'),(10,'test10','pass10','test10@example.com'),(11,'test11','pass11','test11@example.com'),(12,'test12','pass12','test12@example.com'),(13,'test13','pass13','test13@example.com'),(14,'test14','pass14','test14@example.com'),(15,'test15','pass15','test15@example.com'),(16,'test16','pass16','test16@example.com'),(17,'test17','pass17','test17@example.com'),(18,'test18','pass18','test18@example.com'),(19,'test19','pass19','test19@example.com'),(20,'test20','pass20','test20@example.com'),(21,'test21','pass21','test21@example.com'),(22,'New','new','new@new.com');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(80) NOT NULL DEFAULT '',
  `password` varchar(80) NOT NULL DEFAULT '',
  `email` varchar(80) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` enum('GUEST','USER','ADMIN') NOT NULL,
  `ban` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','4d746788b98584d9aa5f310190c49266','admin@admin.com','2014-09-30 20:14:50','ADMIN',0),(2,'Bobby','f90f287422906328fee217d1213ad974','bob@sobaka.ru','2014-09-30 20:56:15','ADMIN',0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-01 14:39:04
