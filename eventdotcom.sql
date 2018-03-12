-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2018 at 08:40 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 'JOIN48', 'come to join us at join 48', 'profile-pic', 50, 0, 'Music', '-', 550, '2018-02-18 21:00:00', 'paragon', '13.722735858000464', '100.55869352255854', 2, '2018-03-04 22:00:00', '2018-03-04 23:00:00'),
(2, 's2o', 'music concert', 'profile-pic', 300, 0, 'Music', '-', 500, '2018-03-13 02:08:12', 'meungthong', '13.912310880260593', '100.54773547351078', 2, '2018-04-27 17:00:00', '2018-04-27 21:00:00'),
(3, 'ARTBOX@Suanluang Square', 'market', 'profile-pic', 999, 0, 'Entertainm', '-', 100, '2018-03-13 02:14:03', 'Suanluang Square', '13.742799800000006', '100.5247521', 2, '2018-05-08 00:00:00', '2018-05-08 00:00:00'),
(4, 'pet event', 'sell & show pet', 'profile-pic', 999, 0, 'Other', '-', 499, '2018-03-13 02:15:44', 'paragon', '39.39504680000003', '-86.562499', 2, '2018-03-28 13:00:00', '2018-03-28 17:00:00'),
(5, 'JJ green market', 'night market', 'profile-pic', 999, 0, 'Other', '-', 100, '2018-03-13 02:19:08', 'สวนจตุจักร', '13.808515', '100.55614000000003', 2, '2018-04-25 18:00:00', '2018-04-25 22:00:00'),
(6, 'TOMORROW BRAND', 'คอร์สนี้เหมาะกับใคร?\r\nธุรกิจที่สืบทอดจากครัวที่ต้องการพัฒนาศักยภาพ ต่อยอดธุรกิจและการขยายฐานลูกค้า ขยายตลาดให้กว้างขึ้น', 'profile-pic', 30, 0, 'Other', '-', 3500, '2018-03-13 02:24:05', 'HUBBA-TO', '43.6475107', '-79.39548150000002', 4, '2018-03-24 13:00:00', '2018-03-24 15:00:00'),
(7, 'เต้ย Freshtival 2', 'อเชิญพบกับงานดนตรีที่ Fresh ที่สุดของประเทศผัก\r\nงานที่อุดมไปด้วยสารอาหารจากคนหัวผัก\r\nที่ไม่จำเป็นต้องไปยืมนาฬิกาเพื่อนมาใส่อวดรวย\r\nแต่เน้นให้ชวนเพื่อนโดยที่ไม่ต้องใส่นาฬิกาแล้วมาสนุกกับคนผัก ๆ เหมือนกัน', 'profile-pic', 20, 0, 'Entertainm', '-', 500, '2018-03-13 02:29:04', 'เมืองขอนแก่น', '16.44185640000001', '102.83603100000005', 4, '2018-03-24 17:00:00', '2018-03-24 23:59:00'),
(8, 'Thaibreak Festival 2018', 'Thaibreak celebrates its 20th anniversary this year on the beautiful island of Koh Mak. To mark this very special occasion, we will host an exclusive festival for 500 friends from around the world, who share our vision of love, respect, and fun times together. Expect 3 days and 4 nights filled with exceptional electronic music, beach and boat parties, breathtaking sunsets, intimate afterhours, delicious food, relaxing massages, swim and sun.', 'profile-pic', 60, 0, 'Entertainm', '-', 140, '2018-03-13 02:31:52', 'ko mak', '11.822702', '102.47818729999995', 4, '2018-03-01 09:00:00', '2018-03-01 00:00:00'),
(9, 'Dudesweet Party of 1997', 'Dudesweet Party of 1997', 'profile-pic', 99, 0, 'Entertainm', '-', 400, '2018-03-13 02:33:18', 'whiteline silom', '13.727365100000009', '100.53040409999994', 4, '2018-03-31 00:00:00', '2018-03-31 03:00:00'),
(10, 'the face thailand season s4 all star final walk', 'final walk', 'profile-pic', 299, 0, 'Entertainm', '', 599, '2018-03-13 02:34:59', 'gmm', '', '', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'the face thailand season s4 all star final walk', 'final walk', 'profile-pic', 199, 0, 'Entertainm', '-', 599, '2018-03-13 02:37:31', 'centralworld', '13.746227600000013', '100.53981880000003', 4, '2018-04-28 18:00:00', '2018-04-28 22:00:00');

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
(3, 'attendant', 'Chanidapa', 'Nitipittayaprakit', 'Bangkae', '0813264853', 'chc@hotmail.com', '$2y$10$sQ4wgtNjEVO.Dk/35LJk3u//RjepZF4vcXKK3wbgZjD3o.QgnsGy6', 'mint', 1, 2065042673, 'female', '1995-10-27'),
(4, 'organizer', 'Aree', 'Tammajadee', '18', '0815556666', 'bell@hotmail.com', '$2y$10$f40QXTXxZoykxW67kCHQM.7/cTFFn5LIkqEyP3Gt2lBnM2V9vkegG', 'belle', 1, 13333, 'female', '1995-09-21');

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
  MODIFY `eventid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
