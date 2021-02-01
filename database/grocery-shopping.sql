-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2021 at 01:16 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online-shopping`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getproducts` ()  select * from items$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`) VALUES
(2, 'subhayan', '$2y$10$GxxYf0MH8YnMX4kvdbX1S.d/UzHiIYrMkBiRywOhhGZisSwwQ8a5G', '2019-11-11 22:14:57'),
(3, 'admin', '$2y$10$BC1PCXx65Fjo86MJYu08..ZTD5M5puAgrtTG3LavuN0viimQ6FcAq', '2020-12-15 13:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(255) DEFAULT NULL,
  `pro_original_price` int(255) DEFAULT NULL,
  `pro_image` varchar(255) DEFAULT NULL,
  `pro_category` varchar(55) DEFAULT NULL,
  `pro_price` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`pro_id`, `pro_name`, `pro_original_price`, `pro_image`, `pro_category`, `pro_price`) VALUES
(64, 'Chana Dal', 70, '1611302686_chana_dal.jpg', 'pulses', 42),
(65, 'Moong Dal', 200, '1611302711_moong_dal.jpg', 'pulses', 120),
(66, 'Masoor Dal', 160, '1611302730_masoor_dal.jpg', 'pulses', 96),
(67, 'Toor Dal', 110, '1611302775_toor_dal.jpg', 'pulses', 66),
(68, 'Wheat', 490, '1611303050_wheat_atta.jpg', 'flour', 294),
(69, 'Chilli Powder', 80, '1611303153_chilli_powder.jpg', 'spices', 48),
(70, 'Coriander Powder', 70, '1611303175_corriander_powder.jpg', 'spices', 42),
(71, 'Turmeric Powder', 150, '1611303208_turmeric_powder.jpg', 'spices', 90),
(72, 'Chips', 20, '1611303361_chips_1.jpg', 'snacks', 12),
(73, 'Chips', 100, '1611303387_chips_2.jpg', 'snacks', 60),
(74, 'Coffee', 290, '1611303434_coffee.jpg', 'beverages', 174),
(75, 'Tea', 450, '1611303467_tea.jpg', 'beverages', 270),
(76, 'Health Drink', 210, '1611303507_health_drink.jpg', 'beverages', 126),
(77, 'Noodles', 30, '1611303553_noodles.jpg', 'packaged', 18),
(78, 'Jam', 160, '1611303607_jam.jpg', 'packaged', 96),
(79, 'Ketchup', 120, '1611303631_ketchup.jpg', 'packaged', 72),
(82, 'Milk', 30, '1611303850_milk.jpg', 'dairy', 18),
(83, 'Butter', 200, '1611306479_butter.jpg', 'dairy', 120),
(84, 'Eggs', 30, '1611307109_eggs.jpg', 'eggs', 18),
(85, 'Sunflower Oil', 190, '1611307141_refined_oil.jpg', 'oil', 114),
(86, 'Ghee', 250, '1611307155_ghee.jpg', 'oil', 150),
(87, 'Shampoo', 110, '1611307254_shampoo.jpg', 'soap', 66);

--
-- Triggers `items`
--
DELIMITER $$
CREATE TRIGGER `before_insert_items` BEFORE INSERT ON `items` FOR EACH ROW BEGIN
    SET NEW.pro_price = ( NEW.pro_original_price *60 ) / 100;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(55) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `email`, `password`, `contact`, `city`, `address`) VALUES
(25, 'shanthraj', 'shan@gmail.com', '14e1b600b1fd579f47433b88e8d85291', '9876543210', 'bangalore', 'india'),
(26, 'subhayan m', 'm.subhayan@gmail.com', '73812f2b9a460ff9b3873fbcf717b5f7', '1234567890', 'bang', 'india'),
(28, 'subhayan', 'subhayan@email.com', '14e1b600b1fd579f47433b88e8d85291', '9876543210', 'bengaluru', 'marathalli');

-- --------------------------------------------------------

--
-- Table structure for table `users_items`
--

CREATE TABLE `users_items` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `status` enum('Added to cart','Confirmed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_items`
--

INSERT INTO `users_items` (`cart_id`, `user_id`, `item_id`, `status`) VALUES
(32, 6, 12, 'Confirmed'),
(33, 6, 11, 'Confirmed'),
(34, 25, 6, 'Confirmed'),
(35, 25, 7, 'Confirmed'),
(36, 25, 10, 'Confirmed'),
(37, 26, 2, 'Confirmed'),
(38, 26, 15, 'Confirmed'),
(39, 27, 23, 'Confirmed'),
(40, 27, 28, 'Confirmed'),
(41, 27, 32, 'Confirmed'),
(49, 27, 41, 'Confirmed'),
(50, 27, 43, 'Confirmed'),
(51, 27, 46, 'Confirmed'),
(52, 27, 42, 'Confirmed'),
(53, 27, 43, 'Confirmed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `users_items`
--
ALTER TABLE `users_items`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`,`item_id`),
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users_items`
--
ALTER TABLE `users_items`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
