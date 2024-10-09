-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 01:11 PM
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
  `department` varchar(255) NOT NULL,
  `quality` decimal(3,2) NOT NULL,
  `communication_skills` decimal(3,2) NOT NULL,
  `teamwork` decimal(3,2) NOT NULL,
  `punctuality` decimal(3,2) NOT NULL,
  `initiative` decimal(3,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_evaluations`
--

INSERT INTO `admin_evaluations` (`id`, `a_id`, `e_id`, `department`, `quality`, `communication_skills`, `teamwork`, `punctuality`, `initiative`) VALUES
(1, 1, 2, 'Finance Department', 3.67, 4.67, 3.67, 3.67, 4.33),
(2, 1, 3, 'Finance Department', 4.33, 4.00, 4.33, 4.00, 5.00),
(3, 1, 4, 'Finance Department', 3.33, 3.67, 3.00, 3.67, 4.67),
(4, 1, 5, 'Finance Department', 4.00, 5.00, 5.00, 4.67, 5.00),
(5, 1, 8, 'Finance Department', 4.67, 5.00, 5.00, 4.33, 5.00);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_evaluations`
--
ALTER TABLE `admin_evaluations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
