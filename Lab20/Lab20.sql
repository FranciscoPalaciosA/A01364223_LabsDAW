-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2018 at 12:57 AM
-- Server version: 5.5.57-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Lab19`
--

-- --------------------------------------------------------

--
-- Table structure for table `Ciudades`
--

CREATE TABLE IF NOT EXISTS `Ciudades` (
  `id_Ciudad` int(11) NOT NULL AUTO_INCREMENT,
  `id_Pais` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_Ciudad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `Ciudades`
--

INSERT INTO `Ciudades` (`id_Ciudad`, `id_Pais`, `nombre`) VALUES
(1, 1, 'Cd de Mexico'),
(2, 1, 'Cancun'),
(3, 1, 'Acapulco'),
(4, 1, 'Santiago de Qro'),
(5, 2, 'Medellin'),
(6, 2, 'Medellin'),
(7, 2, 'Bogota'),
(8, 2, 'Cali'),
(9, 3, 'Vancouver'),
(10, 3, 'Montreal'),
(11, 3, 'Toronto'),
(12, 4, 'La Paz'),
(13, 4, 'Potosí'),
(14, 5, 'Caracas'),
(15, 5, 'Maracay'),
(16, 6, 'Asunción'),
(17, 6, 'Luque'),
(18, 7, 'Buenos Aires'),
(19, 7, 'Vancouver');

-- --------------------------------------------------------

--
-- Table structure for table `Paises`
--

CREATE TABLE IF NOT EXISTS `Paises` (
  `id_Pais` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_Pais`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `Paises`
--

INSERT INTO `Paises` (`id_Pais`, `nombre`) VALUES
(1, 'Mexico'),
(2, 'Colombia'),
(3, 'Canada'),
(4, 'Bolivia'),
(5, 'Venezuela'),
(6, 'Paraguay'),
(7, 'Argentina');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
