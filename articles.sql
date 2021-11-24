-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 05:12 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `articles`
--
CREATE DATABASE IF NOT EXISTS `articles` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `articles`;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `tags` varchar(40) NOT NULL,
  `body` varchar(255) NOT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `deleted_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `title`, `tags`, `body`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 1, 'my article', 'abc,mdfamasdfm,asdf,assaf,asdf,,asf', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus, deleniti architecto iusto aliquid quam possimus dolore voluptate! Ad ab consectetur tempore at quasi tempora corporis debitis temporibus labore rerum, repellat, nihil natus dolorem, duc', NULL, NULL, NULL),
(2, 2, 'my article2', 'asdf,asdf,asdf,,asdf,,asdf,,asdf,,asdf', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus, deleniti architecto iusto aliquid quam possimus dolore voluptate! Ad ab consectetur tempore at quasi tempora corporis debitis temporibus labore rerum, repellat, nihil natus dolorem, duc', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `category` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'test1'),
(2, 'test2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(40) NOT NULL,
  `created_at` varchar(25) DEFAULT NULL,
  `deleted_at` varchar(25) DEFAULT NULL,
  `updated_at` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `mobile`, `email`, `password`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'Patodiya', 'Manish', '123456', NULL, NULL, NULL),
(2, 'Patodiya', 'Manish', '123456', NULL, NULL, NULL),
(3, '9602065385', 'manish@gmail.co', '123456', NULL, NULL, NULL),
(4, '9602065385', 'manish@gmail.co', 'e10adc3949ba59abbe56', NULL, NULL, NULL),
(5, '', '', '', '23/11/2021', NULL, '23/11/2021'),
(6, '9602065383', 'manish@gmail.con', 'ed54ae97e472d89f0227cba22158731a', '23/11/2021', NULL, '23/11/2021');

-- --------------------------------------------------------

--
-- Table structure for table `users_profile`
--

CREATE TABLE `users_profile` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(12) NOT NULL,
  `address` varchar(40) NOT NULL,
  `profile_photo` varchar(40) NOT NULL,
  `created_at` varchar(12) DEFAULT NULL,
  `updated_at` varchar(12) DEFAULT NULL,
  `deleted_at` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_profile`
--

INSERT INTO `users_profile` (`id`, `user_id`, `first_name`, `last_name`, `gender`, `dob`, `address`, `profile_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Manish', 'Manish', '', '', '', '', NULL, NULL, NULL),
(2, 3, 'Manish', 'Patodiya', '', '', '', '', NULL, NULL, NULL),
(3, 5, 'Manish', 'Patodiya', '', '', '', '', NULL, NULL, NULL),
(4, 0, '', '', '', '', '', '', '23/11/2021', '23/11/2021', NULL),
(5, 6, 'Manish', 'Patodiyaaa', '', '2021-11-09', 'Bawari gate, nawalgarhaa\r\n', 'd02b867868c3872e637ffde1b1588c00.jpg', '23/11/2021', '23/11/2021', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_profile`
--
ALTER TABLE `users_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
