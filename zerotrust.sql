-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2024 at 03:12 AM
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
-- Database: `zerotrust`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_attempt`
--

CREATE TABLE `access_attempt` (
  `id` int(20) NOT NULL,
  `user_mail` varchar(50) DEFAULT NULL,
  `requesting_resource` int(20) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `access_time` timestamp NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `access_attempt`
--

INSERT INTO `access_attempt` (`id`, `user_mail`, `requesting_resource`, `ip_address`, `access_time`, `status`) VALUES
(1, 'j@gmail.com', 1, '::1', NULL, 0),
(2, 'j@gmail.com', 1, '::1', '2024-02-12 11:48:45', 0),
(3, 'j@gmail.com', 1, '::1', '2024-03-26 08:19:46', 0),
(4, 'j@gmail.com', 1, '::1', '2024-03-26 08:21:48', 0),
(5, 'j@gmail.com', 1, '::1', '2024-03-26 13:47:24', 0),
(6, 'j@gmail.com', 1, '::1', '2024-03-26 13:47:36', 0),
(7, 'j@gmail.com', 2, '::1', '2024-03-26 14:23:12', 0),
(8, 'prattyush', 1, '172.29.15.188', '2024-04-06 02:05:09', 0),
(9, 'prattyush', 1, '172.29.15.188', '2024-04-06 02:09:15', 0),
(10, 'pratyush@gmail.com', 1, '172.29.15.188', '2024-04-06 02:10:40', 0),
(11, 'pratyush@gmail.com', 1, '172.29.15.188', '2024-04-06 02:18:34', 0),
(12, 'pratyush@gmail.com', 1, '172.29.15.188', '2024-04-06 02:19:00', 0),
(13, 'Pratyush', 1, '::1', '2024-04-09 00:07:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `certificate_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `Serial Number` int(11) DEFAULT NULL,
  `CN` varchar(100) DEFAULT NULL,
  `Exponent` text NOT NULL,
  `Subject_Key_Identifier` text NOT NULL,
  `Authority_Key_Identifier` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`certificate_id`, `user_id`, `Serial Number`, `CN`, `Exponent`, `Subject_Key_Identifier`, `Authority_Key_Identifier`) VALUES
(1, 4, 4096, 'kpratyush232@gmail.com', '65537', '88:95:56:30:57:8B:24:CF:43:B5:B2:09:4C:C9:60:F3:6F:9B:7C:84', '0F:35:AD:5F:74:C9:30:80:E7:F5:CD:2C:D9:E9:25:2A:11:41:E7:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
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
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_02_11_180632_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pds_information`
--

CREATE TABLE `pds_information` (
  `id` int(20) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `resource_type` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pds_information`
--

INSERT INTO `pds_information` (`id`, `user_id`, `role`, `resource_type`) VALUES
(1, 1, 'admin', 2),
(2, 1, 'admin', 1),
(3, 1, 'admin', 2),
(4, 4, 'user', 1),
(5, 4, 'user', 1),
(6, 1, 'admin', 1),
(7, 1, 'admin', 1),
(8, 1, 'admin', 1),
(9, 1, 'admin', 1),
(10, 2, 'manager', 1),
(11, 2, 'manager', 1),
(12, 2, 'manager', 1),
(13, 2, 'manager', 1),
(14, 2, 'manager', 2),
(15, 2, 'manager', 2),
(16, 4, 'user', 1),
(17, 4, 'user', 1),
(18, 4, 'user', 1),
(19, 2, 'manager', 1),
(20, 4, 'admin', 1),
(21, 4, 'admin', 1),
(22, 4, 'admin', 1),
(23, 4, 'admin', 1),
(24, 4, 'admin', 1),
(25, 1, 'admin', 1),
(26, 1, 'admin', 1),
(27, 1, 'admin', 1),
(28, 1, 'admin', 1),
(29, 1, 'admin', 1),
(30, 4, 'admin', 1),
(31, 4, 'admin', 1),
(32, 1, 'manager', 1),
(33, 4, 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pythondemo`
--

CREATE TABLE `pythondemo` (
  `id` int(20) UNSIGNED NOT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resource_type`
--

CREATE TABLE `resource_type` (
  `id` int(20) NOT NULL,
  `resource_name` text DEFAULT NULL,
  `access_permission` varchar(20) DEFAULT NULL,
  `access_duration` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resource_type`
--

INSERT INTO `resource_type` (`id`, `resource_name`, `access_permission`, `access_duration`) VALUES
(1, 'user details', 'admin', 1),
(2, 'user activity log', 'admin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
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
('jXk0D6PTsAK5gxbCaXyBUNyR9tNh46r2WckgSXfd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRW5HM1J6R3hGNXVWV0NSZGNaYnViOHpXanRoUEI4d3F4b2dkVE04NSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjc6ImxvZ2luSWQiO047fQ==', 1684304597),
('NncEFObtQq4UJm25lVyafbI4qf69DKn0WSjSuCNE', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36 Edg/113.0.1774.42', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZndJdVFDYTBudTNEYWxrN00zbXl4RW9vNHFOSVFvUDFBb1hBTmltMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjc6ImxvZ2luSWQiO047fQ==', 1684304661);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `id` int(20) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `role` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `certificate_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`id`, `name`, `role`, `email`, `password`, `certificate_id`) VALUES
(1, 'Juli Rana', 'admin', 'j@gmail.com', '1234', 0),
(2, 'Smruty Rekha', 'manager', 's@gmail.com', '1234', 0),
(4, 'Pratyush', 'admin', 'kpratyush232@gmail.com', '1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'juli', '2101070044@cgu-odisha.ac.in', NULL, '1234', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-14 13:43:18', '2023-02-14 13:43:18'),
(2, 'Amina', '210456@cgu-odisha.ac.in', NULL, '$2y$10$j5Th8Z5AHIXkMAIdpM6Kief82HPe4.54MHov7BTOkGDHViOvD/bB2', NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-14 13:46:02', '2023-02-14 13:46:02'),
(3, 'ABC', 'abc@gm.com', NULL, '$2y$10$.1lxdvo5DJAEx5vgyyz04euek7QaVS5pgpky0E00QR/Qv8SI01LLa', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-17 00:53:00', '2023-05-17 00:53:00'),
(4, '[value-2]', '', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_activity_log`
--

CREATE TABLE `user_activity_log` (
  `id` int(20) NOT NULL,
  `user_id` int(20) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT current_timestamp(),
  `activity_description` text DEFAULT NULL,
  `ip_address` varchar(200) DEFAULT NULL,
  `device_info` text DEFAULT NULL,
  `request_details` text DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `resource_requested` text DEFAULT NULL,
  `login_time` timestamp NULL DEFAULT current_timestamp(),
  `logout_time` datetime DEFAULT NULL,
  `change_indata` text DEFAULT NULL,
  `duration` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_activity_log`
--

INSERT INTO `user_activity_log` (`id`, `user_id`, `timestamp`, `activity_description`, `ip_address`, `device_info`, `request_details`, `status`, `resource_requested`, `login_time`, `logout_time`, `change_indata`, `duration`) VALUES
(1, 1, '0000-00-00 00:00:00', '1', '1', '1', '1', '1', '1', '2024-02-13 09:33:30', '2024-04-08 17:13:36', NULL, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_attempt`
--
ALTER TABLE `access_attempt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`certificate_id`);

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
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pds_information`
--
ALTER TABLE `pds_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pythondemo`
--
ALTER TABLE `pythondemo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resource_type`
--
ALTER TABLE `resource_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_activity_log`
--
ALTER TABLE `user_activity_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_attempt`
--
ALTER TABLE `access_attempt`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `certificate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pds_information`
--
ALTER TABLE `pds_information`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pythondemo`
--
ALTER TABLE `pythondemo`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resource_type`
--
ALTER TABLE `resource_type`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_activity_log`
--
ALTER TABLE `user_activity_log`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
