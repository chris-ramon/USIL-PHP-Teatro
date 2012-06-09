-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-06-2012 a las 17:20:37
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `teatro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores`
--

CREATE TABLE IF NOT EXISTS `actores` (
  `actorId` int(11) NOT NULL AUTO_INCREMENT,
  `obraId` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  PRIMARY KEY (`actorId`),
  KEY `obraId` (`obraId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `actores`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `comentarioId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `comentario` varchar(1024) NOT NULL,
  `obraId` int(11) NOT NULL,
  `fechaHora` datetime NOT NULL,
  PRIMARY KEY (`comentarioId`),
  KEY `userId` (`userId`),
  KEY `obraId` (`obraId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `comentarios`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras`
--

CREATE TABLE IF NOT EXISTS `obras` (
  `obraId` int(11) NOT NULL AUTO_INCREMENT,
  `autor` varchar(60) NOT NULL,
  `director` varchar(120) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `reseña` varchar(1024) NOT NULL,
  `afiche` varchar(200) NOT NULL,
  `puntos` int(11) NOT NULL DEFAULT '0',
  `likes` int(11) NOT NULL DEFAULT '0',
  `lugar` varchar(150) NOT NULL,
  `fechaHora` datetime NOT NULL,
  `temporada` varchar(70) NOT NULL,
  `precio` double NOT NULL,
  PRIMARY KEY (`obraId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `obras`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `userId` int(50) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(75) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `logged` varchar(2) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--


--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `actores`
--
ALTER TABLE `actores`
  ADD CONSTRAINT `actores_ibfk_1` FOREIGN KEY (`obraId`) REFERENCES `obras` (`obraId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `usuarios` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`obraId`) REFERENCES `obras` (`obraId`) ON DELETE CASCADE ON UPDATE CASCADE;
