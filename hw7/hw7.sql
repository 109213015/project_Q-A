-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-06-19 11:25:54
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `hw7`
--

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `sID` tinyint(3) UNSIGNED ZEROFILL NOT NULL,
  `sName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sSex` enum('女','男','其他') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '女',
  `sBirthday` date NOT NULL,
  `sMail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sPhone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sAddr` varchar(255) DEFAULT NULL,
  `sdrama` enum('電影','韓劇','動漫') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '電影',
  `sStyle` enum('愛情','奇幻','懸疑','驚悚','搞笑') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '愛情',
  `sAcc` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sPass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`sID`, `sName`, `sSex`, `sBirthday`, `sMail`, `sPhone`, `sAddr`, `sdrama`, `sStyle`, `sAcc`, `sPass`) VALUES
(024, '白易辰', '男', '1988-02-05', 'sssss@gmail.com', '09xxxxxxxx', '台北市', '韓劇', '愛情', 's2521', '$2y$10$jt91FoYVSwlsKGXcyx11ueLPPZxXu/Q4E1710KkMX03wB5VXbbJmG'),
(025, '始祖鳥', '男', '1995-01-01', 'aaaaaa', '0912345678', '台北市', '電影', '驚悚', 's123456', '$2y$10$GriY0Kiac.FX3sE9SIC4LuSa1MGTZ2B1SlHplsYAYDGhfPy4uzE.6'),
(026, '羅希度', '女', '1996-01-01', 'qqqqqq@', '09xxxxxxxx', '南投縣', '動漫', '搞笑', 'slove2521', '$2y$10$.PJeqSbWdMyfsBblnlUnwemFRv4SMY2L4EXtFo2viRmY5KgLYB50y'),
(027, '白易辰', '男', '1990-02-05', 'ddddddddd', '09xxxxxxxx', '嘉義市', '韓劇', '愛情', 'a2521', '$2y$10$z7TmukEQrk6Nr8AmTPmHQOTNQ2g6mGRcfi14IfbiEr27HMHA4UBpO'),
(028, '安妮亞', '女', '2022-04-30', 'anya@gmail.com', '0988888888', '東京', '動漫', '搞笑', 'anyasocute', '$2y$10$/6B43vKZa4FpMfCUkmXFTuDsq79F9afizpGg4PjuzybhOwmI05oMa'),
(029, '黃昏', '男', '1990-02-05', 'loyid@gmail.com', '0988888888', '東京', '電影', '驚悚', 'sloyid123', '$2y$10$4Vj5W7PScNoit.FL0pKgMu19wUxe1AMdfSmcYHtTAy.lgC58FriYG'),
(030, '約兒', '女', '1992-02-05', 'your@gmail.com', '09xxxxxxxx', '東京', '電影', '驚悚', 'syour123', '$2y$10$2uIntMCHf2OT/JqkZmxQq.VP.haQSl5DEUd3uSNiX8.Fq9SbKXe7m');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`sID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `sID` tinyint(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
