-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 21, 2014 at 04:36 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `passport`
--

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE IF NOT EXISTS `child` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent` int(10) NOT NULL,
  `value` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `child`
--

INSERT INTO `child` (`id`, `parent`, `value`) VALUES
(1, 8, 27),
(2, 8, 48),
(3, 8, 31),
(4, 8, 9),
(5, 8, 38),
(6, 8, 29),
(7, 8, 24),
(8, 8, 8),
(9, 8, 23),
(10, 15, 19495),
(11, 15, 8946),
(12, 15, 2574),
(13, 15, 2773),
(14, 15, 5332),
(15, 15, 6473),
(16, 15, 9252),
(17, 15, 1843),
(18, 15, 10193),
(19, 15, 17554),
(20, 15, 13390),
(21, 15, 4155),
(22, 15, 8452),
(35, 14, 113),
(36, 14, 448),
(37, 14, 39);

-- --------------------------------------------------------

--
-- Table structure for table `factory`
--

CREATE TABLE IF NOT EXISTS `factory` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `children` int(2) NOT NULL,
  `min` int(10) NOT NULL,
  `max` int(10) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `factory`
--

INSERT INTO `factory` (`id`, `name`, `children`, `min`, `max`, `modified`) VALUES
(8, 'factory 1', 9, 7, 54, '2009-01-01 05:00:00'),
(9, 'temporary', 0, 0, 1, '2014-11-19 04:34:35'),
(10, 'temporary', 0, 0, 1, '2014-11-19 04:34:59'),
(11, 'temporary', 0, 0, 1, '2014-11-19 04:36:28'),
(12, 'new factory', 0, 0, 1, '2014-11-19 23:14:08'),
(14, 'new factory', 3, 1, 500, '2014-11-19 23:14:00'),
(15, 'factory13', 13, 1, 20000, '2009-01-01 05:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `child`
--
ALTER TABLE `child`
  ADD CONSTRAINT `child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `factory` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
