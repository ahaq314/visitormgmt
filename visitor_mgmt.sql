-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 02, 2021 at 10:50 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visitor_mgmt`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_30_043759_visitors_info_table', 1),
(5, '2021_07_30_043837_visitors_log_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visitors_info`
--

CREATE TABLE `visitors_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors_info`
--

INSERT INTO `visitors_info` (`id`, `first_name`, `last_name`, `phone_no`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Nirmal', 'Kumar', '3333345678', 'Lane 4 Block 5', '2021-07-30 03:45:11', '2021-07-30 03:45:11'),
(2, 'Sanjay', 'Kumar', '1234567656', 'Road 5 Ave park', '2021-07-30 03:57:26', '2021-07-30 03:57:26'),
(4, 'Arun', 'Kumar', '1234567890', 'Road 5', '2021-07-30 11:41:46', '2021-07-30 11:41:46'),
(5, 'Mohit', 'Kumar', '1234567891', 'Block 4', '2021-07-30 11:45:16', '2021-07-30 11:45:16'),
(6, 'Anwar', 'Haque', '1111111111', 'Road 7', '2021-07-31 02:30:59', '2021-07-31 02:30:59'),
(7, 'Anil', 'Kumar', '3333333333', 'Road 6', '2021-07-31 02:33:26', '2021-07-31 02:33:26'),
(8, 'Mark', 'Jones', '4444444444', 'Road 7', '2021-07-31 12:39:02', '2021-07-31 12:39:02'),
(9, 'Ajay', 'Kumar', '6666666666', 'Road 16', '2021-08-01 12:50:03', '2021-08-01 12:50:03'),
(10, 'Sunil', 'Kumar', '8282828282', 'House 4', '2021-08-01 13:17:05', '2021-08-01 13:17:05'),
(11, 'Sumit', 'Kumar', '5555555555', 'Road 8', '2021-08-01 13:18:10', '2021-08-01 13:18:10'),
(12, 'Suman', 'Kumar', '4555444444', 'House 8', '2021-08-01 13:18:54', '2021-08-01 13:18:54'),
(13, 'Sudip', 'Banerjee', '5555555565', 'Block 6', '2021-08-01 22:13:51', '2021-08-01 22:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `visitors_log`
--

CREATE TABLE `visitors_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visitor_id` bigint(20) UNSIGNED NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime DEFAULT NULL,
  `purpose` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors_log`
--

INSERT INTO `visitors_log` (`id`, `visitor_id`, `check_in`, `check_out`, `purpose`, `created_at`, `updated_at`) VALUES
(2, 2, '2021-07-31 07:57:45', NULL, 'ok', '2021-07-31 02:27:45', '2021-07-31 02:27:45'),
(3, 2, '2021-07-31 07:58:33', NULL, 'ok', '2021-07-31 02:28:33', '2021-07-31 02:28:33'),
(4, 6, '2021-07-31 08:00:59', NULL, 'Block 6', '2021-07-31 02:30:59', '2021-07-31 02:30:59'),
(5, 6, '2021-07-31 08:01:59', NULL, 'no wait', '2021-07-31 02:31:59', '2021-07-31 02:31:59'),
(6, 7, '2021-07-31 08:03:26', NULL, 'meeting', '2021-07-31 02:33:26', '2021-07-31 02:33:26'),
(7, 7, '2021-07-31 08:03:35', NULL, 'meeting', '2021-07-31 02:33:35', '2021-07-31 02:33:35'),
(8, 7, '2021-07-31 08:04:23', NULL, 'looking', '2021-07-31 02:34:23', '2021-07-31 02:34:23'),
(9, 7, '2021-07-31 08:09:12', NULL, 'oououou', '2021-07-31 02:39:12', '2021-07-31 02:39:12'),
(10, 7, '2021-07-31 08:22:15', NULL, 'dual meeting', '2021-07-31 02:52:15', '2021-07-31 02:52:15'),
(11, 7, '2021-07-31 08:23:51', NULL, 'dual meeting', '2021-07-31 02:53:51', '2021-07-31 02:53:51'),
(12, 7, '2021-07-31 08:25:00', '2021-08-02 07:48:10', 'dual meeting', '2021-07-31 02:55:00', '2021-08-02 02:18:10'),
(15, 7, '2021-07-31 08:31:14', '2021-08-02 07:10:07', 'hi', '2021-07-31 03:01:14', '2021-08-02 01:40:07'),
(17, 8, '2021-07-31 18:09:02', NULL, 'happy', '2021-07-31 12:39:02', '2021-07-31 12:39:02'),
(18, 9, '2021-08-01 18:20:03', '2021-08-02 08:18:31', 'meet the person', '2021-08-01 12:50:03', '2021-08-02 02:48:31'),
(19, 7, '2021-08-01 18:37:19', '2021-08-02 07:09:32', 'Again meeting...', '2021-08-01 13:07:19', '2021-08-02 01:39:32'),
(20, 10, '2021-08-01 18:47:05', NULL, 'meet friend', '2021-08-01 13:17:05', '2021-08-01 13:17:05'),
(21, 11, '2021-08-01 18:48:10', NULL, 'meet the person', '2021-08-01 13:18:10', '2021-08-01 13:18:10'),
(22, 12, '2021-08-01 18:48:54', NULL, 'meet', '2021-08-01 13:18:54', '2021-08-01 13:18:54'),
(23, 13, '2021-08-02 03:43:51', '2021-08-02 07:05:45', 'fgfgdfg', '2021-08-01 22:13:51', '2021-08-02 01:35:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors_info`
--
ALTER TABLE `visitors_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors_log`
--
ALTER TABLE `visitors_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visitors_log_visitor_id_foreign` (`visitor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitors_info`
--
ALTER TABLE `visitors_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `visitors_log`
--
ALTER TABLE `visitors_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `visitors_log`
--
ALTER TABLE `visitors_log`
  ADD CONSTRAINT `visitors_log_visitor_id_foreign` FOREIGN KEY (`visitor_id`) REFERENCES `visitors_info` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
