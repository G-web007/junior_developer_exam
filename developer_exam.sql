-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 04:09 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `developer_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(225) NOT NULL,
  `unit` varchar(225) NOT NULL,
  `price` float NOT NULL,
  `expiry_date` date NOT NULL,
  `available_inventory` int(11) NOT NULL,
  `inventory_cost` varchar(225) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `unit`, `price`, `expiry_date`, `available_inventory`, `inventory_cost`, `image`) VALUES
(83, 'product 1', 'product 1', 0.13, '2023-08-15', 17, '2.21', 'img4.png'),
(84, 'product 2', 'product 2', 0.31, '2023-08-05', 7, '2.17', 'img1.png'),
(85, 'product 3', 'product 3', 0.51, '2023-08-17', 39, '19.89', 'img2.png'),
(86, 'product 4 update', 'product 3 update', 0.41, '2023-08-21', 12, '4.92', 'img5.png'),
(87, 'product 5 update', 'product 5 update', 0.37, '2023-08-09', 36, '13.32', 'img3.png'),
(88, 'product 6', 'product 6', 0.3, '2023-08-06', 31, '9.3', 'img1.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
