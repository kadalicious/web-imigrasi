-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2023 at 05:22 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webimigrasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblpelabuhans`
--

CREATE TABLE `tblpelabuhans` (
  `id` int(10) NOT NULL,
  `kode_tpi` varchar(255) DEFAULT NULL,
  `nama_pelabuhan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpelabuhans`
--

INSERT INTO `tblpelabuhans` (`id`, `kode_tpi`, `nama_pelabuhan`, `keterangan`, `updated_at`, `created_at`) VALUES
(6, 'TPI-BTM1', 'Pelabuhan Batu Ampar', 'Pelabuhan utama di Batam', '2023-08-16 15:39:47', '2023-08-16 11:50:24'),
(7, 'TPI-BTM2', 'Pelabuhan Batu Besar', 'Pintu masuk ke Batam dari Singapura', '2023-08-18 05:51:58', '2023-08-16 11:50:31'),
(8, 'TPI-BTM3', 'Pelabuhan Nongsa', 'Pintu masuk dari wilayah Nongsa', '2023-08-16 15:40:25', '2023-08-16 15:40:25'),
(9, 'TPI-BTM4', 'Pelabuhan Sekupang', 'Pintu masuk dan keluar yang penting', '2023-08-16 15:40:36', '2023-08-16 15:40:36'),
(14, 'dsdq', 'marina', 'fdfdsf', '2023-08-30 09:22:54', '2023-08-30 09:22:54');

-- --------------------------------------------------------

--
-- Table structure for table `tblpemeriksaans`
--

CREATE TABLE `tblpemeriksaans` (
  `id` int(10) NOT NULL,
  `pelabuhan_id` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `kewarganegaraan` varchar(20) NOT NULL,
  `tgl_pengeluaran` varchar(20) NOT NULL,
  `tgl_habisBerlaku` varchar(20) NOT NULL,
  `kode_negara` varchar(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `paspor` varchar(255) NOT NULL,
  `tgl_penolakan` date DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpemeriksaans`
--

INSERT INTO `tblpemeriksaans` (`id`, `pelabuhan_id`, `nama_lengkap`, `tgl_lahir`, `jenis_kelamin`, `kewarganegaraan`, `tgl_pengeluaran`, `tgl_habisBerlaku`, `kode_negara`, `keterangan`, `paspor`, `tgl_penolakan`, `updated_at`, `created_at`) VALUES
(9, 7, 'Dika', '2023-02-10', 'Open this select menu', 'Indonesia', '2023-08-10', '2023-08-21', 'IDN', '-', '', NULL, '2023-08-18 06:16:56', '2023-08-18 06:16:56'),
(10, 6, 'herdo', '2023-08-22', 'Laki-laki', 'Indonesia', '2023-08-16', '2023-08-31', 'IDN', '-', '', '0000-00-00', '2023-08-18 06:21:33', '2023-08-18 06:21:33'),
(11, 8, 'asdsad', '2023-08-10', 'Perempuan', 'Indonesia', '2023-08-30', '2023-08-21', 'IDN', '-', '', NULL, '2023-08-18 07:19:14', '2023-08-18 07:19:14'),
(12, 9, 'TestingSekupang', '2023-08-23', 'Perempuan', 'Indonesia', '2023-08-28', '2023-08-27', 'IDN', 'gk ada', '', NULL, '2023-08-18 07:45:24', '2023-08-18 07:45:24'),
(13, 9, 'Cobacoba', '2023-08-22', 'Laki-laki', 'Indonesia', '2023-08-15', '2023-08-05', 'SGN', '-', '', NULL, '2023-08-18 07:46:39', '2023-08-18 07:46:39'),
(17, 6, 'hhege', '2023-08-02', 'Laki-laki', 'indonesia', '2023-08-10', '2023-08-26', 'IDN', 'sdad', '', '2023-09-08', '2023-08-30 03:40:16', '2023-08-30 03:40:16'),
(20, 6, 'herdo dimas pratirto', '2023-08-01', 'Laki-laki', 'indonesia', '2023-07-31', '2023-08-07', 'IDN', 'sdad', 'WhatsApp Image 2023-08-27 at 04.17.05.jpeg', '2023-07-31', '2023-08-30 09:53:19', '2023-08-30 09:53:19');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `no` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`no`, `email`, `username`, `password`) VALUES
(2, 'dika@gmail.com', 'dika', '0e2424983caae31149078463986dc2fe');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `qwee21123` varchar(245) NOT NULL,
  `qwee12` varchar(123) NOT NULL,
  `qwe1231` varchar(123) NOT NULL,
  `qwe32e23` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(5, 'dika@gmail.com', '$2y$10$bQSromg9vi3W1tCXfIfKY.PTq68RvIudQgrfEzzBksJnHSPw4oT/e', 'superadmin', '2023-08-18 02:18:48'),
(14, 'user01@gmail.com', '$2y$10$DsPJXXg1EyKRAD9ftWHaDeFRANtIPVzbbgAT3zhYuNgl9irODzDpC', 'user', '2023-08-17 20:24:35'),
(15, 'herdo22', 'c0818b88f21035d89c35dd848a6e3cd1103181f2', 'common_user', '2023-08-29 09:22:24'),
(17, 'admin123', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'admin', '2023-08-29 22:07:47'),
(20, 'superadmin123', 'b94e7a7707c2622433574aa55dbea0fbf93a5c1f', 'superadmin', '2023-08-29 22:20:19'),
(24, 'dada', 'fedd1d1122aa65028c81e16ceb85d9c73790a2fa', 'common_user', '2023-08-29 22:32:50');

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
-- Indexes for table `tblpelabuhans`
--
ALTER TABLE `tblpelabuhans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpemeriksaans`
--
ALTER TABLE `tblpemeriksaans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`no`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`username`);

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
-- AUTO_INCREMENT for table `tblpelabuhans`
--
ALTER TABLE `tblpelabuhans`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblpemeriksaans`
--
ALTER TABLE `tblpemeriksaans`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `no` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
