-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-06-10 08:04:10
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
  `member_password` varchar(255) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `member_birth` date NOT NULL,
  `member_death` date DEFAULT NULL,
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
  `password` char(32) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`sid`, `name`, `birthdate`, `deathdate`, `mobile`, `email`, `account`, `password`, `create_at`) VALUES
(1, 'maxine_is_admin_', '1980-01-01', NULL, '0988-111-000', 'maxine_0207@gmail.com', 'maxine_0207', '1de6efd4572e1c0dd05495d2935216c0', '2022-06-06 19:22:49'),
(2, '甜 貓', '2007-03-03', '2021-07-12', '', 'honey0303@yahoo.com.tw', 'Honey99', '7e0fd52db41fe0bfb384857da839f67d', '2022-06-06 19:26:24'),
(3, '九天玄女不在這', '1900-01-01', NULL, '', 'fairy9@gmail.com', 'fairy9isnothere', 'a69e4c33b6c4c37e7b8c094f021a0a47', '2022-06-06 19:33:14'),
(4, ' Bible Thumb', '1991-06-06', '2011-06-06', '0977223456', 'tears_countless@gmail.com', 'tearsInHeaven', 'afdd0b4ad2ec172c586e2150770fbf9e', '2022-06-06 19:35:36'),
(5, 'Tony Stark', '1970-05-29', '2023-04-24', '', 'ForeverIronMan@gmail.com', 'TonyStark', '97880452976cc3f2d426bc5dfb655f00', '2022-06-06 19:39:50'),
(6, '怎一直下雨', '1994-06-07', NULL, '0912-338-775', '_NoMoreRainyDay_@gmail.com', 'NoMoreRainyDay', '229c3f7e7b9c1be5bfa2f46d90c4ab00', '2022-06-06 19:45:13'),
(7, '趕著投胎', '1997-07-07', '2020-07-07', '', 'cometodie@gmail.com', 'c0met0die', '5fb6e2a60c9da41e0a94fe6157ddb93f', '2022-06-06 19:48:44'),
(8, '昕昕昕', '1994-12-25', NULL, '', 'hsin_yu_5346@yahoo.com.tw', 'hsinhsinhsin', '5fb6e2a60c9da41e0a94fe6157ddb93f', '2022-06-06 19:51:13'),
(9, '咖啡因成癮重症患者', '2001-10-01', NULL, '', 'coffeeeeeholic@gmail.com', 'COFFEEHOLIC', '47e9e27359dc91530ab0113e877987b0', '2022-06-06 22:22:56'),
(10, '', NULL, NULL, '', 'iamnotahumanbeing111@gmail.com', 'iamnotahumanbeing111', '57a658bbfc2a52d32a5774cf230d9657', '2022-06-06 22:28:38'),
(11, '陳怡君', '1987-04-03', NULL, '0975-231-665', 'happy1234@yahoo.com.tw', 'happy1234', '1a495ad8c8919dbaaec2ef19facb8a05', '2022-06-06 23:09:41'),
(12, '', NULL, NULL, '0922-337456', '1717livinganewlife@gmail.com', '1717livinganewlife', '2bce10170644bee32c2ac44c17f3c839', '2022-06-06 23:12:10'),
(13, 'whitesnow', '1996-09-22', NULL, '', 'whitesnow@gmail.com', 'do_not_eat_that_apple', 'adbbf3c21a258319261a9d0e4e9ca502', '2022-06-06 23:13:51'),
(14, '李明', '1978-05-27', '2019-08-21', '0927513003', 'a0927513003@gmail.com', 'aa0927513003', '8bab43e8fb7e808caafe721f8b76f59c', '2022-06-06 23:20:17'),
(15, '', '2002-02-02', NULL, '', 'behealthy1314@protonmail.com', 'damn_covid19', 'defcfffcf88e7979617fbda4790d36c6', '2022-06-06 23:26:15'),
(16, '林子晴', '2012-04-17', NULL, '0953127065', 'SUNNY0417@gmail.com', 'SUNNY0417', '3f4752d92790e2606f8a36bf277464a7', '2022-06-06 23:29:05'),
(17, '想不到會員名稱了', NULL, NULL, '', 'ihavenomoreideaforthisfield@gmail.com', 'ihavenomoreideaforthisfield', '2bce10170644bee32c2ac44c17f3c839', '2022-06-06 23:38:21'),
(18, 'O___O', NULL, NULL, '', 'emoji100@yahoo.co.jp', 'O___O', '9160eb6a8d90284d79170e27473b7421', '2022-06-06 23:41:47'),
(19, '葉詩涵', '2004-07-08', NULL, '', 'yeahSS1108@gmail.com', 'yeahSS1108', 'cee490c9ac192fb99fe59ae2e300f8f7', '2022-06-06 23:43:12'),
(20, '陳冠宇', '1965-07-21', '2018-01-17', '0955663442', 'kuanyu0721@gmail.com', 'Kuanyu0721', 'ccea2826ecf3468b5b67e62ef13374ca', '2022-06-06 23:48:53'),
(21, '嚕嚕咪', '1914-08-09', '2001-06-27', '', 'moomin_not_hippo@gmail.com', 'moomin', '4199aaf34e3efddfffea40884f362c3f', '2022-06-06 23:53:34'),
(22, '', NULL, NULL, '', '191476032xx@gmail.com', '191476032', '4e29aec64a8433e02043b3c7e3b6a926', '2022-06-06 23:57:01');

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
(1, '台灣出生率下降 近幾年投胎數量銳減', '2020-07-15', 4, '', 1, '台灣內政部統計顯示，2020年台灣只有16萬5249名新生兒，創下新低點，死亡人數卻首次超越出生人數，人口首度出現負成長。', '2020-06-15'),
(2, '台灣最宜居、幸福感最高城市？', '2021-11-05', 3, '', 2, '由台中市奪冠，擁有18.1%的支持度，其次是台北市16.7%，其餘縣市支持率都低於10%，第三名為台南僅有7.2%，六都之中以桃園市最低，僅4.9%。', '2021-10-22'),
(3, '想輕鬆上大學嗎?投胎吧', '2022-01-01', 6, '', 3, '2021新生兒不到16萬！「全入時代」來臨 今年高中畢業生都有大學讀', '2021-12-01'),
(4, '驚恐！！來生請注意！', '2021-05-06', 2, '', 1, '台南新營驚傳虐嬰案，一名父親今年三月迎來獨子，僅因不喜歡男生、且認為男嬰長得像外公，竟在浴室狂揍男嬰', '2021-05-01'),
(5, '2023無性別新選擇', '2023-01-01', 6, '', 4, '台灣嬰兒「男多於女」數值偏高，重男輕女觀念未除？ 推出無性別選擇!無性別新時代來臨!', '2022-12-01'),
(6, '胖寶寶最高！！', '2020-03-20', 1, '', 5, '新生兒越胖越好?擔心選擇重量級軀幹會有健康疑慮嗎?新產品移除糖寶寶基因~就要胖!胖的健康沒煩惱!', '2019-03-01'),
(7, '好想擁有貓貓肉球...', '2022-05-31', 1, '', 2, '貓掌概念款新發表!發表會於5月31日晚間7點開始，請勿錯過，喵!', '2022-05-20'),
(8, '被鳥叫聲喚醒的每一天♥', '2019-04-04', 3, '', 2, '悠閒No.1！想逃離城市的吵鬧與喧囂，安靜的鄉村生活也是最近的熱門新選擇喔', '2019-03-03'),
(9, '來生的命運沒辦法預知，但外表可以', '2018-06-07', 1, '', 3, '陰德值小遊戲上架，多做善事不保證有好報但可以有更酷的外表！', '2018-05-07'),
(10, '速報！！明日飛機上即將有嬰兒誕生', '2018-02-27', 4, '', 6, '一輩子的免費機票，不是靠賺錢，靠投胎！', '2018-02-28'),
(11, '狼的孩子', '2017-07-22', 1, '', 7, '特殊設定釋出，可以獲得與狼群溝通的技能（此設定有售命保證！不會被吃掉喔）', '2017-07-10');

-- --------------------------------------------------------

--
-- 資料表結構 `news_tag`
--

CREATE TABLE `news_tag` (
  `sid` int(11) NOT NULL,
  `news_sid` int(11) NOT NULL,
  `tag_sid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `news_tag`
--

INSERT INTO `news_tag` (`sid`, `news_sid`, `tag_sid`) VALUES
(1, 1, 1),
(2, 1, 4),
(3, 2, 2),
(4, 2, 3),
(5, 2, 4),
(6, 3, 1),
(7, 3, 4),
(8, 4, 15),
(9, 4, 1),
(10, 4, 4),
(11, 5, 13),
(12, 5, 7),
(13, 5, 4),
(14, 5, 14),
(15, 6, 11),
(16, 6, 13),
(17, 6, 7),
(18, 7, 9),
(19, 7, 5),
(20, 7, 13),
(21, 7, 14),
(22, 8, 2),
(23, 8, 17),
(24, 8, 2),
(25, 8, 17),
(26, 9, 5),
(27, 9, 7),
(28, 9, 8),
(29, 9, 9),
(30, 9, 10),
(31, 9, 12),
(32, 9, 13),
(33, 10, 1),
(34, 10, 1),
(35, 10, 3),
(36, 10, 18),
(37, 11, 1),
(38, 11, 4),
(39, 11, 5),
(40, 11, 14);

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
(20, 'f7613a3e2b8a411eb55e6bc3622f1d98.jpg', 5, 150, 50, '2022-06-22 21:02:00', '2022-07-22 22:52:00', '財團法人桃園市私立寶貝潛能發展中心', '(這是測試)幫浪浪找個家', 16, '新莊區動保處裕民分館', 60, '新北市政府動保處在植樹節當日在新莊裕民分館舉辦「浪浪愛心認養」活動，活動集結狗狗聯誼會、寵物下午茶、萌寵療癒書展、播放寵物電影及我的寵物情人拍照打卡等多元主題，民眾帶著家中毛寶貝一起到圖書館來同樂，當天許多民眾成功認養毛寶貝，不僅獲得動保處贈送寵物驚喜大禮包，作為毛寶貝嫁妝，並結合植樹節加碼贈送本市景觀處三峽苗圃所提供的大麥草盆栽。'),
(21, 'npo-04.jpg', 2, 1000, 50, '2022-07-16 21:02:00', '2022-08-18 22:52:00', '財團法人桃園市私立寶貝潛能發展中心', '浪貓中途送養', 15, '松山區動保處', 70, '設立多元認養機制，提供民眾便利的認養地點與管道，增加收容動物認養機會。'),
(22, 'npo-04.jpg', 3, 100, 50, '2022-07-28 21:02:00', '2022-07-21 22:52:00', '財團法人桃園市私立寶貝潛能發展中心', '一起幫助浪犬', 16, '八里動物之家', 3, '※因現場人員需處理照護動物工作，場地/導覽人員人力有限，本會將視天候狀況及人力狀況審核是否同意志工服務，若天候不佳或是已有團體預約，就需要另擇他日喔!'),
(23, 'npo-07.jpg', 3, 100, 50, '2022-06-11 21:02:00', '2022-07-22 22:52:41', '財團法人桃園市私立寶貝潛能發展中心', '家庭照顧者支持計畫', 2, '文山區萬和街6號4樓', 15, '1. 以弱勢社區及服務據點所提出的需求提供服務，並體驗當地生活和文化。\r\n2. 協助當地教學、活動帶領等為主，服務內容依實際狀況調整。'),
(24, '25c5a6fab35182c6c03ce95cd5429f96.jpg', 3, 200, 50, '2022-07-22 21:02:00', '2022-07-21 22:52:00', '財團法人桃園市私立寶貝潛能發展中心', 'for one挺好：「食物銀行。送愛」', 2, '拉拉拉', 10, '服務內容：\r\n1.關懷服務：電話問安、送餐服務及社區關懷活動。\r\n2.陪伴服務：陪同就醫、讀報、陪伴運動及陪伴至社區或據點參與活動等服務。'),
(25, 'npo-09.jpg', 3, 50, 50, '2022-07-15 21:02:00', '2022-07-23 22:52:49', '財團法人桃園市私立寶貝潛能發展中心', '高風險家庭照顧關懷計畫', 4, '蘆竹區文中路一段108號（國道2號南桃園交流道附近）', 20, '馨禾老人長期照顧中心招募社會團體、學生團體與慈善愛心團體至院區服務與訪視住民老人，適時提供住民身心靈之撫慰與支持，並為住民生活帶來調劑與休閒娛樂，藉此提升住民之生活品質，更適時幫助住民在疾病上之舒緩與慰藉，並藉社會資源之力量達成社區照護模式與社會互動。'),
(26, 'npo-10.jpg', 5, 100, 50, '2022-06-17 21:02:00', '2022-06-23 22:52:53', '財團法人桃園市私立寶貝潛能發展中心', '陪伴燒傷朋友勇敢重生', 2, '文山區萬和街6號4樓', 2, '哪裡有需要伊甸就在哪裡，每一個需要除了有員工，也需要熱心的志工夥伴協同，不論是櫃檯、文書等間接服務，或餵食、陪伴等直接服務，因為有志工的加入，服務的工作才能做得更好。'),
(28, 'npo-12.jpg', 5, 50, 50, '2022-07-13 21:02:00', '2022-06-22 22:53:01', '財團法人桃園市私立寶貝潛能發展中心', '「看不見，我努力」為視多障者加油！', 4, '大溪老街', 4, '今年度，中心想透過志工協同領導的模式，由一位志工搭配 4 名身障者組成小隊，活動期間陪伴身障者於大溪老街中完成任務，中心期待透過此模式，增加身障者與一般民眾的接觸，雙方能夠進行良性互動，進而提升一般民眾對於身障者的認知，亦透過數位遊戲作為媒介，促使身心障礙者能活用網路科技、學習團隊合作、培養社會參與意識。'),
(29, 'npo-13.jpg', 6, 200, 50, '2022-06-29 21:02:00', '2022-07-22 22:53:04', '財團法人桃園市私立寶貝潛能發展中心', 'i運動不設限-多元扶助計畫', 14, '關廟區北安一街146號', 5, '臺南市鳳梨好筍節、呼朋引伴來'),
(30, 'npo-14.jpg', 6, 50, 50, '2022-06-29 21:02:00', '2022-06-18 22:53:08', '財團法人桃園市私立寶貝潛能發展中心', '伴弱勢癌友翻轉抗癌路', 2, '大安區敦化南路一段233巷28號B1\r\n台北愛樂文教基金會', 40, 'TICF18台北國際合唱音樂節規模龐大，涵蓋20餘場大小音樂會、4項合唱專業課程及首屆台北國際合唱大賽。行政團隊計畫培養節慶活動之幕後籌備人才，歡迎熱愛藝文活動的你/妳，加入我們一起來完成今夏亞洲最具規模的合唱盛事！'),
(75, 'npo-01.jpg', 2, 50, 50, '2022-06-22 21:02:00', '2022-07-15 21:02:00', '財團法人桃園市私立寶貝潛能發展中心', '一起手護台灣', 16, '國聖燈塔', 100, '會提供手套和垃圾袋，保險自理、自行攜帶飲用水 (盡量避免保特瓶或手搖飲)\r\nP.S我們民眾自發性舉辦的活動，故無法提供志工時數或感謝狀唷'),
(84, '978dba48e1c404ef4680391da5f663fd.jpg', 2, 100, 200, '2022-06-23 14:57:00', '2022-06-24 14:57:00', '荒野保護協會', '活動名稱測試', 18, '中華路一段', 5, NULL),
(92, 'e8c8dc6d31f696cde5e671b39746dde7.jpg', 2, 100, 155, '2022-06-29 15:17:00', '2022-07-08 15:17:00', '荒野保護協會', '1111測試', 17, '中華路一段', 3, NULL),
(96, '8d8564599f37a08ca55474aeb970ade5.jpg', 2, 100, 200, '2022-06-28 14:16:00', '2022-06-30 14:17:00', '世界和平', '容瑄想睡覺', 18, '中華路一段', 3, NULL),
(97, '0f094835be9191a9f132d2dc6c49b622.jpg', 2, 100, 200, '2022-06-22 14:20:00', '2022-07-05 14:20:00', '荒野保護協會22222', '活動名稱測試', 17, '中華路一段', 3, NULL),
(98, 'd2734119754e8a036b6b6e85808b8cdc.jpg', 2, 100, 200, '2022-06-17 14:29:00', '2022-06-22 14:29:00', '陽光社會福利基金會', '這個活動類型是動保2', 16, '中華路一段', 3, NULL),
(99, '834cb6e4a3965a819650731e273461f3.jpg', 3, 100, 200, '2022-07-01 04:14:00', '2022-07-14 03:11:00', '荒野保護協會', '活動名稱測試', 14, '拉拉拉拉', 3, NULL),
(100, '0fc3cca5044c997c38d1afd3c6e0bade.jpg', 5, 100, 200, '2022-07-01 04:14:00', '2022-07-14 03:11:00', '荒野保護協會', '活動名稱測試', 14, '拉拉拉拉', 3, NULL);

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
(3, '財團法人勵馨社會福利事業基金會', '44a7f93ed895d596168d1abe63fdc704.jpg', 'lknklnlkl@yahoo.com.tw', 29922310, '0966455233', 'kpkpk', '2022-08-15 21:02:00'),
(4, '陽光社會福利基金會', '3596682deda3ee7ac9a209bee24b5041.jpg', 'awslfkdnwqfkj@gmail.com', 25513456, '0966514852', 'popo', '2022-05-15 21:02:00'),
(67, '財團法人桃園市私立寶貝潛能發展中心', '', '123@yahoo.com.tw', 29901234, '0912095815', '2525', '2022-06-01 23:59:07'),
(76, '容瑄', '', 'as840922@yahoo.com.tw', 0, '0912098572', 'c8 c8 cc8 c8 ', '2022-06-09 17:45:33'),
(77, '容瑄', '8d8d74349fddbd121b2db74d10f3fe32.jpg', 'as840922@yahoo.com.tw', NULL, '0912098572', '', '2022-06-09 18:09:12'),
(78, '貓貓教', '198a091ddb93c5886a06d0aa0e288e38.jpg', '123@yahoo.com.tw', NULL, '0915345678', '瞇瞇瞇', '2022-06-09 18:12:16'),
(80, '0609 應該可以去睡覺了吧', 'fb70c3708d93ddebfca06224c3ae81ee.jpg', '12345@yahoo.com.tw', 0, '0911234567', '', '2022-06-09 19:53:13'),
(81, '0609 應該沒有問題吧', 'fb70c3708d93ddebfca06224c3ae81ee.jpg', '12345@yahoo.com.tw', NULL, '0911234567', '', '2022-06-09 19:53:23'),
(82, '希望可以成功desu', '60c5fb872602ba80683ddbf72eb70688.jpg', '123@yahoo.com.tw', NULL, '0988681621', '', '2022-06-09 19:53:46');

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
  `booked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `place`
--

INSERT INTO `place` (`sid`, `year`, `month`, `country`, `city`, `dist`, `quota`, `booked`) VALUES
(2, 2025, 10, '美國', '紐約', '布魯克林', 2, 1),
(4, 2032, 1, '台灣', '新北市', '三峽區', 5, 4),
(5, 2072, 2, '台灣', '台南市', '安平區', 2, 1),
(6, 2030, 5, '台灣', '台南市', '中西區', 5, 3),
(7, 2055, 8, '台灣', '台北市', '大安區', 5, 5),
(10, 2025, 12, '台灣', '台南市', '安平區', 4, 2),
(12, 2025, 12, '台灣', '台北市', '大安區', 3, 2),
(13, 2022, 12, '美國', '加州', '聖荷西', 2, 0),
(14, 2027, 5, '台灣', '台北市', '大安區', 2, 1),
(15, 2026, 10, '台灣', '台北市', '大安區', 3, 1),
(16, 2030, 6, '台灣', '台北市', '內湖區', 1, 1),
(17, 2029, 6, '台灣', '台南市', '中西區', 2, 1),
(18, 2029, 5, '台灣', '桃園市', '蘆竹區', 3, 1),
(19, 2027, 5, '美國', '紐約', '皇后區', 4, 2),
(20, 2027, 12, '美國', '加州', '比佛利山莊', 1, 0),
(21, 2023, 5, '台灣', '新竹縣', '竹北市', 2, 0),
(22, 2025, 6, '台灣', '台北市', '大安區', 2, 1),
(23, 2052, 2, '台灣', '台北市', '大安區', 1, 1),
(24, 2045, 6, '台灣', '台北市', '大安區', 3, 1),
(25, 2105, 10, '台灣', '台北市', '大安區', 2, 0),
(26, 2023, 8, '台灣', '台北市', '大安區', 4, 2),
(27, 2065, 9, '台灣', '台北市', '大安區', 2, 0),
(28, 2044, 2, '台灣', '新北市', '三峽區', 5, 1),
(29, 2048, 12, '台灣', '新北市', '三峽區', 2, 1),
(30, 2064, 4, '台灣', '新北市', '三峽區', 3, 2),
(31, 2098, 10, '台灣', '新北市', '三峽區', 5, 2),
(32, 2084, 2, '台灣', '新北市', '三峽區', 2, 0),
(33, 2100, 7, '台灣', '新北市', '三峽區', 5, 2),
(34, 2088, 12, '台灣', '台北市', '內湖區', 2, 1),
(35, 2054, 4, '台灣', '台北市', '內湖區', 3, 2),
(36, 2028, 10, '台灣', '台北市', '內湖區', 5, 2),
(37, 2034, 2, '台灣', '台北市', '內湖區', 2, 0),
(38, 2070, 7, '台灣', '台北市', '內湖區', 5, 2),
(39, 2039, 3, '台灣', '桃園市', '中壢區', 4, 2),
(40, 2069, 9, '台灣', '桃園市', '中壢區', 2, 1),
(41, 2089, 3, '台灣', '桃園市', '中壢區', 2, 0),
(42, 2027, 5, '台灣', '桃園市', '大園區', 3, 2),
(43, 2039, 12, '台灣', '桃園市', '大園區', 2, 1),
(44, 2039, 9, '台灣', '桃園市', '蘆竹區', 4, 2),
(45, 2039, 11, '台灣', '桃園市', '蘆竹區', 2, 1),
(46, 2052, 3, '台灣', '新北市', '三峽區', 4, 1),
(47, 2077, 12, '台灣', '新北市', '三重區', 4, 2),
(48, 2099, 7, '台灣', '新北市', '三重區', 2, 1),
(49, 2054, 6, '台灣', '新北市', '三重區', 4, 0),
(50, 2068, 8, '台灣', '新北市', '蘆洲區', 3, 2),
(51, 2084, 2, '台灣', '新北市', '蘆洲區', 4, 2),
(52, 2072, 3, '台灣', '台北市', '中山區', 4, 1),
(53, 2077, 11, '台灣', '台北市', '中山區', 4, 2),
(54, 2069, 7, '台灣', '台北市', '中山區', 3, 1),
(55, 2074, 6, '台灣', '宜蘭縣', '宜蘭市', 4, 0),
(56, 2038, 8, '台灣', '宜蘭縣', '宜蘭市', 3, 2),
(57, 2094, 2, '台灣', '台中市', '烏日區', 4, 2),
(58, 2040, 11, '台灣', '台北市', '北投區', 2, 0),
(59, 2055, 12, '台灣', '高雄市', '左營區', 3, 1),
(60, 2075, 2, '台灣', '高雄市', '左營區', 2, 1),
(61, 2035, 8, '台灣', '高雄市', '三民區', 3, 1),
(62, 2033, 4, '台灣', '台南市', '仁德區', 2, 0),
(63, 2023, 1, '台灣', '台南市', '中西區', 2, 1),
(64, 2041, 12, '台灣', '台南市', '中西區', 3, 1),
(65, 2062, 7, '台灣', '台南市', '仁德區', 3, 2),
(66, 2055, 9, '台灣', '台南市', '仁德區', 5, 1);

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
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(9, 1, '2022-06-09 17:11:19', '{\"eyes\":\"0\",\"nose\":\"0\",\"mouth\":\"0\",\"ear\":\"0\",\"hair\":\"0\",\"noseColor\":\"0\",\"mouthColor\":\"0\",\"earColor\":\"0\",\"hairColor\":\"0\",\"eyesColor\":\"5\"}'),
(10, 1, '2022-06-09 17:17:46', '{\"eyes\":\"0\",\"nose\":\"0\",\"mouth\":\"0\",\"ear\":\"0\",\"hair\":\"0\",\"mouthColor\":\"0\",\"earColor\":\"0\",\"hairColor\":\"0\",\"eyesColor\":\"6\",\"noseColor\":\"5\"}'),
(11, 1, '2022-06-09 17:18:11', '{\"eyes\":\"0\",\"nose\":\"0\",\"mouth\":\"0\",\"ear\":\"0\",\"hair\":\"0\",\"earColor\":\"0\",\"eyesColor\":\"6\",\"noseColor\":\"5\",\"mouthColor\":\"5\",\"hairColor\":\"5\"}'),
(12, 1, '2022-06-09 17:18:18', '{\"eyes\":\"0\",\"nose\":\"0\",\"mouth\":\"0\",\"ear\":\"0\",\"hair\":\"0\",\"eyesColor\":\"6\",\"noseColor\":\"5\",\"mouthColor\":\"5\",\"earColor\":\"3\",\"hairColor\":\"5\"}'),
(13, 1, '2022-06-09 17:18:26', '{\"eyes\":\"0\",\"nose\":\"0\",\"mouth\":\"0\",\"ear\":\"0\",\"hair\":\"0\",\"eyesColor\":\"1\",\"noseColor\":\"5\",\"mouthColor\":\"5\",\"earColor\":\"3\",\"hairColor\":\"5\"}');

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
(19, '大學');

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
  ADD PRIMARY KEY (`sid`),
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
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `music_category`
--
ALTER TABLE `music_category`
  MODIFY `music_type_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `news`
--
ALTER TABLE `news`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `news_tag`
--
ALTER TABLE `news_tag`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `npo_act`
--
ALTER TABLE `npo_act`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `npo_act_type`
--
ALTER TABLE `npo_act_type`
  MODIFY `typesid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `npo_name`
--
ALTER TABLE `npo_name`
  MODIFY `npo_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `place`
--
ALTER TABLE `place`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `place_order`
--
ALTER TABLE `place_order`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `reincarnation_order`
--
ALTER TABLE `reincarnation_order`
  MODIFY `reincarnation_order_sid` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `showcase`
--
ALTER TABLE `showcase`
  MODIFY `avatar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `tag`
--
ALTER TABLE `tag`
  MODIFY `tg_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `type`
--
ALTER TABLE `type`
  MODIFY `ty_sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `npo_act`
--
ALTER TABLE `npo_act`
  ADD CONSTRAINT `npo_act_ibfk_1` FOREIGN KEY (`type_sid`) REFERENCES `npo_act_type` (`typesid`),
  ADD CONSTRAINT `npo_act_ibfk_3` FOREIGN KEY (`place_city`) REFERENCES `city_type` (`city_sid`);

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
