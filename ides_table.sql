-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 30, 2011 at 02:11 PM
-- Server version: 5.1.44
-- PHP Version: 5.2.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `ides_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `groupTable`
--

CREATE TABLE `groupTable` (
  `grp_id` int(5) NOT NULL AUTO_INCREMENT,
  `grp_name` varchar(255) NOT NULL,
  `grp_website` varchar(255) NOT NULL,
  `grp_abstract` varchar(255) NOT NULL,
  PRIMARY KEY (`grp_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `groupTable`
--

INSERT INTO `groupTable` VALUES(1, 'RIM', 'http://www.rim.ca', 'we create shit for RIM');

-- --------------------------------------------------------

--
-- Table structure for table `photoTable`
--

CREATE TABLE `photoTable` (
  `studentID` int(5) NOT NULL,
  `headshot` varchar(255) CHARACTER SET latin1 NOT NULL,
  `prjOne` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `prjTwo` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `prjThree` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  UNIQUE KEY `studentID` (`studentID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photoTable`
--


-- --------------------------------------------------------

--
-- Table structure for table `studentTable`
--

CREATE TABLE `studentTable` (
  `stu_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_fname` varchar(255) NOT NULL,
  `std_lname` varchar(255) NOT NULL,
  `stu_web` varchar(255) NOT NULL,
  `stu_email` varchar(255) NOT NULL,
  `stu_hometown` varchar(255) NOT NULL,
  `grp_title` varchar(255) NOT NULL,
  `grp_name` varchar(255) NOT NULL,
  `grp_id` int(11) NOT NULL,
  `instructor` varchar(255) NOT NULL,
  `quesOne` longtext NOT NULL COMMENT '1.  Project Abstract (100 words)',
  `quesTwo` longtext NOT NULL COMMENT '2.  How does design define/refine/redefine the way we live?',
  `quesThree` longtext NOT NULL COMMENT '3.  What inspires you to design?',
  `quesFour` longtext NOT NULL COMMENT '4.  What is your favourite book on design?',
  `quesFive` longtext NOT NULL COMMENT '5. Who is your favourite designer?',
  `quesSix` longtext NOT NULL COMMENT '6.  What do you enjoy most about design?',
  PRIMARY KEY (`stu_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `studentTable`
--

INSERT INTO `studentTable` VALUES(1, 'allan', 'yong', 'http://www.allanyong.com', 'allan@allanyong.com', 'Ottawa', 'RIM', 'RIM sucks', 1, 'Chris Joslin', 'test question answer', 'test question answer', 'test question answer', 'test question answer', 'test question answer', '');
INSERT INTO `studentTable` VALUES(2, 'henri', 'Kus', 'http://www.oh-henri.com', 'henri@henri.com', 'Germany', 'RIM', 'RIM sucks', 1, 'Chris Joslin', 'test question answer', 'test question answer', 'test question answer', 'test question answer', 'test question answer', '');
