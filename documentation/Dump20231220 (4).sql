-- MySQL dump 10.13  Distrib 8.0.33, for macos13 (arm64)
--
-- Host: localhost    Database: ecommerce
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_reset_tokens_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2023_12_06_193013_create_product_inventory_table',1),(6,'2023_12_06_193811_create_product_category_type_table',1),(7,'2023_12_06_194431_create_payment_detail_table',1),(8,'2023_12_06_194836_create_cart_item_table',1),(9,'2023_12_06_195742_create_roles_table',1),(10,'2023_12_08_170900_create_product_details_table',1),(11,'2023_12_09_224352_create_categories_table',1),(12,'2023_12_10_153014_create_products_table',1),(13,'2023_12_11_165453_create_contacts_table',1),(14,'2023_12_12_172341_create_provinces_table',1),(15,'2023_12_12_192912_create_taxes_table',1),(16,'2023_12_13_000000_create_users_table',1),(17,'2023_12_14_024201_create_wishlists_table',1),(18,'2023_12_15_133045_create_orders_table',1),(19,'2023_12_15_162300_create_newsletters_table',1),(20,'2023_12_18_112936_create_order_items_table',1),(21,'2023_12_18_120416_create_transactions_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newsletters`
--

DROP TABLE IF EXISTS `newsletters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `newsletters` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `newsletters_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newsletters`
--

LOCK TABLES `newsletters` WRITE;
/*!40000 ALTER TABLE `newsletters` DISABLE KEYS */;
/*!40000 ALTER TABLE `newsletters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (1,1,1,1,78.05,'2023-12-18 22:53:14','2023-12-18 22:53:14'),(2,1,4,1,40.34,'2023-12-18 22:53:14','2023-12-18 22:53:14'),(3,2,1,2,78.05,'2023-12-18 23:35:22','2023-12-18 23:35:22'),(4,2,4,1,40.34,'2023-12-18 23:35:22','2023-12-18 23:35:22'),(5,3,1,1,78.05,'2023-12-18 23:55:46','2023-12-18 23:55:46'),(6,4,7,1,35.51,'2023-12-19 12:05:23','2023-12-19 12:05:23'),(7,5,1,1,78.05,'2023-12-19 21:39:56','2023-12-19 21:39:56'),(8,6,1,1,78.05,'2023-12-19 22:56:03','2023-12-19 22:56:03'),(9,7,4,1,40.34,'2023-12-19 23:25:27','2023-12-19 23:25:27'),(10,8,1,1,78.05,'2023-12-19 23:35:08','2023-12-19 23:35:08'),(11,9,1,1,78.05,'2023-12-20 00:35:51','2023-12-20 00:35:51'),(12,10,1,1,78.05,'2023-12-20 20:20:17','2023-12-20 20:20:17'),(13,11,1,1,78.05,'2023-12-20 22:48:23','2023-12-20 22:48:23'),(14,12,4,1,40.34,'2023-12-21 09:49:51','2023-12-21 09:49:51');
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` enum('pending','success','cancelled','error') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `user_id` bigint unsigned NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_order_id_unique` (`order_id`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,'pavitsinghmakkar@gmail.com','ship','Canada','Pavit','Singh','31 Lark Ridge Way','Winnipeg','MB','R3Y 0V4','success',3,'RKH86Pnt','2023-12-18 22:53:14','2023-12-18 22:53:42'),(2,'pavitsinghmakkar@gmail.com','ship','Canada','Pavit','Singh','31 Lark Ridge Way','Winnipeg','MB','R3Y 0V4','error',3,'5y1w8gZZ','2023-12-18 23:35:22','2023-12-18 23:35:37'),(3,'pavitsinghmakkar@gmail.com','ship','Canada','Pavit','Singh','31 Lark Ridge Way','Winnipeg','MB','R3Y 0V4','success',3,'zWIv4RMn','2023-12-18 23:55:46','2023-12-18 23:56:31'),(4,'pavitsinghmakkar@gmail.com','ship','Canada','Pavit','Singh','31 Lark Ridge Way','Winnipeg','MB','R3Y 0V4','pending',3,'hZrBS62Q','2023-12-19 12:05:23','2023-12-19 12:05:23'),(5,'pavitsinghmakkar@gmail.com','ship','Canada','Pavit','Singh','31 Lark Ridge Way','Winnipeg','MB','R3Y 0V4','success',3,'edOPz2um','2023-12-19 21:39:56','2023-12-19 21:56:29'),(6,'pavitsinghmakkar@gmail.com','ship','Canada','Pavit','Singh','31 Lark Ridge Way','Winnipeg','MB','R3Y 0V4','success',3,'gQ6K5in3','2023-12-19 22:56:03','2023-12-19 23:00:34'),(7,'pavitsinghmakkar@gmail.com','ship','Canada','Pavit','Singh','31 Lark Ridge Way','Winnipeg','MB','R3Y 0V4','pending',3,'RVGSGTdd','2023-12-19 23:25:27','2023-12-19 23:25:27'),(8,'pavitsinghmakkar@gmail.com','ship','Canada','Pavit','Singh','31 Lark Ridge Way','Winnipeg','MB','R3Y 0V4','error',3,'3Pv4sRk4','2023-12-19 23:35:08','2023-12-19 23:35:46'),(9,'pavitsinghmakkar@gmail.com','ship','Canada','Pavit','Singh','31 Lark Ridge Way','Winnipeg','MB','R3Y 0V4','pending',3,'3qs5ye7M','2023-12-20 00:35:51','2023-12-20 00:35:51'),(10,'pavitsinghmakkar@gmail.com','ship','Canada','Pavit','Singh','31 Lark Ridge Way','Winnipeg','MB','R3Y 0V4','pending',3,'2CPjrI6v','2023-12-20 20:20:17','2023-12-20 20:20:17'),(11,'pavitsinghmakkar@gmail.com','ship','Canada','Pavit','Singh','31 Lark Ridge Way','Winnipeg','MB','R3Y 0V4','success',3,'ETvBKtOc','2023-12-20 22:48:23','2023-12-21 00:19:40'),(12,'pavitsinghmakkar@gmail.com','ship','Canada','Pavit','Singh','31 Lark Ridge Way','Winnipeg','MB','R3Y 0V4','success',3,'FP4fVHQI','2023-12-21 09:49:51','2023-12-21 09:50:03');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category_type`
--

LOCK TABLES `product_category_type` WRITE;
/*!40000 ALTER TABLE `product_category_type` DISABLE KEYS */;
INSERT INTO `product_category_type` VALUES (1,'Men1','2023-12-12 04:07:40','2023-12-12 04:39:29'),(2,'Women','2023-12-12 04:07:40','2023-12-12 04:19:50'),(3,'Kids','2023-12-12 04:07:40','2023-12-12 04:19:56'),(4,'Accessories','2023-12-12 04:07:40','2023-12-12 04:20:00');
/*!40000 ALTER TABLE `product_category_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_details`
--

DROP TABLE IF EXISTS `product_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_details` (
  `product_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `availability_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pct_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_details`
--

LOCK TABLES `product_details` WRITE;
/*!40000 ALTER TABLE `product_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_details` ENABLE KEYS */;
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
  `short_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `availability_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category_type_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `products_product_category_type_id_foreign` (`product_category_type_id`),
  CONSTRAINT `products_product_category_type_id_foreign` FOREIGN KEY (`product_category_type_id`) REFERENCES `product_category_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Auston Matthews Toronto Maple Leafs Fanatics Branded Breakaway','Auston Matthews Toronto Maple Leafs Fanatics Branded Breakaway','similique nisi asperiores','product_images/H8XIXTxAq1xgNuw7uztTBHOZ8uo7LoRRiiFhQdxD.jpg','Large','78.05','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:35:02',NULL),(4,'Grey Classic Tee','Enim perferendis et omnis ea excepturi.','accusantium sequi','product_images/FXOLuF0Gl550zfBQXIr6VhhQ7GDi1yCXM6xqmMpz.jpg','Small','40.34','available',1,'2023-12-12 04:09:22','2023-12-13 03:39:23',NULL),(5,'Purple Classic Tee','Omnis ut soluta id eos officia est.','totam aliquid et','product_images/lrRmrGDg7haDPSOjJtAqQ8M4fB39gKGhwUmQAikW.jpg','Large','59.07','available',1,'2023-12-12 04:09:22','2023-12-13 03:39:53',NULL),(6,'Red Classic Tee','Rem id magnam est.','facere velit culpa','product_images/JN2vbjW6ZeeveuBBSV8FoUBWrzcnQYwyjVtwWadz.jpg','Medium','26.47','available',1,'2023-12-12 04:09:22','2023-12-13 03:40:21',NULL),(7,'natus','Et porro pariatur aperiam accusantium magnam similique est.','deleniti aut','product_images/pUo5SYVqNmsFME4XHvrS9Soctw9f3SXIWRbysYpX.jpg','Large','35.51','available',1,'2023-12-12 04:09:22','2023-12-13 03:52:09',NULL),(8,'voluptas','Quidem quam hic est nobis.','est cum','product_images/KLbi6SrTqB20z86S2AUphTwpLu0HSSKqUYyH436A.jpg','Small','80.59','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:17',NULL),(9,'sapiente','Tempore nihil saepe molestiae odio iusto aut.','non eius impedit','product_images/oduBH5bgCVWzdqvJzgnqh7lChHvu009ssnivo6GS.jpg','Large','72.73','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:27',NULL),(10,'nihil','Eos atque repudiandae et ut aut ipsum quis aperiam.','numquam consequatur voluptatem','product_images/AJPTC39nOQ6ZE1advvPtSBtGfCsUwJvqwJV3U1cu.jpg','Medium','44.91','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:35',NULL),(11,'aut','Hic fugit sed nostrum accusamus.','dolor unde','product_images/0zoJnuvVqYUyQBC8Rdm72fVkSBp0lfvYpeKVzZqw.jpg','Small','88.65','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:49',NULL),(12,'totam','Cupiditate sed dicta maxime enim et cum.','cumque cum','product_images/sBEG7GrFMnLxynYnikxqVA5NM80niC4MfKQrWY67.jpg','Small','72.99','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:59',NULL),(13,'nisi','Nisi tempore ea eum voluptatum non in consectetur.','maiores delectus eveniet','product_images/XiQTb5Z8FrixzYgCS8mFfQbX1Hmr92YjTlH6ojQu.jpg','Medium','71.25','available',1,'2023-12-12 04:09:22','2023-12-13 03:53:08',NULL),(14,'Auston Matthews Toronto Maple Leafs Fanatics Branded Breakaway','Auston Matthews Toronto Maple Leafs Fanatics Branded Breakaway','similique nisi asperiores','product_images/H8XIXTxAq1xgNuw7uztTBHOZ8uo7LoRRiiFhQdxD.jpg','Large','78.05','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:35:02',NULL),(15,'Grey Classic Tee','Enim perferendis et omnis ea excepturi.','accusantium sequi','product_images/FXOLuF0Gl550zfBQXIr6VhhQ7GDi1yCXM6xqmMpz.jpg','Small','40.34','available',1,'2023-12-12 04:09:22','2023-12-13 03:39:23',NULL),(16,'Purple Classic Tee','Omnis ut soluta id eos officia est.','totam aliquid et','product_images/lrRmrGDg7haDPSOjJtAqQ8M4fB39gKGhwUmQAikW.jpg','Large','59.07','available',1,'2023-12-12 04:09:22','2023-12-13 03:39:53',NULL),(17,'Red Classic Tee','Rem id magnam est.','facere velit culpa','product_images/JN2vbjW6ZeeveuBBSV8FoUBWrzcnQYwyjVtwWadz.jpg','Medium','26.47','available',1,'2023-12-12 04:09:22','2023-12-13 03:40:21',NULL),(18,'natus','Et porro pariatur aperiam accusantium magnam similique est.','deleniti aut','product_images/pUo5SYVqNmsFME4XHvrS9Soctw9f3SXIWRbysYpX.jpg','Large','35.51','available',1,'2023-12-12 04:09:22','2023-12-13 03:52:09',NULL),(19,'voluptas','Quidem quam hic est nobis.','est cum','product_images/KLbi6SrTqB20z86S2AUphTwpLu0HSSKqUYyH436A.jpg','Small','80.59','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:17',NULL),(20,'Auston Matthews Toronto Maple Leafs Fanatics Branded Breakaway','Auston Matthews Toronto Maple Leafs Fanatics Branded Breakaway','similique nisi asperiores','product_images/H8XIXTxAq1xgNuw7uztTBHOZ8uo7LoRRiiFhQdxD.jpg','Large','78.05','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:35:02',NULL),(21,'Grey Classic Tee','Enim perferendis et omnis ea excepturi.','accusantium sequi','product_images/FXOLuF0Gl550zfBQXIr6VhhQ7GDi1yCXM6xqmMpz.jpg','Small','40.34','available',1,'2023-12-12 04:09:22','2023-12-13 03:39:23',NULL),(22,'Purple Classic Tee','Omnis ut soluta id eos officia est.','totam aliquid et','product_images/lrRmrGDg7haDPSOjJtAqQ8M4fB39gKGhwUmQAikW.jpg','Large','59.07','available',1,'2023-12-12 04:09:22','2023-12-13 03:39:53',NULL),(23,'Red Classic Tee','Rem id magnam est.','facere velit culpa','product_images/JN2vbjW6ZeeveuBBSV8FoUBWrzcnQYwyjVtwWadz.jpg','Medium','26.47','available',1,'2023-12-12 04:09:22','2023-12-13 03:40:21',NULL),(24,'Natus','Et porro pariatur aperiam accusantium magnam similique est.','deleniti aut','product_images/pUo5SYVqNmsFME4XHvrS9Soctw9f3SXIWRbysYpX.jpg','Large','35.51','available',1,'2023-12-12 04:09:22','2023-12-13 03:52:09',NULL),(25,'Voluptas','Quidem quam hic est nobis.','est cum','product_images/KLbi6SrTqB20z86S2AUphTwpLu0HSSKqUYyH436A.jpg','Small','80.59','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:17',NULL),(26,'Sapiente','Tempore nihil saepe molestiae odio iusto aut.','non eius impedit','product_images/oduBH5bgCVWzdqvJzgnqh7lChHvu009ssnivo6GS.jpg','Large','72.73','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:27',NULL),(27,'Nihil','Eos atque repudiandae et ut aut ipsum quis aperiam.','numquam consequatur voluptatem','product_images/AJPTC39nOQ6ZE1advvPtSBtGfCsUwJvqwJV3U1cu.jpg','Medium','44.91','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:35',NULL),(28,'Aut','Hic fugit sed nostrum accusamus.','dolor unde','product_images/0zoJnuvVqYUyQBC8Rdm72fVkSBp0lfvYpeKVzZqw.jpg','Small','88.65','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:49',NULL),(29,'Totam','Cupiditate sed dicta maxime enim et cum.','cumque cum','product_images/sBEG7GrFMnLxynYnikxqVA5NM80niC4MfKQrWY67.jpg','Small','72.99','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:59',NULL),(30,'Nisi','Nisi tempore ea eum voluptatum non in consectetur.','maiores delectus eveniet','product_images/XiQTb5Z8FrixzYgCS8mFfQbX1Hmr92YjTlH6ojQu.jpg','Medium','71.25','available',1,'2023-12-12 04:09:22','2023-12-13 03:53:08',NULL),(31,'Auston Matthews Toronto Maple Leafs Fanatics Branded Breakaway','Auston Matthews Toronto Maple Leafs Fanatics Branded Breakaway','similique nisi asperiores','product_images/H8XIXTxAq1xgNuw7uztTBHOZ8uo7LoRRiiFhQdxD.jpg','Large','78.05','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:35:02',NULL),(32,'Grey Classic Tee','Enim perferendis et omnis ea excepturi.','accusantium sequi','product_images/FXOLuF0Gl550zfBQXIr6VhhQ7GDi1yCXM6xqmMpz.jpg','Small','40.34','available',1,'2023-12-12 04:09:22','2023-12-13 03:39:23',NULL),(33,'Purple Classic Tee','Omnis ut soluta id eos officia est.','totam aliquid et','product_images/lrRmrGDg7haDPSOjJtAqQ8M4fB39gKGhwUmQAikW.jpg','Large','59.07','available',1,'2023-12-12 04:09:22','2023-12-13 03:39:53',NULL),(34,'Red Classic Tee','Rem id magnam est.','facere velit culpa','product_images/JN2vbjW6ZeeveuBBSV8FoUBWrzcnQYwyjVtwWadz.jpg','Medium','26.47','available',1,'2023-12-12 04:09:22','2023-12-13 03:40:21',NULL),(35,'natus','Et porro pariatur aperiam accusantium magnam similique est.','deleniti aut','product_images/pUo5SYVqNmsFME4XHvrS9Soctw9f3SXIWRbysYpX.jpg','Large','35.51','available',1,'2023-12-12 04:09:22','2023-12-13 03:52:09',NULL),(36,'voluptas','Quidem quam hic est nobis.','est cum','product_images/KLbi6SrTqB20z86S2AUphTwpLu0HSSKqUYyH436A.jpg','Small','80.59','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:17',NULL),(37,'Auston Matthews Toronto Maple Leafs Fanatics Branded Breakaway','Auston Matthews Toronto Maple Leafs Fanatics Branded Breakaway','similique nisi asperiores','product_images/H8XIXTxAq1xgNuw7uztTBHOZ8uo7LoRRiiFhQdxD.jpg','Large','78.05','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:35:02',NULL),(38,'Grey Classic Tee','Enim perferendis et omnis ea excepturi.','accusantium sequi','product_images/FXOLuF0Gl550zfBQXIr6VhhQ7GDi1yCXM6xqmMpz.jpg','Small','40.34','available',1,'2023-12-12 04:09:22','2023-12-13 03:39:23',NULL),(39,'Purple Classic Tee','Omnis ut soluta id eos officia est.','totam aliquid et','product_images/lrRmrGDg7haDPSOjJtAqQ8M4fB39gKGhwUmQAikW.jpg','Large','59.07','available',1,'2023-12-12 04:09:22','2023-12-13 03:39:53',NULL),(40,'Red Classic Tee','Rem id magnam est.','facere velit culpa','product_images/JN2vbjW6ZeeveuBBSV8FoUBWrzcnQYwyjVtwWadz.jpg','Medium','26.47','available',1,'2023-12-12 04:09:22','2023-12-13 03:40:21',NULL),(41,'Natus','Et porro pariatur aperiam accusantium magnam similique est.','deleniti aut','product_images/pUo5SYVqNmsFME4XHvrS9Soctw9f3SXIWRbysYpX.jpg','Large','35.51','available',1,'2023-12-12 04:09:22','2023-12-13 03:52:09',NULL),(42,'Voluptas','Quidem quam hic est nobis.','est cum','product_images/KLbi6SrTqB20z86S2AUphTwpLu0HSSKqUYyH436A.jpg','Small','80.59','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:17',NULL),(43,'Sapiente','Tempore nihil saepe molestiae odio iusto aut.','non eius impedit','product_images/oduBH5bgCVWzdqvJzgnqh7lChHvu009ssnivo6GS.jpg','Large','72.73','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:27',NULL),(44,'Nihil','Eos atque repudiandae et ut aut ipsum quis aperiam.','numquam consequatur voluptatem','product_images/AJPTC39nOQ6ZE1advvPtSBtGfCsUwJvqwJV3U1cu.jpg','Medium','44.91','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:35',NULL),(45,'Aut','Hic fugit sed nostrum accusamus.','dolor unde','product_images/0zoJnuvVqYUyQBC8Rdm72fVkSBp0lfvYpeKVzZqw.jpg','Small','88.65','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:49',NULL),(46,'Totam','Cupiditate sed dicta maxime enim et cum.','cumque cum','product_images/sBEG7GrFMnLxynYnikxqVA5NM80niC4MfKQrWY67.jpg','Small','72.99','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:59',NULL),(47,'Nisi','Nisi tempore ea eum voluptatum non in consectetur.','maiores delectus eveniet','product_images/XiQTb5Z8FrixzYgCS8mFfQbX1Hmr92YjTlH6ojQu.jpg','Medium','71.25','available',1,'2023-12-12 04:09:22','2023-12-13 03:53:08',NULL),(48,'Auston Matthews Toronto Maple Leafs Fanatics Branded Breakaway','Auston Matthews Toronto Maple Leafs Fanatics Branded Breakaway','similique nisi asperiores','product_images/H8XIXTxAq1xgNuw7uztTBHOZ8uo7LoRRiiFhQdxD.jpg','Large','78.05','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:35:02',NULL),(49,'Grey Classic Tee','Enim perferendis et omnis ea excepturi.','accusantium sequi','product_images/FXOLuF0Gl550zfBQXIr6VhhQ7GDi1yCXM6xqmMpz.jpg','Small','40.34','available',1,'2023-12-12 04:09:22','2023-12-13 03:39:23',NULL),(50,'Purple Classic Tee','Omnis ut soluta id eos officia est.','totam aliquid et','product_images/lrRmrGDg7haDPSOjJtAqQ8M4fB39gKGhwUmQAikW.jpg','Large','59.07','available',1,'2023-12-12 04:09:22','2023-12-13 03:39:53',NULL),(51,'Red Classic Tee','Rem id magnam est.','facere velit culpa','product_images/JN2vbjW6ZeeveuBBSV8FoUBWrzcnQYwyjVtwWadz.jpg','Medium','26.47','available',1,'2023-12-12 04:09:22','2023-12-13 03:40:21',NULL),(52,'natus','Et porro pariatur aperiam accusantium magnam similique est.','deleniti aut','product_images/pUo5SYVqNmsFME4XHvrS9Soctw9f3SXIWRbysYpX.jpg','Large','35.51','available',1,'2023-12-12 04:09:22','2023-12-13 03:52:09',NULL),(53,'voluptas','Quidem quam hic est nobis.','est cum','product_images/KLbi6SrTqB20z86S2AUphTwpLu0HSSKqUYyH436A.jpg','Small','80.59','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:17',NULL),(54,'Auston Matthews Toronto Maple Leafs Fanatics Branded Breakaway','Auston Matthews Toronto Maple Leafs Fanatics Branded Breakaway','similique nisi asperiores','product_images/H8XIXTxAq1xgNuw7uztTBHOZ8uo7LoRRiiFhQdxD.jpg','Large','78.05','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:35:02',NULL),(55,'Grey Classic Tee','Enim perferendis et omnis ea excepturi.','accusantium sequi','product_images/FXOLuF0Gl550zfBQXIr6VhhQ7GDi1yCXM6xqmMpz.jpg','Small','40.34','available',1,'2023-12-12 04:09:22','2023-12-13 03:39:23',NULL),(56,'Purple Classic Tee','Omnis ut soluta id eos officia est.','totam aliquid et','product_images/lrRmrGDg7haDPSOjJtAqQ8M4fB39gKGhwUmQAikW.jpg','Large','59.07','available',1,'2023-12-12 04:09:22','2023-12-13 03:39:53',NULL),(57,'Red Classic Tee','Rem id magnam est.','facere velit culpa','product_images/JN2vbjW6ZeeveuBBSV8FoUBWrzcnQYwyjVtwWadz.jpg','Medium','26.47','available',1,'2023-12-12 04:09:22','2023-12-13 03:40:21',NULL),(58,'Natus','Et porro pariatur aperiam accusantium magnam similique est.','deleniti aut','product_images/pUo5SYVqNmsFME4XHvrS9Soctw9f3SXIWRbysYpX.jpg','Large','35.51','available',1,'2023-12-12 04:09:22','2023-12-13 03:52:09',NULL),(59,'Voluptas','Quidem quam hic est nobis.','est cum','product_images/KLbi6SrTqB20z86S2AUphTwpLu0HSSKqUYyH436A.jpg','Small','80.59','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:17',NULL),(60,'Sapiente','Tempore nihil saepe molestiae odio iusto aut.','non eius impedit','product_images/oduBH5bgCVWzdqvJzgnqh7lChHvu009ssnivo6GS.jpg','Large','72.73','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:27',NULL),(61,'Nihil','Eos atque repudiandae et ut aut ipsum quis aperiam.','numquam consequatur voluptatem','product_images/AJPTC39nOQ6ZE1advvPtSBtGfCsUwJvqwJV3U1cu.jpg','Medium','44.91','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:35',NULL),(62,'Aut','Hic fugit sed nostrum accusamus.','dolor unde','product_images/0zoJnuvVqYUyQBC8Rdm72fVkSBp0lfvYpeKVzZqw.jpg','Small','88.65','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:49',NULL),(63,'Totam','Cupiditate sed dicta maxime enim et cum.','cumque cum','product_images/sBEG7GrFMnLxynYnikxqVA5NM80niC4MfKQrWY67.jpg','Small','72.99','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:59',NULL),(64,'Nisi','Nisi tempore ea eum voluptatum non in consectetur.','maiores delectus eveniet','product_images/XiQTb5Z8FrixzYgCS8mFfQbX1Hmr92YjTlH6ojQu.jpg','Medium','71.25','available',1,'2023-12-12 04:09:22','2023-12-13 03:53:08',NULL),(65,'Auston Matthews Toronto Maple Leafs Fanatics Branded Breakaway','Auston Matthews Toronto Maple Leafs Fanatics Branded Breakaway','similique nisi asperiores','product_images/H8XIXTxAq1xgNuw7uztTBHOZ8uo7LoRRiiFhQdxD.jpg','Large','78.05','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:35:02',NULL),(66,'Grey Classic Tee','Enim perferendis et omnis ea excepturi.','accusantium sequi','product_images/FXOLuF0Gl550zfBQXIr6VhhQ7GDi1yCXM6xqmMpz.jpg','Small','40.34','available',1,'2023-12-12 04:09:22','2023-12-13 03:39:23',NULL),(67,'Purple Classic Tee','Omnis ut soluta id eos officia est.','totam aliquid et','product_images/lrRmrGDg7haDPSOjJtAqQ8M4fB39gKGhwUmQAikW.jpg','Large','59.07','available',1,'2023-12-12 04:09:22','2023-12-13 03:39:53',NULL),(68,'Red Classic Tee','Rem id magnam est.','facere velit culpa','product_images/JN2vbjW6ZeeveuBBSV8FoUBWrzcnQYwyjVtwWadz.jpg','Medium','26.47','available',1,'2023-12-12 04:09:22','2023-12-13 03:40:21',NULL),(69,'natus','Et porro pariatur aperiam accusantium magnam similique est.','deleniti aut','product_images/pUo5SYVqNmsFME4XHvrS9Soctw9f3SXIWRbysYpX.jpg','Large','35.51','available',1,'2023-12-12 04:09:22','2023-12-13 03:52:09',NULL),(70,'voluptas','Quidem quam hic est nobis.','est cum','product_images/KLbi6SrTqB20z86S2AUphTwpLu0HSSKqUYyH436A.jpg','Small','80.59','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:17',NULL),(71,'Auston Matthews Toronto Maple Leafs Fanatics Branded Breakaway','Auston Matthews Toronto Maple Leafs Fanatics Branded Breakaway','similique nisi asperiores','product_images/H8XIXTxAq1xgNuw7uztTBHOZ8uo7LoRRiiFhQdxD.jpg','Large','78.05','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:35:02',NULL),(72,'Grey Classic Tee','Enim perferendis et omnis ea excepturi.','accusantium sequi','product_images/FXOLuF0Gl550zfBQXIr6VhhQ7GDi1yCXM6xqmMpz.jpg','Small','40.34','available',1,'2023-12-12 04:09:22','2023-12-13 03:39:23',NULL),(73,'Purple Classic Tee','Omnis ut soluta id eos officia est.','totam aliquid et','product_images/lrRmrGDg7haDPSOjJtAqQ8M4fB39gKGhwUmQAikW.jpg','Large','59.07','available',1,'2023-12-12 04:09:22','2023-12-13 03:39:53',NULL),(74,'Red Classic Tee','Rem id magnam est.','facere velit culpa','product_images/JN2vbjW6ZeeveuBBSV8FoUBWrzcnQYwyjVtwWadz.jpg','Medium','26.47','available',1,'2023-12-12 04:09:22','2023-12-13 03:40:21',NULL),(75,'Natus','Et porro pariatur aperiam accusantium magnam similique est.','deleniti aut','product_images/pUo5SYVqNmsFME4XHvrS9Soctw9f3SXIWRbysYpX.jpg','Large','35.51','available',1,'2023-12-12 04:09:22','2023-12-13 03:52:09',NULL),(76,'Voluptas','Quidem quam hic est nobis.','est cum','product_images/KLbi6SrTqB20z86S2AUphTwpLu0HSSKqUYyH436A.jpg','Small','80.59','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:17',NULL),(77,'Sapiente','Tempore nihil saepe molestiae odio iusto aut.','non eius impedit','product_images/oduBH5bgCVWzdqvJzgnqh7lChHvu009ssnivo6GS.jpg','Large','72.73','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:27',NULL),(78,'Nihil','Eos atque repudiandae et ut aut ipsum quis aperiam.','numquam consequatur voluptatem','product_images/AJPTC39nOQ6ZE1advvPtSBtGfCsUwJvqwJV3U1cu.jpg','Medium','44.91','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:35',NULL),(79,'Aut','Hic fugit sed nostrum accusamus.','dolor unde','product_images/0zoJnuvVqYUyQBC8Rdm72fVkSBp0lfvYpeKVzZqw.jpg','Small','88.65','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:49',NULL),(80,'Totam','Cupiditate sed dicta maxime enim et cum.','cumque cum','product_images/sBEG7GrFMnLxynYnikxqVA5NM80niC4MfKQrWY67.jpg','Small','72.99','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:59',NULL),(81,'Nisi','Nisi tempore ea eum voluptatum non in consectetur.','maiores delectus eveniet','product_images/XiQTb5Z8FrixzYgCS8mFfQbX1Hmr92YjTlH6ojQu.jpg','Medium','71.25','available',1,'2023-12-12 04:09:22','2023-12-13 03:53:08',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `provinces` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `provinces_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provinces`
--

LOCK TABLES `provinces` WRITE;
/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
/*!40000 ALTER TABLE `provinces` ENABLE KEYS */;
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
-- Table structure for table `taxes`
--

DROP TABLE IF EXISTS `taxes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taxes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `province_id` bigint unsigned NOT NULL,
  `gst_rate` decimal(5,2) NOT NULL DEFAULT '0.00',
  `pst_rate` decimal(5,2) NOT NULL DEFAULT '0.00',
  `hst_rate` decimal(5,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `taxes_province_id_foreign` (`province_id`),
  CONSTRAINT `taxes_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taxes`
--

LOCK TABLES `taxes` WRITE;
/*!40000 ALTER TABLE `taxes` DISABLE KEYS */;
/*!40000 ALTER TABLE `taxes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ref_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `result_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `result_message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `response_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `errors` text COLLATE utf8mb4_unicode_ci,
  `trans_id` int DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,NULL,'ok','Connection successful','1','2023-15333','[]',15333,'success','2023-12-18 22:53:42','2023-12-18 22:53:42'),(2,NULL,'ok','Connection successful','2','000000','{\"cc_result\":\"Invalid credit card\"}',15378,'error','2023-12-18 23:35:37','2023-12-18 23:35:37'),(3,'zWIv4RMn','ok','Connection successful','1','2023-15379','[]',15379,'success','2023-12-18 23:56:31','2023-12-18 23:56:31'),(4,'edOPz2um','ok','Connection successful','1','2023-15421','[]',15421,'success','2023-12-19 21:56:29','2023-12-19 21:56:29'),(5,'5y1w8gZZ','ok','Connection successful','1','2023-15488','[]',15488,'success','2023-12-19 23:00:34','2023-12-19 23:00:34'),(6,NULL,'ok','Connection successful','2','000000','{\"cvv_result\":\"Invalid CVV\",\"cc_result\":\"Invalid credit card type\"}',15571,'error','2023-12-19 23:35:46','2023-12-19 23:35:46'),(7,'ETvBKtOc','ok','Connection successful','1','2023-15646','[]',15646,'success','2023-12-21 00:19:40','2023-12-21 00:19:40'),(8,'FP4fVHQI','ok','Connection successful','1','2023-15711','[]',15711,'success','2023-12-21 09:50:03','2023-12-21 09:50:03'),(9,NULL,'ok','Connection successful','1','2023-15712','[]',15712,'success','2023-12-21 09:50:27','2023-12-21 09:50:27'),(10,NULL,'ok','Connection successful','1','2023-15713','[]',15713,'success','2023-12-21 09:50:50','2023-12-21 09:50:50');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_province_foreign` (`province`),
  CONSTRAINT `users_province_foreign` FOREIGN KEY (`province`) REFERENCES `provinces` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Sample User','John','Doe','Male','1990-01-01','admin@gmail.com','$2y$12$nqFuTajMxqmnIV6mhDgCdOtAY7baHdvjQTg5bWagFU8q7NsAuFx0y','1234567890','admin_user','123 Main St','Apt 45','Sample City',NULL,'Sample Country','12345',1,NULL,'2023-12-18 22:51:43','2023-12-18 22:51:43'),(3,'Sample User','John','Doe','Male','1990-01-01','sample@example.com','$2y$12$nqFuTajMxqmnIV6mhDgCdOtAY7baHdvjQTg5bWagFU8q7NsAuFx0y','1234567890','sample_user','123 Main St','Apt 45','Sample City',NULL,'Sample Country','12345',0,NULL,'2023-12-18 22:51:53','2023-12-18 22:51:53');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wishlists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wishlists_user_id_foreign` (`user_id`),
  KEY `wishlists_product_id_foreign` (`product_id`),
  CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE,
  CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlists`
--

LOCK TABLES `wishlists` WRITE;
/*!40000 ALTER TABLE `wishlists` DISABLE KEYS */;
INSERT INTO `wishlists` VALUES (1,3,1,'2023-12-18 22:52:22','2023-12-18 22:52:22');
/*!40000 ALTER TABLE `wishlists` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-20 23:36:34
