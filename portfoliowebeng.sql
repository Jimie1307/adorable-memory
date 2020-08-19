-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2020 at 06:20 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfoliowebeng`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentID` int(4) NOT NULL,
  `commentText` varchar(255) DEFAULT NULL,
  `userName` varchar(50) DEFAULT NULL,
  `datePosted` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentID`, `commentText`, `userName`, `datePosted`) VALUES
(6, 'Those flowers are beautiful indeed!', 'Alynn', '2020-08-03 19:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `contentID` int(3) NOT NULL,
  `contentTitle` varchar(50) DEFAULT NULL,
  `contentImg` varchar(80) DEFAULT NULL,
  `contentText` varchar(2000) DEFAULT NULL,
  `contentDate` timestamp NULL DEFAULT current_timestamp(),
  `adminID` int(3) NOT NULL,
  `showContent` varchar(2) NOT NULL COMMENT 'if Y then it will appear, but if not then N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`contentID`, `contentTitle`, `contentImg`, `contentText`, `contentDate`, `adminID`, `showContent`) VALUES
(9, 'Beautiful flowers', 'newsImg/8e399fd5594f79a540b60bafce733de4.jpg', 'Beautiful isn\'t it? Like how my grades are for now....meow', '2020-07-28 07:30:14', 2, 'Y'),
(11, 'Namjooning', 'newsImg/namjooning1.jpg', 'Personally cannot wait for this semester to finish so that I can start namjooning and play stardew valley before chaos strikes back  :\'D', '2020-07-28 07:37:34', 2, 'Y'),
(13, 'Headache', 'newsImg/img-frontal-headache.jpg', 'If only we can open our skulls and remove headaches and stress. Stress to me feels like this load of blocks that needed to be taken out. My headache is getting worse oh god.. \r\nUpdate: My groupmates are asking me about sql stuff....at night,,, where my headache just worsens and worsens. The most disappointing thing ever is them just starting to do their part in OOMD today when I already told them prior few days ago... to hand-in today....for me to compile..I\'m...tired', '2020-07-28 09:53:25', 2, 'N'),
(15, 'Stardew Valley', 'newsImg/3695296-stardew valley.jpg', 'Can\'t wait to play straew valley and continue playing the Witcher!!! AAAAA >_<', '2020-08-03 17:09:22', 2, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `projectID` int(3) NOT NULL,
  `projectName` varchar(150) NOT NULL,
  `projectDesc` varchar(1000) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `projectLink` varchar(40) NOT NULL,
  `projectImg` varchar(500) NOT NULL,
  `showContent` varchar(2) NOT NULL,
  `adminID` int(3) NOT NULL,
  `updatedBy` int(3) NOT NULL COMMENT 'shows adminID of admin yg ubah this project',
  `dateUpdated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projectID`, `projectName`, `projectDesc`, `dateCreated`, `projectLink`, `projectImg`, `showContent`, `adminID`, `updatedBy`, `dateUpdated`) VALUES
(28, '3D Builder Assignment', 'In STCS (Special Topics Computer Science) course, we were given a task to do two 3D object assignments. One is an object students have within their environment and another is a government logo. My submission is the bottle and JKR logo. The Malaysia Airport logo and air-cond remote control is done by me for a commission made from my friend.', '2020-08-01 19:32:46', '', 'projectImg/BeFunky-collage.jpg', 'Y', 2, 5, '2020-08-04 03:38:43'),
(30, 'Charity Management System', 'A management system done alongside with my OOMD (Object Oriented Modelling Design) groupmates. I did the admin part  and also combined all the functions we have (donor, volunteer, admin, organization) including CSS. There is more room for improvement for this system definitely in terms of security and CSS. ', '2020-08-01 19:32:46', 'http://charityorganisation.epizy.com/', 'projectImg/homepage.png', 'Y', 2, 2, '2020-08-01 19:32:21'),
(37, 'Borneo Homestay', 'An individual assignment from Web Engineering course. We were asked to do a website for homestay booking. The functions included are for two users: authenticated users and authenticated owners. ', '2020-08-01 22:28:38', 'http://alynnhomestay.epizy.com/', 'projectImg/homestay.png', 'Y', 2, 5, '2020-08-04 03:39:40'),
(40, 'Mini Click Game', 'An individual assignment using Scratch program. Basically make a very simple punch game.', '2020-08-02 00:26:15', '', 'projectImg/Challenge 4.sb3', 'N', 2, 5, '2020-08-04 03:40:48'),
(41, 'Learning Module', 'A learning module made for learning a little bit more about hamster\'s pouch! An individual assignment using Scratch for STCS course.', '2020-08-02 00:27:38', '', '', 'Y', 2, 5, '2020-08-04 03:31:36'),
(42, 'Calculator App', 'A simple calculator app with MR function. Made using MIT App Inventor. Only can be tested on android. The limitation is that, it has an error when square root is used.', '2020-08-02 00:31:02', '', 'projectImg/Simple_Calculator_BI18110278.apk', 'Y', 2, 5, '2020-08-04 03:40:33'),
(43, 'Short Animation ', 'A group assignment where my group made a funny love-story of a fish and a mermaid. Made using Scratch program. Unfortunately I do not know if I have the file or not but if I do find it, I will post it <3', '2020-08-02 00:33:09', '', 'projectImg/Challenge 5.sb3', 'N', 2, 5, '2020-08-04 03:41:00'),
(44, 'Song Rhythm', 'This is an arduino group project. We were asked to program the LEDs to follow a song\'s beat. To be very honest, I am bad at arduino so this whole assignment was done thanks to my big brain friend.', '2020-08-02 00:35:21', '', '', 'Y', 2, 0, '2020-08-02 00:35:21'),
(45, 'Leave Management System', 'A management system made using Java. This was a group assignment. The system:\r\n1) Keeps track of overall employee leave applications\r\n2) Manages how many days that employees applied, remaining leave days including reason of leave \r\n3) Has implementation of maximum leave days applicable according to respective reasons given\r\n4) Allows adding and removing employees\r\n5) Generates overall report of the data within the system including graph to summarize (total leaves annually/monthly, employee with most leaves,\r\ncommon leave reasons, department with most total leave applications)', '2020-08-02 00:36:42', '', '', 'N', 2, 2, '2020-08-02 00:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `reportID` int(3) NOT NULL,
  `reportCause` varchar(100) NOT NULL,
  `commentID` int(3) NOT NULL,
  `userID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(3) NOT NULL,
  `userName` varchar(50) DEFAULT NULL,
  `userEmail` varchar(64) DEFAULT NULL,
  `userPwd` varchar(12) NOT NULL,
  `userType` int(2) DEFAULT NULL COMMENT 'kalau 1 user, 2 admin',
  `pwdEncrypt` varchar(255) NOT NULL,
  `strikeTally` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userName`, `userEmail`, `userPwd`, `userType`, `pwdEncrypt`, `strikeTally`) VALUES
(2, 'Jeon Jungkook', 'gcfjk@gmail.com', 'jungKook94', 2, '$2y$10$DfRAi/S/TwUeXiq/M24sS.44xYd4CdbdbrkNOa4.5fGbYl2DkovZe', 0),
(4, 'Alynn', 'alynn99@gmail.com', 'alynnComel99', 1, '$2y$10$f4VjqEbr1mBM5eQlo8ht4.K5kWwipIT7rVmpOY0f21UUdrDxbgWku', 0),
(6, 'Min Yoongi', 'jjangbong@yahoo.com', 'jungHoe78', 2, '$2y$10$6VUzPk6/JRqL0w0bgTFxJexGVCpUWeHsh3GoZSeicq1iRX.qn9lFu', 0),
(10, 'Kim Taehyung', 'taetae@gmail.com', 'taeHyung76', 2, '$2y$10$pTUAXIx7o9lFSIdA9RP3Z.UbeV8ytLoeAI1yQPbNhgArx7g5o6lb.', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`contentID`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`projectID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`reportID`),
  ADD KEY `commentID` (`commentID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `contentID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `projectID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `reportID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`commentID`) REFERENCES `comments` (`commentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `report_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
