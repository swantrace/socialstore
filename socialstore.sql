-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-07-14 10:20:05
-- 服务器版本： 5.6.20
-- PHP Version: 5.5.15

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
-- 表的结构 `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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

CREATE TABLE IF NOT EXISTS `products` (
`id` int(11) NOT NULL,
  `sku` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `paypal` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- 转存表中的数据 `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `img`, `price`, `paypal`, `description`, `category_id`) VALUES
(1, 101, 'Logo Shirt, Red', 'img/shirts/shirt-101.jpg', '18.00', '9P7DLECFD4LKE', '', 0),
(2, 102, 'Mike the Frog Shirt, Black', 'img/shirts/shirt-102.jpg', '20.00', 'SXKPTHN2EES3J', '', 0),
(3, 103, 'Mike the Frog Shirt, Blue', 'img/shirts/shirt-103.jpg', '20.00', '7T8LK5WXT5Q9J', '', 0),
(4, 104, 'Logo Shirt, Green', 'img/shirts/shirt-104.jpg', '18.00', 'YKVL5F87E8PCS', '', 0),
(5, 105, 'Mike the Frog Shirt, Yellow', 'img/shirts/shirt-105.jpg', '25.00', '4CLP2SCVYM288', '', 0),
(6, 106, 'Logo Shirt, Gray', 'img/shirts/shirt-106.jpg', '20.00', 'TNAZ2RGYYJ396', '', 0),
(7, 107, 'Logo Shirt, Teal', 'img/shirts/shirt-107.jpg', '20.00', 'S5FMPJN6Y2C32', '', 0),
(8, 108, 'Mike the Frog Shirt, Orange', 'img/shirts/shirt-108.jpg', '25.00', 'JMFK7P7VEHS44', '', 0),
(9, 109, 'Get Coding Shirt, Gray', 'img/shirts/shirt-109.jpg', '20.00', 'B5DAJHWHDA4RC', '', 0),
(10, 110, 'HTML5 Shirt, Orange', 'img/shirts/shirt-110.jpg', '22.00', '6T2LVA8EDZR8L', '', 0),
(11, 111, 'CSS3 Shirt, Gray', 'img/shirts/shirt-111.jpg', '22.00', 'MA2WQGE2KCWDS', '', 0),
(12, 112, 'HTML5 Shirt, Blue', 'img/shirts/shirt-112.jpg', '22.00', 'FWR955VF5PALA', '', 0),
(13, 113, 'CSS3 Shirt, Black', 'img/shirts/shirt-113.jpg', '22.00', '4ELH2M2FW7272', '', 0),
(14, 114, 'PHP Shirt, Yellow', 'img/shirts/shirt-114.jpg', '24.00', 'AT3XQ3ZVP2DZG', '', 0),
(15, 115, 'PHP Shirt, Purple', 'img/shirts/shirt-115.jpg', '24.00', 'LYESEKV9JWE3A', '', 0),
(16, 116, 'PHP Shirt, Green', 'img/shirts/shirt-116.jpg', '24.00', 'KT7MRRJUXZR34', '', 0),
(17, 117, 'Get Coding Shirt, Red', 'img/shirts/shirt-117.jpg', '20.00', '5UXJG8PXRXFKE', '', 0),
(18, 118, 'Mike the Frog Shirt, Purple', 'img/shirts/shirt-118.jpg', '25.00', 'KHP8PYPDZZFTA', '', 0),
(19, 119, 'CSS3 Shirt, Purple', 'img/shirts/shirt-119.jpg', '22.00', 'BFJRFE24L93NW', '', 0),
(20, 120, 'HTML5 Shirt, Red', 'img/shirts/shirt-120.jpg', '22.00', 'RUVJSBR9FXXWQ', '', 0),
(21, 121, 'Get Coding Shirt, Blue', 'img/shirts/shirt-121.jpg', '20.00', 'PGN6ULGFZTXL4', '', 0),
(22, 122, 'PHP Shirt, Gray', 'img/shirts/shirt-122.jpg', '24.00', 'PYR4QH97W2TSJ', '', 0),
(23, 123, 'Mike the Frog Shirt, Green', 'img/shirts/shirt-123.jpg', '25.00', 'STDAUJJTSPT54', '', 0),
(24, 124, 'Logo Shirt, Yellow', 'img/shirts/shirt-124.jpg', '20.00', '2R2U74KWU5RXG', '', 0),
(25, 125, 'CSS3 Shirt, Blue', 'img/shirts/shirt-125.jpg', '22.00', 'GJG7F8EW3XFAS', '', 0),
(26, 126, 'Doctype Shirt, Green', 'img/shirts/shirt-126.jpg', '25.00', 'QW2LFRYGU7L4Q', '', 0),
(27, 127, 'Logo Shirt, Purple', 'img/shirts/shirt-127.jpg', '20.00', 'GFV6QVRMJU7F8', '', 0),
(28, 128, 'Doctype Shirt, Purple', 'img/shirts/shirt-128.jpg', '25.00', 'BARQMHMB565PN', '', 0),
(29, 129, 'Get Coding Shirt, Green', 'img/shirts/shirt-129.jpg', '20.00', 'DH9GXABU3P8GS', '', 0),
(30, 130, 'HTML5 Shirt, Teal', 'img/shirts/shirt-130.jpg', '22.00', '4LZ3EUVCBENE4', '', 0),
(31, 131, 'Logo Shirt, Orange', 'img/shirts/shirt-131.jpg', '20.00', '7BNDYJBKWD364', '', 0),
(32, 132, 'Mike the Frog Shirt, Red', 'img/shirts/shirt-132.jpg', '25.00', 'Y6EQRE445MYYW', '', 0);

-- --------------------------------------------------------

--
-- 表的结构 `tempusers`
--

CREATE TABLE IF NOT EXISTS `tempusers` (
`user_id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `activation` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

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

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `joined` datetime NOT NULL,
  `group_id` int(20) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=45 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `salt`, `joined`, `group_id`) VALUES
(1, 'sheldon', 'eitnan@fdjfke.com', 'e10adc3949ba59abbe56e057f20f883e', '', '0000-00-00 00:00:00', 0),
(42, 'qhong', 'frederickhong.5@gmail.com', '0673ecaed4d6a5cc8e6adc51f4dcb523afeb1c52a1f864a4f31ecea5e41289fd', 'bbÓ¾Y†å×Cm\n_böúéó„›¢£vœíç', '2015-06-12 21:18:27', 1),
(43, 'test2', 'frederickhong.5@gmail.com', '5dd02d766f1882f033a633e516b7ee63eddda05d865ef5101c0da343aed9e20a', '‚].[p!hs- F·µÙßÎ''…žfà¹åµ‡±F', '2015-06-12 21:29:17', 1),
(44, 'testtest', 'frederickhong.5@gmail.com', '9b74d30e1fa5c1c66008e09ea64af056193bb15c0bd6e5f957c2030c58e1a66f', 'iÂflŠë¿®…?¨ùÈu°åÖ›ö?{ÐÓã(Vã', '2015-06-12 22:14:06', 1);

-- --------------------------------------------------------

--
-- 表的结构 `users_session`
--

CREATE TABLE IF NOT EXISTS `users_session` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hash` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `users_session`
--

INSERT INTO `users_session` (`id`, `user_id`, `hash`) VALUES
(2, 16, 'ca3df3e5912a4f9ab9f7b10478759e7e58c050949c00e8068a');

--
-- Indexes for dumped tables
--

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
