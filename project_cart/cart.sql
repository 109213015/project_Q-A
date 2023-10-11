-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-11-21 12:22:57
-- 伺服器版本： 10.4.25-MariaDB
-- PHP 版本： 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `cart`
--

-- --------------------------------------------------------

--
-- 資料表結構 `list1`
--

CREATE TABLE `list1` (
  `pId` int(11) NOT NULL,
  `pName` varchar(50) NOT NULL,
  `pNum` int(11) NOT NULL,
  `pPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `list1`
--

INSERT INTO `list1` (`pId`, `pName`, `pNum`, `pPrice`) VALUES
(5, 'cheese cakes', 1, 120);

-- --------------------------------------------------------

--
-- 資料表結構 `list2`
--

CREATE TABLE `list2` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `orders` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `list2`
--

INSERT INTO `list2` (`id`, `name`, `number`, `price`, `orders`) VALUES
(5, 'cheese cakes', 10, 120, 11),
(6, 'ice cream', 30, 90, 2),
(7, 'chocolate cake', 30, 110, 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `list2`
--
ALTER TABLE `list2`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `list2`
--
ALTER TABLE `list2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
