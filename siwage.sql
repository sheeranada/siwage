-- MySQL dump 10.13  Distrib 8.0.42, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: gkjw_siwage
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

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
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
-- Table structure for table `kelompoks`
--

DROP TABLE IF EXISTS `kelompoks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kelompoks` (
  `id` char(36) NOT NULL,
  `kode_kelompok` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `area` enum('induk','wilayah') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kelompoks_kode_kelompok_unique` (`kode_kelompok`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kelompoks`
--

LOCK TABLES `kelompoks` WRITE;
/*!40000 ALTER TABLE `kelompoks` DISABLE KEYS */;
/*!40000 ALTER TABLE `kelompoks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `keluargas`
--

DROP TABLE IF EXISTS `keluargas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `keluargas` (
  `id` char(36) NOT NULL,
  `kelompok_id` char(36) NOT NULL,
  `kode_kk` varchar(255) NOT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `keluargas_kelompok_id_foreign` (`kelompok_id`),
  CONSTRAINT `keluargas_kelompok_id_foreign` FOREIGN KEY (`kelompok_id`) REFERENCES `kelompoks` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `keluargas`
--

LOCK TABLES `keluargas` WRITE;
/*!40000 ALTER TABLE `keluargas` DISABLE KEYS */;
/*!40000 ALTER TABLE `keluargas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2014_10_12_100000_create_password_resets_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2025_05_22_162036_create_pekerjaans_table',1),(7,'2025_05_22_162328_create_status_keluargas_table',1),(8,'2025_05_22_162448_create_pendidikans_table',1),(9,'2025_05_22_162608_create_status_nikahs_table',1),(10,'2025_05_22_162755_create_status_wargas_table',1),(11,'2025_05_22_162843_create_talentas_table',1),(12,'2025_05_22_163555_create_kelompoks_table',1),(13,'2025_05_22_164612_create_keluargas_table',1),(14,'2025_05_22_164648_create_wargas_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
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
-- Table structure for table `pekerjaans`
--

DROP TABLE IF EXISTS `pekerjaans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pekerjaans` (
  `id` char(36) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pekerjaans`
--

LOCK TABLES `pekerjaans` WRITE;
/*!40000 ALTER TABLE `pekerjaans` DISABLE KEYS */;
/*!40000 ALTER TABLE `pekerjaans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pendidikans`
--

DROP TABLE IF EXISTS `pendidikans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pendidikans` (
  `id` char(36) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pendidikans`
--

LOCK TABLES `pendidikans` WRITE;
/*!40000 ALTER TABLE `pendidikans` DISABLE KEYS */;
/*!40000 ALTER TABLE `pendidikans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` char(36) NOT NULL,
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
-- Table structure for table `status_keluargas`
--

DROP TABLE IF EXISTS `status_keluargas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status_keluargas` (
  `id` char(36) NOT NULL,
  `status_keluarga` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_keluargas`
--

LOCK TABLES `status_keluargas` WRITE;
/*!40000 ALTER TABLE `status_keluargas` DISABLE KEYS */;
/*!40000 ALTER TABLE `status_keluargas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_nikahs`
--

DROP TABLE IF EXISTS `status_nikahs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status_nikahs` (
  `id` char(36) NOT NULL,
  `status_nikah` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_nikahs`
--

LOCK TABLES `status_nikahs` WRITE;
/*!40000 ALTER TABLE `status_nikahs` DISABLE KEYS */;
/*!40000 ALTER TABLE `status_nikahs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_wargas`
--

DROP TABLE IF EXISTS `status_wargas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status_wargas` (
  `id` char(36) NOT NULL,
  `status_warga` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_wargas`
--

LOCK TABLES `status_wargas` WRITE;
/*!40000 ALTER TABLE `status_wargas` DISABLE KEYS */;
/*!40000 ALTER TABLE `status_wargas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `talentas`
--

DROP TABLE IF EXISTS `talentas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `talentas` (
  `id` char(36) NOT NULL,
  `talenta` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `talentas`
--

LOCK TABLES `talentas` WRITE;
/*!40000 ALTER TABLE `talentas` DISABLE KEYS */;
/*!40000 ALTER TABLE `talentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('c3ec64ee-bb6f-4e0c-b985-2182d7ef9831','Administrator','admin','$2y$12$72enk26zZ8796NGe64bX6Oz8/f3jpJceDm1nDFYmV/oO4bhF5lnd2','6Tr8ZQ1VA3','2025-06-02 03:38:54','2025-06-02 03:38:54');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wargas`
--

DROP TABLE IF EXISTS `wargas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wargas` (
  `id` char(36) NOT NULL,
  `no_induk` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_baptis` varchar(255) DEFAULT NULL,
  `tanggal_baptis` date DEFAULT NULL,
  `tempat_sidhi` varchar(255) DEFAULT NULL,
  `tanggal_sidhi` date DEFAULT NULL,
  `tempat_menikah` varchar(255) DEFAULT NULL,
  `tanggal_menikah` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `keluarga_id` char(36) DEFAULT NULL,
  `talenta_id` char(36) NOT NULL,
  `pendidikan_id` char(36) NOT NULL,
  `pekerjaan_id` char(36) NOT NULL,
  `status_keluarga_id` char(36) NOT NULL,
  `status_warga_id` char(36) NOT NULL,
  `status_nikah_id` char(36) NOT NULL,
  `code_from_keluargas` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `wargas_keluarga_id_foreign` (`keluarga_id`),
  KEY `wargas_talenta_id_foreign` (`talenta_id`),
  KEY `wargas_pendidikan_id_foreign` (`pendidikan_id`),
  KEY `wargas_pekerjaan_id_foreign` (`pekerjaan_id`),
  KEY `wargas_status_keluarga_id_foreign` (`status_keluarga_id`),
  KEY `wargas_status_warga_id_foreign` (`status_warga_id`),
  KEY `wargas_status_nikah_id_foreign` (`status_nikah_id`),
  CONSTRAINT `wargas_keluarga_id_foreign` FOREIGN KEY (`keluarga_id`) REFERENCES `keluargas` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `wargas_pekerjaan_id_foreign` FOREIGN KEY (`pekerjaan_id`) REFERENCES `pekerjaans` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `wargas_pendidikan_id_foreign` FOREIGN KEY (`pendidikan_id`) REFERENCES `pendidikans` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `wargas_status_keluarga_id_foreign` FOREIGN KEY (`status_keluarga_id`) REFERENCES `status_keluargas` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `wargas_status_nikah_id_foreign` FOREIGN KEY (`status_nikah_id`) REFERENCES `status_nikahs` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `wargas_status_warga_id_foreign` FOREIGN KEY (`status_warga_id`) REFERENCES `status_wargas` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `wargas_talenta_id_foreign` FOREIGN KEY (`talenta_id`) REFERENCES `talentas` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wargas`
--

LOCK TABLES `wargas` WRITE;
/*!40000 ALTER TABLE `wargas` DISABLE KEYS */;
/*!40000 ALTER TABLE `wargas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-02 18:44:52
