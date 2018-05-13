-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 13, 2018 at 07:15 PM
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
(11, 1, 6, 1, 3),
(12, 4, 1, 1, 0),
(13, 4, 2, 0, 0),
(14, 4, 3, 0, 0);

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
(11, 11, 6, 'dasdas@gmail.com'),
(12, 5, 12, 'David'),
(13, 6, 12, 'david'),
(14, 7, 12, '123'),
(15, 12, 13, 'dcdavid'),
(16, 13, 13, 'david12'),
(17, 14, 13, '1234'),
(18, 12, 14, 'Andro');

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
(16, 9, '2018-05-09 19:31:58', 1),
(28, 8, '2018-05-11 00:00:00', 1),
(30, 9, '2018-05-11 23:20:05', 1),
(31, 6, '2018-05-11 23:21:43', 1),
(32, 6, '2018-05-13 01:51:39', 1),
(33, 8, '2018-05-13 01:51:39', 1),
(34, 9, '2018-05-13 01:51:39', 1),
(41, 7, '2018-05-13 18:54:20', 1),
(42, 13, '2018-05-13 18:54:21', 1),
(43, 7, '2018-05-13 19:07:42', 1);

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
(2, 'Yellow'),
(3, 'Red');

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
(2, 13, 1, 1, 1, 2),
(3, 14, 1, 1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

CREATE TABLE `curriculum` (
  `ID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `LessonName` varchar(100) NOT NULL,
  `LessonDetails` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curriculum`
--

INSERT INTO `curriculum` (`ID`, `CourseID`, `LessonName`, `LessonDetails`) VALUES
(1, 2, 'Frere Jacques', 'Frere Jacques, Frere Jacques Dormez vous? Dormez vous? Sonnez les matines Sonnez les matines Din din don Din din don Are you sleeping? Are you sleeping? Brother John, Brother John Morning bells are ringing Morning bells are ringing Din dang dong Din dang dong'),
(2, 2, 'Dormer Vous', 'dfsfjksdlfjsdkl');

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
  `LeaveTime` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaving`
--

INSERT INTO `leaving` (`ID`, `AttendanceID`, `LeaveTime`) VALUES
(1, 1, '2018-03-11 18:34:28');

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
-- Table structure for table `ncomments`
--

CREATE TABLE `ncomments` (
  `comment_id` int(11) NOT NULL,
  `comment_text` text NOT NULL,
  `comment_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ncomments`
--

INSERT INTO `ncomments` (`comment_id`, `comment_text`, `comment_status`) VALUES
(15, 'Shaf33y', 1),
(16, 'Shaf3y', 1),
(17, 'shaf3y', 1),
(18, 'assas', 1),
(19, 'asdasd', 1),
(20, 'asdasd', 1),
(21, 'shaf3y', 1),
(22, 'Wala', 1),
(23, 'asads', 1),
(24, 'testing', 1),
(25, 'asdasd', 1),
(26, 'dasdasdasd', 1),
(27, 'gasgssafggas', 1),
(28, 'asggasgasgasg', 1),
(29, 'agssgasgasgasgsag', 1),
(30, 'agssgasgasgasgasg', 1),
(31, 'asggasgasgasgasgsagsg', 1),
(32, 'agsgasgasgasgasgasg', 1),
(33, 'agsgasgasgasgasdasdacas', 1),
(34, 'asdasdasdasdasdasgsagasgasg', 1),
(35, 'asdasdadds sadasdasd', 1),
(36, 'asdasdasgfasgasgasdads', 1),
(37, 'asdasdsadasdqwedqweqweqe', 1),
(38, 'asdasgasggsasgas', 1),
(39, 'asdasdassdasgasdasdsad', 1),
(40, 'asdasdw adsdasdas', 1),
(41, 'asdasdasdasdasdatgwew', 1),
(42, 'qweqwewqeqwe', 1),
(43, 'eqweqweqweqeeqwwqe', 1),
(44, 'eqwewqeqweqweqwe', 1),
(45, 'qweqweqweqweeq', 1),
(46, 'qweqweqweqwe', 1),
(47, 'asfasfssafsafsasfasass', 1),
(48, 'assssss', 1),
(49, 'aaa', 1),
(50, 'ffff', 1),
(51, 'qqqq', 1),
(52, 'asasassa', 1),
(53, 'she7ta', 1),
(54, 'SHe7tatito', 1),
(55, 'Hello', 1),
(56, 'Hello', 1),
(57, 'Hello', 1),
(58, 'Hello', 1),
(59, 'Hello', 1),
(60, 'Hello', 1),
(61, 'Hello', 1),
(62, 'Hello', 1),
(63, 'Hello', 1),
(64, 'Hello', 1),
(65, 'Bye', 1),
(66, 'Bye', 1),
(67, 'Bye', 1),
(68, 'Bye', 1),
(69, 'Bye', 1),
(70, 'Bye', 1),
(71, 'Bye', 1),
(72, 'Bye', 1),
(73, 'Bye', 1),
(74, 'Bye', 1),
(75, 'Bye', 1),
(76, 'Bye', 1),
(77, 'Bye', 1),
(78, 'Bye', 1),
(79, 'Bye', 1),
(80, 'Bye', 1),
(81, 'Bye', 1),
(82, 'Bye', 1),
(83, 'Bye', 1),
(84, 'Bye', 1),
(85, 'Bye', 1),
(86, 'Bye', 1),
(87, 'Bye', 1),
(88, 'Bye', 1),
(89, 'Bye', 1),
(90, 'Bye', 1),
(91, 'Bye', 1),
(92, 'Bye', 1),
(93, 'Bye', 1),
(94, 'Bye', 1),
(95, 'Bye', 1),
(96, 'Bye', 1),
(97, 'Bye', 1),
(98, 'Bye', 1),
(99, 'Bye', 1),
(100, 'Bye', 1),
(101, 'Bye', 1),
(102, 'Bye', 1),
(103, 'Bye', 1),
(104, 'Bye', 1),
(105, 'Bye', 1),
(106, 'Bye', 1),
(107, 'Bye', 1),
(108, 'Bye', 1),
(109, 'Bye', 1),
(110, 'Bye', 1),
(111, 'Bye', 1),
(112, 'Bye', 1),
(113, 'Bye', 1),
(114, 'Bye', 1),
(115, 'Bye', 1),
(116, 'Bye', 1),
(117, 'Bye', 1),
(118, 'Bye', 1),
(119, 'Bye', 1),
(120, 'Bye', 1),
(121, 'Bye', 1),
(122, 'Bye', 1),
(123, 'Bye', 1),
(124, 'Bye', 1),
(125, 'Bye', 1),
(126, 'Bye', 1),
(127, 'Bye', 1),
(128, 'Bye', 1),
(129, 'Bye', 1),
(130, 'Bye', 1),
(131, 'Bye', 1),
(132, 'Bye', 1),
(133, 'Bye', 1),
(134, 'Bye', 1),
(135, 'Bye', 1),
(136, 'Bye', 1),
(137, 'Bye', 1),
(138, 'Bye', 1),
(139, 'Bye', 1),
(140, 'Bye', 1),
(141, 'Bye', 1),
(142, 'Bye', 1),
(143, 'Bye', 1),
(144, 'Bye', 1),
(145, 'Bye', 1),
(146, 'Bye', 1),
(147, 'Bye', 1),
(148, 'Bye', 1),
(149, 'Bye', 1),
(150, 'Bye', 1),
(151, 'Bye', 1),
(152, 'Bye', 1),
(153, 'Bye', 1),
(154, 'Bye', 1),
(155, 'Bye', 1),
(156, 'Bye', 1),
(157, 'Bye', 1),
(158, 'Bye', 1),
(159, 'Bye', 1),
(160, 'Bye', 1),
(161, 'Bye', 1),
(162, 'Bye', 1),
(163, 'Bye', 1),
(164, 'Bye', 1),
(165, 'Bye', 1),
(166, 'Bye', 1),
(167, 'Bye', 1),
(168, 'Bye', 1),
(169, 'Bye', 1),
(170, 'Bye', 1),
(171, 'Bye', 1),
(172, 'Bye', 1),
(173, 'Bye', 1),
(174, 'Bye', 1),
(175, 'Bye', 1),
(176, 'Bye', 1),
(177, 'Bye', 1),
(178, 'Bye', 1),
(179, 'Bye', 1),
(180, 'Bye', 1),
(181, 'Bye', 1),
(182, 'Bye', 1),
(183, 'Bye', 1),
(184, 'Bye', 1),
(185, 'Bye', 1),
(186, 'Bye', 1),
(187, 'Bye', 1),
(188, 'Bye', 1),
(189, 'Bye', 1),
(190, 'Bye', 1),
(191, 'Bye', 1),
(192, 'Bye', 1),
(193, 'Bye', 1),
(194, 'Bye', 1),
(195, 'Bye', 1),
(196, 'Bye', 1),
(197, 'Bye', 1),
(198, 'Bye', 1),
(199, 'Bye', 1),
(200, 'Bye', 1),
(201, 'Bye', 1),
(202, 'Bye', 1),
(203, 'Bye', 1),
(204, 'Bye', 1),
(205, 'Bye', 1),
(206, 'Bye', 1),
(207, 'Bye', 1),
(208, 'Bye', 1),
(209, 'Bye', 1),
(210, 'Bye', 1),
(211, 'Bye', 1),
(212, 'Bye', 1),
(213, 'Bye', 1),
(214, 'Bye', 1),
(215, 'Bye', 1),
(216, 'Bye', 1),
(217, 'Bye', 1),
(218, 'Bye', 1),
(219, 'Bye', 1),
(220, 'Bye', 1),
(221, 'Bye', 1),
(222, 'Bye', 1),
(223, 'Bye', 1),
(224, 'Bye', 1),
(225, 'Bye', 1),
(226, 'Bye', 1),
(227, 'Bye', 1),
(228, 'Bye', 1),
(229, 'Bye', 1),
(230, 'Bye', 1),
(231, 'Bye', 1),
(232, 'Bye', 1),
(233, 'Bye', 1),
(234, 'Bye', 1),
(235, 'Bye', 1),
(236, 'Bye', 1),
(237, 'Bye', 1),
(238, 'Bye', 1),
(239, 'Bye', 1),
(240, 'Bye', 1),
(241, 'Bye', 1),
(242, 'Bye', 1),
(243, 'Bye', 1),
(244, 'Bye', 1),
(245, 'Bye', 1),
(246, 'Bye', 1),
(247, 'Bye', 1),
(248, 'Bye', 1),
(249, 'Bye', 1),
(250, 'Bye', 1),
(251, 'Bye', 1),
(252, 'Bye', 1),
(253, 'Bye', 1),
(254, 'Bye', 1),
(255, 'Bye', 1),
(256, 'Bye', 1),
(257, 'Bye', 1),
(258, 'Bye', 1),
(259, 'Bye', 1),
(260, 'Bye', 1),
(261, 'Bye', 1),
(262, 'Bye', 1),
(263, 'Bye', 1),
(264, 'Bye', 1),
(265, 'Bye', 1),
(266, 'Bye', 1),
(267, 'Bye', 1),
(268, 'Bye', 1),
(269, 'Bye', 1),
(270, 'Bye', 1),
(271, 'Bye', 1),
(272, 'Bye', 1),
(273, 'Bye', 1),
(274, 'Bye', 1),
(275, 'Bye', 1),
(276, 'Bye', 1),
(277, 'Bye', 1),
(278, 'Bye', 1),
(279, 'Bye', 1),
(280, 'Bye', 1),
(281, 'Bye', 1),
(282, 'Bye', 1),
(283, 'Bye', 1),
(284, 'Bye', 1),
(285, 'Bye', 1),
(286, 'Bye', 1),
(287, 'Bye', 1),
(288, 'Bye', 1),
(289, 'Bye', 1),
(290, 'Bye', 1),
(291, 'Bye', 1),
(292, 'Bye', 1),
(293, 'Bye', 1),
(294, 'Bye', 1),
(295, 'Bye', 1),
(296, 'Bye', 1),
(297, 'Bye', 1),
(298, 'Bye', 1),
(299, 'Bye', 1),
(300, 'Bye', 1),
(301, 'Bye', 1),
(302, 'Bye', 1),
(303, 'Bye', 1),
(304, 'Bye', 1),
(305, 'Bye', 1),
(306, 'Bye', 1),
(307, 'Bye', 1),
(308, 'Bye', 1),
(309, 'Bye', 1),
(310, 'Bye', 1),
(311, 'Bye', 1),
(312, 'Bye', 1),
(313, 'Bye', 1),
(314, 'Bye', 1),
(315, 'Bye', 1),
(316, 'Shokran', 1),
(317, 'Shokran', 1),
(318, 'Shokran', 1),
(319, 'Shokran', 1),
(320, 'Shokran', 1),
(321, 'Shokran', 1),
(322, 'Shokran', 1),
(323, 'Shokran', 1),
(324, 'Shokran', 1),
(325, 'Shokran', 1),
(326, 'Shokran', 1),
(327, 'Shokran', 1),
(328, 'Shokran', 1),
(329, 'Shokran', 1),
(330, 'Shokran', 1),
(331, 'Shokran', 1),
(332, 'Shokran', 1),
(333, 'Shokran', 1),
(334, 'Shokran', 1),
(335, 'Shokran', 1),
(336, 'Shokran', 1),
(337, 'Shokran', 1),
(338, 'Shokran', 1),
(339, 'Shokran', 1),
(340, 'Shokran', 1),
(341, 'Shokran', 1),
(342, 'Shokran', 1),
(343, 'Shokran', 1),
(344, 'Shokran', 1),
(345, 'Shokran', 1),
(346, 'Shokran', 1),
(347, 'Shokran', 1),
(348, 'Shokran', 1),
(349, 'Shokran', 1),
(350, 'Shokran', 1),
(351, 'Shokran', 1),
(352, 'Shokran', 1),
(353, 'Shokran', 1),
(354, 'Shokran', 1),
(355, 'Shokran', 1),
(356, 'Shokran', 1),
(357, 'Shokran', 1),
(358, 'Shokran', 1),
(359, 'Shokran', 1),
(360, 'Shokran', 1),
(361, 'Shokran', 1),
(362, 'Shokran', 1),
(363, 'Shokran', 1),
(364, 'Shokran', 1),
(365, 'Shokran', 1),
(366, 'Shokran', 1),
(367, 'Shokran', 1),
(368, 'Shokran', 1),
(369, 'Shokran', 1),
(370, 'Shokran', 1),
(371, 'Shokran', 1),
(372, 'Shokran', 1),
(373, 'Shokran', 1),
(374, 'Shokran', 1),
(375, 'Shokran', 1),
(376, 'Shokran', 1),
(377, 'Shokran', 1),
(378, 'Shokran', 1),
(379, 'Shokran', 1),
(380, 'Shokran', 1),
(381, 'Shokran', 1),
(382, 'Shokran', 1),
(383, 'Shokran', 1),
(384, 'Shokran', 1),
(385, 'Shokran', 1),
(386, 'Shokran', 1),
(387, 'Shokran', 1),
(388, 'Shokran', 1),
(389, 'Shokran', 1),
(390, 'Shokran', 1),
(391, 'Shokran', 1),
(392, 'Shokran', 1),
(393, 'Shokran', 1),
(394, 'Shokran', 1),
(395, 'Shokran', 1),
(396, 'Shokran', 1),
(397, 'Shokran', 1),
(398, 'Shokran', 1),
(399, 'Shokran', 1),
(400, 'Shokran', 1),
(401, 'Shokran', 1),
(402, 'Shokran', 1),
(403, 'Shokran', 1),
(404, 'Shokran', 1),
(405, 'Shokran', 1),
(406, 'Shokran', 1),
(407, 'Shokran', 1),
(408, 'Shokran', 1),
(409, 'Shokran', 1),
(410, 'Shokran', 1),
(411, 'Shokran', 1),
(412, 'Shokran', 1),
(413, 'Shokran', 1),
(414, 'Shokran', 1),
(415, 'Shokran', 1),
(416, 'Shokran', 1),
(417, 'Shokran', 1),
(418, 'Shokran', 1),
(419, 'Shokran', 1),
(420, 'Shokran', 1),
(421, 'Shokran', 1),
(422, 'Shokran', 1),
(423, 'Shokran', 1),
(424, 'Shokran', 1),
(425, 'Shokran', 1),
(426, 'Shokran', 1),
(427, 'Shokran', 1),
(428, 'Shokran', 1),
(429, 'Shokran', 1),
(430, 'Shokran', 1),
(431, 'Shokran', 1),
(432, 'Shokran', 1),
(433, 'Shokran', 1),
(434, 'Shokran', 1),
(435, 'Shokran', 1),
(436, 'Shokran', 1),
(437, 'Shokran', 1),
(438, 'Shokran', 1),
(439, 'Shokran', 1),
(440, 'Shokran', 1),
(441, 'Shokran', 1),
(442, 'Shokran', 1),
(443, 'Shokran', 1),
(444, 'Shokran', 1),
(445, 'Shokran', 1),
(446, 'Shokran', 1),
(447, 'Shokran', 1),
(448, 'Shokran', 1),
(449, 'Shokran', 1),
(450, 'Shokran', 1),
(451, 'Shokran', 1),
(452, 'Shokran', 1),
(453, 'Shokran', 1),
(454, 'Shokran', 1),
(455, 'Shokran', 1),
(456, 'Shokran', 1),
(457, 'Shokran', 1),
(458, 'Shokran', 1),
(459, 'Shokran', 1),
(460, 'Shokran', 1),
(461, 'Shokran', 1),
(462, 'Shokran', 1),
(463, 'Shokran', 1),
(464, 'Shokran', 1),
(465, 'Shokran', 1),
(466, 'Shokran', 1),
(467, 'Shokran', 1),
(468, 'Shokran', 1),
(469, 'Shokran', 1),
(470, 'Shokran', 1),
(471, 'Shokran', 1),
(472, 'Shokran', 1),
(473, 'Shokran', 1),
(474, 'Shokran', 1),
(475, 'Shokran', 1),
(476, 'Shokran', 1),
(477, 'Shokran', 1),
(478, 'Shokran', 1),
(479, 'Shokran', 1),
(480, 'Shokran', 1),
(481, 'Shokran', 1),
(482, 'Shokran', 1),
(483, 'Shokran', 1),
(484, 'Shokran', 1),
(485, 'Shokran', 1),
(486, 'Shokran', 1),
(487, 'Shokran', 1),
(488, 'Shokran', 1),
(489, 'Shokran', 1),
(490, 'Shokran', 1),
(491, 'Shokran', 1),
(492, 'Shokran', 1),
(493, 'Shokran', 1),
(494, 'Shokran', 1),
(495, 'Shokran', 1),
(496, 'Shokran', 1),
(497, 'Shokran', 1),
(498, 'Shokran', 1),
(499, 'Shokran', 1),
(500, 'Shokran', 1),
(501, 'Shokran', 1),
(502, 'Shokran', 1),
(503, 'Shokran', 1),
(504, 'Shokran', 1),
(505, 'Shokran', 1),
(506, 'Shokran', 1),
(507, 'Shokran', 1),
(508, 'Shokran', 1),
(509, 'Shokran', 1),
(510, 'Shokran', 1),
(511, 'Shokran', 1),
(512, 'Shokran', 1),
(513, 'Shokran', 1),
(514, 'Shokran', 1),
(515, 'Shokran', 1),
(516, 'Shokran', 1),
(517, 'Shokran', 1),
(518, 'Shokran', 1),
(519, 'Shokran', 1),
(520, 'Shokran', 1),
(521, 'Shokran', 1),
(522, 'Shokran', 1),
(523, 'Shokran', 1),
(524, 'Shokran', 1),
(525, 'Shokran', 1),
(526, 'Shokran', 1),
(527, 'Shokran', 1),
(528, 'Shokran', 1),
(529, 'Shokran', 1),
(530, 'Shokran', 1),
(531, 'Shokran', 1),
(532, 'Shokran', 1),
(533, 'Shokran', 1),
(534, 'Shokran', 1),
(535, 'Shokran', 1),
(536, 'Shokran', 1),
(537, 'Shokran', 1),
(538, 'Shokran', 1),
(539, 'Shokran', 1),
(540, 'Shokran', 1),
(541, 'Shokran', 1),
(542, 'Shokran', 1),
(543, 'Shokran', 1),
(544, 'Shokran', 1),
(545, 'Shokran', 1),
(546, 'Shokran', 1),
(547, 'Shokran', 1),
(548, 'Shokran', 1),
(549, 'Shokran', 1),
(550, 'Shokran', 1),
(551, 'Shokran', 1),
(552, 'Shokran', 1),
(553, 'Shokran', 1),
(554, 'Shokran', 1),
(555, 'Shokran', 1),
(556, 'Shokran', 1),
(557, 'Shokran', 1),
(558, 'Shokran', 1),
(559, 'Shokran', 1),
(560, 'Shokran', 1),
(561, 'Shokran', 1),
(562, 'Shokran', 1),
(563, 'Shokran', 1),
(564, 'Shokran', 1),
(565, 'Shokran', 1),
(566, 'Shokran', 1),
(567, 'Shokran', 1),
(568, 'Shokran', 1),
(569, 'Shokran', 1),
(570, 'Shokran', 1),
(571, 'Shokran', 1),
(572, 'Shokran', 1),
(573, 'Shokran', 1),
(574, 'Shokran', 1),
(575, 'Shokran', 1),
(576, 'Shokran', 1),
(577, 'Shokran', 1),
(578, 'Hellos', 1),
(579, 'asdasdasd', 1),
(580, 'Johnsadsasd', 1),
(581, 'Johan Libert', 1),
(582, 'dcdavid', 1),
(583, 'Andro', 1);

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
(2, 'Child', '../php/ChildFirst.php'),
(3, 'Driver', '../php/Dashboard.php'),
(4, 'Teacher', '../php/TeacherFirst.php');

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
  `Rating` int(11) NOT NULL,
  `Date` date NOT NULL
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
(9, 2, 1, '2018-04-29 19:26:45', 5),
(10, 2, 1, '2018-05-11 18:03:02', 5),
(11, 2, 1, '2018-05-11 18:03:44', 5),
(12, 2, 1, '2018-05-11 18:09:07', 1),
(13, 4, 1, '2018-05-12 11:42:16', 1),
(14, 4, 1, '2018-05-13 01:59:38', 5);

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
(2, 6, 1),
(3, 8, 1),
(4, 9, 1),
(5, 12, 1);

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
(5, 'Missing Login'),
(7, 'new'),
(8, 'Unavailable');

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
(1, 25, 20, 30, 1, 8),
(2, 1000, 20, 10, 3, 8);

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
  ADD UNIQUE KEY `UserID` (`UserID`,`DaysID`,`TimeslotsID`),
  ADD UNIQUE KEY `UC_Person1` (`UserID`,`TimeslotsID`,`DaysID`),
  ADD KEY `k2` (`CourseID`),
  ADD KEY `k3` (`ClassID`),
  ADD KEY `k4` (`DaysID`),
  ADD KEY `k5` (`TimeslotsID`);

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
-- Indexes for table `ncomments`
--
ALTER TABLE `ncomments`
  ADD PRIMARY KEY (`comment_id`);

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
  ADD UNIQUE KEY `UC_Person` (`UserID`,`CurriculumID`),
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
-- AUTO_INCREMENT for table `ncomments`
--
ALTER TABLE `ncomments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=584;
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `useractivities`
--
ALTER TABLE `useractivities`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `userclasscourse`
--
ALTER TABLE `userclasscourse`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  ADD CONSTRAINT `k1` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `k2` FOREIGN KEY (`CourseID`) REFERENCES `course` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `k3` FOREIGN KEY (`ClassID`) REFERENCES `class` (`ID`),
  ADD CONSTRAINT `k4` FOREIGN KEY (`DaysID`) REFERENCES `days` (`ID`),
  ADD CONSTRAINT `k5` FOREIGN KEY (`TimeslotsID`) REFERENCES `timeslots` (`ID`);

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
