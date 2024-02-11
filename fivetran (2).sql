-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 11, 2024 at 03:30 PM
-- Server version: 8.0.31
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fivetran`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

DROP TABLE IF EXISTS `abouts`;
CREATE TABLE IF NOT EXISTS `abouts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'About Us', '<p>Fivetran automates data movement out of, into and across cloud data platforms. We automate the most time-consuming parts of the ELT process from extracts to schema drift handling to transformations, so data engineers can focus on higher-impact projects with total pipeline peace of mind. With 99.9% uptime and self-healing pipelines, Fivetran enables hundreds of leading brands across the globe, including Autodesk, Condé Nast, JetBlue, Lufthansa, Morgan Stanley and Pitney Bowes, to accelerate data-driven decisions and drive business growth. Fivetran is headquartered in Oakland, California, with offices around the world.</p>', '2023-12-13 14:31:38', '2023-12-29 10:12:48');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `avatar`, `status`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '01919852044', '1699604907-801a23064c9330a460b469c8183d53d7.png', '1', '$2y$10$bbHx07SkkoMZuocwEbXzV.TaRpkZL8qDgdM3c/OVXGIhf.RsoGVky', NULL, NULL, '2023-12-13 13:39:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assign_products`
--

DROP TABLE IF EXISTS `assign_products`;
CREATE TABLE IF NOT EXISTS `assign_products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `product_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, '1699933767-f57f3f45fbe0356aa9e1d833cbedbded.png', '2023-12-13 14:32:27', NULL),
(2, '1699933771-2af2a500f50c13b9909c527feb4ed8f4.png', '2023-12-13 14:33:43', NULL),
(3, '1699933775-98f896413475d93e76d36d51a517046a.jpg', '2023-12-13 14:32:27', NULL),
(4, '1699933778-057d60c264b907c4db5e1c1ceae60020.png', '2023-12-13 14:33:43', NULL),
(5, '1699933794-3f4cc524a56b9117a1e520dee6184e32.png', '2023-12-13 14:32:27', NULL),
(6, '1699933798-e5abf4e6fe5d2ff679b08e32d464e8cc.png', '2023-12-13 14:33:43', NULL),
(7, '1699933802-d8c3d6baffe40554cfc85f11aa6049a2.png', '2023-12-13 14:32:27', NULL),
(8, '1699933820-bd83580de5f72285c23757dcfd00571f.png', '2023-12-13 14:33:43', NULL),
(9, '1699933824-69262df200a7758b010ade051fad06c7.png', '2023-12-13 14:32:27', NULL),
(10, '1699933827-3e9eef0303fc61cce81e8b205ab9f7cc.png', '2023-12-13 14:33:43', NULL),
(11, '1699933831-2521f5e17419bad837480d3a9c0d9b98.png', '2023-12-13 14:32:27', NULL),
(12, '1699933835-0e94ab9217fb31f23923c839c1046e0b.png', '2023-12-13 14:33:43', NULL),
(13, '1699933848-633ea6af8a0164212da4040f05403470.png', '2023-12-13 14:32:27', NULL),
(14, '1699933851-027601388bcaa8f2f1a0352b4f5a5d88.png', '2023-12-13 14:48:01', NULL),
(15, '1699933854-9342a57d0c9f38b0624ce3d617662aae.png', '2023-12-12 18:00:00', NULL),
(16, '1699933857-73a11e5146f8803ae52c133cc1512b59.png', '2023-12-12 18:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

DROP TABLE IF EXISTS `certificates`;
CREATE TABLE IF NOT EXISTS `certificates` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `file` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `file`, `created_at`, `updated_at`) VALUES
(1, '1699958810-f585d274db70b84c17698d2ddb9389a8.jpg', '2023-12-13 14:48:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

DROP TABLE IF EXISTS `contracts`;
CREATE TABLE IF NOT EXISTS `contracts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `file` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `file`, `created_at`, `updated_at`) VALUES
(1, '1699958020-4a3f090ba5fb6863cb759362e016c887.jpg', '2023-12-13 14:49:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

DROP TABLE IF EXISTS `deposits`;
CREATE TABLE IF NOT EXISTS `deposits` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `provider_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) NOT NULL DEFAULT '0.00',
  `currency` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'usd',
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `deposit_date` date DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `deposits_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `user_id`, `provider_id`, `type`, `amount`, `currency`, `status`, `deposit_date`, `note`, `address`, `created_at`, `updated_at`) VALUES
(7, 2, 0, 'profit', 5.00, 'usd', '1', '2023-12-13', 'Admin Added Profit', NULL, '2023-12-13 09:58:58', '2023-12-13 09:58:58'),
(8, 2, 0, 'profit', 25.00, 'usd', '1', '2023-12-13', 'Admin Added Profit', NULL, '2023-12-13 09:59:09', '2023-12-13 09:59:09'),
(9, 2, 1, 'deposit', 100.00, 'usd', '1', '2023-12-13', 'Deposit Done', '1702483191-2e01cfb1e510f0c63763b33f9776981c.jpg', '2023-12-13 09:59:51', '2023-12-13 10:00:01'),
(10, 2, 1, 'deposit', 2000.00, 'usd', '1', '2023-12-13', 'Another Deposit', '1702483255-447b6041c89e3b7c6c38de0b300e0bbb.jpg', '2023-12-13 10:00:55', '2023-12-13 10:01:09'),
(11, 2, 0, 'profit', 9.43, 'usd', '1', '2023-12-13', 'Product Added Profit 0.5%', NULL, '2023-12-13 10:01:21', '2023-12-13 10:01:21'),
(12, 2, 0, 'profit', 11.00, 'usd', '1', '2023-12-13', 'Product Added Profit 0.5%', NULL, '2023-12-13 10:01:50', '2023-12-13 10:01:50'),
(13, 3, 0, 'deposit', 20.00, 'usd', '1', '2023-12-22', 'Created new account so you got $20 gift', NULL, '2023-12-22 05:45:31', '2023-12-22 05:45:31'),
(14, 4, 0, 'deposit', 20.00, 'usd', '1', '2023-12-23', 'Created new account so you got $20 gift', NULL, '2023-12-23 05:47:36', '2023-12-23 05:47:36'),
(15, 2, 1, 'deposit', 25.00, 'usd', '1', '2023-12-30', 'This deposit by admin', NULL, '2023-12-31 00:03:29', '2023-12-31 00:03:29'),
(16, 2, 1, 'deposit', 100.00, 'usd', '1', '2023-12-30', 'This deposit by admin', NULL, '2023-12-31 00:04:18', '2023-12-31 00:04:18'),
(17, 2, 1, 'deposit', 200.00, 'usd', '1', '2023-12-31', 'Testing Deposit', '1704028170-f9bcbb2db891e9b7fd7ac11a9283c858.png', '2023-12-31 21:09:30', '2023-12-31 21:10:05'),
(18, 2, 1, 'deposit', 5000.00, 'usd', '1', '2024-01-03', 'This deposit by admin', NULL, '2024-01-03 19:51:03', '2024-01-03 19:51:03'),
(19, 2, 1, 'deposit', 50000.00, 'usd', '1', '2024-01-03', 'This deposit by admin', NULL, '2024-01-03 19:51:28', '2024-01-03 19:51:28'),
(20, 2, 0, 'profit', 476.83, 'usd', '1', '2024-01-03', 'Product Added Profit 0.5%', NULL, '2024-01-03 19:57:18', '2024-01-03 19:57:18'),
(22, 6, 0, 'deposit', 20.00, 'usd', '1', '2024-01-03', 'Created new account so you got $20 gift', NULL, '2024-01-04 07:02:07', '2024-01-04 07:02:07'),
(23, 2, 0, 'profit', 25.00, 'usd', '1', '2024-01-07', 'Admin Added Profit', NULL, '2024-01-06 19:02:49', '2024-01-06 19:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `file` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `file`, `created_at`, `updated_at`) VALUES
(1, '1699957901-9e545e21943f6c8281e1e2b175170a18.jpg', '2023-12-13 14:49:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'FAQ', '<h4>I. Start Analysing Data</h4><p>1.1 Minimum account balance of 50 USDT for the first set of data.</p><p>1.2 A minimum renewal of 50 USDT is required to start analysing data.</p><p>1.3 Once all the data has been completed, the member must request a full withdrawal and receive the withdrawal amount before requesting a reset of the account.</p><h4>II. Withdrawal</h4><p>2.1 Full withdrawal amount can be requested after completing the data.</p><p>2.2 Members must complete all the data before requesting a withdrawal.</p><p>2.3 Members cannot request a withdrawal or refund if they choose to give up or withdraw in the middle of analysing data.</p><p>2.4 No withdrawals can be processed if the member\'s withdrawal request has not been received.</p><h4>III. Funds</h4><p>3.1 All funds will be held securely in the member\'s account and can be requested in full once all data has been completed.</p><p>3.2 To avoid any loss of funds, all data will be processed by the system.</p><p>3.3 The platform will take full responsibility for any accidental loss of funds.</p><h4>IV. Account Security</h4><p>4.1 Please do not share/disclose your login password and withdrawal password to others, as the platform will not be held responsible for any loss.</p><p>4.2 Members are not recommended to set their birthday password, ID card number, or mobile phone number as their withdrawal password or login password.</p><p>4.3 If you forget your login password or withdrawal password, please contact Customer Service to reset it.</p><h4>V. General Product Data</h4><p>5.1 Platform earnings are divided into normal earnings and triple earnings.</p><p>5.2 Funds and earnings will be refunded to the member\'s account for each completed data.</p><p>5.3 The system will randomly distribute all the data to the member\'s account based on the total amount in the member\'s account.</p><p>5.4 Once data has been distributed to the member\'s account, it cannot be cancelled or edited.</p><h4>VI. Combined Data</h4><p>6.1 Combined Data is composed of 1 ta 3 product data, the member may not necessarily get 3 combined items, the system will randomly allocate the combined items in the combined data, so the member has a higher chance of getting 1 or products.</p><p>6.2 Members will receive TRIPLE commission for each product in the combined data compared to when it\'s normal data.</p><p>6.3 Once you have received the combined data, all funds will be returned to your account after you have completed each product data in the combined data.</p><p>6.4 Once the combined data has been allocated to the member\'s account, it cannot be cancelled or edited.</p><h4>VII. Deposit</h4><p>7.1 The amount of the deposit is the member\'s decision, we cannot decide the amount of the deposit for the member, we suggest that the member make the deposit according to their ability or after they are familiar with the platform.</p><p>7.2 If members need to make a deposit when receiving combined data, it is recommended that they are able to make a deposit based on the insufficient amount shown in the account.</p><p>7.3 The members must request and confirm the deposit details every time from Customer Service prior to making a deposit.</p><p>7.4 The platform will not be responsible for any deposits made by members to the wrong deposit details.</p><h4>VIII. Vendor\'s Cooperation</h4><p>8.1 There are different product data on and off the platform at each time, if the data is not optimized for a long period, the vendor will not be able to offload the product, which will affect the vendor\'s progress, it is recommended that the member completes all data and applies for a withdrawal as soon as possible to avoid affecting the vendor\'s progress.</p><p>8.2 The vendors will provide deposit details for members to make a deposit. 8.3 Any delay in completing the data will be detrimental to the vendor and the process.</p><h4>XI. Invitation</h4><p>9.1 Members will be able to invite other members using the invitation code on their account.</p><p>9.2 If the account has not yet completed all the data, it is not possible to invite other members. 9.3 The referrer will receive 25% of the referee\'s total earnings for the day.</p>', '2023-12-13 14:50:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_09_020030_create_admins_table', 1),
(6, '2023_11_10_011620_create_products_table', 1),
(7, '2023_11_14_012741_create_faqs_table', 1),
(8, '2023_11_14_031727_create_brands_table', 1),
(9, '2023_11_14_035854_create_abouts_table', 1),
(10, '2023_11_14_070130_create_deposits_table', 1),
(11, '2023_11_14_094134_create_events_table', 1),
(12, '2023_11_14_100916_create_contracts_table', 1),
(13, '2023_11_14_103739_create_certificates_table', 1),
(14, '2023_11_20_185829_create_orders_table', 1),
(15, '2023_12_26_045746_create_settings_table', 2),
(16, '2024_01_07_014331_create_assign_products_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `product_id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `status`, `created_at`, `updated_at`) VALUES
(5, 2, 13, '1', '2023-12-13 10:01:19', '2023-12-13 10:01:21'),
(6, 2, 21, '1', '2023-12-13 10:01:48', '2023-12-13 10:01:50'),
(7, 2, 3, '1', '2024-01-03 19:51:35', '2024-01-03 19:57:17');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('pritom@gmail.com', 'UTJ9w1TntD4qh8kY2tJF24WfLOnvU8l0ifbdt3Dz85k7VHfIUeAYOGfhJQMgGikP', '2023-12-23 22:21:48'),
('sourovpal35@gmail.com', 'GnygVXsW5536eEBSvgCUvIu21RisePicDGaGT5RslI1UOo4O4ubfS572k8N1pIL9', '2024-01-06 22:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `price_to` double(8,2) NOT NULL DEFAULT '0.00',
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `position` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_title_unique` (`title`),
  UNIQUE KEY `products_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `price`, `price_to`, `image`, `status`, `position`, `created_at`, `updated_at`) VALUES
(1, 'CELINE Medium C In Quilted Calfskin Black/White Shoulder Bag', 'celine-medium-c-in-quilted-calfskin-blackwhite-shoulder-bag', 400.00, 700.00, '1700580975-f907aca516ad0270c59af13bad56acaa.jpg', '1', 0, '2023-12-13 14:24:51', NULL),
(2, 'Asus Zenfone 9 5G 256GB 16GB RAM Factory Unlocked (GSM Only | No CDMA - not Compatible with Verizon/Sprint) - Black', 'asus-zenfone-9-5g-256gb-16gb-ram-factory-unlocked-gsm-only-no-cdma-not-compatible-with-verizonsprint-black', 100.00, 500.00, '1700580834-b9c340d5437a7d10bec77262395a9f10.jpg', '1', 0, '2023-12-13 14:25:55', NULL),
(3, 'SAMSUNG 13.3\" Galaxy Chromebook Laptop Computer w/ 256GB Storage, 8GB RAM, 4K AMOLED Touchscreen Display, HD Intel Core I-5 Processor, Ultra Slim, US Warranty, Fiesta Red', 'samsung-133-galaxy-chromebook-laptop-computer-w-256gb-storage-8gb-ram-4k-amoled-touchscreen-display-hd-intel-core-i-5-processor-ultra-slim-us-warranty-fiesta-red', 45367.00, 50000.00, '1700580780-a866a64b34c2207bb66f24d169d56e2c.jpg', '1', 3, '2023-12-13 14:27:10', NULL),
(4, 'Camping Cots For Adults Single Folding Bed With Mattress Leisure Recliner Metal Frame Adjustable Design Guest Bed Outer Cover Detachable For Office Nap Or Home', 'camping-cots-for-adults-single-folding-bed-with-mattress-leisure-recliner-metal-frame-adjustable-design-guest-bed-outer-cover-detachable-for-office-nap-or-home', 800.00, 1000.00, '1700579685-26c5bc635f8db365f7b98934d5f39400.jpg', '1', 0, '2023-12-13 14:29:38', NULL),
(5, 'HNXNR Fashion Copper LED Wall Lamp Living Room Bedroom Bed Energy Saving Lamp Postmodern Light Luxury Wall Simple Creative Glass Crystal Wall Lamp Black Brass Color Fashion Luxury', 'hnxnr-fashion-copper-led-wall-lamp-living-room-bedroom-bed-energy-saving-lamp-postmodern-light-luxury-wall-simple-creative-glass-crystal-wall-lamp-black-brass-color-fashion-luxury', 500.00, 800.00, '1700579731-374ca6e07ecd4ed086df78856434720d.jpg', '1', 0, NULL, NULL),
(6, 'OMEN 25L Gaming Desktop PC, NVIDIA GeForce RTX 2060, 10th Generation Intel Core i7-10700F Processor, HyperX 16 GB RAM, 512 GB SSD and 1 TB Hard Drive, Windows 10 Home (GT12-0060, 2020)', 'omen-25l-gaming-desktop-pc-nvidia-geforce-rtx-2060-10th-generation-intel-core-i7-10700f-processor-hyperx-16-gb-ram-512-gb-ssd-and-1-tb-hard-drive-windows-10-home-gt12-0060-2020', 1500.00, 2000.00, '1700579766-3550b5cd1bc07ed9a0fd61160b2be332.jpg', '1', 0, '2023-12-13 15:09:00', NULL),
(7, 'OnePlus 10 Pro 5G Dual-SIM 256GB ROM + 12GB RAM (GSM Only | No CDMA) Factory Unlocked 5G Smartphone (Emerald Forest) - International Version', 'oneplus-10-pro-5g-dual-sim-256gb-rom-12gb-ram-gsm-only-no-cdma-factory-unlocked-5g-smartphone-emerald-forest-international-version', 700.00, 900.00, '1700579799-840cc0318f8c1e90166aee663709829a.jpg', '1', 0, '2023-12-13 15:12:04', NULL),
(8, 'Asus ROG Phone 5S ZS676KS 5G Dual 256GB 16GB RAM Factory Unlocked (GSM Only | No CDMA - not Compatible with Verizon/Sprint) Tencent Version – White', 'asus-rog-phone-5s-zs676ks-5g-dual-256gb-16gb-ram-factory-unlocked-gsm-only-no-cdma-not-compatible-with-verizonsprint-tencent-version-white', 750.00, 1000.00, '1700581039-248046c1c6cfc0761e413ad3a4884eb8.jpg', '1', 0, '2023-12-13 15:13:41', NULL),
(9, '9.9 | FREE AIO | RTX-3050 | I5-12400F | B660M-ITX | 16GB DDR4 [Next Day Shipping]', '99-free-aio-rtx-3050-i5-12400f-b660m-itx-16gb-ddr4-next-day-shipping', 1400.00, 1600.00, '1700581069-fb64c282ee2265c65014fe2081ec6214.jpg', '1', 0, '2023-12-13 15:15:31', NULL),
(10, 'Silentnight 4 Drawer Storage Divan | Slate Grey | Super King with 1200 Eco Comfort Mattress | Which Best Buy 2020 | Medium Firm | Super King', 'silentnight-4-drawer-storage-divan-slate-grey-super-king-with-1200-eco-comfort-mattress-which-best-buy-2020-medium-firm-super-king', 900.00, 1200.00, '1700581105-123f5a08d3da4afa7ef8331e5c01527c.jpg', '1', 0, '2023-12-13 15:16:22', NULL),
(11, 'Gigabyte M32U 31.5 Inch SS IPS 4K/UHD (3840 x 2160) 144Hz HDMI 2.1 Adaptive Sync Gaming Monitor, Black', 'gigabyte-m32u-315-inch-ss-ips-4kuhd-3840-x-2160-144hz-hdmi-21-adaptive-sync-gaming-monitor-black', 500.00, 700.00, '1700581141-5ab309803010515c647398156bab15aa.jpg', '1', 0, '2023-12-13 15:17:19', NULL),
(12, 'Samsung Galaxy Note 20 Ultra SM-N986B/DS, Dual SIM 5G, International Version (No US Warranty), 12GB+256GB, Mystic Black - Unlocked', 'samsung-galaxy-note-20-ultra-sm-n986bds-dual-sim-5g-international-version-no-us-warranty-12gb256gb-mystic-black-unlocked', 800.00, 1000.00, '1700581173-7c41df028b9628a89b4b9d9a9f3038a9.jpg', '1', 0, '2023-12-13 15:19:20', NULL),
(13, 'Lenovo - 2022 - IdeaPad Gaming 3 - Gaming Laptop Computer - 15.6 FHD - 120Hz - AMD Ryzen 5 6600H - 8GB DDR5 RAM - 256GB SSD - NVIDIA RTX 3050 Graphics - Windows 11 Home', 'lenovo-2022-ideapad-gaming-3-gaming-laptop-computer-156-fhd-120hz-amd-ryzen-5-6600h-8gb-ddr5-ram-256gb-ssd-nvidia-rtx-3050-graphics-windows-11-home', 885.00, 1000.00, '1700581214-daf970964fdf65fdbe7417a5014ef865.jpg', '1', 0, '2023-12-13 15:20:25', NULL),
(14, 'Siemens TP705GB1 EQ700 Home Connect Bean to Cup Fully Automatic Freestanding Coffee Machine - Anthracite', 'siemens-tp705gb1-eq700-home-connect-bean-to-cup-fully-automatic-freestanding-coffee-machine-anthracite', 800.00, 1000.00, '1700581269-49b428ffed4a84379a231bfe27fde630.jpg', '1', 0, '2023-12-13 15:20:25', NULL),
(15, 'ASUS ZenBook Flip OLED UX363EA 13.3\" Intel EVO Certified Convertible Laptop (Intel i7-1165G7, 16GB RAM, 1TB SSD, Backlit Keyboard, Windows 10) Includes Stylus, Sleeve', 'asus-zenbook-flip-oled-ux363ea-133-intel-evo-certified-convertible-laptop-intel-i7-1165g7-16gb-ram-1tb-ssd-backlit-keyboard-windows-10-includes-stylus-sleeve', 1000.00, 1200.00, '1700581322-da2d8249614d613f38311de38aa57efe.jpg', '1', 0, '2023-12-13 15:23:22', NULL),
(16, 'Trolleys,Laundry Hamper,Waterproof Laundry Hamper Sorter Cart with Wheels Bag, Heavy-Duty Dirty Clothes Storage Organizer, Hold up to 200 Kg,10 Tube (8 Tube)', 'trolleyslaundry-hamperwaterproof-laundry-hamper-sorter-cart-with-wheels-bag-heavy-duty-dirty-clothes-storage-organizer-hold-up-to-200-kg10-tube-8-tube', 650.00, 800.00, '1700581354-2455296af8a66906423d9a4128af2f11.jpg', '1', 0, NULL, NULL),
(17, 'Quilt Summer Cool Quilt Double-sided Tencel Air Conditioner Quilt Four-piece Ice Silk Quilt Double Quilt Blanket (Color : B, Size : 200 * 230cm)', 'quilt-summer-cool-quilt-double-sided-tencel-air-conditioner-quilt-four-piece-ice-silk-quilt-double-quilt-blanket-color-b-size-200-230cm', 1200.00, 1400.00, '1700581387-1854aa678a926f69f96eb11ea7cfdacc.jpg', '1', 0, '2023-12-13 15:26:22', NULL),
(18, 'Apple MacBook Pro with Apple M1 Chip (13-inch, 8GB RAM, 256GB SSD Storage) - Space Grey (Latest Model)', 'apple-macbook-pro-with-apple-m1-chip-13-inch-8gb-ram-256gb-ssd-storage-space-grey-latest-model', 1500.00, 1800.00, '1700581438-8509c662cd1807b05b8a18043e1c1535.jpg', '1', 0, '2023-12-13 15:26:22', NULL),
(19, 'Microsoft Surface Book 2 13.5\" (Intel Core i7, 16GB RAM, 512 GB)', 'microsoft-surface-book-2-135-intel-core-i7-16gb-ram-512-gb', 1800.00, 2200.00, '1700581472-4d996c92ea303cd4e1d4ff35e9b97f64.jpg', '1', 0, '2023-12-13 15:28:25', NULL),
(20, 'NXYJD Computer Desk Laptop Desk Rolling Single Electric Height Adjustable Desk For Office Home Furniture (Color : White)', 'nxyjd-computer-desk-laptop-desk-rolling-single-electric-height-adjustable-desk-for-office-home-furniture-color-white', 900.00, 1200.00, '1700581516-6acf762f542ed5bd386acd898be6a3ec.jpg', '1', 0, '2023-12-13 15:28:25', NULL),
(21, 'ASUS TUF Dash 15 (2022) Gaming Laptop, 15.6” 144Hz FHD Display, Intel Core i7-12650H, GeForce RTX 3060, 16GB DDR5, 512GB SSD, Thunderbolt 4, Thunderbolt 4, Windows 11 Home, Off Black', 'asus-tuf-dash-15-2022-gaming-laptop-156-144hz-fhd-display-intel-core-i7-12650h-geforce-rtx-3060-16gb-ddr5-512gb-ssd-thunderbolt-4-thunderbolt-4-windows-11-home-off-black\r\n', 1000.00, 1200.00, '1700581574-ece235c2521334e13ec3e118199fc9f2.jpg', '1', 0, '2023-12-13 15:29:55', NULL),
(22, 'AEOLUS Steam Generator Ironing Board Vacuum Blowing Heated Sleeve Board Iron Rest Copper Boiler TS01 S', 'aeolus-steam-generator-ironing-board-vacuum-blowing-heated-sleeve-board-iron-rest-copper-boiler-ts01-s', 850.00, 1000.00, '1700581599-703fe3f4bd2a85c493673d9de27e4c6f.jpg', '1', 0, '2023-12-13 15:29:55', NULL),
(23, 'L&W BROS. Dog Nail Grinder for Dogs, Professional pet Nail Grinder, Rechargeable Electric pet Nail Grooming Painless Paws Trimmer for Cats', 'lw-bros-dog-nail-grinder-for-dogs-professional-pet-nail-grinder-rechargeable-electric-pet-nail-grooming-painless-paws-trimmer-for-cats', 20.00, 30.00, '1700581646-aa894813f1e7495c418fb8c74e9e0dfa.jpg', '1', 0, '2023-12-13 15:32:17', NULL),
(24, '83\"x59\" Primary Tufting Cloth with Marked Lines, 70.9\"x39.4\" Tufting Non-Slip Backing Fabric, Large Monk Cloth Kit for Cut Pile Rug Tufting Gun', '83x59-primary-tufting-cloth-with-marked-lines-709x394-tufting-non-slip-backing-fabric-large-monk-cloth-kit-for-cut-pile-rug-tufting-gun', 35.00, 50.00, '1700581670-c3cc3313dd7be0dce754ad99a097f987.jpg', '1', 0, '2023-12-13 15:32:17', NULL),
(25, 'ORICO USB 3.0 to SATA External Hard Drive 5 Bay Docking Station with Duplicator Offline Clone Function for 2.5 or 3.5in HDD, SSD Support 5X 10 TB', 'orico-usb-30-to-sata-external-hard-drive-5-bay-docking-station-with-duplicator-offline-clone-function-for-25-or-35in-hdd-ssd-support-5x-10-tb', 150.00, 200.00, '1700581706-92d3c3b6120dfc6c6b7c9e763cdc7c42.jpg', '1', 0, '2023-12-13 15:33:59', NULL),
(26, 'Xerox B305 38ppm Black & White (Mono) Wireless Laser Multifunction Printer with Duplex printing - Print/Scan/Copy', 'xerox-b305-38ppm-black-white-mono-wireless-laser-multifunction-printer-with-duplex-printing-printscancopy', 300.00, 400.00, '1700581737-c01045383244c205c241741ff86e757c.jpg', '1', 0, '2023-12-13 15:33:59', NULL),
(27, 'Paper Towel Holder Countertop,YIWANFW Black Bathroom Freestanding Paper Holder Stand with Heavy Weighted Wooden Base Paper Towel Organizer Roll Dispenser for Kitchen Countertop', 'paper-towel-holder-countertopyiwanfw-black-bathroom-freestanding-paper-holder-stand-with-heavy-weighted-wooden-base-paper-towel-organizer-roll-dispenser-for-kitchen-countertop\r\n', 50.00, 80.00, '1700581786-833bad7853e75c6fe59ca3c3eda93d8a.jpg', '1', 0, NULL, NULL),
(29, 'Washable Dog Pee Pads +Free Grooming Gloves,Non Slip Dog Mats with Great Urine Absorption,Reusable Puppy Pee Pads for Whelping,Potty,Training,Playpen Crate', 'washable-dog-pee-pads-free-grooming-glovesnon-slip-dog-mats-with-great-urine-absorptionreusable-puppy-pee-pads-for-whelpingpottytrainingplaypen-crate', 35.00, 50.00, '1700581814-276d2c25c2a954702090df1ee21d0174.jpg', '1', 0, '2023-12-13 15:38:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tron20` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `erc20` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `tron20`, `erc20`, `created_at`, `updated_at`) VALUES
(1, 'TPnpCi7R97ri646irrv5xxcYnp59BXhonT', 'TPnpCi7R97ri646irrv5xxcYnp59BXhonT', '2023-12-26 05:03:17', '2023-12-25 23:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `referral_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `referral_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `amount` double(8,2) NOT NULL DEFAULT '0.00',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent_profit` float(8,2) NOT NULL DEFAULT '0.50',
  `level` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `referral_id`, `referral_code`, `name`, `phone`, `email`, `avatar`, `status`, `amount`, `email_verified_at`, `password`, `remember_token`, `percent_profit`, `level`, `created_at`, `updated_at`) VALUES
(1, '0', 'LCSVNA', 'demo', '9052415521', 'demo@gmail.com', NULL, '0', 0.00, NULL, '$2y$10$OQNzKSoheAZ8tZ2Jl9UDoOL.rLKogHW3AYEg2LSC69D238ixxw1T6', NULL, 0.00, 1, '2023-12-14 06:06:13', NULL),
(2, '1', '1KY8BI', 'Pritom Bhowmik', '01889231992', 'pritom@gmail.com', NULL, '1', 100.00, NULL, '$2y$10$FAvAOWlJViGJh7bZzUtnN.nQmiYtkMJi0w4ayYeYBunDrjtM5sJna', NULL, 2.00, 4, '2023-12-13 07:51:47', '2024-01-06 19:02:49'),
(3, '2', '286H84', 'Arje', '01889231992', 'arje@gmail.com', NULL, '0', 0.00, NULL, '$2y$10$cZ03XdlwvNv9x7MK7Xae3u3cFUBFSo2kihXUUItMZrP/4ZdpQfhqa', NULL, 1.00, 2, '2023-12-22 05:45:31', '2024-01-06 19:02:38'),
(5, '2', 'IX9UGQ', 'Sourov Pal', '018052415521', 'sourov123@gmail.com', NULL, '0', 0.00, NULL, '$2y$10$pxuOXP8zK1yQBvdubd.B6ed7PNX6F6WEOPxsIotKuW99OlBs28..6', NULL, 0.50, 1, '2024-01-04 07:00:25', '2024-01-06 19:32:09'),
(7, '5', 'XC69A3', 'Sourov Pal', '01919852044', 'sourovpal35@gmail.com', NULL, '0', 0.00, NULL, '$2y$10$fG6YGuLakqsVhN8h8fBLPeB5n87rm2LCAcZdHnD8CVb4AOm/q4j0m', NULL, 0.50, 1, '2024-01-06 19:36:41', '2024-01-06 20:08:04');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
