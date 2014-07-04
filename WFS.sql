-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 04, 2014 at 03:12 PM
-- Server version: 5.5.33
-- PHP Version: 5.4.4-14+deb7u7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+10:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `WFS`
--

-- --------------------------------------------------------

--
-- Table structure for table `ASSETS`
--

CREATE TABLE IF NOT EXISTS `ASSETS` (
  `ASSET_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ASSET_TYPE_ID` int(11) DEFAULT NULL,
  `ASSET_VALUE` varchar(20) DEFAULT NULL,
  `NAME_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ASSET_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ASSET_TYPES`
--

CREATE TABLE IF NOT EXISTS `ASSET_TYPES` (
  `ASSET_TYPE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPTION` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`ASSET_TYPE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ASSET_TYPES`
--

INSERT INTO `ASSET_TYPES` (`ASSET_TYPE_ID`, `DESCRIPTION`) VALUES
(1, 'Cash'),
(2, 'Home'),
(3, 'Shares'),
(4, 'Term Deposit'),
(5, 'Managed Fund'),
(6, 'Superannuation Fund'),
(7, 'Pension');

-- --------------------------------------------------------

--
-- Table structure for table `CLIENTS`
--

CREATE TABLE IF NOT EXISTS `CLIENTS` (
  `CLIENT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`CLIENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `CONTACTS`
--

CREATE TABLE IF NOT EXISTS `CONTACTS` (
  `CONTACT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `UNIT_NUMBER` varchar(10) DEFAULT NULL,
  `STREET_NUMBER` varchar(10) DEFAULT NULL,
  `STREET_NAME` varchar(50) DEFAULT NULL,
  `SUBURB` varchar(50) DEFAULT NULL,
  `POSTAL_CODE` varchar(10) NOT NULL,
  `STATE_ID` int(11) DEFAULT NULL,
  `COUNTRY_ID` int(11) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `PHONE` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`CONTACT_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `CONTACTS`
--

INSERT INTO `CONTACTS` (`CONTACT_ID`, `UNIT_NUMBER`, `STREET_NUMBER`, `STREET_NAME`, `SUBURB`, `POSTAL_CODE`, `STATE_ID`, `COUNTRY_ID`, `EMAIL`, `PHONE`) VALUES
(1, '0', '', '', '', '', NULL, NULL, NULL, NULL),
(2, '0', '', '', '', '', NULL, NULL, NULL, NULL),
(3, '0', '', '', '', '', NULL, NULL, NULL, NULL),
(4, '', '', '', '', '', NULL, NULL, NULL, NULL),
(5, '', '', '', '', '', NULL, NULL, NULL, NULL),
(6, '', '', '', '', '', NULL, NULL, NULL, NULL),
(7, '', '', '', '', '', NULL, NULL, NULL, NULL),
(8, '', '', '', '', '', NULL, NULL, NULL, NULL),
(9, '', '', '', '', '', NULL, NULL, NULL, NULL),
(10, '', '', '', '', '', NULL, NULL, NULL, NULL),
(11, '', '', '', '', '', NULL, NULL, NULL, NULL),
(12, '', '', '', '', '', NULL, NULL, NULL, NULL),
(13, '', '', '', '', '', NULL, NULL, NULL, NULL),
(14, '1', '', '', '', '', NULL, NULL, NULL, NULL),
(15, '1', '32', 'Osborne St', 'Wollongong', '', NULL, NULL, NULL, NULL),
(16, '1', '32', 'Osborne St', 'Wollongong', '2500', NULL, NULL, NULL, NULL),
(17, '1', '32', 'Osborne St', 'Wollongong', '2500', NULL, NULL, NULL, NULL),
(18, '1', '32', 'Osborne St', 'Wollongong', '2500', NULL, NULL, 'glenn.harris@gmail.com', '0403274528'),
(19, '1', '32', 'Osborne St', 'Wollongong', '2500', 1, NULL, 'glenn.harris@gmail.com', '0403274528'),
(20, '1', '32', 'Osborne St', 'Wollongong', '2500', 1, NULL, 'glenn.harris@gmail.com', '0403274528');

-- --------------------------------------------------------

--
-- Table structure for table `GENDER`
--

CREATE TABLE IF NOT EXISTS `GENDER` (
  `GENDER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPTION` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`GENDER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `GENDER`
--

INSERT INTO `GENDER` (`GENDER_ID`, `DESCRIPTION`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `HEALTH_ISSUES`
--

CREATE TABLE IF NOT EXISTS `HEALTH_ISSUES` (
  `HEALTH_ISSUE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPTION` varchar(255) DEFAULT NULL,
  `NAME_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`HEALTH_ISSUE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `INCOMES`
--

CREATE TABLE IF NOT EXISTS `INCOMES` (
  `INCOME_ID` int(11) NOT NULL AUTO_INCREMENT,
  `INCOME_TYPE_ID` int(11) DEFAULT NULL,
  `INCOME_VALUE` varchar(20) DEFAULT NULL,
  `NAME_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`INCOME_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `INCOME_TYPES`
--

CREATE TABLE IF NOT EXISTS `INCOME_TYPES` (
  `INCOME_TYPE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPTION` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`INCOME_TYPE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `LIABILITIES`
--

CREATE TABLE IF NOT EXISTS `LIABILITIES` (
  `LIABILITY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LIABILITY_TYPE_ID` int(11) DEFAULT NULL,
  `LIABILITY_VALUE` varchar(20) DEFAULT NULL,
  `NAME_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`LIABILITY_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `LIABILITY_TYPES`
--

CREATE TABLE IF NOT EXISTS `LIABILITY_TYPES` (
  `LIABILITY_TYPE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPTION` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`LIABILITY_TYPE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `MARITAL_STATUS`
--

CREATE TABLE IF NOT EXISTS `MARITAL_STATUS` (
  `MARITAL_STATUS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPTION` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`MARITAL_STATUS_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `MARITAL_STATUS`
--

INSERT INTO `MARITAL_STATUS` (`MARITAL_STATUS_ID`, `DESCRIPTION`) VALUES
(1, 'Never Married'),
(2, 'Married'),
(3, 'Separated but not Divorced'),
(4, 'Divorced'),
(5, 'Widowed');

-- --------------------------------------------------------

--
-- Table structure for table `NAMES`
--

CREATE TABLE IF NOT EXISTS `NAMES` (
  `NAME_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FIRST_NAME` varchar(50) DEFAULT NULL,
  `LAST_NAME` varchar(50) DEFAULT NULL,
  `DATE_OF_BIRTH` date DEFAULT NULL,
  `GENDER` int(11) DEFAULT NULL,
  `MARITAL_STATUS` int(11) DEFAULT NULL,
  `WORK_STATUS` int(11) DEFAULT NULL,
  `JOB_TITLE` varchar(150) NOT NULL,
  `WILL` int(11) DEFAULT NULL,
  `POWER_OF_ATTORNEY` int(11) DEFAULT NULL,
  `CONTACT_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`NAME_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `NAMES`
--

INSERT INTO `NAMES` (`NAME_ID`, `FIRST_NAME`, `LAST_NAME`, `DATE_OF_BIRTH`, `GENDER`, `MARITAL_STATUS`, `WORK_STATUS`, `JOB_TITLE`, `WILL`, `POWER_OF_ATTORNEY`, `CONTACT_ID`) VALUES
(1, 'Gl', 'Ha', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(2, 'Glen', 'Harris', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL),
(3, 'Glenn', 'Harris', '0000-00-00', 1, 0, 1, '', NULL, NULL, NULL),
(4, 'Glenn', 'Ha', '1981-07-20', 1, 1, 1, '', NULL, NULL, NULL),
(5, 'Glenn', 'Ha', '1981-07-20', 1, 1, 1, '', NULL, NULL, NULL),
(6, '', '', '0000-00-00', 0, 0, 0, '', NULL, NULL, NULL),
(7, 'Glen', 'H', '1981-07-20', 1, 1, 1, '', NULL, NULL, NULL),
(8, 'Glenn', 'Harris', '1981-07-20', 1, 2, 1, '', NULL, NULL, NULL),
(9, 'Glenn', 'Harris', '1981-07-20', 1, 4, 1, '', NULL, NULL, 17),
(10, 'Glenn', 'Harris', '1981-07-20', 1, 4, 1, '', NULL, NULL, 18),
(11, 'Glenn', 'Harris', '1981-07-20', 1, 4, 1, '', NULL, NULL, 19),
(12, 'Glenn', 'Harris', '1981-07-20', 1, 1, 1, 'IT Officer', NULL, NULL, 20);

-- --------------------------------------------------------

--
-- Table structure for table `STATES`
--

CREATE TABLE IF NOT EXISTS `STATES` (
  `STATE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPTION` varchar(100) NOT NULL,
  PRIMARY KEY (`STATE_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `STATES`
--

INSERT INTO `STATES` (`STATE_ID`, `DESCRIPTION`) VALUES
(1, 'New South Wales'),
(2, 'Queensland'),
(3, 'Victoria'),
(4, 'South Australia'),
(5, 'Western Australia'),
(6, 'Australian Capital Territory'),
(7, 'Northern Territory'),
(8, 'Tasmania');

-- --------------------------------------------------------

--
-- Table structure for table `WORK_STATUS`
--

CREATE TABLE IF NOT EXISTS `WORK_STATUS` (
  `WORK_STATUS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPTION` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`WORK_STATUS_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `WORK_STATUS`
--

INSERT INTO `WORK_STATUS` (`WORK_STATUS_ID`, `DESCRIPTION`) VALUES
(1, 'Unemployed'),
(2, 'Full Time'),
(3, 'Part Time'),
(4, 'Casual'),
(5, 'Fixed Term');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
