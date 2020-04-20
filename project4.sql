-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 10:10 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project4`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_group` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `emp_id`, `user_group`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Gerry J', 'gerryj@gmail.com', '$2y$10$5msBp.eRwTXLoxBjhKT5Qeg8s/VEcrGSFGLSl4WeFdrSUcOF8ggrK', 'BTQ000', 'Admin', 'XP84DiwxZdWhuo4UEKdIupNh8YPmH8l8uAzoDUHfAtLeLtKXiKfwgZ3xEk8Q', '2020-03-09 13:08:40', '2020-03-09 13:08:40');

-- --------------------------------------------------------

--
-- Table structure for table `bugs`
--

CREATE TABLE `bugs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(11) NOT NULL,
  `assigned` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `due_date` date NOT NULL,
  `reporter` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'To Do',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bugs`
--

INSERT INTO `bugs` (`id`, `title`, `description`, `project_id`, `assigned`, `type`, `due_date`, `reporter`, `priority`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ads', 'Many popup ads overlaping the navigation bar', 3, 'Gerald Giteru', 'Control flow', '2020-03-06', 'Ray', 'Minor', 'New', '2020-03-11 05:21:02', '2020-03-11 05:21:02'),
(2, 'incorrect total amount addition', 'Addition in the total amount of purchases for a customer are wrong.', 5, 'Kakashi Sensei', 'Calculation', '2020-04-01', 'Ray', 'Major', 'New', '2020-03-11 10:45:16', '2020-03-11 10:45:16'),
(3, 'My CV', 'cvbn', 3, 'Kelvin Kimani', 'Missing Commands', '2020-04-23', 'Ray', 'Medium', 'New', '2020-03-12 06:36:46', '2020-03-12 06:36:46'),
(4, 'Git module', 'Git module not functioning properly', 7, 'Gerald Giteru', 'Functional', '2020-06-13', 'Richard', 'Major', 'New', '2020-03-19 13:29:17', '2020-03-19 13:29:17'),
(5, 'Loan module not working', 'Unable to view loans of employees', 1, 'Kakashi Sensei', 'Missing Commands', '2020-04-14', 'Richard Mungai', 'Major', 'In Progress (By Dev)', '2020-03-21 11:03:43', '2020-03-30 09:47:58'),
(6, 'Connect status', 'Connect Status always defaults to false', 19, 'Kelvin Kimani', 'Control flow', '2020-04-17', 'Richard Mungai', 'Medium', 'New', '2020-03-21 11:12:58', '2020-03-21 11:12:58'),
(7, 'Statutory Benefits section', 'Admin cannot create and assign statutory benefits to a person', 1, 'Kakashi Sensei', 'Functional', '2020-04-27', 'Richard Mungai', 'Medium', 'New', '2020-03-21 11:16:22', '2020-03-21 11:16:22'),
(9, 'Ad payment cards', 'Users are unable to addcards for payment service', 3, 'Kelvin Kimani', 'Error handling', '2020-06-05', 'Becky G', 'Major', 'Approved', '2020-03-21 11:32:03', '2020-03-30 09:58:03'),
(10, 'Network Connectivity based on location', 'Some geographical locations have denied access to Huawei servers', 3, 'Gerald Giteru', 'Communication', '2020-05-08', 'Victor Vilo', 'Major', 'New', '2020-03-21 11:34:31', '2020-03-21 11:34:31');

-- --------------------------------------------------------

--
-- Table structure for table `bug_statuses`
--

CREATE TABLE `bug_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `commentable_id` int(10) UNSIGNED NOT NULL,
  `commentable_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `body`, `url`, `user_id`, `commentable_id`, `commentable_type`, `created_at`, `updated_at`) VALUES
(1, 'Worked on the card addition module', 'here are the logs for the subsytem', 4, 9, 'App\\Bug', '2020-03-30 08:40:48', '2020-03-30 08:40:48'),
(2, 'Credit card addition bug has been fixed', 'http://127.0.0.1:8000/bugs/9', 5, 9, 'App\\Bug', '2020-03-30 08:45:14', '2020-03-30 08:45:14'),
(3, 'HR can view loans of employees now', 'https://ehorizon/hrml/stl/loans', 10, 5, 'App\\Bug', '2020-03-30 09:47:30', '2020-03-30 09:47:30'),
(4, 'Good job guys', NULL, 6, 9, 'App\\Bug', '2020-03-30 09:57:43', '2020-03-30 09:57:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

CREATE TABLE `priorities` (
  `id` int(10) UNSIGNED NOT NULL,
  `impact` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `pj_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pj_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `pj_description` longtext COLLATE utf8mb4_unicode_ci,
  `owner` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issues` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `pj_name`, `pj_type`, `user_id`, `pj_description`, `owner`, `issues`, `created_at`, `updated_at`) VALUES
(1, 'E-Horizon HRMS', 'Maintenance', 3, 'Build as a human resource management system for Software Tech. Ltd, Kenya', 'Boniface Karanja', NULL, '2020-03-10 03:26:23', '2020-03-19 12:59:02'),
(2, 'AfyaBora App', 'Maintenance', 3, 'Android application built to cater for client\'s healthcare', 'Boniface Karanja', NULL, '2020-03-10 03:30:52', '2020-03-19 12:58:28'),
(3, 'Huawei AdSense', 'Conversion', 6, 'Huawei OS built in browser extension', 'Ray Kens', NULL, '2020-03-10 03:33:40', '2020-03-12 07:33:19'),
(4, 'Project II', 'Conversion', 3, 'The Second phase of a writer\'s app', 'Boniface Karanja', NULL, '2020-03-10 05:21:03', '2020-03-10 05:21:03'),
(5, 'ERP Shamers Inc', 'Maintenance', 6, 'A system built for point of sale . Constructed by Shamers Company', 'Ray Kens', NULL, '2020-03-10 06:11:59', '2020-03-19 13:00:20'),
(7, 'PhpStorm', 'Conversion', 3, 'IDE for php developers', 'Boniface Karanja', NULL, '2020-03-11 04:51:53', '2020-03-19 13:02:09'),
(19, 'LTC Connection Inc', 'Conversion', 3, 'LLC has been an innovator in computerized monitoring and torque turn systems for more than 25 years', 'Boniface Karanja', 0, '2020-03-21 06:47:35', '2020-03-21 06:47:35'),
(16, 'Pycharm', 'Maintenance', 6, 'IDE for Python developers', 'Ray Kens', NULL, '2020-03-12 05:43:50', '2020-03-19 13:01:07'),
(18, 'Project II', 'Maintenance', 6, 'Space X', 'Ray Kens', 0, '2020-03-12 09:33:04', '2020-03-12 09:33:04'),
(17, 'Mpesa API', 'Conversion', 6, 'Used to initiate a M-Pesa transaction on behalf of a customer using STK Push', 'Ray Kens', 1, '2020-03-12 06:48:46', '2020-03-12 06:48:46');

-- --------------------------------------------------------

--
-- Table structure for table `project_user`
--

CREATE TABLE `project_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(10, 19, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_user`
--

CREATE TABLE `task_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dept` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_group` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `emp_id`, `dept`, `user_group`, `phone_no`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Gerald', 'Giteru', 'geraldgiteru@gmail.com', '$2y$10$mzbkDKNAul44BqWAuTNbJeCUNybqO8lz2uu1mZ.HoAVVc/XVsAheK', 'BTQ001', 'Development', 'Developer', '+254718889218', 'zNPUHoyYLbHXxvf5FWIY24kfbW8ksHHxA5jwDoMajcOTbuDsHbb8ZvLi5Ol2', '2020-03-09 12:50:05', '2020-03-09 12:51:28'),
(2, 'Johnny', 'Bravo', 'johnnybravo@gmail.com', '$2y$10$lbtYwM4ofYgFIQSP1h8bf.GlRCIyTwY8TlrS71pduNK5s5ojlKvqS', 'BTQ002', 'Quality Assurance', 'Test Engineer', '+254790753159', 'quqRuMwe18e2QiTdrCztQi6c4ONsNnKjNPXXhJ01tqFWIDmjM9nQ4jBx3wPe', '2020-03-10 01:46:02', '2020-03-10 01:46:02'),
(3, 'Boniface', 'Karanja', 'bonnniek@gmail.com', '$2y$10$cZuFVkiXNZhxUYAD4Kwnke9ca1Xx1c8ssioFFxWU1iGS06vdKXecS', 'BTQ003', 'Development', 'Manager', '+254712456239', 'bMy2xGeYT95K2C2YZDigk10C9BITGo9NKiNdBxRPjV90vGQ4EZ1aPTptoHkB', '2020-03-10 06:18:30', '2020-03-10 06:18:30'),
(4, 'Kelvin', 'Kimani', 'kelvinkimani@gmail.com', '$2y$10$XuBeSgTWKuLhGsSEpTGNyOCr.jxxCLPWtVbDwn9dnH84gJDRmS51.', 'BTQ004', 'Development', 'Developer', '0701668723', 'qOnoucnDkHVV67hCVG4BZrom1bboDDMdtxf7kiLaAxe46xgHco5fzRAUyOuH', '2020-03-10 06:23:38', '2020-03-10 06:23:38'),
(5, 'Becky', 'G', 'beckyg@gmail.com', '$2y$10$HEgGpxLfMxxZ.VDHFJpOuefUMAYNhme6FvZGFWz79cIIKv8QIOEb2', 'BTQ005', 'Quality Assurance', 'Test Engineer', '0712486239', '4qEJ6x5cetfYQoeWhjmS1WiNbILXYhjSVDc9tCFVzNaidT6ZOZ9NEUuAmNSk', '2020-03-10 06:25:10', '2020-03-10 06:30:10'),
(6, 'Ray', 'Kens', 'kensombe@gmail.com', '$2y$10$20MjbCTfT2dBDTnAj25FhOlhLTWFVYAwoXsKtPWs6A95eFgTcEGwK', 'BTQ006', 'Quality Assurance', 'Manager', '+254775314752', 'kfqBHQNzmpihH586Oc5N4Nw5uiEj7qxSXq38K4cBq1PUNZz7uNcIdhLq1Qa4', '2020-03-10 06:32:50', '2020-03-10 06:32:50'),
(7, 'Victor', 'Vilo', 'vicvilo@gmail.com', '$2y$10$G5iwVkB5q7nIA8tL0WknEO.Gei0e5IpCAXYHvfiNTqLJEpeM.KCbq', 'BTQ007', 'Quality Assurance', 'Test Engineer', '+254715436958', 'Ma4Hp21GPtvW9VqGPnxEjjPT9jLD8JcTvxTYMr2H4zN8of4ZIa18oE0nMcv4', '2020-03-12 09:24:08', '2020-03-12 09:24:08'),
(8, 'RoseMarion', 'Atieno', 'rosemarion@gmail.com', '$2y$10$mTvoQfzl7zinKB1Xt42LQuDhrLO9GU.rBUZYoPOaBF0Kjdq14Q/xO', 'BTQ008', 'Quality Assurance', 'Test Engineer', '+254752165489', '2PilVSfgAye9GXNhwzynGAOQp3nipQGUV01bWxontfZ6dKvRQSwb92VNvoYo', '2020-03-13 11:47:54', '2020-03-13 11:47:54'),
(9, 'Richard', 'Mungai', 'richie@gmail.com', '$2y$10$1l.TMutbvChJLbXKPwoOXegQ46AUOm6of4r8iPL40vyPfueiWoecO', 'BTQ009', 'Quality Assurance', 'Test Engineer', '+254714756984', 'XCWIlNmlbx8ahb8QPUML7P01rZ2O6jkxM4l2IRz9ZlIaWxc4NMLI3CXKbQRP', '2020-03-19 13:26:51', '2020-03-19 13:26:51'),
(10, 'Kakashi', 'Sensei', 'kakashi@gmail.com', '$2y$10$HnHfqVJNBLXkwLdY/FoEA.BmkkYi78c9hT4uzDXLpMpNJOWqorPbW', 'BTQ010', 'Development', 'Developer', '+25414027453', 'PXoj0cc6HMeti39ImXs905yzqZgwZv4hEZqTzm3NM0EAse7Z6K5AmHwVVJa0', '2020-03-21 10:22:48', '2020-03-21 10:22:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `bugs`
--
ALTER TABLE `bugs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bugs_project_id_foreign` (`project_id`),
  ADD KEY `bugs_assigned_foreign` (`assigned`),
  ADD KEY `bugs_priority_foreign` (`priority`),
  ADD KEY `bugs_status_foreign` (`status`);

--
-- Indexes for table `bug_statuses`
--
ALTER TABLE `bug_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

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
-- Indexes for table `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_user_id_foreign` (`user_id`);

--
-- Indexes for table `project_user`
--
ALTER TABLE `project_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_user_user_id_foreign` (`user_id`),
  ADD KEY `project_user_project_id_foreign` (`project_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tasks_project_id_foreign` (`project_id`),
  ADD KEY `tasks_user_id_foreign` (`user_id`);

--
-- Indexes for table `task_user`
--
ALTER TABLE `task_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_user_task_id_foreign` (`task_id`),
  ADD KEY `task_user_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `bugs`
--
ALTER TABLE `bugs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `bug_statuses`
--
ALTER TABLE `bug_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `priorities`
--
ALTER TABLE `priorities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `project_user`
--
ALTER TABLE `project_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `task_user`
--
ALTER TABLE `task_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
