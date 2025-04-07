-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2025 at 11:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pciu_question_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `mgsadmin`
--

CREATE TABLE `mgsadmin` (
  `mgid` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `Status` varchar(20) NOT NULL,
  `submitdate` date DEFAULT current_timestamp(),
  `submittime` time DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questioninfo`
--

CREATE TABLE `questioninfo` (
  `Qid` int(11) NOT NULL,
  `StudentName` varchar(255) DEFAULT NULL,
  `PCIUID` varchar(15) DEFAULT NULL,
  `Department` varchar(255) DEFAULT NULL,
  `Batch` varchar(255) DEFAULT NULL,
  `Section` varchar(255) DEFAULT NULL,
  `Shift` varchar(255) DEFAULT NULL,
  `Module` varchar(255) DEFAULT NULL,
  `ModuleTitle` varchar(255) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL,
  `Term` varchar(255) DEFAULT NULL,
  `CourseCode` varchar(255) DEFAULT NULL,
  `CourseTitle` varchar(255) DEFAULT NULL,
  `CourseTeacher` varchar(255) DEFAULT NULL,
  `Question` text DEFAULT NULL,
  `UploadDate` date NOT NULL DEFAULT current_timestamp(),
  `UploadTime` time NOT NULL DEFAULT current_timestamp(),
  `Status` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questioninfo`
--

INSERT INTO `questioninfo` (`Qid`, `StudentName`, `PCIUID`, `Department`, `Batch`, `Section`, `Shift`, `Module`, `ModuleTitle`, `Year`, `Term`, `CourseCode`, `CourseTitle`, `CourseTeacher`, `Question`, `UploadDate`, `UploadTime`, `Status`) VALUES
(11, 'Badhan Roy', 'CSE 028 075', 'Computer Science and Engineering', '28', 'A', 'Day', 'Trimester', 'Fall', 2024, 'Midterm', 'CSE 435', 'Data Communication', 'Maherab Hossain', 'DC Fall 2024.jpg', '2025-04-01', '01:15:29', 'Approved'),
(12, 'Badhan Roy', 'CSE 028 075', 'Computer Science and Engineering', '27', 'A', 'Day', 'Trimester', 'Summer', 2024, 'Midterm', 'CSE 435', 'Data Communication', 'Subhashis Roy Bhowmik', 'DC Summer 2024.jpg', '2025-04-01', '01:17:27', 'Approved'),
(13, 'Badhan Roy', 'CSE 028 07571', 'Computer Science and Engineering', '28', 'A', 'Day', 'Trimester', 'Fall', 2024, 'Final Term', 'CSE 321', 'Software Engineering', 'Shafayet Nur', 'SE Fall 2024.jpg', '2025-04-01', '04:47:13', 'Approved'),
(14, 'Badhan Roy', 'CSE 028 07571', 'Computer Science and Engineering', '28', 'A', 'Day', 'Trimester', 'Spring', 2025, 'Midterm', 'CSE 317', 'Theory of Computing', 'Zarin Rafah Chowdhury', 'TOC mid 28 A.pdf', '2025-04-01', '05:11:44', 'Approved'),
(29, 'Badhan Roy', 'CSE 028 07571', 'Computer Science and Engineering', '28', 'A', 'Day', 'Trimester', 'Spring', 2025, 'Midterm', 'CSE 323', 'Computer Networks', 'Mrs. Taofica Amrine', 'CN25.jpg', '2025-04-07', '02:56:43', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `StudentName` varchar(255) DEFAULT NULL,
  `Department` varchar(255) DEFAULT NULL,
  `Batch` varchar(10) NOT NULL,
  `Shift` varchar(20) NOT NULL,
  `Section` varchar(5) NOT NULL,
  `Position` varchar(20) NOT NULL,
  `USIN` varchar(255) NOT NULL,
  `PCIUID` varchar(255) DEFAULT NULL,
  `StudentEmail` varchar(255) DEFAULT NULL,
  `StudentPhone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`StudentName`, `Department`, `Batch`, `Shift`, `Section`, `Position`, `USIN`, `PCIUID`, `StudentEmail`, `StudentPhone`) VALUES
('Mr. X', 'Civil Engineering', '', '', '', '', '000011112222', 'CEN 00280754', 'mrx@gmail.com', '01478523698'),
('Jarin Tasnin Anika', 'Computer Science and Engineering', '28', 'Day', 'A', 'CR', '0000111122223333', 'CSE 02807555', 'tasnin@gmail.com', '8801825835465'),
('Payel Chy', 'Computer Science and Engineering', '28', 'Day', 'A', 'General', '0001112223334445555', 'CSE 02807580', 'payel@gmail.com', '01678945623'),
('Badhan Roy', 'Computer Science and Engineering', '', '', '', '', '12345678', 'CSE 028 07571', 'badhan@gmail.com', '01625683644');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mgsadmin`
--
ALTER TABLE `mgsadmin`
  ADD PRIMARY KEY (`mgid`);

--
-- Indexes for table `questioninfo`
--
ALTER TABLE `questioninfo`
  ADD PRIMARY KEY (`Qid`);

--
-- Indexes for table `studentinfo`
--
ALTER TABLE `studentinfo`
  ADD PRIMARY KEY (`USIN`),
  ADD UNIQUE KEY `PCIUID` (`PCIUID`,`StudentEmail`,`StudentPhone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mgsadmin`
--
ALTER TABLE `mgsadmin`
  MODIFY `mgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `questioninfo`
--
ALTER TABLE `questioninfo`
  MODIFY `Qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
