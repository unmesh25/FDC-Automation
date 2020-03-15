-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2020 at 06:37 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fdc`
--

-- --------------------------------------------------------

--
-- Table structure for table `application_data`
--

CREATE TABLE `application_data` (
  `Name` varchar(55) NOT NULL,
  `Email` varchar(55) NOT NULL,
  `Branch` varchar(55) NOT NULL,
  `Type` varchar(55) NOT NULL,
  `Title` varchar(55) NOT NULL,
  `Name_of_Organization` varchar(55) NOT NULL,
  `Address_of_organization` varchar(200) NOT NULL,
  `Other_Organizations` varchar(100) NOT NULL,
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL,
  `Total_no_of_ods` int(11) NOT NULL,
  `Last_date_for_registration` date NOT NULL,
  `Period` varchar(55) NOT NULL,
  `Registration_fee` int(11) NOT NULL,
  `Amount_claimed` int(11) NOT NULL,
  `Purpose` varchar(500) NOT NULL,
  `Special_Request` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_data`
--

INSERT INTO `application_data` (`Name`, `Email`, `Branch`, `Type`, `Title`, `Name_of_Organization`, `Address_of_organization`, `Other_Organizations`, `Start_date`, `End_date`, `Total_no_of_ods`, `Last_date_for_registration`, `Period`, `Registration_fee`, `Amount_claimed`, `Purpose`, `Special_Request`) VALUES
('shreyans', 'sk@gmail.com', 'IT', 'STTP', 'aaa', 'aaa', 'aaa', 'aaa', '2020-03-06', '2020-03-13', 7, '2020-03-01', 'Non Vaction Period', 123, 1, '111	', 'No'),
('shreyans', 'sk@gmail.com', 'IT', 'STTP', 'bbb', 'bbb', 'bbb', 'bb', '2020-03-08', '2020-03-18', 10, '2020-03-01', 'Non Vaction Period', 122, 12121, '	bbb', 'No'),
('shreyans', 'sk@gmail.com', 'IT', 'Workshop', 'sp', 'sp', 's', 'p', '2020-03-17', '2020-05-21', 65, '2020-03-01', 'Non Vaction Period', 121, 12212, '	asdsda', 'No'),
('shreyans', 'sk@gmail.com', 'IT', 'Symposium', '12', '12', '12', '12', '2020-03-23', '2020-11-24', 246, '2020-03-09', 'Non Vaction Period', 12, 122112, '	12', 'Yes'),
('shreyans', 'sk@gmail.com', 'IT', 'Symposium', 'asd', 'EEEE', 'Pune', 'IEEE', '2020-03-24', '2020-04-04', 11, '2020-03-02', 'Non Vaction Period', 12, 12212, '	dasdsf', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `Name` varchar(55) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Date_of_Appoinment` date NOT NULL,
  `Employee_Code` varchar(55) NOT NULL,
  `Number` varchar(50) NOT NULL,
  `Branch` varchar(50) NOT NULL,
  `MemberType` varchar(55) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`Name`, `Email`, `Date_of_Appoinment`, `Employee_Code`, `Number`, `Branch`, `MemberType`, `Password`) VALUES
('Admin', 'admin@gmail.com', '0000-00-00', 'one', '1234567890', 'IT', 'FDC Admin', 'aaa'),
('shreyans', 'sk@gmail.com', '2020-03-01', '1', '8169332727', 'IT', 'Faculty', 'aaaa'),
('raj', 'raj@gmail.com', '0000-00-00', '', '', '', 'Faculty', 'aaa'),
('arjun', 'arj@gmail.com', '0000-00-00', '', '', '', 'Faculty', 'aaa'),
('hod', 'hod@gmail.com', '2020-03-04', '1', '8169332727', 'IT', 'HOD', 'aaaa'),
('fdc', 'fdc@gmail.com', '2020-03-01', '1', '8169332727', 'IT', 'FDC Member', 'aaaa'),
('deepti', 'dpa@gmail.com', '0000-00-00', '', '', '', 'Faculty', '');

-- --------------------------------------------------------

--
-- Table structure for table `fdc_leave_data`
--

CREATE TABLE `fdc_leave_data` (
  `Branch` varchar(55) NOT NULL,
  `Faculty_Name` varchar(55) NOT NULL,
  `Faculty_Mailid` varchar(55) NOT NULL,
  `Start_Date` date NOT NULL,
  `Number_of_ODs` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Reason` varchar(500) NOT NULL,
  `HOD_name` varchar(55) NOT NULL,
  `HOD_email` varchar(55) NOT NULL,
  `HOD_Remark` varchar(55) NOT NULL,
  `HOD_Remark_Reason` varchar(400) NOT NULL,
  `FDCM_name` varchar(55) NOT NULL,
  `FDCM_mail` varchar(55) NOT NULL,
  `FDCM_Remark` varchar(55) NOT NULL,
  `FDCM_Remark_Reason` varchar(500) NOT NULL,
  `Special_Request` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fdc_leave_data`
--

INSERT INTO `fdc_leave_data` (`Branch`, `Faculty_Name`, `Faculty_Mailid`, `Start_Date`, `Number_of_ODs`, `Amount`, `Reason`, `HOD_name`, `HOD_email`, `HOD_Remark`, `HOD_Remark_Reason`, `FDCM_name`, `FDCM_mail`, `FDCM_Remark`, `FDCM_Remark_Reason`, `Special_Request`) VALUES
('IT', 'shreyans', 'sk@gmail.com', '2020-03-06', 7, 1, '111	', 'hod', 'hod@gmail.com', 'Recommended', '		gh								', 'fdc', 'fdc@gmail.com', 'Accepted', 'sa', 'No'),
('IT', 'shreyans', 'sk@gmail.com', '2020-03-08', 10, 12121, '	bbb', 'hod', 'hod@gmail.com', 'Not Recommended', '		tyr								', 'fdc', 'fdc@gmail.com', 'Rejected', 'fds', 'No'),
('IT', 'shreyans', 'sk@gmail.com', '2020-03-17', 65, 12212, '	asdsda', '', '', '', '', '', '', '', '', 'No'),
('IT', 'shreyans', 'sk@gmail.com', '2020-03-23', 246, 122112, '	12', '', '', '', '', '', '', '', '', 'Yes'),
('IT', 'shreyans', 'sk@gmail.com', '2020-03-24', 11, 12212, '	dasdsf', '', '', '', '', '', '', '', '', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `fdc_sanction_data`
--

CREATE TABLE `fdc_sanction_data` (
  `Faculty_Name` varchar(55) NOT NULL,
  `Faculty_Mail` varchar(55) NOT NULL,
  `Start_Date` date NOT NULL,
  `Branch` varchar(55) NOT NULL,
  `FDCM_name` varchar(55) NOT NULL,
  `FDCM_mail` varchar(55) NOT NULL,
  `Date_of_Meeting` date NOT NULL,
  `Remark` varchar(55) NOT NULL,
  `Remark_Reason` varchar(255) NOT NULL,
  `Amount_Sanctioned` int(11) NOT NULL,
  `ODs_sanctioned` int(11) NOT NULL,
  `Special_Request` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fdc_sanction_data`
--

INSERT INTO `fdc_sanction_data` (`Faculty_Name`, `Faculty_Mail`, `Start_Date`, `Branch`, `FDCM_name`, `FDCM_mail`, `Date_of_Meeting`, `Remark`, `Remark_Reason`, `Amount_Sanctioned`, `ODs_sanctioned`, `Special_Request`) VALUES
('shreyans', 'sk@gmail.com', '2020-03-06', 'IT', 'fdc', 'fdc@gmail.com', '2020-03-01', 'Accepted', 'sa', 1, 1, 'No'),
('shreyans', 'sk@gmail.com', '2020-03-08', 'IT', 'fdc', 'fdc@gmail.com', '2020-03-25', 'Rejected', 'fds', 12, 1, 'No'),
('shreyans', 'sk@gmail.com', '2020-03-17', 'IT', '', '', '0000-00-00', '', '', 0, 0, 'No'),
('shreyans', 'sk@gmail.com', '2020-03-23', 'IT', '', '', '0000-00-00', '', '', 0, 0, 'Yes'),
('shreyans', 'sk@gmail.com', '2020-03-24', 'IT', '', '', '0000-00-00', '', '', 0, 0, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `leave_data`
--

CREATE TABLE `leave_data` (
  `Branch` varchar(10) NOT NULL,
  `Name` varchar(55) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Start_Date` date NOT NULL,
  `Number_of_ODs` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Reason` varchar(500) NOT NULL,
  `HOD_name` varchar(50) NOT NULL,
  `HOD_email` varchar(50) NOT NULL,
  `HOD_Remark` varchar(200) NOT NULL,
  `HOD_Remark_Reason` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_data`
--

INSERT INTO `leave_data` (`Branch`, `Name`, `Email`, `Start_Date`, `Number_of_ODs`, `Amount`, `Reason`, `HOD_name`, `HOD_email`, `HOD_Remark`, `HOD_Remark_Reason`) VALUES
('IT', 'shreyans', 'sk@gmail.com', '2020-03-06', 7, 1, '111	', 'hod', 'hod@gmail.com', 'Recommended', '		gh								'),
('IT', 'shreyans', 'sk@gmail.com', '2020-03-08', 10, 12121, '	bbb', 'hod', 'hod@gmail.com', 'Not Recommended', '		tyr								'),
('IT', 'shreyans', 'sk@gmail.com', '2020-03-17', 65, 12212, '	asdsda', '', '', '', ''),
('IT', 'shreyans', 'sk@gmail.com', '2020-03-23', 246, 122112, '	12', '', '', '', ''),
('IT', 'shreyans', 'sk@gmail.com', '2020-03-24', 11, 12212, '	dasdsf', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `leave_data_files`
--

CREATE TABLE `leave_data_files` (
  `id` int(11) NOT NULL,
  `Branch` varchar(25) NOT NULL,
  `Name` varchar(55) NOT NULL,
  `Email` varchar(55) NOT NULL,
  `Start_Date` date NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_mime` varchar(255) NOT NULL,
  `file_data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `resource_data`
--

CREATE TABLE `resource_data` (
  `Name` varchar(55) NOT NULL,
  `Email` varchar(55) NOT NULL,
  `ODs` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Special_Ods` int(11) NOT NULL,
  `Special_Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resource_data`
--

INSERT INTO `resource_data` (`Name`, `Email`, `ODs`, `Amount`, `Special_Ods`, `Special_Amount`) VALUES
('shreyans', 'sk@gmail.com', 11, 11999, 136, 12136),
('raj', 'raj@gmail.com', 12, 12000, 0, 0),
('arjun', 'arj@gmail.com', 12, 12000, 0, 0),
('hod', 'hod@gmail.com', 12, 12000, 0, 0),
('fdc', 'fdc@gmail.com', 12, 12000, 0, 0),
('deepti', 'dpa@gmail.com', 12, 12000, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leave_data_files`
--
ALTER TABLE `leave_data_files`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leave_data_files`
--
ALTER TABLE `leave_data_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
