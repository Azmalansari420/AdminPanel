-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 06:38 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myrasyraadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_to_temp_cart`
--

CREATE TABLE `add_to_temp_cart` (
  `id` int(11) NOT NULL,
  `temp_user_id` text NOT NULL,
  `p_id` int(11) NOT NULL,
  `quantity` text NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_to_temp_cart`
--

INSERT INTO `add_to_temp_cart` (`id`, `temp_user_id`, `p_id`, `quantity`, `color_id`, `size_id`) VALUES
(7, '2', 22, '3', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `add_to_wishlist`
--

CREATE TABLE `add_to_wishlist` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `quantity` text NOT NULL,
  `temp_user_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_to_wishlist`
--

INSERT INTO `add_to_wishlist` (`id`, `p_id`, `quantity`, `temp_user_id`) VALUES
(64, 22, '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `all_images`
--

CREATE TABLE `all_images` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `all_images`
--

INSERT INTO `all_images` (`id`, `p_id`, `size_id`, `color_id`, `image`) VALUES
(14, 22, 8, 7, '778095892081arvtilval_ux569_.jpg'),
(15, 22, 8, 7, '464314791181tx-j6oidl_ux569_.jpg'),
(16, 22, 8, 7, '1583367332291xlmk95atl_ux569_.jpg'),
(17, 22, 8, 1, '972323002061pxgmhhnkl_ul1500_.jpg'),
(18, 22, 8, 1, '1271083580161ve6iglsvl_ul1500_.jpg'),
(19, 22, 8, 1, '14372505142331833247.jpg'),
(20, 22, 8, 1, '13391369932241361823ms_sareena_3_3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `content` longblob NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `image`, `name`, `slug`, `content`, `status`, `addeddate`, `modifieddate`) VALUES
(2, '1685875239.png', 'Azmal', 'azmal', 0x426c6f677320436f6e74656e74, 1, '2023-06-04 04:10:40', '2023-06-04 04:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `image`, `name`, `slug`, `status`, `addeddate`, `modifieddate`) VALUES
(12, '1685458900.png', 'Tops', 'tops', 1, '2023-05-30 08:31:40', '2023-05-30 08:32:34'),
(13, '1685458999.png', 'Dress', 'dress', 1, '2023-05-30 08:33:19', '0000-00-00 00:00:00'),
(14, '1685459023.png', 'Palazzo Pants', 'palazzo-pants', 1, '2023-05-30 08:33:43', '0000-00-00 00:00:00'),
(15, '1685459033.png', 'Lower', 'lower', 1, '2023-05-30 08:33:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `color_code` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `name`, `color_code`, `status`, `addeddate`, `modifieddate`) VALUES
(1, 'Maroon', '#800000', 1, '2023-03-30 12:10:41', '2023-04-11 07:23:25'),
(2, 'Black', '#000000', 1, '2023-03-30 12:17:07', '0000-00-00 00:00:00'),
(3, 'Yellow', '#ffff00', 1, '2023-04-10 06:24:28', '2023-04-11 07:28:29'),
(4, 'Blue', '#0c08fd', 1, '2023-04-10 06:24:47', '0000-00-00 00:00:00'),
(5, 'Sky Blue', '#87ceeb', 1, '2023-04-11 07:24:03', '2023-04-11 07:27:19'),
(6, 'Orange', '#ffa500', 1, '2023-04-11 07:24:38', '0000-00-00 00:00:00'),
(7, 'Pink', '#ffc0cb', 1, '2023-04-11 07:25:14', '0000-00-00 00:00:00'),
(8, 'Red', '#ff0000', 1, '2023-04-11 07:25:45', '0000-00-00 00:00:00'),
(9, 'Skin', '#e9beac', 1, '2023-04-11 07:26:15', '0000-00-00 00:00:00'),
(10, 'white', '#ffffff', 1, '2023-04-11 07:27:50', '2023-05-31 09:14:56'),
(11, 'Green', '#55be7a', 1, '2023-04-14 01:18:04', '0000-00-00 00:00:00');

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
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `mobile`, `subject`, `message`) VALUES
(5, 'Wolverine', 'wolverine@gmail.com', '7827720929', 'Logan Enquiry', 'I am not a Animal');

-- --------------------------------------------------------

--
-- Table structure for table `coupen_code`
--

CREATE TABLE `coupen_code` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `amount` varchar(110) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupen_code`
--

INSERT INTO `coupen_code` (`id`, `name`, `amount`, `type`, `status`, `addeddate`, `modifieddate`) VALUES
(1, 'admin', '5', 2, 1, '2022-10-03 07:11:44', '2023-04-14 05:35:34'),
(2, 'test', '100', 1, 1, '2022-10-03 10:50:56', '0000-00-00 00:00:00'),
(3, 'Azmal', '10', 1, 1, '2022-12-05 12:47:38', '2023-05-31 09:25:16');

-- --------------------------------------------------------

--
-- Table structure for table `dela_of_day`
--

CREATE TABLE `dela_of_day` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `sub_title` text NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `video_link` text NOT NULL,
  `countdown` text NOT NULL COMMENT 'Sep 30, 2023 00:00:00',
  `url` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `dela_of_day`
--

INSERT INTO `dela_of_day` (`id`, `image`, `sub_title`, `title`, `content`, `video_link`, `countdown`, `url`, `status`, `addeddate`, `modifieddate`) VALUES
(2, '1685892035.jpg', 'Hurry up and Get 25% Discount', 'Deals Of The Day', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit,\r\nsed do eiusmod tempor incididunt ut labore', 'https://vimeo.com/115041822', 'Sep 20, 2023', 'https://aduetechnologies.com/myrasyra/about', 1, '2023-06-04 08:50:35', '2023-06-04 08:52:27');

-- --------------------------------------------------------

--
-- Table structure for table `finalorder`
--

CREATE TABLE `finalorder` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `compony_name` text NOT NULL,
  `country` text NOT NULL,
  `address` text NOT NULL,
  `apartment` text NOT NULL,
  `house_str_no` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `pincode` text NOT NULL,
  `email` text NOT NULL,
  `mobile` text NOT NULL,
  `order_note` text NOT NULL,
  `shipping_charge` text NOT NULL,
  `sub_total` text NOT NULL,
  `finalprice` text NOT NULL,
  `after_discount_final_price` text NOT NULL,
  `payment_type` int(11) NOT NULL COMMENT '1=cod\r\n2=online',
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `finalorder`
--

INSERT INTO `finalorder` (`id`, `user_id`, `order_id`, `f_name`, `l_name`, `compony_name`, `country`, `address`, `apartment`, `house_str_no`, `city`, `state`, `pincode`, `email`, `mobile`, `order_note`, `shipping_charge`, `sub_total`, `finalprice`, `after_discount_final_price`, `payment_type`, `status`, `addeddate`) VALUES
(12, 2, 1685872617, 'Azmal', 'Logan', 'companey name', 'India', '', 'Apartment', 'F-122 Kirti sikhar', 'New delhi', 'New Delhi', '110024', 'azmal@gmail.com', '07896541230', 'New order', '100', '1500', '1600', '1600', 1, 0, '2023-06-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `offer_banners`
--

CREATE TABLE `offer_banners` (
  `id` int(11) NOT NULL,
  `mobile` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `image` text NOT NULL,
  `sub_title` text NOT NULL,
  `title` text NOT NULL,
  `link` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offer_banners`
--

INSERT INTO `offer_banners` (`id`, `mobile`, `type`, `image`, `sub_title`, `title`, `link`, `status`, `addeddate`, `modifieddate`) VALUES
(12, 2, 1, '1685893986.jpg', 'Shop Women', 'Free Shipping Over Order $120', 'dfdg', 1, '2023-06-04 09:06:02', '2023-06-04 09:23:06'),
(13, 2, 1, '1685892962.jpg', 'Shop Women', 'Free Shipping Over Order $120', 'dfdg', 1, '2023-06-04 09:06:02', '2023-06-04 09:12:20'),
(14, 2, 2, '1685893965.jpg', 'Shop Women', 'Free Shipping Over Order $120', 'dfdg', 1, '2023-06-04 09:06:02', '2023-06-04 09:22:45'),
(15, 2, 2, '1685892962.jpg', 'Shop Women', 'Free Shipping Over Order $120', 'dfdg', 1, '2023-06-04 09:06:02', '2023-06-04 09:18:38'),
(16, 1, 1, '1685893846.jpg', '', '', 'ggg', 1, '2023-06-04 09:20:46', '0000-00-00 00:00:00'),
(17, 1, 1, '1685893896.jpg', '', '', 'ggg', 1, '2023-06-04 09:20:46', '2023-06-04 09:21:36'),
(18, 1, 2, '1685893846.jpg', '', '', 'ggg', 1, '2023-06-04 09:20:46', '2023-06-04 09:22:13'),
(19, 1, 2, '1685893896.jpg', '', '', 'ggg', 1, '2023-06-04 09:20:46', '2023-06-04 09:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `thumb_img` text NOT NULL,
  `name` text NOT NULL,
  `original_price` varchar(200) NOT NULL,
  `cut_price` varchar(50) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `quantity` varchar(250) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `p_id`, `color_id`, `size_id`, `thumb_img`, `name`, `original_price`, `cut_price`, `order_id`, `quantity`, `status`) VALUES
(21, 2, 22, 1, 8, '1164326099._UX569_', 'Azmal', '1500', '1700', 1685872617, '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_coupon`
--

CREATE TABLE `order_coupon` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `coupon` varchar(100) NOT NULL,
  `type` int(2) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `discount` varchar(50) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_coupon`
--

INSERT INTO `order_coupon` (`id`, `user_id`, `coupon`, `type`, `order_id`, `discount`, `status`) VALUES
(33, 2, 'admin', 2, '1685637072', '5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `sub_cat_id` int(11) NOT NULL,
  `thumb_img` text NOT NULL,
  `thumb_img2` text NOT NULL,
  `all_images` longtext NOT NULL,
  `image` text NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `rating` text NOT NULL,
  `original_price` text NOT NULL,
  `cut_price` text NOT NULL,
  `sku` text NOT NULL,
  `color_id` varchar(150) NOT NULL,
  `size_id` varchar(50) NOT NULL,
  `small_info` longtext NOT NULL,
  `video_link` text NOT NULL,
  `description` longtext NOT NULL,
  `additional_info` longtext NOT NULL,
  `avalibility` text NOT NULL,
  `feauture_product` int(11) NOT NULL,
  `tranding_product` int(11) NOT NULL,
  `new_arrival` int(11) NOT NULL,
  `our_best` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cat_id`, `sub_cat_id`, `thumb_img`, `thumb_img2`, `all_images`, `image`, `name`, `slug`, `rating`, `original_price`, `cut_price`, `sku`, `color_id`, `size_id`, `small_info`, `video_link`, `description`, `additional_info`, `avalibility`, `feauture_product`, `tranding_product`, `new_arrival`, `our_best`, `status`, `addeddate`, `modifieddate`) VALUES
(22, 15, 12, '1164326099._UX569_', '1651392390._UX569_', '[{\"size_id\":\"8\",\"color_id\":\"7\",\"images\":[\"778095892081arvtilval_ux569_.jpg\",\"464314791181tx-j6oidl_ux569_.jpg\",\"1583367332291xlmk95atl_ux569_.jpg\"]},{\"size_id\":\"8\",\"color_id\":\"1\",\"images\":[\"972323002061pxgmhhnkl_ul1500_.jpg\",\"1271083580161ve6iglsvl_ul1500_.jpg\",\"14372505142331833247.jpg\",\"13391369932241361823ms_sareena_3_3.jpg\"]}]', '', 'Azmal', 'azmal', '4', '1500', '1700', 'DJ56456', '', '', 'sfgd stfs', 'sd fdsf', '&nbsp;sdfsf&nbsp;', '&nbsp;sdfdsf', '12 In Stock', 1, 1, 1, 1, 1, '2023-05-30 09:45:10', '2023-05-31 09:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `billing_address` text NOT NULL,
  `shipping_address` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `image`, `username`, `firstname`, `lastname`, `email`, `mobile`, `password`, `billing_address`, `shipping_address`, `status`, `addeddate`) VALUES
(1, 'user.jpg', 'Azmal@123', 'Azmal', 'Ansari', 'admin@gmail.com', 7896541230, '123456', 'Alex Aya\n\n1234 Market ##, Suite 900\nLorem Ipsum, ## 12345', 'Alex Aya\n\n1234 Market ##, Suite 900\nLorem Ipsum, ## 12345', 1, '2022-12-03 00:00:00'),
(2, 'user.jpg', 'Azmal123', 'admin', 'admin', 'admin@gmail.com', 78271, 'admin', 'Alex Aya  1234 Market ##, Suite 900 Lorem Ipsum, ## 12345', 'Alex Aya  1234 Market ##, Suite 900 Lorem Ipsum, ## 12345', 1, '2023-03-03 00:00:00'),
(3, 'user.jpg', 'admin', 'logen', 'jackmen', 'wolverine@gmail.com', 9584712015, 'admin', '', '', 1, '2023-04-07 00:00:00'),
(4, 'user.jpg', 'admin', 'test', 'test', 'theorganizerindia@gmail.com', 9584712015, 'admin', '', '', 1, '2023-04-07 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `singlebanner`
--

CREATE TABLE `singlebanner` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `link` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `singlebanner`
--

INSERT INTO `singlebanner` (`id`, `image`, `title`, `content`, `link`, `status`, `addeddate`, `modifieddate`) VALUES
(2, '1685894272.jpg', 'Twest', 'Here are a number of categories in Women\'s Wear  to find out the best choices to choose, Explore to get More-', 'dfdg', 1, '2023-06-04 09:27:52', '2023-06-04 09:29:24');

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
(1, '1685550543.svg', '9990955454', '9990955454', 'mymyrasyrapremium@gmail.com', 'mymyrasyrapremium@gmail.com', 'Plot No. 27 Gali No.3 Rajinder Nagar<br> - Industrial area Mohan nagar<br> Ghaziabad- Uttar Pradesh - 201007', 'https://www.facebook.com/', 'https://twitter.com/', 'https://www.instagram.com/', 'https://www.youtube.com/', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3502.024852414841!2d77.0783872149481!3d28.62901724099117!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d04bf6ac2495d%3A0xfff07fc03531f009!2sJanakpuri%20District%20Center%2C%20Janakpuri%2C%20Delhi!5e0!3m2!1sen!2sin!4v1667453565010!5m2!1sen!2sin\" width=\"100%\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `name`, `status`, `addeddate`, `modifieddate`) VALUES
(8, 'S', 1, '2023-03-31 09:40:31', '2023-04-14 12:26:25'),
(9, 'M', 1, '2023-03-31 09:41:13', '2023-04-04 06:45:30'),
(11, 'L', 1, '2023-03-31 09:43:03', '2023-04-04 06:45:26'),
(21, 'XL', 1, '2023-03-31 09:45:30', '2023-04-04 06:45:21'),
(22, 'XXL', 1, '2023-04-14 12:26:38', '0000-00-00 00:00:00'),
(23, 'XXXL', 1, '2023-04-14 12:26:46', '0000-00-00 00:00:00'),
(24, 'Free Size', 1, '2023-04-14 12:26:55', '2023-05-31 09:17:05');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1=mobile,2=desktop',
  `image` text NOT NULL,
  `title` text NOT NULL,
  `sub_title` text NOT NULL,
  `content` text NOT NULL,
  `url` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `type`, `image`, `title`, `sub_title`, `content`, `url`, `status`, `addeddate`, `modifieddate`) VALUES
(10, 0, '1685548692.jpg', '', '', '', '', 1, '2023-05-31 09:28:12', '0000-00-00 00:00:00'),
(11, 0, '1685548702.jpg', '', '', '', '', 1, '2023-05-31 09:28:22', '0000-00-00 00:00:00'),
(12, 0, '1685548713.jpg', '', '', '', '', 1, '2023-05-31 09:28:33', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `slug` text NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `cat_id`, `name`, `slug`, `status`, `addeddate`, `modifieddate`) VALUES
(12, 15, 'Women', 'women', 1, '2023-05-30 08:41:16', '0000-00-00 00:00:00'),
(13, 14, 'lowers', 'lowers', 1, '2023-05-30 08:41:34', '0000-00-00 00:00:00'),
(14, 14, 'Royal Plazo', 'royal-plazo', 1, '2023-05-30 08:41:48', '0000-00-00 00:00:00'),
(15, 13, 'Dress Name', 'dress-name', 1, '2023-05-30 08:42:02', '0000-00-00 00:00:00'),
(16, 12, 'Topss', 'topss', 1, '2023-05-30 08:42:18', '2023-05-30 08:43:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
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
  `state` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `first_name`, `last_name`, `username`, `password`, `email`, `mobile`, `address`, `image`, `gender`, `dob`, `martial`, `age`, `country`, `state`) VALUES
(1, 'Azmal', 'Ansari', 'azmal123', 'azmal123', 'admin@gmail.com', '46546', 'sfsfsdf sdefdsfs fsdf sdf', 'user2.jpg', 'male', '01/01/2022', 'single', '22', 'india', 'elhi'),
(2, 'Admin', 'Admin', 'admin', 'admin', 'admin1@gmail.com', '95822980123', 'delhi', '1677049590.jpg', 'male', '01/01/2022', 'single', '22', 'india', 'delhi'),
(3, 'Wolverine', 'logen', 'azmal', 'azmal', 'wolverine@gmail.com', '897989', 'sfsfsdf sdefdsfs fsdf sdf', 'user3.jpg', 'male', '01/01/2022', 'single', '22', 'india', 'delhi');

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
  `rating` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `addeddate` datetime NOT NULL,
  `modifieddate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `image`, `name`, `position`, `content`, `rating`, `status`, `addeddate`, `modifieddate`) VALUES
(1, '1681467571.jpg', 'Ruchi', 'Client', 'Very good product I like the set of plazo...good fitting good quality plzz go for it', 4, 1, '2023-04-05 12:46:09', '2023-04-14 03:49:31'),
(2, '1681467546.jpg', 'Anita Singh ', 'Client', 'Delhi I admire this Most of the products of Myra-Syra. These are superb you must purchase.', 5, 1, '2023-04-05 12:48:18', '2023-04-14 03:49:06'),
(3, '1681467524.jpg', 'Siddvatam Sushma', 'client', 'I want a stretchable Palazzo for daily use, that\'s why I choose this. I knew it is synthetic and stretchable and it is very comfortable to wear. So, I buy it. And it was too good for daily use and also for out going', 5, 1, '2023-04-05 12:48:33', '2023-04-14 03:48:44'),
(4, '1681468226.jpg', 'Trisha', 'Client', 'Karnataka These plazos are very soft and easy to clean materials. Breathable fabric was its another advantage and the quality is worth to money with On-Time Delivery services', 5, 1, '2023-04-14 03:52:28', '2023-06-04 09:36:06'),
(5, '1681468674.jpg', ' Shilpa Shindhur ', 'Client', ' Very comfortable for regular use  i just loved it thank you Myra-Syra for Selling such products.', 5, 1, '2023-04-14 04:03:25', '2023-06-04 09:36:02'),
(6, '1681468987.jpg', ' Anjali', 'Client', ' Total value for money. In this range product is as per expectations. Overall a good product must try once you will not get disappointed.\r\nAnd the best part is the delivery from Myra-Syra always before time and I like this good thing.', 5, 1, '2023-04-14 04:11:32', '2023-06-04 09:35:57'),
(7, '1685894657.jpg', 'Azmal Ansari', 'Client', 'Very good product I like the set of plazo...good fitting good quality plzz go for it', 5, 1, '2023-06-04 09:34:17', '2023-06-04 09:36:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_to_temp_cart`
--
ALTER TABLE `add_to_temp_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_to_wishlist`
--
ALTER TABLE `add_to_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_images`
--
ALTER TABLE `all_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupen_code`
--
ALTER TABLE `coupen_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dela_of_day`
--
ALTER TABLE `dela_of_day`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finalorder`
--
ALTER TABLE `finalorder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer_banners`
--
ALTER TABLE `offer_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_coupon`
--
ALTER TABLE `order_coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `singlebanner`
--
ALTER TABLE `singlebanner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_setting`
--
ALTER TABLE `site_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
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
-- AUTO_INCREMENT for table `add_to_temp_cart`
--
ALTER TABLE `add_to_temp_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `add_to_wishlist`
--
ALTER TABLE `add_to_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `all_images`
--
ALTER TABLE `all_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `coupen_code`
--
ALTER TABLE `coupen_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dela_of_day`
--
ALTER TABLE `dela_of_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `finalorder`
--
ALTER TABLE `finalorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `offer_banners`
--
ALTER TABLE `offer_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_coupon`
--
ALTER TABLE `order_coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `singlebanner`
--
ALTER TABLE `singlebanner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `site_setting`
--
ALTER TABLE `site_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
