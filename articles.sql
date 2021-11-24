-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 05:06 AM
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

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL,
  `tags` varchar(40) NOT NULL,
  `body` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `title`, `tags`, `body`) VALUES
(1, 1, 'my article', 'abc,mdfamasdfm,asdf,assaf,asdf,,asf', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus, deleniti architecto iusto aliquid quam possimus dolore voluptate! Ad ab consectetur tempore at quasi tempora corporis debitis temporibus labore rerum, repellat, nihil natus dolorem, duc'),
(2, 2, 'my article2', 'asdf,asdf,asdf,,asdf,,asdf,,asdf,,asdf', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Temporibus, deleniti architecto iusto aliquid quam possimus dolore voluptate! Ad ab consectetur tempore at quasi tempora corporis debitis temporibus labore rerum, repellat, nihil natus dolorem, duc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
