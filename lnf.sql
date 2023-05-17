-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 07:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lnf`
--

-- --------------------------------------------------------

--
-- Table structure for table `found_items`
--

CREATE TABLE `found_items` (
  `id` int(100) UNSIGNED NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `category` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `location` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `found_items`
--

INSERT INTO `found_items` (`id`, `username`, `title`, `description`, `image_name`, `category`, `location`, `date`) VALUES
(4, 'mrittika', 'bag', 'Found at Canteen', 'Item-Name-4070.jpg', 'abstract', 'canteen', '2023-04-11'),
(5, 'David', 'Watch', 'Lost at Study Hall', 'Item-Name-8272.jpg', 'abstract', 'studyhall', '2023-04-16'),
(6, 'mrittika', 'watch', 'Found at Canteen', 'Item-Name-464.jpg', 'abstract', 'canteen', '2023-04-16'),
(7, 'mrittika', 'watch', 'found at canteen', 'Item-Name-2229.jpg', 'abstract', 'canteen', '2023-04-17'),
(14, 'mrittika', 'watch', 'found at canteen', 'Item-Name-7844.jpg', 'abstract', 'canteen', '2023-04-17'),
(15, 'mrittika', 'Bag', 'Found at StudyHall', 'Item-Name-68.jfif', 'abstract', 'studyhall', '2023-04-17'),
(16, 'harvard', 'dd', 'dd', 'Item-Name-5623.jfif', 'abstract', 'canteen', '2023-04-26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(4, 'administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(5, 'mrittika', 'mrittika', '192068cfdf44111f97f34d6523133aec');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'mrittikasengupta', 'mrittika@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
(2, 'user', 'user@gmail.com', '25f9e794323b453885f5181f1b624d0b'),
(3, 'sengupta', 'mrittikasengupta3@gmail.com', '099ebea48ea9666a7da2177267983138'),
(4, 'David', 'david@gmail.com', '7de3522a8f56f78416a49e059c49b8cb'),
(5, 'kk', 'kk@gmail.com', '283f42764da6dba2522412916b031080'),
(6, 'harvard', 'harvad@gmail.com', '60da6bdd625e46b4ffa9b6ec1a2193e8'),
(7, 's', 's@gmail.com', '8f60c8102d29fcd525162d02eed4566b'),
(8, 'Mrittika12', 'mrittika1@gmail.com', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `found_items`
--
ALTER TABLE `found_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
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
-- AUTO_INCREMENT for table `found_items`
--
ALTER TABLE `found_items`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
