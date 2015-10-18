-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2015 at 05:10 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `users`
--

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE IF NOT EXISTS `mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idsend` int(11) NOT NULL,
  `idfrom` int(11) NOT NULL,
  `subject` varchar(50) CHARACTER SET utf8 NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `del_from` tinyint(1) NOT NULL,
  `del_to` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `idsend`, `idfrom`, `subject`, `message`, `time`, `seen`, `del_from`, `del_to`) VALUES
(1, 5, 1, '123', '123', '2015-10-18 15:14:06', 0, 1, 0),
(2, 12, 1, '123', '123', '2015-10-18 15:27:21', 0, 0, 0),
(3, 1, 11, '123', '1\r\n1\r\n1\r\n11\r\n1\r\n1\r\n1\r\n1\r\n1', '2015-10-18 16:16:21', 0, 0, 1),
(4, 12, 1, 'test', 'test', '2015-10-18 16:58:20', 0, 0, 0),
(5, 1, 12, '123', 'test', '2015-10-18 17:03:29', 0, 0, 0),
(6, 1, 12, 'test mail', 'tasy', '2015-10-18 17:04:23', 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
