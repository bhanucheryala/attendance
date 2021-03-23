-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2020 at 07:10 PM
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
-- Database: `ce`
--

-- --------------------------------------------------------

--
-- Table structure for table `year2_daily_attendance`
--

CREATE TABLE `year2_daily_attendance` (
  `student_id` varchar(30) DEFAULT NULL,
  `student_name` varchar(320) DEFAULT NULL,
  `student_section` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `hour1` int(11) DEFAULT 0,
  `hour2` int(11) DEFAULT 0,
  `hour3` int(11) DEFAULT 0,
  `hour4` int(11) DEFAULT 0,
  `hour5` int(11) DEFAULT 0,
  `hour6` int(11) DEFAULT 0,
  `hour7` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `year2_hourwise`
--

CREATE TABLE `year2_hourwise` (
  `hour_year` int(11) NOT NULL,
  `hour_section` varchar(20) NOT NULL,
  `hour` int(11) NOT NULL,
  `hour_subject` varchar(320) DEFAULT NULL,
  `subject_type` varchar(10) DEFAULT NULL,
  `date` date NOT NULL,
  `hour_count` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `year2_student_info`
--

CREATE TABLE `year2_student_info` (
  `student_id` varchar(50) NOT NULL,
  `student_name` varchar(320) DEFAULT NULL,
  `student_year` int(11) DEFAULT NULL,
  `student_section` varchar(10) DEFAULT NULL,
  `student_phone` varchar(50) DEFAULT NULL,
  `Lab` varchar(30) DEFAULT 'Batch1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `year2_student_info`
--

INSERT INTO `year2_student_info` (`student_id`, `student_name`, `student_year`, `student_section`, `student_phone`, `Lab`) VALUES
('17J41A0146', 'P SAICHARAN REDDY', 2, 'C', '9999999999', 'Batch1'),
('17J41A0163', 'ARJA TARUN', 2, 'C', '9999999999', 'Batch1'),
('17J41A01A1', 'MALINI VISHLESH REDDY', 2, 'C', '9999999999', 'Batch1'),
('17J41A01C6', 'B.CHANDRA KARTHIK REDDY ', 2, 'A', '9999999999', 'Batch1'),
('17J41A01G6', 'S. ROHITH(w.e.f 24/12/19)', 2, 'A', '9999999999', 'Batch1'),
('18J41A0102', 'A SHRUTHI', 2, 'A', '9999999999', 'Batch1'),
('18J41A0103', 'A KRISHNAVENI', 2, 'A', '9999999999', 'Batch1'),
('18J41A0105', 'A AJAY KUMAR REDDY', 2, 'A', '9999999999', 'Batch1'),
('18J41A0106', 'B VIVEK VARDHAN', 2, 'A', '9999999999', 'Batch1'),
('18J41A0107', 'B SHILPA', 2, 'A', '9999999999', 'Batch1'),
('18J41A0108', 'B SRINIVAS REDDY', 2, 'A', '9999999999', 'Batch1'),
('18J41A0109', 'B GANESH', 2, 'A', '9999999999', 'Batch1'),
('18J41A0110', 'B CHANDU YADAV', 2, 'A', '9999999999', 'Batch1'),
('18J41A0111', 'CH. BHAVYASINDHU', 2, 'A', '9999999999', 'Batch1'),
('18J41A0112', 'C. SIVA VENKATA RAJA SEKHAR', 2, 'A', '9999999999', 'Batch1'),
('18J41A0113', 'D. DORASWAMY', 2, 'A', '9999999999', 'Batch1'),
('18J41A0114', 'D.SHANTHIVARDHAN', 2, 'A', '9999999999', 'Batch1'),
('18J41A0116', 'G VIJAYA', 2, 'A', '9999999999', 'Batch1'),
('18J41A0117', 'G VIKAS', 2, 'A', '9999999999', 'Batch1'),
('18J41A0118', 'G SAI SREENU', 2, 'A', '9999999999', 'Batch1'),
('18J41A0119', 'G VENKATESH', 2, 'A', '9999999999', 'Batch1'),
('18J41A0120', 'H KISHAN RAO', 2, 'A', '9999999999', 'Batch1'),
('18J41A0121', 'JADI SAI KEERTHI', 2, 'A', '9999999999', 'Batch1'),
('18J41A0122', 'J CHAITHANYA', 2, 'A', '9999999999', 'Batch1'),
('18J41A0123', 'JALADI YASWANTH', 2, 'A', '9999999999', 'Batch1'),
('18J41A0124', 'JELLA MAHESH CHANDU', 2, 'A', '9999999999', 'Batch1'),
('18J41A0125', 'JOHN SUSHANTH RAJ G', 2, 'A', '9999999999', 'Batch1'),
('18J41A0126', 'KAKI VIKAS', 2, 'A', '9999999999', 'Batch1'),
('18J41A0127', 'K. SRINATH', 2, 'A', '9999999999', 'Batch1'),
('18J41A0128', 'K. PRASHANTH', 2, 'A', '9999999999', 'Batch1'),
('18J41A0129', 'KATAM AKSHAY REDDY', 2, 'A', '9999999999', 'Batch1'),
('18J41A0130', 'K REDDY SAI VINAY REDDY', 2, 'A', '9999999999', 'Batch1'),
('18J41A0131', 'KOTHA MANOJ KUMAR', 2, 'A', '9999999999', 'Batch1'),
('18J41A0132', 'K TARUN CHANDRA DEEP', 2, 'A', '9999999999', 'Batch1'),
('18J41A0133', 'L. ABHISHEK', 2, 'A', '9999999999', 'Batch1'),
('18J41A0134', 'LINGALA RAMU', 2, 'A', '9999999999', 'Batch1'),
('18J41A0135', 'M AASHRITHA', 2, 'A', '9999999999', 'Batch1'),
('18J41A0136', 'MAKTHALA PRUDHVI RAJ GOUD', 2, 'A', '9999999999', 'Batch1'),
('18J41A0137', 'MANNE DIVYA TEJA', 2, 'A', '9999999999', 'Batch1'),
('18J41A0138', 'MOHAMMAD SAJID', 2, 'A', '9999999999', 'Batch1'),
('18J41A0139', 'MOHD BILAL SUFIYAN', 2, 'A', '9999999999', 'Batch1'),
('18J41A0140', 'MOOD NAVEEN NAIK', 2, 'A', '9999999999', 'Batch1'),
('18J41A0141', 'MULA RAVALI', 2, 'A', '9999999999', 'Batch1'),
('18J41A0142', 'MYAKALA VAKUL', 2, 'A', '9999999999', 'Batch1'),
('18J41A0143', 'NAGULA MOKSHITH', 2, 'A', '9999999999', 'Batch1'),
('18J41A0144', 'ORSU SANDEEP', 2, 'A', '9999999999', 'Batch1'),
('18J41A0145', 'P VINAY KANTH REDDY', 2, 'A', '9999999999', 'Batch1'),
('18J41A0146', 'PALLIKONDA RAJESH', 2, 'A', '9999999999', 'Batch1'),
('18J41A0148', 'PECHETTI KONDA', 2, 'A', '9999999999', 'Batch1'),
('18J41A0149', 'PRAVALIKA KUDIKALA', 2, 'A', '9999999999', 'Batch1'),
('18J41A0150', 'PULLA GANGADHAR', 2, 'A', '9999999999', 'Batch1'),
('18J41A0151', 'PURAM SAI KRISHNA', 2, 'A', '9999999999', 'Batch1'),
('18J41A0152', 'SHAIK ALTHAF', 2, 'A', '9999999999', 'Batch1'),
('18J41A0153', 'S. RAGHU', 2, 'A', '9999999999', 'Batch1'),
('18J41A0154', 'S. VERONICA KAMINDLA', 2, 'A', '9999999999', 'Batch1'),
('18J41A0155', 'S. HARIKA', 2, 'A', '9999999999', 'Batch1'),
('18J41A0157', 'TANIPARTHY SANJAY', 2, 'A', '9999999999', 'Batch1'),
('18J41A0158', 'T. SAIVISHAL', 2, 'A', '9999999999', 'Batch1'),
('18J41A0159', 'T. VAMSHI', 2, 'A', '9999999999', 'Batch1'),
('18J41A0160', 'V HEMANTH SAI', 2, 'A', '9999999999', 'Batch1'),
('18J41A0161', 'ABBAS ULLAH KHAN', 2, 'B', '9999999999', 'Batch1'),
('18J41A0162', 'ABDUL GAFOOR', 2, 'B', '9999999999', 'Batch1'),
('18J41A0163', 'ADDAGULLA SATHWIK', 2, 'B', '9999999999', 'Batch1'),
('18J41A0164', 'ALASAKANI SAHITHI', 2, 'B', '9999999999', 'Batch1'),
('18J41A0167', 'AVULA SAI KIRAN GOUD', 2, 'B', '9999999999', 'Batch1'),
('18J41A0168', 'BAIRA BHARATH', 2, 'B', '9999999999', 'Batch1'),
('18J41A0169', 'BANDARI SRIJA', 2, 'B', '9999999999', 'Batch1'),
('18J41A0170', 'BANOTH GOVIND', 2, 'B', '9999999999', 'Batch1'),
('18J41A0172', 'BODASU MANIKANTA', 2, 'B', '9999999999', 'Batch1'),
('18J41A0173', 'B NAVEEN KUMAR', 2, 'B', '9999999999', 'Batch1'),
('18J41A0174', 'CHANDA KEERTHANA', 2, 'B', '9999999999', 'Batch1'),
('18J41A0175', 'C PRANAHITHA', 2, 'B', '9999999999', 'Batch1'),
('18J41A0176', 'CHINTAPALLI MADHU', 2, 'B', '9999999999', 'Batch1'),
('18J41A0177', 'CHITANNOJU RAKESH', 2, 'B', '9999999999', 'Batch1'),
('18J41A0178', 'DAMMALAPATI UDAY', 2, 'B', '9999999999', 'Batch1'),
('18J41A0179', 'DANDE VIJAY', 2, 'B', '9999999999', 'Batch1'),
('18J41A0180', 'ELETI ABHINAV REDDY', 2, 'B', '9999999999', 'Batch1'),
('18J41A0181', 'GARIKAPATI MOUNIKA', 2, 'B', '9999999999', 'Batch1'),
('18J41A0182', 'GOLI SHILPA', 2, 'B', '9999999999', 'Batch1'),
('18J41A0183', 'GOWDA LAKSHMI SUREKHA', 2, 'B', '9999999999', 'Batch1'),
('18J41A0184', 'GUMPENA RAJEEV VARMA', 2, 'B', '9999999999', 'Batch1'),
('18J41A0185', 'JELLA BABU', 2, 'B', '9999999999', 'Batch1'),
('18J41A0186', 'K ABHINAV', 2, 'B', '9999999999', 'Batch1'),
('18J41A0187', 'K SAIRAM REDDY', 2, 'B', '9999999999', 'Batch1'),
('18J41A0188', 'KANDELA SAGAR', 2, 'B', '9999999999', 'Batch1'),
('18J41A0189', 'K SHIVAPRASAD', 2, 'B', '9999999999', 'Batch1'),
('18J41A0190', 'K PRANATHI REDDY', 2, 'B', '9999999999', 'Batch1'),
('18J41A0191', 'KATTA MAHESH BABU', 2, 'B', '9999999999', 'Batch1'),
('18J41A0192', 'KESAGANI SIRISHA', 2, 'B', '9999999999', 'Batch1'),
('18J41A0193', 'KOLUSU SAI RAKESH', 2, 'B', '9999999999', 'Batch1'),
('18J41A0194', 'KOPPU AKASH', 2, 'B', '9999999999', 'Batch1'),
('18J41A0195', 'K NITHIN REDDY', 2, 'B', '9999999999', 'Batch1'),
('18J41A0197', 'K ROHAN REDDY', 2, 'B', '9999999999', 'Batch1'),
('18J41A0198', 'K ABHIJEETH RAO', 2, 'B', '9999999999', 'Batch1'),
('18J41A0199', 'M SAI CHARAN', 2, 'B', '9999999999', 'Batch1'),
('18J41A01A0', 'M JASHWIN SAGAR', 2, 'B', '9999999999', 'Batch1'),
('18J41A01A1', 'M AKHILADEEPTHI', 2, 'B', '9999999999', 'Batch1'),
('18J41A01A2', 'M SAIFUDDIN', 2, 'B', '9999999999', 'Batch1'),
('18J41A01A3', 'M SAIKRISHNA', 2, 'B', '9999999999', 'Batch1'),
('18J41A01A4', 'N SHRAVANI', 2, 'B', '9999999999', 'Batch1'),
('18J41A01A5', 'P PRADEEP KUMAR', 2, 'B', '9999999999', 'Batch1'),
('18J41A01A6', 'P SATHEESH GOWD', 2, 'B', '9999999999', 'Batch1'),
('18J41A01A7', 'P KALYAN', 2, 'B', '9999999999', 'Batch1'),
('18J41A01A8', 'RAYALA PRASAD', 2, 'B', '9999999999', 'Batch1'),
('18J41A01A9', 'R USHASREE CHANDRA', 2, 'B', '9999999999', 'Batch1'),
('18J41A01B0', 'R VICTOR PAUL', 2, 'B', '9999999999', 'Batch1'),
('18J41A01B1', 'SHAIK SHAHI MUNVARSHA', 2, 'B', '9999999999', 'Batch1'),
('18J41A01B2', 'SINGILIDEVI SUDHA', 2, 'B', '9999999999', 'Batch1'),
('18J41A01B3', 'T ARAVIND', 2, 'B', '9999999999', 'Batch1'),
('18J41A01B4', 'TARUN KUMAR YADAV', 2, 'B', '9999999999', 'Batch1'),
('18J41A01B5', 'THALLA RAMYA', 2, 'B', '9999999999', 'Batch1'),
('18J41A01B6', 'THOGARLA RAVI', 2, 'B', '9999999999', 'Batch1'),
('18J41A01B7', 'THOTAPALLI DIVYA', 2, 'B', '9999999999', 'Batch1'),
('18J41A01B8', 'VANGETI BHARGHAV REDDY', 2, 'B', '9999999999', 'Batch1'),
('18J41A01B9', 'YAMALA NARENDRA VARA PRASAD', 2, 'B', '9999999999', 'Batch1'),
('18J41A01C0', 'ZAHEER AZAD', 2, 'B', '9999999999', 'Batch1'),
('18J41A01C1', 'A SAI KRISHNA', 2, 'C', '9999999999', 'Batch1'),
('18J41A01C2', 'ALLU JAGAN SAI', 2, 'C', '9999999999', 'Batch1'),
('18J41A01C3', 'ANTHATI SAITEJA', 2, 'C', '9999999999', 'Batch1'),
('18J41A01C4', 'BANOTH ROJA', 2, 'C', '9999999999', 'Batch1'),
('18J41A01C5', 'BARADHI SAI PRIYA', 2, 'C', '9999999999', 'Batch1'),
('18J41A01C6', 'BATTULA MADHAVARAO', 2, 'C', '9999999999', 'Batch1'),
('18J41A01C8', 'BODA VINESH', 2, 'C', '9999999999', 'Batch1'),
('18J41A01C9', 'BOJA BHUPATHI REDDY', 2, 'C', '9999999999', 'Batch1'),
('18J41A01D0', 'CH ESWAR SAI', 2, 'C', '9999999999', 'Batch1'),
('18J41A01D1', 'CHAKALI SRIKANTH', 2, 'C', '9999999999', 'Batch1'),
('18J41A01D2', 'C PRAMOD GOUD', 2, 'C', '9999999999', 'Batch1'),
('18J41A01D3', 'C LIKHITHA GANGADHAR', 2, 'C', '9999999999', 'Batch1'),
('18J41A01D5', 'D AKHILVARDHAN REDDY', 2, 'C', '9999999999', 'Batch1'),
('18J41A01D6', 'DHATRIK SAI RAJ KARAN', 2, 'C', '9999999999', 'Batch1'),
('18J41A01D7', 'ESAMPALLI ANUDEEP', 2, 'C', '9999999999', 'Batch1'),
('18J41A01D8', 'G TRINAY YADAV', 2, 'C', '9999999999', 'Batch1'),
('18J41A01D9', 'GUDIME PRANAY DHEERAJ', 2, 'C', '9999999999', 'Batch1'),
('18J41A01E0', 'GUGULOTH RAVIKUMAR', 2, 'C', '9999999999', 'Batch1'),
('18J41A01E1', 'JALALWAR VINUTHNA', 2, 'C', '9999999999', 'Batch1'),
('18J41A01E2', 'KADIVETI KISHAN', 2, 'C', '9999999999', 'Batch1'),
('18J41A01E3', 'KAKKIRENI SHIVA', 2, 'C', '9999999999', 'Batch1'),
('18J41A01E4', 'KALLURI AMAR', 2, 'C', '9999999999', 'Batch1'),
('18J41A01E5', 'K PRAVEEN KUMAR', 2, 'C', '9999999999', 'Batch1'),
('18J41A01E6', 'KAPSE JAIPAL', 2, 'C', '9999999999', 'Batch1'),
('18J41A01E7', 'KARAMKANTI VENKATESH', 2, 'C', '9999999999', 'Batch1'),
('18J41A01E8', 'KARRI EEHA PADMA SRI', 2, 'C', '9999999999', 'Batch1'),
('18J41A01E9', 'KEERTANA KANDRAKOTA', 2, 'C', '9999999999', 'Batch1'),
('18J41A01F0', 'KOMURAVELLI SUJITH', 2, 'C', '9999999999', 'Batch1'),
('18J41A01F1', 'KONDAPAKA ROHAN', 2, 'C', '9999999999', 'Batch1'),
('18J41A01F2', 'KUNCHAM SHANMUKHA SAI', 2, 'C', '9999999999', 'Batch1'),
('18J41A01F3', 'K. SOWMYA ', 2, 'C', '9999999999', 'Batch1'),
('18J41A01F4', 'KYATHAM SHRUTHI', 2, 'C', '9999999999', 'Batch1'),
('18J41A01F5', 'LUNAVATH VAMSI', 2, 'C', '9999999999', 'Batch1'),
('18J41A01F6', 'MACHHA SRAVAN KUMAR', 2, 'C', '9999999999', 'Batch1'),
('18J41A01F7', 'ARKALA AKASH YADAV', 2, 'C', '9999999999', 'Batch1'),
('18J41A01F9', 'MOHAMMED AYAAN ALI BAIG', 2, 'C', '9999999999', 'Batch1'),
('18J41A01G0', 'MOHAMMED SUFIYAN', 2, 'C', '9999999999', 'Batch1'),
('18J41A01G1', 'MOHD SHAHZAD AHMED', 2, 'C', '9999999999', 'Batch1'),
('18J41A01G2', 'MUREGE MAHESH', 2, 'C', '9999999999', 'Batch1'),
('18J41A01G3', 'NAGULAPALLY MANIDEEP', 2, 'C', '9999999999', 'Batch1'),
('18J41A01G4', 'PALAKURTHY MOUNIKA', 2, 'C', '9999999999', 'Batch1'),
('18J41A01G5', 'POOSA RITHISH', 2, 'C', '9999999999', 'Batch1'),
('18J41A01G6', 'POSANI RAMPRASAD', 2, 'C', '9999999999', 'Batch1'),
('18J41A01G7', 'PUTTA SANDEEP', 2, 'C', '9999999999', 'Batch1'),
('18J41A01G8', 'RAPELLI DHRUVAKUMAR', 2, 'C', '9999999999', 'Batch1'),
('18J41A01G9', 'RATHOD VAMSHI', 2, 'C', '9999999999', 'Batch1'),
('18J41A01H0', 'REGANI PRATHYUSHA', 2, 'C', '9999999999', 'Batch1'),
('18J41A01H1', 'SAJJA KAVYA SRI', 2, 'C', '9999999999', 'Batch1'),
('18J41A01H3', 'SANDI GEETHA', 2, 'C', '9999999999', 'Batch1'),
('18J41A01H4', 'SHAIK AKRAM', 2, 'C', '9999999999', 'Batch1'),
('18J41A01H6', 'THOTA SPANDANA', 2, 'C', '9999999999', 'Batch1'),
('18J41A01H7', 'THUMULA SAHITHI', 2, 'C', '9999999999', 'Batch1'),
('18J41A01H8', 'VANMA SOUMYA', 2, 'C', '9999999999', 'Batch1'),
('18J41A01H9', 'VASIKARLA PANDU RANGA', 2, 'C', '9999999999', 'Batch1'),
('18J41A01J0', 'Y JITHENDHAR REDDY', 2, 'C', '9999999999', 'Batch1'),
('19J45A0101', 'AZHAR HUSSAIN', 2, 'A', '9999999999', 'Batch1'),
('19J45A0102', 'B ROHINI REDDY ', 2, 'A', '9999999999', 'Batch1'),
('19J45A0103', 'B. BHASKAR', 2, 'A', '9999999999', 'Batch1'),
('19J45A0104', 'B.SHIVAKUMAR', 2, 'A', '9999999999', 'Batch1'),
('19J45A0105', 'C ARUN KUMAR ', 2, 'A', '9999999999', 'Batch1'),
('19J45A0106', 'C. LAHARI ', 2, 'A', '9999999999', 'Batch1'),
('19J45A0107', 'G SRAVANI ', 2, 'B', '9999999999', 'Batch1'),
('19J45A0108', 'G PRAVEEN ', 2, 'B', '9999999999', 'Batch1'),
('19J45A0109', 'J SHRESHTAVI', 2, 'B', '9999999999', 'Batch1'),
('19J45A0110', 'K SHESHU KUMAR ', 2, 'B', '9999999999', 'Batch1'),
('19J45A0111', 'KS CHANDER ', 2, 'B', '9999999999', 'Batch1'),
('19J45A0112', 'M.MANIKANTA PRASAD ', 2, 'B', '9999999999', 'Batch1'),
('19J45A0113', 'MANGALI LATHA ', 2, 'B', '9999999999', 'Batch1'),
('19J45A0114', 'PADALA JAHNAVI', 2, 'C', '9999999999', 'Batch1'),
('19J45A0115', 'PUPPALA ACHARYARAJ ', 2, 'C', '9999999999', 'Batch1'),
('19J45A0116', 'SEESAM CHANDU ', 2, 'C', '9999999999', 'Batch1'),
('19J45A0117', 'VAIKUNTA LAXMI POLASRI ', 2, 'C', '9999999999', 'Batch1'),
('19J45A0118', 'VEMULA ABHISHEK ', 2, 'C', '9999999999', 'Batch1'),
('﻿18J41A0101', 'A PAVAN KUMAR', 2, 'A', '9999999999', 'Batch1');

-- --------------------------------------------------------

--
-- Table structure for table `year2_subject_info`
--

CREATE TABLE `year2_subject_info` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(320) DEFAULT NULL,
  `subject_type` varchar(20) DEFAULT NULL,
  `number_of_hours_assigned` int(11) DEFAULT NULL,
  `A` int(11) DEFAULT 0,
  `B` int(11) DEFAULT 0,
  `C` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `year2_subject_info`
--

INSERT INTO `year2_subject_info` (`subject_id`, `subject_name`, `subject_type`, `number_of_hours_assigned`, `A`, `B`, `C`) VALUES
(1, 'P&S', 'C', 1, 0, 0, 0),
(2, 'SM', 'C', 1, 0, 0, 0),
(3, 'SA', 'C', 1, 0, 0, 0),
(4, 'HHM', 'C', 1, 0, 0, 0),
(5, 'WRE', 'C', 1, 0, 0, 0),
(6, 'CAD LAB', 'L', 3, 0, 0, 0),
(7, 'MFHM LAB', 'L', 3, 0, 0, 0),
(8, 'SA LAB', 'L', 3, 0, 0, 0),
(9, 'Gender Sensitization', 'N', 1, 0, 0, 0),
(10, 'Mentor', 'N', 1, 0, 0, 0),
(11, 'Dashboard', 'N', 2, 0, 0, 0),
(12, 'SoftSkills', 'N', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `year2_total_attendance`
--

CREATE TABLE `year2_total_attendance` (
  `student_id` varchar(50) NOT NULL,
  `student_name` varchar(320) DEFAULT NULL,
  `student_section` varchar(10) DEFAULT NULL,
  `P&S` int(11) DEFAULT 0,
  `SM` int(11) DEFAULT 0,
  `SA` int(11) DEFAULT 0,
  `HHM` int(11) DEFAULT 0,
  `WRE` int(11) DEFAULT 0,
  `CAD LAB` int(11) DEFAULT 0,
  `MFHM LAB` int(11) DEFAULT 0,
  `SA LAB` int(11) DEFAULT 0,
  `Gender Sensitization` int(11) DEFAULT 0,
  `Mentor` int(11) DEFAULT 0,
  `Dashboard` int(11) DEFAULT 0,
  `SoftSkills` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `year2_total_attendance`
--

INSERT INTO `year2_total_attendance` (`student_id`, `student_name`, `student_section`, `P&S`, `SM`, `SA`, `HHM`, `WRE`, `CAD LAB`, `MFHM LAB`, `SA LAB`, `Gender Sensitization`, `Mentor`, `Dashboard`, `SoftSkills`) VALUES
('17J41A0146', 'P SAICHARAN REDDY', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('17J41A0163', 'ARJA TARUN', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('17J41A01A1', 'MALINI VISHLESH REDDY', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('17J41A01C6', 'B.CHANDRA KARTHIK REDDY ', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('17J41A01G6', 'S. ROHITH(w.e.f 24/12/19)', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0102', 'A SHRUTHI', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0103', 'A KRISHNAVENI', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0105', 'A AJAY KUMAR REDDY', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0106', 'B VIVEK VARDHAN', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0107', 'B SHILPA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0108', 'B SRINIVAS REDDY', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0109', 'B GANESH', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0110', 'B CHANDU YADAV', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0111', 'CH. BHAVYASINDHU', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0112', 'C. SIVA VENKATA RAJA SEKHAR', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0113', 'D. DORASWAMY', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0114', 'D.SHANTHIVARDHAN', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0116', 'G VIJAYA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0117', 'G VIKAS', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0118', 'G SAI SREENU', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0119', 'G VENKATESH', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0120', 'H KISHAN RAO', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0121', 'JADI SAI KEERTHI', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0122', 'J CHAITHANYA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0123', 'JALADI YASWANTH', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0124', 'JELLA MAHESH CHANDU', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0125', 'JOHN SUSHANTH RAJ G', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0126', 'KAKI VIKAS', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0127', 'K. SRINATH', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0128', 'K. PRASHANTH', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0129', 'KATAM AKSHAY REDDY', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0130', 'K REDDY SAI VINAY REDDY', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0131', 'KOTHA MANOJ KUMAR', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0132', 'K TARUN CHANDRA DEEP', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0133', 'L. ABHISHEK', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0134', 'LINGALA RAMU', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0135', 'M AASHRITHA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0136', 'MAKTHALA PRUDHVI RAJ GOUD', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0137', 'MANNE DIVYA TEJA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0138', 'MOHAMMAD SAJID', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0139', 'MOHD BILAL SUFIYAN', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0140', 'MOOD NAVEEN NAIK', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0141', 'MULA RAVALI', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0142', 'MYAKALA VAKUL', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0143', 'NAGULA MOKSHITH', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0144', 'ORSU SANDEEP', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0145', 'P VINAY KANTH REDDY', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0146', 'PALLIKONDA RAJESH', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0148', 'PECHETTI KONDA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0149', 'PRAVALIKA KUDIKALA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0150', 'PULLA GANGADHAR', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0151', 'PURAM SAI KRISHNA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0152', 'SHAIK ALTHAF', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0153', 'S. RAGHU', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0154', 'S. VERONICA KAMINDLA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0155', 'S. HARIKA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0157', 'TANIPARTHY SANJAY', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0158', 'T. SAIVISHAL', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0159', 'T. VAMSHI', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0160', 'V HEMANTH SAI', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0161', 'ABBAS ULLAH KHAN', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0162', 'ABDUL GAFOOR', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0163', 'ADDAGULLA SATHWIK', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0164', 'ALASAKANI SAHITHI', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0167', 'AVULA SAI KIRAN GOUD', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0168', 'BAIRA BHARATH', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0169', 'BANDARI SRIJA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0170', 'BANOTH GOVIND', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0172', 'BODASU MANIKANTA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0173', 'B NAVEEN KUMAR', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0174', 'CHANDA KEERTHANA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0175', 'C PRANAHITHA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0176', 'CHINTAPALLI MADHU', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0177', 'CHITANNOJU RAKESH', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0178', 'DAMMALAPATI UDAY', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0179', 'DANDE VIJAY', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0180', 'ELETI ABHINAV REDDY', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0181', 'GARIKAPATI MOUNIKA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0182', 'GOLI SHILPA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0183', 'GOWDA LAKSHMI SUREKHA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0184', 'GUMPENA RAJEEV VARMA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0185', 'JELLA BABU', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0186', 'K ABHINAV', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0187', 'K SAIRAM REDDY', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0188', 'KANDELA SAGAR', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0189', 'K SHIVAPRASAD', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0190', 'K PRANATHI REDDY', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0191', 'KATTA MAHESH BABU', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0192', 'KESAGANI SIRISHA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0193', 'KOLUSU SAI RAKESH', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0194', 'KOPPU AKASH', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0195', 'K NITHIN REDDY', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0197', 'K ROHAN REDDY', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0198', 'K ABHIJEETH RAO', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A0199', 'M SAI CHARAN', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01A0', 'M JASHWIN SAGAR', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01A1', 'M AKHILADEEPTHI', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01A2', 'M SAIFUDDIN', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01A3', 'M SAIKRISHNA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01A4', 'N SHRAVANI', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01A5', 'P PRADEEP KUMAR', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01A6', 'P SATHEESH GOWD', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01A7', 'P KALYAN', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01A8', 'RAYALA PRASAD', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01A9', 'R USHASREE CHANDRA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01B0', 'R VICTOR PAUL', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01B1', 'SHAIK SHAHI MUNVARSHA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01B2', 'SINGILIDEVI SUDHA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01B3', 'T ARAVIND', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01B4', 'TARUN KUMAR YADAV', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01B5', 'THALLA RAMYA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01B6', 'THOGARLA RAVI', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01B7', 'THOTAPALLI DIVYA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01B8', 'VANGETI BHARGHAV REDDY', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01B9', 'YAMALA NARENDRA VARA PRASAD', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01C0', 'ZAHEER AZAD', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01C1', 'A SAI KRISHNA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01C2', 'ALLU JAGAN SAI', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01C3', 'ANTHATI SAITEJA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01C4', 'BANOTH ROJA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01C5', 'BARADHI SAI PRIYA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01C6', 'BATTULA MADHAVARAO', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01C8', 'BODA VINESH', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01C9', 'BOJA BHUPATHI REDDY', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01D0', 'CH ESWAR SAI', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01D1', 'CHAKALI SRIKANTH', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01D2', 'C PRAMOD GOUD', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01D3', 'C LIKHITHA GANGADHAR', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01D5', 'D AKHILVARDHAN REDDY', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01D6', 'DHATRIK SAI RAJ KARAN', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01D7', 'ESAMPALLI ANUDEEP', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01D8', 'G TRINAY YADAV', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01D9', 'GUDIME PRANAY DHEERAJ', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01E0', 'GUGULOTH RAVIKUMAR', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01E1', 'JALALWAR VINUTHNA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01E2', 'KADIVETI KISHAN', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01E3', 'KAKKIRENI SHIVA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01E4', 'KALLURI AMAR', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01E5', 'K PRAVEEN KUMAR', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01E6', 'KAPSE JAIPAL', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01E7', 'KARAMKANTI VENKATESH', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01E8', 'KARRI EEHA PADMA SRI', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01E9', 'KEERTANA KANDRAKOTA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01F0', 'KOMURAVELLI SUJITH', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01F1', 'KONDAPAKA ROHAN', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01F2', 'KUNCHAM SHANMUKHA SAI', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01F3', 'K. SOWMYA ', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01F4', 'KYATHAM SHRUTHI', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01F5', 'LUNAVATH VAMSI', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01F6', 'MACHHA SRAVAN KUMAR', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01F7', 'ARKALA AKASH YADAV', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01F9', 'MOHAMMED AYAAN ALI BAIG', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01G0', 'MOHAMMED SUFIYAN', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01G1', 'MOHD SHAHZAD AHMED', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01G2', 'MUREGE MAHESH', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01G3', 'NAGULAPALLY MANIDEEP', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01G4', 'PALAKURTHY MOUNIKA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01G5', 'POOSA RITHISH', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01G6', 'POSANI RAMPRASAD', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01G7', 'PUTTA SANDEEP', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01G8', 'RAPELLI DHRUVAKUMAR', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01G9', 'RATHOD VAMSHI', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01H0', 'REGANI PRATHYUSHA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01H1', 'SAJJA KAVYA SRI', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01H3', 'SANDI GEETHA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01H4', 'SHAIK AKRAM', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01H6', 'THOTA SPANDANA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01H7', 'THUMULA SAHITHI', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01H8', 'VANMA SOUMYA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01H9', 'VASIKARLA PANDU RANGA', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('18J41A01J0', 'Y JITHENDHAR REDDY', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('19J45A0101', 'AZHAR HUSSAIN', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('19J45A0102', 'B ROHINI REDDY ', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('19J45A0103', 'B. BHASKAR', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('19J45A0104', 'B.SHIVAKUMAR', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('19J45A0105', 'C ARUN KUMAR ', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('19J45A0106', 'C. LAHARI ', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('19J45A0107', 'G SRAVANI ', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('19J45A0108', 'G PRAVEEN ', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('19J45A0109', 'J SHRESHTAVI', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('19J45A0110', 'K SHESHU KUMAR ', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('19J45A0111', 'KS CHANDER ', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('19J45A0112', 'M.MANIKANTA PRASAD ', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('19J45A0113', 'MANGALI LATHA ', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('19J45A0114', 'PADALA JAHNAVI', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('19J45A0115', 'PUPPALA ACHARYARAJ ', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('19J45A0116', 'SEESAM CHANDU ', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('19J45A0117', 'VAIKUNTA LAXMI POLASRI ', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('19J45A0118', 'VEMULA ABHISHEK ', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
('﻿18J41A0101', 'A PAVAN KUMAR', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `year3_daily_attendance`
--

CREATE TABLE `year3_daily_attendance` (
  `student_id` varchar(30) DEFAULT NULL,
  `student_name` varchar(320) DEFAULT NULL,
  `student_section` varchar(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `hour1` int(11) DEFAULT 0,
  `hour2` int(11) DEFAULT 0,
  `hour3` int(11) DEFAULT 0,
  `hour4` int(11) DEFAULT 0,
  `hour5` int(11) DEFAULT 0,
  `hour6` int(11) DEFAULT 0,
  `hour7` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `year3_hourwise`
--

CREATE TABLE `year3_hourwise` (
  `hour_year` int(11) NOT NULL,
  `hour_section` varchar(20) NOT NULL,
  `hour` int(11) NOT NULL,
  `hour_subject` varchar(320) DEFAULT NULL,
  `subject_type` varchar(10) DEFAULT NULL,
  `date` date NOT NULL,
  `hour_count` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `year3_student_info`
--

CREATE TABLE `year3_student_info` (
  `student_id` varchar(50) NOT NULL,
  `student_name` varchar(320) DEFAULT NULL,
  `student_year` int(11) DEFAULT NULL,
  `student_section` varchar(10) DEFAULT NULL,
  `student_phone` varchar(50) DEFAULT NULL,
  `professional_elective` varchar(320) DEFAULT '0',
  `open_elective` varchar(320) DEFAULT '0',
  `Lab` varchar(30) DEFAULT 'Batch1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `year3_student_info`
--

INSERT INTO `year3_student_info` (`student_id`, `student_name`, `student_year`, `student_section`, `student_phone`, `professional_elective`, `open_elective`, `Lab`) VALUES
('15J41A0114', 'DULAM SAI GANESH', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('15J41A01H2', 'R.SAITEJA', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('16J41A0120', 'E.KISHAN', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('16J41A01A5', 'P. CHANIKYA RAO ', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('16J41A01A9', 'SAFA VAZEER MOHAMMAD SAHAB', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('16J41A01B7', 'V.SRAVAN SAI', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0103', 'ANABATTULA NITIN', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0104', 'A THARUN VAMSHI', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0105', 'A NITHISH KUMAR REDDY', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0106', 'AREKANTI PRABHU DAS', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0107', 'BANDARU GANESH', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0108', 'BANOTH SANTHOSH', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0109', 'B RAJESWARI HARINI', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0110', 'BODAKUNTA SRINIVAS', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0111', 'BODDU VAMSI KRISHNA', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0112', 'BOLLIGORLA LOKESH ', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0113', 'B RAHUL VARMA', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0115', 'CH SAMARASIMHA REDDY', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0116', 'CHITYALA RAJU', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0117', 'D NIKITHA', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0118', 'DARAM SAROJINI', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0120', 'GAJULA SRINIJA', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0121', 'G SHIVA PRASAD YADAV', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0122', 'GOPATHI AJAYKUMAR', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0123', 'GUJJALA LAVANYA', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0124', 'GURRAM DEVARAJ', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0126', 'INDLA HARIKA', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0127', 'JENAKI RAJESH KUMAR', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0128', 'K RAJASHEKAR', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0129', 'KANDUKURI DURGA SAI', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0131', 'K KALPANA APARANJITHA', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0132', 'KATIKALA GOPI', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0134', 'K MITHUN KUMAR', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0135', 'L BHANU PRAKASH', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0136', 'M SRI SHARAN GOUD', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0137', 'MADUGULA RAMYA', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0138', 'MOGULAGANI MAHESH', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0139', 'MOHAMMAD IDREES', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0140', 'MOOTA NAVEEN', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0141', 'M KARUNAKAR REDDY', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0143', 'PEDDI ARUN KUMAR', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0145', 'PULA VAMSHI KRISHNA', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0147', 'RACHALA ABHISHEK', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0148', 'R BHARADWAJA', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0150', 'SEVA SAMSON RAJ', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0151', 'SHAIK BAJI BABA', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0152', 'SHEELAM PRAVALIKA', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0153', 'T ADITHYA', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0154', 'T SHIVA KUMAR', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0155', 'THOMMANDRU BLESSY', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0156', 'U CHANDRA SEKHAR', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0157', 'V AJAY KUMAR RAJU', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0159', 'V NAVEENKUMAR REDDY', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0160', 'V SAI PAVAN REDDY', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('17J41A0162', 'ANAGANTI PADMAJA', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0165', 'B RAMU NAIK', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0166', 'B REETIKA REDDY', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0167', 'BANOTH ANUSHITHA', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0168', 'BATTINA VAISHNAVI', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0169', 'BATTINI ALAIKYA', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0170', 'BHAITHI ANIL KUMAR', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0171', 'BIRRU GAGANSAI', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0172', 'BODA MOUNIKA', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0173', 'BODDU MAHENDRA', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0175', 'CHALLA RAJU', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0176', 'CHILUKAMARRI VIVEK', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0177', 'CHINNAM AMRUTHA', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0178', 'CH VAMSHIDHAR SAI', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0179', 'CHI SHIVA KRISHNA', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0180', 'D SATHVIK REDDY', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0181', 'D RAHUL VARMA', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0182', 'DUMPALA YAMINI', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0183', 'G UDAY KUMAR', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0184', 'GADDE SAI GIRISH', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0185', 'G MEGHANA', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0186', 'G MANASWINI', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0187', 'G AKHIL NAIK', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0188', 'GYAMUNA', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0189', 'GUNJA NAVEEN', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0190', 'J DIVYA BHARATHI', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0191', 'K N S NITESH', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0192', 'KVENKATASAI', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0193', 'K DHEERAJ KUMAR REDDY', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0194', 'K CHANDRASHEKAR', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0195', 'K SHRAVANI', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0196', 'K PRAVALIKA', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0197', 'K  VAISHNAVI', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A0199', 'K VIDYA SAGAR REDDY', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A01A0', 'M SHIVA TEJA', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A01A3', 'MEKA SUCHETHA', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A01A4', 'N LOKESH VARMA', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A01A5', 'N HARSHA VARDHAN REDDY', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A01A7', 'PI SANJAY KUMAR REDDY', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A01A8', 'PURVAM SAI TEJA', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A01A9', 'R  SUMANTH', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A01B0', 'RANI SAI SRIKAR', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A01B1', 'REKALA SNEHA', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A01B2', 'S  RAMAKRISHNA', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A01B3', 'S SINGH THAKUR', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A01B4', 'SOLLOJU NAGESH', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A01B6', 'TMAHESH VARMA', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A01B7', 'U SANKEERTH REDDY ', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A01B8', 'V PRASHANTH', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A01B9', 'V SHIVA SAITEJA', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A01C0', 'V   SAINEERAJ', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('17J41A01C1', 'AKULA ARUN KUMAR', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01C2', 'AKULA SRINIKHIL KUMAR', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01C3', 'AVASARALA  KARTHIK', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01C4', 'B PRAVALIKA', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01C5', 'BAKSHI HARAPOORNAJA', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01C7', 'BATTINI NARSIMHA RAO', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01C8', 'BHUKYA SWAPNA', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01C9', 'BURRI JEEVAN REDDY', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01D0', 'DASARI NAVEEN', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01D1', 'DEEKSHITH JABBA', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01D2', 'D RISHIVARDHAN REDDY', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01D3', 'D NAVYA CHARITHA', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01D4', 'E BHANU CHANDER', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01D5', 'GOPALADASU CHAITANYA SAI', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01D6', 'G SHIVA CHAITHANYA', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01D7', 'GUNTHA SAIESH', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01D8', 'JAJOLLA BHARATH SAGAR', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01D9', 'K LAKSHMI PRANATHI', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01E0', 'K VENKATASAI', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01E1', 'KUNCHALA SINDHU PRIYA', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01E2', 'KURA RAMU', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01E3', 'KUTURU SAI SUJITH', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01E4', 'M MOHAN KUMAR', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01E5', 'MACHARLA AHARSHYA', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01E6', 'MADALA DINESH KUMAR', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01E7', 'MAGAM HRITHIK REDDY', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01E8', 'MALAHA MOHITH', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01F0', 'MANDALA VINAY KUMAR', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01F1', 'MATTEWADA NAVEEN', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01F2', 'MOHAMMAD RAHEEM', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01F3', 'NRAKESH REDDY', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01F4', 'NAVOTHU BHARANI', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01F5', 'NETHETLA NARESH', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01F6', 'NIMMALA ANJALA', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01F7', 'NUNAVATH DASU', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01F9', 'POGULA KARTHIK', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01G1', 'PRATHISHTA GAJULA', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01G2', 'R PRAVEEN KUMAR', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01G4', 'S BALA SAI VIVEK', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01G5', 'SHAIK ARSHAD ALI', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01G7', 'TALLURI LAXMI DURGA', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01G9', 'THAMMISHETTI PAVAN', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01H0', 'TIKARAM DINESH KUMAR', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01H1', 'UTLA KUSUMA SOURAV', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01H3', 'VANTALA SUKANYA', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01H4', 'VELUPULA SHIVASAI', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01H5', 'VEMULA SOWMYA', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01H6', 'VOJJA PRATHYUSHA', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('17J41A01H7', 'VOOTURI ROHAN BABU', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('18J45A0101', 'A.INDUSRI', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('18J45A0102', 'A.PRUDVIRAJ', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('18J45A0103', 'B.VAMSHI', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('18J45A0104', 'B.VINAYKUMAR', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('18J45A0105', 'CHANDAN SRIJANI', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('18J45A0106', 'CH. VENNELA', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('18J45A0107', 'G.NAVEEN', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('18J45A0108', 'G.KALYAN KUMAR', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('18J45A0109', 'G.BHAVANI', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('18J45A0110', 'J.MOHAN', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('18J45A0111', 'K.ANUSHA', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('18J45A0112', 'K.SRINIVASA REDDY', 3, 'A', '9999999999', '0', '0', 'Batch1'),
('18J45A0113', 'K AMARENDER', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('18J45A0114', 'K  BHANUTEJA', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('18J45A0115', 'K GANESH', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('18J45A0116', 'KOSARI ', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('18J45A0117', 'K NAGARAJU', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('18J45A0118', 'M SHASHIKANTH REDDY', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('18J45A0119', 'M VENUMADHURI', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('18J45A0120', 'MADHURI MADHAVI', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('18J45A0121', 'M DHYANASRI', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('18J45A0122', 'MASANI ABHINAY', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('18J45A0123', 'MENCHU NAVEEN', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('18J45A0124', 'MOHAMMAD SAHIL', 3, 'B', '9999999999', '0', '0', 'Batch1'),
('18J45A0125', 'MUDAVATH SANDHYA', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('18J45A0126', 'MUDIMELA PRIYANKA', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('18J45A0127', 'NAGARLA SHIRISHA', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('18J45A0128', 'ODELA RAKESH', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('18J45A0129', 'OMKARI SRIKANTH', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('18J45A0130', 'P NITHIN KUMAR REDDY', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('18J45A0131', 'P ANAND REDDY', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('18J45A0132', 'R SANDEEP KUMAR', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('18J45A0133', 'SHAIK ASMAR NAWAZ', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('18J45A0134', 'TAMISETTY MAHESH BABU', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('18J45A0135', 'TOGITI DHEERAJ', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('18J45A0136', 'VELPULA HARISH', 3, 'C', '9999999999', '0', '0', 'Batch1'),
('﻿17J41A0102', 'A BHAVANI KISHORE', 3, 'A', '9999999999', '0', '0', 'Batch1');

-- --------------------------------------------------------

--
-- Table structure for table `year3_subject_info`
--

CREATE TABLE `year3_subject_info` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(320) DEFAULT NULL,
  `subject_type` varchar(20) DEFAULT NULL,
  `number_of_hours_assigned` int(11) DEFAULT NULL,
  `A` int(11) DEFAULT 0,
  `B` int(11) DEFAULT 0,
  `C` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `year3_subject_info`
--

INSERT INTO `year3_subject_info` (`subject_id`, `subject_name`, `subject_type`, `number_of_hours_assigned`, `A`, `B`, `C`) VALUES
(1, 'DSS', 'C', 1, 0, 0, 0),
(2, 'WRE', 'C', 1, 0, 0, 0),
(3, 'TE', 'C', 1, 0, 0, 0),
(4, 'ASA', 'C', 1, 0, 0, 0),
(5, 'TE LAB', 'L', 3, 0, 0, 0),
(6, 'CADD LAB', 'L', 3, 0, 0, 0),
(7, 'CEM', 'P', 1, 0, 0, 0),
(8, 'IM', 'O', 1, 0, 0, 0),
(9, 'Techinical Seminar', 'N', 2, 0, 0, 0),
(10, 'Mentor', 'N', 1, 0, 0, 0),
(11, 'Dashboard', 'N', 2, 0, 0, 0),
(12, 'SoftSkills', 'N', 1, 0, 0, 0),
(13, 'ProfessionalEthics', 'N', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `year3_total_attendance`
--

CREATE TABLE `year3_total_attendance` (
  `student_id` varchar(50) NOT NULL,
  `student_name` varchar(320) DEFAULT NULL,
  `student_section` varchar(10) DEFAULT NULL,
  `DSS` int(11) DEFAULT 0,
  `WRE` int(11) DEFAULT 0,
  `TE` int(11) DEFAULT 0,
  `ASA` int(11) DEFAULT 0,
  `TE LAB` int(11) DEFAULT 0,
  `CADD LAB` int(11) DEFAULT 0,
  `Techinical Seminar` int(11) DEFAULT 0,
  `Mentor` int(11) DEFAULT 0,
  `Dashboard` int(11) DEFAULT 0,
  `SoftSkills` int(11) DEFAULT 0,
  `ProfessionalEthics` int(11) DEFAULT 0,
  `CEM` int(11) DEFAULT -1,
  `IM` int(11) DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `year3_total_attendance`
--

INSERT INTO `year3_total_attendance` (`student_id`, `student_name`, `student_section`, `DSS`, `WRE`, `TE`, `ASA`, `TE LAB`, `CADD LAB`, `Techinical Seminar`, `Mentor`, `Dashboard`, `SoftSkills`, `ProfessionalEthics`, `CEM`, `IM`) VALUES
('15J41A0114', 'DULAM SAI GANESH', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('15J41A01H2', 'R.SAITEJA', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('16J41A0120', 'E.KISHAN', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('16J41A01A5', 'P. CHANIKYA RAO ', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('16J41A01A9', 'SAFA VAZEER MOHAMMAD SAHAB', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('16J41A01B7', 'V.SRAVAN SAI', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0103', 'ANABATTULA NITIN', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0104', 'A THARUN VAMSHI', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0105', 'A NITHISH KUMAR REDDY', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0106', 'AREKANTI PRABHU DAS', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0107', 'BANDARU GANESH', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0108', 'BANOTH SANTHOSH', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0109', 'B RAJESWARI HARINI', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0110', 'BODAKUNTA SRINIVAS', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0111', 'BODDU VAMSI KRISHNA', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0112', 'BOLLIGORLA LOKESH ', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0113', 'B RAHUL VARMA', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0115', 'CH SAMARASIMHA REDDY', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0116', 'CHITYALA RAJU', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0117', 'D NIKITHA', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0118', 'DARAM SAROJINI', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0120', 'GAJULA SRINIJA', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0121', 'G SHIVA PRASAD YADAV', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0122', 'GOPATHI AJAYKUMAR', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0123', 'GUJJALA LAVANYA', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0124', 'GURRAM DEVARAJ', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0126', 'INDLA HARIKA', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0127', 'JENAKI RAJESH KUMAR', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0128', 'K RAJASHEKAR', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0129', 'KANDUKURI DURGA SAI', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0131', 'K KALPANA APARANJITHA', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0132', 'KATIKALA GOPI', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0134', 'K MITHUN KUMAR', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0135', 'L BHANU PRAKASH', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0136', 'M SRI SHARAN GOUD', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0137', 'MADUGULA RAMYA', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0138', 'MOGULAGANI MAHESH', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0139', 'MOHAMMAD IDREES', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0140', 'MOOTA NAVEEN', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0141', 'M KARUNAKAR REDDY', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0143', 'PEDDI ARUN KUMAR', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0145', 'PULA VAMSHI KRISHNA', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0147', 'RACHALA ABHISHEK', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0148', 'R BHARADWAJA', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0150', 'SEVA SAMSON RAJ', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0151', 'SHAIK BAJI BABA', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0152', 'SHEELAM PRAVALIKA', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0153', 'T ADITHYA', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0154', 'T SHIVA KUMAR', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0155', 'THOMMANDRU BLESSY', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0156', 'U CHANDRA SEKHAR', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0157', 'V AJAY KUMAR RAJU', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0159', 'V NAVEENKUMAR REDDY', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0160', 'V SAI PAVAN REDDY', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0162', 'ANAGANTI PADMAJA', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0165', 'B RAMU NAIK', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0166', 'B REETIKA REDDY', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0167', 'BANOTH ANUSHITHA', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0168', 'BATTINA VAISHNAVI', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0169', 'BATTINI ALAIKYA', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0170', 'BHAITHI ANIL KUMAR', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0171', 'BIRRU GAGANSAI', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0172', 'BODA MOUNIKA', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0173', 'BODDU MAHENDRA', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0175', 'CHALLA RAJU', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0176', 'CHILUKAMARRI VIVEK', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0177', 'CHINNAM AMRUTHA', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0178', 'CH VAMSHIDHAR SAI', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0179', 'CHI SHIVA KRISHNA', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0180', 'D SATHVIK REDDY', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0181', 'D RAHUL VARMA', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0182', 'DUMPALA YAMINI', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0183', 'G UDAY KUMAR', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0184', 'GADDE SAI GIRISH', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0185', 'G MEGHANA', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0186', 'G MANASWINI', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0187', 'G AKHIL NAIK', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0188', 'GYAMUNA', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0189', 'GUNJA NAVEEN', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0190', 'J DIVYA BHARATHI', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0191', 'K N S NITESH', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0192', 'KVENKATASAI', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0193', 'K DHEERAJ KUMAR REDDY', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0194', 'K CHANDRASHEKAR', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0195', 'K SHRAVANI', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0196', 'K PRAVALIKA', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0197', 'K  VAISHNAVI', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A0199', 'K VIDYA SAGAR REDDY', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01A0', 'M SHIVA TEJA', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01A3', 'MEKA SUCHETHA', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01A4', 'N LOKESH VARMA', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01A5', 'N HARSHA VARDHAN REDDY', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01A7', 'PI SANJAY KUMAR REDDY', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01A8', 'PURVAM SAI TEJA', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01A9', 'R  SUMANTH', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01B0', 'RANI SAI SRIKAR', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01B1', 'REKALA SNEHA', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01B2', 'S  RAMAKRISHNA', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01B3', 'S SINGH THAKUR', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01B4', 'SOLLOJU NAGESH', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01B6', 'TMAHESH VARMA', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01B7', 'U SANKEERTH REDDY ', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01B8', 'V PRASHANTH', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01B9', 'V SHIVA SAITEJA', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01C0', 'V   SAINEERAJ', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01C1', 'AKULA ARUN KUMAR', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01C2', 'AKULA SRINIKHIL KUMAR', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01C3', 'AVASARALA  KARTHIK', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01C4', 'B PRAVALIKA', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01C5', 'BAKSHI HARAPOORNAJA', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01C7', 'BATTINI NARSIMHA RAO', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01C8', 'BHUKYA SWAPNA', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01C9', 'BURRI JEEVAN REDDY', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01D0', 'DASARI NAVEEN', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01D1', 'DEEKSHITH JABBA', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01D2', 'D RISHIVARDHAN REDDY', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01D3', 'D NAVYA CHARITHA', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01D4', 'E BHANU CHANDER', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01D5', 'GOPALADASU CHAITANYA SAI', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01D6', 'G SHIVA CHAITHANYA', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01D7', 'GUNTHA SAIESH', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01D8', 'JAJOLLA BHARATH SAGAR', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01D9', 'K LAKSHMI PRANATHI', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01E0', 'K VENKATASAI', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01E1', 'KUNCHALA SINDHU PRIYA', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01E2', 'KURA RAMU', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01E3', 'KUTURU SAI SUJITH', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01E4', 'M MOHAN KUMAR', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01E5', 'MACHARLA AHARSHYA', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01E6', 'MADALA DINESH KUMAR', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01E7', 'MAGAM HRITHIK REDDY', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01E8', 'MALAHA MOHITH', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01F0', 'MANDALA VINAY KUMAR', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01F1', 'MATTEWADA NAVEEN', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01F2', 'MOHAMMAD RAHEEM', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01F3', 'NRAKESH REDDY', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01F4', 'NAVOTHU BHARANI', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01F5', 'NETHETLA NARESH', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01F6', 'NIMMALA ANJALA', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01F7', 'NUNAVATH DASU', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01F9', 'POGULA KARTHIK', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01G1', 'PRATHISHTA GAJULA', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01G2', 'R PRAVEEN KUMAR', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01G4', 'S BALA SAI VIVEK', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01G5', 'SHAIK ARSHAD ALI', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01G7', 'TALLURI LAXMI DURGA', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01G9', 'THAMMISHETTI PAVAN', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01H0', 'TIKARAM DINESH KUMAR', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01H1', 'UTLA KUSUMA SOURAV', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01H3', 'VANTALA SUKANYA', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01H4', 'VELUPULA SHIVASAI', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01H5', 'VEMULA SOWMYA', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01H6', 'VOJJA PRATHYUSHA', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('17J41A01H7', 'VOOTURI ROHAN BABU', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0101', 'A.INDUSRI', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0102', 'A.PRUDVIRAJ', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0103', 'B.VAMSHI', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0104', 'B.VINAYKUMAR', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0105', 'CHANDAN SRIJANI', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0106', 'CH. VENNELA', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0107', 'G.NAVEEN', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0108', 'G.KALYAN KUMAR', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0109', 'G.BHAVANI', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0110', 'J.MOHAN', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0111', 'K.ANUSHA', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0112', 'K.SRINIVASA REDDY', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0113', 'K AMARENDER', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0114', 'K  BHANUTEJA', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0115', 'K GANESH', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0116', 'KOSARI ', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0117', 'K NAGARAJU', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0118', 'M SHASHIKANTH REDDY', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0119', 'M VENUMADHURI', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0120', 'MADHURI MADHAVI', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0121', 'M DHYANASRI', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0122', 'MASANI ABHINAY', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0123', 'MENCHU NAVEEN', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0124', 'MOHAMMAD SAHIL', 'B', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0125', 'MUDAVATH SANDHYA', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0126', 'MUDIMELA PRIYANKA', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0127', 'NAGARLA SHIRISHA', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0128', 'ODELA RAKESH', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0129', 'OMKARI SRIKANTH', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0130', 'P NITHIN KUMAR REDDY', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0131', 'P ANAND REDDY', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0132', 'R SANDEEP KUMAR', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0133', 'SHAIK ASMAR NAWAZ', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0134', 'TAMISETTY MAHESH BABU', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0135', 'TOGITI DHEERAJ', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('18J45A0136', 'VELPULA HARISH', 'C', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1),
('﻿17J41A0102', 'A BHAVANI KISHORE', 'A', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, -1, -1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `year2_daily_attendance`
--
ALTER TABLE `year2_daily_attendance`
  ADD UNIQUE KEY `student_id` (`student_id`,`date`);

--
-- Indexes for table `year2_hourwise`
--
ALTER TABLE `year2_hourwise`
  ADD PRIMARY KEY (`hour_year`,`hour_section`,`hour`,`date`);

--
-- Indexes for table `year2_student_info`
--
ALTER TABLE `year2_student_info`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `year2_subject_info`
--
ALTER TABLE `year2_subject_info`
  ADD PRIMARY KEY (`subject_id`),
  ADD UNIQUE KEY `subject_name` (`subject_name`);

--
-- Indexes for table `year2_total_attendance`
--
ALTER TABLE `year2_total_attendance`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `year3_daily_attendance`
--
ALTER TABLE `year3_daily_attendance`
  ADD UNIQUE KEY `student_id` (`student_id`,`date`);

--
-- Indexes for table `year3_hourwise`
--
ALTER TABLE `year3_hourwise`
  ADD PRIMARY KEY (`hour_year`,`hour_section`,`hour`,`date`);

--
-- Indexes for table `year3_student_info`
--
ALTER TABLE `year3_student_info`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `year3_subject_info`
--
ALTER TABLE `year3_subject_info`
  ADD PRIMARY KEY (`subject_id`),
  ADD UNIQUE KEY `subject_name` (`subject_name`);

--
-- Indexes for table `year3_total_attendance`
--
ALTER TABLE `year3_total_attendance`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `year2_subject_info`
--
ALTER TABLE `year2_subject_info`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `year3_subject_info`
--
ALTER TABLE `year3_subject_info`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
