-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2025 at 01:31 AM
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
(6, 'Badhan Roy', 'CSE 028 075', 'Natural Science', '28', 'A', 'Day', 'Trimester', 'Fall', 2022, 'Final term', 'PHY 111', 'Physics', 'Abadat Hossain', 'AP অধ্যায় ১ জীববিজ্ঞানের ধারণা MCQ.pdf', '2025-03-30', '17:15:12', 'Deleted'),
(8, 'Badhan Roy', 'CSE 028 075', 'English', '28', 'A', 'Day', 'Trimester', 'Summer', 2022, 'Midterm', 'ENG 111', 'English', 'Subrina Tisha', '486410478_1867810604042002_7658514560831852957_n.jpg', '2025-03-30', '17:50:00', 'Approved'),
(9, 'Badhan Roy', 'CSE 028 075', 'English', '28', 'A', 'Day', 'Trimester', 'Summer', 2022, 'Final term', 'ENG 111', 'English', 'Subrina Tisha', '486410478_1867810604042002_7658514560831852957_n.jpg', '2025-03-30', '17:50:26', 'Approved'),
(10, 'Payel Chowdhury', 'CSE 0280758', 'Computer Science and Engineering', '28', 'A', 'Day', 'Trimester', 'Spring', 2023, 'Midterm', 'CSE 223', 'Data Structure', 'Showmitra Das', 'Anannya.pdf', '2025-03-31', '15:06:00', 'Declined'),
(11, 'Badhan Roy', 'CSE 028 075', 'Computer Science and Engineering', '28', 'A', 'Day', 'Trimester', 'Fall', 2024, 'Midterm', 'CSE 435', 'Data Communication', 'Maherab Hossain', 'DC Fall 2024.jpg', '2025-04-01', '01:15:29', 'Approved'),
(12, 'Badhan Roy', 'CSE 028 075', 'Computer Science and Engineering', '27', 'A', 'Day', 'Trimester', 'Summer', 2024, 'Midterm', 'CSE 435', 'Data Communication', 'Subhashis Roy Bhowmik', 'DC Summer 2024.jpg', '2025-04-01', '01:17:27', 'Approved'),
(13, 'Badhan Roy', 'CSE 028 07571', 'Computer Science and Engineering', '28', 'A', 'Day', 'Trimester', 'Fall', 2024, 'Final Term', 'CSE 321', 'Software Engineering', 'Shafayet Nur', 'SE Fall 2024.jpg', '2025-04-01', '04:47:13', 'Approved'),
(14, 'Badhan Roy', 'CSE 028 07571', 'Computer Science and Engineering', '28', 'A', 'Day', 'Trimester', 'Spring', 2025, 'Midterm', 'CSE 317', 'Theory of Computing', 'Zarin Rafah Chowdhury', 'TOC mid 28 A.pdf', '2025-04-01', '05:11:44', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `studentinfo`
--

CREATE TABLE `studentinfo` (
  `StudentName` varchar(255) DEFAULT NULL,
  `Department` varchar(255) DEFAULT NULL,
  `USIN` varchar(255) NOT NULL,
  `PCIUID` varchar(255) DEFAULT NULL,
  `StudentEmail` varchar(255) DEFAULT NULL,
  `StudentPhone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentinfo`
--

INSERT INTO `studentinfo` (`StudentName`, `Department`, `USIN`, `PCIUID`, `StudentEmail`, `StudentPhone`) VALUES
('Payel Chowdhury', 'Computer Science and Engineering', '0662220005101048', 'CSE 02807580', 'payelchy@gmail.com', '01720503515'),
('Badhan Roy', 'Computer Science and Engineering', '12345678', 'CSE 028 07571', 'badhan@gmail.com', '01625683644'),
('Amit Roy', 'Law', '74123333369', 'LLB 028 07896', 'amitroy@gmail.com', '0147852369');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `questioninfo`
--
ALTER TABLE `questioninfo`
  MODIFY `Qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
