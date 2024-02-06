-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2024 at 10:44 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dashce`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `subject_type` varchar(255) DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`) VALUES
(1, 'User', 'created', 'App\\Models\\User', 1, NULL, NULL, '{\"attributes\":{\"name\":\"Super Admin\",\"email\":\"superadmin@master.com\",\"phone\":null,\"image\":null,\"address\":null,\"password\":\"$2y$10$EwL7zVIzzcWMrk8l3SqaG.SRVsd.IP\\/ZVZTn.NK4SDQPiIEOtmy82\",\"otp\":null,\"about\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0}}', '2022-12-02 07:17:23', '2022-12-02 07:17:23'),
(2, 'User', 'created', 'App\\Models\\User', 2, NULL, NULL, '{\"attributes\":{\"name\":\"Admin\",\"email\":\"admin@master.com\",\"phone\":null,\"image\":null,\"address\":null,\"password\":\"$2y$10$QJwHIrH27tyRxQyIWVOQcOo1xOcHlGRs48yw1.luZXFkVpsn.lbh6\",\"otp\":null,\"about\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0}}', '2022-12-02 07:17:23', '2022-12-02 07:17:23'),
(3, 'User', 'created', 'App\\Models\\User', 3, NULL, NULL, '{\"attributes\":{\"name\":\"User\",\"email\":\"user@yopmail.com\",\"phone\":null,\"image\":\"public\\/uploads\\/users\\/\",\"address\":null,\"password\":\"$2y$10$YnuJ0seZoQo5fIdXCttS\\/u98DQlN6hnlELhbHYaAMetqtr6lWfw42\",\"otp\":\"9093\",\"about\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":\"email\",\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0}}', '2022-12-02 07:53:48', '2022-12-02 07:53:48'),
(4, 'User', 'updated', 'App\\Models\\User', 3, NULL, NULL, '{\"attributes\":{\"otp\":null},\"old\":{\"otp\":\"9093\"}}', '2022-12-02 08:35:54', '2022-12-02 08:35:54'),
(5, 'User', 'updated', 'App\\Models\\User', 3, NULL, NULL, '{\"attributes\":{\"otp\":null},\"old\":{\"otp\":\"9093\"}}', '2022-12-02 08:36:34', '2022-12-02 08:36:34'),
(6, 'User', 'updated', 'App\\Models\\User', 3, NULL, NULL, '{\"attributes\":{\"otp\":null},\"old\":{\"otp\":\"9093\"}}', '2022-12-02 08:45:21', '2022-12-02 08:45:21'),
(7, 'User', 'updated', 'App\\Models\\User', 3, NULL, NULL, '{\"attributes\":{\"otp\":null},\"old\":{\"otp\":\"9093\"}}', '2022-12-02 08:49:39', '2022-12-02 08:49:39'),
(8, 'User', 'updated', 'App\\Models\\User', 3, NULL, NULL, '{\"attributes\":{\"otp\":null},\"old\":{\"otp\":\"9093\"}}', '2022-12-02 08:50:24', '2022-12-02 08:50:24'),
(9, 'User', 'updated', 'App\\Models\\User', 3, NULL, NULL, '{\"attributes\":{\"otp\":null},\"old\":{\"otp\":\"9093\"}}', '2022-12-02 09:05:03', '2022-12-02 09:05:03'),
(10, 'User', 'updated', 'App\\Models\\User', 3, NULL, NULL, '{\"attributes\":{\"otp\":null},\"old\":{\"otp\":\"9093\"}}', '2022-12-02 09:07:19', '2022-12-02 09:07:19'),
(11, 'User', 'updated', 'App\\Models\\User', 3, NULL, NULL, '{\"attributes\":{\"otp\":null},\"old\":{\"otp\":\"9093\"}}', '2022-12-02 09:07:46', '2022-12-02 09:07:46'),
(12, 'User', 'updated', 'App\\Models\\User', 3, NULL, NULL, '{\"attributes\":{\"otp\":null},\"old\":{\"otp\":\"9093\"}}', '2022-12-02 09:31:41', '2022-12-02 09:31:41'),
(13, 'User', 'updated', 'App\\Models\\User', 3, NULL, NULL, '{\"attributes\":{\"otp\":null,\"email_verified_at\":\"2022-12-02T14:32:36.000000Z\"},\"old\":{\"otp\":\"9093\",\"email_verified_at\":null}}', '2022-12-02 09:32:36', '2022-12-02 09:32:36'),
(14, 'User', 'updated', 'App\\Models\\User', 3, NULL, NULL, '{\"attributes\":{\"otp\":null,\"email_verified_at\":\"2022-12-02T14:39:19.000000Z\"},\"old\":{\"otp\":\"9093\",\"email_verified_at\":\"2022-12-02T14:32:36.000000Z\"}}', '2022-12-02 09:39:19', '2022-12-02 09:39:19'),
(15, 'User', 'updated', 'App\\Models\\User', 3, NULL, NULL, '{\"attributes\":{\"otp\":null,\"email_verified_at\":\"2022-12-02T14:41:08.000000Z\"},\"old\":{\"otp\":\"9093\",\"email_verified_at\":null}}', '2022-12-02 09:41:08', '2022-12-02 09:41:08'),
(16, 'User', 'created', 'App\\Models\\User', 4, NULL, NULL, '{\"attributes\":{\"name\":\"User\",\"email\":\"user0@yopmail.com\",\"phone\":null,\"image\":\"public\\/uploads\\/users\\/\",\"address\":null,\"password\":\"$2y$10$SngOd0VeQ2AhLiZAr1xNgerXAGqNtotb0yvB.xfFgVqyIiwsU4FYy\",\"otp\":\"3872\",\"about\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":\"email\",\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":null}}', '2022-12-02 09:43:00', '2022-12-02 09:43:00'),
(17, 'User', 'updated', 'App\\Models\\User', 4, NULL, NULL, '{\"attributes\":{\"otp\":null,\"email_verified_at\":\"2022-12-02T14:44:40.000000Z\"},\"old\":{\"otp\":\"3872\",\"email_verified_at\":null}}', '2022-12-02 09:44:40', '2022-12-02 09:44:40'),
(18, 'User', 'updated', 'App\\Models\\User', 3, NULL, NULL, '{\"attributes\":{\"otp\":null,\"email_verified_at\":\"2022-12-05T07:30:26.000000Z\"},\"old\":{\"otp\":\"9093\",\"email_verified_at\":\"2022-12-02T14:41:08.000000Z\"}}', '2022-12-05 02:30:27', '2022-12-05 02:30:27'),
(19, 'User', 'updated', 'App\\Models\\User', 3, NULL, NULL, '{\"attributes\":{\"otp\":\"4633\"},\"old\":{\"otp\":null}}', '2022-12-05 02:36:00', '2022-12-05 02:36:00'),
(20, 'User', 'updated', 'App\\Models\\User', 3, NULL, NULL, '{\"attributes\":{\"password\":\"$2y$10$NZXtZfqYYGxhQFHyTlzpveR49QgHCROBRY7RBMEnx1TV9sbRUkqJ6\"},\"old\":{\"password\":\"$2y$10$YnuJ0seZoQo5fIdXCttS\\/u98DQlN6hnlELhbHYaAMetqtr6lWfw42\"}}', '2022-12-05 02:50:56', '2022-12-05 02:50:56'),
(21, 'User', 'updated', 'App\\Models\\User', 3, NULL, NULL, '{\"attributes\":{\"password\":\"$2y$10$JmYdGqLunw1q2cgGNNP4fuK7Emmh6R72UQ5qcMwV5ZmIHgFjDZgbm\"},\"old\":{\"password\":\"$2y$10$NZXtZfqYYGxhQFHyTlzpveR49QgHCROBRY7RBMEnx1TV9sbRUkqJ6\"}}', '2022-12-05 02:55:52', '2022-12-05 02:55:52'),
(22, 'User', 'updated', 'App\\Models\\User', 3, NULL, NULL, '{\"attributes\":{\"otp\":null},\"old\":{\"otp\":\"4633\"}}', '2022-12-05 02:59:37', '2022-12-05 02:59:37'),
(23, 'User', 'updated', 'App\\Models\\User', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"password\":\"$2y$10$BHt4klkqHHPPa6AxJg.GHevc3OzGjOFV5KuF9Zod.ZlDMrsoBLrOm\"},\"old\":{\"password\":\"$2y$10$JmYdGqLunw1q2cgGNNP4fuK7Emmh6R72UQ5qcMwV5ZmIHgFjDZgbm\"}}', '2022-12-05 03:28:34', '2022-12-05 03:28:34'),
(24, 'User', 'updated', 'App\\Models\\User', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"password\":\"$2y$10$jbBI\\/7wV3Pnqv8jQ5QV7z.aRzPHCdkDRyT\\/moY.geYnbJMrPZSkAi\"},\"old\":{\"password\":\"$2y$10$BHt4klkqHHPPa6AxJg.GHevc3OzGjOFV5KuF9Zod.ZlDMrsoBLrOm\"}}', '2022-12-05 03:28:43', '2022-12-05 03:28:43'),
(25, 'User', 'updated', 'App\\Models\\User', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"password\":\"$2y$10$ZEHLG3wEWT7cDkcggH1R.uHADsRZ0teXqyQUk9QOoA6Tokex\\/CMci\"},\"old\":{\"password\":\"$2y$10$jbBI\\/7wV3Pnqv8jQ5QV7z.aRzPHCdkDRyT\\/moY.geYnbJMrPZSkAi\"}}', '2022-12-05 03:28:55', '2022-12-05 03:28:55'),
(26, 'User', 'updated', 'App\\Models\\User', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"password\":\"$2y$10$8bfW16NdghAFrl81zA50yO.hVgAdoN8tXafOezILa8daqG0XSTkEO\"},\"old\":{\"password\":\"$2y$10$ZEHLG3wEWT7cDkcggH1R.uHADsRZ0teXqyQUk9QOoA6Tokex\\/CMci\"}}', '2022-12-05 03:29:16', '2022-12-05 03:29:16'),
(27, 'User', 'updated', 'App\\Models\\User', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"password\":\"$2y$10$.cdySuUhOorgqHszHR1O1.nrhxQSRJST.WLlzy6LlOFXDtlnbCTry\"},\"old\":{\"password\":\"$2y$10$8bfW16NdghAFrl81zA50yO.hVgAdoN8tXafOezILa8daqG0XSTkEO\"}}', '2022-12-05 03:29:54', '2022-12-05 03:29:54'),
(28, 'User', 'updated', 'App\\Models\\User', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"name\":\"User000\",\"phone\":\"03082034786\"},\"old\":{\"name\":\"User\",\"phone\":null}}', '2022-12-05 05:52:11', '2022-12-05 05:52:11'),
(29, 'User', 'updated', 'App\\Models\\User', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"image\":\"public\\/uploads\\/user\\/638dcfcfa5cdf.png\"},\"old\":{\"image\":\"public\\/uploads\\/users\\/\"}}', '2022-12-05 06:02:39', '2022-12-05 06:02:39'),
(30, 'User', 'deleted', 'App\\Models\\User', 3, 'App\\Models\\User', 3, '{\"attributes\":{\"name\":\"User000\",\"email\":\"user@yopmail.com\",\"phone\":\"03082034786\",\"image\":\"public\\/uploads\\/user\\/638dcfcfa5cdf.png\",\"address\":null,\"password\":\"$2y$10$.cdySuUhOorgqHszHR1O1.nrhxQSRJST.WLlzy6LlOFXDtlnbCTry\",\"otp\":null,\"about\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":\"email\",\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":\"2022-12-05T07:30:26.000000Z\"}}', '2022-12-05 07:27:37', '2022-12-05 07:27:37'),
(31, 'User', 'updated', 'App\\Models\\User', 4, 'App\\Models\\User', 4, '{\"attributes\":{\"device_token\":\"AAAA6MO9f5M:APA91bGN03Iek7WDgcZQf_nCxxbn7DEAGmoiutYPuIaAb5EX72s8h9nH9uAt416XTJDb2v-Ac91jC1w0EayCX57U0qSTL0Nv5jmq1IdmEGWRpppS0tn4-QoCDsAbWylm5-zcmGZ7jzCL\"},\"old\":{\"device_token\":null}}', '2022-12-05 07:36:47', '2022-12-05 07:36:47'),
(32, 'User', 'created', 'App\\Models\\User', 5, NULL, NULL, '{\"attributes\":{\"name\":\"Google Sign In 2\",\"email\":\"google@yopmail.com\",\"phone\":null,\"image\":null,\"address\":null,\"password\":\"$2y$10$WElwAVRufOzqH2rgdIWzI.sO5CYmCiR\\/6u31fzVmjnm5TMegvjvei\",\"otp\":null,\"about\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":\"google\",\"social_provider\":\"google\",\"social_token\":\"JyeT6bC5b89VbfE9ynUaYiCdDij8\",\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":\"2022-12-05T14:00:18.000000Z\"}}', '2022-12-05 09:00:18', '2022-12-05 09:00:18'),
(33, 'User', 'created', 'App\\Models\\User', 6, NULL, NULL, '{\"attributes\":{\"name\":\"Google Sign In 2\",\"email\":\"google@yopmail.com\",\"phone\":null,\"image\":null,\"address\":null,\"password\":\"$2y$10$7fiXmfy4oRhGKNWdctyA7eHvGSzfR53.VzIPzNWAtQ3h.4MNImrI2\",\"otp\":null,\"about\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":\"google\",\"social_provider\":\"google\",\"social_token\":\"JyeT6bC5b89VbfE9ynUaYiCdDij8\",\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":\"2022-12-05T14:01:40.000000Z\"}}', '2022-12-05 09:01:40', '2022-12-05 09:01:40'),
(34, 'User', 'created', 'App\\Models\\User', 7, NULL, NULL, '{\"attributes\":{\"name\":\"Google Sign In 2\",\"email\":\"google@yopmail.com\",\"phone\":null,\"image\":null,\"address\":null,\"password\":\"$2y$10$nNiNf\\/E9cRq6YdJySr641.n7LJ\\/\\/sggtOLOgw84Fszhw\\/Z6o60DcS\",\"otp\":null,\"about\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":\"google\",\"social_provider\":\"google\",\"social_token\":\"JyeT6bC5b89VbfE9ynUaYiCdDij8\",\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":\"2022-12-05T14:02:01.000000Z\"}}', '2022-12-05 09:02:01', '2022-12-05 09:02:01'),
(35, 'User', 'created', 'App\\Models\\User', 8, NULL, NULL, '{\"attributes\":{\"name\":\"Facebook 3\",\"email\":\"facebook@yopmail.com\",\"phone\":null,\"image\":null,\"address\":null,\"password\":\"$2y$10$.Zx2GIFbHmOsXV.gSOam5.5aKx2GSprADBExDGpjFJJW\\/R6bdAk5C\",\"otp\":null,\"about\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":\"facebook\",\"social_provider\":\"facebook\",\"social_token\":\"JyeT6bC5b6PV8fExynUaYiCdDij7\",\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":\"2022-12-05T14:13:24.000000Z\"}}', '2022-12-05 09:13:24', '2022-12-05 09:13:24'),
(36, 'User', 'created', 'App\\Models\\User', 9, NULL, NULL, '{\"attributes\":{\"name\":\"Apple Sign In\",\"email\":\"apple@yopmail.com\",\"phone\":null,\"image\":null,\"address\":null,\"password\":\"$2y$10$whnszbOe13E0r6Sc35OwEuqRXhRadrL.RxbT7hHmAaDngVhmzRJA2\",\"otp\":null,\"about\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":\"Apple\",\"social_provider\":\"Apple\",\"social_token\":\"JyeT6bC5b81VbfExynUaYiCdDij5\",\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":\"2022-12-05T14:19:13.000000Z\"}}', '2022-12-05 09:19:13', '2022-12-05 09:19:13'),
(37, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2022-12-06 02:55:21', '2022-12-06 02:55:21'),
(38, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2022-12-06 02:55:26', '2022-12-06 02:55:26'),
(39, 'default', 'created', 'App\\Models\\Setting', 1, 'App\\Models\\User', 2, '[]', '2022-12-06 05:29:23', '2022-12-06 05:29:23'),
(40, 'default', 'created', 'App\\Models\\Setting', 2, 'App\\Models\\User', 2, '[]', '2022-12-06 05:29:24', '2022-12-06 05:29:24'),
(41, 'default', 'created', 'App\\Models\\Setting', 3, 'App\\Models\\User', 2, '[]', '2022-12-06 05:32:51', '2022-12-06 05:32:51'),
(42, 'default', 'created', 'App\\Models\\Setting', 1, 'App\\Models\\User', 2, '[]', '2022-12-06 05:34:06', '2022-12-06 05:34:06'),
(43, 'default', 'created', 'App\\Models\\Setting', 2, 'App\\Models\\User', 2, '[]', '2022-12-06 05:34:06', '2022-12-06 05:34:06'),
(44, 'default', 'created', 'App\\Models\\Setting', 3, 'App\\Models\\User', 2, '[]', '2022-12-06 06:00:50', '2022-12-06 06:00:50'),
(45, 'default', 'created', 'App\\Models\\Setting', 4, 'App\\Models\\User', 2, '[]', '2022-12-06 06:00:50', '2022-12-06 06:00:50'),
(46, 'default', 'created', 'App\\Models\\Setting', 5, 'App\\Models\\User', 2, '[]', '2022-12-06 06:00:50', '2022-12-06 06:00:50'),
(47, 'default', 'created', 'App\\Models\\Setting', 6, 'App\\Models\\User', 2, '[]', '2022-12-06 06:00:51', '2022-12-06 06:00:51'),
(48, 'default', 'created', 'App\\Models\\Setting', 1, 'App\\Models\\User', 2, '[]', '2022-12-06 06:01:53', '2022-12-06 06:01:53'),
(49, 'default', 'created', 'App\\Models\\Setting', 2, 'App\\Models\\User', 2, '[]', '2022-12-06 06:01:53', '2022-12-06 06:01:53'),
(50, 'default', 'created', 'App\\Models\\Setting', 3, 'App\\Models\\User', 2, '[]', '2022-12-06 06:01:53', '2022-12-06 06:01:53'),
(51, 'default', 'created', 'App\\Models\\Setting', 4, 'App\\Models\\User', 2, '[]', '2022-12-06 06:01:53', '2022-12-06 06:01:53'),
(52, 'default', 'created', 'App\\Models\\Setting', 5, 'App\\Models\\User', 2, '[]', '2022-12-06 06:01:53', '2022-12-06 06:01:53'),
(53, 'default', 'created', 'App\\Models\\Setting', 6, 'App\\Models\\User', 2, '[]', '2022-12-06 06:01:53', '2022-12-06 06:01:53'),
(54, 'default', 'created', 'App\\Models\\Setting', 7, 'App\\Models\\User', 2, '[]', '2022-12-06 06:02:31', '2022-12-06 06:02:31'),
(55, 'default', 'created', 'App\\Models\\Setting', 8, 'App\\Models\\User', 2, '[]', '2022-12-06 06:02:31', '2022-12-06 06:02:31'),
(56, 'default', 'created', 'App\\Models\\Setting', 1, 'App\\Models\\User', 2, '[]', '2022-12-06 06:03:44', '2022-12-06 06:03:44'),
(57, 'default', 'created', 'App\\Models\\Setting', 2, 'App\\Models\\User', 2, '[]', '2022-12-06 06:03:44', '2022-12-06 06:03:44'),
(58, 'default', 'created', 'App\\Models\\Setting', 3, 'App\\Models\\User', 2, '[]', '2022-12-06 06:03:44', '2022-12-06 06:03:44'),
(59, 'default', 'created', 'App\\Models\\Setting', 4, 'App\\Models\\User', 2, '[]', '2022-12-06 06:03:44', '2022-12-06 06:03:44'),
(60, 'default', 'created', 'App\\Models\\Setting', 5, 'App\\Models\\User', 2, '[]', '2022-12-06 06:03:44', '2022-12-06 06:03:44'),
(61, 'default', 'created', 'App\\Models\\Setting', 6, 'App\\Models\\User', 2, '[]', '2022-12-06 06:03:44', '2022-12-06 06:03:44'),
(62, 'default', 'created', 'App\\Models\\Setting', 7, 'App\\Models\\User', 2, '[]', '2022-12-06 06:03:44', '2022-12-06 06:03:44'),
(63, 'default', 'created', 'App\\Models\\Setting', 8, 'App\\Models\\User', 2, '[]', '2022-12-06 06:03:44', '2022-12-06 06:03:44'),
(64, 'default', 'created', 'App\\Models\\Setting', 1, 'App\\Models\\User', 2, '[]', '2022-12-06 06:05:02', '2022-12-06 06:05:02'),
(65, 'default', 'created', 'App\\Models\\Setting', 2, 'App\\Models\\User', 2, '[]', '2022-12-06 06:05:02', '2022-12-06 06:05:02'),
(66, 'default', 'created', 'App\\Models\\Setting', 1, 'App\\Models\\User', 2, '[]', '2022-12-06 06:16:11', '2022-12-06 06:16:11'),
(67, 'default', 'created', 'App\\Models\\Setting', 2, 'App\\Models\\User', 2, '[]', '2022-12-06 06:16:11', '2022-12-06 06:16:11'),
(68, 'default', 'created', 'App\\Models\\Setting', 3, 'App\\Models\\User', 2, '[]', '2022-12-06 06:16:11', '2022-12-06 06:16:11'),
(69, 'default', 'created', 'App\\Models\\Setting', 4, 'App\\Models\\User', 2, '[]', '2022-12-06 06:16:11', '2022-12-06 06:16:11'),
(70, 'default', 'created', 'App\\Models\\Setting', 5, 'App\\Models\\User', 2, '[]', '2022-12-06 06:16:11', '2022-12-06 06:16:11'),
(71, 'default', 'created', 'App\\Models\\Setting', 6, 'App\\Models\\User', 2, '[]', '2022-12-06 06:16:11', '2022-12-06 06:16:11'),
(72, 'default', 'created', 'App\\Models\\Setting', 7, 'App\\Models\\User', 2, '[]', '2022-12-06 06:16:12', '2022-12-06 06:16:12'),
(73, 'default', 'created', 'App\\Models\\Setting', 8, 'App\\Models\\User', 2, '[]', '2022-12-06 06:16:12', '2022-12-06 06:16:12'),
(74, 'default', 'created', 'App\\Models\\Setting', 9, 'App\\Models\\User', 2, '[]', '2022-12-06 07:42:23', '2022-12-06 07:42:23'),
(75, 'default', 'created', 'App\\Models\\Setting', 10, 'App\\Models\\User', 2, '[]', '2022-12-06 08:43:54', '2022-12-06 08:43:54'),
(76, 'default', 'created', 'App\\Models\\Setting', 11, 'App\\Models\\User', 2, '[]', '2022-12-07 06:15:27', '2022-12-07 06:15:27'),
(77, 'default', 'created', 'App\\Models\\Setting', 12, 'App\\Models\\User', 2, '[]', '2022-12-07 06:15:27', '2022-12-07 06:15:27'),
(78, 'default', 'created', 'App\\Models\\Setting', 13, 'App\\Models\\User', 2, '[]', '2022-12-07 06:15:27', '2022-12-07 06:15:27'),
(79, 'default', 'created', 'App\\Models\\Setting', 14, 'App\\Models\\User', 2, '[]', '2022-12-07 06:15:27', '2022-12-07 06:15:27'),
(80, 'default', 'created', 'App\\Models\\Setting', 15, 'App\\Models\\User', 2, '[]', '2022-12-07 06:15:27', '2022-12-07 06:15:27'),
(81, 'default', 'created', 'App\\Models\\Setting', 16, 'App\\Models\\User', 2, '[]', '2022-12-07 06:15:27', '2022-12-07 06:15:27'),
(82, 'default', 'created', 'App\\Models\\Setting', 17, 'App\\Models\\User', 2, '[]', '2022-12-07 06:15:27', '2022-12-07 06:15:27'),
(83, 'default', 'created', 'App\\Models\\Setting', 18, 'App\\Models\\User', 2, '[]', '2022-12-07 06:15:27', '2022-12-07 06:15:27'),
(84, 'default', 'created', 'App\\Models\\Setting', 19, 'App\\Models\\User', 2, '[]', '2022-12-07 06:15:27', '2022-12-07 06:15:27'),
(85, 'default', 'created', 'App\\Models\\Content', 1, 'App\\Models\\User', 2, '[]', '2022-12-14 08:19:35', '2022-12-14 08:19:35'),
(86, 'default', 'created', 'App\\Models\\Content', 2, 'App\\Models\\User', 2, '[]', '2022-12-14 08:25:06', '2022-12-14 08:25:06'),
(87, 'default', 'created', 'App\\Models\\Content', 3, 'App\\Models\\User', 2, '[]', '2022-12-14 08:25:17', '2022-12-14 08:25:17'),
(88, 'default', 'created', 'App\\Models\\Content', 4, 'App\\Models\\User', 2, '[]', '2022-12-14 08:25:31', '2022-12-14 08:25:31'),
(89, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2022-12-14 08:31:11', '2022-12-14 08:31:11'),
(90, 'default', 'updated', 'App\\Models\\Permission', 22, 'App\\Models\\User', 2, '[]', '2022-12-14 09:10:19', '2022-12-14 09:10:19'),
(91, 'default', 'updated', 'App\\Models\\Permission', 22, 'App\\Models\\User', 2, '[]', '2022-12-14 09:10:41', '2022-12-14 09:10:41'),
(92, 'default', 'updated', 'App\\Models\\Content', 1, 'App\\Models\\User', 2, '[]', '2022-12-14 09:13:13', '2022-12-14 09:13:13'),
(93, 'default', 'updated', 'App\\Models\\Content', 1, 'App\\Models\\User', 2, '[]', '2022-12-14 09:13:27', '2022-12-14 09:13:27'),
(94, 'default', 'updated', 'App\\Models\\Permission', 22, 'App\\Models\\User', 2, '[]', '2022-12-14 09:13:38', '2022-12-14 09:13:38'),
(95, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"image\":\"wp4227520.jpg\"},\"old\":{\"image\":null}}', '2022-12-15 03:34:36', '2022-12-15 03:34:36'),
(96, 'User', 'updated', 'App\\Models\\User', 4, 'App\\Models\\User', 2, '{\"attributes\":{\"image\":\"wp4227520.jpg\"},\"old\":{\"image\":\"public\\/uploads\\/users\\/\"}}', '2022-12-15 03:49:19', '2022-12-15 03:49:19'),
(97, 'default', 'created', 'App\\Models\\Content', 5, 'App\\Models\\User', 2, '[]', '2022-12-15 08:20:48', '2022-12-15 08:20:48'),
(98, 'default', 'created', 'App\\Models\\Content', 6, 'App\\Models\\User', 2, '[]', '2022-12-15 09:05:32', '2022-12-15 09:05:32'),
(99, 'default', 'created', 'App\\Models\\Content', 7, 'App\\Models\\User', 2, '[]', '2022-12-15 09:22:23', '2022-12-15 09:22:23'),
(100, 'default', 'updated', 'App\\Models\\Content', 7, 'App\\Models\\User', 2, '[]', '2022-12-15 09:33:25', '2022-12-15 09:33:25'),
(101, 'default', 'updated', 'App\\Models\\Content', 7, 'App\\Models\\User', 2, '[]', '2022-12-15 09:33:34', '2022-12-15 09:33:34'),
(102, 'default', 'updated', 'App\\Models\\Content', 7, 'App\\Models\\User', 2, '[]', '2022-12-15 09:34:41', '2022-12-15 09:34:41'),
(103, 'default', 'created', 'App\\Models\\Content', 8, 'App\\Models\\User', 2, '[]', '2022-12-15 09:35:21', '2022-12-15 09:35:21'),
(104, 'default', 'updated', 'App\\Models\\Content', 8, 'App\\Models\\User', 2, '[]', '2022-12-15 09:35:29', '2022-12-15 09:35:29'),
(105, 'default', 'deleted', 'App\\Models\\Content', 8, 'App\\Models\\User', 2, '[]', '2022-12-15 09:35:33', '2022-12-15 09:35:33'),
(106, 'default', 'updated', 'App\\Models\\Permission', 22, 'App\\Models\\User', 2, '[]', '2022-12-15 10:04:06', '2022-12-15 10:04:06'),
(107, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2022-12-15 10:04:13', '2022-12-15 10:04:13'),
(108, 'default', 'deleted', 'App\\Models\\Permission', 23, 'App\\Models\\User', 2, '[]', '2022-12-15 10:04:17', '2022-12-15 10:04:17'),
(109, 'default', 'deleted', 'App\\Models\\Permission', 22, 'App\\Models\\User', 2, '[]', '2022-12-15 10:04:20', '2022-12-15 10:04:20'),
(110, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2022-12-15 10:05:00', '2022-12-15 10:05:00'),
(111, 'default', 'updated', 'App\\Models\\Permission', 24, 'App\\Models\\User', 2, '[]', '2022-12-15 10:05:31', '2022-12-15 10:05:31'),
(112, 'default', 'deleted', 'App\\Models\\Permission', 24, 'App\\Models\\User', 2, '[]', '2022-12-15 10:05:39', '2022-12-15 10:05:39'),
(113, 'User', 'created', 'App\\Models\\User', 10, 'App\\Models\\User', 2, '{\"attributes\":{\"name\":\"test0\",\"email\":\"test0@yopmail.com\",\"phone\":null,\"image\":null,\"address\":null,\"password\":\"$2y$10$wUjo50VlTlQ0cW2miDWhjuD93cfu8\\/XXwEKDw8.IaommEsAIypOq2\",\"otp\":null,\"about\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":null}}', '2022-12-16 04:44:43', '2022-12-16 04:44:43'),
(114, 'User', 'created', 'App\\Models\\User', 11, 'App\\Models\\User', 2, '{\"attributes\":{\"name\":\"q\",\"email\":\"q@yopmail.com\",\"phone\":null,\"image\":null,\"address\":null,\"password\":\"$2y$10$IFycIXd9o0ckbD5\\/YYD7..zw3UH8hsr5hmPJ9sP.sUOUDxAIE4v9O\",\"otp\":null,\"about\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":null}}', '2022-12-16 05:32:08', '2022-12-16 05:32:08'),
(115, 'User', 'updated', 'App\\Models\\User', 11, 'App\\Models\\User', 2, '{\"attributes\":{\"name\":\"Q\"},\"old\":{\"name\":\"q\"}}', '2022-12-16 05:39:36', '2022-12-16 05:39:36'),
(116, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"image\":\"wp4227520.jpg\"},\"old\":{\"image\":null}}', '2022-12-16 09:08:37', '2022-12-16 09:08:37'),
(117, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"image\":\"D:\\\\xampp\\\\tmp\\\\php7756.tmp\"},\"old\":{\"image\":\"wp4227520.jpg\"}}', '2022-12-19 03:24:43', '2022-12-19 03:24:43'),
(118, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"image\":\"D:\\\\xampp\\\\tmp\\\\phpBE36.tmp\"},\"old\":{\"image\":\"D:\\\\xampp\\\\tmp\\\\php7756.tmp\"}}', '2022-12-19 03:28:18', '2022-12-19 03:28:18'),
(119, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"name\":\"Admin0\"},\"old\":{\"name\":\"Admin\"}}', '2022-12-20 09:13:09', '2022-12-20 09:13:09'),
(120, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"name\":\"Admin\"},\"old\":{\"name\":\"Admin0\"}}', '2022-12-20 09:13:22', '2022-12-20 09:13:22'),
(121, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"image\":\"\\/uploads\\/category\\/1671545868.jfif\"},\"old\":{\"image\":null}}', '2022-12-20 09:17:48', '2022-12-20 09:17:48'),
(122, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"image\":\"\\/uploads\\/user\\/1671545914.jpg\"},\"old\":{\"image\":\"\\/uploads\\/category\\/1671545868.jfif\"}}', '2022-12-20 09:18:34', '2022-12-20 09:18:34'),
(123, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"image\":\"public\\/uploads\\/user\\/1671545985.jfif\"},\"old\":{\"image\":\"\\/uploads\\/user\\/1671545914.jpg\"}}', '2022-12-20 09:19:45', '2022-12-20 09:19:45'),
(124, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"image\":\"uploads\\/user\\/1671546322.png\"},\"old\":{\"image\":\"uploads\\/user\\/1671545985.jfif\"}}', '2022-12-20 09:25:22', '2022-12-20 09:25:22'),
(125, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"image\":\"uploads\\/user\\/1671548885.png\"},\"old\":{\"image\":\"uploads\\/user\\/1671546322.png\"}}', '2022-12-20 10:08:05', '2022-12-20 10:08:05'),
(126, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2023-05-28 09:51:26', '2023-05-28 09:51:26'),
(127, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2023-05-28 09:51:46', '2023-05-28 09:51:46'),
(128, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2023-05-28 09:51:54', '2023-05-28 09:51:54'),
(129, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2023-05-28 09:52:02', '2023-05-28 09:52:02'),
(130, 'User', 'created', 'App\\Models\\User', 12, NULL, NULL, '{\"attributes\":{\"name\":\"User\",\"email\":\"newuser@yopmail.com\",\"phone\":null,\"image\":\"public\\/uploads\\/user\\/\",\"address\":null,\"password\":\"$2y$10$mqa5FsiBfFJUC.RYdT4rWu9Y3VVij\\/YmVc4vvdZm7z6pWpZWH.Lwi\",\"otp\":\"6156\",\"about\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":\"email\",\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":null}}', '2023-07-31 03:35:54', '2023-07-31 03:35:54'),
(131, 'User', 'created', 'App\\Models\\User', 13, NULL, NULL, '{\"attributes\":{\"name\":\"User\",\"email\":\"newuser@yopmail.com\",\"phone\":null,\"image\":\"public\\/uploads\\/user\\/\",\"address\":null,\"password\":\"$2y$10$FrD8yhRhegtFx1AoqIniOO1WZxAqVihZETV93Wpu27T\\/7vHi9vkOy\",\"otp\":\"5961\",\"about\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":\"email\",\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":null}}', '2023-07-31 03:50:39', '2023-07-31 03:50:39'),
(132, 'User', 'created', 'App\\Models\\User', 14, NULL, NULL, '{\"attributes\":{\"name\":\"User\",\"email\":\"newuser@yopmail.com\",\"phone\":null,\"image\":\"public\\/uploads\\/user\\/\",\"address\":null,\"password\":\"$2y$10$e7fMf0dUnTuPmY1xazxvuuIc7GcGvZi0gIOY5NthZFnBRQOs2Tppy\",\"otp\":\"6053\",\"about\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":\"email\",\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":null}}', '2023-07-31 03:51:45', '2023-07-31 03:51:45'),
(133, 'User', 'created', 'App\\Models\\User', 15, NULL, NULL, '{\"attributes\":{\"name\":\"User\",\"email\":\"anas.ahmed393@gmail.com\",\"phone\":null,\"image\":\"public\\/uploads\\/user\\/\",\"address\":null,\"password\":\"$2y$10$URvnzg2lScTacj6sKZkGXe49vPkeDCV\\/wBs2sAV8fVJCeLnX1y.jC\",\"otp\":\"7692\",\"about\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":\"email\",\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":null}}', '2023-07-31 04:08:12', '2023-07-31 04:08:12'),
(134, 'User', 'created', 'App\\Models\\User', 16, NULL, NULL, '{\"attributes\":{\"name\":\"User\",\"email\":\"anas.ahmed393@gmail.com\",\"phone\":null,\"image\":\"public\\/uploads\\/user\\/\",\"address\":null,\"password\":\"$2y$10$q6Yc0HB.J2B\\/w0Ac6HpmYOBgnQ3SJ.wfv.HjXU3Lai48f5v2Cj2e2\",\"otp\":\"2502\",\"about\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":\"email\",\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":null}}', '2023-07-31 04:12:59', '2023-07-31 04:12:59'),
(135, 'User', 'created', 'App\\Models\\User', 17, NULL, NULL, '{\"attributes\":{\"name\":\"User\",\"email\":\"anas.ahmed393@gmail.com\",\"phone\":null,\"image\":\"public\\/uploads\\/user\\/\",\"address\":null,\"password\":\"$2y$10$PD\\/Sp2X5F9jv6kj6BQaqqOku\\/XeB1QHr9mOPp4KjUkAqCM\\/C.kD9y\",\"otp\":\"3635\",\"about\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":\"email\",\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":null}}', '2023-07-31 04:14:06', '2023-07-31 04:14:06'),
(136, 'default', 'updated', 'App\\Models\\Permission', 25, 'App\\Models\\User', 2, '[]', '2024-01-09 09:13:34', '2024-01-09 09:13:34'),
(137, 'default', 'updated', 'App\\Models\\Permission', 26, 'App\\Models\\User', 2, '[]', '2024-01-09 09:13:40', '2024-01-09 09:13:40'),
(138, 'default', 'updated', 'App\\Models\\Permission', 27, 'App\\Models\\User', 2, '[]', '2024-01-09 09:13:45', '2024-01-09 09:13:45'),
(139, 'default', 'updated', 'App\\Models\\Permission', 28, 'App\\Models\\User', 2, '[]', '2024-01-09 09:13:49', '2024-01-09 09:13:49'),
(140, 'User', 'created', 'App\\Models\\User', 18, 'App\\Models\\User', 2, '{\"attributes\":{\"name\":\"test\",\"email\":\"brokerage@master.com\",\"phone\":\"012345678\",\"image\":null,\"address\":null,\"password\":\"$2y$10$Pt7XsEjKUjdVRudeImAzguQvpIit2g2qNq1n6RbZeqp.MLW6m9G.m\",\"otp\":null,\"about\":null,\"device_type\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":null}}', '2024-01-10 11:39:52', '2024-01-10 11:39:52'),
(141, 'User', 'updated', 'App\\Models\\User', 11, 'App\\Models\\User', 2, '{\"attributes\":{\"status\":1},\"old\":{\"status\":0}}', '2024-01-11 12:09:19', '2024-01-11 12:09:19'),
(142, 'User', 'updated', 'App\\Models\\User', 17, 'App\\Models\\User', 2, '{\"attributes\":{\"phone\":\"0231456789\"},\"old\":{\"phone\":null}}', '2024-01-11 12:12:30', '2024-01-11 12:12:30'),
(143, 'User', 'updated', 'App\\Models\\User', 17, 'App\\Models\\User', 2, '{\"attributes\":{\"referral_url\":\"sdsd\",\"referring_url\":\"sdsd\",\"utm_source\":\"dsd\",\"utm_keyword\":\"sdsd\",\"utm_campaign\":\"sdsd\",\"utm_medium\":\"sdsd\"},\"old\":{\"referral_url\":null,\"referring_url\":null,\"utm_source\":null,\"utm_keyword\":null,\"utm_campaign\":null,\"utm_medium\":null}}', '2024-01-11 12:33:21', '2024-01-11 12:33:21'),
(144, 'User', 'updated', 'App\\Models\\User', 11, 'App\\Models\\User', 2, '{\"attributes\":{\"referral_url\":\"aasasasasa\",\"referring_url\":\"sdsdsdsd\"},\"old\":{\"referral_url\":null,\"referring_url\":null}}', '2024-01-11 12:47:20', '2024-01-11 12:47:20'),
(145, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-11 13:02:36', '2024-01-11 13:02:36'),
(146, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-11 13:02:51', '2024-01-11 13:02:51'),
(147, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-11 13:03:04', '2024-01-11 13:03:04'),
(148, 'default', 'updated', 'App\\Models\\Permission', 30, 'App\\Models\\User', 2, '[]', '2024-01-11 13:03:18', '2024-01-11 13:03:18'),
(149, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-11 13:03:28', '2024-01-11 13:03:28'),
(150, 'User', 'updated', 'App\\Models\\User', 17, 'App\\Models\\User', 2, '{\"attributes\":{\"name\":\"User0\",\"phone\":\"02314567890\"},\"old\":{\"name\":\"User\",\"phone\":\"0231456789\"}}', '2024-01-12 06:33:09', '2024-01-12 06:33:09'),
(151, 'User', 'updated', 'App\\Models\\User', 17, 'App\\Models\\User', 2, '{\"attributes\":{\"status\":1},\"old\":{\"status\":0}}', '2024-01-12 06:33:13', '2024-01-12 06:33:13'),
(152, 'User', 'updated', 'App\\Models\\User', 17, 'App\\Models\\User', 2, '{\"attributes\":{\"status\":0},\"old\":{\"status\":1}}', '2024-01-12 06:33:19', '2024-01-12 06:33:19'),
(153, 'default', 'created', 'App\\Models\\License', 1, 'App\\Models\\User', 2, '[]', '2024-01-12 12:32:55', '2024-01-12 12:32:55'),
(154, 'default', 'created', 'App\\Models\\License', 2, 'App\\Models\\User', 2, '[]', '2024-01-12 12:43:56', '2024-01-12 12:43:56'),
(155, 'default', 'updated', 'App\\Models\\License', 2, 'App\\Models\\User', 2, '[]', '2024-01-12 12:49:56', '2024-01-12 12:49:56'),
(156, 'default', 'deleted', 'App\\Models\\License', 1, 'App\\Models\\User', 2, '[]', '2024-01-12 12:51:07', '2024-01-12 12:51:07'),
(157, 'default', 'updated', 'App\\Models\\License', 2, 'App\\Models\\User', 2, '[]', '2024-01-12 12:51:43', '2024-01-12 12:51:43'),
(158, 'User', 'updated', 'App\\Models\\User', 17, 'App\\Models\\User', 2, '{\"attributes\":{\"status\":1},\"old\":{\"status\":0}}', '2024-01-12 17:03:05', '2024-01-12 17:03:05'),
(159, 'User', 'updated', 'App\\Models\\User', 17, 'App\\Models\\User', 2, '{\"attributes\":{\"status\":0},\"old\":{\"status\":1}}', '2024-01-12 17:03:07', '2024-01-12 17:03:07'),
(160, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"last_login\":\"2024-01-13 15:29:47\"},\"old\":{\"last_login\":null}}', '2024-01-13 10:29:47', '2024-01-13 10:29:47'),
(161, 'User', 'deleted', 'App\\Models\\User', 10, 'App\\Models\\User', 2, '{\"attributes\":{\"name\":\"test0\",\"email\":\"test0@yopmail.com\",\"phone\":null,\"image\":null,\"address\":null,\"password\":\"$2y$10$wUjo50VlTlQ0cW2miDWhjuD93cfu8\\/XXwEKDw8.IaommEsAIypOq2\",\"otp\":null,\"about\":null,\"device_type\":null,\"date\":null,\"contact\":null,\"state\":null,\"partner\":null,\"referral_url\":null,\"referring_url\":null,\"utm_source\":null,\"utm_keyword\":null,\"utm_campaign\":null,\"utm_medium\":null,\"device\":null,\"last_login\":null,\"app_version\":null,\"device_count\":null,\"app_user\":null,\"face_verification\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":null}}', '2024-01-13 10:33:15', '2024-01-13 10:33:15'),
(162, 'User', 'deleted', 'App\\Models\\User', 11, 'App\\Models\\User', 2, '{\"attributes\":{\"name\":\"Q\",\"email\":\"q@yopmail.com\",\"phone\":null,\"image\":null,\"address\":null,\"password\":\"$2y$10$IFycIXd9o0ckbD5\\/YYD7..zw3UH8hsr5hmPJ9sP.sUOUDxAIE4v9O\",\"otp\":null,\"about\":null,\"device_type\":null,\"date\":null,\"contact\":null,\"state\":null,\"partner\":null,\"referral_url\":\"aasasasasa\",\"referring_url\":\"sdsdsdsd\",\"utm_source\":null,\"utm_keyword\":null,\"utm_campaign\":null,\"utm_medium\":null,\"device\":null,\"last_login\":null,\"app_version\":null,\"device_count\":null,\"app_user\":null,\"face_verification\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":1,\"is_deactivate\":0,\"email_verified_at\":null}}', '2024-01-13 10:33:20', '2024-01-13 10:33:20'),
(163, 'User', 'created', 'App\\Models\\User', 19, 'App\\Models\\User', 2, '{\"attributes\":{\"name\":\"test\",\"email\":\"test@test.com\",\"phone\":\"01234866566\",\"image\":null,\"address\":null,\"password\":\"$2y$10$44WphyjVQ7PatxfbbUAHRe\\/xvmf4Mi3H3b1LPqP06TsJiChoNxPOG\",\"otp\":null,\"about\":null,\"device_type\":null,\"date\":null,\"contact\":null,\"state\":null,\"partner\":null,\"referral_url\":null,\"referring_url\":null,\"utm_source\":null,\"utm_keyword\":null,\"utm_campaign\":null,\"utm_medium\":null,\"device\":null,\"last_login\":null,\"app_version\":null,\"device_count\":null,\"app_user\":null,\"face_verification\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":null}}', '2024-01-13 10:34:18', '2024-01-13 10:34:18'),
(164, 'User', 'created', 'App\\Models\\User', 20, 'App\\Models\\User', 2, '{\"attributes\":{\"name\":\"test\",\"email\":\"test@test.com\",\"phone\":\"0123456795\",\"image\":null,\"address\":null,\"password\":\"$2y$10$RLKsjpiTfdwv6fDT9xuGfeFrQMi9dXsJIcu4vd9jU0mEXuGJqDq..\",\"otp\":null,\"about\":null,\"device_type\":null,\"date\":null,\"contact\":null,\"state\":null,\"partner\":null,\"referral_url\":null,\"referring_url\":null,\"utm_source\":null,\"utm_keyword\":null,\"utm_campaign\":null,\"utm_medium\":null,\"device\":null,\"last_login\":null,\"app_version\":null,\"device_count\":null,\"app_user\":null,\"face_verification\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":null}}', '2024-01-13 10:36:14', '2024-01-13 10:36:14'),
(165, 'User', 'created', 'App\\Models\\User', 21, 'App\\Models\\User', 2, '{\"attributes\":{\"name\":\"test\",\"email\":\"test@test.com\",\"phone\":\"012345575\",\"image\":null,\"address\":null,\"password\":\"$2y$10$lyPucZkMK0KP5q6xL\\/8RiuW6zgn5hu9p5vpCVDeNusX0drdJDGZUG\",\"otp\":null,\"about\":null,\"device_type\":null,\"date\":null,\"contact\":null,\"state\":null,\"partner\":null,\"referral_url\":null,\"referring_url\":null,\"utm_source\":null,\"utm_keyword\":null,\"utm_campaign\":null,\"utm_medium\":null,\"device\":null,\"last_login\":null,\"app_version\":null,\"device_count\":null,\"app_user\":null,\"face_verification\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":null}}', '2024-01-13 10:38:07', '2024-01-13 10:38:07'),
(166, 'User', 'created', 'App\\Models\\User', 22, 'App\\Models\\User', 2, '{\"attributes\":{\"name\":\"test\",\"email\":\"test@test.com\",\"phone\":\"0123449656\",\"image\":null,\"address\":null,\"password\":\"$2y$10$mxzFv38YIG\\/OIYbkV31DWejJlh0ixO4UlDZ4NNCkZ8NJ6kUn509zm\",\"otp\":null,\"about\":null,\"device_type\":null,\"date\":\"2024-01-13\",\"contact\":null,\"state\":null,\"partner\":null,\"referral_url\":null,\"referring_url\":null,\"utm_source\":null,\"utm_keyword\":null,\"utm_campaign\":null,\"utm_medium\":null,\"device\":null,\"last_login\":null,\"app_version\":null,\"device_count\":null,\"app_user\":null,\"face_verification\":null,\"device_token\":null,\"verified_by\":null,\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":null}}', '2024-01-13 10:40:03', '2024-01-13 10:40:03'),
(167, 'User', 'updated', 'App\\Models\\User', 22, 'App\\Models\\User', 22, '{\"attributes\":{\"last_login\":\"2024-01-13 15:41:12\"},\"old\":{\"last_login\":null}}', '2024-01-13 10:41:12', '2024-01-13 10:41:12'),
(168, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"last_login\":\"2024-01-13 21:25:33\"},\"old\":{\"last_login\":\"2024-01-13 15:29:47\"}}', '2024-01-13 16:25:33', '2024-01-13 16:25:33'),
(169, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"dash_pass\":\"10\"},\"old\":{\"dash_pass\":null}}', '2024-01-13 16:48:55', '2024-01-13 16:48:55'),
(170, 'User', 'created', 'App\\Models\\User', 23, 'App\\Models\\User', 2, '{\"attributes\":{\"name\":\"test\",\"email\":\"ss@sdsds.com\",\"phone\":\"5445465464\",\"image\":null,\"address\":null,\"password\":\"$2y$10$ad0uxhc7AIGTBrkwCygQF.5aOg.peUDcoxbFajxpSMK10UGi3xPV2\",\"otp\":null,\"about\":null,\"device_type\":null,\"date\":\"2024-01-13\",\"referral_code\":\"Mqa2utkn\",\"dash_pass\":null,\"contact\":null,\"state\":null,\"partner\":null,\"referral_url\":\"http:\\/\\/localhost\\/DashCE\\/public\\/register?referral_code=Mqa2utkn\",\"referring_url\":\"http:\\/\\/localhost\\/DashCE\\/public\\/register?referral_code=E4CykF7p\",\"utm_source\":null,\"utm_keyword\":null,\"utm_campaign\":null,\"utm_medium\":null,\"device\":null,\"last_login\":null,\"app_version\":null,\"device_count\":null,\"app_user\":null,\"face_verification\":null,\"device_token\":null,\"verified_by\":\"email\",\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":\"2024-01-13T21:48:55.000000Z\"}}', '2024-01-13 16:48:55', '2024-01-13 16:48:55'),
(171, 'default', 'created', 'App\\Models\\License', 3, 'App\\Models\\User', 2, '[]', '2024-01-13 17:42:07', '2024-01-13 17:42:07'),
(172, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"last_login\":\"2024-01-15 16:55:45\"},\"old\":{\"last_login\":\"2024-01-13 21:25:33\"}}', '2024-01-15 11:55:45', '2024-01-15 11:55:45'),
(173, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-15 11:56:11', '2024-01-15 11:56:11'),
(174, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-15 11:56:22', '2024-01-15 11:56:22'),
(175, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-15 11:56:31', '2024-01-15 11:56:31'),
(176, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-15 11:56:46', '2024-01-15 11:56:46'),
(177, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"dash_pass\":\"20\"},\"old\":{\"dash_pass\":\"10\"}}', '2024-01-15 12:23:05', '2024-01-15 12:23:05'),
(178, 'User', 'created', 'App\\Models\\User', 24, 'App\\Models\\User', 2, '{\"attributes\":{\"name\":\"Student\",\"email\":\"student@student.com\",\"phone\":\"1555554878\",\"image\":null,\"address\":null,\"password\":\"$2y$10$AUq5eERuE1AH3z875piUAuM8BAoZ\\/x9engaRKvbZw7.TH\\/Mcyysni\",\"otp\":null,\"about\":null,\"device_type\":null,\"date\":\"2024-01-15\",\"referral_code\":\"1LbBSfkT\",\"dash_pass\":null,\"contact\":null,\"state\":null,\"partner\":null,\"referral_url\":\"http:\\/\\/localhost\\/DashCE\\/public\\/register?referral_code=1LbBSfkT\",\"referring_url\":\"http:\\/\\/localhost\\/DashCE\\/public\\/register?referral_code=E4CykF7p\",\"utm_source\":null,\"utm_keyword\":null,\"utm_campaign\":null,\"utm_medium\":null,\"device\":null,\"last_login\":null,\"app_version\":null,\"device_count\":null,\"app_user\":null,\"face_verification\":null,\"device_token\":null,\"verified_by\":\"email\",\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":\"2024-01-15T17:23:05.000000Z\"}}', '2024-01-15 12:23:05', '2024-01-15 12:23:05'),
(179, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"dash_pass\":\"30\"},\"old\":{\"dash_pass\":\"20\"}}', '2024-01-15 12:28:48', '2024-01-15 12:28:48'),
(180, 'User', 'created', 'App\\Models\\User', 25, 'App\\Models\\User', 2, '{\"attributes\":{\"name\":\"student\",\"parent_id\":2,\"license_id\":3,\"plan_id\":null,\"email\":\"student@student.com\",\"phone\":\"65461944964\",\"image\":null,\"address\":null,\"password\":\"$2y$10$07dw4UHPSf.XwcXF5Qtu1.Kl1X.spHEsUpcojJ5XHqTIia..gnMHW\",\"otp\":null,\"about\":null,\"device_type\":null,\"date\":\"2024-01-15\",\"referral_code\":\"AOwKUECb\",\"dash_pass\":null,\"contact\":null,\"state\":null,\"partner\":null,\"referral_url\":\"http:\\/\\/localhost\\/DashCE\\/public\\/register?referral_code=AOwKUECb\",\"referring_url\":\"http:\\/\\/localhost\\/DashCE\\/public\\/register?referral_code=E4CykF7p\",\"utm_source\":null,\"utm_keyword\":null,\"utm_campaign\":null,\"utm_medium\":null,\"device\":null,\"last_login\":null,\"app_version\":null,\"device_count\":null,\"app_user\":null,\"face_verification\":null,\"device_token\":null,\"verified_by\":\"email\",\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":\"2024-01-15T17:28:48.000000Z\"}}', '2024-01-15 12:28:48', '2024-01-15 12:28:48'),
(181, 'User', 'updated', 'App\\Models\\User', 25, 'App\\Models\\User', 2, '{\"attributes\":{\"license_id\":4},\"old\":{\"license_id\":3}}', '2024-01-15 12:40:25', '2024-01-15 12:40:25'),
(182, 'User', 'updated', 'App\\Models\\User', 25, 'App\\Models\\User', 2, '{\"attributes\":{\"status\":1},\"old\":{\"status\":0}}', '2024-01-15 12:42:37', '2024-01-15 12:42:37'),
(183, 'User', 'updated', 'App\\Models\\User', 25, 'App\\Models\\User', 2, '{\"attributes\":{\"status\":0},\"old\":{\"status\":1}}', '2024-01-15 12:42:51', '2024-01-15 12:42:51'),
(184, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"dash_pass\":\"40\"},\"old\":{\"dash_pass\":\"30\"}}', '2024-01-15 13:04:46', '2024-01-15 13:04:46'),
(185, 'User', 'created', 'App\\Models\\User', 26, 'App\\Models\\User', 2, '{\"attributes\":{\"name\":\"dsds\",\"parent_id\":2,\"license_id\":4,\"plan_id\":null,\"email\":\"dsd@Student.co\",\"phone\":\"5485448548\",\"image\":null,\"address\":null,\"password\":\"$2y$10$uxe5wCp39Wxpjvpb0BUG1ub09doMNEcTVacFXs.SEMvlwlfibnm2G\",\"otp\":null,\"about\":null,\"device_type\":null,\"date\":\"2024-01-15\",\"referral_code\":\"fiRLPDd8\",\"dash_pass\":null,\"contact\":null,\"state\":null,\"partner\":null,\"referral_url\":\"http:\\/\\/localhost\\/DashCE\\/public\\/register?referral_code=fiRLPDd8\",\"referring_url\":\"http:\\/\\/localhost\\/DashCE\\/public\\/register?referral_code=E4CykF7p\",\"utm_source\":null,\"utm_keyword\":null,\"utm_campaign\":null,\"utm_medium\":null,\"device\":null,\"last_login\":null,\"app_version\":null,\"device_count\":null,\"app_user\":null,\"face_verification\":null,\"device_token\":null,\"verified_by\":\"email\",\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":\"2024-01-15T18:04:46.000000Z\"}}', '2024-01-15 13:04:46', '2024-01-15 13:04:46'),
(186, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-15 13:28:22', '2024-01-15 13:28:22'),
(187, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-15 13:28:32', '2024-01-15 13:28:32'),
(188, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-15 13:28:43', '2024-01-15 13:28:43'),
(189, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-15 13:28:58', '2024-01-15 13:28:58'),
(190, 'default', 'created', 'App\\Models\\PromoCode', 1, 'App\\Models\\User', 2, '[]', '2024-01-15 14:17:13', '2024-01-15 14:17:13'),
(191, 'default', 'updated', 'App\\Models\\PromoCode', 1, 'App\\Models\\User', 2, '[]', '2024-01-15 14:18:32', '2024-01-15 14:18:32'),
(192, 'default', 'updated', 'App\\Models\\PromoCode', 1, 'App\\Models\\User', 2, '[]', '2024-01-15 14:19:16', '2024-01-15 14:19:16'),
(193, 'default', 'updated', 'App\\Models\\PromoCode', 1, 'App\\Models\\User', 2, '[]', '2024-01-15 14:21:21', '2024-01-15 14:21:21'),
(194, 'default', 'created', 'App\\Models\\PromoCode', 2, 'App\\Models\\User', 2, '[]', '2024-01-15 14:21:47', '2024-01-15 14:21:47'),
(195, 'default', 'deleted', 'App\\Models\\PromoCode', 2, 'App\\Models\\User', 2, '[]', '2024-01-15 14:21:57', '2024-01-15 14:21:57'),
(196, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"last_login\":\"2024-01-16 17:07:33\"},\"old\":{\"last_login\":\"2024-01-15 16:55:45\"}}', '2024-01-16 12:07:33', '2024-01-16 12:07:33'),
(197, 'default', 'created', 'App\\Models\\PromoCode', 3, 'App\\Models\\User', 2, '[]', '2024-01-16 12:32:55', '2024-01-16 12:32:55'),
(198, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-16 12:53:55', '2024-01-16 12:53:55'),
(199, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-16 12:54:13', '2024-01-16 12:54:13'),
(200, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-16 12:54:30', '2024-01-16 12:54:30'),
(201, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-16 12:54:47', '2024-01-16 12:54:47'),
(202, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"dash_pass\":\"50\"},\"old\":{\"dash_pass\":\"40\"}}', '2024-01-16 14:13:33', '2024-01-16 14:13:33'),
(203, 'User', 'created', 'App\\Models\\User', 27, 'App\\Models\\User', 2, '{\"attributes\":{\"name\":\"ndsjdn\",\"parent_id\":2,\"license_id\":4,\"plan_id\":null,\"email\":\"jcc@ds.co\",\"phone\":\"2215\",\"image\":null,\"address\":null,\"password\":\"$2y$10$8vaglFgDVtFS5VT2nkwIzu9\\/apa.c24A\\/jqvtWa\\/vaYRdSocSM9fG\",\"otp\":null,\"about\":null,\"device_type\":null,\"date\":\"2024-01-16\",\"referral_code\":\"7tA7ViDZ\",\"dash_pass\":null,\"contact\":null,\"state\":null,\"partner\":null,\"referral_url\":\"http:\\/\\/localhost\\/DashCE\\/public\\/register?referral_code=7tA7ViDZ\",\"referring_url\":\"http:\\/\\/localhost\\/DashCE\\/public\\/register?referral_code=E4CykF7p\",\"utm_source\":null,\"utm_keyword\":null,\"utm_campaign\":null,\"utm_medium\":null,\"device\":null,\"last_login\":null,\"app_version\":null,\"device_count\":null,\"app_user\":null,\"face_verification\":null,\"device_token\":null,\"verified_by\":\"email\",\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":\"2024-01-16T19:13:33.000000Z\"}}', '2024-01-16 14:13:33', '2024-01-16 14:13:33');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `subject_id`, `causer_type`, `causer_id`, `properties`, `created_at`, `updated_at`) VALUES
(204, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"last_login\":\"2024-01-16 19:23:41\"},\"old\":{\"last_login\":\"2024-01-16 17:07:33\"}}', '2024-01-16 14:23:41', '2024-01-16 14:23:41'),
(205, 'default', 'created', 'App\\Models\\PromoCode', 4, 'App\\Models\\User', 2, '[]', '2024-01-16 14:24:46', '2024-01-16 14:24:46'),
(206, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"last_login\":\"2024-01-17 16:14:17\"},\"old\":{\"last_login\":\"2024-01-16 19:23:41\"}}', '2024-01-17 11:14:17', '2024-01-17 11:14:17'),
(207, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-17 12:10:02', '2024-01-17 12:10:02'),
(208, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-17 12:10:14', '2024-01-17 12:10:14'),
(209, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-17 12:10:28', '2024-01-17 12:10:28'),
(210, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-17 12:10:44', '2024-01-17 12:10:44'),
(211, 'default', 'created', 'App\\Models\\CourseCategory', 1, 'App\\Models\\User', 2, '[]', '2024-01-17 12:45:48', '2024-01-17 12:45:48'),
(212, 'default', 'updated', 'App\\Models\\CourseCategory', 1, 'App\\Models\\User', 2, '[]', '2024-01-17 12:47:08', '2024-01-17 12:47:08'),
(213, 'default', 'updated', 'App\\Models\\CourseCategory', 1, 'App\\Models\\User', 2, '[]', '2024-01-17 12:47:49', '2024-01-17 12:47:49'),
(214, 'default', 'updated', 'App\\Models\\CourseCategory', 1, 'App\\Models\\User', 2, '[]', '2024-01-17 12:47:51', '2024-01-17 12:47:51'),
(215, 'default', 'updated', 'App\\Models\\CourseCategory', 1, 'App\\Models\\User', 2, '[]', '2024-01-17 12:47:55', '2024-01-17 12:47:55'),
(216, 'default', 'updated', 'App\\Models\\CourseCategory', 1, 'App\\Models\\User', 2, '[]', '2024-01-17 12:48:19', '2024-01-17 12:48:19'),
(217, 'default', 'updated', 'App\\Models\\CourseCategory', 1, 'App\\Models\\User', 2, '[]', '2024-01-17 12:50:37', '2024-01-17 12:50:37'),
(218, 'default', 'created', 'App\\Models\\CourseCategory', 2, 'App\\Models\\User', 2, '[]', '2024-01-17 12:50:51', '2024-01-17 12:50:51'),
(219, 'default', 'deleted', 'App\\Models\\CourseCategory', 2, 'App\\Models\\User', 2, '[]', '2024-01-17 12:50:58', '2024-01-17 12:50:58'),
(220, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-17 13:13:14', '2024-01-17 13:13:14'),
(221, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-17 13:13:31', '2024-01-17 13:13:31'),
(222, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-17 13:13:41', '2024-01-17 13:13:41'),
(223, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-17 13:13:52', '2024-01-17 13:13:52'),
(224, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"last_login\":\"2024-01-18 17:01:25\"},\"old\":{\"last_login\":\"2024-01-17 16:14:17\"}}', '2024-01-18 12:01:25', '2024-01-18 12:01:25'),
(225, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"last_login\":\"2024-01-18 17:04:58\"},\"old\":{\"last_login\":\"2024-01-18 17:01:25\"}}', '2024-01-18 12:04:58', '2024-01-18 12:04:58'),
(226, 'default', 'updated', 'App\\Models\\CourseCategory', 1, 'App\\Models\\User', 2, '[]', '2024-01-18 12:13:16', '2024-01-18 12:13:16'),
(227, 'default', 'created', 'App\\Models\\CourseCategory', 3, 'App\\Models\\User', 2, '[]', '2024-01-18 12:45:28', '2024-01-18 12:45:28'),
(228, 'default', 'created', 'App\\Models\\Course', 1, 'App\\Models\\User', 2, '[]', '2024-01-18 12:47:42', '2024-01-18 12:47:42'),
(229, 'default', 'created', 'App\\Models\\Course', 2, 'App\\Models\\User', 2, '[]', '2024-01-18 12:50:42', '2024-01-18 12:50:42'),
(230, 'default', 'updated', 'App\\Models\\CourseCategory', 1, 'App\\Models\\User', 2, '[]', '2024-01-18 12:55:10', '2024-01-18 12:55:10'),
(231, 'default', 'updated', 'App\\Models\\Course', 1, 'App\\Models\\User', 2, '[]', '2024-01-18 12:56:36', '2024-01-18 12:56:36'),
(232, 'default', 'updated', 'App\\Models\\Course', 1, 'App\\Models\\User', 2, '[]', '2024-01-18 12:56:45', '2024-01-18 12:56:45'),
(233, 'default', 'updated', 'App\\Models\\Course', 1, 'App\\Models\\User', 2, '[]', '2024-01-18 12:57:03', '2024-01-18 12:57:03'),
(234, 'default', 'updated', 'App\\Models\\Course', 1, 'App\\Models\\User', 2, '[]', '2024-01-18 12:57:05', '2024-01-18 12:57:05'),
(235, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"last_login\":\"2024-01-19 17:04:02\"},\"old\":{\"last_login\":\"2024-01-18 17:04:58\"}}', '2024-01-19 12:04:02', '2024-01-19 12:04:02'),
(236, 'default', 'updated', 'App\\Models\\Course', 2, 'App\\Models\\User', 2, '[]', '2024-01-19 12:37:21', '2024-01-19 12:37:21'),
(237, 'User', 'created', 'App\\Models\\User', 28, NULL, NULL, '{\"attributes\":{\"name\":\"ahmed\",\"parent_id\":null,\"license_id\":null,\"plan_id\":null,\"email\":\"muhammadahmedraza622@gmail.com\",\"phone\":\"03082034786\",\"image\":null,\"address\":null,\"password\":\"$2y$10$13MCriPnPRWrnoNrGd6pNeO22ps\\/t3hWjsPL26IS\\/y3X76jDORDOO\",\"otp\":\"9230\",\"about\":null,\"device_type\":null,\"date\":null,\"referral_code\":null,\"dash_pass\":null,\"contact\":null,\"state\":null,\"partner\":null,\"referral_url\":null,\"referring_url\":null,\"utm_source\":null,\"utm_keyword\":null,\"utm_campaign\":null,\"utm_medium\":null,\"device\":null,\"last_login\":null,\"app_version\":null,\"device_count\":null,\"app_user\":null,\"face_verification\":null,\"device_token\":null,\"verified_by\":\"email\",\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":null}}', '2024-01-19 16:26:40', '2024-01-19 16:26:40'),
(238, 'User', 'updated', 'App\\Models\\User', 28, NULL, NULL, '{\"attributes\":{\"otp\":null,\"email_verified_at\":\"2024-01-19T21:27:30.000000Z\"},\"old\":{\"otp\":\"9230\",\"email_verified_at\":null}}', '2024-01-19 16:27:30', '2024-01-19 16:27:30'),
(239, 'User', 'updated', 'App\\Models\\User', 28, 'App\\Models\\User', 28, '{\"attributes\":{\"last_login\":\"2024-01-19 21:27:41\"},\"old\":{\"last_login\":null}}', '2024-01-19 16:27:41', '2024-01-19 16:27:41'),
(240, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"last_login\":\"2024-01-19 21:35:49\"},\"old\":{\"last_login\":\"2024-01-19 17:04:02\"}}', '2024-01-19 16:35:49', '2024-01-19 16:35:49'),
(241, 'User', 'created', 'App\\Models\\User', 29, NULL, NULL, '{\"attributes\":{\"name\":\"ahmed\",\"parent_id\":null,\"license_id\":null,\"plan_id\":null,\"email\":\"muhammadahmedraza622@gmail.com\",\"phone\":\"03082034786\",\"image\":null,\"address\":null,\"password\":\"$2y$10$Fw9XJ7Azccm41WDXP\\/Rt6uTh1QelwMTXfwwPanEF\\/cOiewpF2aIxG\",\"otp\":\"8104\",\"about\":null,\"device_type\":null,\"date\":\"2024-01-19\",\"referral_code\":null,\"dash_pass\":null,\"contact\":null,\"state\":null,\"partner\":null,\"referral_url\":null,\"referring_url\":null,\"utm_source\":null,\"utm_keyword\":null,\"utm_campaign\":null,\"utm_medium\":null,\"device\":null,\"last_login\":null,\"app_version\":null,\"device_count\":null,\"app_user\":null,\"face_verification\":null,\"device_token\":null,\"verified_by\":\"email\",\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":null}}', '2024-01-19 16:46:28', '2024-01-19 16:46:28'),
(242, 'User', 'updated', 'App\\Models\\User', 29, NULL, NULL, '{\"attributes\":{\"otp\":null,\"email_verified_at\":\"2024-01-19T21:47:27.000000Z\"},\"old\":{\"otp\":\"8104\",\"email_verified_at\":null}}', '2024-01-19 16:47:27', '2024-01-19 16:47:27'),
(243, 'User', 'created', 'App\\Models\\User', 30, NULL, NULL, '{\"attributes\":{\"name\":\"admin\",\"parent_id\":null,\"license_id\":null,\"plan_id\":null,\"email\":\"muhammadahmedraza622@gmail.com\",\"phone\":\"03082034786\",\"image\":null,\"address\":null,\"password\":\"$2y$10$4YsyKSXKk9b1Sv6gPvmYAe87BeoTO18QsXZ47Q9McVafGAyCi.uoW\",\"otp\":\"1553\",\"about\":null,\"device_type\":null,\"date\":\"2024-01-19\",\"referral_code\":\"X9lTNKNr\",\"dash_pass\":null,\"contact\":null,\"state\":null,\"partner\":null,\"referral_url\":\"http:\\/\\/localhost\\/DashCE\\/public\\/admin\\/register?referral_code=X9lTNKNr\",\"referring_url\":null,\"utm_source\":null,\"utm_keyword\":null,\"utm_campaign\":null,\"utm_medium\":null,\"device\":null,\"last_login\":null,\"app_version\":null,\"device_count\":null,\"app_user\":null,\"face_verification\":null,\"device_token\":null,\"verified_by\":\"email\",\"social_provider\":null,\"social_token\":null,\"social_id\":null,\"status\":0,\"is_deactivate\":0,\"email_verified_at\":null}}', '2024-01-19 16:53:05', '2024-01-19 16:53:05'),
(244, 'User', 'updated', 'App\\Models\\User', 30, NULL, NULL, '{\"attributes\":{\"otp\":null,\"email_verified_at\":\"2024-01-19T21:53:26.000000Z\"},\"old\":{\"otp\":\"1553\",\"email_verified_at\":null}}', '2024-01-19 16:53:26', '2024-01-19 16:53:26'),
(245, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"last_login\":\"2024-01-21 17:40:46\"},\"old\":{\"last_login\":\"2024-01-19 21:35:49\"}}', '2024-01-21 12:40:46', '2024-01-21 12:40:46'),
(246, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"last_login\":\"2024-01-23 14:09:08\"},\"old\":{\"last_login\":\"2024-01-21 17:40:46\"}}', '2024-01-23 09:09:08', '2024-01-23 09:09:08'),
(247, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"last_login\":\"2024-01-27 15:11:07\"},\"old\":{\"last_login\":\"2024-01-23 14:09:08\"}}', '2024-01-27 10:11:07', '2024-01-27 10:11:07'),
(248, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"last_login\":\"2024-01-27 15:11:53\"},\"old\":{\"last_login\":\"2024-01-27 15:11:07\"}}', '2024-01-27 10:11:53', '2024-01-27 10:11:53'),
(249, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"last_login\":\"2024-01-27 19:05:52\"},\"old\":{\"last_login\":\"2024-01-27 15:11:53\"}}', '2024-01-27 14:05:52', '2024-01-27 14:05:52'),
(250, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-27 14:16:36', '2024-01-27 14:16:36'),
(251, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-27 14:16:44', '2024-01-27 14:16:44'),
(252, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-27 14:16:51', '2024-01-27 14:16:51'),
(253, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-27 14:16:58', '2024-01-27 14:16:58'),
(254, 'default', 'created', 'App\\Models\\Module', 1, 'App\\Models\\User', 2, '[]', '2024-01-27 15:39:57', '2024-01-27 15:39:57'),
(255, 'default', 'updated', 'App\\Models\\Module', 1, 'App\\Models\\User', 2, '[]', '2024-01-27 15:45:25', '2024-01-27 15:45:25'),
(256, 'default', 'updated', 'App\\Models\\Module', 1, 'App\\Models\\User', 2, '[]', '2024-01-27 15:45:26', '2024-01-27 15:45:26'),
(257, 'default', 'updated', 'App\\Models\\Module', 1, 'App\\Models\\User', 2, '[]', '2024-01-27 15:49:24', '2024-01-27 15:49:24'),
(258, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-27 15:59:44', '2024-01-27 15:59:44'),
(259, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-27 15:59:55', '2024-01-27 15:59:55'),
(260, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-27 16:00:02', '2024-01-27 16:00:02'),
(261, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-27 16:00:52', '2024-01-27 16:00:52'),
(262, 'default', 'updated', 'App\\Models\\Permission', 57, 'App\\Models\\User', 2, '[]', '2024-01-27 16:05:31', '2024-01-27 16:05:31'),
(263, 'default', 'updated', 'App\\Models\\Permission', 58, 'App\\Models\\User', 2, '[]', '2024-01-27 17:11:06', '2024-01-27 17:11:06'),
(264, 'default', 'updated', 'App\\Models\\Permission', 59, 'App\\Models\\User', 2, '[]', '2024-01-27 17:11:13', '2024-01-27 17:11:13'),
(265, 'default', 'updated', 'App\\Models\\Permission', 60, 'App\\Models\\User', 2, '[]', '2024-01-27 17:11:20', '2024-01-27 17:11:20'),
(266, 'default', 'created', 'App\\Models\\MiniModule', 1, 'App\\Models\\User', 2, '[]', '2024-01-27 17:11:44', '2024-01-27 17:11:44'),
(267, 'default', 'updated', 'App\\Models\\Module', 1, 'App\\Models\\User', 2, '[]', '2024-01-27 17:29:35', '2024-01-27 17:29:35'),
(268, 'default', 'updated', 'App\\Models\\Module', 1, 'App\\Models\\User', 2, '[]', '2024-01-27 17:29:59', '2024-01-27 17:29:59'),
(269, 'default', 'updated', 'App\\Models\\MiniModule', 1, 'App\\Models\\User', 2, '[]', '2024-01-27 17:30:19', '2024-01-27 17:30:19'),
(270, 'default', 'updated', 'App\\Models\\MiniModule', 1, 'App\\Models\\User', 2, '[]', '2024-01-27 17:30:21', '2024-01-27 17:30:21'),
(271, 'default', 'updated', 'App\\Models\\MiniModule', 1, 'App\\Models\\User', 2, '[]', '2024-01-27 17:33:11', '2024-01-27 17:33:11'),
(272, 'default', 'created', 'App\\Models\\MiniModule', 2, 'App\\Models\\User', 2, '[]', '2024-01-27 17:33:41', '2024-01-27 17:33:41'),
(273, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"last_login\":\"2024-01-29 07:11:40\"},\"old\":{\"last_login\":\"2024-01-27 19:05:52\"}}', '2024-01-29 02:11:40', '2024-01-29 02:11:40'),
(274, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"last_login\":\"2024-01-29 16:44:04\"},\"old\":{\"last_login\":\"2024-01-29 07:11:40\"}}', '2024-01-29 11:44:04', '2024-01-29 11:44:04'),
(275, 'default', 'deleted', 'App\\Models\\MiniModule', 1, 'App\\Models\\User', 2, '[]', '2024-01-29 12:15:06', '2024-01-29 12:15:06'),
(276, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-29 12:20:11', '2024-01-29 12:20:11'),
(277, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-29 12:20:20', '2024-01-29 12:20:20'),
(278, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-29 12:20:29', '2024-01-29 12:20:29'),
(279, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-01-29 12:20:38', '2024-01-29 12:20:38'),
(280, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"last_login\":\"2024-01-29 17:26:31\"},\"old\":{\"last_login\":\"2024-01-29 16:44:04\"}}', '2024-01-29 12:26:31', '2024-01-29 12:26:31'),
(281, 'default', 'created', 'App\\Models\\MiniModule', 3, 'App\\Models\\User', 2, '[]', '2024-01-29 12:52:09', '2024-01-29 12:52:09'),
(282, 'default', 'created', 'App\\Models\\Interaction', 1, 'App\\Models\\User', 2, '[]', '2024-01-29 12:54:36', '2024-01-29 12:54:36'),
(283, 'default', 'deleted', 'App\\Models\\Interaction', 1, 'App\\Models\\User', 2, '[]', '2024-01-29 13:08:35', '2024-01-29 13:08:35'),
(284, 'default', 'created', 'App\\Models\\Interaction', 2, 'App\\Models\\User', 2, '[]', '2024-01-29 13:18:23', '2024-01-29 13:18:23'),
(285, 'default', 'created', 'App\\Models\\Interaction', 3, 'App\\Models\\User', 2, '[]', '2024-01-29 13:22:35', '2024-01-29 13:22:35'),
(286, 'default', 'created', 'App\\Models\\Interaction', 4, 'App\\Models\\User', 2, '[]', '2024-01-29 13:23:24', '2024-01-29 13:23:24'),
(287, 'default', 'created', 'App\\Models\\Interaction', 5, 'App\\Models\\User', 2, '[]', '2024-01-29 13:23:48', '2024-01-29 13:23:48'),
(288, 'default', 'created', 'App\\Models\\Interaction', 6, 'App\\Models\\User', 2, '[]', '2024-01-29 13:24:05', '2024-01-29 13:24:05'),
(289, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"last_login\":\"2024-01-30 16:51:39\"},\"old\":{\"last_login\":\"2024-01-29 17:26:31\"}}', '2024-01-30 11:51:39', '2024-01-30 11:51:39'),
(290, 'default', 'created', 'App\\Models\\Interaction', 7, 'App\\Models\\User', 2, '[]', '2024-01-30 12:29:49', '2024-01-30 12:29:49'),
(291, 'default', 'created', 'App\\Models\\Interaction', 8, 'App\\Models\\User', 2, '[]', '2024-01-30 12:32:28', '2024-01-30 12:32:28'),
(292, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"last_login\":\"2024-02-03 10:12:20\"},\"old\":{\"last_login\":\"2024-01-30 16:51:39\"}}', '2024-02-03 05:12:20', '2024-02-03 05:12:20'),
(293, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"last_login\":\"2024-02-03 10:13:51\"},\"old\":{\"last_login\":\"2024-02-03 10:12:20\"}}', '2024-02-03 05:13:51', '2024-02-03 05:13:51'),
(294, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-02-03 06:51:47', '2024-02-03 06:51:47'),
(295, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-02-03 06:51:54', '2024-02-03 06:51:54'),
(296, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-02-03 06:52:06', '2024-02-03 06:52:06'),
(297, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-02-03 06:52:15', '2024-02-03 06:52:15'),
(298, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"last_login\":\"2024-02-03 16:02:00\"},\"old\":{\"last_login\":\"2024-02-03 10:13:51\"}}', '2024-02-03 11:02:00', '2024-02-03 11:02:00'),
(299, 'default', 'created', 'App\\Models\\Celebration', 1, 'App\\Models\\User', 2, '[]', '2024-02-03 11:38:09', '2024-02-03 11:38:09'),
(300, 'default', 'updated', 'App\\Models\\Celebration', 1, 'App\\Models\\User', 2, '[]', '2024-02-03 11:40:27', '2024-02-03 11:40:27'),
(301, 'default', 'updated', 'App\\Models\\Celebration', 1, 'App\\Models\\User', 2, '[]', '2024-02-03 11:40:29', '2024-02-03 11:40:29'),
(302, 'default', 'updated', 'App\\Models\\Celebration', 1, 'App\\Models\\User', 2, '[]', '2024-02-03 11:43:06', '2024-02-03 11:43:06'),
(303, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-02-03 12:01:31', '2024-02-03 12:01:31'),
(304, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-02-03 12:01:37', '2024-02-03 12:01:37'),
(305, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-02-03 12:01:43', '2024-02-03 12:01:43'),
(306, 'default', 'created', 'App\\Models\\Permission', NULL, 'App\\Models\\User', 2, '[]', '2024-02-03 12:01:49', '2024-02-03 12:01:49'),
(307, 'default', 'created', 'App\\Models\\Exam', 1, 'App\\Models\\User', 2, '[]', '2024-02-03 12:27:19', '2024-02-03 12:27:19'),
(308, 'default', 'created', 'App\\Models\\Exam', 2, 'App\\Models\\User', 2, '[]', '2024-02-03 12:27:52', '2024-02-03 12:27:52'),
(309, 'default', 'updated', 'App\\Models\\Exam', 1, 'App\\Models\\User', 2, '[]', '2024-02-03 12:28:00', '2024-02-03 12:28:00'),
(310, 'default', 'updated', 'App\\Models\\Exam', 1, 'App\\Models\\User', 2, '[]', '2024-02-03 12:31:58', '2024-02-03 12:31:58'),
(311, 'default', 'updated', 'App\\Models\\Celebration', 1, 'App\\Models\\User', 2, '[]', '2024-02-03 12:35:13', '2024-02-03 12:35:13'),
(312, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"last_login\":\"2024-02-05 14:04:11\"},\"old\":{\"last_login\":\"2024-02-03 16:02:00\"}}', '2024-02-05 09:04:11', '2024-02-05 09:04:11'),
(313, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"last_login\":\"2024-02-06 07:10:34\"},\"old\":{\"last_login\":\"2024-02-05 14:04:11\"}}', '2024-02-06 02:10:34', '2024-02-06 02:10:34'),
(314, 'User', 'updated', 'App\\Models\\User', 2, 'App\\Models\\User', 2, '{\"attributes\":{\"last_login\":\"2024-02-06 07:33:06\"},\"old\":{\"last_login\":\"2024-02-06 07:10:34\"}}', '2024-02-06 02:33:06', '2024-02-06 02:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `celebrations`
--

CREATE TABLE `celebrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `where` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `placement` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `celebrations`
--

INSERT INTO `celebrations` (`id`, `user_id`, `course_id`, `name`, `where`, `type`, `placement`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'test', 'dsd', 'dsd00', 'dsd', '1', '2024-02-03 11:38:09', '2024-02-03 12:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test', '2022-12-14 08:19:35', '2022-12-14 09:13:27'),
(2, 'q', 'q', '2022-12-14 08:25:06', '2022-12-14 08:25:06'),
(3, 't', 't', '2022-12-14 08:25:17', '2022-12-14 08:25:17'),
(4, 'qa', 'aa', '2022-12-14 08:25:31', '2022-12-14 08:25:31'),
(5, 'qaz', 'qaz', '2022-12-15 08:20:48', '2022-12-15 08:20:48'),
(6, 'superadmin', 'superadmin', '2022-12-15 09:05:32', '2022-12-15 09:05:32'),
(7, 'qa001', 'qas01', '2022-12-15 09:22:23', '2022-12-15 09:34:41');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `state` varchar(191) DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `renewal_date` date DEFAULT NULL,
  `exam` varchar(255) DEFAULT NULL,
  `interaction` varchar(255) DEFAULT NULL,
  `length` varchar(255) DEFAULT NULL,
  `credit_earn` varchar(255) DEFAULT NULL,
  `module` varchar(255) DEFAULT NULL,
  `cal_length` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `sub_title` text DEFAULT NULL,
  `status` varchar(255) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `user_id`, `category_id`, `name`, `date`, `state`, `expiration_date`, `renewal_date`, `exam`, `interaction`, `length`, `credit_earn`, `module`, `cal_length`, `description`, `sub_title`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'dsd', '2024-01-18', 'wqwqw', '2024-01-25', '2024-01-18', NULL, '1', '10min', '100', '1', '10min', 'sd', 'dsdsd', '1', '2024-01-18 12:47:42', '2024-01-18 12:57:05'),
(2, 2, 1, 'oepowp', '2024-01-18', 'dipiw', '2024-01-25', '2024-01-18', NULL, '45', '10min', '100', '1', '10min', 'dsd', 'dsd00', '0', '2024-01-18 12:50:42', '2024-01-19 12:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `course_categories`
--

CREATE TABLE `course_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_categories`
--

INSERT INTO `course_categories` (`id`, `user_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'dsd', '0', '2024-01-17 12:45:48', '2024-01-18 12:55:10'),
(3, 2, 'dsd', '0', '2024-01-18 12:45:28', '2024-01-18 12:45:28');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `where` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `placement` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `user_id`, `course_id`, `name`, `where`, `type`, `placement`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'dsd', 'fdf', 'dfkd0', 'dsd', '1', '2024-02-03 12:27:19', '2024-02-03 12:31:58'),
(2, 2, 2, 'qwqw', 'dmsl', 'oqp', 'wqpo', '0', '2024-02-03 12:27:52', '2024-02-03 12:27:52');

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
-- Table structure for table `interactions`
--

CREATE TABLE `interactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  `mini_module_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `badge` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interactions`
--

INSERT INTO `interactions` (`id`, `user_id`, `course_id`, `module_id`, `mini_module_id`, `name`, `badge`, `type`, `time`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 1, 3, 'test', 'wq', 'wqw', '10', '0', '2024-01-29 13:18:23', '2024-01-29 13:18:23'),
(4, 2, 2, 1, 2, 'dsd', 'dsd', 'ds', '10', '0', '2024-01-29 13:23:24', '2024-01-29 13:23:24'),
(5, 2, 2, 1, 2, 'df', 'd', 'fdfd', '15', '0', '2024-01-29 13:23:48', '2024-01-29 13:23:48'),
(6, 2, 2, 1, 3, 'sads', 'fdf', 'fdf', '12', '0', '2024-01-29 13:24:05', '2024-01-29 13:24:05'),
(8, 2, 2, 1, 2, 's', 'sd', 'dsd', '10', '0', '2024-01-30 12:32:28', '2024-01-30 12:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `licenses`
--

CREATE TABLE `licenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `state` varchar(191) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `expiration_date` date DEFAULT NULL,
  `license` text DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `brokerage_name` varchar(255) DEFAULT NULL,
  `Brokerage_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `licenses`
--

INSERT INTO `licenses` (`id`, `user_id`, `type`, `state`, `date`, `expiration_date`, `license`, `name`, `brokerage_name`, `Brokerage_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 'fdf', 'fdf', '2024-01-12', '2024-01-19', 'fdfd45f4d', 'dfd0000', NULL, 17, '1', '2024-01-12 12:43:56', '2024-01-12 12:51:43'),
(4, 2, 'ddsds', 'sdjs', '2024-01-13', '2024-01-26', 'sds5d4s5d', 'sdsd', NULL, 18, '0', '2024-01-13 17:42:07', '2024-01-13 17:42:07');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_11_28_114737_create_permission_tables', 1),
(11, '2022_11_28_122945_create_activity_log_table', 1),
(12, '2022_11_28_140447_create_contents_table', 1),
(13, '2022_11_30_141618_create_notifications_table', 1),
(14, '2022_12_02_104904_alter_table_users', 1),
(15, '2022_12_05_150951_create_settings_table', 2),
(18, '2024_01_11_180804_create_licenses_table', 3),
(19, '2024_01_15_184313_create_promo_codes_table', 4),
(20, '2024_01_17_173133_create_course_categories_table', 5),
(21, '2024_01_17_175344_create_courses_table', 6),
(22, '2024_01_27_190923_create_modules_table', 7),
(23, '2024_01_27_210140_create_mini_modules_table', 8),
(24, '2024_01_27_225539_create_interactions_table', 9),
(25, '2024_01_30_174438_create_companies_table', 10),
(26, '2024_02_03_101833_create_celebrations_table', 10),
(27, '2024_02_03_170728_create_exams_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `mini_modules`
--

CREATE TABLE `mini_modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `module_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mini_modules`
--

INSERT INTO `mini_modules` (`id`, `user_id`, `course_id`, `module_id`, `name`, `display_name`, `time`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 1, 'qq', 'qq', '35', '0', '2024-01-27 17:33:41', '2024-01-30 12:32:28'),
(3, 2, 2, 2, 'dsd', NULL, '32', '0', '2024-01-29 12:52:09', '2024-01-30 12:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 19),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 8),
(3, 'App\\Models\\User', 9),
(3, 'App\\Models\\User', 12),
(3, 'App\\Models\\User', 13),
(3, 'App\\Models\\User', 14),
(3, 'App\\Models\\User', 15),
(3, 'App\\Models\\User', 16),
(3, 'App\\Models\\User', 17),
(3, 'App\\Models\\User', 20),
(3, 'App\\Models\\User', 21),
(3, 'App\\Models\\User', 22),
(3, 'App\\Models\\User', 23),
(3, 'App\\Models\\User', 28),
(3, 'App\\Models\\User', 29),
(3, 'App\\Models\\User', 30),
(7, 'App\\Models\\User', 18),
(8, 'App\\Models\\User', 24),
(8, 'App\\Models\\User', 25),
(8, 'App\\Models\\User', 26),
(8, 'App\\Models\\User', 27);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `user_id`, `course_id`, `name`, `display_name`, `time`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'dsd', 'fdf0', '35', '0', '2024-01-27 15:39:57', '2024-01-30 12:32:28'),
(2, 2, 2, 'xcxc', 'sasa', NULL, '0', '2024-01-27 15:39:57', '2024-01-30 12:29:49');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `sender_id` varchar(255) DEFAULT NULL,
  `trigger_id` int(11) DEFAULT NULL,
  `trigger_type` varchar(255) DEFAULT NULL,
  `job_id` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `device_type` varchar(255) DEFAULT NULL,
  `success` varchar(255) DEFAULT NULL,
  `failure` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_read` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('01d85eb399087f606686380069421ab3cfed111c5cce255246f189d6a687252d82d5de2c54fc1335', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 10:18:11', '2022-12-02 10:18:11', '2023-12-02 15:18:11'),
('0804fc99e75094242a0c07a858a25e2f4ea227b435e8727a456df1c58d49ac0018b6d38a25c66018', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 09:16:52', '2022-12-02 09:16:52', '2023-12-02 14:16:52'),
('0a502ddf74c9570ab59db4fe12b2b0b02e6a4f5c01d7566ba785a13587f7ca05c4dd80442577698a', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 09:11:34', '2022-12-02 09:11:34', '2023-12-02 14:11:34'),
('0ad552272894d5a51d7b09ff79aeb592547151ed5d90dbe2f1563ab85bb6ace3a17715591d0a6ac1', 9, 3, 'Personal Access Token', '[]', 0, '2022-12-05 09:19:13', '2022-12-05 09:19:13', '2023-12-05 14:19:13'),
('0b90151d8d6cdc59704362d3e779d58d82e201e0f6225596daf2e2f44a5c798667463c8c0fdc62df', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 09:05:03', '2022-12-02 09:05:03', '2023-12-02 14:05:03'),
('19c0da40c449194a97ee85f39cc07cd377ed5a17191166ec1b2526933e552793d9157d10d46668e9', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 10:15:37', '2022-12-02 10:15:37', '2023-12-02 15:15:37'),
('28bca8c230e105742fbb4222f274928c199b19e70555e9782b439c277f49a854bbf804fd2a88aa8b', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-05 02:21:35', '2022-12-05 02:21:35', '2023-12-05 07:21:35'),
('34ebfa34b576b18063e4872c67b3ff5571a0b0a3bb7b9efe3d8ae9d1bc471661c4e236fdf5315b4f', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 09:32:36', '2022-12-02 09:32:36', '2023-12-02 14:32:36'),
('356fa159ec222246a66d0058c406749019e09e86100c96bd3f430135e80b2d7e3e93d795d6e98c10', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 10:15:07', '2022-12-02 10:15:07', '2023-12-02 15:15:07'),
('3b141035ca8e901d6473e1bd8488f5fd9e48d730fc27ae0f126c010931e385a5857e53ba4666ccef', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-05 02:30:27', '2022-12-05 02:30:27', '2023-12-05 07:30:27'),
('413ec293455090c04890342fe8add5436fd3096ed915f898b283e5a23042f0f16987f06b07dc4aaf', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 09:26:10', '2022-12-02 09:26:10', '2023-12-02 14:26:10'),
('4c91175a25d15698d499d1697eb33a09086a3194177eec39afa3de231312b9fde08c201a3cd6d37d', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 09:14:29', '2022-12-02 09:14:29', '2023-12-02 14:14:29'),
('4db6566265a3b2c34b668362e22e4a8ec9216462e1809eee88fa084b230ccc6ab360cfe463f19f07', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 09:12:34', '2022-12-02 09:12:34', '2023-12-02 14:12:34'),
('54f4dff80f77021276f5fb19236b1f1b9e8cd950825ca24694fa17b650e6405efa4da2471239cb44', 8, 3, 'Personal Access Token', '[]', 0, '2022-12-05 09:13:24', '2022-12-05 09:13:24', '2023-12-05 14:13:24'),
('5b155a2c15e5f2777b50687423955d8f3a8a3a277cc99a2de87248f3e5b8f056bbc237ea9d8b6ba4', 5, 3, 'Personal Access Token', '[]', 0, '2022-12-05 09:00:18', '2022-12-05 09:00:18', '2023-12-05 14:00:18'),
('5e773b4153caab0d0cc7227fcba24489de40354a1bf31cb947ccab8feae94b4ede2f0e86aaf5f305', 6, 3, 'Personal Access Token', '[]', 0, '2022-12-05 09:01:40', '2022-12-05 09:01:40', '2023-12-05 14:01:40'),
('5f173e2aa1d359f48a154f241449ae06b17fa611781a54dad768926b48c69bb47619ab0000bfce84', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 10:17:20', '2022-12-02 10:17:20', '2023-12-02 15:17:20'),
('6e15506872db1d9b9249ffc9151301dc26bcfe6aef505567efe8f5fb207b5ac6af81aa4c70b2d3b8', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 09:20:05', '2022-12-02 09:20:05', '2023-12-02 14:20:05'),
('6e5886bc7a8f715bb67e080f83231453a7213e73bdca00b72b558cdf98bc18380060184b8b882b9c', 3, 3, 'Personal Access Token', '[]', 1, '2022-12-05 05:05:57', '2022-12-05 05:05:57', '2023-12-05 10:05:57'),
('6f8ee4d20011084b743c27d1baa14cfeab29ad2ade076e6430ccd8afa7baabc0e4488025309888d8', 4, 3, 'Personal Access Token', '[]', 0, '2022-12-08 07:10:16', '2022-12-08 07:10:16', '2023-12-08 12:10:16'),
('748f095e91c2a73400308cdc56cb0c52defa84f908f98399e0648f7285c1e8654965d17463b5a3c7', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 10:15:24', '2022-12-02 10:15:24', '2023-12-02 15:15:24'),
('7a65b4340e7144ca93e3751f63cf7ee1c297c8109a97feea32142b96a9a6258462bcf44680bf5be1', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 08:49:40', '2022-12-02 08:49:40', '2023-12-02 13:49:40'),
('7c44000d2413b38ff9273c5ac4d319fb3f48925a8d95c409b36d041c728bc9fd76ce730d186d2836', 7, 3, 'Personal Access Token', '[]', 0, '2022-12-05 09:02:02', '2022-12-05 09:02:02', '2023-12-05 14:02:02'),
('8206418457888efbd6415f482f35d724503dbc900ef0606cc53b6d4d48a5f67bbef15999a1a4a8c4', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 09:31:41', '2022-12-02 09:31:41', '2023-12-02 14:31:41'),
('89122b0a08268037c16cd27c5d85ff647c7c0cc8f70b04b5e4cf4cca3027a46b90f48e4d9cf99e05', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 10:15:14', '2022-12-02 10:15:14', '2023-12-02 15:15:14'),
('8a2a6b656045a65d085c7d698bc111ae9646f8d995745b37e8121053a886019611ed36400c4f0436', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 09:23:11', '2022-12-02 09:23:11', '2023-12-02 14:23:11'),
('8e87aa985610cba371b25ea131f173000bd355b846ebd8c01a54968a322799ac57cd17b88a7999a4', 4, 3, 'Personal Access Token', '[]', 0, '2022-12-07 06:01:58', '2022-12-07 06:01:58', '2023-12-07 11:01:58'),
('9c760da034f2508f309266a8a004873dc48a1fd915cfd241d6a921f3c26e6c9be862612eb92bb2ec', 4, 3, 'Personal Access Token', '[]', 0, '2022-12-02 09:44:40', '2022-12-02 09:44:40', '2023-12-02 14:44:40'),
('9fe0c268758eddf6d72a2763244a1fd9e92a822120007e964a384f0cf9a00c8544e6a4bf1de87238', 3, 3, 'Personal Access Token', '[]', 1, '2022-12-05 03:19:39', '2022-12-05 03:19:39', '2023-12-05 08:19:39'),
('a3893405efae44023333216144ae7c9251207ca40fd3306c74d7898d05747b184b16871a643b68c1', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 09:25:24', '2022-12-02 09:25:24', '2023-12-02 14:25:24'),
('a6664b23ff5bd15ebe6b366d5d11cec7e7443255262ef15ef24bfb93736b9c03d1691cab2441de71', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 08:50:24', '2022-12-02 08:50:24', '2023-12-02 13:50:24'),
('a86aff249afda9f47c55b560a34efc3178b9df81cccf26383cc43262004dd302519094a0e317d5a1', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 10:15:45', '2022-12-02 10:15:45', '2023-12-02 15:15:45'),
('a8948c94561df6710e74eb4469d21a3639c4c50a920946f69c6928a6f6a18dc34fad09e072319138', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 09:39:19', '2022-12-02 09:39:19', '2023-12-02 14:39:19'),
('b07743e25dfa4802c3e0ed839224b36629f31e1c9b452710f815749b8397e107e159b1b9f3cb9189', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 09:41:08', '2022-12-02 09:41:08', '2023-12-02 14:41:08'),
('befaea2b76f7a4b0c8035d33c11caafc272a24b4827d4b68c16f975d1918205a385c35470e498b04', 4, 3, 'Personal Access Token', '[]', 0, '2022-12-05 07:30:57', '2022-12-05 07:30:57', '2023-12-05 12:30:57'),
('bf03452ea0708de012f134bcf897f98eb45afe67145b3ed5d9d32bd71109bc55eab60814b9bd3c46', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 09:12:05', '2022-12-02 09:12:05', '2023-12-02 14:12:05'),
('d091c29525375fa7bbd1b5b68b3eab964c74675c6208e6487106e15c01c8ec0e2f62524daccf5b2a', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 09:07:19', '2022-12-02 09:07:19', '2023-12-02 14:07:19'),
('d3d1a6791d5cf0c389d76228e94e5f5610b3effa25524a1d6b1830957dabc9a27cf7b3c8c9a35870', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 10:14:30', '2022-12-02 10:14:30', '2023-12-02 15:14:30'),
('d9d05f8111791eed8e52933214cf7da37d2f203c48e010e0d521f4e82dfabcb4d38a375edc0218fe', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-05 05:06:34', '2022-12-05 05:06:34', '2023-12-05 10:06:34'),
('da847e4f94b27804ead1210ca05a0ab40838efaff64c0c21d796531b2ccabb1843526f876851b658', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 10:14:16', '2022-12-02 10:14:16', '2023-12-02 15:14:16'),
('ef902fad01a20a1a5fadfd8e16ab3c85266329fad36af9e82e689d9dd28d826bd59ea40c5f0c70fe', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 10:15:50', '2022-12-02 10:15:50', '2023-12-02 15:15:50'),
('f06e378a374c6812e246e91fa84ad5fe59297cb6cac4a8c0d0c28121173cbdabcbd870601b8240e0', 3, 3, 'Personal Access Token', '[]', 0, '2022-12-02 09:07:46', '2022-12-02 09:07:46', '2023-12-02 14:07:46');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'ks39MitDOkSsgaux8Wz6Ii2a4hPHSj6qrvaffOMf', NULL, 'http://localhost', 1, 0, 0, '2022-12-02 07:17:31', '2022-12-02 07:17:31'),
(2, NULL, 'Laravel Password Grant Client', 'V5AdNi1TZU779fme8zmjoUBekVYyIN7j4i8s6kBV', 'users', 'http://localhost', 0, 1, 0, '2022-12-02 07:17:31', '2022-12-02 07:17:31'),
(3, NULL, 'Laravel Personal Access Client', 'dEfdVJOT1qs6LGMw4xPcCCfYoPHYz93Koe4fEYkN', NULL, 'http://localhost', 1, 0, 0, '2022-12-02 08:44:58', '2022-12-02 08:44:58'),
(4, NULL, 'Laravel Password Grant Client', 'HmpoWXvTWq0WMtPwQWc70FM9VCKHhAu5rP23Xrca', 'users', 'http://localhost', 0, 1, 0, '2022-12-02 08:44:59', '2022-12-02 08:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-12-02 07:17:31', '2022-12-02 07:17:31'),
(2, 3, '2022-12-02 08:44:58', '2022-12-02 08:44:58');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard-list', 'web', NULL, NULL),
(2, 'user-list', 'web', NULL, NULL),
(3, 'user-create', 'web', NULL, NULL),
(4, 'user-edit', 'web', NULL, NULL),
(5, 'user-delete', 'web', NULL, NULL),
(6, 'role-list', 'web', NULL, NULL),
(7, 'role-create', 'web', NULL, NULL),
(8, 'role-edit', 'web', NULL, NULL),
(9, 'role-delete', 'web', NULL, NULL),
(10, 'permission-list', 'web', NULL, NULL),
(11, 'permission-create', 'web', NULL, NULL),
(12, 'permission-edit', 'web', NULL, NULL),
(13, 'permission-delete', 'web', NULL, NULL),
(14, 'content-list', 'web', NULL, NULL),
(15, 'content-create', 'web', NULL, NULL),
(16, 'content-edit', 'web', NULL, NULL),
(17, 'content-delete', 'web', NULL, NULL),
(20, 'setting-list', 'web', '2022-12-06 02:55:21', '2022-12-06 02:55:21'),
(21, 'log-list', 'web', '2022-12-06 02:55:26', '2022-12-06 02:55:26'),
(25, 'brokerage-list', 'web', '2023-05-28 09:51:26', '2024-01-09 09:13:34'),
(26, 'brokerage-create', 'web', '2023-05-28 09:51:46', '2024-01-09 09:13:40'),
(27, 'brokerage-edit', 'web', '2023-05-28 09:51:54', '2024-01-09 09:13:45'),
(28, 'brokerage-delete', 'web', '2023-05-28 09:52:02', '2024-01-09 09:13:49'),
(29, 'license-list', 'web', '2024-01-11 13:02:36', '2024-01-11 13:02:36'),
(30, 'license-create', 'web', '2024-01-11 13:02:51', '2024-01-11 13:03:18'),
(31, 'license-edit', 'web', '2024-01-11 13:03:04', '2024-01-11 13:03:04'),
(32, 'license-delete', 'web', '2024-01-11 13:03:28', '2024-01-11 13:03:28'),
(33, 'student-list', 'web', '2024-01-15 11:56:11', '2024-01-15 11:56:11'),
(34, 'student-create', 'web', '2024-01-15 11:56:22', '2024-01-15 11:56:22'),
(35, 'student-edit', 'web', '2024-01-15 11:56:31', '2024-01-15 11:56:31'),
(36, 'student-delete', 'web', '2024-01-15 11:56:46', '2024-01-15 11:56:46'),
(37, 'promo-code-list', 'web', '2024-01-15 13:28:22', '2024-01-15 13:28:22'),
(38, 'promo-code-create', 'web', '2024-01-15 13:28:32', '2024-01-15 13:28:32'),
(39, 'promo-code-edit', 'web', '2024-01-15 13:28:43', '2024-01-15 13:28:43'),
(40, 'promo-code-delete', 'web', '2024-01-15 13:28:58', '2024-01-15 13:28:58'),
(41, 'partner-list', 'web', '2024-01-16 12:53:55', '2024-01-16 12:53:55'),
(42, 'partner-create', 'web', '2024-01-16 12:54:13', '2024-01-16 12:54:13'),
(43, 'partner-edit', 'web', '2024-01-16 12:54:30', '2024-01-16 12:54:30'),
(44, 'partner-delete', 'web', '2024-01-16 12:54:47', '2024-01-16 12:54:47'),
(45, 'course-category-list', 'web', '2024-01-17 12:10:02', '2024-01-17 12:10:02'),
(46, 'course-category-create', 'web', '2024-01-17 12:10:14', '2024-01-17 12:10:14'),
(47, 'course-category-edit', 'web', '2024-01-17 12:10:28', '2024-01-17 12:10:28'),
(48, 'course-category-delete', 'web', '2024-01-17 12:10:44', '2024-01-17 12:10:44'),
(49, 'course-list', 'web', '2024-01-17 13:13:14', '2024-01-17 13:13:14'),
(50, 'course-create', 'web', '2024-01-17 13:13:31', '2024-01-17 13:13:31'),
(51, 'course-edit', 'web', '2024-01-17 13:13:41', '2024-01-17 13:13:41'),
(52, 'course-delete', 'web', '2024-01-17 13:13:52', '2024-01-17 13:13:52'),
(53, 'module-list', 'web', '2024-01-27 14:16:36', '2024-01-27 14:16:36'),
(54, 'module-create', 'web', '2024-01-27 14:16:44', '2024-01-27 14:16:44'),
(55, 'module-edit', 'web', '2024-01-27 14:16:51', '2024-01-27 14:16:51'),
(56, 'module-delete', 'web', '2024-01-27 14:16:58', '2024-01-27 14:16:58'),
(57, 'mini-module-list', 'web', '2024-01-27 15:59:44', '2024-01-27 16:05:31'),
(58, 'mini-module-create', 'web', '2024-01-27 15:59:55', '2024-01-27 17:11:06'),
(59, 'mini-module-edit', 'web', '2024-01-27 16:00:02', '2024-01-27 17:11:13'),
(60, 'mini-module-delete', 'web', '2024-01-27 16:00:52', '2024-01-27 17:11:20'),
(61, 'interaction-list', 'web', '2024-01-29 12:20:11', '2024-01-29 12:20:11'),
(62, 'interaction-create', 'web', '2024-01-29 12:20:20', '2024-01-29 12:20:20'),
(63, 'interaction-edit', 'web', '2024-01-29 12:20:29', '2024-01-29 12:20:29'),
(64, 'interaction-delete', 'web', '2024-01-29 12:20:38', '2024-01-29 12:20:38'),
(65, 'celebration-list', 'web', '2024-02-03 06:51:47', '2024-02-03 06:51:47'),
(66, 'celebration-create', 'web', '2024-02-03 06:51:54', '2024-02-03 06:51:54'),
(67, 'celebration-edit', 'web', '2024-02-03 06:52:06', '2024-02-03 06:52:06'),
(68, 'celebration-delete', 'web', '2024-02-03 06:52:15', '2024-02-03 06:52:15'),
(69, 'exam-list', 'web', '2024-02-03 12:01:31', '2024-02-03 12:01:31'),
(70, 'exam-create', 'web', '2024-02-03 12:01:37', '2024-02-03 12:01:37'),
(71, 'exam-edit', 'web', '2024-02-03 12:01:43', '2024-02-03 12:01:43'),
(72, 'exam-delete', 'web', '2024-02-03 12:01:49', '2024-02-03 12:01:49');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 3, 'Personal Access Token', 'feca324bac811f2ec96d3f5282f133cf1696c4d9823b3782344d0f0f130b3438', '[\"*\"]', NULL, '2022-12-02 08:35:54', '2022-12-02 08:35:54'),
(2, 'App\\Models\\User', 3, 'Personal Access Token', 'f86f5b58173fdf21d5db694ae4d3f1a31415bd261e52fd5c634165cb768276f6', '[\"*\"]', NULL, '2022-12-02 08:36:34', '2022-12-02 08:36:34'),
(3, 'App\\Models\\User', 3, 'Personal Access Token', 'c8e9e6de87fe6bbb40ad02540dcab81a671f591e9ce3191c812c5bb5086d2b50', '[\"*\"]', NULL, '2022-12-02 08:45:21', '2022-12-02 08:45:21');

-- --------------------------------------------------------

--
-- Table structure for table `promo_codes`
--

CREATE TABLE `promo_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `code` varchar(191) DEFAULT NULL,
  `discount_type` varchar(255) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promo_codes`
--

INSERT INTO `promo_codes` (`id`, `user_id`, `name`, `code`, `discount_type`, `discount`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'sdsd', 'cos10', 'per', '10', '0', '2024-01-15 14:17:13', '2024-01-15 14:21:21'),
(3, 18, 'qqq', 'dldm', 'mdfm', '10', '0', '2024-01-16 12:32:55', '2024-01-16 12:32:55'),
(4, 2, 'test', 'test', 'flat', '10', '0', '2024-01-16 14:24:46', '2024-01-16 14:24:46');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', '2022-12-02 07:17:22', '2022-12-02 07:17:22'),
(2, 'admin', 'web', '2022-12-02 07:17:22', '2022-12-02 07:17:22'),
(3, 'user', 'web', '2022-12-02 07:17:23', '2022-12-02 07:17:23'),
(7, 'brokerage', 'web', '2024-01-09 09:24:28', '2024-01-09 09:24:28'),
(8, 'student', 'web', '2024-01-15 11:57:04', '2024-01-15 11:57:04'),
(9, 'partner', 'web', '2024-01-16 12:56:17', '2024-01-16 12:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(1, 7),
(1, 8),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 2),
(12, 2),
(13, 2),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(20, 2),
(21, 2),
(25, 2),
(25, 7),
(26, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2),
(36, 2),
(37, 2),
(38, 2),
(39, 2),
(40, 2),
(41, 2),
(41, 9),
(42, 2),
(43, 2),
(44, 2),
(45, 2),
(46, 2),
(47, 2),
(48, 2),
(49, 2),
(50, 2),
(51, 2),
(52, 2),
(53, 2),
(54, 2),
(55, 2),
(56, 2),
(57, 2),
(58, 2),
(59, 2),
(60, 2),
(61, 2),
(62, 2),
(63, 2),
(64, 2),
(65, 2),
(66, 2),
(67, 2),
(68, 2),
(69, 2),
(70, 2),
(71, 2),
(72, 2);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `license_id` bigint(20) DEFAULT NULL,
  `plan_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `otp` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `contact` varchar(191) DEFAULT NULL,
  `state` varchar(191) DEFAULT NULL,
  `device_type` varchar(255) DEFAULT NULL,
  `device_token` text DEFAULT NULL,
  `verified_by` varchar(255) DEFAULT NULL,
  `social_provider` text DEFAULT NULL,
  `social_token` text DEFAULT NULL,
  `social_id` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT 0,
  `partner` varchar(191) DEFAULT NULL,
  `referral_code` varchar(191) DEFAULT NULL,
  `referral_url` varchar(191) DEFAULT NULL,
  `referring_url` text DEFAULT NULL,
  `dash_pass` varchar(191) DEFAULT NULL,
  `utm_source` varchar(255) DEFAULT NULL,
  `utm_keyword` varchar(255) DEFAULT NULL,
  `utm_campaign` varchar(255) DEFAULT NULL,
  `utm_medium` varchar(255) DEFAULT NULL,
  `app_user` varchar(191) DEFAULT NULL,
  `app_version` varchar(191) DEFAULT NULL,
  `device_count` varchar(191) DEFAULT NULL,
  `face_verification` text DEFAULT NULL,
  `device` text DEFAULT NULL,
  `is_deactivate` tinyint(1) DEFAULT 0,
  `last_login` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `parent_id`, `license_id`, `plan_id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `otp`, `image`, `phone`, `date`, `contact`, `state`, `device_type`, `device_token`, `verified_by`, `social_provider`, `social_token`, `social_id`, `status`, `partner`, `referral_code`, `referral_url`, `referring_url`, `dash_pass`, `utm_source`, `utm_keyword`, `utm_campaign`, `utm_medium`, `app_user`, `app_version`, `device_count`, `face_verification`, `device`, `is_deactivate`, `last_login`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, NULL, NULL, 'Super Admin', 'superadmin@master.com', NULL, '$2y$10$EwL7zVIzzcWMrk8l3SqaG.SRVsd.IP/ZVZTn.NK4SDQPiIEOtmy82', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2022-12-02 07:17:23', '2022-12-02 07:17:23', NULL),
(2, NULL, NULL, NULL, 'Admin', 'admin@master.com', NULL, '$2y$10$QJwHIrH27tyRxQyIWVOQcOo1xOcHlGRs48yw1.luZXFkVpsn.lbh6', NULL, NULL, 'uploads/user/1671548885.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 'E4CykF7p', 'http://localhost/DashCE/public/register?referral_code=E4CykF7p', NULL, '50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-02-06 07:33:06', '2022-12-02 07:17:23', '2024-02-06 02:33:06', NULL),
(4, NULL, NULL, NULL, 'User', 'user@yopmail.com', '2022-12-02 09:44:40', '$2y$10$SngOd0VeQ2AhLiZAr1xNgerXAGqNtotb0yvB.xfFgVqyIiwsU4FYy', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'AAAA6MO9f5M:APA91bGN03Iek7WDgcZQf_nCxxbn7DEAGmoiutYPuIaAb5EX72s8h9nH9uAt416XTJDb2v-Ac91jC1w0EayCX57U0qSTL0Nv5jmq1IdmEGWRpppS0tn4-QoCDsAbWylm5-zcmGZ7jzCL', 'email', NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2022-12-02 09:43:00', '2022-12-15 03:49:19', NULL),
(7, NULL, NULL, NULL, 'Google Sign In 2', 'google@yopmail.com', '2022-12-05 09:02:01', '$2y$10$nNiNf/E9cRq6YdJySr641.n7LJ//sggtOLOgw84Fszhw/Z6o60DcS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'google', 'google', 'JyeT6bC5b89VbfE9ynUaYiCdDij8', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2022-12-05 09:02:01', '2022-12-05 09:02:01', NULL),
(8, NULL, NULL, NULL, 'Facebook 3', 'facebook@yopmail.com', '2022-12-05 09:13:24', '$2y$10$.Zx2GIFbHmOsXV.gSOam5.5aKx2GSprADBExDGpjFJJW/R6bdAk5C', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'facebook', 'facebook', 'JyeT6bC5b6PV8fExynUaYiCdDij7', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2022-12-05 09:13:24', '2022-12-05 09:13:24', NULL),
(9, NULL, NULL, NULL, 'Apple Sign In', 'apple@yopmail.com', '2022-12-05 09:19:13', '$2y$10$whnszbOe13E0r6Sc35OwEuqRXhRadrL.RxbT7hHmAaDngVhmzRJA2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Apple', 'Apple', 'JyeT6bC5b81VbfExynUaYiCdDij5', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2022-12-05 09:19:13', '2022-12-05 09:19:13', NULL),
(17, NULL, NULL, NULL, 'User0', 'anas.ahmed393@gmail.com', NULL, '$2y$10$PD/Sp2X5F9jv6kj6BQaqqOku/XeB1QHr9mOPp4KjUkAqCM/C.kD9y', NULL, '3635', 'public/uploads/user/', '02314567890', NULL, NULL, NULL, NULL, NULL, 'email', NULL, NULL, NULL, 0, NULL, NULL, 'sdsd', 'sdsd00', NULL, 'dsd', 'sdsd', 'sdsd', 'sdsd', NULL, NULL, NULL, NULL, NULL, 0, NULL, '2023-07-31 04:14:06', '2024-01-12 17:03:07', NULL),
(18, NULL, NULL, NULL, 'test', 'brokerage@master.com', NULL, '$2y$10$Pt7XsEjKUjdVRudeImAzguQvpIit2g2qNq1n6RbZeqp.MLW6m9G.m', NULL, NULL, NULL, '012345678', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2024-01-10 11:39:52', '2024-01-10 11:39:52', NULL),
(22, NULL, NULL, NULL, 'test', 'test@test.com', NULL, '$2y$10$mxzFv38YIG/OIYbkV31DWejJlh0ixO4UlDZ4NNCkZ8NJ6kUn509zm', NULL, NULL, NULL, '0123449656', '2024-01-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-01-13 15:41:12', '2024-01-13 10:40:03', '2024-01-13 10:41:12', NULL),
(23, NULL, NULL, NULL, 'test', 'ss@sdsds.com', '2024-01-13 16:48:55', '$2y$10$ad0uxhc7AIGTBrkwCygQF.5aOg.peUDcoxbFajxpSMK10UGi3xPV2', NULL, NULL, NULL, '5445465464', '2024-01-13', NULL, NULL, NULL, NULL, 'email', NULL, NULL, NULL, 0, NULL, 'Mqa2utkn', 'http://localhost/DashCE/public/register?referral_code=Mqa2utkn', 'http://localhost/DashCE/public/register?referral_code=E4CykF7p', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2024-01-13 16:48:55', '2024-01-13 16:48:55', NULL),
(25, 2, 4, NULL, 'student', 'student@student.com', '2024-01-15 12:28:48', '$2y$10$07dw4UHPSf.XwcXF5Qtu1.Kl1X.spHEsUpcojJ5XHqTIia..gnMHW', NULL, NULL, NULL, '65461944964', '2024-01-15', NULL, NULL, NULL, NULL, 'email', NULL, NULL, NULL, 0, NULL, 'AOwKUECb', 'http://localhost/DashCE/public/register?referral_code=AOwKUECb', 'http://localhost/DashCE/public/register?referral_code=E4CykF7p', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2024-01-15 12:28:48', '2024-01-15 12:42:51', NULL),
(26, 18, 4, NULL, 'dsds', 'dsd@Student.co', '2024-01-15 13:04:46', '$2y$10$uxe5wCp39Wxpjvpb0BUG1ub09doMNEcTVacFXs.SEMvlwlfibnm2G', NULL, NULL, NULL, '5485448548', '2024-01-15', NULL, NULL, NULL, NULL, 'email', NULL, NULL, NULL, 0, NULL, 'fiRLPDd8', 'http://localhost/DashCE/public/register?referral_code=fiRLPDd8', 'http://localhost/DashCE/public/register?referral_code=E4CykF7p', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2024-01-15 13:04:46', '2024-01-15 13:04:46', NULL),
(27, 2, 4, NULL, 'ndsjdn', 'jcc@ds.co', '2024-01-16 14:13:33', '$2y$10$8vaglFgDVtFS5VT2nkwIzu9/apa.c24A/jqvtWa/vaYRdSocSM9fG', NULL, NULL, NULL, '2215', '2024-01-16', NULL, NULL, NULL, NULL, 'email', NULL, NULL, NULL, 1, NULL, '7tA7ViDZ', 'http://localhost/DashCE/public/register?referral_code=7tA7ViDZ', 'http://localhost/DashCE/public/register?referral_code=E4CykF7p', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2024-01-16 14:13:33', '2024-01-16 14:13:33', NULL),
(30, NULL, NULL, NULL, 'admin', 'muhammadahmedraza622@gmail.com', '2024-01-19 16:53:26', '$2y$10$4YsyKSXKk9b1Sv6gPvmYAe87BeoTO18QsXZ47Q9McVafGAyCi.uoW', NULL, NULL, NULL, '03082034786', '2024-01-19', NULL, NULL, NULL, NULL, 'email', NULL, NULL, NULL, 0, NULL, 'X9lTNKNr', 'http://localhost/DashCE/public/admin/register?referral_code=X9lTNKNr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2024-01-19 16:53:05', '2024-01-19 16:53:26', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `celebrations`
--
ALTER TABLE `celebrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_categories`
--
ALTER TABLE `course_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `interactions`
--
ALTER TABLE `interactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `licenses`
--
ALTER TABLE `licenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mini_modules`
--
ALTER TABLE `mini_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `promo_codes`
--
ALTER TABLE `promo_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- AUTO_INCREMENT for table `celebrations`
--
ALTER TABLE `celebrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_categories`
--
ALTER TABLE `course_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interactions`
--
ALTER TABLE `interactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `licenses`
--
ALTER TABLE `licenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `mini_modules`
--
ALTER TABLE `mini_modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `promo_codes`
--
ALTER TABLE `promo_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
