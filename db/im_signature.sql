-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 14, 2025 at 06:07 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `im_signature`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id` int NOT NULL,
  `divisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2024_04_07_103844_create_surats_table', 2);

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
-- Table structure for table `surats`
--

CREATE TABLE `surats` (
  `id` bigint UNSIGNED NOT NULL,
  `nomor_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kepada` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` tinyint NOT NULL,
  `tanggal_kirim` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int NOT NULL,
  `isi_surat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `generate_surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surats`
--

INSERT INTO `surats` (`id`, `nomor_surat`, `kepada`, `perihal`, `users_id`, `tanggal_kirim`, `created_at`, `updated_at`, `status`, `isi_surat`, `generate_surat`) VALUES
(1, '06/TB-ICT/VIII/2023', 'FINANCE NSCB', 'Pengajuan  pembatalan PRV', 1, '2023-08-25', '2024-04-23 22:03:18', '2024-04-28 07:31:04', 1, '', NULL),
(8, '06/TB-ICT/VIII/2023', 'FINANCE NSCB', 'Pengajuan  pembatalan PRV', 1, '2023-08-25', '2024-04-26 20:41:23', '2024-04-28 19:15:02', 1, '<p class=\"TableParagraph\" style=\"text-align:justify;line-height:150%\"><span lang=\"id\">Bersamaan surat ini kami bermaksud untuk mengajukan permohonan\r\npembatalan PRV SZ/ICT/23/0002 dan 02/SZK/ICT/08/23-R1 karna salah dalam\r\npembuataan PRV yang berkaitan dengan pajak (Witholding).<o:p></o:p></span></p>', NULL),
(15, '06/TB-ICT/VIII/2023', 'FINANCE NSCB', 'Pengajuan  pembatalan PRV', 1, '2024-04-30', '2024-04-29 21:48:49', '2024-04-29 23:45:42', 3, '<p class=\"TableParagraph\" style=\"text-align:justify;line-height:150%\"><span lang=\"id\">Bersamaan surat ini kami bermaksud untuk mengajukan permohonan\r\npembatalan PRV SZ/ICT/23/0002 dan 02/SZK/ICT/08/23-R1 karna salah dalam\r\npembuataan PRV yang berkaitan dengan pajak (Witholding).<o:p></o:p></span></p>', NULL),
(18, '10/TB-ICT/VIII/2023', 'FINANCE NSCB', 'Pengajuan  pembatalan PRV', 2, '2024-04-30', '2024-04-30 00:35:58', '2024-04-30 00:36:26', 3, '<p class=\"TableParagraph\" style=\"text-align:justify;line-height:150%\"><span lang=\"id\">Bersamaan surat ini kami bermaksud untuk mengajukan permohonan\r\npembatalan PRV SZ/ICT/23/0002 dan 02/SZK/ICT/08/23-R1 karna salah dalam\r\npembuataan PRV yang berkaitan dengan pajak (Witholding).<o:p></o:p></span></p>', NULL),
(35, '06/TB-ICT/VIII/2023', 'FINANCE NSCB', 'Pengajuan  pembatalan PRV', 1, '2024-05-04', '2024-05-03 21:19:32', '2024-05-03 21:20:26', 2, '<p>Pengajuan&nbsp; pembatalan PRV<br></p>', 'storage/generate/surat_2024-05-04_04-20-26.pdf'),
(36, '06/TB-ICT/VIII/2023', 'FINANCE NSCB', 'Permintaan laporan barang', 1, '2024-05-05', '2024-05-05 07:32:48', '2024-05-05 18:51:28', 2, '<p>Barang rusak</p>', 'storage/generate/surat_2024-05-06_01-51-28.pdf'),
(51, '06/TB-ICT/VIII/2023', 'Holding rivai', 'Permintaan laporan barang', 1, '2024-05-14', '2024-05-14 03:00:12', '2024-05-24 02:50:14', 2, '<p>Laporan Barang masuk</p>', 'storage/generate/surat_2024-05-24_09-50-14.pdf'),
(65, '06/TB-ICT/VIII/2023', 'Holding rivai', 'Permintaan laporan barang', 1, '2024-06-13', '2024-06-12 23:21:17', '2024-06-12 23:22:59', 2, '<p>Laporan Barang rusak</p>', 'storage/generate/surat_2024-06-13_06-22-59.pdf'),
(66, '06/TB-ICT/VIII/2023', 'FINANCE NSCB', 'Pengajuan  pembatalan PRV', 2, '2024-06-13', '2024-06-12 23:24:08', '2024-06-12 23:24:46', 3, '<p>&nbsp;Pengajuan&nbsp; pembatalan PRV<br></p>', NULL),
(67, '06/TB-ICT/VIII/2023', 'FINANCE NSCB', 'Pengajuan  pembatalan PRV', 1, '2024-06-15', '2024-06-14 18:57:19', '2024-06-14 19:04:40', 2, '<p>&nbsp;Pengajuan&nbsp; pembatalan PRV<br></p>', 'storage/generate/surat_2024-06-15_02-04-39.pdf'),
(68, '06/TB-ICT/VIII/2023', 'FINANCE NSCB', 'Pengajuan  pembatalan PRV', 1, '2024-06-15', '2024-06-14 19:47:23', '2024-06-14 19:48:24', 2, '<p>Pengajuan&nbsp; pembatalan PRV<br></p>', 'storage/generate/surat_2024-06-15_02-48-23.pdf'),
(69, '06/TB-ICT/VIII/2023', 'Holding rivai', 'Pengajuan  pembatalan PRV', 1, '2024-06-23', '2024-06-23 05:48:53', '2024-06-23 05:50:06', 2, '<p>&nbsp;Pengajuan&nbsp; pembatalan PRV<br></p>', 'storage/generate/surat_2024-06-23_12-50-05.pdf'),
(70, '06/TB-ICT/VIII/2023', 'Holding rivai', 'Pengajuan  pembatalan PRV', 1, '2024-06-24', '2024-06-23 19:16:28', '2024-06-23 19:18:19', 2, '<p>&nbsp;Pengajuan&nbsp; pembatalan PRV<br></p>', 'storage/generate/surat_2024-06-24_02-18-18.pdf'),
(71, '06/TB-ICT/VIII/2023', 'Holding rivai', 'Pengajuan  pembatalan PRV', 1, '2024-06-28', '2024-06-27 17:50:20', '2024-06-27 17:52:52', 2, '<p>&nbsp;Pengajuan&nbsp; pembatalan PRV<br></p>', 'storage/generate/surat_2024-06-28_00-52-51.pdf'),
(72, '07/TB-ICT/VIII/2023', 'Holding rivai', 'Pengajuan  pembatalan PRV', 1, '2024-07-22', '2024-07-22 05:57:32', '2024-07-22 05:58:33', 2, '<p>Pengajuan pembatalan PRV</p>', 'storage/generate/surat_2024-07-22_12-58-33.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','manager') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ttd_digital` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `divisi`, `jabatan`, `nomor_telepon`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `ttd_digital`) VALUES
(1, 'Admin', 'admin@gmail.com', 'ICT', 'admin', '0812345678', NULL, '$2y$10$ZnwC9yMxRADvPe3sbP6QNe1S.xMHy6COu3O5.M.i2JnL.gVM/0b/a', 'admin', NULL, '2024-04-17 20:44:03', '2024-04-17 20:44:03', NULL),
(2, 'Manager', 'manager@gmail.com', 'ICT', 'manager', '0890712345', NULL, '$2y$10$42dFv60klA3GBfwppyvIh.X.IV07kMKnFbHaBur9PojeAx81HgA6q', 'manager', NULL, '2024-04-17 20:44:03', '2024-05-05 22:05:00', 'images/ttd.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
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
-- Indexes for table `surats`
--
ALTER TABLE `surats`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `surats`
--
ALTER TABLE `surats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
