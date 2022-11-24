-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 08:07 PM
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
  `billingid` int(20) NOT NULL,
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

INSERT INTO `billing` (`billingid`, `studentid`, `tuitionfee`, `learnandins`, `regfee`, `compprossfee`, `guidandcouns`, `schoolidfee`, `studenthand`, `schoolfab`, `insurance`, `totalass`, `discount`, `netass`, `cashcheckpay`, `balance`) VALUES
(55, 545222, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(56, 54545454, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(57, 654512, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(58, 545456, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(59, 454565, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(60, 987542, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(61, 321698, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(62, 654654, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(63, 354987, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(64, 545222, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(65, 54545454, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(66, 654512, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(67, 545456, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(68, 454565, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(69, 987542, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(70, 321698, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(71, 654654, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735),
(72, 354987, 6000, 3700, 1000, 350, 235, 150, 100, 100, 100, 11735, 5000, 11735, 5000, 6735);

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

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`entryid`, `studentid`, `studentname`, `schoolyear`, `semester`, `subject`, `faculty`, `units`, `prelim`, `midterm`, `finals`, `finalgrades`, `average`, `status`) VALUES
(57, 54545454, 'Dela Cruz, Juana', '2022/2023', 'Second', 'Math', 'Garcia, Julieta, ', '3', '80', 'GW', 'GW', 'NG', 'NG', 'NG');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subjectid` int(20) NOT NULL,
  `facultyid` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subjectid`, `facultyid`, `faculty`, `course`, `code`, `subject`, `year`, `sem`, `unit`) VALUES
(3, '14854521', 'Garcia, Julieta', 'BSCS', 'Math', 'Math', '2', '', '3'),
(6, '14854521', 'Garcia, Julieta', 'BSCS', 'math', 'english', '1', '', '3');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userno` int(20) NOT NULL,
  `id` bigint(11) NOT NULL,
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

INSERT INTO `users` (`userno`, `id`, `username`, `lastname`, `email`, `birthdate`, `tel`, `password`, `address`, `course`, `year`, `section`, `picture`, `role`) VALUES
(1, 999999, 'admin', 'admin', '', '', '', '21232f297a57a5a743894a0e4a801fc3', '', '', '', '', '', 'Admin'),
(3, 14854521, 'Julieta', 'Garcia', 'julietagarcia@gmail.com', '02/02/1965', '9165548854', '1a1dc91c907325c69271ddf0c944bc72', 'General E. Aguinaldo Highway, Public Market, Imus', '', '', '', '', 'Faculty'),
(4, 54564582, 'Anthony', 'Bernardo', 'anthonybernardo@gmail.com', '02/10/1945', '9362254544', '1a1dc91c907325c69271ddf0c944bc72', 'General E. Aguinaldo Highway, Public Market, Imus', '', '', '', '', 'Cashier'),
(5, 12542544, 'Christoper', 'Cruz', 'chriscruz@gmail.com', '07/07/1997', '9165545756', '1a1dc91c907325c69271ddf0c944bc72', 'General E. Aguinaldo Highway, Public Market, Imus', 'BSCS', '4th Yr', '4 BSCS - A', 'maxresdefault.jpg', 'Student'),
(6, 58458745, 'five', 'dela ta', '', '', '', '1a1dc91c907325c69271ddf0c944bc72', '', '', '', '', '', 'Student'),
(7, 54521541, 'six', 'dela ga', '', '', '', '1a1dc91c907325c69271ddf0c944bc72', '', '', '', '', '', 'Student'),
(8, 89887455, 'seven', 'dela mas', '', '', '', '1a1dc91c907325c69271ddf0c944bc72', '', '', '', '', '', 'Student'),
(9, 45434334, 'juana', 'dela cruz', '', '', '', '1a1dc91c907325c69271ddf0c944bc72', '', '', '', '', '', 'Student'),
(66, 1212, 'juana', 'dela cruz', '', '', '', '1a1dc91c907325c69271ddf0c944bc72', '', '', '', '', '', 'Student'),
(67, 2323, 'two', 'dela pena', '', '', '', '1a1dc91c907325c69271ddf0c944bc72', '', '', '', '', '', 'Student'),
(68, 4545, 'three', 'dela paz', '', '', '', '1a1dc91c907325c69271ddf0c944bc72', '', '', '', '', '', 'Student'),
(69, 5656, 'four', 'dela fuente', '', '', '', '1a1dc91c907325c69271ddf0c944bc72', '', '', '', '', '', 'Student'),
(70, 45457, 'five', 'dela ta', '', '', '', '1a1dc91c907325c69271ddf0c944bc72', '', '', '', '', '', 'Student'),
(71, 8977, 'six', 'dela ga', '', '', '', '1a1dc91c907325c69271ddf0c944bc72', '', '', '', '', '', 'Student'),
(72, 99987, 'seven', 'dela mas', '', '', '', '1a1dc91c907325c69271ddf0c944bc72', '', '', '', '', '', 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`eventid`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`billingid`);

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
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subjectid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `eventid` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000000001;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `billingid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `entryid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subjectid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userno` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
