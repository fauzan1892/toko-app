-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2021 at 02:16 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko`
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id`, `nama_kategori`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hijab', '2021-12-13 01:50:13', '2021-12-13 02:13:46', NULL),
(2, 'wad', '2021-12-13 01:51:21', '2021-12-13 02:02:01', '2021-12-13 02:02:01'),
(3, 'Pashmina', '2021-12-13 02:13:01', '2021-12-13 02:13:38', '2021-12-13 02:13:38'),
(4, 'Hijab Instan', '2021-12-13 02:13:16', '2021-12-13 02:13:41', '2021-12-13 02:13:41'),
(5, 'Pakaian Pria', '2021-12-13 02:13:25', NULL, NULL),
(6, 'Pakaian Wanita', '2021-12-13 02:13:30', NULL, NULL),
(7, 'Aksesoris', '2021-12-13 02:14:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga_jual` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`id`, `id_kategori`, `gambar`, `nama_produk`, `deskripsi`, `harga_jual`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'produk_1639388721.jpg', 'HIJAB VOAL SEGI EMPAT - MAISHA SAVANA SERIES', 'Sempurnakan tampilan harianmu dengan hijab segiempat printed berbahan voal yang adem anti gerah, tegak didahi, hijab ini bisa digunakan formal look, daily look dan pemakaian syari ----------------------- Savana Series Senandung Irama tropis padang gurun diluncurkan dalam tema motif scarf hijab. Warna hangat tertuang seiring dengan tumbuhan alam sekitarnya ----------------------- Measurements: 115x115cm Voal Ultrafine', 98000, '2021-12-13 02:45:21', '2021-12-13 03:29:15', NULL),
(2, 5, 'produk_1639395461.jpg', 'Koko Kurta Agno Big Size', 'Koko Kurta Agno Koko simpel, elegan dan special berbahan katun Toyobo ( polosan ) yang dipadukan dengan motif garis berbahan Yarn Dyed. Desain kerah changi. Terdapat saku pada bagian depan dan samping kanan koko. Bukaan kancing pada bagian dada.  Tangan model 3/4 dengan variasi kancing.  Tersedia 4 pilihan warna Emerald - Latte - Maroon - Grey - Broken White Harga   189.000 S/M/L/XL  199.000 XXL *Available Sarimbit Keluarga Agnian', 200000, '2021-12-13 04:37:41', NULL, NULL),
(3, 5, 'produk_1639395718.jpg', 'Jersey/Sportwear Oslo Long', 'Jersey/Sportwear Oslo Long dari Gorgeous Indonesia. Koleksi Sport muslim terbaru dengan material yang nyaman dikenakan.', 275000, '2021-12-13 04:41:58', NULL, NULL),
(4, 6, 'produk_1639395784.jpg', 'New Kaleena Tunic Blue for HIJUP', 'Koleksi terbaru New Kaleena Tunic Blue for HIJUP dari Nadjani', 346500, '2021-12-13 04:43:04', '2021-12-13 04:43:27', NULL),
(5, 7, 'produk_1639395903.jpg', 'OWIEN WHITE', 'Material : Premium Synthetic Leather K+ Accesories: mute mutiara Insole : Multilayer insole with lalafoam to satisfy your step Outsole : Flexible rubber,slip-resistance & anti crack Flexible Shoe Lace Cannot be Removed Height : 2.5cm Wight : 220 – 270 gram/pcs Proudly Indonesia', 314000, '2021-12-13 04:45:03', NULL, NULL),
(6, 7, 'produk_1639395986.jpg', 'Kalung Etnik Tenun Batu - Bluesy', 'Ukuran Lingkaran kalung 75 cm, dimensi bandul 9.5 x 6 cm, panjang kalung saat dipakai dari leher bawah 21 cm sampai tali kalung, 31 cm sampai ujung liontin', 198000, '2021-12-13 04:46:26', NULL, NULL),
(7, 1, 'produk_1639396050.jpg', 'HIJAB VOAL SEGI EMPAT (FREE MASKER) - DYARA SAVANA SERIES', 'Sempurnakan tampilan harianmu dengan hijab segiempat printed berbahan voal yang adem anti gerah, tegak didahi, hijab ini bisa digunakan formal look, daily look dan pemakaian syari Savana Series Senandung Irama tropis padang gurun diluncurkan dalam tema motif scarf hijab. Warna hangat tertuang seiring dengan tumbuhan alam sekitarnya. Measurements: 115x115cm Voal Ultrafine', 116100, '2021-12-13 04:47:30', NULL, NULL),
(8, 5, 'produk_1639396119.jpeg', 'Ismail Koko Long Sleeves Black Red', 'Ismail Koko Long Sleeves Black Red dari Fatih Indonesia. Koleksi Menswear muslim terbaru dengan material yang nyaman dikenakan.', 399000, '2021-12-13 04:48:39', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fauzan Falah', 'fauzancodekop@gmail.com', NULL, '$2y$10$k.IEYdwVf4ecUVYdOEP2Wugq1NinDjES0kM.sJmuTPIBvcgps0Amy', NULL, '2021-12-13 00:13:32', '2021-12-13 03:45:10');

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
