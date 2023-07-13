-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 01:22 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelproyek`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `added_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `name`, `quantity`, `added_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Apple', 15, 'dummy', '2022-12-18 19:54:39', '2022-12-18 19:54:39', NULL),
(2, 'Mango', 2423434, 'thanos', '2022-12-18 20:00:56', '2022-12-18 20:00:56', NULL),
(3, 'Guava', 3453535, 'thanos', '2022-12-18 20:00:56', '2022-12-18 20:01:26', '2022-12-18 20:01:26'),
(4, 'mangga', 3434, 'Administrator', '2022-12-18 20:11:29', '2022-12-18 20:11:29', NULL),
(5, 'lala', 353535, 'Administrator', '2022-12-18 20:11:29', '2022-12-18 20:11:38', '2022-12-18 20:11:38'),
(6, 'batam', 345454, 'Administrator', '2022-12-18 20:37:38', '2022-12-18 20:37:38', NULL),
(7, 'gargoyle', 23232, 'Administrator', '2022-12-18 20:37:38', '2022-12-18 20:38:03', '2022-12-18 20:38:03'),
(8, 'pepaya semarang', 45, 'Administrator', '2022-12-21 22:41:22', '2022-12-21 22:41:43', NULL),
(9, 'apel', 34, 'Administrator', '2022-12-21 22:41:22', '2022-12-21 22:41:35', '2022-12-21 22:41:35'),
(10, 'ayam indonesia', 11, 'Administrator', '2022-12-22 00:05:51', '2022-12-22 00:06:14', NULL),
(11, 'ayam thailand', 12, 'Administrator', '2022-12-22 00:05:51', '2022-12-22 00:06:25', '2022-12-22 00:06:25'),
(12, 'sapi jawa', 23, 'thanos', '2022-12-22 00:08:11', '2022-12-22 00:44:16', NULL),
(13, 'capi hitam', 11, 'thanos', '2022-12-22 00:08:11', '2022-12-22 00:44:09', '2022-12-22 00:44:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
