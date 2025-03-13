-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2025 at 10:02 AM
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
-- Database: `admin_codigneter4`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_records`
--

CREATE TABLE `activity_records` (
  `id` int(11) NOT NULL,
  `ip_addreass` text NOT NULL,
  `url` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_records`
--

INSERT INTO `activity_records` (`id`, `ip_addreass`, `url`, `date`, `time`, `admin_id`, `admin_username`, `admin_password`) VALUES
(13, '::1', 'http://localhost/iplgame/admin/dashboard', '2025-02-01', '12:51:28', 2, 'admin', 'admin'),
(14, '::1', 'http://localhost/codigneter4/admin/site_setting/edit_page/1', '2025-02-04', '12:08:28', 2, '01236547891', 'admin'),
(15, '::1', 'http://localhost/codigneter4/admin/site_setting/edit_page/1', '2025-02-04', '12:08:51', 2, 'admin', 'admin'),
(16, '::1', 'http://localhost/codigneter4/admin/contact', '2025-02-04', '12:09:02', 2, 'admin', 'admin'),
(17, '::1', 'http://localhost/codigneter4/admin/dashboard', '2025-02-04', '12:09:12', 2, 'admin', 'admin'),
(18, '::1', 'http://localhost/codigneter4/admin/site_setting/edit_page/1', '2025-03-12', '07:41:04', 2, 'admin', 'admin'),
(19, '::1', 'http://localhost/codigneter4/admin/site_setting/edit_page/1', '2025-03-12', '07:41:18', 2, 'admin', 'admin'),
(20, '::1', 'http://localhost/codigneter4/admin/site_setting/edit_page/1', '2025-03-12', '07:41:22', 2, 'admin', 'admin'),
(21, '::1', 'http://localhost/codigneter4/admin/slider', '2025-03-12', '07:41:41', 2, 'admin', 'admin'),
(22, '::1', 'http://localhost/codigneter4/admin/slider/edit_page/65', '2025-03-12', '07:46:37', 2, 'admin', 'admin'),
(23, '::1', 'http://localhost/codigneter4/admin/slider', '2025-03-12', '08:06:57', 2, 'admin', 'admin'),
(24, '::1', 'http://localhost/codigneter4/admin/slider/add_page', '2025-03-12', '08:06:58', 2, 'admin', 'admin'),
(25, '::1', 'http://localhost/codigneter4/admin/slider', '2025-03-12', '08:07:24', 2, 'admin', 'admin'),
(26, '::1', 'http://localhost/codigneter4/admin/slider/edit_page/66', '2025-03-12', '08:07:29', 2, 'admin', 'admin'),
(27, '::1', 'http://localhost/codigneter4/admin/slider', '2025-03-12', '08:09:25', 2, 'admin', 'admin'),
(28, '::1', 'http://localhost/codigneter4/admin/slider', '2025-03-12', '08:09:40', 2, 'admin', 'admin'),
(29, '::1', 'http://localhost/codigneter4/admin/slider', '2025-03-12', '08:09:41', 2, 'admin', 'admin'),
(30, '::1', 'http://localhost/codigneter4/admin/site_setting/edit_page/1', '2025-03-12', '08:10:09', 2, 'admin', 'admin'),
(31, '::1', 'http://localhost/codigneter4/admin/site_setting/edit_page/1', '2025-03-12', '08:10:33', 2, 'admin', 'admin'),
(32, '::1', 'http://localhost/codigneter4/admin/site_setting/edit_page/1', '2025-03-12', '08:10:35', 2, 'admin', 'admin'),
(33, '::1', 'http://localhost/codigneter4/admin/contact', '2025-03-12', '08:11:15', 2, 'admin', 'admin'),
(34, '::1', 'http://localhost/codigneter4/admin/contact', '2025-03-12', '08:11:43', 2, 'admin', 'admin'),
(35, '::1', 'http://localhost/codigneter4/admin/contact/edit_page/1', '2025-03-12', '08:11:54', 2, 'admin', 'admin'),
(36, '::1', 'http://localhost/codigneter4/admin/contact/edit_page/1', '2025-03-12', '08:11:58', 2, 'admin', 'admin'),
(37, '::1', 'http://localhost/codigneter4/admin/contact/edit_page/1', '2025-03-12', '08:12:15', 2, 'admin', 'admin'),
(38, '::1', 'http://localhost/codigneter4/admin/contact', '2025-03-12', '08:12:16', 2, 'admin', 'admin'),
(39, '::1', 'http://localhost/codigneter4/admin/contact', '2025-03-12', '08:12:17', 2, 'admin', 'admin'),
(40, '::1', 'http://localhost/codigneter4/admin/contact/edit_page/1', '2025-03-12', '08:12:18', 2, 'admin', 'admin'),
(41, '::1', 'http://localhost/codigneter4/admin/contact/edit_page/1', '2025-03-12', '08:14:10', 2, 'admin', 'admin'),
(42, '::1', 'http://localhost/codigneter4/admin/contact', '2025-03-12', '08:14:11', 2, 'admin', 'admin'),
(43, '::1', 'http://localhost/codigneter4/admin/slider', '2025-03-12', '08:14:12', 2, 'admin', 'admin'),
(44, '::1', 'http://localhost/codigneter4/admin/contact', '2025-03-12', '08:16:56', 2, 'admin', 'admin'),
(45, '::1', 'http://localhost/codigneter4/admin/contact', '2025-03-12', '08:17:06', 2, 'admin', 'admin'),
(46, '::1', 'http://localhost/codigneter4/admin/slider', '2025-03-12', '01:50:20', 2, 'admin', 'admin'),
(47, '::1', 'http://localhost/codigneter4/admin/slider/add_page', '2025-03-12', '01:50:20', 2, 'admin', 'admin'),
(48, '::1', 'http://localhost/codigneter4/admin/slider', '2025-03-12', '01:50:23', 2, 'admin', 'admin'),
(49, '::1', 'http://localhost/codigneter4/admin/slider/edit_page/67', '2025-03-12', '01:50:54', 2, 'admin', 'admin'),
(50, '::1', 'http://localhost/codigneter4/admin/slider', '2025-03-12', '01:50:55', 2, 'admin', 'admin'),
(51, '::1', 'http://localhost/codigneter4/admin/slider/edit_page/66', '2025-03-12', '01:51:06', 2, 'admin', 'admin'),
(52, '::1', 'http://localhost/codigneter4/admin/slider', '2025-03-12', '01:51:07', 2, 'admin', 'admin'),
(53, '::1', 'http://localhost/codigneter4/admin/contact', '2025-03-12', '02:04:00', 2, 'admin', 'admin'),
(54, '::1', 'http://localhost/codigneter4/admin/contact/edit_page/6', '2025-03-12', '02:04:10', 2, 'admin', 'admin'),
(55, '::1', 'http://localhost/codigneter4/admin/contact', '2025-03-12', '02:04:12', 2, 'admin', 'admin'),
(56, '::1', 'http://localhost/codigneter4/admin/contact', '2025-03-12', '02:20:59', 2, 'admin', 'admin'),
(57, '::1', 'http://localhost/codigneter4/admin/slider', '2025-03-12', '02:21:00', 2, 'admin', 'admin'),
(58, '::1', 'http://localhost/codigneter4/admin/site_setting/edit_page/1', '2025-03-12', '02:21:01', 2, 'admin', 'admin'),
(59, '::1', 'http://localhost/codigneter4/admin/dashboard', '2025-03-12', '02:21:24', 2, 'admin', 'admin'),
(60, '::1', 'http://localhost/codigneter4/admin/site_setting/edit_page/1', '2025-03-12', '02:21:59', 2, 'admin', 'admin'),
(61, '::1', 'http://localhost/codigneter4/admin/site_setting/edit_page/1', '2025-03-12', '02:22:17', 2, 'admin', 'admin'),
(62, '::1', 'http://localhost/codigneter4/admin/contact', '2025-03-12', '02:22:19', 2, 'admin', 'admin'),
(63, '::1', 'http://localhost/codigneter4/admin/slider', '2025-03-12', '02:22:20', 2, 'admin', 'admin'),
(64, '::1', 'http://localhost/codigneter4/admin/contact', '2025-03-12', '02:22:22', 2, 'admin', 'admin'),
(65, '::1', 'http://localhost/codigneter4/admin/contact', '2025-03-12', '02:22:31', 2, 'admin', 'admin'),
(66, '::1', 'http://localhost/codigneter4/admin/contact', '2025-03-12', '02:22:34', 2, 'admin', 'admin'),
(67, '::1', 'http://localhost/codigneter4/admin/contact', '2025-03-12', '02:22:36', 2, 'admin', 'admin'),
(68, '::1', 'http://localhost/codigneter4/admin/contact', '2025-03-12', '02:22:37', 2, 'admin', 'admin'),
(69, '::1', 'http://localhost/codigneter4/admin/contact', '2025-03-12', '02:22:42', 2, 'admin', 'admin'),
(70, '::1', 'http://localhost/codigneter4/admin/contact', '2025-03-12', '02:22:44', 2, 'admin', 'admin'),
(71, '::1', 'http://localhost/codigneter4/admin/contact', '2025-03-12', '02:22:47', 2, 'admin', 'admin'),
(72, '::1', 'http://localhost/codigneter4/admin/slider', '2025-03-12', '02:22:48', 2, 'admin', 'admin'),
(73, '::1', 'http://localhost/codigneter4/admin/slider', '2025-03-12', '02:22:51', 2, 'admin', 'admin'),
(74, '::1', 'http://localhost/codigneter4/admin/slider', '2025-03-12', '02:22:53', 2, 'admin', 'admin'),
(75, '::1', 'http://localhost/codigneter4/admin/slider', '2025-03-12', '02:22:55', 2, 'admin', 'admin'),
(76, '::1', 'http://localhost/codigneter4/admin/site_setting/edit_page/1', '2025-03-12', '02:22:56', 2, 'admin', 'admin'),
(77, '::1', 'http://localhost/codigneter4/admin/site_setting/edit_page/1', '2025-03-12', '02:22:57', 2, 'admin', 'admin'),
(78, '::1', 'http://localhost/codigneter4/admin/edit_profile', '2025-03-12', '02:23:02', 2, 'admin', 'admin'),
(79, '::1', 'http://localhost/codigneter4/admin/dashboard', '2025-03-12', '02:23:03', 2, 'admin', 'admin'),
(80, '::1', 'http://localhost/codigneter4/admin/dashboard', '2025-03-12', '02:23:28', 2, 'admin', 'admin'),
(81, '::1', 'http://localhost/codigneter4/admin/slider', '2025-03-12', '02:24:10', 2, 'admin', 'admin'),
(82, '::1', 'http://localhost/codigneter4/admin/slider/add_page', '2025-03-12', '02:24:11', 2, 'admin', 'admin'),
(83, '::1', 'http://localhost/codigneter4/admin/slider', '2025-03-12', '02:24:25', 2, 'admin', 'admin'),
(84, '::1', 'http://localhost/codigneter4/admin/slider/edit_page/67', '2025-03-12', '02:24:26', 2, 'admin', 'admin'),
(85, '::1', 'http://localhost/codigneter4/admin/slider/edit_page/67', '2025-03-12', '02:24:36', 2, 'admin', 'admin'),
(86, '::1', 'http://localhost/codigneter4/admin/slider', '2025-03-12', '02:24:57', 2, 'admin', 'admin'),
(87, '::1', 'http://localhost/codigneter4/admin/slider/edit_page/66', '2025-03-12', '02:25:04', 2, 'admin', 'admin'),
(88, '::1', 'http://localhost/codigneter4/admin/slider', '2025-03-12', '02:25:42', 2, 'admin', 'admin'),
(89, '::1', 'http://localhost/codigneter4/admin/slider', '2025-03-12', '02:25:48', 2, 'admin', 'admin');

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
(8, 'Wolverine', 'wolverine@gmail.com', '9521452350', 'Enquiry ', 'Final Test', '2025-03-12 14:15:53');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `id` int(11) NOT NULL,
  `user_id` text NOT NULL,
  `device_id` text NOT NULL,
  `ip_address` text NOT NULL,
  `login_date` date NOT NULL,
  `login_time` time NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `logout_date` date DEFAULT NULL,
  `logout_time` time DEFAULT NULL,
  `login_status` int(11) NOT NULL COMMENT '0=login,1=logout,'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`id`, `user_id`, `device_id`, `ip_address`, `login_date`, `login_time`, `username`, `password`, `logout_date`, `logout_time`, `login_status`) VALUES
(12, '2', '679dcb787b333::1', '::1', '2025-02-01', '12:51:28', 'admin', 'admin', '2025-02-01', '12:51:31', 1);

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
  `type` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meta_tags`
--

INSERT INTO `meta_tags` (`id`, `page_name`, `meta_title`, `meta_auther`, `meta_keyword`, `meta_description`, `slug`, `add_date_time`, `update_date_time`, `update_history`, `is_delete`, `status`, `type`) VALUES
(15, 'Home Page', 'Home', 'Home Author', 'Home Keyword', 'Home Description', 'home', NULL, NULL, NULL, NULL, NULL, 0),
(16, NULL, NULL, NULL, NULL, NULL, 'asdasd-2', NULL, NULL, NULL, NULL, NULL, 0),
(17, NULL, NULL, NULL, NULL, NULL, 'asdasd-3', NULL, NULL, NULL, NULL, NULL, 0),
(18, NULL, NULL, NULL, NULL, NULL, 'azmal-ansari', NULL, NULL, NULL, NULL, NULL, 0),
(20, NULL, NULL, NULL, NULL, NULL, 'azmal-1', NULL, NULL, NULL, NULL, NULL, 0),
(24, NULL, NULL, NULL, NULL, NULL, 'azmal', NULL, NULL, NULL, NULL, NULL, 0),
(25, NULL, NULL, NULL, NULL, NULL, 'asdasd-4', NULL, NULL, NULL, NULL, NULL, 0),
(26, NULL, NULL, NULL, NULL, NULL, 'asdasd-5', NULL, NULL, NULL, NULL, NULL, 0),
(27, NULL, NULL, NULL, NULL, NULL, '123', NULL, NULL, NULL, NULL, NULL, 0),
(28, NULL, NULL, NULL, NULL, NULL, 'asdasd-6', NULL, NULL, NULL, NULL, NULL, 0),
(30, NULL, NULL, NULL, NULL, NULL, 'sd', NULL, NULL, NULL, NULL, NULL, 0),
(31, NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, 0),
(33, NULL, NULL, NULL, NULL, NULL, 'asdasd-7', NULL, NULL, NULL, NULL, NULL, 0),
(34, NULL, NULL, NULL, NULL, NULL, 'test-3', NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `multipleimage`
--

CREATE TABLE `multipleimage` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `multiple_image_json` text NOT NULL,
  `single_image` text NOT NULL,
  `multiple_images` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` text NOT NULL,
  `modifieddate` text NOT NULL
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
  `dob` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zipcode` text NOT NULL,
  `country` text NOT NULL,
  `password` text NOT NULL,
  `address` text NOT NULL,
  `opning_time` text NOT NULL,
  `overview` blob NOT NULL,
  `location` blob NOT NULL,
  `bussiness_hour` blob NOT NULL,
  `logo` text NOT NULL,
  `total_bed` text NOT NULL,
  `avaliable_bed` text NOT NULL,
  `image` text NOT NULL,
  `ambulance_status` float NOT NULL COMMENT '1=active,0=deactive',
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
-- Table structure for table `site_setting`
--

CREATE TABLE `site_setting` (
  `id` int(11) NOT NULL,
  `logo` text NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `alt_mobile` varchar(50) NOT NULL,
  `whatsapp_no` text NOT NULL,
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

INSERT INTO `site_setting` (`id`, `logo`, `mobile`, `alt_mobile`, `whatsapp_no`, `email`, `alt_email`, `address`, `facebook`, `twitter`, `instagram`, `youtube`, `map`) VALUES
(1, 'logo_left.png', '9856472360', '9586741023', '78945616312', 'email2@gmail.com', 'altemail2@gmail.com', 'your address ', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.youtube.com/', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30767295.116023116!2d60.946027684017714!3d19.722272265144735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1713167102172!5m2!1sen!2sin\" width=\"100%\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `sub_title` text NOT NULL,
  `slug` text NOT NULL,
  `image` text NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `sub_title`, `slug`, `image`, `content`, `status`, `addeddate`, `modifieddate`) VALUES
(66, 'test 3 ', '333', 'test-3', 'logo.png', '<p>test</p>', 1, '0000-00-00 00:00:00', '2025-03-12 13:51:07'),
(67, 'asdasd', 'sadsa', 'asdasd', '', '<p>dsadsd</p>', 1, '2025-03-12 13:50:23', '2025-03-12 13:50:55');

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
(304, 'asdasd', 'slider', 'slider.php', 'slider', 59),
(305, 'asdasd-1', 'slider', 'slider.php', 'slider', 60),
(306, 'asdasd-2', 'slider', 'slider.php', 'slider', 61),
(307, 'asdasd-3', 'slider', 'slider.php', 'slider', 62),
(315, 'azmal', 'slider', 'slider.php', 'slider', 63),
(317, 'asdasd-4', 'slider', 'slider.php', 'slider', 56),
(318, 'asdasd-5', 'slider', 'slider.php', 'slider', 42),
(319, '123', 'slider', 'slider.php', 'slider', 64),
(320, 'asdasd-6', 'slider', 'slider.php', 'slider', 35),
(322, 'sd', 'slider', 'slider.php', 'slider', 65),
(326, 'asdasd-7', 'slider', 'slider.php', 'slider', 67),
(327, 'test-3', 'slider', 'slider.php', 'slider', 66);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=admin,2=subadmin',
  `role` int(11) NOT NULL,
  `access` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `image` text NOT NULL,
  `gender` text NOT NULL,
  `dob` text NOT NULL,
  `martial` text NOT NULL,
  `age` text NOT NULL,
  `country` text NOT NULL,
  `state` text NOT NULL,
  `hash_key` text DEFAULT NULL,
  `hash_expiry` datetime DEFAULT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime DEFAULT NULL,
  `modifieddate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `type`, `role`, `access`, `first_name`, `last_name`, `username`, `password`, `email`, `mobile`, `address`, `image`, `gender`, `dob`, `martial`, `age`, `country`, `state`, `hash_key`, `hash_expiry`, `status`, `addeddate`, `modifieddate`) VALUES
(1, 1, 0, '', 'Azmal', 'Ansari', 'azmal123', 'azmal123', 'admin@gmail.com', '46546', 'sfsfsdf sdefdsfs fsdf sdf', 'user2.jpg', 'male', '01/01/2022', 'single', '22', 'india', 'elhi', NULL, NULL, 1, NULL, NULL),
(2, 1, 0, '', 'Admin', 'Admin', 'admin', 'admin', 'logen@gmail.com', '01236547891', '123 Company Address', '1738574810.png', 'Male', '01/01/2022', 'single', '26', 'India', 'DELHI', '6ef5a86a72d307d9d2df14306a26534f64236ca1887fb9ba0cff55e6e0a26390', '2024-08-30 13:34:00', 1, NULL, NULL),
(3, 1, 0, '', 'Wolverine', 'logen', 'azmal', 'azmal', 'wolverine@gmail.com', '897989', 'sfsfsdf sdefdsfs fsdf sdf', 'user3.jpg', 'male', '01/01/2022', 'single', '22', 'india', 'delhi', NULL, NULL, 1, NULL, NULL),
(4, 2, 8, '{\"main_access\":[\"0\",\"1\",\"2\",\"3\"],\"inner_access\":[[\"1\",\"2\",\"3\",\"4\"],[\"1\"],[\"4\"],[\"1\"],[],[]]}', '', '', 'azmal12345', 'azmal12345', '', '', '', '', '', '', '', '', '', '', NULL, NULL, 1, '2024-08-24 17:23:45', '2024-11-13 15:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` text NOT NULL,
  `position` text NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `image`, `name`, `position`, `content`, `status`, `addeddate`, `modifieddate`) VALUES
(1, '1731493179.png', 'Spiderman', 'Client', '<p>Hello </p>', 1, '2024-08-24 18:07:24', '2024-11-13 15:49:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_records`
--
ALTER TABLE `activity_records`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `meta_tags`
--
ALTER TABLE `meta_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `multipleimage`
--
ALTER TABLE `multipleimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `slugs`
--
ALTER TABLE `slugs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
