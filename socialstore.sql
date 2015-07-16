-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-07-16 07:20:49
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
