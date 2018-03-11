-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2018 at 10:20 AM
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

INSERT INTO `eventdetail` (`eventid`, `name`, `description`, `profilepic`, `attendeeslimit`, `preconditionid`, `type`, `feedback`, `price`, `createddate`, `location`, `latitude`, `longitude`, `eventown`, `started`, `finished`) VALUES
(1, 'JOIN48', 'come to join us at join 48', 'profile-pic', 50, 0, 'Music', '-', 550, '2018-02-18 21:00:00', 'paragon', '13.722735858000464', '100.55869352255854', 2, '2018-03-04 22:00:00', '0000-00-00 00:00:00'),
(3, 'Thailand Coffee Fest 2018', 'Thailand Coffee Fest 2018 A Journey of Coffee จากต้นจนจิบ เตรียมพบกับมหกรรมของคนรักกาแฟที่ยิ่งใหญ่', 'profile-pic', 999, NULL, '', '', NULL, '2018-03-07 18:21:14', 'Queen Sirikit National Convention Center', '13.722735858000464', '100.55869352255854', 2, NULL, NULL),
(4, 'Thailand’s Digital Transformation Forum', 'รายละเอียดงาน\r\n\r\nวันที่: 15 มีนาคม 2561 เวลา 13.00 - 16.30 น.\r\n\r\nสถานที่: หอประชุมศาสตราจารย์สังเวีย', 'profile-pic', 0, NULL, '', '', NULL, '2018-03-07 18:24:15', 'ตลาดหลักทรัพย์แห่งประเทศไทย', '13.763922283650539', '100.56787740622553', 2, NULL, NULL),
(5, 'KILORUN 2018', 'What is KILORUN?\r\n        When running doesn’t measure just Kilometre anymore, but also Kilogram. KILORUN, the new running festival, the only one that you can enjoy running, eating and travelling all in one.  Apart from having good health and joy, everyone can enjoy the best selected local dishes along with the unique route of the iconic city. As well as sharing race experiences with friends and families, no matter who you are or where you are from.\r\nキロランとは？\r\n「走る・食べる・観光する」を一度に楽しむことができ、キロメートル（距離）だけでなくキログラム（体重）で記録測定する、まったく新しいランニングイベントです。健康に良いだけでなく、観光スポットを通るユニークなランニングルートを走って、その土地の文化に触れながらご当地グルメも味わえます。年齢や性別、国境を越えてみんなで美味しい・楽しいをシェアしましょう！', 'profile-pic', 0, NULL, '', '', NULL, '2018-03-07 18:26:21', 'ลานคนเมือง', '13.747415233639748', '100.50410520468745', 2, NULL, NULL),
(6, 'THE CONTENT CREATOR #1 Workshop ฟรี! เฟ้นหานักสร้างสรรค์คอนเทนต์ตัวจริง', 'THE CONTENT CREATOR#1 คนเสี้ยนเสพติด Content<br>\r\n\r\nแหล่งเฟ้นหาคนรุ่นใหม่ไฟแรงที่เสี้ยนเสพติดสร้างสรรค์ Content ตัวจริง<br>\r\n\r\nผ่านการ Workshop สุดเข้มข้นตลอด 1 เดือน โดยมี Speaker ชื่อดังในวงการมาร่วมแชร์ประสบการณ์สร้างสรรค์ Content ผู้เสพติดคอนเทนต์ตัวจริงจะมีโอกาสได้ทำงานกับ 3 แบรนด์ ในเครือบริษัท Likeme\r\n\r\nได้แก่ Infographic Thailand, aomMONEY และ Next Empire', 'profile-pic', 0, NULL, '', '', NULL, '2018-03-07 18:27:31', '', '', '', 2, NULL, NULL),
(7, 'JOIN48', 'come to join us at join 48', 'profile-pic', 50, NULL, '', '', NULL, '2018-03-08 03:37:14', 'สยามพารากอน', '13.722735858000464', '100.55869352255854', 2, NULL, NULL),
(8, 'Test1', 'd', 'profile-pic', 999, NULL, '', '', NULL, '2018-03-10 16:39:36', 'l', '13.761350082413264', '100.50658106242679', NULL, NULL, NULL),
(9, 'Kaset Fair 2561', 'kasetfair 61', 'profile-pic', 100000, 0, 'Other', 'test', 0, '2018-03-10 20:37:48', 'มหาวิทยาลัยเกษตรศาสตร์ บางเขน', '13.84694496369389', '100.56952558675539', NULL, '2018-01-26 12:00:00', '2018-02-03 22:00:00'),
(10, 'วันเด็ก', '', 'profile-pic', 0, 0, 'Music', '', 0, '2018-03-10 20:38:32', 'สนามหลวง', '13.754972426450044', '100.49306272899173', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Test name', 't desc', 'profile-pic', 60, 1, 'Entertainm', 'dddddfffddffff', 4000, '2018-03-10 21:28:26', 'taiwan', '24.983891633555285', '121.24980521509087', NULL, '2018-03-11 11:11:00', '2018-03-22 22:22:00'),
(12, '11111', '', 'profile-pic', 0, 0, 'Other', '', 0, '2018-03-10 21:33:17', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '121212', '', 'profile-pic', 0, 0, 'Entertainm', '', 0, '2018-03-10 21:34:32', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '11', '', 'profile-pic', 0, 0, 'Music', '', 0, '2018-03-10 21:46:40', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'd', '', 'profile-pic', 0, 0, 'Music', '', 0, '2018-03-10 21:48:46', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 'd', '', 'profile-pic', 0, 0, 'Music', '', 0, '2018-03-10 21:50:00', '', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 'test', 'aaa', 'profile-pic', 0, 0, 'Music', '', 0, '2018-03-10 21:50:39', 'fashion island ramintra', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 'test2', '', 'profile-pic', 0, 0, 'Music', '', 0, '2018-03-10 21:52:52', 'the promanade ramintra', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 'test3', '', 'profile-pic', 0, 0, 'Music', '', 0, '2018-03-10 21:54:06', 'mega bangna', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'test4', '', 'profile-pic', 0, 0, 'Music', '', 0, '2018-03-10 21:59:42', 'paragon cineplex', '', '', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, '2111', '', 'profile-pic', 0, 0, 'Music', '', 0, '2018-03-11 15:47:56', 'ดรีมเวิลด์', '13.987754000000006', '100.67508700000008', NULL, '2111-11-11 11:11:00', '2112-11-11 11:11:00'),
(22, '2111', '', 'profile-pic', 0, 0, 'Music', '', 0, '2018-03-11 15:49:39', 'สวนสยาม', '', '', NULL, '2111-11-11 11:11:00', '2112-11-11 11:11:00'),
(23, '2111', '', 'profile-pic', 0, 0, 'Music', '', 0, '2018-03-11 15:54:04', 'ดรีมเวิลด์', '13.805642000000013', '100.69332155344239', NULL, '2111-11-11 11:11:00', '2112-11-11 11:11:00');

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
  `pwd` varchar(1000) DEFAULT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `ustatus` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `type`, `fname`, `lname`, `address`, `phoneno`, `email`, `pwd`, `uname`, `ustatus`) VALUES
(1, 'admin', 'cs', 'ku', 'kasetsart', '025555555', 'eve@hotmail.com', 'o123o', 'admin', 1),
(2, 'organizer', 'lu', 'bu', 'The mall Ngamwongwan', '024457522', 'org@hotmail.com', '$2y$10$QnOVehZPckFuMhtRbqpqwuszBNeI6ZOwUEP7yUUkCRdQnzlIlf79q', 'lb', 1),
(3, 'attendant', 'matial', 'art', '5/1354 Prae', '0816523458', 'normal@hotmail.com', '$2y$10$KAefkXfWiuCJBe.bXHoowe0G8LbvNDZlhSZD7koXF5HpfOls9nksa', 'ma', 1);

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
  MODIFY `eventid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
