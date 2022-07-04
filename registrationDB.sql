-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 04, 2021 at 10:00 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registrationDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Registration`
--

CREATE TABLE `Registration` (
  `ClassCode` int(10) NOT NULL,
  `SubjectID` text NOT NULL,
  `DescriptiveTitle` text NOT NULL,
  `LabUnit` int(10) NOT NULL,
  `LecUnit` int(10) NOT NULL,
  `ClassSize` int(10) NOT NULL,
  `Instructor` text NOT NULL,
  `Days` text NOT NULL,
  `Time` text NOT NULL,
  `Room` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Registration`
--

INSERT INTO `Registration` (`ClassCode`, `SubjectID`, `DescriptiveTitle`, `LabUnit`, `LecUnit`, `ClassSize`, `Instructor`, `Days`, `Time`, `Room`) VALUES
(30, 'CSCI 1013', 'Algorithms and Complexity', 0, 3, 4, 'Lily Ann Dela Cruz', 'WTH', '01:30PM-03:00PM', 'LMS'),
(259, 'CFED 1043', 'CICM Missionary Identity', 0, 3, 41, 'Farey James', 'WTH', '7:30-9:00', 'LMS'),
(486, 'DBMS 1013', 'Information Management', 3, 3, 38, 'Diane Jenalyn Datul', 'MT', '3:00-6:00', 'LMS'),
(712, 'PROG 1023', 'Web Programming', 12, 14, 4, 'Lily ann', 'TW', '11:00-11:30', 'LMS'),
(801, 'ITED 1013', 'Quantitative Methods', 0, 3, 43, 'Louie Sayago', 'MT', '9:00-10:30', 'LMS'),
(873, 'STAT 1013', 'Statistics', 0, 3, 42, 'Jefferson Mata', 'MT', '07:30AM-09:00AM', 'M-33'),
(956, 'PROG 1083', 'Web Programming', 3, 3, 4, 'Diane Jenalyn Datul', 'MT', '11:00-1:30', 'LMS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Registration`
--
ALTER TABLE `Registration`
  ADD PRIMARY KEY (`ClassCode`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
