-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jun 02, 2022 at 12:00 PM
-- Server version: 8.0.29
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `favorite_shows_list`
--

-- --------------------------------------------------------

--
-- Table structure for table `shows_list`
--

CREATE TABLE `shows_list` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `channel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `shows_list`
--

INSERT INTO `shows_list` (`id`, `name`, `channel`) VALUES
(1, 'TV show', 'BBC'),
(2, 'TV show', 'BBC'),
(3, 'TV show', 'BBC'),
(4, 'TV show', 'BBC'),
(5, 'TV show', 'BBC'),
(6, 'TV show', 'BBC'),
(7, 'TV show', 'BBC'),
(8, 'TV show', 'BBC'),
(9, 'TV show', 'BBC'),
(10, 'TV show', 'BBC'),
(11, 'TV show', 'BBC'),
(12, 'TV show', 'BBC'),
(13, 'TV show', 'BBC'),
(14, 'TV show', 'BBC'),
(15, 'TV show', 'BBC'),
(16, 'TV show', 'BBC'),
(17, 'TV show', 'BBC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shows_list`
--
ALTER TABLE `shows_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shows_list`
--
ALTER TABLE `shows_list`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
