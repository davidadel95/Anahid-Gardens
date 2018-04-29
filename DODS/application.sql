-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2018 at 12:55 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `ID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `ApplicationOptionID` int(11) NOT NULL,
  `isVisible` tinyint(1) NOT NULL,
  `GroupID` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`ID`, `RoleID`, `ApplicationOptionID`, `isVisible`, `GroupID`) VALUES
(1, 1, 1, 0, 0),
(2, 1, 2, 0, 0),
(3, 1, 3, 0, 0),
(5, 2, 1, 1, 0),
(6, 2, 2, 0, 0),
(7, 2, 3, 0, 0),
(8, 3, 1, 1, 0),
(9, 1, 2, 1, 0),
(10, 3, 2, 1, 0),
(11, 3, 3, 0, 0),
(12, 1, 1, 0, 0),
(16, 1, 5, 1, 0),
(18, 1, 4, 1, 0),
(19, 1, 3, 1, 0),
(21, 7, 3, 1, 0),
(22, 6, 3, 1, 0),
(23, 1, 1, 1, 0),
(24, 9, 1, 1, 0),
(28, 1, 2, 0, 0),
(29, 2, 4, 1, 0),
(30, 2, 9, 1, 3),
(31, 2, 9, 1, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Application_fk0` (`RoleID`),
  ADD KEY `Application_fk1` (`ApplicationOptionID`),
  ADD KEY `GroupID` (`GroupID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `Application_fk0` FOREIGN KEY (`RoleID`) REFERENCES `role` (`ID`),
  ADD CONSTRAINT `Application_fk1` FOREIGN KEY (`ApplicationOptionID`) REFERENCES `applicationoptions` (`ID`),
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`GroupID`) REFERENCES `applicationgroup` (`ApplicationGroupID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
