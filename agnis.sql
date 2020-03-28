-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2020 at 08:58 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agnis`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Inactive',
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Inactive',
  `sortdec` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `difficulty` enum('beginner','intermediate','expert') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coursetype` enum('free','paid') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `learn` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overview` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` datetime DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `enrolledstudent` int(11) DEFAULT NULL,
  `requiredskills` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `slug`, `status`, `sortdec`, `difficulty`, `coursetype`, `price`, `learn`, `overview`, `duration`, `description`, `author`, `enrolledstudent`, `requiredskills`, `created_at`, `updated_at`) VALUES
(17, 'C Programming', NULL, 'Inactive', 'bfbfgbfgbdfbvzxczxfsdxc xcgvdfbvgbfgbfdv', 'beginner', 'free', NULL, 'dvsdcvvscsdcsdhgcvvghvxhasvasgvhgvhvgsdcs', 'dcvdfgdfbdvdfsdfZsddgfbzxdsescsdwefsdgfghty', NULL, NULL, NULL, NULL, 'UGSDCUYSDBCBSDJCBUDSYCUYSBCUYUY', '2019-11-16 03:55:57', '2019-11-26 06:44:57'),
(20, 'aws fundamental', NULL, 'Inactive', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'beginner', 'paid', '20', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL, NULL, NULL, 'asdasdasd asdsadasd asdasdasd', '2019-11-26 05:40:23', '2019-11-27 00:19:51'),
(21, 'Programming in Python', NULL, 'Active', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'beginner', 'free', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL, NULL, NULL, 'Basic Computer knowledge', '2019-11-27 06:51:32', '2019-11-27 06:51:32'),
(23, 'the lion king', NULL, 'Active', 'xcxzvfbvdfbdfb dfbdxzczczxcsdfsdus', 'beginner', 'paid', '200', 'sdvbdsfbvbfuvbubfubsdbsa', 'zxcdzfdsgrgftrhtyjuyjtyjcbbvuysgdvcuysduyds', NULL, NULL, NULL, NULL, 'fdsfgfvdfghfgthfbcxz', '2019-12-02 06:23:30', '2019-12-09 07:46:37'),
(29, 'New Dummy Course', NULL, 'Active', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'beginner', 'free', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL, NULL, NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2019-12-11 04:34:57', '2019-12-11 04:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `course_group`
--

CREATE TABLE `course_group` (
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_group`
--

INSERT INTO `course_group` (`course_id`, `group_id`) VALUES
(20, 1),
(23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_term`
--

CREATE TABLE `course_term` (
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_term`
--

INSERT INTO `course_term` (`course_id`, `term_id`) VALUES
(20, 16),
(21, 22),
(23, 16),
(29, 16);

-- --------------------------------------------------------

--
-- Table structure for table `course_user`
--

CREATE TABLE `course_user` (
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_user`
--

INSERT INTO `course_user` (`course_id`, `user_id`) VALUES
(17, 9),
(20, 9),
(21, 12),
(23, 12),
(29, 9),
(29, 12),
(29, 13);

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
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Inactive',
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `status`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Group A', 'Active', 'group-a', 'gfhfhfbfbfdsfcxcfsdxcfvcxdff', '2019-11-22 06:43:02', '2019-11-27 00:31:00'),
(3, 'Group B', 'Active', 'group-b', 'gghnfgnfbcbvdfgfgvvcx', '2019-11-23 04:45:42', '2019-11-27 00:30:52'),
(4, 'Group C', 'Active', 'group-c', NULL, '2019-11-27 07:28:21', '2019-11-27 07:29:04'),
(5, 'Design team', 'Active', 'design-team', NULL, '2019-11-28 02:27:51', '2019-11-28 02:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `group_user`
--

CREATE TABLE `group_user` (
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_user`
--

INSERT INTO `group_user` (`group_id`, `user_id`) VALUES
(1, 9),
(4, 12),
(5, 13),
(5, 14);

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Inactive',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contenttype` enum('video','doc') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topics` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lessontype` enum('paid','free') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `VideoId` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `name`, `status`, `description`, `contenttype`, `duration`, `topics`, `lessontype`, `unit_id`, `course_id`, `VideoId`, `created_at`, `updated_at`) VALUES
(10, 'DFIIGBFIGBINFGIBIUFGIUN', 'Inactive', 'SDIUFIUDSFVINFDINVIDFNKVBNKJFBKNFGIU', 'doc', 'IASDCIUSDIUNDSVDFIIUDFBIDNFINININFVN', '[\"fvfvv\",\"xfvmsvinf\",\"sdfgvdvxvf\"]', NULL, 13, 17, '2019-11-161573896378.pdf', '2019-11-16 03:56:18', '2019-11-16 03:56:18'),
(11, 'NFIGHIDFHBIHFIBNFGBIUFGIUHBNNFGKJBNJKFD', 'Inactive', 'IAHSCIUHSDIVNFVIDFIVUIUNXISIUIUS', 'video', 'IUHASCISDIVIDFVNDFJKVNJKDFBVIUDIUBHNFKNVJIKIUDFIUS', '[\"fvfvv\",\"xfvmsvinf\",\"sdfgvdvxvf\"]', NULL, 13, 17, '<iframe width=\"250\" height=\"150\" src=\"https://www.youtube.com/embed/si-KFFOW2gw\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2019-11-16 03:56:50', '2019-11-16 03:56:50'),
(12, 'sdficgdsvchdbvhfbnvjhfbvjhb', 'Inactive', 'bfjbcjhsdfdvdfbvmdfiobvjhbfdjbvdjfhbjhvjhdfbh', 'video', 'ihssidsdbcbsdhjvbcjbvnfvnfjkkjkkncn', '[\"fvfvv\",\"xfvmsvinf\",\"sdfgvdvxvf\"]', NULL, 14, 17, '<iframe width=\"250\" height=\"150\" src=\"https://www.youtube.com/embed/Dv7gLpW91DM\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2019-11-16 03:59:03', '2019-11-16 04:56:12'),
(16, 'lesson 2', 'Active', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'doc', '213', '[\"fvfvv\",\"xfvmsvinf\",\"sdfgvdvxvf\"]', 'free', 19, 20, '2019-11-271574855400.pdf', '2019-11-26 05:59:07', '2019-11-27 06:20:00'),
(17, 'lesson 3', 'Inactive', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'doc', '213', '[\"xc\",\"zcczcdcsdcc\",\"asdfscx\",\"ewdf\",\"asdf\"]', 'free', 20, 20, '2019-11-261574767776.pdf', '2019-11-26 05:59:36', '2019-11-27 05:06:38'),
(19, 'c xc xc sdcx', 'Active', 'zxczx  zxcz  zxc zc zc zxczx', 'doc', '56hrs', '[\"xcsdc\",\"sdfsdfcsdc\",\"sdcsdsdvc\",\"sdfcsdsdvsd\",\"vsdvdsfvds\"]', 'free', 19, 20, '2019-11-271574849928.pdf', '2019-11-27 04:48:49', '2019-11-27 04:48:49'),
(21, 'Chapter 1', 'Active', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'doc', '55 min', '[\"dfvsdfsdcv\",\"wef\",\"wefc\",\"sdf\",\"sdfsdfcsdf\"]', NULL, 23, 21, '2019-11-271574857460.pdf', '2019-11-27 06:54:20', '2019-11-27 06:54:20'),
(22, 'Chapter 2', 'Active', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'video', '6:14:06', '[\"fdvdfbdv\",\"dfvdfnv\",\"dfgvdfvdf\",\"fdvdfvdsf\",\"dffvdfvdsf\"]', NULL, 23, 21, '<iframe width=\"250\" height=\"150\" src=\"https://www.youtube.com/embed/_uQrJ0TkZlc\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '2019-11-27 07:04:44', '2019-11-27 07:04:44'),
(28, 'MI Device app drawer', 'Active', 'jchfvidfvbjbuvbv  bfuifvjb fbbcbzjhuysdfjbhjhHFahgsdsvv', 'video', '5 Hour,4 Minute,56 Second', '[\"fdgbfd\",\"fdgfgdfg\",\"dfgdfgdfg\",\"gdfgdfg\",\"gdgd\"]', 'free', 30, 23, 'https://www.youtube.com/watch?v=2T4M9XI8oYg', '2019-12-03 04:55:55', '2019-12-03 04:55:55'),
(29, 'Mi Ui 11 Tricks', 'Active', 'ifvkkjnkjxjkbcsdjfjbsdjbjbzjxbfdsdfbsbjsdf', 'video', '[\"8\",\"9\"]', '[\"fghbfgfg\",\"ghrthfgggdf\",\"dfgdfgdf\",\"dfgdfgfdhgf\",\"dfgfdgd\"]', 'paid', 31, 23, 'https://www.youtube.com/watch?v=JII2mUhJgj0', '2019-12-03 05:00:11', '2019-12-11 01:20:11'),
(30, 'C Programming', 'Inactive', 'since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'doc', '[\"15\",\"7\"]', '[\"sdfsdf\",\"sdfdfgdgsdf\",\"sdfgdgs\",\"sdfgdfg\"]', 'free', 30, 23, NULL, '2019-12-03 08:04:17', '2019-12-10 04:03:03'),
(37, 'cvb dgdrg', 'Inactive', 'ffdejhbxcvuhubsdfjbfsefdsufsd', 'doc', '[\"8\",\"5\"]', '[\"fgbhfgb\",\"fgbfgb\",\"gcbhfgb\"]', NULL, 38, 29, '2019-12-111576060951.pdf', '2019-12-11 05:12:31', '2019-12-11 05:12:31');

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
(6, '2015_05_06_194030_create_youtube_access_tokens_table', 4),
(20, '2014_10_12_000000_create_users_table', 5),
(21, '2014_10_12_100000_create_password_resets_table', 5),
(22, '2019_08_19_000000_create_failed_jobs_table', 5),
(23, '2019_10_24_085829_create_permission_tables', 5),
(24, '2019_10_24_094514_create_terms_table', 5),
(25, '2019_10_28_102226_create_courses_table', 5),
(26, '2019_10_28_113044_create_course_term_pivot_table', 5),
(27, '2019_10_28_121402_create_units_table', 5),
(28, '2019_10_28_122443_create_lessons_table', 5),
(33, '2019_11_18_074518_create_questions_table', 6),
(34, '2019_11_18_074916_create_answers_table', 6),
(35, '2019_11_21_094811_create_course_user_pivot_table', 7),
(37, '2019_11_22_103219_create_groups_table', 8),
(38, '2019_11_22_104242_create_group_user_pivot_table', 9),
(39, '2019_11_26_091504_create_course_group_pivot_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 3),
(4, 'App\\User', 3),
(4, 'App\\User', 8),
(4, 'App\\User', 16),
(4, 'App\\User', 20),
(4, 'App\\User', 21),
(5, 'App\\User', 9),
(5, 'App\\User', 12),
(5, 'App\\User', 13),
(5, 'App\\User', 14),
(5, 'App\\User', 22),
(5, 'App\\User', 23),
(5, 'App\\User', 24),
(5, 'App\\User', 25),
(5, 'App\\User', 26);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
(2, 'permission-create', 'web', NULL, '2019-10-23 23:16:07', '2019-10-23 23:16:07'),
(3, 'permission-update', 'web', NULL, '2019-10-23 23:32:11', '2019-10-23 23:32:11'),
(4, 'permission-delete', 'web', NULL, '2019-10-23 23:32:54', '2019-10-23 23:32:54'),
(5, 'roles', 'web', NULL, '2019-10-23 23:33:25', '2019-10-23 23:33:25'),
(6, 'roles-create', 'web', NULL, '2019-10-23 23:42:07', '2019-10-23 23:42:07'),
(7, 'roles-update', 'web', NULL, '2019-10-23 23:43:52', '2019-10-23 23:43:52'),
(8, 'roles-delete', 'web', NULL, '2019-10-23 23:45:13', '2019-10-23 23:45:13'),
(9, 'roles-permissions', 'web', NULL, '2019-10-23 23:45:41', '2019-10-24 00:23:00'),
(10, 'manage-user', 'web', NULL, '2019-10-24 00:10:40', '2019-10-24 00:10:40'),
(11, 'create-user', 'web', NULL, '2019-10-24 00:11:04', '2019-10-24 00:11:04'),
(12, 'edit-user', 'web', NULL, '2019-10-24 00:11:20', '2019-10-24 00:11:20'),
(13, 'delete-user', 'web', NULL, '2019-10-24 00:11:55', '2019-10-24 00:11:55'),
(14, 'categories', 'web', NULL, '2019-10-24 00:12:19', '2019-10-24 00:12:19'),
(15, 'create-category', 'web', NULL, '2019-10-24 00:12:43', '2019-10-24 00:12:43'),
(16, 'update-category', 'web', NULL, '2019-10-24 00:13:04', '2019-10-24 00:13:04'),
(17, 'delete-category', 'web', NULL, '2019-10-24 00:13:45', '2019-10-24 00:13:45'),
(18, 'tags', 'web', NULL, '2019-10-24 00:18:03', '2019-10-24 00:18:03'),
(19, 'create-tag', 'web', NULL, '2019-10-24 00:18:21', '2019-10-24 00:18:21'),
(20, 'update-tag', 'web', NULL, '2019-10-24 00:20:56', '2019-10-24 00:20:56'),
(22, 'role-assign', 'web', NULL, '2019-10-24 00:41:05', '2019-10-24 00:41:05'),
(24, 'delete-tag', 'web', NULL, '2019-10-24 01:35:58', '2019-10-24 01:35:58'),
(25, 'permissions', 'web', 'View permissions', '2019-10-25 01:10:10', '2019-10-25 01:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `que_type` enum('single-select','multi-select','free-answer') COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `status`, `que_type`, `answer`, `course_id`, `unit_id`, `created_at`, `updated_at`) VALUES
(7, 'fvb fc c dfb vfdb', 'Active', 'single-select', '[{\"opt\":\"dfvdfvbdfb\"},{\"opt\":\"dfbvdfbvdfbvd\",\"correction\":\"right\"},{\"opt\":\"fdvdfvsfsdfsd\"}]', 23, 31, '2019-12-09 09:18:14', '2019-12-09 09:18:14'),
(8, 'fbvdfbvjhb ?', 'Active', 'multi-select', '[{\"opt\":\"bfgbfgbb\",\"correction\":\"right\"},{\"opt\":\"sxcsdfs\",\"correction\":\"right\"},{\"opt\":\"xzfcszdfses\"}]', 23, 31, '2019-12-09 09:30:17', '2019-12-09 09:30:17'),
(10, 'dfb odjfb n dkfhnvundfv', 'Active', 'single-select', '[{\"opt\":\"gfbfgb\",\"correction\":\"right\"},{\"opt\":\"fbfgb\"},{\"opt\":\"gbfgb\"}]', 23, 37, '2019-12-10 01:15:22', '2019-12-10 01:15:22'),
(11, 'jhfhgvhg jhuyg hg', 'Active', 'single-select', '[{\"opt\":\"vvhgvhg\"},{\"opt\":\"jfgtrdtrg\",\"correction\":\"right\"},{\"opt\":\"jftyft ghctyt\"}]', 23, 37, '2019-12-11 01:37:48', '2019-12-11 01:37:48');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', 'admin', '2019-10-23 23:10:08', '2019-10-23 23:10:08'),
(2, 'author', 'web', 'author', '2019-10-23 23:10:28', '2019-10-23 23:10:28'),
(4, 'user', 'web', 'user', '2019-10-24 00:37:12', '2019-10-24 00:37:12'),
(5, 'student', 'web', 'student', '2019-11-22 00:58:03', '2019-11-22 00:58:03');

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
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(5, 2),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(10, 2),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(14, 2),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(18, 2),
(19, 1),
(20, 1),
(22, 1),
(24, 1),
(25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE `terms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Inactive',
  `type` enum('category','visible tag','hidden tag') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent` int(10) UNSIGNED DEFAULT NULL,
  `parent_type` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`id`, `name`, `slug`, `status`, `type`, `description`, `parent`, `parent_type`, `created_at`, `updated_at`) VALUES
(16, 'Cloud computing', 'cloud-computing', 'Active', 'category', NULL, NULL, 'No', '2019-11-26 05:28:28', '2019-11-26 05:28:28'),
(17, 'Computer', 'computer', 'Active', 'category', NULL, 16, 'Yes', '2019-11-26 06:11:07', '2019-11-26 06:11:07'),
(22, 'Computer programming', 'computer-programming', 'Active', 'category', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, 'No', '2019-11-27 06:47:55', '2019-11-27 06:47:55'),
(24, 'Design category', 'design-category', 'Inactive', 'category', 'this is design categ123', NULL, 'No', '2019-11-28 01:40:34', '2019-11-28 01:43:06'),
(25, 'UIUX categ', 'uiux-categ', 'Active', 'category', 'this sub categ', 24, 'Yes', '2019-11-28 01:41:25', '2019-11-28 01:41:43'),
(26, 'hulo hidden tag', 'hulo-hidden-tag', 'Inactive', 'hidden tag', NULL, NULL, 'No', '2019-11-28 01:42:48', '2019-11-28 01:42:48'),
(27, 'hulo visible tag', 'hulo-visible-tag', 'Active', 'visible tag', NULL, NULL, 'No', '2019-11-28 01:44:15', '2019-11-28 01:44:15');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `course_id`, `created_at`, `updated_at`) VALUES
(13, 'C Programming', 17, '2019-11-16 03:56:00', '2019-11-16 03:56:00'),
(14, 'programming in c', 17, '2019-11-16 03:58:31', '2019-11-16 03:58:31'),
(17, 'The Quiz', 17, '2019-11-16 05:13:09', '2019-11-16 05:13:09'),
(19, 'group 1', 20, '2019-11-26 05:42:51', '2019-11-26 05:42:51'),
(20, 'group 2', 20, '2019-11-26 05:59:16', '2019-11-26 05:59:16'),
(23, 'Introduction', 21, '2019-11-27 06:53:45', '2019-11-27 06:53:45'),
(30, 'Introduction', 23, '2019-12-03 00:34:49', '2019-12-03 00:50:37'),
(31, 'Overview', 23, '2019-12-03 04:58:42', '2019-12-03 08:05:58'),
(37, 'The Quiz', 23, '2019-12-10 00:42:58', '2019-12-10 00:42:58'),
(38, 'Introduction', 29, '2019-12-11 04:36:04', '2019-12-11 04:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Inactive',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `status`, `email`, `image`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Active', 'admin@test.com', NULL, NULL, NULL, '$2y$10$fqNW3eU7HI/GpYwNTaTPYuXCu7kMobTVrbxGbDWZEBNRlSK30OMCC', NULL, '2019-10-23 22:22:10', '2019-10-23 22:22:10'),
(3, 'Nitesh Devnath', 'Active', 'test@test.com', NULL, NULL, NULL, '$2y$10$6d9JnuipNIkGmCTp2LeLOeLsNNiZcCw79nU2tb1vFIxSIVcHXxh5O', NULL, '2019-10-24 01:37:03', '2019-11-26 06:37:05'),
(8, 'Nitesh Devnath', 'Active', 'niteshubi19@gmail.com', NULL, NULL, NULL, '$2y$10$.9IVFROohH8ODFMJKp4LQuvm90qdYWvm8ofsdWeTP6/wtmQ4ZbKce', NULL, '2019-10-25 00:02:29', '2019-10-25 00:11:25'),
(9, 'Nitesh Devnath', 'Active', 'jogafi9826@gmail.com', NULL, NULL, NULL, '$2y$10$pZluqpLpNpblZQhdYtY6quIgPH3b8VNexTYm83zt8rJdRTYhtuR2O', NULL, '2019-11-22 02:10:17', '2019-11-22 04:54:46'),
(12, 'Riya Roy', 'Active', 'riyaroy@gmail.com', NULL, NULL, NULL, '$2y$10$kzaaW0oKkg2Y2nhJwU.7DOyoUhkoymPJCLJ.dCmVtoYyGTj41Z1nG', NULL, '2019-11-27 07:09:55', '2019-11-27 07:09:55'),
(13, 'ashish', 'Active', 'ashish@gmail.com', NULL, NULL, NULL, '$2y$10$GL8LYr1LuuMdisxWOA0iSecjtk0jODgPINSg4TvjBBhdJLrfq5t3m', NULL, '2019-11-28 02:31:28', '2019-11-28 02:31:28'),
(14, 'nit', 'Active', 'ni@yahoo.com', NULL, NULL, NULL, '$2y$10$9EqURSZihH/xhBn5PH9mBeT97crJOvbX6AdMm3Ziv2cyNM8MxwAfG', NULL, '2019-11-28 02:32:31', '2019-11-28 02:32:31'),
(16, 'nit', 'Active', 'nit@gmail.com', NULL, NULL, NULL, '$2y$10$18lB.obb7eRebu9fPMXJr.oGNB9Ej80R6QN6.FnX4DFYwC7nWdYrK', NULL, '2019-11-28 07:03:20', '2019-11-28 07:03:20'),
(20, 'Nitesh Devnath', 'Inactive', 'tesst@gmail.com', NULL, NULL, NULL, '$2y$10$AfEHBCTgDi1MFekC674rbuJpSWocWzlTXqlkLwRENeVRxaxawFef.', NULL, '2019-11-29 02:53:53', '2019-11-29 02:53:53'),
(21, 'Nitesh Devnath', 'Active', 'adminssssssss@test.com', NULL, NULL, NULL, '$2y$10$npTR7v4gdiGjKlToUFyg8O6Nn33CGHilX/1COSUtV4zbmZR71OqhO', NULL, '2019-11-29 02:54:39', '2019-11-29 02:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `youtube_access_tokens`
--

CREATE TABLE `youtube_access_tokens` (
  `id` int(11) NOT NULL,
  `access_token` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_group`
--
ALTER TABLE `course_group`
  ADD PRIMARY KEY (`course_id`,`group_id`),
  ADD KEY `course_group_course_id_index` (`course_id`),
  ADD KEY `course_group_group_id_index` (`group_id`);

--
-- Indexes for table `course_term`
--
ALTER TABLE `course_term`
  ADD PRIMARY KEY (`course_id`,`term_id`),
  ADD KEY `course_term_course_id_index` (`course_id`),
  ADD KEY `course_term_term_id_index` (`term_id`);

--
-- Indexes for table `course_user`
--
ALTER TABLE `course_user`
  ADD PRIMARY KEY (`course_id`,`user_id`),
  ADD KEY `course_user_course_id_index` (`course_id`),
  ADD KEY `course_user_user_id_index` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_user`
--
ALTER TABLE `group_user`
  ADD PRIMARY KEY (`group_id`,`user_id`),
  ADD KEY `group_user_group_id_index` (`group_id`),
  ADD KEY `group_user_user_id_index` (`user_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_unit_id_index` (`unit_id`),
  ADD KEY `lessons_course_id_index` (`course_id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_course_id_index` (`course_id`),
  ADD KEY `questions_unit_id_index` (`unit_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `terms`
--
ALTER TABLE `terms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `terms_slug_unique` (`slug`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `units_course_id_index` (`course_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `youtube_access_tokens`
--
ALTER TABLE `youtube_access_tokens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `terms`
--
ALTER TABLE `terms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `youtube_access_tokens`
--
ALTER TABLE `youtube_access_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_group`
--
ALTER TABLE `course_group`
  ADD CONSTRAINT `course_group_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_group_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_term`
--
ALTER TABLE `course_term`
  ADD CONSTRAINT `course_term_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_term_term_id_foreign` FOREIGN KEY (`term_id`) REFERENCES `terms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_user`
--
ALTER TABLE `course_user`
  ADD CONSTRAINT `course_user_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `group_user`
--
ALTER TABLE `group_user`
  ADD CONSTRAINT `group_user_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lessons_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `questions_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
