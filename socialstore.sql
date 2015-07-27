-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-07-23 07:08:02
-- 服务器版本： 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `socialstore`
--

-- --------------------------------------------------------

--
-- 表的结构 `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) NOT NULL,
  `category` varchar(90) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- 插入之前先把表清空（truncate） `categories`
--

TRUNCATE TABLE `categories`;
--
-- 转存表中的数据 `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(2, 'Antiques'),
(3, 'Art'),
(4, 'Antiques'),
(5, 'Art'),
(6, 'Automotive'),
(7, 'Baby'),
(8, 'Books'),
(9, 'Business & Industrial'),
(10, 'Cameras & Photo'),
(11, 'Clothing & Accessories'),
(12, 'Computers'),
(13, 'Crafts'),
(14, 'DVD''s & Movies'),
(15, 'Electronics'),
(16, 'Health & Beauty'),
(17, 'Home & Garden'),
(18, 'Jewelry & Watches'),
(19, 'Pet Supplies'),
(20, 'Services'),
(21, 'Sports & Outdoors'),
(22, 'Tools & Home Improvement'),
(23, 'Toys & Hobbies'),
(24, 'Video Games'),
(25, 'Other');

-- --------------------------------------------------------

--
-- 表的结构 `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- 插入之前先把表清空（truncate） `groups`
--

TRUNCATE TABLE `groups`;
--
-- 转存表中的数据 `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'Stand user', ''),
(3, 'Administrator', '{"admin":1}');

-- --------------------------------------------------------

--
-- 表的结构 `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `sku` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `paypal` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 插入之前先把表清空（truncate） `products`
--

TRUNCATE TABLE `products`;
--
-- 转存表中的数据 `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `img`, `price`, `paypal`, `description`, `category_id`) VALUES
(1, 101, 'Logo Shirt, Red', 'img/products/1.jpg', '18.00', NULL, '', 0),
(2, 102, 'Mike the Frog Shirt, Black', 'img/products/1.jpg', '20.00', NULL, '', 0),
(3, 103, 'Mike the Frog Shirt, Blue', 'img/products/2.jpg', '20.00', NULL, '', 0),
(4, 104, 'Logo Shirt, Green', 'img/products/2.jpg', '18.00', NULL, '', 0),
(5, 105, 'Mike the Frog Shirt, Yellow', 'img/products/3.jpg', '25.00', NULL, '', 0),
(6, 106, 'Logo Shirt, Gray', 'img/products/3.jpg', '20.00', NULL, '', 0),
(7, 107, 'Logo Shirt, Teal', 'img/products/4.jpg', '20.00', NULL, '', 0),
(8, 108, 'Mike the Frog Shirt, Orange', 'img/products/4.jpg', '25.00', NULL, '', 0),
(9, 109, 'Get Coding Shirt, Gray', 'img/products/5.jpg', '20.00', NULL, '', 0),
(10, 110, 'HTML5 Shirt, Orange', 'img/products/5.jpg', '22.00', NULL, '', 0),
(11, 111, 'CSS3 Shirt, Gray', 'img/products/6.jpg', '22.00', NULL, '', 0),
(12, 112, 'HTML5 Shirt, Blue', 'img/products/6.jpg', '22.00', NULL, '', 0),
(13, 113, 'CSS3 Shirt, Black', 'img/products/7.jpg', '22.00', NULL, '', 0),
(14, 114, 'PHP Shirt, Yellow', 'img/products/7.jpg', '24.00', NULL, '', 0),
(15, 115, 'PHP Shirt, Purple', 'img/products/8.jpg', '24.00', NULL, '', 0),
(16, 116, 'PHP Shirt, Green', 'img/products/8.jpg', '24.00', NULL, '', 0),
(17, 117, 'Get Coding Shirt, Red', 'img/products/9.jpg', '20.00', NULL, '', 0),
(18, 118, 'Mike the Frog Shirt, Purple', 'img/products/9.jpg', '25.00', NULL, '', 0),
(19, 119, 'CSS3 Shirt, Purple', 'img/products/19.jpg', '22.00', NULL, '', 0),
(20, 120, 'HTML5 Shirt, Red', 'img/products/20.jpg', '22.00', NULL, '', 0),
(21, 121, 'Get Coding Shirt, Blue', 'img/products/21.jpg', '20.00', NULL, '', 0),
(22, 122, 'PHP Shirt, Gray', 'img/products/22.jpg', '24.00', NULL, '', 0),
(23, 123, 'Mike the Frog Shirt, Green', 'img/products/23.jpg', '25.00', NULL, '', 0),
(24, 124, 'Logo Shirt, Yellow', 'img/products/24.jpg', '20.00', NULL, '', 0),
(25, 125, 'CSS3 Shirt, Blue', 'img/products/25.jpg', '22.00', NULL, '', 0),
(26, 126, 'Doctype Shirt, Green', 'img/products/26.jpg', '25.00', NULL, '', 0),
(27, 127, 'Logo Shirt, Purple', 'img/products/27.jpg', '20.00', NULL, '', 0),
(28, 128, 'Doctype Shirt, Purple', 'img/products/28.jpg', '25.00', NULL, '', 0),
(29, 129, 'Get Coding Shirt, Green', 'img/products/29.jpg', '20.00', NULL, '', 0),
(30, 130, 'HTML5 Shirt, Teal', 'img/products/30.jpg', '22.00', NULL, '', 0),
(31, 131, 'Logo Shirt, Orange', 'img/products/31.jpg', '20.00', NULL, '', 0),
(32, 132, 'Mike the Frog Shirt, Red', 'img/products/32.jpg', '25.00', NULL, '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `products_categories`
--

DROP TABLE IF EXISTS `products_categories`;
CREATE TABLE IF NOT EXISTS `products_categories` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- 插入之前先把表清空（truncate） `products_categories`
--

TRUNCATE TABLE `products_categories`;
--
-- 转存表中的数据 `products_categories`
--

INSERT INTO `products_categories` (`id`, `product_id`, `category_id`) VALUES
(1, 1, 11),
(8, 2, 11),
(9, 3, 11),
(10, 4, 11),
(11, 5, 11),
(12, 6, 11),
(13, 7, 11);

-- --------------------------------------------------------

--
-- 表的结构 `products_sizes`
--

DROP TABLE IF EXISTS `products_sizes`;
CREATE TABLE IF NOT EXISTS `products_sizes` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 插入之前先把表清空（truncate） `products_sizes`
--

TRUNCATE TABLE `products_sizes`;
--
-- 转存表中的数据 `products_sizes`
--

INSERT INTO `products_sizes` (`id`, `product_id`, `size_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 1),
(6, 2, 2),
(7, 2, 3),
(8, 2, 4),
(9, 3, 1),
(10, 3, 2),
(11, 3, 3),
(12, 3, 4),
(13, 4, 1),
(14, 4, 2),
(15, 4, 3),
(16, 4, 4),
(17, 5, 1),
(18, 5, 2),
(19, 5, 3),
(20, 5, 4),
(21, 6, 1),
(22, 6, 2),
(23, 6, 3),
(24, 6, 4),
(25, 7, 1),
(26, 7, 2),
(27, 7, 3),
(28, 7, 4),
(29, 8, 1),
(30, 8, 2),
(31, 8, 3),
(32, 8, 4),
(33, 9, 1),
(34, 9, 2),
(35, 9, 3),
(36, 9, 4),
(37, 10, 1),
(38, 10, 2),
(39, 10, 3),
(40, 10, 4),
(41, 11, 1),
(42, 11, 2),
(43, 11, 3),
(44, 11, 4),
(45, 12, 1),
(46, 12, 2),
(47, 12, 3),
(48, 12, 4),
(49, 13, 1),
(50, 13, 2),
(51, 13, 3),
(52, 13, 4),
(53, 14, 1),
(54, 14, 2),
(55, 14, 3),
(56, 14, 4),
(57, 15, 1),
(58, 15, 2),
(59, 15, 3),
(60, 15, 4),
(61, 16, 1),
(62, 16, 2),
(63, 16, 3),
(64, 16, 4),
(65, 17, 1),
(66, 17, 2),
(67, 17, 3),
(68, 17, 4),
(69, 18, 1),
(70, 18, 2),
(71, 18, 3),
(72, 18, 4),
(73, 19, 1),
(74, 19, 2),
(75, 19, 3),
(76, 19, 4),
(77, 20, 1),
(78, 20, 2),
(79, 20, 3),
(80, 20, 4),
(81, 21, 1),
(82, 21, 2),
(83, 21, 3),
(84, 21, 4),
(85, 22, 1),
(86, 22, 2),
(87, 22, 3),
(88, 22, 4),
(89, 23, 1),
(90, 23, 2),
(91, 23, 3),
(92, 23, 4),
(93, 24, 1),
(94, 24, 2),
(95, 24, 3),
(96, 24, 4),
(97, 25, 1),
(98, 25, 2),
(99, 25, 3),
(100, 25, 4),
(101, 26, 1),
(102, 26, 2),
(103, 26, 3),
(104, 26, 4),
(105, 27, 1),
(106, 27, 2),
(107, 27, 3),
(108, 27, 4),
(109, 28, 1),
(110, 28, 2),
(111, 28, 3),
(112, 28, 4),
(113, 29, 1),
(114, 29, 2),
(115, 29, 3),
(116, 29, 4),
(117, 30, 1),
(118, 30, 2),
(119, 30, 3),
(120, 30, 4),
(121, 31, 1),
(122, 31, 2),
(123, 31, 3),
(124, 31, 4),
(125, 32, 1),
(126, 32, 2),
(127, 32, 3),
(128, 32, 4);

-- --------------------------------------------------------

--
-- 表的结构 `sizes`
--

DROP TABLE IF EXISTS `sizes`;
CREATE TABLE IF NOT EXISTS `sizes` (
  `id` int(11) NOT NULL,
  `size` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 插入之前先把表清空（truncate） `sizes`
--

TRUNCATE TABLE `sizes`;
--
-- 转存表中的数据 `sizes`
--

INSERT INTO `sizes` (`id`, `size`, `order`) VALUES
(1, 'Small', 10),
(2, 'Medium', 20),
(3, 'Large', 30),
(4, 'X-Large', 40);

-- --------------------------------------------------------

--
-- 表的结构 `tempusers`
--

DROP TABLE IF EXISTS `tempusers`;
CREATE TABLE IF NOT EXISTS `tempusers` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `activation` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 插入之前先把表清空（truncate） `tempusers`
--

TRUNCATE TABLE `tempusers`;
--
-- 转存表中的数据 `tempusers`
--

INSERT INTO `tempusers` (`user_id`, `username`, `email`, `password`, `activation`) VALUES
(1, 'qhong', 'frederickhong.5@gmail.com', '630608', 'd6151136a86ad7b865e94c85ef981bf7'),
(2, 'felkjfk', 'fejfke@fjekj.com', 'dfd', '0edebbca120ddcb83607e1ef2a4c7b0e');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `joined` datetime NOT NULL,
  `group_id` int(20) NOT NULL,
  `is_vendor` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 插入之前先把表清空（truncate） `users`
--

TRUNCATE TABLE `users`;
--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `salt`, `joined`, `group_id`, `is_vendor`) VALUES
(1, 'sheldon', 'eitnan@fdjfke.com', 'e10adc3949ba59abbe56e057f20f883e', '', '0000-00-00 00:00:00', 0, 0),
(42, 'qhong', 'frederickhong.5@gmail.com', '0673ecaed4d6a5cc8e6adc51f4dcb523afeb1c52a1f864a4f31ecea5e41289fd', 'bbÓ¾Y†å×Cm\n_böúéó„›¢£vœíç', '2015-06-12 21:18:27', 1, 0),
(43, 'test2', 'frederickhong.5@gmail.com', '5dd02d766f1882f033a633e516b7ee63eddda05d865ef5101c0da343aed9e20a', '‚].[p!hs- F·µÙßÎ''…žfà¹åµ‡±F', '2015-06-12 21:29:17', 1, 0),
(44, 'testtest', 'frederickhong.5@gmail.com', '9b74d30e1fa5c1c66008e09ea64af056193bb15c0bd6e5f957c2030c58e1a66f', 'iÂflŠë¿®…?¨ùÈu°åÖ›ö?{ÐÓã(Vã', '2015-06-12 22:14:06', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `users_session`
--

DROP TABLE IF EXISTS `users_session`;
CREATE TABLE IF NOT EXISTS `users_session` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- 插入之前先把表清空（truncate） `users_session`
--

TRUNCATE TABLE `users_session`;
--
-- 转存表中的数据 `users_session`
--

INSERT INTO `users_session` (`id`, `user_id`, `hash`) VALUES
(2, 16, 'ca3df3e5912a4f9ab9f7b10478759e7e58c050949c00e8068a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_sizes`
--
ALTER TABLE `products_sizes`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempusers`
--
ALTER TABLE `tempusers`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_session`
--
ALTER TABLE `users_session`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `products_sizes`
--
ALTER TABLE `products_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tempusers`
--
ALTER TABLE `tempusers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `users_session`
--
ALTER TABLE `users_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
