-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 31, 2024 at 11:46 AM
-- Server version: 8.0.37-0ubuntu0.22.04.3
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-f0jul07`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `judul`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Automatic Filling Machine (E-Fill Machine)', '<p>Dibuat Oleh:<br>Muhammad Dhifa Alfitra / 0920040059<br>Deni Almunawar / 0920040055</p>', '2024-07-31 04:39:17', '2024-07-31 04:42:04');

-- --------------------------------------------------------

--
-- Table structure for table `buttons`
--

CREATE TABLE `buttons` (
  `id` bigint UNSIGNED NOT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buttons`
--

INSERT INTO `buttons` (`id`, `menu`, `button`, `kode`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Main Menu', 'W301', 49, 'true', '2024-07-31 08:16:25', '2024-07-31 03:27:46'),
(2, 'Main Menu', 'W002', 2, 'false', '2024-07-31 08:16:25', '2024-07-31 03:27:46'),
(3, 'Main Menu', 'W007', 7, 'false', '2024-07-31 08:17:32', '2024-07-31 08:17:32'),
(4, 'Main Menu', 'W006', 6, 'false', '2024-07-31 08:18:15', '2024-07-31 08:18:15');

-- --------------------------------------------------------

--
-- Table structure for table `conveyors`
--

CREATE TABLE `conveyors` (
  `id` bigint UNSIGNED NOT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` int NOT NULL,
  `value` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conveyors`
--

INSERT INTO `conveyors` (`id`, `menu`, `input`, `kode`, `value`, `created_at`, `updated_at`) VALUES
(1, 'Monitoring', 'D211', 211, 0, '2024-07-31 02:18:21', '2024-07-31 02:18:21'),
(2, 'Setting', 'D200', 200, 0, '2024-07-31 02:18:29', '2024-07-31 04:18:37'),
(3, 'Production Plan', 'D250', 250, 0, '2024-07-31 02:18:38', '2024-07-31 02:18:38');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `input_outputs`
--

CREATE TABLE `input_outputs` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'false',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `input_outputs`
--

INSERT INTO `input_outputs` (`id`, `nama`, `menu`, `button`, `kode`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Photoelectric 1', 'Input', 'W005', 5, 'false', '2024-07-31 02:58:31', '2024-07-31 02:58:31'),
(2, 'Photoelectric 2', 'Input', 'W004', 4, 'false', '2024-07-31 02:59:21', '2024-07-31 02:59:21'),
(3, 'Photoelectric 3', 'Input', 'W003', 3, 'false', '2024-07-31 02:59:45', '2024-07-31 02:59:45'),
(4, 'Start', 'Input', 'W001', 1, 'false', '2024-07-31 03:00:15', '2024-07-31 03:00:15'),
(5, 'Emergency', 'Input', 'W000', 0, 'false', '2024-07-31 03:00:47', '2024-07-31 03:00:47'),
(6, 'Valve 1', 'Output', 'W10007', 1607, 'false', '2024-07-31 03:01:21', '2024-07-31 03:01:21'),
(7, 'Valve 2', 'Output', 'W10006', 1606, 'false', '2024-07-31 03:02:06', '2024-07-31 03:02:06'),
(8, 'Valve 3', 'Output', 'W10005', 1605, 'false', '2024-07-31 03:02:32', '2024-07-31 03:02:32'),
(9, 'Valve 4', 'Output', 'W10004', 1604, 'false', '2024-07-31 03:03:05', '2024-07-31 03:03:05'),
(10, 'Pneumatic Gate 2', 'Output', 'W10101', 1617, 'false', '2024-07-31 03:03:51', '2024-07-31 03:03:51'),
(11, 'Pneumatic Gate 1', 'Output', 'W10001', 1601, 'false', '2024-07-31 03:04:21', '2024-07-31 03:04:21'),
(12, 'Conveyor', 'Output', 'W10102', 1618, 'false', '2024-07-31 03:04:56', '2024-07-31 03:04:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2024_07_05_201931_create_settings_table', 1),
(11, '2024_07_31_074132_add_field_foto_to_users', 2),
(12, '2024_07_31_074745_create_buttons_table', 3),
(13, '2024_07_31_090003_create_valves_table', 4),
(14, '2024_07_31_091028_create_conveyors_table', 5),
(15, '2024_07_31_094941_create_input_outputs_table', 6),
(16, '2024_07_31_112338_create_abouts_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `nama_website`, `email`, `no_telp`, `alamat`, `logo`, `favicon`, `created_at`, `updated_at`) VALUES
(1, 'Monitoring', 'monitoring@example.com', '081712371273', 'Bandung', 'images/Logo-20240731RtLI6.png', 'images/Favicon-20240731FZTsB.png', '2024-07-30 20:52:28', '2024-07-30 20:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `foto`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@example.com', NULL, 'admin', NULL, '$2y$12$e7PB7sfFEQl/0UQh417kuOXZm2fR504xN5juCtvIS/BbUPP7k1afq', NULL, '2024-07-30 20:50:52', '2024-07-31 03:22:49'),
(2, 'Randy Salim', 'randy@example.com', NULL, 'user', NULL, '$2y$12$VuSUiZFjtPlyINRKIw67vOYY16BswOjsqKHcsD7GyP6WGj0nH7V.y', NULL, '2024-07-31 03:23:53', '2024-07-31 03:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `valves`
--

CREATE TABLE `valves` (
  `id` bigint UNSIGNED NOT NULL,
  `menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` int NOT NULL,
  `value` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `valves`
--

INSERT INTO `valves` (`id`, `menu`, `input`, `kode`, `value`, `created_at`, `updated_at`) VALUES
(1, 'Monitoring', 'D599', 599, 0, '2024-07-31 02:08:06', '2024-07-31 04:15:05'),
(2, 'Monitoring', 'D650', 650, 0, '2024-07-31 02:08:21', '2024-07-31 02:08:21'),
(3, 'Monitoring', 'D660', 660, 0, '2024-07-31 02:08:36', '2024-07-31 02:08:36'),
(4, 'Monitoring', 'D662', 662, 0, '2024-07-31 02:08:48', '2024-07-31 02:08:48'),
(5, 'Setting', 'D0', 0, 0, '2024-07-31 02:08:58', '2024-07-31 04:13:07'),
(6, 'Setting', 'D1', 1, 0, '2024-07-31 02:09:05', '2024-07-31 02:09:05'),
(7, 'Setting', 'D2', 2, 0, '2024-07-31 02:09:12', '2024-07-31 02:09:12'),
(8, 'Setting', 'D3', 3, 0, '2024-07-31 02:09:24', '2024-07-31 02:09:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buttons`
--
ALTER TABLE `buttons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conveyors`
--
ALTER TABLE `conveyors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `input_outputs`
--
ALTER TABLE `input_outputs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `valves`
--
ALTER TABLE `valves`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buttons`
--
ALTER TABLE `buttons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `conveyors`
--
ALTER TABLE `conveyors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `input_outputs`
--
ALTER TABLE `input_outputs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `valves`
--
ALTER TABLE `valves`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
