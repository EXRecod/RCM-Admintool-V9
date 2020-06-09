-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3308
-- Время создания: Май 19 2019 г., 12:20
-- Версия сервера: 5.7.23
-- Версия PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `adminmod`
--

-- --------------------------------------------------------

--
-- Структура таблицы `db_stats_0`
--

DROP TABLE IF EXISTS `db_stats_0`;
CREATE TABLE IF NOT EXISTS `db_stats_0` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_pg` bigint(18) NOT NULL,
  `s_guid` varchar(32) NOT NULL,
  `s_port` int(14) NOT NULL,
  `servername` varchar(60) NOT NULL,
  `s_player` varchar(50) NOT NULL,
  `s_time` datetime NOT NULL,
  `s_lasttime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `s_pg` (`s_pg`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `db_stats_1`
--

DROP TABLE IF EXISTS `db_stats_1`;
CREATE TABLE IF NOT EXISTS `db_stats_1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_pg` bigint(20) NOT NULL,
  `s_kills` int(8) NOT NULL,
  `s_deaths` int(8) NOT NULL,
  `s_heads` int(8) NOT NULL,
  `s_suicids` int(8) NOT NULL,
  `s_fall` int(8) NOT NULL,
  `s_melle` int(8) NOT NULL,
  `s_dmg` int(8) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `s_pg` (`s_pg`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `db_stats_2`
--

DROP TABLE IF EXISTS `db_stats_2`;
CREATE TABLE IF NOT EXISTS `db_stats_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_pg` bigint(20) NOT NULL,
  `s_port` int(14) NOT NULL,
  `w_place` mediumint(5) NOT NULL,
  `w_skill` float NOT NULL,
  `w_ratio` float NOT NULL,
  `w_geo` varchar(4) NOT NULL,
  `w_prestige` int(6) NOT NULL,
  `w_fps` int(5) NOT NULL,
  `w_ip` varchar(16) NOT NULL,
  `w_ping` int(5) NOT NULL,
  `n_kills` int(5) NOT NULL,
  `n_deaths` int(5) NOT NULL,
  `n_heads` smallint(3) NOT NULL,
  `n_kills_min` tinyint(2) NOT NULL,
  `n_deaths_min` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `s_pg` (`s_pg`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `db_stats_3`
--

DROP TABLE IF EXISTS `db_stats_3`;
CREATE TABLE IF NOT EXISTS `db_stats_3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_pg` bigint(20) NOT NULL,
  `claymore` mediumint(8) NOT NULL,
  `c4` mediumint(8) NOT NULL,
  `grenade` mediumint(8) NOT NULL,
  `maps` mediumint(8) NOT NULL,
  `heli` mediumint(8) NOT NULL,
  `bombs` mediumint(8) NOT NULL,
  `avia` mediumint(8) NOT NULL,
  `artillery` mediumint(8) NOT NULL,
  `camp` mediumint(6) NOT NULL,
  `flags` mediumint(6) NOT NULL,
  `saveflags` mediumint(6) NOT NULL,
  `bonus` mediumint(6) NOT NULL,
  `series` mediumint(6) NOT NULL,
  `bomb_plant` mediumint(6) NOT NULL,
  `bomb_defused` mediumint(6) NOT NULL,
  `juggernaut_kill` mediumint(6) NOT NULL,
  `destroyed_helicopter` mediumint(6) NOT NULL,
  `rcxd_destroyed` mediumint(6) NOT NULL,
  `turret_destroyed` mediumint(6) NOT NULL,
  `sam_kill` mediumint(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `s_pg` (`s_pg`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `db_stats_4`
--

DROP TABLE IF EXISTS `db_stats_4`;
CREATE TABLE IF NOT EXISTS `db_stats_4` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_pg` bigint(20) NOT NULL,
  `ak47_` mediumint(6) NOT NULL,
  `ak74u_` mediumint(6) NOT NULL,
  `deserteagle` mediumint(6) NOT NULL,
  `m40a3_` mediumint(6) NOT NULL,
  `m4_` mediumint(6) NOT NULL,
  `m1014_` mediumint(6) NOT NULL,
  `uzi_` mediumint(6) NOT NULL,
  `g3_` mediumint(6) NOT NULL,
  `g36c_` mediumint(6) NOT NULL,
  `remington700_` mediumint(6) NOT NULL,
  `mp5_` mediumint(6) NOT NULL,
  `winchester1200_` mediumint(6) NOT NULL,
  `m16_` mediumint(6) NOT NULL,
  `m14_` mediumint(6) NOT NULL,
  `rpd_` mediumint(6) NOT NULL,
  `m60e4_` mediumint(6) NOT NULL,
  `rpg_` mediumint(6) NOT NULL,
  `saw_` mediumint(6) NOT NULL,
  `p90_` mediumint(6) NOT NULL,
  `barrett_` mediumint(6) NOT NULL,
  `mp44_` mediumint(6) NOT NULL,
  `beretta_` mediumint(6) NOT NULL,
  `colt45_` mediumint(6) NOT NULL,
  `usp_` mediumint(6) NOT NULL,
  `dragunov_` mediumint(6) NOT NULL,
  `skorpion_` mediumint(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `s_pg` (`s_pg`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `db_stats_5`
--

DROP TABLE IF EXISTS `db_stats_5`;
CREATE TABLE IF NOT EXISTS `db_stats_5` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_pg` bigint(20) NOT NULL,
  `ac130_` mediumint(6) NOT NULL,
  `airstrike_` mediumint(6) NOT NULL,
  `at4_mp` mediumint(6) NOT NULL,
  `aw50_` mediumint(6) NOT NULL,
  `binoculars` mediumint(6) NOT NULL,
  `cobra_` mediumint(6) NOT NULL,
  `defaultweapon_mp` mediumint(6) NOT NULL,
  `destructible_car` mediumint(6) NOT NULL,
  `destructible_bar` mediumint(6) NOT NULL,
  `hind_ffar` mediumint(6) NOT NULL,
  `helicopter_` mediumint(6) NOT NULL,
  `radar_` mediumint(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `s_pg` (`s_pg`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `db_stats_hits`
--

DROP TABLE IF EXISTS `db_stats_hits`;
CREATE TABLE IF NOT EXISTS `db_stats_hits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_pg` bigint(20) NOT NULL,
  `head` mediumint(7) NOT NULL,
  `torso_lower` mediumint(7) NOT NULL,
  `torso_upper` mediumint(7) NOT NULL,
  `right_arm_lower` mediumint(7) NOT NULL,
  `left_leg_upper` mediumint(7) NOT NULL,
  `neck` mediumint(7) NOT NULL,
  `right_arm_upper` mediumint(7) NOT NULL,
  `left_hand` mediumint(7) NOT NULL,
  `left_arm_lower` mediumint(7) NOT NULL,
  `none` mediumint(7) NOT NULL,
  `right_leg_upper` mediumint(7) NOT NULL,
  `left_arm_upper` mediumint(7) NOT NULL,
  `right_leg_lower` mediumint(7) NOT NULL,
  `left_foot` mediumint(7) NOT NULL,
  `right_foot` mediumint(7) NOT NULL,
  `right_hand` mediumint(7) NOT NULL,
  `left_leg_lower` mediumint(7) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `s_pg` (`s_pg`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
