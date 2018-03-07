-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: Mar 07, 2018 at 12:33 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1
=======
-- Generation Time: Mar 07, 2018 at 06:36 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9
>>>>>>> e03a30097bdd97689e2a6d4e6479238869a5c296

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
(1, 'JOIN48', 'come to join us at join 48', 'https://affinitynumerology.com/images/NumerologyNumbers48.png', 'paragon', 50, 0, 'reverse', 'Music', '-', 550, '2018-02-18 21:00:00', NULL, NULL, 2),
(3, 'Thailand Coffee Fest 2018', 'Thailand Coffee Fest 2018 A Journey of Coffee จากต้นจนจิบ เตรียมพบกับมหกรรมของคนรักกาแฟที่ยิ่งใหญ่', 'profile-pic', 'Queen Sirikit National Convention Center', 999, NULL, NULL, '', '', NULL, '2018-03-07 18:21:14', '13.722735858000464', '100.55869352255854', NULL),
(4, 'Thailand’s Digital Transformation Forum', 'รายละเอียดงาน\r\n\r\nวันที่: 15 มีนาคม 2561 เวลา 13.00 - 16.30 น.\r\n\r\nสถานที่: หอประชุมศาสตราจารย์สังเวีย', 'profile-pic', 'ตลาดหลักทรัพย์แห่งประเทศไทย', 0, NULL, NULL, '', '', NULL, '2018-03-07 18:24:15', '13.763922283650539', '100.56787740622553', NULL),
(5, 'KILORUN 2018', 'What is KILORUN?\r\n        When running doesn’t measure just Kilometre anymore, but also Kilogram. KILORUN, the new running festival, the only one that you can enjoy running, eating and travelling all in one.  Apart from having good health and joy, everyone can enjoy the best selected local dishes along with the unique route of the iconic city. As well as sharing race experiences with friends and families, no matter who you are or where you are from.\r\nキロランとは？\r\n「走る・食べる・観光する」を一度に楽しむことができ、キロメートル（距離）だけでなくキログラム（体重）で記録測定する、まったく新しいランニングイベントです。健康に良いだけでなく、観光スポットを通るユニークなランニングルートを走って、その土地の文化に触れながらご当地グルメも味わえます。年齢や性別、国境を越えてみんなで美味しい・楽しいをシェアしましょう！', 'profile-pic', 'ลานคนเมือง', 0, NULL, NULL, '', '', NULL, '2018-03-07 18:26:21', '13.747415233639748', '100.50410520468745', NULL),
(6, 'THE CONTENT CREATOR #1 Workshop ฟรี! เฟ้นหานักสร้างสรรค์คอนเทนต์ตัวจริง', 'THE CONTENT CREATOR#1 คนเสี้ยนเสพติด Content<br>\r\n\r\nแหล่งเฟ้นหาคนรุ่นใหม่ไฟแรงที่เสี้ยนเสพติดสร้างสรรค์ Content ตัวจริง<br>\r\n\r\nผ่านการ Workshop สุดเข้มข้นตลอด 1 เดือน โดยมี Speaker ชื่อดังในวงการมาร่วมแชร์ประสบการณ์สร้างสรรค์ Content ผู้เสพติดคอนเทนต์ตัวจริงจะมีโอกาสได้ทำงานกับ 3 แบรนด์ ในเครือบริษัท Likeme\r\n\r\nได้แก่ Infographic Thailand, aomMONEY และ Next Empire', 'profile-pic', '', 0, NULL, NULL, '', '', NULL, '2018-03-07 18:27:31', '', '', NULL);

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
  `pwd` varchar(1000) DEFAULT NULL,
  `uname` varchar(20) DEFAULT NULL,
  `ustatus` tinyint(1) DEFAULT NULL,
  `confirmcode` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `type`, `fname`, `lname`, `address`, `phoneno`, `email`, `pwd`, `uname`, `ustatus`, `confirmcode`) VALUES
(1, 'admin', 'cs', 'ku', 'kasetsart', '025555555', 'eve@hotmail.com', 'o123o', 'admin', 1, NULL),
(2, 'organizer', 'or', 'rg', 'poison', '0132465798', 'org@org.com', '$2y$10$QnOVehZPckFuMhtRbqpqwuszBNeI6ZOwUEP7yUUkCRdQnzlIlf79q', 'org', 1, 1901172764),
(3, 'attendant', 'at', 'tn', 'address', '0147258369', 'attn@attn.com', '$2y$10$KAefkXfWiuCJBe.bXHoowe0G8LbvNDZlhSZD7koXF5HpfOls9nksa', 'attn', 1, 1279119320);

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
  MODIFY `eventid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
