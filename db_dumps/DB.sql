-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.0.17-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             8.3.0.4796
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for corpblog
DROP DATABASE IF EXISTS `corpblog`;
CREATE DATABASE IF NOT EXISTS `corpblog` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `corpblog`;


-- Dumping structure for table corpblog.articles
DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `category_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_category_id_foreign` (`category_id`),
  CONSTRAINT `articles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table corpblog.articles: ~6 rows (approximately)
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` (`id`, `user_id`, `title`, `body`, `created_at`, `updated_at`, `category_id`) VALUES
	(1, 1, 'tttt', 'bbbbbbbbbbbbbbbbbbbbbbbbb', '2015-11-02 18:54:08', '2015-11-02 18:54:08', 1),
	(2, 2, '2222', 'body2body2body2body2body2body2body2body2body2body2body2body2body2body2v', '2015-11-02 18:54:08', '2015-11-02 18:54:08', 2),
	(3, 2, '33333', 'body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333', '2015-11-02 18:54:08', '2015-11-02 18:54:08', 3),
	(4, 1, '4tttt', '4bbbbbbbbbbbbbbbbbbbbbbbbb', '2015-11-02 18:54:08', '2015-11-02 18:54:08', 1),
	(5, 2, '52222', '5body2body2body2body2body2body2body2body2body2body2body2body2body2body2v', '2015-11-02 18:54:08', '2015-11-02 18:54:08', 2),
	(6, 2, '633333', '6body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333body3333', '2015-11-02 18:54:08', '2015-11-02 18:54:08', 3);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;


-- Dumping structure for table corpblog.categories
DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table corpblog.categories: ~3 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'cat1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'cat2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'cat 3', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Dumping structure for table corpblog.comments
DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `comments_article_id_foreign` (`article_id`),
  KEY `comments_user_id_foreign` (`user_id`),
  CONSTRAINT `comments_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table corpblog.comments: ~6 rows (approximately)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `article_id`, `user_id`, `body`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 'comment 1', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 2, 2, 'comm2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 2, 2, 'comm3', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, 3, 2, 'comm4', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, 3, 2, 'comm5', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(6, 3, 1, 'comm6', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;


-- Dumping structure for table corpblog.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table corpblog.migrations: ~11 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`, `batch`) VALUES
	('2014_10_12_000000_create_users_table', 1),
	('2014_10_12_100000_create_password_resets_table', 1),
	('2015_11_01_162625_create_articles_table', 1),
	('2015_11_03_204139_create_comments_table', 1),
	('2015_11_03_213543_create_categories_table', 1),
	('2015_11_03_213930_add_category_id_to_articles_table', 1),
	('2014_10_12_000000_create_users_table', 1),
	('2014_10_12_100000_create_password_resets_table', 1),
	('2015_11_01_162625_create_articles_table', 1),
	('2015_11_03_204139_create_comments_table', 2),
	('2015_11_03_213543_create_categories_table', 3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Dumping structure for table corpblog.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table corpblog.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;


-- Dumping structure for table corpblog.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table corpblog.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'john', 'aaa@aaa.com', '$2y$10$ihjBvJAEF/6DuOJejMZHV.rpieG7aU47bDbo0ZsIqeyfHaGLRoBJa', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'Vasya', 'admin@df.com', '$2y$10$x2zH8pChABVpwM5k1BtKcObfR6remVUjwqACrYvhR4C/3QI5ZZYrS', NULL, '2015-11-02 19:21:34', '2015-11-02 19:21:34');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
