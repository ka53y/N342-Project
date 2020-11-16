-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2020 at 09:39 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kymblack_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `admin_id` int(3) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `middle_name` varchar(32) DEFAULT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` int(3) NOT NULL,
  `active` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_id`, `first_name`, `last_name`, `middle_name`, `email`, `password`, `level`, `active`) VALUES
(3, 'Kyle', 'Black', 'yeah', 'kymblack@iu.edu', 'kymblack', 0, ''),
(4, 'Luke', 'Hedrick', 'R', 'lukhedri', 'lukhedri', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignment_id` int(3) NOT NULL,
  `session_id` int(3) NOT NULL,
  `project_id` int(3) NOT NULL,
  `judge_id` int(3) NOT NULL,
  `score` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `booth_number`
--

CREATE TABLE `booth_number` (
  `booth_number_id` int(3) NOT NULL,
  `number` int(3) NOT NULL,
  `active` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(3) NOT NULL,
  `category_name` varchar(32) NOT NULL,
  `active` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `county`
--

CREATE TABLE `county` (
  `county_id` int(3) NOT NULL,
  `county_name` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_id` int(3) NOT NULL,
  `grade` int(3) NOT NULL,
  `active` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `judge`
--

CREATE TABLE `judge` (
  `judge_id` int(3) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `middle_name` varchar(32) DEFAULT NULL,
  `title` varchar(32) NOT NULL,
  `highest_degree_earned` varchar(32) NOT NULL,
  `employer` varchar(32) DEFAULT NULL,
  `email` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `year` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `judge`
--

INSERT INTO `judge` (`judge_id`, `first_name`, `last_name`, `middle_name`, `title`, `highest_degree_earned`, `employer`, `email`, `username`, `password`, `year`) VALUES
(1, 'Kyle', 'Black', NULL, 'admin', 'n/a', NULL, 'n/a', 'kymblack', 'kymblack', 0);

-- --------------------------------------------------------

--
-- Table structure for table `judge_category_preference`
--

CREATE TABLE `judge_category_preference` (
  `judge_id` int(3) NOT NULL,
  `category_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `judge_grade_preference`
--

CREATE TABLE `judge_grade_preference` (
  `judge_id` int(3) NOT NULL,
  `grade_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(3) NOT NULL,
  `project_number` int(3) NOT NULL,
  `title` varchar(32) NOT NULL,
  `abstract` varchar(32) DEFAULT NULL,
  `grade_level_id` int(3) NOT NULL,
  `category_id` int(3) NOT NULL,
  `booth_number_id` int(3) NOT NULL,
  `course_network_id` int(3) NOT NULL,
  `average_ranking` int(3) DEFAULT NULL,
  `year` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `project_grade_level`
--

CREATE TABLE `project_grade_level` (
  `grade_level_id` int(3) NOT NULL,
  `level_name` varchar(32) NOT NULL,
  `active` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_id` int(3) NOT NULL,
  `school_name` varchar(32) NOT NULL,
  `school_city` varchar(32) NOT NULL,
  `county_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` int(3) NOT NULL,
  `session_number` int(3) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `active` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(3) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `middle_name` varchar(32) DEFAULT NULL,
  `grade_id` int(3) NOT NULL,
  `gender` varchar(32) DEFAULT NULL,
  `school_id` int(3) NOT NULL,
  `county_id` int(3) NOT NULL,
  `school_city` varchar(32) NOT NULL,
  `project_id` int(3) NOT NULL,
  `year` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `judge_id` (`judge_id`);

--
-- Indexes for table `booth_number`
--
ALTER TABLE `booth_number`
  ADD PRIMARY KEY (`booth_number_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `county`
--
ALTER TABLE `county`
  ADD PRIMARY KEY (`county_id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `judge`
--
ALTER TABLE `judge`
  ADD PRIMARY KEY (`judge_id`);

--
-- Indexes for table `judge_category_preference`
--
ALTER TABLE `judge_category_preference`
  ADD KEY `judge_id` (`judge_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `judge_grade_preference`
--
ALTER TABLE `judge_grade_preference`
  ADD KEY `judge_id` (`judge_id`),
  ADD KEY `grade_id` (`grade_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`),
  ADD KEY `grade_level_id` (`grade_level_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `booth_number_id` (`booth_number_id`);

--
-- Indexes for table `project_grade_level`
--
ALTER TABLE `project_grade_level`
  ADD PRIMARY KEY (`grade_level_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_id`),
  ADD KEY `county_id` (`county_id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `school_county_id` (`county_id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `grade_id` (`grade_id`),
  ADD KEY `school_id` (`school_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_id` int(3) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `ASSIGNMENT_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ASSIGNMENT_ibfk_2` FOREIGN KEY (`judge_id`) REFERENCES `judge` (`judge_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ASSIGNMENT_ibfk_3` FOREIGN KEY (`session_id`) REFERENCES `session` (`session_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `judge_category_preference`
--
ALTER TABLE `judge_category_preference`
  ADD CONSTRAINT `JUDGE_CATEGORY_PREFERENCE_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `JUDGE_CATEGORY_PREFERENCE_ibfk_2` FOREIGN KEY (`judge_id`) REFERENCES `judge` (`judge_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `judge_grade_preference`
--
ALTER TABLE `judge_grade_preference`
  ADD CONSTRAINT `JUDGE_GRADE_PREFERENCE_ibfk_1` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`grade_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `JUDGE_GRADE_PREFERENCE_ibfk_2` FOREIGN KEY (`judge_id`) REFERENCES `judge` (`judge_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `PROJECT_ibfk_1` FOREIGN KEY (`booth_number_id`) REFERENCES `booth_number` (`booth_number_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PROJECT_ibfk_2` FOREIGN KEY (`grade_level_id`) REFERENCES `project_grade_level` (`grade_level_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `PROJECT_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `school`
--
ALTER TABLE `school`
  ADD CONSTRAINT `SCHOOL_ibfk_1` FOREIGN KEY (`county_id`) REFERENCES `county` (`county_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `STUDENT_ibfk_1` FOREIGN KEY (`county_id`) REFERENCES `county` (`county_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `STUDENT_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `STUDENT_ibfk_3` FOREIGN KEY (`grade_id`) REFERENCES `grade` (`grade_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `STUDENT_ibfk_4` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
