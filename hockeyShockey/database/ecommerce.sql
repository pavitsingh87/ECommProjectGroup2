-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: ecommerce1
-- ------------------------------------------------------
-- Server version	8.0.34

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
-- Table structure for table `cart_item`
--

DROP TABLE IF EXISTS `cart_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cart_item` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_item`
--

LOCK TABLES `cart_item` WRITE;
/*!40000 ALTER TABLE `cart_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(7,'2023_12_06_170011_create_products_table',2),(11,'2023_12_06_192636_create_orders_table',3),(12,'2023_12_06_193013_create_product_inventory_table',3),(13,'2023_12_06_193811_create_product_category_type_table',3),(16,'2023_12_06_194431_create_payment_detail_table',4),(17,'2023_12_06_194836_create_cart_item_table',5),(18,'2023_12_06_195742_create_roles_table',6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `total` decimal(20,0) NOT NULL,
  `up_id` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_detail`
--

DROP TABLE IF EXISTS `payment_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_detail` (
  `payment_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_no` bigint NOT NULL,
  `expiry` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_detail`
--

LOCK TABLES `payment_detail` WRITE;
/*!40000 ALTER TABLE `payment_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_category_type`
--

DROP TABLE IF EXISTS `product_category_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_category_type` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pct_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category_type`
--

LOCK TABLES `product_category_type` WRITE;
/*!40000 ALTER TABLE `product_category_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_category_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_inventory`
--

DROP TABLE IF EXISTS `product_inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_inventory` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_inventory`
--

LOCK TABLES `product_inventory` WRITE;
/*!40000 ALTER TABLE `product_inventory` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `product_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `availability_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pct_id` int NOT NULL,
  `i_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Product 1','Description for Product 1','image_1.jpg','Size 1','10.99','available',1,1,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(2,'Product 2','Description for Product 2','image_2.jpg','Size 2','21.98','available',2,2,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(3,'Product 3','Description for Product 3','image_3.jpg','Size 3','32.97','available',3,3,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(4,'Product 4','Description for Product 4','image_4.jpg','Size 4','43.96','available',4,4,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(5,'Product 5','Description for Product 5','image_5.jpg','Size 5','54.95','available',5,5,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(6,'Product 6','Description for Product 6','image_6.jpg','Size 6','65.94','available',6,6,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(7,'Product 7','Description for Product 7','image_7.jpg','Size 7','76.93','available',7,7,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(8,'Product 8','Description for Product 8','image_8.jpg','Size 8','87.92','available',8,8,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(9,'Product 9','Description for Product 9','image_9.jpg','Size 9','98.91','available',9,9,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(10,'Product 10','Description for Product 10','image_10.jpg','Size 10','109.9','available',10,10,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(11,'Product 11','Description for Product 11','image_11.jpg','Size 11','120.89','available',11,11,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(12,'Product 12','Description for Product 12','image_12.jpg','Size 12','131.88','available',12,12,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(13,'Product 13','Description for Product 13','image_13.jpg','Size 13','142.87','available',13,13,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(14,'Product 14','Description for Product 14','image_14.jpg','Size 14','153.86','available',14,14,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(15,'Product 15','Description for Product 15','image_15.jpg','Size 15','164.85','available',15,15,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(16,'Product 16','Description for Product 16','image_16.jpg','Size 16','175.84','available',16,16,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(17,'Product 17','Description for Product 17','image_17.jpg','Size 17','186.83','available',17,17,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(18,'Product 18','Description for Product 18','image_18.jpg','Size 18','197.82','available',18,18,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(19,'Product 19','Description for Product 19','image_19.jpg','Size 19','208.81','available',19,19,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(20,'Product 20','Description for Product 20','image_20.jpg','Size 20','219.8','available',20,20,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(21,'Product 21','Description for Product 21','image_21.jpg','Size 21','230.79','available',21,21,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(22,'Product 22','Description for Product 22','image_22.jpg','Size 22','241.78','available',22,22,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(23,'Product 23','Description for Product 23','image_23.jpg','Size 23','252.77','available',23,23,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(24,'Product 24','Description for Product 24','image_24.jpg','Size 24','263.76','available',24,24,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(25,'Product 25','Description for Product 25','image_25.jpg','Size 25','274.75','available',25,25,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(26,'Product 26','Description for Product 26','image_26.jpg','Size 26','285.74','available',26,26,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(27,'Product 27','Description for Product 27','image_27.jpg','Size 27','296.73','available',27,27,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(28,'Product 28','Description for Product 28','image_28.jpg','Size 28','307.72','available',28,28,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(29,'Product 29','Description for Product 29','image_29.jpg','Size 29','318.71','available',29,29,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(30,'Product 30','Description for Product 30','image_30.jpg','Size 30','329.7','available',30,30,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(31,'Product 31','Description for Product 31','image_31.jpg','Size 31','340.69','available',31,31,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(32,'Product 32','Description for Product 32','image_32.jpg','Size 32','351.68','available',32,32,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(33,'Product 33','Description for Product 33','image_33.jpg','Size 33','362.67','available',33,33,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(34,'Product 34','Description for Product 34','image_34.jpg','Size 34','373.66','available',34,34,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(35,'Product 35','Description for Product 35','image_35.jpg','Size 35','384.65','available',35,35,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(36,'Product 36','Description for Product 36','image_36.jpg','Size 36','395.64','available',36,36,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(37,'Product 37','Description for Product 37','image_37.jpg','Size 37','406.63','available',37,37,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(38,'Product 38','Description for Product 38','image_38.jpg','Size 38','417.62','available',38,38,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(39,'Product 39','Description for Product 39','image_39.jpg','Size 39','428.61','available',39,39,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(40,'Product 40','Description for Product 40','image_40.jpg','Size 40','439.6','available',40,40,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(41,'Product 41','Description for Product 41','image_41.jpg','Size 41','450.59','available',41,41,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(42,'Product 42','Description for Product 42','image_42.jpg','Size 42','461.58','available',42,42,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(43,'Product 43','Description for Product 43','image_43.jpg','Size 43','472.57','available',43,43,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(44,'Product 44','Description for Product 44','image_44.jpg','Size 44','483.56','available',44,44,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(45,'Product 45','Description for Product 45','image_45.jpg','Size 45','494.55','available',45,45,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(46,'Product 46','Description for Product 46','image_46.jpg','Size 46','505.54','available',46,46,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(47,'Product 47','Description for Product 47','image_47.jpg','Size 47','516.53','available',47,47,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(48,'Product 48','Description for Product 48','image_48.jpg','Size 48','527.52','available',48,48,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(49,'Product 49','Description for Product 49','image_49.jpg','Size 49','538.51','available',49,49,'2023-12-06 23:31:20','2023-12-06 23:31:20'),(50,'Product 50','Description for Product 50','image_50.jpg','Size 50','549.5','available',50,50,'2023-12-06 23:31:20','2023-12-06 23:31:20');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `role_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-06 15:16:08
