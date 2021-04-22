DROP DATABASE IF EXISTS library;  
CREATE DATABASE library;
-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2015 at 10:29 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12
USE library;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE TABLE IF NOT EXISTS `author` (
  `ISBN` char(14) NOT NULL,
  `Author` varchar(50) NOT NULL,
  PRIMARY KEY (`ISBN`,`Author`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `author`

INSERT INTO `author` (`ISBN`, `Author`) VALUES
/*('0123704901', 'David A. Patterson'),
('0123704901', 'John L. Hennessy'),
('0123944244', 'David Harris'),
('0123944244', 'Sarah Harris'),
('0124077269', 'David A. Patterson'),
('0124077269', 'John L. Hennessy'),
('0205973361', 'J. Noland White'),
('0205973361', 'Saundra K. Ciccarelli'),
('0321696867', 'Hugh D. Young'),
('0321696867', 'Roger A. Freedman'),
('0321740904', 'Randall D. Knight'),
('0321884078', 'George B. Thomas Jr'),
('0321884078', 'Joel R. Hass'),
('0321884078', 'Maurice D. Weir'),
('0470879521', 'John D. Cutnell'),
('0470879521', 'Kenneth W. Johnson'),
('0596802358', 'Philipp K. Janert'),
('099040207X', 'Mr. Martin Holzke'),
('099040207X', 'Mr. Tom Stachowitz'),
('1285057090', 'Bruce H. Edwards'),
('1285057090', 'Ron Larson'),
('1429237198', 'Daniel L. Schacter'),
('1429237198', 'Daniel T. Gilbert'),
('1429261781', 'David G. Myers'),
('1449600069', 'Julia Lobur'),
('1449600069', 'Linda Null'),
('1452257876', 'A. Michael Huberman'),
('1452257876', 'Matthew B. Miles'),
('1590597699', 'Clare Churcher');*/
('9789350195611', 'Amit Garg'),
('9789380674322', 'Lalit Kumar'),
('9789380674322', 'Sharad Kumar Verma'),
('9789351633891', 'Sharad Kumar Verma'),
('0590453661', 'R. L. Stine'),
('9789243212512', 'Balaguru'),
('9789243212512', 'Swamy'),
('9789243634343', 'Willian Harrison');


CREATE TABLE IF NOT EXISTS `book` (
  `ISBN` char(14) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Cost` decimal(5,2) NOT NULL,
  `IsReserved` tinyint(1) NOT NULL,
  `Edition` int(11) NOT NULL,
  `PubliPlace` varchar(30) DEFAULT NULL,
  `Publisher` varchar(30) NOT NULL,
  `CopyYr` decimal(4,0) NOT NULL,
  `ShelfID` int(11) DEFAULT NULL,
  `SubName` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `book`

INSERT INTO `book` (`ISBN`, `Title`, `Cost`, `IsReserved`, `Edition`, `PubliPlace`, `Publisher`, `CopyYr`, `ShelfID`, `SubName`) VALUES
/*('0123704901', 'Computer Architecture: A Quantitative Approach', '24.95', 0, 4, 'US', 'Morgan Kaufmann', '2006', 321, 'Computer Architecture'),
('0123944244', 'Digital Design and Computer Architecture', '52.57', 0, 2, 'US', 'Morgan Kaufmann', '2012', 311, 'Computer Architecture'),
('0124077269', 'Computer Organization and Design', '75.74', 0, 5, 'US', 'Morgan Kaufmann', '2013', 312, 'Computer Architecture'),
('0205973361', 'Psychology', '158.53', 0, 4, '', 'Pearson', '2014', 232, 'Psychology'),
('0321696867', 'University Physics with Modern Physics', '225.76', 0, 13, 'UK', 'Addison-Wesley', '2011', 211, 'Physics'),
('0321740904', 'Physics for Scientists and Engineers: A Strategic Approach with Modern Physics', '228.16', 1, 3, 'US', 'Addison-Wesley', '2012', 212, 'Physics'),
('0321884078', 'Thomas'' Calculus: Early Transcendentals', '198.89', 0, 13, '', 'Pearson', '2013', 111, 'Calculus'),
('0470879521', 'Physics', '209.38', 0, 9, '', 'John Wiley and Sons', '2012', 212, 'Physics'),
('0596802358', 'Data Analysis with Open Source Tools', '26.69', 0, 1, 'US', 'O''Reilly Media', '2010', 131, 'Data Science'),
('099040207X', 'SQL Database for Beginners', '22.49', 0, 1, '', 'LearnToProgram, Incorporated ', '2014', 121, 'Data Science'),
('1285057090', 'Calculus', '245.84', 1, 10, 'US', 'Cengage Learning', '2013', 112, 'Calculus'),
('1429237198', 'Psychology ', '159.48', 1, 2, '', 'Worth Publishers', '2010', 231, 'Psychology'),
('1429261781', 'Psychology', '152.54', 0, 10, '', 'Worth Publishers', '2011', 222, 'Psychology'),
('1449600069', 'The Essentials of Computer Organization and Architecture', '215.95', 0, 3, '', 'Jones & Bartlett Learning', '2010', 322, 'Computer Architecture'),
('1452257876', 'Qualitative Data Analysis: A Methods Sourcebook', '72.42', 0, 3, 'US', 'SAGE Publications, Inc', '2013', 132, 'Data Science'),
('1590597699', 'Beginning Database Design: From Novice to Professional ', '25.82', 0, 1, 'US', 'Apress', '2007', 122, 'Data Science');*/
('9789350195611', 'Junior Level Books Introduction to Computer', '240.95', 0, 4, 'India', 'Readers Zone', '2011', 321, 'Computer Architecture'),
('9789380674322', 'Client Server Computing', '520.57', 0, 2, 'US', 'Sun India Publications', '2012', 311, 'Computer Architecture'),
('9789351633891', 'Data Structure Using C', '750.74', 0, 5, 'India', 'Thakur Publications Lucknow', '2015', 312, 'Computer Architecture'),
('0590453661', 'Fluid Mechanics', '250.82', 0, 1, 'US', 'Scholastic Incorporated', '1992', 122, 'Physics'),
('9789243212512', 'DSA Questions for Placement', '1000', 1, 10, 'India', 'Pearson', '2001', 222, 'Data Structures' ),
('9789243634343', 'Heat Transfer', '500', 0, 2, 'US', 'Willey', '2017', 213, 'Physics');

CREATE TABLE IF NOT EXISTS `bookcopy` (
  `ISBN` char(14) NOT NULL,
  `CopyID` int(11) NOT NULL,
  `IsChecked` tinyint(1) NOT NULL DEFAULT '0',
  `IsHold` tinyint(1) NOT NULL DEFAULT '0',
  `IsDamaged` tinyint(1) NOT NULL DEFAULT '0',
  `FuRequester` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`ISBN`,`CopyID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `bookcopy`

INSERT INTO `bookcopy` (`ISBN`, `CopyID`, `IsChecked`, `IsHold`, `IsDamaged`, `FuRequester`) VALUES
/*('0123704901', 1, 1, 0, 0, 'ywu'),
('0123704901', 2, 0, 0, 1, NULL),
('0123704901', 3, 0, 1, 0, 'hsun'),
('0123944244', 1, 1, 0, 0, NULL),
('0123944244', 2, 0, 1, 0, NULL),
('0124077269', 1, 1, 0, 0, NULL),
('0124077269', 2, 0, 1, 0, NULL),
('0124077269', 3, 0, 1, 0, NULL),
('0124077269', 4, 0, 0, 1, NULL),
('0124077269', 5, 0, 0, 0, NULL),
('0124077269', 6, 0, 0, 0, NULL),
('0124077269', 7, 0, 0, 1, NULL),
('0205973361', 1, 1, 0, 0, NULL),
('0205973361', 2, 0, 1, 0, NULL),
('0205973361', 3, 0, 0, 0, NULL),
('0321696867', 1, 0, 0, 0, NULL),
('0321696867', 2, 0, 0, 0, NULL),
('0321696867', 3, 0, 0, 0, NULL),
('0321696867', 4, 0, 0, 0, NULL),
('0321740904', 1, 0, 0, 1, NULL),
('0321740904', 2, 0, 0, 0, NULL),
('0321740904', 3, 0, 0, 0, NULL),
('0321740904', 4, 0, 0, 0, NULL),
('0321740904', 5, 0, 0, 1, NULL),
('0321740904', 6, 0, 0, 0, NULL),
('0321740904', 7, 0, 0, 0, NULL),
('0321884078', 1, 1, 0, 0, 'ediao'),
('0470879521', 1, 0, 0, 1, NULL),
('0470879521', 2, 0, 1, 0, NULL),
('0470879521', 3, 0, 0, 0, NULL),
('0470879521', 4, 0, 0, 0, NULL),
('0470879521', 5, 0, 0, 0, NULL),
('0470879521', 6, 0, 0, 0, NULL),
('0470879521', 7, 0, 0, 0, NULL),
('0596802358', 1, 0, 1, 0, NULL),
('0596802358', 2, 0, 0, 0, NULL),
('099040207X', 1, 1, 0, 0, 'apiper'),
('099040207X', 2, 0, 1, 0, 'nbatts'),
('099040207X', 3, 0, 0, 1, NULL),
('1285057090', 1, 0, 0, 0, NULL),
('1429237198', 1, 0, 0, 1, NULL),
('1429237198', 2, 0, 0, 0, NULL),
('1429237198', 3, 0, 0, 0, NULL),
('1429261781', 1, 1, 0, 0, NULL),
('1429261781', 2, 0, 0, 0, NULL),
('1449600069', 1, 0, 1, 0, NULL),
('1449600069', 2, 0, 0, 0, NULL),
('1449600069', 3, 0, 0, 1, NULL),
('1452257876', 1, 1, 0, 0, NULL),
('1452257876', 2, 0, 0, 1, NULL),
('1452257876', 3, 0, 0, 0, NULL),
('1452257876', 4, 0, 0, 0, NULL),
('1590597699', 1, 1, 0, 0, NULL);*/
('9789350195611',  1, 1, 0, 0, 'shrey'),
('9789380674322', 1, 1, 0, 0, NULL),
('9789380674322',  2, 0, 0, 1, NULL),
('9789351633891', 1, 0, 1, 0, 'drashti'),
('0590453661', 1, 1, 0, 0, NULL),
('9789243212512', 1, 0 , 0, 0, NULL),
('9789243212512', 2, 0 , 0, 0, NULL),
('9789243212512', 3, 0 , 0, 0, NULL),
('9789243212512', 4, 0 , 0, 0, NULL),
('9789243634343', 1, 0 , 0, 0, NULL),
('9789243634343', 2, 0 , 0, 0, NULL),
('9789243634343', 3, 0 , 0, 0, NULL);

CREATE TABLE IF NOT EXISTS `floor` (
  `FloorID` int(11) NOT NULL,
  PRIMARY KEY (`FloorID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `floor`

INSERT INTO `floor` (`FloorID`) VALUES
(1),
(2),
(3);

CREATE TABLE IF NOT EXISTS `issue` (
  `Username` varchar(15) NOT NULL,
  `ISBN` char(14) NOT NULL,
  `CopyID` int(11) NOT NULL,
  `IssueID` int(4) NOT NULL,
  `ExtenDate` date DEFAULT NULL,
  `IssueDate` date NOT NULL,
  `ReturnDate` date NOT NULL,
  `NumExten` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Username`,`ISBN`,`CopyID`),
  UNIQUE KEY `IssueID` (`IssueID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `issue`

INSERT INTO `issue` (`Username`, `ISBN`, `CopyID`, `IssueID`, `ExtenDate`, `IssueDate`, `ReturnDate`, `NumExten`) VALUES
/*('aclark', '0124077269', 1, 115, '2015-04-13', '2015-03-31', '2015-04-27', 1),
('ahart', '0123704901', 1, 45, '2015-01-03', '2015-01-03', '2015-01-17', 0),
('ahart', '0123704901', 3, 150, NULL, '2015-04-19', '2015-05-03', 0),
('ahart', '0124077269', 7, 82, '2015-02-05', '2015-02-05', '2015-02-19', 0),
('apiper', '0124077269', 2, 143, NULL, '2015-04-18', '2015-05-02', 0),
('apiper', '0321696867', 1, 64, '2015-01-12', '2015-01-12', '2015-01-26', 0),
('bturner', '0124077269', 3, 169, NULL, '2015-04-20', '2015-05-04', 0),
('bturner', '0321884078', 1, 119, '2015-04-07', '2015-04-07', '2015-04-21', 0),
('cbenson', '1452257876', 1, 116, '2015-04-15', '2015-04-11', '2015-04-29', 1),
('ediao', '0124077269', 1, 74, '2015-02-10', '2015-02-10', '2015-02-24', 0),
('ediao', '0321696867', 1, 89, '2015-02-10', '2015-02-10', '2015-02-24', 0),
('ediao', '099040207X', 2, 148, NULL, '2015-04-16', '2015-04-30', 0),
('gkimberly', '0123704901', 1, 85, '2015-03-03', '2015-03-03', '2015-03-17', 0),
('gkimberly', '0596802358', 1, 177, NULL, '2015-04-20', '2015-05-04', 0),
('gstarr', '0124077269', 2, 73, '2015-01-05', '2015-01-05', '2015-01-19', 0),
('hclifton', '0205973361', 2, 166, NULL, '2015-04-21', '2015-05-05', 0),
('hclifton', '0470879521', 2, 120, NULL, '2015-04-17', '2015-05-01', 0),
('hclifton', '099040207X', 3, 52, '2015-01-11', '2015-01-11', '2015-01-25', 0),
('hsun', '0123704901', 3, 47, '2015-01-05', '2015-01-05', '2015-01-19', 0),
('hsun', '1449600069', 1, 157, NULL, '2015-04-20', '2015-05-04', 0),
('hsun', '1590597699', 1, 72, '2015-02-03', '2015-02-03', '2015-02-17', 0),
('kburns', '0123944244', 1, 61, '2015-01-25', '2015-01-25', '2015-02-09', 0),
('kburns', '0321696867', 2, 54, '2015-01-19', '2015-01-16', '2015-02-03', 1),
('kburns', '099040207X', 1, 117, '2015-04-15', '2015-04-15', '2015-04-29', 0),
('kburns', '1429261781', 1, 111, '2015-04-19', '2015-04-14', '2015-05-03', 1),
('kburns', '1429261781', 2, 88, '2015-03-15', '2015-03-15', '2015-03-29', 0),
('lnarang', '0123944244', 1, 79, '2015-02-11', '2015-02-04', '2015-02-25', 1),
('lnarang', '099040207X', 2, 53, '2015-01-12', '2015-01-12', '2015-01-26', 0),
('lnarang', '1429261781', 1, 75, '2015-03-05', '2015-02-05', '2015-02-26', 2),
('lnoel', '0123704901', 2, 44, '2015-01-01', '2015-01-01', '2015-01-05', 0),
('lnoel', '1590597699', 1, 114, '2015-04-21', '2015-04-14', '2015-05-05', 1),
('nbatts', '0123704901', 2, 65, '2015-01-01', '2015-01-01', '2015-01-15', 0),
('nbatts', '0123944244', 2, 94, '2015-03-30', '2015-03-21', '2015-04-14', 1),
('sgarner', '0124077269', 6, 81, '2015-02-12', '2015-02-12', '2015-02-26', 0),
('sgarner', '0205973361', 1, 112, '2015-04-13', '2015-04-01', '2015-04-27', 1),
('ssong', '0123944244', 2, 184, NULL, '2015-04-21', '2015-05-05', 0),
('ssong', '099040207X', 2, 83, '2015-02-11', '2015-02-11', '2015-02-25', 0),
('thwang', '0205973361', 2, 90, '2015-03-10', '2015-03-10', '2013-03-24', 0),
('thwang', '0470879521', 4, 78, '2015-02-03', '2015-02-03', '2015-02-17', 0),
('ywu', '0123944244', 1, 118, '2015-04-12', '2015-04-12', '2015-04-26', 0);*/
('drashti','9789350195611', 1, 100,'2021-01-03', '2021-01-01', '2021-01-17', 1), 
('raj','9789380674322', 2, 101, '2021-02-13', '2021-01-31', '2021-02-17', 2),
('yash','9789351633891', 1, 102, NULL, '2021-02-02', '2021-02-16', 0), 
('shrey','9789380674322', 1, 103, '2021-02-05', '2021-02-02', '2020-02-19', 1),
('hirak','0590453661', 1, 104, NULL, '2021-02-05', '2021-02-19', 0);

CREATE TABLE IF NOT EXISTS `shelf` (
  `ShelfID` int(11) NOT NULL,
  `FloorID` int(11) NOT NULL,
  `AisleID` int(11) NOT NULL,
  PRIMARY KEY (`ShelfID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `shelf`

INSERT INTO `shelf` (`ShelfID`, `FloorID`, `AisleID`) VALUES
(111, 1, 11), (112, 1, 11), (113, 1, 11), (114, 1, 11), (115, 1, 11), (116, 1, 11), (117, 1, 11), (118, 1, 11), (119, 1, 11), (120, 1, 11),
(121, 1, 12), (122, 1, 12), (123, 1, 12), (124, 1, 12), (125, 1, 12), (126, 1, 12), (127, 1, 12), (128, 1, 12), (129, 1, 12), (130, 1, 12), 
(131, 1, 13), (132, 1, 13), (133, 1, 13), (134, 1, 13), (135, 1, 13), (136, 1, 13), (137, 1, 13), (138, 1, 13), (139, 1, 13), (140, 1, 13),
(211, 2, 21), (212, 2, 21), (213, 2, 21), (214, 2, 21), (215, 2, 21), (216, 2, 21), (217, 2, 21), (218, 2, 21), (219, 2, 21), (220, 2, 21),
(221, 2, 22), (222, 2, 22), (223, 2, 22), (224, 2, 22), (225, 2, 22), (226, 2, 22), (227, 2, 22), (228, 2, 22), (229, 2, 22), (230, 2, 22), 
(231, 2, 23), (232, 2, 23), (233, 2, 23), (234, 2, 23), (235, 2, 23), (236, 2, 23), (237, 2, 23), (238, 2, 23), (239, 2, 23), (240, 2, 23),
(311, 3, 31), (312, 3, 31), (313, 3, 31), (314, 3, 31), (315, 3, 31), (316, 3, 31), (317, 3, 31), (318, 3, 31), (319, 3, 31), (320, 3, 31),
(321, 3, 32), (322, 3, 32), (323, 3, 32), (324, 3, 32), (325, 3, 32), (326, 3, 32), (327, 3, 32), (328, 3, 32), (329, 3, 32), (330, 3, 32), 
(331, 3, 33), (332, 3, 33), (333, 3, 33), (334, 3, 33), (335, 3, 33), (336, 3, 33), (337, 3, 33), (338, 3, 33), (339, 3, 33), (340, 3, 33);

CREATE TABLE IF NOT EXISTS `staff` (
  `Username` varchar(15) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `staff`

INSERT INTO `staff` (`Username`) VALUES
/*('admin'),
('mross');*/
('admin');

CREATE TABLE IF NOT EXISTS `student_faculty` (
  `Username` varchar(15) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `DOB` date DEFAULT NULL,
  `Email` varchar(30) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Address` varchar(50) DEFAULT NULL,
  `IsFaculty` tinyint(1) NOT NULL,
  `Penalty` decimal(5,2) NOT NULL DEFAULT '0.00',
  `Dept` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `student_faculty`

INSERT INTO `student_faculty` (`Username`, `Name`, `DOB`, `Email`, `Gender`, `Address`, `IsFaculty`, `Penalty`, `Dept`) VALUES
/*('aclark', 'Anne Clark', '1975-04-19', 'aclark@gatech.edu', 'F', '801 Atlantic Dr NW, Atlanta, GA', 1, '0.00', 'College of Computing'),
('ahart', 'Annis Hart', '1987-06-12', 'ahart@gatech.edu', 'F', '209 Oak Street, Dacula, GA', 0, '5.00', NULL),
('amoore', 'Alice Moore', NULL, 'amoore@gatech.edu', 'F', '435 Williams St, Duluth, GA', 0, '0.00', NULL),
('apiper', 'Agustina Piper', '1995-07-09', 'apiper@gatech.edu', 'F', NULL, 0, '0.00', NULL),
('bturner', 'Buck Turner', '1970-11-12', 'bturner@gatech.edu', 'M', '777 Atlantic Drive, Atlanta, GA', 1, '0.00', 'School of Electrical & Computer Engineering'),
('cbenson', 'Carol Benson', '1975-03-21', 'cbenson@gatech.edu', 'M', '801 Atlantic Dr NW, Atlanta, GA', 1, '0.00', 'College of Computing'),
('ediao', 'Enmao Diao', NULL, 'ediao@gatech.edu', 'M', NULL, 0, '0.00', NULL),
('gkimberly', 'Geraldo Kimberly', '1987-09-03', 'gkimberly@gatech.edu', 'M', NULL, 0, '0.00', NULL),
('gmat', 'Gene Mat', '1989-03-25', 'gmat@gatech.edu', 'M', '250 Union Street, Stone Mountain, GA', 0, '110.00', NULL),
('gstarr', 'Gordon Starr', '1989-03-04', 'gstarr@gatech.edu', 'M', NULL, 0, '0.00', NULL),
('hclifton', 'Harriet Clifton', '1965-09-08', 'hclifton@gatech.edu', 'F', '755 Ferst Drive, NW, Atlanta, GA', 1, '12.00', 'School of Industrial & Systems Engineering'),
('hsun', 'Haitian Sun', NULL, 'hsun@gatech.edu', 'M', NULL, 0, '0.00', NULL),
('kburns', 'Katey Burns', '1984-02-28', 'kburns@gatech.edu', 'F', '15 Water Street, Jacksonville Beach, FL', 0, '40.00', NULL),
('kwalls', 'Kathy Walls', '1986-06-12', 'kwalls@gatech.edu', 'F', '48 Bank Street Roswell, Atlanta, GA ', 0, '140.00', NULL),
('lnarang', 'Lina Narang', '1985-08-15', 'lnarang@gatech.edu', 'F', '950 Marietta St NW, Atlanta, GA ', 0, '30.00', NULL),
('lnoel', 'Lazare Noel', '1988-12-10', 'lnoel@gatech.edu', 'M', NULL, 0, '5.10', NULL),
('mross', 'Michael Ross', '1991-10-01', 'mross@gatech.edu', 'M', '282 Sycamore Drive, Hephzibah, GA', 0, '31.20', NULL),
('nbatts', 'Norman Batts', '1992-02-09', 'nbatts@gatech.edu', 'M', NULL, 0, '0.00', NULL),
('sgarner', 'Sheard Garner', '1969-05-30', 'sgarner@gatech.edu', 'M', '777 Atlantic Drive, Atlanta, GA', 1, '35.50', 'School of Electrical & Computer Engineering'),
('ssong', 'Seok Song', '1992-07-05', 'ssong@gatech.edu', 'M', '470 16th St, Atlanta, GA', 0, '0.00', NULL),
('thwang', 'Tiffany Hwang', '1989-08-01', 'thwang@gatech.edu', 'F', '942 Union Street, Stone Mountain, GA', 0, '0.00', NULL),
('ywu', 'Yuxiao Wu', '1993-07-01', 'ywu@gatech.edu', 'F', '935 Marietta St NW, Atlanta, GA', 0, '0.00', NULL),
('zhui', 'Hui Zan', '1995-05-03', 'zhui@gatech.edu', 'M', '350 Ferst Drive, NW, Atlanta, GA', 0, '120.00', NULL);*/
('drashti', 'Drashti Soni', '2001-01-01', 'drashti@gmail.com', 'F', 'Ahmedabad, Gujarat', 0, '0.0', 'Computer Science'),
('shrey', 'Shrey Patel', '2001-02-01', 'shrey@gmail.com', 'M', 'Ahmedabad, Gujarat', 0, '0.0', 'Computer Science'),
('yash', 'Yash Patel', '1974-01-01', 'yash@gmail.com', 'M', 'Rajkot, Gujarat', 1, '0.0', 'Mechanical Engineering'),
('raj', 'Raj Shah', '2000-10-15', 'raj@gmail.com', 'M', 'Surat, Gujarat', 0, '100.0', 'Chemical Engineering'),
('hirak', 'Hirak Soni', '2000-01-01', 'hirak@gmail.com', 'F', 'Vadodara, Gujarat', 0, '50.0', 'Mechanical Engineering');


CREATE TABLE IF NOT EXISTS `subject` (
  `SubName` varchar(30) NOT NULL,
  PRIMARY KEY (`SubName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `subject`

INSERT INTO `subject` (`SubName`) VALUES
/*('Calculus'),
('Computer Architecture'),
('Data Science'),
('Physics'),
('Psychology');*/
('Calculus'),
('Computer Architecture'),
('Horror Entertainment'),
('Physics'),
('Psychology'),
('Linear Algebra'),
('Data Structures');

CREATE TABLE IF NOT EXISTS `user` (
  `Username` varchar(15) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table `user`

INSERT INTO `user` (`Username`, `Password`) VALUES
/*('aclark', 'aclark123'),
('ahart', 'ahart123'),
('amoore', 'amoore123'),
('apiper', 'apiper123'),
('bturner', 'bturner123'),
('cbenson', 'cbenson123'),
('ediao', 'ediao123'),
('gkimberly', 'gkimberly123'),
('gmat', 'gmat123'),
('gstarr', 'gstarr123'),
('hclifton', 'hclifton123'),
('hsun', 'hsun123'),
('kburns', 'kburns123'),
('kwalls', 'kwalls123'),
('lnarang', 'lnarang123'),
('lnoel', 'lnoel123'),
('mross', 'mross123'),
('nbatts', 'nbatts123'),
('sgarner', 'sgarner123'),
('ssong', 'ssong123'),
('thwang', 'thwang123'),
('ywu', 'ywu123'),
('zhui', 'zhui123');*/
('drashti', 'drashti123'),
('shrey', 'shrey123'),
('yash', 'yash123'),
('raj', 'raj123'),
('hirak', 'hirak123'),
('admin', 'admin123');

/*==================================================PROCEDURES=======================================================*/ 

DELIMITER //
DROP PROCEDURE IF EXISTS `addbook` //
CREATE PROCEDURE `addbook`(IN `_isbn` char(14), IN `_q` int(11), IN `_Author1` varchar(50), IN `_Author2` varchar(50), IN `_Title` varchar(100), IN `_Cost` decimal(5,2), IN `_IsReserved` tinyint(1), IN `_Edition` int(11), IN `_PubliPlace` varchar(30), IN `_Publisher` varchar(30), IN `_CopyYr` decimal(4,0), IN `_ShelfID` int(11), IN `_SubName` varchar(30))
BEGIN
	DECLARE done INT DEFAULT False;
	DECLARE `temp_copyid` int(11) DEFAULT 0;
    DECLARE `temp_qty` int(11) DEFAULT 1;
    DECLARE `temp_isbn` char(14) DEFAULT 'NILL';
    SELECT `ISBN` INTO `temp_isbn` FROM `book` WHERE STRCMP(trim(`ISBN`), trim(`_isbn`)) = 0;
    IF (STRCMP(`temp_isbn`, 'NILL') = 0) THEN
		INSERT INTO `book` (`ISBN`, `Title`, `Cost`, `IsReserved`, `Edition`, `PubliPlace`, `Publisher`, `CopyYr`, `ShelfID`, `SubName`) VALUES (`_isbn`, `_Title`, `_Cost`, `_IsReserved`, `_Edition`, `_PubliPlace`, `_Publisher`, `_CopyYr`, `_ShelfID`, `_SubName`);
        INSERT INTO `author` (`ISBN`, `Author`) VALUES (`_isbn`, `_Author1`);
        IF (STRCMP(`_Author2`, 'NILL') != 0) THEN
			INSERT INTO `author` (`ISBN`, `Author`) VALUES (`_isbn`, `_Author2`);
        END IF;
        read_loop: LOOP
			IF `temp_qty` > `_q` THEN
				LEAVE read_loop;
			ELSE 
				INSERT INTO `bookcopy` (`ISBN`, `CopyID`, `IsChecked`, `IsHold`, `IsDamaged`, `FuRequester`) VALUES (`_isbn`, `temp_qty`, '0', '0', '0', NULL);
				set `temp_qty` = `temp_qty` + 1;
			END IF;
		END LOOP;
    ELSE
		SET `temp_copyid` = (SELECT COUNT(`CopyID`) FROM `bookcopy` WHERE STRCMP(trim(`ISBN`), trim(`_isbn`)) = 0);
		read_loop: LOOP
			IF `temp_qty` > `_q` THEN
				LEAVE read_loop;
			ELSE 
				INSERT INTO `bookcopy` (`ISBN`, `CopyID`, `IsChecked`, `IsHold`, `IsDamaged`, `FuRequester`) VALUES (`_isbn`, `temp_copyid` + `temp_qty`, '0', '0', '0', NULL);
				set `temp_qty` = `temp_qty` + 1;
			END IF;
		END LOOP;
    END IF;
END //
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS `listbooks` //
CREATE PROCEDURE `listbooks` ()
BEGIN
	SELECT * FROM `book`;
END //
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS `searchbookauthor` //
CREATE PROCEDURE `searchbookauthor` (IN `_author` varchar(50))
BEGIN
	SELECT B.ISBN, Title, Edition, COUNT(CopyId) AS copynum FROM book AS B, bookcopy AS BC, author AS A Where A.Author = `_author` AND A.ISBN = B.ISBN AND B.ISBN = BC.ISBN AND IsReserved = 0 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0 GROUP BY B.ISBN;
END //
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS `searchbooktitle` //
CREATE PROCEDURE `searchbooktitle` (IN `_title` varchar(100))
BEGIN
	SELECT B.ISBN, Title, Edition, COUNT(CopyId) AS copynum FROM book AS B, bookcopy AS BC WHERE Title = `_title` AND B.ISBN = BC.ISBN AND IsReserved = 0 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0 GROUP BY B.ISBN;
END //
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS `searchbookisbn` //
CREATE PROCEDURE `searchbookisbn` (IN `_isbn` char(14))
BEGIN
	SELECT B.ISBN, Title, Edition, COUNT(CopyId) AS copynum FROM book AS B, bookcopy AS BC WHERE B.ISBN = `_isbn` AND B.ISBN = BC.ISBN AND IsReserved = 0 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0;
END //
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS `reservebookisbn` //
CREATE PROCEDURE `reservebookisbn` (IN `_isbn` char(14))
BEGIN
	SELECT B.ISBN, Title, Edition, COUNT(CopyId) AS copynum FROM book AS B, bookcopy AS BC WHERE B.ISBN = `_isbn` AND B.ISBN = BC.ISBN AND IsReserved = 1 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0;
END //
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS `reservebookauthor` //
CREATE PROCEDURE `reservebookauthor` (IN `_author` varchar(50))
BEGIN
	SELECT B.ISBN, Title, Edition, COUNT(CopyId) AS copynum FROM book AS B, bookcopy AS BC, author AS A Where A.Author = `_author` AND A.ISBN = B.ISBN AND B.ISBN = BC.ISBN AND IsReserved = 0 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0 GROUP BY B.ISBN;
END //
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS `reservebooktitle` //
CREATE PROCEDURE `reservebooktitle` (IN `_title` varchar(100))
BEGIN
	SELECT B.ISBN, Title, Edition, COUNT(CopyId) AS copynum FROM book AS B, bookcopy AS BC WHERE Title = `_title` AND B.ISBN = BC.ISBN AND IsReserved = 0 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0 GROUP BY B.ISBN;
END //
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS `issuebook` //
CREATE PROCEDURE `issuebook` (IN `_username` varchar(15), IN `_isbn` char(14), IN `_copyid` int(11), IN `_newisssueid` int(4), IN `_today` date, IN `_estimate` date)
BEGIN
	INSERT INTO issue (Username, ISBN, CopyID, IssueID, ExtenDate, IssueDate, ReturnDate, NumExten) VALUES (`_username`, `_isbn`, `_copyid`, `_newisssueid`, NULL, `_today`, `_estimate`, 0);
	UPDATE bookcopy AS BC SET IsHold = 1 Where BC.ISBN = `_isbn` AND BC.CopyID = `_copyid`;
END //
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS `trackbook` //
CREATE PROCEDURE `trackbook` (IN `_isbn` char(14))
BEGIN
	SELECT S.ShelfID AS shelfid, S.AisleID AS aisleid, F.FloorID AS floorid, SU.SubName AS subname FROM book AS B, shelf AS S, floor AS F, subject AS SU WHERE B.ISBN = `_isbn` AND B.ShelfID = S.ShelfID AND B.SubName = SU.SubName AND S.FloorID = F.FloorID;
END //
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS `checkoutbook` //
CREATE PROCEDURE `checkoutbook` (IN `_isbn` char(14), IN `_copyid` int(11), IN `_issueid` int(4), IN `_today` date, IN `_estimate` date)
BEGIN
	UPDATE issue AS I SET ExtenDate = `_today`, IssueDate = `_today`, ReturnDate = `_estimate` WHERE I.IssueID = `_issueid`;
    UPDATE bookcopy AS BC SET IsHold = 0, IsChecked = 1 Where BC.ISBN = `_isbn` AND BC.CopyID = `_copyid`;
END //
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS `returnbook` //
CREATE PROCEDURE `returnbook` (IN `_username` varchar(15), IN `_this_penalty` decimal(5,2))
BEGIN
	DECLARE old_penalty decimal(5,2) DEFAULT '0.00';
    DECLARE new_penalty decimal(5,2);
	SELECT SF.Penalty AS old_penalty FROM student_faculty AS SF WHERE SF.Username = `_username`;
    SET new_penalty = old_penalty + `_this_penalty`;
    UPDATE student_faculty AS SF SET Penalty = new_penalty WHERE SF.Username = `_username`;
END //
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS `adduser` //
CREATE PROCEDURE `adduser` (IN `_username` varchar(15), IN `_password` varchar(20))
BEGIN
	INSERT INTO `user` (Username, Password) VALUES (`_username`, `_password`);
END //
DELIMITER ;
  
DELIMITER //
DROP PROCEDURE IF EXISTS `createprofile` //
CREATE PROCEDURE `createprofile` (IN `_username` varchar(15), IN `_name` varchar(30), IN `_DOB` date, IN `_email` varchar(30), IN `_gender` char(1), IN `_address` varchar(50), IN `_isfaculty` tinyint(1), IN `_dept` varchar(50))
BEGIN
	INSERT INTO `student_faculty` (Username, Name, DOB, Email, Gender, Address, IsFaculty, Dept) VALUES (`_username`, `_name`, `_DOB`, `_email`, `_gender`, `_address`, `_isfaculty`, `_dept`);
END //
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS `showmyfine` //
CREATE PROCEDURE `showmyfine` (IN `_Username` varchar(15))
BEGIN
	SELECT `Username` AS username, `Name` AS name, `Penalty` AS penalty FROM `student_faculty` WHERE `Username` = `_Username`;
END //
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS `payfine` //
CREATE PROCEDURE `payfine` (IN `_Username` varchar(15), IN `_amount` decimal(5,2))
BEGIN
	UPDATE `student_faculty` SET `Penalty` = `Penalty` - `_amount` WHERE `Username` = `_Username`;
END // 
DELIMITER ;

DELIMITER //
DROP PROCEDURE IF EXISTS `listusers` //
CREATE PROCEDURE `listusers` ()
BEGIN
	SELECT * FROM `student_faculty`;
END // 
DELIMITER ;

/* DELIMITER //
DROP PROCEDURE IF EXISTS `futureholdrequest` //
CREATE PROCEDURE `futureholdrequest` (IN `_isbn` char(14))
BEGIN
	DECLARE copynum int(11) DEFAULT 0;
	SELECT COUNT(CopyId) INTO copynum FROM book AS B, bookcopy AS BC Where B.ISBN = `_isbn` AND B.ISBN = BC.ISBN AND IsReserved = 0 AND IsHold = 0 AND IsChecked = 0 AND IsDamaged = 0;
	if (copynum != 0) THEN
		
	ELSE
    
    END IF;
END //
DELIMITER ; */

/*
DELIMITER //
DROP PROCEDURE IF EXISTS `updatepassword` //
CREATE PROCEDURE `updatepassword` (IN `_username` varchar(15), IN `_password` varchar(20))
BEGIN
	UPDATE `user` SET `Password` = `_password` WHERE `Username` = `_username`;
END //
DELIMITER ;
*/

/*
DELIMITER //
DROP PROCEDURE IF EXISTS `checkoutbook` //
CREATE PROCEDURE `checkoutbook` (IN `_isbn` char(14))
BEGIN
	SELECT S.ShelfID AS shelfid, S.AisleID AS aisleid, F.FloorID AS floorid, SU.SubName AS subname FROM book AS B, shelf AS S, floor AS F, subject AS SU WHERE B.ISBN = `_isbn` AND B.ShelfID = S.ShelfID AND B.SubName = SU.SubName AND S.FloorID = F.FloorID;
END //
DELIMITER ;
*/

/*==================================================TRIGGERS=======================================================*/ 

DELIMITER //
DROP TRIGGER IF EXISTS `checkpassword` //
CREATE TRIGGER `checkpassword` BEFORE INSERT ON `user`
FOR EACH ROW
BEGIN
   DECLARE temp_password1 varchar(20);
   DECLARE temp_password2 varchar(20) DEFAULT 'NILL';
   DECLARE temp_password3 varchar(20) DEFAULT 'NILL';
   SET temp_password1 = NEW.Password;
   IF (CHAR_LENGTH(temp_password1) >= 6 AND CHAR_LENGTH(temp_password1) <= 19) THEN
        IF (NOT NEW.Password REGEXP '[a-z]' OR NOT NEW.Password REGEXP '[0-9]') THEN
			SIGNAL SQLSTATE '45001' 
				SET MESSAGE_TEXT = 'Password must contain atleast one alphabet and atleast one number.';
		END IF;
   ELSE
		SIGNAL SQLSTATE '45002' 
            SET MESSAGE_TEXT = 'Password must have length between 6 to 19 characters.';
   END IF;
END //
DELIMITER ;

DELIMITER //
DROP TRIGGER IF EXISTS `userregistration` //
CREATE TRIGGER `userregistration` BEFORE INSERT ON `user`
FOR EACH ROW
BEGIN
    DECLARE `temp_username2` varchar(15) DEFAULT 'NILL';
    SELECT `Username` INTO `temp_username2` FROM `user` WHERE STRCMP(trim(`Username`), trim(NEW.Username)) = 0;
    IF (STRCMP(`temp_username2`, 'NILL') != 0) THEN
		SIGNAL SQLSTATE '45003' 
            SET MESSAGE_TEXT = 'This username already exists.';
    END IF;
END //
DELIMITER ;

DELIMITER //
DROP TRIGGER IF EXISTS `verifyuser` //
CREATE TRIGGER `verifyuser` BEFORE UPDATE ON `user`
FOR EACH ROW
BEGIN
	DECLARE count int;
    DECLARE `temp_username2` varchar(15) DEFAULT 'NILL';
    IF (NOT EXISTS (SELECT * FROM `user` WHERE OLD.`Username` LIKE '%NEW.`Username`%')) THEN
		SIGNAL SQLSTATE '45004' 
            SET MESSAGE_TEXT = 'Incorrect Username.';
	END IF;
END //
DELIMITER ;

DELIMITER //
DROP TRIGGER IF EXISTS `chktimeinsertissue` //
CREATE TRIGGER `chktimeinsertissue` BEFORE INSERT ON `issue`
FOR EACH ROW
BEGIN
	DECLARE currday varchar(10);
    SET currday = DAYNAME(SYSDATE());
    SET @time = CURRENT_TIME;
	IF (currday = 'Sunday' OR currday = 'Saturday') THEN
		SIGNAL SQLSTATE '45005' 
            SET MESSAGE_TEXT = 'You cannot access library on Saturdays and Sundays';
	ELSE
            IF (CURRENT_TIME >= TIME('20:00:01') OR CURRENT_TIME <= TIME('05:59:59')) THEN
				SIGNAL SQLSTATE '45006' 
					SET MESSAGE_TEXT = 'You cannot access library between 8 PM  AND 6 AM';
			END IF;
	END IF;
END //
DELIMITER ;
 
DELIMITER //
DROP TRIGGER IF EXISTS `chktimeupdateissue` //
CREATE TRIGGER `chktimeupdateissue` BEFORE UPDATE ON `issue`
FOR EACH ROW
BEGIN
	DECLARE currday varchar(10);
    SET currday = DAYNAME(SYSDATE());
    SET @time = CURRENT_TIME;
	IF (currday = 'Sunday' OR currday = 'Saturday') THEN
		SIGNAL SQLSTATE '45007' 
            SET MESSAGE_TEXT = 'You cannot access library on Saturdays and Sundays';
	ELSE
            IF (CURRENT_TIME >= TIME('20:00:01') OR CURRENT_TIME <= TIME('05:59:59')) THEN
				SIGNAL SQLSTATE '45008' 
					SET MESSAGE_TEXT = 'You cannot access library between 8 PM  AND 6 AM';
			END IF;
	END IF;
END //
DELIMITER ;

DELIMITER //
DROP TRIGGER IF EXISTS `chktimedeleteissue` //
CREATE TRIGGER `chktimedeleteissue` BEFORE DELETE ON `issue`
FOR EACH ROW
BEGIN
	DECLARE currday varchar(10);
    SET currday = DAYNAME(SYSDATE());
    SET @time = CURRENT_TIME;
	IF (currday = 'Sunday' OR currday = 'Saturday') THEN
		SIGNAL SQLSTATE '45009' 
            SET MESSAGE_TEXT = 'You cannot access library on Saturdays and Sundays';
	ELSE
            IF (CURRENT_TIME >= TIME('20:00:01') OR CURRENT_TIME <= TIME('05:59:59')) THEN
				SIGNAL SQLSTATE '45010' 
					SET MESSAGE_TEXT = 'You cannot access library between 8 PM  AND 6 AM';
			END IF;
	END IF;
END //
DELIMITER ;

DELIMITER //
DROP TRIGGER IF EXISTS `chktimeinsertauthor` //
CREATE TRIGGER `chktimeinsertauthor` BEFORE INSERT ON `author`
FOR EACH ROW
BEGIN
	DECLARE currday varchar(10);
    SET currday = DAYNAME(SYSDATE());
    SET @time = CURRENT_TIME;
	IF (currday = 'Sunday' OR currday = 'Saturday') THEN
		SIGNAL SQLSTATE '45011' 
            SET MESSAGE_TEXT = 'You cannot access library on Saturdays and Sundays';
	ELSE
            IF (CURRENT_TIME >= TIME('20:00:01') OR CURRENT_TIME <= TIME('05:59:59')) THEN
				SIGNAL SQLSTATE '45012' 
					SET MESSAGE_TEXT = 'You cannot access library between 8 PM  AND 6 AM';
			END IF;
	END IF;
END //
DELIMITER ;

DELIMITER //
DROP TRIGGER IF EXISTS `chktimeupdateauthor` //
CREATE TRIGGER `chktimeupdateauthor` BEFORE UPDATE ON `author`
FOR EACH ROW
BEGIN
	DECLARE currday varchar(10);
    SET currday = DAYNAME(SYSDATE());
    SET @time = CURRENT_TIME;
	IF (currday = 'Sunday' OR currday = 'Saturday') THEN
		SIGNAL SQLSTATE '45013' 
            SET MESSAGE_TEXT = 'You cannot access library on Saturdays and Sundays';
	ELSE
            IF (CURRENT_TIME >= TIME('20:00:01') OR CURRENT_TIME <= TIME('05:59:59')) THEN
				SIGNAL SQLSTATE '45014' 
					SET MESSAGE_TEXT = 'You cannot access library between 8 PM  AND 6 AM';
			END IF;
	END IF;
END //
DELIMITER ;

DELIMITER //
DROP TRIGGER IF EXISTS `chktimedeleteauthor` //
CREATE TRIGGER `chktimedeleteauthor` BEFORE DELETE ON `author`
FOR EACH ROW
BEGIN
	DECLARE currday varchar(10);
    SET currday = DAYNAME(SYSDATE());
    SET @time = CURRENT_TIME;
	IF (currday = 'Sunday' OR currday = 'Saturday') THEN
		SIGNAL SQLSTATE '45015' 
            SET MESSAGE_TEXT = 'You cannot access library on Saturdays and Sundays';
	ELSE
            IF (CURRENT_TIME >= TIME('20:00:01') OR CURRENT_TIME <= TIME('05:59:59')) THEN
				SIGNAL SQLSTATE '45016' 
					SET MESSAGE_TEXT = 'You cannot access library between 8 PM  AND 6 AM';
			END IF;
	END IF;
END //
DELIMITER ;

DELIMITER //
DROP TRIGGER IF EXISTS `chktimeinsertbook` //
CREATE TRIGGER `chktimeinsertbook` BEFORE INSERT ON `book`
FOR EACH ROW
BEGIN
	DECLARE currday varchar(10);
    SET currday = DAYNAME(SYSDATE());
    SET @time = CURRENT_TIME;
	IF (currday = 'Sunday' OR currday = 'Saturday') THEN
		SIGNAL SQLSTATE '45017' 
            SET MESSAGE_TEXT = 'You cannot access library on Saturdays and Sundays';
	ELSE
            IF (CURRENT_TIME >= TIME('20:00:01') OR CURRENT_TIME <= TIME('05:59:59')) THEN
				SIGNAL SQLSTATE '45018' 
					SET MESSAGE_TEXT = 'You cannot access library between 8 PM  AND 6 AM';
			END IF;
	END IF;
END //
DELIMITER ;

DELIMITER //
DROP TRIGGER IF EXISTS `chktimeupdatebook` //
CREATE TRIGGER `chktimeupdatebook` BEFORE UPDATE ON `book`
FOR EACH ROW
BEGIN
	DECLARE currday varchar(10);
    SET currday = DAYNAME(SYSDATE());
    SET @time = CURRENT_TIME;
	IF (currday = 'Sunday' OR currday = 'Saturday') THEN
		SIGNAL SQLSTATE '45019' 
            SET MESSAGE_TEXT = 'You cannot access library on Saturdays and Sundays';
	ELSE
            IF (CURRENT_TIME >= TIME('20:00:01') OR CURRENT_TIME <= TIME('05:59:59')) THEN
				SIGNAL SQLSTATE '45020' 
					SET MESSAGE_TEXT = 'You cannot access library between 8 PM  AND 6 AM';
			END IF;
	END IF;
END //
DELIMITER ;

DELIMITER //
DROP TRIGGER IF EXISTS `chktimedeletebook` //
CREATE TRIGGER `chktimedeletebook` BEFORE DELETE ON `book`
FOR EACH ROW
BEGIN
	DECLARE currday varchar(10);
    SET currday = DAYNAME(SYSDATE());
    SET @time = CURRENT_TIME;
	IF (currday = 'Sunday' OR currday = 'Saturday') THEN
		SIGNAL SQLSTATE '45021' 
            SET MESSAGE_TEXT = 'You cannot access library on Saturdays and Sundays';
	ELSE
            IF (CURRENT_TIME >= TIME('20:00:01') OR CURRENT_TIME <= TIME('05:59:59')) THEN
				SIGNAL SQLSTATE '45022' 
					SET MESSAGE_TEXT = 'You cannot access library between 8 PM  AND 6 AM';
			END IF;
	END IF;
END //
DELIMITER ;

DELIMITER //
DROP TRIGGER IF EXISTS `chktimeinsertbookcopy` //
CREATE TRIGGER `chktimeinsertbookcopy` BEFORE INSERT ON `bookcopy`
FOR EACH ROW
BEGIN
	DECLARE currday varchar(10);
    SET currday = DAYNAME(SYSDATE());
    SET @time = CURRENT_TIME;
	IF (currday = 'Sunday' OR currday = 'Saturday') THEN
		SIGNAL SQLSTATE '45023' 
            SET MESSAGE_TEXT = 'You cannot access library on Saturdays and Sundays';
	ELSE
            IF (CURRENT_TIME >= TIME('20:00:01') OR CURRENT_TIME <= TIME('05:59:59')) THEN
				SIGNAL SQLSTATE '45024' 
					SET MESSAGE_TEXT = 'You cannot access library between 8 PM  AND 6 AM';
			END IF;
	END IF;
END //
DELIMITER ;

DELIMITER //
DROP TRIGGER IF EXISTS `chktimeupdatebookcopy` //
CREATE TRIGGER `chktimeupdatebookcopy` BEFORE UPDATE ON `bookcopy`
FOR EACH ROW
BEGIN
	DECLARE currday varchar(10);
    SET currday = DAYNAME(SYSDATE());
    SET @time = CURRENT_TIME;
	IF (currday = 'Sunday' OR currday = 'Saturday') THEN
		SIGNAL SQLSTATE '45025' 
            SET MESSAGE_TEXT = 'You cannot access library on Saturdays and Sundays';
	ELSE
            IF (CURRENT_TIME >= TIME('20:00:01') OR CURRENT_TIME <= TIME('05:59:59')) THEN
				SIGNAL SQLSTATE '45026' 
					SET MESSAGE_TEXT = 'You cannot access library between 8 PM  AND 6 AM';
			END IF;
	END IF;
END //
DELIMITER ;

DELIMITER //
DROP TRIGGER IF EXISTS `chktimedeletebookcopy` //
CREATE TRIGGER `chktimedeletebookcopy` BEFORE DELETE ON `bookcopy`
FOR EACH ROW
BEGIN
	DECLARE currday varchar(10);
    SET currday = DAYNAME(SYSDATE());
    SET @time = CURRENT_TIME;
	IF (currday = 'Sunday' OR currday = 'Saturday') THEN
		SIGNAL SQLSTATE '45027' 
            SET MESSAGE_TEXT = 'You cannot access library on Saturdays and Sundays';
	ELSE
            IF (CURRENT_TIME >= TIME('20:00:01') OR CURRENT_TIME <= TIME('05:59:59')) THEN
				SIGNAL SQLSTATE '45028' 
					SET MESSAGE_TEXT = 'You cannot access library between 8 PM  AND 6 AM';
			END IF;
	END IF;
END //
DELIMITER ;


/*
DROP TRIGGER IF EXISTS `chktimeinsertissue`;
DROP TRIGGER IF EXISTS `chktimeupdateissue`;
DROP TRIGGER IF EXISTS `chktimedeleteissue`;
DROP TRIGGER IF EXISTS `chktimeinsertauthor`;
DROP TRIGGER IF EXISTS `chktimeupdateauthor`;
DROP TRIGGER IF EXISTS `chktimedeleteauthor`;
DROP TRIGGER IF EXISTS `chktimeinsertbook`;
DROP TRIGGER IF EXISTS `chktimeupdatebook`;
DROP TRIGGER IF EXISTS `chktimedeletebook`;
DROP TRIGGER IF EXISTS `chktimeinsertbookcopy`;
DROP TRIGGER IF EXISTS `chktimeupdatebookcopy`;
DROP TRIGGER IF EXISTS `chktimedeletebookcopy`;
*/

/*============================================CONSTRAINTS=========================================================*/
ALTER TABLE `author`
  ADD CONSTRAINT FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`);
  
ALTER TABLE `book`
  ADD CONSTRAINT FOREIGN KEY (`ShelfID`) REFERENCES `shelf` (`ShelfID`),
  ADD CONSTRAINT FOREIGN KEY (`SubName`) REFERENCES `subject` (`SubName`);
 
ALTER TABLE `bookcopy`
  ADD CONSTRAINT FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`);

ALTER TABLE `issue`
  ADD CONSTRAINT FOREIGN KEY (`Username`) REFERENCES `student_faculty` (`Username`),
  ADD CONSTRAINT FOREIGN KEY (`ISBN`, `CopyID`) REFERENCES `bookcopy` (`ISBN`, `CopyID`);

ALTER TABLE `shelf`
  ADD CONSTRAINT FOREIGN KEY (`FloorID`) REFERENCES `floor` (`FloorID`);

ALTER TABLE `staff`
  ADD CONSTRAINT FOREIGN KEY (`Username`) REFERENCES `user` (`Username`);

ALTER TABLE `student_faculty`
  ADD CONSTRAINT FOREIGN KEY (`Username`) REFERENCES `user` (`Username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
