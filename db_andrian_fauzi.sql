-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 05, 2023 at 05:53 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_andrian_fauzi`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatives`
--

CREATE TABLE `alternatives` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatives`
--

INSERT INTO `alternatives` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 'Puzzle Kecil', 1, '2023-09-01 21:49:20', '2023-09-01 21:49:20'),
(5, 'Tebak Gambar Horror Lucu', 1, '2023-09-01 21:50:37', '2023-09-01 21:50:37'),
(6, 'Tebak Gambar', 1, '2023-09-01 22:04:45', '2023-09-01 22:04:45'),
(7, 'Game Benar Salah', 1, '2023-09-02 00:19:48', '2023-09-02 00:19:48'),
(8, 'Feeding Frenzy', 1, '2023-09-02 00:21:08', '2023-09-02 00:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `alternative_criterias`
--

CREATE TABLE `alternative_criterias` (
  `id` bigint UNSIGNED NOT NULL,
  `alternative_id` bigint UNSIGNED NOT NULL,
  `criteria_id` bigint UNSIGNED NOT NULL,
  `subcriteria_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternative_criterias`
--

INSERT INTO `alternative_criterias` (`id`, `alternative_id`, `criteria_id`, `subcriteria_id`, `created_at`, `updated_at`) VALUES
(50, 4, 1, 4, '2023-09-01 21:49:20', '2023-09-01 21:49:20'),
(51, 4, 2, 8, '2023-09-01 21:49:20', '2023-09-01 21:49:20'),
(52, 4, 3, 12, '2023-09-01 21:49:20', '2023-09-01 21:49:20'),
(53, 4, 4, 16, '2023-09-01 21:49:20', '2023-09-01 21:49:20'),
(54, 4, 5, 18, '2023-09-01 21:49:20', '2023-09-01 21:49:20'),
(55, 4, 6, 24, '2023-09-01 21:49:20', '2023-09-01 21:49:20'),
(56, 4, 7, 28, '2023-09-01 21:49:20', '2023-09-01 21:49:20'),
(57, 5, 1, 2, '2023-09-01 21:50:37', '2023-09-01 21:50:37'),
(58, 5, 2, 5, '2023-09-01 21:50:37', '2023-09-01 21:50:37'),
(59, 5, 3, 10, '2023-09-01 21:50:37', '2023-09-01 21:50:37'),
(60, 5, 4, 15, '2023-09-01 21:50:37', '2023-09-01 21:50:37'),
(61, 5, 5, 20, '2023-09-01 21:50:37', '2023-09-01 21:50:37'),
(62, 5, 6, 24, '2023-09-01 21:50:37', '2023-09-01 21:50:37'),
(63, 5, 7, 27, '2023-09-01 21:50:37', '2023-09-01 21:50:37'),
(64, 6, 1, 3, '2023-09-01 22:04:45', '2023-09-01 22:04:45'),
(65, 6, 2, 8, '2023-09-01 22:04:45', '2023-09-01 22:04:45'),
(66, 6, 3, 11, '2023-09-01 22:04:45', '2023-09-01 22:04:45'),
(67, 6, 4, 16, '2023-09-01 22:04:45', '2023-09-01 22:04:45'),
(68, 6, 5, 20, '2023-09-01 22:04:45', '2023-09-01 22:04:45'),
(69, 6, 6, 23, '2023-09-01 22:04:45', '2023-09-01 22:04:45'),
(70, 6, 7, 27, '2023-09-01 22:04:45', '2023-09-01 22:04:45'),
(78, 8, 1, 4, '2023-09-02 00:21:08', '2023-09-02 00:21:08'),
(79, 8, 2, 7, '2023-09-02 00:21:08', '2023-09-02 00:21:08'),
(80, 8, 3, 10, '2023-09-02 00:21:08', '2023-09-02 00:21:08'),
(81, 8, 4, 15, '2023-09-02 00:21:08', '2023-09-02 00:21:08'),
(82, 8, 5, 19, '2023-09-02 00:21:08', '2023-09-02 00:21:08'),
(83, 8, 6, 24, '2023-09-02 00:21:08', '2023-09-02 00:21:08'),
(84, 8, 7, 28, '2023-09-02 00:21:08', '2023-09-02 00:21:08'),
(92, 7, 1, 2, '2023-09-02 00:42:40', '2023-09-02 00:42:40'),
(93, 7, 2, 5, '2023-09-02 00:42:40', '2023-09-02 00:42:40'),
(94, 7, 3, 12, '2023-09-02 00:42:40', '2023-09-02 00:42:40'),
(95, 7, 4, 16, '2023-09-02 00:42:40', '2023-09-02 00:42:40'),
(96, 7, 5, 20, '2023-09-02 00:42:40', '2023-09-02 00:42:40'),
(97, 7, 6, 22, '2023-09-02 00:42:40', '2023-09-02 00:42:40'),
(98, 7, 7, 27, '2023-09-02 00:42:40', '2023-09-02 00:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

CREATE TABLE `criterias` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`id`, `name`, `weight`, `created_at`, `updated_at`) VALUES
(1, 'Rating', '20', '2023-09-01 18:50:58', '2023-09-01 18:50:58'),
(2, 'Jumlah Download', '10', '2023-09-01 18:52:51', '2023-09-01 19:03:49'),
(3, 'Isi Konten', '20', '2023-09-01 18:53:01', '2023-09-01 18:53:01'),
(4, 'Memecahkan Masalah', '10', '2023-09-01 18:53:10', '2023-09-01 19:04:01'),
(5, 'Konsentrasi', '10', '2023-09-01 18:53:18', '2023-09-01 19:04:08'),
(6, 'Kenyamanan', '17', '2023-09-01 18:53:25', '2023-09-01 19:04:15'),
(7, 'Visualisasi', '13', '2023-09-01 18:53:32', '2023-09-01 19:04:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_31_164239_create_criterias_table', 1),
(7, '2023_09_02_012308_create_sub_criterias_table', 1),
(11, '2023_08_31_164249_create_alternatives_table', 2),
(12, '2023_09_02_024519_create_alternative_criterias_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_criterias`
--

CREATE TABLE `sub_criterias` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int NOT NULL,
  `criteria_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_criterias`
--

INSERT INTO `sub_criterias` (`id`, `name`, `value`, `criteria_id`, `created_at`, `updated_at`) VALUES
(1, '<= 3.5', 1, 1, '2023-09-01 18:56:32', '2023-09-01 19:02:30'),
(2, '> 3.5 - <= 4.0', 3, 1, '2023-09-01 18:56:43', '2023-09-01 19:02:43'),
(3, '> 4.0 - <= 4.5', 5, 1, '2023-09-01 18:56:53', '2023-09-01 19:02:54'),
(4, '>= 4.5', 7, 1, '2023-09-01 18:56:59', '2023-09-01 19:03:14'),
(5, '<= 100.000', 1, 2, '2023-09-01 19:06:29', '2023-09-01 19:06:29'),
(6, '> 100.000 - <=500.000', 3, 2, '2023-09-01 19:06:53', '2023-09-01 19:07:59'),
(7, '>500.000 - <=1.000.000', 4, 2, '2023-09-01 19:07:23', '2023-09-01 19:08:08'),
(8, '> 1.000.000', 5, 2, '2023-09-01 19:09:01', '2023-09-01 19:09:06'),
(9, 'Tidak Edukatif', 1, 3, '2023-09-01 19:09:32', '2023-09-01 19:09:32'),
(10, 'Kurang Edukatif', 3, 3, '2023-09-01 19:12:31', '2023-09-01 19:12:37'),
(11, 'Cukup Edukatif', 5, 3, '2023-09-01 19:24:05', '2023-09-01 19:24:05'),
(12, 'Sangat Edukatif', 7, 3, '2023-09-01 19:28:27', '2023-09-01 19:28:27'),
(13, 'Tidak Ada Pemecahan Masalah', 1, 4, '2023-09-01 19:29:35', '2023-09-01 19:29:35'),
(14, 'Memecahkan Masalah dalam 30 Menit', 3, 4, '2023-09-01 19:29:47', '2023-09-01 19:29:47'),
(15, 'Memecahkan Masalah dalam 10 Menit', 4, 4, '2023-09-01 19:29:55', '2023-09-01 19:29:55'),
(16, 'Memecahkan Masalah dalam 5 Menit', 5, 4, '2023-09-01 19:30:08', '2023-09-01 19:30:08'),
(17, 'Tidak Fokus', 1, 5, '2023-09-01 19:30:22', '2023-09-01 19:30:22'),
(18, 'Kurang Fokus', 3, 5, '2023-09-01 19:30:36', '2023-09-01 19:30:36'),
(19, 'Cukup Fokus', 4, 5, '2023-09-01 19:30:49', '2023-09-01 19:30:49'),
(20, 'Sangat Fokus', 5, 5, '2023-09-01 19:30:56', '2023-09-01 19:30:56'),
(21, 'Tidak nyaman', 1, 6, '2023-09-01 19:32:38', '2023-09-01 19:32:38'),
(22, 'Kurang Nyaman', 3, 6, '2023-09-01 19:32:50', '2023-09-01 19:32:50'),
(23, 'Cukup Nyaman', 5, 6, '2023-09-01 19:33:07', '2023-09-01 19:33:07'),
(24, 'Sangat Nyaman', 6, 6, '2023-09-01 19:33:20', '2023-09-01 19:33:20'),
(25, 'Tidak Menarik', 1, 7, '2023-09-01 19:33:42', '2023-09-01 19:33:42'),
(26, 'Kurang Menarik', 3, 7, '2023-09-01 19:34:01', '2023-09-01 19:34:01'),
(27, 'Cukup Menarik', 4, 7, '2023-09-01 19:34:09', '2023-09-01 19:34:09'),
(28, 'Sangat Menarik', 6, 7, '2023-09-01 19:34:19', '2023-09-01 19:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Andrian Fauzi', 'dreandrian18@gmail.com', NULL, '$2y$10$iZxmEQruPNGIJ9Lhar53juhh/PePPx1Lxwmf7uLnBQL1hPf.kJ7ZC', 1, NULL, '2023-09-01 18:48:50', '2023-09-01 18:48:50'),
(2, 'Users', 'user@gmail.com', NULL, '$2y$10$2xxtKtpw/g894o.NW7xxV..qGMXTUhYplNkV.VDR1TE5SzG6my.0a', 0, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatives`
--
ALTER TABLE `alternatives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatives_user_id_foreign` (`user_id`);

--
-- Indexes for table `alternative_criterias`
--
ALTER TABLE `alternative_criterias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternative_criterias_alternative_id_foreign` (`alternative_id`),
  ADD KEY `alternative_criterias_criteria_id_foreign` (`criteria_id`),
  ADD KEY `alternative_criterias_subcriteria_id_foreign` (`subcriteria_id`);

--
-- Indexes for table `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sub_criterias`
--
ALTER TABLE `sub_criterias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_criterias_criteria_id_foreign` (`criteria_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatives`
--
ALTER TABLE `alternatives`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `alternative_criterias`
--
ALTER TABLE `alternative_criterias`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_criterias`
--
ALTER TABLE `sub_criterias`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatives`
--
ALTER TABLE `alternatives`
  ADD CONSTRAINT `alternatives_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `alternative_criterias`
--
ALTER TABLE `alternative_criterias`
  ADD CONSTRAINT `alternative_criterias_alternative_id_foreign` FOREIGN KEY (`alternative_id`) REFERENCES `alternatives` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alternative_criterias_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `alternative_criterias_subcriteria_id_foreign` FOREIGN KEY (`subcriteria_id`) REFERENCES `sub_criterias` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_criterias`
--
ALTER TABLE `sub_criterias`
  ADD CONSTRAINT `sub_criterias_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
