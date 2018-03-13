-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2018 at 05:18 PM
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

--
-- Dumping data for table `attendees`
--

INSERT INTO `attendees` (`reservationid`, `checkintime`) VALUES
(1, '2018-03-04 22:00:00'),
(2, '2018-03-13 16:40:18'),
(9, '2018-03-13 14:17:34');

-- --------------------------------------------------------

--
-- Table structure for table `detailpictures`
--

CREATE TABLE `detailpictures` (
  `id` int(11) NOT NULL,
  `eventid` varchar(11) DEFAULT NULL,
  `picture` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailpictures`
--

INSERT INTO `detailpictures` (`id`, `eventid`, `picture`) VALUES
(2, '15', 'uploads/Event_15_694c6f9245b3906a832c9bb9889d875b.jpg'),
(3, '15', 'uploads/Event_15_6eee56a2182337c0cd5a9283742b6318.jpg'),
(4, '15', 'uploads/Event_15_8d281daa5ae16e6ef3c7f6cd025b0f5d.jpg'),
(5, '15', 'uploads/Event_15_6cc53f26f01579f123415e2b4a718466.jpg'),
(6, '15', 'uploads/Event_15_3c2070364a6bfe0b9e5437d6c7148df8.jpg'),
(7, '15', 'uploads/Event_15_8dc3aaa39354d36b6eb91442cd3aadec.jpg'),
(8, '15', 'uploads/Event_15_6b072efad4c73c33559263316aac3e10.jpg'),
(9, '15', 'uploads/Event_15_bf3ea9a9694ba42c418157851031c4fc.jpg'),
(10, '15', 'uploads/Event_15_f1bd45123ec16f514d5a2c37aa34a945.jpg'),
(11, '15', 'uploads/Event_15_79cef110e15ee340f460067ee8f07eca.jpg'),
(12, '15', 'uploads/Event_15_a5dfaf35ee2ed1968fee251253d9e033.jpg'),
(13, '15', 'uploads/Event_15_fc29c4a7048dc3cf8e019eb4c7ebc35f.jpg'),
(14, '15', 'uploads/Event_15_ae1363e463671147108901c77a549257.jpg'),
(15, '15', 'uploads/Event_15_2f814cc380a2925ca0cee74e9f37b51c.jpg'),
(16, '15', 'uploads/Event_15_75281fa1605ba94618c0683a1d805d4c.jpg'),
(17, '15', 'uploads/Event_15_b8b40c1fb84042a87c8635e9b783f53d.jpg'),
(18, '15', 'uploads/Event_15_c60fbf9af672433a0d9a9d2bf5aba6c7.jpg'),
(19, '15', 'uploads/Event_15_a74fa4e313660aa494ae8d6de9d40f5c.jpg'),
(20, '16', 'uploads/Event_16_e6f22ef0039085608c5e46a108c081ee.jpg'),
(21, '16', 'uploads/Event_16_714df6af025134b7ef0aa6afe44d3d1a.jpg');

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
(2, 's2o', 'music concert', 'images/uploads/s2o.png', 300, 0, 'Music', '-', 500, '2018-03-13 02:08:12', 'meungthong', '13.912310880260593', '100.54773547351078', 2, '2018-04-27 17:00:00', '2018-04-27 21:00:00'),
(3, 'ARTBOX@Suanluang Square', 'market', 'images/uploads/artbox.png', 999, 0, 'Entertainm', '-', 100, '2018-03-13 02:14:03', 'Suanluang Square', '13.742799800000006', '100.5247521', 2, '2018-05-08 00:00:00', '2018-05-08 00:00:00'),
(4, 'pet event', 'sell & show pet and accessery', 'images/uploads/petevents.png', 999, 0, 'Other', '-', 499, '2018-03-13 02:15:44', 'paragon bkk', '13.746815200000006', '100.53506900000002', 2, '2018-03-28 13:00:00', '2018-03-28 17:00:00'),
(5, 'JJ green market', 'night market', 'profile-pic', 999, 0, 'Other', '-', 100, '2018-03-13 02:19:08', 'สวนจตุจักร', '13.808515', '100.55614000000003', 2, '2018-04-25 18:00:00', '2018-04-25 22:00:00'),
(6, 'TOMORROW BRAND', 'คอร์สนี้เหมาะกับใคร?\r\nธุรกิจที่สืบทอดจากครัวที่ต้องการพัฒนาศักยภาพ ต่อยอดธุรกิจและการขยายฐานลูกค้า ขยายตลาดให้กว้างขึ้น', 'images/uploads/tomorrowbrand.png', 30, 0, 'Other', '-', 3500, '2018-03-13 02:24:05', 'HUBBA-TO', '43.6475107', '-79.39548150000002', 4, '2018-03-24 13:00:00', '2018-03-24 15:00:00'),
(7, 'เต้ย Freshtival 2', 'อ. เชิญพบกับงานดนตรีที่ Fresh ที่สุดของประเทศผัก\nงานที่อุดมไปด้วยสารอาหารจากคนหัวผัก\nที่ไม่จำเป็นต้องไปยืมนาฬิกาเพื่อนมาใส่อวดรวย\nแต่เน้นให้ชวนเพื่อนโดยที่ไม่ต้องใส่นาฬิกาแล้วมาสนุกกับคนผัก ๆ เหมือนกัน', 'images/uploads/toey.png', 20, 0, 'Entertainm', '-', 500, '2018-03-13 02:29:04', 'เมืองขอนแก่น', '16.44185640000001', '102.83603100000005', 4, '2018-03-24 17:00:00', '2018-03-24 23:59:00'),
(8, 'Thaibreak Festival 2018', 'Thaibreak celebrates its 20th anniversary this year on the beautiful island of Koh Mak. To mark this very special occasion, we will host an exclusive festival for 500 friends from around the world, who share our vision of love, respect, and fun times together. Expect 3 days and 4 nights filled with exceptional electronic music, beach and boat parties, breathtaking sunsets, intimate afterhours, delicious food, relaxing massages, swim and sun.', 'images/uploads/thaibreak.png', 60, 0, 'Entertainm', '-', 140, '2018-03-13 02:31:52', 'ko mak', '11.822702', '102.47818729999995', 4, '2018-03-01 09:00:00', '2018-03-01 00:00:00'),
(9, 'Dudesweet Party of 1997', 'Dudesweet Party of 1997', 'profile-pic', 99, 0, 'Entertainm', '-', 400, '2018-03-13 02:33:18', 'whiteline silom', '13.727365100000009', '100.53040409999994', 4, '2018-03-31 00:00:00', '2018-03-31 03:00:00'),
(11, 'the face thailand all star final walk', 'final walk', 'images/uploads/theface.png', 199, 0, 'Entertainm', '-', 599, '2018-03-13 02:37:31', 'centralworld', '13.746227600000013', '100.53981880000003', 4, '2018-04-28 18:00:00', '2018-04-28 22:00:00'),
(15, 'อุ่นไอรัก คลายความหนาว', 'อุ่นไอรัก คลายความหนาว', 'uploads/Event_15_f8b153aaf3100f915e96d5297c9563fc.jpg', 999, 0, 'Entertainm', '-', 0, '2018-03-13 12:44:04', 'พระลานพระราชวังดุสิต', '13.769239', '100.51203499999997', 6, '2018-09-02 10:00:00', '2018-11-03 14:00:00'),
(16, 'go fun fun', 'play a game', 'profile-pic', 999, 0, 'Music', '-', 400, '2018-03-13 14:19:46', 'paragon bkk', '13.746815200000006', '100.53506900000002', 4, '2018-03-23 00:00:00', '2018-03-23 15:00:00');

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
(00001, 00000000016, '2018-03-13 00:42:13', 'Hello', 0),
(00003, 00000000016, '2018-03-13 00:42:21', 'How to I get there?', 0),
(00005, 00000000016, '2018-03-13 00:42:58', 'Taxi', 0),
(00045, 00000000016, '2018-03-13 14:24:00', 'paragon', 0),
(00010, 00000000016, '2018-03-13 00:46:33', 'OK!', 0),
(00011, 00000000016, '2018-03-13 00:47:26', '...', 0),
(00044, 00000000015, '2018-03-13 13:08:26', 'dddd', 0),
(00043, 00000000003, '2018-03-13 12:28:22', 'xdx', 0),
(00042, 00000000007, '2018-03-13 11:48:58', 'dddd', 0),
(00041, 00000000004, '2018-03-13 10:48:01', 'test\r\n', 0),
(00040, 00000000003, '2018-03-13 10:42:53', 'ss', 0),
(00039, 00000000003, '2018-03-13 10:42:50', 'ss', 0),
(00038, 00000000003, '2018-03-13 10:42:23', 'Faa', 0),
(00037, 00000000003, '2018-03-13 10:42:18', '', 0),
(00036, 00000000002, '2018-03-13 10:40:38', 'Test', 6),
(00035, 00000000001, '2018-03-13 10:37:39', 'dd', 6),
(00034, 00000000001, '2018-03-13 10:37:32', 'ddd', 6),
(00033, 00000000001, '2018-03-13 10:33:31', 'Test', 0),
(00029, 00000000016, '2018-03-13 00:53:22', 'Where are you ?', 0),
(00030, 00000000016, '2018-03-13 00:57:18', 'at event.', 0),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservationid`, `userid`, `eventcode`, `certificate`, `reservetime`, `reservestatus`) VALUES
(1, 3, 1, 1, '2018-02-19 20:00:00', 1),
(3, 3, 3, 0, '2018-03-13 08:54:00', 1),
(4, 3, 11, 0, '2018-03-13 09:23:25', 2),
(7, 6, 7, 0, '2018-03-13 10:51:29', 0),
(8, 6, 15, 0, '2018-03-13 13:35:08', 5),
(9, 3, 7, 0, '2018-03-13 14:12:26', 1),
(10, 2, 7, 0, '2018-03-13 14:27:11', 5),
(11, 2, 3, 0, '2018-03-13 19:41:55', 5);

-- --------------------------------------------------------

--
-- Table structure for table `reservationtransaction`
--

CREATE TABLE `reservationtransaction` (
  `number` int(11) NOT NULL,
  `reserveid` int(11) NOT NULL,
  `imagepath` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservationtransaction`
--

INSERT INTO `reservationtransaction` (`number`, `reserveid`, `imagepath`) VALUES
(1, 0, 'uploads/Event_2_4f30f2148c802cdf23c3526e2a967dc0.jpg'),
(2, 0, 'uploads/Event_2_cc88c16995e70a291311780f02e0ba9e.jpg'),
(6, 7, 'uploads/Event_7_23767655773d0c0ba20b32b30f340309.png'),
(7, 9, 'uploads/Event_7_d4fb67157d9b8def038b3383d20f988c.jpg');

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
(1, 'admin', 'cs', 'kuu', 'kasetsart', '025555555', 'eve@hotmail.com', '$2y$10$0/5lZQFtU2/3/ENMAdCis.IdWcfzVuKepDzV8BpLWBG9Q3Lp3S60i', 'admin', 1, 0, 'male', '1985-10-14'),
(2, 'organizer', 'Panwardd', 'Khumdang', 'Prachachuen', '0814403470', 'dogo-9@hotmail.com', '$2y$10$ryX11FyRG/b1yBw0CWrcOO/cTFTpuhw671ysBeFCMyPJIXNSqB8Ba', 'Thank', 1, 2073673969, 'female', '1995-09-09'),
(3, 'attendant', 'Chanidapa', 'Nitipittayaprakit', 'Bangkae', '0813264853', 'chc@hotmail.com', '$2y$10$sQ4wgtNjEVO.Dk/35LJk3u//RjepZF4vcXKK3wbgZjD3o.QgnsGy6', 'mint', 1, 2065042673, 'female', '1995-10-27'),
(4, 'organizer', 'Aree', 'Tammajadee', '18', '0815556666', 'bell@hotmail.com', '$2y$10$f40QXTXxZoykxW67kCHQM.7/cTFFn5LIkqEyP3Gt2lBnM2V9vkegG', 'belle', 1, 13333, 'female', '1995-09-21'),
(5, 'attendant', 'Chatchawat', 'Gitopita', 'CNC', '0814326785', 'opo@hotmail.com', '$2y$10$wJuXPCbC1Kf356nrfYyCkOjYSJhuas6Lz2Daeo3A09YJZA5zBsfgu', 'Tan', 1, 13924, 'male', '1992-12-22'),
(6, 'organizer', 'Chayapol', 'Poltha', 'KU', '0869026064', 'chayapol.p@ku.th', '$2y$10$hMQCjeGFnlxvVlXpHMgSL.WygbsY87l.hH/TYyj0IpdYhjMjOYDJm', 'gg', 1, 3458, 'male', '1996-12-02');

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
-- Indexes for table `reservationtransaction`
--
ALTER TABLE `reservationtransaction`
  ADD PRIMARY KEY (`number`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `eventdetail`
--
ALTER TABLE `eventdetail`
  MODIFY `eventid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `ReplyID` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `reservationtransaction`
--
ALTER TABLE `reservationtransaction`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
