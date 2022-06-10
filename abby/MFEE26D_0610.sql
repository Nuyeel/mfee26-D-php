-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2022 年 06 月 10 日 03:57
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
-- 資料庫: `MFEE26D DB`
--

-- --------------------------------------------------------

--
-- 資料表結構 `location`
--

CREATE TABLE `location` (
  `l_sid` int(11) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `location`
--

INSERT INTO `location` (`l_sid`, `location`) VALUES
(1, '全球'),
(2, '台灣'),
(3, '台北'),
(4, '桃園'),
(5, '新竹'),
(6, '苗栗'),
(7, '南投'),
(8, '台中'),
(9, '彰化'),
(10, '雲林'),
(11, '嘉義'),
(12, '台南'),
(13, '高雄'),
(14, '屏東'),
(15, '宜蘭'),
(16, '花蓮'),
(17, '台東');

-- --------------------------------------------------------

--
-- 資料表結構 `news`
--

CREATE TABLE `news` (
  `sid` int(11) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `event_time` date DEFAULT NULL,
  `type_sid` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `location_sid` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `publish_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `news`
--

INSERT INTO `news` (`sid`, `topic`, `event_time`, `type_sid`, `img`, `location_sid`, `content`, `publish_date`) VALUES
(1, '台灣出生率下降', '2019-06-07', 2, '8045d65e4d833e6fb6c56447a7ee9a4e.jpg', 1, '台灣內政部統計顯示，2020年台灣只有16萬5249名新生兒，創下新低點，死亡人數卻首次超越出生人數，人口首度出現負成長。', '2019-07-07'),
(2, '台灣最宜居、幸福感最高城市？', '2020-09-25', 3, '2fe1a74ee11608da158891dc4bcc3010.jpg', 8, '由台中市奪冠，擁有18.1%的支持度，其次是台北市16.7%，其餘縣市支持率都低於10%，第三名為台南僅有7.2%，六都之中以桃園市最低，僅4.9%。\r\n', '2020-10-20'),
(3, '想輕鬆上大學嗎?投胎吧！！', '2020-03-21', 2, '1ff123f659c37aecb87d07707b6d389b.jpg', 1, '2021新生兒不到16萬！「全入時代」來臨 今年高中畢業生都有大學讀 輕輕鬆鬆上大學\r\n', '2021-03-23'),
(5, '2023無性別新選擇', '2023-01-01', 1, '3b7fa3757454d35740f84d464909b6e7.jpg', 1, '台灣嬰兒「男多於女」數值偏高，重男輕女觀念未除？ 推出無性別選擇!無性別新時代來臨!\r\n', '2022-12-01'),
(7, '來生的命運沒辦法預知，但外表可以', '2022-03-03', 1, 'ee4367ef9abf0bd4ed848880fcf889b2.jpg', 1, '陰德值小遊戲上架，多做善事不保證有好報但可以有更酷的外表！', '2022-02-03'),
(9, '好想擁有貓貓肉球..喵喵喵', '2022-12-07', 1, 'd0d1059c115e6e981c8b75d427291e49.jpg', 2, '貓掌概念款新發表!發表會於5月31日晚間7點開始，請勿錯過，喵!喵喵！\r\n', '2022-11-01'),
(21, '胖寶寶最高！！', '2019-02-08', 2, '263e34486b4febadafc418da204331d9.jpg', 1, '新生兒越胖越好?擔心選擇重量級軀幹會有健康疑慮嗎?新產品移除糖寶寶基因~就要胖!胖的健康沒煩惱!\r\n', '2019-01-08'),
(24, '被鳥叫聲喚醒的每一天♥', '2018-03-23', 3, 'ff26c0974744293dba28506e719c0682.jpg', 10, '悠閒No.1！想逃離城市的吵鬧與喧囂，安靜的鄉村生活也是最近的熱門新選擇喔\r\n', '2019-02-20'),
(25, '狼的孩子', '2022-06-22', 1, 'e2114329b655c2bf1bb652300e2f0c87.jpg', 7, '特殊設定釋出，可以獲得與狼群溝通的技能（此設定有售命保證！不會被吃掉喔）\r\n', '2022-05-09'),
(26, '上班上到很生氣想揍老闆嗎？？？', '2023-06-12', 3, '6fcfafb207422b89a3aa94a69a871b06.jpg', 1, '無人島地點新開放！下輩子不必上班囉～\r\n生存極限挑戰！加油！努力活下去', '2022-05-10');

-- --------------------------------------------------------

--
-- 資料表結構 `news_tag`
--

CREATE TABLE `news_tag` (
  `nt_sid` int(11) NOT NULL,
  `news_sid` int(11) NOT NULL,
  `tag_sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `news_tag`
--

INSERT INTO `news_tag` (`nt_sid`, `news_sid`, `tag_sid`) VALUES
(77, 21, 5),
(78, 21, 8),
(79, 21, 11),
(80, 21, 13),
(81, 21, 14),
(84, 2, 2),
(85, 2, 4),
(86, 2, 16),
(93, 7, 5),
(94, 7, 6),
(95, 7, 7),
(96, 7, 8),
(97, 7, 12),
(98, 7, 13),
(99, 7, 21),
(100, 9, 5),
(101, 9, 6),
(102, 9, 7),
(103, 9, 9),
(104, 9, 22),
(109, 22, 2),
(110, 22, 15),
(111, 22, 17),
(112, 22, 23),
(113, 23, 2),
(114, 23, 17),
(115, 23, 23),
(116, 24, 2),
(117, 24, 15),
(118, 24, 17),
(119, 24, 23),
(120, 25, 1),
(121, 25, 4),
(122, 25, 7),
(123, 25, 14),
(124, 25, 25),
(138, 1, 4),
(139, 1, 15),
(140, 3, 3),
(141, 3, 14),
(142, 3, 19),
(196, 5, 1),
(197, 5, 4),
(198, 5, 7),
(199, 5, 8),
(200, 5, 13),
(201, 5, 26),
(219, 26, 1),
(220, 26, 2),
(221, 26, 14),
(222, 26, 15),
(223, 26, 23),
(224, 26, 27),
(225, 26, 28);

-- --------------------------------------------------------

--
-- 資料表結構 `tag`
--

CREATE TABLE `tag` (
  `tg_sid` int(11) NOT NULL,
  `tag_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `tag`
--

INSERT INTO `tag` (`tg_sid`, `tag_name`) VALUES
(1, '名額'),
(2, '地點'),
(3, '時間'),
(4, '投胎'),
(5, '陰德值'),
(6, '遊戲'),
(7, '我的衣櫥'),
(8, '可愛'),
(9, '貓貓'),
(10, '狗狗'),
(11, '胖寶寶'),
(12, '髮型'),
(13, '新造型'),
(14, '酷'),
(15, '新聞'),
(16, '城市'),
(17, '鄉村'),
(18, '飛機'),
(19, '大學'),
(21, '捲毛'),
(22, '猫の日'),
(23, '田園生活'),
(24, '機票'),
(25, '狼小孩'),
(26, '性別平等'),
(27, '無人島'),
(28, '生存挑戰');

-- --------------------------------------------------------

--
-- 資料表結構 `type`
--

CREATE TABLE `type` (
  `ty_sid` int(11) NOT NULL,
  `type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `type`
--

INSERT INTO `type` (`ty_sid`, `type_name`) VALUES
(1, '角色'),
(2, '新聞'),
(3, '地點'),
(4, '名額'),
(5, '陰德值'),
(6, '投胎');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`l_sid`);

--
-- 資料表索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `location_sid` (`location_sid`),
  ADD KEY `type_sid` (`type_sid`);

--
-- 資料表索引 `news_tag`
--
ALTER TABLE `news_tag`
  ADD PRIMARY KEY (`nt_sid`),
  ADD KEY `news_sid` (`news_sid`),
  ADD KEY `tag_sid` (`tag_sid`);

--
-- 資料表索引 `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tg_sid`);

--
-- 資料表索引 `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`ty_sid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `location`
--
ALTER TABLE `location`
  MODIFY `l_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `news`
--
ALTER TABLE `news`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `news_tag`
--
ALTER TABLE `news_tag`
  MODIFY `nt_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `tag`
--
ALTER TABLE `tag`
  MODIFY `tg_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `type`
--
ALTER TABLE `type`
  MODIFY `ty_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`location_sid`) REFERENCES `location` (`l_sid`),
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`type_sid`) REFERENCES `type` (`ty_sid`);

--
-- 資料表的限制式 `news_tag`
--
ALTER TABLE `news_tag`
  ADD CONSTRAINT `news_tag_ibfk_1` FOREIGN KEY (`news_sid`) REFERENCES `news` (`sid`),
  ADD CONSTRAINT `news_tag_ibfk_2` FOREIGN KEY (`tag_sid`) REFERENCES `tag` (`tg_sid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
