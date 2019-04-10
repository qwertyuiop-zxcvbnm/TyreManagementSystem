-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 25, 2019 at 04:14 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketing_master_db`
--
CREATE DATABASE IF NOT EXISTS `ticketing_master_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ticketing_master_db`;

-- --------------------------------------------------------

--
-- Table structure for table `combinationkeys`
--

DROP TABLE IF EXISTS `combinationkeys`;
CREATE TABLE IF NOT EXISTS `combinationkeys` (
  `KeyId` int(11) NOT NULL AUTO_INCREMENT,
  `HasTicketType` bit(1) DEFAULT NULL,
  `HasTicketCategory` bit(1) DEFAULT NULL,
  `HasTicketPassType` bit(1) DEFAULT NULL,
  `HasGroup` bit(1) DEFAULT NULL,
  PRIMARY KEY (`KeyId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Passwordx` varchar(1000) DEFAULT NULL,
  `PhoneNo` varchar(11) DEFAULT NULL,
  `CreatedOn` varchar(50) DEFAULT NULL,
  `VisitedTime` int(11) DEFAULT NULL,
  `LastSeen` datetime DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eventcategory`
--

DROP TABLE IF EXISTS `eventcategory`;
CREATE TABLE IF NOT EXISTS `eventcategory` (
  `EventCategoryId` int(11) NOT NULL,
  `EventCategoryName` varchar(50) NOT NULL,
  PRIMARY KEY (`EventCategoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eventgrouplimit`
--

DROP TABLE IF EXISTS `eventgrouplimit`;
CREATE TABLE IF NOT EXISTS `eventgrouplimit` (
  `EventGroupLimitId` int(11) NOT NULL AUTO_INCREMENT,
  `EventGroupLimit` varchar(50) DEFAULT NULL,
  `EventsSeats` int(11) DEFAULT NULL,
  PRIMARY KEY (`EventGroupLimitId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eventhost`
--

DROP TABLE IF EXISTS `eventhost`;
CREATE TABLE IF NOT EXISTS `eventhost` (
  `EventHostId` int(11) NOT NULL AUTO_INCREMENT,
  `EventInfoId` int(11) DEFAULT NULL,
  `EventHostName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`EventHostId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eventinfo`
--

DROP TABLE IF EXISTS `eventinfo`;
CREATE TABLE IF NOT EXISTS `eventinfo` (
  `EventInfoId` int(11) NOT NULL AUTO_INCREMENT,
  `EventHeader` varchar(50) DEFAULT NULL,
  `EventDescription` varchar(50) DEFAULT NULL,
  `EventCategoryId` int(11) DEFAULT NULL,
  `EventLocation` varchar(50) DEFAULT NULL,
  `StartDate` datetime DEFAULT NULL,
  `EndDate` datetime DEFAULT NULL,
  `CreatedBy` varchar(50) DEFAULT NULL,
  `CreatedOn` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`EventInfoId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eventposters`
--

DROP TABLE IF EXISTS `eventposters`;
CREATE TABLE IF NOT EXISTS `eventposters` (
  `EventPosterId` int(11) NOT NULL AUTO_INCREMENT,
  `EventinfoId` int(11) DEFAULT NULL,
  `EventPosterType` int(11) DEFAULT NULL,
  `EventPoster` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`EventPosterId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eventticketcategorylimit`
--

DROP TABLE IF EXISTS `eventticketcategorylimit`;
CREATE TABLE IF NOT EXISTS `eventticketcategorylimit` (
  `EventTicketCategoryLimitId` int(11) NOT NULL AUTO_INCREMENT,
  `EventInfoId` varchar(50) DEFAULT NULL,
  `EventsSeats` int(11) DEFAULT NULL,
  `StartDate` datetime DEFAULT NULL,
  `EndDate` datetime DEFAULT NULL,
  PRIMARY KEY (`EventTicketCategoryLimitId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eventticketpasstype`
--

DROP TABLE IF EXISTS `eventticketpasstype`;
CREATE TABLE IF NOT EXISTS `eventticketpasstype` (
  `EventTicketPassTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `EventTypePassName` varchar(50) DEFAULT NULL,
  `EventsSeats` int(11) DEFAULT NULL,
  PRIMARY KEY (`EventTicketPassTypeId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `eventtickettypelimit`
--

DROP TABLE IF EXISTS `eventtickettypelimit`;
CREATE TABLE IF NOT EXISTS `eventtickettypelimit` (
  `EventTicketTypeLimitId` int(11) NOT NULL AUTO_INCREMENT,
  `EventInfoId` int(11) DEFAULT NULL,
  `EventSeats` int(11) DEFAULT NULL,
  PRIMARY KEY (`EventTicketTypeLimitId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groupticket`
--

DROP TABLE IF EXISTS `groupticket`;
CREATE TABLE IF NOT EXISTS `groupticket` (
  `GroupTicketId` int(11) NOT NULL AUTO_INCREMENT,
  `GroupTicketName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`GroupTicketId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `PaymentId` int(11) NOT NULL AUTO_INCREMENT,
  `TicketId` varchar(50) DEFAULT NULL,
  `PaymentTypeId` int(11) DEFAULT NULL,
  `Cost` decimal(12,2) DEFAULT NULL,
  `paymentcode` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`PaymentId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paymenttype`
--

DROP TABLE IF EXISTS `paymenttype`;
CREATE TABLE IF NOT EXISTS `paymenttype` (
  `PaymentTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `PaymentType` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`PaymentTypeId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `TicketId` int(11) NOT NULL AUTO_INCREMENT,
  `TicketClassificationId` varchar(50) DEFAULT NULL,
  `QrCode` varchar(1000) DEFAULT NULL,
  `TicketDate` datetime DEFAULT NULL,
  `UserId` int(11) DEFAULT NULL,
  `PaymentId` int(11) DEFAULT NULL,
  `isActive` bit(1) DEFAULT NULL,
  PRIMARY KEY (`TicketId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticketcategory`
--

DROP TABLE IF EXISTS `ticketcategory`;
CREATE TABLE IF NOT EXISTS `ticketcategory` (
  `TicketCategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `TicketCategoryName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`TicketCategoryId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticketclassification`
--

DROP TABLE IF EXISTS `ticketclassification`;
CREATE TABLE IF NOT EXISTS `ticketclassification` (
  `TicketClassificationId` int(11) NOT NULL AUTO_INCREMENT,
  `EventInfoId` int(11) DEFAULT NULL,
  `KeyId` int(11) DEFAULT NULL,
  `TicketTypeId` int(11) DEFAULT NULL,
  `TicketCategoryId` int(11) DEFAULT NULL,
  `TicketPassTypeId` int(11) DEFAULT NULL,
  `NoofDays` int(11) DEFAULT NULL,
  `GroupTicketId` int(11) DEFAULT NULL,
  `UnitPrice` decimal(12,2) DEFAULT NULL,
  `DatePosted` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`TicketClassificationId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticketpasstype`
--

DROP TABLE IF EXISTS `ticketpasstype`;
CREATE TABLE IF NOT EXISTS `ticketpasstype` (
  `TicketPassType` int(11) NOT NULL AUTO_INCREMENT,
  `TicketPassTypeName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`TicketPassType`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tickettype`
--

DROP TABLE IF EXISTS `tickettype`;
CREATE TABLE IF NOT EXISTS `tickettype` (
  `TicketTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `TicketTypeName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`TicketTypeId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
