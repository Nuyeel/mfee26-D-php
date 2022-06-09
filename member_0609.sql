-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2022 at 04:04 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maxine02`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
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
-- Dumping data for table `member`
--

INSERT INTO `member` (`sid`, `name`, `birthdate`, `deathdate`, `mobile`, `email`, `account`, `password`, `create_at`) VALUES
(1, 'I_am_admin', NULL, NULL, '', 'HappyCat01@gmail.com', 'HappyCat01', '$2y$10$AirwXJwahWxsQKJrrmlwE.nFkwin.K3ZR8qJE4HgYgqu4N0MIdb7C', '2022-06-09 13:52:24'),
(2, '貓貓貓', NULL, NULL, '', 'HappyCat02@gmail.com', 'HappyCat02', '$2y$10$NYuxH3UUfyHRr8yjeDo0Ou/zw83PT/hjbaAwWQ6u.MVlwhS2KMct6', '2022-06-09 13:52:51'),
(3, '九天玄女不在這', NULL, NULL, '', 'HappyCat03@gmail.com', 'HappyCat03', '$2y$10$QCyABgd5IjBYYmQhnK0bpeBjSOKzSjiPbyI8fFPpV.cBoclFe8f1.', '2022-06-09 13:53:34'),
(4, 'Bible Thumb', NULL, NULL, '', 'HappyCat04@gmail.com', 'HappyCat04', '$2y$10$xyN7xDkGJ5SustZEWCDyIuA/7RdTp0Y3yg4MhtFPFyzmnmayB9EZC', '2022-06-09 13:54:15'),
(5, 'Tony Stark', NULL, NULL, '', 'HappyCat05@gmail.com', 'HappyCat05', '$2y$10$sFaM2bucSZ9h0bRb9vXYJuwSy1.YS7eHOutpxih.qfOieXQX1b6ze', '2022-06-09 13:54:42'),
(6, '怎一直下雨', NULL, NULL, '', 'HappyCat06@gmail.com', 'HappyCat06', '$2y$10$KQFhzDlfZFdk.stmlCA7U.il3fDWO2z0kkVzrHuF9SJPIgNXWKAp.', '2022-06-09 13:55:06'),
(7, '趕著投胎', NULL, NULL, '', 'HappyCat07@gmail.com', 'HappyCat07', '$2y$10$Wy1j.2RcH0cA565y0kP2I.yIGvH8rdoEFXhWRokuDHgOerj1NNG9u', '2022-06-09 13:55:27'),
(8, '咖啡因成癮重症患者', NULL, NULL, '', 'HappyCat08@gmail.com', 'HappyCat08', '$2y$10$hfdvXtFq2/leKrM2jLXxf.L1YiKAr5wMCq7.rp69fiSgoG3pnJlsK', '2022-06-09 13:55:47'),
(9, '陳怡君', NULL, NULL, '', 'HappyCat09@gmail.com', 'HappyCat09', '$2y$10$7zyt3mR2ghfGKn9xkEWgdeXlmxoRy4rm3DmrP/3kDFMXoIPPEj/wy', '2022-06-09 13:56:28'),
(10, '總有幾隻貓的', NULL, NULL, '', 'HappyCat10@gmail.com', 'HappyCat10', '$2y$10$n3p/32p42bi1QqX/U0KjBe4Yb0WdAI.8UaoZH3tiRR8NbBaxHGcOK', '2022-06-09 13:56:51'),
(11, 'unhappy cat', NULL, NULL, '', 'HappyCat11@gmail.com', 'HappyCat11', '$2y$10$JG.LjNM0flM7vAV8zkh6PO3Hb2bgA3c8xKW83W2qbgJgns/n/Hdoa', '2022-06-09 13:57:16'),
(12, '靈魂急轉彎', NULL, NULL, '', 'HappyCat12@gmail.com', 'HappyCat12', '$2y$10$7.aum6zzCAAX1XsrQyhOf.U8r5MrG586P2fdGiW27WfBOztqK4IHa', '2022-06-09 13:57:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
