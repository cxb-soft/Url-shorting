-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `config_name` mediumtext NOT NULL,
  `config_value` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `shorturl`;
CREATE TABLE `shorturl` (
  `shorturl` mediumtext NOT NULL,
  `url` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2020-06-07 13:28:49
