-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2023-05-24 12:10:17
-- 服务器版本： 10.4.28-MariaDB
-- PHP 版本： 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `user`
--

-- --------------------------------------------------------

--
-- 表的结构 `bank`
--

CREATE TABLE `bank` (
  `id` int(4) NOT NULL,
  `number` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `bank`
--

INSERT INTO `bank` (`id`, `number`, `password`, `balance`) VALUES
(1, 1, 1, 8995348),
(2, 2, 2, 20);

-- --------------------------------------------------------

--
-- 表的结构 `logs`
--

CREATE TABLE `logs` (
  `id` int(6) NOT NULL,
  `username` text NOT NULL,
  `ip` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `logs`
--

INSERT INTO `logs` (`id`, `username`, `ip`, `date`) VALUES
(12, 'Joe', '::1', '2023-05-09 01:34:45 pm'),
(13, 'Joe', '::1', '2023-05-09 01:52:20 pm'),
(14, 'Joe', '::1', '2023-05-11 02:01:22 pm'),
(15, 'Joe', '::1', '2023-05-11 02:18:42 pm');

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE `product` (
  `id` int(4) NOT NULL,
  `name` varchar(10) NOT NULL,
  `code` varchar(10) NOT NULL,
  `image` text NOT NULL,
  `price` int(11) NOT NULL,
  `inventory` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`id`, `name`, `code`, `image`, `price`, `inventory`) VALUES
(1, 'MI 11 LITE', 'p1mi11', 'image/mi11.png', 339, 98),
(2, 'iPhone 12', 'p2ip12', 'image/iphone12.jpg', 925, 2),
(3, 'OPPO A94', 'p3opp4', 'image/oppoa94.jpg', 369, 96),
(8, 'Camera', 'p4cam', 'image/Sony.png', 400, 22);

-- --------------------------------------------------------

--
-- 表的结构 `temp`
--

CREATE TABLE `temp` (
  `id` int(6) NOT NULL,
  `phone` text NOT NULL,
  `code` varchar(6) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `customer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `temp`
--

INSERT INTO `temp` (`id`, `phone`, `code`, `quantity`, `price`, `customer`) VALUES
(283, 'iPhone 12', 'p2ip12', 1, 925, 'Joe');

-- --------------------------------------------------------

--
-- 表的结构 `transaction`
--

CREATE TABLE `transaction` (
  `id` int(6) NOT NULL,
  `phone` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `customer` text NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `transaction`
--

INSERT INTO `transaction` (`id`, `phone`, `quantity`, `price`, `customer`, `time`) VALUES
(45, 'iPhone 12', 2, 925, 'Joe', '2023-05-09 01:38 pm'),
(46, 'OPPO A94', 1, 369, 'Joe', '2023-05-09 01:40 pm'),
(47, 'iPhone 12', 1, 925, 'Joe', '2023-05-11 02:02 pm'),
(48, 'OPPO A94', 1, 369, 'Joe', '2023-05-11 02:02 pm'),
(49, 'Camera', 1, 400, 'Joe', '2023-05-11 02:02 pm'),
(50, 'MI 11 LITE', 1, 339, 'Joe', '2023-05-11 02:19 pm'),
(51, 'iPhone 12', 1, 925, 'Joe', '2023-05-11 02:19 pm');

-- --------------------------------------------------------

--
-- 表的结构 `usertext`
--

CREATE TABLE `usertext` (
  `id` int(6) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `gender` text NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `usertext`
--

INSERT INTO `usertext` (`id`, `username`, `password`, `gender`, `email`, `phone`, `address`) VALUES
(1, 'Joe', '1', 'man', '1129651@wku.edu.cn', '10086', 'street 123');

--
-- 转储表的索引
--

--
-- 表的索引 `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `usertext`
--
ALTER TABLE `usertext`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用表AUTO_INCREMENT `product`
--
ALTER TABLE `product`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用表AUTO_INCREMENT `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=284;

--
-- 使用表AUTO_INCREMENT `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- 使用表AUTO_INCREMENT `usertext`
--
ALTER TABLE `usertext`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
