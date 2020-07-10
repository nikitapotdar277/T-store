-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2020 at 07:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(15) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `units` int(5) NOT NULL,
  `total` int(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_code`, `product_name`, `price`, `units`, `total`, `date`, `email_id`) VALUES
(1, 'TMEN1', 'Tshirt', 399, 1, 399, '2020-06-20 08:02:33', 'something@something.com'),
(2, 'TMEN1', 'Tshirt', 399, 1, 399, '2020-06-20 08:02:39', 'something@something.com');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` varchar(255) CHARACTER SET latin1 NOT NULL,
  `product_code` varchar(255) CHARACTER SET latin1 NOT NULL,
  `product_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `img_name` varchar(60) CHARACTER SET latin1 NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `product_code`, `product_name`, `img_name`, `qty`, `price`, `description`) VALUES
(1, 'men', 'TMEN1', 'Tshirt', 't-men1.png', 10, '399.00', 'Printed Men Round Neck Dark Blue T-Shirt'),
(2, 'men', 'TMEN2', 'Tshirt', 't-men2.png', 10, '399.00', 'Solid Men Polo Neck Dark Blue T-Shirt'),
(3, 'men', 'TMEN3', 'Tshirt', 't-men3.png', 10, '399.00', 'Solid Men Round Neck Dark Blue, Black, Grey T-Shirt'),
(4, 'women', 'TWOMEN1', 'Tshirt', 't-women1.png', 10, '399.00', 'Solid Women Round Neck Dark Blue T-Shirt'),
(5, 'women', 'TWOMEN2', 'Tshirt', 't-women2.png', 10, '399.00', 'Striped Women Round Neck White, Blue, Black T-Shirt'),
(6, 'women', 'TWOMEN3', 'Tshirt', 't-women3.png', 10, '399.00', 'Printed Women Round Neck Dark Blue, Red T-Shirt'),
(7, 'hoodie', 'H1', 'Hoodie', 'mainhoodie3.png', 10, '699.00', 'Green Unisex Pull-over Hoodie'),
(8, 'hoodie', 'H2', 'Hoodie', 'mainhoodie1.png', 9, '699.00', 'Blue Unisex Pull-over Hoodie'),
(9, 'hoodie', 'H3', 'Hoodie', 'mainhoodie2.png', 10, '699.00', 'Blue White Red Unisex Pull-over Hoodie');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `first_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(255) CHARACTER SET latin1 NOT NULL,
  `address` varchar(255) CHARACTER SET latin1 NOT NULL,
  `city` varchar(100) CHARACTER SET latin1 NOT NULL,
  `pincode` int(6) NOT NULL,
  `email_id` varchar(255) CHARACTER SET latin1 NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 NOT NULL,
  `user_type` varchar(10) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `address`, `city`, `pincode`, `email_id`, `password`, `user_type`) VALUES
(1, 'Tstore', 'Admin', '', '', 0, 'admin@admin.com', '200ceb26807d6bf99fd6f4f0d1ca54d4', 'admin'),
(9, 'something', 'something', '12345 main street', 'pune', 411000, 'someone123@123.com', '25d55ad283aa400af464c76d713c07ad', ''),
(10, 'Tstore', 'notadmin', '', 'pune', 411000, 'someone123@something.com', '25d55ad283aa400af464c76d713c07ad', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_id` (`email_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
