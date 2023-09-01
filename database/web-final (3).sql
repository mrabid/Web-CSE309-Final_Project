-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2023 at 07:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web-final`
--

-- --------------------------------------------------------

--
-- Table structure for table `bestselling`
--

CREATE TABLE `bestselling` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bestselling`
--

INSERT INTO `bestselling` (`id`, `name`, `price`, `image`) VALUES
(61, 'book2', 3000, 'history_of_modern_architecture.jpg'),
(63, 'Book 3', 1570, 'freefall.jpg'),
(68, 'book 5', 2000, 'holy_ghosts.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `quantity`, `image`) VALUES
(58, 12, 'Holy-Ghost', 100, 1, 'holy_ghosts.jpg'),
(59, 14, 'Economic', 200, 3, 'economic.jpg'),
(71, 0, 'Book 5', 200, 1, 'nightshade.jpg'),
(72, 0, 'Clever land', 100, 1, 'clever_lands.jpg'),
(73, 0, 'Holy-Ghost', 100, 1, 'holy_ghosts.jpg'),
(74, 8, 'Holy-Ghost', 100, 1, 'holy_ghosts.jpg'),
(75, 8, 'Clever land', 100, 1, 'clever_lands.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(100) NOT NULL,
  `delivery_name` varchar(100) NOT NULL,
  `delivery_type` varchar(100) NOT NULL,
  `salary` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `delivery_name`, `delivery_type`, `salary`, `image`) VALUES
(62, 'SKY', 'full time', 20000, 'author-5.jpg'),
(65, 'Blue', 'part time', 10000, 'author-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(10, 15, 'sanira shuchi', 'sanirashuchi@gmail.com', '01730296849', 'Very good book'),
(11, 16, 'shuchi', 'shuchi1@gmail.com', '01730296849', 'good'),
(12, 0, 'sanira', 'shuchi@gmail.com', '01730296849', 'i am interested'),
(13, 0, 'sanira', 'delivery@gmail.com', '01730296849', 'i am interested'),
(14, 0, 'shuchi', 'delivery@gmail.com', '01730296849', 'i am interested');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(11, 15, 'sanira ', '01730296849', 'customer000@gmail.com', 'cash on delivery', 'flat no. 2, 3, Dhaka, Bangladesh - 1000', ', Holy-Ghost (1) , Clever land (1) , Economic (1) ', 400, '31-Aug-2023', 'pending'),
(12, 15, 'sanira', '01730296849', 'customer000@gmail.com', 'cash on delivery', 'flat no. 1, 3, Dhaka, Bangladesh - 1000', ', Holy-Ghost (1) , Clever land (1) , Economic (1) ', 400, '31-Aug-2023', 'pending'),
(13, 16, 'shuchi', '01730296849', 'shuchi1@gmail.com', 'cash on delivery', 'flat no. 1, 3, Dhaka, Bangladesh - 1200', ', Holy-Ghost (1) , Clever land (1) ', 200, '31-Aug-2023', 'pending'),
(14, 18, 'sanira shuchi', '01730296849', 'shuchi@gmail.com', 'cash on delivery', 'flat no. 1, 2, Dhaka, Bangladesh - 1230', ', Holy-Ghost (1) , Clever land (1) ', 200, '31-Aug-2023', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(100) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `Time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `payment_type`, `payment_method`, `amount`, `Time`) VALUES
(61, 'cash on delivery', 'sundarban service', 150, '6-7 days'),
(63, 'cash on delivery', 'home delivery', 80, '2-3 days');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`) VALUES
(2, 'Holy-Ghost', 100, 'holy_ghosts.jpg'),
(3, 'Clever land', 100, 'clever_lands.jpg'),
(4, 'Economic', 200, 'economic.jpg'),
(5, 'Book3', 150, 'darknet.jpg'),
(6, 'Book 5', 200, 'nightshade.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `name`, `email`, `message`, `type`) VALUES
(10, 'manager1', 'manager1@gmail.com', 'Mail Accountant officer today about delivery man', 'Manager'),
(11, 'accountant1', 'accountant@gmail.com', 'Come to meet me today', 'Accountant');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user',
  `Contact No` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`, `Contact No`) VALUES
(2, 'sanira shuchi', 'a@gmail.com', '698d51a19d8a121ce581499d7b701668', 'CEO', 0),
(3, 'Shuchi', 'sssss@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 'Customer', 0),
(4, 'SHUCHI', 'shuchi@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 'Mannager', 0),
(5, 'sanira', 'sanira@gmail.com', 'b6d767d2f8ed5d21a44b0e5886680cb9', 'Customer', 0),
(6, 'manager', 'manager@gmail.com', '182be0c5cdcd5072bb1864cdee4d3d6e', 'Mannager', 0),
(7, 'accountant', 'accountant@gmail.com', 'f7177163c833dff4b38fc8d2872f1ec6', 'accountant', 0),
(8, 'delivery', 'delivery@gmail.com', 'b53b3a3d6ab90ce0268229151c9bde11', 'Delivery-man', 0),
(9, 'accountant1', 'accountant1@gmail.com', 'f7177163c833dff4b38fc8d2872f1ec6', 'accountant', 0),
(10, 'manager1', 'manager1@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', 'Mannager', 0),
(12, 'customer', 'customer@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', 'Customer', 0),
(14, 'customer44', 'customer000@gmail.com', '202cb962ac59075b964b07152d234b70', 'Customer', 0),
(15, 'sanira shuchi', 'sanirashuchi1@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 'Customer', 0),
(16, 'shuchi', 'shuchi1@gmail.com', '934b535800b1cba8f96a5d72f72f1611', 'Customer', 0),
(17, 'manager12', 'manager12@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Mannager', 0),
(18, 'customer0000', 'customer0000@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Customer', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bestselling`
--
ALTER TABLE `bestselling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
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
-- AUTO_INCREMENT for table `bestselling`
--
ALTER TABLE `bestselling`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
