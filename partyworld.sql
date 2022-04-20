-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2022 at 05:46 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `partyworld`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `varient_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `catogery`
--

CREATE TABLE `catogery` (
  `id` int(11) NOT NULL,
  `catogery` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catogery`
--

INSERT INTO `catogery` (`id`, `catogery`) VALUES
(2, 'Balloons'),
(3, 'Assossries'),
(4, 'Sashes'),
(5, 'Gift'),
(6, 'Foil Balloons'),
(7, 'Spray'),
(8, 'Cake toppers'),
(9, 'Cup Cake toppers '),
(10, 'Bride To Be '),
(11, 'Baby shower '),
(12, 'Candles '),
(13, 'Anniversary '),
(14, 'cake items');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `color` varchar(100) NOT NULL,
  `hex` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color`, `hex`) VALUES
(1, 'testclr', '#00ff33'),
(2, '#FF0000', '#000000'),
(3, 'Red', '#ff0000'),
(4, 'Blue', '#0400ff'),
(5, 'Brown', '#5c0000'),
(6, 'Chrome green dark', '#82ad82'),
(7, 'Rose gold', '#c98a75'),
(8, 'Chrome purple', '#7a389c'),
(9, 'Silver', '#c9c9c9'),
(10, 'Yellow', '#ffff00'),
(11, 'Gold', '#ebeb8f'),
(12, 'pink', '#ffb5d8');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `catogery` int(11) DEFAULT NULL,
  `scale` int(11) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1 => Active, 0=>Inactive',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `name`, `price`, `description`, `image`, `catogery`, `scale`, `tags`, `status`, `created`, `updated`) VALUES
(2, 'test124', 'test124', 520, 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, to', 'product_test124.jpg', 5, 2, 'shoe,new,sale', 1, '2021-10-26 03:05:03', '2021-10-26 03:05:03'),
(4, 'wer', 'wer', 520, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the ', 'product_wer.jpg', 3, 0, 'new,bag', 1, '2021-10-27 04:07:13', '2021-10-27 04:07:58'),
(5, 'dessf', 'fsfsfs', 0, 'sfsfsf', 'product_dessf.jpg', NULL, NULL, NULL, 1, '2021-12-09 16:39:59', '2021-12-09 16:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `scales`
--

CREATE TABLE `scales` (
  `id` int(11) NOT NULL,
  `scale` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scales`
--

INSERT INTO `scales` (`id`, `scale`) VALUES
(1, 'testscale'),
(2, 'CM'),
(3, 'Inches'),
(4, 'ml'),
(5, 'Meter');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `size` varchar(100) NOT NULL,
  `scale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size`, `scale`) VALUES
(1, 'testsize1', 1),
(2, 'testsize2', 1),
(3, 'CM', 2),
(4, 'M', 1),
(5, 'mm', 2),
(6, 'M', 2),
(7, '18\"', 3),
(8, '32\"', 3),
(9, '12\"', 3),
(10, '250', 4),
(11, '40', 1),
(12, '16\"', 3),
(13, '5', 5),
(14, '12\"', 3),
(15, '9\"', 3),
(16, '5', 3),
(17, '5\"', 3),
(18, '10\"', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1 => Admin, 2=>Users',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '1 => Active, 2=>Inactive',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `level`, `status`, `created`, `updated`) VALUES
(1, 'admin', 'admin123', 1, 1, '2021-07-21 05:47:04', '2021-07-21 05:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `varients`
--

CREATE TABLE `varients` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color` int(11) DEFAULT NULL,
  `scale` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `varients`
--

INSERT INTO `varients` (`id`, `product_id`, `color`, `scale`, `size`, `price`, `image`) VALUES
(8, 4, 1, 0, 0, 520, 'var_8.jpg'),
(9, 4, 3, 0, 0, 530, 'var_9.jpg'),
(10, 4, 10, 0, 0, 530, 'var_10.jpg'),
(11, 2, 5, 2, 0, 1200, 'var_11.jpg'),
(12, 2, 8, 2, 3, 3500, 'var_12.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `catogery`
--
ALTER TABLE `catogery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_id` (`product_id`);

--
-- Indexes for table `scales`
--
ALTER TABLE `scales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `varients`
--
ALTER TABLE `varients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `catogery`
--
ALTER TABLE `catogery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `scales`
--
ALTER TABLE `scales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `varients`
--
ALTER TABLE `varients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
