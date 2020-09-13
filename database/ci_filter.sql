-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 14, 2020 at 12:29 AM
-- Server version: 5.7.31-0ubuntu0.18.04.1
-- PHP Version: 7.3.21-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_filter`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float DEFAULT '0',
  `category` varchar(100) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `category`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Samsung J7', 8000, 'Mobile', 'active', '2020-09-13 00:00:00', NULL),
(2, 'Moto G', 12000, 'Mobile', 'active', '2020-09-13 00:00:00', NULL),
(3, 'Mi 8', 80000, 'Mobile', 'active', '2020-09-13 00:00:00', NULL),
(4, 'Realme', 80000, 'Mobile', 'active', '2020-09-13 00:00:00', NULL),
(5, 'Nokia 6', 10000, 'Mobile', 'active', '2020-09-13 00:00:00', NULL),
(6, 'Lenovo Yoga', 51000, 'Laptop', 'active', '2020-09-16 00:00:00', NULL),
(7, 'Apple Mackbook Pro', 151000, 'Laptop', 'active', '2020-09-16 00:00:00', NULL),
(8, 'HP Notebook', 31000, 'Laptop', 'active', '2020-09-16 00:00:00', NULL),
(9, 'Dell Inspiron', 41000, 'Laptop', 'active', '2020-09-16 00:00:00', NULL),
(10, 'Intel Mobile', 50000, 'Mobile', 'inactive', '2020-09-13 00:00:00', NULL),
(11, 'Acer Notebook', 51000, 'Laptop', 'active', '2020-09-16 00:00:00', NULL),
(12, 'MSI Notebook', 51000, 'Laptop', 'active', '2020-09-16 00:00:00', NULL),
(13, 'Lenovo X1 Carbon', 121000, 'Laptop', 'active', '2020-09-16 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_inventory`
--

CREATE TABLE `product_inventory` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `available_in_stock` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_inventory`
--

INSERT INTO `product_inventory` (`id`, `product_id`, `available_in_stock`, `created_at`, `updated_at`) VALUES
(1, 1, 10, '2020-09-13 00:00:00', NULL),
(2, 2, 0, '2020-09-13 00:00:00', NULL),
(3, 3, 0, '2020-09-13 00:00:00', NULL),
(4, 4, 0, '2020-09-13 00:00:00', NULL),
(5, 5, 0, '2020-09-13 00:00:00', NULL),
(6, 6, 1, '2020-09-16 00:00:00', NULL),
(7, 7, 1, '2020-09-16 00:00:00', NULL),
(8, 8, 10, '2020-09-16 00:00:00', NULL),
(9, 9, 10, '2020-09-16 00:00:00', NULL),
(10, 10, 1, '2020-09-13 00:00:00', NULL),
(11, 11, 10, '2020-09-16 00:00:00', NULL),
(12, 12, 10, '2020-09-16 00:00:00', NULL),
(13, 13, 10, '2020-09-16 00:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_inventory`
--
ALTER TABLE `product_inventory`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `product_inventory`
--
ALTER TABLE `product_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
