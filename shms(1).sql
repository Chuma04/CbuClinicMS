-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2022 at 02:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bpentry`
--

CREATE TABLE `bpentry` (
  `ID` int(11) NOT NULL,
  `RECORDID` int(11) NOT NULL,
  `BP` varchar(12) NOT NULL,
  `TEMP` varchar(12) NOT NULL,
  `STATUS` varchar(100) DEFAULT NULL,
  `REGDATE` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bpentry`
--

INSERT INTO `bpentry` (`ID`, `RECORDID`, `BP`, `TEMP`, `STATUS`, `REGDATE`) VALUES
(6, 1, '34/5', '56', '0', '2022-09-18 20:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `ID` int(11) NOT NULL,
  `RECORDID` int(11) NOT NULL,
  `DIAGNOSIS` text DEFAULT NULL,
  `STATUS` varchar(100) DEFAULT NULL,
  `REGDATE` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`ID`, `RECORDID`, `DIAGNOSIS`, `STATUS`, `REGDATE`) VALUES
(2, 1, 'this is needed for future work', '0', '2022-09-18 21:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `labentry`
--

CREATE TABLE `labentry` (
  `ID` int(11) NOT NULL,
  `RECORDID` int(11) NOT NULL,
  `LABRESULT` text DEFAULT NULL,
  `STATUS` varchar(100) DEFAULT NULL,
  `REGDATE` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `labentry`
--

INSERT INTO `labentry` (`ID`, `RECORDID`, `LABRESULT`, `STATUS`, `REGDATE`) VALUES
(1, 1, 'this shows mild signs of dance', '0', '2022-09-18 21:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `USERNAME` varchar(100) DEFAULT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL,
  `TYPE` varchar(10) DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT NULL,
  `REGDATE` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `USERNAME`, `PASSWORD`, `TYPE`, `STATUS`, `REGDATE`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'admin', 'active', '2022-09-18 17:52:08'),
(3, 'doctor', '5f4dcc3b5aa765d61d8327deb882cf99', 'doctor', 'active', '2022-09-18 18:38:09');

-- --------------------------------------------------------

--
-- Table structure for table `openrecord`
--

CREATE TABLE `openrecord` (
  `ID` int(11) NOT NULL,
  `STUDENTID` varchar(12) NOT NULL,
  `STATUS` varchar(100) DEFAULT NULL,
  `REGDATE` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `openrecord`
--

INSERT INTO `openrecord` (`ID`, `STUDENTID`, `STATUS`, `REGDATE`) VALUES
(1, '2', '4', '2022-09-18 19:11:07'),
(2, '435344564', '0', '2022-09-19 00:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(11) NOT NULL,
  `FIRSTNAME` varchar(100) DEFAULT NULL,
  `LASTNAME` varchar(100) DEFAULT NULL,
  `STUDENTID` varchar(100) DEFAULT NULL,
  `ADDRESS` varchar(100) DEFAULT NULL,
  `AGE` varchar(10) DEFAULT NULL,
  `PHONE` varchar(40) DEFAULT NULL,
  `STATUS` varchar(20) DEFAULT NULL,
  `REGDATE` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `FIRSTNAME`, `LASTNAME`, `STUDENTID`, `ADDRESS`, `AGE`, `PHONE`, `STATUS`, `REGDATE`) VALUES
(2, 'Florence', 'Phiri', '435345', '345345', '43', '0987876564', 'active', '2022-09-18 17:41:58'),
(3, 'Natasha', 'Bwalya', '435344564', '345345', '43', '0987876564', 'active', '2022-09-18 17:43:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bpentry`
--
ALTER TABLE `bpentry`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `labentry`
--
ALTER TABLE `labentry`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `openrecord`
--
ALTER TABLE `openrecord`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bpentry`
--
ALTER TABLE `bpentry`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `labentry`
--
ALTER TABLE `labentry`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `openrecord`
--
ALTER TABLE `openrecord`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
