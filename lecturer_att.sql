-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2024 at 02:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lecturer_att`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `coursecode` varchar(7) NOT NULL,
  `stu_mat` varchar(50) NOT NULL,
  `count` tinyint(1) NOT NULL,
  `programme` varchar(225) NOT NULL,
  `time_siged` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `CourseCode` varchar(9) NOT NULL,
  `CourseTiltle` varchar(500) NOT NULL,
  `Unit` int(3) NOT NULL,
  `attendance` tinyint(1) NOT NULL,
  `student_id` varchar(40) NOT NULL,
  `Lecturer_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `FirstName` varchar(225) NOT NULL,
  `LastName` varchar(225) NOT NULL,
  `PhoneNumber` varchar(14) NOT NULL,
  `Email` varchar(225) NOT NULL,
  `PFNumber` int(20) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`FirstName`, `LastName`, `PhoneNumber`, `Email`, `PFNumber`, `password`) VALUES
('John ', 'Doe', '09123456789', 'JohnDoe@gmail.com', 12345, '$2y$10$b3ZHbY/qd2WxeyyiSP7t3uESoTDJiRvsWelSOt/qhHZzrSVtQkjnG'),
('John ', 'Doe', '09123456789', 'john@gmail.com', 123456789, '$2y$10$YpcoQbvxPlaJQ8I9cA7FreIf1Nj8VgjP83hxqGZ6zPi4s/wj7FZGK');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `MatricNum` varchar(40) NOT NULL,
  `Name` varchar(225) NOT NULL,
  `Programme` varchar(225) NOT NULL,
  `FingerPrint` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`MatricNum`, `Name`, `Programme`, `FingerPrint`) VALUES
('12AB345678', 'John Doe', 'Unknown', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD KEY `coursecode` (`coursecode`,`stu_mat`,`programme`),
  ADD KEY `stu_mat` (`stu_mat`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`CourseCode`),
  ADD KEY `students` (`student_id`),
  ADD KEY `lecturer` (`Lecturer_id`),
  ADD KEY `attendance` (`attendance`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`PFNumber`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`MatricNum`),
  ADD UNIQUE KEY `FingerPrint_2` (`FingerPrint`),
  ADD KEY `MatricNum` (`MatricNum`),
  ADD KEY `FingerPrint` (`FingerPrint`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`coursecode`) REFERENCES `courses` (`CourseCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`Lecturer_id`) REFERENCES `lecturer` (`PFNumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courses_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`MatricNum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courses_ibfk_3` FOREIGN KEY (`CourseCode`) REFERENCES `attendance` (`coursecode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`FingerPrint`) REFERENCES `courses` (`attendance`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
