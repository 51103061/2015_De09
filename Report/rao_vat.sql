-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2015 at 05:17 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rao_vat`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`cat_id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `position` tinyint(4) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `user_id`, `cat_name`, `position`) VALUES
(19, 8, 'asdhfkjasdf', 2),
(20, 8, 'nha cua', 3);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`comment_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `author` varchar(60) COLLATE utf32_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf32_unicode_ci NOT NULL,
  `comment` text COLLATE utf32_unicode_ci NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `page_id`, `author`, `email`, `comment`, `comment_date`) VALUES
(9, 15, 'chinh', 'baochinh0392@gmail.com', 'ban nhiu ban oi\r\n', '2015-05-21 14:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
`page_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `page_name` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `position` tinyint(4) NOT NULL,
  `post_on` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `user_id`, `cat_id`, `page_name`, `content`, `position`, `post_on`) VALUES
(17, 8, 18, 'Can ban gap laptop asus', 'can ban gap 1 may asus', 2, '2015-05-21 15:32:31'),
(15, 8, 18, 'Can ban gap laptop dell', 'may tinh moi mua chua xai', 1, '2015-05-21 11:33:52'),
(16, 8, 19, 'can ban 1 oto toyota', 'oto xai ki', 1, '2015-05-21 11:38:31'),
(14, 8, 18, 'Can ban gap laptop asus', 'may tinh con tot moi mua', 1, '2015-05-21 11:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `page_views`
--

CREATE TABLE IF NOT EXISTS `page_views` (
`view_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `num_views` int(11) NOT NULL,
  `user_ip` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_views`
--

INSERT INTO `page_views` (`view_id`, `page_id`, `num_views`, `user_ip`) VALUES
(1, 15, 14, 0),
(2, 14, 9, 0),
(3, 17, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `first_name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `yahoo` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `avatar` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_level` tinyint(4) NOT NULL,
  `active` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registration_date` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `pass`, `website`, `yahoo`, `bio`, `avatar`, `user_level`, `active`, `registration_date`) VALUES
(8, 'Nguyen Van Bao', 'Chinh', 'baochinh0392@gmail.com', 'e1e3dbef72fc4b321bdfae7e55d0d07159c7d5e9', NULL, NULL, NULL, NULL, 3, NULL, '2015-05-21 11:18:29'),
(9, 'Nguyen Van Bao', 'Chinh', 'baochinh0111@gmail.com', 'ad6ef4b71e7839b467053d1604cadfba3f3ca6c4', NULL, NULL, NULL, NULL, 0, NULL, '2015-05-21 11:20:30'),
(11, 'bao', 'chinh', 'baochinh000@gmail.com', 'ad6ef4b71e7839b467053d1604cadfba3f3ca6c4', NULL, NULL, NULL, NULL, 0, '45e1146a9ecd92564411f248331505e3', '2015-05-21 15:30:48'),
(10, 'Nguyen Van Bao', 'Chinh', 'baochinh01@gmail.com', 'ad6ef4b71e7839b467053d1604cadfba3f3ca6c4', NULL, NULL, NULL, NULL, 0, 'c1752ad558cd455fa196b5fd0a6536a8', '2015-05-21 11:23:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`comment_id`), ADD KEY `page_id` (`page_id`,`comment_date`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
 ADD PRIMARY KEY (`page_id`), ADD KEY `user_id` (`user_id`,`cat_id`,`post_on`);

--
-- Indexes for table `page_views`
--
ALTER TABLE `page_views`
 ADD PRIMARY KEY (`view_id`), ADD KEY `page_id` (`page_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `email` (`email`), ADD KEY `first_name` (`first_name`,`last_name`,`pass`,`registration_date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `page_views`
--
ALTER TABLE `page_views`
MODIFY `view_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
