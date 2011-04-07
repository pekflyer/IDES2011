-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 07, 2011 at 12:41 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ides_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `studenttable`
--

CREATE TABLE IF NOT EXISTS `studenttable` (
  `stu_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_fname` varchar(255) NOT NULL,
  `std_lname` varchar(255) NOT NULL,
  `stu_web` varchar(255) DEFAULT NULL,
  `stu_email` varchar(255) DEFAULT NULL,
  `stu_hometown` varchar(255) DEFAULT NULL,
  `grp_title` varchar(255) DEFAULT NULL,
  `grp_name` varchar(255) DEFAULT 'st',
  `grp_id` int(11) DEFAULT NULL,
  `instructor` varchar(255) DEFAULT NULL,
  `quesOne` longtext COMMENT '1.  Project Abstract (100 words)',
  `quesTwo` longtext COMMENT '2.  How does design define/refine/redefine the way we live?',
  `quesThree` longtext COMMENT '3.  What inspires you to design?',
  `quesFour` longtext COMMENT '4.  What is your favourite book on design?',
  `quesFive` longtext COMMENT '5. Who is your favourite designer?',
  `quesSix` longtext COMMENT '6.  What do you enjoy most about design?',
  PRIMARY KEY (`stu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `studenttable`
--

INSERT INTO `studenttable` (`stu_id`, `stu_fname`, `std_lname`, `stu_web`, `stu_email`, `stu_hometown`, `grp_title`, `grp_name`, `grp_id`, `instructor`, `quesOne`, `quesTwo`, `quesThree`, `quesFour`, `quesFive`, `quesSix`) VALUES
(3, 'Erin', 'JEWELL', NULL, NULL, NULL, NULL, 'cpc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Kevin', 'MORGAN', NULL, NULL, NULL, NULL, 'cpc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Joseph', 'HEALY', NULL, NULL, NULL, NULL, 'cpc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Andrew', 'LOWE', NULL, NULL, NULL, NULL, 'cpc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Minh', 'DAO', NULL, NULL, NULL, NULL, 'cpc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Claire', 'KONG', NULL, NULL, NULL, NULL, 'Teknion', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Emmanuel', 'GUERRA GUNZEL', NULL, NULL, NULL, NULL, 'Teknion', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'William', 'LAU', NULL, NULL, NULL, NULL, 'Teknion', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Thomas', 'LEE', NULL, NULL, NULL, NULL, 'Teknion', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Cynthia', 'ZHANG', NULL, NULL, NULL, NULL, 'Teknion', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Charles', 'DOIRON', NULL, NULL, NULL, NULL, 'Teknion', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Eugene', 'PITYK', NULL, NULL, NULL, NULL, 'omnr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'Ruby', 'HO', NULL, NULL, NULL, NULL, 'omnr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'Jordan', 'PALMER', NULL, NULL, NULL, NULL, 'omnr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Brandon', 'VIOL', NULL, NULL, NULL, NULL, 'omnr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Lee', 'ODDY', NULL, NULL, NULL, NULL, 'omnr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Mark', 'FROMOW', NULL, NULL, NULL, NULL, 'omnr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Rachael', 'BUSSIN', NULL, NULL, NULL, NULL, 'lt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Rahim', 'BHIMANI', NULL, NULL, NULL, NULL, 'lt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Yasaman', 'SHERI', NULL, NULL, NULL, NULL, 'lt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'Jane', 'MARUSAIK', NULL, NULL, NULL, NULL, 'lt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Sam', 'SERRER', NULL, NULL, NULL, NULL, 'lt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Alena', 'IOUGUINA', NULL, NULL, NULL, NULL, 'lt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Mehmet', 'YUSBASIOGLU', NULL, NULL, NULL, NULL, 'rim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'Torrin', 'MULLINS', NULL, NULL, NULL, NULL, 'rim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Teddy', 'LUONG', NULL, NULL, NULL, NULL, 'rim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'Felix', 'LORSIGNOL', NULL, NULL, NULL, NULL, 'rim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Caleb', 'HILL', NULL, NULL, NULL, NULL, 'rim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Ece', 'TOROS', NULL, NULL, NULL, NULL, 'rim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Sisi', 'TANG', NULL, NULL, NULL, NULL, 'rim', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'Megan', 'MARIN', NULL, NULL, NULL, NULL, 'st', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Corey', 'McMAHON', NULL, NULL, NULL, NULL, 'st', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Lisa', 'HENDERSON', NULL, NULL, NULL, NULL, 'st', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
