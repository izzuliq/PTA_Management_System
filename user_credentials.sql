-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2024 at 10:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_credentials`
--

-- --------------------------------------------------------

--
-- Table structure for table `archives`
--

CREATE TABLE `archives` (
  `archiveName` varchar(500) NOT NULL,
  `archiveDescription` varchar(500) NOT NULL,
  `archiveDate` date NOT NULL,
  `archiveId` varchar(500) NOT NULL,
  `authorName` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `archives`
--

INSERT INTO `archives` (`archiveName`, `archiveDescription`, `archiveDate`, `archiveId`, `authorName`) VALUES
('The First Existence of PTA Management', 'The first PTA Management was formed at this school in 2001', '2024-02-11', 'Archive 1001', 'Raja Fitri Haziq'),
('The Name of The First Principal', 'The name of the first principal of the school is Muhamad Abdul Bin Ahmad Kazim', '2024-02-06', 'Archive 1002', 'Raja Fitri Haziq'),
('Archive Test 2', 'Archive Description Test 2', '2024-01-31', 'Archive 1003', 'Ahmad Haikal');

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `username` varchar(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`username`, `user_id`, `password`, `role`) VALUES
('Raja Fitri Haziq ', 1211101242, 'Raja@03', 'admin'),
('Ahmad Haikal', 1211103147, 'haikal2003', 'teacher'),
('Muhamad Izzul Iqbal', 1211103148, 'izzuliqbal', 'parent'),
('testname', 123456, 'testpassword', 'admin'),
('ahmad', 12345, 'ahmad01', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `dependencies`
--

CREATE TABLE `dependencies` (
  `dependencyName` varchar(500) NOT NULL,
  `dependencyDescription` varchar(500) NOT NULL,
  `dependencyDate` date NOT NULL,
  `dependencyId` varchar(500) NOT NULL,
  `dependencyRelation` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dependencies`
--

INSERT INTO `dependencies` (`dependencyName`, `dependencyDescription`, `dependencyDate`, `dependencyId`, `dependencyRelation`) VALUES
('Ahmad Imran', 'A 5-Alqliah student with great reputation', '2003-02-24', 'Dependency 1001', 'Abdul Azim'),
('Dependency 1', 'Dependency Description 1', '2024-02-09', 'Dependency 1002', 'Dependency 1\s Father');

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activityName` varchar(500) NOT NULL,
  `activityDescription` varchar(500) NOT NULL,
  `activityDate` date NOT NULL,
  `activityId` varchar(500) NOT NULL,
  `organizerName` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activityName`, `activityDescription`, `activityDate`, `activityId`, `organizerName`) VALUES
('Gotong Royong', 'Cleaning the School to have a better environment', '2024-02-11', 'Activity 1001', 'Ahmad Haikal');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announcementName` varchar(500) NOT NULL,
  `announcementDescription` varchar(500) NOT NULL,
  `announcementDate` date NOT NULL,
  `announcementId` varchar(500) NOT NULL,
  `announcerName` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announcementName`, `announcementDescription`, `announcementDate`, `announcementId`, `announcerName`) VALUES
('Gotong Royong', 'All students must attend the Gotong Royong', '2024-02-11', 'Announcement 1001', 'Ahmad Haikal');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
