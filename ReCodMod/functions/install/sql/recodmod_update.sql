-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 15 2020 г., 14:35
-- Версия сервера: 10.4.10-MariaDB
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `recodmod`
--

-- --------------------------------------------------------

--
-- Структура таблицы `maps`
--

DROP TABLE IF EXISTS `maps`;
CREATE TABLE IF NOT EXISTS `maps` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `s_port` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `name` varchar(25) NOT NULL DEFAULT '',
  `gametype` varchar(25) NOT NULL DEFAULT '',
  `kills` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `deaths` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `rounds` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `opponents`
--

DROP TABLE IF EXISTS `opponents`;
CREATE TABLE IF NOT EXISTS `opponents` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `target_spg` bigint(28) UNSIGNED NOT NULL DEFAULT 0,
  `killer_spg` bigint(28) UNSIGNED NOT NULL DEFAULT 0,
  `kills` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `deaths` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `target_spg` (`target_spg`),
  KEY `killer_spg` (`killer_spg`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `playermaps`
--
 
DROP TABLE IF EXISTS `playermaps`;
CREATE TABLE IF NOT EXISTS `playermaps` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `gt_map_shid` bigint(28) NOT NULL,
  `mapname` varchar(50) NOT NULL DEFAULT '',
  `gametype` varchar(50) NOT NULL DEFAULT '',
  `port` bigint(28) UNSIGNED NOT NULL DEFAULT 0,
  `guid` varchar(40) NOT NULL,
  `kills` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `deaths` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `teamkills` mediumint(8) UNSIGNED NOT NULL DEFAULT 0,
  `teamdeaths` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `suicides` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  `rounds` smallint(5) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `gt_map_shid` (`gt_map_shid`),
  KEY `mapname` (`mapname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
