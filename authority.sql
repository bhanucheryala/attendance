-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2020 at 05:31 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `authority`
--

-- --------------------------------------------------------

--
-- Table structure for table `department_info`
--

CREATE TABLE `department_info` (
  `department_name` varchar(100) NOT NULL,
  `year1` int(11) DEFAULT NULL,
  `year2` int(11) DEFAULT NULL,
  `year3` int(11) DEFAULT NULL,
  `year4` int(11) DEFAULT NULL,
  `number_of_hours_per_day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department_info`
--

INSERT INTO `department_info` (`department_name`, `year1`, `year2`, `year3`, `year4`, `number_of_hours_per_day`) VALUES
('CE', 4, 4, 4, 4, 7),
('CSE', 4, 4, 4, 4, 7),
('ECE', 4, 4, 4, 4, 7),
('EEE', 1, 1, 1, 1, 7),
('IT', 1, 1, 1, 1, 7),
('MBA', 4, 4, 4, 4, 7),
('ME', 4, 4, 4, 4, 7),
('MIN', 1, 1, 1, 1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `hod_login_info`
--

CREATE TABLE `hod_login_info` (
  `hod_id` int(10) UNSIGNED NOT NULL,
  `hod_name` varchar(300) DEFAULT NULL,
  `hod_email` varchar(320) DEFAULT NULL,
  `hod_number` varchar(50) DEFAULT NULL,
  `hod_department` varchar(100) DEFAULT NULL,
  `hod_password` varchar(255) DEFAULT NULL,
  `staff_key` varchar(320) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hod_login_info`
--

INSERT INTO `hod_login_info` (`hod_id`, `hod_name`, `hod_email`, `hod_number`, `hod_department`, `hod_password`, `staff_key`) VALUES
(1, 'HOD1', 'hod1@gmail.com', '9550101039', 'CSE', 'e47f8e2b86de06434785427de6671b70', '86969902'),
(5, 'HOD2', 'hod2@gmail.com', '9090909090', 'ECE', '9f09469b5f144f17967369432bd20944', '87654321');

-- --------------------------------------------------------

--
-- Table structure for table `principal_info`
--

CREATE TABLE `principal_info` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(360) NOT NULL,
  `p_email` varchar(360) NOT NULL,
  `p_pass` varchar(360) NOT NULL,
  `p_phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `principal_info`
--

INSERT INTO `principal_info` (`p_id`, `p_name`, `p_email`, `p_pass`, `p_phone`) VALUES
(1, 'principal', 'principal@gmail.com', 'cd0b0728895e54f3ada23e78fd431216', '1245869575');

-- --------------------------------------------------------

--
-- Table structure for table `staff_login_info`
--

CREATE TABLE `staff_login_info` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(320) NOT NULL,
  `staff_email` varchar(320) NOT NULL,
  `staff_password` varchar(320) NOT NULL,
  `staff_phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_login_info`
--

INSERT INTO `staff_login_info` (`staff_id`, `staff_name`, `staff_email`, `staff_password`, `staff_phone`) VALUES
(20, 'SecondA', 'seconda@gmail.com', '46ca25cd6fe34085913287ebeb2a0fd9', '9090909090'),
(22, 'SecondC', 'secondc@gmail.com', '12176cd65b70597874caa4914bd1cf30', '9505561175'),
(23, 'SecondD', 'secondd@gmail.com', '3f5ae8418d3d6be509762aa45298d98e', '9494103952');

-- --------------------------------------------------------

--
-- Table structure for table `staff_subjects`
--

CREATE TABLE `staff_subjects` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(320) NOT NULL,
  `staff_year` int(11) NOT NULL,
  `staff_section` varchar(50) NOT NULL,
  `staff_subject` varchar(50) NOT NULL,
  `staff_department` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_subjects`
--

INSERT INTO `staff_subjects` (`staff_id`, `staff_name`, `staff_year`, `staff_section`, `staff_subject`, `staff_department`) VALUES
(20, 'SecondA', 2, 'A', 'DBMS', 'CSE'),
(22, 'SecondC', 2, 'B', 'SE', 'CSE'),
(22, 'SecondC', 2, 'C', 'DBMS', 'CSE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department_info`
--
ALTER TABLE `department_info`
  ADD PRIMARY KEY (`department_name`);

--
-- Indexes for table `hod_login_info`
--
ALTER TABLE `hod_login_info`
  ADD PRIMARY KEY (`hod_id`),
  ADD UNIQUE KEY `hod_email` (`hod_email`);

--
-- Indexes for table `principal_info`
--
ALTER TABLE `principal_info`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `staff_login_info`
--
ALTER TABLE `staff_login_info`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `staff_email` (`staff_email`);

--
-- Indexes for table `staff_subjects`
--
ALTER TABLE `staff_subjects`
  ADD PRIMARY KEY (`staff_year`,`staff_section`,`staff_subject`,`staff_department`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hod_login_info`
--
ALTER TABLE `hod_login_info`
  MODIFY `hod_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `principal_info`
--
ALTER TABLE `principal_info`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff_login_info`
--
ALTER TABLE `staff_login_info`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
