-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 01, 2026 at 09:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel11`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `karyawan_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_masuk` time DEFAULT NULL,
  `waktu_keluar` time DEFAULT NULL,
  `status_absensi` enum('hadir','izin','sakit','alpha') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `karyawan_id`, `tanggal`, `waktu_masuk`, `waktu_keluar`, `status_absensi`, `created_at`, `updated_at`) VALUES
(3, 102, '2025-11-25', '08:00:00', '14:30:00', 'hadir', '2025-11-23 11:34:43', '2025-11-23 11:34:43'),
(4, 102, '2025-11-13', '09:01:00', '15:50:00', 'hadir', '2025-11-23 20:35:40', '2025-11-23 20:35:40'),
(5, 103, '2025-11-26', '09:00:00', '19:54:00', 'hadir', '2025-11-25 01:48:49', '2025-11-25 01:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_departments` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `nama_departments`, `created_at`, `updated_at`) VALUES
(2, 'Human Resources (HRD)', '2025-11-23 18:06:35', '2025-11-23 18:06:35'),
(3, 'Finance & Accounting', '2025-11-23 18:06:35', '2025-11-23 18:06:35'),
(4, 'Information Technology (IT)', '2025-11-23 18:06:35', '2025-11-23 18:06:35'),
(5, 'Marketing & Sales', '2025-11-23 18:06:35', '2025-11-23 18:06:35'),
(6, 'General Affair (GA)', '2025-11-23 18:06:35', '2025-11-23 18:06:35'),
(7, 'Production', '2025-11-23 18:06:35', '2025-11-23 18:06:35'),
(8, 'Quality Assurance (QA)', '2025-11-23 18:06:35', '2025-11-23 18:06:35'),
(9, 'Logistics & Warehouse', '2025-11-23 18:06:35', '2025-11-23 18:06:35'),
(10, 'Legal & Compliance', '2025-11-23 18:06:35', '2025-11-23 18:06:35'),
(11, 'Research & Development (R&D)', '2025-11-23 18:06:35', '2025-11-23 18:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `jabatan_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name_lengkap`, `email`, `nomor_telepon`, `tanggal_lahir`, `alamat`, `tanggal_masuk`, `department_id`, `jabatan_id`, `status`, `created_at`, `updated_at`) VALUES
(102, 'Wina Rahmalia', 'winarahmalia189@gmail.com', '085791787047', '2006-05-02', 'Jl.ABD RACHMAN', '2026-12-22', 2, 10, 'aktif', '2025-11-23 11:33:30', '2025-11-23 11:33:30'),
(103, 'Oktavia Ramadani', 'oktaviaramadani@gmail.com', '085791787046', '2005-10-11', 'Bungur', '2026-12-22', 4, 7, 'aktif', '2025-11-23 20:41:56', '2025-11-23 20:41:56'),
(104, 'Wina Rahmalia', 'winarahmalia188@gmail.com', '085791787047', '2025-11-04', 'Jl.ABD RACHMAN', '2025-11-27', 11, 14, 'aktif', '2025-11-25 01:51:42', '2025-11-25 01:51:42');

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_requests`
--

CREATE TABLE `leave_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `leave_type_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `alasan` text NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_requests`
--

INSERT INTO `leave_requests` (`id`, `employee_id`, `leave_type_id`, `tanggal_mulai`, `tanggal_selesai`, `alasan`, `status`, `created_at`, `updated_at`) VALUES
(2, 102, 1, '2025-11-13', '2025-11-26', 'Saya mohon maaf dikarenakan tidak dapat masuk pada 13/11/2025. di karenakan tidak enak badan.', 'approved', '2025-11-25 01:22:14', '2025-11-25 01:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_tipe` varchar(255) NOT NULL,
  `kuota_hari` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `nama_tipe`, `kuota_hari`, `created_at`, `updated_at`) VALUES
(1, 'sakit', 7, '2025-11-23 09:45:48', '2025-11-23 09:45:48');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_14_025907_create_employees_table', 1),
(5, '2025_10_10_122333_create_departments_table', 1),
(6, '2025_10_10_130013_create_positions_table', 1),
(7, '2025_10_10_143628_alter_employee_table', 1),
(8, '2025_10_10_152233_crete-attendance_table', 1),
(9, '2025_10_10_152857_crete_salaries_table', 1),
(10, '2025_11_15_155010_create_leave_types_table', 1);

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
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `gaji_pokok` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `nama_jabatan`, `gaji_pokok`, `created_at`, `updated_at`) VALUES
(2, 'PRODUCT OWNER', 50000000.00, '2025-11-23 08:27:54', '2025-11-23 08:27:54'),
(3, 'Scrum Master', 55000000.00, '2025-11-23 08:28:24', '2025-11-23 08:28:24'),
(4, 'General Manager', 35000000.00, '2025-11-23 18:10:03', '2025-11-23 18:10:03'),
(5, 'Project Manager', 25000000.00, '2025-11-23 18:10:03', '2025-11-23 18:10:03'),
(6, 'Senior Developer', 18000000.00, '2025-11-23 18:10:03', '2025-11-23 18:10:03'),
(7, 'Junior Developer', 8000000.00, '2025-11-23 18:10:03', '2025-11-23 18:10:03'),
(8, 'UI/UX Designer', 10000000.00, '2025-11-23 18:10:03', '2025-11-23 18:10:03'),
(9, 'System Analyst', 15000000.00, '2025-11-23 18:10:03', '2025-11-23 18:10:03'),
(10, 'HR Manager', 20000000.00, '2025-11-23 18:10:03', '2025-11-23 18:10:03'),
(11, 'HR Staff', 6500000.00, '2025-11-23 18:10:03', '2025-11-23 18:10:03'),
(12, 'Finance Staff', 7000000.00, '2025-11-23 18:10:03', '2025-11-23 18:10:03'),
(13, 'Marketing Specialist', 7500000.00, '2025-11-23 18:10:03', '2025-11-23 18:10:03'),
(14, 'IT Support', 6000000.00, '2025-11-23 18:10:03', '2025-11-23 18:10:03'),
(15, 'Office Boy', 4800000.00, '2025-11-23 18:10:03', '2025-11-23 18:10:03'),
(16, 'General Manager', 35000000.00, '2025-11-23 18:16:09', '2025-11-23 18:16:09'),
(17, 'Project Manager', 25000000.00, '2025-11-23 18:16:09', '2025-11-23 18:16:09'),
(18, 'Senior Developer', 18000000.00, '2025-11-23 18:16:09', '2025-11-23 18:16:09'),
(19, 'Junior Developer', 8000000.00, '2025-11-23 18:16:09', '2025-11-23 18:16:09'),
(20, 'UI/UX Designer', 10000000.00, '2025-11-23 18:16:09', '2025-11-23 18:16:09'),
(21, 'System Analyst', 15000000.00, '2025-11-23 18:16:09', '2025-11-23 18:16:09'),
(22, 'HR Manager', 20000000.00, '2025-11-23 18:16:09', '2025-11-23 18:16:09'),
(23, 'HR Staff', 6500000.00, '2025-11-23 18:16:09', '2025-11-23 18:16:09'),
(24, 'Finance Staff', 7000000.00, '2025-11-23 18:16:09', '2025-11-23 18:16:09'),
(25, 'Marketing Specialist', 7500000.00, '2025-11-23 18:16:09', '2025-11-23 18:16:09'),
(26, 'IT Support', 6000000.00, '2025-11-23 18:16:09', '2025-11-23 18:16:09'),
(27, 'Office Boy', 4800000.00, '2025-11-23 18:16:09', '2025-11-23 18:16:09'),
(28, 'General Manager', 35000000.00, '2025-11-23 18:25:29', '2025-11-23 18:25:29'),
(29, 'Project Manager', 25000000.00, '2025-11-23 18:25:29', '2025-11-23 18:25:29'),
(30, 'Senior Developer', 18000000.00, '2025-11-23 18:25:29', '2025-11-23 18:25:29'),
(31, 'Junior Developer', 8000000.00, '2025-11-23 18:25:29', '2025-11-23 18:25:29'),
(32, 'UI/UX Designer', 10000000.00, '2025-11-23 18:25:29', '2025-11-23 18:25:29'),
(33, 'System Analyst', 15000000.00, '2025-11-23 18:25:29', '2025-11-23 18:25:29'),
(34, 'HR Manager', 20000000.00, '2025-11-23 18:25:29', '2025-11-23 18:25:29'),
(35, 'HR Staff', 6500000.00, '2025-11-23 18:25:29', '2025-11-23 18:25:29'),
(36, 'Finance Staff', 7000000.00, '2025-11-23 18:25:29', '2025-11-23 18:25:29'),
(37, 'Marketing Specialist', 7500000.00, '2025-11-23 18:25:29', '2025-11-23 18:25:29'),
(38, 'IT Support', 6000000.00, '2025-11-23 18:25:29', '2025-11-23 18:25:29'),
(39, 'Office Boy', 4800000.00, '2025-11-23 18:25:29', '2025-11-23 18:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `karyawan_id` bigint(20) UNSIGNED NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `gaji_pokok` decimal(15,2) NOT NULL,
  `tunjangan` decimal(15,2) NOT NULL DEFAULT 0.00,
  `potongan` decimal(15,2) NOT NULL DEFAULT 0.00,
  `total_gaji` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `karyawan_id`, `bulan`, `gaji_pokok`, `tunjangan`, `potongan`, `total_gaji`, `created_at`, `updated_at`) VALUES
(8, 102, '2025-11', 20000000.00, 10000000.00, 50000.00, 29950000.00, '2025-11-23 20:36:32', '2025-11-23 20:36:32'),
(9, 102, '2025-12', 20000000.00, 0.00, 0.00, 20000000.00, '2025-11-23 20:40:03', '2025-11-23 20:40:03'),
(10, 103, '2025-11', 8000000.00, 0.00, 50000.00, 7950000.00, '2025-11-25 01:49:17', '2025-11-25 01:49:17');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('baQZCr0mhxaGzDUUVTC3jSKNsn3uXZJCHpMhjso8', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTGZDVThPY1BvWVlwaDRDTnZOSWh2MWZsSndlcUlVUUlLQ2JsRkNZVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zYWxhcmllcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1764060778);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendance_karyawan_id_foreign` (`karyawan_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_department_id_foreign` (`department_id`),
  ADD KEY `employees_jabatan_id_foreign` (`jabatan_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
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
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salaries_karyawan_id_foreign` (`karyawan_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_requests`
--
ALTER TABLE `leave_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_karyawan_id_foreign` FOREIGN KEY (`karyawan_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `salaries_karyawan_id_foreign` FOREIGN KEY (`karyawan_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
