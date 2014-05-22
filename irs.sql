-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2014 年 05 月 22 日 20:34
-- 伺服器版本: 5.5.37-0ubuntu0.14.04.1
-- PHP 版本： 5.5.9-1ubuntu4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `irs`
--

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `NO` int(11) NOT NULL,
  `username` char(20) NOT NULL,
  `password` text NOT NULL,
  UNIQUE KEY `NO` (`NO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `admin`
--

INSERT INTO `admin` (`NO`, `username`, `password`) VALUES
(1, 'admin', '1f3870be274f6c49b3e31a0c6728957f');

-- --------------------------------------------------------

--
-- 資料表結構 `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(32) NOT NULL,
  `time` datetime NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `form` int(11) NOT NULL,
  `answer` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`),
  KEY `ip` (`ip`),
  KEY `ip_2` (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 資料表結構 `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `form` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `status`
--

INSERT INTO `status` (`form`) VALUES
(1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
