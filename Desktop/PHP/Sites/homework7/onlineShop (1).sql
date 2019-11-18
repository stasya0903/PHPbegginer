-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2019 at 03:42 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineShop`
--

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `id_product` int(255) NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `img_dir` varchar(255) NOT NULL,
  `description_short` varchar(255) NOT NULL,
  `price_product` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id_product`, `name_product`, `img_dir`, `description_short`, `price_product`) VALUES
(1, 'blue shoes', 'image1', 'blablablablablablablablablablabbalab', '500$'),
(2, 'leopard shoes', 'image2', 'blablablablablablablablablablabbalab', '500$'),
(3, 'man brown shoes', 'image3', 'blablablablablablablablablablabbalab', '500$'),
(4, 'snikers nike', 'image3', 'blablablablablablablablablablabbalab', '500$'),
(5, 'crazy shoes', 'image4', 'blablablablablablablablablablabbalab', '500$'),
(6, 'black sandales', 'image6', 'blablablablablablablablablablabbalab', '500$'),
(7, 'black high heals shoes', 'image7', 'blablablablablablablablablablabbalab', '500$'),
(8, 'red shoes', 'image8', 'blablablablablablablablablablabbalab', '500$'),
(9, 'black closed shoes', 'image9', 'blablablablablablablablablablabbalab', '500$');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`) VALUES
(15, 'Петр', 'петруха', '$2y$10$W7KQtHlaNlWp3qi9UoCe5.5TvfZAlu35wxxgqWKD.wqnAEDrtBsY2'),
(16, 'Anastasia Naymushina', 'stasya0903', '$2y$10$CNFXY9nhAvEDMJcD31mbouFmFLjtow4TBy.tUAdPtcpDPq2A9Acwq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id_product` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
