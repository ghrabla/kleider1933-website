-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2022 at 10:10 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kleider`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fullname`, `email`, `password`) VALUES
(9, 'kamal Rhrabla', 'kamalghrabla@gmail.com', '$2y$10$aPm0MYhpeeBMPX8BJMR/eulzeQW4D/0V0.PD0rNYCUvNN6QyxEui.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `title` varchar(90) NOT NULL,
  `gender` varchar(90) NOT NULL,
  `type` varchar(90) NOT NULL,
  `image` varchar(90) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(90) NOT NULL,
  `city` varchar(90) NOT NULL,
  `adresse` varchar(90) NOT NULL,
  `postale` varchar(90) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `price`, `title`, `gender`, `type`, `image`, `fullname`, `phone`, `email`, `city`, `adresse`, `postale`, `quantity`) VALUES
(77, 'jaketa 1', '150', 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'woman', 'blazzer', 'bzwo1.png', 'kamal rhrabla', '625467800', 'kamalghrabla@gmail.com', 'safi', 'hanae', '54', 3),
(78, 'jaketa 1', '350', 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'woman', 'blazzer', 'bzwo1.png', 'kamal rhrabla', '625467800', 'kamalghrabla@gmail.com', 'safi', 'hanae', '54', 7),
(79, 'jaketa 1', '140', 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'man', 'blazzer', 'bz1.png', 'kamal rhrabla', '625467800', 'kamalghrabla@gmail.com', 'safi', 'hanae', '54', 2),
(80, 'jaketa 2', '450', 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'man', 'blazzer', 'bz2.png', 'kamal rhrabla', '625467800', 'kamalghrabla@gmail.com', 'safi', 'hanae', '54', 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `title` varchar(90) NOT NULL,
  `gender` varchar(90) NOT NULL,
  `type` varchar(90) NOT NULL,
  `image` varchar(90) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `title`, `gender`, `type`, `image`, `quantity`) VALUES
(1, 'rolex 3', 70, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'woman', 'watch', 'wawo3.png', 10),
(2, 'rolex 2', 50, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'woman', 'watch', 'wawo2.png', 10),
(3, 'rolex 1', 40, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'woman', 'watch', 'wawo1.png', 14),
(4, 'jaketa 1', 80, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'woman', 'blazzer', 'bzwo2.png', 10),
(5, 'jaketa 1', 50, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'woman', 'blazzer', 'bzwo1.png', 12),
(6, 'jaketa 1', 90, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'woman', 'blazzer', 'bzwo3.png', 10),
(7, 'nike 1', 60, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'woman', 'shoes', 'sowo3.png', 10),
(8, 'puma 1', 70, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'woman', 'shoes', 'sowo2.png', 10),
(9, 'adidass 1', 50, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'woman', 'shoes', 'sowo1.png', 10),
(10, 'kendrek 1', 50, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'man', 'shoes', 'so1.png', 10),
(11, 'adidass 2', 80, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'man', 'shoes', 'so2.png', 10),
(12, 'jordan 1', 70, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'man', 'shoes', 'so3.png', 10),
(13, 'jaketa 1', 70, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'man', 'blazzer', 'bz1.png', 10),
(14, 'jaketa 2', 90, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'man', 'blazzer', 'bz2.png', 5),
(15, 'jaketa 2', 80, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'man', 'blazzer', 'bz4.png', 10),
(16, 'rolex 1', 80, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'man', 'watch', 'wa1.png', 3),
(17, 'rolex 2', 70, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'man', 'watch', 'wa2.png', 12),
(18, 'rolex 3', 90, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'man', 'watch', 'wa3.png', 10),
(19, 'rolex 1', 90, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'kid', 'watch', 'kidwa2.png', 10),
(20, 'rolex 2', 70, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'kid', 'watch', 'kidwa1.png', 10),
(21, 'rolex 3', 80, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'kid', 'watch', 'kidwa3.png', 10),
(22, 'jaketa 1', 80, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'kid', 'blazzer', 'kibz1_1-removebg-preview.png', 10),
(23, 'jaketa 2', 70, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'kid', 'blazzer', 'kibz2_1-removebg-preview.png', 10),
(24, 'jaketa 3', 90, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'kid', 'blazzer', 'kibz3_1-removebg-preview.png', 10),
(25, 'adidass 3', 90, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'kid', 'shoes', 'kidso3.png', 10),
(26, 'jordan 1', 70, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'kid', 'shoes', 'kidso1.png', 10),
(27, 'easy 1', 60, 'lorem hcs fxusfs fgddrz rrzds bsnsu yss fsv', 'kid', 'shoes', 'kidso2.png', 10);

-- --------------------------------------------------------

--
-- Table structure for table `shopcart`
--

CREATE TABLE `shopcart` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `title` varchar(90) NOT NULL,
  `gender` varchar(90) NOT NULL,
  `type` varchar(90) NOT NULL,
  `image` varchar(90) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`) VALUES
(6, 'kamal Rhrabla', 'kamalghrabla@gmail.com', '$2y$10$iSmZSelYrtCyTWvyU7NUXeBXdzjOzza9SzePjv9o5OCqXmIlkzqXS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `shopcart`
--
ALTER TABLE `shopcart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `shopcart`
--
ALTER TABLE `shopcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `shopcart`
--
ALTER TABLE `shopcart`
  ADD CONSTRAINT `shopcart_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
