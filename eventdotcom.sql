-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2018 at 06:32 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detailpictures`
--

CREATE TABLE `detailpictures` (
  `eventid` int(11) NOT NULL,
  `picture` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eventdetail`
--

CREATE TABLE `eventdetail` (
  `eventid` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `profilepic` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `attendeeslimit` int(11) DEFAULT NULL,
  `preconditionid` int(11) DEFAULT NULL,
  `codepattern` varchar(20) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `feedback` varchar(20) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `latitude` varchar(20) DEFAULT NULL,
  `longitude` varchar(20) DEFAULT NULL,
  `eventown` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eventdetail`
--

INSERT INTO `eventdetail` (`eventid`, `name`, `description`, `profilepic`, `location`, `attendeeslimit`, `preconditionid`, `codepattern`, `type`, `feedback`, `price`, `createddate`, `latitude`, `longitude`, `eventown`) VALUES
(1, 'JOIN48', 'come to join us at join 48', 'https://affinitynumerology.com/images/NumerologyNumbers48.png', 'paragon', 50, 0, 'reverse', 'Music', '-', 550, '2018-02-18 21:00:00', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventcode` int(11) NOT NULL,
  `eventid` int(11) DEFAULT NULL,
  `started` datetime DEFAULT NULL,
  `finished` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventcode`, `eventid`, `started`, `finished`) VALUES
(1, 1, '2018-02-23 18:00:00', '2018-02-23 21:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `preconditions`
--

CREATE TABLE `preconditions` (
  `preconid` int(11) NOT NULL,
  `eventid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservationid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `eventcode` int(11) DEFAULT NULL,
  `certificate` tinyint(1) DEFAULT '0',
  `reservetime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservationid`, `userid`, `eventcode`, `certificate`, `reservetime`) VALUES
(1, 3, 5152, 0, '2018-02-19 20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phoneno` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pwd` varchar(50) DEFAULT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `ustatus` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `type`, `fname`, `lname`, `address`, `phoneno`, `email`, `pwd`, `uname`, `ustatus`) VALUES
(1, 'admin', 'cs', 'ku', 'kasetsart', '025555555', 'eve@hotmail.com', 'o123o', 'admin', 1),
(2, 'organizer', 'lu', 'bu', 'The mall Ngamwongwan', '024457522', 'org@hotmail.com', 't147t', 'lb', 1),
(3, 'attendant', 'matial', 'art', '5/1354 Prae', '0816523458', 'normal@hotmail.com', 'n328n', 'ma', 1);

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
-- Indexes for table `eventdetail`
--
ALTER TABLE `eventdetail`
  ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventcode`);

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

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eventdetail`
--
ALTER TABLE `eventdetail`
  MODIFY `eventid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
