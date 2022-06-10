-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-06-10 11:25:53
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
-- 資料表結構 `body_parts`
--

CREATE TABLE `body_parts` (
  `parts_sid` int(11) NOT NULL,
  `part` varchar(255) NOT NULL,
  `part_id` int(11) NOT NULL,
  `part_cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `city_type`
--

CREATE TABLE `city_type` (
  `city_sid` int(11) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `area_sid` int(11) DEFAULT NULL,
  `area_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `city_type`
--

INSERT INTO `city_type` (`city_sid`, `city`, `area_sid`, `area_name`) VALUES
(1, '基隆市', 1, '北部'),
(2, '台北市', 1, '北部'),
(3, '新北市', 1, '北部'),
(4, '桃園市', 1, '北部'),
(5, '新竹縣', 2, '中部'),
(6, '新竹市', 2, '中部'),
(7, '苗栗縣', 2, '中部'),
(8, '台中市', 2, '中部'),
(9, '彰化縣', 2, '中部'),
(10, '南投縣', 2, '中部'),
(11, '雲林縣', 2, '中部'),
(12, '嘉義縣', 3, '南部'),
(13, '嘉義市', 3, '南部'),
(14, '台南市', 3, '南部'),
(15, '高雄市', 3, '南部'),
(16, '屏東縣', 3, '南部'),
(17, '花蓮縣', 4, '東部'),
(18, '台東縣', 4, '東部'),
(19, '宜蘭縣', 4, '東部'),
(20, '澎湖縣', 5, '離島'),
(21, '金門縣', 5, '離島'),
(22, '連江縣', 5, '離島');

-- --------------------------------------------------------

--
-- 資料表結構 `cube`
--

CREATE TABLE `cube` (
  `member_sid` int(11) NOT NULL,
  `cube_sid` int(11) NOT NULL,
  `cube_text` varchar(255) DEFAULT NULL,
  `cube_style` varchar(255) NOT NULL,
  `cube_style_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `cube`
--

INSERT INTO `cube` (`member_sid`, `cube_sid`, `cube_text`, `cube_style`, `cube_style_id`) VALUES
(11, 1, '我是誰？我在哪？', 'entertainment', 1),
(12, 2, 'PHP 和 MySQL 是好朋友！', 'art', 3),
(13, 3, 'jQuery 和 Bootstrap 是好朋友！', 'sports', 2),
(14, 4, '偶和二路大人是好朋友！', 'school', 3),
(15, 5, '喇叭和 Justin Bieber 是好朋友！', 'private', 1),
(16, 6, '我和 UI/UX 是好朋友！', 'business', 2),
(17, 7, '哇嘎怪奇素務所係好朋友', 'international', 2),
(18, 8, '我沒有朋友...', 'others', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `cube_category`
--

CREATE TABLE `cube_category` (
  `cube_style_sid` int(11) NOT NULL,
  `cube_img_a` varchar(255) NOT NULL,
  `cube_img_b` varchar(255) DEFAULT NULL,
  `cube_img_c` varchar(255) DEFAULT NULL,
  `cube_img_t` varchar(255) NOT NULL,
  `cube_color_1` varchar(255) DEFAULT NULL,
  `cube_color_2` varchar(255) DEFAULT NULL,
  `cube_color_font` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `cube_category`
--

INSERT INTO `cube_category` (`cube_style_sid`, `cube_img_a`, `cube_img_b`, `cube_img_c`, `cube_img_t`, `cube_color_1`, `cube_color_2`, `cube_color_font`) VALUES
(2, '2_a', '2_b', '2_c', '2_t', '#ed1848', '#612680', '#612680'),
(3, '3_a', '3_b', '3_c', '3_t', '#612680', '#139dbf', '#ffc6d4'),
(4, '4_a', '4_b', '4_c', '4_t', '#e8b387', '#0f1746', '#e8b387'),
(5, '5_a', '5_b', '5_c', '5_t', '#e8b387', '#0f1746', '#0f1746'),
(7, '7_a', '7_b', '7_c', '7_t', '#ed1848', '#ffc6d4', '#eeeeee'),
(8, '8_a', '8_b', '8_c', '8_t', '#139dbf', '#0f1746', '#eeeeee'),
(9, '9_a', '9_b', '9_c', '9_t', '#006251', '#fdd31b', '#006251'),
(10, '10_a', '10_b', '10_c', '10_t', '#ed1848', '#612680', '#fdd31b'),
(11, '11_a', '11_b', '11_c', '11_t', '#ffc6d4', '#139dbf', '#139dbf'),
(12, '12_a', '12_b', '12_c', '12_t', '#ed1848', '#612680', '#006251'),
(13, '13_a', '13_b', '13_c', '13_t', '#fdd31b', '#612680', '#fdd31b'),
(14, '14_a', '14_b', '14_c', '14_t', '#006251', '#e8b387', '#006251'),
(16, '16_a', '16_b', '16_c', '16_t', '#139dbf', '#ffc6d4', '#139dbf'),
(17, '17_a', '17_b', '17_c', '17_t', '#0f1746', '#8890c1', '#0f1746'),
(18, '18_a', '18_b', '18_c', '18_t', '#006251', '#ffc6d4', '#e8b387'),
(19, '19_a', '19_b', '19_c', '19_t', '#139dbf', '#aee0d7', '#139dbf'),
(21, '21_a', '21_b', '21_c', '21_t', '#ffc6d4', '#139dbf', '#ffc6d4'),
(24, '24_a', '24_b', '24_c', '24_t', '#e8b387', '#006251', '#fdd31b'),
(28, '28_a', '28_b', '28_c', '28_t', '#fdd31b', '#006251', '#fdd31b'),
(30, '37_a', '37_b', '37_c', '37_t', '#ed1848', '#006251', '#e8b387'),
(31, '31_a', '31_b', '21_c', '31_t', '#ffc6d4', '#ed1848', '#eeeeee'),
(32, '32_a', '32_b', '32_c', '32_t', '#ffc6d4', '#ed1848', '#ed1848'),
(34, '34_a', '34_b', '34_c', '34_t', '#ffc6d4', '#139dbf', '#eeeeee'),
(35, '35_a', '35_b', '35_c', '35_t', '#ffc6d4', '#fdd31b', '#ed1848'),
(37, '37_a', '37_b', '37_c', '37_t', '#ed1848', '#006251', '#e8b387');

-- --------------------------------------------------------

--
-- 資料表結構 `cube_music`
--

CREATE TABLE `cube_music` (
  `cube_music_sid` int(11) NOT NULL,
  `cube_music_type` varchar(255) NOT NULL,
  `cube_music_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `cube_music`
--

INSERT INTO `cube_music` (`cube_music_sid`, `cube_music_type`, `cube_music_name`) VALUES
(1, 'happiness', 'synthetic.mp3'),
(2, 'meditation', 'discovery.mp3'),
(3, 'sadness', 'undertow.mp3'),
(4, 'meditation', 'spacerain.mp3');

-- --------------------------------------------------------

--
-- 資料表結構 `date_price`
--

CREATE TABLE `date_price` (
  `year` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `date_price`
--

INSERT INTO `date_price` (`year`, `price`) VALUES
(2022, 10),
(2023, 20),
(2025, 20),
(2030, 80);

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

--
-- 傾印資料表的資料 `good_deed_games`
--

INSERT INTO `good_deed_games` (`sid`, `game_id`, `game_name`, `game_detail`) VALUES
(1, 1, '扶老奶奶過馬路遊戲', '在可怕的車流中 帶領老奶奶過馬路 實在是功德一件'),
(2, 2, '消業障遊戲', '透過小球碎掉業障');

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
  `game_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `good_deed_games_record`
--

INSERT INTO `good_deed_games_record` (`sid`, `member_sid`, `member_account`, `member_name`, `member_birth`, `member_death`, `play_date`, `game_id`, `game_score`) VALUES
(1, 1, 'snowvalley28', '蔣阿水', '1891-02-08', '1931-08-25', '2019-02-23 00:00:00', 1, 55),
(2, 2, 'showgi1103', '李秀枝', '1923-11-03', NULL, '2020-05-02 00:00:00', 1, 23);

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
  `event_score` int(11) DEFAULT NULL,
  `charity_score` int(11) DEFAULT NULL,
  `game_score` int(11) DEFAULT NULL,
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
(2, 'test_Q2', '你覺得人與人之間的相處應該?', '銀貨兩訖', 3, '不求回報', 5, '自私自利', 2),
(3, 'test_Q3', '你小時候最常玩什麼遊戲?', '閃電布丁', 3, '鬼抓人', 5, ' 躲貓貓', 4),
(4, 'test_Q4', '傷心的時候聽?', '哀傷的歌', 3, '佛經', 5, '歡樂的歌', 2),
(5, 'test_Q5', '你覺得人生像...?', '一場旅行', 5, '一場災難', 3, '一盒巧克力', 4);

-- --------------------------------------------------------

--
-- 資料表結構 `good_deed_test_record`
--

CREATE TABLE `good_deed_test_record` (
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
  `test_score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `sid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `deathdate` date DEFAULT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`sid`, `name`, `birthdate`, `deathdate`, `mobile`, `email`, `account`, `password`, `create_at`) VALUES
(1, 'the first cat', NULL, NULL, '', 'HappyCat01@gmail.com', 'HappyCat01', '$2y$10$AirwXJwahWxsQKJrrmlwE.nFkwin.K3ZR8qJE4HgYgqu4N0MIdb7C', '2022-06-09 13:52:24'),
(2, '貓貓貓', NULL, NULL, '', 'HappyCat02@gmail.com', 'HappyCat02', '$2y$10$NYuxH3UUfyHRr8yjeDo0Ou/zw83PT/hjbaAwWQ6u.MVlwhS2KMct6', '2022-06-09 13:52:51'),
(3, '九天玄女不在這', NULL, NULL, '', 'HappyCat03@gmail.com', 'HappyCat03', '$2y$10$QCyABgd5IjBYYmQhnK0bpeBjSOKzSjiPbyI8fFPpV.cBoclFe8f1.', '2022-06-09 13:53:34'),
(4, 'Bible Thumb', NULL, NULL, '', 'HappyCat04@gmail.com', 'HappyCat04', '$2y$10$xyN7xDkGJ5SustZEWCDyIuA/7RdTp0Y3yg4MhtFPFyzmnmayB9EZC', '2022-06-09 13:54:15'),
(5, '偷尼史塔克 Tony Stark ', '1990-06-14', '2022-06-02', '0977111050', 'HappyCat05@gmail.com', 'HappyCat05', '$2y$10$sFaM2bucSZ9h0bRb9vXYJuwSy1.YS7eHOutpxih.qfOieXQX1b6ze', '2022-06-09 13:54:42'),
(6, '怎一直下雨', NULL, NULL, '', 'HappyCat06@gmail.com', 'HappyCat06', '$2y$10$KQFhzDlfZFdk.stmlCA7U.il3fDWO2z0kkVzrHuF9SJPIgNXWKAp.', '2022-06-09 13:55:06'),
(8, '咖啡因成癮重症患者', NULL, NULL, '', 'HappyCat08@gmail.com', 'HappyCat08', '$2y$10$hfdvXtFq2/leKrM2jLXxf.L1YiKAr5wMCq7.rp69fiSgoG3pnJlsK', '2022-06-09 13:55:47'),
(9, '陳怡君', NULL, NULL, '', 'HappyCat09@gmail.com', 'HappyCat09', '$2y$10$7zyt3mR2ghfGKn9xkEWgdeXlmxoRy4rm3DmrP/3kDFMXoIPPEj/wy', '2022-06-09 13:56:28'),
(10, '總有幾隻貓的', NULL, NULL, '', 'HappyCat10@gmail.com', 'HappyCat10', '$2y$10$n3p/32p42bi1QqX/U0KjBe4Yb0WdAI.8UaoZH3tiRR8NbBaxHGcOK', '2022-06-09 13:56:51'),
(11, 'unhappy cat', NULL, NULL, '', 'HappyCat11@gmail.com', 'HappyCat11', '$2y$10$JG.LjNM0flM7vAV8zkh6PO3Hb2bgA3c8xKW83W2qbgJgns/n/Hdoa', '2022-06-09 13:57:16'),
(12, '靈魂急轉彎', '1990-06-15', '2022-06-07', '', 'HappyCat12@gmail.com', 'HappyCat12', '$2y$10$7.aum6zzCAAX1XsrQyhOf.U8r5MrG586P2fdGiW27WfBOztqK4IHa', '2022-06-09 13:57:37'),
(13, '', NULL, NULL, '', 'admin@gmail.com', 'Admin', '$2y$10$0DADDxhf55DPxOKcyISJt.L0uHOkeiSh7J/lTqQ73jMYj1qhLBrBW', '2022-06-10 01:51:04');

-- --------------------------------------------------------

--
-- 資料表結構 `music_category`
--

CREATE TABLE `music_category` (
  `music_type_sid` int(11) NOT NULL,
  `music_type_en` varchar(255) NOT NULL,
  `music_type_ch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `music_category`
--

INSERT INTO `music_category` (`music_type_sid`, `music_type_en`, `music_type_ch`) VALUES
(1, 'happiness', '快樂'),
(2, 'meditation', '沉思'),
(3, 'sadness', '悲傷');

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
(7, '來生的命運沒辦法預知，但外表可以', '2022-03-03', 1, 'ee4367ef9abf0bd4ed848880fcf889b2.jpg', 1, '陰德值小遊戲上架，多做善事不保證有好報但可以有更酷的外表！', '2022-02-03'),
(9, '好想擁有貓貓肉球..喵喵喵jjjj', '2022-12-07', 1, 'd0d1059c115e6e981c8b75d427291e49.jpg', 2, '貓掌概念款新發表!發表會於5月31日晚間7點開始，請勿錯過，喵!喵喵！\r\n', '2022-11-01'),
(21, '胖寶寶最高！！', '2019-02-08', 2, '263e34486b4febadafc418da204331d9.jpg', 1, '新生兒越胖越好?擔心選擇重量級軀幹會有健康疑慮嗎?新產品移除糖寶寶基因~就要胖!胖的健康沒煩惱!\r\n', '2019-01-08'),
(24, '被鳥叫聲喚醒的每一天♥', '2018-03-23', 3, 'ff26c0974744293dba28506e719c0682.jpg', 10, '悠閒No.1！想逃離城市的吵鬧與喧囂，安靜的鄉村生活也是最近的熱門新選擇喔\r\n', '2019-02-20'),
(25, '狼的孩子', '2022-06-22', 1, 'e2114329b655c2bf1bb652300e2f0c87.jpg', 7, '特殊設定釋出，可以獲得與狼群溝通的技能（此設定有售命保證！不會被吃掉喔）\r\n', '2022-05-09');

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
(225, 26, 28),
(226, 9, 5),
(227, 9, 6),
(228, 9, 7),
(229, 9, 9),
(230, 9, 10),
(231, 9, 22);

-- --------------------------------------------------------

--
-- 資料表結構 `npo_act`
--

CREATE TABLE `npo_act` (
  `sid` int(11) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `type_sid` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `npo_name_sid` int(11) DEFAULT NULL,
  `act_title` varchar(255) DEFAULT NULL,
  `place_city` int(11) DEFAULT NULL,
  `place_other` varchar(255) DEFAULT NULL,
  `limit_num` int(255) DEFAULT NULL,
  `intro` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `npo_act`
--

INSERT INTO `npo_act` (`sid`, `img`, `type_sid`, `price`, `value`, `start`, `end`, `npo_name_sid`, `act_title`, `place_city`, `place_other`, `limit_num`, `intro`) VALUES
(1, './list-img/npo-01.jpg', 1, 50, 50, '2022-06-22 21:02:00', '2022-07-15 21:02:00', 2, '一起手護台灣', 14, '國聖燈塔', 100, '會提供手套和垃圾袋，保險自理、自行攜帶飲用水 (盡量避免保特瓶或手搖飲)\r\nP.S我們民眾自發性舉辦的活動，故無法提供志工時數或感謝狀唷'),
(18, './list-img/npo-02.jpg', 1, 100, 50, '2022-06-27 21:02:00', '2022-07-22 21:02:00', 3, '肯邦國際Ｘ寶島淨鄉團', 17, '南濱公園（970花蓮縣花蓮市海濱街）', 20, '會提供手套和垃圾袋，需自備防曬乳、帽子，水壺'),
(19, './list-img/npo-03.jpg', 1, 50, 50, '2022-06-22 21:02:00', '2022-07-29 22:52:25', 4, '白沙屯淨鄉團', 7, '白沙屯媽祖廟後方海灘', 40, '請自備手套、裝垃圾袋子及夾子，用畢自行帶回，禁止攜帶刀剪等刀器來淨灘現場\r\nP.S活動完全免費，參加本淨灘活動請戴口罩'),
(20, './list-img/npo-04.jpg', 2, 150, 50, '2022-06-22 21:02:00', '2022-07-22 22:52:29', 1, '幫浪浪找個家', 3, '新莊區動保處裕民分館', 60, '新北市政府動保處在植樹節當日在新莊裕民分館舉辦「浪浪愛心認養」活動，活動集結狗狗聯誼會、寵物下午茶、萌寵療癒書展、播放寵物電影及我的寵物情人拍照打卡等多元主題，民眾帶著家中毛寶貝一起到圖書館來同樂，當天許多民眾成功認養毛寶貝，不僅獲得動保處贈送寵物驚喜大禮包，作為毛寶貝嫁妝，並結合植樹節加碼贈送本市景觀處三峽苗圃所提供的大麥草盆栽。'),
(21, './list-img/npo-05.jpg', 2, 50, 50, '2022-07-16 21:02:00', '2022-08-18 22:52:33', 2, '浪貓中途送養', 2, '松山區動保處', 70, '設立多元認養機制，提供民眾便利的認養地點與管道，增加收容動物認養機會。'),
(22, './list-img/npo-06.jpg', 2, 100, 50, '2022-07-28 21:02:00', '2022-07-21 22:52:37', 1, '一起幫助浪犬', 3, '八里動物之家', 3, '※因現場人員需處理照護動物工作，場地/導覽人員人力有限，本會將視天候狀況及人力狀況審核是否同意志工服務，若天候不佳或是已有團體預約，就需要另擇他日喔!'),
(23, './list-img/npo-07.jpg', 3, 100, 50, '2022-06-11 21:02:00', '2022-07-22 22:52:41', 2, '家庭照顧者支持計畫', 2, '文山區萬和街6號4樓', 15, '1. 以弱勢社區及服務據點所提出的需求提供服務，並體驗當地生活和文化。\r\n2. 協助當地教學、活動帶領等為主，服務內容依實際狀況調整。'),
(24, './list-img/npo-08.jpg', 3, 200, 50, '2022-07-22 21:02:00', '2022-07-21 22:52:45', 3, 'for one挺好：「食物銀行。送愛」', 2, NULL, 10, '服務內容：\r\n1.關懷服務：電話問安、送餐服務及社區關懷活動。\r\n2.陪伴服務：陪同就醫、讀報、陪伴運動及陪伴至社區或據點參與活動等服務。'),
(25, './list-img/npo-09.jpg', 3, 50, 50, '2022-07-15 21:02:00', '2022-07-23 22:52:49', 4, '高風險家庭照顧關懷計畫', 4, '蘆竹區文中路一段108號（國道2號南桃園交流道附近）', 20, '馨禾老人長期照顧中心招募社會團體、學生團體與慈善愛心團體至院區服務與訪視住民老人，適時提供住民身心靈之撫慰與支持，並為住民生活帶來調劑與休閒娛樂，藉此提升住民之生活品質，更適時幫助住民在疾病上之舒緩與慰藉，並藉社會資源之力量達成社區照護模式與社會互動。'),
(26, './list-img/npo-10.jpg', 5, 100, 50, '2022-06-17 21:02:00', '2022-06-23 22:52:53', 3, '陪伴燒傷朋友勇敢重生', 2, '文山區萬和街6號4樓', 2, '哪裡有需要伊甸就在哪裡，每一個需要除了有員工，也需要熱心的志工夥伴協同，不論是櫃檯、文書等間接服務，或餵食、陪伴等直接服務，因為有志工的加入，服務的工作才能做得更好。'),
(27, './list-img/npo-11.jpg', 5, 150, 50, '2022-07-13 21:02:00', '2022-06-22 22:52:57', 4, '喜憨兒基金會 因你而改變', 13, NULL, 50, '天使心家族服務對象為全台身心障礙家庭之父母及其健康手足。在提供服務的同時，志工們協助照顧愛奇兒(即身心障礙者)或擔任其他行政型的事務。\r\n\r\n父母能夠走出來，需要您的陪伴，天使心家族邀請喜愛孩子的您、對活動有熱情活力的您、想在志願服務路上嘗試不同挑戰的您，一同加入志願服務的行列，陪伴身心障礙家庭走過一段艱辛的路，成為他們心中溫暖的小太陽！'),
(28, './list-img/npo-12.jpg', 5, 50, 50, '2022-07-13 21:02:00', '2022-06-22 22:53:01', 1, '「看不見，我努力」為視多障者加油！', 4, '大溪老街', 4, '今年度，中心想透過志工協同領導的模式，由一位志工搭配 4 名身障者組成小隊，活動期間陪伴身障者於大溪老街中完成任務，中心期待透過此模式，增加身障者與一般民眾的接觸，雙方能夠進行良性互動，進而提升一般民眾對於身障者的認知，亦透過數位遊戲作為媒介，促使身心障礙者能活用網路科技、學習團隊合作、培養社會參與意識。'),
(29, './list-img/npo-13.jpg', 6, 200, 50, '2022-06-29 21:02:00', '2022-07-22 22:53:04', 1, 'i運動不設限-多元扶助計畫', 14, '關廟區北安一街146號', 5, '臺南市鳳梨好筍節、呼朋引伴來'),
(30, './list-img/npo-14.jpg', 6, 50, 50, '2022-06-29 21:02:00', '2022-06-18 22:53:08', 2, '伴弱勢癌友翻轉抗癌路', 2, '大安區敦化南路一段233巷28號B1\r\n台北愛樂文教基金會', 40, 'TICF18台北國際合唱音樂節規模龐大，涵蓋20餘場大小音樂會、4項合唱專業課程及首屆台北國際合唱大賽。行政團隊計畫培養節慶活動之幕後籌備人才，歡迎熱愛藝文活動的你/妳，加入我們一起來完成今夏亞洲最具規模的合唱盛事！'),
(75, './list-img/npo-01.jpg', 1, 50, 50, '2022-06-22 21:02:00', '2022-07-15 21:02:00', 2, '一起手護台灣', 21, '國聖燈塔', 100, '會提供手套和垃圾袋，保險自理、自行攜帶飲用水 (盡量避免保特瓶或手搖飲)\r\nP.S我們民眾自發性舉辦的活動，故無法提供志工時數或感謝狀唷');

-- --------------------------------------------------------

--
-- 資料表結構 `npo_act_type`
--

CREATE TABLE `npo_act_type` (
  `typesid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `npo_act_type`
--

INSERT INTO `npo_act_type` (`typesid`, `name`) VALUES
(1, '環境'),
(2, '動保'),
(3, '長照'),
(4, '兒少'),
(5, '身心障礙'),
(6, '其他');

-- --------------------------------------------------------

--
-- 資料表結構 `npo_name`
--

CREATE TABLE `npo_name` (
  `npo_sid` int(11) NOT NULL,
  `npo_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `npo_intro` varchar(255) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `npo_name`
--

INSERT INTO `npo_name` (`npo_sid`, `npo_name`, `email`, `mobile`, `npo_intro`, `create_at`) VALUES
(1, '財團法人桃園市私立寶貝潛能發展中心', 'ascascasv@gmail.com', '0910582752', '寶貝潛能發展中心為桃園在地的社服機構，服務身心障礙者已超過16年。目前為0-6歲身心障礙幼童提供多元化服務，透過日間托育服務、多感官課程、語言溝通或認知及生活自理等方面提供刺激與訓練，讓身障幼童學會自理、走路、吃飯等。自民國94年成立以來，每日用心經營，目前累計服務超過5800人次的身障幼童。', '2022-06-15 21:02:00'),
(2, '荒野保護協會', 'sow@sow.org.tw', '0912666111', '荒野保護協會為依法設立之公益社會團體，是一個由尋常老百姓自發組成的環境保護團體。自1995 年成立以來，以關懷台灣為出發點，放眼全世界，致力以全民參與的方式，透過自然教育、棲地保育與守護行動，推動台灣及全球荒野保護的工作，為我們及下一代締造美好的自然環境。', '2022-07-15 21:02:00'),
(3, '財團法人勵馨社會福利事業基金會', 'lknklnlkl@yahoo.com.tw', '0966455233', '勵馨基金會創立於1988年，1988年美籍宣教士高愛琪帶領一群基督徒朋友首創國內安置不幸少女的中途之家「勵馨園」，正式展開收容服務。勵馨本著基督精神，以追求公義與愛的決心和勇氣，預防及消弭性侵害、性剝削及家庭暴力對婦女與兒少的傷害，並致力於社會改造，創造對婦女及兒少的友善環境。', '2022-08-15 21:02:00'),
(4, '陽光社會福利基金會', 'awslfkdnwqfkj@gmail.com', '0966514852', '陽光的故事要從民國69年起，一本由燒傷者沈曉亞小姐所撰寫的『怕見陽光的人』一書，道盡顏面損傷朋友處於社會幽暗角落的坎坷和辛酸。此書描述了顏損者獨自面對損傷的痛楚，以及在社會上求生存所遭受到偏見、排斥與挫折的歷程，不僅讓人為之動容，也引起了社會的廣大迴響。', '2022-05-15 21:02:00');

-- --------------------------------------------------------

--
-- 資料表結構 `place`
--

CREATE TABLE `place` (
  `sid` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `month` int(11) NOT NULL,
  `country` varchar(225) NOT NULL,
  `city` varchar(225) NOT NULL,
  `dist` varchar(225) NOT NULL,
  `quota` int(11) NOT NULL,
  `booked` int(11) NOT NULL,
  `place_price` int(11) NOT NULL DEFAULT 200
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `place`
--

INSERT INTO `place` (`sid`, `year`, `month`, `country`, `city`, `dist`, `quota`, `booked`, `place_price`) VALUES
(2, 2025, 10, '美國', '紐約', '布魯克林', 2, 1, 200),
(4, 2032, 1, '台灣', '新北市', '三峽區', 5, 2, 200),
(5, 2072, 2, '台灣', '台南市', '安平區', 2, 2, 200),
(6, 2030, 5, '台灣', '台南市', '中西區', 5, 2, 200),
(7, 2055, 8, '台灣', '台北市', '大安區', 5, 3, 200),
(10, 2025, 12, '台灣', '台南市', '安平區', 4, 2, 200),
(12, 2025, 12, '台灣', '台北市', '大安區', 3, 2, 200),
(13, 2022, 12, '美國', '加州', '聖荷西', 2, 1, 200),
(14, 2027, 5, '台灣', '台北市', '大安區', 2, 1, 200),
(15, 2026, 10, '台灣', '台北市', '大安區', 3, 1, 200),
(16, 2030, 6, '台灣', '台北市', '內湖區', 1, 1, 200),
(17, 2029, 6, '台灣', '台南市', '中西區', 2, 1, 200),
(18, 2029, 5, '台灣', '桃園市', '蘆竹區', 3, 1, 200),
(19, 2027, 5, '美國', '紐約', '皇后區', 4, 2, 200),
(20, 2027, 12, '美國', '加州', '比佛利山莊', 1, 0, 200),
(21, 2023, 5, '台灣', '新竹縣', '竹北市', 2, 0, 200),
(22, 2025, 6, '台灣', '台北市', '大安區', 2, 1, 200),
(23, 2052, 2, '台灣', '台北市', '大安區', 1, 1, 200),
(24, 2045, 6, '台灣', '台北市', '大安區', 3, 1, 200),
(25, 2105, 10, '台灣', '台北市', '大安區', 2, 0, 200),
(27, 2065, 9, '台灣', '台北市', '大安區', 2, 0, 200),
(28, 2044, 2, '台灣', '新北市', '三峽區', 5, 1, 200),
(29, 2048, 12, '台灣', '新北市', '三峽區', 2, 1, 200),
(30, 2064, 4, '台灣', '新北市', '三峽區', 3, 2, 200),
(31, 2098, 10, '台灣', '新北市', '三峽區', 5, 2, 200),
(32, 2084, 2, '台灣', '新北市', '三峽區', 2, 0, 200),
(33, 2100, 7, '台灣', '新北市', '三峽區', 5, 2, 200),
(34, 2088, 12, '台灣', '台北市', '內湖區', 2, 1, 200),
(35, 2054, 4, '台灣', '台北市', '內湖區', 3, 2, 200),
(36, 2028, 10, '台灣', '台北市', '內湖區', 5, 2, 200),
(37, 2034, 2, '台灣', '台北市', '內湖區', 2, 0, 200),
(38, 2070, 7, '台灣', '台北市', '內湖區', 5, 2, 200),
(39, 2039, 3, '台灣', '桃園市', '中壢區', 4, 2, 200),
(40, 2069, 9, '台灣', '桃園市', '中壢區', 2, 1, 200),
(41, 2089, 3, '台灣', '桃園市', '中壢區', 2, 0, 200),
(42, 2027, 5, '台灣', '桃園市', '大園區', 3, 2, 200),
(43, 2039, 12, '台灣', '桃園市', '大園區', 2, 1, 200),
(44, 2039, 9, '台灣', '桃園市', '蘆竹區', 4, 2, 200),
(45, 2039, 11, '台灣', '桃園市', '蘆竹區', 2, 1, 200),
(46, 2052, 3, '台灣', '新北市', '三峽區', 4, 1, 200),
(47, 2077, 12, '台灣', '新北市', '三重區', 4, 2, 200),
(48, 2099, 7, '台灣', '新北市', '三重區', 2, 1, 200),
(49, 2054, 6, '台灣', '新北市', '三重區', 4, 0, 200),
(50, 2068, 8, '台灣', '新北市', '蘆洲區', 3, 2, 200),
(51, 2084, 2, '台灣', '新北市', '蘆洲區', 4, 2, 200),
(52, 2072, 3, '台灣', '台北市', '中山區', 4, 1, 200),
(53, 2077, 11, '台灣', '台北市', '中山區', 4, 2, 200),
(54, 2069, 7, '台灣', '台北市', '中山區', 3, 1, 200),
(55, 2074, 6, '台灣', '宜蘭縣', '宜蘭市', 4, 0, 200),
(56, 2038, 8, '台灣', '宜蘭縣', '宜蘭市', 3, 2, 200),
(57, 2094, 2, '台灣', '台中市', '烏日區', 4, 2, 200),
(58, 2040, 11, '台灣', '台北市', '北投區', 2, 0, 200),
(59, 2055, 12, '台灣', '高雄市', '左營區', 3, 1, 200),
(60, 2075, 2, '台灣', '高雄市', '左營區', 2, 1, 200),
(61, 2035, 8, '台灣', '高雄市', '三民區', 3, 1, 200),
(62, 2033, 4, '台灣', '台南市', '仁德區', 2, 0, 200),
(63, 2023, 1, '台灣', '台南市', '中西區', 2, 1, 200),
(64, 2041, 12, '台灣', '台南市', '中西區', 3, 1, 200),
(65, 2062, 7, '台灣', '台南市', '仁德區', 3, 2, 200),
(66, 2055, 9, '台灣', '台南市', '仁德區', 5, 1, 200),
(67, 2023, 3, '美國', '加州', '舊金山', 2, 0, 200),
(68, 2023, 12, '台灣', '宜蘭縣', '羅東鎮', 3, 1, 200),
(69, 2026, 8, '台灣', '台中市', '西區', 3, 1, 200),
(70, 2032, 7, '台灣', '新北市', '蘆洲區', 2, 0, 200),
(71, 2029, 5, '台灣', '高雄市', '左營區', 2, 0, 200);

-- --------------------------------------------------------

--
-- 資料表結構 `place_city`
--

CREATE TABLE `place_city` (
  `country_id` varchar(225) NOT NULL,
  `city` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `place_city`
--

INSERT INTO `place_city` (`country_id`, `city`) VALUES
('台灣', '南投縣'),
('台灣', '台中市'),
('台灣', '台北市'),
('台灣', '台南市'),
('台灣', '台東縣'),
('台灣', '基隆市'),
('台灣', '宜蘭縣'),
('台灣', '屏東縣'),
('台灣', '新北市'),
('台灣', '新竹市'),
('台灣', '新竹縣'),
('台灣', '桃園市'),
('台灣', '澎湖縣'),
('台灣', '花蓮縣'),
('台灣', '金門縣'),
('台灣', '高雄市'),
('美國', '加州'),
('美國', '夏威夷'),
('美國', '紐約');

-- --------------------------------------------------------

--
-- 資料表結構 `place_country`
--

CREATE TABLE `place_country` (
  `country` varchar(225) NOT NULL,
  `country_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `place_country`
--

INSERT INTO `place_country` (`country`, `country_price`) VALUES
('台灣', 100),
('美國', 500);

-- --------------------------------------------------------

--
-- 資料表結構 `place_dist`
--

CREATE TABLE `place_dist` (
  `country_id` varchar(225) NOT NULL,
  `city_id` varchar(225) NOT NULL,
  `dist` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `place_dist`
--

INSERT INTO `place_dist` (`country_id`, `city_id`, `dist`) VALUES
('台灣', '新北市', '三峽區'),
('台灣', '高雄市', '三民區'),
('台灣', '新北市', '三重區'),
('台灣', '桃園市', '中壢區'),
('台灣', '台北市', '中山區'),
('台灣', '台南市', '中西區'),
('台灣', '台南市', '仁德區'),
('台灣', '台北市', '內湖區'),
('台灣', '台北市', '北投區'),
('台灣', '桃園市', '大園區'),
('台灣', '台北市', '大安區'),
('台灣', '台南市', '安平區'),
('台灣', '宜蘭縣', '宜蘭市'),
('台灣', '高雄市', '左營區'),
('美國', '紐約', '布魯克林'),
('台灣', '台南市', '新化區'),
('台灣', '台南市', '歸仁區'),
('美國', '加州', '比佛利山莊'),
('台灣', '台中市', '烏日區'),
('美國', '紐約', '皇后區'),
('台灣', '新竹縣', '竹北市'),
('台灣', '新竹縣', '竹東鎮'),
('台灣', '宜蘭縣', '羅東鎮'),
('美國', '加州', '聖地牙哥'),
('美國', '加州', '聖荷西'),
('美國', '加州', '舊金山'),
('台灣', '新北市', '蘆洲區'),
('台灣', '桃園市', '蘆竹區'),
('台灣', '台中市', '西區'),
('台灣', '台中市', '豐原區'),
('台灣', '宜蘭縣', '頭城鄉');

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
(9, '1', 4, 50, 150, '2022-06-09'),
(10, '31', 2, 50, 150, '2022-06-09'),
(12, '15', 4, 50, 150, '2022-06-09'),
(15, '20', 5, 50, 150, '2022-06-09'),
(18, '12', 13, 50, 150, '2022-06-09');

-- --------------------------------------------------------

--
-- 資料表結構 `reincarnation`
--

CREATE TABLE `reincarnation` (
  `member_sid` int(11) NOT NULL,
  `soul_id` int(11) NOT NULL,
  `generation` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `reincarnation`
--

INSERT INTO `reincarnation` (`member_sid`, `soul_id`, `generation`) VALUES
(11, 1, 1),
(12, 2, 1),
(13, 1, 2),
(14, 2, 2),
(15, 1, 3),
(16, 2, 3),
(17, 1, 4),
(18, 2, 4);

-- --------------------------------------------------------

--
-- 資料表結構 `reincarnation_order`
--

CREATE TABLE `reincarnation_order` (
  `reincarnation_order_sid` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `member_sid` int(11) NOT NULL,
  `avatar_id` int(11) NOT NULL,
  `time_id` date DEFAULT NULL,
  `place_id` varchar(255) NOT NULL,
  `avatar_price` int(11) NOT NULL,
  `time_price` int(11) NOT NULL,
  `place_price` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `order_datetime` datetime NOT NULL,
  `order_last_modified_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `showcase`
--

CREATE TABLE `showcase` (
  `avatar_id` int(11) NOT NULL,
  `member_sid` int(11) NOT NULL,
  `avatar_created_at` datetime NOT NULL,
  `combination` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`combination`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `showcase`
--

INSERT INTO `showcase` (`avatar_id`, `member_sid`, `avatar_created_at`, `combination`) VALUES
(1, 1, '2022-06-04 14:23:46', '{\"eye\":\"0\",\"eyeColor\":\"1\"}'),
(2, 1, '2022-06-04 14:25:28', '{\"eye\":\"1\",\"eyeColor\":\"2\"}'),
(3, 1, '2022-06-05 14:50:59', '{\"eye\":\"0\",\"eyeColor\":\"0\"}'),
(4, 1, '2022-06-05 14:51:26', '{\"eye\":\"1\",\"eyeColor\":\"2\"}'),
(5, 1, '2022-06-05 14:55:24', '{\"eye\":\"1\",\"eyeColor\":\"2\"}'),
(6, 1, '2022-06-05 15:12:27', '{\"eye\":\"1\",\"eyeColor\":\"0\"}'),
(7, 1, '2022-06-05 15:13:23', '{\"eye\":\"0\",\"eyeColor\":\"3\"}'),
(8, 1, '2022-06-10 11:06:08', '{\"nose\":\"0\",\"mouth\":\"0\",\"ear\":\"0\",\"hair\":\"0\",\"eyes\":\"2\",\"eyesColor\":\"0\",\"noseColor\":\"1\",\"mouthColor\":\"2\",\"earColor\":\"1\",\"hairColor\":\"3\"}');

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
-- 資料表索引 `body_parts`
--
ALTER TABLE `body_parts`
  ADD PRIMARY KEY (`parts_sid`);

--
-- 資料表索引 `city_type`
--
ALTER TABLE `city_type`
  ADD PRIMARY KEY (`city_sid`);

--
-- 資料表索引 `cube`
--
ALTER TABLE `cube`
  ADD PRIMARY KEY (`cube_sid`),
  ADD KEY `member_sid` (`member_sid`);

--
-- 資料表索引 `cube_category`
--
ALTER TABLE `cube_category`
  ADD PRIMARY KEY (`cube_style_sid`);

--
-- 資料表索引 `cube_music`
--
ALTER TABLE `cube_music`
  ADD PRIMARY KEY (`cube_music_sid`);

--
-- 資料表索引 `date_price`
--
ALTER TABLE `date_price`
  ADD PRIMARY KEY (`year`);

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
-- 資料表索引 `good_deed_test_record`
--
ALTER TABLE `good_deed_test_record`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`l_sid`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `music_category`
--
ALTER TABLE `music_category`
  ADD PRIMARY KEY (`music_type_sid`);

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
-- 資料表索引 `npo_act`
--
ALTER TABLE `npo_act`
  ADD PRIMARY KEY (`sid`),
  ADD KEY `type_sid` (`type_sid`),
  ADD KEY `npo_name_sid` (`npo_name_sid`),
  ADD KEY `place_city` (`place_city`);

--
-- 資料表索引 `npo_act_type`
--
ALTER TABLE `npo_act_type`
  ADD PRIMARY KEY (`typesid`);

--
-- 資料表索引 `npo_name`
--
ALTER TABLE `npo_name`
  ADD PRIMARY KEY (`npo_sid`);

--
-- 資料表索引 `place`
--
ALTER TABLE `place`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `place_city`
--
ALTER TABLE `place_city`
  ADD PRIMARY KEY (`city`),
  ADD KEY `place_city_ibfk_1` (`country_id`);

--
-- 資料表索引 `place_country`
--
ALTER TABLE `place_country`
  ADD PRIMARY KEY (`country`);

--
-- 資料表索引 `place_dist`
--
ALTER TABLE `place_dist`
  ADD PRIMARY KEY (`dist`),
  ADD KEY `place_dist_ibfk_2` (`country_id`);

--
-- 資料表索引 `place_order`
--
ALTER TABLE `place_order`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `reincarnation`
--
ALTER TABLE `reincarnation`
  ADD KEY `member_sid` (`member_sid`);

--
-- 資料表索引 `reincarnation_order`
--
ALTER TABLE `reincarnation_order`
  ADD PRIMARY KEY (`reincarnation_order_sid`);

--
-- 資料表索引 `showcase`
--
ALTER TABLE `showcase`
  ADD PRIMARY KEY (`avatar_id`);

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
-- 使用資料表自動遞增(AUTO_INCREMENT) `body_parts`
--
ALTER TABLE `body_parts`
  MODIFY `parts_sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `city_type`
--
ALTER TABLE `city_type`
  MODIFY `city_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `cube`
--
ALTER TABLE `cube`
  MODIFY `cube_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `cube_category`
--
ALTER TABLE `cube_category`
  MODIFY `cube_style_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `cube_music`
--
ALTER TABLE `cube_music`
  MODIFY `cube_music_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `good_deed_games`
--
ALTER TABLE `good_deed_games`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `good_deed_test_record`
--
ALTER TABLE `good_deed_test_record`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `location`
--
ALTER TABLE `location`
  MODIFY `l_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `music_category`
--
ALTER TABLE `music_category`
  MODIFY `music_type_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `news`
--
ALTER TABLE `news`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `news_tag`
--
ALTER TABLE `news_tag`
  MODIFY `nt_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `npo_act`
--
ALTER TABLE `npo_act`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `npo_act_type`
--
ALTER TABLE `npo_act_type`
  MODIFY `typesid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `npo_name`
--
ALTER TABLE `npo_name`
  MODIFY `npo_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `place`
--
ALTER TABLE `place`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `place_order`
--
ALTER TABLE `place_order`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `reincarnation_order`
--
ALTER TABLE `reincarnation_order`
  MODIFY `reincarnation_order_sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `showcase`
--
ALTER TABLE `showcase`
  MODIFY `avatar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- 資料表的限制式 `place_city`
--
ALTER TABLE `place_city`
  ADD CONSTRAINT `place_city_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `place_country` (`country`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- 資料表的限制式 `place_dist`
--
ALTER TABLE `place_dist`
  ADD CONSTRAINT `place_dist_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `place_country` (`country`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
