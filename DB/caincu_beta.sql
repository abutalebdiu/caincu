-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 31, 2021 at 07:01 AM
-- Server version: 10.3.23-MariaDB-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caincu_beta`
--

-- --------------------------------------------------------

--
-- Table structure for table `beauty_centers`
--

CREATE TABLE `beauty_centers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beauty_centers`
--

INSERT INTO `beauty_centers` (`id`, `name_en`, `name_ar`, `owner`, `mobile`, `email`, `address`, `is_verified`, `created_at`, `updated_at`) VALUES
(1, 'Lawrence Stevenson', 'دكتور. موهين علي a', 'Gail Guy', 'Ursula Roy', 'dikusixu@mailinator.com', 'Autem unde corporis', 2, '2021-05-26 20:46:12', '2021-05-26 21:53:51'),
(2, 'Ariana Huffman', 'Eve Nicholson', 'Emmanuel Hoover', 'Macy Banks', 'bija@mailinator.com', 'Dolore ut voluptatem', 1, '2021-05-26 20:47:49', '2021-05-26 20:47:49'),
(3, 'Beverly Gomez', 'Acton Lopez', 'Basil Johnston', 'Hoyt Day', 'xexisu@mailinator.com', 'Officia dolor minima', NULL, '2021-05-30 12:21:15', '2021-05-30 12:21:15'),
(4, 'zdfg', 'sdfgsdf', 'sdfg', '01988139009', 'as@ga.com', 'sdfas', NULL, '2021-05-30 22:03:01', '2021-05-30 22:03:01'),
(5, 'zdfg', 'sdfgsdf', 'sdfg', '01988139009', 'moinul@gmail.com', 'sdfasdf', NULL, '2021-05-30 22:07:56', '2021-05-30 22:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `en_name`, `ar_name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Square', 'ميدان', 'square', '1', '2021-05-01 10:17:19', '2021-05-01 10:17:19'),
(4, 'gsk', 'gsk', 'gsk', '1', '2021-05-01 10:18:21', '2021-05-01 10:18:21');

-- --------------------------------------------------------

--
-- Table structure for table `capitals`
--

CREATE TABLE `capitals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `capitals`
--

INSERT INTO `capitals` (`id`, `name`, `name_ar`, `country_id`, `is_active`, `is_verified`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Riyadh', 'الرياض‎', 5, 1, 1, NULL, NULL, '2021-05-02 14:31:41', '2021-05-02 14:31:41');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `child_id` int(11) NOT NULL DEFAULT 1,
  `position` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `ar_name`, `slug`, `parent_id`, `child_id`, `position`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Herbal & Nutraceuticals', 'الأعشاب والمغذيات', 'herbal-nutraceuticals', 0, 0, 1, 1, NULL, '2021-05-02 14:22:26', '2021-05-02 14:22:26'),
(2, 'Health Care Products', 'منتجات الرعاية الصحية', 'health-care-products', 0, 0, 1, 1, NULL, '2021-05-02 14:22:42', '2021-05-02 14:22:42'),
(3, 'Personal Care Products', 'منتجات العناية الشخصية', 'personal-care-products', 0, 0, 1, 1, NULL, '2021-05-02 14:22:59', '2021-05-02 14:22:59'),
(4, 'Baby care', 'العناية بالطفل', 'baby-care', 0, 0, 1, 1, NULL, '2021-05-02 14:23:25', '2021-05-02 14:23:25'),
(5, 'Men\'s care', 'العناية بالرجل', 'men-s-care', 0, 0, 1, 1, NULL, '2021-05-02 14:23:36', '2021-05-02 14:23:36'),
(6, 'Women\'s care', 'العناية بالمرأة', 'women-s-care', 0, 0, 1, 1, NULL, '2021-05-02 14:23:51', '2021-05-02 14:23:51'),
(7, 'Prescription Medicine', 'وصفات الدواء', 'prescription-medicine', 0, 0, 1, 1, NULL, '2021-05-02 14:24:09', '2021-05-02 14:24:09'),
(8, 'Skin Care Products', 'منتجات العنايه بالبشره', 'skin-care-products', 0, 0, 1, 1, NULL, '2021-05-02 14:24:19', '2021-05-02 14:24:19'),
(9, 'syrap', NULL, 'Syrap', 0, 0, 1, 0, NULL, '2021-05-06 10:31:55', '2021-05-06 10:35:13'),
(10, 'medicine', 'ar', 'medicine', 0, 0, 1, 0, NULL, '2021-05-06 10:34:00', '2021-05-06 10:35:07'),
(11, 'medicine sub', 'ar', 'medicine-sub', 10, 1, 1, 1, NULL, '2021-05-06 10:34:21', '2021-05-06 10:34:21');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capital_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `name_ar`, `capital_id`, `country_id`, `is_active`, `is_verified`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(6, 'Abha', 'أبها', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:36:52', '2021-05-02 14:36:52'),
(7, 'AlKhafji', 'الأحساء', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:38:06', '2021-05-02 14:38:06'),
(8, 'Alahsa', 'الباحة', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:38:29', '2021-05-02 14:38:29'),
(9, 'Albaha', 'الجبيل', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:38:39', '2021-05-02 14:38:39'),
(10, 'Alkharj', 'الجبيل', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:38:51', '2021-05-02 14:38:51'),
(11, 'Alqasim', 'الجوف', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:39:01', '2021-05-02 14:39:01'),
(12, 'Alquryat', 'الخبر', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:39:33', '2021-05-02 14:39:33'),
(13, 'Altaif', 'الخفجي', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:39:49', '2021-05-02 14:39:49'),
(14, 'Arar', 'الدمام', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:40:01', '2021-05-02 14:40:01'),
(15, 'Aseer', 'الرياض', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:40:12', '2021-05-02 14:40:12'),
(16, 'Buraidah', 'الطائف', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:40:24', '2021-05-02 14:40:24'),
(17, 'Dammam', 'القريات', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:40:34', '2021-05-02 14:40:34'),
(18, 'Dhahran Al Janoub', 'القصيم', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:40:49', '2021-05-02 14:40:49'),
(19, 'Hafr Albaten', 'القطيف', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:41:02', '2021-05-02 14:41:02'),
(20, 'Hail', 'المدينه المنوره', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:41:21', '2021-05-02 14:41:21'),
(21, 'Hofof', 'الهفوف', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:41:56', '2021-05-02 14:41:56'),
(22, 'Jeddah', 'بريدة', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:42:06', '2021-05-02 14:42:06'),
(23, 'Jizan', 'تبوك', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:42:21', '2021-05-02 14:42:21'),
(24, 'Jouf', 'جازان', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:42:29', '2021-05-02 14:42:29'),
(25, 'Jubail', 'جدة', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:42:38', '2021-05-02 14:42:38'),
(26, 'Khamis Mushait', 'حائل', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:42:50', '2021-05-02 14:42:50'),
(27, 'Khobar', 'حفر الباطن', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:43:03', '2021-05-02 14:43:03'),
(28, 'Mecca', 'خميس مشيط', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:43:14', '2021-05-02 14:43:14'),
(29, 'Medina', 'سكاكا', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:43:26', '2021-05-02 14:43:26'),
(30, 'Najran', 'عرعر', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:43:51', '2021-05-02 14:43:51'),
(31, 'Onaizah', 'عسير', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:43:59', '2021-05-02 14:43:59'),
(32, 'Qatif', 'مكة المكرمة', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:44:12', '2021-05-02 14:44:12'),
(33, 'Sakaka', 'نجران', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:44:28', '2021-05-02 14:44:28'),
(34, 'Tabouk', 'ينبع', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:44:38', '2021-05-02 14:44:38'),
(35, 'Yanbu', 'عنيزة', 1, 1, 1, 1, NULL, NULL, '2021-05-02 14:44:48', '2021-05-02 14:44:48');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `familyname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `name_ar`, `is_active`, `is_verified`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Saudi Arabia', 'المملكة العربية السعودية', 1, 1, NULL, NULL, '2021-05-02 14:29:55', '2021-05-02 14:29:55');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialty_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `first_name`, `last_name`, `mobile`, `email`, `name_ar`, `specialty_id`, `status`, `is_active`, `is_verified`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Malcolm Summers', NULL, 'دكتور. موهين علي', 14, 1, 1, 1, NULL, NULL, '2021-05-22 06:41:01', '2021-05-22 06:41:01'),
(2, NULL, NULL, '01456456445', NULL, 'Regina Eaton', 34, 1, 1, 1, NULL, NULL, '2021-05-22 06:49:28', '2021-05-22 06:49:28'),
(3, NULL, NULL, '0165456456', NULL, 'دكتور. موهين علي a', 15, 1, 1, 1, NULL, NULL, '2021-05-22 06:51:24', '2021-05-22 06:51:24'),
(4, NULL, NULL, '01675464565', NULL, 'عين', 19, 1, 1, 1, NULL, NULL, '2021-05-22 08:22:09', '2021-05-22 08:22:09'),
(5, NULL, NULL, '0345646456456', NULL, 'دكتور. موهين علي a', 10, 1, 1, 2, NULL, NULL, '2021-05-22 08:24:15', '2021-05-23 11:31:25'),
(6, NULL, NULL, '05688745', NULL, 'دكتور. موهين علي', 22, 1, 1, 1, NULL, NULL, '2021-05-22 11:19:49', '2021-05-22 11:19:49'),
(7, NULL, NULL, 'Macey Stephens', NULL, 'دكتور. موهين علي', 9, 1, 1, 1, NULL, NULL, '2021-05-22 11:26:31', '2021-05-22 11:26:31'),
(8, 'Rana', 'Doris', 'Hayden', 'poxaf@mailinator.com', 'Hermione Hodge', 20, 1, 1, 1, NULL, NULL, '2021-05-30 10:49:24', '2021-05-30 10:49:24');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_appointments`
--

CREATE TABLE `doctor_appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `organization_branch_id` int(11) NOT NULL,
  `doctor_schedule_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_appointments`
--

INSERT INTO `doctor_appointments` (`id`, `user_id`, `doctor_id`, `organization_branch_id`, `doctor_schedule_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 12, 5, 1, 1, '2021-05-04 17:45:18', '2021-05-04 17:45:18'),
(2, 5, 12, 5, 1, 1, '2021-05-05 14:29:33', '2021-05-05 14:29:33'),
(3, 5, 13, 5, 1, 1, '2021-05-06 09:15:23', '2021-05-06 09:15:23');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_organization_branches`
--

CREATE TABLE `doctor_organization_branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `specialty_id` int(11) DEFAULT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `organization_branch_id` int(11) DEFAULT NULL,
  `organization_city_id` int(11) DEFAULT NULL,
  `doctor_schedule_id` int(11) DEFAULT NULL,
  `organization_type_id` int(10) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_organization_branches`
--

INSERT INTO `doctor_organization_branches` (`id`, `doctor_id`, `specialty_id`, `organization_id`, `organization_branch_id`, `organization_city_id`, `doctor_schedule_id`, `organization_type_id`, `status`, `is_active`, `is_verified`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 14, 37, 4, 5, 22, 1, 15, 1, 1, 1, NULL, NULL, '2021-05-03 15:56:47', '2021-05-06 10:40:22'),
(3, 13, 37, 4, 5, 6, 1, 9, 1, 1, 1, NULL, NULL, '2021-05-06 08:42:35', '2021-05-06 08:42:35'),
(4, 14, 36, 4, 5, 8, 1, 10, 1, 1, 1, NULL, NULL, '2021-05-06 08:42:56', '2021-05-06 08:42:56'),
(5, 13, 37, 4, 5, 17, 1, 10, 1, 1, 1, NULL, NULL, '2021-05-06 10:40:01', '2021-05-06 10:40:01');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_schedules`
--

CREATE TABLE `doctor_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `organization_branch_id` int(11) DEFAULT NULL,
  `start_time` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_schedules`
--

INSERT INTO `doctor_schedules` (`id`, `doctor_id`, `organization_branch_id`, `start_time`, `end_time`, `day`, `note`, `status`, `is_active`, `is_verified`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 12, 5, '10:00', '12:00', 'Saturday, Sunday, Monday', NULL, 1, 1, 1, NULL, NULL, '2021-05-03 14:22:20', '2021-05-03 14:22:20');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gyms`
--

CREATE TABLE `gyms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` int(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gyms`
--

INSERT INTO `gyms` (`id`, `name_en`, `name_ar`, `owner`, `mobile`, `email`, `address`, `is_verified`, `created_at`, `updated_at`) VALUES
(1, 'Jarrod Pruitt', 'دكتور. موهين علي', 'Abbot Morrison', '6756756756756', 'jinuv@mailinator.com', 'Modi magna quaerat n', 2, '2021-05-26 20:18:41', '2021-05-26 21:30:13'),
(2, 'Curran Johnston', 'Raya Gilbert', 'Preston Figueroa', 'Inga Cannon', 'bomevoc@mailinator.com', 'Et voluptatum volupt', 1, '2021-05-26 20:20:49', '2021-05-26 20:20:49'),
(3, 'Perry Vaughn', 'Chloe Rich', 'Nathan Rosa', 'Micah Stout', 'sezuzulo@mailinator.com', 'Cupiditate ut labore', 1, '2021-05-26 20:22:14', '2021-05-26 20:22:14'),
(4, 'Isaiah Henson', 'Caldwell Cote', 'Cora Perez', 'Porter Long', 'lusohyv@mailinator.com', 'Officiis dolorem acc', NULL, '2021-05-30 12:15:46', '2021-05-30 12:15:46'),
(5, 'Fiona Wise', 'Althea Bolton', 'Sarah Tillman', 'Zeus Ramos', 'wyjysosej@mailinator.com', 'Excepteur et eaque e', NULL, '2021-05-30 12:16:05', '2021-05-30 12:16:05'),
(6, 'Victoria Johnson', 'Melyssa Carson', 'Jasmine Kelly', 'Reece Grimes', 'wizikojoty@mailinator.com', 'Sequi et est laboris', NULL, '2021-05-30 12:16:40', '2021-05-30 12:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `home_care_categories`
--

CREATE TABLE `home_care_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_care_categories`
--

INSERT INTO `home_care_categories` (`id`, `name`, `name_ar`, `status`, `is_active`, `is_verified`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'home care name update', 'دكتور. موهين علي', 1, 1, 1, NULL, NULL, '2021-04-26 11:16:32', '2021-04-28 18:01:39'),
(3, 'home care name 2', NULL, 2, 1, 1, NULL, NULL, '2021-04-26 11:16:46', '2021-04-26 11:16:46'),
(4, 'raihan', 'أرانوك', 1, 1, 1, NULL, NULL, '2021-04-28 09:09:11', '2021-04-28 09:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `home_care_services`
--

CREATE TABLE `home_care_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_care_services`
--

INSERT INTO `home_care_services` (`id`, `name`, `name_ar`, `category_id`, `description`, `status`, `is_active`, `is_verified`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'bokul islam update', 'دكتور. موهين علي', 2, 'asdfasdfasdf', 1, 1, 1, NULL, NULL, '2021-04-26 14:05:24', '2021-04-28 18:12:45'),
(3, 'asdfasdf', NULL, 3, 'asdfasd', 2, 1, 1, NULL, NULL, '2021-04-26 14:05:37', '2021-04-26 14:05:37'),
(4, 'bokul islam', NULL, 2, 'gsgdsdgsdfgsdf', 2, 1, 1, NULL, NULL, '2021-04-28 09:14:51', '2021-04-28 09:14:51'),
(5, 'raihan update', 'دكتور. موهين علي', 2, 'fg sdfgsdfg', 1, 1, 1, NULL, NULL, '2021-04-28 09:16:09', '2021-04-28 09:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `home_care_service_requests`
--

CREATE TABLE `home_care_service_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `service_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `familyname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `service` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_care_service_requests`
--

INSERT INTO `home_care_service_requests` (`id`, `user_id`, `category_id`, `service_id`, `name`, `familyname`, `phonenumber`, `email`, `city_id`, `service`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 2, 'prince', 'Home', '0178965874', 'admin@gmail.com', 6, 'afasd', 1, '2021-05-05 05:32:18', '2021-05-05 05:32:18');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialty_id` int(3) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `name`, `name_ar`, `mobile`, `address`, `email`, `specialty_id`, `status`, `is_active`, `is_verified`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Amery Thornton', 'Luke Vega', 'Cruz Vargas', 'Recusandae Sed dese', NULL, NULL, 1, 1, 1, NULL, NULL, '2021-05-22 12:23:29', '2021-05-22 12:23:29'),
(2, 'Cara Mcintyre', 'دكتور. موهين علي', '3523453453', 'Iste eius enim et de', 'nitu@mailinator.com', NULL, 1, 1, 1, NULL, NULL, '2021-05-22 12:30:50', '2021-05-23 11:28:45'),
(3, 'Jescie Lamb', 'Shaeleigh Weber', 'Vance Guerra', 'Ipsam qui magna null', 'cycevehevo@mailinator.com', 18, 1, 1, 1, NULL, NULL, '2021-05-30 11:13:58', '2021-05-30 11:13:58');

-- --------------------------------------------------------

--
-- Table structure for table `medical_centers`
--

CREATE TABLE `medical_centers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialty_id` int(5) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_centers`
--

INSERT INTO `medical_centers` (`id`, `name`, `name_ar`, `mobile`, `address`, `email`, `specialty_id`, `status`, `is_active`, `is_verified`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Amity Mcguire', 'Kalia Ashley', 'Beatrice Rosa', 'Enim in qui repudian', 'reham@mailinator.com', 36, 1, 1, 1, NULL, NULL, '2021-05-30 11:49:11', '2021-05-30 11:49:11');

-- --------------------------------------------------------

--
-- Table structure for table `medical_tourism_categories`
--

CREATE TABLE `medical_tourism_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_tourism_categories`
--

INSERT INTO `medical_tourism_categories` (`id`, `name`, `name_ar`, `status`, `is_active`, `is_verified`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'raihan update', 'دكتور. موهين علي', 2, 1, 1, NULL, NULL, '2021-04-26 09:11:28', '2021-04-28 17:22:10'),
(3, 'catagery11', NULL, 2, 1, 1, NULL, NULL, '2021-04-26 09:12:00', '2021-04-26 09:12:00'),
(5, 'bokul', NULL, 2, 1, 1, NULL, NULL, '2021-04-26 09:54:47', '2021-04-26 09:54:47'),
(6, 'asdfasdf', NULL, 1, 1, 1, NULL, NULL, '2021-04-26 10:05:50', '2021-04-26 10:05:50'),
(7, 'raihana', NULL, 2, 1, 1, NULL, NULL, '2021-04-26 14:06:50', '2021-04-26 14:06:50'),
(8, 'raihan', 'دكتور. موهين علي', 2, 1, 1, NULL, NULL, '2021-04-28 08:39:34', '2021-04-28 08:39:34'),
(9, 'some name', 'ar', 1, 1, 1, NULL, NULL, '2021-05-06 10:40:59', '2021-05-06 10:40:59');

-- --------------------------------------------------------

--
-- Table structure for table `medical_tourism_services`
--

CREATE TABLE `medical_tourism_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medical_tourism_services`
--

INSERT INTO `medical_tourism_services` (`id`, `name`, `name_ar`, `category_id`, `description`, `status`, `is_active`, `is_verified`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'raihan update', 'دكتور. موهين علي', 3, 'asdfasf', 1, 1, 1, NULL, NULL, '2021-04-26 14:53:55', '2021-04-28 17:49:01'),
(3, 'asdfasdf', NULL, 5, 'asdfasgdgdsg', 2, 1, 1, NULL, NULL, '2021-04-26 14:54:12', '2021-04-26 14:54:12'),
(4, 'bokul', 'دكتور. موهين علي', 3, 'asfasdf', 2, 1, 1, NULL, NULL, '2021-04-28 09:03:00', '2021-04-28 09:03:00');

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
(4, '2021_01_31_101542_create_categories_table', 1),
(5, '2021_01_31_101921_create_news_table', 1),
(6, '2021_01_31_103044_create_news_categories_table', 1),
(7, '2021_01_31_103144_create_news_tags_table', 1),
(8, '2021_01_31_103210_create_tags_table', 1),
(9, '2021_01_31_103338_create_man_powers_table', 1),
(10, '2021_01_31_104448_create_galleries_table', 1),
(11, '2021_01_31_104925_create_ads_table', 1),
(12, '2021_01_31_105002_create_ads_positions_table', 1),
(13, '2021_01_31_105021_create_social_media_table', 1),
(14, '2021_01_31_105043_create_website_settings_table', 1),
(15, '2021_01_31_105059_create_polls_table', 2),
(16, '2021_01_31_171120_create_divisions_table', 3),
(17, '2021_01_31_171129_create_districts_table', 3),
(18, '2021_01_31_171143_create_thanas_table', 3),
(19, '2021_02_09_010838_create_page_lists_table', 4),
(20, '2021_03_06_175815_create_letter_boxes_table', 5),
(21, '2021_03_14_125716_create_poll_awnsers_table', 5),
(22, '2021_03_20_104130_create_roles_table', 6),
(23, '2021_03_23_112803_create_poll_values_table', 7),
(24, '2021_04_23_121732_create_brands_table', 8),
(25, '2021_04_24_150850_create_home_care_categories_table', 8),
(26, '2021_04_24_150912_create_home_care_services_table', 8),
(27, '2021_04_24_150957_create_medical_tourism_categories_table', 8),
(28, '2021_04_24_151013_create_medical_tourism_services_table', 8),
(29, '2021_04_24_151035_create_countries_table', 8),
(30, '2021_04_24_151052_create_capitals_table', 8),
(31, '2021_04_24_151111_create_cities_table', 8),
(32, '2021_04_24_151132_create_tele_medicine_typies_table', 8),
(33, '2021_04_24_151148_create_specialties_table', 8),
(34, '2021_04_24_151251_create_organization_typies_table', 8),
(36, '2021_04_24_151329_create_organization_branches_table', 8),
(38, '2021_04_24_151359_create_doctor_schedules_table', 8),
(39, '2021_04_24_151417_create_doctor_organization_branches_table', 8),
(40, '2021_05_01_123543_create_products_table', 9),
(41, '2021_05_01_125847_create_product_images_table', 9),
(42, '2021_05_01_143547_create_units_table', 10),
(43, '2021_05_04_121453_create_tele_medicine_services_table', 11),
(44, '2021_05_04_134954_create_home_care_service_requests_table', 12),
(45, '2021_05_04_140846_create_tourism_service_requests_table', 12),
(46, '2021_05_04_232446_create_doctor_appointments_table', 13),
(47, '2021_05_08_140457_create_contracts_table', 14),
(48, '2021_05_10_163655_create_sale_invoices_table', 14),
(49, '2021_05_10_163709_create_sale_invoice_details_table', 14),
(52, '2021_04_24_151346_create_doctors_table', 16),
(53, '2021_05_22_010541_create_hospitals_table', 17),
(54, '2021_04_24_151311_create_organizations_table', 18),
(55, '2021_05_22_011130_create_medical_centers_table', 18),
(56, '2021_05_22_225447_create_pharmacies_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stabliste` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `capital_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `licence` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facility` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name`, `name_ar`, `user_name`, `owner`, `phone`, `mobile`, `email`, `stabliste`, `capacity`, `capital_id`, `city_id`, `licence`, `photo`, `facility`, `address`, `status`, `is_active`, `is_verified`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Signe Malone', 'Karleigh Trujillo', 'roxuc', 'Lunea Villarreal', NULL, '43563456', NULL, 8, 90, 1, 33, 'Alias quasi aliquam', 'public/frontend/images/medical_center_registation/60a901d81b27b.jpg', 'Vero voluptas error', 'Porro fuga Voluptat', 1, 1, 1, NULL, NULL, '2021-05-22 13:06:32', '2021-05-22 13:06:32'),
(2, 'Kathleen Petty', 'Colette Hoover', 'syjaxuvid', 'Wyatt Nolan', 'Kyle Riggs', 'Elton Castaneda', 'pimy@mailinator.com', 47, 37, 1, 9, 'Quaerat qui et id qu', NULL, 'Itaque unde impedit', 'Est nobis proident', 1, 1, 2, NULL, NULL, '2021-05-23 11:08:49', '2021-05-23 11:17:53'),
(3, 'medical Name', 'medical name', 'medical', 'medical owner', '56658+65', '0024587', 'medical@gmail.com', 10, 20, 1, 6, '25687', 'public/frontend/images/medical_center_registation/60ab48fc134c9.png', 'good', 'address', 1, 1, 1, NULL, NULL, '2021-05-24 10:34:36', '2021-05-24 10:34:36');

-- --------------------------------------------------------

--
-- Table structure for table `organization_branches`
--

CREATE TABLE `organization_branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization_id` int(11) DEFAULT NULL,
  `organization_type_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organization_branches`
--

INSERT INTO `organization_branches` (`id`, `name`, `name_ar`, `organization_id`, `organization_type_id`, `city_id`, `address`, `phone`, `mobile`, `email`, `status`, `is_active`, `is_verified`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 'Mirpur 1 Popular Diagnostic Center', 'Mirpur 1 Popular Diagnostic Center', 4, 10, 7, 'Khaldiya Towers - 4th Tower - Faisal Bin Turki Road', '01779325718', '01988138009', 'admin@gmail.com', 1, 1, 1, NULL, NULL, '2021-05-02 17:50:14', '2021-05-02 17:50:14'),
(6, 'new branch', 'ar', 4, 10, 9, 'mirpur, dhaka', '0181643331', '0181643331', 'someemail@gmail.com', 1, 1, 1, NULL, NULL, '2021-05-06 10:36:05', '2021-05-06 10:36:05');

-- --------------------------------------------------------

--
-- Table structure for table `organization_typies`
--

CREATE TABLE `organization_typies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organization_typies`
--

INSERT INTO `organization_typies` (`id`, `name`, `name_ar`, `status`, `is_active`, `is_verified`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(9, 'Dental center', 'مراكز الاسنان', 1, 1, 1, NULL, NULL, '2021-05-02 17:33:09', '2021-05-02 17:33:09'),
(10, 'Hospital', 'المستشفيات', 1, 1, 1, NULL, NULL, '2021-05-02 17:33:18', '2021-05-02 17:33:18'),
(11, 'Laboratory', 'معامل التحاليل', 1, 1, 1, NULL, NULL, '2021-05-02 17:33:28', '2021-05-02 17:33:28'),
(12, 'Optics Shop', 'مراكز البصريات', 1, 1, 1, NULL, NULL, '2021-05-02 17:33:38', '2021-05-02 17:33:38'),
(13, 'Pharmacy', 'الصيدليات', 1, 1, 1, NULL, NULL, '2021-05-02 17:33:48', '2021-05-02 17:33:48'),
(14, 'Physician', 'هيئة الاطباء', 1, 1, 1, NULL, NULL, '2021-05-02 17:33:58', '2021-05-02 17:33:58'),
(15, 'Physiotherapy Center', 'مراكز العلاج الطبيعي', 1, 1, 1, NULL, NULL, '2021-05-02 17:34:06', '2021-05-02 17:34:06'),
(16, 'Polyclinic', 'مجمع عيادات', 1, 1, 1, NULL, NULL, '2021-05-02 17:34:13', '2021-05-02 17:34:13'),
(17, 'Radiology Center', 'مراكز الاشعة', 1, 1, 1, NULL, NULL, '2021-05-02 17:34:21', '2021-05-02 17:34:21'),
(19, 'hospital', 'مضاد للحموضة ماكس', 1, 1, 1, NULL, NULL, '2021-05-06 10:36:29', '2021-05-06 10:36:29'),
(20, 'org type', 'ssar', 1, 1, 1, NULL, NULL, '2021-05-06 10:36:34', '2021-05-06 10:36:34');

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
-- Table structure for table `pharmacies`
--

CREATE TABLE `pharmacies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `is_verified` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pharmacies`
--

INSERT INTO `pharmacies` (`id`, `name`, `name_ar`, `owner`, `mobile`, `email`, `address`, `status`, `is_active`, `is_verified`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Serina Oconnor', 'دكتور. موهين علي', 'Chiquita Thompson', '34534535', 'veforyge@mailinator.com', 'Explicabo Nesciunt', 1, 1, 1, NULL, NULL, '2021-05-22 17:16:40', '2021-05-22 17:16:40'),
(2, 'Branden Rhodes', 'TaShya Morrow', 'Richard Lowe', 'Cole Puckett', 'qeloxak@mailinator.com', 'Et autem eaque atque', 1, 1, 2, NULL, NULL, '2021-05-23 09:44:52', '2021-05-23 11:19:28'),
(3, 'Reuben Gregory', 'Barclay Britt', 'Gregory Pruitt', 'Emerson Ramsey', 'qaqe@mailinator.com', 'Laborum rerum veniam', 1, 1, 1, NULL, NULL, '2021-05-23 09:49:40', '2021-05-23 11:26:46'),
(4, 'Jessica Sosa', 'Deanna Berry', 'Donna Garrison', 'Hall Mccarty', 'todewofe@mailinator.com', 'Ut voluptas amet Na', 1, 1, 1, NULL, NULL, '2021-05-30 12:05:30', '2021-05-30 12:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `generic` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vendor_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `main_category_id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `price` decimal(20,2) DEFAULT NULL,
  `discount` decimal(20,2) DEFAULT NULL,
  `discount_price` decimal(20,2) DEFAULT NULL,
  `default_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productuid`, `title`, `ar_title`, `slug`, `generic`, `vendor_id`, `category_id`, `main_category_id`, `brand_id`, `unit_id`, `price`, `discount`, `discount_price`, `default_image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '1001', 'Antacid Max', 'مضاد للحموضة ماكس', 'antacid-max', 'Dried aluminium hydroxide gel 400mg+magnesium hydroxide 400mg and simethicone (Activated dimethicone)', 2, 1, 1, 3, 1, 10.00, NULL, NULL, 'public/images/products/608d2c37904a7.jpg', 'Dried aluminium hydroxide gel 400mg+magnesium hydroxide 400mg and simethicone (Activated dimethicone)', 1, '2021-05-01 10:23:51', '2021-05-01 10:23:51'),
(2, '1002', 'Biomil 1 Milk Powder', 'مسحوق حليب بيوميل 1', 'biomil-1-milk-powder', NULL, 2, 1, 1, 4, 3, 350.00, NULL, NULL, 'public/images/products/608d2c8fd5c7d.jpeg', 'Baby food formula', 1, '2021-05-01 10:25:19', '2021-05-01 10:25:19'),
(3, '1003', 'Medicine', 'medicine ar', 'medicine', 'peracitamol', 5, 4, 4, 3, 3, 50.00, NULL, NULL, 'public/images/products/60938d937a9d3.png', 'some descriptions', 1, '2021-05-06 10:32:51', '2021-05-06 10:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 1, '2021-05-21 17:25:43', '2021-05-21 17:25:43'),
(2, 'Admin', 1, '2021-05-21 17:25:43', '2021-05-21 17:25:43'),
(3, 'Stuff', 1, '2021-05-21 17:25:43', '2021-05-21 17:25:43'),
(4, 'Doctors', 1, '2021-05-21 17:25:43', '2021-05-21 17:25:43'),
(5, 'Medical center', 1, '2021-05-21 17:25:43', '2021-05-21 17:25:43'),
(6, 'Hospital', 1, '2021-05-21 17:25:43', '2021-05-21 17:25:43'),
(7, 'Pharmacy', 1, NULL, NULL),
(8, 'gym', 1, '2021-05-21 17:25:43', '2021-05-21 17:25:43'),
(9, 'Beauty Center', 1, NULL, NULL),
(10, 'General customer/users ', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sale_invoices`
--

CREATE TABLE `sale_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_status` tinyint(4) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_no` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` decimal(20,2) DEFAULT NULL,
  `sub_total` decimal(20,2) DEFAULT NULL,
  `shipping_cost` decimal(20,2) DEFAULT NULL,
  `other_cost` decimal(20,2) DEFAULT NULL,
  `discount_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_value` decimal(20,2) DEFAULT NULL,
  `discount_amount` decimal(20,2) DEFAULT NULL,
  `total_amount` decimal(20,2) DEFAULT NULL,
  `paid_amount` decimal(20,2) DEFAULT NULL,
  `due_amount` decimal(20,2) DEFAULT NULL,
  `sale_date` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_date` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_received_by` int(11) DEFAULT NULL,
  `delivery_note` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_request_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_quantity` decimal(20,2) DEFAULT NULL,
  `return_received_by` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `verified` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale_invoice_details`
--

CREATE TABLE `sale_invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_invoice_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_no` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` decimal(20,2) DEFAULT NULL,
  `unit_price` decimal(20,2) DEFAULT NULL,
  `discount_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_value` decimal(20,2) DEFAULT NULL,
  `discount_amount` decimal(20,2) DEFAULT NULL,
  `sub_total` decimal(20,2) DEFAULT NULL,
  `sale_date` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_request_status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_quantity` decimal(20,2) DEFAULT NULL,
  `sale_from_stock_id` int(11) DEFAULT NULL,
  `sale_unit_id` int(11) DEFAULT NULL,
  `sale_type_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `verified` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `name`, `icon`, `link`, `color`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'facebook', 'fa fa-facebook', 'https://www.facebook.com/BangladeshNews.BN/', '#3b5998', '1', NULL, NULL, NULL),
(2, 'twitter', 'fa fa-twitter', 'https://www.facebook.com/BangladeshNews.BN/', '#1da1f2', '1', NULL, '2021-02-13 16:08:53', '2021-02-13 16:08:53'),
(3, 'instagram', 'fa fa-instagram', 'https://www.facebook.com/BangladeshNews.BN/', '#E1306C', '1', NULL, '2021-02-13 16:09:47', '2021-02-13 16:09:47'),
(4, 'Twitter', 'fa fa-twitter', 'https://www.twitter.com', '#facaef', '1', NULL, '2021-03-21 17:30:57', '2021-03-21 17:30:57'),
(5, 'pabel', 'icon', 'www.facebook.com/pabel.663', '#125487', '1', NULL, '2021-05-06 10:38:58', '2021-05-06 10:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(199) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`id`, `name`, `name_ar`, `description`, `is_active`, `is_verified`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Cardiology', 'قلب واوعية دموية', NULL, 1, 1, NULL, NULL, '2021-05-02 15:19:06', '2021-05-02 15:19:06'),
(4, 'Cardiothoracic Surgery', 'جراحة قلب وصدر', NULL, 1, 1, NULL, NULL, '2021-05-02 15:22:03', '2021-05-02 15:22:03'),
(5, 'Chest Diseases', 'امراض صدرية', NULL, 1, 1, NULL, NULL, '2021-05-02 15:22:21', '2021-05-02 15:22:21'),
(6, 'Dentistry', 'طب وجراحة الفم والاسنان', NULL, 1, 1, NULL, NULL, '2021-05-02 15:22:39', '2021-05-02 15:22:39'),
(7, 'Dermatology', 'جلدية وتناسلية', NULL, 1, 1, NULL, NULL, '2021-05-02 15:22:54', '2021-05-02 15:22:54'),
(8, 'Ear, Nose, Throat', 'انف واذن وحنجرة', NULL, 1, 1, NULL, NULL, '2021-05-02 15:23:05', '2021-05-02 15:23:05'),
(9, 'Gastroenterology surgery, general surgery', 'جراحة جهاز هضمي وجراحة عامة ومناظير', NULL, 1, 1, NULL, NULL, '2021-05-02 15:23:21', '2021-05-02 15:23:21'),
(10, 'General Surgery', 'جراحة عامة', NULL, 1, 1, NULL, NULL, '2021-05-02 15:23:34', '2021-05-02 15:23:34'),
(11, 'Hematology', 'امراض دم', NULL, 1, 1, NULL, NULL, '2021-05-02 15:23:46', '2021-05-02 15:23:46'),
(12, 'Immunology', 'روماتيزم ومناعة', NULL, 1, 1, NULL, NULL, '2021-05-02 15:23:54', '2021-05-02 15:23:54'),
(13, 'Internal Medicine', 'باطنة', NULL, 1, 1, NULL, NULL, '2021-05-02 15:24:14', '2021-05-02 15:24:14'),
(14, 'Internal Medicine & Hematology', 'باطنة وامراض دم', NULL, 1, 1, NULL, NULL, '2021-05-02 15:24:26', '2021-05-02 15:24:26'),
(15, 'Internal Medicine & Cardiology', 'باطنة وقلب', NULL, 1, 1, NULL, NULL, '2021-05-02 15:24:36', '2021-05-02 15:24:36'),
(16, 'Internal Medicine, Endocrinology, Diabetes', 'باطنة وغدد صماء وسكر', NULL, 1, 1, NULL, NULL, '2021-05-02 15:24:50', '2021-05-02 15:24:50'),
(17, 'Internal Medicine, Gastroenterology', 'باطنة وجهاز هضمي وكبد', NULL, 1, 1, NULL, NULL, '2021-05-02 15:24:59', '2021-05-02 15:24:59'),
(18, 'Internal Medicine, Immunology', 'باطنة وروماتيزم ومناعة', NULL, 1, 1, NULL, NULL, '2021-05-02 15:25:13', '2021-05-02 15:25:13'),
(19, 'Internal Medicine, Nephrology', 'باطنة وكلى', NULL, 1, 1, NULL, NULL, '2021-05-02 15:25:24', '2021-05-02 15:25:24'),
(20, 'Laboratory', 'تحاليل طبية', NULL, 1, 1, NULL, NULL, '2021-05-02 15:25:31', '2021-05-02 15:25:31'),
(21, 'Multidisciplinary', 'متعدد التخصصات', NULL, 1, 1, NULL, NULL, '2021-05-02 15:25:39', '2021-05-02 15:25:39'),
(22, 'Nerve Conduction Velocity', 'رسم اعصاب', NULL, 1, 1, NULL, NULL, '2021-05-02 15:25:48', '2021-05-02 15:25:48'),
(23, 'Neurology', 'طب الامراض العصبية', NULL, 1, 1, NULL, NULL, '2021-05-02 15:26:01', '2021-05-02 15:26:01'),
(24, 'Obstetrics, Gynecology', 'جراحة مخ واعصاب', NULL, 1, 1, NULL, NULL, '2021-05-02 15:26:10', '2021-05-02 15:26:10'),
(25, 'Oncology', 'نساء وتوليد', NULL, 1, 1, NULL, NULL, '2021-05-02 15:26:16', '2021-05-02 15:26:16'),
(26, 'Ophthalmology', 'اورام', NULL, 1, 1, NULL, NULL, '2021-05-02 15:26:26', '2021-05-02 15:26:26'),
(27, 'Optics', 'عيون', NULL, 1, 1, NULL, NULL, '2021-05-02 15:26:33', '2021-05-02 15:26:33'),
(29, 'Oral and Maxillo Facial surgery', 'بصريات', NULL, 1, 1, NULL, NULL, '2021-05-02 15:26:55', '2021-05-02 15:26:55'),
(30, 'Orthopedics', 'جراحة الوجة والفم والفكين', NULL, 1, 1, NULL, NULL, '2021-05-02 15:27:04', '2021-05-02 15:27:04'),
(31, 'Pediatrics', 'جراحة العظام', NULL, 1, 1, NULL, NULL, '2021-05-02 15:28:18', '2021-05-02 15:28:18'),
(32, 'Pharmacy', 'اطفال', NULL, 1, 1, NULL, NULL, '2021-05-02 15:28:25', '2021-05-02 15:28:25'),
(33, 'Physiotherapy', 'صيدلية', NULL, 1, 1, NULL, NULL, '2021-05-02 15:28:34', '2021-05-02 15:28:34'),
(34, 'Scan', 'علاج طبيعي', NULL, 1, 1, NULL, NULL, '2021-05-02 15:28:43', '2021-05-02 15:28:43'),
(35, 'Sleep Disorders', 'اشعة', NULL, 1, 1, NULL, NULL, '2021-05-02 15:29:07', '2021-05-02 15:29:07'),
(36, 'Urology', 'طب النوم', NULL, 1, 1, NULL, NULL, '2021-05-02 15:29:20', '2021-05-02 15:29:20'),
(37, 'Vascular Surgery', 'جراحة كلى ومسالك بولية', NULL, 1, 1, NULL, NULL, '2021-05-02 15:29:33', '2021-05-02 15:29:33');

-- --------------------------------------------------------

--
-- Table structure for table `tele_medicine_services`
--

CREATE TABLE `tele_medicine_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `familyname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `service` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tele_medicine_services`
--

INSERT INTO `tele_medicine_services` (`id`, `user_id`, `name`, `familyname`, `phonenumber`, `email`, `city_id`, `service`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'prince', 'Home', '0178965874', 'asdf@gmail.com', 6, 'Hello', 1, '2021-05-04 06:30:43', '2021-05-04 06:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `tele_medicine_typies`
--

CREATE TABLE `tele_medicine_typies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `is_verified` tinyint(4) NOT NULL DEFAULT 1,
  `created_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tele_medicine_typies`
--

INSERT INTO `tele_medicine_typies` (`id`, `name`, `ar_name`, `description`, `is_active`, `is_verified`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'Dental center', 'مراكز الاسنان', NULL, 1, 1, NULL, NULL, '2021-05-02 15:51:06', '2021-05-02 15:51:06'),
(3, 'Hospital', 'المستشفيات', NULL, 1, 1, NULL, NULL, '2021-05-02 15:51:14', '2021-05-02 15:51:14'),
(4, 'Laboratory', 'معامل التحاليل', NULL, 1, 1, NULL, NULL, '2021-05-02 15:51:21', '2021-05-02 15:51:21'),
(5, 'Optics Shop', 'مراكز البصريات', NULL, 1, 1, NULL, NULL, '2021-05-02 15:51:30', '2021-05-02 15:51:30'),
(6, 'Pharmacy', 'الصيدليات', NULL, 1, 1, NULL, NULL, '2021-05-02 15:51:38', '2021-05-02 15:51:38'),
(7, 'Physician', 'هيئة الاطباء', NULL, 1, 1, NULL, NULL, '2021-05-02 15:51:45', '2021-05-02 15:51:45'),
(8, 'Physiotherapy Center', 'مراكز العلاج الطبيعي', NULL, 1, 1, NULL, NULL, '2021-05-02 15:51:54', '2021-05-02 15:51:54'),
(9, 'Polyclinic', 'مجمع عيادات', NULL, 1, 1, NULL, NULL, '2021-05-02 15:52:02', '2021-05-02 15:52:02'),
(10, 'Radiology Center', 'مراكز الاشعة', NULL, 1, 1, NULL, NULL, '2021-05-02 15:52:13', '2021-05-02 15:52:13'),
(11, 'Specialized Medical Center', 'المراكز الطبية المتخصصة', NULL, 1, 1, NULL, NULL, '2021-05-02 15:52:22', '2021-05-02 15:52:22');

-- --------------------------------------------------------

--
-- Table structure for table `thanas`
--

CREATE TABLE `thanas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bn_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tourism_service_requests`
--

CREATE TABLE `tourism_service_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `familyname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(11) NOT NULL,
  `service` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tourism_service_requests`
--

INSERT INTO `tourism_service_requests` (`id`, `user_id`, `category_id`, `service_id`, `name`, `familyname`, `phonenumber`, `email`, `country_id`, `service`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 2, 'prince', 'Home', '0178965874', 'admin32@gmail.com', 1, 'asdfsdf', 1, '2021-05-04 09:48:08', '2021-05-04 09:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ar_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `ar_name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'pieces', 'قطع', 1, NULL, '2021-05-01 10:12:54', '2021-05-01 10:12:54'),
(2, 'Leaves', 'اوراق اشجار', 1, NULL, '2021-05-01 10:13:35', '2021-05-01 10:13:35'),
(3, 'Bottle', 'زجاجة', 1, NULL, '2021-05-01 10:14:29', '2021-05-01 10:14:29'),
(4, 'package', 'مضاد للحموضة ماكس', 1, NULL, '2021-05-06 10:34:00', '2021-05-06 10:34:00'),
(5, 'some name', 'ar', 1, NULL, '2021-05-06 10:34:59', '2021-05-06 10:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_uid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_id` int(10) DEFAULT NULL,
  `hospital_id` int(10) DEFAULT NULL,
  `medical_center_id` int(10) DEFAULT NULL,
  `pharmacy_id` int(25) DEFAULT NULL,
  `gym_id` int(10) DEFAULT NULL,
  `beauty_center_id` int(10) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int(10) DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1,
  `type` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_uid`, `doctor_id`, `hospital_id`, `medical_center_id`, `pharmacy_id`, `gym_id`, `beauty_center_id`, `name`, `user_name`, `mobile`, `email`, `email_verified_at`, `password`, `remember_token`, `city_id`, `address`, `image`, `role_id`, `type`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '1008', NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, '0551175959', 'admin@gmail.com', NULL, '$2y$12$7QtJ74SsY0Q2eaXuGpHO/OqR.lRLAkpOCErmRLfk5VYSmiFcxK5Nm', NULL, NULL, NULL, 'public/images/manpowers/60559c84d33e3.png', 2, 1, 1, NULL, '2021-03-01 05:25:53', '2021-05-06 08:39:01'),
(2, '1007', NULL, NULL, NULL, NULL, NULL, NULL, 'Md Bokul', NULL, '01998139009', 'bokul@gmail.com', NULL, '$2y$10$2Tzzt3Ji0y1MDayVX2qmwOa18gx1XNOK/idvzLYXmRXfM5aqsa1RS', NULL, NULL, NULL, 'public/images/manpowers/605588002834f.png', 1, 1, 1, NULL, '2021-03-20 05:28:32', '2021-03-20 05:49:10'),
(4, '1008', NULL, NULL, NULL, NULL, NULL, NULL, 'Md Moinul', NULL, '01988139002', 'moinul@gmail.com', NULL, '$2y$10$Uef1C4e0jaUwklu5xVG02.BQZTvsW3jDQ5iAxJGJdWzHugRAEh40m', NULL, 17, 'Dhaka', 'public/images/manpowers/6091881faf49b.jpg', 2, 2, 1, NULL, '2021-05-04 03:48:28', '2021-05-04 17:45:03'),
(5, '1009', NULL, NULL, NULL, NULL, NULL, NULL, 'Ahmed', NULL, '012557844', 'ahmed@gmail.com', NULL, '$2y$10$VpanZ28h9tN3ljMIwTfqwu9jJ.zZeLiVCdD6ejbI5S2fcddbmsGXS', NULL, 22, 'Jeddah', NULL, 2, 2, 1, NULL, '2021-05-05 14:28:20', '2021-05-05 14:28:20'),
(6, '1010', NULL, NULL, NULL, NULL, NULL, NULL, 'alsari', NULL, '05533439434', 'alsari@gmail.com', NULL, '$2y$10$Xsn0d3cUT8.oyjnMVp1x/O.N5yu0oWxYSXkbaSoVguzgv2V3NpF0G', NULL, 18, 'dhahran', NULL, 2, 2, 1, NULL, '2021-05-05 23:12:40', '2021-05-05 23:12:40'),
(7, '1010', NULL, NULL, NULL, NULL, NULL, NULL, 'alsari', NULL, '05533439434', 'alsari@gmail.com', NULL, '$2y$10$yx2HSQZQP1wa69ytAfEa2.R3ZTTH5/cMlJK2s8QJZiHcTsN.n3Ce6', NULL, 18, 'dhahran', NULL, 2, 2, 1, NULL, '2021-05-05 23:12:40', '2021-05-05 23:12:40'),
(8, '1011', NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, '01382434224', 'test@gmail.com', NULL, '$2y$10$THRKQKabiTutiKeLq1B80eanhMa9Z8GnJmxPBwhXoDNZ2Zvf.d/He', NULL, 14, 'arar', NULL, 2, 2, 1, NULL, '2021-05-05 23:18:21', '2021-05-05 23:18:21'),
(9, '1012', NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, '013104030434', 'test2@gmail.com', NULL, '$2y$10$ZbxibHyTjli985yDzHgckeu1.OAOOVuNfLxb4RtWzeU5sJov3AUSa', NULL, 14, 'some address', NULL, 2, 2, 1, NULL, '2021-05-05 23:22:42', '2021-05-05 23:22:42'),
(10, '1013', NULL, NULL, NULL, NULL, NULL, NULL, 'ripa', NULL, '012548741', 'ripa@gmail.com', NULL, '$2y$10$VXtZ.mDDT7P4mZ.OaZEg..6s0CJdUWLMiaaDa6Gg5vD6pwgUR3Hza', NULL, 11, NULL, NULL, 2, 2, 1, NULL, '2021-05-06 10:44:17', '2021-05-06 10:44:17'),
(11, '1014', NULL, NULL, NULL, NULL, NULL, NULL, 'Rahim', NULL, '012548795', 'rahim@gmail.com', NULL, '$2y$10$ilIZbR6mRW4SpaquuFI5Q.9tLBCChUJ.GUIfCZ40TnF9zpw.a1.7K', NULL, 9, NULL, NULL, 2, 2, 1, NULL, '2021-05-06 11:02:51', '2021-05-06 11:02:51'),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Larissa Moss', NULL, '0165456456', 'hizulez@mailinator.com', NULL, '$2y$10$kyToXP/9/VWiCMseCG9BWevJJxdFrHURezu28iYKyW5MieR67gYLa', NULL, 26, 'Incidunt temporibus', NULL, 4, 1, 1, NULL, '2021-05-22 06:51:24', '2021-05-22 06:51:24'),
(13, NULL, 4, NULL, NULL, NULL, NULL, NULL, 'Kessie Fulton', 'عين', '01675464565', 'gaqabeveq@mailinator.com', NULL, '$2y$10$D5m8y30qH315AXgU4Y.bR.Q6Ht.ISDaVKLGsX8qyM6Qb8tth7H6Bq', NULL, 30, 'Fugit eius et ea pa', NULL, 4, 1, 1, NULL, '2021-05-22 08:22:10', '2021-05-22 08:22:10'),
(14, NULL, 5, NULL, NULL, NULL, NULL, NULL, 'Cedric Maldonado', 'دكتور. موهين علي a', '0345646456456', 'gaqytava@mailinator.com', NULL, '$2y$10$0XS.sSRNLrJidt9MhtS/vuttE3Z93UhQv8OjbyqB15VV.QNQmZgL.', NULL, 16, 'Ab corrupti rerum d', NULL, 4, 1, 1, NULL, '2021-05-22 08:24:15', '2021-05-22 08:24:15'),
(15, NULL, 6, NULL, NULL, NULL, NULL, NULL, 'Jorden Charles', 'دكتور. موهين علي', '05688745', 'pudelytile@mailinator.com', NULL, '$2y$10$Q9BBuv95tLBTEQhcaqsboON9xMCzJMNQ0bEd4WnoXND1he8wUjXWO', NULL, 28, 'Exercitationem incid', NULL, 4, 1, 1, NULL, '2021-05-22 11:19:49', '2021-05-22 11:19:49'),
(16, NULL, 7, NULL, NULL, NULL, NULL, NULL, 'Logan Jimenez', 'دكتور. موهين علي', 'Macey Stephens', 'cyxizuba@mailinator.com', NULL, '$2y$10$h44xGRyJHqJp2Mx6Nk4Vd.KXGozv5lBwrjrLaTJy3CLOMk1LJmcZq', NULL, 12, 'Incidunt asperiores', NULL, 4, 1, 1, NULL, '2021-05-22 11:26:31', '2021-05-22 11:26:31'),
(17, NULL, NULL, 1, NULL, NULL, NULL, NULL, 'Amery Thornton', 'Luke Vega', 'Cruz Vargas', 'byli@mailinator.com', NULL, '$2y$10$2YdQ6hQZ3CrOWlzcBDUgSujQB4GFNvQSIlZsMuhVN/qaFrS/PfVAC', NULL, 18, 'Recusandae Sed dese', NULL, 6, 1, 1, NULL, '2021-05-22 12:23:30', '2021-05-22 12:23:30'),
(18, NULL, NULL, 2, NULL, NULL, NULL, NULL, 'Cara Mcintyre', 'دكتور. موهين علي', '3523453453', 'nitu@mailinator.com', NULL, '$2y$10$qxq32hB3TnBw0UeB9wQ.nOeddLv.3MjTDTuDb6IpTpvcoHZlJcZbW', NULL, 33, 'Iste eius enim et de', NULL, 6, 1, 1, NULL, '2021-05-22 12:30:51', '2021-05-22 12:30:51'),
(19, NULL, NULL, NULL, 1, NULL, NULL, NULL, 'Signe Malone', 'Karleigh Trujillo', '43563456', 'cydydebuj@mailinator.com', NULL, '$2y$10$urik6l9kA3JajWIbNeLH4.YHyqIB7jQNJ/YqhCYbaJaYzHV7qJIhO', NULL, 33, 'Porro fuga Voluptat', NULL, 5, 1, 1, NULL, '2021-05-22 13:06:32', '2021-05-22 13:06:32'),
(20, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'Serina Oconnor', 'دكتور. موهين علي', '34534535', 'veforyge@mailinator.com', NULL, '$2y$10$v1gxKMl7lfomOlmP7ekjcOe.b0vvS/TSsnuD.rZLQUadSO35VGljO', NULL, 29, 'Explicabo Nesciunt', NULL, 7, 1, 1, NULL, '2021-05-22 17:16:40', '2021-05-22 17:16:40'),
(21, NULL, NULL, NULL, NULL, 2, NULL, NULL, 'Branden Rhodes', 'TaShya Morrow', 'Cole Puckett', 'qeloxak@mailinator.com', NULL, '$2y$10$ddVsYvZQ65dIL2NUO2pLMeFAiM2IaQWC0BDErwZXrocNrMFmGHzjW', NULL, 27, 'Et autem eaque atque', NULL, 7, 1, 1, NULL, '2021-05-23 09:44:53', '2021-05-23 09:44:53'),
(22, NULL, NULL, NULL, NULL, 3, NULL, NULL, 'Reuben Gregory', 'Barclay Britt', 'Emerson Ramsey', 'qaqe@mailinator.com', NULL, '$2y$10$M/QPWm5PqbVXB5VyTCY29OxcIRuGb8oSDurzE6u/NTjdrKycU8dIu', NULL, 22, 'Laborum rerum veniam', NULL, 7, 1, 1, NULL, '2021-05-23 09:49:41', '2021-05-23 09:49:41'),
(23, NULL, NULL, NULL, 2, NULL, NULL, NULL, 'Kathleen Petty', 'Colette Hoover', 'Elton Castaneda', 'pimy@mailinator.com', NULL, '$2y$10$GshrgVpGX2BIpf/RmMEULuV722CFK4S5PFVYG8n1.arpMu40rnPmC', NULL, 9, 'Est nobis proident', NULL, 5, 1, 1, NULL, '2021-05-23 11:08:49', '2021-05-23 11:08:49'),
(24, NULL, 8, NULL, NULL, NULL, NULL, NULL, 'New Doctor Test updated', 'New Doctor Test', '0257845477', 'newdoctor@gmail.com', NULL, '$2y$10$Ios2nPfs6M.b9j1F/VqCYeQn1WEWkJ9xsdaEKdus2Fg2GXYg9cY5q', NULL, 6, 'Address', 'public/images/manpowers/60ab418d6e57a.png', 4, 1, 1, NULL, '2021-05-24 08:57:30', '2021-05-24 10:03:20'),
(25, NULL, NULL, 3, NULL, NULL, NULL, NULL, 'Hospital Updated', 'Hospital', '024789878', 'hospital@gmail.com', NULL, '$2y$10$v/j.DstPgU8HYUaFcdpQ5eHcfu1.gQ54yFRiLP8VDsaT1mNIhtVmK', NULL, 6, 'address', 'public/images/manpowers/60ab486369f77.png', 6, 1, 1, NULL, '2021-05-24 10:28:00', '2021-05-24 10:32:03'),
(26, NULL, NULL, NULL, 3, NULL, NULL, NULL, 'medical Name', 'medical name', '0024587', 'medical@gmail.com', NULL, '$2y$10$eQl7c4cq9FmD9ViCa6kMFOu7d4Ou/dGetbPYxYfE4OqAfSh3btA66', NULL, 6, 'address', 'public/images/manpowers/60ab49a6d8d86.jpg', 5, 1, 1, NULL, '2021-05-24 10:34:36', '2021-05-24 10:37:26'),
(27, NULL, NULL, NULL, NULL, 4, NULL, NULL, 'pharmacy Name', 'pharmacy', '78754578', 'pharmacy@gmail.com', NULL, '$2y$10$GzhgEQtMyEPx7RTPxn1VAeOeNUYNLwZ6y8saOwAG1b8rroW/8CQF6', NULL, 6, 'adress', 'public/images/manpowers/60ab4a66233b7.png', 7, 1, 1, NULL, '2021-05-24 10:39:52', '2021-05-24 10:40:38'),
(28, NULL, NULL, NULL, NULL, NULL, 5, NULL, 'gym', 'habib', '105545', 'habib@gmail.com', NULL, '$2y$10$9JndZez1qkri2hVcUSX/2.RVpLaSqmL1YeonJnlCLTKR8rbRVDus6', NULL, 6, 'adfddf', NULL, 8, 1, 1, NULL, '2021-05-27 20:00:18', '2021-05-27 20:00:18'),
(29, NULL, NULL, NULL, NULL, NULL, NULL, 4, 'zdfg', NULL, '01988139009', 'as@ga.com', NULL, '$2y$10$3IvaTd5N085uep2U3lSbLuq0jKiS.WYtIiHWZY1q2JprkvwJ3XGje', NULL, NULL, 'sdfas', NULL, 9, 1, 1, NULL, '2021-05-30 22:03:01', '2021-05-30 22:03:01'),
(30, NULL, NULL, NULL, NULL, NULL, NULL, 5, 'zdfg', NULL, '01988139009', 'moinul@gmail.com', NULL, '$2y$10$Yl38qi2Rxn/0AObSF8pK8.drTEVINYe94cF63wRRThhIfDJwLSi0y', NULL, NULL, 'sdfasdf', NULL, 9, 1, 1, NULL, '2021-05-30 22:07:56', '2021-05-30 22:07:56');

-- --------------------------------------------------------

--
-- Table structure for table `website_settings`
--

CREATE TABLE `website_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `homepage_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sitebanner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_settings`
--

INSERT INTO `website_settings` (`id`, `site_name`, `homepage_title`, `meta_tags`, `meta_description`, `sitebanner`, `logo`, `footer_logo`, `favicon`, `email`, `phone`, `state_address`, `local_address`, `address`, `map_code`, `created_at`, `updated_at`) VALUES
(1, 'Care incubator', 'Health for you', 'meta tags', 'meta description', 'public/images/website/6093719e30783.png', 'public/images/website/6093719e30b04.png', 'public/images/website/6093719e30cdf.png', 'public/images/website/6093719e3108b.png', 'info@caincu.com', '0551175959', 'haldiya Towers - 4th Tower -', 'Faisal Bin Turki Road - Office No. 6 - Floor 13', 'Riyadh', '323423', NULL, '2021-05-06 08:33:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beauty_centers`
--
ALTER TABLE `beauty_centers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `capitals`
--
ALTER TABLE `capitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_appointments`
--
ALTER TABLE `doctor_appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_organization_branches`
--
ALTER TABLE `doctor_organization_branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_schedules`
--
ALTER TABLE `doctor_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gyms`
--
ALTER TABLE `gyms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_care_categories`
--
ALTER TABLE `home_care_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_care_services`
--
ALTER TABLE `home_care_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_care_service_requests`
--
ALTER TABLE `home_care_service_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_centers`
--
ALTER TABLE `medical_centers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_tourism_categories`
--
ALTER TABLE `medical_tourism_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_tourism_services`
--
ALTER TABLE `medical_tourism_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization_branches`
--
ALTER TABLE `organization_branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization_typies`
--
ALTER TABLE `organization_typies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `pharmacies`
--
ALTER TABLE `pharmacies`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_invoices`
--
ALTER TABLE `sale_invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_invoice_details`
--
ALTER TABLE `sale_invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tele_medicine_services`
--
ALTER TABLE `tele_medicine_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tele_medicine_typies`
--
ALTER TABLE `tele_medicine_typies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tourism_service_requests`
--
ALTER TABLE `tourism_service_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beauty_centers`
--
ALTER TABLE `beauty_centers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `capitals`
--
ALTER TABLE `capitals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctor_appointments`
--
ALTER TABLE `doctor_appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctor_organization_branches`
--
ALTER TABLE `doctor_organization_branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor_schedules`
--
ALTER TABLE `doctor_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gyms`
--
ALTER TABLE `gyms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `home_care_categories`
--
ALTER TABLE `home_care_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `home_care_services`
--
ALTER TABLE `home_care_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `home_care_service_requests`
--
ALTER TABLE `home_care_service_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medical_centers`
--
ALTER TABLE `medical_centers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medical_tourism_categories`
--
ALTER TABLE `medical_tourism_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `medical_tourism_services`
--
ALTER TABLE `medical_tourism_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `organization_branches`
--
ALTER TABLE `organization_branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `organization_typies`
--
ALTER TABLE `organization_typies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pharmacies`
--
ALTER TABLE `pharmacies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sale_invoices`
--
ALTER TABLE `sale_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_invoice_details`
--
ALTER TABLE `sale_invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tele_medicine_services`
--
ALTER TABLE `tele_medicine_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tele_medicine_typies`
--
ALTER TABLE `tele_medicine_typies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tourism_service_requests`
--
ALTER TABLE `tourism_service_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
