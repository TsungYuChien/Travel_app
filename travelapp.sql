-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019 年 08 月 16 日 10:31
-- 伺服器版本： 8.0.15
-- PHP 版本： 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `travel_app`
--
CREATE DATABASE IF NOT EXISTS `travel_app` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `travel_app`;

-- --------------------------------------------------------

--
-- 資料表結構 `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `photo_type` varchar(255) NOT NULL,
  `photo_data` mediumblob NOT NULL,
  `groupUid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `groupManager`
--

CREATE TABLE `groupManager` (
  `id` int(32) NOT NULL,
  `groupUid` int(32) DEFAULT NULL,
  `chatUid` int(32) DEFAULT NULL,
  `groupName` varchar(256) NOT NULL,
  `groupDate` date NOT NULL,
  `groupDays` int(11) NOT NULL,
  `groupAlarm` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(32) NOT NULL,
  `uid` int(32) DEFAULT NULL,
  `name` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `avatar_type` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `avatar_data` mediumblob,
  `mygroup` int(11) DEFAULT NULL,
  `mychat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `groupManager`
--
ALTER TABLE `groupManager`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `groupManager`
--
ALTER TABLE `groupManager`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
