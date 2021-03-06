-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-06-13 13:04:58
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
-- 資料表結構 `act_order`
--

CREATE TABLE `act_order` (
  `act_order_sid` int(11) NOT NULL,
  `member_sid` int(11) DEFAULT NULL,
  `last_modified_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `act_order`
--

INSERT INTO `act_order` (`act_order_sid`, `member_sid`, `last_modified_at`) VALUES
(1, 11, '2022-06-10 16:39:11'),
(2, 11, '2022-06-10 16:40:13'),
(3, 52, '2022-06-10 16:44:00'),
(4, 11, '2022-06-11 00:16:55'),
(5, 44, '2022-06-11 00:19:14'),
(6, 76, '2022-06-12 00:50:36'),
(7, 3, '2022-06-13 08:56:13'),
(8, 33, '2022-06-13 08:59:55'),
(9, 23, '2022-06-13 11:23:47');

-- --------------------------------------------------------

--
-- 資料表結構 `act_order_details`
--

CREATE TABLE `act_order_details` (
  `order_create_sid` int(11) NOT NULL,
  `order_sid` int(11) DEFAULT NULL,
  `order_act_sid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `act_order_details`
--

INSERT INTO `act_order_details` (`order_create_sid`, `order_sid`, `order_act_sid`) VALUES
(1, 1, 23),
(2, 1, 24),
(3, 2, 98),
(4, 2, 21),
(5, 2, 75),
(6, 2, 22),
(7, 3, 98),
(8, 3, 21),
(9, 3, 75),
(10, 3, 22),
(11, 4, 98),
(12, 4, 21),
(13, 5, 75),
(14, 5, 22),
(15, 6, 98),
(16, 6, 21),
(17, 7, 25),
(18, 8, 25),
(19, 9, 25);

-- --------------------------------------------------------

--
-- 資料表結構 `body_parts`
--

CREATE TABLE `body_parts` (
  `parts_sid` int(11) NOT NULL,
  `part` varchar(255) DEFAULT NULL,
  `part_id` int(11) DEFAULT NULL,
  `part_cost` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `city_type`
--

CREATE TABLE `city_type` (
  `city_sid` int(11) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `area_sid` int(11) DEFAULT NULL,
  `area_name` varchar(255) DEFAULT NULL
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
  `member_sid` int(11) DEFAULT NULL,
  `cube_sid` int(11) NOT NULL,
  `cube_text` varchar(255) DEFAULT NULL,
  `cube_style_sid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `cube`
--

INSERT INTO `cube` (`member_sid`, `cube_sid`, `cube_text`, `cube_style_sid`) VALUES
(1, 1, '遇見你是我這一生中最美好的事！', 2),
(2, 2, '妳可知道妳的名字解釋了我的一生...', 3),
(3, 3, '讓我再嘗一口秋天的酒，一直往南方開不會太久。', 4),
(4, 4, '你若對自己誠實，日積月累，就無法對別人不忠了。', 5),
(5, 5, '我愛你，我愛你。', 7),
(6, 6, '我們總是記得一些逼自己忘記的事...', 8),
(7, 7, '有你我很開心！', 9),
(8, 8, '下輩子也要當一個柔軟的人，簡稱軟軟人。', 10),
(9, 10, '我和你道歉，也和你道別，再和自己道謝。', 11),
(11, 14, 'YEE', 16);

-- --------------------------------------------------------

--
-- 資料表結構 `cube_category`
--

CREATE TABLE `cube_category` (
  `cube_style_sid` int(11) NOT NULL,
  `cube_img_a` varchar(255) DEFAULT NULL,
  `cube_img_b` varchar(255) DEFAULT NULL,
  `cube_img_c` varchar(255) DEFAULT NULL,
  `cube_img_t` varchar(255) DEFAULT NULL,
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
  `cube_music_type` varchar(255) DEFAULT NULL,
  `cube_music_name` varchar(255) DEFAULT NULL
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
  `price` int(11) DEFAULT NULL
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
  `game_id` int(11) DEFAULT NULL,
  `game_name` varchar(255) DEFAULT NULL,
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
  `member_sid` int(11) DEFAULT NULL,
  `member_account` varchar(255) DEFAULT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `member_birth` date DEFAULT NULL,
  `member_death` date DEFAULT NULL,
  `play_date` datetime DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  `game_score` int(11) DEFAULT NULL
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
  `member_sid` int(11) DEFAULT NULL,
  `member_account` varchar(255) DEFAULT NULL,
  `member_password` int(255) DEFAULT NULL,
  `member_name` int(255) DEFAULT NULL,
  `member_birth` date DEFAULT NULL,
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
  `test_sid` varchar(255) DEFAULT NULL,
  `test_content` varchar(255) DEFAULT NULL,
  `op1_content` varchar(255) DEFAULT NULL,
  `op1_score` int(11) DEFAULT NULL,
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
  `sid` int(11) DEFAULT NULL,
  `member_account` varchar(255) DEFAULT NULL,
  `member_name` varchar(255) DEFAULT NULL,
  `member_birth` date DEFAULT NULL,
  `member_death` date DEFAULT NULL,
  `test_Q1` int(11) DEFAULT NULL,
  `test_Q2` int(11) DEFAULT NULL,
  `test_Q3` int(11) DEFAULT NULL,
  `test_Q4` int(11) DEFAULT NULL,
  `test_Q5` int(11) DEFAULT NULL,
  `test_score` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `good_deed_test_record`
--

INSERT INTO `good_deed_test_record` (`sid`, `member_account`, `member_name`, `member_birth`, `member_death`, `test_Q1`, `test_Q2`, `test_Q3`, `test_Q4`, `test_Q5`, `test_score`) VALUES
(33, 'HappyCat32', '', NULL, NULL, 2, 3, 5, 3, 3, 1203),
(5, 'HappyCat05', '偷尼史塔克 Tony Stark ', '1990-06-14', '2022-06-02', 3, 5, 5, 3, 3, 1417);

-- --------------------------------------------------------

--
-- 資料表結構 `location`
--

CREATE TABLE `location` (
  `l_sid` int(11) NOT NULL,
  `location` varchar(255) DEFAULT NULL
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
  `name` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `deathdate` date DEFAULT NULL,
  `isdead` varchar(255) DEFAULT 'false',
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `account` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `create_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`sid`, `name`, `birthdate`, `deathdate`, `isdead`, `mobile`, `email`, `account`, `password`, `create_at`) VALUES
(1, 'the first cat', NULL, NULL, 'false', '', 'HappyCat01@gmail.com', 'HappyCat01', '$2y$10$AirwXJwahWxsQKJrrmlwE.nFkwin.K3ZR8qJE4HgYgqu4N0MIdb7C', '2022-06-09 05:52:24'),
(2, '貓貓貓', NULL, NULL, 'false', '', 'HappyCat02@gmail.com', 'HappyCat02', '$2y$10$NYuxH3UUfyHRr8yjeDo0Ou/zw83PT/hjbaAwWQ6u.MVlwhS2KMct6', '2022-06-09 05:52:51'),
(3, '九天玄女不在這', NULL, NULL, 'false', '', 'HappyCat03@gmail.com', 'HappyCat03', '$2y$10$QCyABgd5IjBYYmQhnK0bpeBjSOKzSjiPbyI8fFPpV.cBoclFe8f1.', '2022-06-09 05:53:34'),
(4, 'Bible Thumb', NULL, NULL, 'false', '', 'HappyCat04@gmail.com', 'HappyCat04', '$2y$10$xyN7xDkGJ5SustZEWCDyIuA/7RdTp0Y3yg4MhtFPFyzmnmayB9EZC', '2022-06-09 05:54:15'),
(5, '偷尼史塔克 Tony Stark ', '1990-06-14', '2022-06-02', 'false', '0977101050', 'HappyCat05@gmail.com', 'HappyCat05', '$2y$10$sFaM2bucSZ9h0bRb9vXYJuwSy1.YS7eHOutpxih.qfOieXQX1b6ze', '2022-06-09 05:54:42'),
(6, '怎一直下雨', '1990-03-05', '2022-05-31', 'false', '', 'HappyCat06@gmail.com', 'HappyCat06', '$2y$10$KQFhzDlfZFdk.stmlCA7U.il3fDWO2z0kkVzrHuF9SJPIgNXWKAp.', '2022-06-09 05:55:06'),
(7, '趕著投胎', NULL, NULL, 'false', '', 'HappyCat07@gmail.com', 'HappyCat07', '$2y$10$Wy1j.2RcH0cA565y0kP2I.yIGvH8rdoEFXhWRokuDHgOerj1NNG9u', '2022-06-09 05:55:27'),
(8, '咖啡因成癮重症患者', NULL, NULL, 'false', '', 'HappyCat08@gmail.com', 'HappyCat08', '$2y$10$hfdvXtFq2/leKrM2jLXxf.L1YiKAr5wMCq7.rp69fiSgoG3pnJlsK', '2022-06-09 05:55:47'),
(9, '陳怡君', NULL, NULL, 'false', '', 'HappyCat09@gmail.com', 'HappyCat09', '$2y$10$7zyt3mR2ghfGKn9xkEWgdeXlmxoRy4rm3DmrP/3kDFMXoIPPEj/wy', '2022-06-09 05:56:28'),
(10, '總有幾隻貓的', NULL, NULL, 'false', '', 'HappyCat10@gmail.com', 'HappyCat10', '$2y$10$n3p/32p42bi1QqX/U0KjBe4Yb0WdAI.8UaoZH3tiRR8NbBaxHGcOK', '2022-06-09 05:56:51'),
(11, 'unhappy cat', NULL, NULL, 'true', '', 'HappyCat11@gmail.com', 'HappyCat11', '$2y$10$JG.LjNM0flM7vAV8zkh6PO3Hb2bgA3c8xKW83W2qbgJgns/n/Hdoa', '2022-06-09 05:57:16'),
(12, '靈魂急轉彎', '1990-06-15', '2022-06-07', 'false', '', 'HappyCat12@gmail.com', 'HappyCat12', '$2y$10$7.aum6zzCAAX1XsrQyhOf.U8r5MrG586P2fdGiW27WfBOztqK4IHa', '2022-06-09 05:57:37'),
(13, '', NULL, NULL, 'false', '', 'admin@gmail.com', 'Admin', '$2y$10$0DADDxhf55DPxOKcyISJt.L0uHOkeiSh7J/lTqQ73jMYj1qhLBrBW', '2022-06-09 17:51:04'),
(14, '', NULL, NULL, 'false', '', 'HappyCat13@gmail.com', 'HappyCat13', '$2y$10$HX8f.Hc7la1jgapWVPVjtuSJ.RTjTgK9ZohqVUX5ean5kn2.OZgzC', '2022-06-09 19:26:43'),
(15, '', NULL, NULL, 'false', '', 'HappyCat14@gmail.com', 'HappyCat14', '$2y$10$rMPZyA.6wVgZHh2tskYwSOsHd0AiFNAdAU0rD5qS3SM1nZ0NTlsQ6', '2022-06-09 19:27:35'),
(16, '', NULL, NULL, 'false', '', 'HappyCat15@gmail.com', 'HappyCat15', '$2y$10$dIWMYfd8WvjFaDuPfr5FF.gSfzczdVnmuy591Ku3fcPF64e8hbPOO', '2022-06-09 19:28:13'),
(17, '', NULL, NULL, 'false', '', 'HappyCat16@gmail.com', 'HappyCat16', '$2y$10$h6azphKhwhRq8BeaTzAHQeUlH3grQEuFordDuUw2aFIo.EXdKiGmS', '2022-06-09 19:28:38'),
(18, '', NULL, NULL, 'false', '', 'HappyCat17@gmail.com', 'HappyCat17', '$2y$10$Z6UOfMHaJr8dleAdAWixNu6BZNXKK1q6kJofTHiTtnRXJ3./1P5i.', '2022-06-09 19:28:56'),
(19, '', NULL, NULL, 'false', '', 'HappyCat18@gmail.com', 'HappyCat18', '$2y$10$Evne7/6E0Ryb.c.ywAlj/.0zXlPfpvjPIAeWn6WNsu/AweIKcTh9a', '2022-06-09 19:29:10'),
(20, '', NULL, NULL, 'false', '', 'HappyCat19@gmail.com', 'HappyCat19', '$2y$10$oa7Bc0HTZ9dCfoOWxYJNaOomtguDOXlUfwAAQ7n955AFju6ccOIum', '2022-06-09 19:30:27'),
(21, '', NULL, NULL, 'false', '', 'HappyCat20@gmail.com', 'HappyCat20', '$2y$10$dulMYVhaUT8iNiYoUF78Oufc13.1bV7zTcsBlHjH0dtqX2JW1U/yG', '2022-06-09 19:30:39'),
(22, '', NULL, NULL, 'false', '', 'HappyCat21@gmail.com', 'HappyCat21', '$2y$10$agYKF2IL4CKcqQg4MEBqd.Kij2eJYsI2.OVJqRUMzZmeXx2K569Xq', '2022-06-09 19:30:49'),
(23, '', NULL, NULL, 'false', '', 'HappyCat22@gmail.com', 'HappyCat22', '$2y$10$7nvQ.ncWWItOddNTGDUGVOKOOVkKZHcNCiAyk85CjxAyNr9rH6yKK', '2022-06-09 19:31:01'),
(24, '', NULL, NULL, 'false', '', 'HappyCat23@gmail.com', 'HappyCat23', '$2y$10$ZGAPY7FVslnPzu6x63ad9OuyQ0g7ej/g8PDgz/k3p5Kv.WgkTM2N2', '2022-06-09 19:31:12'),
(25, '', NULL, NULL, 'false', '', 'HappyCat24@gmail.com', 'HappyCat24', '$2y$10$BHZAB6wTXsyvQVKz1ggpAOKoyz2aCnF7/tzbaCeZ5xK7pgtKF5c96', '2022-06-09 19:31:23'),
(26, '', NULL, NULL, 'false', '', 'HappyCat25@gmail.com', 'HappyCat25', '$2y$10$KP/vubfTBUf65ziMvrDnTuMTe35AkW9qQ65c0dzGj0G0lr62hRnnW', '2022-06-09 19:31:56'),
(27, '', NULL, NULL, 'false', '', 'HappyCat26@gmail.com', 'HappyCat26', '$2y$10$RP5WMjnK0lRgl2Y84aaZn.Zr9I.fCf5HF8BN1iomUD7v9QB0hSy3u', '2022-06-09 19:32:15'),
(28, '', NULL, NULL, 'false', '', 'HappyCat27@gmail.com', 'HappyCat27', '$2y$10$5446DawwHc8AOJAP1lc2QexLF4y1VNA0F1RN4OM18JcMO3wq/mlqm', '2022-06-09 19:32:46'),
(29, '', NULL, NULL, 'false', '', 'HappyCat28@gmail.com', 'HappyCat28', '$2y$10$8FJiwaznH232h48wk7lHR.uyDJnthf3ADnYsERlTbefUzB.CpoWcu', '2022-06-09 19:32:58'),
(30, '', NULL, NULL, 'false', '', 'HappyCat29@gmail.com', 'HappyCat29', '$2y$10$gP3HIA0EXMDh9qvUJHPQSe/hp2U7qqgaCn9/szImsEsj3sAlwlaEu', '2022-06-09 19:33:10'),
(31, '', NULL, NULL, 'false', '', 'HappyCat30@gmail.com', 'HappyCat30', '$2y$10$OpLdm4HUzxpgmE2AO1.VGuT9LNha8Uf3u7HPr5irykac.IzHsy5oq', '2022-06-09 19:33:22'),
(32, '', NULL, NULL, 'false', '', 'HappyCat31@gmail.com', 'HappyCat31', '$2y$10$otVp1Ic9lSyMKkJPbwJM/ObXPky23VVmAx4UU/OIU9dtUQBYxPCga', '2022-06-09 19:33:35'),
(33, '快 樂 貓', NULL, NULL, 'false', '0988000111', 'HappyCat32@gmail.com', 'HappyCat32', '$2y$10$A4479RQRwSNLT5nSFUCFhecaDcEshF980fhqCE9HzuLjW83GWys1i', '2022-06-09 19:33:49'),
(34, '', NULL, NULL, 'false', '', 'HappyCat33@gmail.com', 'HappyCat33', '$2y$10$nCEH1Lpgv82C.T7HsVbOJOU7Lhhi1I4CAlICGS5NOf/HEyFeclOhm', '2022-06-09 19:34:02'),
(35, '', NULL, NULL, 'false', '', 'HappyCat34@gmail.com', 'HappyCat34', '$2y$10$b6qvb7RlxSExUOPcASuQD.toGgWKuTJlqUQd/fT6nyI3d7Y2km7Pm', '2022-06-09 19:34:29'),
(36, '', NULL, NULL, 'false', '', 'HappyCat35@gmail.com', 'HappyCat35', '$2y$10$vRoey8TpPXJuH5osqirV/OAYl2vtPUYjgpbpSdd4bUENbGHN1gsCK', '2022-06-09 19:34:44'),
(37, '', NULL, NULL, 'false', '', 'HappyCat36@gmail.com', 'HappyCat36', '$2y$10$pM5FXJZl6YpPh/rkP/QXme.4oJa9ZgVZyWeamYUSG1z2VjaUH8/OW', '2022-06-09 19:34:56'),
(38, '', NULL, NULL, 'false', '', 'HappyCat37@gmail.com', 'HappyCat37', '$2y$10$ipQo49pUVhT0sMsEGfn2T.AhffoofpElG.6MoBBnD9FfqkuxutEBa', '2022-06-09 19:35:09'),
(39, '', NULL, NULL, 'false', '', 'HappyCat38@gmail.com', 'HappyCat38', '$2y$10$FZlahkLFTItFsZcL7YEgJOk76E/p7ar4R6XiKBB78C6g3mHFzEevC', '2022-06-09 19:35:22'),
(40, '', NULL, NULL, 'false', '', 'HappyCat39@gmail.com', 'HappyCat39', '$2y$10$OY5sUwd9AsfDjjd1EceA0OFd.ZfEi.GN8jbfQo1Btgqzfeq3MpKSK', '2022-06-09 19:35:40'),
(41, '', NULL, NULL, 'false', '', 'HappyCat40@gmail.com', 'HappyCat40', '$2y$10$gd8dE6FN/DqwapbjZtEN3uu.mfPei6Y0n4g5nqivLFWL1Zw4EoCp.', '2022-06-09 19:35:53'),
(42, '', NULL, NULL, 'false', '', 'HappyCat41@gmail.com', 'HappyCat41', '$2y$10$bd.yjSGmWpAWEiLudnHeRuttOa6Sn54dqtjtDrrwjjxfvd39.zsUu', '2022-06-09 19:36:06'),
(43, '', NULL, NULL, 'false', '', 'HappyCat42@gmail.com', 'HappyCat42', '$2y$10$fEnbjF3O3xyfHQR8WhCgXei3P3CzEu4m/b3eH3L6l0DXqo.UF1E/e', '2022-06-09 19:36:21'),
(44, '', NULL, NULL, 'false', '', 'HappyCat43@gmail.com', 'HappyCat43', '$2y$10$8bM6.kEcw2Rt6yAeS3Tap.tAa/H4w.5lM0GBghC0wsOk11bqlC6tu', '2022-06-09 19:36:33'),
(45, '', NULL, NULL, 'false', '', 'HappyCat44@gmail.com', 'HappyCat44', '$2y$10$Ajm96pUGSvdNpaQWAPyRiuNTt2Xf6r2/Nmf9JgRu4lBTSly3BevE2', '2022-06-09 19:37:33'),
(46, '', NULL, NULL, 'false', '', 'HappyCat45@gmail.com', 'HappyCat45', '$2y$10$xxuG/2G2koeshecupsmbaO3Ro3qnxsACAvQsCQbeuO8wM7LuAJq8O', '2022-06-09 19:37:43'),
(47, '', NULL, NULL, 'false', '', 'HappyCat46@gmail.com', 'HappyCat46', '$2y$10$ij1SYBtEzFnUaJu93aWjhu9xhoEmKnjMwCgjt99VVhK5VHTqUfF/G', '2022-06-09 19:37:55'),
(48, '', NULL, NULL, 'false', '', 'HappyCat47@gmail.com', 'HappyCat47', '$2y$10$Fgw/ds47YItdV5MpXMobnuNGraiUdo7rzImZRYs/Rm42xcsASK2m6', '2022-06-09 19:38:07'),
(49, '', NULL, NULL, 'false', '', 'HappyCat48@gmail.com', 'HappyCat48', '$2y$10$.mrsX56BQMK/xqi2SR6xGOysfnyx0BRkjPaajY0X3AiEaSVW/kgsW', '2022-06-09 19:38:19'),
(50, '', NULL, NULL, 'false', '', 'HappyCat49@gmail.com', 'HappyCat49', '$2y$10$pdsmbCihG98YAGamMQS/F.VWC0ZqZqcStTPRKCX7QzENwNZqsxIlK', '2022-06-09 19:38:30'),
(51, '', NULL, NULL, 'false', '', 'HappyCat50@gmail.com', 'HappyCat50', '$2y$10$.9QHiWdOhPm/vwq2f/XlGOdu/5VSCEftWlxT7T.4D/Q3yv2yY6BYu', '2022-06-09 19:38:42'),
(52, '', NULL, NULL, 'false', '', 'HappyCat51@gmail.com', 'HappyCat51', '$2y$10$6A83d7hqQkRtgTbtiMrGqunUjsiUiHNFe5P/UVA04JXlmJMEtncd6', '2022-06-09 19:38:59'),
(53, '', NULL, NULL, 'false', '', 'HappyCat52@gmail.com', 'HappyCat52', '$2y$10$.9GoHgdzK96cbf3m8gqy1.K6TtepALCRehvCL8VAvYA6fccvs2DBi', '2022-06-09 19:39:10'),
(54, '', NULL, NULL, 'false', '', 'HappyCat53@gmail.com', 'HappyCat53', '$2y$10$SLP40Q0AJ7D4lIdb62sC5OuVQMiy3zqpMgn1ua/ltJ4Ssv5MuwmVa', '2022-06-09 19:39:22'),
(55, '', NULL, NULL, 'false', '', 'HappyCat54@gmail.com', 'HappyCat54', '$2y$10$BdICP6cq1mmSBq2kRKuppuyltkVHhbCtLhTID2rtpqtq6OI0Jf4um', '2022-06-09 19:39:39'),
(56, '', NULL, NULL, 'false', '', 'HappyCat55@gmail.com', 'HappyCat55', '$2y$10$0kU9UB.idFLLuXaoJFB14./NFJPEGlLjPcqqrrb68rC3uR9/zycDe', '2022-06-09 19:39:51'),
(57, '', NULL, NULL, 'false', '', 'HappyCat56@gmail.com', 'HappyCat56', '$2y$10$fYDIgfNbawaKuf.XHS9jae8zvNqG050SMoUv2hTz3Yo5dSV7zK646', '2022-06-09 19:40:13'),
(58, '', NULL, NULL, 'false', '', 'HappyCat57@gmail.com', 'HappyCat57', '$2y$10$8JZEm/4C3NE9nPUb4gC/AeYXmviYGHfIkGf9BkLRztOF4SsvpVA42', '2022-06-09 19:40:26'),
(59, '', NULL, NULL, 'false', '', 'HappyCat58@gmail.com', 'HappyCat58', '$2y$10$trfGqH3BxYf.5h6111Jngeg476d/wI/lFdQ2/OumhqJv8QVgsDHpu', '2022-06-09 19:40:39'),
(60, '', NULL, NULL, 'false', '', 'HappyCat59@gmail.com', 'HappyCat59', '$2y$10$Z8IDndgNS/kwSrNAHt1xd.X.3DL4jKZ28RUHylFiTFpWzRofjkrwO', '2022-06-09 19:40:50'),
(61, '', NULL, NULL, 'false', '', 'HappyCat60@gmail.com', 'HappyCat60', '$2y$10$SPM8Ftb51pzdpG3GJPoAjuqYPHztHo/uR2QpUFLgB/oUK2dDzSofe', '2022-06-09 19:41:03'),
(62, '', NULL, NULL, 'false', '', 'HappyCat61@gmail.com', 'HappyCat61', '$2y$10$k1H9MnKnudr76CJ/3Axlt.rHyDyNx1wgpll/lBOakJXNuamFeNoRi', '2022-06-09 19:41:14'),
(63, '', NULL, NULL, 'false', '', 'HappyCat62@gmail.com', 'HappyCat62', '$2y$10$hdqf0iZw9NSTAON89V6QCOtv7I7Q2QjvQKv9Sp6naHSfTNeeFSaiS', '2022-06-09 19:41:34'),
(64, '', NULL, NULL, 'false', '', 'HappyCat63@gmail.com', 'HappyCat63', '$2y$10$5oA0Xn9p6KzH1Zz0axO2ceUQjYUbsnsQaeZ.roI37dEw5xmGnwqMK', '2022-06-09 19:42:03'),
(65, '', NULL, NULL, 'false', '', 'HappyCat64@gmail.com', 'HappyCat64', '$2y$10$AFKm3fddtESWbIOJoHY5peSpHWOUBTHDG90HiR3/k2z/gj.KUaR7K', '2022-06-09 19:42:22'),
(66, '', NULL, NULL, 'false', '', 'HappyCat65@gmail.com', 'HappyCat65', '$2y$10$kBCZt1NkU3ESn9sLl.jjLuF7WvWnIgced4J6Pjqqc6Cnjq9TWypc.', '2022-06-09 19:42:33'),
(67, '', NULL, NULL, 'false', '', 'HappyCat66@gmail.com', 'HappyCat66', '$2y$10$juJHFomlxpWf4eLQXQNzLOMmYISl8e.XZuhhp9fSvw6jxJ9BV6KZ2', '2022-06-09 19:42:45'),
(68, '', NULL, NULL, 'false', '', 'HappyCat67@gmail.com', 'HappyCat67', '$2y$10$tzu3RhCxRXFl8fmQIafCD.XnW3tdZU/.T.RGyU5hnRjK0af.INstC', '2022-06-09 19:42:59'),
(69, '', NULL, NULL, 'false', '', 'HappyCat68@gmail.com', 'HappyCat68', '$2y$10$uqjh2NeH.cgF8GJwNr2dJecRZIt5Z6TsLOrqCwarcAOVqWO3XGwsu', '2022-06-09 19:43:29'),
(70, '', NULL, NULL, 'false', '', 'HappyCat69@gmail.com', 'HappyCat69', '$2y$10$.OSdRIt/R9NWruh3gIex8.BN3OcL65SIsUhaMLI86efaai5D.ZdEq', '2022-06-09 19:43:40'),
(71, '', NULL, NULL, 'false', '', 'HappyCat70@gmail.com', 'HappyCat70', '$2y$10$FvdIZpomJviDE.shvxSrBeiXhxVQs7pOg1Qf3SedRdzE1IqaYT4Em', '2022-06-09 19:43:56'),
(72, '', NULL, NULL, 'false', '', 'HappyCat71@gmail.com', 'HappyCat71', '$2y$10$49yU4rxHhgYbZGe1PH5Mbe31u9ydRwbsNnAdmplkl4bCpAaQ3MXh.', '2022-06-09 19:44:09'),
(73, '', NULL, NULL, 'false', '', 'HappyCat72@gmail.com', 'HappyCat72', '$2y$10$jF7H..8R7I4sx31c3hwjlOK710iPlPr5pd3WsQc5MC7PlllMU6/2O', '2022-06-09 19:44:18'),
(74, '', NULL, NULL, 'false', '', 'HappyCat73@gmail.com', 'HappyCat73', '$2y$10$G4L6kn4WcjefItdFz2KdpebL7WVJpbbOW/edLZ2v/zFXlbkjyxZoG', '2022-06-09 19:44:32'),
(75, '', NULL, NULL, 'false', '', 'HappyCat74@gmail.com', 'HappyCat74', '$2y$10$QKcXwYG1245itLJPsXeSTOqwtCXsaTiod0T4cXu84uGtQwdCVsFzW', '2022-06-09 19:44:43'),
(76, '', NULL, NULL, 'false', '', 'HappyCat75@gmail.com', 'HappyCat75', '$2y$10$duWwdsiBLafSbtntJcpnFO2ekTEr9cLRZ/IL1AK7inXXOEOpSWl5G', '2022-06-09 19:44:54'),
(77, '', NULL, NULL, 'false', '', 'HappyCat76@gmail.com', 'HappyCat76', '$2y$10$k2M5XoSSkzSR57r3zPeB/eQTe.1FxwU2fBD1gW0lAhmUl/CSNF..e', '2022-06-09 19:45:04'),
(78, '', NULL, NULL, 'false', '', 'HappyCat77@gmail.com', 'HappyCat77', '$2y$10$YQ4TK7JVPWOdMJOty61I8O172FYdC1WTI8xFRpUMrl.pzx8q5Rztu', '2022-06-09 19:45:15'),
(79, '', NULL, NULL, 'false', '', 'HappyCat78@gmail.com', 'HappyCat78', '$2y$10$6yKR6oZQ63JD3seB2YV5a.8l4EgYY8JeMAca/LF40it88ajGA0PTi', '2022-06-09 19:45:26'),
(80, '', NULL, NULL, 'false', '', 'HappyCat79@gmail.com', 'HappyCat79', '$2y$10$5J0OZ/SAdIT6xL3qRF1I2.KenZNjxaCUzmFTo.73JiYobvByemQ16', '2022-06-09 19:45:36'),
(81, '', NULL, NULL, 'false', '', 'HappyCat80@gmail.com', 'HappyCat80', '$2y$10$mC5PqOLTH2vBX.38RuB.5eg0PS1CGYmlAqJutcEKBq0sahcsZbJKK', '2022-06-09 19:45:48'),
(82, '', NULL, NULL, 'false', '', 'HappyCat81@gmail.com', 'HappyCat81', '$2y$10$xQNe9Q2hO5hkLZjL/JYKJelEW8yTtUipcJv5HnNLJk6UnXt.F5sp.', '2022-06-09 19:46:00'),
(83, '', NULL, NULL, 'false', '', 'HappyCat82@gmail.com', 'HappyCat82', '$2y$10$bGqXt7.kSjEPaW.W06CU4u492AQEZIXNyvTA7GXxuNP8p5jeW800G', '2022-06-09 19:46:10'),
(84, '', NULL, NULL, 'false', '', 'HappyCat83@gmail.com', 'HappyCat83', '$2y$10$rCgyBnD0GXEiI3FuedDzReGTeWgy6znclo7F9h6FYgJBiv/Z2w0E6', '2022-06-09 19:46:22'),
(85, '', NULL, NULL, 'false', '', 'HappyCat84@gmail.com', 'HappyCat84', '$2y$10$pPIOMPi3yXXgW.RrUDnlQOTbXTe2PQux64XTDJF5.w.ZTrn24i1Le', '2022-06-09 19:46:35'),
(86, '', NULL, NULL, 'false', '', 'HappyCat85@gmail.com', 'HappyCat85', '$2y$10$aq2q/rDhcAodrii0LuSyi..BzMdvf6BaqARpU1Ws5CSuQ53R6WHVC', '2022-06-09 19:46:45'),
(87, '', NULL, NULL, 'false', '', 'HappyCat86@gmail.com', 'HappyCat86', '$2y$10$Aw5ji0J7d2lwsfiPvtD2peiN972QtXx4xs1vkRWAX6xyNm8mYnIXG', '2022-06-09 19:47:16'),
(88, '', NULL, NULL, 'false', '', 'HappyCat87@gmail.com', 'HappyCat87', '$2y$10$xoIBgG/eLLQkT7gWnaPOieLStDlCdJLvsUbLoKR52PsV4sZydKtkC', '2022-06-09 19:47:30'),
(89, '', NULL, NULL, 'false', '', 'HappyCat88@gmail.com', 'HappyCat88', '$2y$10$VYbXm4J.SP3xwioUQY62JOu3R.q9AVuFBk3u7IDCrp5BV0U1BquBO', '2022-06-09 19:47:44'),
(90, '', NULL, NULL, 'false', '', 'HappyCat89@gmail.com', 'HappyCat89', '$2y$10$UfSIVdnMzRG/GIh0XZhvpO6BJ2k1GEF0IzbVP9pUdMpwwJHJlDaCe', '2022-06-09 19:47:59'),
(91, '', NULL, NULL, 'false', '', 'HappyCat90@gmail.com', 'HappyCat90', '$2y$10$PxsVj0OwAqHrZdmzgofzH.ubkfJEwr8rNHF.KMcY1JL1kKwnwa/4e', '2022-06-09 19:48:11'),
(92, '', NULL, NULL, 'false', '', 'HappyCat91@gmail.com', 'HappyCat91', '$2y$10$Pcj0QNHU6KzdATk1wXrVP.mLvs5Il/.Dh5Q2BcAsWsZFZJxxDH8VK', '2022-06-09 19:48:30'),
(93, '', NULL, NULL, 'false', '', 'HappyCat92@gmail.com', 'HappyCat92', '$2y$10$VP1S3X5Cs4y0nb1d7Dij6exD/6.GmlbrvxipVAfY9GvmdoycXp49C', '2022-06-09 19:48:42'),
(94, '', NULL, NULL, 'false', '', 'HappyCat93@gmail.com', 'HappyCat93', '$2y$10$vWd4ghdJ/uvgCItzwJT4muZzJwPpQdNgF79WgKdIPFYV9qOTbF15y', '2022-06-09 19:49:07'),
(95, '', NULL, NULL, 'false', '', 'HappyCat94@gmail.com', 'HappyCat94', '$2y$10$vW/zubmPsnn83grTYA63mOLLN0QMEZ9HVZ6ODp9Lgkp/VjyZZKoOC', '2022-06-09 19:49:23'),
(96, '', NULL, NULL, 'false', '', 'HappyCat95@gmail.com', 'HappyCat95', '$2y$10$6kY58NIrhoOMO44E4ESlsO.5Oc64Y1OYDZ4qXHKhlYTh1tO4Y.doa', '2022-06-09 19:49:37'),
(97, '', NULL, NULL, 'false', '', 'HappyCat96@gmail.com', 'HappyCat96', '$2y$10$I2JM6zs.tvk5CmaHCoIW.ei6Hi2ruz9TWydbeAN/6Mg9qSO8bC1J6', '2022-06-09 19:49:49'),
(98, '', NULL, NULL, 'false', '', 'HappyCat97@gmail.com', 'HappyCat97', '$2y$10$ioWw7u0Zk5l7C/1UDjQPt.01/3bOL5LPqIPVqYKLtWYuZ8H/0bTIq', '2022-06-09 19:49:59'),
(99, '', NULL, NULL, 'false', '', 'HappyCat98@gmail.com', 'HappyCat98', '$2y$10$.CdtzoocaY4YOYIxkxm6j.B5QeG01NbHPhwXkQrWB9L7NwUVjRG3S', '2022-06-09 19:50:09'),
(100, '', NULL, NULL, 'false', '', 'HappyCat99@gmail.com', 'HappyCat99', '$2y$10$Aaoh2lzg8fPn4Mb/ScmnEOhglXdwr8mLL0hf4CY3X4A.BC8tLIo3y', '2022-06-09 19:50:20'),
(101, '快樂貓', NULL, NULL, 'false', '0900111222', 'HappyCat100@gmail.com', 'HappyCat100', '$2y$10$RscDUr0vT/ndUx9ndYpvNe49wvxixQYYBQmL7rUNP1frBs/Tc9FVG', '2022-06-09 19:51:04'),
(102, '涼枕', '1993-03-08', '2022-03-08', 'true', '0955667788', 'coolpilla@ggqq.com', 'coolpillow', '$2y$10$a11J3a0Jruj0y2dr3z2vYuYaqwMt4QB/puKbyQxphIJRc8t5tuZce', '2022-06-10 13:35:14'),
(104, NULL, NULL, NULL, 'false', NULL, 'CarCat999@gmail.com', 'CarCat999', '$2y$10$Dz/WmrGg/nerW7t/sJmfaumz64j26FVWD6BzWmWZGBmcRbohmdSy6', '2022-06-13 04:51:54');

-- --------------------------------------------------------

--
-- 資料表結構 `music_category`
--

CREATE TABLE `music_category` (
  `music_type_sid` int(11) NOT NULL,
  `music_type_en` varchar(255) DEFAULT NULL,
  `music_type_ch` varchar(255) DEFAULT NULL
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
  `topic` varchar(255) DEFAULT NULL,
  `event_time` date DEFAULT NULL,
  `type_sid` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `location_sid` int(11) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
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
  `news_sid` int(11) DEFAULT NULL,
  `tag_sid` int(11) DEFAULT NULL
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
(225, 26, 28),
(226, 27, 1),
(227, 27, 2),
(229, 28, 1),
(230, 28, 2),
(231, 28, 3),
(232, 28, 4),
(233, 28, 5),
(234, 28, 6),
(235, 28, 7),
(236, 28, 12),
(237, 28, 29);

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
  `npo_name` varchar(255) DEFAULT NULL,
  `act_title` varchar(255) DEFAULT NULL,
  `place_city` int(11) DEFAULT NULL,
  `place_other` varchar(255) DEFAULT NULL,
  `limit_num` int(255) DEFAULT NULL,
  `intro` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `npo_act`
--

INSERT INTO `npo_act` (`sid`, `img`, `type_sid`, `price`, `value`, `start`, `end`, `npo_name`, `act_title`, `place_city`, `place_other`, `limit_num`, `intro`) VALUES
(22, 'e1c47a4f835af1a4a8588a048692bf3e.jpg', 3, 100, 50, '2022-07-14 21:02:00', '2022-07-22 22:52:00', '華山基金會', '「疫」起助老-愛心義賣活動', 16, '中正路420號7樓', 3, '※因現場人員需處理照護動物工作，場地/導覽人員人力有限，本會將視天候狀況及人力狀況審核是否同意志工服務，若天候不佳或是已有團體預約，就需要另擇他日喔!'),
(23, 'bbaaff96e911967b5cbba0f7bcaf5bec.jpg', 3, 100, 50, '2022-06-11 21:02:00', '2022-07-22 22:52:00', '華山基金會', '家庭照顧者支持計畫', 2, '文山區萬和街6號4樓', 15, '1. 以弱勢社區及服務據點所提出的需求提供服務，並體驗當地生活和文化。\r\n2. 協助當地教學、活動帶領等為主，服務內容依實際狀況調整。'),
(24, '5006073f5e1f9384b0f52ba001a41e7d.jpg', 3, 200, 50, '2022-07-22 21:02:00', '2022-07-21 22:52:00', '中華長照協會', 'for one挺好：「食物銀行。送愛」', 2, '中華路一段', 10, '服務內容：\r\n1.關懷服務：電話問安、送餐服務及社區關懷活動。\r\n2.陪伴服務：陪同就醫、讀報、陪伴運動及陪伴至社區或據點參與活動等服務。'),
(28, 'fbed9f64033cae7b8231c51e3cb1f383.png', 5, 50, 50, '2022-07-13 21:02:00', '2022-06-22 22:53:00', '愛盲基金會', '「看不見，我努力」為視多障者加油！', 4, '大溪老街', 4, '今年度，中心想透過志工協同領導的模式，由一位志工搭配 4 名身障者組成小隊，活動期間陪伴身障者於大溪老街中完成任務，中心期待透過此模式，增加身障者與一般民眾的接觸，雙方能夠進行良性互動，進而提升一般民眾對於身障者的認知，亦透過數位遊戲作為媒介，促使身心障礙者能活用網路科技、學習團隊合作、培養社會參與意識。'),
(30, '321935d2d13d2d0bd2802b2e814a99a3.jpg', 6, 50, 50, '2022-06-29 21:02:00', '2022-06-18 22:53:00', '財團法人桃園市私立寶貝潛能發展中心', '伴弱勢癌友翻轉抗癌路', 2, '大安區敦化南路一段233巷28號B1台北愛樂文教基金會', 40, 'TICF18台北國際合唱音樂節規模龐大，涵蓋20餘場大小音樂會、4項合唱專業課程及首屆台北國際合唱大賽。行政團隊計畫培養節慶活動之幕後籌備人才，歡迎熱愛藝文活動的你/妳，加入我們一起來完成今夏亞洲最具規模的合唱盛事！'),
(75, '052b5b84c830e59e7d4afadc2069f676.jpg', 2, 50, 50, '2022-06-22 21:02:00', '2022-07-15 21:02:00', '荒野保護協會', '一起手護台灣', 16, '國聖燈塔', 100, '會提供手套和垃圾袋，保險自理、自行攜帶飲用水 (盡量避免保特瓶或手搖飲)\r\nP.S我們民眾自發性舉辦的活動，故無法提供志工時數或感謝狀唷'),
(102, 'ac669e5a675d1792f7af5b619fc6670c.jpg', 6, 200, 50, '2022-06-22 09:00:00', '2022-06-22 18:00:00', '台灣圖書室文化協會', '中部地區電話協談志工培訓', 15, '中正路420號7樓', 30, NULL),
(103, '1a52ae873b4110a331d26c170544dc5b.jpg', 1, 100, 250, '2022-06-30 07:34:00', '2022-07-07 07:34:00', '荒野保護協會', '淨灘一起GO', 9, '濱海公路', 100, NULL),
(104, '15f6e95a3287913a5eccfad23daf8d60.jpg', 1, 150, 200, '2022-06-29 06:35:00', '2022-06-30 06:35:00', '荒野保護協會', '海好有你 淨栗守護海洋', 18, '三仙台遊憩區', 100, NULL),
(105, '9568610dfbc0a7584e24aaa79d325b2e.jpg', 4, 100, 100, '2022-06-28 09:00:00', '2022-06-28 17:00:00', '台灣全國兒少安置機構聯盟', '兒童權利教育志工', 21, '中正路694巷1弄3號', 5, NULL),
(106, '3dbcc9393f53485faed46b0042150001.png', 2, 10, 10, '2022-06-22 11:26:00', '2022-06-30 11:26:00', '荒野保護協會', '咪咪', 15, '拉拉', 10, NULL),
(107, '53602e395f4d6f31e1b4a3e0ef9662c2.png', 1, 100, 500, '2022-06-09 14:52:00', '2022-06-21 15:56:00', 'asdasdas', 'asdasdasdas', 17, 'asdasdsadas', 11, NULL),
(108, 'c5c9b1bdc76cd324c535c7e0d9bd245a.jpg', 5, 100000, 0, '2022-06-15 03:03:00', '2022-06-27 03:01:00', '荒野保護協會', '二路兇一點好不好', 7, '111', 1, NULL),
(109, 'c5c9b1bdc76cd324c535c7e0d9bd245a.jpg', 5, 100000, 0, '2022-06-15 03:03:00', '2022-06-27 03:01:00', '愛盲基金會', '二路兇一點好不好', 7, '111', 1, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `npo_act_type`
--

CREATE TABLE `npo_act_type` (
  `typesid` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
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
  `npo_img` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `npo_intro` varchar(255) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `npo_name`
--

INSERT INTO `npo_name` (`npo_sid`, `npo_name`, `npo_img`, `email`, `phone`, `mobile`, `npo_intro`, `create_at`) VALUES
(4, '陽光社會福利基金會', '20cf1ded90114f8006b46904ce7e981e.png', 'awslfkdnwqfkj@gmail.com', 25513456, '', '', '2022-05-15 21:02:00'),
(67, '財團法人桃園市私立寶貝潛能發展中心', 'b7613770120accced6b0e760c53af9ee.jpg', '123@yahoo.com.tw', 29901234, '0912095815', '之所以名為「寶貝」是意謂著每一個孩子都是我們的寶貝，我們真心疼愛每一個孩子，也希望每一個身心障礙的孩子都能得到良好的照顧。', '2022-06-01 23:59:07'),
(85, '華山基金會', 'e6468e81e9f99248127f02ce35743dea.jpg', '788221sfs@yahoo.com.tw', NULL, '0978456123', '華山基金會於1999年正式成立，投入三失(失能、失依、失智)老人免費到宅服務。 \r\n目前於台澎金馬設有約 400 個社區愛心天使站，服務近 3 萬名弱勢長輩。 ', '2022-06-12 01:26:55'),
(86, '中華長照協會', 'f5f4ad87475efb5fd103b53bcc9eda9a.png', '456213@yahoo.com.tw', NULL, '0975645871', '中華長照協會旨在提供完善之長照服務，以解決家屬之照顧負擔與現今高齡化、獨居依等社會問題，建構幼有所長、壯有所用、老有所終之良善社會。', '2022-06-12 01:34:34'),
(87, '愛盲基金會', '607897f2760ef943e495337671590bd8.png', '45622@yahoo.com.tw', 0, '0954678541', '財團法人愛盲基金會正式成立於民國八十年(1991年)底，原隸屬台北市政府教育局，八十六年(1997年)底改制為全國性的社會福利團體，九十五年改隸於內政部，一O二年八月主管機關改為「衛生福利部社會及家庭署」，是國內第一個為視覺障礙朋友以及其他身障朋友，在文教、職訓與視障福利政策方面，提供全面性服務與前瞻性規劃的基金會。', '2022-06-12 02:01:12'),
(88, '台灣圖書室文化協會', '011d477857868aeedab2a26c1efe410c.jpg', 'adads@gmail.com', NULL, '0912645789', '1995年7月1日，當時任職省立嘉義醫院的張宏榮醫師與朋友們在嘉義市中正路成立台灣圖書室，聚集關心台灣本土文化的朋友一起舉辦讀書會與文化講座，而後於1997年底隨著張宏榮醫師返回屏東故里服務，圖書室因而結束營運。', '2022-06-12 02:04:42'),
(89, '台灣全國兒少安置機構聯盟', '314715dd85c4deaae4fbe4a4b7a3a39a.jpg', '4562sfsv@gmail.com', 0, '0915478645', '我們以自律、平等、共學、共好為價值主張，期待透過安置機構間的串聯交流倡議完善安置政策環境，成為兒少保護的最後一道防線，不漏接任何一個孩子。郵政信箱23599中和郵局3-91號信箱', '2022-06-12 02:35:35'),
(90, '瞇瞇瞇', 'ab3b2c7f994ff2f38f2e6633215fd804.png', '000@gmail.com', NULL, '', '', '2022-06-13 11:25:07'),
(91, '二路兇一點協會', 'c7401e31f9a22748ea1d7c413245542a.jpg', 'nievesQQ@gmail.com', NULL, '0912345678', '二路兇一點', '2022-06-13 13:02:41');

-- --------------------------------------------------------

--
-- 資料表結構 `place`
--

CREATE TABLE `place` (
  `sid` int(11) NOT NULL,
  `year` year(4) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `country` varchar(225) DEFAULT NULL,
  `city` varchar(225) DEFAULT NULL,
  `dist` varchar(225) DEFAULT NULL,
  `quota` int(11) DEFAULT NULL,
  `booked` int(11) DEFAULT NULL,
  `place_price` int(11) DEFAULT 200
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `place`
--

INSERT INTO `place` (`sid`, `year`, `month`, `country`, `city`, `dist`, `quota`, `booked`, `place_price`) VALUES
(13, 2022, 12, '美國', '加州', '聖荷西', 2, 1, 200),
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
(66, 2055, 9, '台灣', '台南市', '仁德區', 5, 2, 200),
(67, 2023, 3, '美國', '加州', '舊金山', 2, 0, 200),
(68, 2023, 12, '台灣', '宜蘭縣', '羅東鎮', 3, 1, 200),
(69, 2026, 8, '台灣', '台中市', '西區', 3, 1, 200),
(70, 2032, 7, '台灣', '新北市', '蘆洲區', 2, 0, 200),
(71, 2029, 5, '台灣', '高雄市', '左營區', 2, 0, 200),
(72, 2032, 7, '台灣', '新竹縣', '竹北市', 4, 1, 200),
(73, 2043, 8, '台灣', '宜蘭縣', '羅東鎮', 2, 0, 200),
(74, 2047, 1, '台灣', '高雄市', '三民區', 4, 2, 200),
(75, 2057, 9, '台灣', '桃園市', '中壢區', 3, 0, 200),
(76, 2122, 1, '台灣', '新北市', '三重區', 2, 0, 200),
(77, 2032, 12, '台灣', '台中市', '豐原區', 2, 0, 200),
(78, 2024, 5, '台灣', '高雄市', '左營區', 2, 1, 200),
(79, 2022, 12, '台灣', '新北市', '三重區', 2, 0, 200),
(80, 2022, 11, '台灣', '新北市', '三峽區', 2, 1, 200),
(81, 2022, 10, '台灣', '新竹縣', '竹北市', 3, 1, 200),
(82, 2030, 2, '美國', '加州', '聖地牙哥', 2, 0, 200),
(84, 2022, 11, '美國', '加州', '聖荷西', 3, 0, 200),
(85, 2022, 11, '台灣', '桃園市', '中壢區', 5, 1, 200);

-- --------------------------------------------------------

--
-- 資料表結構 `place_city`
--

CREATE TABLE `place_city` (
  `country_id` varchar(225) DEFAULT NULL,
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
  `country_price` int(11) DEFAULT NULL
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
  `country_id` varchar(225) DEFAULT NULL,
  `city_id` varchar(225) DEFAULT NULL,
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
  `member_sid` varchar(225) CHARACTER SET utf8mb4 DEFAULT NULL,
  `place_sid` int(225) DEFAULT NULL,
  `date_price` int(11) DEFAULT NULL,
  `place_price` int(11) DEFAULT NULL,
  `created_date` date DEFAULT current_timestamp()
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
(29, '12', 4, 50, 150, '2022-06-12'),
(33, '3', 2, 50, 150, '2022-06-13'),
(34, '33', 5, 50, 150, '2022-06-13'),
(36, '23', 6, 50, 150, '2022-06-13');

-- --------------------------------------------------------

--
-- 資料表結構 `reincarnation`
--

CREATE TABLE `reincarnation` (
  `member_sid` int(11) DEFAULT NULL,
  `soul_id` int(11) DEFAULT NULL,
  `generation` int(11) DEFAULT 0
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
  `order_id` varchar(255) DEFAULT NULL,
  `member_sid` int(11) DEFAULT NULL,
  `avatar_id` int(11) DEFAULT NULL,
  `time_id` date DEFAULT NULL,
  `place_id` varchar(255) DEFAULT NULL,
  `avatar_price` int(11) DEFAULT NULL,
  `time_price` int(11) DEFAULT NULL,
  `place_price` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT 0,
  `order_datetime` datetime DEFAULT NULL,
  `order_last_modified_datetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `showcase`
--

CREATE TABLE `showcase` (
  `avatar_id` int(11) NOT NULL,
  `member_sid` int(11) DEFAULT NULL,
  `avatar_created_at` datetime DEFAULT NULL,
  `combination` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `showcase`
--

INSERT INTO `showcase` (`avatar_id`, `member_sid`, `avatar_created_at`, `combination`) VALUES
(15, 33, '2022-06-11 09:24:23', '{\"eyes\":\"0\",\"nose\":\"0\",\"mouth\":\"0\",\"ear\":\"0\",\"hair\":\"0\",\"eyesColor\":\"0\",\"noseColor\":\"2\",\"mouthColor\":\"5\",\"earColor\":\"4\",\"hairColor\":\"6\"}'),
(16, 69, '2022-06-11 22:39:42', '{\"eyes\":\"2\",\"nose\":\"0\",\"mouth\":\"0\",\"ear\":\"0\",\"hair\":\"1\",\"eyesColor\":\"4\",\"noseColor\":\"0\",\"mouthColor\":\"3\",\"earColor\":\"4\",\"hairColor\":\"5\"}'),
(17, 28, '2022-06-11 22:49:06', '{\"eyes\":\"2\",\"nose\":\"0\",\"mouth\":\"0\",\"ear\":\"0\",\"hair\":\"0\",\"eyesColor\":\"1\",\"noseColor\":\"1\",\"mouthColor\":\"0\",\"earColor\":\"0\",\"hairColor\":\"5\"}'),
(18, 28, '2022-06-11 22:49:24', '{\"eyes\":\"3\",\"nose\":\"0\",\"mouth\":\"0\",\"ear\":\"0\",\"hair\":\"0\",\"eyesColor\":\"6\",\"noseColor\":\"5\",\"mouthColor\":\"5\",\"earColor\":\"5\",\"hairColor\":\"1\"}'),
(19, 3, '2022-06-13 08:53:27', '{\"eyes\":\"0\",\"nose\":\"0\",\"mouth\":\"0\",\"ear\":\"0\",\"hair\":\"0\",\"eyesColor\":\"0\",\"noseColor\":\"0\",\"mouthColor\":\"0\",\"earColor\":\"0\",\"hairColor\":\"0\"}'),
(20, 3, '2022-06-13 08:53:34', '{\"eyes\":\"1\",\"nose\":\"0\",\"mouth\":\"0\",\"ear\":\"0\",\"hair\":\"0\",\"eyesColor\":\"0\",\"noseColor\":\"0\",\"mouthColor\":\"5\",\"earColor\":\"0\",\"hairColor\":\"0\"}'),
(21, 3, '2022-06-13 08:53:42', '{\"eyes\":\"1\",\"nose\":\"0\",\"mouth\":\"0\",\"ear\":\"1\",\"hair\":\"0\",\"eyesColor\":\"0\",\"noseColor\":\"0\",\"mouthColor\":\"4\",\"earColor\":\"0\",\"hairColor\":\"0\"}'),
(23, 23, '2022-06-13 11:18:40', '{\"eyes\":\"1\",\"nose\":\"0\",\"mouth\":\"0\",\"ear\":\"0\",\"hair\":\"0\",\"eyesColor\":\"8\",\"noseColor\":\"0\",\"mouthColor\":\"0\",\"earColor\":\"0\",\"hairColor\":\"0\"}'),
(24, 23, '2022-06-13 11:18:49', '{\"eyes\":\"1\",\"nose\":\"0\",\"mouth\":\"0\",\"ear\":\"0\",\"hair\":\"2\",\"eyesColor\":\"0\",\"noseColor\":\"0\",\"mouthColor\":\"4\",\"earColor\":\"0\",\"hairColor\":\"9\"}');

-- --------------------------------------------------------

--
-- 資料表結構 `tag`
--

CREATE TABLE `tag` (
  `tg_sid` int(11) NOT NULL,
  `tag_name` varchar(255) DEFAULT NULL
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
(28, '生存挑戰'),
(29, 'hello');

-- --------------------------------------------------------

--
-- 資料表結構 `type`
--

CREATE TABLE `type` (
  `ty_sid` int(11) NOT NULL,
  `type_name` varchar(255) DEFAULT NULL
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
-- 資料表索引 `act_order`
--
ALTER TABLE `act_order`
  ADD PRIMARY KEY (`act_order_sid`);

--
-- 資料表索引 `act_order_details`
--
ALTER TABLE `act_order_details`
  ADD PRIMARY KEY (`order_create_sid`);

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
-- 使用資料表自動遞增(AUTO_INCREMENT) `act_order`
--
ALTER TABLE `act_order`
  MODIFY `act_order_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `act_order_details`
--
ALTER TABLE `act_order_details`
  MODIFY `order_create_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `cube_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
-- 使用資料表自動遞增(AUTO_INCREMENT) `location`
--
ALTER TABLE `location`
  MODIFY `l_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `music_category`
--
ALTER TABLE `music_category`
  MODIFY `music_type_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `news`
--
ALTER TABLE `news`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `news_tag`
--
ALTER TABLE `news_tag`
  MODIFY `nt_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `npo_act`
--
ALTER TABLE `npo_act`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `npo_act_type`
--
ALTER TABLE `npo_act_type`
  MODIFY `typesid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `npo_name`
--
ALTER TABLE `npo_name`
  MODIFY `npo_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `place`
--
ALTER TABLE `place`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `place_order`
--
ALTER TABLE `place_order`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `reincarnation_order`
--
ALTER TABLE `reincarnation_order`
  MODIFY `reincarnation_order_sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `showcase`
--
ALTER TABLE `showcase`
  MODIFY `avatar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `tag`
--
ALTER TABLE `tag`
  MODIFY `tg_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
