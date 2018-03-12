-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2018 at 07:59 PM
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
  `id` int(11) NOT NULL,
  `eventid` varchar(11) DEFAULT NULL,
  `picture` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `eventdetail`
--

CREATE TABLE `eventdetail` (
  `eventid` int(11) NOT NULL,
  `eventname` varchar(100) DEFAULT NULL,
  `description` varchar(5000) DEFAULT NULL,
  `profilepic` varchar(100) DEFAULT NULL,
  `attendeeslimit` int(11) DEFAULT NULL COMMENT 'Max Attendees Limit',
  `preconditionid` int(11) DEFAULT NULL COMMENT 'Pre condition Event Code',
  `type` varchar(10) DEFAULT NULL,
  `feedback` varchar(20) DEFAULT NULL COMMENT 'Link To Feedback',
  `price` int(11) DEFAULT NULL,
  `createddate` datetime DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL COMMENT 'Location',
  `latitude` varchar(20) DEFAULT NULL,
  `longitude` varchar(20) DEFAULT NULL,
  `eventown` int(11) DEFAULT NULL,
  `started` datetime DEFAULT NULL,
  `finished` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `eventdetail`
--

INSERT INTO `eventdetail` (`eventid`, `eventname`, `description`, `profilepic`, `attendeeslimit`, `preconditionid`, `type`, `feedback`, `price`, `createddate`, `location`, `latitude`, `longitude`, `eventown`, `started`, `finished`) VALUES
(1, 'JOIN48', 'come to join us at join 48', 'profile-pic', 50, 0, 'Music', '-', 550, '2018-02-18 21:00:00', 'paragon', '13.722735858000464', '100.55869352255854', 2, '2018-03-04 22:00:00', '2018-03-04 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `ReplyID` int(5) UNSIGNED ZEROFILL NOT NULL,
  `EventID` int(11) UNSIGNED ZEROFILL NOT NULL,
  `CreateDate` datetime NOT NULL,
  `Details` text NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`ReplyID`, `EventID`, `CreateDate`, `Details`, `UserID`) VALUES
(00001, 00000000016, '2018-03-13 00:42:13', 'hi', 0),
(00002, 00000000016, '2018-03-13 00:42:17', 'Ok', 0),
(00003, 00000000016, '2018-03-13 00:42:21', 'Ok', 0),
(00004, 00000000016, '2018-03-13 00:42:57', 'ol', 0),
(00005, 00000000016, '2018-03-13 00:42:58', 'ol', 0),
(00006, 00000000016, '2018-03-13 00:42:59', 'ol', 0),
(00007, 00000000016, '2018-03-13 00:42:59', 'ol', 0),
(00008, 00000000016, '2018-03-13 00:42:59', 'ol', 0),
(00009, 00000000016, '2018-03-13 00:42:59', 'ol', 0),
(00010, 00000000016, '2018-03-13 00:46:33', 'asd', 0),
(00011, 00000000016, '2018-03-13 00:47:26', 'bhj', 0),
(00012, 00000000016, '2018-03-13 00:51:04', 'bhj', 0),
(00013, 00000000016, '2018-03-13 00:51:07', 'bhj', 0),
(00014, 00000000016, '2018-03-13 00:51:08', 'bhj', 0),
(00015, 00000000016, '2018-03-13 00:51:08', 'bhj', 0),
(00016, 00000000016, '2018-03-13 00:51:08', 'bhj', 0),
(00017, 00000000016, '2018-03-13 00:51:08', 'bhj', 0),
(00018, 00000000016, '2018-03-13 00:53:11', 'bhj', 0),
(00019, 00000000016, '2018-03-13 00:53:20', 'bhj', 0),
(00020, 00000000016, '2018-03-13 00:53:20', 'bhj', 0),
(00021, 00000000016, '2018-03-13 00:53:21', 'bhj', 0),
(00022, 00000000016, '2018-03-13 00:53:21', 'bhj', 0),
(00023, 00000000016, '2018-03-13 00:53:21', 'bhj', 0),
(00024, 00000000016, '2018-03-13 00:53:21', 'bhj', 0),
(00025, 00000000016, '2018-03-13 00:53:21', 'bhj', 0),
(00026, 00000000016, '2018-03-13 00:53:22', 'bhj', 0),
(00027, 00000000016, '2018-03-13 00:53:22', 'bhj', 0),
(00028, 00000000016, '2018-03-13 00:53:22', 'bhj', 0),
(00029, 00000000016, '2018-03-13 00:53:22', 'bhj', 0),
(00030, 00000000016, '2018-03-13 00:57:18', 'yeah', 0),
(00031, 00000000016, '2018-03-13 00:57:28', 'yeah', 0),
(00032, 00000000016, '2018-03-13 00:57:34', 'yeah', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservationid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `eventcode` int(11) DEFAULT NULL,
  `certificate` tinyint(1) DEFAULT '0',
  `reservetime` datetime DEFAULT NULL,
  `reservestatus` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservationid`, `userid`, `eventcode`, `certificate`, `reservetime`, `reservestatus`) VALUES
(1, 3, 1, 0, '2018-02-19 20:00:00', 1),
(2, 3, 2, 0, NULL, 0);

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
  `pwd` varchar(1000) DEFAULT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `ustatus` tinyint(1) DEFAULT NULL,
  `confirmcode` int(11) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `birthday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `type`, `fname`, `lname`, `address`, `phoneno`, `email`, `pwd`, `uname`, `ustatus`, `confirmcode`, `gender`, `birthday`) VALUES
(1, 'admin', 'cs', 'ku', 'kasetsart', '025555555', 'eve@hotmail.com', '$2y$10$0/5lZQFtU2/3/ENMAdCis.IdWcfzVuKepDzV8BpLWBG9Q3Lp3S60i', 'admin', 1, 0, 'male', '1985-10-14'),
(2, 'organizer', 'Panward', 'Khumdang', 'Prachachuen', '0814403470', 'dogo-9@hotmail.com', '$2y$10$ryX11FyRG/b1yBw0CWrcOO/cTFTpuhw671ysBeFCMyPJIXNSqB8Ba', 'Thank', 1, 2073673969, 'female', '1995-09-09'),
(3, 'attendant', 'Chanidapa', 'Nitipittayaprakit', 'Bangkae', '0813264853', 'chc@hotmail.com', '$2y$10$sQ4wgtNjEVO.Dk/35LJk3u//RjepZF4vcXKK3wbgZjD3o.QgnsGy6', 'mint', 1, 2065042673, 'female', '1995-10-27');

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventdetail`
--
ALTER TABLE `eventdetail`
  ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`ReplyID`);

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
-- AUTO_INCREMENT for table `detailpictures`
--
ALTER TABLE `detailpictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `eventdetail`
--
ALTER TABLE `eventdetail`
  MODIFY `eventid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `ReplyID` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
