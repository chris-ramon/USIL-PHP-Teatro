-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 01, 2012 at 03:28 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `teatro`
--
CREATE DATABASE `teatro` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `teatro`;

-- --------------------------------------------------------

--
-- Table structure for table `actores`
--

CREATE TABLE IF NOT EXISTS `actores` (
  `actorId` int(11) NOT NULL AUTO_INCREMENT,
  `obraId` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `edad` int(11) NOT NULL,
  `genero` varchar(1) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `descripcion` varchar(1024) NOT NULL,
  PRIMARY KEY (`actorId`),
  KEY `obraId` (`obraId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `actores`
--


-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
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
-- Dumping data for table `comentarios`
--


-- --------------------------------------------------------

--
-- Table structure for table `obras`
--

CREATE TABLE IF NOT EXISTS `obras` (
  `obraId` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `puntos` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `lugar` varchar(150) NOT NULL,
  `fechaHora` datetime NOT NULL,
  PRIMARY KEY (`obraId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `obras`
--


-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(40) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `genero` varchar(1) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `usuarios`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `actores`
--
ALTER TABLE `actores`
  ADD CONSTRAINT `actores_ibfk_1` FOREIGN KEY (`obraId`) REFERENCES `obras` (`obraId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `usuarios` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`obraId`) REFERENCES `obras` (`obraId`) ON DELETE CASCADE ON UPDATE CASCADE;
