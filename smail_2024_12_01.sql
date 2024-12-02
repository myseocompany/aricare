# ************************************************************
# Sequel Pro SQL dump
# Version 5446
#
# https://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 8.2.0)
# Database: aricare
# Generation Time: 2024-12-01 15:09:26 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table appointments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `appointments`;

CREATE TABLE `appointments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `start_time` datetime NOT NULL,
  `end_time` datetime DEFAULT NULL,
  `patient_id` bigint unsigned NOT NULL,
  `doctor_id` bigint unsigned DEFAULT NULL,
  `team_id` bigint unsigned DEFAULT NULL,
  `branch_id` bigint unsigned DEFAULT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `appointments_patient_id_foreign` (`patient_id`),
  KEY `appointments_doctor_id_foreign` (`doctor_id`),
  KEY `appointments_team_id_foreign` (`team_id`),
  KEY `appointments_branch_id_foreign` (`branch_id`),
  CONSTRAINT `appointments_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  CONSTRAINT `appointments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `appointments_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;

INSERT INTO `appointments` (`id`, `start_time`, `end_time`, `patient_id`, `doctor_id`, `team_id`, `branch_id`, `reason`, `description`, `created_at`, `updated_at`)
VALUES
	(1,'2024-11-27 11:18:35','2024-11-27 11:48:35',12,NULL,5,9,'Primera vez','Error ex exercitationem illo sunt minus.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(2,'2024-11-28 18:16:45','2024-11-28 18:46:45',9,NULL,1,NULL,'Seguimiento','Hic recusandae omnis cupiditate sunt in autem quis.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(3,'2024-11-27 19:49:09','2024-11-27 20:19:09',18,4,6,12,'Revisión','Ut labore rerum aut rerum libero impedit.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(4,'2024-11-28 12:49:09','2024-11-28 13:19:09',8,4,6,12,'Revisión','Et autem aut architecto ea.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(5,'2024-11-26 12:52:48','2024-11-26 13:22:48',2,NULL,4,7,'Consulta general','Beatae error culpa et voluptatem incidunt magnam.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(6,'2024-11-28 15:01:53','2024-11-28 15:31:53',15,NULL,5,11,'Primera vez','Quidem esse qui soluta.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(7,'2024-11-28 16:12:24','2024-11-28 16:42:24',19,3,3,4,'Consulta general','Nesciunt laborum odit consequuntur.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(8,'2024-11-27 18:12:50','2024-11-27 18:42:50',8,4,6,13,'Revisión','Sit nostrum ad voluptatum eius et.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(9,'2024-11-26 20:01:19','2024-11-26 20:31:19',13,5,2,2,'Primera vez','Omnis asperiores libero rerum ipsam.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(10,'2024-11-27 21:56:32','2024-11-27 22:26:32',10,NULL,4,6,'Seguimiento','Debitis nemo veniam iusto non.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(11,'2024-12-02 08:34:56','2024-12-02 09:04:56',19,3,3,3,'Revisión','Quo quis enim distinctio eligendi id odio.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(12,'2024-11-26 12:43:53','2024-11-26 13:13:53',5,4,6,12,'Primera vez','Doloremque iste iure nihil rerum.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(13,'2024-12-02 12:28:36','2024-12-02 12:58:36',8,6,6,13,'Primera vez','Unde deserunt perspiciatis et impedit ut illum veniam nihil.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(14,'2024-11-29 08:16:57','2024-11-29 08:46:57',13,5,2,1,'Revisión','Optio dignissimos maiores iure laborum.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(15,'2024-11-28 16:53:07','2024-11-28 17:23:07',18,4,6,12,'Revisión','Inventore atque ratione adipisci et illo sunt non.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(16,'2024-11-28 08:24:01','2024-11-28 08:54:01',3,NULL,4,8,'Revisión','Voluptas excepturi labore provident nostrum tenetur eveniet odio.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(17,'2024-11-28 22:58:25','2024-11-28 23:28:25',9,NULL,1,NULL,'Revisión','Ut et dolorem commodi aut a in.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(18,'2024-11-26 22:40:08','2024-11-26 23:10:08',8,6,6,13,'Primera vez','Veritatis libero qui eligendi reiciendis id hic nihil.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(19,'2024-11-28 05:12:54','2024-11-28 05:42:54',5,6,6,12,'Consulta general','Dolore dicta et labore dolores.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(20,'2024-11-27 17:17:06','2024-11-27 17:47:06',10,NULL,4,8,'Revisión','Minus quia deleniti deserunt tenetur veritatis quasi at.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(21,'2024-11-28 19:50:41','2024-11-28 20:20:41',10,NULL,4,7,'Seguimiento','Est neque non minus officiis voluptatem suscipit.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(22,'2024-12-02 08:04:58','2024-12-02 08:34:58',2,NULL,4,7,'Revisión','Voluptas quia et ut.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(23,'2024-12-02 05:57:51','2024-12-02 06:27:51',13,5,2,2,'Seguimiento','Magnam quis dolorem deserunt cumque dolorem.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(24,'2024-11-27 08:36:50','2024-11-27 09:06:50',12,NULL,5,11,'Primera vez','Et adipisci quo ut velit aperiam at.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(25,'2024-11-29 01:15:37','2024-11-29 01:45:37',13,5,2,1,'Consulta general','Perspiciatis voluptatibus sit optio molestias omnis quo rerum.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(26,'2024-11-28 05:13:54','2024-11-28 05:43:54',13,5,2,2,'Seguimiento','Autem ea vitae illo occaecati adipisci.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(27,'2024-11-29 04:04:59','2024-11-29 04:34:59',5,4,6,13,'Revisión','Tenetur ullam molestiae dolor voluptatem.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(28,'2024-11-27 05:45:19','2024-11-27 06:15:19',15,NULL,5,11,'Primera vez','Similique sunt quam numquam quam dignissimos aliquid.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(29,'2024-12-02 15:30:48','2024-12-02 16:00:48',13,5,2,1,'Consulta general','Eaque in odit inventore omnis.','2024-12-01 13:15:31','2024-12-01 13:15:31'),
	(30,'2024-12-02 01:26:08','2024-12-02 01:56:08',16,5,2,1,'Seguimiento','Omnis eius qui aut.','2024-12-01 13:15:31','2024-12-01 13:15:31');

/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table branches
# ------------------------------------------------------------

DROP TABLE IF EXISTS `branches`;

CREATE TABLE `branches` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `branches_team_id_foreign` (`team_id`),
  CONSTRAINT `branches_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `branches` WRITE;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;

INSERT INTO `branches` (`id`, `team_id`, `name`, `address`, `phone`, `email`, `created_at`, `updated_at`)
VALUES
	(1,2,'Davionmouth Sede','24223 Ruth Oval Suite 885\nNew Rachael, WV 01826','1-623-543-7968','oberbrunner.esta@example.org','2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(2,2,'North Bartholomefort Sede','47175 Lehner Grove Apt. 037\nJamilville, GA 99748','281.846.9015','broberts@example.org','2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(3,3,'Hoegertown Sede','69515 Hamill Canyon\nNorth Stantonland, NM 22239-7685','678-212-0094','jason01@example.com','2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(4,3,'New Jadafurt Sede','17581 Denesik Viaduct\nNorth Roberto, VA 92876-8130','+1-601-200-0660','pagac.kelly@example.org','2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(5,3,'Litteltown Sede','1249 Rickey Creek\nKochton, VA 83158-4925','+1 (351) 403-8895','louisa87@example.org','2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(6,4,'Cassidyton Sede','500 Vernon Port\nChristellechester, MA 57502','872.834.0529','npredovic@example.org','2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(7,4,'Port Zoe Sede','9039 Jeanette Tunnel\nLake Lelahberg, WY 54593-2205','(618) 706-1022','davin08@example.com','2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(8,4,'West Zackshire Sede','46611 Ferry Via\nSouth Willishaven, MS 96281','+1-240-620-0435','bartholome53@example.com','2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(9,5,'New Mariannamouth Sede','6064 Emmerich Village\nWest Harry, ID 43024','(425) 319-7191','korbin.trantow@example.com','2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(10,5,'New Rosendo Sede','6411 Trisha Land Suite 222\nDevinland, MT 96640-7932','+1-660-533-6510','quinn02@example.com','2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(11,5,'West Lauriane Sede','514 Roy Extension\nWest Amara, NE 51452','1-307-473-8633','langosh.eleazar@example.org','2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(12,6,'Bradtkestad Sede','8093 Botsford Shoals\nMelvinburgh, UT 86152-1188','+1.678.619.5440','sylvia.cremin@example.org','2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(13,6,'West Stewartmouth Sede','2648 Parker Burgs Suite 714\nSouth Vernon, WY 91138-2708','+19845826912','ogibson@example.org','2024-12-01 13:15:30','2024-12-01 13:15:30');

/*!40000 ALTER TABLE `branches` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cache
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cache`;

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table cache_locks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cache_locks`;

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table document_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `document_types`;

CREATE TABLE `document_types` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Type of document, e.g., CC, TI, Passport',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `document_types_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `document_types` WRITE;
/*!40000 ALTER TABLE `document_types` DISABLE KEYS */;

INSERT INTO `document_types` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'Cédula de Ciudadanía','2024-12-01 13:15:29','2024-12-01 13:15:29'),
	(2,'Tarjeta de Identidad','2024-12-01 13:15:29','2024-12-01 13:15:29'),
	(3,'Pasaporte','2024-12-01 13:15:29','2024-12-01 13:15:29'),
	(4,'Cédula de Extranjería','2024-12-01 13:15:29','2024-12-01 13:15:29');

/*!40000 ALTER TABLE `document_types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

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



# Dump of table job_batches
# ------------------------------------------------------------

DROP TABLE IF EXISTS `job_batches`;

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(169,'0000_01_01_000000_create_document_types_table',1),
	(170,'0000_01_01_000000_create_roles_table',1),
	(171,'0001_01_01_000000_create_users_table',1),
	(172,'0001_01_01_000001_create_cache_table',1),
	(173,'0001_01_01_000002_create_jobs_table',1),
	(174,'2024_11_17_014116_add_two_factor_columns_to_users_table',1),
	(175,'2024_11_17_014214_create_personal_access_tokens_table',1),
	(176,'2024_11_17_014214_create_teams_table',1),
	(177,'2024_11_17_014215_create_team_user_table',1),
	(178,'2024_11_17_014216_create_team_invitations_table',1),
	(179,'2024_11_18_105142_create_branches_table',1),
	(180,'2024_11_30_113309_create_appointments_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_reset_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table personal_access_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `personal_access_tokens`;

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



# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'admin','2024-12-01 13:15:29','2024-12-01 13:15:29'),
	(2,'doctor','2024-12-01 13:15:29','2024-12-01 13:15:29'),
	(3,'patient','2024-12-01 13:15:29','2024-12-01 13:15:29');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`)
VALUES
	('13YKvq5SjP6l3qrZDleD0l2yM02xbVCCYvGGOBAr',34,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMmdURGRpODlja3l6WTYwWkdaZWYxblpzcmFmNHJwSFVkUGZUbjZXZiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbWFpbC92ZXJpZnkiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozNDtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiQxZGhDWW1LQ1k1VUNsN0kudkRVbnh1ZWdubElqUHdRYkY2YUR4TWowU1NYdHJzdVIyLnNvbSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Rhc2hib2FyZCI7fX0=',1733061282),
	('8VsMzoMtzsN0pTJYbThalWOe3H5999SE557reYkr',34,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiNldSUVB1bXoxZmhMb05pZkVJc2R2QlFvZkVZQ2RXdjJrWTBmZDdRaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbWFpbC92ZXJpZnkiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozNDtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiQxZGhDWW1LQ1k1VUNsN0kudkRVbnh1ZWdubElqUHdRYkY2YUR4TWowU1NYdHJzdVIyLnNvbSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2Rhc2hib2FyZCI7fX0=',1733063450),
	('kH5KGHpKR8uo73KN05jt4qkAN9y9SNy6nZzLiTj7',NULL,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoiaEdLekQyTTh5b3o5bzNPNWtXVW5MS0Y3NmdWOXI5MkpiZmhTalFJayI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1733059180),
	('uYdhExbR9bharoo4HxN6zPvR31FugeOm7Z3XZRye',1,'127.0.0.1','Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36','YTo2OntzOjY6Il90b2tlbiI7czo0MDoiM1ZvV2VFOWxTQjlTWEpEdTI0UTNQc0IzRDlkalluU3Zqc3E1cVAzNiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiRhRXNXb2xzNG9tbGdMZkcudnoxaGFPUnFZNDYzakJTUWFsejlrakNtM2hOTVFYVUN0OGVMbSI7fQ==',1733058983);

/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table team_invitations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `team_invitations`;

CREATE TABLE `team_invitations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`),
  CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table team_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `team_user`;

CREATE TABLE `team_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`),
  KEY `team_user_role_id_foreign` (`role_id`),
  CONSTRAINT `team_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `team_user` WRITE;
/*!40000 ALTER TABLE `team_user` DISABLE KEYS */;

INSERT INTO `team_user` (`id`, `team_id`, `user_id`, `role`, `role_id`, `created_at`, `updated_at`)
VALUES
	(1,1,3,NULL,1,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(2,3,2,NULL,2,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(3,3,3,NULL,2,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(4,6,4,NULL,2,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(5,2,5,NULL,2,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(6,6,6,NULL,2,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(7,4,2,NULL,3,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(8,4,3,NULL,3,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(9,3,4,NULL,3,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(10,6,5,NULL,3,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(11,3,6,NULL,3,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(12,1,7,NULL,3,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(13,6,8,NULL,3,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(14,1,9,NULL,3,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(15,4,10,NULL,3,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(16,3,11,NULL,3,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(17,5,12,NULL,3,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(18,2,13,NULL,3,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(19,4,14,NULL,3,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(20,5,15,NULL,3,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(21,2,16,NULL,3,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(22,4,17,NULL,3,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(23,6,18,NULL,3,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(24,3,19,NULL,3,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(25,3,20,NULL,3,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(26,1,21,NULL,3,'2024-12-01 13:15:30','2024-12-01 13:15:30');

/*!40000 ALTER TABLE `team_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table teams
# ------------------------------------------------------------

DROP TABLE IF EXISTS `teams`;

CREATE TABLE `teams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`)
VALUES
	(1,1,'Test User\'s Team',1,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(2,29,'Toy-Turcotte Clínica',0,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(3,30,'Schmitt and Sons Clínica',0,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(4,31,'Boyer-Schroeder Clínica',0,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(5,32,'Kuvalis and Sons Clínica',0,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(6,33,'Yundt, Murray and Boehm Clínica',0,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(7,34,'Nicolás\'s Team',1,'2024-12-01 13:41:58','2024-12-01 13:41:58');

/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `is_super_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `document_type_id` bigint unsigned DEFAULT NULL,
  `document_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'User document number',
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_document_type_id_foreign` (`document_type_id`),
  CONSTRAINT `users_document_type_id_foreign` FOREIGN KEY (`document_type_id`) REFERENCES `document_types` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `is_super_admin`, `remember_token`, `current_team_id`, `document_type_id`, `document_id`, `profile_photo_path`, `created_at`, `updated_at`)
VALUES
	(1,'Test User','soporterapido@myseocompany.co','2024-12-01 13:15:29','$2y$12$aEsWols4omlgLfG.vz1haORqY463jBSQalz9kjCm3hNMQXUCt8eLm',NULL,NULL,NULL,1,'gbgPlVQnsL',NULL,1,'75078986',NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(2,'Maria Bogan','chuels@example.com','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'G29KBhfYGQ',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(3,'Admin Clinica','admin@clinica.com',NULL,'$2y$12$J2S5vYr0jkhSzKdf6WPuA.S9FWxOqptKJ4r4rDBntOxsQpUQ.XL2u',NULL,NULL,NULL,0,NULL,NULL,1,'999999999',NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(4,'Verner Monahan','marjory28@example.org','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'eqC8lvnzpx',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(5,'Fleta Bergstrom','blanda.zula@example.com','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'ovdg00O3IG',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(6,'Marjolaine Lebsack DDS','austyn73@example.net','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'WIV0gmb3VO',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(7,'Lawson Schneider','feeney.jena@example.net','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'7ZN7ZzJ2NF',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(8,'Allene McGlynn','maggio.alvena@example.org','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'14MjkjgrlC',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(9,'Dr. Valentin Mann DDS','kelly14@example.org','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'BoSDAm2rt9',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(10,'Keven Kshlerin','edwardo05@example.org','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'2DUdujjJdN',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(11,'Mrs. Aditya Morar','stiedemann.freddy@example.net','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'PQdyQVwrvL',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(12,'Prof. Darius Ernser III','mandy94@example.net','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'PPCaTOXQY0',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(13,'Monserrat Crist','lubowitz.mason@example.org','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'nsV4B8k9ET',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(14,'Alice Turcotte II','ykautzer@example.net','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'LldZpsxECG',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(15,'Jordi Hills','elza.schamberger@example.net','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'ACOQVmkHKs',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(16,'Dr. Shayne Veum PhD','wilderman.modesto@example.org','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'g6nVwbxsWM',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(17,'Shawn Stark','dickens.aileen@example.com','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'Jlv8F0R3yt',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(18,'Prof. Fidel Watsica','dgleason@example.com','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'SUwOaDJVmc',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(19,'Emilie Gottlieb Jr.','fleta.morar@example.org','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'mlMcyf4h55',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(20,'Antonina Rippin PhD','carlie82@example.org','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'IFD8tMJQe9',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(21,'Rubye Von III','nannie32@example.com','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'gFNAPXP0Sr',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(22,'Dixie Mitchell','furman.nader@example.com','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'jAUTa81259',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(23,'Annette Lindgren','rey92@example.org','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'1Dzwv7NoBo',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(24,'Prof. Buster Gottlieb I','weissnat.elisha@example.net','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'55SBdLOIOs',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(25,'Bernita Trantow IV','josie.wehner@example.net','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'PO5pYBTLVn',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(26,'Dr. Merlin Dibbert','goodwin.chyna@example.net','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'wsgA0u85J0',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(27,'Mrs. Sydnie Collier III','rodrick.becker@example.org','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'bCh7ytr9zJ',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(28,'Gayle Rath','boyd25@example.org','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'O95cWVRvoV',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(29,'Prof. Sean Wyman','jokuneva@example.net','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'ZPjVi6CEx8',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(30,'Kayli Wintheiser','qschiller@example.org','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'gm7nh4Po9V',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(31,'Trystan Weimann','marvin.lenny@example.com','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'NxxFclR6gD',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(32,'Raheem Ward','ransom.lueilwitz@example.org','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'6jBXiboEZb',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(33,'Prof. Derrick Quigley IV','gerlach.zula@example.org','2024-12-01 13:15:30','$2y$12$ifeJaETjpPXC7WYDNLIsI.9F4AVMLWFdhqEYcpALby0m0VIg3grd6',NULL,NULL,NULL,0,'ZogXExfeYO',NULL,NULL,NULL,NULL,'2024-12-01 13:15:30','2024-12-01 13:15:30'),
	(34,'Nicolás Navarro Rincón','nicolas@myseocompany.co',NULL,'$2y$12$1dhCYmKCY5UCl7I.vDUnxuegnlIjPwQbF6aDxMj0SSXtrsuR2.som',NULL,NULL,NULL,0,NULL,NULL,NULL,NULL,NULL,'2024-12-01 13:41:58','2024-12-01 13:41:58');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
