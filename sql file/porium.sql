-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 02:26 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `porium`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `billing_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `town` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `user_id`, `billing_name`, `company_name`, `country`, `street`, `town`, `state`, `postcode`, `phone`, `email`) VALUES
(1, 1, 'Ankit', 'Avista Learning', 'New Delhi', 'Gali No -3', 'Delhi', 'New Delhi', '110018', '9910236659', 'ankit@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `phone`, `password`) VALUES
(1, 'ankit', 'admin@gmail.com', '9910236659', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_quantity` float NOT NULL,
  `product_subtotal` float NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_name`, `product_quantity`, `product_subtotal`, `product_id`, `order_id`, `user_id`, `created_at`) VALUES
(26, 'AirTight Plastic Storage', 2, 1000, 3, 'MKT127027', 1, '2023-06-14 17:14:50'),
(27, 'Airtight Plastic Storage  Box', 1, 500, 5, 'MKT127027', 1, '2023-06-14 17:14:50'),
(28, 'AirTight Plastic Storage', 1, 500, 3, 'MKT85121', 1, '2023-06-14 17:33:33'),
(29, 'AirTight Plastic Storage', 1, 500, 3, 'MKT994781', 1, '2023-06-14 17:59:38');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Wooden'),
(2, 'Metallic'),
(3, 'Plastic'),
(4, 'Bag'),
(5, 'Asdf'),
(6, 'Jeans');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(1, 'filedownload1912@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_amount` float NOT NULL,
  `order_transaction` varchar(255) NOT NULL,
  `razorpay_txnid` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_amount`, `order_transaction`, `razorpay_txnid`, `order_status`, `product_id`, `user_id`) VALUES
(1, 255, 'tWbw8QaQ5PF834sdfg35fdgge43', 'tWbw8QaQ5PF83iwetnnoiOIRETKAIOTNwel43', 'Completed', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `payment_id` int(11) NOT NULL,
  `payment_key` varchar(255) NOT NULL,
  `payment_secret_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`payment_id`, `payment_key`, `payment_secret_key`) VALUES
(1, 'rzp_test_4QCsgyFpQwrEDw', 'tWbw8QaQ5PF8HwKI28gWGftE');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_old_price` float NOT NULL,
  `product_price` float NOT NULL,
  `product_stock` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_status` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category_id`, `product_old_price`, `product_price`, `product_stock`, `product_description`, `product_image`, `product_code`, `product_status`) VALUES
(2, 'Hand Craft Metal Container', 3, 1999, 299, 120, '<p>Hand Crafted </p>', 'HandCraft001_1688469684.webp', 'HandCraft001', 1),
(3, 'AirTight Plastic Storage', 3, 2000, 500, 100, '<p>Air Tight Plastic Stroage</p>', '3_1686043142.webp', 'Plastic', 1),
(4, ' Marketing Porium women\'s Pu Racssin Handbag (rbib-dual)', 2, 1500, 600, 11, '<p>&nbsp;Marketing Porium women\'s Pu Racssin Handbag (rbib-dual)<br></p>', '6_1686043210.webp', 'LeatherBag003', 1),
(5, 'Airtight Plastic Storage  Box', 1, 1200, 500, 155, '<p>Airtight Plastic Storage&nbsp; Box<br></p>', '7_1686043295.webp', 'PlasticStorage001', 1),
(6, 'Set of 3 Spill proof bowl', 2, 1575, 200, 12345, '<p>Set of 3 Spill proof bowl<br></p>', '8_1686043395.webp', 'bowl001', 1),
(7, 'Hand Craft Metal Container Blue', 2, 1800, 200, 15, '<p>Hand Craft Metal Container Blue<br></p>', '9_1686043438.webp', 'HandCraft004', 1),
(8, 'Air Tight Container Ser of 4', 3, 1990, 1200, 100, '<p>Air Tight Container Ser of 4<br></p>', '12_1686043500.webp', 'PlasticStorage003', 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `setting_logo` varchar(255) NOT NULL,
  `setting_favicon` varchar(255) NOT NULL,
  `setting_address` varchar(255) NOT NULL,
  `setting_phone` varchar(12) NOT NULL,
  `setting_email` varchar(255) NOT NULL,
  `setting_working_hours` varchar(255) NOT NULL,
  `setting_subscribe_info` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `setting_logo`, `setting_favicon`, `setting_address`, `setting_phone`, `setting_email`, `setting_working_hours`, `setting_subscribe_info`) VALUES
(1, 'main-logo.webp', 'main-logo.webp', 'B4/181 FIRST FLOOR SECTOR 8 ROHINI, 110085', '8076985061', 'sahajent6@gmail.com', 'Mon - Sun / 9:00 AM - 10:00 PM', 'All the latest eqorium');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image`) VALUES
(10, '4_1685376611.jpg'),
(12, 'slider1_1685378434.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `social_id` int(11) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`social_id`, `facebook`, `twitter`, `instagram`, `youtube`) VALUES
(1, 'https://www.facebook.com/marketEmporium', 'https://www.twitter.com', 'https://www.instagram.com/marketingporium/?igshid=YmMyMTA2M2Y%3D', 'https://www.youtube.com');

-- --------------------------------------------------------

--
-- Table structure for table `top_navbar`
--

CREATE TABLE `top_navbar` (
  `top_navbar_id` int(11) NOT NULL,
  `top_navbar_name` varchar(255) NOT NULL,
  `top_navbar_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `top_navbar`
--

INSERT INTO `top_navbar` (`top_navbar_id`, `top_navbar_name`, `top_navbar_url`) VALUES
(1, 'About', 'about-us.php'),
(2, 'Home & Kitchen', ''),
(3, 'Categories', 'category.php'),
(4, 'Working', ''),
(5, 'Contacts', 'contact-us.php');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `password`, `email`, `phone`) VALUES
(1, 'ankit', 'ankit', 'ankit@gmail.com', '9988774455'),
(3, 'vimlesh ', '123456', 'vimleshkumar63@gmail.com', '9910236659'),
(4, 'vimlesh ', '123456', 'vimleshkumar63@gmail.com', '9910236659'),
(5, 'vimlesh ', '123456', 'vimleshkumar63@gmail.com', '9910236659'),
(6, 'android', '12345', 'vimleshkumar63@gmail.com', '9910236659'),
(7, 'android', '123', 'androidbate@gmail.com', '9910236659'),
(8, 'android', '123', 'androidbate@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `video_id` int(11) NOT NULL,
  `video_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`video_id`, `video_url`) VALUES
(1, 'video-2.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`social_id`);

--
-- Indexes for table `top_navbar`
--
ALTER TABLE `top_navbar`
  ADD PRIMARY KEY (`top_navbar_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `social_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `top_navbar`
--
ALTER TABLE `top_navbar`
  MODIFY `top_navbar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
