-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2022 at 11:55 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(222) NOT NULL,
  `active` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `active`, `image`) VALUES
(57, 'Burger', 1, 'brgr.jpg'),
(58, 'Smoothies', 1, 'milk.png'),
(59, 'Chowmein', 1, 'chw.png'),
(60, 'Hard Drink', 1, 'sap.jpg'),
(61, 'Momo', 1, 'momo.jpg'),
(62, 'Chicken', 1, 'chicken.jpg'),
(64, 'Soft Drinks', 1, 'soft.png');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(222) NOT NULL,
  `permission` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `permission`) VALUES
(1, 'bb', 'createUser'),
(4, 'magar', ''),
(5, 'kasam', 'createUser');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `orderitem_id` int(13) NOT NULL,
  `tax` int(11) NOT NULL,
  `service_charge` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `invoice_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_id`
--

CREATE TABLE `invoice_id` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ipad_invoice`
--

CREATE TABLE `ipad_invoice` (
  `id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `total_amount` int(111) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ipad_order`
--

CREATE TABLE `ipad_order` (
  `id` int(13) NOT NULL,
  `table_id` int(13) NOT NULL,
  `quantity` int(13) NOT NULL,
  `amount` int(225) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ipad_order`
--

INSERT INTO `ipad_order` (`id`, `table_id`, `quantity`, `amount`, `pro_id`, `status`, `date`) VALUES
(2, 11, 1, 150, 3, 1, '2019-05-30 06:30:58'),
(3, 9, 1, 200, 6, 2, '2019-05-30 06:37:02'),
(4, 9, 2, 240, 2, 2, '2019-05-30 06:39:14'),
(6, 10, 1, 500, 8, 2, '2019-05-30 07:34:04'),
(7, 9, 2, 240, 2, 2, '2019-05-30 07:40:35'),
(8, 10, 1, 300, 7, 2, '2019-05-30 07:44:29'),
(9, 10, 2, 400, 6, 2, '2019-05-30 07:44:29'),
(12, 10, 1, 500, 18, 2, '2019-05-30 10:39:59'),
(13, 9, 1, 300, 7, 2, '2019-05-30 07:55:40'),
(14, 9, 1, 500, 8, 2, '2019-05-30 07:55:40'),
(15, 9, 1, 200, 6, 2, '2019-05-30 07:59:01'),
(18, 9, 1, 120, 2, 2, '2019-05-30 07:59:02'),
(20, 10, 1, 120, 2, 2, '2019-05-30 10:40:52'),
(21, 9, 2, 400, 6, 2, '2019-07-01 05:01:59'),
(22, 10, 1, 300, 7, 0, '2019-06-27 05:10:41'),
(23, 10, 2, 200, 14, 2, '2019-07-24 01:49:23'),
(24, 10, 1, 300, 7, 0, '2019-06-27 05:10:41'),
(25, 10, 2, 200, 14, 2, '2019-07-24 01:49:23'),
(26, 12, 2, 500, 15, 2, '2019-06-27 05:18:38'),
(27, 12, 1, 200, 16, 2, '2019-06-27 05:18:38'),
(28, 12, 1, 140, 17, 1, '2019-07-24 01:47:29'),
(29, 13, 1, 300, 7, 0, '2019-07-01 04:44:29'),
(30, 13, 2, 400, 6, 0, '2019-07-01 04:44:29'),
(31, 9, 2, 1000, 8, 0, '2019-07-01 05:03:48'),
(32, 10, 1, 200, 6, 0, '2019-07-24 01:47:06'),
(33, 10, 1, 300, 7, 0, '2019-07-24 01:47:06'),
(34, 10, 1, 500, 8, 0, '2019-07-24 01:47:06'),
(35, 10, 1, 500, 8, 0, '2019-07-24 01:47:07'),
(36, 9, 1, 120, 2, 2, '2022-03-27 09:52:08'),
(37, 9, 1, 150, 3, 2, '2022-03-27 09:52:09'),
(38, 0, 1, 120, 2, 0, '2020-03-03 03:03:32'),
(39, 0, 5, 1250, 1, 0, '2022-03-27 09:51:52'),
(40, 10, 4, 1000, 1, 0, '2022-03-27 09:52:40');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(13) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `price` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(13) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `status` varchar(222) NOT NULL,
  `type` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `price`, `description`, `image`, `status`, `type`) VALUES
(1, 60, 'beer', '250', '<p>jhwegfh</p>', 'beers.jpg', 'Active', 2),
(2, 59, 'chowmein', '120', '<p>kwgejy</p>', 'chw.png', 'Active', 1),
(3, 58, 'milk smoothie', '150', '<p>lksdhukj</p>', 'milk.png', 'Active', 3),
(4, 57, 'burger', '100', '<p>jehriufh</p>', 'brgr.jpg', 'Active', 1),
(6, 57, 'chicken burger', '200', '<p>hjdfb</p>', 'burger.png', 'Active', 1),
(7, 60, 'wines', '300', '<p>nefgfuyh</p>', 'cutback.jpg', 'Active', 2),
(8, 60, 'bombak', '500', '<p>jhhd</p>', 'sap.jpg', 'Active', 2),
(10, 60, 'Mocktails', '500', '<p>SHDHDfyj</p>', 'consumption.png', 'Active', 2),
(14, 0, 'Bread Roll', '100', '<p>its good&nbsp;</p>', 'rot.jpg', 'Active', 1),
(15, 61, 'C momo', '250', '<p>good</p>', 'c momo.jpg', 'Active', 1),
(16, 61, 'chicken-momo', '200', '<p>good</p>', 'ch momo.png', 'Active', 1),
(17, 61, 'Buff-momo', '140', '<p>good</p>', 'momo.jpg', 'Active', 1),
(18, 62, 'Chicken Roast', '500', '<p>testy</p>', 'chickenk.jpg', 'Active', 1),
(24, 64, 'Cocacola', '80', '<p>soft drinks</p>', 'cocacola.png', 'Active', 2),
(25, 64, 'Pepsi', '80', '<p>soft drinks</p>', 'pep.png', 'Active', 2),
(26, 58, 'Green smoothie', '120', '<p>good</p>', 'green.png', 'Active', 3),
(27, 61, 'veg', '34', '', '', 'Active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_info`
--

CREATE TABLE `restaurant_info` (
  `id` int(13) NOT NULL,
  `vat` int(13) NOT NULL,
  `service` int(13) NOT NULL,
  `discount` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant_info`
--

INSERT INTO `restaurant_info` (`id`, `vat`, `service`, `discount`) VALUES
(13, 8, 7, 9),
(14, 13, 8, 9),
(15, 8, 7, 9),
(16, 3, 0, 9),
(17, 9, 0, 7),
(18, 3, 0, 7),
(19, 3, 0, 7),
(20, 9, 0, 9),
(21, 7, 0, 7),
(22, 3, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(13) NOT NULL,
  `table_num` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `table_num`) VALUES
(9, 'Table_Num:1'),
(10, 'Table_Num:2'),
(11, 'Table_Num:3'),
(12, 'Table_Num:4'),
(13, 'Table_Num:5');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `group` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone` int(13) NOT NULL,
  `address` varchar(244) NOT NULL,
  `last_login` varchar(100) DEFAULT NULL,
  `login_hash` varchar(300) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `group`, `email`, `full_name`, `phone`, `address`, `last_login`, `login_hash`, `created_at`, `updated_at`) VALUES
(3, 'bishal', 'bishal', 100, 'bishal@gmail.com', 'bishal magar', 763458632, 'kalanki', '1583203565', '56810441eade72dde54fc249926d1f51bb1dab77', 1558591002, NULL),
(4, 'bishal', 'bishal', 100, 'bishal@gmail.com', 'bishal mgr', 24532634, 'kalanki', '1583203565', '56810441eade72dde54fc249926d1f51bb1dab77', 1558594538, NULL),
(5, 'bishal', 'bishal', 100, 'bishal@gmail.com', 'bishal', 2147483647, 'kalanki', '1583203565', '56810441eade72dde54fc249926d1f51bb1dab77', 1558594539, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipad_invoice`
--
ALTER TABLE `ipad_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipad_order`
--
ALTER TABLE `ipad_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant_info`
--
ALTER TABLE `restaurant_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ipad_invoice`
--
ALTER TABLE `ipad_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ipad_order`
--
ALTER TABLE `ipad_order`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `restaurant_info`
--
ALTER TABLE `restaurant_info`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
