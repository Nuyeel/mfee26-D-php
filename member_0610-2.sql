-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-06-10 05:55:14
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
-- 資料庫: `maxine`
--

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `sid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `deathdate` date DEFAULT NULL,
  `isdead` varchar(255) DEFAULT 'false',
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`sid`, `name`, `birthdate`, `deathdate`, `isdead`, `mobile`, `email`, `account`, `password`, `create_at`) VALUES
(1, 'the first cat', NULL, NULL, 'false', '', 'HappyCat01@gmail.com', 'HappyCat01', '$2y$10$AirwXJwahWxsQKJrrmlwE.nFkwin.K3ZR8qJE4HgYgqu4N0MIdb7C', '2022-06-09 13:52:24'),
(2, '貓貓貓', NULL, NULL, 'false', '', 'HappyCat02@gmail.com', 'HappyCat02', '$2y$10$NYuxH3UUfyHRr8yjeDo0Ou/zw83PT/hjbaAwWQ6u.MVlwhS2KMct6', '2022-06-09 13:52:51'),
(3, '九天玄女不在這', NULL, NULL, 'false', '', 'HappyCat03@gmail.com', 'HappyCat03', '$2y$10$QCyABgd5IjBYYmQhnK0bpeBjSOKzSjiPbyI8fFPpV.cBoclFe8f1.', '2022-06-09 13:53:34'),
(4, 'Bible Thumb', NULL, NULL, 'false', '', 'HappyCat04@gmail.com', 'HappyCat04', '$2y$10$xyN7xDkGJ5SustZEWCDyIuA/7RdTp0Y3yg4MhtFPFyzmnmayB9EZC', '2022-06-09 13:54:15'),
(5, '偷尼史塔克 Tony Stark ', '1990-06-14', '2022-06-02', 'false', '0977111050', 'HappyCat05@gmail.com', 'HappyCat05', '$2y$10$sFaM2bucSZ9h0bRb9vXYJuwSy1.YS7eHOutpxih.qfOieXQX1b6ze', '2022-06-09 13:54:42'),
(6, '怎一直下雨', '1990-03-05', '2022-05-31', 'false', '', 'HappyCat06@gmail.com', 'HappyCat06', '$2y$10$KQFhzDlfZFdk.stmlCA7U.il3fDWO2z0kkVzrHuF9SJPIgNXWKAp.', '2022-06-09 13:55:06'),
(7, '趕著投胎', NULL, NULL, 'false', '', 'HappyCat07@gmail.com', 'HappyCat07', '$2y$10$Wy1j.2RcH0cA565y0kP2I.yIGvH8rdoEFXhWRokuDHgOerj1NNG9u', '2022-06-09 13:55:27'),
(8, '咖啡因成癮重症患者', NULL, NULL, 'false', '', 'HappyCat08@gmail.com', 'HappyCat08', '$2y$10$hfdvXtFq2/leKrM2jLXxf.L1YiKAr5wMCq7.rp69fiSgoG3pnJlsK', '2022-06-09 13:55:47'),
(9, '陳怡君', NULL, NULL, 'false', '', 'HappyCat09@gmail.com', 'HappyCat09', '$2y$10$7zyt3mR2ghfGKn9xkEWgdeXlmxoRy4rm3DmrP/3kDFMXoIPPEj/wy', '2022-06-09 13:56:28'),
(10, '總有幾隻貓的', NULL, NULL, 'false', '', 'HappyCat10@gmail.com', 'HappyCat10', '$2y$10$n3p/32p42bi1QqX/U0KjBe4Yb0WdAI.8UaoZH3tiRR8NbBaxHGcOK', '2022-06-09 13:56:51'),
(11, 'unhappy cat', NULL, NULL, 'false', '', 'HappyCat11@gmail.com', 'HappyCat11', '$2y$10$JG.LjNM0flM7vAV8zkh6PO3Hb2bgA3c8xKW83W2qbgJgns/n/Hdoa', '2022-06-09 13:57:16'),
(12, '靈魂急轉彎', '1990-06-15', '2022-06-07', 'false', '', 'HappyCat12@gmail.com', 'HappyCat12', '$2y$10$7.aum6zzCAAX1XsrQyhOf.U8r5MrG586P2fdGiW27WfBOztqK4IHa', '2022-06-09 13:57:37'),
(13, '', NULL, NULL, 'false', '', 'admin@gmail.com', 'Admin', '$2y$10$0DADDxhf55DPxOKcyISJt.L0uHOkeiSh7J/lTqQ73jMYj1qhLBrBW', '2022-06-10 01:51:04'),
(14, '', NULL, NULL, 'false', '', 'HappyCat13@gmail.com', 'HappyCat13', '$2y$10$HX8f.Hc7la1jgapWVPVjtuSJ.RTjTgK9ZohqVUX5ean5kn2.OZgzC', '2022-06-10 03:26:43'),
(15, '', NULL, NULL, 'false', '', 'HappyCat14@gmail.com', 'HappyCat14', '$2y$10$rMPZyA.6wVgZHh2tskYwSOsHd0AiFNAdAU0rD5qS3SM1nZ0NTlsQ6', '2022-06-10 03:27:35'),
(16, '', NULL, NULL, 'false', '', 'HappyCat15@gmail.com', 'HappyCat15', '$2y$10$dIWMYfd8WvjFaDuPfr5FF.gSfzczdVnmuy591Ku3fcPF64e8hbPOO', '2022-06-10 03:28:13'),
(17, '', NULL, NULL, 'false', '', 'HappyCat16@gmail.com', 'HappyCat16', '$2y$10$h6azphKhwhRq8BeaTzAHQeUlH3grQEuFordDuUw2aFIo.EXdKiGmS', '2022-06-10 03:28:38'),
(18, '', NULL, NULL, 'false', '', 'HappyCat17@gmail.com', 'HappyCat17', '$2y$10$Z6UOfMHaJr8dleAdAWixNu6BZNXKK1q6kJofTHiTtnRXJ3./1P5i.', '2022-06-10 03:28:56'),
(19, '', NULL, NULL, 'false', '', 'HappyCat18@gmail.com', 'HappyCat18', '$2y$10$Evne7/6E0Ryb.c.ywAlj/.0zXlPfpvjPIAeWn6WNsu/AweIKcTh9a', '2022-06-10 03:29:10'),
(20, '', NULL, NULL, 'false', '', 'HappyCat19@gmail.com', 'HappyCat19', '$2y$10$oa7Bc0HTZ9dCfoOWxYJNaOomtguDOXlUfwAAQ7n955AFju6ccOIum', '2022-06-10 03:30:27'),
(21, '', NULL, NULL, 'false', '', 'HappyCat20@gmail.com', 'HappyCat20', '$2y$10$dulMYVhaUT8iNiYoUF78Oufc13.1bV7zTcsBlHjH0dtqX2JW1U/yG', '2022-06-10 03:30:39'),
(22, '', NULL, NULL, 'false', '', 'HappyCat21@gmail.com', 'HappyCat21', '$2y$10$agYKF2IL4CKcqQg4MEBqd.Kij2eJYsI2.OVJqRUMzZmeXx2K569Xq', '2022-06-10 03:30:49'),
(23, '', NULL, NULL, 'false', '', 'HappyCat22@gmail.com', 'HappyCat22', '$2y$10$7nvQ.ncWWItOddNTGDUGVOKOOVkKZHcNCiAyk85CjxAyNr9rH6yKK', '2022-06-10 03:31:01'),
(24, '', NULL, NULL, 'false', '', 'HappyCat23@gmail.com', 'HappyCat23', '$2y$10$ZGAPY7FVslnPzu6x63ad9OuyQ0g7ej/g8PDgz/k3p5Kv.WgkTM2N2', '2022-06-10 03:31:12'),
(25, '', NULL, NULL, 'false', '', 'HappyCat24@gmail.com', 'HappyCat24', '$2y$10$BHZAB6wTXsyvQVKz1ggpAOKoyz2aCnF7/tzbaCeZ5xK7pgtKF5c96', '2022-06-10 03:31:23'),
(26, '', NULL, NULL, 'false', '', 'HappyCat25@gmail.com', 'HappyCat25', '$2y$10$KP/vubfTBUf65ziMvrDnTuMTe35AkW9qQ65c0dzGj0G0lr62hRnnW', '2022-06-10 03:31:56'),
(27, '', NULL, NULL, 'false', '', 'HappyCat26@gmail.com', 'HappyCat26', '$2y$10$RP5WMjnK0lRgl2Y84aaZn.Zr9I.fCf5HF8BN1iomUD7v9QB0hSy3u', '2022-06-10 03:32:15'),
(28, '', NULL, NULL, 'false', '', 'HappyCat27@gmail.com', 'HappyCat27', '$2y$10$5446DawwHc8AOJAP1lc2QexLF4y1VNA0F1RN4OM18JcMO3wq/mlqm', '2022-06-10 03:32:46'),
(29, '', NULL, NULL, 'false', '', 'HappyCat28@gmail.com', 'HappyCat28', '$2y$10$8FJiwaznH232h48wk7lHR.uyDJnthf3ADnYsERlTbefUzB.CpoWcu', '2022-06-10 03:32:58'),
(30, '', NULL, NULL, 'false', '', 'HappyCat29@gmail.com', 'HappyCat29', '$2y$10$gP3HIA0EXMDh9qvUJHPQSe/hp2U7qqgaCn9/szImsEsj3sAlwlaEu', '2022-06-10 03:33:10'),
(31, '', NULL, NULL, 'false', '', 'HappyCat30@gmail.com', 'HappyCat30', '$2y$10$OpLdm4HUzxpgmE2AO1.VGuT9LNha8Uf3u7HPr5irykac.IzHsy5oq', '2022-06-10 03:33:22'),
(32, '', NULL, NULL, 'false', '', 'HappyCat31@gmail.com', 'HappyCat31', '$2y$10$otVp1Ic9lSyMKkJPbwJM/ObXPky23VVmAx4UU/OIU9dtUQBYxPCga', '2022-06-10 03:33:35'),
(33, '', NULL, NULL, 'false', '', 'HappyCat32@gmail.com', 'HappyCat32', '$2y$10$A4479RQRwSNLT5nSFUCFhecaDcEshF980fhqCE9HzuLjW83GWys1i', '2022-06-10 03:33:49'),
(34, '', NULL, NULL, 'false', '', 'HappyCat33@gmail.com', 'HappyCat33', '$2y$10$nCEH1Lpgv82C.T7HsVbOJOU7Lhhi1I4CAlICGS5NOf/HEyFeclOhm', '2022-06-10 03:34:02'),
(35, '', NULL, NULL, 'false', '', 'HappyCat34@gmail.com', 'HappyCat34', '$2y$10$b6qvb7RlxSExUOPcASuQD.toGgWKuTJlqUQd/fT6nyI3d7Y2km7Pm', '2022-06-10 03:34:29'),
(36, '', NULL, NULL, 'false', '', 'HappyCat35@gmail.com', 'HappyCat35', '$2y$10$vRoey8TpPXJuH5osqirV/OAYl2vtPUYjgpbpSdd4bUENbGHN1gsCK', '2022-06-10 03:34:44'),
(37, '', NULL, NULL, 'false', '', 'HappyCat36@gmail.com', 'HappyCat36', '$2y$10$pM5FXJZl6YpPh/rkP/QXme.4oJa9ZgVZyWeamYUSG1z2VjaUH8/OW', '2022-06-10 03:34:56'),
(38, '', NULL, NULL, 'false', '', 'HappyCat37@gmail.com', 'HappyCat37', '$2y$10$ipQo49pUVhT0sMsEGfn2T.AhffoofpElG.6MoBBnD9FfqkuxutEBa', '2022-06-10 03:35:09'),
(39, '', NULL, NULL, 'false', '', 'HappyCat38@gmail.com', 'HappyCat38', '$2y$10$FZlahkLFTItFsZcL7YEgJOk76E/p7ar4R6XiKBB78C6g3mHFzEevC', '2022-06-10 03:35:22'),
(40, '', NULL, NULL, 'false', '', 'HappyCat39@gmail.com', 'HappyCat39', '$2y$10$OY5sUwd9AsfDjjd1EceA0OFd.ZfEi.GN8jbfQo1Btgqzfeq3MpKSK', '2022-06-10 03:35:40'),
(41, '', NULL, NULL, 'false', '', 'HappyCat40@gmail.com', 'HappyCat40', '$2y$10$gd8dE6FN/DqwapbjZtEN3uu.mfPei6Y0n4g5nqivLFWL1Zw4EoCp.', '2022-06-10 03:35:53'),
(42, '', NULL, NULL, 'false', '', 'HappyCat41@gmail.com', 'HappyCat41', '$2y$10$bd.yjSGmWpAWEiLudnHeRuttOa6Sn54dqtjtDrrwjjxfvd39.zsUu', '2022-06-10 03:36:06'),
(43, '', NULL, NULL, 'false', '', 'HappyCat42@gmail.com', 'HappyCat42', '$2y$10$fEnbjF3O3xyfHQR8WhCgXei3P3CzEu4m/b3eH3L6l0DXqo.UF1E/e', '2022-06-10 03:36:21'),
(44, '', NULL, NULL, 'false', '', 'HappyCat43@gmail.com', 'HappyCat43', '$2y$10$8bM6.kEcw2Rt6yAeS3Tap.tAa/H4w.5lM0GBghC0wsOk11bqlC6tu', '2022-06-10 03:36:33'),
(45, '', NULL, NULL, 'false', '', 'HappyCat44@gmail.com', 'HappyCat44', '$2y$10$Ajm96pUGSvdNpaQWAPyRiuNTt2Xf6r2/Nmf9JgRu4lBTSly3BevE2', '2022-06-10 03:37:33'),
(46, '', NULL, NULL, 'false', '', 'HappyCat45@gmail.com', 'HappyCat45', '$2y$10$xxuG/2G2koeshecupsmbaO3Ro3qnxsACAvQsCQbeuO8wM7LuAJq8O', '2022-06-10 03:37:43'),
(47, '', NULL, NULL, 'false', '', 'HappyCat46@gmail.com', 'HappyCat46', '$2y$10$ij1SYBtEzFnUaJu93aWjhu9xhoEmKnjMwCgjt99VVhK5VHTqUfF/G', '2022-06-10 03:37:55'),
(48, '', NULL, NULL, 'false', '', 'HappyCat47@gmail.com', 'HappyCat47', '$2y$10$Fgw/ds47YItdV5MpXMobnuNGraiUdo7rzImZRYs/Rm42xcsASK2m6', '2022-06-10 03:38:07'),
(49, '', NULL, NULL, 'false', '', 'HappyCat48@gmail.com', 'HappyCat48', '$2y$10$.mrsX56BQMK/xqi2SR6xGOysfnyx0BRkjPaajY0X3AiEaSVW/kgsW', '2022-06-10 03:38:19'),
(50, '', NULL, NULL, 'false', '', 'HappyCat49@gmail.com', 'HappyCat49', '$2y$10$pdsmbCihG98YAGamMQS/F.VWC0ZqZqcStTPRKCX7QzENwNZqsxIlK', '2022-06-10 03:38:30'),
(51, '', NULL, NULL, 'false', '', 'HappyCat50@gmail.com', 'HappyCat50', '$2y$10$.9QHiWdOhPm/vwq2f/XlGOdu/5VSCEftWlxT7T.4D/Q3yv2yY6BYu', '2022-06-10 03:38:42'),
(52, '', NULL, NULL, 'false', '', 'HappyCat51@gmail.com', 'HappyCat51', '$2y$10$6A83d7hqQkRtgTbtiMrGqunUjsiUiHNFe5P/UVA04JXlmJMEtncd6', '2022-06-10 03:38:59'),
(53, '', NULL, NULL, 'false', '', 'HappyCat52@gmail.com', 'HappyCat52', '$2y$10$.9GoHgdzK96cbf3m8gqy1.K6TtepALCRehvCL8VAvYA6fccvs2DBi', '2022-06-10 03:39:10'),
(54, '', NULL, NULL, 'false', '', 'HappyCat53@gmail.com', 'HappyCat53', '$2y$10$SLP40Q0AJ7D4lIdb62sC5OuVQMiy3zqpMgn1ua/ltJ4Ssv5MuwmVa', '2022-06-10 03:39:22'),
(55, '', NULL, NULL, 'false', '', 'HappyCat54@gmail.com', 'HappyCat54', '$2y$10$BdICP6cq1mmSBq2kRKuppuyltkVHhbCtLhTID2rtpqtq6OI0Jf4um', '2022-06-10 03:39:39'),
(56, '', NULL, NULL, 'false', '', 'HappyCat55@gmail.com', 'HappyCat55', '$2y$10$0kU9UB.idFLLuXaoJFB14./NFJPEGlLjPcqqrrb68rC3uR9/zycDe', '2022-06-10 03:39:51'),
(57, '', NULL, NULL, 'false', '', 'HappyCat56@gmail.com', 'HappyCat56', '$2y$10$fYDIgfNbawaKuf.XHS9jae8zvNqG050SMoUv2hTz3Yo5dSV7zK646', '2022-06-10 03:40:13'),
(58, '', NULL, NULL, 'false', '', 'HappyCat57@gmail.com', 'HappyCat57', '$2y$10$8JZEm/4C3NE9nPUb4gC/AeYXmviYGHfIkGf9BkLRztOF4SsvpVA42', '2022-06-10 03:40:26'),
(59, '', NULL, NULL, 'false', '', 'HappyCat58@gmail.com', 'HappyCat58', '$2y$10$trfGqH3BxYf.5h6111Jngeg476d/wI/lFdQ2/OumhqJv8QVgsDHpu', '2022-06-10 03:40:39'),
(60, '', NULL, NULL, 'false', '', 'HappyCat59@gmail.com', 'HappyCat59', '$2y$10$Z8IDndgNS/kwSrNAHt1xd.X.3DL4jKZ28RUHylFiTFpWzRofjkrwO', '2022-06-10 03:40:50'),
(61, '', NULL, NULL, 'false', '', 'HappyCat60@gmail.com', 'HappyCat60', '$2y$10$SPM8Ftb51pzdpG3GJPoAjuqYPHztHo/uR2QpUFLgB/oUK2dDzSofe', '2022-06-10 03:41:03'),
(62, '', NULL, NULL, 'false', '', 'HappyCat61@gmail.com', 'HappyCat61', '$2y$10$k1H9MnKnudr76CJ/3Axlt.rHyDyNx1wgpll/lBOakJXNuamFeNoRi', '2022-06-10 03:41:14'),
(63, '', NULL, NULL, 'false', '', 'HappyCat62@gmail.com', 'HappyCat62', '$2y$10$hdqf0iZw9NSTAON89V6QCOtv7I7Q2QjvQKv9Sp6naHSfTNeeFSaiS', '2022-06-10 03:41:34'),
(64, '', NULL, NULL, 'false', '', 'HappyCat63@gmail.com', 'HappyCat63', '$2y$10$5oA0Xn9p6KzH1Zz0axO2ceUQjYUbsnsQaeZ.roI37dEw5xmGnwqMK', '2022-06-10 03:42:03'),
(65, '', NULL, NULL, 'false', '', 'HappyCat64@gmail.com', 'HappyCat64', '$2y$10$AFKm3fddtESWbIOJoHY5peSpHWOUBTHDG90HiR3/k2z/gj.KUaR7K', '2022-06-10 03:42:22'),
(66, '', NULL, NULL, 'false', '', 'HappyCat65@gmail.com', 'HappyCat65', '$2y$10$kBCZt1NkU3ESn9sLl.jjLuF7WvWnIgced4J6Pjqqc6Cnjq9TWypc.', '2022-06-10 03:42:33'),
(67, '', NULL, NULL, 'false', '', 'HappyCat66@gmail.com', 'HappyCat66', '$2y$10$juJHFomlxpWf4eLQXQNzLOMmYISl8e.XZuhhp9fSvw6jxJ9BV6KZ2', '2022-06-10 03:42:45'),
(68, '', NULL, NULL, 'false', '', 'HappyCat67@gmail.com', 'HappyCat67', '$2y$10$tzu3RhCxRXFl8fmQIafCD.XnW3tdZU/.T.RGyU5hnRjK0af.INstC', '2022-06-10 03:42:59'),
(69, '', NULL, NULL, 'false', '', 'HappyCat68@gmail.com', 'HappyCat68', '$2y$10$uqjh2NeH.cgF8GJwNr2dJecRZIt5Z6TsLOrqCwarcAOVqWO3XGwsu', '2022-06-10 03:43:29'),
(70, '', NULL, NULL, 'false', '', 'HappyCat69@gmail.com', 'HappyCat69', '$2y$10$.OSdRIt/R9NWruh3gIex8.BN3OcL65SIsUhaMLI86efaai5D.ZdEq', '2022-06-10 03:43:40'),
(71, '', NULL, NULL, 'false', '', 'HappyCat70@gmail.com', 'HappyCat70', '$2y$10$FvdIZpomJviDE.shvxSrBeiXhxVQs7pOg1Qf3SedRdzE1IqaYT4Em', '2022-06-10 03:43:56'),
(72, '', NULL, NULL, 'false', '', 'HappyCat71@gmail.com', 'HappyCat71', '$2y$10$49yU4rxHhgYbZGe1PH5Mbe31u9ydRwbsNnAdmplkl4bCpAaQ3MXh.', '2022-06-10 03:44:09'),
(73, '', NULL, NULL, 'false', '', 'HappyCat72@gmail.com', 'HappyCat72', '$2y$10$jF7H..8R7I4sx31c3hwjlOK710iPlPr5pd3WsQc5MC7PlllMU6/2O', '2022-06-10 03:44:18'),
(74, '', NULL, NULL, 'false', '', 'HappyCat73@gmail.com', 'HappyCat73', '$2y$10$G4L6kn4WcjefItdFz2KdpebL7WVJpbbOW/edLZ2v/zFXlbkjyxZoG', '2022-06-10 03:44:32'),
(75, '', NULL, NULL, 'false', '', 'HappyCat74@gmail.com', 'HappyCat74', '$2y$10$QKcXwYG1245itLJPsXeSTOqwtCXsaTiod0T4cXu84uGtQwdCVsFzW', '2022-06-10 03:44:43'),
(76, '', NULL, NULL, 'false', '', 'HappyCat75@gmail.com', 'HappyCat75', '$2y$10$duWwdsiBLafSbtntJcpnFO2ekTEr9cLRZ/IL1AK7inXXOEOpSWl5G', '2022-06-10 03:44:54'),
(77, '', NULL, NULL, 'false', '', 'HappyCat76@gmail.com', 'HappyCat76', '$2y$10$k2M5XoSSkzSR57r3zPeB/eQTe.1FxwU2fBD1gW0lAhmUl/CSNF..e', '2022-06-10 03:45:04'),
(78, '', NULL, NULL, 'false', '', 'HappyCat77@gmail.com', 'HappyCat77', '$2y$10$YQ4TK7JVPWOdMJOty61I8O172FYdC1WTI8xFRpUMrl.pzx8q5Rztu', '2022-06-10 03:45:15'),
(79, '', NULL, NULL, 'false', '', 'HappyCat78@gmail.com', 'HappyCat78', '$2y$10$6yKR6oZQ63JD3seB2YV5a.8l4EgYY8JeMAca/LF40it88ajGA0PTi', '2022-06-10 03:45:26'),
(80, '', NULL, NULL, 'false', '', 'HappyCat79@gmail.com', 'HappyCat79', '$2y$10$5J0OZ/SAdIT6xL3qRF1I2.KenZNjxaCUzmFTo.73JiYobvByemQ16', '2022-06-10 03:45:36'),
(81, '', NULL, NULL, 'false', '', 'HappyCat80@gmail.com', 'HappyCat80', '$2y$10$mC5PqOLTH2vBX.38RuB.5eg0PS1CGYmlAqJutcEKBq0sahcsZbJKK', '2022-06-10 03:45:48'),
(82, '', NULL, NULL, 'false', '', 'HappyCat81@gmail.com', 'HappyCat81', '$2y$10$xQNe9Q2hO5hkLZjL/JYKJelEW8yTtUipcJv5HnNLJk6UnXt.F5sp.', '2022-06-10 03:46:00'),
(83, '', NULL, NULL, 'false', '', 'HappyCat82@gmail.com', 'HappyCat82', '$2y$10$bGqXt7.kSjEPaW.W06CU4u492AQEZIXNyvTA7GXxuNP8p5jeW800G', '2022-06-10 03:46:10'),
(84, '', NULL, NULL, 'false', '', 'HappyCat83@gmail.com', 'HappyCat83', '$2y$10$rCgyBnD0GXEiI3FuedDzReGTeWgy6znclo7F9h6FYgJBiv/Z2w0E6', '2022-06-10 03:46:22'),
(85, '', NULL, NULL, 'false', '', 'HappyCat84@gmail.com', 'HappyCat84', '$2y$10$pPIOMPi3yXXgW.RrUDnlQOTbXTe2PQux64XTDJF5.w.ZTrn24i1Le', '2022-06-10 03:46:35'),
(86, '', NULL, NULL, 'false', '', 'HappyCat85@gmail.com', 'HappyCat85', '$2y$10$aq2q/rDhcAodrii0LuSyi..BzMdvf6BaqARpU1Ws5CSuQ53R6WHVC', '2022-06-10 03:46:45'),
(87, '', NULL, NULL, 'false', '', 'HappyCat86@gmail.com', 'HappyCat86', '$2y$10$Aw5ji0J7d2lwsfiPvtD2peiN972QtXx4xs1vkRWAX6xyNm8mYnIXG', '2022-06-10 03:47:16'),
(88, '', NULL, NULL, 'false', '', 'HappyCat87@gmail.com', 'HappyCat87', '$2y$10$xoIBgG/eLLQkT7gWnaPOieLStDlCdJLvsUbLoKR52PsV4sZydKtkC', '2022-06-10 03:47:30'),
(89, '', NULL, NULL, 'false', '', 'HappyCat88@gmail.com', 'HappyCat88', '$2y$10$VYbXm4J.SP3xwioUQY62JOu3R.q9AVuFBk3u7IDCrp5BV0U1BquBO', '2022-06-10 03:47:44'),
(90, '', NULL, NULL, 'false', '', 'HappyCat89@gmail.com', 'HappyCat89', '$2y$10$UfSIVdnMzRG/GIh0XZhvpO6BJ2k1GEF0IzbVP9pUdMpwwJHJlDaCe', '2022-06-10 03:47:59'),
(91, '', NULL, NULL, 'false', '', 'HappyCat90@gmail.com', 'HappyCat90', '$2y$10$PxsVj0OwAqHrZdmzgofzH.ubkfJEwr8rNHF.KMcY1JL1kKwnwa/4e', '2022-06-10 03:48:11'),
(92, '', NULL, NULL, 'false', '', 'HappyCat91@gmail.com', 'HappyCat91', '$2y$10$Pcj0QNHU6KzdATk1wXrVP.mLvs5Il/.Dh5Q2BcAsWsZFZJxxDH8VK', '2022-06-10 03:48:30'),
(93, '', NULL, NULL, 'false', '', 'HappyCat92@gmail.com', 'HappyCat92', '$2y$10$VP1S3X5Cs4y0nb1d7Dij6exD/6.GmlbrvxipVAfY9GvmdoycXp49C', '2022-06-10 03:48:42'),
(94, '', NULL, NULL, 'false', '', 'HappyCat93@gmail.com', 'HappyCat93', '$2y$10$vWd4ghdJ/uvgCItzwJT4muZzJwPpQdNgF79WgKdIPFYV9qOTbF15y', '2022-06-10 03:49:07'),
(95, '', NULL, NULL, 'false', '', 'HappyCat94@gmail.com', 'HappyCat94', '$2y$10$vW/zubmPsnn83grTYA63mOLLN0QMEZ9HVZ6ODp9Lgkp/VjyZZKoOC', '2022-06-10 03:49:23'),
(96, '', NULL, NULL, 'false', '', 'HappyCat95@gmail.com', 'HappyCat95', '$2y$10$6kY58NIrhoOMO44E4ESlsO.5Oc64Y1OYDZ4qXHKhlYTh1tO4Y.doa', '2022-06-10 03:49:37'),
(97, '', NULL, NULL, 'false', '', 'HappyCat96@gmail.com', 'HappyCat96', '$2y$10$I2JM6zs.tvk5CmaHCoIW.ei6Hi2ruz9TWydbeAN/6Mg9qSO8bC1J6', '2022-06-10 03:49:49'),
(98, '', NULL, NULL, 'false', '', 'HappyCat97@gmail.com', 'HappyCat97', '$2y$10$ioWw7u0Zk5l7C/1UDjQPt.01/3bOL5LPqIPVqYKLtWYuZ8H/0bTIq', '2022-06-10 03:49:59'),
(99, '', NULL, NULL, 'false', '', 'HappyCat98@gmail.com', 'HappyCat98', '$2y$10$.CdtzoocaY4YOYIxkxm6j.B5QeG01NbHPhwXkQrWB9L7NwUVjRG3S', '2022-06-10 03:50:09'),
(100, '', NULL, NULL, 'false', '', 'HappyCat99@gmail.com', 'HappyCat99', '$2y$10$Aaoh2lzg8fPn4Mb/ScmnEOhglXdwr8mLL0hf4CY3X4A.BC8tLIo3y', '2022-06-10 03:50:20'),
(101, '', NULL, NULL, 'false', '', 'HappyCat100@gmail.com', 'HappyCat100', '$2y$10$RscDUr0vT/ndUx9ndYpvNe49wvxixQYYBQmL7rUNP1frBs/Tc9FVG', '2022-06-10 03:51:04');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`sid`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
