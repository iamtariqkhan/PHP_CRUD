-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2022 at 08:08 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_image` varchar(2048) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `item_image`, `item_desc`, `item_price`, `create_date`) VALUES
(2, 'Mens T-Shirts', 'images/tshirt.jpg', 'Mens T_Shirts', '550.00', '2022-04-14 14:02:59'),
(4, 'Jeans Mens', 'images/Jeans.jpg', 'Mens Jeans', '3500.00', '2022-04-14 14:02:26'),
(5, 'Mens Jacket', 'images/Jacket.jpg', 'Mens Jacket', '7500.00', '2022-04-14 14:02:00'),
(8, 'Girls Top', 'images/gtop.jpg', 'Girls Stylish Top.', '1550.00', '2022-04-14 14:01:22'),
(9, 'Mens Formal Shirt', 'images/formal-shirt.jpg', 'Mens Comfortable Shirts.', '2500.00', '2022-04-14 14:00:48'),
(10, 'Formal Pant Nice', 'images/Jeans.jpg', 'Mens Comfortable Formal Pant.', '1580.00', '2022-04-14 14:05:48'),
(12, 'Blazer', 'images/Blazer2.jpg', 'Mens Blazer', '5500.00', '2022-04-14 14:11:10'),
(13, 'Boys Blazer', 'images/Blazer-men.jpg', 'Blazer for Boys.', '6500.00', '2022-04-14 14:13:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
