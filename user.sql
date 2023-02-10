-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 10, 2023 at 07:43 PM
-- Server version: 8.0.32-0ubuntu0.20.04.2
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `form`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'sdfsdf', 'sdfsdf', '2023-02-08 11:37:01', '2023-02-10 18:02:44'),
(2, 'bandhan', 'sdfsf', '2023-02-10 18:19:26', '2023-02-10 18:19:26'),
(3, 'bandhan', 'sdfsf', '2023-02-10 18:23:43', '2023-02-10 18:23:43'),
(4, 'ramy', 'singh', '2023-02-10 18:23:57', '2023-02-10 18:23:57'),
(5, 'pankaj', 'singh', '2023-02-10 18:26:35', '2023-02-10 18:26:35'),
(6, 'pankaj', 'singh', '2023-02-10 18:27:25', '2023-02-10 18:27:25'),
(7, 'bandhan', 'sdfsf', '2023-02-10 18:38:11', '2023-02-10 18:38:11'),
(8, 'sfsdfs', 'sdfsf', '2023-02-10 18:40:11', '2023-02-10 18:40:11'),
(9, 'sfsdfs', 'sdfsf', '2023-02-10 18:40:24', '2023-02-10 18:40:24'),
(10, 'sfsdfs', 'sdfsf', '2023-02-10 18:40:28', '2023-02-10 18:40:28'),
(11, 'sfsdfs', 'sdfsf', '2023-02-10 18:42:16', '2023-02-10 18:42:16'),
(12, 'sfsdfs', 'sdfsf', '2023-02-10 18:42:56', '2023-02-10 18:42:56'),
(13, 'bandhan singh', 'singh', '2023-02-10 18:43:04', '2023-02-10 18:43:04'),
(14, 'bandhan singh', 'singh', '2023-02-10 18:43:33', '2023-02-10 18:43:33'),
(15, 'bandhan singh', 'singh', '2023-02-10 18:44:10', '2023-02-10 18:44:10'),
(16, 'bandhan singh', 'singh', '2023-02-10 18:44:16', '2023-02-10 18:44:16'),
(17, 'bandhan singh', 'singh', '2023-02-10 18:44:43', '2023-02-10 18:44:43'),
(18, 'bandhan', 'sdfsf', '2023-02-10 18:44:48', '2023-02-10 18:44:48'),
(19, 'bandhan', 'sdfsf', '2023-02-10 18:47:26', '2023-02-10 18:47:26'),
(20, 'bandhan', 'sdfsf', '2023-02-10 18:48:14', '2023-02-10 18:48:14'),
(21, 'bandhan', 'sdfsf', '2023-02-10 18:48:35', '2023-02-10 18:48:35'),
(22, 'bandhan', 'singh', '2023-02-10 18:48:40', '2023-02-10 18:48:40'),
(23, 'bandhan', 'singh', '2023-02-10 18:49:00', '2023-02-10 18:49:00'),
(24, 'bandhan', 'singh', '2023-02-10 18:49:24', '2023-02-10 18:49:24'),
(25, 'bandhan singh', 'singh', '2023-02-10 18:55:31', '2023-02-10 18:55:31'),
(26, 'bandhan singh', 'singh', '2023-02-10 18:56:00', '2023-02-10 18:56:00'),
(27, 'bandhan singh', 'singh', '2023-02-10 18:57:32', '2023-02-10 18:57:32'),
(28, 'bandhan singh', 'singh', '2023-02-10 18:57:36', '2023-02-10 18:57:36'),
(29, 'fsdfsf', 'fsdfs', '2023-02-10 18:57:41', '2023-02-10 18:57:41'),
(30, 'fsdfsf', 'fsdfs', '2023-02-10 18:57:49', '2023-02-10 18:57:49'),
(31, 'bandhan', 'singh', '2023-02-10 18:58:09', '2023-02-10 18:58:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
