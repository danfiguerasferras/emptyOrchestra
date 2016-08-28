-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-08-2016 a las 09:47:31
-- Versión del servidor: 5.7.11
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empty_orchestra`
--
CREATE DATABASE IF NOT EXISTS `empty_orchestra` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `empty_orchestra`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albums`
--

DROP TABLE IF EXISTS `albums`;
CREATE TABLE `albums` (
  `id_album` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No title' COMMENT 'name of the album',
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `albums`
--

INSERT INTO `albums` (`id_album`, `name`, `added`) VALUES
(1, 'Big Bang', '2016-08-28 09:46:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `singers`
--

DROP TABLE IF EXISTS `singers`;
CREATE TABLE `singers` (
  `id_singer` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) CHARACTER SET latin1 NOT NULL DEFAULT 'No name' COMMENT 'name of the singer/group',
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `singers`
--

INSERT INTO `singers` (`id_singer`, `name`, `added`) VALUES
(1, 'Els Catarres', '2016-08-28 09:45:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `songs`
--

DROP TABLE IF EXISTS `songs`;
CREATE TABLE `songs` (
  `id_song` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'No title' COMMENT 'name of the song',
  `singer` int(10) UNSIGNED NOT NULL COMMENT 'id of the singer',
  `album` int(10) UNSIGNED NOT NULL COMMENT 'id of the album',
  `file_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'name of the file without the extension',
  `favorite` tinyint(1) NOT NULL COMMENT '0=no, 1=yes',
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `songs`
--

INSERT INTO `songs` (`id_song`, `name`, `singer`, `album`, `file_name`, `favorite`, `added`) VALUES
(1, 'En peu de guerra', 1, 1, '001_en_peu_de_guerra', 0, '2016-08-28 09:44:46');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id_album`);

--
-- Indices de la tabla `singers`
--
ALTER TABLE `singers`
  ADD PRIMARY KEY (`id_singer`);

--
-- Indices de la tabla `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id_song`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `albums`
--
ALTER TABLE `albums`
  MODIFY `id_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `singers`
--
ALTER TABLE `singers`
  MODIFY `id_singer` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `songs`
--
ALTER TABLE `songs`
  MODIFY `id_song` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
