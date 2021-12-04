-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 10:35 AM
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
  `category_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(40) NOT NULL,
  `tags` varchar(40) NOT NULL,
  `body` text NOT NULL,
  `created_at` varchar(20) DEFAULT NULL,
  `deleted_at` varchar(20) DEFAULT NULL,
  `updated_at` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `title`, `tags`, `body`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 1, 'my article', 'abc,mdfamasdfm,asdf,assaf,asdf,,asf', '<p>suscipit, velit ipsa omnis nulla sed praesentium pariatur ipsam enim eveniet. Accusantium quas tempora quo! Odit reiciendis, nostrum consequuntur d ducimus provident vitae facere omnis voluptatum vero fuga natus in expedita! Aliquid aperiam iusto sint labore repellendus officiis consequatur, quos, debitis officia architecto temporibus, sunt commodi saepe culpa illum distinctio incidunt impedit voluptas? Quibusdam, quos. Odio consectetur laborum dolorum illo inventore molestias suscipit natus error tempora praesentium voluptatem hic quis deleniti officiis pariatur exercitationem, perspiciatis voluptate quaerat iure perferendis odit minus harum nulla. Cum laboriosam perspiciatis omnis cupiditate impedit corporis id velit odit quod, dolor molestiae similique soluta sed voluptates, in at hic distinctio sapiente totam, maiores dolore placeat! Alias, consequatur. Consectetur culpa quaerat laborum repellendus quas dolores porro dolor, deserunt officiis ipsum sequi veritatis, inventore facere ducimus facilis, necessitatibus minus ad autem odio beatae possimus nulla laboriosam. Rerum eum unde error quae illo facilis quaerat, consequuntur temporibus quod tenetur dolore amet, repudiandae quia enim, nisi voluptate aut minus. Debitis, laudantium voluptatem culpa animi illo accusamus deleniti tempore eos rerum facilis rem!</p>', '23/11/2021', NULL, '30/11/2021'),
(2, 2, 'my article2', 'asdf,asdf,asdf,,asdf,,asdf,,asdf,,asdf', 'asdkfjasdlfjalsdjflasjdlfjasldfjlkajflkasjflasjflasjfljaslkfjlkajflkasjdfjaslkfjaslkfjasjflksdjflkasjflksajfasdjflasjlfjasdlkfjaslkfjaslkjflasjfjlkasdjflksjflkasjdflksjfljasjflkasdjflkasdjfasjflkasjdflksjflkjaslf', '23/11/2021', NULL, '25/11/2021'),
(3, 2, 'manish', '123456', '<p>aksjdhfksdfkkuhashdf</p>', '30-11-2021', NULL, '30-11-2021'),
(4, 1, 'sdfasdf', 'fksdf', '<p>asdfsdf</p>', '30-11-2021', '01/12/2021', '30-11-2021'),
(5, 2, 'dsfasdfsd', 'ldf', '<p>asdfsdfdsf</p>', '30-11-2021', NULL, '30-11-2021'),
(6, 1, 'kajshfhksdh', 'ksjdjhfhkjsdfh', '<p>sdkfjhkjsd</p>\r\n<p>adsfsdfasdfasdf</p>', '30-11-2021', '30/11/2021', '30-11-2021'),
(7, 5, 'mera ghar', 'ghar', '<p>asdfsdfsdfasdfasdf</p>', '01-12-2021', NULL, '01-12-2021'),
(8, 3, 'rahul bawalo', 'bawalo', '<p>asdfkjhsdfhkasdhfkaskfhsdf</p>', '01-12-2021', NULL, '01-12-2021'),
(9, 5, 'm bhi bawalo', 'bawalo', '<p>sdfjsdfjasdjfjldsfllaskdf</p>', '01-12-2021', NULL, '01-12-2021');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `category` varchar(50) NOT NULL,
  `image` varchar(40) NOT NULL,
  `created_at` varchar(25) DEFAULT NULL,
  `deleted_at` varchar(25) DEFAULT NULL,
  `updated_at` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `image`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 'Young Minds', '', '25/11/2021', NULL, '25/11/2021'),
(2, 'Humanities and Social Sciences', '', '25/11/2021', NULL, '25/11/2021'),
(3, 'Engineering', '', '25/11/2021', NULL, '25/11/2021'),
(4, 'Science', '', '25/11/2021', NULL, '25/11/2021'),
(5, 'Health', '', '25/11/2021', NULL, '25/11/2021');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(40) NOT NULL,
  `status` tinyint(5) UNSIGNED NOT NULL COMMENT '0 - pending\r\n1 - active\r\n2 - suspended\r\n',
  `created_at` varchar(25) DEFAULT NULL,
  `deleted_at` varchar(25) DEFAULT NULL,
  `updated_at` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `mobile`, `email`, `password`, `status`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, '9602065385', 'manish@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, '25/11/2021', NULL, '25/11/2021'),
(2, '6376893673', 'deepak@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, '25/11/2021', NULL, '25/11/2021'),
(3, '6376856954', 'rahul@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '25/11/2021', NULL, '25/11/2021'),
(4, '7124585652', 'ravi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '25/11/2021', NULL, '25/11/2021'),
(5, '5568445448', 'm', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL, NULL, NULL),
(7, '09602065385', 'mpatodiya13@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '01/12/2021', NULL, '01/12/2021');

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
  `deleted_at` varchar(12) DEFAULT NULL,
  `updated_at` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_profile`
--

INSERT INTO `users_profile` (`id`, `user_id`, `first_name`, `last_name`, `gender`, `dob`, `address`, `profile_photo`, `created_at`, `deleted_at`, `updated_at`) VALUES
(1, 1, 'Manish', 'Patodiya', 'Male', '2021-11-09', 'Bawari gate,nawalgarh', '21b0aed008dd365cc213326d1c1aebef.jpg', '25/11/2021', NULL, '25/11/2021'),
(2, 2, 'deepak', 'saini', '', '', '', '', '25/11/2021', NULL, '25/11/2021'),
(3, 3, 'rahul', 'singh', 'Male', '2021-11-02', 'adfadsf', '3bc1cc85e9fa93e609e7c85dfec94689.jpg', '25/11/2021', NULL, '25/11/2021'),
(4, 4, 'ravi', 'sharma', '', '', '', '', '25/11/2021', NULL, '25/11/2021'),
(6, 5, 'manish', 'patodiya', 'Male', '2021-11-10', 'asdf', '561eff11d0cef09780eee1fe1f6be760.jpg', NULL, NULL, '30/11/2021'),
(8, 7, 'Manish', 'Patodiya', '', '', '', '', '01/12/2021', NULL, '01/12/2021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_category_id` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `users_profile`
--
ALTER TABLE `users_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_profile`
--
ALTER TABLE `users_profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `users_profile`
--
ALTER TABLE `users_profile`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
