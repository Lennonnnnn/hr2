-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2024 at 01:04 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee_register`
--
ALTER TABLE `employee_register`
  ADD PRIMARY KEY (`e_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee_register`
--
ALTER TABLE `employee_register`
  MODIFY `e_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
