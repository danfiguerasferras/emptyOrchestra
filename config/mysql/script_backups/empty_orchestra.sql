-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.11 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para empty_orchestra
DROP DATABASE IF EXISTS `empty_orchestra`;
CREATE DATABASE IF NOT EXISTS `empty_orchestra` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `empty_orchestra`;


-- Volcando estructura para tabla empty_orchestra.albums
DROP TABLE IF EXISTS `albums`;
CREATE TABLE IF NOT EXISTS `albums` (
  `id_album` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No title' COMMENT 'name of the album',
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_album`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla empty_orchestra.albums: 9 rows
/*!40000 ALTER TABLE `albums` DISABLE KEYS */;
INSERT INTO `albums` (`id_album`, `name`, `added`) VALUES
	(1, 'Big Bang', '2016-08-28 11:46:01'),
	(2, 'Parem el temps', '2016-08-28 12:26:18'),
	(3, 'Llença\'t', '2016-08-28 12:26:18'),
	(4, 'Jo sóc com tu', '2016-08-28 12:26:34'),
	(5, 'Som riu', '2016-08-28 12:26:34'),
	(6, 'Grans exits', '2016-08-28 12:26:50'),
	(7, 'Postals', '2016-08-28 12:26:50'),
	(8, 'Només d\'entrar hi ha sempre el Dinosaure', '2016-08-28 13:09:45'),
	(9, 'Altres cançons del nadal 5', '2016-08-28 13:33:12');
/*!40000 ALTER TABLE `albums` ENABLE KEYS */;


-- Volcando estructura para tabla empty_orchestra.singers
DROP TABLE IF EXISTS `singers`;
CREATE TABLE IF NOT EXISTS `singers` (
  `id_singer` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) CHARACTER SET latin1 NOT NULL DEFAULT 'No name' COMMENT 'name of the singer/group',
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_singer`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla empty_orchestra.singers: 5 rows
/*!40000 ALTER TABLE `singers` DISABLE KEYS */;
INSERT INTO `singers` (`id_singer`, `name`, `added`) VALUES
	(1, 'Els Catarres', '2016-08-28 11:45:50'),
	(2, 'Crossing', '2016-08-28 12:25:04'),
	(3, 'Lax\'n\'Busto', '2016-08-28 12:25:14'),
	(4, 'Txarango', '2016-08-28 12:25:36'),
	(5, 'Els Amics de les Arts', '2016-08-28 13:09:06');
/*!40000 ALTER TABLE `singers` ENABLE KEYS */;


-- Volcando estructura para tabla empty_orchestra.songs
DROP TABLE IF EXISTS `songs`;
CREATE TABLE IF NOT EXISTS `songs` (
  `id_song` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No title' COMMENT 'name of the song',
  `singer` int(10) unsigned NOT NULL COMMENT 'id of the singer',
  `album` int(10) unsigned NOT NULL COMMENT 'id of the album',
  `file_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `favorite` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=no, 1=yes',
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_song`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla empty_orchestra.songs: 10 rows
/*!40000 ALTER TABLE `songs` DISABLE KEYS */;
INSERT INTO `songs` (`id_song`, `name`, `singer`, `album`, `file_name`, `favorite`, `added`) VALUES
	(1, 'En peu de guerra', 1, 1, '001_en_peu_de_guerra', 0, '2016-08-28 11:44:46'),
	(2, 'Parem el temps', 2, 2, '002_parem_el_temps', 0, '2016-08-28 12:39:08'),
	(3, 'Amb tu (<3)', 3, 3, '003_amb_tu', 1, '2016-08-28 12:39:34'),
	(4, 'Jo sóc com tu', 1, 4, '004_jo_soc_com_tu', 0, '2016-08-28 12:40:50'),
	(5, 'Som un riu', 4, 5, '005_som_un_riu', 1, '2016-08-28 13:04:08'),
	(6, 'Trepitja fort', 3, 6, '006_trepitja_fort', 0, '2016-08-28 13:04:29'),
	(7, 'La porta del cel', 1, 7, '007_la_porta_del_cel', 1, '2016-08-28 13:04:57'),
	(8, 'Compta amb mi', 4, 5, '008_compta amb mi', 1, '2016-08-28 13:05:21'),
	(9, 'Quan somrius', 1, 9, '009_quan_somrius', 1, '2016-08-28 13:08:16'),
	(10, 'Jo no ens passa', 5, 8, '010_ja_no_ens_passa', 0, '2016-08-28 13:11:30');
/*!40000 ALTER TABLE `songs` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;