-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 11, 2019 at 02:13 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myfirst`
--

-- --------------------------------------------------------

--
-- Table structure for table `forImg`
--

CREATE TABLE `forImg` (
  `id_img` int(100) NOT NULL,
  `name_img` varchar(255) NOT NULL,
  `dir_img` varchar(255) NOT NULL,
  `Num_watched` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forImg`
--

INSERT INTO `forImg` (`id_img`, `name_img`, `dir_img`, `Num_watched`) VALUES
(1, 'picture1', 'picture1.jpg', 12),
(2, 'picture2', 'picture2.jpg', 13),
(3, 'picture3', 'picture3.jpg', 1),
(4, 'picture4', 'picture4.jpg', 1),
(5, 'picture5', 'picture5.jpg', 1),
(6, 'picture6', 'picture6.jpg', 1),
(7, 'picture7', 'picture7.jpg', 2),
(8, 'picture8', 'picture8.jpg', 0),
(9, 'picture9', 'picture9.jpg', 0),
(10, 'picture10', 'picture10.jpg', 2),
(11, 'picture11', 'picture11.jpg', 6),
(12, 'picture12', 'picture12.jpg', 0),
(13, 'picture13', 'picture13.jpg', 0),
(14, 'picture14', 'picture14.jpg', 0),
(15, 'picture15', 'picture15.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forImg`
--
ALTER TABLE `forImg`
  ADD PRIMARY KEY (`id_img`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forImg`
--
ALTER TABLE `forImg`
  MODIFY `id_img` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
