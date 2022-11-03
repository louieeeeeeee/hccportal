-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2022 at 04:49 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `eventid` int(12) NOT NULL,
  `title` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`eventid`, `title`, `caption`, `image`, `tag`) VALUES
(11, 'gjhgjhgjgjg', 'jgjgjhghgjh', 'adasdasdas.JPG', ''),
(12, 'dsfsdfdssdfdsfs', 'hgfhgf', '3.JPG', ''),
(13, 'jhgjhgjh', 'jhgjhgjgjhgjhgjhgkjgjh576576576576', '6.JPG', ''),
(999999999, 'AAAAAAAAAAAAAA', 'AAAAAAAAAAAAAAA', '', ''),
(1000000000, 'ghgfhfhf5545454', 'hghghghgh76876876876868686877777777777777777777777777777777', '4.JPG', '');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `studentid` int(20) NOT NULL,
  `tuitionfee` int(20) NOT NULL,
  `learnandins` int(20) NOT NULL,
  `regfee` int(20) NOT NULL,
  `compprossfee` int(20) NOT NULL,
  `guidandcouns` int(20) NOT NULL,
  `schoolidfee` int(20) NOT NULL,
  `studenthand` int(20) NOT NULL,
  `schoolfab` int(20) NOT NULL,
  `insurance` int(20) NOT NULL,
  `totalass` int(20) NOT NULL,
  `discount` int(20) NOT NULL,
  `netass` int(20) NOT NULL,
  `cashcheckpay` int(20) NOT NULL,
  `balance` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`studentid`, `tuitionfee`, `learnandins`, `regfee`, `compprossfee`, `guidandcouns`, `schoolidfee`, `studenthand`, `schoolfab`, `insurance`, `totalass`, `discount`, `netass`, `cashcheckpay`, `balance`) VALUES
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(545222, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(22222222, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(654512, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(545456, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(454565, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(987542, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(321698, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(654654, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(354987, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(545222, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(22222222, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(654512, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(545456, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(454565, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(987542, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(321698, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(654654, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(354987, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(545222, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(22222222, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(654512, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(545456, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(454565, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(987542, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(321698, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(654654, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(354987, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(545222, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(22222222, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(654512, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(545456, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(454565, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(987542, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(321698, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(654654, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(354987, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`ID`, `username`, `lastname`, `email`, `password`, `role`) VALUES
(6, 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(8, 'Jerick', 'Antonino', 'antonio@yahoo.com', '098f6bcd4621d373cade4e832627b4f6', 'Faculty'),
(10, 'JL', 'Alberto', 'alberto@yahoo.com', '098f6bcd4621d373cade4e832627b4f6', 'Faculty'),
(11, 'Daniel', 'Ramos', 'ramos@yahoo.com', '098f6bcd4621d373cade4e832627b4f6', 'Faculty'),
(13, 'Emmanuelle', 'Amoncio', 'amoncio@yahoo.com', '098f6bcd4621d373cade4e832627b4f6', 'Faculty');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `entryid` int(255) NOT NULL,
  `studentid` int(12) NOT NULL,
  `studentname` varchar(255) NOT NULL,
  `schoolyear` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `units` varchar(255) NOT NULL,
  `prelim` varchar(255) NOT NULL DEFAULT 'GW',
  `midterm` varchar(255) NOT NULL DEFAULT 'GW',
  `finals` varchar(255) NOT NULL DEFAULT 'GW',
  `finalgrades` varchar(255) NOT NULL,
  `average` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `facultyid` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`facultyid`, `faculty`, `course`, `code`, `subject`, `year`, `unit`) VALUES
('11111111', 'RAMOS, DANIEL', 'BSCS', 'math', 'Math', '1', '3'),
('11111111', 'RAMOS, DANIEL', 'BSED', 'english', 'english', '1', '3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthdate` varchar(255) NOT NULL,
  `tel` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `lastname`, `email`, `birthdate`, `tel`, `password`, `address`, `course`, `year`, `section`, `picture`, `role`) VALUES
(0, 'admin', 'admin', 'admin', '', '', '21232f297a57a5a743894a0e4a801fc3', '', '', '', '', '', 'Admin'),
(23, 'Jerick', 'Antonio Luna', 'luna@yahoo.com', '2002-02-12', '09165555154', '098f6bcd4621d373cade4e832627b4f6', 'brgy Marawa,mawarawara', 'BSCS', '2022', '4-A', 'jerick2.jpg', 'Student'),
(11111111, 'DANIEL', 'RAMOS', 'RAMOS@yahoo.com', '', '', '098f6bcd4621d373cade4e832627b4f6', '', '', '', '', 'daniel1.jpg', 'Faculty'),
(22222222, 'Jl', 'Alberto', 'Alberto@yahoo.com', '', '87987979799', '098f6bcd4621d373cade4e832627b4f6', 'Brgy.Valenzuela', 'BSCS', '2022', '4-A', 'jl.jpg', 'Student'),
(30232019, 'EMMANUELLE', 'AMONCIO', 'amoncio@yahoo.com', '1997-11-26', '09150550302', '098f6bcd4621d373cade4e832627b4f6', 'Brgy Inspector,imbestigadorST', '', '', '', 'admin.jpg', 'Faculty'),
(33333333, 'Emmanuelle', 'Adriosula', 'Adriosula@yahoo.com', '1998-11-26', '09150550302', '098f6bcd4621d373cade4e832627b4f6', 'Brgy.inspector', 'BSCS', '2022', '4-A', 'emman3.jpg', 'Student'),
(55555555, 'JL', 'ALBERTO', 'ALBERTO@yahoo.com', '', '', '098f6bcd4621d373cade4e832627b4f6', '', '', '', '', 'jl2.jpg', 'Faculty'),
(66666666, 'JERICK', 'ANTONINO', 'ANTONINO@yahoo.com', '', '', 'e5779259be66cf8164422a66a9010ac5', '', '', '', '', 'jerick.jpg', 'Faculty'),
(77777777, 'Daniel', 'Ramos', 'ramos@yahoo.com', '', '09221221221', '098f6bcd4621d373cade4e832627b4f6', 'Brgy.Samora', 'BSCS', '2022', '4-A', 'daniel2.jpg', 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`entryid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `eventid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000001;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `entryid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
