-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 13, 2024 at 10:03 AM
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
-- Database: `schoolerp`
--

-- --------------------------------------------------------

--
-- Table structure for table `b2b_transactions`
--

CREATE TABLE `b2b_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `originator_conversation_id` varchar(255) DEFAULT NULL,
  `conversation_id` varchar(255) DEFAULT NULL,
  `response_code` varchar(255) DEFAULT NULL,
  `response_description` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `sender_till` varchar(255) NOT NULL,
  `receiver_till` varchar(255) NOT NULL,
  `account_reference` varchar(255) NOT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `breaks`
--

CREATE TABLE `breaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration_minutes` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `breaks`
--

INSERT INTO `breaks` (`id`, `name`, `duration_minutes`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 'Short break', 20, '09:20:00', '09:40:00', '2024-07-29 06:41:17', '2024-07-29 06:43:23'),
(2, 'Long Break', 40, '11:00:00', '11:40:00', '2024-07-29 06:48:23', '2024-07-29 06:48:23'),
(3, 'Lunch Break', 60, '13:00:00', '14:00:00', '2024-07-29 06:48:53', '2024-07-29 06:48:53');

-- --------------------------------------------------------

--
-- Table structure for table `c2brequests`
--

CREATE TABLE `c2brequests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TransactionType` varchar(255) NOT NULL,
  `TransID` varchar(255) NOT NULL,
  `TransTime` varchar(255) NOT NULL,
  `TransAmount` decimal(10,2) NOT NULL,
  `BusinessShortCode` varchar(255) NOT NULL,
  `BillRefNumber` varchar(255) DEFAULT NULL,
  `InvoiceNumber` varchar(255) DEFAULT NULL,
  `OrgAccountBalance` decimal(10,2) DEFAULT NULL,
  `ThirdPartyTransID` varchar(255) DEFAULT NULL,
  `MSISDN` varchar(255) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `MiddleName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade` varchar(191) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `grade`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'PP 1', 1, NULL, NULL),
(2, 'PP 2', 1, NULL, NULL),
(3, 'Grade 1', 1, NULL, NULL),
(4, 'Grade 2', 1, NULL, NULL),
(5, 'Grade 3', 1, NULL, NULL),
(6, 'Grade 4', 1, NULL, NULL),
(7, 'Grade 5', 1, NULL, NULL),
(8, 'Grade 6', 1, NULL, NULL),
(9, 'Grade 7', 1, NULL, NULL),
(10, 'Grade 8', 1, NULL, NULL),
(11, 'Grade 9', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `grade_learning_areas`
--

CREATE TABLE `grade_learning_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` int(11) NOT NULL,
  `learning_area_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grade_learning_areas`
--

INSERT INTO `grade_learning_areas` (`id`, `grade_id`, `learning_area_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, '2023-12-06 06:59:31', '2023-12-06 11:58:32'),
(2, 3, 2, 1, '2023-12-06 06:59:31', '2023-12-06 06:59:31'),
(3, 3, 41, 1, '2023-12-06 06:59:31', '2023-12-06 06:59:31'),
(4, 3, 15, 1, '2023-12-06 06:59:31', '2023-12-06 06:59:31'),
(5, 3, 5, 1, '2023-12-06 06:59:31', '2023-12-06 06:59:31'),
(6, 3, 6, 1, '2023-12-06 06:59:31', '2023-12-06 06:59:31'),
(7, 3, 35, 1, '2023-12-06 06:59:31', '2024-01-15 15:21:28'),
(8, 7, 13, 1, '2023-12-15 01:44:10', '2023-12-15 01:44:10'),
(9, 7, 14, 1, '2023-12-15 01:44:10', '2023-12-15 01:44:10'),
(10, 7, 19, 1, '2023-12-15 01:44:10', '2023-12-15 01:44:10'),
(11, 7, 46, 1, '2023-12-15 01:44:10', '2023-12-15 01:44:10'),
(12, 7, 38, 1, '2023-12-15 01:44:10', '2023-12-15 01:44:10'),
(13, 7, 33, 1, '2023-12-15 01:44:10', '2023-12-15 01:44:10'),
(14, 7, 43, 1, '2023-12-15 01:44:10', '2023-12-15 01:44:10'),
(16, 7, 35, 1, '2023-12-15 01:44:10', '2023-12-15 01:44:10'),
(17, 4, 37, 1, '2024-01-15 21:03:30', '2024-01-15 21:03:30'),
(18, 4, 2, 1, '2024-01-15 21:03:30', '2024-01-15 21:03:30'),
(19, 4, 32, 1, '2024-01-15 21:03:30', '2024-01-15 21:03:30'),
(20, 4, 25, 1, '2024-01-15 21:03:30', '2024-01-15 21:03:30'),
(21, 4, 21, 1, '2024-01-15 21:03:30', '2024-01-15 21:03:30'),
(22, 4, 20, 1, '2024-01-15 21:03:30', '2024-01-15 21:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `grade_teachers`
--

CREATE TABLE `grade_teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grade_teachers`
--

INSERT INTO `grade_teachers` (`id`, `user_id`, `grade_id`, `stream_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, '2023-12-06 08:48:24', '2023-12-06 08:48:24'),
(2, 1, 3, 2, '2023-12-06 08:50:19', '2023-12-06 08:50:19'),
(3, 1, 5, 1, '2023-12-06 09:15:53', '2023-12-06 09:15:53'),
(4, 1, 5, 2, '2023-12-06 09:16:16', '2023-12-06 09:16:16'),
(5, 1, 4, 1, '2023-12-06 09:21:00', '2023-12-06 09:21:00'),
(6, 1, 7, 1, '2023-12-06 09:41:11', '2023-12-06 09:41:11');

-- --------------------------------------------------------

--
-- Table structure for table `learning_areas`
--

CREATE TABLE `learning_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `number_of_lessons` int(11) NOT NULL DEFAULT 0,
  `double_lessons` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `learning_areas`
--

INSERT INTO `learning_areas` (`id`, `name`, `number_of_lessons`, `double_lessons`, `created_at`, `updated_at`) VALUES
(1, 'Mathematical Activities', 5, 1, NULL, NULL),
(2, 'Language Activities', 4, 0, NULL, NULL),
(3, 'Environmental Activities', 2, 0, NULL, NULL),
(4, 'Psychomotor and Creative Activities', 1, 0, NULL, NULL),
(5, 'Religious and Moral Activities', 3, 0, NULL, NULL),
(6, 'Literacy Activities', 4, 0, NULL, NULL),
(7, 'Indigenous languages/Braille', 2, 0, NULL, NULL),
(8, 'Kiswahili Language Activities/Kenya Sign Language (KSL)', 4, 0, NULL, NULL),
(9, 'English Language Activities', 4, 0, NULL, NULL),
(13, 'Hygiene and Nutrition Activities', 2, 0, NULL, NULL),
(14, 'Movement and Creative Activities (PE, Music, Art, Craft)', 2, 0, NULL, NULL),
(15, 'Pastoral Program of Instruction', 0, 0, NULL, NULL),
(18, 'Home Science', 3, 0, NULL, NULL),
(19, 'Agriculture', 4, 0, NULL, NULL),
(20, 'Science and Technology', 6, 1, NULL, NULL),
(21, 'Mathematics', 5, 0, NULL, NULL),
(22, 'Moral and Life Skills Education', 1, 0, NULL, NULL),
(23, 'Creative Arts (Art, Craft, and Music)', 2, 0, NULL, NULL),
(24, 'Physical and Health Education', 1, 0, NULL, NULL),
(25, 'Social Studies (Citizenship, Geography, History)', 5, 0, NULL, NULL),
(26, 'Religious Education (CRE, IRE, HRE)', 2, 0, NULL, NULL),
(31, 'Integrated Science', 0, 0, NULL, NULL),
(32, 'Health Education', 0, 0, NULL, NULL),
(33, 'Pre-Technical and Pre-Career Education', 0, 0, NULL, NULL),
(35, 'Business Studies', 0, 0, NULL, NULL),
(36, 'Agriculture', 0, 0, NULL, NULL),
(37, 'Life Skills Education', 0, 0, NULL, NULL),
(38, 'Sports and Physical Education', 0, 0, NULL, NULL),
(39, 'Religious Education', 0, 0, NULL, NULL),
(40, 'Visual Arts', 0, 0, NULL, NULL),
(41, 'Home Science', 0, 0, NULL, NULL),
(42, 'Performing Arts', 0, 0, NULL, NULL),
(43, 'Computer Science', 0, 0, NULL, NULL),
(44, 'Kenya Sign Language (KSL)', 0, 0, NULL, NULL),
(46, 'Foreign Languages (German, French, Chinese, Arabic)', 0, 0, NULL, NULL);

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
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_10_07_112207_create_employees_table', 1),
(7, '2024_10_14_150657_create_c2brequests_table', 1),
(8, '2024_10_14_155903_modify_c2brequests_table', 1),
(9, '2024_10_15_090555_create_STKrequests_table', 1),
(10, '2024_10_23_114811_add_name_to_stkrequests_table', 1),
(11, '2024_10_28_120902_create_b2b_transactions_table', 1),
(12, '2024_10_30_080307_create_permission_tables', 1),
(13, '2024_11_06_111257_create_students_table', 1),
(14, '2024_11_06_153832_create_parents_table', 1),
(15, '2024_11_06_200027_create_parent_student_relations_table', 1);

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
(6, 'App\\Models\\User', 1),
(7, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `poll_id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) NOT NULL,
  `votes_count` bigint(20) UNSIGNED DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `poll_id`, `content`, `votes_count`, `created_at`, `updated_at`) VALUES
(1, 5, 'yes', 0, '2024-12-05 08:15:12', '2024-12-05 08:15:12'),
(2, 5, 'no', 0, '2024-12-05 08:15:12', '2024-12-05 08:15:12'),
(3, 6, 'yes', 0, '2024-12-05 08:34:32', '2024-12-05 08:34:32'),
(4, 6, 'no', 0, '2024-12-05 08:34:32', '2024-12-05 08:34:32'),
(5, 7, 'yes', 0, '2024-12-05 08:40:17', '2024-12-05 08:40:17'),
(6, 7, 'no', 0, '2024-12-05 08:40:17', '2024-12-05 08:40:17'),
(7, 8, 'yes', 0, '2024-12-05 08:43:39', '2024-12-05 08:43:39'),
(8, 8, 'no', 0, '2024-12-05 08:43:39', '2024-12-05 08:43:39'),
(9, 9, 'yes', 0, '2024-12-05 08:45:32', '2024-12-05 08:45:32'),
(10, 9, 'no', 0, '2024-12-05 08:45:32', '2024-12-05 08:45:32'),
(11, 10, 'yes', 0, '2024-12-05 08:48:32', '2024-12-05 08:48:32'),
(12, 10, 'no', 0, '2024-12-05 08:48:32', '2024-12-05 08:48:32'),
(15, 12, 'yes', 0, '2024-12-05 09:03:55', '2024-12-05 09:03:55'),
(16, 12, 'no', 0, '2024-12-05 09:03:55', '2024-12-05 09:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adm_no` int(11) NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `adm_no`, `parent_name`, `telephone`, `created_at`, `updated_at`) VALUES
(25, 254, 'Richard  Mbugua', '0722450097', '2024-12-11 18:20:58', '2024-12-11 18:20:58'),
(26, 255, 'Meshack Kiarie', '0725809292', '2024-12-11 18:20:58', '2024-12-11 18:20:58'),
(27, 256, 'Michael Ng\'ang\'a', '0721963525', '2024-12-11 18:20:58', '2024-12-11 18:20:58'),
(28, 257, 'Justin Mwangi', '0721321327', '2024-12-11 18:20:58', '2024-12-11 18:20:58'),
(29, 258, 'Simon Kihara', '0721471568', '2024-12-11 18:20:58', '2024-12-11 18:20:58'),
(30, 259, 'Margret Ngendo', '0720252346', '2024-12-11 18:20:58', '2024-12-11 18:20:58'),
(31, 260, 'Benard Nyingi', '0720356920', '2024-12-11 18:20:58', '2024-12-11 18:20:58'),
(32, 261, 'Patricia Wanjiru', '0720352900', '2024-12-11 18:20:58', '2024-12-11 18:20:58'),
(33, 262, 'Paul Gathere', '0722420151', '2024-12-11 18:20:58', '2024-12-11 18:20:58'),
(34, 263, 'Paul Gathere', '0722420151', '2024-12-11 18:20:58', '2024-12-11 18:20:58'),
(35, 264, 'Peter Mukiri', '0722383360', '2024-12-11 18:20:58', '2024-12-11 18:20:58'),
(36, 265, 'Mary Mukiri', '0720486691', '2024-12-11 18:20:58', '2024-12-11 18:20:58');

-- --------------------------------------------------------

--
-- Table structure for table `parent_student_relations`
--

CREATE TABLE `parent_student_relations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adm_no` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `day_or_boarding` varchar(255) NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `classteacher` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parent_student_relations`
--

INSERT INTO `parent_student_relations` (`id`, `adm_no`, `student_name`, `class`, `day_or_boarding`, `parent_name`, `telephone`, `stream`, `classteacher`, `status`, `dob`, `gender`, `created_at`, `updated_at`) VALUES
(25, '254', 'Victor Kiruri', '7', 'B', 'Macharia  Mbugua', '0722450097', '7 Tana', 'TR.Emmah', 'Present', '2011-10-22', 'M', '2024-12-04 09:17:20', '2024-12-04 09:17:20'),
(26, '255', 'Emmanuella Baraka', '7', 'B', 'Meshack Kiarie', '0725809292', '7Tana', 'TR.Emmah', 'Present', '2011-10-23', 'F', '2024-12-04 09:17:20', '2024-12-04 09:17:20'),
(27, '256', 'Precious Ngendo', '7', 'D.', 'Michael Ng\'ang\'a', '0721963525', '7 Nile', 'Mr.Mwangi', 'Present', '2012-02-04', 'F', '2024-12-04 09:17:20', '2024-12-04 09:17:20'),
(28, '257', 'Krisha Njeri', '7', 'D', 'Justin Mwangi', '0721321327', '7 Athi', 'TR.Lydia', 'Present', '2011-04-15', 'F', '2024-12-04 09:17:20', '2024-12-04 09:17:20'),
(29, '258', 'Victor Kimani', '7', 'D', 'Simon Kihara', '0721471568', '7 Chania', 'Mr.Ng\'ang\'a', 'Present', '2012-03-08', 'M', '2024-12-04 09:17:20', '2024-12-04 09:17:20'),
(30, '259', 'Alvin Githinji', '7', 'D', 'Margret Ngendo', '0720252346', '7 Galana', 'TR.Rachael', 'Present', '2012-03-08', 'M', '2024-12-04 09:17:21', '2024-12-04 09:17:21'),
(31, '260', 'Dennis Njane', '7', 'D', 'Benard Nyingi', '0720356920', '7 Tana', 'TR.Emmah', 'Present', '2009-09-19', 'M', '2024-12-04 09:17:21', '2024-12-04 09:17:21'),
(32, '261', 'Cecelia Muthoni', '7', 'B', 'Patricia Wanjiru', '0720352900', '7 Athi', 'TR.Lydia', 'Present', '2011-10-19', 'M', '2024-12-04 09:17:21', '2024-12-04 09:17:21'),
(33, '262', 'Wenlus Njoroge', '7', 'B', 'Paul Gathere', '0722420151', '7 Galana', 'TR.Rachael', 'Present', '2011-04-03', 'M', '2024-12-04 09:17:21', '2024-12-04 09:17:21'),
(34, '263', 'Sylene wamaitha', '7', 'D', 'Paul Gathere', '0722420151', '7 Galana', 'TR.Rachael', 'Present', '2011-04-03', 'M', '2024-12-04 09:17:21', '2024-12-04 09:17:21'),
(35, '264', 'Alvin Kabiru Mukiri', '7', 'D', 'Peter Mukiri', '0722383360', '7 Chania', 'Mr.Ng\'ang\'a', 'Present', '2011-07-17', 'M', '2024-12-04 09:17:21', '2024-12-04 09:17:21'),
(36, '265', 'Ryan Mukono Mukiri', '7', 'D', 'Mary Mukiri', '0720486691', '7  Galana', 'TR.Rachael', 'Present', '2011-07-17', 'M', '2024-12-04 09:17:21', '2024-12-04 09:17:21');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
(1, 'createrole-list', 'web', '2024-11-08 23:31:32', '2024-11-08 23:31:32'),
(2, 'viewrole-create', 'web', '2024-11-08 23:31:32', '2024-11-08 23:31:32'),
(3, 'updaterole-edit', 'web', '2024-11-08 23:31:32', '2024-11-08 23:31:32'),
(4, 'deleterole-delete', 'web', '2024-11-08 23:31:32', '2024-11-08 23:31:32'),
(5, 'createcategory-list', 'web', '2024-11-08 23:31:32', '2024-11-08 23:31:32'),
(6, 'viewcategory-create', 'web', '2024-11-08 23:31:32', '2024-11-08 23:31:32'),
(7, 'updatecategory-edit', 'web', '2024-11-08 23:31:32', '2024-11-08 23:31:32'),
(8, 'deletecategory-delete', 'web', '2024-11-08 23:31:32', '2024-11-08 23:31:32'),
(9, 'createpermission-list', 'web', '2024-11-08 23:31:32', '2024-11-08 23:31:32'),
(10, 'viewpermission-create', 'web', '2024-11-08 23:31:32', '2024-11-08 23:31:32'),
(11, 'updatepermission-edit', 'web', '2024-11-08 23:31:32', '2024-11-08 23:31:32'),
(12, 'deletepermission-delete', 'web', '2024-11-08 23:31:32', '2024-11-08 23:31:32'),
(13, 'casecategory-list', 'web', '2024-11-08 23:31:32', '2024-11-08 23:31:32'),
(14, 'casecategory-create', 'web', '2024-11-08 23:31:33', '2024-11-08 23:31:33'),
(15, 'casecategory-edit', 'web', '2024-11-08 23:31:33', '2024-11-08 23:31:33'),
(16, 'casecategory-delete', 'web', '2024-11-08 23:31:33', '2024-11-08 23:31:33'),
(17, 'casefile-list', 'web', '2024-11-08 23:31:33', '2024-11-08 23:31:33'),
(18, 'casefile-create', 'web', '2024-11-08 23:31:33', '2024-11-08 23:31:33'),
(19, 'casefile-edit', 'web', '2024-11-08 23:31:33', '2024-11-08 23:31:33'),
(20, 'casefile-delete', 'web', '2024-11-08 23:31:33', '2024-11-08 23:31:33'),
(21, 'casefolder-list', 'web', '2024-11-08 23:31:33', '2024-11-08 23:31:33'),
(22, 'casefolder-create', 'web', '2024-11-08 23:31:33', '2024-11-08 23:31:33'),
(23, 'casefolder-edit', 'web', '2024-11-08 23:31:33', '2024-11-08 23:31:33'),
(24, 'casefolder-delete', 'web', '2024-11-08 23:31:33', '2024-11-08 23:31:33'),
(25, 'document-list', 'web', '2024-11-08 23:31:33', '2024-11-08 23:31:33'),
(26, 'document-create', 'web', '2024-11-08 23:31:33', '2024-11-08 23:31:33'),
(27, 'document-edit', 'web', '2024-11-08 23:31:33', '2024-11-08 23:31:33'),
(28, 'document-delete', 'web', '2024-11-08 23:31:33', '2024-11-08 23:31:33'),
(29, 'documentpagecount-list', 'web', '2024-11-08 23:31:33', '2024-11-08 23:31:33'),
(30, 'documentpagecount-create', 'web', '2024-11-08 23:31:33', '2024-11-08 23:31:33'),
(31, 'documentpagecount-edit', 'web', '2024-11-08 23:31:33', '2024-11-08 23:31:33'),
(32, 'documentpagecount-delete', 'web', '2024-11-08 23:31:33', '2024-11-08 23:31:33'),
(33, 'documenttype-list', 'web', '2024-11-08 23:31:33', '2024-11-08 23:31:33'),
(34, 'documenttype-create', 'web', '2024-11-08 23:31:34', '2024-11-08 23:31:34'),
(35, 'documenttype-edit', 'web', '2024-11-08 23:31:34', '2024-11-08 23:31:34'),
(36, 'documenttype-delete', 'web', '2024-11-08 23:31:34', '2024-11-08 23:31:34'),
(37, 'field-list', 'web', '2024-11-08 23:31:34', '2024-11-08 23:31:34'),
(38, 'field-create', 'web', '2024-11-08 23:31:34', '2024-11-08 23:31:34'),
(39, 'field-edit', 'web', '2024-11-08 23:31:34', '2024-11-08 23:31:34'),
(40, 'field-delete', 'web', '2024-11-08 23:31:34', '2024-11-08 23:31:34'),
(41, 'fieldcategory-list', 'web', '2024-11-08 23:31:34', '2024-11-08 23:31:34'),
(42, 'fieldcategory-create', 'web', '2024-11-08 23:31:34', '2024-11-08 23:31:34'),
(43, 'fieldcategory-edit', 'web', '2024-11-08 23:31:34', '2024-11-08 23:31:34'),
(44, 'fieldcategory-delete', 'web', '2024-11-08 23:31:34', '2024-11-08 23:31:34'),
(45, 'fileretention-list', 'web', '2024-11-08 23:31:34', '2024-11-08 23:31:34'),
(46, 'fileretention-create', 'web', '2024-11-08 23:31:34', '2024-11-08 23:31:34'),
(47, 'fileretention-edit', 'web', '2024-11-08 23:31:34', '2024-11-08 23:31:34'),
(48, 'fileretention-delete', 'web', '2024-11-08 23:31:34', '2024-11-08 23:31:34'),
(49, 'fileretentiondate-list', 'web', '2024-11-08 23:31:34', '2024-11-08 23:31:34'),
(50, 'fieldcategorydate-create', 'web', '2024-11-08 23:31:35', '2024-11-08 23:31:35'),
(51, 'fileretentiondate-edit', 'web', '2024-11-08 23:31:35', '2024-11-08 23:31:35'),
(52, 'fileretentiondate-delete', 'web', '2024-11-08 23:31:35', '2024-11-08 23:31:35'),
(53, 'form-list', 'web', '2024-11-08 23:31:35', '2024-11-08 23:31:35'),
(54, 'form-create', 'web', '2024-11-08 23:31:35', '2024-11-08 23:31:35'),
(55, 'form-edit', 'web', '2024-11-08 23:31:35', '2024-11-08 23:31:35'),
(56, 'form-delete', 'web', '2024-11-08 23:31:35', '2024-11-08 23:31:35'),
(57, 'log-list', 'web', '2024-11-08 23:31:35', '2024-11-08 23:31:35'),
(58, 'log-create', 'web', '2024-11-08 23:31:35', '2024-11-08 23:31:35'),
(59, 'log-edit', 'web', '2024-11-08 23:31:35', '2024-11-08 23:31:35'),
(60, 'log-delete', 'web', '2024-11-08 23:31:35', '2024-11-08 23:31:35'),
(61, 'metadatadefinition-list', 'web', '2024-11-08 23:31:35', '2024-11-08 23:31:35'),
(62, 'metadatadefinition-create', 'web', '2024-11-08 23:31:35', '2024-11-08 23:31:35'),
(63, 'metadatadefinition-edit', 'web', '2024-11-08 23:31:35', '2024-11-08 23:31:35'),
(64, 'metadatadefinition-delete', 'web', '2024-11-08 23:31:35', '2024-11-08 23:31:35'),
(65, 'metadatavalue-list', 'web', '2024-11-08 23:31:35', '2024-11-08 23:31:35'),
(66, 'metadatavalue-create', 'web', '2024-11-08 23:31:35', '2024-11-08 23:31:35'),
(67, 'metadatavalue-edit', 'web', '2024-11-08 23:31:35', '2024-11-08 23:31:35'),
(68, 'metadatavalue-delete', 'web', '2024-11-08 23:31:35', '2024-11-08 23:31:35'),
(69, 'permission-list', 'web', '2024-11-08 23:31:35', '2024-11-08 23:31:35'),
(70, 'permission-create', 'web', '2024-11-08 23:31:35', '2024-11-08 23:31:35'),
(71, 'permission-edit', 'web', '2024-11-08 23:31:35', '2024-11-08 23:31:35'),
(72, 'permission-delete', 'web', '2024-11-08 23:31:35', '2024-11-08 23:31:35'),
(73, 'role-list', 'web', '2024-11-08 23:31:36', '2024-11-08 23:31:36'),
(74, 'role-create', 'web', '2024-11-08 23:31:36', '2024-11-08 23:31:36'),
(75, 'role-edit', 'web', '2024-11-08 23:31:36', '2024-11-08 23:31:36'),
(76, 'role-delete', 'web', '2024-11-08 23:31:36', '2024-11-08 23:31:36'),
(77, 'user-list', 'web', '2024-11-08 23:31:36', '2024-11-08 23:31:36'),
(78, 'user-create', 'web', '2024-11-08 23:31:36', '2024-11-08 23:31:36'),
(79, 'user-edit', 'web', '2024-11-08 23:31:36', '2024-11-08 23:31:36'),
(80, 'user-delete', 'web', '2024-11-08 23:31:36', '2024-11-08 23:31:36'),
(81, 'workflow-list', 'web', '2024-11-08 23:31:36', '2024-11-08 23:31:36'),
(82, 'workflow-create', 'web', '2024-11-08 23:31:36', '2024-11-08 23:31:36'),
(83, 'workflow-edit', 'web', '2024-11-08 23:31:36', '2024-11-08 23:31:36'),
(84, 'workflow-delete', 'web', '2024-11-08 23:31:36', '2024-11-08 23:31:36'),
(85, 'workflowrule-list', 'web', '2024-11-08 23:31:36', '2024-11-08 23:31:36'),
(86, 'workflowrule-create', 'web', '2024-11-08 23:31:36', '2024-11-08 23:31:36'),
(87, 'workflowrule-edit', 'web', '2024-11-08 23:31:36', '2024-11-08 23:31:36'),
(88, 'workflowrule-delete', 'web', '2024-11-08 23:31:36', '2024-11-08 23:31:36'),
(89, 'workflowstep-list', 'web', '2024-11-08 23:31:36', '2024-11-08 23:31:36'),
(90, 'workflowstep-create', 'web', '2024-11-08 23:31:36', '2024-11-08 23:31:36'),
(91, 'workflowstep-edit', 'web', '2024-11-08 23:31:36', '2024-11-08 23:31:36'),
(92, 'workflowstep-delete', 'web', '2024-11-08 23:31:36', '2024-11-08 23:31:36'),
(93, 'documentrequirement-list', 'web', '2024-11-08 23:31:37', '2024-11-08 23:31:37'),
(94, 'documentrequirement-create', 'web', '2024-11-08 23:31:37', '2024-11-08 23:31:37'),
(95, 'documentrequirement-edit', 'web', '2024-11-08 23:31:37', '2024-11-08 23:31:37'),
(96, 'documentrequirement-delete', 'web', '2024-11-08 23:31:37', '2024-11-08 23:31:37'),
(97, 'documentsignature-list', 'web', '2024-11-08 23:31:37', '2024-11-08 23:31:37'),
(98, 'documentsignature-create', 'web', '2024-11-08 23:31:37', '2024-11-08 23:31:37'),
(99, 'documentsignature-edit', 'web', '2024-11-08 23:31:37', '2024-11-08 23:31:37'),
(100, 'documentsignature-delete', 'web', '2024-11-08 23:31:37', '2024-11-08 23:31:37'),
(101, 'duplicatedocument-list', 'web', '2024-11-08 23:31:37', '2024-11-08 23:31:37'),
(102, 'duplicatedocument-create', 'web', '2024-11-08 23:31:37', '2024-11-08 23:31:37'),
(103, 'duplicatedocument-edit', 'web', '2024-11-08 23:31:37', '2024-11-08 23:31:37'),
(104, 'duplicatedocument-delete', 'web', '2024-11-08 23:31:37', '2024-11-08 23:31:37'),
(105, 'file-list', 'web', '2024-11-08 23:31:37', '2024-11-08 23:31:37'),
(106, 'file-create', 'web', '2024-11-08 23:31:37', '2024-11-08 23:31:37'),
(107, 'file-edit', 'web', '2024-11-08 23:31:37', '2024-11-08 23:31:37'),
(108, 'file-delete', 'web', '2024-11-08 23:31:37', '2024-11-08 23:31:37'),
(109, 'filestore-list', 'web', '2024-11-08 23:31:37', '2024-11-08 23:31:37'),
(110, 'filestore-create', 'web', '2024-11-08 23:31:37', '2024-11-08 23:31:37'),
(111, 'filestore-edit', 'web', '2024-11-08 23:31:37', '2024-11-08 23:31:37'),
(112, 'filestore-delete', 'web', '2024-11-08 23:31:37', '2024-11-08 23:31:37'),
(113, 'license-list', 'web', '2024-11-08 23:31:37', '2024-11-08 23:31:37'),
(114, 'license-create', 'web', '2024-11-08 23:31:37', '2024-11-08 23:31:37'),
(115, 'license-edit', 'web', '2024-11-08 23:31:37', '2024-11-08 23:31:37'),
(116, 'license-delete', 'web', '2024-11-08 23:31:38', '2024-11-08 23:31:38'),
(117, 'licensesession-list', 'web', '2024-11-08 23:31:38', '2024-11-08 23:31:38'),
(118, 'licensesession-create', 'web', '2024-11-08 23:31:38', '2024-11-08 23:31:38'),
(119, 'licensesession-edit', 'web', '2024-11-08 23:31:38', '2024-11-08 23:31:38'),
(120, 'licensesession-delete', 'web', '2024-11-08 23:31:38', '2024-11-08 23:31:38'),
(121, 'mfacode-list', 'web', '2024-11-08 23:31:38', '2024-11-08 23:31:38'),
(122, 'mfacode-create', 'web', '2024-11-08 23:31:38', '2024-11-08 23:31:38'),
(123, 'mfacode-edit', 'web', '2024-11-08 23:31:38', '2024-11-08 23:31:38'),
(124, 'mfacode-delete', 'web', '2024-11-08 23:31:38', '2024-11-08 23:31:38'),
(125, 'smsconfiguration-list', 'web', '2024-11-08 23:31:38', '2024-11-08 23:31:38'),
(126, 'smsconfiguration-create', 'web', '2024-11-08 23:31:38', '2024-11-08 23:31:38'),
(127, 'smsconfiguration-edit', 'web', '2024-11-08 23:31:38', '2024-11-08 23:31:38'),
(128, 'smsconfiguration-delete', 'web', '2024-11-08 23:31:38', '2024-11-08 23:31:38'),
(129, 'smtpconfiguration-list', 'web', '2024-11-08 23:31:38', '2024-11-08 23:31:38'),
(130, 'smtpconfiguration-create', 'web', '2024-11-08 23:31:39', '2024-11-08 23:31:39'),
(131, 'smtpconfiguration-edit', 'web', '2024-11-08 23:31:39', '2024-11-08 23:31:39'),
(132, 'smtpconfiguration-delete', 'web', '2024-11-08 23:31:39', '2024-11-08 23:31:39'),
(133, 'userkey-list', 'web', '2024-11-08 23:31:39', '2024-11-08 23:31:39'),
(134, 'userkey-create', 'web', '2024-11-08 23:31:39', '2024-11-08 23:31:39'),
(135, 'userkey-edit', 'web', '2024-11-08 23:31:39', '2024-11-08 23:31:39'),
(136, 'userkey-delete', 'web', '2024-11-08 23:31:39', '2024-11-08 23:31:39'),
(137, 'workflowdocument-list', 'web', '2024-11-08 23:31:39', '2024-11-08 23:31:39'),
(138, 'workflowdocument-create', 'web', '2024-11-08 23:31:39', '2024-11-08 23:31:39'),
(139, 'workflowdocument-edit', 'web', '2024-11-08 23:31:39', '2024-11-08 23:31:39'),
(140, 'workflowdocument-delete', 'web', '2024-11-08 23:31:39', '2024-11-08 23:31:39'),
(141, 'workflowinstance-list', 'web', '2024-11-08 23:31:39', '2024-11-08 23:31:39'),
(142, 'workflowinstance-create', 'web', '2024-11-08 23:31:39', '2024-11-08 23:31:39'),
(143, 'workflowinstance-edit', 'web', '2024-11-08 23:31:39', '2024-11-08 23:31:39'),
(144, 'workflowinstance-delete', 'web', '2024-11-08 23:31:39', '2024-11-08 23:31:39'),
(145, 'workflowstepaction-list', 'web', '2024-11-08 23:31:39', '2024-11-08 23:31:39'),
(146, 'workflowstepaction-create', 'web', '2024-11-08 23:31:39', '2024-11-08 23:31:39'),
(147, 'workflowstepaction-edit', 'web', '2024-11-08 23:31:39', '2024-11-08 23:31:39'),
(148, 'workflowstepaction-delete', 'web', '2024-11-08 23:31:39', '2024-11-08 23:31:39'),
(149, 'workflowstepcomment-list', 'web', '2024-11-08 23:31:40', '2024-11-08 23:31:40'),
(150, 'workflowstepcomment-create', 'web', '2024-11-08 23:31:40', '2024-11-08 23:31:40'),
(151, 'workflowstepcomment-edit', 'web', '2024-11-08 23:31:40', '2024-11-08 23:31:40'),
(152, 'workflowstepcomment-delete', 'web', '2024-11-08 23:31:40', '2024-11-08 23:31:40'),
(153, 'workflowsteprequirement-list', 'web', '2024-11-08 23:31:40', '2024-11-08 23:31:40'),
(154, 'workflowsteprequirement-create', 'web', '2024-11-08 23:31:40', '2024-11-08 23:31:40'),
(155, 'workflowsteprequirement-edit', 'web', '2024-11-08 23:31:40', '2024-11-08 23:31:40'),
(156, 'workflowsteprequirement-delete', 'web', '2024-11-08 23:31:40', '2024-11-08 23:31:40');

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
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_by` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `status` enum('PENDING','ACTIVE','COMPLETED') DEFAULT 'PENDING',
  `start_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `end_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`id`, `created_at`, `updated_at`, `created_by`, `title`, `status`, `start_at`, `end_at`) VALUES
(12, '2024-12-05 09:03:55', '2024-12-05 09:03:55', '1', 'Is ana orange round?', 'PENDING', '2024-12-05 09:05:00', '2024-12-05 09:06:00');

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
(1, 'super-admin', 'web', '2024-11-12 02:05:03', '2024-11-12 02:05:03'),
(3, 'admin', 'web', '2024-11-12 02:05:20', '2024-11-12 02:05:20'),
(4, 'financial accountant', 'web', '2024-11-12 02:05:25', '2024-11-12 02:05:25'),
(6, 'Intern', 'web', '2024-12-04 10:55:09', '2024-12-04 10:56:32'),
(7, 'head of department', 'web', '2024-12-10 15:46:24', '2024-12-10 15:46:24');

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
(1, 1),
(1, 7),
(2, 1),
(2, 3),
(2, 7),
(3, 1),
(3, 3),
(4, 1),
(4, 3),
(5, 1),
(6, 1),
(6, 3),
(7, 1),
(7, 3),
(8, 1),
(8, 3),
(9, 1),
(10, 1),
(10, 3),
(11, 1),
(11, 3),
(12, 1),
(13, 1),
(13, 3),
(14, 1),
(14, 3),
(15, 1),
(16, 1),
(16, 3),
(17, 1),
(17, 3),
(18, 1),
(18, 3),
(19, 1),
(19, 3),
(20, 1),
(20, 3),
(21, 1),
(22, 1),
(22, 3),
(23, 1),
(23, 3),
(24, 1),
(24, 3),
(25, 1),
(25, 3),
(26, 1),
(26, 3),
(27, 1),
(28, 1),
(28, 3),
(29, 1),
(29, 3),
(30, 1),
(30, 3),
(31, 1),
(31, 3),
(32, 1),
(32, 3),
(33, 1),
(33, 3),
(34, 1),
(34, 3),
(35, 1),
(35, 3),
(36, 1),
(36, 3),
(37, 1),
(37, 3),
(38, 1),
(38, 3),
(39, 1),
(39, 3),
(40, 1),
(40, 3),
(41, 1),
(41, 3),
(42, 1),
(42, 3),
(43, 1),
(43, 3),
(44, 1),
(44, 3),
(45, 1),
(45, 3),
(46, 1),
(46, 3),
(47, 1),
(47, 3),
(48, 1),
(48, 3),
(49, 1),
(49, 3),
(50, 1),
(50, 3),
(51, 1),
(51, 3),
(52, 1),
(52, 3),
(53, 1),
(53, 3),
(54, 1),
(54, 3),
(55, 1),
(55, 3),
(56, 1),
(56, 3),
(57, 1),
(57, 3),
(58, 1),
(58, 3),
(59, 1),
(59, 3),
(60, 1),
(60, 3),
(61, 1),
(61, 3),
(62, 1),
(62, 3),
(63, 1),
(63, 3),
(64, 1),
(64, 3),
(65, 1),
(65, 3),
(66, 1),
(66, 3),
(67, 1),
(67, 3),
(68, 1),
(68, 3),
(69, 1),
(69, 3),
(70, 1),
(70, 3),
(71, 1),
(71, 3),
(72, 1),
(72, 3),
(73, 1),
(73, 3),
(74, 1),
(74, 3),
(75, 1),
(75, 3),
(76, 1),
(76, 3),
(77, 1),
(77, 3),
(78, 1),
(78, 3),
(79, 1),
(79, 3),
(80, 1),
(80, 3),
(81, 1),
(81, 3),
(82, 1),
(82, 3),
(83, 1),
(83, 3),
(84, 1),
(84, 3),
(85, 1),
(85, 3),
(86, 1),
(86, 3),
(86, 6),
(87, 1),
(87, 3),
(88, 1),
(88, 3),
(89, 1),
(89, 3),
(90, 1),
(90, 3),
(91, 1),
(91, 3),
(92, 1),
(92, 3),
(93, 1),
(93, 3),
(94, 1),
(94, 3),
(95, 1),
(95, 3),
(95, 6),
(96, 1),
(96, 3),
(97, 1),
(97, 3),
(98, 1),
(98, 3),
(98, 6),
(99, 1),
(99, 3),
(100, 1),
(100, 3),
(101, 1),
(101, 3),
(101, 6),
(102, 1),
(102, 3),
(103, 1),
(103, 3),
(104, 1),
(104, 3),
(105, 1),
(105, 3),
(106, 1),
(106, 3),
(107, 1),
(107, 3),
(108, 1),
(108, 3),
(109, 1),
(109, 3),
(110, 1),
(110, 3),
(110, 6),
(111, 1),
(111, 3),
(112, 1),
(112, 3),
(113, 1),
(113, 3),
(113, 6),
(114, 1),
(114, 3),
(115, 1),
(115, 3),
(116, 1),
(116, 3),
(117, 1),
(117, 3),
(118, 1),
(118, 3),
(119, 1),
(119, 3),
(119, 6),
(120, 1),
(120, 3),
(121, 1),
(121, 3),
(122, 1),
(122, 3),
(123, 1),
(123, 3),
(124, 1),
(124, 3),
(125, 1),
(125, 3),
(126, 1),
(126, 3),
(127, 1),
(127, 3),
(128, 1),
(128, 3),
(129, 1),
(129, 3),
(129, 6),
(130, 1),
(130, 3),
(131, 1),
(131, 3),
(132, 1),
(132, 3),
(133, 1),
(133, 3),
(134, 1),
(134, 3),
(135, 1),
(135, 3),
(136, 1),
(136, 3),
(137, 1),
(137, 3),
(138, 1),
(138, 3),
(139, 1),
(139, 3),
(140, 1),
(140, 3),
(141, 1),
(141, 3),
(142, 1),
(142, 3),
(143, 1),
(143, 3),
(144, 1),
(144, 3),
(145, 1),
(145, 3),
(146, 1),
(146, 3),
(147, 1),
(147, 3),
(148, 1),
(148, 3),
(149, 1),
(149, 3),
(150, 1),
(150, 3),
(151, 1),
(151, 3),
(152, 1),
(152, 3),
(153, 1),
(153, 3),
(154, 1),
(154, 3),
(155, 1),
(155, 3),
(156, 1),
(156, 3);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `day` enum('Monday','Tuesday','Wednesday','Thursday','Friday') NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `day`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 'Monday', '08:00:00', '16:00:00', '2024-06-21 03:51:13', '2024-06-21 03:51:13'),
(2, 'Tuesday', '08:00:00', '16:00:00', '2024-06-21 03:51:36', '2024-06-21 03:51:36'),
(3, 'Wednesday', '08:00:00', '16:00:00', '2024-06-21 03:52:01', '2024-06-21 03:52:01'),
(4, 'Thursday', '08:00:00', '16:00:00', '2024-06-21 03:52:19', '2024-06-21 03:52:19'),
(5, 'Friday', '08:00:00', '13:00:00', '2024-06-21 03:52:46', '2024-06-21 03:52:46');

-- --------------------------------------------------------

--
-- Table structure for table `STKrequests`
--

CREATE TABLE `STKrequests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `MerchantRequestID` varchar(255) NOT NULL,
  `CheckoutRequestID` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `MpesaReceiptNumber` varchar(255) DEFAULT NULL,
  `ResultDesc` varchar(255) DEFAULT NULL,
  `TransactionDate` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `streams`
--

CREATE TABLE `streams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `stream` varchar(191) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `streams`
--

INSERT INTO `streams` (`id`, `stream`, `created_by`, `created_at`, `updated_at`, `grade_id`) VALUES
(1, 'A', 3, '2023-12-06 06:12:13', '2023-12-06 06:12:13', 3),
(2, 'B', 3, '2023-12-06 06:12:13', '2024-01-14 00:22:58', 3);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adm_no` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `day_or_boarding` varchar(255) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `classteacher` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `adm_no`, `student_name`, `class`, `day_or_boarding`, `stream`, `classteacher`, `status`, `dob`, `gender`, `created_at`, `updated_at`) VALUES
(37, 254, 'Victor Kiruri', '7', 'B', '7 Tana', 'TR.Emmah', 'Present', '2011-10-22', 'M', '2024-12-04 09:16:38', '2024-12-04 09:16:38'),
(38, 255, 'Emmanuella Baraka', '7', 'B', '7Tana', 'TR.Emmah', 'Present', '2011-10-23', 'F', '2024-12-04 09:16:38', '2024-12-04 09:16:38'),
(39, 256, 'Precious Ngendo', '7', 'D.', '7 Nile', 'Mr.Mwangi', 'Present', '2012-02-04', 'F', '2024-12-04 09:16:38', '2024-12-04 09:16:38'),
(40, 257, 'Krisha Njeri', '7', 'D', '7 Athi', 'TR.Lydia', 'Present', '2011-04-15', 'F', '2024-12-04 09:16:38', '2024-12-04 09:16:38'),
(41, 258, 'Victor Kimani', '7', 'D', '7 Chania', 'Mr.Ng\'ang\'a', 'Present', '2012-03-08', 'M', '2024-12-04 09:16:38', '2024-12-04 09:16:38'),
(42, 259, 'Alvin Githinji', '7', 'D', '7 Galana', 'TR.Rachael', 'Present', '2012-03-08', 'M', '2024-12-04 09:16:38', '2024-12-04 09:16:38'),
(43, 260, 'Dennis Njane', '7', 'D', '7 Tana', 'TR.Emmah', 'Present', '2009-09-19', 'M', '2024-12-04 09:16:38', '2024-12-04 09:16:38'),
(44, 261, 'Cecelia Muthoni', '7', 'B', '7 Athi', 'TR.Lydia', 'Present', '2011-10-19', 'M', '2024-12-04 09:16:38', '2024-12-04 09:16:38'),
(45, 262, 'Wenlus Njoroge', '7', 'B', '7 Galana', 'TR.Rachael', 'Present', '2011-04-03', 'M', '2024-12-04 09:16:38', '2024-12-04 09:16:38'),
(46, 263, 'Sylene wamaitha', '7', 'D', '7 Galana', 'TR.Rachael', 'Present', '2011-04-03', 'M', '2024-12-04 09:16:38', '2024-12-04 09:16:38'),
(47, 264, 'Alvin Kabiru Mukiri', '7', 'D', '7 Chania', 'Mr.Ng\'ang\'a', 'Present', '2011-07-17', 'M', '2024-12-04 09:16:38', '2024-12-04 09:16:38'),
(48, 265, 'Ryan Mukono Mukiri', '7', 'D', '7  Galana', 'TR.Rachael', 'Present', '2011-07-17', 'M', '2024-12-04 09:16:38', '2024-12-04 09:16:38');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) NOT NULL,
  `surname` varchar(191) DEFAULT NULL,
  `title` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone_number` varchar(191) NOT NULL,
  `id_number` int(11) NOT NULL,
  `tsc_number` varchar(191) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `surname`, `title`, `email`, `phone_number`, `id_number`, `tsc_number`, `status`, `created_at`, `updated_at`) VALUES
(1, 'John', 'Mahendry', 'Mr.', 'karldevocdes@gmail.com', '0711667919', 90866243, '275234', 1, '2023-12-06 07:01:31', '2023-12-06 07:01:31'),
(2, 'Caleb', 'Mutua', 'Mr.', 'calebjohn@gmail.com', '0787654365', 28423723, 'wwr53453', 1, '2024-01-27 07:15:03', '2024-01-27 07:15:03'),
(3, 'Jane', 'Mulwa', 'Mrs.', 'jane#@gmail.com', '078765754', 4234234, '234234', 1, '2024-01-27 07:15:34', '2024-01-27 07:15:34'),
(4, 'Peter', 'Mwangi', 'Mr.', 'peter.mwangi@gmail.com', '0722334455', 12345678, 'TSC1234', 1, '2024-06-21 06:31:25', '2024-06-21 06:31:25'),
(5, 'Grace', 'Nyambura', 'Mrs.', 'grace.nyambura@gmail.com', '0733445566', 87654321, 'TSC5678', 1, '2024-06-21 06:31:25', '2024-06-21 06:31:25'),
(6, 'David', 'Odhiambo', 'Mr.', 'david.odhiambo@gmail.com', '0722112233', 23456789, 'TSC9101', 1, '2024-06-21 06:31:25', '2024-06-21 06:31:25'),
(7, 'Mary', 'Wanjiku', 'Ms.', 'mary.wanjiku@gmail.com', '0733221144', 34567890, 'TSC1121', 1, '2024-06-21 06:31:25', '2024-06-21 06:31:25'),
(8, 'Samuel', 'Kimani', 'Mr.', 'samuel.kimani@gmail.com', '0722334466', 45678901, 'TSC3141', 1, '2024-06-21 06:31:25', '2024-06-21 06:31:25'),
(9, 'Elizabeth', 'Achieng', 'Mrs.', 'elizabeth.achieng@gmail.com', '0733445577', 56789012, 'TSC5161', 1, '2024-06-21 06:31:25', '2024-06-21 06:31:25'),
(10, 'John', 'Kamau', 'Mr.', 'john.kamau@gmail.com', '0722112255', 67890123, 'TSC7181', 1, '2024-06-21 06:31:25', '2024-06-21 06:31:25'),
(11, 'Nancy', 'Njeri', 'Ms.', 'nancy.njeri@gmail.com', '0733221155', 78901234, 'TSC9202', 1, '2024-06-21 06:31:25', '2024-06-21 06:31:25'),
(12, 'Michael', 'Ochieng', 'Mr.', 'michael.ochieng@gmail.com', '0722334477', 89012345, 'TSC1222', 1, '2024-06-21 06:31:25', '2024-06-21 06:31:25'),
(13, 'Lucy', 'Wangui', 'Mrs.', 'lucy.wangui@gmail.com', '0733445588', 90123456, 'TSC3242', 1, '2024-06-21 06:31:25', '2024-06-21 06:31:25'),
(14, 'Joseph', 'Kariuki', 'Mr.', 'joseph.kariuki@gmail.com', '0722112266', 1234567, 'TSC5262', 1, '2024-06-21 06:31:25', '2024-06-21 06:31:25'),
(15, 'Beatrice', 'Wambui', 'Ms.', 'beatrice.wambui@gmail.com', '0733221166', 12345679, 'TSC7282', 1, '2024-06-21 06:31:25', '2024-06-21 06:31:25'),
(16, 'George', 'Ndungu', 'Mr.', 'george.ndungu@gmail.com', '0722334488', 23456791, 'TSC9303', 1, '2024-06-21 06:31:25', '2024-06-21 06:31:25'),
(17, 'Catherine', 'Mwikali', 'Mrs.', 'catherine.mwikali@gmail.com', '0733445599', 34567892, 'TSC1323', 1, '2024-06-21 06:31:25', '2024-06-21 06:31:25'),
(18, 'Anthony', 'Otieno', 'Mr.', 'anthony.otieno@gmail.com', '0722112277', 45678903, 'TSC3343', 1, '2024-06-21 06:31:25', '2024-06-21 06:31:25'),
(19, 'Florence', 'Nyaura', 'Ms.', 'florence.nyaura@gmail.com', '0733221177', 56789014, 'TSC5363', 1, '2024-06-21 06:31:25', '2024-06-21 06:31:25');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_learning_areas`
--

CREATE TABLE `teachers_learning_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `learning_area_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers_learning_areas`
--

INSERT INTO `teachers_learning_areas` (`id`, `teacher_id`, `learning_area_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2024-06-21 03:23:38', '2024-06-21 03:23:38'),
(2, 3, 2, '2024-06-21 03:32:46', '2024-06-21 03:32:46'),
(3, 4, 5, '2024-06-21 03:32:59', '2024-06-21 03:32:59'),
(4, 5, 6, '2024-06-21 03:33:10', '2024-06-21 03:33:10'),
(5, 11, 41, '2024-06-21 03:54:06', '2024-06-21 03:54:06'),
(7, 19, 43, '2024-06-21 05:04:30', '2024-06-21 05:04:30'),
(8, 16, 15, '2024-06-21 05:04:45', '2024-06-21 05:04:45'),
(9, 17, 13, '2024-06-21 05:04:59', '2024-06-21 05:04:59'),
(10, 2, 14, '2024-06-21 05:05:16', '2024-06-21 05:05:16'),
(11, 9, 37, '2024-06-21 05:05:36', '2024-06-21 05:05:36'),
(12, 17, 7, '2024-06-21 08:05:15', '2024-06-21 08:05:15'),
(13, 1, 19, '2024-06-21 08:05:27', '2024-06-21 08:05:27'),
(14, 18, 46, '2024-06-21 08:07:03', '2024-06-21 08:07:03'),
(15, 14, 44, '2024-06-21 08:07:22', '2024-06-21 08:07:22'),
(16, 1, 42, '2024-06-21 08:07:31', '2024-06-21 08:07:31'),
(17, 10, 38, '2024-06-21 08:07:47', '2024-06-21 08:07:47'),
(18, 3, 35, '2024-06-21 08:07:59', '2024-06-21 08:07:59'),
(19, 6, 33, '2024-06-21 08:08:13', '2024-06-21 08:08:13'),
(21, 15, 32, '2024-06-21 08:10:18', '2024-06-21 08:10:18'),
(22, 8, 25, '2024-06-21 08:10:56', '2024-06-21 08:10:56'),
(23, 1, 2, '2024-06-21 08:14:10', '2024-06-21 08:14:10'),
(24, 4, 3, '2024-06-21 08:14:22', '2024-06-21 08:14:22'),
(25, 9, 4, '2024-06-21 08:14:58', '2024-06-21 08:14:58'),
(26, 6, 21, '2024-06-21 08:17:09', '2024-06-21 08:17:09'),
(27, 1, 20, '2024-06-21 08:17:17', '2024-06-21 08:17:17'),
(28, 5, 18, '2024-06-21 08:17:28', '2024-06-21 08:17:28');

-- --------------------------------------------------------

--
-- Table structure for table `timeslots`
--

CREATE TABLE `timeslots` (
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `event` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timeslots`
--

INSERT INTO `timeslots` (`start_time`, `end_time`, `event`, `created_at`, `updated_at`, `id`) VALUES
('08:00:00', '08:40:00', 'Lesson1', NULL, NULL, 1),
('08:40:00', '09:20:00', 'Lesson2', NULL, NULL, 2),
('09:40:00', '10:20:00', 'Lesson3', NULL, NULL, 3),
('10:20:00', '11:00:00', 'Lesson4', NULL, NULL, 4),
('11:40:00', '12:20:00', 'Lesson5', NULL, NULL, 5),
('12:20:00', '13:00:00', 'Lesson6', NULL, NULL, 6),
('14:00:00', '14:40:00', 'Lesson7', NULL, NULL, 7),
('14:40:00', '15:20:00', 'Lesson8', NULL, NULL, 8),
('15:20:00', '16:00:00', 'Lesson9', NULL, NULL, 9);

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `poll_id` bigint(20) UNSIGNED NOT NULL,
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `b2b_transactions`
--
ALTER TABLE `b2b_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `breaks`
--
ALTER TABLE `breaks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c2brequests`
--
ALTER TABLE `c2brequests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_learning_areas`
--
ALTER TABLE `grade_learning_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grade_teachers`
--
ALTER TABLE `grade_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learning_areas`
--
ALTER TABLE `learning_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parents_adm_no_unique` (`adm_no`);

--
-- Indexes for table `parent_student_relations`
--
ALTER TABLE `parent_student_relations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- Indexes for table `polls`
--
ALTER TABLE `polls`
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
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `STKrequests`
--
ALTER TABLE `STKrequests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stkrequests_merchantrequestid_unique` (`MerchantRequestID`),
  ADD UNIQUE KEY `stkrequests_checkoutrequestid_unique` (`CheckoutRequestID`);

--
-- Indexes for table `streams`
--
ALTER TABLE `streams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `streams_grade_id_foreign` (`grade_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_adm_no_unique` (`adm_no`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers_learning_areas`
--
ALTER TABLE `teachers_learning_areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_learning_areas_teacher_id_foreign` (`teacher_id`),
  ADD KEY `teachers_learning_areas_learning_area_id_foreign` (`learning_area_id`);

--
-- Indexes for table `timeslots`
--
ALTER TABLE `timeslots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `b2b_transactions`
--
ALTER TABLE `b2b_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c2brequests`
--
ALTER TABLE `c2brequests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `parent_student_relations`
--
ALTER TABLE `parent_student_relations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `STKrequests`
--
ALTER TABLE `STKrequests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
