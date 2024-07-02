-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: laraluxdb
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `booking_details`
--

DROP TABLE IF EXISTS `booking_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `booking_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bookings_id` int(11) NOT NULL,
  `rooms_id` int(11) NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL,
  `adult` int(11) NOT NULL,
  `children` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_booking_details_bookings1_idx` (`bookings_id`),
  KEY `fk_booking_details_rooms1_idx` (`rooms_id`),
  CONSTRAINT `fk_booking_details_bookings1` FOREIGN KEY (`bookings_id`) REFERENCES `bookings` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_booking_details_rooms1` FOREIGN KEY (`rooms_id`) REFERENCES `rooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking_details`
--

LOCK TABLES `booking_details` WRITE;
/*!40000 ALTER TABLE `booking_details` DISABLE KEYS */;
INSERT INTO `booking_details` VALUES (51,1,1,'2024-07-01 14:00:00','2024-07-05 12:00:00',2,1,1,'2024-06-24 19:00:15','2024-06-24 19:00:15',NULL),(52,2,2,'2024-08-01 14:00:00','2024-08-03 12:00:00',1,0,1,'2024-06-24 19:00:15','2024-06-24 19:00:15',NULL),(53,3,3,'2024-09-15 14:00:00','2024-09-20 12:00:00',2,2,1,'2024-06-24 19:00:15','2024-06-24 19:00:15',NULL),(54,4,4,'2024-10-10 14:00:00','2024-10-15 12:00:00',2,0,1,'2024-06-24 19:00:15','2024-06-24 19:00:15',NULL),(55,5,5,'2024-11-05 14:00:00','2024-11-10 12:00:00',1,1,1,'2024-06-24 19:00:15','2024-06-24 19:00:15',NULL),(56,6,6,'2024-12-01 14:00:00','2024-12-05 12:00:00',3,0,1,'2024-06-24 19:00:15','2024-06-24 19:00:15',NULL),(57,7,7,'2024-07-10 14:00:00','2024-07-15 12:00:00',2,1,1,'2024-06-24 19:00:15','2024-06-24 19:00:15',NULL),(58,8,8,'2024-08-20 14:00:00','2024-08-25 12:00:00',1,0,1,'2024-06-24 19:00:15','2024-06-24 19:00:15',NULL),(59,9,9,'2024-09-25 14:00:00','2024-09-30 12:00:00',2,2,1,'2024-06-24 19:00:15','2024-06-24 19:00:15',NULL),(60,10,10,'2024-10-20 14:00:00','2024-10-25 12:00:00',2,1,1,'2024-06-24 19:00:15','2024-06-24 19:00:15',NULL);
/*!40000 ALTER TABLE `booking_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_price` double NOT NULL,
  `users_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bookings_users1_idx` (`users_id`),
  CONSTRAINT `fk_bookings_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (1,100000,63,'2024-06-24 19:00:15','2024-06-24 19:00:15',NULL),(2,150000,64,'2024-06-24 19:00:15','2024-06-24 19:00:15',NULL),(3,800000,65,'2024-06-24 19:00:15','2024-06-24 19:00:15',NULL),(4,200000,66,'2024-06-24 19:00:15','2024-06-24 19:00:15',NULL),(5,500000,67,'2024-06-24 19:00:15','2024-06-24 19:00:15',NULL),(6,250000,68,'2024-06-24 19:00:15','2024-06-24 19:00:15',NULL),(7,300000,69,'2024-06-24 19:00:15','2024-06-24 19:00:15',NULL),(8,400000,70,'2024-06-24 19:00:15','2024-06-24 19:00:15',NULL),(9,500000,71,'2024-06-24 19:00:15','2024-06-24 19:00:15',NULL),(10,120000,72,'2024-06-24 19:00:15','2024-06-24 19:00:15',NULL);
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `citys`
--

DROP TABLE IF EXISTS `citys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `states_id` int(11) NOT NULL,
  `longitude` longtext DEFAULT NULL,
  `latitude` longtext DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_citys_states1_idx` (`states_id`),
  CONSTRAINT `fk_citys_states1` FOREIGN KEY (`states_id`) REFERENCES `states` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citys`
--

LOCK TABLES `citys` WRITE;
/*!40000 ALTER TABLE `citys` DISABLE KEYS */;
INSERT INTO `citys` VALUES (1,'Surabaya',NULL,NULL,NULL,1,'112.7508','-7.2575'),(2,'Malang',NULL,NULL,NULL,1,'112.6303','-7.9666'),(3,'Kediri',NULL,NULL,NULL,1,'112.0110','-7.8228'),(4,'Denpasar',NULL,NULL,NULL,2,'115.2167','-8.6500'),(5,'Ubud',NULL,NULL,NULL,2,'115.2625','-8.5069'),(6,'Kuta',NULL,NULL,NULL,2,'115.1667','-8.7231'),(7,'Bandung',NULL,NULL,NULL,3,'107.6098','-6.9175'),(8,'Bekasi',NULL,NULL,NULL,3,'106.9896','-6.2349'),(9,'Bogor',NULL,NULL,NULL,3,'106.8060','-6.5966'),(10,'Sapporo',NULL,NULL,NULL,4,'141.3545','43.0642'),(11,'Hakodate',NULL,NULL,NULL,4,'140.7368','41.7688'),(12,'Asahikawa',NULL,NULL,NULL,4,'142.3598','43.7706'),(13,'Tokyo',NULL,NULL,NULL,5,'139.6917','35.6895'),(14,'Yokohama',NULL,NULL,NULL,5,'139.6380','35.4437'),(15,'Chiba',NULL,NULL,NULL,5,'140.1063','35.6073'),(16,'Sendai',NULL,NULL,NULL,6,'140.8721','38.2682'),(17,'Aomori',NULL,NULL,NULL,6,'140.7400','40.8221'),(18,'Morioka',NULL,NULL,NULL,6,'141.1525','39.7036'),(19,'Hamburg',NULL,NULL,NULL,7,'9.9937','53.5511'),(20,'Altona',NULL,NULL,NULL,7,'9.9337','53.5490'),(21,'Wandsbek',NULL,NULL,NULL,7,'10.0546','53.5880'),(22,'Bremen',NULL,NULL,NULL,8,'8.8017','53.0793'),(23,'Bremerhaven',NULL,NULL,NULL,8,'8.5809','53.5396'),(24,'Frankfurt',NULL,NULL,NULL,9,'8.6821','50.1109'),(25,'Wiesbaden',NULL,NULL,NULL,9,'8.2398','50.0826'),(26,'Darmstadt',NULL,NULL,NULL,9,'8.6512','49.8728');
/*!40000 ALTER TABLE `citys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countrys`
--

DROP TABLE IF EXISTS `countrys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countrys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countrys`
--

LOCK TABLES `countrys` WRITE;
/*!40000 ALTER TABLE `countrys` DISABLE KEYS */;
INSERT INTO `countrys` VALUES (1,'Indonesia',NULL,NULL,NULL),(2,'Japan',NULL,NULL,NULL),(3,'Germany',NULL,NULL,NULL);
/*!40000 ALTER TABLE `countrys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
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
-- Table structure for table `hotel_types`
--

DROP TABLE IF EXISTS `hotel_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotel_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotel_types`
--

LOCK TABLES `hotel_types` WRITE;
/*!40000 ALTER TABLE `hotel_types` DISABLE KEYS */;
INSERT INTO `hotel_types` VALUES (1,'City Hotel',NULL,NULL,NULL),(2,'Residential Hotel',NULL,NULL,NULL),(3,'Motel',NULL,NULL,NULL),(4,'Fancy Hotel','2024-07-01 04:49:23','2024-07-01 04:49:23',NULL),(5,'Hotel Megah','2024-07-01 04:51:05','2024-07-01 04:51:05',NULL),(6,'Hotel Sawahan','2024-07-01 04:53:28','2024-07-01 07:55:10','2024-07-01 07:55:10'),(7,'Mantap Hotel','2024-07-01 04:58:34','2024-07-01 07:09:08','2024-07-01 07:09:08'),(8,'Hotel Meriah','2024-07-01 05:01:26','2024-07-01 07:57:03',NULL),(9,'Hotel Mewah','2024-07-01 07:16:14','2024-07-01 07:16:14',NULL);
/*!40000 ALTER TABLE `hotel_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotel_user_reviews`
--

DROP TABLE IF EXISTS `hotel_user_reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotel_user_reviews` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `hotel_id` bigint(20) unsigned NOT NULL,
  `rating` int(11) NOT NULL,
  `review` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `hotel_user_reviews_user_id_foreign` (`user_id`),
  KEY `hotel_user_reviews_hotel_id_foreign` (`hotel_id`),
  CONSTRAINT `hotel_user_reviews_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE,
  CONSTRAINT `hotel_user_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotel_user_reviews`
--

LOCK TABLES `hotel_user_reviews` WRITE;
/*!40000 ALTER TABLE `hotel_user_reviews` DISABLE KEYS */;
INSERT INTO `hotel_user_reviews` VALUES (1,63,1,5,'Amazing experience at Surabaya Paradise!','2024-06-20 03:00:00','2024-06-20 03:00:00',NULL),(2,63,2,3,'Good stay at Gotham Inn, but could be better.','2024-06-21 04:00:00','2024-06-21 04:00:00',NULL),(3,64,3,5,'Hogwarts Hotel was magical!','2024-06-22 02:00:00','2024-06-22 02:00:00',NULL),(4,65,4,3,'Marvel Mansion was okay, but not great.','2024-06-23 05:00:00','2024-06-23 05:00:00',NULL),(5,66,5,4,'Enjoyed my stay at Malang Cozy Inn.','2024-06-24 06:00:00','2024-06-24 06:00:00',NULL),(6,67,6,4,'Panda Palace was relaxing with a great view.','2024-06-25 07:00:00','2024-06-25 07:00:00',NULL),(7,68,7,5,'Loved the Ninja Village theme!','2024-06-26 08:00:00','2024-06-26 08:00:00',NULL),(8,69,8,4,'Jurassic Lodge was fun for the whole family.','2024-06-27 09:00:00','2024-06-27 09:00:00',NULL),(9,70,9,4,'Kediri Chill Spot had great vibes and views.','2024-06-28 10:00:00','2024-06-28 10:00:00',NULL),(10,71,10,2,'Stark Tower was not up to expectations.','2024-06-29 11:00:00','2024-06-29 11:00:00',NULL),(11,72,11,5,'Star Wars Inn was a dream come true!','2024-06-30 12:00:00','2024-06-30 12:00:00',NULL),(12,64,12,1,'Mordor Motel was terrible. Would not recommend.','2024-07-01 13:00:00','2024-07-01 13:00:00',NULL),(13,66,13,4,'Denpasar Dreams was a good stay overall.','2024-07-02 14:00:00','2024-07-02 14:00:00',NULL),(14,63,14,5,'Hobbit Haven was very cozy and charming.','2024-07-03 15:00:00','2024-07-03 15:00:00',NULL),(15,67,15,2,'Atlantis Resort was below expectations.','2024-07-04 16:00:00','2024-07-04 16:00:00',NULL);
/*!40000 ALTER TABLE `hotel_user_reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotels`
--

DROP TABLE IF EXISTS `hotels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotels` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `description` longtext NOT NULL,
  `address` longtext NOT NULL,
  `citys_id` int(11) NOT NULL,
  `image` longtext NOT NULL,
  `email` varchar(128) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `hotel_types_id` int(11) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_hotels_city1_idx` (`citys_id`),
  KEY `fk_hotels_hotel_types1_idx` (`hotel_types_id`),
  CONSTRAINT `fk_hotels_city1` FOREIGN KEY (`citys_id`) REFERENCES `citys` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_hotels_hotel_types1` FOREIGN KEY (`hotel_types_id`) REFERENCES `hotel_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotels`
--

LOCK TABLES `hotels` WRITE;
/*!40000 ALTER TABLE `hotels` DISABLE KEYS */;
INSERT INTO `hotels` VALUES (1,'Surabaya Paradise','Experience luxury in the heart of the city.','Jl. Kenangan No.1, Surabaya',1,'surabaya_paradise.jpg','surabaya.paradise@example.com',NULL,NULL,NULL,1,''),(2,'Gotham Inn','Stay like a superhero in the heart of Surabaya.','Jl. Batman No.10, Surabaya',1,'gotham_inn.jpg','gotham.inn@example.com',NULL,NULL,NULL,1,''),(3,'Hogwarts Hotel','Magical stays with a touch of wizardry.','Jl. Hogwarts No.4, Surabaya',1,'hogwarts_hotel.jpg','hogwarts.hotel@example.com',NULL,NULL,NULL,1,''),(4,'Marvel Mansion','A super stay for Marvel fans.','Jl. Avengers No.7, Surabaya',1,'marvel_mansion.jpg','marvel.mansion@example.com',NULL,NULL,NULL,1,''),(5,'Malang Cozy Inn','Cozy and affordable stay in Malang.','Jl. Bromo No.5, Malang',2,'malang_cozy_inn.jpg','malang.cozy.inn@example.com',NULL,NULL,NULL,2,''),(6,'Panda Palace','Relax with a bamboo view.','Jl. Panda No.3, Malang',2,'panda_palace.jpg','panda.palace@example.com',NULL,NULL,NULL,2,''),(7,'Ninja Village','Stealthy stays with a view.','Jl. Shinobi No.6, Malang',2,'ninja_village.jpg','ninja.village@example.com',NULL,NULL,NULL,2,''),(8,'Jurassic Lodge','Dino-themed fun for the whole family.','Jl. Dino No.9, Malang',2,'jurassic_lodge.jpg','jurassic.lodge@example.com',NULL,NULL,NULL,2,''),(9,'Kediri Chill Spot','Chill vibes with great views in Kediri.','Jl. Semeru No.9, Kediri',3,'kediri_chill_spot.jpg','kediri.chill.spot@example.com',NULL,NULL,NULL,2,''),(10,'Stark Tower','Tech-savvy stays for the future.','Jl. Stark No.1, Kediri',3,'stark_tower.jpg','stark.tower@example.com',NULL,NULL,NULL,2,''),(11,'Star Wars Inn','May the force be with your stay.','Jl. Jedi No.3, Kediri',3,'star_wars_inn.jpg','star.wars.inn@example.com',NULL,NULL,NULL,2,''),(12,'Mordor Motel','One stay to rule them all.','Jl. Ring No.5, Kediri',3,'mordor_motel.jpg','mordor.motel@example.com',NULL,NULL,NULL,2,''),(13,'Denpasar Dreams','Your dream vacation starts here.','Jl. Bali No.1, Denpasar',4,'denpasar_dreams.jpg','denpasar.dreams@example.com',NULL,NULL,NULL,1,''),(14,'Hobbit Haven','A cozy stay in the shire.','Jl. Shire No.2, Denpasar',4,'hobbit_haven.jpg','hobbit.haven@example.com',NULL,NULL,NULL,1,''),(15,'Atlantis Resort','Underwater luxury experience.','Jl. Ocean No.3, Denpasar',4,'atlantis_resort.jpg','atlantis.resort@example.com',NULL,NULL,NULL,1,''),(16,'Wakanda Retreat','A futuristic retreat in Bali.','Jl. Panther No.4, Denpasar',4,'wakanda_retreat.jpg','wakanda.retreat@example.com',NULL,NULL,NULL,1,''),(17,'Hamburg Harbor Hotel','Enjoy the maritime charm of Hamburg.','Elbchaussee 124, Hamburg',19,'hamburg_harbor_hotel.jpg','hamburg.harbor@example.com',NULL,NULL,NULL,3,''),(18,'Lion King Lodge','Feel the spirit of the savannah in Hamburg.','Jungfernstieg 5, Hamburg',19,'lion_king_lodge.jpg','lion.king.lodge@example.com',NULL,NULL,NULL,1,''),(19,'Wurst World Hotel','Experience the taste of Hamburg in every room.','Reeperbahn 55, Hamburg',19,'wurst_world_hotel.jpg','wurst.world.hotel@example.com',NULL,NULL,NULL,2,''),(20,'Bremen Bliss Hotel','Discover peace and serenity in Bremen.','Schlachte 15, Bremen',23,'bremen_bliss_hotel.jpg','bremen.bliss@example.com',NULL,'2024-07-01 02:52:55',NULL,1,'+6281916129294'),(21,'Space Station Bremen','Embark on an interstellar journey in Bremen.','Am Wall 153, Bremen',22,'space_station_bremen.jpg','space.station.bremen@example.com',NULL,'2024-07-01 00:16:11',NULL,2,'+6281916129294'),(22,'Fairytale Castle Hotel','Live your fairytale dreams in Bremen.','Breitenweg 45, Bremen',22,'fairytale_castle_hotel.jpg','fairytale.castle@example.com',NULL,'2024-07-01 00:15:42',NULL,3,'+6281916129294'),(23,'Ubud Serenity Hotel','Escape to tranquility in Ubud.','Jl. Monkey Forest No. 15, Ubud',5,'ubud_serenity_hotel.jpg','ubud.serenity@example.com',NULL,'2024-07-01 00:14:14',NULL,1,'+6281916129294'),(63,'Cool Hotel','Really Cool Hotel no Cap','Sesame Street 123',23,'picsum','Cool@cool.com','2024-07-01 00:36:36','2024-07-01 05:29:48','2024-07-01 05:29:48',2,'+6281916129294'),(64,'Hotel Tachibanaz','Hotel shockingly good','Jl. Kaijin Augmented',13,'image','kaijin@kaijin.com','2024-07-01 03:06:33','2024-07-01 07:16:35',NULL,3,'+6281916129293');
/*!40000 ALTER TABLE `hotels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2024_06_24_192845_create_countrys_table',1),(6,'2024_06_24_192846_create_states_table',1),(7,'2024_06_24_192847_create_citys_table',1),(8,'2024_06_24_192848_create_hotel_types_table',1),(9,'2024_06_24_192849_create_hotels_table',1),(10,'2024_06_24_192849_create_roles_table',1),(12,'2024_06_24_192851_create_bookings_table',1),(13,'2024_06_24_192852_create_room_types_table',1),(14,'2024_06_24_192853_create_rooms_table',1),(15,'2024_06_24_192854_create_booking_details_table',1),(16,'2024_06_24_192854_create_points_table',1),(17,'2024_06_24_192855_create_products_table',1),(22,'2024_06_26_075302_update_hotels_table',2),(23,'2024_06_26_084913_create_hotel_user_reviews_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
-- Table structure for table `points`
--

DROP TABLE IF EXISTS `points`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `points` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `points` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `users_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_points_users1_idx` (`users_id`),
  CONSTRAINT `fk_points_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `points`
--

LOCK TABLES `points` WRITE;
/*!40000 ALTER TABLE `points` DISABLE KEYS */;
INSERT INTO `points` VALUES (1,1,'2024-06-24 19:03:04',NULL,NULL,63),(2,5,'2024-06-24 19:03:04',NULL,NULL,63),(3,1,'2024-06-24 19:03:04',NULL,NULL,63),(4,5,'2024-06-24 19:03:04',NULL,NULL,64),(5,1,'2024-06-24 19:03:04',NULL,NULL,64),(6,1,'2024-06-24 19:03:04',NULL,NULL,64),(7,5,'2024-06-24 19:03:04',NULL,NULL,65),(8,1,'2024-06-24 19:03:04',NULL,NULL,65),(9,5,'2024-06-24 19:03:04',NULL,NULL,66),(10,5,'2024-06-24 19:03:04',NULL,NULL,66),(11,5,'2024-06-24 19:03:04',NULL,NULL,66),(12,1,'2024-06-24 19:03:04',NULL,NULL,67),(13,5,'2024-06-24 19:03:04',NULL,NULL,67),(14,1,'2024-06-24 19:03:04',NULL,NULL,68),(15,1,'2024-06-24 19:03:04',NULL,NULL,68),(16,5,'2024-06-24 19:03:04',NULL,NULL,69),(17,5,'2024-06-24 19:03:04',NULL,NULL,69),(18,5,'2024-06-24 19:03:04',NULL,NULL,69),(19,1,'2024-06-24 19:03:04',NULL,NULL,70),(20,1,'2024-06-24 19:03:04',NULL,NULL,70),(21,5,'2024-06-24 19:03:04',NULL,NULL,71),(22,1,'2024-06-24 19:03:04',NULL,NULL,71),(23,1,'2024-06-24 19:03:04',NULL,NULL,71),(24,1,'2024-06-24 19:03:04',NULL,NULL,71),(25,5,'2024-06-24 19:03:04',NULL,NULL,72),(26,5,'2024-06-24 19:03:04',NULL,NULL,72),(27,5,'2024-06-24 19:03:04',NULL,NULL,72),(28,1,'2024-06-24 19:03:04',NULL,NULL,72),(29,1,'2024-06-24 19:03:04',NULL,NULL,72),(30,-1,NULL,NULL,NULL,63);
/*!40000 ALTER TABLE `points` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `category` tinyint(4) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `icon` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `rooms_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_rooms1_idx` (`rooms_id`),
  CONSTRAINT `fk_products_rooms1` FOREIGN KEY (`rooms_id`) REFERENCES `rooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'King Bed',1,1,'fa fa-bed','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,1),(2,'Bathroom',1,1,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,1),(3,'Wi-Fi',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,1),(4,'Breakfast',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,1),(5,'Queen Bed',1,1,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,2),(6,'Bathroom',1,1,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,2),(7,'Wi-Fi',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,2),(8,'Gym Access',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,2),(9,'Double Bed',1,2,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,3),(10,'Bathroom',1,1,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,3),(11,'Wi-Fi',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,3),(12,'Breakfast',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,3),(13,'Two Queen Beds',1,2,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,4),(14,'Bathroom',1,1,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,4),(15,'Wi-Fi',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,4),(16,'Pool Access',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,4),(17,'Single Bed',1,1,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,5),(18,'Shared Bathroom',1,1,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,5),(19,'Wi-Fi',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,5),(20,'Breakfast',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,5),(21,'King Bed',1,1,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,6),(22,'Bathroom',1,1,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,6),(23,'Wi-Fi',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,6),(24,'Gym Access',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,6),(25,'King Bed',1,1,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,7),(26,'Bathroom',1,1,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,7),(27,'Wi-Fi',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,7),(28,'Breakfast',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,7),(29,'Double Bed',1,1,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,8),(30,'Bathroom',1,1,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,8),(31,'Wi-Fi',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,8),(32,'Pool Access',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,8),(33,'King Bed',1,1,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,9),(34,'Bathroom',1,1,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,9),(35,'Wi-Fi',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,9),(36,'Gym Access',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,9),(37,'Queen Bed',1,1,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,10),(38,'Bathroom',1,1,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,10),(39,'Wi-Fi',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,10),(40,'Breakfast',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,10),(41,'Double Bed',1,2,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,11),(42,'Bathroom',1,1,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,11),(43,'Wi-Fi',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,11),(44,'Gym Access',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,11),(45,'King Bed',1,1,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,12),(46,'Bathroom',1,1,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,12),(47,'Wi-Fi',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,12),(48,'Breakfast',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,12),(49,'Double Bed',1,2,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,13),(50,'Bathroom',1,1,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,13),(51,'Wi-Fi',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,13),(52,'Gym Access',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,13),(53,'Triple Bed',1,3,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,14),(54,'Bathroom',1,1,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,14),(55,'Wi-Fi',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,14),(56,'Breakfast',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,14),(57,'King Bed',1,1,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,15),(58,'Bathroom',1,1,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,15),(59,'Wi-Fi',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,15),(60,'Pool Access',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,15),(61,'Queen Bed',1,1,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,16),(62,'Bathroom',1,1,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,16),(63,'Wi-Fi',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,16),(64,'Breakfast',0,NULL,'','2024-06-24 19:09:43','2024-06-24 19:09:43',NULL,16),(65,'Swimming Pool',0,NULL,'fa fa-swimming-pool','2024-07-02 07:08:15','2024-07-02 07:08:15',NULL,1),(68,'Gym',0,NULL,'fa fa-dumbbell','2024-07-02 07:15:41','2024-07-02 07:15:41',NULL,1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Owner',NULL,NULL,NULL),(2,'Staf',NULL,NULL,NULL),(3,'Customer',NULL,NULL,NULL),(4,'Members',NULL,NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_types`
--

DROP TABLE IF EXISTS `room_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_types`
--

LOCK TABLES `room_types` WRITE;
/*!40000 ALTER TABLE `room_types` DISABLE KEYS */;
INSERT INTO `room_types` VALUES (1,'Standard',NULL,NULL,NULL),(2,'Deluxe',NULL,NULL,NULL),(3,'Superior',NULL,NULL,NULL),(4,'Suite',NULL,NULL,NULL),(5,'Single Room',NULL,NULL,NULL),(6,'Double Room',NULL,NULL,NULL),(7,'Family Room',NULL,NULL,NULL),(8,'Kings','2024-07-01 08:44:44','2024-07-01 08:45:16',NULL);
/*!40000 ALTER TABLE `room_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `price` double NOT NULL,
  `capacity` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `image` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `room_types_id` int(11) NOT NULL,
  `hotels_id` bigint(20) unsigned NOT NULL,
  `availability` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `fk_rooms_room_types1_idx` (`room_types_id`),
  KEY `fk_rooms_hotels1_idx` (`hotels_id`),
  CONSTRAINT `fk_rooms_hotels1` FOREIGN KEY (`hotels_id`) REFERENCES `hotels` (`id`),
  CONSTRAINT `fk_rooms_room_types1` FOREIGN KEY (`room_types_id`) REFERENCES `room_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (1,'Deluxe Room',100000,2,'A spacious room with a king-sized bed and city view.','deluxe_room.jpg','2024-06-24 19:00:15','2024-07-02 03:30:55',NULL,2,1,0),(2,'Superior Room',150000,2,'An upgraded room with luxury amenities and a city view.','superior_room.jpg','2024-06-24 19:00:15','2024-06-24 19:00:15',NULL,1,2,0),(3,'Standard Room',800000,2,'A comfortable room with essential amenities.','standard_room.jpg','2024-06-24 19:00:15','2024-06-24 19:00:15',NULL,1,3,0),(4,'Family Suite',200000,4,'A large suite perfect for families, with two queen-sized beds.','family_suite.jpg','2024-06-24 19:00:15','2024-06-24 19:00:15',NULL,2,4,0),(5,'Single Room',500000,1,'A compact room for solo travelers.','single_room.jpg','2024-06-24 19:00:15','2024-06-24 19:00:15',NULL,1,5,0),(6,'Executive Suite',250000,2,'A luxurious suite with a separate living area.','executive_suite.jpg','2024-06-24 19:00:15','2024-06-24 19:00:15',NULL,3,6,0),(7,'Honeymoon Suite',300000,2,'A romantic suite with a king-sized bed and jacuzzi.','honeymoon_suite.jpg','2024-06-24 19:00:15','2024-06-24 19:00:15',NULL,3,7,0),(8,'Economy Room',400000,2,'A budget-friendly room with basic amenities.','economy_room.jpg','2024-06-24 19:00:15','2024-06-24 19:00:15',NULL,1,8,0),(9,'Presidential Suite',500000,2,'The most luxurious suite in the hotel, with a panoramic view.','presidential_suite.jpg','2024-06-24 19:00:15','2024-06-24 19:00:15',NULL,3,9,0),(10,'Garden View Room',120000,2,'A room with a beautiful view of the garden.','garden_view_room.jpg','2024-06-24 19:00:15','2024-06-24 19:00:15',NULL,2,10,0),(11,'Ocean View Room',180000,2,'A room with a stunning view of the ocean.','ocean_view_room.jpg','2024-06-24 19:00:15','2024-06-24 19:00:15',NULL,2,11,0),(12,'Penthouse Suite',400000,4,'A top-floor suite with a private terrace.','penthouse_suite.jpg','2024-06-24 19:00:15','2024-06-24 19:00:15',NULL,3,12,0),(13,'Double Room',900000,2,'A room with two double beds.','double_room.jpg','2024-06-24 19:00:15','2024-06-24 19:00:15',NULL,1,13,0),(14,'Triple Room',1100000,3,'A room with three single beds.','triple_room.jpg','2024-06-24 19:00:15','2024-06-24 19:00:15',NULL,1,14,0),(15,'Luxury Suite',350000,2,'An upscale suite with premium amenities.','luxury_suite.jpg','2024-06-24 19:00:15','2024-06-24 19:00:15',NULL,3,15,0),(16,'Junior Suite',220000,2,'A suite with a separate sitting area.','junior_suite.jpg','2024-06-24 19:00:15','2024-06-24 19:00:15',NULL,2,16,0),(17,'Bestie Room',500000,2,'A room for besties','',NULL,NULL,NULL,6,14,0),(18,'Null Room',150000,2,'An empty room','something','2024-07-02 03:51:05','2024-07-02 06:33:45',NULL,1,1,1),(19,'Apa Hotel',1600000,3,'Curiousity surprises','A','2024-07-02 03:59:07','2024-07-02 04:04:41','2024-07-02 04:04:41',7,2,1),(20,'Kamar Mantap',1,1,'Kamar Keren','aasa','2024-07-02 04:07:44','2024-07-02 06:54:02','2024-07-02 06:54:02',2,1,1);
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `countrys_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_states_countrys1_idx` (`countrys_id`),
  CONSTRAINT `fk_states_countrys1` FOREIGN KEY (`countrys_id`) REFERENCES `countrys` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES (1,'Jawa Timur',NULL,NULL,NULL,1),(2,'Jawa Timur',NULL,NULL,NULL,1),(3,'Bali',NULL,NULL,NULL,1),(4,'Jawa Barat',NULL,NULL,NULL,1),(5,'Hokkaido',NULL,NULL,NULL,2),(6,'Kanto',NULL,NULL,NULL,2),(7,'Tohoku',NULL,NULL,NULL,2),(8,'Hamburg',NULL,NULL,NULL,3),(9,'Bremen',NULL,NULL,NULL,3),(10,'Hesse',NULL,NULL,NULL,3);
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` timestamp NULL DEFAULT NULL,
  `img` longtext NOT NULL DEFAULT '#',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `roles_id` int(11) NOT NULL DEFAULT 3,
  PRIMARY KEY (`id`),
  KEY `fk_users_roles_idx` (`roles_id`),
  CONSTRAINT `fk_users_roles` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Surabaya Paradise Staff','surabaya.paradise.staff@example.com',NULL,'staffpassword',NULL,'staffimg.jpg',NULL,NULL,NULL,2),(2,'Gotham Inn Staff','gotham.inn.staff@example.com',NULL,'staffpassword',NULL,'staffimg.jpg',NULL,NULL,NULL,2),(3,'Hogwarts Hotel Staff','hogwarts.hotel.staff@example.com',NULL,'staffpassword',NULL,'staffimg.jpg',NULL,NULL,NULL,2),(4,'Marvel Mansion Staff','marvel.mansion.staff@example.com',NULL,'staffpassword',NULL,'staffimg.jpg',NULL,NULL,NULL,2),(5,'Malang Cozy Inn Staff','malang.cozy.inn.staff@example.com',NULL,'staffpassword',NULL,'staffimg.jpg',NULL,NULL,NULL,2),(6,'Panda Palace Staff','panda.palace.staff@example.com',NULL,'staffpassword',NULL,'staffimg.jpg',NULL,NULL,NULL,2),(7,'Ninja Village Staff','ninja.village.staff@example.com',NULL,'staffpassword',NULL,'staffimg.jpg',NULL,NULL,NULL,2),(8,'Jurassic Lodge Staff','jurassic.lodge.staff@example.com',NULL,'staffpassword',NULL,'staffimg.jpg',NULL,NULL,NULL,2),(9,'Kediri Chill Spot Staff','kediri.chill.spot.staff@example.com',NULL,'staffpassword',NULL,'staffimg.jpg',NULL,NULL,NULL,2),(10,'Stark Tower Staff','stark.tower.staff@example.com',NULL,'staffpassword',NULL,'staffimg.jpg',NULL,NULL,NULL,2),(11,'Star Wars Inn Staff','star.wars.inn.staff@example.com',NULL,'staffpassword',NULL,'staffimg.jpg',NULL,NULL,NULL,2),(12,'Mordor Motel Staff','mordor.motel.staff@example.com',NULL,'staffpassword',NULL,'staffimg.jpg',NULL,NULL,NULL,2),(13,'Denpasar Dreams Staff','denpasar.dreams.staff@example.com',NULL,'staffpassword',NULL,'staffimg.jpg',NULL,NULL,NULL,2),(14,'Hobbit Haven Staff','hobbit.haven.staff@example.com',NULL,'staffpassword',NULL,'staffimg.jpg',NULL,NULL,NULL,2),(15,'Atlantis Resort Staff','atlantis.resort.staff@example.com',NULL,'staffpassword',NULL,'staffimg.jpg',NULL,NULL,NULL,2),(16,'Wakanda Retreat Staff','wakanda.retreat.staff@example.com',NULL,'staffpassword',NULL,'staffimg.jpg',NULL,NULL,NULL,2),(17,'Hamburg Hotel Staff','hamburg.hotel.staff@example.com',NULL,'staffpassword',NULL,'staffimg.jpg',NULL,NULL,NULL,2),(18,'Lion King Lodge Staff','lion.king.lodge.staff@example.com',NULL,'staffpassword',NULL,'staffimg.jpg',NULL,NULL,NULL,2),(19,'Wurst World Hotel Staff','wurst.world.hotel.staff@example.com',NULL,'staffpassword',NULL,'staffimg.jpg',NULL,NULL,NULL,2),(20,'Bremen Bliss Staff','bremen.bliss.staff@example.com',NULL,'staffpassword',NULL,'staffimg.jpg',NULL,NULL,NULL,2),(21,'Space Station Bremen Staff','space.station.bremen.staff@example.com',NULL,'staffpassword',NULL,'staffimg.jpg',NULL,NULL,NULL,2),(22,'Fairytale Castle Staff','fairytale.castle.staff@example.com',NULL,'staffpassword',NULL,'staffimg.jpg',NULL,NULL,NULL,2),(23,'Ubud Serenity Staff','ubud.serenity.staff@example.com',NULL,'staffpassword',NULL,'staffimg.jpg',NULL,NULL,NULL,2),(63,'John Doe','john.doe@example.com',NULL,'password123',NULL,'default.png','2024-06-24 18:42:37','2024-06-24 18:42:37',NULL,3),(64,'Jane Smith','jane.smith@example.com',NULL,'password123',NULL,'default.png','2024-06-24 18:42:37','2024-06-24 18:42:37',NULL,3),(65,'Alice Johnson','alice.johnson@example.com',NULL,'password123',NULL,'default.png','2024-06-24 18:42:37','2024-06-24 18:42:37',NULL,3),(66,'Bob Brown','bob.brown@example.com',NULL,'password123',NULL,'default.png','2024-06-24 18:42:37','2024-06-24 18:42:37',NULL,3),(67,'Charlie Davis','charlie.davis@example.com',NULL,'password123',NULL,'default.png','2024-06-24 18:42:37','2024-06-24 18:42:37',NULL,3),(68,'Diana Evans','diana.evans@example.com',NULL,'password123',NULL,'default.png','2024-06-24 18:42:37','2024-06-24 18:42:37',NULL,3),(69,'Evan Foster','evan.foster@example.com',NULL,'password123',NULL,'default.png','2024-06-24 18:42:37','2024-06-24 18:42:37',NULL,3),(70,'Fiona Green','fiona.green@example.com',NULL,'password123',NULL,'default.png','2024-06-24 18:42:37','2024-06-24 18:42:37',NULL,3),(71,'George Harris','george.harris@example.com',NULL,'password123',NULL,'default.png','2024-06-24 18:42:37','2024-06-24 18:42:37',NULL,3),(72,'Hannah Clark','hannah.clark@example.com',NULL,'password123',NULL,'default.png','2024-06-24 18:42:37','2024-06-24 18:42:37',NULL,3),(73,'Owner','owner@owner.com',NULL,'$2y$10$XOyGVCooq4WvGAlh2TIb/epBZ.msZqFc65tcBK/EOlIJqgCDUcl1K',NULL,'1719824058_a.png','2024-06-26 08:13:03','2024-07-01 01:54:18',NULL,1),(74,'KolGai','Kolgai@goomail.com',NULL,'$2y$10$8kibbj3fOwV5L3c3YNgYHOXAOulT8dIixAzj90qBPLS515uAKITBq',NULL,'1719822681_Cat_in_The_Box.png','2024-07-01 01:31:21','2024-07-01 01:31:21',NULL,3);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'laraluxdb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-02 21:23:37
