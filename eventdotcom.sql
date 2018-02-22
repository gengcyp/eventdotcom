-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2018 at 05:20 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventdotcom`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

CREATE TABLE `attendees` (
  `reservationid` int(11) NOT NULL,
  `checkintime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detailpictures`
--

CREATE TABLE `detailpictures` (
  `eventid` int(11) NOT NULL,
  `picture` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventcode` int(11) NOT NULL,
  `eventid` int(11) DEFAULT NULL,
  `started` datetime DEFAULT NULL,
  `finished` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventcode`, `eventid`, `started`, `finished`) VALUES
(5152, 1, '2018-02-23 18:00:00', '2018-02-23 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `event_detail`
--

CREATE TABLE `event_detail` (
  `eventid` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `description` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `profilepic` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `location` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `attendeeslimit` int(11) DEFAULT NULL,
  `preconditionid` int(11) DEFAULT NULL,
  `type` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `feedback` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `createdtime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_thai_520_w2;

--
-- Dumping data for table `event_detail`
--

INSERT INTO `event_detail` (`eventid`, `name`, `description`, `profilepic`, `location`, `attendeeslimit`, `preconditionid`, `type`, `feedback`, `price`, `createdtime`) VALUES
(1, 'JOIN48', 'come to join us at join 48', 'https://affinitynumerology.com/images/NumerologyNumbers48.png', 'paragon', 50, 0, 'Music', '-', 550, '2018-02-18 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `preconditions`
--

CREATE TABLE `preconditions` (
  `preconid` int(11) NOT NULL,
  `eventid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservationid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `eventcode` int(11) DEFAULT NULL,
  `certificate` varchar(20) DEFAULT NULL,
  `reservetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservationid`, `userid`, `eventcode`, `certificate`, `reservetime`) VALUES
(1, 3, 5152, '-', '2018-02-19 20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phoneno` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `pwd` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `type`, `fname`, `lname`, `address`, `phoneno`, `email`, `pwd`) VALUES
(1, 'admin', 'cs', 'ku', 'kasetsart', '025555555', 'eve@hotmail.com', 'o123o'),
(2, 'organizer', 'lu', 'bu', 'The mall Ngamwongwan', '024457522', 'org@hotmail.com', 't147t'),
(3, 'attendant', 'matial', 'art', '5/1354 Prae', '0816523458', 'normal@hotmail.com', 'n328n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendees`
--
ALTER TABLE `attendees`
  ADD PRIMARY KEY (`reservationid`);

--
-- Indexes for table `detailpictures`
--
ALTER TABLE `detailpictures`
  ADD PRIMARY KEY (`eventid`,`picture`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventcode`);

--
-- Indexes for table `event_detail`
--
ALTER TABLE `event_detail`
  ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `preconditions`
--
ALTER TABLE `preconditions`
  ADD PRIMARY KEY (`preconid`,`eventid`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservationid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
