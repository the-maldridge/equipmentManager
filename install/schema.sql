-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2014 at 01:40 PM
-- Server version: 5.5.40
-- PHP Version: 5.4.4-14+deb7u14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `EQCHECKOUT`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE IF NOT EXISTS `checkout` (
  `index` int(11) NOT NULL AUTO_INCREMENT,
  `building` varchar(4) DEFAULT NULL,
  `name` varchar(25) DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `item` varchar(20) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `people` int(11) DEFAULT NULL,
  `damage` tinyint(1) DEFAULT NULL,
  `timeout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timein` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
