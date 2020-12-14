-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 14, 2020 at 08:07 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bugtraq`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_group` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `emp_id`, `user_group`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Gerry J', 'gerryj@gmail.com', '$2y$10$5msBp.eRwTXLoxBjhKT5Qeg8s/VEcrGSFGLSl4WeFdrSUcOF8ggrK', 'BTQ000', 'Admin', 'XP84DiwxZdWhuo4UEKdIupNh8YPmH8l8uAzoDUHfAtLeLtKXiKfwgZ3xEk8Q', '2020-03-09 20:08:40', '2020-03-09 20:08:40');

-- --------------------------------------------------------

--
-- Table structure for table `bugs`
--

DROP TABLE IF EXISTS `bugs`;
CREATE TABLE IF NOT EXISTS `bugs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(11) NOT NULL,
  `assigned` int(10) DEFAULT NULL,
  `type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `due_date` date NOT NULL,
  `reporter` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reporter_id` int(10) DEFAULT NULL,
  `priority` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'To Do',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bugs_project_id_foreign` (`project_id`),
  KEY `bugs_assigned_foreign` (`assigned`),
  KEY `bugs_priority_foreign` (`priority`),
  KEY `bugs_status_foreign` (`status`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bugs`
--

INSERT INTO `bugs` (`id`, `title`, `description`, `project_id`, `assigned`, `type`, `due_date`, `reporter`, `reporter_id`, `priority`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ads', 'Many popup ads overlaping the navigation bar in the App', 3, 1, 'Control flow', '2020-11-27', 'Ray', NULL, 'Minor', 'In Review(By QA)', '2020-03-11 12:21:02', '2020-11-15 18:59:43'),
(2, 'incorrect total amount addition', 'Addition in the total amount of purchases for a customer are wrong.', 5, 1, 'Calculation', '2020-12-17', 'RoseMarion Atieno', NULL, 'Major', 'Approved', '2020-03-11 17:45:16', '2020-12-13 05:22:58'),
(3, 'My CV', 'cvbn', 3, 4, 'Missing Commands', '2020-04-23', 'Ray', NULL, 'Medium', 'In Review(By QA)', '2020-03-12 13:36:46', '2020-07-16 15:24:12'),
(4, 'Git module', 'Git module not functioning properly', 7, 1, 'Functional', '2020-06-13', 'Richard', NULL, 'Major', 'New', '2020-03-19 20:29:17', '2020-03-19 20:29:17'),
(5, 'Loan module not working', 'Unable to view loans of employees', 1, 10, 'Missing Commands', '2020-04-14', 'Richard Mungai', NULL, 'Major', 'In Progress (By Dev)', '2020-03-21 18:03:43', '2020-03-30 16:47:58'),
(6, 'Connect status', 'Connect Status always defaults to false', 19, 31, 'Control flow', '2020-12-30', 'Richard Mungai', NULL, 'Medium', 'New', '2020-03-21 18:12:58', '2020-12-14 16:50:29'),
(7, 'Statutory Benefits section', 'Admin cannot create and assign statutory benefits to a person', 1, 10, 'Functional', '2020-04-27', 'Richard Mungai', NULL, 'Medium', 'New', '2020-03-21 18:16:22', '2020-03-21 18:16:22'),
(9, 'Ad payment cards', 'Users are unable to addcards for payment service', 3, 4, 'Error handling', '2020-06-05', 'Becky G', 5, 'Major', 'In Progress (By Dev)', '2020-03-21 18:32:03', '2020-07-08 14:36:23'),
(10, 'Network Connectivity based on location', 'Some geographical locations have denied access to Huawei servers', 3, 31, 'Communication', '2020-12-24', 'Victor Vilo', 7, 'Major', 'New', '2020-03-21 18:34:31', '2020-12-14 17:04:50'),
(14, 'Unable to fetch libraries', 'Unable to update package dependecies needed for module', 16, 1, 'Functional', '2020-09-17', 'Victor Vilo', 7, 'Major', 'To Do', '2020-07-10 12:59:46', '2020-07-10 12:59:46'),
(13, 'Home Page not found error', '404 not found error', 5, 4, 'Functional', '2020-08-16', 'Becky G', 5, 'Major', 'In Review(By QA)', '2020-07-08 14:21:25', '2020-07-08 14:35:29'),
(18, 'Appointment Failure', 'Patient is unable to book appointment as an error pop ups', 2, 1, 'Functional', '2020-08-18', 'Becky G', 5, 'Major', 'New', '2020-07-16 14:34:39', '2020-07-16 14:34:39'),
(51, 'Daraja Platform', 'For intergrating MPESA into websites', 17, 31, 'Functional', '2021-01-01', 'Victor Vilo', 7, 'Major', 'To Do', '2020-12-14 17:00:44', '2020-12-14 17:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `bug_attachments`
--

DROP TABLE IF EXISTS `bug_attachments`;
CREATE TABLE IF NOT EXISTS `bug_attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `att_name` text NOT NULL,
  `bug_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bug_attachments`
--

INSERT INTO `bug_attachments` (`id`, `att_name`, `bug_id`, `created_at`, `update_at`) VALUES
(1, '658977.png', 1, '2020-11-14 14:37:53', NULL),
(2, 'Screenshot (1).png', 18, '2020-11-15 10:11:32', NULL),
(3, 'document.pdf', 18, '2020-11-15 10:39:01', NULL),
(4, 'Screenshot (1).png', 24, '2020-11-15 11:22:41', NULL),
(5, 'Screenshot (2).png', 24, '2020-11-15 11:22:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachments` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `commentable_id` int(10) UNSIGNED NOT NULL,
  `commentable_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `body`, `url`, `attachments`, `user_id`, `commentable_id`, `commentable_type`, `created_at`, `updated_at`) VALUES
(1, 'Worked on the card addition module', 'here are the logs for the subsytem', NULL, 4, 9, 'App\\Bug', '2020-03-30 15:40:48', '2020-03-30 15:40:48'),
(2, 'Credit card addition bug has been fixed', 'http://127.0.0.1:8000/bugs/9', NULL, 5, 9, 'App\\Bug', '2020-03-30 15:45:14', '2020-03-30 15:45:14'),
(3, 'HR can view loans of employees now', 'https://ehorizon/hrml/stl/loans', NULL, 10, 5, 'App\\Bug', '2020-03-30 16:47:30', '2020-03-30 16:47:30'),
(4, 'Good job guys', NULL, NULL, 6, 9, 'App\\Bug', '2020-03-30 16:57:43', '2020-03-30 16:57:43'),
(5, 'The addition bug is caused by an error in the syntax of the back end code. Checking on it : )', 'http://erp/appt/18', NULL, 10, 2, 'App\\Bug', '2020-05-22 14:33:37', '2020-12-13 05:18:33'),
(6, 'Thanks Kakashi, keep me informed', NULL, NULL, 8, 2, 'App\\Bug', '2020-05-22 14:38:36', '2020-05-22 14:38:36'),
(7, 'Upon login in, i brings up a page error not loading', 'http://127.0.0.1:8000/bugs/13', NULL, 5, 13, 'App\\Bug', '2020-07-08 14:22:19', '2020-07-08 14:22:19'),
(8, 'Good work guys', NULL, NULL, 6, 2, 'App\\Bug', '2020-07-14 11:57:49', '2020-07-14 11:57:49'),
(9, 'Slow progressguys , pick up the speed  please', NULL, NULL, 6, 4, 'App\\Bug', '2020-07-14 12:18:24', '2020-07-14 12:18:24'),
(10, 'Patient unable to view list of unavailable doctors', 'http://afyabora/apptointment/18', NULL, 5, 18, 'App\\Bug', '2020-11-15 18:16:02', '2020-11-27 04:40:23'),
(11, 'Reviewing the bug @beckyg@gmail.com', NULL, 'Virus.PNG', 1, 18, 'App\\Bug', '2020-11-15 18:18:36', '2020-11-15 18:28:14'),
(16, 'Any updates guys, found this', 'https://charts.erik.cat/guide/reate-the-chartisan-instance', 'Screenshot_2019-01-08 CD-key - Call of Duty.png', 6, 1, 'App\\Bug', '2020-11-15 19:07:05', '2020-12-14 15:06:04'),
(17, 'queue full', 'https://charts.erik.cat/guide/create_charts.html#create-the-chartisan-instance', 'Screenshot (2).png', 5, 18, 'App\\Bug', '2020-11-27 04:41:03', '2020-11-27 04:41:03'),
(18, 'Updates?', NULL, NULL, 6, 4, 'App\\Bug', '2020-12-14 15:23:10', '2020-12-14 15:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_31_103921_create_projects_table', 1),
(4, '2019_12_31_104138_create_bugs_table', 1),
(5, '2020_01_01_180115_create_priorities_table', 1),
(6, '2020_01_01_180310_create_bug_statuses_table', 1),
(7, '2020_02_05_152120_create_admins_table', 1),
(8, '2020_03_10_131945_create_comments_table', 1),
(9, '2020_03_11_073343_create_task_user_table', 1),
(10, '2020_03_11_131300_create_project_user_table', 1),
(11, '2020_03_11_131440_create_tasks_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('6c179e6c-6e1a-44d3-bb05-a8b3d5c925ce', 'App\\Notifications\\AddedToProject', 7, 'App\\User', '{\"project\":{\"id\":17,\"pj_name\":\"Mpesa API Safcom\",\"pj_type\":\"Conversion\",\"user_id\":6,\"owner\":\"Ray Kens\",\"status\":\"Active\",\"pj_description\":\"Used to initiate a M-Pesa transaction on behalf of a customer using STK Push\",\"issues\":\"1\",\"created_at\":\"2020-03-12 16:48:46\",\"updated_at\":\"2020-11-15 22:26:55\"},\"tester\":{\"id\":7,\"name\":\"Victor\",\"lastname\":\"Vilo\",\"email\":\"vicvilo@gmail.com\",\"avatar\":\"default.jpg\",\"emp_id\":\"BTQ007\",\"dept\":\"Quality Assurance\",\"user_group\":\"Test Engineer\",\"phone_no\":\"+254715436958\",\"created_at\":\"2020-03-12 19:24:08\",\"updated_at\":\"2020-03-12 19:24:08\"},\"user\":{\"id\":7,\"name\":\"Victor\",\"lastname\":\"Vilo\",\"email\":\"vicvilo@gmail.com\",\"avatar\":\"default.jpg\",\"emp_id\":\"BTQ007\",\"dept\":\"Quality Assurance\",\"user_group\":\"Test Engineer\",\"phone_no\":\"+254715436958\",\"created_at\":\"2020-03-12 19:24:08\",\"updated_at\":\"2020-03-12 19:24:08\"}}', '2020-12-04 08:30:11', '2020-12-04 08:27:39', '2020-12-04 08:30:11'),
('8906d58b-a393-4091-b464-8add511ea809', 'App\\Notifications\\AddedToProject', 7, 'App\\User', '{\"project\":{\"id\":17,\"pj_name\":\"Mpesa API Safcom\",\"pj_type\":\"Conversion\",\"user_id\":6,\"owner\":\"Ray Kens\",\"status\":\"Active\",\"pj_description\":\"Used to initiate a M-Pesa transaction on behalf of a customer using STK Push\",\"issues\":\"1\",\"created_at\":\"2020-03-12 16:48:46\",\"updated_at\":\"2020-11-15 22:26:55\"},\"tester\":{\"id\":7,\"name\":\"Victor\",\"lastname\":\"Vilo\",\"email\":\"vicvilo@gmail.com\",\"avatar\":\"default.jpg\",\"emp_id\":\"BTQ007\",\"dept\":\"Quality Assurance\",\"user_group\":\"Test Engineer\",\"phone_no\":\"+254715436958\",\"created_at\":\"2020-03-12 19:24:08\",\"updated_at\":\"2020-03-12 19:24:08\"},\"user\":{\"id\":7,\"name\":\"Victor\",\"lastname\":\"Vilo\",\"email\":\"vicvilo@gmail.com\",\"avatar\":\"default.jpg\",\"emp_id\":\"BTQ007\",\"dept\":\"Quality Assurance\",\"user_group\":\"Test Engineer\",\"phone_no\":\"+254715436958\",\"created_at\":\"2020-03-12 19:24:08\",\"updated_at\":\"2020-03-12 19:24:08\"}}', '2020-12-04 08:36:19', '2020-12-04 08:35:23', '2020-12-04 08:36:19'),
('0dcd966c-33c4-4fa2-82d7-f86dfff3808a', 'App\\Notifications\\AddedToProject', 6, 'App\\User', '{\"project\":{\"id\":17,\"pj_name\":\"Mpesa API Safcom\",\"pj_type\":\"Conversion\",\"user_id\":6,\"owner\":\"Ray Kens\",\"status\":\"Active\",\"pj_description\":\"Used to initiate a M-Pesa transaction on behalf of a customer using STK Push\",\"issues\":\"1\",\"created_at\":\"2020-03-12 16:48:46\",\"updated_at\":\"2020-11-15 22:26:55\"},\"tester\":{\"id\":7,\"name\":\"Victor\",\"lastname\":\"Vilo\",\"email\":\"vicvilo@gmail.com\",\"avatar\":\"default.jpg\",\"emp_id\":\"BTQ007\",\"dept\":\"Quality Assurance\",\"user_group\":\"Test Engineer\",\"phone_no\":\"+254715436958\",\"created_at\":\"2020-03-12 19:24:08\",\"updated_at\":\"2020-03-12 19:24:08\"},\"user\":{\"id\":6,\"name\":\"Ray\",\"lastname\":\"Kens\",\"email\":\"kensombe@gmail.com\",\"avatar\":\"1605443375.jfif\",\"emp_id\":\"BTQ006\",\"dept\":\"Quality Assurance\",\"user_group\":\"Manager\",\"phone_no\":\"+254775314753\",\"created_at\":\"2020-03-10 16:32:50\",\"updated_at\":\"2020-11-15 23:29:35\"}}', '2020-12-04 08:35:28', '2020-12-04 08:35:23', '2020-12-04 08:35:28'),
('402d659c-3a8c-4f10-93c1-cb58cef03f2f', 'App\\Notifications\\AddedToProject', 3, 'App\\User', '{\"project\":{\"id\":7,\"pj_name\":\"PhpStorm\",\"pj_type\":\"Conversion\",\"user_id\":3,\"owner\":\"Boniface Karanja\",\"status\":\"Active\",\"pj_description\":\"IDE for php developers\",\"issues\":null,\"created_at\":\"2020-03-11 14:51:53\",\"updated_at\":\"2020-03-19 23:02:09\"},\"tester\":{\"id\":5,\"name\":\"Becky\",\"lastname\":\"G\",\"email\":\"beckyg@gmail.com\",\"avatar\":\"1606463606.png\",\"emp_id\":\"BTQ005\",\"dept\":\"Quality Assurance\",\"user_group\":\"Test Engineer\",\"phone_no\":\"0712486239\",\"created_at\":\"2020-03-10 16:25:10\",\"updated_at\":\"2020-11-27 07:53:26\"},\"user\":{\"id\":3,\"name\":\"Boniface\",\"lastname\":\"Karanja\",\"email\":\"bonnniek@gmail.com\",\"avatar\":\"default.jpg\",\"emp_id\":\"BTQ003\",\"dept\":\"Development\",\"user_group\":\"Manager\",\"phone_no\":\"+254712456239\",\"created_at\":\"2020-03-10 16:18:30\",\"updated_at\":\"2020-03-10 16:18:30\"}}', NULL, '2020-12-04 08:41:13', '2020-12-04 08:41:46'),
('18490175-995e-4704-bbb2-81c410d2b584', 'App\\Notifications\\AddedToProject', 5, 'App\\User', '{\"project\":{\"id\":7,\"pj_name\":\"PhpStorm\",\"pj_type\":\"Conversion\",\"user_id\":3,\"owner\":\"Boniface Karanja\",\"status\":\"Active\",\"pj_description\":\"IDE for php developers\",\"issues\":null,\"created_at\":\"2020-03-11 14:51:53\",\"updated_at\":\"2020-03-19 23:02:09\"},\"tester\":{\"id\":5,\"name\":\"Becky\",\"lastname\":\"G\",\"email\":\"beckyg@gmail.com\",\"avatar\":\"1606463606.png\",\"emp_id\":\"BTQ005\",\"dept\":\"Quality Assurance\",\"user_group\":\"Test Engineer\",\"phone_no\":\"0712486239\",\"created_at\":\"2020-03-10 16:25:10\",\"updated_at\":\"2020-11-27 07:53:26\"},\"user\":{\"id\":5,\"name\":\"Becky\",\"lastname\":\"G\",\"email\":\"beckyg@gmail.com\",\"avatar\":\"1606463606.png\",\"emp_id\":\"BTQ005\",\"dept\":\"Quality Assurance\",\"user_group\":\"Test Engineer\",\"phone_no\":\"0712486239\",\"created_at\":\"2020-03-10 16:25:10\",\"updated_at\":\"2020-11-27 07:53:26\"}}', '2020-12-04 08:47:49', '2020-12-04 08:41:13', '2020-12-04 08:47:49'),
('26023ea6-7738-469e-8d69-09115b3fb6d8', 'App\\Notifications\\AddedToProject', 31, 'App\\User', '{\"project\":{\"id\":17,\"pj_name\":\"Mpesa API Safcom\",\"pj_type\":\"Conversion\",\"user_id\":6,\"owner\":\"Ray Kens\",\"status\":\"Active\",\"pj_description\":\"Used to initiate a M-Pesa transaction on behalf of a customer using STK Push\",\"issues\":\"1\",\"created_at\":\"2020-03-12 16:48:46\",\"updated_at\":\"2020-11-15 22:26:55\"},\"tester\":{\"id\":31,\"name\":\"Lorna\",\"lastname\":\"Wairimu\",\"email\":\"lorna@gmail.com\",\"avatar\":\"default.jpg\",\"emp_id\":\"BTQ020\",\"dept\":\"Development\",\"user_group\":\"Developer\",\"phone_no\":\"+254711545631\",\"created_at\":\"2020-12-14 13:11:19\",\"updated_at\":\"2020-12-14 13:24:56\"},\"user\":{\"id\":7,\"name\":\"Victor\",\"lastname\":\"Vilo\",\"email\":\"vicvilo@gmail.com\",\"avatar\":\"default.jpg\",\"emp_id\":\"BTQ007\",\"dept\":\"Quality Assurance\",\"user_group\":\"Test Engineer\",\"phone_no\":\"+254715436958\",\"created_at\":\"2020-03-12 19:24:08\",\"updated_at\":\"2020-03-12 19:24:08\"}}', NULL, '2020-12-14 16:57:10', '2020-12-14 16:57:10'),
('142cecdd-51e8-4775-bca9-ff9e0ed2a155', 'App\\Notifications\\AddedToProject', 5, 'App\\User', '{\"project\":{\"id\":4,\"pj_name\":\"Project II\",\"pj_type\":\"Conversion\",\"user_id\":3,\"owner\":\"Boniface Karanja\",\"status\":\"Active\",\"pj_description\":\"The Second phase of a writer\'s app\",\"issues\":null,\"created_at\":\"2020-03-10 15:21:03\",\"updated_at\":\"2020-03-10 15:21:03\"},\"tester\":{\"id\":31,\"name\":\"Lorna\",\"lastname\":\"Wairimu\",\"email\":\"lorna@gmail.com\",\"avatar\":\"default.jpg\",\"emp_id\":\"BTQ020\",\"dept\":\"Development\",\"user_group\":\"Developer\",\"phone_no\":\"+254711545631\",\"created_at\":\"2020-12-14 13:11:19\",\"updated_at\":\"2020-12-14 13:24:56\"},\"user\":{\"id\":5,\"name\":\"Becky\",\"lastname\":\"G\",\"email\":\"beckyg@gmail.com\",\"avatar\":\"1607083570.jpg\",\"emp_id\":\"BTQ005\",\"dept\":\"Quality Assurance\",\"user_group\":\"Test Engineer\",\"phone_no\":\"0712486239\",\"created_at\":\"2020-03-10 16:25:10\",\"updated_at\":\"2020-12-04 12:06:10\"}}', NULL, '2020-12-14 14:46:35', '2020-12-14 14:46:35'),
('1160cd52-c94f-4590-ae3f-c514bfc6af64', 'App\\Notifications\\AddedToProject', 6, 'App\\User', '{\"project\":{\"id\":3,\"pj_name\":\"Huawei AdSense Y9 Lite\",\"pj_type\":\"Conversion\",\"user_id\":6,\"owner\":\"Ray Kens\",\"status\":\"Completed\",\"pj_description\":\"Huawei OS built in browser extension\",\"issues\":null,\"created_at\":\"2020-03-10 13:33:40\",\"updated_at\":\"2020-11-15 22:01:00\"},\"tester\":{\"id\":30,\"name\":\"Lorna\",\"lastname\":\"Wairimu\",\"email\":\"lorna@gmail.com\",\"avatar\":\"default.jpg\",\"emp_id\":\"BTQ026\",\"dept\":\"Development\",\"user_group\":\"Test Engineer\",\"phone_no\":\"254711545651\",\"created_at\":\"2020-12-04 13:02:46\",\"updated_at\":\"2020-12-04 13:02:46\"},\"user\":{\"id\":6,\"name\":\"Ray\",\"lastname\":\"Kens\",\"email\":\"kensombe@gmail.com\",\"avatar\":\"1605443375.jfif\",\"emp_id\":\"BTQ006\",\"dept\":\"Quality Assurance\",\"user_group\":\"Manager\",\"phone_no\":\"+254775314753\",\"created_at\":\"2020-03-10 16:32:50\",\"updated_at\":\"2020-11-15 23:29:35\"}}', '2020-12-04 10:11:26', '2020-12-04 10:04:14', '2020-12-04 10:11:26'),
('d9059221-1fe7-4b31-abd3-f26123506fa1', 'App\\Notifications\\AddedToProject', 30, 'App\\User', '{\"project\":{\"id\":3,\"pj_name\":\"Huawei AdSense Y9 Lite\",\"pj_type\":\"Conversion\",\"user_id\":6,\"owner\":\"Ray Kens\",\"status\":\"Completed\",\"pj_description\":\"Huawei OS built in browser extension\",\"issues\":null,\"created_at\":\"2020-03-10 13:33:40\",\"updated_at\":\"2020-11-15 22:01:00\"},\"tester\":{\"id\":30,\"name\":\"Lorna\",\"lastname\":\"Wairimu\",\"email\":\"lorna@gmail.com\",\"avatar\":\"default.jpg\",\"emp_id\":\"BTQ026\",\"dept\":\"Development\",\"user_group\":\"Test Engineer\",\"phone_no\":\"254711545651\",\"created_at\":\"2020-12-04 13:02:46\",\"updated_at\":\"2020-12-04 13:02:46\"},\"user\":{\"id\":6,\"name\":\"Ray\",\"lastname\":\"Kens\",\"email\":\"kensombe@gmail.com\",\"avatar\":\"1605443375.jfif\",\"emp_id\":\"BTQ006\",\"dept\":\"Quality Assurance\",\"user_group\":\"Manager\",\"phone_no\":\"+254775314753\",\"created_at\":\"2020-03-10 16:32:50\",\"updated_at\":\"2020-11-15 23:29:35\"}}', NULL, '2020-12-04 10:04:14', '2020-12-04 10:04:14'),
('1677e411-b5ea-41ff-a13b-5f6224cf0ff5', 'App\\Notifications\\AddedToProject', 31, 'App\\User', '{\"project\":{\"id\":4,\"pj_name\":\"Project II\",\"pj_type\":\"Conversion\",\"user_id\":3,\"owner\":\"Boniface Karanja\",\"status\":\"Active\",\"pj_description\":\"The Second phase of a writer\'s app\",\"issues\":null,\"created_at\":\"2020-03-10 15:21:03\",\"updated_at\":\"2020-03-10 15:21:03\"},\"tester\":{\"id\":31,\"name\":\"Lorna\",\"lastname\":\"Wairimu\",\"email\":\"lorna@gmail.com\",\"avatar\":\"default.jpg\",\"emp_id\":\"BTQ020\",\"dept\":\"Development\",\"user_group\":\"Developer\",\"phone_no\":\"+254711545631\",\"created_at\":\"2020-12-14 13:11:19\",\"updated_at\":\"2020-12-14 13:24:56\"},\"user\":{\"id\":5,\"name\":\"Becky\",\"lastname\":\"G\",\"email\":\"beckyg@gmail.com\",\"avatar\":\"1607083570.jpg\",\"emp_id\":\"BTQ005\",\"dept\":\"Quality Assurance\",\"user_group\":\"Test Engineer\",\"phone_no\":\"0712486239\",\"created_at\":\"2020-03-10 16:25:10\",\"updated_at\":\"2020-12-04 12:06:10\"}}', NULL, '2020-12-14 14:46:35', '2020-12-14 14:46:35'),
('03800890-73ba-4d4a-81b7-9f6fcc99f694', 'App\\Notifications\\AddedToProject', 2, 'App\\User', '{\"project\":{\"id\":16,\"pj_name\":\"Pycharm\",\"pj_type\":\"Maintenance\",\"user_id\":6,\"owner\":\"Ray Kens\",\"status\":\"Active\",\"pj_description\":\"IDE for Python developers\",\"issues\":null,\"created_at\":\"2020-03-12 15:43:50\",\"updated_at\":\"2020-03-19 23:01:07\"},\"tester\":{\"id\":2,\"name\":\"Johnny\",\"lastname\":\"Bravo\",\"email\":\"johnnybravo@gmail.com\",\"avatar\":\"default.jpg\",\"emp_id\":\"BTQ002\",\"dept\":\"Quality Assurance\",\"user_group\":\"Test Engineer\",\"phone_no\":\"+254790753159\",\"created_at\":\"2020-03-10 11:46:02\",\"updated_at\":\"2020-03-10 11:46:02\"},\"user\":{\"id\":6,\"name\":\"Ray\",\"lastname\":\"Kens\",\"email\":\"kensombe@gmail.com\",\"avatar\":\"1605443375.jfif\",\"emp_id\":\"BTQ006\",\"dept\":\"Quality Assurance\",\"user_group\":\"Manager\",\"phone_no\":\"+254775314753\",\"created_at\":\"2020-03-10 16:32:50\",\"updated_at\":\"2020-11-15 23:29:35\"}}', '2020-12-04 10:10:30', '2020-12-04 10:04:25', '2020-12-04 10:10:30'),
('cebbff38-bea1-4b65-b91f-cabe9aacaec8', 'App\\Notifications\\AddedToProject', 7, 'App\\User', '{\"project\":{\"id\":17,\"pj_name\":\"Mpesa API Safcom\",\"pj_type\":\"Conversion\",\"user_id\":6,\"owner\":\"Ray Kens\",\"status\":\"Active\",\"pj_description\":\"Used to initiate a M-Pesa transaction on behalf of a customer using STK Push\",\"issues\":\"1\",\"created_at\":\"2020-03-12 16:48:46\",\"updated_at\":\"2020-11-15 22:26:55\"},\"tester\":{\"id\":31,\"name\":\"Lorna\",\"lastname\":\"Wairimu\",\"email\":\"lorna@gmail.com\",\"avatar\":\"default.jpg\",\"emp_id\":\"BTQ020\",\"dept\":\"Development\",\"user_group\":\"Developer\",\"phone_no\":\"+254711545631\",\"created_at\":\"2020-12-14 13:11:19\",\"updated_at\":\"2020-12-14 13:24:56\"},\"user\":{\"id\":7,\"name\":\"Victor\",\"lastname\":\"Vilo\",\"email\":\"vicvilo@gmail.com\",\"avatar\":\"default.jpg\",\"emp_id\":\"BTQ007\",\"dept\":\"Quality Assurance\",\"user_group\":\"Test Engineer\",\"phone_no\":\"+254715436958\",\"created_at\":\"2020-03-12 19:24:08\",\"updated_at\":\"2020-03-12 19:24:08\"}}', '2020-12-14 16:57:16', '2020-12-14 16:57:10', '2020-12-14 16:57:16');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pj_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pj_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `owner` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `pj_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issues` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projects_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `pj_name`, `pj_type`, `user_id`, `owner`, `status`, `pj_description`, `issues`, `created_at`, `updated_at`) VALUES
(1, 'E-Horizon HRMS K', 'Maintenance', 3, 'Boniface Karanja', 'Active', 'Build as a human resource management system for Software Tech. Ltd, Kenya', NULL, '2020-03-10 10:26:23', '2020-11-15 19:04:17'),
(2, 'AfyaBora App', 'Maintenance', 3, 'Boniface Karanja', 'Active', 'Android application built to cater for client\'s healthcare', NULL, '2020-03-10 10:30:52', '2020-03-19 19:58:28'),
(3, 'Huawei AdSense Y9 Lite', 'Conversion', 6, 'Ray Kens', 'Completed', 'Huawei OS built in browser extension', NULL, '2020-03-10 10:33:40', '2020-11-15 19:01:00'),
(4, 'Project II', 'Conversion', 3, 'Boniface Karanja', 'Active', 'The Second phase of a writer\'s app', NULL, '2020-03-10 12:21:03', '2020-03-10 12:21:03'),
(5, 'ERP Shamers Inc', 'Maintenance', 6, 'Ray Kens', 'Completed', 'A system built for point of sale . Constructed by Shamers Company', NULL, '2020-03-10 13:11:59', '2020-12-13 05:23:35'),
(7, 'PhpStorm', 'Conversion', 3, 'Boniface Karanja', 'Active', 'IDE for php developers', NULL, '2020-03-11 11:51:53', '2020-03-19 20:02:09'),
(16, 'Pycharm', 'Maintenance', 6, 'Ray Kens', 'Active', 'IDE for Python developers', NULL, '2020-03-12 12:43:50', '2020-03-19 20:01:07'),
(17, 'Mpesa API Safcom', 'Conversion', 6, 'Ray Kens', 'Active', 'Used to initiate a M-Pesa transaction on behalf of a customer using STK Push', '1', '2020-03-12 13:48:46', '2020-11-15 19:26:55'),
(19, 'The Matrix', 'Maintenance', 6, 'Ray Kens', 'Active', 'Keanu Reeves Y', NULL, '2020-11-15 19:34:56', '2020-12-13 05:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `project_user`
--

DROP TABLE IF EXISTS `project_user`;
CREATE TABLE IF NOT EXISTS `project_user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_user_user_id_foreign` (`user_id`),
  KEY `project_user_project_id_foreign` (`project_id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_user`
--

INSERT INTO `project_user` (`id`, `project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 3, 5, NULL, NULL),
(2, 3, 7, NULL, NULL),
(3, 3, 2, NULL, NULL),
(5, 5, 8, NULL, NULL),
(6, 5, 5, NULL, NULL),
(7, 1, 9, NULL, NULL),
(8, 7, 9, NULL, NULL),
(9, 2, 5, NULL, NULL),
(10, 19, 9, NULL, NULL),
(11, 18, 2, NULL, NULL),
(12, 26, 8, NULL, NULL),
(13, 16, 7, NULL, NULL),
(14, 16, 9, NULL, NULL),
(15, 1, 8, NULL, NULL),
(16, 32, 7, NULL, NULL),
(17, 33, 18, NULL, NULL),
(18, 35, 5, NULL, NULL),
(19, 4, 7, NULL, NULL),
(20, 17, 5, NULL, NULL),
(21, 17, 2, NULL, NULL),
(22, 20, 2, NULL, NULL),
(33, 17, 7, NULL, NULL),
(34, 7, 5, NULL, NULL),
(38, 4, 5, NULL, NULL),
(49, 17, 31, NULL, NULL),
(37, 16, 2, NULL, NULL),
(47, 4, 4, NULL, NULL),
(48, 4, 31, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT 'default.jpg',
  `emp_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_group` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `avatar`, `emp_id`, `dept`, `user_group`, `phone_no`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Johnny', 'Bravo', 'johnnybravo@gmail.com', '$2y$10$lbtYwM4ofYgFIQSP1h8bf.GlRCIyTwY8TlrS71pduNK5s5ojlKvqS', 'default.jpg', 'BTQ002', 'Quality Assurance', 'Test Engineer', '+254790753159', 'uLsx1axZye5eqpCzwg0xoZWadj623OD2USFvcZ3PSCVEESz4gMzKJWZPIaJJ', '2020-03-10 08:46:02', '2020-03-10 08:46:02'),
(1, 'Gerald', 'Giteru', 'geraldgiteru@gmail.com', '$2y$10$mzbkDKNAul44BqWAuTNbJeCUNybqO8lz2uu1mZ.HoAVVc/XVsAheK', 'default.jpg', 'BTQ001', 'Development', 'Developer', '+254718889218', '5orQ34W4L5mHmYdjQdiudpT6tAiLNd2MJ2Dixx1Qez6M7hTTgJeiCuGc3Xmp', '2020-03-09 19:50:05', '2020-03-09 19:51:28'),
(3, 'Boniface', 'Karanja', 'bonnniek@gmail.com', '$2y$10$cZuFVkiXNZhxUYAD4Kwnke9ca1Xx1c8ssioFFxWU1iGS06vdKXecS', '1607083631.jpg', 'BTQ003', 'Development', 'Manager', '+254712456239', 'K57ga5vcuuOkh3d0757sJuufqqlkuvLA5vPZpfu2yNxDHDY0tG4EIfxYzvIf', '2020-03-10 13:18:30', '2020-12-04 09:07:11'),
(4, 'Kelvin', 'Kimani', 'kelvinkimani@gmail.com', '$2y$10$XuBeSgTWKuLhGsSEpTGNyOCr.jxxCLPWtVbDwn9dnH84gJDRmS51.', '1607083807.jpg', 'BTQ004', 'Development', 'Developer', '0701668723', 'CXFzgB2MEH6rrj3M6P3GBije9QjIGrXTcA0hvCGXXJuyUpk0udshFaWjbj8z', '2020-03-10 13:23:38', '2020-12-04 09:10:07'),
(5, 'Becky', 'G', 'beckyg@gmail.com', '$2y$10$HEgGpxLfMxxZ.VDHFJpOuefUMAYNhme6FvZGFWz79cIIKv8QIOEb2', '1607083570.jpg', 'BTQ005', 'Quality Assurance', 'Test Engineer', '0712486239', 'OAu2b3JaVUsPC8I8WuBudX6QdkIxAhmhJLoXfOKuERMJhIjVxAw6Adm87G2x', '2020-03-10 13:25:10', '2020-12-04 09:06:10'),
(6, 'Ray', 'Kens', 'kensombe@gmail.com', '$2y$10$20MjbCTfT2dBDTnAj25FhOlhLTWFVYAwoXsKtPWs6A95eFgTcEGwK', '1605443375.jfif', 'BTQ006', 'Quality Assurance', 'Manager', '+254775314753', 'Tf8848BXSu8m3lR1Yb2aTw7Awxg1DhRpqP75faVFe1zy4cFqmoNQhiVVaidZ', '2020-03-10 13:32:50', '2020-11-15 20:29:35'),
(7, 'Victor', 'Vilo', 'vicvilo@gmail.com', '$2y$10$G5iwVkB5q7nIA8tL0WknEO.Gei0e5IpCAXYHvfiNTqLJEpeM.KCbq', 'default.jpg', 'BTQ007', 'Quality Assurance', 'Test Engineer', '+254715436958', 'QlVMr5TzoTMSqZTguQPSnPV15HSvoV4n3TZMkt29EKP6cFCs9TzgcswfbIsS', '2020-03-12 16:24:08', '2020-03-12 16:24:08'),
(8, 'RoseMarion', 'Atieno', 'rosemarion@gmail.com', '$2y$10$mTvoQfzl7zinKB1Xt42LQuDhrLO9GU.rBUZYoPOaBF0Kjdq14Q/xO', 'default.jpg', 'BTQ008', 'Quality Assurance', 'Test Engineer', '+254752165489', 'mxMxngDtWiMEtGxbTOzhjtE7pHPVylv062xPc1IprfmqU9X7JaHlcOYXqrrh', '2020-03-13 18:47:54', '2020-03-13 18:47:54'),
(10, 'Kakashi', 'Sensei', 'kakashi@gmail.com', '$2y$10$HnHfqVJNBLXkwLdY/FoEA.BmkkYi78c9hT4uzDXLpMpNJOWqorPbW', 'default.jpg', 'BTQ010', 'Development', 'Developer', '+254140276534', '2IpNqnuJKsGGkYLZsNBHSrwYyuQDSD9HKGa9PNybb1bkb04wT24oQcHwSEZ0', '2020-03-21 17:22:48', '2020-11-14 21:56:21'),
(26, 'Naruto', 'Sensei', 'naruto@gmail.com', '$2y$10$l3JQCmnT6x463DASXkDCTuVTw2JmfFzqr7OGhGwh0ZBFEpj2SeoGW', 'default.jpg', 'BTQ011', 'Development', 'Manager', '+254718889118', NULL, '2020-07-17 15:30:55', '2020-07-17 15:30:55'),
(27, 'Sakura', 'Chan', 'sakura@gmail.com', '$2y$10$Xaks6l3xyYldRF6a3dC8w.NH8WpuDEsFbJoE/FIZa5WlXyp7tV/n2', 'default.jpg', 'BTQ012', 'Development', 'Manager', '+254718887118', NULL, '2020-07-17 15:34:00', '2020-07-17 15:34:00'),
(29, 'Graham', 'Him', 'grahamhim@gmail.com', '$2y$10$RqBaOsBh.IRZBai/8PSgF.Azdd1GOQpD4ocv25XR0VMl26/QQffkm', 'default.jpg', 'BTQ056', 'Quality Assurance', 'Test Engineer', '254711545631', 'DCUHqmDcuu09X2uzFVJ8OEDOZldppuom48KtS3EXhZ6CgPdl1136K3nPe7g8', '2020-12-02 06:26:44', '2020-12-02 06:26:44'),
(31, 'Lorna', 'Wairimu', 'lorna@gmail.com', '$2y$10$Iw8X07HutvevI3W07bexdOKWYhRYHGgVLk45U47E.9.IHX95pyheK', 'default.jpg', 'BTQ020', 'Development', 'Developer', '+254711545631', 'WYDYyt6UU6ZNGwS3eyZHmfICZWFTtWhM4dx94PHAei4A9J6ce1VPksOM6Thk', '2020-12-14 10:11:19', '2020-12-14 10:24:56');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
