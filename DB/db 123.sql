-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 09, 2018 at 07:56 PM
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
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`ID`, `Name`) VALUES
(1, 'soccer');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `ID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `ApplicationOptionID` int(11) NOT NULL,
  `isVisible` tinyint(1) NOT NULL,
  `GroupID` int(11) NOT NULL
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
(9, 1, 1, 1, 0),
(10, 1, 2, 1, 0),
(11, 1, 6, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `applicationgroup`
--

CREATE TABLE `applicationgroup` (
  `ApplicationGroupID` int(11) NOT NULL,
  `ApplicationGroupName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicationgroup`
--

INSERT INTO `applicationgroup` (`ApplicationGroupID`, `ApplicationGroupName`) VALUES
(0, 'No'),
(3, 'Male'),
(4, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `applicationoptions`
--

CREATE TABLE `applicationoptions` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `OptionTypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicationoptions`
--

INSERT INTO `applicationoptions` (`ID`, `Name`, `OptionTypeID`) VALUES
(1, 'name', 2),
(2, 'username', 2),
(3, 'password', 3),
(4, 'Salary', 1),
(5, 'True', 4),
(6, 'Email', 2);

-- --------------------------------------------------------

--
-- Table structure for table `applicationvalue`
--

CREATE TABLE `applicationvalue` (
  `ID` int(11) NOT NULL,
  `ApplicationID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Value` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicationvalue`
--

INSERT INTO `applicationvalue` (`ID`, `ApplicationID`, `UserID`, `Value`) VALUES
(1, 1, 1, 'Anahid'),
(2, 2, 1, 'anahid'),
(3, 3, 1, '123'),
(5, 5, 6, 'Luka'),
(8, 8, 7, 'David'),
(9, 5, 8, 'John'),
(10, 5, 9, 'Child'),
(11, 11, 6, 'dasdas@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `Attended` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`ID`, `UserID`, `Date`, `Attended`) VALUES
(1, 1, '2018-03-11 00:00:00', 1),
(2, 6, '2018-04-29 04:23:10', 0),
(3, 6, '2018-04-29 04:23:57', 1),
(4, 6, '2018-04-29 04:24:14', 1),
(5, 8, '2018-04-29 04:24:14', 1),
(6, 6, '2018-04-29 04:28:47', 1),
(7, 8, '2018-04-29 04:28:47', 1),
(8, 6, '2018-04-29 16:47:43', 1),
(9, 8, '2018-04-29 16:47:57', 1),
(10, 1, '2018-04-29 00:00:00', 1),
(11, 7, '2018-04-30 00:00:00', 1),
(12, 6, '2018-04-30 00:00:00', 1),
(13, 8, '2018-04-30 00:00:00', 1),
(14, 6, '2018-05-09 19:31:58', 1),
(15, 8, '2018-05-09 19:31:58', 1),
(16, 9, '2018-05-09 19:31:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attendancelog`
--

CREATE TABLE `attendancelog` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `Attended` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `busschedule`
--

CREATE TABLE `busschedule` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Time` time NOT NULL,
  `ChildID` int(11) NOT NULL,
  `isArriving` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `busschedule`
--

INSERT INTO `busschedule` (`ID`, `UserID`, `Time`, `ChildID`, `isArriving`) VALUES
(2, 1, '08:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `carcolor`
--

CREATE TABLE `carcolor` (
  `ID` int(11) NOT NULL,
  `Color` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carcolor`
--

INSERT INTO `carcolor` (`ID`, `Color`) VALUES
(1, 'Blue'),
(2, 'Yellow');

-- --------------------------------------------------------

--
-- Table structure for table `cardata`
--

CREATE TABLE `cardata` (
  `ID` int(11) NOT NULL,
  `TypeID` int(11) NOT NULL,
  `ColorID` int(11) NOT NULL,
  `YearID` int(11) NOT NULL,
  `DriverID` int(11) NOT NULL,
  `PlateNb` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cardata`
--

INSERT INTO `cardata` (`ID`, `TypeID`, `ColorID`, `YearID`, `DriverID`, `PlateNb`) VALUES
(4, 11, 1, 1, 7, 'dsa123'),
(5, 11, 1, 17, 7, 'ATB123');

-- --------------------------------------------------------

--
-- Table structure for table `cartype`
--

CREATE TABLE `cartype` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `CarTypeID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cartype`
--

INSERT INTO `cartype` (`ID`, `Name`, `CarTypeID`) VALUES
(1, 'Car', NULL),
(2, 'Kia', 1),
(3, 'Hyundai', 1),
(4, 'Suzuki', 1),
(5, 'Honda', 1),
(6, 'BMW', 1),
(9, 'Mercedes', 1),
(10, 'Mazda', 1),
(11, 'Carens', 2),
(12, 'Civic', 5);

-- --------------------------------------------------------

--
-- Table structure for table `caryear`
--

CREATE TABLE `caryear` (
  `ID` int(11) NOT NULL,
  `Year` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caryear`
--

INSERT INTO `caryear` (`ID`, `Year`) VALUES
(1, '2000'),
(2, '2001'),
(3, '2002'),
(4, '2003'),
(5, '2004'),
(6, '2005'),
(7, '2006'),
(8, '2007'),
(9, '2008'),
(10, '2009'),
(11, '2010'),
(12, '2011'),
(13, '2012'),
(14, '2013'),
(15, '2014'),
(16, '2015'),
(17, '2016'),
(18, '2017'),
(19, '2018');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ID`, `Name`) VALUES
(1, '1A'),
(2, '1B'),
(3, '2A');

-- --------------------------------------------------------

--
-- Table structure for table `commentdetails`
--

CREATE TABLE `commentdetails` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentdetails`
--

INSERT INTO `commentdetails` (`ID`, `Name`) VALUES
(1, 'Place');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `EventDetailsID` int(11) NOT NULL,
  `Value` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`ID`, `EventDetailsID`, `Value`) VALUES
(1, 1, 'New Comment'),
(2, 12, 'soon'),
(3, 9, 'testing comment');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`ID`, `Name`) VALUES
(1, 'English'),
(2, 'Songs');

-- --------------------------------------------------------

--
-- Table structure for table `coursetimetable`
--

CREATE TABLE `coursetimetable` (
  `ID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `ClassID` int(11) NOT NULL,
  `DaysID` int(11) NOT NULL,
  `TimeslotsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursetimetable`
--

INSERT INTO `coursetimetable` (`ID`, `CourseID`, `ClassID`, `DaysID`, `TimeslotsID`) VALUES
(4, 1, 1, 1, 2),
(5, 1, 1, 1, 2),
(6, 1, 1, 1, 2),
(7, 1, 1, 1, 3),
(8, 1, 2, 1, 3),
(11, 1, 1, 1, 1),
(12, 1, 2, 1, 2),
(13, 2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

CREATE TABLE `curriculum` (
  `ID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `LessonName` varchar(100) NOT NULL,
  `LessonDetails` text NOT NULL,
  `MaxStars` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curriculum`
--

INSERT INTO `curriculum` (`ID`, `CourseID`, `LessonName`, `LessonDetails`, `MaxStars`) VALUES
(1, 2, 'Frere Jacques', 'Frere Jacques, Frere Jacques Dormez vous? Dormez vous? Sonnez les matines Sonnez les matines Din din don Din din don Are you sleeping? Are you sleeping? Brother John, Brother John Morning bells are ringing Morning bells are ringing Din dang dong Din dang dong', 0),
(2, 2, 'Dormer Vous', 'dfsfjksdlfjsdkl', 0);

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE `days` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`ID`, `Name`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(6, 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `disease`
--

CREATE TABLE `disease` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`ID`, `Name`) VALUES
(1, 'Flu');

-- --------------------------------------------------------

--
-- Table structure for table `duration`
--

CREATE TABLE `duration` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `StartDate` datetime NOT NULL,
  `LeftDate` datetime NOT NULL,
  `LogDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `duration`
--

INSERT INTO `duration` (`ID`, `UserID`, `StartDate`, `LeftDate`, `LogDate`) VALUES
(1, 1, '2018-03-01 00:00:00', '2018-03-02 00:00:00', '2018-03-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `errortypes`
--

CREATE TABLE `errortypes` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `errortypes`
--

INSERT INTO `errortypes` (`ID`, `Name`) VALUES
(2, 'Validation'),
(3, 'Error');

-- --------------------------------------------------------

--
-- Table structure for table `eventdetails`
--

CREATE TABLE `eventdetails` (
  `ID` int(11) NOT NULL,
  `EventName` varchar(200) NOT NULL,
  `Price` float NOT NULL,
  `EventTypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventdetails`
--

INSERT INTO `eventdetails` (`ID`, `EventName`, `Price`, `EventTypeID`) VALUES
(1, 'New ', 2000, 1),
(8, 'Luxor Trip', 1500, 3),
(9, 'BD Party', 200, 2),
(10, 'test', 123, 1),
(12, 'SMS BD', 111, 2),
(13, 'Mulino', 200, 4);

-- --------------------------------------------------------

--
-- Table structure for table `eventtype`
--

CREATE TABLE `eventtype` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventtype`
--

INSERT INTO `eventtype` (`ID`, `Name`) VALUES
(1, 'Subscription '),
(2, 'Party'),
(3, 'Trip'),
(4, 'Test'),
(5, 'Test2');

-- --------------------------------------------------------

--
-- Table structure for table `expenditures`
--

CREATE TABLE `expenditures` (
  `ID` int(11) NOT NULL,
  `Value` float NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `PaymentMethodID` int(11) NOT NULL,
  `ExpenditureTypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenditures`
--

INSERT INTO `expenditures` (`ID`, `Value`, `Date`, `PaymentMethodID`, `ExpenditureTypeID`) VALUES
(1, 50, '2018-03-11 16:14:12', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `expendituretypes`
--

CREATE TABLE `expendituretypes` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expendituretypes`
--

INSERT INTO `expendituretypes` (`ID`, `Name`) VALUES
(1, 'SuperMarket');

-- --------------------------------------------------------

--
-- Table structure for table `experiencesalaries`
--

CREATE TABLE `experiencesalaries` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `experiencesalaries`
--

INSERT INTO `experiencesalaries` (`ID`, `UserID`, `Value`) VALUES
(1, 1, 9000);

-- --------------------------------------------------------

--
-- Table structure for table `extraclothes`
--

CREATE TABLE `extraclothes` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extraclothes`
--

INSERT INTO `extraclothes` (`ID`, `Name`) VALUES
(1, 'Pampers');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `FoodID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`ID`, `Name`, `FoodID`) VALUES
(1, 'PARENTS', NULL),
(2, 'BreakFast', 1),
(3, 'Dinner', 1),
(4, 'Snack', 1),
(5, 'Drink', 1),
(6, 'Snickers', 4),
(7, 'Milk', 5),
(8, 'Chicken', 2),
(9, 'Beef', 3);

-- --------------------------------------------------------

--
-- Table structure for table `foodies`
--

CREATE TABLE `foodies` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `FoodID` int(11) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foodies`
--

INSERT INTO `foodies` (`ID`, `UserID`, `FoodID`, `Date`) VALUES
(1, 1, 7, '2018-03-11 00:00:00'),
(2, 1, 8, '2018-03-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `foodieslog`
--

CREATE TABLE `foodieslog` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `FoodID` int(11) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `foodtimetable`
--

CREATE TABLE `foodtimetable` (
  `ID` int(11) NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `FoodID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foodtimetable`
--

INSERT INTO `foodtimetable` (`ID`, `StartTime`, `EndTime`, `FoodID`) VALUES
(1, '10:00:00', '11:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `ID` int(11) NOT NULL,
  `FormNameID` int(11) NOT NULL,
  `FormOptionsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`ID`, `FormNameID`, `FormOptionsID`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `formname`
--

CREATE TABLE `formname` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formname`
--

INSERT INTO `formname` (`ID`, `Name`) VALUES
(1, 'EarlyLeave');

-- --------------------------------------------------------

--
-- Table structure for table `formoptions`
--

CREATE TABLE `formoptions` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `OptionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formoptions`
--

INSERT INTO `formoptions` (`ID`, `Name`, `OptionID`) VALUES
(1, 'FirstName', 2),
(2, 'Reason for leaving ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `formoptionsvalue`
--

CREATE TABLE `formoptionsvalue` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `FormID` int(11) NOT NULL,
  `Value` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formoptionsvalue`
--

INSERT INTO `formoptionsvalue` (`ID`, `UserID`, `FormID`, `Value`) VALUES
(1, 1, 1, 'Anahid'),
(2, 1, 2, 'Tired');

-- --------------------------------------------------------

--
-- Table structure for table `Holiday`
--

CREATE TABLE `Holiday` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Holiday`
--

INSERT INTO `Holiday` (`ID`, `UserID`, `StartDate`, `EndDate`) VALUES
(1, 1, '2018-03-06', '2018-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `leaving`
--

CREATE TABLE `leaving` (
  `ID` int(11) NOT NULL,
  `AttendanceID` int(11) NOT NULL,
  `LeaveTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaving`
--

INSERT INTO `leaving` (`ID`, `AttendanceID`, `LeaveTime`) VALUES
(1, 1, '2018-03-11 16:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `localization`
--

CREATE TABLE `localization` (
  `ID` int(11) NOT NULL,
  `Language` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `localization`
--

INSERT INTO `localization` (`ID`, `Language`) VALUES
(1, 'English'),
(2, 'French');

-- --------------------------------------------------------

--
-- Table structure for table `logtable`
--

CREATE TABLE `logtable` (
  `ID` int(11) NOT NULL,
  `Message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logtable`
--

INSERT INTO `logtable` (`ID`, `Message`) VALUES
(1, 'Logged');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`ID`, `Name`) VALUES
(1, 'Panadol');

-- --------------------------------------------------------

--
-- Table structure for table `medicinedisease`
--

CREATE TABLE `medicinedisease` (
  `ID` int(11) NOT NULL,
  `MedicineID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `DiseaseID` int(11) NOT NULL,
  `isSick` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicinedisease`
--

INSERT INTO `medicinedisease` (`ID`, `MedicineID`, `UserID`, `DiseaseID`, `isSick`) VALUES
(1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `messagesanderros`
--

CREATE TABLE `messagesanderros` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `TypeID` int(11) NOT NULL,
  `PageID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nulls`
--

CREATE TABLE `nulls` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nulls`
--

INSERT INTO `nulls` (`ID`, `Name`) VALUES
(1, 'Telephone'),
(4, 'Hobby'),
(5, 'Experience');

-- --------------------------------------------------------

--
-- Table structure for table `nullstype`
--

CREATE TABLE `nullstype` (
  `ID` int(11) NOT NULL,
  `NullID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Value` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nullstype`
--

INSERT INTO `nullstype` (`ID`, `NullID`, `UserID`, `Value`) VALUES
(1, 1, 1, '022877779'),
(2, 4, 1, 'Fishing');

-- --------------------------------------------------------

--
-- Table structure for table `optionstypes`
--

CREATE TABLE `optionstypes` (
  `ID` int(11) NOT NULL,
  `Type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `optionstypes`
--

INSERT INTO `optionstypes` (`ID`, `Type`) VALUES
(1, 'int'),
(2, 'text'),
(3, 'Password'),
(4, 'radio'),
(5, 'input'),
(6, 'checkbox');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `URL` varchar(500) NOT NULL,
  `ParentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`ID`, `Name`, `URL`, `ParentID`) VALUES
(1, 'Parent', 'index.php', NULL),
(8, 'Dashboard', '../php/dashboard.php', 1),
(9, 'Contact Us', '../../php/contactus.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pageshtml`
--

CREATE TABLE `pageshtml` (
  `ID` int(11) NOT NULL,
  `PagesID` int(11) NOT NULL,
  `HTML` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pageshtml`
--

INSERT INTO `pageshtml` (`ID`, `PagesID`, `HTML`) VALUES
(2, 9, '<h1 style=\"text-align: left;\"><em><strong>anahid nursery</strong></em></h1>');

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethods`
--

CREATE TABLE `paymentmethods` (
  `ID` int(11) NOT NULL,
  `PName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentmethods`
--

INSERT INTO `paymentmethods` (`ID`, `PName`) VALUES
(1, 'Cash'),
(2, 'Visa');

-- --------------------------------------------------------

--
-- Table structure for table `paymentoptions`
--

CREATE TABLE `paymentoptions` (
  `ID` int(11) NOT NULL,
  `PaymentMethodID` int(11) NOT NULL,
  `POptionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentoptions`
--

INSERT INTO `paymentoptions` (`ID`, `PaymentMethodID`, `POptionID`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `paymentoptionsvalue`
--

CREATE TABLE `paymentoptionsvalue` (
  `ID` int(11) NOT NULL,
  `PaymentOptionsID` int(11) NOT NULL,
  `Value` varchar(200) NOT NULL,
  `TransactionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentoptionsvalue`
--

INSERT INTO `paymentoptionsvalue` (`ID`, `PaymentOptionsID`, `Value`, `TransactionID`) VALUES
(1, 1, 'Anahid', 1),
(2, 2, '20HishamLabib', 1),
(3, 1, 'Joe', 2),
(4, 2, 'dsafa', 2);

-- --------------------------------------------------------

--
-- Table structure for table `poptions`
--

CREATE TABLE `poptions` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `TypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poptions`
--

INSERT INTO `poptions` (`ID`, `Name`, `TypeID`) VALUES
(1, 'Name', 2),
(2, 'address', 2),
(3, 'cvv', 1);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `ID` int(11) NOT NULL,
  `ReportNameID` int(11) NOT NULL,
  `ReportOptionsTypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`ID`, `ReportNameID`, `ReportOptionsTypeID`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `reportname`
--

CREATE TABLE `reportname` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reportname`
--

INSERT INTO `reportname` (`ID`, `Name`) VALUES
(1, 'ChildReport');

-- --------------------------------------------------------

--
-- Table structure for table `reportoptionstype`
--

CREATE TABLE `reportoptionstype` (
  `ID` int(11) NOT NULL,
  `OptionsTypeID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reportoptionstype`
--

INSERT INTO `reportoptionstype` (`ID`, `OptionsTypeID`, `Name`) VALUES
(1, 2, 'Name'),
(2, 2, 'Manner'),
(3, 2, 'Comment');

-- --------------------------------------------------------

--
-- Table structure for table `reportsvalue`
--

CREATE TABLE `reportsvalue` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ReportID` int(11) NOT NULL,
  `Value` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reportsvalue`
--

INSERT INTO `reportsvalue` (`ID`, `UserID`, `ReportID`, `Value`) VALUES
(1, 1, 1, 'AnahidChild'),
(2, 1, 2, 'Bad'),
(3, 1, 3, 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `ParentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`ID`, `Name`, `Quantity`, `ParentID`) VALUES
(1, 'Parent', 0, NULL),
(2, 'Printer', 97, 1),
(3, 'Desks', 6, 1),
(4, 'Tables', 0, 1),
(5, 'Deskjet F2200', 2, 2),
(6, 'LaserJet', 3, 2),
(7, 'Laserr', 11, 2),
(8, '5200F', 20, 2),
(9, 'Lasr 2', 34, 2),
(10, 'Manager Desk', 2, 3),
(11, 'Home Desk', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `LoginUrl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`ID`, `Name`, `LoginUrl`) VALUES
(1, 'Admin', '../php/Dashboard.php'),
(2, 'Child', '../php/Dashboard.php'),
(3, 'Driver', '../php/Dashboard.php'),
(4, 'Teacher', '');

-- --------------------------------------------------------

--
-- Table structure for table `rolepages`
--

CREATE TABLE `rolepages` (
  `ID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `PageID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salariespayment`
--

CREATE TABLE `salariespayment` (
  `ID` int(11) NOT NULL,
  `ValueToBePaid` float NOT NULL,
  `isPaid` tinyint(1) NOT NULL,
  `StartDate` datetime NOT NULL,
  `EndDate` datetime NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salariespayment`
--

INSERT INTO `salariespayment` (`ID`, `ValueToBePaid`, `isPaid`, `StartDate`, `EndDate`, `UserID`) VALUES
(1, 6000, 0, '2018-02-11 00:00:00', '2018-03-11 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `salarymanipulation`
--

CREATE TABLE `salarymanipulation` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Value` float NOT NULL,
  `isBonus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salarymanipulation`
--

INSERT INTO `salarymanipulation` (`ID`, `UserID`, `Date`, `Value`, `isBonus`) VALUES
(1, 1, '2018-03-11', 300, 1);

-- --------------------------------------------------------

--
-- Table structure for table `salarymanipulationlog`
--

CREATE TABLE `salarymanipulationlog` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Value` float NOT NULL,
  `isBonus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `studentclothes`
--

CREATE TABLE `studentclothes` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ClothesID` int(11) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentclothes`
--

INSERT INTO `studentclothes` (`ID`, `UserID`, `ClothesID`, `Date`) VALUES
(1, 1, 1, '2018-03-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `studentrating`
--

CREATE TABLE `studentrating` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `CurriculumID` int(11) NOT NULL,
  `Rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `timeslots`
--

CREATE TABLE `timeslots` (
  `ID` int(11) NOT NULL,
  `Begin` time NOT NULL,
  `End` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timeslots`
--

INSERT INTO `timeslots` (`ID`, `Begin`, `End`) VALUES
(1, '08:00:00', '10:00:00'),
(2, '10:00:00', '12:00:00'),
(3, '13:00:00', '15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `toilet`
--

CREATE TABLE `toilet` (
  `ID` int(11) NOT NULL,
  `Type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toilet`
--

INSERT INTO `toilet` (`ID`, `Type`) VALUES
(1, 'Pee'),
(2, 'Poop'),
(3, 'Abnormal');

-- --------------------------------------------------------

--
-- Table structure for table `toiletcheck`
--

CREATE TABLE `toiletcheck` (
  `ID` int(11) NOT NULL,
  `TypeID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toiletcheck`
--

INSERT INTO `toiletcheck` (`ID`, `TypeID`, `UserID`, `Date`) VALUES
(1, 1, 1, '2018-03-11 15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `EventID` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`ID`, `UserID`, `EventID`, `Date`, `Quantity`) VALUES
(1, 1, 1, '2018-03-11 00:00:00', 2),
(2, 6, 1, '2018-04-30 11:13:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactionlog`
--

CREATE TABLE `transactionlog` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `LogtableID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactionlog`
--

INSERT INTO `transactionlog` (`ID`, `UserID`, `Date`, `LogtableID`) VALUES
(1, 1, '2018-03-11 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `UID` int(11) DEFAULT NULL,
  `DateAdded` datetime NOT NULL,
  `StatusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `RoleID`, `UID`, `DateAdded`, `StatusID`) VALUES
(1, 1, NULL, '2018-03-11 17:00:00', 1),
(6, 2, 1, '2018-03-11 00:00:00', 1),
(7, 3, 1, '2018-03-11 05:00:00', 1),
(8, 2, 1, '2018-04-29 16:04:39', 5),
(9, 2, 1, '2018-04-29 19:26:45', 5);

-- --------------------------------------------------------

--
-- Table structure for table `useractivities`
--

CREATE TABLE `useractivities` (
  `ID` int(11) NOT NULL,
  `ActivityID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useractivities`
--

INSERT INTO `useractivities` (`ID`, `ActivityID`, `UserID`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userclasscourse`
--

CREATE TABLE `userclasscourse` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ClassID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userclasscourse`
--

INSERT INTO `userclasscourse` (`ID`, `UserID`, `ClassID`) VALUES
(1, 1, 1),
(2, 6, 1),
(3, 8, 1),
(4, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userdailyhours`
--

CREATE TABLE `userdailyhours` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Hours` int(11) NOT NULL,
  `isExtra` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdailyhours`
--

INSERT INTO `userdailyhours` (`ID`, `UserID`, `Date`, `Hours`, `isExtra`) VALUES
(1, 1, '2018-03-11', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `userdailyhourslog`
--

CREATE TABLE `userdailyhourslog` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Hours` int(11) NOT NULL,
  `isExtra` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userstatus`
--

CREATE TABLE `userstatus` (
  `ID` int(11) NOT NULL,
  `Status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userstatus`
--

INSERT INTO `userstatus` (`ID`, `Status`) VALUES
(1, 'available '),
(2, 'Holding'),
(3, 'Left'),
(4, 'Sick'),
(5, 'Missing Login');

-- --------------------------------------------------------

--
-- Table structure for table `uservaccination`
--

CREATE TABLE `uservaccination` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `VaccinationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uservaccination`
--

INSERT INTO `uservaccination` (`ID`, `UserID`, `VaccinationID`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vaccination`
--

CREATE TABLE `vaccination` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vaccination`
--

INSERT INTO `vaccination` (`ID`, `Name`) VALUES
(1, 'Ta3oon');

-- --------------------------------------------------------

--
-- Table structure for table `word`
--

CREATE TABLE `word` (
  `ID` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `PageID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `word`
--

INSERT INTO `word` (`ID`, `Name`, `PageID`) VALUES
(2, 'One', 9);

-- --------------------------------------------------------

--
-- Table structure for table `wordlang`
--

CREATE TABLE `wordlang` (
  `ID` int(11) NOT NULL,
  `WordID` int(11) NOT NULL,
  `LangID` int(11) NOT NULL,
  `Value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wordlang`
--

INSERT INTO `wordlang` (`ID`, `WordID`, `LangID`, `Value`) VALUES
(5, 2, 1, 'One'),
(6, 2, 2, 'Un');

-- --------------------------------------------------------

--
-- Table structure for table `workershourssalary`
--

CREATE TABLE `workershourssalary` (
  `ID` int(11) NOT NULL,
  `BasicHour` float NOT NULL,
  `ExtraHour` float NOT NULL,
  `DeductionHour` float NOT NULL,
  `RoleID` int(11) NOT NULL,
  `NormalHours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workershourssalary`
--

INSERT INTO `workershourssalary` (`ID`, `BasicHour`, `ExtraHour`, `DeductionHour`, `RoleID`, `NormalHours`) VALUES
(1, 25, 20, 30, 1, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Application_fk0` (`RoleID`),
  ADD KEY `Application_fk1` (`ApplicationOptionID`),
  ADD KEY `application_ibfk_1` (`GroupID`);

--
-- Indexes for table `applicationgroup`
--
ALTER TABLE `applicationgroup`
  ADD PRIMARY KEY (`ApplicationGroupID`);

--
-- Indexes for table `applicationoptions`
--
ALTER TABLE `applicationoptions`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ApplicationOptions_fk0` (`OptionTypeID`);

--
-- Indexes for table `applicationvalue`
--
ALTER TABLE `applicationvalue`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ApplicationValue_fk0` (`ApplicationID`),
  ADD KEY `ApplicationValue_fk1` (`UserID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Attendance_fk0` (`UserID`);

--
-- Indexes for table `attendancelog`
--
ALTER TABLE `attendancelog`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `AttendanceLog_fk0` (`UserID`);

--
-- Indexes for table `busschedule`
--
ALTER TABLE `busschedule`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `BusSchedule_fk0` (`UserID`),
  ADD KEY `BusSchedule_fk1` (`ChildID`);

--
-- Indexes for table `carcolor`
--
ALTER TABLE `carcolor`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cardata`
--
ALTER TABLE `cardata`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CarData_fk0` (`TypeID`),
  ADD KEY `CarData_fk1` (`ColorID`),
  ADD KEY `CarData_fk2` (`YearID`),
  ADD KEY `CarData_fk3` (`DriverID`);

--
-- Indexes for table `cartype`
--
ALTER TABLE `cartype`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CarType_fk0` (`CarTypeID`);

--
-- Indexes for table `caryear`
--
ALTER TABLE `caryear`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `commentdetails`
--
ALTER TABLE `commentdetails`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Comments_fk1` (`EventDetailsID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `coursetimetable`
--
ALTER TABLE `coursetimetable`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CourseTimetable_fk0` (`CourseID`),
  ADD KEY `CourseTimetable_fk1` (`ClassID`),
  ADD KEY `CourseTimetable_fk2` (`DaysID`),
  ADD KEY `CourseTimetable_fk3` (`TimeslotsID`);

--
-- Indexes for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `courseIDFK` (`CourseID`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `disease`
--
ALTER TABLE `disease`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `duration`
--
ALTER TABLE `duration`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Duration_fk0` (`UserID`);

--
-- Indexes for table `errortypes`
--
ALTER TABLE `errortypes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `eventdetails`
--
ALTER TABLE `eventdetails`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EventDetails_fk0` (`EventTypeID`);

--
-- Indexes for table `eventtype`
--
ALTER TABLE `eventtype`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `expenditures`
--
ALTER TABLE `expenditures`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Expenditures_fk0` (`PaymentMethodID`),
  ADD KEY `Expenditures_fk1` (`ExpenditureTypeID`);

--
-- Indexes for table `expendituretypes`
--
ALTER TABLE `expendituretypes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `experiencesalaries`
--
ALTER TABLE `experiencesalaries`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ExperienceSalaries_fk0` (`UserID`);

--
-- Indexes for table `extraclothes`
--
ALTER TABLE `extraclothes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Food_fk0` (`FoodID`);

--
-- Indexes for table `foodies`
--
ALTER TABLE `foodies`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Foodies_fk0` (`UserID`),
  ADD KEY `Foodies_fk1` (`FoodID`);

--
-- Indexes for table `foodieslog`
--
ALTER TABLE `foodieslog`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FoodiesLog_fk0` (`UserID`),
  ADD KEY `FoodiesLog_fk1` (`FoodID`);

--
-- Indexes for table `foodtimetable`
--
ALTER TABLE `foodtimetable`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FoodTimeTable_fk0` (`FoodID`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Form_fk0` (`FormNameID`),
  ADD KEY `Form_fk1` (`FormOptionsID`);

--
-- Indexes for table `formname`
--
ALTER TABLE `formname`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `formoptions`
--
ALTER TABLE `formoptions`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FormOptions_fk0` (`OptionID`);

--
-- Indexes for table `formoptionsvalue`
--
ALTER TABLE `formoptionsvalue`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FormOptionsValue_fk1` (`FormID`),
  ADD KEY `FormOptionsValue_fk0` (`UserID`);

--
-- Indexes for table `Holiday`
--
ALTER TABLE `Holiday`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk4` (`UserID`);

--
-- Indexes for table `leaving`
--
ALTER TABLE `leaving`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Leaving_fk0` (`AttendanceID`);

--
-- Indexes for table `localization`
--
ALTER TABLE `localization`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `logtable`
--
ALTER TABLE `logtable`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `medicinedisease`
--
ALTER TABLE `medicinedisease`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MedicineDisease_fk0` (`MedicineID`),
  ADD KEY `MedicineDisease_fk1` (`UserID`),
  ADD KEY `MedicineDisease_fk2` (`DiseaseID`);

--
-- Indexes for table `messagesanderros`
--
ALTER TABLE `messagesanderros`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MessagesAndErros_fk0` (`TypeID`),
  ADD KEY `MessagesAndErros_fk1` (`PageID`);

--
-- Indexes for table `nulls`
--
ALTER TABLE `nulls`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `nullstype`
--
ALTER TABLE `nullstype`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NullsType_fk0` (`NullID`),
  ADD KEY `NullsType_fk1` (`UserID`);

--
-- Indexes for table `optionstypes`
--
ALTER TABLE `optionstypes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk7` (`ParentID`);

--
-- Indexes for table `pageshtml`
--
ALTER TABLE `pageshtml`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PagesHTML_fk0` (`PagesID`);

--
-- Indexes for table `paymentmethods`
--
ALTER TABLE `paymentmethods`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `paymentoptions`
--
ALTER TABLE `paymentoptions`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PaymentOptions_fk0` (`PaymentMethodID`),
  ADD KEY `PaymentOptions_fk1` (`POptionID`);

--
-- Indexes for table `paymentoptionsvalue`
--
ALTER TABLE `paymentoptionsvalue`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PaymentOptionsValue_fk0` (`PaymentOptionsID`),
  ADD KEY `PaymentOptionsValue_fk1` (`TransactionID`);

--
-- Indexes for table `poptions`
--
ALTER TABLE `poptions`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `POptions_fk0` (`TypeID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Report_fk0` (`ReportNameID`),
  ADD KEY `Report_fk1` (`ReportOptionsTypeID`);

--
-- Indexes for table `reportname`
--
ALTER TABLE `reportname`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reportoptionstype`
--
ALTER TABLE `reportoptionstype`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ReportOptionsType_fk0` (`OptionsTypeID`);

--
-- Indexes for table `reportsvalue`
--
ALTER TABLE `reportsvalue`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ReportsValue_fk0` (`UserID`),
  ADD KEY `ReportsValue_fk1` (`ReportID`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `parentIDReference` (`ParentID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rolepages`
--
ALTER TABLE `rolepages`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `RolePages_fk0` (`RoleID`),
  ADD KEY `RolePages_fk1` (`PageID`);

--
-- Indexes for table `salariespayment`
--
ALTER TABLE `salariespayment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `SalariesPayment_fk0` (`UserID`);

--
-- Indexes for table `salarymanipulation`
--
ALTER TABLE `salarymanipulation`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `SalaryManipulation_fk0` (`UserID`);

--
-- Indexes for table `salarymanipulationlog`
--
ALTER TABLE `salarymanipulationlog`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `SalaryManipulationLog_fk0` (`UserID`);

--
-- Indexes for table `studentclothes`
--
ALTER TABLE `studentclothes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `StudentClothes_fk0` (`UserID`),
  ADD KEY `StudentClothes_fk1` (`ClothesID`);

--
-- Indexes for table `studentrating`
--
ALTER TABLE `studentrating`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `CurriculumID` (`CurriculumID`);

--
-- Indexes for table `timeslots`
--
ALTER TABLE `timeslots`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `toilet`
--
ALTER TABLE `toilet`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `toiletcheck`
--
ALTER TABLE `toiletcheck`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ToiletCheck_fk0` (`TypeID`),
  ADD KEY `ToiletCheck_fk1` (`UserID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Transaction_fk0` (`UserID`),
  ADD KEY `Transaction_fk1` (`EventID`);

--
-- Indexes for table `transactionlog`
--
ALTER TABLE `transactionlog`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `TransactionLog_fk0` (`UserID`),
  ADD KEY `TransactionLog_fk1` (`LogtableID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `User_fk0` (`RoleID`),
  ADD KEY `User_fk1` (`UID`),
  ADD KEY `User_fk2` (`StatusID`);

--
-- Indexes for table `useractivities`
--
ALTER TABLE `useractivities`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserActivities_fk0` (`ActivityID`),
  ADD KEY `UserActivities_fk1` (`UserID`);

--
-- Indexes for table `userclasscourse`
--
ALTER TABLE `userclasscourse`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserClassCourse_fk0` (`UserID`),
  ADD KEY `UserClassCourse_fk2` (`ClassID`);

--
-- Indexes for table `userdailyhours`
--
ALTER TABLE `userdailyhours`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserDailyHours_fk0` (`UserID`);

--
-- Indexes for table `userdailyhourslog`
--
ALTER TABLE `userdailyhourslog`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserDailyHoursLog_fk0` (`UserID`);

--
-- Indexes for table `userstatus`
--
ALTER TABLE `userstatus`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `uservaccination`
--
ALTER TABLE `uservaccination`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserVaccination_fk0` (`UserID`),
  ADD KEY `UserVaccination_fk1` (`VaccinationID`);

--
-- Indexes for table `vaccination`
--
ALTER TABLE `vaccination`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `word`
--
ALTER TABLE `word`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Word_fk1` (`PageID`);

--
-- Indexes for table `wordlang`
--
ALTER TABLE `wordlang`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_1` (`LangID`),
  ADD KEY `fk_2` (`WordID`);

--
-- Indexes for table `workershourssalary`
--
ALTER TABLE `workershourssalary`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `WorkersHoursSalary_fk0` (`RoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `applicationgroup`
--
ALTER TABLE `applicationgroup`
  MODIFY `ApplicationGroupID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `applicationoptions`
--
ALTER TABLE `applicationoptions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `applicationvalue`
--
ALTER TABLE `applicationvalue`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `attendancelog`
--
ALTER TABLE `attendancelog`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `busschedule`
--
ALTER TABLE `busschedule`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `carcolor`
--
ALTER TABLE `carcolor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cardata`
--
ALTER TABLE `cardata`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cartype`
--
ALTER TABLE `cartype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `caryear`
--
ALTER TABLE `caryear`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `commentdetails`
--
ALTER TABLE `commentdetails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `coursetimetable`
--
ALTER TABLE `coursetimetable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `curriculum`
--
ALTER TABLE `curriculum`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `days`
--
ALTER TABLE `days`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `disease`
--
ALTER TABLE `disease`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `duration`
--
ALTER TABLE `duration`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `errortypes`
--
ALTER TABLE `errortypes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `eventdetails`
--
ALTER TABLE `eventdetails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `eventtype`
--
ALTER TABLE `eventtype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `expenditures`
--
ALTER TABLE `expenditures`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `expendituretypes`
--
ALTER TABLE `expendituretypes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `experiencesalaries`
--
ALTER TABLE `experiencesalaries`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `extraclothes`
--
ALTER TABLE `extraclothes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `foodies`
--
ALTER TABLE `foodies`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `foodieslog`
--
ALTER TABLE `foodieslog`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `foodtimetable`
--
ALTER TABLE `foodtimetable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `formname`
--
ALTER TABLE `formname`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `formoptions`
--
ALTER TABLE `formoptions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `formoptionsvalue`
--
ALTER TABLE `formoptionsvalue`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `Holiday`
--
ALTER TABLE `Holiday`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `leaving`
--
ALTER TABLE `leaving`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `localization`
--
ALTER TABLE `localization`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `logtable`
--
ALTER TABLE `logtable`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `medicinedisease`
--
ALTER TABLE `medicinedisease`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `messagesanderros`
--
ALTER TABLE `messagesanderros`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `nulls`
--
ALTER TABLE `nulls`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `nullstype`
--
ALTER TABLE `nullstype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `optionstypes`
--
ALTER TABLE `optionstypes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pageshtml`
--
ALTER TABLE `pageshtml`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `paymentmethods`
--
ALTER TABLE `paymentmethods`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `paymentoptions`
--
ALTER TABLE `paymentoptions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `paymentoptionsvalue`
--
ALTER TABLE `paymentoptionsvalue`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `poptions`
--
ALTER TABLE `poptions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reportname`
--
ALTER TABLE `reportname`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `reportoptionstype`
--
ALTER TABLE `reportoptionstype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reportsvalue`
--
ALTER TABLE `reportsvalue`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rolepages`
--
ALTER TABLE `rolepages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `salariespayment`
--
ALTER TABLE `salariespayment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `salarymanipulation`
--
ALTER TABLE `salarymanipulation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `salarymanipulationlog`
--
ALTER TABLE `salarymanipulationlog`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `studentclothes`
--
ALTER TABLE `studentclothes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `studentrating`
--
ALTER TABLE `studentrating`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `timeslots`
--
ALTER TABLE `timeslots`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `toilet`
--
ALTER TABLE `toilet`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `toiletcheck`
--
ALTER TABLE `toiletcheck`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transactionlog`
--
ALTER TABLE `transactionlog`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `useractivities`
--
ALTER TABLE `useractivities`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `userclasscourse`
--
ALTER TABLE `userclasscourse`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `userdailyhours`
--
ALTER TABLE `userdailyhours`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `userdailyhourslog`
--
ALTER TABLE `userdailyhourslog`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userstatus`
--
ALTER TABLE `userstatus`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `uservaccination`
--
ALTER TABLE `uservaccination`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vaccination`
--
ALTER TABLE `vaccination`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `word`
--
ALTER TABLE `word`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wordlang`
--
ALTER TABLE `wordlang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `workershourssalary`
--
ALTER TABLE `workershourssalary`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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

--
-- Constraints for table `applicationoptions`
--
ALTER TABLE `applicationoptions`
  ADD CONSTRAINT `ApplicationOptions_fk0` FOREIGN KEY (`OptionTypeID`) REFERENCES `optionstypes` (`ID`);

--
-- Constraints for table `applicationvalue`
--
ALTER TABLE `applicationvalue`
  ADD CONSTRAINT `ApplicationValue_fk0` FOREIGN KEY (`ApplicationID`) REFERENCES `application` (`ID`),
  ADD CONSTRAINT `ApplicationValue_fk1` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `Attendance_fk0` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `attendancelog`
--
ALTER TABLE `attendancelog`
  ADD CONSTRAINT `AttendanceLog_fk0` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `busschedule`
--
ALTER TABLE `busschedule`
  ADD CONSTRAINT `BusSchedule_fk0` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `BusSchedule_fk1` FOREIGN KEY (`ChildID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `cardata`
--
ALTER TABLE `cardata`
  ADD CONSTRAINT `CarData_fk0` FOREIGN KEY (`TypeID`) REFERENCES `cartype` (`ID`),
  ADD CONSTRAINT `CarData_fk1` FOREIGN KEY (`ColorID`) REFERENCES `carcolor` (`ID`),
  ADD CONSTRAINT `CarData_fk2` FOREIGN KEY (`YearID`) REFERENCES `caryear` (`ID`),
  ADD CONSTRAINT `CarData_fk3` FOREIGN KEY (`DriverID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `cartype`
--
ALTER TABLE `cartype`
  ADD CONSTRAINT `CarType_fk0` FOREIGN KEY (`CarTypeID`) REFERENCES `cartype` (`ID`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `Comments_fk1` FOREIGN KEY (`EventDetailsID`) REFERENCES `eventdetails` (`ID`);

--
-- Constraints for table `coursetimetable`
--
ALTER TABLE `coursetimetable`
  ADD CONSTRAINT `CourseTimetable_fk0` FOREIGN KEY (`CourseID`) REFERENCES `course` (`ID`),
  ADD CONSTRAINT `CourseTimetable_fk1` FOREIGN KEY (`ClassID`) REFERENCES `class` (`ID`),
  ADD CONSTRAINT `CourseTimetable_fk2` FOREIGN KEY (`DaysID`) REFERENCES `days` (`ID`),
  ADD CONSTRAINT `CourseTimetable_fk3` FOREIGN KEY (`TimeslotsID`) REFERENCES `timeslots` (`ID`);

--
-- Constraints for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD CONSTRAINT `courseIDFK` FOREIGN KEY (`CourseID`) REFERENCES `course` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `duration`
--
ALTER TABLE `duration`
  ADD CONSTRAINT `Duration_fk0` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `eventdetails`
--
ALTER TABLE `eventdetails`
  ADD CONSTRAINT `EventDetails_fk0` FOREIGN KEY (`EventTypeID`) REFERENCES `eventtype` (`ID`);

--
-- Constraints for table `expenditures`
--
ALTER TABLE `expenditures`
  ADD CONSTRAINT `Expenditures_fk0` FOREIGN KEY (`PaymentMethodID`) REFERENCES `paymentmethods` (`ID`),
  ADD CONSTRAINT `Expenditures_fk1` FOREIGN KEY (`ExpenditureTypeID`) REFERENCES `expendituretypes` (`ID`);

--
-- Constraints for table `experiencesalaries`
--
ALTER TABLE `experiencesalaries`
  ADD CONSTRAINT `ExperienceSalaries_fk0` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `Food_fk0` FOREIGN KEY (`FoodID`) REFERENCES `food` (`ID`);

--
-- Constraints for table `foodies`
--
ALTER TABLE `foodies`
  ADD CONSTRAINT `Foodies_fk0` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `Foodies_fk1` FOREIGN KEY (`FoodID`) REFERENCES `food` (`ID`);

--
-- Constraints for table `foodieslog`
--
ALTER TABLE `foodieslog`
  ADD CONSTRAINT `FoodiesLog_fk0` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `FoodiesLog_fk1` FOREIGN KEY (`FoodID`) REFERENCES `food` (`ID`);

--
-- Constraints for table `foodtimetable`
--
ALTER TABLE `foodtimetable`
  ADD CONSTRAINT `FoodTimeTable_fk0` FOREIGN KEY (`FoodID`) REFERENCES `food` (`ID`);

--
-- Constraints for table `form`
--
ALTER TABLE `form`
  ADD CONSTRAINT `Form_fk0` FOREIGN KEY (`FormNameID`) REFERENCES `formname` (`ID`),
  ADD CONSTRAINT `Form_fk1` FOREIGN KEY (`FormOptionsID`) REFERENCES `formoptions` (`ID`);

--
-- Constraints for table `formoptions`
--
ALTER TABLE `formoptions`
  ADD CONSTRAINT `FormOptions_fk0` FOREIGN KEY (`OptionID`) REFERENCES `optionstypes` (`ID`);

--
-- Constraints for table `formoptionsvalue`
--
ALTER TABLE `formoptionsvalue`
  ADD CONSTRAINT `FormOptionsValue_fk0` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `FormOptionsValue_fk1` FOREIGN KEY (`FormID`) REFERENCES `form` (`ID`);

--
-- Constraints for table `Holiday`
--
ALTER TABLE `Holiday`
  ADD CONSTRAINT `fk4` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leaving`
--
ALTER TABLE `leaving`
  ADD CONSTRAINT `Leaving_fk0` FOREIGN KEY (`AttendanceID`) REFERENCES `attendance` (`ID`);

--
-- Constraints for table `medicinedisease`
--
ALTER TABLE `medicinedisease`
  ADD CONSTRAINT `MedicineDisease_fk0` FOREIGN KEY (`MedicineID`) REFERENCES `medicine` (`ID`),
  ADD CONSTRAINT `MedicineDisease_fk1` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `MedicineDisease_fk2` FOREIGN KEY (`DiseaseID`) REFERENCES `disease` (`ID`);

--
-- Constraints for table `messagesanderros`
--
ALTER TABLE `messagesanderros`
  ADD CONSTRAINT `MessagesAndErros_fk0` FOREIGN KEY (`TypeID`) REFERENCES `errortypes` (`ID`),
  ADD CONSTRAINT `MessagesAndErros_fk1` FOREIGN KEY (`PageID`) REFERENCES `pages` (`ID`);

--
-- Constraints for table `nullstype`
--
ALTER TABLE `nullstype`
  ADD CONSTRAINT `NullsType_fk0` FOREIGN KEY (`NullID`) REFERENCES `nulls` (`ID`),
  ADD CONSTRAINT `NullsType_fk1` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `fk7` FOREIGN KEY (`ParentID`) REFERENCES `pages` (`ID`);

--
-- Constraints for table `pageshtml`
--
ALTER TABLE `pageshtml`
  ADD CONSTRAINT `PagesHTML_fk0` FOREIGN KEY (`PagesID`) REFERENCES `pages` (`ID`);

--
-- Constraints for table `paymentoptions`
--
ALTER TABLE `paymentoptions`
  ADD CONSTRAINT `PaymentOptions_fk0` FOREIGN KEY (`PaymentMethodID`) REFERENCES `paymentmethods` (`ID`),
  ADD CONSTRAINT `PaymentOptions_fk1` FOREIGN KEY (`POptionID`) REFERENCES `poptions` (`ID`);

--
-- Constraints for table `paymentoptionsvalue`
--
ALTER TABLE `paymentoptionsvalue`
  ADD CONSTRAINT `PaymentOptionsValue_fk0` FOREIGN KEY (`PaymentOptionsID`) REFERENCES `paymentoptions` (`ID`),
  ADD CONSTRAINT `PaymentOptionsValue_fk1` FOREIGN KEY (`TransactionID`) REFERENCES `transaction` (`ID`);

--
-- Constraints for table `poptions`
--
ALTER TABLE `poptions`
  ADD CONSTRAINT `POptions_fk0` FOREIGN KEY (`TypeID`) REFERENCES `optionstypes` (`ID`);

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `Report_fk0` FOREIGN KEY (`ReportNameID`) REFERENCES `reportname` (`ID`),
  ADD CONSTRAINT `Report_fk1` FOREIGN KEY (`ReportOptionsTypeID`) REFERENCES `reportoptionstype` (`ID`);

--
-- Constraints for table `reportoptionstype`
--
ALTER TABLE `reportoptionstype`
  ADD CONSTRAINT `ReportOptionsType_fk0` FOREIGN KEY (`OptionsTypeID`) REFERENCES `optionstypes` (`ID`);

--
-- Constraints for table `reportsvalue`
--
ALTER TABLE `reportsvalue`
  ADD CONSTRAINT `ReportsValue_fk0` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `ReportsValue_fk1` FOREIGN KEY (`ReportID`) REFERENCES `report` (`ID`);

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `parentIDReference` FOREIGN KEY (`ParentID`) REFERENCES `resources` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rolepages`
--
ALTER TABLE `rolepages`
  ADD CONSTRAINT `RolePages_fk0` FOREIGN KEY (`RoleID`) REFERENCES `role` (`ID`),
  ADD CONSTRAINT `RolePages_fk1` FOREIGN KEY (`PageID`) REFERENCES `pages` (`ID`);

--
-- Constraints for table `salariespayment`
--
ALTER TABLE `salariespayment`
  ADD CONSTRAINT `SalariesPayment_fk0` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `salarymanipulation`
--
ALTER TABLE `salarymanipulation`
  ADD CONSTRAINT `SalaryManipulation_fk0` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `salarymanipulationlog`
--
ALTER TABLE `salarymanipulationlog`
  ADD CONSTRAINT `SalaryManipulationLog_fk0` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `studentclothes`
--
ALTER TABLE `studentclothes`
  ADD CONSTRAINT `StudentClothes_fk0` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `StudentClothes_fk1` FOREIGN KEY (`ClothesID`) REFERENCES `extraclothes` (`ID`);

--
-- Constraints for table `studentrating`
--
ALTER TABLE `studentrating`
  ADD CONSTRAINT `CurriculumID` FOREIGN KEY (`CurriculumID`) REFERENCES `curriculum` (`ID`),
  ADD CONSTRAINT `UserID` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `toiletcheck`
--
ALTER TABLE `toiletcheck`
  ADD CONSTRAINT `ToiletCheck_fk0` FOREIGN KEY (`TypeID`) REFERENCES `toilet` (`ID`),
  ADD CONSTRAINT `ToiletCheck_fk1` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `Transaction_fk0` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `Transaction_fk1` FOREIGN KEY (`EventID`) REFERENCES `eventdetails` (`ID`);

--
-- Constraints for table `transactionlog`
--
ALTER TABLE `transactionlog`
  ADD CONSTRAINT `TransactionLog_fk0` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `TransactionLog_fk1` FOREIGN KEY (`LogtableID`) REFERENCES `logtable` (`ID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `User_fk0` FOREIGN KEY (`RoleID`) REFERENCES `role` (`ID`),
  ADD CONSTRAINT `User_fk1` FOREIGN KEY (`UID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `User_fk2` FOREIGN KEY (`StatusID`) REFERENCES `userstatus` (`ID`);

--
-- Constraints for table `useractivities`
--
ALTER TABLE `useractivities`
  ADD CONSTRAINT `UserActivities_fk0` FOREIGN KEY (`ActivityID`) REFERENCES `activities` (`ID`),
  ADD CONSTRAINT `UserActivities_fk1` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `userclasscourse`
--
ALTER TABLE `userclasscourse`
  ADD CONSTRAINT `UserClassCourse_fk0` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `UserClassCourse_fk2` FOREIGN KEY (`ClassID`) REFERENCES `class` (`ID`);

--
-- Constraints for table `userdailyhours`
--
ALTER TABLE `userdailyhours`
  ADD CONSTRAINT `UserDailyHours_fk0` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `userdailyhourslog`
--
ALTER TABLE `userdailyhourslog`
  ADD CONSTRAINT `UserDailyHoursLog_fk0` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `uservaccination`
--
ALTER TABLE `uservaccination`
  ADD CONSTRAINT `UserVaccination_fk0` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `UserVaccination_fk1` FOREIGN KEY (`VaccinationID`) REFERENCES `vaccination` (`ID`);

--
-- Constraints for table `word`
--
ALTER TABLE `word`
  ADD CONSTRAINT `Word_fk1` FOREIGN KEY (`PageID`) REFERENCES `pages` (`ID`);

--
-- Constraints for table `wordlang`
--
ALTER TABLE `wordlang`
  ADD CONSTRAINT `fk_1` FOREIGN KEY (`LangID`) REFERENCES `localization` (`ID`),
  ADD CONSTRAINT `fk_2` FOREIGN KEY (`WordID`) REFERENCES `word` (`ID`);

--
-- Constraints for table `workershourssalary`
--
ALTER TABLE `workershourssalary`
  ADD CONSTRAINT `WorkersHoursSalary_fk0` FOREIGN KEY (`RoleID`) REFERENCES `role` (`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
