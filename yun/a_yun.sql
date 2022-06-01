-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2022 年 05 月 31 日 08:19
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `a_yun`
--

-- --------------------------------------------------------

--
-- 資料表結構 `good_deed_games`
--

CREATE TABLE `good_deed_games` (
  `sid` int(11) NOT NULL,
  `game_id` int(11) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `game_detail` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `good_deed_games_record`
--

CREATE TABLE `good_deed_games_record` (
  `sid` int(11) NOT NULL,
  `member_sid` int(11) NOT NULL,
  `member_account` varchar(255) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `member_birth` date NOT NULL,
  `member_death` date DEFAULT NULL,
  `play_date` datetime NOT NULL,
  `game_id` int(11) NOT NULL,
  `game_score` int(11) NOT NULL,
  `game_total_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `good_deed_games_record`
--

INSERT INTO `good_deed_games_record` (`sid`, `member_sid`, `member_account`, `member_name`, `member_birth`, `member_death`, `play_date`, `game_id`, `game_score`, `game_total_score`) VALUES
(1, 1, 'snowvalley28', '蔣阿水', '1891-02-08', '1931-08-25', '2019-02-23 00:00:00', 1, 55, 234),
(2, 2, 'showgi1103', '李秀枝', '1923-11-03', NULL, '2020-05-02 00:00:00', 1, 23, 881);

-- --------------------------------------------------------

--
-- 資料表結構 `good_deed_score`
--

CREATE TABLE `good_deed_score` (
  `sid` int(11) NOT NULL,
  `member_sid` int(11) NOT NULL,
  `member_account` varchar(255) NOT NULL,
  `member_password` int(255) NOT NULL,
  `member_name` int(255) NOT NULL,
  `member_birth` date NOT NULL,
  `member_death` date DEFAULT NULL,
  `test_score` int(11) DEFAULT NULL,
  `event_adj_score` int(11) DEFAULT NULL,
  `charity_adj_score` int(11) DEFAULT NULL,
  `game_total_score` int(11) DEFAULT NULL,
  `sum_score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `good_deed_test`
--

CREATE TABLE `good_deed_test` (
  `sid` int(11) NOT NULL,
  `test_sid` varchar(255) NOT NULL,
  `test_content` varchar(255) NOT NULL,
  `op1_content` varchar(255) NOT NULL,
  `op1_score` int(11) NOT NULL,
  `op2_content` varchar(255) DEFAULT NULL,
  `op2_score` int(11) DEFAULT NULL,
  `op3_content` varchar(255) DEFAULT NULL,
  `op3_score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `good_deed_test`
--

INSERT INTO `good_deed_test` (`sid`, `test_sid`, `test_content`, `op1_content`, `op1_score`, `op2_content`, `op2_score`, `op3_content`, `op3_score`) VALUES
(1, 'test_Q1', '你認為人性...?', '人性本善', 3, '人性本惡', 5, '有錢才會善良', 2),
(2, 'test_Q2', '你覺得人與人之間?', '銀貨兩訖', 3, '不求回報', 5, '自私自利', 2),
(3, 'test_Q3', '你午餐吃什麼?', '葷食', 3, '素食', 5, ' 沒有吃', 4);

-- --------------------------------------------------------

--
-- 資料表結構 `good_deed_test_calc`
--

CREATE TABLE `good_deed_test_calc` (
  `sid` int(11) NOT NULL,
  `member_sid` int(11) NOT NULL,
  `member_account` varchar(255) NOT NULL,
  `member_id` varchar(255) NOT NULL,
  `member_name` int(11) NOT NULL,
  `member_birth` int(11) NOT NULL,
  `member_death` int(11) DEFAULT NULL,
  `test_Q1` int(11) DEFAULT NULL,
  `test_Q2` int(11) DEFAULT NULL,
  `test_Q3` int(11) DEFAULT NULL,
  `test_Q4` int(11) DEFAULT NULL,
  `test_Q5` int(11) DEFAULT NULL,
  `test_Q6` int(11) DEFAULT NULL,
  `test_Q7` int(11) DEFAULT NULL,
  `test_Q8` int(11) DEFAULT NULL,
  `ori_testscore` int(11) DEFAULT NULL,
  `sum_testscore` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `good_deed_games`
--
ALTER TABLE `good_deed_games`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `good_deed_games_record`
--
ALTER TABLE `good_deed_games_record`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `good_deed_score`
--
ALTER TABLE `good_deed_score`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `good_deed_test`
--
ALTER TABLE `good_deed_test`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `good_deed_test_calc`
--
ALTER TABLE `good_deed_test_calc`
  ADD PRIMARY KEY (`sid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `good_deed_games`
--
ALTER TABLE `good_deed_games`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `good_deed_games_record`
--
ALTER TABLE `good_deed_games_record`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `good_deed_score`
--
ALTER TABLE `good_deed_score`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `good_deed_test`
--
ALTER TABLE `good_deed_test`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `good_deed_test_calc`
--
ALTER TABLE `good_deed_test_calc`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
