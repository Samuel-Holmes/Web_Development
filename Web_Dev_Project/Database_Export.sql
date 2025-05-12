-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2024 at 02:55 PM
-- Server version: 10.3.28-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Wearview_AT2`
--

-- --------------------------------------------------------

--
-- Table structure for table `Form_Data`
--

CREATE TABLE `Form_Data` (
  `ID` int(11) NOT NULL,
  `Staff_Name` varchar(70) NOT NULL,
  `Staff_Email` varchar(80) NOT NULL,
  `Issue_Location` varchar(100) NOT NULL,
  `Issue_Description` varchar(500) NOT NULL,
  `Priority_Level` int(11) DEFAULT NULL,
  `Job_Status` varchar(200) DEFAULT 'Incomplete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Form_Data`
--

INSERT INTO `Form_Data` (`ID`, `Staff_Name`, `Staff_Email`, `Issue_Location`, `Issue_Description`, `Priority_Level`, `Job_Status`) VALUES
(1, 'test', 'test@domain.com', 'test', 'This is a test to ensure data is reaching the database correctly. ', 1, 'Complete'),
(2, 'test', 'test@domain.com', 'test', 'This is a test spanning multiple lines.This is a test spanning multiple lines.This is a test spanning multiple lines.This is a test spanning multiple lines.This is a test spanning multiple lines.This is a test spanning multiple lines.This is a test spanning multiple lines.This is a test spanning multiple lines.This is a test spanning multiple lines.This is a test spanning multiple lines.This is a test spanning multiple lines.This is a test spanning multiple lines.This is a test spanning multiple', 1, 'Incomplete');

-- --------------------------------------------------------

--
-- Table structure for table `Staff_User_Auth`
--

CREATE TABLE `Staff_User_Auth` (
  `User_ID` int(11) NOT NULL,
  `Staff_User_Name` varchar(255) NOT NULL,
  `Staff_Password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Staff_User_Auth`
--

INSERT INTO `Staff_User_Auth` (`User_ID`, `Staff_User_Name`, `Staff_Password`) VALUES
(1, 'staffmember', 'f367a0b440ac4c90b02eceaadcb23878eb89a189c1f477604b0c1f1f785e355b');

-- --------------------------------------------------------

--
-- Table structure for table `Tech_User_Auth`
--

CREATE TABLE `Tech_User_Auth` (
  `Tech_User_ID` int(11) NOT NULL,
  `Tech_User_Name` varchar(255) NOT NULL,
  `Tech_Password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Tech_User_Auth`
--

INSERT INTO `Tech_User_Auth` (`Tech_User_ID`, `Tech_User_Name`, `Tech_Password`) VALUES
(1, 'admin', '73f02f3cc2f19db33ea9b6a69726d7e7f677dc3eabe56fd9c67adc50f80f19b6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Form_Data`
--
ALTER TABLE `Form_Data`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Staff_User_Auth`
--
ALTER TABLE `Staff_User_Auth`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `Tech_User_Auth`
--
ALTER TABLE `Tech_User_Auth`
  ADD PRIMARY KEY (`Tech_User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Form_Data`
--
ALTER TABLE `Form_Data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Staff_User_Auth`
--
ALTER TABLE `Staff_User_Auth`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Tech_User_Auth`
--
ALTER TABLE `Tech_User_Auth`
  MODIFY `Tech_User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
