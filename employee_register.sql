-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 01:13 PM
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
  `available_leaves` int(11) DEFAULT 0,
  `phone_number` int(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pfp` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_register`
--

INSERT INTO `employee_register` (`e_id`, `firstname`, `middlename`, `lastname`, `birthdate`, `email`, `password`, `role`, `position`, `department`, `available_leaves`, `phone_number`, `address`, `pfp`) VALUES
(1, 'Employee1', '', 'Test', '0000-00-00', 'Employee1@gmail.com', '$2y$10$opXjIX4IxwptSXOxVaB9du6d7glWiayBoji13qBOMAfVcqPFASjUG', 'Employee', 'IT Manager', 'IT Department', 17, 0, '', ''),
(2, 'Employee2', '', 'Test', '0000-00-00', 'Employee2@gmail.com', '$2y$10$Ax/otKl7YO3PZq4vII.hTuif3P8xV8DQgRTb3mJUPeKYWGPuhoXyC', 'Employee', 'Financial Educator', 'Finance Department', 12, 0, '', ''),
(3, 'Employee3', '', 'Test', '0000-00-00', 'Employee3@gmail.com', '$2y$10$ZKvHJ/tF77GHbwSmnYH6Ze9C7QulmH8xMGovezSv2adTK9QW61/s6', 'Employee', 'Loan Officer', 'Finance Department', 3, 0, '', ''),
(4, 'Employee4', '', 'Try', '0000-00-00', 'Employee4@gmail.com', '$2y$10$N9Br3iqD6E3NaIrDozIH6O09d2HoFDgH3jnp/MT/cb4FxLBG3gR1C', 'Employee', 'Loan Officer', 'Finance Department', 1, 0, '', ''),
(5, 'employee', '', 'hahaha', '0000-00-00', 'Employee0@gmail.com', '$2y$10$/BmjrS1Pqx/OxlnH0yhcjOW0QUT3eS0oWB6cHxMabtRV3cknhOFv2', 'Employee', 'Financial Educator', 'Finance Department', 20, 0, '', ''),
(6, 'Employeee', '', 'HR', '0000-00-00', 'uretawendel@gmail.com', '$2y$10$VygQ6W0nsRnuCrtLFsU6CeeN56g8efTp7lHWi96/HoCD3veht0eDe', 'Employee', 'Human Resources Manager', 'Human Resources Department', 0, 0, '', ''),
(7, 'Employee', '', 'OP', '0000-00-00', 'trylang@gmail.com', '$2y$10$MGE1G6NIqTTdI6UX1yAlhOV246LB3zX6xJnIDnxsSN17tjnewipR6', 'Employee', 'Operations Manager', 'Operations Department', 0, 0, '', ''),
(8, 'Thirdy', '', 'olete', '0000-00-00', 'thirdy@gmail.com', '$2y$10$72G.mEx7bvnz94b1M2xHNegYmb8e9ehFHJ8e3QU3bLrayEmdyoXqC', 'Employee', 'Field Officer', 'Finance Department', 0, 0, '', '');

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
  MODIFY `e_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
