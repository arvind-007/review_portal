-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 10:22 AM
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

DROP TABLE IF EXISTS `articles`;
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
(4, 1, 'sdfasdf', 'fksdf', '<p>asdfsdf</p>', '30-11-2021', NULL, '30-11-2021'),
(5, 2, 'dsfasdfsd', 'ldf', '<p>asdfsdfdsf</p>', '30-11-2021', NULL, '30-11-2021'),
(6, 1, 'kajshfhksdh', 'ksjdjhfhkjsdfh', '<p>sdkfjhkjsd</p>\r\n<p>adsfsdfasdfasdf</p>', '30-11-2021', '30/11/2021', '30-11-2021'),
(7, 5, 'mera ghar', 'ghar', '<p>asdfsdfsdfasdfasdf</p>', '01-12-2021', NULL, '01-12-2021'),
(8, 3, 'rahul bawalo', 'bawalo', '<p>asdfkjhsdfhkasdhfkaskfhsdf</p>', '01-12-2021', NULL, '01-12-2021'),
(9, 5, 'm bhi bawalo', 'bawalo', '<p>sdfjsdfjasdjfjldsfllaskdf</p>', '01-12-2021', NULL, '01-12-2021');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
