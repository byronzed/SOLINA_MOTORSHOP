-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for babershop
CREATE DATABASE IF NOT EXISTS `babershop` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `babershop`;

-- Dumping structure for table babershop.restaurants
CREATE TABLE IF NOT EXISTS `restaurants` (
  `babershop_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `added_by` int(11) DEFAULT NULL,
  `last_updated` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`babershop_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table babershop.restaurants: ~2 rows (approximately)
INSERT INTO `restaurants` (`babershop_id`, `name`, `address`, `phone_number`, `email`, `added_by`, `last_updated`) VALUES
	(22, 'ada', 'Imus,Cavite gentri', '090928028212222', 'gerald@gmail.com', 1, '2024-10-30 10:41:54'),
	(23, 'tesses', 'Tanza,Cavite', '09092802821222', 'tese@GMAIL.COM', 2, '2024-10-30 10:47:34');

-- Dumping structure for table babershop.users
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table babershop.users: ~2 rows (approximately)
INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `created_at`) VALUES
	(1, 'gerald', '$2y$10$/EiBm3lrNZ8cRXMTJJyGHeWpMD5GalrW7pMKxw116rO0iT2DiGrjO', 'gerald@gmail.com', '2024-10-30 09:58:01'),
	(2, 'admin', '$2y$10$I8ByQ/xeaHqeBCesuRkON.C2OeHDGZVHmkMXUhvcC5/wI4xhCAJ06', 'gerald@gmail.com', '2024-10-30 10:46:46');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
