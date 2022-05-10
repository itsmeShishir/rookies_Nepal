-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2020 at 06:21 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoping`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'KDHSFKADF', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_style` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `text_style`, `sort_order`, `content`, `link`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'JCB', 'center', 1, 'This is the advertisement of jcb', 'https://www.jcb.com/', '5505.jpg', 1, '2020-10-25 03:42:57', '2020-10-26 12:19:20'),
(2, 'Sun Life', 'center', 2, 'This is the advertisement of sun life insurence', 'https://sunlife.com.np/', '2694.jpg', 1, '2020-10-25 03:44:05', '2020-10-25 03:44:05'),
(3, 'Energy', 'center', 3, 'The advertisement of energy', 'https://www.jcb.com/', '5339.jpg', 1, '2020-10-25 03:46:16', '2020-10-26 12:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `image`, `company_name`, `email`, `mobile`, `status`, `created_at`, `updated_at`) VALUES
(1, '6784.png', 'IT Glance', 'bibeklama67@gmail.com', 9818445068, 1, '2020-12-16 12:04:24', '2020-12-16 12:04:24'),
(2, '3244.jpg', 'sdfa', 'adfa@adfa.cadf', 123, 1, '2020-12-16 12:18:55', '2020-12-16 12:18:55'),
(3, '8749.png', 'adfadf', 'adfadf@fadf.adfadf', 12123, 1, '2020-12-16 12:24:53', '2020-12-16 12:24:53'),
(4, '8843.jpg', 'sadf@dadf.cadlkjf', 'adfadf@fadfadf.cadf', 234234, 1, '2020-12-16 12:25:27', '2020-12-16 12:25:27');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_owner_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_attr_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `product_owner_id`, `product_name`, `product_code`, `product_color`, `product_price`, `sku`, `product_size`, `product_quantity`, `total_price`, `user_email`, `session_id`, `product_attr_id`, `created_at`, `updated_at`) VALUES
(6, 2, 4, 2, 'adfa', 'dfa', 'adf', '12', NULL, '13', 1, 12, 'bibeklamadai@gmail.com', 'nCON966nG0QP0Y82JK0PNEAmuu3ENbgOIGugy9Sc', 1, '2020-12-21 11:00:25', '2020-12-21 11:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `url`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Electronic Devices', '/electronic-devices', 'All the electronic Devices', 1, '2020-10-25 03:14:09', '2020-10-25 03:34:28'),
(2, 1, 'Mobile', '/electronic-devices/mobile', 'mobile', 1, '2020-10-25 03:14:48', '2020-10-25 03:14:48'),
(3, 1, 'Tablet', '/electronic-devices', 'tablet', 1, '2020-10-25 03:15:22', '2020-10-25 03:15:22'),
(4, 1, 'Laptop', '/electronic-devices/laptop', 'laptop', 1, '2020-10-25 03:15:48', '2020-10-25 03:15:48'),
(5, 1, 'Desktop', '/electronic-devices/desktop', 'Desktop', 1, '2020-10-25 03:16:14', '2020-10-25 03:16:14'),
(6, 1, 'Camera', '/electronic-devices/camera', 'Camera', 1, '2020-10-25 03:16:37', '2020-10-25 03:16:37'),
(7, 1, 'Printers', '/electronic-devices/printers', 'Printers', 1, '2020-10-25 03:17:16', '2020-10-25 03:17:16'),
(8, 0, 'Electronic Accessories', '/electronic-accessories', 'Electronic accessories', 1, '2020-10-25 03:18:07', '2020-10-25 03:18:07'),
(9, 8, 'Mobile Accessories', '/electronic-accessories/mobile-accessories', 'mobile-accessories', 1, '2020-10-25 03:18:48', '2020-10-25 03:18:48'),
(10, 8, 'Audio', '/electronic-accessories/audio', 'Audio', 1, '2020-10-25 03:19:18', '2020-10-25 03:19:18'),
(11, 8, 'Werable', '/electronic-accessories/werable', 'werable', 1, '2020-10-25 03:19:47', '2020-10-25 03:19:47'),
(12, 8, 'Camera Accessories', '/electronic-accessories/camera-accessories', 'Camera Accessories', 1, '2020-10-25 03:20:25', '2020-10-25 03:20:25'),
(13, 8, 'Computer Accessories', '/electronic-accessories/computer-accessories', 'Computer Accessories', 1, '2020-10-25 03:21:08', '2020-10-25 03:21:08'),
(14, 0, 'TV & Home Appliances', '/tvandhomeappliances', 'Home and Appliances', 1, '2020-10-25 03:21:49', '2020-10-25 03:21:49'),
(15, 0, 'Heath & Beauty', '/heath-beauty', 'Health and Beauty', 1, '2020-10-25 03:22:26', '2020-10-25 03:22:26'),
(16, 0, 'Baby & Toys', '/baby-toys', 'Baby and Toys', 1, '2020-10-25 03:23:06', '2020-10-25 03:23:06'),
(17, 0, 'Groceries & Pets', '/groceries-pets', 'Groceries and pets', 1, '2020-10-25 03:23:44', '2020-10-25 03:23:44'),
(18, 0, 'Home and Lifestyle', '/home-lifestyle', 'Home and Lifestyle', 1, '2020-10-25 03:24:14', '2020-10-25 03:24:14'),
(19, 0, 'Women\'s Fashion', '/women-fashion', 'Women Fashion', 1, '2020-10-25 03:24:44', '2020-10-25 03:24:44'),
(20, 0, 'Men\'s Fashion', '/menfashion', 'Men\'s Fashion', 1, '2020-10-25 03:25:12', '2020-10-25 03:25:12'),
(21, 0, 'Watch & Accessories', '/watch-accessories', 'Watch Accessories', 1, '2020-10-25 03:26:01', '2020-10-25 03:26:01'),
(22, 0, 'Sports & Outdoor', '/sports-outdoor', 'Sports and outdoor', 1, '2020-10-25 03:26:28', '2020-10-25 03:26:28'),
(23, 0, 'Automotive & Motorbike', '/automotive-motorbike', 'Automotive motorbike', 1, '2020-10-25 03:27:22', '2020-10-25 03:27:22'),
(24, 20, 'Clothing', '/men-fashion/clothing', 'Clothing', 1, '2020-10-25 03:28:28', '2020-10-25 03:28:28'),
(25, 20, 'Shoes', '/menfashion/shoes', 'Shoes', 1, '2020-10-25 03:28:51', '2020-10-25 03:28:51'),
(26, 20, 'Men\'s Bag', '/men-fashion/men-bag', 'Men\'s Bag', 1, '2020-10-25 03:29:40', '2020-10-25 03:29:40');

-- --------------------------------------------------------

--
-- Table structure for table `contact_triopluses`
--

CREATE TABLE `contact_triopluses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_triopluses`
--

INSERT INTO `contact_triopluses` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Bibek Lama', 'bibeklama67@gmail.com', 'this is good', 'can you make me one of this', '2020-10-25 10:54:18', '2020-10-25 10:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `user_id`, `coupon_code`, `amount`, `amount_type`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'BIBEKLAMA', 200, 'fixed', '2021-06-30', 1, '2020-10-25 05:03:08', '2020-10-25 05:03:08'),
(2, 1, 'bibek', 5, 'percentage', '2021-11-26', 1, '2020-10-25 05:04:07', '2020-10-25 05:04:07');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `status`, `email`, `email_verified_at`, `phone`, `district`, `address`, `city`, `area`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'bibek', 1, 'bibeklama67@gmail.com', '2020-12-18 18:15:00', NULL, NULL, NULL, NULL, NULL, '$2y$10$/xImdxmiUJTjmlDa8Bb3UevsHpl4GwiYhTbW6yueE0H09PVKtn6LS', NULL, '2020-12-19 02:18:48', '2020-12-19 02:18:48'),
(3, 'sfgsfg', 1, 'bibek@fadf.cad', '2020-12-18 18:15:00', NULL, NULL, NULL, NULL, NULL, '$2y$10$iiyu2L2XnVuLKZhSd0f10ucPvYXrOpAM9I1Biil3FD8gN6zPre9nS', NULL, '2020-12-19 02:20:53', '2020-12-19 02:20:53'),
(4, 'adsf', 1, 'bibek@asfadfadsf.cadf', '2020-12-18 18:15:00', NULL, NULL, NULL, NULL, NULL, '$2y$10$i34ETdSjT7weuZRBy9z9sOFHbvKCbTvBRndLcFa6Uur6XNBPaFAce', NULL, '2020-12-19 02:26:12', '2020-12-19 02:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `customer_users`
--

CREATE TABLE `customer_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deliver_adresses`
--

CREATE TABLE `deliver_adresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliver_adresses`
--

INSERT INTO `deliver_adresses` (`id`, `user_id`, `name`, `phone`, `district`, `city`, `area`, `address`, `created_at`, `updated_at`) VALUES
(1, 3, 'user', 123123, 'kathmandu', 'Naxal Area-Kathmandu Metro 1', 'Naxal', 'adfa', '2020-12-19 03:32:13', '2020-12-22 11:31:53');

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
-- Table structure for table `footer_details`
--

CREATE TABLE `footer_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `header_details`
--

CREATE TABLE `header_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `header_details`
--

INSERT INTO `header_details` (`id`, `email`, `about`, `phone`, `mobile`, `created_at`, `updated_at`) VALUES
(1, 'bibeklama67@gmail.com', 'adfadf', 54654, 454, NULL, NULL);

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
(65, '2014_10_12_100000_create_password_resets_table', 1),
(66, '2019_08_19_000000_create_failed_jobs_table', 1),
(68, '2020_08_21_132844_create_categories_table', 1),
(69, '2020_08_22_155911_create_banners_table', 1),
(70, '2020_08_24_185150_create_products_attributes_table', 1),
(71, '2020_08_26_184330_create_products_images_table', 1),
(73, '2020_09_09_191234_create_coupons_table', 1),
(74, '2020_09_11_155128_create_customer_users_table', 1),
(76, '2020_09_16_162811_create_orders_table', 1),
(77, '2020_09_16_162834_create_order_products_table', 1),
(78, '2020_09_25_165124_create_vendor_orders_table', 1),
(79, '2020_10_22_122928_create_contact_triopluses_table', 1),
(80, '2020_09_12_184354_create_deliver_adresses_table', 2),
(84, '2020_12_01_120627_create_side_banners_table', 4),
(88, '2020_09_02_181131_create_carts_table', 6),
(91, '2020_12_13_110529_create_header_details_table', 8),
(92, '2020_12_14_144417_create_footer_details_table', 8),
(93, '2020_12_14_144432_create_about_us_table', 8),
(94, '2020_12_14_144443_create_policies_table', 8),
(95, '2020_12_14_144506_create_terms_and_conditions_table', 8),
(96, '2020_12_15_141427_create_brands_table', 8),
(98, '2014_10_12_000000_create_users_table', 9),
(99, '2020_12_19_075651_create_customers_table', 10),
(100, '2020_08_19_090053_create_products_table', 11),
(102, '2020_12_20_131253_create_wish_lists_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `shipping_charges` double(8,2) NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_amount` int(11) NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grand_total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_email`, `name`, `address`, `phone`, `shipping_charges`, `coupon_code`, `coupon_amount`, `order_status`, `payment_method`, `grand_total`, `created_at`, `updated_at`) VALUES
(1, 3, 'user@gmail.com', 'user', 'zcv', 123123, 100.00, 'Not Used', 0, 'New', 'cod', 112.00, '2020-12-19 03:34:16', '2020-12-19 03:34:16'),
(2, 3, 'user@gmail.com', 'user', 'adsfa', 123123, 100.00, 'Not Used', 0, 'New', 'cod', 112.00, '2020-12-21 11:06:00', '2020-12-21 11:06:00'),
(3, 3, 'user@gmail.com', 'user', 'adf', 123123, 100.00, 'Not Used', 0, 'New', 'cod', 112.00, '2020-12-21 11:08:24', '2020-12-21 11:08:24'),
(4, 3, 'user@gmail.com', 'user', 'adfaf', 123123, 100.00, 'Not Used', 0, 'New', 'cod', 112.00, '2020-12-21 11:08:59', '2020-12-21 11:08:59'),
(5, 3, 'user@gmail.com', 'user', 'afdg', 123123, 100.00, 'Not Used', 0, 'New', 'cod', 112.00, '2020-12-22 11:31:28', '2020-12-22 11:31:28'),
(6, 3, 'user@gmail.com', 'user', 'adfa', 123123, 100.00, 'Not Used', 0, 'New', 'esewa', 112.00, '2020-12-22 11:31:58', '2020-12-22 11:31:58');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `user_id`, `product_id`, `product_code`, `product_name`, `product_color`, `product_size`, `product_price`, `product_qty`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 2, 'dfa', 'adfa', 'adf', '13', 12, 1, '2020-12-19 03:34:16', '2020-12-19 03:34:16'),
(2, 2, 3, 2, 'dfa', 'adfa', 'adf', '13', 12, 1, '2020-12-21 11:06:00', '2020-12-21 11:06:00'),
(3, 3, 3, 2, 'dfa', 'adfa', 'adf', '13', 12, 1, '2020-12-21 11:08:24', '2020-12-21 11:08:24'),
(4, 4, 3, 2, 'dfa', 'adfa', 'adf', '13', 12, 1, '2020-12-21 11:08:59', '2020-12-21 11:08:59'),
(5, 5, 3, 2, 'dfa', 'adfa', 'adf', '13', 12, 1, '2020-12-22 11:31:28', '2020-12-22 11:31:28'),
(6, 6, 3, 2, 'dfa', 'adfa', 'adf', '13', 12, 1, '2020-12-22 11:31:58', '2020-12-22 11:31:58');

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
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'ADFADF', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) DEFAULT NULL,
  `vendor_price` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `featured` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `name`, `code`, `category_id`, `color`, `description`, `detail`, `price`, `vendor_price`, `image`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 1, 'asdf adsfadf adsfadf a10000', 'adfad', 2, 'adsf', '<p>adf</p>', '<p>af</p>', 12312, NULL, '7810.jpg', 1, 1, '2020-12-19 02:48:42', '2020-12-21 11:19:35'),
(2, 2, 'adfa', 'dfa', 4, 'adf', '<p>adf</p>', '<p>adfadf</p>', 12, 1232, '1458.jpg', 1, 1, '2020-12-19 02:51:43', '2020-12-19 03:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes`
--

CREATE TABLE `products_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_attributes`
--

INSERT INTO `products_attributes` (`id`, `product_id`, `sku`, `size`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(1, 2, 'sfdg', '13', 1231, 117, '2020-12-19 02:52:48', '2020-12-22 11:31:58');

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '7009.jpg', '2020-12-16 12:31:02', '2020-12-16 12:31:02'),
(2, 1, '336.jpg', '2020-12-16 12:31:07', '2020-12-16 12:31:07'),
(3, 1, '491.jpg', '2020-12-16 12:31:17', '2020-12-16 12:31:17'),
(4, 2, '4599.jpg', '2020-12-19 03:02:40', '2020-12-19 03:02:40'),
(5, 2, '5160.jpg', '2020-12-19 03:02:45', '2020-12-19 03:02:45');

-- --------------------------------------------------------

--
-- Table structure for table `side_banners`
--

CREATE TABLE `side_banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sort_order` int(11) NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dimension` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `side_banners`
--

INSERT INTO `side_banners` (`id`, `sort_order`, `link`, `image`, `dimension`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'a', '7206.jpg', '345 X 220', 1, '2020-12-01 07:48:48', '2020-12-01 07:56:52'),
(2, 2, 'sd', '4782.jpg', '345 X 220', 1, '2020-12-01 07:49:17', '2020-12-01 07:49:17'),
(3, 3, 'afdadf', '9824.jpg', '1410 X 190', 1, '2020-12-01 07:49:26', '2020-12-01 07:49:26'),
(4, 4, 'sfdgsg', '6091.jpg', '690 X 220', 1, '2020-12-01 07:49:36', '2020-12-01 07:49:36'),
(5, 5, 'sfgsg', '2875.jpg', '690 X 220', 1, '2020-12-01 07:49:44', '2020-12-01 07:49:44');

-- --------------------------------------------------------

--
-- Table structure for table `terms_and_conditions`
--

CREATE TABLE `terms_and_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms_and_conditions`
--

INSERT INTO `terms_and_conditions` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'ADFADF', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL DEFAULT 1,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `status`, `email`, `email_verified_at`, `phone`, `district`, `address`, `city`, `area`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 1, 1, 'admin@gmail.com', '2020-12-15 18:15:00', NULL, NULL, NULL, NULL, NULL, '$2y$10$AelAkv4ZgxtF1ia33GKnJusvnzlPf.3QMYqgunTIMHdscPHCUNtHa', NULL, '2020-12-16 11:58:09', '2020-12-16 11:58:09'),
(2, 'vendor', 2, 1, 'vendor@gmail.com', '2020-12-15 18:15:00', NULL, NULL, NULL, NULL, NULL, '$2y$10$GFFcK015QzWP1AWvxZg7huOU8y2LJJIibtee3JBx.97FTeFj4S/9y', NULL, '2020-12-16 11:58:32', '2020-12-16 12:03:31'),
(3, 'user', 3, 1, 'user@gmail.com', '2020-12-15 18:15:00', 123123, 'kathmandu', 'sfgsfg', 'Naxal Area-Kathmandu Metro 1', 'Naxal', '$2y$10$YLh2mAAAimMv22/kamTykOpzbutxXycWnv1pXxghBN05OBDFuT3Vu', NULL, '2020-12-16 11:58:53', '2020-12-22 11:31:53'),
(4, 'bibeklama', 3, 1, 'bibeklamadai@gmail.com', '2020-12-20 18:15:00', NULL, NULL, NULL, NULL, NULL, '$2y$10$KMtgnxONFbRiH1KZCgthOu6clJWF1SQO8HsCzacm30p8YxCBBX8XS', NULL, '2020-12-21 10:55:20', '2020-12-21 10:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_orders`
--

CREATE TABLE `vendor_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `order_product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_orders`
--

INSERT INTO `vendor_orders` (`id`, `order_id`, `owner_id`, `order_product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, '2020-12-19 03:34:16', '2020-12-19 03:34:16'),
(2, 2, 2, 2, '2020-12-21 11:06:00', '2020-12-21 11:06:00'),
(3, 3, 2, 3, '2020-12-21 11:08:24', '2020-12-21 11:08:24'),
(4, 4, 2, 4, '2020-12-21 11:08:59', '2020-12-21 11:08:59'),
(5, 5, 2, 5, '2020-12-22 11:31:28', '2020-12-22 11:31:28'),
(6, 6, 2, 6, '2020-12-22 11:31:58', '2020-12-22 11:31:58');

-- --------------------------------------------------------

--
-- Table structure for table `wish_lists`
--

CREATE TABLE `wish_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wish_lists`
--

INSERT INTO `wish_lists` (`id`, `user_id`, `product_id`, `product_name`, `product_image`, `product_price`, `created_at`, `updated_at`) VALUES
(10, 1, 1, 'asdf adsfadf adsfadf a10000', '7810.jpg', '12312', '2020-12-21 11:20:51', '2020-12-21 11:20:51'),
(13, 3, 2, 'adfa', '1458.jpg', '12', '2020-12-22 11:32:39', '2020-12-22 11:32:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_triopluses`
--
ALTER TABLE `contact_triopluses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `customer_users`
--
ALTER TABLE `customer_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliver_adresses`
--
ALTER TABLE `deliver_adresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footer_details`
--
ALTER TABLE `footer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header_details`
--
ALTER TABLE `header_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `side_banners`
--
ALTER TABLE `side_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendor_orders`
--
ALTER TABLE `vendor_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contact_triopluses`
--
ALTER TABLE `contact_triopluses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_users`
--
ALTER TABLE `customer_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deliver_adresses`
--
ALTER TABLE `deliver_adresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_details`
--
ALTER TABLE `footer_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `header_details`
--
ALTER TABLE `header_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `side_banners`
--
ALTER TABLE `side_banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `terms_and_conditions`
--
ALTER TABLE `terms_and_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor_orders`
--
ALTER TABLE `vendor_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wish_lists`
--
ALTER TABLE `wish_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
