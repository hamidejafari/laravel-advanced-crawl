-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 30, 2020 at 02:29 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tavanama`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE `area` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `name`, `city_code`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'محله نبرد', '5', 1, NULL, '2020-11-10 10:46:00', '2020-11-10 10:46:03'),
(2, 'شهرداری', '2', 1, NULL, '2020-11-10 11:07:43', '2020-11-10 11:07:43'),
(3, 'شهرک غرب', '5', 1, NULL, '2020-12-15 18:06:53', '2020-12-15 18:06:53');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_seo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_seo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `header` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `listorder` bigint(20) NOT NULL DEFAULT '0',
  `description_seo` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent` bigint(20) DEFAULT NULL,
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lead` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `title_seo`, `img_seo`, `image`, `description`, `header`, `listorder`, `description_seo`, `url`, `status`, `deleted_at`, `created_at`, `updated_at`, `parent`, `cover`, `adv`, `lead`) VALUES
(1, '1', '1', '1', '1', '1', '1', 0, '1', '1111111', 0, '2020-12-15 14:14:28', NULL, '2020-12-15 14:14:28', 0, NULL, '', NULL),
(2, '2', '2', '2', '2', '2', '2', 0, '2', '2', 0, '2020-12-15 14:14:28', NULL, '2020-12-15 14:14:28', 0, NULL, '', NULL),
(3, '3', '3', '3', '3', '3', '3', 0, '3', '3', 0, '2020-12-15 14:14:28', NULL, '2020-12-15 14:14:28', 1, NULL, '', NULL),
(4, '4', '4', '4', '4', '4', '4', 0, '4', '4', 0, '2020-12-15 14:14:28', NULL, '2020-12-15 14:14:28', 2, NULL, '', NULL),
(5, '1555', '1555', '1555', '225shutterstock_483170893.jpg', '<p>\r\n	1555</p>', '633shutterstock_483170893.jpg', 0, '1555', '1555', 0, '2020-12-15 14:14:28', '2020-12-02 04:51:36', '2020-12-15 14:14:28', NULL, NULL, '', NULL),
(6, 'ojhiuygt', 'hkjgh', 'kjghf', '296login-and-password-DHCYJD.jpg', '<p>\r\n	ouikyjt</p>', '764login.jpg', 0, 'kjh', 'ioukyt', 1, '2020-12-15 14:14:28', '2020-12-15 02:09:52', '2020-12-15 14:14:28', NULL, NULL, '', NULL),
(7, 'تست', 'تست', 'تست', '973emptyphoto.jpg', '<p>\r\n	تست</p>', '213banr4.jpg', 0, 'تست', 'تست', 1, '2020-12-15 14:27:33', '2020-12-15 14:07:55', '2020-12-15 14:27:33', NULL, NULL, '', NULL),
(8, 'تست25', 'تست2', 'تست2', '192emptyphoto.jpg', '<p>\r\n	تست</p>', '192emptyphoto.jpg', 0, 'تست2', 'تست2', 0, '2020-12-15 14:27:33', '2020-12-15 14:08:49', '2020-12-15 14:27:33', 9, NULL, '', NULL),
(9, 'دسته انتخابی دوم', 'دسته انتخابی', 'دسته انتخابی', '488emptyphoto.jpg', '<p>\r\n	دسته انتخابی</p>', '488emptyphoto.jpg', 0, 'دسته انتخابی', 'دسته-انتخابی', 1, NULL, '2020-12-15 14:13:35', '2020-12-15 14:27:09', 10, NULL, '', NULL),
(10, 'تست1', 'تستx1', 'تست1', '999emptyphoto.jpg', '<p>\r\n	تست1</p>', '999emptyphoto.jpg', 0, 'تست1', 'تست1', 1, NULL, '2020-12-15 14:26:18', '2020-12-24 04:45:00', NULL, '816serv3.png', '373banr5.jpg', NULL),
(11, 'gfd', 'jhgfds', 'hdgsfsdasa', '270cat1.jpg', '<p>\r\n	gfd</p>', '382banr5.jpg', 0, 'hgfd', 'hgfds', 1, NULL, '2020-12-21 08:29:07', '2020-12-21 08:29:07', NULL, '259serv1.png', '953banr4.jpg', 'rgfds'),
(12, 'شنوایی سنجی', 'شنوایی سنجی', 'شنوایی سنجی', '837cat1.jpg', '<p>\r\n	شنوایی سنجی</p>', '795banr2.jpg', 0, 'شنوایی سنجی', 'شنوایی-سنجی', 1, NULL, '2020-12-22 02:46:24', '2020-12-22 02:46:24', NULL, '955serv3.png', '943banr5.jpg', 'شنوایی سنجی'),
(13, 'sdas', 'gfd', 'fds', '780cat1.jpg', '<p>\r\n	trseraww</p>', '713banr2.jpg', 0, 'grfe', 'gdfs', 1, NULL, '2020-12-24 04:48:02', '2020-12-24 04:48:02', NULL, '331banr4.jpg', '168head.jpg', 'trfesa');

-- --------------------------------------------------------

--
-- Table structure for table `category_service`
--

CREATE TABLE `category_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_service`
--

INSERT INTO `category_service` (`id`, `product_id`, `category_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(13, 19, 1, NULL, NULL, NULL),
(14, 19, 2, NULL, NULL, NULL),
(15, 19, 3, NULL, NULL, NULL),
(16, 20, 1, NULL, NULL, NULL),
(17, 20, 2, NULL, NULL, NULL),
(19, 21, 2, '2020-12-02 02:59:00', NULL, '2020-12-02 02:59:00'),
(20, 21, 3, '2020-12-02 03:02:32', NULL, '2020-12-02 03:02:32'),
(21, 21, 2, '2020-12-02 03:02:32', NULL, '2020-12-02 03:02:32'),
(22, 21, 1, '2020-12-02 03:02:32', NULL, '2020-12-02 03:02:32'),
(23, 21, 3, '2020-12-02 04:40:35', NULL, '2020-12-02 04:40:35'),
(24, 21, 2, '2020-12-02 04:40:35', NULL, '2020-12-02 04:40:35'),
(25, 21, 1, '2020-12-02 04:40:35', NULL, '2020-12-02 04:40:35'),
(26, 21, 3, '2020-12-02 04:40:56', NULL, '2020-12-02 04:40:56'),
(27, 21, 2, '2020-12-02 04:40:56', NULL, '2020-12-02 04:40:56'),
(29, 21, 4, '2020-12-02 06:17:07', NULL, '2020-12-02 06:17:07'),
(30, 21, 3, '2020-12-02 06:17:07', NULL, '2020-12-02 06:17:07'),
(31, 21, 2, '2020-12-02 06:17:07', NULL, '2020-12-02 06:17:07'),
(32, 21, 1, '2020-12-02 06:17:07', NULL, '2020-12-02 06:17:07'),
(33, 21, 5, '2020-12-02 06:17:17', NULL, '2020-12-02 06:17:17'),
(34, 21, 3, '2020-12-02 06:17:17', NULL, '2020-12-02 06:17:17'),
(35, 21, 2, '2020-12-02 06:17:17', NULL, '2020-12-02 06:17:17'),
(36, 21, 1, '2020-12-02 06:17:17', NULL, '2020-12-02 06:17:17'),
(37, 21, 5, NULL, NULL, NULL),
(38, 21, 3, NULL, NULL, NULL),
(39, 21, 2, NULL, NULL, NULL),
(40, 21, 1, NULL, NULL, NULL),
(41, 24, 1, '2020-12-15 08:18:54', NULL, '2020-12-15 08:18:54'),
(42, 24, 2, '2020-12-15 08:18:54', NULL, '2020-12-15 08:18:54'),
(43, 25, 2, '2020-12-13 04:16:25', NULL, '2020-12-13 04:16:25'),
(44, 25, 4, '2020-12-13 04:16:25', NULL, '2020-12-13 04:16:25'),
(45, 25, 4, '2020-12-15 08:17:51', NULL, '2020-12-15 08:17:51'),
(46, 25, 2, '2020-12-15 08:17:51', NULL, '2020-12-15 08:17:51'),
(47, 25, 4, '2020-12-16 02:05:05', NULL, '2020-12-16 02:05:05'),
(48, 25, 2, '2020-12-16 02:05:05', NULL, '2020-12-16 02:05:05'),
(49, 24, 2, '2020-12-16 02:05:21', NULL, '2020-12-16 02:05:21'),
(50, 24, 1, '2020-12-16 02:05:21', NULL, '2020-12-16 02:05:21'),
(51, 25, 10, '2020-12-16 02:05:13', NULL, '2020-12-16 02:05:13'),
(52, 25, 10, '2020-12-16 02:05:28', NULL, '2020-12-16 02:05:28'),
(53, 25, 9, '2020-12-16 02:05:28', NULL, '2020-12-16 02:05:28'),
(54, 24, 9, '2020-12-16 02:05:35', NULL, '2020-12-16 02:05:35'),
(55, 25, 10, '2020-12-22 02:47:40', NULL, '2020-12-22 02:47:40'),
(56, 25, 9, '2020-12-22 02:47:40', NULL, '2020-12-22 02:47:40'),
(57, 24, 9, '2020-12-22 04:31:15', NULL, '2020-12-22 04:31:15'),
(58, 25, 12, '2020-12-22 04:32:31', NULL, '2020-12-22 04:32:31'),
(59, 25, 10, '2020-12-22 04:32:31', NULL, '2020-12-22 04:32:31'),
(60, 24, 12, '2020-12-24 03:27:35', NULL, '2020-12-24 03:27:35'),
(61, 25, 12, '2020-12-22 04:32:54', NULL, '2020-12-22 04:32:54'),
(62, 25, 10, '2020-12-22 04:32:54', NULL, '2020-12-22 04:32:54'),
(63, 25, 12, '2020-12-22 04:57:01', NULL, '2020-12-22 04:57:01'),
(64, 25, 10, '2020-12-22 04:57:01', NULL, '2020-12-22 04:57:01'),
(65, 25, 12, '2020-12-22 05:06:06', NULL, '2020-12-22 05:06:06'),
(66, 25, 10, '2020-12-22 05:06:06', NULL, '2020-12-22 05:06:06'),
(67, 25, 12, '2020-12-22 06:47:08', NULL, '2020-12-22 06:47:08'),
(68, 25, 10, '2020-12-22 06:47:08', NULL, '2020-12-22 06:47:08'),
(69, 25, 12, NULL, NULL, NULL),
(70, 25, 10, NULL, NULL, NULL),
(71, 26, 10, '2020-12-24 03:26:11', NULL, '2020-12-24 03:26:11'),
(72, 26, 12, '2020-12-24 03:26:11', NULL, '2020-12-24 03:26:11'),
(73, 27, 9, '2020-12-30 01:56:03', NULL, '2020-12-30 01:56:03'),
(74, 27, 12, '2020-12-30 01:56:03', NULL, '2020-12-30 01:56:03'),
(75, 26, 12, NULL, NULL, NULL),
(76, 26, 10, NULL, NULL, NULL),
(77, 24, 12, NULL, NULL, NULL),
(78, 27, 12, '2020-12-30 01:56:20', NULL, '2020-12-30 01:56:20'),
(79, 27, 9, '2020-12-30 01:56:20', NULL, '2020-12-30 01:56:20'),
(80, 27, 12, NULL, NULL, NULL),
(81, 27, 9, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `state_code`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'رشت', '2', 1, NULL, NULL, NULL),
(5, 'تهران', '5', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `readat` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `shortdes` longtext COLLATE utf8mb4_unicode_ci,
  `description_seo` longtext COLLATE utf8mb4_unicode_ci,
  `url` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `header` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` bigint(20) DEFAULT NULL,
  `type_user` bigint(20) DEFAULT NULL,
  `listorder` bigint(20) NOT NULL DEFAULT '0',
  `kind` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `title`, `title_seo`, `img_seo`, `image`, `description`, `shortdes`, `description_seo`, `url`, `status`, `type`, `parent`, `deleted_at`, `created_at`, `updated_at`, `header`, `city_id`, `type_user`, `listorder`, `kind`) VALUES
(7, 'sss', NULL, NULL, 'b645f7d0b640da97b1a0ab007852353f.jpg', '<p>\r\n	sss</p>', NULL, NULL, 'ssss', 0, 'catArticle', NULL, '2020-11-11 07:54:57', '2020-11-11 07:49:44', '2020-11-11 07:54:57', 'a9da9e78ff43c726e5e9b74e92d35c1e.png', NULL, NULL, 0, NULL),
(8, 'dddd', NULL, NULL, '8910 xMaFF2hSXpf_kIfG.jpg', '<p>\r\n	ddddd</p>', NULL, NULL, 'dddd', 0, 'catArticle', NULL, '2020-12-15 14:29:24', '2020-11-11 07:57:40', '2020-12-15 14:29:24', '362136-1369892_avatar-people-person-business-user-man-character-avatar.png', NULL, NULL, 0, NULL),
(9, '1', '1', NULL, '553e702075b76bd9ee96d348172447b5.png', '<p>\r\n	۱</p>', NULL, '۱', '1', 1, 'ista', NULL, '2020-12-15 14:34:40', '2020-11-12 08:22:33', '2020-12-15 14:34:40', NULL, NULL, NULL, 0, 1),
(10, '1', '1', '1', '891header.jpg', '<p>\r\n	۱</p>', NULL, '۱', '1', 1, 'article', 8, '2020-12-15 14:30:20', '2020-11-21 02:07:06', '2020-12-15 14:30:20', NULL, NULL, NULL, 0, 1),
(11, '111', '11', '111', '8751.jpg', '<p>\r\n	۱۱۱</p>', NULL, '۱۱۱', '11', 1, 'article', NULL, '2020-12-15 14:30:20', '2020-11-21 02:08:02', '2020-12-15 14:30:20', NULL, NULL, NULL, 0, 2),
(12, '1', NULL, NULL, '617header.jpg', '۱', NULL, NULL, NULL, 0, 'slider', NULL, '2020-12-15 14:32:10', '2020-11-21 06:44:50', '2020-12-15 14:32:10', NULL, NULL, NULL, 0, NULL),
(13, '1', NULL, NULL, '403header.jpg', NULL, NULL, NULL, NULL, 1, 'bnr', NULL, NULL, '2020-11-21 08:20:11', '2020-12-24 03:57:44', '0', NULL, NULL, 0, NULL),
(14, 'افتخار1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'glory', NULL, '2020-11-27 03:47:17', '2020-11-22 06:57:45', '2020-11-27 03:47:17', NULL, NULL, NULL, 0, NULL),
(15, 'بیمه', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'glory', NULL, '2020-11-27 03:22:02', '2020-11-25 08:39:31', '2020-11-27 03:22:02', NULL, NULL, NULL, 0, NULL),
(16, 'بیمه', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'glory', NULL, '2020-11-27 03:22:01', '2020-11-25 08:41:33', '2020-11-27 03:22:01', NULL, NULL, NULL, 0, NULL),
(17, 'بیمه', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'glory', NULL, '2020-11-27 03:21:59', '2020-11-25 08:42:07', '2020-11-27 03:21:59', NULL, NULL, NULL, 0, NULL),
(18, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'glory', NULL, '2020-11-27 03:47:17', '2020-11-25 08:42:13', '2020-11-27 03:47:17', NULL, NULL, NULL, 0, NULL),
(19, 'bime', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ins', NULL, NULL, '2020-11-25 08:43:46', '2020-11-25 08:43:46', NULL, NULL, NULL, 0, NULL),
(20, 'htjkhl', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'glory', NULL, '2020-11-27 03:47:17', NULL, '2020-11-27 03:47:17', NULL, NULL, NULL, 0, NULL),
(21, 'tryjuk', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'glory', NULL, '2020-11-27 03:47:17', NULL, '2020-11-27 03:47:17', NULL, NULL, NULL, 0, NULL),
(22, 'jfguhi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'glory', NULL, '2020-11-27 03:47:17', NULL, '2020-11-27 03:47:17', NULL, NULL, NULL, 0, NULL),
(23, 'htyjgio', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'glory', NULL, '2020-11-27 03:47:17', NULL, '2020-11-27 03:47:17', NULL, NULL, NULL, 0, NULL),
(24, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'glory', NULL, '2020-11-27 03:47:17', NULL, '2020-11-27 03:47:17', NULL, NULL, NULL, 0, NULL),
(25, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'glory', NULL, '2020-11-27 03:47:17', NULL, '2020-11-27 03:47:17', NULL, NULL, NULL, 0, NULL),
(26, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'glory', NULL, '2020-11-27 03:47:17', NULL, '2020-11-27 03:47:17', NULL, NULL, NULL, 0, NULL),
(27, '4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'glory', NULL, '2020-11-27 03:47:17', NULL, '2020-11-27 03:47:17', NULL, NULL, NULL, 0, NULL),
(28, '5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'glory', NULL, '2020-11-27 03:47:17', NULL, '2020-11-27 03:47:17', NULL, NULL, NULL, 0, NULL),
(29, '6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'glory', NULL, '2020-11-27 03:47:17', NULL, '2020-11-27 03:47:17', NULL, NULL, NULL, 0, NULL),
(30, '7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'glory', NULL, '2020-11-27 03:47:17', NULL, '2020-11-27 03:47:17', NULL, NULL, NULL, 0, NULL),
(31, '8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'glory', NULL, '2020-11-27 03:47:17', NULL, '2020-11-27 03:47:17', NULL, NULL, NULL, 0, NULL),
(32, 'افتخار3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'glory', NULL, NULL, NULL, '2020-11-27 03:48:22', NULL, NULL, NULL, 0, NULL),
(33, 'افتخار2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'glory', NULL, NULL, NULL, '2020-11-27 03:48:15', NULL, NULL, NULL, 0, NULL),
(34, 'افتخار1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'glory', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(35, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'inv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(36, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'inv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(37, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'inv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(38, 'ins1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ins', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(39, 'ins2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ins', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(40, 'ins3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ins', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(41, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'service', NULL, '2020-11-27 05:02:04', NULL, '2020-11-27 05:02:04', NULL, NULL, NULL, 0, NULL),
(42, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'service', NULL, '2020-11-27 05:02:06', NULL, '2020-11-27 05:02:06', NULL, NULL, NULL, 0, NULL),
(43, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'service', NULL, '2020-11-27 05:02:07', NULL, '2020-11-27 05:02:07', NULL, NULL, NULL, 0, NULL),
(44, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(45, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(46, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(47, '11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(48, '22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(49, 'sss', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'service', 46, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(50, '555', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'service', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL),
(51, '12', NULL, NULL, '836p1.jpg', NULL, NULL, NULL, '12', NULL, 'upl', NULL, '2020-12-16 07:42:45', '2020-11-29 13:40:19', '2020-12-16 07:42:45', NULL, NULL, NULL, 0, NULL),
(52, 'مقاله تستی', 'مقاله تستی', 'مقاله تستی', '8061987cf21d1774ee680614600d91faf11.jpg', '<p>\r\n	مقاله تستی</p>', NULL, 'مقاله تستی', 'مقاله-تستی', 1, 'article', NULL, '2020-12-15 14:30:20', '2020-12-15 14:15:46', '2020-12-15 14:30:20', NULL, NULL, NULL, 0, 2),
(53, 'دسته مقاله1', 'دسته مقاله1', 'دسته مقاله1', '5201987cf21d1774ee680614600d91faf11 (2).jpg', '<p>\r\n	دسته مقاله1</p>', NULL, 'دسته مقاله1', 'دسته-مقاله1', 1, 'catArticle', NULL, NULL, '2020-12-15 14:30:02', '2020-12-15 14:30:02', '961head.jpg', NULL, NULL, 0, NULL),
(54, 'مقاله1', 'مقاله1', 'مقاله1', '9001987cf21d1774ee680614600d91faf11 (2).jpg', '<p>\r\n	مقاله1</p>', NULL, 'مقاله1', 'مقاله1', 1, 'article', 53, NULL, '2020-12-15 14:31:00', '2020-12-15 14:31:00', NULL, NULL, NULL, 0, 1),
(55, 'خبر1', 'خبر1', 'خبر1', '973after-lhr.jpg', '<p>\r\n	خبر1</p>', NULL, 'خبر1', 'خبر1', 1, 'article', NULL, NULL, '2020-12-15 14:31:28', '2020-12-15 14:31:58', NULL, NULL, NULL, 0, 2),
(56, 'توانما , معرفی مراکز توانبخشی در ایران', NULL, NULL, '586header.jpg', 'معرفی مراکز توانمندی برای کسانی که به دنبال بهترین های این حوزه در تهران و شهرستان ها هستند', NULL, NULL, NULL, 1, 'slider', NULL, NULL, '2020-12-15 14:32:54', '2020-12-22 14:10:20', NULL, NULL, NULL, 0, NULL),
(57, 'تست ایستا', 'تست ایستا', NULL, '68638df3166-4418-4d34-a6fc-a0286387ef4b.jpg', '<p>\r\n	تست ایستا</p>', NULL, 'تست ایستا', 'تست-ایستا', 1, 'ista', NULL, NULL, '2020-12-16 02:01:12', '2020-12-16 02:01:12', NULL, NULL, NULL, 0, 0),
(58, 'لیذبرسی', 'بیس', NULL, '250کاشت-ناخن-جدید-02067d7b451bedad864198f16e66dc39.jpg', '<p>\r\n	بیس</p>', NULL, 'بری', 'ذبرسیس', 1, 'ista', 57, NULL, '2020-12-16 02:01:50', '2020-12-16 02:01:50', NULL, NULL, NULL, 0, 1),
(59, 'lkjh', NULL, NULL, '8351987cf21d1774ee680614600d91faf11.jpg', NULL, NULL, NULL, 'kjhgtf', NULL, 'upl', NULL, '2020-12-16 07:42:43', '2020-12-16 07:42:40', '2020-12-16 07:42:43', NULL, NULL, NULL, 0, NULL),
(60, 'jhgfd', NULL, NULL, '712banr2.jpg', NULL, NULL, NULL, NULL, 1, 'bnr', NULL, NULL, '2020-12-24 04:01:55', '2020-12-24 04:01:55', '2', NULL, NULL, 0, NULL),
(61, 'gfds', NULL, NULL, '931banr1.jpg', NULL, NULL, NULL, NULL, 1, 'bnr', NULL, NULL, '2020-12-24 04:02:13', '2020-12-24 04:02:13', '1', NULL, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `disease_service`
--

CREATE TABLE `disease_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `disease_service`
--

INSERT INTO `disease_service` (`id`, `title`, `product_id`, `category_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'tregafww', 27, 13, NULL, '2020-12-26 03:21:52', '2020-12-26 03:21:52'),
(2, 'sdfghjkl', 25, 12, NULL, '2020-12-26 03:39:10', '2020-12-26 03:39:10'),
(3, 'jh,mgfds', 25, 12, NULL, '2020-12-26 03:39:23', '2020-12-26 03:39:23');

-- --------------------------------------------------------

--
-- Table structure for table `environments`
--

CREATE TABLE `environments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `environments`
--

INSERT INTO `environments` (`id`, `title`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'jhgfd', 0, '2020-12-15 14:49:57', NULL, '2020-12-15 14:49:57'),
(2, 'jhfgbd', 1, '2020-12-15 14:49:57', NULL, '2020-12-15 14:49:57'),
(3, 'hfgbdfvs', 1, '2020-12-15 14:49:57', NULL, '2020-12-15 14:49:57'),
(4, 'hngbfxd', 1, '2020-12-15 14:49:57', NULL, '2020-12-15 14:49:57'),
(5, 'ngfbs', 1, '2020-12-15 14:49:57', NULL, '2020-12-15 14:49:57'),
(6, 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ', 1, NULL, NULL, NULL),
(7, 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ', 1, NULL, NULL, NULL),
(8, 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ', 1, NULL, NULL, NULL),
(9, 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `env_service`
--

CREATE TABLE `env_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `environment_id` bigint(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `env_service`
--

INSERT INTO `env_service` (`id`, `product_id`, `environment_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 25, 6, NULL, NULL, NULL),
(2, 25, 7, NULL, NULL, NULL),
(3, 26, 6, '2020-12-24 03:26:11', NULL, '2020-12-24 03:26:11'),
(4, 26, 8, '2020-12-24 03:26:11', NULL, '2020-12-24 03:26:11'),
(5, 27, 6, '2020-12-30 01:56:03', NULL, '2020-12-30 01:56:03'),
(6, 27, 7, '2020-12-30 01:56:03', NULL, '2020-12-30 01:56:03'),
(7, 26, 6, NULL, NULL, NULL),
(8, 26, 8, NULL, NULL, NULL),
(9, 27, 6, '2020-12-30 01:56:20', NULL, '2020-12-30 01:56:20'),
(10, 27, 7, '2020-12-30 01:56:20', NULL, '2020-12-30 01:56:20'),
(11, 27, 6, NULL, NULL, NULL),
(12, 27, 7, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `glory_service`
--

CREATE TABLE `glory_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `glory_service`
--

INSERT INTO `glory_service` (`id`, `title`, `status`, `product_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'uyhgt', 1, 2, NULL, NULL, NULL),
(2, 'hgf', 1, 5, NULL, NULL, NULL),
(3, 'dgfd', 1, 25, '2020-12-13 05:39:00', NULL, '2020-12-13 05:39:00'),
(4, 'Zxcvb', 1, 25, '2020-12-13 05:30:01', NULL, '2020-12-13 05:30:01'),
(5, 'gyftdgrsf', 1, 25, NULL, NULL, '2020-12-22 05:16:18'),
(6, 'jkhmgftd', 1, 25, NULL, NULL, '2020-12-22 05:16:13'),
(7, 'jghfds', 0, 25, '2020-12-13 05:38:58', NULL, '2020-12-13 05:38:58'),
(8, 'س', 1, 25, NULL, NULL, '2020-12-22 05:16:08'),
(9, 'س', 1, 25, NULL, NULL, '2020-12-22 05:16:03'),
(10, 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ', 1, 25, NULL, NULL, '2020-12-22 05:16:44');

-- --------------------------------------------------------

--
-- Table structure for table `insurances`
--

CREATE TABLE `insurances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insurances`
--

INSERT INTO `insurances` (`id`, `title`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'بیمه ایران', NULL, NULL, NULL, NULL),
(2, 'بیمه سرمایه', NULL, NULL, NULL, NULL),
(3, 'بیمه دانا', NULL, NULL, NULL, NULL),
(4, '1', 1, '2020-12-15 14:50:19', NULL, '2020-12-15 14:50:19'),
(5, '3', 1, '2020-12-15 14:50:19', NULL, '2020-12-15 14:50:19'),
(6, '4', 1, '2020-12-15 14:47:02', NULL, '2020-12-15 14:47:02'),
(7, '5', 0, '2020-12-15 14:47:01', NULL, '2020-12-15 14:47:01'),
(8, 'kujthydr', 1, '2020-12-15 14:50:19', NULL, '2020-12-15 14:50:19'),
(9, 'jtdhrgtsef', 1, '2020-12-15 14:50:19', NULL, '2020-12-15 14:50:19');

-- --------------------------------------------------------

--
-- Table structure for table `insurance_service`
--

CREATE TABLE `insurance_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `insurance_id` bigint(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insurance_service`
--

INSERT INTO `insurance_service` (`id`, `product_id`, `insurance_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 21, 2, '2020-12-02 03:02:32', NULL, '2020-12-02 03:02:32'),
(2, 21, 3, '2020-12-02 03:02:32', NULL, '2020-12-02 03:02:32'),
(3, 21, 2, '2020-12-02 04:40:35', NULL, '2020-12-02 04:40:35'),
(4, 21, 2, '2020-12-02 04:40:56', NULL, '2020-12-02 04:40:56'),
(5, 21, 1, '2020-12-02 04:40:56', NULL, '2020-12-02 04:40:56'),
(6, 21, 2, '2020-12-02 06:17:07', NULL, '2020-12-02 06:17:07'),
(7, 21, 1, '2020-12-02 06:17:07', NULL, '2020-12-02 06:17:07'),
(8, 21, 1, '2020-12-02 06:17:17', NULL, '2020-12-02 06:17:17'),
(9, 21, 2, NULL, NULL, NULL),
(10, 21, 1, NULL, NULL, NULL),
(11, 24, 1, '2020-12-15 08:18:54', NULL, '2020-12-15 08:18:54'),
(12, 24, 2, '2020-12-15 08:18:54', NULL, '2020-12-15 08:18:54'),
(13, 25, 1, '2020-12-13 04:16:25', NULL, '2020-12-13 04:16:25'),
(14, 25, 3, '2020-12-13 04:16:25', NULL, '2020-12-13 04:16:25'),
(15, 25, 3, '2020-12-15 08:17:51', NULL, '2020-12-15 08:17:51'),
(16, 25, 1, '2020-12-15 08:17:51', NULL, '2020-12-15 08:17:51'),
(17, 25, 3, '2020-12-16 02:05:05', NULL, '2020-12-16 02:05:05'),
(18, 25, 1, '2020-12-16 02:05:05', NULL, '2020-12-16 02:05:05'),
(19, 24, 2, '2020-12-16 02:05:21', NULL, '2020-12-16 02:05:21'),
(20, 24, 1, '2020-12-16 02:05:21', NULL, '2020-12-16 02:05:21'),
(21, 25, 3, '2020-12-16 02:05:13', NULL, '2020-12-16 02:05:13'),
(22, 25, 1, '2020-12-16 02:05:13', NULL, '2020-12-16 02:05:13'),
(23, 25, 3, '2020-12-16 02:05:28', NULL, '2020-12-16 02:05:28'),
(24, 25, 1, '2020-12-16 02:05:28', NULL, '2020-12-16 02:05:28'),
(25, 24, 2, '2020-12-16 02:05:35', NULL, '2020-12-16 02:05:35'),
(26, 24, 1, '2020-12-16 02:05:35', NULL, '2020-12-16 02:05:35'),
(27, 25, 3, '2020-12-22 02:47:40', NULL, '2020-12-22 02:47:40'),
(28, 25, 2, '2020-12-22 02:47:40', NULL, '2020-12-22 02:47:40'),
(29, 25, 1, '2020-12-22 02:47:40', NULL, '2020-12-22 02:47:40'),
(30, 24, 2, '2020-12-22 04:31:15', NULL, '2020-12-22 04:31:15'),
(31, 25, 3, '2020-12-22 04:32:31', NULL, '2020-12-22 04:32:31'),
(32, 25, 2, '2020-12-22 04:32:31', NULL, '2020-12-22 04:32:31'),
(33, 25, 1, '2020-12-22 04:32:31', NULL, '2020-12-22 04:32:31'),
(34, 24, 2, '2020-12-24 03:27:35', NULL, '2020-12-24 03:27:35'),
(35, 25, 3, '2020-12-22 04:32:54', NULL, '2020-12-22 04:32:54'),
(36, 25, 2, '2020-12-22 04:32:54', NULL, '2020-12-22 04:32:54'),
(37, 25, 1, '2020-12-22 04:32:54', NULL, '2020-12-22 04:32:54'),
(38, 25, 3, '2020-12-22 04:57:01', NULL, '2020-12-22 04:57:01'),
(39, 25, 2, '2020-12-22 04:57:01', NULL, '2020-12-22 04:57:01'),
(40, 25, 1, '2020-12-22 04:57:01', NULL, '2020-12-22 04:57:01'),
(41, 25, 3, '2020-12-22 05:06:06', NULL, '2020-12-22 05:06:06'),
(42, 25, 2, '2020-12-22 05:06:06', NULL, '2020-12-22 05:06:06'),
(43, 25, 1, '2020-12-22 05:06:06', NULL, '2020-12-22 05:06:06'),
(44, 25, 3, '2020-12-22 06:47:08', NULL, '2020-12-22 06:47:08'),
(45, 25, 2, '2020-12-22 06:47:08', NULL, '2020-12-22 06:47:08'),
(46, 25, 1, '2020-12-22 06:47:08', NULL, '2020-12-22 06:47:08'),
(47, 25, 3, NULL, NULL, NULL),
(48, 25, 2, NULL, NULL, NULL),
(49, 25, 1, NULL, NULL, NULL),
(50, 26, 2, '2020-12-24 03:26:11', NULL, '2020-12-24 03:26:11'),
(51, 26, 3, '2020-12-24 03:26:11', NULL, '2020-12-24 03:26:11'),
(52, 27, 2, '2020-12-30 01:56:03', NULL, '2020-12-30 01:56:03'),
(53, 26, 3, NULL, NULL, NULL),
(54, 26, 2, NULL, NULL, NULL),
(55, 24, 2, NULL, NULL, NULL),
(56, 27, 2, '2020-12-30 01:56:20', NULL, '2020-12-30 01:56:20'),
(57, 27, 2, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `messageable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `parent_id` bigint(20) NOT NULL,
  ` messageable_id` bigint(20) NOT NULL,
  `listorder` tinyint(1) NOT NULL DEFAULT '1',
  `readat` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `surename`, `messageable_type`, `email`, `phone`, `message`, `status`, `parent_id`, ` messageable_id`, `listorder`, `readat`, `deleted_at`, `created_at`, `updated_at`, `stars`) VALUES
(1, '1', '1', '1', '1', '1', '۱', 1, 0, 0, 1, 1, NULL, '2020-11-21 07:42:43', '2020-11-21 08:13:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_10_04_063646_create_setting_table', 1),
(5, '2020_10_04_064040_create_contents_table', 1),
(6, '2020_10_04_065406_create_roles_table', 1),
(7, '2020_10_04_065733_create_role_user_table', 1),
(8, '2020_10_04_070905_add_parent_id_to_users_table', 1),
(9, '2020_10_04_102109_create_socials_table', 1),
(10, '2020_10_04_104553_add_status_to_users_table', 1),
(11, '2020_10_05_142033_add_rules_to_setting_table', 1),
(12, '2020_10_07_073049_create_redirect_table', 1),
(13, '2020_10_07_073954_add_sitemap_to_setting_table', 1),
(14, '2020_10_07_075654_add_sitemapimg_to_setting_table', 1),
(15, '2020_10_11_080702_create_messages_table', 1),
(16, '2020_10_13_073151_add_colors_to_setting_table', 1),
(17, '2020_10_31_063656_add_stars_to_messages_table', 1),
(18, '2020_10_31_064205_add_header_to_contents_table', 1),
(19, '2020_10_31_064403_create_banners_table', 1),
(20, '2020_11_01_053932_create_city_table', 1),
(21, '2020_11_01_054227_create_state_table', 1),
(22, '2020_11_01_073809_create_contact_table', 1),
(23, '2020_11_01_084809_add_city_id_to_contents_table', 1),
(24, '2020_11_01_110526_add_type_user_to_contents_table', 1),
(25, '2020_11_04_060315_add_articlenumber_to_setting_table', 1),
(26, '2020_11_04_060710_add_listorder_to_contents_table', 1),
(27, '2020_11_10_061537_create_products_table', 1),
(28, '2020_11_10_074248_create_product_images_table', 2),
(29, '2020_11_10_091241_create_area_table', 3),
(30, '2020_11_10_103333_add_area_id_to_products_table', 4),
(31, '2020_11_18_114201_add_kind_to_contents_table', 5),
(32, '2020_11_22_084506_add_lead_to_products_table', 6),
(34, '2020_12_01_074140_add_last_login_to_users_table', 7),
(35, '2020_12_01_074449_create_environments_table', 8),
(36, '2020_12_01_074725_create_way_service_table', 8),
(37, '2020_12_01_075057_create_glory_service_table', 8),
(38, '2020_12_01_080035_create_insurances_table', 8),
(39, '2020_12_01_080145_create_user_service_table', 8),
(40, '2020_12_01_080414_create_env_service_table', 8),
(41, '2020_12_01_080751_create_category_service_table', 8),
(42, '2020_12_01_081007_create_insurance_service_table', 8),
(43, '2020_12_01_081115_create_tool_service_table', 8),
(44, '2020_12_01_083318_create_disease_service_table', 8),
(45, '2020_12_01_083522_create_category_table', 8),
(46, '2020_12_01_094156_add_parent_to_category_table', 9),
(47, '2020_12_15_065535_add_phone_to_users_table', 10),
(48, '2020_12_15_115214_add_online_to_way_service_table', 11),
(49, '2020_12_17_085535_add_cover_to_category_table', 12),
(50, '2020_12_17_090425_add_adv_to_category_table', 13),
(51, '2020_12_17_093507_add_lead_to_category_table', 14),
(52, '2020_12_23_094250_add_manager_to_users_table', 15),
(53, '2020_12_24_090449_create_toolway_service_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_seo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `shortdes` longtext COLLATE utf8mb4_unicode_ci,
  `header` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` bigint(20) DEFAULT NULL,
  `type_user` bigint(20) DEFAULT NULL,
  `listorder` bigint(20) DEFAULT '0',
  `description_seo` longtext COLLATE utf8mb4_unicode_ci,
  `url` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `area_id` bigint(20) DEFAULT NULL,
  `lead` longtext COLLATE utf8mb4_unicode_ci,
  `email` longtext COLLATE utf8mb4_unicode_ci,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `phone` longtext COLLATE utf8mb4_unicode_ci,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `title_seo`, `img_seo`, `image`, `description`, `shortdes`, `header`, `city_id`, `type_user`, `listorder`, `description_seo`, `url`, `status`, `type`, `parent`, `deleted_at`, `created_at`, `updated_at`, `area_id`, `lead`, `email`, `address`, `phone`, `instagram`, `telegram`, `whatsapp`, `twitter`, `facebook`) VALUES
(1, '1', NULL, NULL, '221avatar.png', '<p>\r\n	۱۱</p>', NULL, '799greenlight.png', NULL, NULL, 0, NULL, '1', 1, 'cat', NULL, NULL, '2020-11-10 04:10:02', '2020-11-11 08:04:49', 0, NULL, '', '', '', '', '', '', '', ''),
(2, '222', '222', '2222', 'a979fa6a19b690d50651e5d055151b1b.jpg', '<p>\r\n	222</p>', NULL, NULL, 5, 0, 0, '222', '22222', 1, 'product', 1, NULL, '2020-11-10 04:32:57', '2020-11-10 04:32:57', 1, NULL, '', '', '', '', '', '', '', ''),
(3, 'job', 'job', 'job', 'c4faf6e049db18d4a33d7e62783bcc12.jpg', '<p>\r\n	job</p>', NULL, NULL, 5, 1, 0, 'job', 'job', 1, 'product', 1, NULL, '2020-11-10 07:30:21', '2020-11-10 07:30:21', 1, NULL, '', '', '', '', '', '', '', ''),
(4, 'تست', 'تت', 'تت', 'e7224e97b91874d8b28aaa4c544fa826.JPEG', '<p>\r\n	ت</p>', NULL, NULL, 5, 0, 0, 'ت', 'تت', 1, 'product', 8, NULL, '2020-11-10 07:38:09', '2020-11-21 05:30:15', 2, NULL, '', '', '', '', '', '', '', ''),
(5, '2', NULL, NULL, '10367169b0f11a1d792dcb37153e0260.png', '<p>\r\n	۲</p>', NULL, 'ce7cc7b1831c65caecba43db0d6699e4.jpg', NULL, NULL, 0, NULL, '2', 1, 'cat', 6, NULL, '2020-11-10 07:44:22', '2020-11-13 07:02:13', NULL, NULL, '', '', '', '', '', '', '', ''),
(6, '3', NULL, NULL, '1d9ed5564c6bc6ee1cd102274c9d0a72.jpg', '<p>\r\n	3</p>', NULL, '2cd0d2a9151e440e9b19d87b82bbb78a.jpg', NULL, NULL, 0, NULL, '3', 1, 'cat', NULL, NULL, '2020-11-11 07:00:14', '2020-11-11 07:00:14', NULL, NULL, '', '', '', '', '', '', '', ''),
(7, 'zasass', NULL, NULL, '6fa35581bbcfea2b54e5f2a0cc05285c.jpg', '<p>\r\n	ssss</p>', NULL, '0f8d61666bbe5b0c68377fbf1d2794b4.png', NULL, NULL, 0, NULL, 'sssss', 0, 'catArticle', NULL, NULL, '2020-11-11 07:55:12', '2020-11-11 07:55:12', NULL, NULL, '', '', '', '', '', '', '', ''),
(8, 'test', NULL, NULL, 'b00cd74dd86bd55d58b3a06d6f1cafed.jpg', '<p>\r\n	t</p>', NULL, '227ea60770ac5d7ffa1c6bbac294775f.png', NULL, NULL, 0, NULL, 'tt', 0, 'cat', 1, NULL, '2020-11-13 06:54:50', '2020-11-13 06:54:50', NULL, NULL, '', '', '', '', '', '', '', ''),
(9, 'testm', NULL, NULL, 'f93c9da0dc5da4e34eb262c5157dca1f.png', '<p>\r\n	te</p>', NULL, '7bcb88bebf5780b5f89394147eb3ea6e.jpg', NULL, NULL, 0, NULL, 're', 0, 'cat', 8, NULL, '2020-11-13 07:00:22', '2020-11-13 07:01:47', NULL, NULL, '', '', '', '', '', '', '', ''),
(10, 'خدمت1', 'خدمت1', 'خدمت1', '3321.jpg', '<p>\r\n	خدمت1</p>', NULL, NULL, 5, 1, 0, 'خدمت1', 'خدمت1', 1, 'product', 5, NULL, '2020-11-22 04:46:52', '2020-11-22 04:46:52', 1, NULL, '', '', '', '', '', '', '', ''),
(11, 'm1', 'm1m1m1', 'm1', '8532.jpg', '<p>\r\n	m1</p>', NULL, NULL, 5, 0, 0, 'm1', 'm1', 1, 'product', 5, NULL, '2020-11-28 03:50:20', '2020-11-28 03:50:20', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '', 0, 'product', NULL, '2020-12-01 07:58:49', '2020-12-01 07:50:17', '2020-12-01 07:58:49', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '', 0, 'product', NULL, '2020-12-01 07:55:43', '2020-12-01 07:53:49', '2020-12-01 07:55:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '', 0, 'product', NULL, '2020-12-01 07:55:43', '2020-12-01 07:54:39', '2020-12-01 07:55:43', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '', 0, 'product', NULL, '2020-12-01 08:17:30', '2020-12-01 07:58:14', '2020-12-01 08:17:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '', 0, 'product', NULL, '2020-12-01 08:17:30', '2020-12-01 08:07:22', '2020-12-01 08:17:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '', 0, 'product', NULL, '2020-12-01 08:17:30', '2020-12-01 08:07:46', '2020-12-01 08:17:30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '', 0, 'product', NULL, '2020-12-01 08:18:10', '2020-12-01 08:17:38', '2020-12-01 08:18:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '', 0, 'product', NULL, NULL, '2020-12-01 08:18:17', '2020-12-01 08:18:17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'jsjs', 'jsjs', 'jsjs', '194shutterstock_483170893.jpg', '<p>\r\n	jsjs</p>', NULL, NULL, 5, NULL, 0, 'jsjs', 'jsjs', 1, 'product', NULL, NULL, '2020-12-01 08:44:07', '2020-12-02 02:38:44', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, '12', 'insurance_id', 'insurance_id', '858photo_2020-11-30_07-34-54.jpg', '<pre style=\"background-color:#2b2b2b;color:#a9b7c6;font-family:\'Consolas\';font-size:9.8pt;\">\r\n<span style=\"color:#6a8759;background-color:#232525;\">insurance_id</span></pre>', NULL, NULL, 5, NULL, 0, 'insurance_id', 'insurance_id', 1, 'product', NULL, NULL, '2020-12-02 02:40:35', '2020-12-02 06:17:17', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'utmytyre', 'ikyujtrg', 'ioutyjth', '617cat1.jpg', '<p>\r\n	oluyityjt</p>', NULL, NULL, 5, NULL, 0, 'oluityr', 'uikyujthrt', 1, 'product', NULL, NULL, '2020-12-13 03:55:35', '2020-12-13 03:55:35', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'دکتر', 'dr', 'dr', '980cat1.jpg', '<p>\r\n	oyituryetwrq</p>\r\n<p>\r\n	oyituryetwrq</p>\r\n<p>\r\n	oyituryetwrqoyituryetwrq</p>\r\n<p>\r\n	oyituryetwrqoyituryetwrqoyituryetwrq</p>\r\n<p>\r\n	oyituryetwrq</p>', NULL, NULL, 5, NULL, 0, 'ou8yti7turye', 'دکتر', 1, 'product', NULL, NULL, '2020-12-13 04:16:02', '2020-12-22 06:47:08', 3, '<p>\r\n	نمالبیلاتنمبلاببلبللب</p>\r\n<p>\r\n	نتاتلالالببیی</p>\r\n<p>\r\n	ذذذذذذذ</p>', 'sadjadsamrad68@gmail.com', 'تهران،تهران،', '۰۲۱۳۴۵۶۷۸۹', 'https://www.instagram.com', 'https://www.t.me', 'https://www.whatsapp.com', 'https://www.twitter.com', 'https://www.facebook.com'),
(27, 'uytrew', 'بیسس', 'بیسش', '956cat1.jpg', '<p>\r\n	ثسش</p>', NULL, NULL, 5, NULL, 0, 'بیسش', 'fdsasdfgs', 1, 'product', NULL, NULL, '2020-12-24 03:25:49', '2020-12-30 01:56:20', 3, '<p>\r\n	بی</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, '17111bfe2249f4fa53e0673839f50d4a.png', NULL, '2020-11-10 04:34:04', '2020-11-10 04:34:04'),
(2, 2, '549df1cc66d7f1281c647b816489393b.png', NULL, '2020-11-10 04:35:10', '2020-11-10 04:35:10'),
(3, 25, '138cat1.jpg', NULL, '2020-12-13 05:43:57', '2020-12-24 01:40:58'),
(4, 25, '731cat1.jpg', NULL, '2020-12-24 01:45:05', '2020-12-24 01:45:05'),
(5, 25, '172cat1.jpg', NULL, '2020-12-24 01:45:13', '2020-12-24 01:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `redirect`
--

CREATE TABLE `redirect` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `old_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `new_address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permission`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'مدیر کل', 'a:22:{s:4:\"user\";a:9:{s:5:\"index\";s:1:\"1\";s:3:\"add\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";s:6:\"delete\";s:1:\"1\";s:5:\"group\";s:1:\"1\";s:8:\"groupAdd\";s:1:\"1\";s:9:\"groupEdit\";s:1:\"1\";s:11:\"groupDelete\";s:1:\"1\";s:14:\"changePassword\";s:1:\"1\";}s:8:\"products\";a:17:{s:5:\"index\";s:1:\"1\";s:3:\"add\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";s:6:\"delete\";s:1:\"1\";s:5:\"image\";s:1:\"1\";s:8:\"imageAdd\";s:1:\"1\";s:9:\"imageEdit\";s:1:\"1\";s:11:\"imageDelete\";s:1:\"1\";s:4:\"sort\";s:1:\"1\";s:5:\"glory\";s:1:\"1\";s:8:\"gloryAdd\";s:1:\"1\";s:9:\"gloryEdit\";s:1:\"1\";s:11:\"gloryDelete\";s:1:\"1\";s:4:\"tool\";s:1:\"1\";s:7:\"toolAdd\";s:1:\"1\";s:8:\"toolEdit\";s:1:\"1\";s:10:\"toolDelete\";s:1:\"1\";}s:7:\"banners\";a:4:{s:5:\"index\";s:1:\"1\";s:3:\"add\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";s:6:\"delete\";s:1:\"1\";}s:5:\"envos\";a:4:{s:5:\"index\";s:1:\"1\";s:3:\"add\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";s:6:\"delete\";s:1:\"1\";}s:7:\"insures\";a:4:{s:5:\"index\";s:1:\"1\";s:3:\"add\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";s:6:\"delete\";s:1:\"1\";}s:6:\"states\";a:4:{s:5:\"index\";s:1:\"1\";s:3:\"add\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";s:6:\"delete\";s:1:\"1\";}s:6:\"cities\";a:4:{s:5:\"index\";s:1:\"1\";s:3:\"add\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";s:6:\"delete\";s:1:\"1\";}s:5:\"areas\";a:4:{s:5:\"index\";s:1:\"1\";s:3:\"add\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";s:6:\"delete\";s:1:\"1\";}s:8:\"articles\";a:5:{s:5:\"index\";s:1:\"1\";s:3:\"add\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";s:6:\"delete\";s:1:\"1\";s:4:\"sort\";s:1:\"1\";}s:8:\"category\";a:4:{s:5:\"index\";s:1:\"1\";s:3:\"add\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";s:6:\"delete\";s:1:\"1\";}s:10:\"arcategory\";a:4:{s:5:\"index\";s:1:\"1\";s:3:\"add\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";s:6:\"delete\";s:1:\"1\";}s:6:\"slider\";a:4:{s:5:\"index\";s:1:\"1\";s:3:\"add\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";s:6:\"delete\";s:1:\"1\";}s:4:\"ista\";a:5:{s:4:\"list\";s:1:\"1\";s:5:\"index\";s:1:\"1\";s:3:\"add\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";s:6:\"delete\";s:1:\"1\";}s:7:\"socials\";a:4:{s:5:\"index\";s:1:\"1\";s:3:\"add\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";s:6:\"delete\";s:1:\"1\";}s:7:\"setting\";a:2:{s:5:\"index\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";}s:7:\"sitemap\";a:2:{s:5:\"index\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";}s:8:\"redirect\";a:3:{s:5:\"index\";s:1:\"1\";s:3:\"add\";s:1:\"1\";s:6:\"delete\";s:1:\"1\";}s:8:\"uploader\";a:4:{s:5:\"index\";s:1:\"1\";s:3:\"add\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";s:6:\"delete\";s:1:\"1\";}s:7:\"cropper\";a:1:{s:5:\"index\";s:1:\"1\";}s:7:\"comment\";a:4:{s:5:\"index\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";s:6:\"delete\";s:1:\"1\";s:5:\"excel\";s:1:\"1\";}s:7:\"contact\";a:4:{s:5:\"index\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";s:6:\"delete\";s:1:\"1\";s:5:\"excel\";s:1:\"1\";}s:10:\"fullAccess\";i:0;}', NULL, NULL, NULL),
(2, 'مدیریت داخلی', 'a:14:{s:4:\"user\";a:2:{s:5:\"index\";s:1:\"1\";s:14:\"changePassword\";s:1:\"1\";}s:8:\"products\";a:1:{s:5:\"index\";s:1:\"1\";}s:4:\"pics\";a:1:{s:5:\"index\";s:1:\"1\";}s:8:\"articles\";a:1:{s:5:\"index\";s:1:\"1\";}s:8:\"category\";a:2:{s:4:\"list\";s:1:\"1\";s:5:\"index\";s:1:\"1\";}s:6:\"slider\";a:1:{s:5:\"index\";s:1:\"1\";}s:7:\"socials\";a:1:{s:5:\"index\";s:1:\"1\";}s:7:\"setting\";a:1:{s:5:\"index\";s:1:\"1\";}s:7:\"sitemap\";a:1:{s:5:\"index\";s:1:\"1\";}s:8:\"redirect\";a:1:{s:5:\"index\";s:1:\"1\";}s:8:\"uploader\";a:1:{s:5:\"index\";s:1:\"1\";}s:7:\"cropper\";a:1:{s:5:\"index\";s:1:\"1\";}s:7:\"comment\";a:1:{s:5:\"index\";s:1:\"1\";}s:10:\"fullAccess\";i:0;}', NULL, NULL, NULL),
(3, 'ویرایش کننده', 'a:15:{s:4:\"user\";a:2:{s:5:\"index\";s:1:\"1\";s:14:\"changePassword\";s:1:\"1\";}s:8:\"products\";a:2:{s:5:\"index\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";}s:4:\"pics\";a:3:{s:5:\"index\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";s:5:\"edit2\";s:1:\"1\";}s:7:\"banners\";a:2:{s:5:\"index\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";}s:6:\"states\";a:2:{s:5:\"index\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";}s:6:\"cities\";a:2:{s:5:\"index\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";}s:8:\"articles\";a:2:{s:5:\"index\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";}s:8:\"category\";a:3:{s:4:\"list\";s:1:\"1\";s:5:\"index\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";}s:6:\"slider\";a:2:{s:5:\"index\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";}s:7:\"socials\";a:2:{s:5:\"index\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";}s:7:\"setting\";a:2:{s:5:\"index\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";}s:7:\"comment\";a:3:{s:5:\"index\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";s:5:\"excel\";s:1:\"1\";}s:7:\"contact\";a:3:{s:5:\"index\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";s:5:\"excel\";s:1:\"1\";}s:7:\"setcity\";a:1:{s:5:\"index\";s:1:\"1\";}s:10:\"fullAccess\";i:0;}', NULL, NULL, NULL),
(4, 'کاربر', 'a:5:{s:4:\"user\";a:1:{s:14:\"changePassword\";s:1:\"1\";}s:8:\"products\";a:21:{s:5:\"index\";s:1:\"1\";s:3:\"add\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";s:6:\"delete\";s:1:\"1\";s:5:\"image\";s:1:\"1\";s:8:\"imageAdd\";s:1:\"1\";s:9:\"imageEdit\";s:1:\"1\";s:11:\"imageDelete\";s:1:\"1\";s:4:\"sort\";s:1:\"1\";s:5:\"glory\";s:1:\"1\";s:8:\"gloryAdd\";s:1:\"1\";s:9:\"gloryEdit\";s:1:\"1\";s:11:\"gloryDelete\";s:1:\"1\";s:4:\"tool\";s:1:\"1\";s:7:\"toolAdd\";s:1:\"1\";s:8:\"toolEdit\";s:1:\"1\";s:10:\"toolDelete\";s:1:\"1\";s:7:\"disease\";s:1:\"1\";s:10:\"diseaseAdd\";s:1:\"1\";s:11:\"diseaseEdit\";s:1:\"1\";s:13:\"diseaseDelete\";s:1:\"1\";}s:8:\"uploader\";a:4:{s:5:\"index\";s:1:\"1\";s:3:\"add\";s:1:\"1\";s:4:\"edit\";s:1:\"1\";s:6:\"delete\";s:1:\"1\";}s:7:\"cropper\";a:1:{s:5:\"index\";s:1:\"1\";}s:10:\"fullAccess\";i:0;}', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(105, 2),
(2, 2),
(3, 4),
(12, 4),
(13, 4);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abouttitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci,
  `about2` longtext COLLATE utf8mb4_unicode_ci,
  `about3` longtext COLLATE utf8mb4_unicode_ci,
  `aboutimg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` longtext COLLATE utf8mb4_unicode_ci,
  `maps` longtext COLLATE utf8mb4_unicode_ci,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` longtext COLLATE utf8mb4_unicode_ci,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  `description_seo` longtext COLLATE utf8mb4_unicode_ci,
  `logo_water_mark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rules` longtext COLLATE utf8mb4_unicode_ci,
  `sitemap` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sitemaptime` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sitemapimg` tinyint(1) DEFAULT NULL,
  `sitemapactive` tinyint(1) DEFAULT NULL,
  `sitemapcat` tinyint(1) DEFAULT NULL,
  `color1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `articlenumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `productnumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `title`, `logo`, `favicon`, `abouttitle`, `about`, `about2`, `about3`, `aboutimg`, `contact`, `maps`, `type`, `email`, `address`, `description_seo`, `logo_water_mark`, `phone`, `deleted_at`, `created_at`, `updated_at`, `rules`, `sitemap`, `sitemaptime`, `sitemapimg`, `sitemapactive`, `sitemapcat`, `color1`, `color2`, `articlenumber`, `productnumber`) VALUES
(1, '1', '924tava.png', '196tava.png', '1', '<p>\r\n	۱</p>', '۱', '۱', '1', '۱', '۱', '1', '۱', '۱', '1', 'bf6e2e22c02bfc8b261a4fc5c28e585c.png', '۱', NULL, '2020-11-21 09:26:52', '2020-12-22 14:40:31', '1', '1', 'daily', 1, 1, 1, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `title`, `image`, `address`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'telegram', 'fab fa-telegram-plane', 'https://t.me', NULL, '2020-11-21 06:47:31', '2020-11-21 06:47:31'),
(2, 'instagram', 'fab fa-instagram', 'https://www.instagram.com', NULL, '2020-12-22 14:34:06', '2020-12-22 14:34:06'),
(3, 'whatsapp', 'fab fa-whatsapp', 'https://www.whatsapp.com', NULL, '2020-12-22 14:35:38', '2020-12-22 14:35:38'),
(4, 'facebook', 'fab fa-facebook-f', 'https://www.facebook.com', NULL, '2020-12-22 14:36:37', '2020-12-22 14:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'گیلان', 1, NULL, NULL, NULL),
(5, 'تهران', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `toolway_service`
--

CREATE TABLE `toolway_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tool_service`
--

CREATE TABLE `tool_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tool_service`
--

INSERT INTO `tool_service` (`id`, `title`, `product_id`, `category_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'کتابهای زیادی در شصت و سه درصد گذشته//////', 25, 12, NULL, '2020-12-22 13:02:16', '2020-12-22 13:22:09'),
(2, 'کتابهای زیادی در شصت و سه درصد گذشته', 25, 11, '2020-12-22 13:05:01', '2020-12-22 13:03:46', '2020-12-22 13:05:01'),
(3, 'کتابهای زیادی در شصت و سه درصد گذشته', 25, 12, NULL, '2020-12-22 13:04:35', '2020-12-22 13:04:35'),
(4, 'کتابهای زیادی در شصت و سه درصد گذشته', 25, 10, NULL, '2020-12-22 13:04:46', '2020-12-22 13:04:46'),
(5, 'کتابهای زیادی در شصت و سه درصد گذشته', 25, 12, NULL, '2020-12-22 13:04:52', '2020-12-22 13:04:52'),
(6, 'کتابهای زیادی در شصت و سه درصد گذشتهgg', 25, 10, NULL, '2020-12-22 13:05:09', '2020-12-22 13:22:21'),
(7, 'کتابهای زیادی در شصت و سه درصد گذشته', 25, 11, NULL, '2020-12-22 13:05:17', '2020-12-22 13:05:17'),
(8, 'kjhghgfdsa', 24, 12, NULL, '2020-12-22 13:20:11', '2020-12-22 13:20:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm` tinyint(1) NOT NULL DEFAULT '0',
  `confirmation_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `last_login` timestamp NULL DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manager` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `confirm`, `confirmation_token`, `admin`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `parent_id`, `status`, `last_login`, `phone`, `manager`) VALUES
(1, 'Admin', 'info@rahweb.com', NULL, '$2y$10$upehZbxksOrUBez8jqb24uEDQD34HknBGrY2WBGuDsNMMZJ/3OwFu', 1, NULL, 1, 'afvLQAtUQzUunSaqJjlslmzUQ5gla5KGyLCq4cWxHKSTK6Y9ZFCDkrpYAcMi', '2020-08-26 02:34:51', '2020-12-26 16:52:56', NULL, 0, 1, NULL, '', 0),
(3, 'sadjad@yahoo.com', 'sadjad@yahoo.com', NULL, '$2y$10$Gt..IukO.Dv9ziErkcNzLO3sXr8rnugnxIzHg4CYwz232z4K5NQIm', 1, NULL, 0, NULL, '2020-10-04 08:19:56', '2020-12-30 01:43:21', NULL, NULL, 1, NULL, '', 0),
(11, 'سجاد', 'er.sadjad@gmail.com', NULL, '$2y$10$J1.2lBaROor5DZDkP32Xae7CPTmThq4KSt9Ye0/44XXyT5ArN9aAu', 1, NULL, 0, NULL, '2020-12-15 04:07:29', '2020-12-24 02:03:23', NULL, NULL, 1, NULL, '09198633556', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_service`
--

CREATE TABLE `user_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_service`
--

INSERT INTO `user_service` (`id`, `product_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 24, 3, NULL, '2020-12-13 03:57:41', '2020-12-13 03:57:41'),
(2, 25, 3, NULL, '2020-12-13 04:16:02', '2020-12-13 04:16:02'),
(3, 26, 3, NULL, '2020-12-22 14:21:49', '2020-12-22 14:21:49'),
(4, 27, 3, NULL, '2020-12-24 03:25:49', '2020-12-24 03:25:49');

-- --------------------------------------------------------

--
-- Table structure for table `way_service`
--

CREATE TABLE `way_service` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `product_id` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `online` longtext COLLATE utf8mb4_unicode_ci,
  `home` longtext COLLATE utf8mb4_unicode_ci,
  `person` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `way_service`
--

INSERT INTO `way_service` (`id`, `title`, `type`, `status`, `product_id`, `deleted_at`, `created_at`, `updated_at`, `online`, `home`, `person`) VALUES
(1, NULL, NULL, 0, 25, NULL, '2020-12-22 05:20:12', '2020-12-22 05:20:12', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو //////');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_service`
--
ALTER TABLE `category_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disease_service`
--
ALTER TABLE `disease_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `environments`
--
ALTER TABLE `environments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `env_service`
--
ALTER TABLE `env_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `glory_service`
--
ALTER TABLE `glory_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurances`
--
ALTER TABLE `insurances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurance_service`
--
ALTER TABLE `insurance_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redirect`
--
ALTER TABLE `redirect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toolway_service`
--
ALTER TABLE `toolway_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tool_service`
--
ALTER TABLE `tool_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_confirmation_token_unique` (`confirmation_token`);

--
-- Indexes for table `user_service`
--
ALTER TABLE `user_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `way_service`
--
ALTER TABLE `way_service`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category_service`
--
ALTER TABLE `category_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `disease_service`
--
ALTER TABLE `disease_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `environments`
--
ALTER TABLE `environments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `env_service`
--
ALTER TABLE `env_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `glory_service`
--
ALTER TABLE `glory_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `insurances`
--
ALTER TABLE `insurances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `insurance_service`
--
ALTER TABLE `insurance_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `redirect`
--
ALTER TABLE `redirect`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `toolway_service`
--
ALTER TABLE `toolway_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tool_service`
--
ALTER TABLE `tool_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_service`
--
ALTER TABLE `user_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `way_service`
--
ALTER TABLE `way_service`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
