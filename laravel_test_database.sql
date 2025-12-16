-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2025 at 07:50 PM
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
-- Database: `laravel_test_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `staff_id`, `user_name`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'jsmith', '$2y$12$4wjL7nai6ap1mDSnd/RD2eZiwpSNEDcbuGItaMBd2RSnZGSMydouq', NULL, NULL),
(3, 3, 'rbrown', '$2y$12$CeU8I/0jhetE4U/v4G9Kieevi442zY8ZUKOs2JkEtgHS9BPBmoL36', NULL, NULL),
(4, 4, 'swilliams', '$2y$12$BD33HzXdEtc.V8DsX4sUruX2ztkhyYyPzNIs4/yAxdqm/sSUTYkGq', NULL, NULL),
(5, 5, 'jmiller', '$2y$12$eT3P7/q.bV7/grBT6P.79.F0gA931g/Mff7YfLqSixVLpeByn3SgK', NULL, NULL);

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
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `created_at`, `updated_at`) VALUES
(1, 'Information Technology', NULL, NULL),
(2, 'Human Resources', NULL, NULL),
(3, 'Finance', NULL, NULL),
(4, 'Operations', NULL, NULL),
(5, 'Marketing', NULL, NULL),
(6, 'Sales', NULL, NULL),
(7, 'Logistics', NULL, NULL),
(8, 'Legal', NULL, NULL),
(11, 'Customer Service', NULL, NULL);

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
(14, '0001_01_01_000000_create_users_table', 1),
(15, '0001_01_01_000001_create_cache_table', 1),
(16, '0001_01_01_000002_create_jobs_table', 1),
(17, '2024_11_25_000003_create_staff_table', 1),
(18, '2024_11_25_000004_create_departments_table', 1),
(19, '2024_11_25_000005_create_accounts_table', 1),
(20, '2024_11_25_000006_create_supply_items_table', 1),
(21, '2024_11_25_000007_create_request_statuses_table', 1),
(22, '2024_11_25_000008_create_supply_requests_table', 1),
(23, '2024_11_25_000009_create_request_details_table', 1),
(24, '2024_11_25_000010_create_request_limit_rules_table', 1),
(25, '2024_11_25_000011_create_request_logs_table', 1),
(26, '2024_11_25_000012_create_supply_management_tables', 1),
(27, '2024_12_16_000013_create_request_staff_table', 2),
(28, '2024_12_16_000014_remove_staff_id_from_supply_requests', 3),
(29, '2024_12_16_000015_populate_request_staff', 4);

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
-- Table structure for table `request_details`
--

CREATE TABLE `request_details` (
  `detail_id` bigint(20) UNSIGNED NOT NULL,
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `quantity_requested` int(11) NOT NULL,
  `quantity_issued` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_details`
--

INSERT INTO `request_details` (`detail_id`, `request_id`, `item_id`, `quantity_requested`, `quantity_issued`, `created_at`, `updated_at`) VALUES
(1, 4, 4, 2, 9, NULL, NULL),
(2, 1, 2, 4, 2, NULL, NULL),
(3, 1, 3, 3, 3, NULL, NULL),
(6, 3, 6, 4, 3, NULL, NULL),
(9, 4, 3, 6, 5, NULL, NULL),
(10, 3, 9, 4, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `request_limit_rules`
--

CREATE TABLE `request_limit_rules` (
  `rule_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `limit_quantity` int(11) NOT NULL,
  `rule_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_limit_rules`
--

INSERT INTO `request_limit_rules` (`rule_id`, `department_id`, `staff_id`, `item_id`, `limit_quantity`, `rule_type`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 5, 'Monthly', NULL, NULL),
(2, 1, 5, 2, 3, 'Monthly', NULL, NULL),
(4, 3, 3, 5, 10, 'Quarterly', NULL, NULL),
(5, 4, 4, 6, 2, 'Annually', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `request_logs`
--

CREATE TABLE `request_logs` (
  `log_id` bigint(20) UNSIGNED NOT NULL,
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `action_type` varchar(255) NOT NULL,
  `action_date` datetime NOT NULL,
  `performed_by` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_logs`
--

INSERT INTO `request_logs` (`log_id`, `request_id`, `action_type`, `action_date`, `performed_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Created', '2025-12-03 00:00:00', 1, NULL, NULL),
(2, 1, 'Approved', '2025-12-04 00:00:00', 1, NULL, NULL),
(3, 1, 'Issued', '2025-12-05 00:00:00', 5, NULL, NULL),
(6, 3, 'Created', '2025-12-07 00:00:00', 3, NULL, NULL),
(7, 4, 'Created', '2025-12-08 00:00:00', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `request_staff`
--

CREATE TABLE `request_staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_staff`
--

INSERT INTO `request_staff` (`id`, `request_id`, `staff_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-12-15 20:47:48', '2025-12-15 20:47:48'),
(5, 3, 3, '2025-12-15 20:48:38', '2025-12-15 20:48:38'),
(8, 4, 4, '2025-12-15 21:09:19', '2025-12-15 21:09:19'),
(9, 7, 5, '2025-12-15 21:10:16', '2025-12-15 21:10:16');

-- --------------------------------------------------------

--
-- Table structure for table `request_statuses`
--

CREATE TABLE `request_statuses` (
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `status_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_statuses`
--

INSERT INTO `request_statuses` (`status_id`, `status_name`, `created_at`, `updated_at`) VALUES
(1, 'Pending', NULL, NULL),
(2, 'Approved', NULL, NULL),
(3, 'Rejected', NULL, NULL),
(4, 'Completed', NULL, NULL);

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
('lk5ChCdnmV71FIyRtCLof6maehAhiPKMqvXgBLJG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36 Edg/139.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWWczVWhzQW5uUjNSelRyMVUwWWwwbGNqWHNVSXRqUW9sUmZPazFPWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zdXBwbHktcmVxdWVzdHMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1765871469);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `name`, `department_id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Jeremiah Emmanuel Ong', 1, 'Manager', NULL, NULL),
(3, 'Vianney Morillo', 3, 'Analyst', NULL, NULL),
(4, 'Francin Calderon', 4, 'Coordinator', NULL, NULL),
(5, 'Khyrue Kiel Talagtag', 2, 'Technician', NULL, NULL),
(10, 'Ian Parma', 6, 'Specialist', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supply_items`
--

CREATE TABLE `supply_items` (
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `quantity_in_stock` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supply_items`
--

INSERT INTO `supply_items` (`item_id`, `name`, `category`, `quantity_in_stock`, `created_at`, `updated_at`) VALUES
(1, 'Monitor (27 inch)', 'Electronics', 15, NULL, NULL),
(2, 'Keyboard (Mechanical)', 'Electronics', 25, NULL, NULL),
(3, 'Mouse (Wireless)', 'Electronics', 30, NULL, NULL),
(4, 'Paper (A4, 500 sheets)', 'Office Supplies', 50, NULL, NULL),
(5, 'Pen (Blue, Pack of 10)', 'Office Supplies', 100, NULL, NULL),
(6, 'Office Chair (Ergonomic)', 'Furniture', 8, NULL, NULL),
(9, 'Desk (L Shaped)', 'Furniture', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supply_requests`
--

CREATE TABLE `supply_requests` (
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `request_date` date NOT NULL,
  `purpose` text NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supply_requests`
--

INSERT INTO `supply_requests` (`request_id`, `request_date`, `purpose`, `status_id`, `created_at`, `updated_at`) VALUES
(1, '2025-12-03', 'New equipment for IT team expansion', 2, NULL, NULL),
(3, '2025-12-09', 'Furniture for new finance office', 1, NULL, NULL),
(4, '2025-09-11', 'Consumables for operations department', 1, NULL, NULL),
(7, '2025-11-23', 'For printing and copying documents needed for the team', 2, NULL, NULL);

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-12-07 22:32:09', '$2y$12$AkGoi2qDX86uynltGiyjT.UYV4fF4BhTIPaGVJLT3k0XiiFIHHVMe', 'xWfuiA3ZAF', '2025-12-07 22:32:10', '2025-12-07 22:32:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `accounts_staff_id_unique` (`staff_id`),
  ADD UNIQUE KEY `accounts_user_name_unique` (`user_name`);

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
  ADD PRIMARY KEY (`department_id`),
  ADD UNIQUE KEY `departments_department_name_unique` (`department_name`);

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
-- Indexes for table `request_details`
--
ALTER TABLE `request_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `request_details_request_id_foreign` (`request_id`),
  ADD KEY `request_details_item_id_foreign` (`item_id`);

--
-- Indexes for table `request_limit_rules`
--
ALTER TABLE `request_limit_rules`
  ADD PRIMARY KEY (`rule_id`),
  ADD KEY `request_limit_rules_department_id_foreign` (`department_id`),
  ADD KEY `request_limit_rules_staff_id_foreign` (`staff_id`),
  ADD KEY `request_limit_rules_item_id_foreign` (`item_id`);

--
-- Indexes for table `request_logs`
--
ALTER TABLE `request_logs`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `request_logs_request_id_foreign` (`request_id`),
  ADD KEY `request_logs_performed_by_foreign` (`performed_by`);

--
-- Indexes for table `request_staff`
--
ALTER TABLE `request_staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `request_staff_request_id_staff_id_unique` (`request_id`,`staff_id`),
  ADD KEY `request_staff_staff_id_foreign` (`staff_id`);

--
-- Indexes for table `request_statuses`
--
ALTER TABLE `request_statuses`
  ADD PRIMARY KEY (`status_id`),
  ADD UNIQUE KEY `request_statuses_status_name_unique` (`status_name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `staff_department_id_foreign` (`department_id`);

--
-- Indexes for table `supply_items`
--
ALTER TABLE `supply_items`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `supply_items_name_unique` (`name`);

--
-- Indexes for table `supply_requests`
--
ALTER TABLE `supply_requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `supply_requests_status_id_foreign` (`status_id`);

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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `request_details`
--
ALTER TABLE `request_details`
  MODIFY `detail_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `request_limit_rules`
--
ALTER TABLE `request_limit_rules`
  MODIFY `rule_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `request_logs`
--
ALTER TABLE `request_logs`
  MODIFY `log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `request_staff`
--
ALTER TABLE `request_staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `request_statuses`
--
ALTER TABLE `request_statuses`
  MODIFY `status_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supply_items`
--
ALTER TABLE `supply_items`
  MODIFY `item_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supply_requests`
--
ALTER TABLE `supply_requests`
  MODIFY `request_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE;

--
-- Constraints for table `request_details`
--
ALTER TABLE `request_details`
  ADD CONSTRAINT `request_details_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `supply_items` (`item_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `request_details_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `supply_requests` (`request_id`) ON DELETE CASCADE;

--
-- Constraints for table `request_limit_rules`
--
ALTER TABLE `request_limit_rules`
  ADD CONSTRAINT `request_limit_rules_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `request_limit_rules_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `supply_items` (`item_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `request_limit_rules_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE;

--
-- Constraints for table `request_logs`
--
ALTER TABLE `request_logs`
  ADD CONSTRAINT `request_logs_performed_by_foreign` FOREIGN KEY (`performed_by`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `request_logs_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `supply_requests` (`request_id`) ON DELETE CASCADE;

--
-- Constraints for table `request_staff`
--
ALTER TABLE `request_staff`
  ADD CONSTRAINT `request_staff_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `supply_requests` (`request_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `request_staff_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`) ON DELETE CASCADE;

--
-- Constraints for table `supply_requests`
--
ALTER TABLE `supply_requests`
  ADD CONSTRAINT `supply_requests_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `request_statuses` (`status_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
