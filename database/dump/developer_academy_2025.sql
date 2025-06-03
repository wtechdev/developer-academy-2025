/*
 Navicat Premium Dump SQL

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : developer_academy_2025

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 03/06/2025 16:01:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for media
-- ----------------------------
DROP TABLE IF EXISTS `media`;
CREATE TABLE `media`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `collection_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `disk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int UNSIGNED NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `media_uuid_unique`(`uuid` ASC) USING BTREE,
  INDEX `media_model_type_model_id_index`(`model_type` ASC, `model_id` ASC) USING BTREE,
  INDEX `media_order_column_index`(`order_column` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of media
-- ----------------------------
INSERT INTO `media` VALUES (4, 'App\\Models\\Post', 3, 'fccc1d53-1185-4c3a-a088-e924c5b47e39', 'immagine', '1', '1.webp', 'image/webp', 'mediagallery', 'mediagallery', 7672, '[]', '[]', '[]', '[]', 1, '2025-06-03 06:23:02', '2025-06-03 06:23:02');
INSERT INTO `media` VALUES (5, 'App\\Models\\Post', 4, '404ae074-b2b8-44a7-826c-e3a71c235f16', 'immagine', '3', '3.png', 'image/webp', 'mediagallery', 'mediagallery', 51886, '[]', '[]', '[]', '[]', 1, '2025-06-03 06:23:20', '2025-06-03 06:23:20');
INSERT INTO `media` VALUES (6, 'App\\Models\\Post', 5, '0b7c3a0f-1ee7-49fd-9dc2-6ff787ee9e7f', 'immagine', '4', '4.jpg', 'image/jpeg', 'mediagallery', 'mediagallery', 45910, '[]', '[]', '[]', '[]', 1, '2025-06-03 06:23:47', '2025-06-03 06:23:47');
INSERT INTO `media` VALUES (7, 'App\\Models\\Post', 6, '5b0063ea-be4a-4302-9f49-324713aaa8c6', 'immagine', '2', '2.jpg', 'image/jpeg', 'mediagallery', 'mediagallery', 91136, '[]', '[]', '[]', '[]', 1, '2025-06-03 06:23:59', '2025-06-03 06:23:59');
INSERT INTO `media` VALUES (8, 'App\\Models\\Post', 7, '7c20247f-276e-4c0c-8a31-866b731550b9', 'immagine', '5', '5.jpg', 'image/jpeg', 'mediagallery', 'mediagallery', 61931, '[]', '[]', '[]', '[]', 1, '2025-06-03 06:24:11', '2025-06-03 06:24:11');
INSERT INTO `media` VALUES (11, 'App\\Models\\Post', 8, '1723b70d-9b9d-41a9-895d-5d9f090bbf39', 'immagine', 'laravel-scout-featured', 'laravel-scout-featured.png', 'image/png', 'mediagallery', 'mediagallery', 35142, '[]', '[]', '[]', '[]', 1, '2025-06-03 07:07:39', '2025-06-03 07:07:39');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (5, '2025_05_29_123200_create_posts_table', 2);
INSERT INTO `migrations` VALUES (6, '2025_05_29_125206_create_media_table', 3);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` smallint NULL DEFAULT 0,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (3, '2025-06-03 06:23:02', 'Introduzione a Bootstrap 5: Novità e Componenti', 'Bootstrap 5 ha introdotto nuove funzionalità come l\'eliminazione della dipendenza da jQuery e nuovi componenti utility. In questo articolo, analizzeremo come sfruttare al meglio il sistema di griglia e le classi CSS aggiornate per creare layout responsive in pochi minuti.', 1, 1, '2025-06-03 06:23:02', '2025-06-03 11:18:29');
INSERT INTO `posts` VALUES (4, '2025-06-02 06:23:20', 'Gestire le Categorie in un Blog', 'Vuoi organizzare i tuoi articoli in categorie? Vediamo come implementare un sistema di categorizzazione in Laravel utilizzando relazioni Eloquent e come visualizzarle nel frontend con Blade. Include esempi di codice pronti all\'uso!', 0, 1, '2025-06-03 06:23:20', '2025-06-03 06:23:20');
INSERT INTO `posts` VALUES (5, '2025-06-02 06:23:47', 'Sistema di Commenti in Laravel', 'Un blog senza interazione è come un monologo. In questa guida, implementeremo un sistema di commenti in Laravel con funzionalità chiave: Relazione Post -> Comment, Validazione dei campi, Notifiche email', 0, 1, '2025-06-03 06:23:47', '2025-06-03 06:23:47');
INSERT INTO `posts` VALUES (6, '2025-06-01 06:23:59', 'Ottimizzare le Immagini per il Web', 'Le immagini pesanti possono rallentare il tuo blog. Ecco tecniche per comprimere e ottimizzare le immagini senza perdere qualità, utilizzando strumenti come TinyPNG e direttive Laravel per il caricamento efficiente.', 0, 1, '2025-06-03 06:23:59', '2025-06-03 06:23:59');
INSERT INTO `posts` VALUES (7, '2025-06-01 06:24:11', 'Dark Mode con Bootstrap 5 e CSS', 'Il dark mode è ormai un must. Scopri come aggiungerlo al tuo blog con definizione di variabili CSS per light/dark theme, toggle con JavaScript e localStorage. Migliora l’accessibilità e riduci l’affaticamento degli occhi!', 0, 1, '2025-06-03 06:24:11', '2025-06-03 06:24:11');
INSERT INTO `posts` VALUES (8, '2025-06-01 07:00:47', 'Come Implementare la Ricerca in Laravel con Scout', 'Scopri come aggiungere un motore di ricerca al tuo blog Laravel utilizzando Laravel Scout e Algolia. Tutorial passo-passo con esempi di codice.', 0, 1, '2025-06-03 07:00:47', '2025-06-03 07:00:47');
INSERT INTO `posts` VALUES (9, '2025-06-01 07:03:22', 'API RESTful in Laravel: Architettura Scalabile', 'Progetta API professionali con autenticazione JWT, rate limiting, versioning e documentazione automatica. Ottimizzato per applicazioni mobile.', 0, 1, '2025-06-03 07:03:22', '2025-06-03 07:03:22');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Cesare Cerpi', 'cesare.cerpi@w-tech.org', NULL, '$2y$12$DWkatoV3lYX9ZS8VZo4zj.MZiSF0K/LeZNkVWZGbB42huQtNcsNU6', NULL, '2025-05-14 11:55:47', '2025-06-03 12:17:25', NULL);
INSERT INTO `users` VALUES (2, 'Alessio Gori', 'alessio.gori@w-tech.org', NULL, '$2y$12$GSyFqOliempl7.k6VXZJ0eGP2/kBXoQeu.AekbnXP0DYSXNVLfMyS', NULL, '2025-06-03 11:35:41', '2025-06-03 12:33:52', NULL);

SET FOREIGN_KEY_CHECKS = 1;
