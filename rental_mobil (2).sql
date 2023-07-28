-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 28, 2023 at 03:17 AM
-- Server version: 8.0.31
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

DROP TABLE IF EXISTS `auth_activation_attempts`;
CREATE TABLE IF NOT EXISTS `auth_activation_attempts` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36 Edg/113.0.1774.42', '9607c433f718589e84099c0388349de7', '2023-05-16 16:26:32'),
(2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36 Edg/113.0.1774.50', 'c507bc409c18061bb08297ff79c73419', '2023-05-24 02:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

DROP TABLE IF EXISTS `auth_groups`;
CREATE TABLE IF NOT EXISTS `auth_groups` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `description` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'administrator', 'Administrator'),
(2, 'user', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

DROP TABLE IF EXISTS `auth_groups_permissions`;
CREATE TABLE IF NOT EXISTS `auth_groups_permissions` (
  `group_id` int UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int UNSIGNED NOT NULL DEFAULT '0',
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

DROP TABLE IF EXISTS `auth_groups_users`;
CREATE TABLE IF NOT EXISTS `auth_groups_users` (
  `group_id` int UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 1),
(1, 13),
(2, 14),
(2, 15);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

DROP TABLE IF EXISTS `auth_logins`;
CREATE TABLE IF NOT EXISTS `auth_logins` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'isyaau@gmail.com', 1, '2023-05-04 08:27:52', 1),
(2, '::1', 'isyaau@gmail.com', NULL, '2023-05-04 15:01:55', 0),
(3, '::1', 'isyaau@gmail.com', 1, '2023-05-04 15:02:07', 1),
(4, '::1', 'isyaau@gmail.com', 1, '2023-05-05 04:43:08', 1),
(5, '::1', 'isyaau@gmail.com', 1, '2023-05-05 04:47:48', 1),
(6, '::1', 'isyaau@gmail.com', 1, '2023-05-05 04:49:35', 1),
(7, '::1', 'isyaau@gmail.com', 1, '2023-05-05 08:39:04', 1),
(8, '::1', 'isyaau@gmail.com', 1, '2023-05-11 02:39:58', 1),
(9, '::1', 'isyaau@gmail.com', 1, '2023-05-11 14:17:46', 1),
(10, '::1', 'isyaau@gmail.com', 1, '2023-05-11 20:25:24', 1),
(11, '::1', 'isyaau@gmail.com', 1, '2023-05-11 20:41:59', 1),
(12, '::1', 'alfia@gmail.com', 11, '2023-05-11 20:52:17', 1),
(13, '::1', 'isyaau@gmail.com', 1, '2023-05-12 03:56:58', 1),
(14, '::1', 'alfia@gmail.com', 11, '2023-05-12 04:19:09', 1),
(15, '::1', 'isyaau@gmail.com', 1, '2023-05-12 05:03:21', 1),
(16, '::1', 'isyaau@gmail.com', 1, '2023-05-15 07:59:12', 1),
(17, '::1', 'admin@gmail.com', 0, '2023-05-15 08:59:34', 1),
(18, '::1', 'admin@gmail.com', 0, '2023-05-15 08:59:54', 1),
(19, '::1', 'admin@gmail.com', 0, '2023-05-15 09:00:16', 1),
(20, '::1', 'admin@gmail.com', NULL, '2023-05-15 09:01:02', 0),
(21, '::1', 'admin@gmail.com', 0, '2023-05-15 09:01:25', 1),
(22, '::1', 'admin@gmail.com', 0, '2023-05-15 09:03:28', 1),
(23, '::1', 'admin@gmail.com', 0, '2023-05-15 09:03:55', 1),
(24, '::1', 'alfia@gmail.com', 11, '2023-05-15 09:04:27', 1),
(25, '::1', 'admin@gmail.com', NULL, '2023-05-15 09:05:41', 0),
(26, '::1', 'admin@gmail.com', 0, '2023-05-15 09:05:59', 1),
(27, '::1', 'admin@gmail.com', 0, '2023-05-16 06:03:09', 1),
(28, '::1', 'isyaau@gmail.com', 1, '2023-05-16 06:03:19', 1),
(29, '::1', 'admin', NULL, '2023-05-16 06:27:23', 0),
(30, '::1', 'admin@gmail.com', 13, '2023-05-16 06:27:39', 1),
(31, '::1', 'fuadiazhar12@gmail.com', NULL, '2023-05-16 16:27:08', 0),
(32, '::1', 'fuadiazhar12@gmail.com', 14, '2023-05-16 16:27:18', 1),
(33, '::1', 'admin@gmail.com', NULL, '2023-05-16 16:35:41', 0),
(34, '::1', 'admin@gmail.com', 13, '2023-05-16 16:35:50', 1),
(35, '::1', 'fuadiazhar12@gmail.com', NULL, '2023-05-16 16:38:15', 0),
(36, '::1', 'fuadiazhar12@gmail.com', 14, '2023-05-16 16:38:31', 1),
(37, '::1', 'admin@gmail.com', 13, '2023-05-16 16:39:03', 1),
(38, '::1', 'fuadiazhar12@gmail.com', 14, '2023-05-16 16:42:41', 1),
(39, '::1', 'admin@gmail.com', NULL, '2023-05-16 16:45:35', 0),
(40, '::1', 'admin@gmail.com', NULL, '2023-05-16 16:45:44', 0),
(41, '::1', 'admin@gmail.com', 13, '2023-05-16 16:45:52', 1),
(42, '::1', 'fuadiazhar12@gmail.com', 14, '2023-05-16 16:48:26', 1),
(43, '::1', 'isyaau@gmail.com', NULL, '2023-05-17 12:35:16', 0),
(44, '::1', 'isyaau@gmail.com', 1, '2023-05-17 12:35:26', 1),
(45, '::1', 'isyaau#gmail.com', NULL, '2023-05-19 12:39:44', 0),
(46, '::1', 'iyaau@gmail.com', NULL, '2023-05-19 12:40:00', 0),
(47, '::1', 'isyaau@gmail.com', 1, '2023-05-19 12:40:16', 1),
(48, '::1', 'isyaau@gmailcom', NULL, '2023-05-20 19:15:48', 0),
(49, '::1', 'isyaau@gmail.com', 1, '2023-05-20 19:16:02', 1),
(50, '::1', 'isyaau@gmail.com', 1, '2023-05-22 14:22:46', 1),
(51, '::1', 'isyaau@gmail.com', 1, '2023-05-24 01:21:52', 1),
(52, '::1', 'admin@gmail.com', NULL, '2023-05-24 01:32:45', 0),
(53, '::1', 'admin', NULL, '2023-05-24 01:32:58', 0),
(54, '::1', 'isyaau@gmail.com', 1, '2023-05-24 01:33:03', 1),
(55, '::1', 'admin@gmail.com', NULL, '2023-05-24 01:33:42', 0),
(56, '::1', 'admin@gmail.com', NULL, '2023-05-24 01:34:28', 0),
(57, '::1', 'admin@gmail.com', NULL, '2023-05-24 01:34:49', 0),
(58, '::1', 'isyaau@gmail.com', 1, '2023-05-24 01:35:01', 1),
(59, '::1', 'admin@gmail.com', NULL, '2023-05-24 01:36:05', 0),
(60, '::1', 'isyaau@gmail.com', 1, '2023-05-24 01:40:11', 1),
(61, '::1', 'admin@gmail.com', 13, '2023-05-24 01:40:57', 1),
(62, '::1', 'andi00@afpeterg.com', 15, '2023-05-24 02:05:39', 1),
(63, '::1', 'andi00@afpeterg.com', 15, '2023-05-24 02:10:36', 1),
(64, '::1', 'admin@gmail.com', 13, '2023-05-24 02:16:08', 1),
(65, '::1', 'isyaau@gmail.com', 1, '2023-05-24 15:30:04', 1),
(66, '::1', 'isyaau@gmail.com', 1, '2023-06-17 15:55:54', 1),
(67, '::1', 'isyaau@gmail.com', 1, '2023-07-25 07:37:29', 1),
(68, '::1', 'isyaau@gmail.com', 1, '2023-07-26 01:13:42', 1),
(69, '::1', 'isyaau@gmail.com', 1, '2023-07-26 04:16:47', 1),
(70, '::1', 'isyaau@gmail.com', 1, '2023-07-27 16:24:38', 1),
(71, '::1', 'isyaau@gmail.com', 1, '2023-07-28 01:16:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

DROP TABLE IF EXISTS `auth_permissions`;
CREATE TABLE IF NOT EXISTS `auth_permissions` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

DROP TABLE IF EXISTS `auth_reset_attempts`;
CREATE TABLE IF NOT EXISTS `auth_reset_attempts` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `auth_reset_attempts`
--

INSERT INTO `auth_reset_attempts` (`id`, `email`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, 'fuadiazhar12@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36 Edg/113.0.1774.42', '546029a3c08ed689fbfb765d11bc0ae4', '2023-05-16 16:38:00'),
(2, 'andi00@afpeterg.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36 Edg/113.0.1774.50', '6d30588243b3a4501f63163ae0aa88f0', '2023-05-24 02:13:04');

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

DROP TABLE IF EXISTS `auth_tokens`;
CREATE TABLE IF NOT EXISTS `auth_tokens` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

DROP TABLE IF EXISTS `auth_users_permissions`;
CREATE TABLE IF NOT EXISTS `auth_users_permissions` (
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int UNSIGNED NOT NULL DEFAULT '0',
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bayar`
--

DROP TABLE IF EXISTS `jenis_bayar`;
CREATE TABLE IF NOT EXISTS `jenis_bayar` (
  `id_jenisbayar` int NOT NULL AUTO_INCREMENT,
  `jenis_bayar` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_jenisbayar`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jenis_bayar`
--

INSERT INTO `jenis_bayar` (`id_jenisbayar`, `jenis_bayar`) VALUES
(1, 'Kredit'),
(6, 'Cash'),
(0, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

DROP TABLE IF EXISTS `merk`;
CREATE TABLE IF NOT EXISTS `merk` (
  `id_merk` int NOT NULL AUTO_INCREMENT,
  `nama_merk` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_merk`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`id_merk`, `nama_merk`) VALUES
(10, 'BMW'),
(7, 'Honda'),
(11, 'Ferari');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(6, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1683085034, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

DROP TABLE IF EXISTS `mobil`;
CREATE TABLE IF NOT EXISTS `mobil` (
  `id_mobil` int NOT NULL AUTO_INCREMENT,
  `id_merk` int NOT NULL,
  `nama_mobil` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `warna` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jumlah_kursi` int NOT NULL,
  `no_polisi` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tahun_beli` int NOT NULL,
  `harga` bigint DEFAULT NULL,
  `gambar` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id_mobil`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `id_merk`, `nama_mobil`, `warna`, `jumlah_kursi`, `no_polisi`, `tahun_beli`, `harga`, `gambar`, `status`) VALUES
(10, 7, 'Supra', 'Merah', 5, 'dgfdg', 356, 32424, '1674967323_30cc953b5f9b074d48a3.jpg', 0),
(9, 7, 'Vario', 'Merah', 5, 'dgfdg', 356, 324224, '1674910010_6fb31d777d812559cb4b.jpg', 1),
(8, 7, 'Jass', 'Merah', 7, 'AE 8768 HJ', 2020, 32424, 'default-mobil.jpeg', 1),
(11, 7, 'Vario', 'Merah', 5, 'dgfdg', 356, 3242342, '1674923110_b7ea06e7e97978eb61f0.jpg', 0),
(17, 7, 'Civic', 'Merah', 4, 'AE 4565 JL', 2023, 32242, '1675093161_abe43b3fa5e74516abcf.jpg', 2),
(14, 7, 'Yamaha', 'Merah', 5, 'dgfdg', 356, 23421, '1674923138_1d882432020d3fc54371.jpg', 0),
(16, 7, 'Corolla', 'Merah', 2, 'AE 5747 JL', 2022, 23423324, '1675092439_1f73e36134424cabaef7.jpg', 1),
(21, 10, 'asdcxa', 'ads', 3, '235rwsetgf', 323, 12221, '1690274909_c9b3e34043cc463d6a2b.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

DROP TABLE IF EXISTS `pengeluaran`;
CREATE TABLE IF NOT EXISTS `pengeluaran` (
  `id_pengeluaran` int NOT NULL AUTO_INCREMENT,
  `nama_pengeluaran` varchar(80) NOT NULL,
  `jumlah` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pengeluaran`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perjalanan`
--

DROP TABLE IF EXISTS `perjalanan`;
CREATE TABLE IF NOT EXISTS `perjalanan` (
  `id_perjalanan` int NOT NULL AUTO_INCREMENT,
  `asal` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tujuan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jarak` int NOT NULL,
  PRIMARY KEY (`id_perjalanan`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `perjalanan`
--

INSERT INTO `perjalanan` (`id_perjalanan`, `asal`, `tujuan`, `jarak`) VALUES
(1, 'Ngawi', 'Magetan', 30),
(5, 'Madiun', 'Semarang', 110),
(0, 'none', 'none', 0),
(6, 'Ponorogo', 'Semarang', 60);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

DROP TABLE IF EXISTS `pesanan`;
CREATE TABLE IF NOT EXISTS `pesanan` (
  `id_pesanan` int NOT NULL AUTO_INCREMENT,
  `hari` bigint NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `id_pemesan` int NOT NULL,
  `id_mobil` int NOT NULL,
  `id_perjalanan` int NOT NULL,
  `id_jenisbayar` int NOT NULL,
  `proses` int NOT NULL,
  PRIMARY KEY (`id_pesanan`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `hari`, `tgl_pinjam`, `tgl_kembali`, `id_pemesan`, `id_mobil`, `id_perjalanan`, `id_jenisbayar`, `proses`) VALUES
(4, 646, '2023-01-02', '2023-01-11', 12, 8, 1, 1, 0),
(3, 45353, '2023-01-17', '2023-01-11', 12, 8, 1, 2, 1),
(11, 900000, '2023-01-16', '2023-01-28', 14, 17, 5, 6, 1),
(9, 400000, '2023-01-10', '2023-02-03', 14, 17, 6, 6, 2),
(12, 30000, '2023-04-28', '2023-04-28', 16, 17, 5, 1, 2),
(13, 30000, '2023-04-28', '2023-04-28', 16, 17, 5, 1, 2),
(14, 30000, '2023-04-28', '2023-04-28', 16, 17, 5, 1, 0),
(18, 30000, '2023-05-24', '2023-05-10', 7, 8, 5, 1, 1),
(19, 30000, '2023-05-24', '2023-05-10', 1, 8, 5, 1, 2),
(20, 30000, '2023-05-24', '2023-05-10', 1, 14, 5, 1, 1),
(21, 0, '2023-05-08', '2023-05-15', 1, 16, 0, 0, 0),
(22, 0, '2023-05-16', '2023-05-22', 1, 16, 0, 0, 0),
(23, 0, '2023-05-17', '2023-05-16', 11, 9, 0, 0, 0),
(24, 5454, '2023-05-18', '2023-05-17', 14, 14, 5, 6, 2),
(25, 0, '2023-05-09', '2023-05-16', 15, 8, 0, 0, 0),
(26, 9, '2023-07-10', '2023-07-10', 1, 8, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `fullname` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `jenis_kelamin` int DEFAULT NULL,
  `alamat` varchar(80) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `foto` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'default-avatar.jpg',
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `reset_hash` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `status_message` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `fullname`, `jenis_kelamin`, `alamat`, `foto`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'isyaau@gmail.com', 'Admin Super', 2, 'Jalan Nongo Karangjati Ngawi', '1683091202_3253c312f0d5aabdb6a2.jpg', 'isyaau', '$2y$10$aNuFBFe/qEbds36lgWtsFOTSwoj3IkTr6WujcDLcnF78mlfDVVOBy', NULL, NULL, NULL, NULL, '1', NULL, 1, 0, '2023-05-03 03:40:35', '2023-05-11 06:57:44', NULL),
(13, 'admin@gmail.com', 'Administrator', 1, 'Madiun', 'default-avatar.jpg', 'admin', '$2y$10$1RMVvDy68ZEhigp0yQNn7e4D0IugQj7LByQl7/gtoqPmNxAX/pVkq', NULL, NULL, NULL, NULL, '1', NULL, 1, 0, '2023-05-16 06:25:49', '2023-05-24 01:35:15', NULL),
(15, 'andi00@afpeterg.com', 'Andi', NULL, NULL, 'default-avatar.jpg', 'andi', '$2y$10$mBZ4WsJTspBFmYBkKTXGieaL/gIF7XQF7Vk8QZruWW7gp23lez/Wi', NULL, '2023-05-24 02:13:07', NULL, NULL, '2', NULL, 1, 0, '2023-05-24 02:00:41', '2023-05-24 02:13:07', NULL),
(14, 'fuadiazhar12@gmail.com', 'Azhar', NULL, NULL, 'default-avatar.jpg', 'azrhar', '$2y$10$BpoI5ga48TgK6SZQVZAUouugGeZoLU8j6lPtgR8sjb8fAXUNHlA.e', NULL, '2023-05-16 16:38:02', NULL, NULL, '2', NULL, 1, 0, '2023-05-16 16:24:01', '2023-05-16 16:40:48', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
