-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2018 at 12:46 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dsceactivity`
--

-- --------------------------------------------------------

--
-- Table structure for table `eventlist`
--

CREATE TABLE `eventlist` (
  `eventID` int(11) NOT NULL,
  `deptID` int(2) NOT NULL,
  `eventTypeID` int(2) NOT NULL,
  `eventDate` date NOT NULL,
  `eventTime` time NOT NULL,
  `eventName` varchar(50) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `faculty` varchar(35) NOT NULL,
  `facultyPhone` varchar(12) NOT NULL,
  `facultyEmail` varchar(30) NOT NULL,
  `numberAttendees` int(11) NOT NULL,
  `link` varchar(100) NOT NULL,
  `bdate` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventlist`
--

INSERT INTO `eventlist` (`eventID`, `deptID`, `eventTypeID`, `eventDate`, `eventTime`, `eventName`, `venue`, `faculty`, `facultyPhone`, `facultyEmail`, `numberAttendees`, `link`, `bdate`) VALUES
(11, 2, 1, '2018-11-23', '09:00:00', 'TEDxDSCE 2018', 'Dr. P C Sagar Auditorium', 'Dr. KG Hemalatha', '8958657898', 'HOD-MBA@dayanandasagar.edu', 100, 'https://tedxdsce.com', '2018-11-23 09:00'),
(12, 5, 7, '2018-12-06', '14:00:00', 'LAB Internal', 'DBMS LAB', 'Prof Anupama', '9090909090', 'anupama@dayanandasagar.edu', 35, 'http://www.dsce.edu.in/', '2018-12-06 14:00'),
(13, 5, 2, '2018-12-01', '09:00:00', 'GitHub Hackathon', 'CSE Department', 'Prof Poornima AB', '9900250457', 'poornimaab@dayanandasagar.edu', 250, 'https://github.com', '2018-12-01 09:00');

-- --------------------------------------------------------

--
-- Table structure for table `event_type`
--

CREATE TABLE `event_type` (
  `eventTypeID` int(2) NOT NULL,
  `eventType` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_type`
--

INSERT INTO `event_type` (`eventTypeID`, `eventType`) VALUES
(1, 'Fest'),
(2, 'Hackathon'),
(3, 'Seminar'),
(4, 'Workshop'),
(5, 'Invited Talk'),
(6, 'Cultural Fest'),
(7, 'Exams'),
(8, 'Sports'),
(9, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_holidays`
--

CREATE TABLE `tbl_holidays` (
  `id` int(10) NOT NULL,
  `date` varchar(20) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `bdate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_holidays`
--

INSERT INTO `tbl_holidays` (`id`, `date`, `reason`, `bdate`) VALUES
(5, '2018-12-07', 'Study Break', '2018-12-06 03:34:37'),
(6, '2018-12-25', 'Christmas Day', '2018-12-06 03:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reservations`
--

CREATE TABLE `tbl_reservations` (
  `id` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `ucount` int(10) NOT NULL,
  `rdate` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  `comments` varchar(250) NOT NULL,
  `bdate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reservations`
--

INSERT INTO `tbl_reservations` (`id`, `uid`, `ucount`, `rdate`, `status`, `comments`, `bdate`) VALUES
(2, 0, 15, '2018-11-27 11:00', 'approved', '', '2018-11-30 12:26:30'),
(9, 1, 150, '2018-12-15 15:15', 'PENDING', '', '2018-12-01 10:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pwd` varchar(200) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `bdate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `pwd`, `address`, `phone`, `email`, `type`, `status`, `bdate`) VALUES
(2, 'Department of MBA', 'HODMBA', 'K G Hemalatha', '8958657898', 'HOD-MBA@dayanandasagar.edu', 'teacher', 'active', '2018-11-23 04:13:00'),
(3, 'Department of Physics', 'HODPHYSICS', 'Dr. CM Joseph', '9741913601', 'HOD-Physics@dayanandasagar.edu', 'teacher', 'active', '2018-11-23 04:17:10'),
(4, 'Library', 'LIBRARY', 'librarian', '8073724368', 'library@dayanandasagar.edu', 'teacher', 'active', '2018-11-23 04:26:52'),
(5, 'Department of CSE', 'HODCSE', 'Dr. DR Ramesh Babu', '9972935935', 'HOD-CSE@dayanandasagar.edu', 'teacher', 'active', '2018-11-23 04:17:10'),
(6, 'Department of Maths', 'HODMATH', 'Dr. Radha Gupta', '9448466191', 'HOD-MATH@dayanandasagar.edu', 'teacher', 'active', '2018-11-23 04:44:16'),
(7, 'Department of ECE', 'HODECE', 'Dr.  A. R. Aswatha', '8956231245', 'hod-tc@dayanandasagar.edu', 'teacher', 'active', '2018-12-06 04:27:35'),
(998, 'Sara Manha', 'saramanha', 'Sara Manha', '9686740241', 'saramanha6@gmail.com', 'student', 'active', '2018-12-06 05:10:09'),
(999, 'siddharth', 'cddharth', 'adasd asd asd asd a', '8423790364', 'hi@cddharthsingh.com', 'student', 'active', '2018-12-20 00:36:25'),
(1000, 'admin', 'password', 'some addresses', '9999999999', 'cddharthsingh@gmail.com', 'admin', 'active', '2018-12-20 10:00:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventlist`
--
ALTER TABLE `eventlist`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `event_type`
--
ALTER TABLE `event_type`
  ADD PRIMARY KEY (`eventTypeID`);

--
-- Indexes for table `tbl_holidays`
--
ALTER TABLE `tbl_holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reservations`
--
ALTER TABLE `tbl_reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eventlist`
--
ALTER TABLE `eventlist`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_holidays`
--
ALTER TABLE `tbl_holidays`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_reservations`
--
ALTER TABLE `tbl_reservations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
