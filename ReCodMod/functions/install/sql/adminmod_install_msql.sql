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
-- Table structure for table `maps`
-- 


-- DROP TABLE IF EXISTS `maps`;
CREATE TABLE IF NOT EXISTS `maps` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `s_port` mediumint(8) unsigned NOT NULL default '0',
  `name` varchar(25) NOT NULL default '',
  `gametype` varchar(25) NOT NULL default '',
  `kills` mediumint(8) unsigned NOT NULL default '0',
  `deaths` mediumint(8) unsigned NOT NULL default '0',
  `rounds` mediumint(8) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
 
-- --------------------------------------------------------


-- 
-- Table structure for table `playermaps`
-- 
   
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
  UNIQUE KEY `gt_map_shid` (`gt_map_shid`),
  KEY `mapname` (`mapname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;	

 
-- --------------------------------------------------------

-- 
-- Table structure for table `opponents`
-- 

CREATE TABLE IF NOT EXISTS `opponents` (
  `id` mediumint(8) unsigned NOT NULL auto_increment,
  `target_spg` bigint(28) unsigned NOT NULL default '0',
  `killer_spg` bigint(28) unsigned NOT NULL default '0',
  `kills` smallint(5) unsigned NOT NULL default '0',
  `deaths` smallint(5) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `target_spg` (`target_spg`),
  KEY `killer_spg` (`killer_spg`)
)  ENGINE=MyISAM DEFAULT CHARSET=utf8;


 
-- --------------------------------------------------------


--
-- Структура таблицы `chat`
--
 
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servername` varchar(150) NOT NULL,
  `s_port` bigint(38) NOT NULL,
  `guid` varchar(40) NOT NULL,
  `nickname` varchar(100) NOT NULL,
  `time` datetime NOT NULL,
  `timeh` datetime NOT NULL,
  `text` varchar(255) NOT NULL,
  `st1` varchar(40) NOT NULL,
  `st1days` varchar(40) NOT NULL,
  `st2` varchar(40) NOT NULL,
  `st2days` varchar(40) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `geo` varchar(80) NOT NULL,
  `z` varchar(8) NOT NULL,
  `t` varchar(8) NOT NULL,
  `x` varchar(8) NOT NULL,
  `c` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
 
 
-- -------------------------------------------------------- 
 
 
--
-- Структура таблицы `chat_opt_new`
--
 
CREATE TABLE IF NOT EXISTS `chat_opt_new` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`s_port` bigint(28) NOT NULL,
`guid` varchar(32) NOT NULL,
`nickname` varchar(100) NOT NULL,
`time` datetime NOT NULL,
`text` varchar(255) NOT NULL,
`ip` varchar(16) NOT NULL,
`var` smallint(2) NOT NULL,
`vartwo` smallint(2) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
  
-- --------------------------------------------------------

--
-- Структура таблицы `amnistia`
--
 
CREATE TABLE IF NOT EXISTS `amnistia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `playername1` varchar(100) NOT NULL,
  `ip1` varchar(16) NOT NULL,
  `guid1` varchar(40) NOT NULL,
  `reason1` varchar(200) NOT NULL,
  `time1` varchar(100) NOT NULL,
  `whooo1` varchar(100) NOT NULL,
  `patch1` varchar(100) NOT NULL,
  `whounban1` varchar(90) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `bans`
--
 
CREATE TABLE IF NOT EXISTS `bans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `playername` varchar(100) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `guid` varchar(34) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `time` varchar(100) NOT NULL,
  `whooo` varchar(100) NOT NULL,
  `patch` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `banip`
--
 
CREATE TABLE IF NOT EXISTS `banip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `playername` varchar(100) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `iprange` varchar(16) NOT NULL,  
  `guid` varchar(34) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `time` datetime NOT NULL,
  `bantime` varchar(100) NOT NULL,
  `days` smallint(5) NOT NULL,
  `whooo` varchar(80) NOT NULL,
  `patch` int(8) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `iprange` (`iprange`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Структура таблицы `users`
--
 
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` bigint(24) NOT NULL,  
  `playername` varchar(80) NOT NULL,
  `password` varchar(32) NOT NULL,  
  `ip` varchar(18) NOT NULL,
  `geo` varchar(3) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `guid` (`guid`,`password`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;



-- --------------------------------------------------------
 

--
-- Структура таблицы `configs`
--
 
CREATE TABLE IF NOT EXISTS `configs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin` varchar(100) NOT NULL,
  `guid` varchar(32) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cfg` varchar(255) NOT NULL,
  `serverip` varchar(80) NOT NULL,
  `serverport` varchar(255) NOT NULL,
  `rcon` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `db_stats_0`
--
 
CREATE TABLE IF NOT EXISTS `db_stats_0` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_pg` bigint(28) NOT NULL,
  `s_guid` varchar(32) NOT NULL,
  `s_port` bigint(28) NOT NULL,
  `servername` varchar(90) NOT NULL,
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
 
CREATE TABLE IF NOT EXISTS `db_stats_1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_pg` bigint(28) NOT NULL,
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
 
CREATE TABLE IF NOT EXISTS `db_stats_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_pg` bigint(28) NOT NULL,
  `s_port` bigint(20) NOT NULL,  
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
 
CREATE TABLE IF NOT EXISTS `db_stats_3` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_pg` bigint(28) NOT NULL,
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
 
CREATE TABLE IF NOT EXISTS `db_stats_4` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_pg` bigint(28) NOT NULL,
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
 
CREATE TABLE IF NOT EXISTS `db_stats_5` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_pg` bigint(28) NOT NULL,
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
-- Структура таблицы `db_stats_day`
--
 
CREATE TABLE IF NOT EXISTS `db_stats_day` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servername` varchar(80) NOT NULL,
  `s_pg` bigint(30) NOT NULL,
  `w_guid` varchar(32) NOT NULL,
  `w_port` bigint(28) NOT NULL,
  `s_player` varchar(70) NOT NULL,
  `s_kills` int(10) NOT NULL,
  `s_deaths` int(10) NOT NULL,
  `s_heads` int(8) NOT NULL,
  `s_time` datetime NOT NULL,
  `s_lasttime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `s_pg` (`s_pg`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------
 
--
-- Структура таблицы `db_stats_week`
--
 
CREATE TABLE IF NOT EXISTS `db_stats_week` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servername` varchar(80) NOT NULL,
  `s_pg` bigint(30) NOT NULL,
  `w_guid` varchar(32) NOT NULL,
  `w_port` bigint(28) NOT NULL,
  `s_player` varchar(90) NOT NULL,
  `s_kills` mediumint(6) NOT NULL,
  `s_killsweap` mediumint(6) NOT NULL,
  `s_killsweap_min` smallint(3) NOT NULL,
  `s_deaths` int(8) NOT NULL,
  `s_deathsweap_min` smallint(3) NOT NULL,
  `s_heads` mediumint(6) NOT NULL,
  `s_time` datetime NOT NULL,
  `s_lasttime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `s_pg` (`s_pg`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Структура таблицы `db_stats_hits`
--
 
CREATE TABLE IF NOT EXISTS `db_stats_hits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_pg` bigint(28) NOT NULL,
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

--
-- Структура таблицы `getss`
--
 
CREATE TABLE IF NOT EXISTS `getss` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `e_admin` varchar(100) NOT NULL,
  `e_guid` varchar(32) NOT NULL,
  `e_nick` varchar(100) NOT NULL,
  `e_ip` varchar(16) NOT NULL,
  `e_uid` varchar(255) NOT NULL,
  `e_geo` varchar(100) NOT NULL,
  `e_counts` int(11) NOT NULL,
  `e_time` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `playerlist`
--
 
CREATE TABLE IF NOT EXISTS `playerlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servername` varchar(90) NOT NULL,
  `s_port` bigint(20) NOT NULL,
  `idnum` varchar(10) NOT NULL,
  `name` varchar(90) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `ping` varchar(18) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `player_status`
--
 
CREATE TABLE IF NOT EXISTS `player_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(32) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `timeh` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `text` varchar(80) NOT NULL,
  `status1` varchar(24) NOT NULL,
  `status1days` mediumint(6) NOT NULL,
  `status2` varchar(24) NOT NULL,
  `status2days` mediumint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------


--
-- Структура таблицы `chat_ban`
--
 
CREATE TABLE IF NOT EXISTS `chat_ban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(32) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `timeh` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` smallint(2) NOT NULL,
  `status1days` mediumint(6) NOT NULL,
  `admin` varchar(80) NOT NULL,
  `image` varchar(32) NOT NULL, 
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------


--
-- Структура таблицы `tranlslate`
--
 
CREATE TABLE IF NOT EXISTS `tranlslate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servername` varchar(250) NOT NULL,
  `s_port` bigint(20) NOT NULL,
  `idnum` varchar(10) NOT NULL,
  `name` varchar(90) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `activate` varchar(50) NOT NULL,
  `iso_country` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `guid` varchar(32) NOT NULL,
  `google` varchar(50) NOT NULL,
  `yandex` varchar(50) NOT NULL,
  `word` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `xactivator`
--
 
CREATE TABLE IF NOT EXISTS `xactivator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `servername` varchar(90) NOT NULL,
  `s_port` bigint(28) NOT NULL,
  `idnum` mediumint(5) NOT NULL,
  `name` varchar(90) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `chat` varchar(50) NOT NULL,
  `geo` varchar(50) NOT NULL,
  `actone` varchar(50) NOT NULL,
  `acttwo` varchar(50) NOT NULL,
  `actthree` varchar(50) NOT NULL,
  `screen` varchar(50) NOT NULL,
  `cguid` varchar(32) NOT NULL,
  `cgoogle` varchar(50) NOT NULL,
  `cyandex` varchar(50) NOT NULL,
  `cword` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `x_cmd_kck`
--
 
CREATE TABLE IF NOT EXISTS `x_cmd_kck` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `z_counts` varchar(50) NOT NULL,
  `s_dat` varchar(100) NOT NULL,
  `z_time` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `x_db_admins`
--
DROP TABLE IF EXISTS `x_db_admins`; 
CREATE TABLE IF NOT EXISTS `x_db_admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_adm` varchar(100) NOT NULL,
  `s_dat` varchar(55) NOT NULL,
  `s_group` varchar(55) NOT NULL,
  `s_guid` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `s_adm` (`s_adm`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `x_db_players`
--
  
CREATE TABLE IF NOT EXISTS `x_db_players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_port` mediumint(6) NOT NULL,
  `x_db_name` varchar(80) NOT NULL,
  `x_up_name` mediumint(6) NOT NULL,
  `x_db_ip` varchar(16) NOT NULL,
  `x_up_ip` mediumint(6) NOT NULL,
  `x_db_ping` mediumint(4) NOT NULL,
  `x_db_guid` bigint(24) NOT NULL,
  `x_db_conn` mediumint(6) NOT NULL,
  `x_db_date` datetime NOT NULL,
  `x_db_warn` mediumint(8) NOT NULL,
  `x_date_reg` datetime NOT NULL,
  `stat` smallint(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `x_db_guid` (`x_db_guid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `x_ranges`
--
 
CREATE TABLE IF NOT EXISTS `x_ranges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_ranges` varchar(100) NOT NULL,
  `ip_info` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `x_up_players`
--
 
CREATE TABLE IF NOT EXISTS `x_up_players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `ip` varchar(16) NOT NULL,
  `guid` bigint(26) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`,`ip`,`guid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `x_words`
--
 
CREATE TABLE IF NOT EXISTS `x_words` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `z_names` varchar(200) NOT NULL,
  `z_words` varchar(200) NOT NULL,
  `z_cmdlist` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------


--
-- Структура таблицы `sb_comms`
--

CREATE TABLE IF NOT EXISTS `sb_comms` (
  `bid` int(6) NOT NULL,
  `authid` varchar(64) NOT NULL,
  `name` varchar(128) NOT NULL DEFAULT 'unnamed',
  `created` int(11) NOT NULL DEFAULT '0',
  `ends` int(11) NOT NULL DEFAULT '0',
  `length` int(10) NOT NULL DEFAULT '0',
  `reason` text NOT NULL,
  `aid` int(6) NOT NULL DEFAULT '0',
  `adminIp` varchar(32) NOT NULL DEFAULT '',
  `sid` int(6) NOT NULL DEFAULT '0',
  `RemovedBy` int(8) DEFAULT NULL,
  `RemoveType` varchar(3) DEFAULT NULL,
  `RemovedOn` int(11) DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1 - Mute, 2 - Gag',
  `ureason` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


--
-- Структура таблицы `z_counts`
--
 
CREATE TABLE IF NOT EXISTS `z_counts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_dat` varchar(55) NOT NULL,
  `z_time` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


--
-- Индексы таблицы `sb_comms`
--
ALTER TABLE `sb_comms`
  ADD PRIMARY KEY (`bid`),
  ADD KEY `sid` (`sid`),
  ADD KEY `type` (`type`),
  ADD KEY `RemoveType` (`RemoveType`),
  ADD KEY `authid` (`authid`),
  ADD KEY `created` (`created`),
  ADD KEY `aid` (`aid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
