-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-06-12 21:03:42
-- 伺服器版本： 10.4.24-MariaDB
-- PHP 版本： 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `mfee26-d-php`
--

-- --------------------------------------------------------

--
-- 資料表結構 `place_order`
--

CREATE TABLE `place_order` (
  `sid` int(11) NOT NULL,
  `member_sid` varchar(225) CHARACTER SET utf8mb4 NOT NULL,
  `place_sid` int(225) NOT NULL,
  `date_price` int(11) NOT NULL,
  `place_price` int(11) NOT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `place_order`
--

INSERT INTO `place_order` (`sid`, `member_sid`, `place_sid`, `date_price`, `place_price`, `created_date`) VALUES
(8, '11', 6, 50, 150, '2022-06-09'),
(10, '31', 2, 50, 150, '2022-06-09'),
(12, '15', 4, 50, 150, '2022-06-09'),
(15, '20', 5, 50, 150, '2022-06-09'),
(19, '1', 66, 50, 150, '2022-06-10'),
(29, '12', 4, 50, 150, '2022-06-12');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `place_order`
--
ALTER TABLE `place_order`
  ADD PRIMARY KEY (`sid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `place_order`
--
ALTER TABLE `place_order`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
