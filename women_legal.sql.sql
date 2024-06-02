-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2023 at 11:28 AM
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
-- Database: `women_legal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `user_id` int(100) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `created_date` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`user_id`, `name`, `email`, `password`, `mobile`, `created_date`) VALUES
(2, 'Admin', 'admin@gmail.com', 'test', '1234567890', '2023-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `advocate`
--

CREATE TABLE `advocate` (
  `cus_id` int(255) NOT NULL,
  `email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `field_1` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `field_2` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `field_3` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `field_4` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `field_5` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `field_6` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `field_7` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `field_8` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `field_9` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `field_10` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `field_11` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `field_12` varchar(100) COLLATE utf8_bin NOT NULL,
  `field_13` varchar(100) COLLATE utf8_bin NOT NULL,
  `field_14` varchar(100) COLLATE utf8_bin NOT NULL,
  `created_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `advocate`
--

INSERT INTO `advocate` (`cus_id`, `email`, `field_1`, `field_2`, `field_3`, `field_4`, `field_5`, `field_6`, `field_7`, `field_8`, `field_9`, `field_10`, `field_11`, `field_12`, `field_13`, `field_14`, `created_date`) VALUES
(3, 'legal@gmail.com', 'Arun', 'Criminal, Divorce', '10', 'Been practicing and handling cases independently with a result oriented approach, both professionally and ethically and has now acquired 8 years of professional experience in providing legal consultancy', 'English, Hindi', 'Slikboard', 'Bangalore', '1234567890', 'Approval', 'High Court', 'B/123/2020', 'http://10.0.2.2/projects/women_legal/web/uploads/advocate.png', '20.5937', '78.9629', '2023-09-25'),
(5, 'legal@gmail.com', 'Kumar', 'Divorce, Domestic Violence', '8', 'specialized in International Trade laws, he had obtained one-year Diploma from ILI New Delhi and effectively dealing with arbitration matters and other issues relating to trade laws.', 'English', 'Delhi', 'Delhi', '1234567890', 'Approval', 'High Court, Supreme', 'B/123/2021', 'http://10.0.2.2/projects/women_legal/web/uploads/advocate.png', '20.5937', '78.9629', '2023-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `cus_id` int(255) NOT NULL,
  `email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `field_1` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `field_2` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `created_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`cus_id`, `email`, `field_1`, `field_2`, `created_date`) VALUES
(1, 'legal@gmail.com', 'Aditi', 'Thanks for services', '2023-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(100) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `field_1` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `field_2` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `field_3` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `field_4` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `created_date` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `name`, `email`, `password`, `mobile`, `field_1`, `field_2`, `field_3`, `field_4`, `created_date`) VALUES
(1, 'Legal', 'legal@gmail.com', 'test', '1234567890', 'Bangalore', 'Slikboard', '123456789012', NULL, '2023-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE `problem` (
  `cus_id` int(255) NOT NULL,
  `email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `field_1` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `field_2` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `field_3` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `field_4` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `field_5` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `field_6` varchar(100) COLLATE utf8_bin NOT NULL,
  `created_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`cus_id`, `email`, `field_1`, `field_2`, `field_3`, `field_4`, `field_5`, `field_6`, `created_date`) VALUES
(3, 'user@gmail.com', 'Jiya', 'Divorce', 'Lack of commitment, infidelity or extramarital affairs, too much conflict and arguing, and lack of physical intimacy', 'FIR12346', 'Chennai', '1234567891', '2023-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_id` int(100) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `mobile` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `field_1` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `field_2` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `field_3` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `field_4` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `created_date` varchar(100) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `name`, `email`, `password`, `mobile`, `field_1`, `field_2`, `field_3`, `field_4`, `created_date`) VALUES
(6, 'Aditi', 'user@gmail.com', 'test', '1234567890', 'chennai', 'chennai', 'test', 'test', '2022-01-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `advocate`
--
ALTER TABLE `advocate`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `advocate`
--
ALTER TABLE `advocate`
  MODIFY `cus_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `cus_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `problem`
--
ALTER TABLE `problem`
  MODIFY `cus_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
