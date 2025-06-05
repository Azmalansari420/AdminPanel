-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2025 at 03:03 PM
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
-- Database: `example_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_records`
--

CREATE TABLE `activity_records` (
  `id` int(11) NOT NULL,
  `ip_addreass` text DEFAULT NULL,
  `url` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `admin_username` varchar(50) DEFAULT NULL,
  `admin_password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_records`
--

INSERT INTO `activity_records` (`id`, `ip_addreass`, `url`, `date`, `time`, `admin_id`, `admin_username`, `admin_password`) VALUES
(8, '::1', 'http://localhost/3testing/example-app/admin/slider', '2025-06-05', '12:31:07', 2, 'admin', NULL),
(9, '::1', 'http://localhost/3testing/example-app/admin', '2025-06-05', '12:31:19', NULL, NULL, NULL),
(10, '::1', 'http://localhost/3testing/example-app/admin/dashboard', '2025-06-05', '12:31:27', 2, 'admin', 'admin'),
(11, '::1', 'http://localhost/3testing/example-app/admin/dashboard', '2025-06-05', '18:01:59', 2, 'admin', 'admin'),
(12, '::1', 'http://localhost/3testing/example-app/admin', '2025-06-05', '18:05:41', NULL, NULL, NULL),
(13, '::1', 'http://localhost/3testing/example-app/admin/dashboard', '2025-06-05', '18:07:25', 2, 'admin', 'admin'),
(14, '::1', 'http://localhost/3testing/example-app/admin/dashboard', '2025-06-05', '18:07:34', 2, 'admin', 'admin'),
(15, '::1', 'http://localhost/3testing/example-app/admin/dashboard', '2025-06-05', '18:09:39', 2, 'admin', 'admin'),
(16, '::1', 'http://localhost/3testing/example-app/admin', '2025-06-05', '18:09:41', NULL, NULL, NULL),
(17, '::1', 'http://localhost/3testing/example-app/admin/dashboard', '2025-06-05', '18:09:47', 2, 'admin', 'admin'),
(18, '::1', 'http://localhost/3testing/example-app/admin/dashboard', '2025-06-05', '18:09:54', 2, 'admin', 'admin'),
(19, '::1', 'http://localhost/3testing/example-app/admin/slider', '2025-06-05', '18:09:55', 2, 'admin', 'admin'),
(20, '::1', 'http://localhost/3testing/example-app/admin/site_setting/edit/1', '2025-06-05', '18:09:55', 2, 'admin', 'admin'),
(21, '::1', 'http://localhost/3testing/example-app/admin/site_setting/edit/1', '2025-06-05', '18:09:57', 2, 'admin', 'admin'),
(22, '::1', 'http://localhost/3testing/example-app/admin/contact', '2025-06-05', '18:09:58', 2, 'admin', 'admin'),
(23, '::1', 'http://localhost/3testing/example-app/admin/slider', '2025-06-05', '18:09:59', 2, 'admin', 'admin'),
(24, '::1', 'http://localhost/3testing/example-app/admin/slider', '2025-06-05', '18:11:06', 2, 'admin', 'admin'),
(25, '::1', 'http://localhost/3testing/example-app/admin/contact', '2025-06-05', '18:11:19', 2, 'admin', 'admin'),
(26, '::1', 'http://localhost/3testing/example-app/admin/site_setting/edit/1', '2025-06-05', '18:11:20', 2, 'admin', 'admin'),
(27, '::1', 'http://localhost/3testing/example-app/admin/slider', '2025-06-05', '18:11:21', 2, 'admin', 'admin'),
(28, '::1', 'http://localhost/3testing/example-app/admin/site_setting/edit/1', '2025-06-05', '18:11:22', 2, 'admin', 'admin'),
(29, '::1', 'http://localhost/3testing/example-app/admin/site_setting/edit/1', '2025-06-05', '18:11:28', 2, 'admin', 'admin'),
(30, '::1', 'http://localhost/3testing/example-app/admin/site_setting/edit/1', '2025-06-05', '18:11:31', 2, 'admin', 'admin'),
(31, '::1', 'http://localhost/3testing/example-app/admin/contact', '2025-06-05', '18:12:26', 2, 'admin', 'admin'),
(32, '::1', 'http://localhost/3testing/example-app/admin/slider', '2025-06-05', '18:12:27', 2, 'admin', 'admin'),
(33, '::1', 'http://localhost/3testing/example-app/admin/blog', '2025-06-05', '18:12:29', 2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `content` blob DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `addeddate` datetime DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `image`, `name`, `slug`, `content`, `status`, `addeddate`, `modifieddate`) VALUES
(9, NULL, 'test', 'test', 0x3c703e7473657465743c2f703e, 1, '2025-06-05 16:51:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `mobile` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `addeddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `mobile`, `subject`, `message`, `addeddate`) VALUES
(8, 'Spiderman', 'Rahuljain@gmail.com', '12346456546', 'Enquiry', 'test', '2025-06-05 11:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `id` int(11) NOT NULL,
  `user_id` text DEFAULT NULL,
  `device_id` text DEFAULT NULL,
  `ip_address` text DEFAULT NULL,
  `login_date` date DEFAULT NULL,
  `login_time` time DEFAULT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `logout_date` date DEFAULT NULL,
  `logout_time` time DEFAULT NULL,
  `login_status` int(11) DEFAULT NULL COMMENT '0=login,1=logout,'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`id`, `user_id`, `device_id`, `ip_address`, `login_date`, `login_time`, `username`, `password`, `logout_date`, `logout_time`, `login_status`) VALUES
(1, '2', '68418f8537a11::1', '::1', '2025-06-05', '12:37:25', 'admin', 'admin', NULL, NULL, NULL),
(2, '2', '684190136c26a::1', '::1', '2025-06-05', '12:39:47', 'admin', 'admin', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meta_tags`
--

CREATE TABLE `meta_tags` (
  `id` int(11) NOT NULL,
  `page_name` varchar(150) DEFAULT NULL,
  `meta_title` text DEFAULT NULL,
  `meta_auther` varchar(150) DEFAULT NULL,
  `meta_keyword` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `add_date_time` datetime DEFAULT NULL,
  `update_date_time` datetime DEFAULT NULL,
  `update_history` text DEFAULT NULL,
  `is_delete` int(2) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `type` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meta_tags`
--

INSERT INTO `meta_tags` (`id`, `page_name`, `meta_title`, `meta_auther`, `meta_keyword`, `meta_description`, `slug`, `add_date_time`, `update_date_time`, `update_history`, `is_delete`, `status`, `type`) VALUES
(11, NULL, 'Blog Name', 'Admin', 'blog,news,24', 'number is incresing so buy now', 'test', NULL, NULL, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL, NULL, 'ad-asdad', NULL, NULL, NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, NULL, NULL, 'title-1', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `multipleimage`
--

CREATE TABLE `multipleimage` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `multiple_image_json` text DEFAULT NULL,
  `single_image_data` text DEFAULT NULL,
  `multiple_images` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `addeddate` text DEFAULT NULL,
  `modifieddate` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL COMMENT '1=hospital,2=physician,3=ambulance,4=pathlogy,5=user',
  `username` text NOT NULL,
  `slug` text NOT NULL,
  `mobile` text NOT NULL,
  `email` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `role_access` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `slug`, `role_access`, `status`, `addeddate`, `modifieddate`) VALUES
(1, 'HR TEAM', 'hr-team', '{\"main_access\":[\"0\",\"1\",\"2\",\"4\",\"5\"],\"inner_access\":[[\"3\"],[\"3\"],[\"3\"],[],[\"1\",\"2\",\"3\",\"4\"],[\"1\",\"2\",\"3\",\"4\"]]}', 1, '2024-07-30 13:20:06', '2024-07-31 13:01:40'),
(2, 'NATIONAL SALE MANAGER', 'national-sale-manager', '{\"main_access\":[\"2\"],\"inner_access\":[[],[],[\"3\",\"4\"]]}', 1, '2024-07-30 13:20:42', '2024-07-30 16:17:25'),
(3, 'MIS ADMIN', 'mis-admin', '{\"main_access\":[\"1\"],\"inner_access\":[[],[\"2\",\"3\"],[]]}', 1, '2024-07-30 13:20:54', '2024-07-30 16:17:21'),
(4, 'ACCOUNTS TEAM', 'accounts-team', '{\"main_access\":[\"0\"],\"inner_access\":[[\"2\",\"4\"],[],[]]}', 1, '2024-07-30 13:21:07', '2024-07-30 16:17:16'),
(5, 'PRODUCTION TEAM', 'production-team', '{\"main_access\":[\"0\",\"1\",\"2\"],\"inner_access\":[[\"1\",\"2\",\"3\",\"4\"],[\"1\",\"2\",\"3\",\"4\"],[\"1\",\"2\",\"3\",\"4\"]]}', 1, '2024-07-30 13:21:20', '2024-07-30 17:42:01'),
(7, 'test', 'test', '{\"main_access\":[\"0\",\"1\",\"2\",\"7\"],\"inner_access\":[[\"1\",\"3\"],[\"1\",\"2\",\"3\",\"4\"],[\"1\",\"2\",\"3\"],[],[],[],[],[\"3\"]]}', 1, '2024-07-30 17:44:07', '2024-08-20 13:08:46'),
(8, 'Azmal Ansari', 'azmal-ansari', '{\"main_access\":[\"0\",\"1\",\"2\",\"3\"],\"inner_access\":[[\"1\",\"2\",\"3\",\"4\"],[\"1\"],[\"4\"],[\"1\"],[],[]]}', 1, '2024-08-24 17:03:02', '2024-09-06 17:53:18');

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
('5Wi9axh5whGe3ieSLbwm02S5De9uTiiwdx7k7CN2', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo2OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo4OToiaHR0cDovL2xvY2FsaG9zdC8zdGVzdGluZy9leGFtcGxlLWFwcC9wdWJsaWMvbWVkaWEvdXBsb2Fkcy9zaXRlX3NldHRpbmcvNjc1ODFmMTE0Njk1ZC5zdmciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiWGtVdTVPSWNUazZDbUo1NHNGT2RLbEVFakJHOWhjQ1U2dVdoUjVjcCI7czo4OiJhZG1pbl9pZCI7aToyO3M6MTQ6ImFkbWluX3VzZXJuYW1lIjtzOjU6ImFkbWluIjtzOjEwOiJhZG1pbl9uYW1lIjtzOjU6IkFkbWluIjt9', 1749123814),
('W2508MCpfH7eHY6MsVsvIha5irhvRCBw1m2NLxD6', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo3OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0MjoiaHR0cDovL2xvY2FsaG9zdC8zdGVzdGluZy9leGFtcGxlLWFwcC90ZXN0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6IjBrbDFabkNjeHJuQ2tlaFJWT2ZLSnlDYVFmZE9WTGtmRkxJblBNSDciO3M6ODoiYWRtaW5faWQiO2k6MjtzOjE0OiJhZG1pbl91c2VybmFtZSI7czo1OiJhZG1pbiI7czoxMDoiYWRtaW5fbmFtZSI7czo1OiJBZG1pbiI7czoxNDoiYWRtaW5fcGFzc3dvcmQiO3M6NToiYWRtaW4iO30=', 1749127429),
('ZoyxYLzX5D0It3wvFpRPuC9qamuh2YBexKmmxxI6', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo2OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo4OToiaHR0cDovL2xvY2FsaG9zdC8zdGVzdGluZy9leGFtcGxlLWFwcC9wdWJsaWMvbWVkaWEvdXBsb2Fkcy9zaXRlX3NldHRpbmcvNjc1ODFmMTE0Njk1ZC5zdmciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoiZUJvbjVhS3dsMmNmZHFySmNqdzdMY2kxQVBtTFhKYW5tY1J1UWxRViI7czo4OiJhZG1pbl9pZCI7aToyO3M6MTQ6ImFkbWluX3VzZXJuYW1lIjtzOjU6ImFkbWluIjtzOjEwOiJhZG1pbl9uYW1lIjtzOjU6IkFkbWluIjt9', 1749123938);

-- --------------------------------------------------------

--
-- Table structure for table `site_setting`
--

CREATE TABLE `site_setting` (
  `id` int(11) NOT NULL,
  `logo` text NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `alt_mobile` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alt_email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `instagram` text NOT NULL,
  `youtube` text NOT NULL,
  `map` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_setting`
--

INSERT INTO `site_setting` (`id`, `logo`, `mobile`, `alt_mobile`, `email`, `alt_email`, `address`, `facebook`, `twitter`, `instagram`, `youtube`, `map`) VALUES
(1, '68418cc02cb70.svg', '9856472123', '9586741023', 'email@gmail.com', 'altemail@gmail.com', 'your addressssss', 'https://www.facebook.com', 'https://twitter.com', 'https://www.instagram.com', 'https://www.youtube.com', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30767295.116023116!2d60.946027684017714!3d19.722272265144735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1713167102172!5m2!1sen!2sin\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` text DEFAULT NULL,
  `sub_title` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `content` text NOT NULL,
  `status` int(11) DEFAULT NULL,
  `addeddate` datetime DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `sub_title`, `slug`, `image`, `content`, `status`, `addeddate`, `modifieddate`) VALUES
(40, 'Title 1', 'sa dasd', 'title-1', '675945d6b75c6.png', '<p>d asdad</p>', 1, '2024-12-11 13:27:10', '2025-06-05 17:16:38');

-- --------------------------------------------------------

--
-- Table structure for table `slugs`
--

CREATE TABLE `slugs` (
  `id` int(11) NOT NULL,
  `slug` text NOT NULL,
  `table_name` varchar(100) NOT NULL,
  `page_name` varchar(150) NOT NULL,
  `controller_name` varchar(150) NOT NULL,
  `p_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slugs`
--

INSERT INTO `slugs` (`id`, `slug`, `table_name`, `page_name`, `controller_name`, `p_id`) VALUES
(305, 'test', 'blog', 'blog-details', 'blog', 9),
(307, 'title-1', 'slider', 'slider-details', 'slider', 40);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL COMMENT '1=admin,2=subadmin',
  `role` int(11) DEFAULT NULL,
  `access` text DEFAULT NULL,
  `first_name` text DEFAULT NULL,
  `last_name` text DEFAULT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `dob` text DEFAULT NULL,
  `martial` text DEFAULT NULL,
  `age` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `hash_key` text DEFAULT NULL,
  `hash_expiry` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `addeddate` datetime DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `type`, `role`, `access`, `first_name`, `last_name`, `username`, `password`, `email`, `mobile`, `address`, `image`, `gender`, `dob`, `martial`, `age`, `country`, `state`, `hash_key`, `hash_expiry`, `status`, `addeddate`, `modifieddate`) VALUES
(1, 1, 0, '', 'Azmal', 'Ansari', 'azmal123', 'azmal123', 'admin@gmail.com', '46546', 'sfsfsdf sdefdsfs fsdf sdf', 'user2.jpg', 'male', '01/01/2022', 'single', '22', 'india', 'elhi', NULL, NULL, 1, NULL, NULL),
(2, 1, 0, '', 'Admin', NULL, 'admin', 'admin', 'admin123@gmail.com', '95822980123', 'India', '675442c5d265d.png', 'male', '01/01/2022', 'single', '22', 'india', 'delhi', '6ef5a86a72d307d9d2df14306a26534f64236ca1887fb9ba0cff55e6e0a26390', '2024-08-30 13:34:00', 1, NULL, NULL),
(3, 1, 0, '', 'Wolverine', 'logen', 'azmal', 'azmal', 'wolverine@gmail.com', '897989', 'sfsfsdf sdefdsfs fsdf sdf', 'user3.jpg', 'male', '01/01/2022', 'single', '22', 'india', 'delhi', NULL, NULL, 1, NULL, NULL),
(4, 2, 8, '{\"main_access\":[\"0\",\"1\",\"2\",\"3\"],\"inner_access\":[[\"1\",\"2\",\"3\",\"4\"],[\"1\"],[\"4\"],[\"1\"],[],[]]}', '', '', 'azmal12345', 'azmal12345', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 1, '2024-08-24 17:23:45', '2024-11-13 15:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `image` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `position` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `addeddate` datetime DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `image`, `name`, `slug`, `position`, `content`, `status`, `addeddate`, `modifieddate`) VALUES
(2, '6759696624865.png', 'Arman Ansari', 'arman-ansari', 'Client', 'Lorem ipsum dolor sit amet, consectetur adipisicin elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim', 1, '2024-12-11 15:56:37', '2024-12-11 16:00:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_records`
--
ALTER TABLE `activity_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_tags`
--
ALTER TABLE `meta_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multipleimage`
--
ALTER TABLE `multipleimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `site_setting`
--
ALTER TABLE `site_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slugs`
--
ALTER TABLE `slugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_records`
--
ALTER TABLE `activity_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `meta_tags`
--
ALTER TABLE `meta_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `multipleimage`
--
ALTER TABLE `multipleimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `site_setting`
--
ALTER TABLE `site_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `slugs`
--
ALTER TABLE `slugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=308;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
