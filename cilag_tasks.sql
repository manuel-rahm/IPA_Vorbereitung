-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2022 at 11:02 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cilag_tasks`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblci`
--

CREATE TABLE `tblci` (
  `pkCI` int(11) NOT NULL,
  `fldCI` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblci`
--

INSERT INTO `tblci` (`pkCI`, `fldCI`) VALUES
(38, ''),
(35, 'WCILCHTEST');

-- --------------------------------------------------------

--
-- Table structure for table `tblgxp`
--

CREATE TABLE `tblgxp` (
  `pkGxP` int(11) NOT NULL,
  `fldGxP` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblgxp`
--

INSERT INTO `tblgxp` (`pkGxP`, `fldGxP`) VALUES
(1, 1),
(2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbllocation`
--

CREATE TABLE `tbllocation` (
  `pkLocation` int(11) NOT NULL,
  `fldLocation` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbllocation`
--

INSERT INTO `tbllocation` (`pkLocation`, `fldLocation`) VALUES
(8, ''),
(4, '48.00.41'),
(3, '76.02.25'),
(1, '78.03.18');

-- --------------------------------------------------------

--
-- Table structure for table `tblrequester`
--

CREATE TABLE `tblrequester` (
  `pkRequester` int(11) NOT NULL,
  `fldRequester` varchar(28) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblrequester`
--

INSERT INTO `tblrequester` (`pkRequester`, `fldRequester`) VALUES
(17, ''),
(6, 'Alois Gromann'),
(2, 'Christian David'),
(18, 'David Hundsdorff'),
(7, 'Joachim Spörri'),
(4, 'Judith Winsauer'),
(1, 'Rafael Beyeler'),
(11, 'Valdet Murtaj');

-- --------------------------------------------------------

--
-- Table structure for table `tblresponsible`
--

CREATE TABLE `tblresponsible` (
  `pkResponsible` int(11) NOT NULL,
  `fldResponsible` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblresponsible`
--

INSERT INTO `tblresponsible` (`pkResponsible`, `fldResponsible`) VALUES
(1, 'mrahm'),
(2, 'kwinzel1'),
(3, 'nwindler');

-- --------------------------------------------------------

--
-- Table structure for table `tblstatus`
--

CREATE TABLE `tblstatus` (
  `pkStatus` int(11) NOT NULL,
  `fldStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstatus`
--

INSERT INTO `tblstatus` (`pkStatus`, `fldStatus`) VALUES
(1, 'WIP'),
(2, 'Pending'),
(3, 'Closed'),
(4, 'Canceled');

-- --------------------------------------------------------

--
-- Table structure for table `tbltasks`
--

CREATE TABLE `tbltasks` (
  `pkTasks` int(11) NOT NULL,
  `fldTaskNr` varchar(21) NOT NULL,
  `fldRITMNr` varchar(21) NOT NULL,
  `fldCHGNr` varchar(21) DEFAULT NULL,
  `fkCI` int(11) DEFAULT NULL,
  `fkGxP` int(11) DEFAULT NULL,
  `fkRequester` int(11) DEFAULT NULL,
  `fkStatus` int(11) DEFAULT NULL,
  `fldDescription` varchar(40) DEFAULT NULL,
  `fkResponsible` int(11) DEFAULT NULL,
  `fkLocation` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `pkUser` int(11) NOT NULL,
  `fldMail` varchar(28) NOT NULL,
  `fldUsername` varchar(28) NOT NULL,
  `fldVorname` varchar(14) NOT NULL,
  `fldName` varchar(17) NOT NULL,
  `fldPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`pkUser`, `fldMail`, `fldUsername`, `fldVorname`, `fldName`, `fldPassword`) VALUES
(1, 'mrahm@its.jnj.com', 'mrahm', 'Manuel', 'Rahm', '$2y$10$h/z.ruKs0iXx5vH7YH8hLuyzbqMGe9RbU83HEpGjYuVPZPEwxL0Va'),
(2, 'kwinzel1@its.jnj.com', 'kwinzel1', 'Kevin', 'Winzeler', '$2y$10$csoqnvTdZ5HRPyqFVgv3quZ0XxcjykKM2OdFDhzoGPMkjW8u1XnHy'),
(3, 'nwindler@its.jnj.com', 'nwindler', 'Nils', 'Windler', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblci`
--
ALTER TABLE `tblci`
  ADD PRIMARY KEY (`pkCI`),
  ADD UNIQUE KEY `fldCI` (`fldCI`);

--
-- Indexes for table `tblgxp`
--
ALTER TABLE `tblgxp`
  ADD PRIMARY KEY (`pkGxP`);

--
-- Indexes for table `tbllocation`
--
ALTER TABLE `tbllocation`
  ADD PRIMARY KEY (`pkLocation`),
  ADD UNIQUE KEY `fldLocation` (`fldLocation`);

--
-- Indexes for table `tblrequester`
--
ALTER TABLE `tblrequester`
  ADD PRIMARY KEY (`pkRequester`),
  ADD UNIQUE KEY `fldRequester` (`fldRequester`);

--
-- Indexes for table `tblresponsible`
--
ALTER TABLE `tblresponsible`
  ADD PRIMARY KEY (`pkResponsible`);

--
-- Indexes for table `tblstatus`
--
ALTER TABLE `tblstatus`
  ADD PRIMARY KEY (`pkStatus`);

--
-- Indexes for table `tbltasks`
--
ALTER TABLE `tbltasks`
  ADD PRIMARY KEY (`pkTasks`),
  ADD KEY `fkCI` (`fkCI`),
  ADD KEY `fkGxP` (`fkGxP`),
  ADD KEY `fkRequester` (`fkRequester`),
  ADD KEY `fkStatus` (`fkStatus`),
  ADD KEY `fkResponsible` (`fkResponsible`),
  ADD KEY `fkLocation` (`fkLocation`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`pkUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblci`
--
ALTER TABLE `tblci`
  MODIFY `pkCI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tblgxp`
--
ALTER TABLE `tblgxp`
  MODIFY `pkGxP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbllocation`
--
ALTER TABLE `tbllocation`
  MODIFY `pkLocation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblrequester`
--
ALTER TABLE `tblrequester`
  MODIFY `pkRequester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tblresponsible`
--
ALTER TABLE `tblresponsible`
  MODIFY `pkResponsible` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblstatus`
--
ALTER TABLE `tblstatus`
  MODIFY `pkStatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbltasks`
--
ALTER TABLE `tbltasks`
  MODIFY `pkTasks` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `pkUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbltasks`
--
ALTER TABLE `tbltasks`
  ADD CONSTRAINT `tbltasks_ibfk_1` FOREIGN KEY (`fkCI`) REFERENCES `tblci` (`pkCI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbltasks_ibfk_2` FOREIGN KEY (`fkGxP`) REFERENCES `tblgxp` (`pkGxP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbltasks_ibfk_3` FOREIGN KEY (`fkRequester`) REFERENCES `tblrequester` (`pkRequester`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbltasks_ibfk_4` FOREIGN KEY (`fkStatus`) REFERENCES `tblstatus` (`pkStatus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbltasks_ibfk_5` FOREIGN KEY (`fkResponsible`) REFERENCES `tblresponsible` (`pkResponsible`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbltasks_ibfk_6` FOREIGN KEY (`fkLocation`) REFERENCES `tbllocation` (`pkLocation`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
