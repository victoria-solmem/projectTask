-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2021 at 11:58 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projecttask`
--

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_id` int(15) NOT NULL,
  `semester_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `cat` decimal(10,0) NOT NULL,
  `exam` decimal(10,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `unit_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_id`, `semester_id`, `user_id`, `cat`, `exam`, `created_at`, `unit_id`) VALUES
(10, 4, 4, '22', '33', '2021-10-18 10:16:13', 2),
(11, 4, 5, '12', '35', '2021-10-18 10:17:02', 2),
(12, 5, 7, '19', '47', '2021-10-18 10:21:04', 2),
(13, 4, 7, '14', '24', '2021-10-18 12:35:45', 3),
(14, 6, 4, '15', '45', '2021-10-18 12:54:54', 4),
(15, 4, 4, '30', '14', '2021-10-18 12:56:13', 5),
(16, 4, 4, '19', '12', '2021-10-18 12:57:02', 6),
(17, 4, 5, '30', '70', '2021-10-18 12:58:05', 9),
(18, 4, 5, '23', '45', '2021-10-18 12:59:38', 8),
(19, 4, 5, '15', '36', '2021-10-18 13:00:21', 7),
(20, 12, 18, '13', '50', '2021-10-21 08:51:34', 2),
(21, 12, 18, '30', '13', '2021-10-21 08:52:06', 3),
(22, 12, 18, '23', '12', '2021-10-21 08:52:36', 4),
(23, 11, 18, '23', '67', '2021-10-21 08:54:08', 10),
(24, 6, 4, '15', '45', '2021-10-21 09:41:58', 2),
(25, 12, 5, '12', '34', '2021-10-21 09:43:51', 2),
(26, 12, 7, '23', '34', '2021-10-21 09:44:15', 2),
(27, 12, 9, '23', '14', '2021-10-21 09:44:37', 2);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semester_id` int(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `year` year(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semester_id`, `name`, `year`, `created_at`) VALUES
(4, 'Aug-Dec', 2021, '2021-10-18 10:14:28'),
(5, 'Jan-Apr', 2021, '2021-10-18 10:15:00'),
(6, 'jan-apr', 2018, '2021-10-18 12:52:20'),
(7, 'jan-apr', 2019, '2021-10-18 12:52:41'),
(8, 'jan-apr', 2020, '2021-10-18 12:52:54'),
(9, 'aug-dec', 2018, '2021-10-18 12:53:24'),
(10, 'aug-dec', 2019, '2021-10-18 12:53:36'),
(11, 'aug-dec', 2020, '2021-10-18 12:53:51'),
(12, 'may-aug', 2018, '2021-10-21 08:50:47'),
(13, 'may-aug', 2019, '2021-10-21 09:40:16');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(15) NOT NULL,
  `unit_name` varchar(200) NOT NULL,
  `unit_code` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`, `unit_code`, `created_at`) VALUES
(2, 'Data Science', 'Cmt202', '2021-10-17 15:04:20'),
(3, 'research project', 'cmt400', '2021-10-18 10:10:37'),
(4, 'computer graphics', 'cmt 201', '2021-10-18 12:47:48'),
(5, 'data structure', 'cmt 203', '2021-10-18 12:48:58'),
(6, 'logic circuit', 'cmt 401', '2021-10-18 12:49:25'),
(7, '.net', 'cmt404', '2021-10-18 12:50:17'),
(8, 'c++', 'cmt302', '2021-10-18 12:50:46'),
(9, 'programming methodology', 'cmt500', '2021-10-18 12:51:39'),
(10, 'bible study', 'gs100', '2021-10-21 08:49:28'),
(11, 'computer architer', 'cmt203', '2021-10-21 09:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(15) NOT NULL,
  `reg_number` int(15) DEFAULT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `reg_number`, `first_name`, `last_name`, `email`, `password`, `created_at`) VALUES
(4, 1027524, 'Victoria', 'Azziza', 'victoria@gmail.com', NULL, '2021-10-18 01:35:39'),
(5, 1027525, 'Yannick', 'Marningue', 'yannick@gmail.com', NULL, '2021-10-18 01:35:56'),
(7, 1027426, 'alix', 'nepidjimbaye', 'alix@gmail.com', NULL, '2021-10-18 10:09:39'),
(8, NULL, 'Admin', 'Name', 'admin@gmail.com', 'sahL5d5V.UWtI', '2021-10-18 11:40:50'),
(9, 1027527, 'amina', 'madji', 'amina@gmail.com', NULL, '2021-10-18 12:33:13'),
(10, 1027528, 'Bonheur', 'nadji', 'bonheur@gmail.com', NULL, '2021-10-18 12:37:07'),
(11, 1027529, 'christelle', 'nerolel', 'christelle@gmail.com', NULL, '2021-10-18 12:37:54'),
(12, 1027530, 'marina', 'nenodji', 'marina@gmail.com', NULL, '2021-10-18 12:40:22'),
(13, 1027531, 'aristophane', 'djiarabe', 'aristophane@gmail.com', NULL, '2021-10-18 12:41:37'),
(14, 1027532, 'floriancia', 'larmadjie', 'floriancia@gmail.com', NULL, '2021-10-18 12:43:25'),
(15, 1027533, 'chancelat', 'nour', 'chancelat@gmail.com', NULL, '2021-10-18 12:44:36'),
(16, 1027534, 'maxwell', 'max', 'maxwell@gmail.com', NULL, '2021-10-18 12:45:39'),
(17, 1027535, 'renove', 'koussidi', 'renove@gmail.com', NULL, '2021-10-18 12:46:28'),
(18, 1027537, 'mirielle', 'demoundou', 'mirielle@gmail.com', NULL, '2021-10-21 08:48:48'),
(19, 1027536, 'acha', 'naf', 'acha@gamail.com', NULL, '2021-10-21 09:38:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semester_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semester_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
