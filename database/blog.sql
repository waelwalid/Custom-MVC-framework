-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2016 at 06:15 PM
-- Server version: 5.7.10
-- PHP Version: 7.0.2-4+deb.sury.org~trusty+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cat_parent` int(10) UNSIGNED DEFAULT NULL,
  `cat_state` int(1) UNSIGNED NOT NULL DEFAULT '1',
  `cat_token` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_create_date`, `cat_parent`, `cat_state`, `cat_token`) VALUES
(19, 'sports', '2016-06-30 17:46:10', 0, 1, 14081667),
(20, 'casual', '2016-06-30 17:46:20', 0, 1, 24454617),
(21, 'child of sports', '2016-06-30 17:46:38', 14081667, 1, 21923168),
(22, 'child of casual', '2016-06-30 17:46:50', 24454617, 1, 26719166);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_title` varchar(200) NOT NULL,
  `product_desc` text NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_create_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_status` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `product_img` varchar(250) NOT NULL,
  `product_token` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_desc`, `product_category`, `product_create_date`, `product_status`, `product_img`, `product_token`) VALUES
(21, 'blue start', 'blue start      blue start      blue start      blue start      blue start      blue start      blue start      blue start      blue start      blue start      blue start      blue start      blue start      blue start      blue start      blue start', 14081667, '2016-06-30 17:45:24', 1, 'golden-star-111.jpg', 546456),
(22, 'first product', 'first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product  first product', 14081667, '2016-06-30 17:51:48', 1, 'golden-star-031.jpg', 14484666),
(23, 'second product', 'second product second product second product second product second product second product second product second product second product second product second product second product second product second product second product second product second product second product second product second product second product second product second product second product', 24454617, '2016-06-30 17:53:11', 1, 'golden-star-033.jpg', 24519070),
(24, 'It is a long established', 'It is a long established  It is a long established  It is a long established  It is a long established  It is a long established  It is a long established  It is a long established  It is a long established  It is a long established  It is a long established  It is a long established  It is a long established', 21923168, '2016-06-30 17:57:40', 1, 'logo-cs1.png', 20934039);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `name` varchar(200) NOT NULL,
  `main` varchar(200) NOT NULL,
  `text` varchar(200) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`name`, `main`, `text`, `id`) VALUES
('6', '12', '11', 1),
('1', '11', '4', 3),
('1', '11', '4', 4),
('1', '11', '4', 5),
('1', '11', '4', 6),
('1', '11', '4', 7),
('1', '11', '4', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(70) NOT NULL,
  `u_email` varchar(70) NOT NULL,
  `u_password` varchar(70) NOT NULL,
  `remem` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_email`, `u_password`, `remem`) VALUES
(1, 'wael', 'wael.walid91@gmail.com', '8b512482f1df07787c7deaaf7f3e4e93', '7c69c620a72d5ba602b3d3aba1fa62be');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_token` (`cat_token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
