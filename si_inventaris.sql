-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2024 at 03:28 PM
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
-- Database: `si_inventaris`
--

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
(1, '2013_04_25_063439_create_posisis_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_04_25_064527_create_ruangans_table', 1),
(6, '2024_04_25_071208_create_pengajuan_pinjamans_table', 1),
(7, '2024_05_15_113202_create_pinjaman_ruangans_table', 1),
(8, '2024_06_06_180242_create_ruangan_images_table', 1);

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
-- Table structure for table `pengajuan_pinjamans`
--

CREATE TABLE `pengajuan_pinjamans` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `ruangan_id` bigint UNSIGNED NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `dokumen_pendukung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_urt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengajuan_pinjamans`
--

INSERT INTO `pengajuan_pinjamans` (`id`, `user_id`, `ruangan_id`, `tanggal_mulai`, `tanggal_selesai`, `dokumen_pendukung`, `status_admin`, `status_urt`, `created_at`, `updated_at`) VALUES
(1, 3, 4, '2024-06-07', '2024-06-08', '6662343c8d0c7.pdf', 'Diterima', 'Diterima', '2024-06-06 15:12:12', '2024-06-06 15:33:50'),
(2, 3, 2, '2024-06-07', '2024-06-08', '666234f12e3b4.pdf', 'Tidak Diterima', 'Tidak Diterima', '2024-06-06 15:15:13', '2024-06-06 15:26:35'),
(3, 3, 6, '2024-06-17', '2024-06-18', '66623610a54d6.pdf', 'Diterima', 'Diterima', '2024-06-06 15:20:00', '2024-06-06 20:17:00'),
(4, 3, 3, '2024-06-07', '2024-06-08', '666266afac68f.pdf', 'Diterima', 'Diterima', '2024-06-06 18:47:27', '2024-06-06 18:52:07'),
(5, 3, 3, '2024-06-07', '2024-06-08', '6662692e9ecbf.pdf', 'Diterima', 'Diterima', '2024-06-06 18:58:06', '2024-06-06 19:02:52'),
(6, 5, 3, '2024-06-07', '2024-06-08', '66626ea40cf4e.pdf', 'Diterima', 'Tidak Diterima', '2024-06-06 19:21:24', '2024-06-06 19:25:36'),
(7, 3, 3, '2024-06-07', '2024-06-08', '666281e0f1fa8.pdf', 'Diterima', 'Diterima', '2024-06-06 20:43:28', '2024-06-06 20:46:08'),
(8, 3, 3, '2024-06-07', '2024-06-08', '666285367f6a4.pdf', 'Diterima', 'Diterima', '2024-06-06 20:57:42', '2024-06-06 21:01:03');

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
-- Table structure for table `pinjaman_ruangans`
--

CREATE TABLE `pinjaman_ruangans` (
  `id` bigint UNSIGNED NOT NULL,
  `pengajuan_pinjaman_id` bigint UNSIGNED NOT NULL,
  `tanggal_approval` date NOT NULL,
  `catatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pinjaman_ruangans`
--

INSERT INTO `pinjaman_ruangans` (`id`, `pengajuan_pinjaman_id`, `tanggal_approval`, `catatan`, `created_at`, `updated_at`) VALUES
(1, 2, '2024-06-06', 'mohon maaf, ruangan pada jam tersebut tidak dapat dipinjam', '2024-06-06 15:32:29', '2024-06-06 15:32:29'),
(2, 1, '2024-06-06', 'Bisa Dipakai', '2024-06-06 15:33:50', '2024-06-06 15:33:50'),
(3, 4, '2024-06-07', 'Bisa Dipakai', '2024-06-06 18:52:07', '2024-06-06 18:52:07'),
(4, 5, '2024-06-07', 'Bisa Dipakai', '2024-06-06 19:02:52', '2024-06-06 19:02:52'),
(5, 6, '2024-06-07', 'Bisa Dipakai', '2024-06-06 19:25:36', '2024-06-06 19:25:36'),
(6, 3, '2024-06-07', 'Bisa Dipakai', '2024-06-06 20:17:00', '2024-06-06 20:17:00'),
(7, 7, '2024-06-07', 'Bisa Dipakai', '2024-06-06 20:46:08', '2024-06-06 20:46:08'),
(8, 8, '2024-06-07', 'Bisa Dipakai', '2024-06-06 21:01:03', '2024-06-06 21:01:03');

-- --------------------------------------------------------

--
-- Table structure for table `posisis`
--

CREATE TABLE `posisis` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posisis`
--

INSERT INTO `posisis` (`id`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'ADM', 'Admin Jurusan', NULL, NULL),
(2, 'URT', 'Urusan Rumah Tangga', NULL, NULL),
(3, 'MHS', 'Mahasiswa', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ruangans`
--

CREATE TABLE `ruangans` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lantai` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruangans`
--

INSERT INTO `ruangans` (`id`, `kode`, `nama`, `lantai`, `created_at`, `updated_at`) VALUES
(1, 'RT3', 'Ruang Teori 3', 5, '2024-06-06 14:30:05', '2024-06-06 14:30:05'),
(2, 'RT4', 'Ruang Teori 4', 5, '2024-06-06 14:30:35', '2024-06-06 14:30:35'),
(3, 'RT5', 'Ruang Teori 5', 5, '2024-06-06 14:31:20', '2024-06-06 14:31:20'),
(4, 'LSI2', 'Laboratorium Sistem Informasi 2', 6, '2024-06-06 14:32:15', '2024-06-06 14:32:15'),
(5, 'LSI3', 'Laboratorium Sistem Informasi 3', 6, '2024-06-06 14:32:45', '2024-06-06 14:32:45'),
(6, 'LKJ2', 'Laboratorium Komputer & Jaringan 2', 7, '2024-06-06 14:33:51', '2024-06-06 14:33:51'),
(7, 'LPR4', 'Laboratorium Pemrograman 4', 7, '2024-06-06 14:34:45', '2024-06-06 14:34:45'),
(8, 'LPR8', 'Laboratorium Pemrograman 8', 7, '2024-06-06 14:35:19', '2024-06-06 14:35:19'),
(9, 'warjo', 'meja 1', 7, '2024-06-06 19:24:20', '2024-06-06 19:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan_images`
--

CREATE TABLE `ruangan_images` (
  `id` bigint UNSIGNED NOT NULL,
  `ruangan_id` bigint UNSIGNED NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruangan_images`
--

INSERT INTO `ruangan_images` (`id`, `ruangan_id`, `filename`, `created_at`, `updated_at`) VALUES
(1, 1, 'i2UqTcVK3FXkW1mPf7x63tVQTP4BW2f2K9v9U7GK.jpg', '2024-06-06 14:30:05', '2024-06-06 14:30:05'),
(2, 1, 'ch2xgtdJf1abBrXhUuZ2xetlUzln5ywd9CSZ03e1.jpg', '2024-06-06 14:30:05', '2024-06-06 14:30:05'),
(3, 1, 'KawXQpY7qgq4pr22USxdCRi8nfBURKyyX8Zc6PrG.jpg', '2024-06-06 14:30:05', '2024-06-06 14:30:05'),
(4, 1, '3bPg8Z1sybUgeOMWf27OYUeeUxIa0WmIWmqF35t9.jpg', '2024-06-06 14:30:05', '2024-06-06 14:30:05'),
(5, 1, 'n5yDwtSER7nyl0UAX0KTNiPkARWXiVx9lYFZyndH.jpg', '2024-06-06 14:30:05', '2024-06-06 14:30:05'),
(6, 2, 'JzD7dTKnPtFDJbAgM7oj9aVkj6EzzRg0hqxB1zpa.jpg', '2024-06-06 14:30:35', '2024-06-06 14:30:35'),
(7, 2, 'rEHkcwpBgCOon4avHYRUmQWKfXtHppQJGikHX2rE.jpg', '2024-06-06 14:30:35', '2024-06-06 14:30:35'),
(8, 2, 'aJwSAd7QrT6apSdesN1lGHV6Co14DoO8EDrMvL1P.jpg', '2024-06-06 14:30:35', '2024-06-06 14:30:35'),
(9, 2, 'tbDU25aYn5YN47pNvXNOjVgpzJrxxTxv2ARUNrC9.jpg', '2024-06-06 14:30:35', '2024-06-06 14:30:35'),
(10, 2, 'dZY5aLralm8c0sg8Hbv2IPXf71ZA5wmQh7lf1J8I.jpg', '2024-06-06 14:30:35', '2024-06-06 14:30:35'),
(11, 3, '9vp8pLqojZqWyanK1CO8GZsEHMq2nX2LtYB6am7e.jpg', '2024-06-06 14:31:20', '2024-06-06 14:31:20'),
(12, 3, 'TxT3vpjBLJ3eyU1vBLlqQ99AOANTtPcLuPWXNgeG.jpg', '2024-06-06 14:31:20', '2024-06-06 14:31:20'),
(13, 3, 'p1VUoFdNLwWRI8PJ0vffBVqg7tIYiAvZXZhKDftA.jpg', '2024-06-06 14:31:20', '2024-06-06 14:31:20'),
(14, 3, '5ELlj1edKNSIlrvcTBG7Skuf6gK8HBFHFFSKswid.jpg', '2024-06-06 14:31:20', '2024-06-06 14:31:20'),
(15, 3, 'l6fBeaA9NxUa6OssGBou9B9co5KLYtHfppGl0Egf.jpg', '2024-06-06 14:31:20', '2024-06-06 14:31:20'),
(16, 4, 'UTFqg3ztWZBqwYSEqcOD1HnOjjs1ChKQK7BifPEx.jpg', '2024-06-06 14:32:15', '2024-06-06 14:32:15'),
(17, 4, 'j1K5l3TbwT7JzuFBXJodRkhthV2zL0si0PU62DNj.jpg', '2024-06-06 14:32:15', '2024-06-06 14:32:15'),
(18, 4, 'BmqjhJs0SefOrE0Z6bvraeS2qHxVAXdnAmxqyaG9.jpg', '2024-06-06 14:32:15', '2024-06-06 14:32:15'),
(19, 4, 'jhWHPmIOLhPYl0AgnJAVZXoXFTAIss4dMBAEkbzN.jpg', '2024-06-06 14:32:15', '2024-06-06 14:32:15'),
(20, 4, 'HHFTFH0MpdMFnFAcsBKKg0DuSax9tBKQIwfcudRD.jpg', '2024-06-06 14:32:15', '2024-06-06 14:32:15'),
(21, 5, 'XTC1WPr8wAjSUkN4Ej3dsfZ8xFNwO6VTPMzunKN3.jpg', '2024-06-06 14:32:45', '2024-06-06 14:32:45'),
(22, 5, 'P5rF9jGVaqNR47Z5P7mCpEDKgNsMluJYlZrNYECr.jpg', '2024-06-06 14:32:45', '2024-06-06 14:32:45'),
(23, 5, 'cvxiqnmRCJeS5QwUU6pHefLoJXeNqWSbuu21g7I3.jpg', '2024-06-06 14:32:45', '2024-06-06 14:32:45'),
(24, 5, 'KTNQhTxxPjJP1K0WmanbLgWVhr88GPnGgd3teF7C.jpg', '2024-06-06 14:32:45', '2024-06-06 14:32:45'),
(25, 5, 'BqxjryUOjSm985IYpJFjRG0snvZtLaSAJI0E1TZ8.jpg', '2024-06-06 14:32:45', '2024-06-06 14:32:45'),
(26, 6, 'S0292UHkIWO6wCSEZdIHx1EzPIa2kUV9BrqwRYaF.jpg', '2024-06-06 14:33:51', '2024-06-06 14:33:51'),
(27, 6, 'pskVCRm0MLdNW7A2ESCKH7EDkqNTHtBk8FlrNrX9.jpg', '2024-06-06 14:33:51', '2024-06-06 14:33:51'),
(28, 6, '633wJR8Aftjp5wizQx9Kmc702XjkMpVXLeNEzd4J.jpg', '2024-06-06 14:33:51', '2024-06-06 14:33:51'),
(29, 6, '0La9LE68UBSLHVHpLgSYOadLKcQtsPFLvwtfoAaB.jpg', '2024-06-06 14:33:51', '2024-06-06 14:33:51'),
(30, 6, 'oxSC3LRvsLr4hSmTShmZNfmT6FG9bPJvyOroxD5t.jpg', '2024-06-06 14:33:51', '2024-06-06 14:33:51'),
(31, 7, '37UcWtMOrAf27DMESHZOWloNsfV3EexDYM0FSmsu.jpg', '2024-06-06 14:34:45', '2024-06-06 14:34:45'),
(32, 7, 'j9iqjqGmMJ07RSBNn4SrcPYR5tPK9hqhpBJYrvbg.jpg', '2024-06-06 14:34:45', '2024-06-06 14:34:45'),
(33, 7, 'FtaIDJ1Jc8HRTV5al8BMjz7pKeMSf3dBu331tXpc.jpg', '2024-06-06 14:34:45', '2024-06-06 14:34:45'),
(34, 7, 'd6sot5HuVjw5Zgpr5SzGhRmBIpDOMIbuRJTii7Ut.jpg', '2024-06-06 14:34:45', '2024-06-06 14:34:45'),
(35, 7, 'VmBxDT3rW0Q4pwxrfah9rHzpuvhpCsmM4NRmdV0d.jpg', '2024-06-06 14:34:45', '2024-06-06 14:34:45'),
(36, 8, 'eyDAiF48x9pui8FctFZjzpsAn1H9Z3ayETgnxB2Y.jpg', '2024-06-06 14:35:19', '2024-06-06 14:35:19'),
(37, 8, 'S2f3c9dwqQAVNsuD9n4kgdh0GTrO46eiQbl6BvLC.jpg', '2024-06-06 14:35:19', '2024-06-06 14:35:19'),
(38, 8, 'hhfn1O2NX5aGNEGHSDGE2yuuRlncyaC0z8nZOxuz.jpg', '2024-06-06 14:35:19', '2024-06-06 14:35:19'),
(39, 8, '3S2kPnd5NWTg7VZBFLEE2mroshBsusnYEBYGaHAP.jpg', '2024-06-06 14:35:19', '2024-06-06 14:35:19'),
(40, 8, 'LRcpyi96UJ3bsPcRDIGaNTgmuBWDhe7SLOq8Bfio.jpg', '2024-06-06 14:35:19', '2024-06-06 14:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `posisi_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recovery_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `posisi_id`, `nama`, `nim`, `username`, `password`, `recovery_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '', 'admin', '$2y$12$dmKqxGvW9Eil61n0TbnzXOOw7XknTXwXqfCVkIUsNETgW0TXZIJli', '12345', NULL, NULL),
(2, 2, 'urusan rumah tangga', '', 'urt', '$2y$12$EYltZ3mPofhRb8bBoJtwSOzGdArfzV/ZP5YDuUyOkUWy/DL4Dlu82', '12345', NULL, NULL),
(3, 3, 'fauzan', '2141762005', 'fauzan123', '$2y$12$ZHhwvaRHUY.dbpapZAVEQecM196PP6JgIH8zrczW0AMxSpwkgB03S', '123', NULL, NULL),
(4, 3, 'diki', '2141762054', 'diki24', '$2y$12$EcHz/kPqEpvjQ3f7XHiA0O2whPA4YU5Li34YuTvUIRsKLZA2xWlYW', '2402', NULL, '2024-06-06 19:07:24'),
(5, 3, 'Toni', '2141762039', 'Iqbal', '$2y$12$ktTbf7AgUMawRx4XX6r1Mucn1hPJc0zs4FbvRjuBGfLNw/d3hN3y6', '123', NULL, NULL),
(6, 3, 'neddy', 'neddyl', 'Ned', '$2y$12$kpaWEJhqSw9gWYWEtzoM2u/smz3k8RDzOlTHiugUpO3ok12ynQkiK', '123', NULL, NULL),
(7, 3, 'eren', 'hjbjhbjhb', 'ren', '$2y$12$mCPYXF7RpoSAs0tS7tKpq.WiB0RI6zTBPv0CXq4nwJs.poW5D7MZ6', '123', NULL, NULL);

--
-- Indexes for dumped tables
--

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
-- Indexes for table `pengajuan_pinjamans`
--
ALTER TABLE `pengajuan_pinjamans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengajuan_pinjamans_user_id_index` (`user_id`),
  ADD KEY `pengajuan_pinjamans_ruangan_id_index` (`ruangan_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pinjaman_ruangans`
--
ALTER TABLE `pinjaman_ruangans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pinjaman_ruangans_pengajuan_pinjaman_id_index` (`pengajuan_pinjaman_id`);

--
-- Indexes for table `posisis`
--
ALTER TABLE `posisis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruangans`
--
ALTER TABLE `ruangans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ruangans_kode_unique` (`kode`);

--
-- Indexes for table `ruangan_images`
--
ALTER TABLE `ruangan_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ruangan_images_ruangan_id_foreign` (`ruangan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_posisi_id_index` (`posisi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengajuan_pinjamans`
--
ALTER TABLE `pengajuan_pinjamans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pinjaman_ruangans`
--
ALTER TABLE `pinjaman_ruangans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posisis`
--
ALTER TABLE `posisis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ruangans`
--
ALTER TABLE `ruangans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ruangan_images`
--
ALTER TABLE `ruangan_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengajuan_pinjamans`
--
ALTER TABLE `pengajuan_pinjamans`
  ADD CONSTRAINT `pengajuan_pinjamans_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangans` (`id`);

--
-- Constraints for table `pinjaman_ruangans`
--
ALTER TABLE `pinjaman_ruangans`
  ADD CONSTRAINT `pinjaman_ruangans_pengajuan_pinjaman_id_foreign` FOREIGN KEY (`pengajuan_pinjaman_id`) REFERENCES `pengajuan_pinjamans` (`id`);

--
-- Constraints for table `ruangan_images`
--
ALTER TABLE `ruangan_images`
  ADD CONSTRAINT `ruangan_images_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_posisi_id_foreign` FOREIGN KEY (`posisi_id`) REFERENCES `posisis` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
