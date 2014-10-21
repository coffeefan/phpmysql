-- phpMyAdmin SQL Dump
-- version 4.3.0-dev
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 21, 2014 at 08:26 AM
-- Server version: 5.5.38-0ubuntu0.12.04.1
-- PHP Version: 5.4.32-2+deb.sury.org~precise+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbtodo`
--

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE IF NOT EXISTS `todos` (
`todoid` int(32) NOT NULL,
  `description` text COLLATE utf8_bin,
  `deadline` date DEFAULT NULL,
  `status` enum('uncompleted','completed') COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`todoid`, `description`, `deadline`, `status`) VALUES
(1, '1. Eintrag Manuel', '2014-10-21', 'uncompleted'),
(2, '2. Eintrag Manuel', '2014-10-22', 'uncompleted'),
(3, 'hallo', '2014-10-21', 'uncompleted'),
(4, 'fg', NULL, 'completed'),
(8, 'Äpfel einkaufen', '2014-10-23', 'completed'),
(9, 'test', '2014-10-21', 'uncompleted'),
(10, 'test', '2014-10-21', 'uncompleted'),
(11, 'Milch einkaufen', NULL, 'uncompleted');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
 ADD PRIMARY KEY (`todoid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
MODIFY `todoid` int(32) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
