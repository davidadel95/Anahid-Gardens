-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 13, 2018 at 04:59 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anahiddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `coursetimetable`
--

CREATE TABLE `coursetimetable` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `ClassID` int(11) NOT NULL,
  `DaysID` int(11) NOT NULL,
  `TimeslotsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursetimetable`
--

INSERT INTO `coursetimetable` (`ID`, `UserID`, `CourseID`, `ClassID`, `DaysID`, `TimeslotsID`) VALUES
(3, 14, 1, 1, 1, 1),
(10, 16, 1, 1, 1, 2),
(12, 14, 1, 1, 1, 3),
(13, 14, 3, 3, 2, 2),
(15, 16, 1, 1, 2, 1),
(16, 14, 1, 3, 1, 2),
(17, 16, 1, 1, 2, 3),
(18, 16, 1, 4, 2, 2),
(19, 16, 2, 4, 4, 2),
(21, 16, 2, 2, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coursetimetable`
--
ALTER TABLE `coursetimetable`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UserID` (`UserID`,`DaysID`,`TimeslotsID`),
  ADD KEY `k2` (`CourseID`),
  ADD KEY `k3` (`ClassID`),
  ADD KEY `k4` (`DaysID`),
  ADD KEY `k5` (`TimeslotsID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coursetimetable`
--
ALTER TABLE `coursetimetable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `coursetimetable`
--
ALTER TABLE `coursetimetable`
  ADD CONSTRAINT `k1` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `k2` FOREIGN KEY (`CourseID`) REFERENCES `course` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `k3` FOREIGN KEY (`ClassID`) REFERENCES `class` (`ID`),
  ADD CONSTRAINT `k4` FOREIGN KEY (`DaysID`) REFERENCES `days` (`ID`),
  ADD CONSTRAINT `k5` FOREIGN KEY (`TimeslotsID`) REFERENCES `timeslots` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
