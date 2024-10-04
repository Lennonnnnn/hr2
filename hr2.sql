-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2024 at 12:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_evaluations`
--

CREATE TABLE `admin_evaluations` (
  `id` int(10) UNSIGNED NOT NULL,
  `a_id` int(11) NOT NULL,
  `e_id` int(10) UNSIGNED NOT NULL,
  `quality` decimal(3,2) NOT NULL,
  `communication_skills` decimal(3,2) NOT NULL,
  `teamwork` decimal(3,2) NOT NULL,
  `punctuality` decimal(3,2) NOT NULL,
  `initiative` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_evaluations`
--

INSERT INTO `admin_evaluations` (`id`, `a_id`, `e_id`, `quality`, `communication_skills`, `teamwork`, `punctuality`, `initiative`) VALUES
(1, 0, 2, 4.00, 3.67, 4.67, 4.33, 4.67),
(2, 1, 2, 3.00, 3.67, 4.67, 3.33, 4.33),
(3, 1, 3, 3.33, 3.33, 4.33, 3.33, 3.33),
(4, 2, 2, 4.00, 4.00, 4.33, 5.00, 4.00);

-- --------------------------------------------------------

--
-- Table structure for table `admin_recognition`
--

CREATE TABLE `admin_recognition` (
  `id` int(25) NOT NULL,
  `your_name` char(25) NOT NULL,
  `recipients_name` char(25) NOT NULL,
  `performance_area` char(25) NOT NULL,
  `recognition_message` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_register`
--

CREATE TABLE `admin_register` (
  `a_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `position` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `pfp` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_register`
--

INSERT INTO `admin_register` (`a_id`, `firstname`, `middlename`, `lastname`, `birthdate`, `email`, `password`, `role`, `position`, `department`, `phone_number`, `address`, `pfp`) VALUES
(1, 'Wendel', '', 'Ureta', '2024-09-26', 'uretawendel@gmail.com', '$2y$10$45m8xWpFr7LfY34PabAD4./bwp7AIDHwo2gHdVnMTSYgSoboJlwS6', 'Admin', '', '', '09123456789', 'Caloocan', ''),
(2, 'Admin', '', 'Test', '2024-09-29', 'admin1@gmail.com', '$2y$10$h/Z4BTnh7WKMibT6PHhgz.8Qtix5e1cKMAlXHEm9uRJ0EYny5y2.O', 'Admin', '', '', '09123456789', 'Caloocan', '');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `e_name` varchar(255) NOT NULL,
  `e_role` varchar(255) NOT NULL,
  `e_time_in` datetime NOT NULL,
  `e_time_out` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_register`
--

CREATE TABLE `employee_register` (
  `e_id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `phone_number` int(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pfp` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_register`
--

INSERT INTO `employee_register` (`e_id`, `firstname`, `middlename`, `lastname`, `birthdate`, `email`, `password`, `role`, `position`, `department`, `phone_number`, `address`, `pfp`) VALUES
(1, 'Employee1', '', 'Test', '0000-00-00', 'Employee1@gmail.com', '$2y$10$opXjIX4IxwptSXOxVaB9du6d7glWiayBoji13qBOMAfVcqPFASjUG', 'Employee', 'IT Manager', 'IT Department', 0, '', ''),
(2, 'Employee2', '', 'Test', '0000-00-00', 'Employee2@gmail.com', '$2y$10$Ax/otKl7YO3PZq4vII.hTuif3P8xV8DQgRTb3mJUPeKYWGPuhoXyC', 'Employee', 'Financial Educator', 'Finance Department', 0, '', ''),
(3, 'Employee3', '', 'Test', '0000-00-00', 'Employee3@gmail.com', '$2y$10$ZKvHJ/tF77GHbwSmnYH6Ze9C7QulmH8xMGovezSv2adTK9QW61/s6', 'Employee', 'Loan Officer', 'Finance Department', 0, '', ''),
(4, 'Employee4', '', 'Try', '0000-00-00', 'Employee4@gmail.com', '$2y$10$N9Br3iqD6E3NaIrDozIH6O09d2HoFDgH3jnp/MT/cb4FxLBG3gR1C', 'Employee', 'Loan Officer', 'Finance Department', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `leave_request`
--

CREATE TABLE `leave_request` (
  `id` int(11) NOT NULL,
  `e_name` char(255) NOT NULL,
  `leave_type` varchar(25) NOT NULL,
  `start_date` varchar(25) NOT NULL,
  `end_date` date NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_evaluations`
--
ALTER TABLE `admin_evaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `e_id` (`e_id`);

--
-- Indexes for table `admin_recognition`
--
ALTER TABLE `admin_recognition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_register`
--
ALTER TABLE `admin_register`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_register`
--
ALTER TABLE `employee_register`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `leave_request`
--
ALTER TABLE `leave_request`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_evaluations`
--
ALTER TABLE `admin_evaluations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admin_recognition`
--
ALTER TABLE `admin_recognition`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_register`
--
ALTER TABLE `admin_register`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_register`
--
ALTER TABLE `employee_register`
  MODIFY `e_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leave_request`
--
ALTER TABLE `leave_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_evaluations`
--
ALTER TABLE `admin_evaluations`
  ADD CONSTRAINT `admin_evaluations_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `employee_register` (`e_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
