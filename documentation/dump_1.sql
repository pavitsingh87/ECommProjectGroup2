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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Category 1','2023-12-15 10:00:34','2023-12-15 10:00:34'),(2,'Category 2','2023-12-15 10:00:34','2023-12-15 10:00:34'),(3,'Category 1','2023-12-15 10:27:04','2023-12-15 10:27:04'),(4,'Category 2','2023-12-15 10:27:04','2023-12-15 10:27:04'),(5,'Category 1','2023-12-15 10:27:16','2023-12-15 10:27:16'),(6,'Category 2','2023-12-15 10:27:16','2023-12-15 10:27:16');
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
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (176,'2014_10_12_100000_create_password_reset_tokens_table',1),(177,'2014_10_12_100000_create_password_resets_table',1),(178,'2019_08_19_000000_create_failed_jobs_table',1),(179,'2019_12_14_000001_create_personal_access_tokens_table',1),(180,'2023_12_06_193013_create_product_inventory_table',1),(181,'2023_12_06_193811_create_product_category_type_table',1),(182,'2023_12_06_194431_create_payment_detail_table',1),(183,'2023_12_06_194836_create_cart_item_table',1),(184,'2023_12_06_195742_create_roles_table',1),(185,'2023_12_08_170900_create_product_details_table',1),(186,'2023_12_09_224352_create_categories_table',1),(187,'2023_12_10_153014_create_products_table',1),(188,'2023_12_11_165453_create_contacts_table',1),(189,'2023_12_12_172341_create_provinces_table',1),(190,'2023_12_12_192912_create_taxes_table',1),(191,'2023_12_13_000000_create_users_table',1),(192,'2023_12_14_024201_create_wishlists_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `payment_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
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
  `pct_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category_type`
--

LOCK TABLES `product_category_type` WRITE;
/*!40000 ALTER TABLE `product_category_type` DISABLE KEYS */;
INSERT INTO `product_category_type` VALUES (1,'Men','2023-12-15 10:00:34','2023-12-15 10:00:34'),(2,'Women','2023-12-15 10:00:34','2023-12-15 10:00:34'),(3,'Kids','2023-12-15 10:00:34','2023-12-15 10:00:34'),(4,'Accessories','2023-12-15 10:00:34','2023-12-15 10:00:34');
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
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `availability_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `availability_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category_type_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `products_product_category_type_id_foreign` (`product_category_type_id`),
  CONSTRAINT `products_product_category_type_id_foreign` FOREIGN KEY (`product_category_type_id`) REFERENCES `product_category_type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Auston Matthews Toronto Maple Leafs Fanatics Branded Breakaway','Auston Matthews Toronto Maple Leafs Fanatics Branded Breakaway','similique nisi asperiores','product_images/H8XIXTxAq1xgNuw7uztTBHOZ8uo7LoRRiiFhQdxD.jpg','Large','78.05','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:35:02',NULL),(2,'Blue CLASSIC TEE','Veniam eligendi optio et aspernatur rem sed accusantium qui.','quia odio officia','product_images/wc1FztG2oiyxe6LjxnwhnlBb0YbSJuqr3ckXEawE.jpg','Medium','38.15','available',1,'2023-12-12 04:09:22','2023-12-13 03:39:00',NULL),(3,'Black Classic Tee','Sit veritatis tempore ut dolorem officia sit est quaerat.','nisi sed necessitatibus','product_images/hpirpbYcr07mNydOnyZ9OHN9ctWdwWnahG72JPUt.jpg','Large','87.25','available',1,'2023-12-12 04:09:22','2023-12-13 03:39:11',NULL),(4,'Grey Classic Tee','Enim perferendis et omnis ea excepturi.','accusantium sequi','product_images/FXOLuF0Gl550zfBQXIr6VhhQ7GDi1yCXM6xqmMpz.jpg','Small','40.34','available',1,'2023-12-12 04:09:22','2023-12-13 03:39:23',NULL),(5,'Purple Classic Tee','Omnis ut soluta id eos officia est.','totam aliquid et','product_images/lrRmrGDg7haDPSOjJtAqQ8M4fB39gKGhwUmQAikW.jpg','Large','59.07','available',1,'2023-12-12 04:09:22','2023-12-13 03:39:53',NULL),(6,'Red Classic Tee','Rem id magnam est.','facere velit culpa','product_images/JN2vbjW6ZeeveuBBSV8FoUBWrzcnQYwyjVtwWadz.jpg','Medium','26.47','available',1,'2023-12-12 04:09:22','2023-12-13 03:40:21',NULL),(7,'natus','Et porro pariatur aperiam accusantium magnam similique est.','deleniti aut','product_images/pUo5SYVqNmsFME4XHvrS9Soctw9f3SXIWRbysYpX.jpg','Large','35.51','available',1,'2023-12-12 04:09:22','2023-12-13 03:52:09',NULL),(8,'voluptas','Quidem quam hic est nobis.','est cum','product_images/KLbi6SrTqB20z86S2AUphTwpLu0HSSKqUYyH436A.jpg','Small','80.59','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:17',NULL),(9,'sapiente','Tempore nihil saepe molestiae odio iusto aut.','non eius impedit','product_images/oduBH5bgCVWzdqvJzgnqh7lChHvu009ssnivo6GS.jpg','Large','72.73','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:27',NULL),(10,'nihil','Eos atque repudiandae et ut aut ipsum quis aperiam.','numquam consequatur voluptatem','product_images/AJPTC39nOQ6ZE1advvPtSBtGfCsUwJvqwJV3U1cu.jpg','Medium','44.91','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:35',NULL),(11,'aut','Hic fugit sed nostrum accusamus.','dolor unde','product_images/0zoJnuvVqYUyQBC8Rdm72fVkSBp0lfvYpeKVzZqw.jpg','Small','88.65','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:49',NULL),(12,'totam','Cupiditate sed dicta maxime enim et cum.','cumque cum','product_images/sBEG7GrFMnLxynYnikxqVA5NM80niC4MfKQrWY67.jpg','Small','72.99','out_of_stock',1,'2023-12-12 04:09:22','2023-12-13 03:52:59',NULL),(13,'nisi','Nisi tempore ea eum voluptatum non in consectetur.','maiores delectus eveniet','product_images/XiQTb5Z8FrixzYgCS8mFfQbX1Hmr92YjTlH6ojQu.jpg','Medium','71.25','available',1,'2023-12-12 04:09:22','2023-12-13 03:53:08',NULL),(14,'atque','Culpa voluptas dolorem culpa neque esse.','quos est et','product_images/e09QGbU9pQlXdmeFj8ClUc2L2IzZiTwRSbccsfcE.jpg','Large','54.81','available',1,'2023-12-12 04:09:22','2023-12-13 03:53:17',NULL),(15,'sint','Fugiat maiores at dolorem nostrum.','totam autem','product_images/ecPzlumiYs8VtJ2Y5lChcXxpwacLeZbMhGf08w9h.jpg','Small','39.73','available',1,'2023-12-12 04:09:22','2023-12-13 03:53:26',NULL),(16,'repellendus','Id ipsum vel nihil dolor possimus in quis.','necessitatibus pariatur','product_images/kOg9V2U8qXCiUhmQteoiT1S7aGGchObC8sV8ZrOp.jpg','Medium','28.52','out_of_stock',2,'2023-12-12 04:09:22','2023-12-13 03:53:38',NULL),(17,'maxime','Ea ipsum sed rerum.','magnam eius','product_images/GPz5NKqtcFyTXeF7j8AvqebHHOU8MPC8BkcFvMeS.jpg','Large','58.28','out_of_stock',2,'2023-12-12 04:09:22','2023-12-13 03:56:27',NULL),(18,'vel','Illum et rem officia a magni sed dolore.','et eligendi consequatur','product_images/8CE9hWjQOXLZRVEG1FyyEVbG1usIGC5oZglWvdUP.jpg','Medium','25.65','out_of_stock',2,'2023-12-12 04:09:22','2023-12-13 03:56:35',NULL),(19,'voluptas','Neque illo qui possimus non veritatis sed.','molestias sint','product_images/FhjTW4f3RlfjWyRQZzXa0kfJIZxFfuvmPAyXJy2O.jpg','Small','89.15','out_of_stock',2,'2023-12-12 04:09:22','2023-12-13 03:56:44',NULL),(20,'eaque','Asperiores rerum quidem quibusdam hic quia laborum animi voluptatibus.','voluptas nisi','https://via.placeholder.com/640x480.png/00bbcc?text=omnis','Small','15.39','available',2,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(21,'sit','Et sint a ullam eveniet dolor repellat.','non dolorem','https://via.placeholder.com/640x480.png/0044dd?text=ab','Large','18.65','out_of_stock',2,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(22,'quibusdam','Qui quas et tempore qui.','ut molestiae provident','https://via.placeholder.com/640x480.png/00aa00?text=dolor','Small','88.52','out_of_stock',2,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(23,'reiciendis','Ex quidem ullam facere perferendis.','quisquam optio voluptates','https://via.placeholder.com/640x480.png/00cc44?text=fugit','Small','73.94','available',2,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(24,'delectus','Voluptas dolor id eaque quaerat.','voluptatum esse','https://via.placeholder.com/640x480.png/0055cc?text=adipisci','Medium','85.47','out_of_stock',2,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(25,'ipsum','Voluptatem deleniti eligendi voluptatum et.','voluptas amet ea','https://via.placeholder.com/640x480.png/0000bb?text=eligendi','Small','99.66','out_of_stock',2,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(26,'assumenda','Fugit rerum sit qui aut.','perspiciatis libero officia','https://via.placeholder.com/640x480.png/003366?text=ut','Large','74.12','out_of_stock',2,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(27,'facere','Ad ea labore totam in.','sit sint','https://via.placeholder.com/640x480.png/0055ff?text=ullam','Small','38.67','out_of_stock',2,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(28,'omnis','Aliquam impedit harum voluptas excepturi id laboriosam.','asperiores quidem hic','https://via.placeholder.com/640x480.png/001188?text=vitae','Small','61.78','out_of_stock',2,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(29,'libero','Labore ut sint placeat.','quia deserunt dolor','https://via.placeholder.com/640x480.png/003366?text=odit','Medium','31.61','out_of_stock',2,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(30,'harum','Molestias omnis fuga consequatur sint ipsum voluptas sint.','enim repellendus','https://via.placeholder.com/640x480.png/003311?text=omnis','Large','30.67','available',2,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(31,'rerum','Minus excepturi qui enim aperiam.','quis quis voluptates','https://via.placeholder.com/640x480.png/0044ee?text=ratione','Large','87.39','available',3,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(32,'consequatur','Ut commodi et suscipit quibusdam dolorum omnis.','delectus alias aspernatur','https://via.placeholder.com/640x480.png/00aaff?text=saepe','Medium','88.02','available',3,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(33,'similique','Architecto magni eos et tempore.','assumenda et','https://via.placeholder.com/640x480.png/002288?text=corrupti','Medium','93.49','available',3,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(34,'rem','Adipisci eum iusto aspernatur et hic magnam occaecati velit.','quas ut','https://via.placeholder.com/640x480.png/007766?text=natus','Medium','64.39','out_of_stock',3,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(35,'impedit','Voluptate accusantium aliquid perspiciatis aspernatur similique omnis accusamus.','et sunt','https://via.placeholder.com/640x480.png/00ee99?text=ad','Small','67.02','out_of_stock',3,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(36,'dignissimos','Occaecati consequuntur fugit deleniti consequuntur aut.','vel quasi','https://via.placeholder.com/640x480.png/00bb44?text=fugit','Medium','24.04','out_of_stock',3,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(37,'odit','Dolores est consequuntur id accusantium fugit eos possimus.','iusto est mollitia','https://via.placeholder.com/640x480.png/005555?text=nulla','Large','80.49','out_of_stock',3,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(38,'et','Illo non rem officiis.','numquam nulla','https://via.placeholder.com/640x480.png/00ff66?text=molestias','Medium','53.16','out_of_stock',3,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(39,'non','Doloremque qui pariatur fugit autem fugiat aut.','omnis voluptates','https://via.placeholder.com/640x480.png/00ee44?text=aperiam','Small','34.59','out_of_stock',3,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(40,'unde','Eum aut eligendi nobis quaerat accusamus.','ut occaecati nemo','https://via.placeholder.com/640x480.png/005511?text=voluptas','Small','47.25','available',3,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(41,'aut','Non mollitia nulla laboriosam voluptas.','voluptas soluta fugiat','https://via.placeholder.com/640x480.png/008833?text=debitis','Medium','40.71','out_of_stock',3,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(42,'omnis','Incidunt ullam cumque labore blanditiis nostrum repudiandae.','corrupti non enim','https://via.placeholder.com/640x480.png/005511?text=sint','Small','14.94','available',3,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(43,'autem','Voluptatem reprehenderit qui suscipit dolorem iste ducimus.','est aliquid','https://via.placeholder.com/640x480.png/00bbcc?text=recusandae','Small','77.94','available',3,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(44,'voluptate','Voluptatum maiores provident ex fugiat aspernatur.','minima ipsum','https://via.placeholder.com/640x480.png/008822?text=voluptates','Small','47.22','available',3,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(45,'quod','Expedita itaque sint ut odio esse.','saepe aut sed','https://via.placeholder.com/640x480.png/008811?text=qui','Small','72.88','out_of_stock',3,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(46,'et','Perferendis beatae consectetur facere rerum corporis quia.','sit tempora','https://via.placeholder.com/640x480.png/0077dd?text=dolorum','Large','59.67','available',4,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(47,'iste','Nobis laborum tempora molestiae minima est perferendis.','vel id','https://via.placeholder.com/640x480.png/004444?text=consectetur','Small','83.01','out_of_stock',4,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(48,'velit','Et doloribus voluptatibus est labore voluptatem corporis sed.','rerum enim assumenda','https://via.placeholder.com/640x480.png/00dd55?text=atque','Small','70.85','available',4,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(49,'non','Corrupti labore animi maxime ut.','est quia minima','https://via.placeholder.com/640x480.png/00ccdd?text=voluptatem','Large','68.66','available',4,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(50,'ut','Placeat unde ex quia voluptas tenetur neque rerum fugiat.','autem harum','https://via.placeholder.com/640x480.png/003399?text=non','Medium','46.04','available',4,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(51,'eos','Accusamus atque numquam et magnam assumenda labore quaerat minus.','voluptatibus hic voluptatum','https://via.placeholder.com/640x480.png/007700?text=sint','Small','31.79','out_of_stock',4,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(52,'tenetur','Nemo quo qui itaque aut.','accusantium aut','https://via.placeholder.com/640x480.png/006633?text=ea','Large','39.91','out_of_stock',4,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(53,'et','Accusantium velit eum et explicabo officiis odio.','officiis corrupti','https://via.placeholder.com/640x480.png/008833?text=sequi','Small','48.93','out_of_stock',4,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(54,'quo','Explicabo saepe voluptates molestiae ut est.','quo expedita','https://via.placeholder.com/640x480.png/0033aa?text=ad','Large','31.4','available',4,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(55,'autem','Labore sit molestiae at nesciunt fuga laborum aut.','deserunt ut reprehenderit','https://via.placeholder.com/640x480.png/005599?text=cupiditate','Large','83.82','available',4,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(56,'ut','Ducimus sed nihil non et.','fugit accusamus','https://via.placeholder.com/640x480.png/0000cc?text=qui','Large','23.46','available',4,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(57,'iure','Sunt dolore ut voluptatem sed.','ab sunt','https://via.placeholder.com/640x480.png/000000?text=eveniet','Large','56.1','available',4,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(58,'dolor','Voluptatum iusto est odit soluta laboriosam molestiae voluptatem.','nesciunt sapiente','https://via.placeholder.com/640x480.png/00ff44?text=quisquam','Small','30.7','available',4,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(59,'voluptatem','Similique dolorem fugit maiores dolores placeat a commodi.','amet qui delectus','https://via.placeholder.com/640x480.png/008866?text=placeat','Large','45.12','out_of_stock',4,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(60,'ad','Quo iure sapiente quam.','est facilis sed','https://via.placeholder.com/640x480.png/00dd33?text=odio','Medium','56.36','available',4,'2023-12-12 04:09:22','2023-12-12 04:09:22',NULL),(61,'gfgfv','ggg',NULL,'gfgf',NULL,'45','available',1,'2023-12-12 04:26:48','2023-12-12 04:26:48',NULL),(62,'Product 1','Product 1',NULL,'product_images/qlw9Ci7bt1gHs62DmLjkv7KvwZxtrHhVbv5o8R6B.png',NULL,'12','available',2,'2023-12-12 16:20:52','2023-12-12 16:20:52',NULL),(63,'Product 2','Product 2',NULL,'images/product_images/2y3sXBtVlJd6R2yWIPBxd0KotFrVYhfEjjbFqbhb.png',NULL,'10','available',1,'2023-12-12 16:26:57','2023-12-12 16:26:57',NULL),(64,'Bauer Core Lockup Crew Senior Short Sleeve Tee Shirt','Bauer Core Lockup Crew Senior Short Sleeve Tee Shirt',NULL,'images/product_images/enltKqfiVYJCNKxcsoOYWLOQeoarqMhiMXUknpsp.png',NULL,'21','available',1,'2023-12-13 03:33:10','2023-12-13 03:33:10',NULL);
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
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `provinces_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provinces`
--

LOCK TABLES `provinces` WRITE;
/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
INSERT INTO `provinces` VALUES (1,'Alberta','2023-12-15 10:00:34','2023-12-15 10:00:34'),(2,'British Columbia','2023-12-15 10:00:34','2023-12-15 10:00:34'),(3,'Manitoba','2023-12-15 10:00:34','2023-12-15 10:00:34'),(4,'New Brunswick','2023-12-15 10:00:34','2023-12-15 10:00:34'),(5,'Newfoundland and Labrador','2023-12-15 10:00:34','2023-12-15 10:00:34'),(6,'Nova Scotia','2023-12-15 10:00:34','2023-12-15 10:00:34'),(7,'Ontario','2023-12-15 10:00:34','2023-12-15 10:00:34'),(8,'Prince Edward Island','2023-12-15 10:00:34','2023-12-15 10:00:34'),(9,'Quebec','2023-12-15 10:00:34','2023-12-15 10:00:34'),(10,'Saskatchewan','2023-12-15 10:00:34','2023-12-15 10:00:34');
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
  `role_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taxes`
--

LOCK TABLES `taxes` WRITE;
/*!40000 ALTER TABLE `taxes` DISABLE KEYS */;
INSERT INTO `taxes` VALUES (1,1,5.00,0.00,0.00,'2023-12-15 10:00:34','2023-12-15 10:00:34'),(2,2,5.00,7.00,0.00,'2023-12-15 10:00:34','2023-12-15 10:00:34'),(3,3,5.00,7.00,0.00,'2023-12-15 10:00:34','2023-12-15 10:00:34'),(4,4,0.00,0.00,15.00,'2023-12-15 10:00:34','2023-12-15 10:00:34'),(5,5,0.00,0.00,15.00,'2023-12-15 10:00:34','2023-12-15 10:00:34'),(6,6,0.00,0.00,15.00,'2023-12-15 10:00:34','2023-12-15 10:00:34'),(7,7,0.00,0.00,13.00,'2023-12-15 10:00:34','2023-12-15 10:00:34'),(8,8,0.00,0.00,15.00,'2023-12-15 10:00:34','2023-12-15 10:00:34'),(9,9,5.00,9.98,0.00,'2023-12-15 10:00:34','2023-12-15 10:00:34'),(10,10,5.00,6.00,0.00,'2023-12-15 10:00:34','2023-12-15 10:00:34');
/*!40000 ALTER TABLE `taxes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_line_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_line_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
INSERT INTO `users` VALUES (1,'Sample User','John','Doe','Male','1990-01-01','admin@gmail.com','$2y$12$23iES6rxJUUUswAt8vsOueUjlOdEUgIh0kpHbkIuEWvDC0fjCOiCO','1234567890','admin_user','123 Main St','Apt 45','Sample City',NULL,'Sample Country','12345',1,NULL,'2023-12-15 10:00:33','2023-12-15 10:00:33'),(2,'Sample User','John','Doe','Male','1990-01-01','sample@example.com','$2y$12$t/dD6iXxU5L/hcIPsCUbR..EMZJA3tAGGWe.g39fh3HMG4b89vt4i','1234567890','sample_user','123 Main St','Apt 45','Sample City',NULL,'Sample Country','12345',0,NULL,'2023-12-15 10:00:33','2023-12-15 10:00:33');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlists`
--

LOCK TABLES `wishlists` WRITE;
/*!40000 ALTER TABLE `wishlists` DISABLE KEYS */;
INSERT INTO `wishlists` VALUES (3,1,1,'2023-12-15 10:30:20','2023-12-15 10:30:20'),(4,1,3,'2023-12-15 10:32:44','2023-12-15 10:32:44');
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

-- Dump completed on 2023-12-14 23:11:03
