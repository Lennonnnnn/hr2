-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2024 at 01:14 PM
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
-- Table structure for table `leave_requests`
--

CREATE TABLE `leave_requests` (
  `leave_id` int(10) UNSIGNED NOT NULL,
  `e_id` int(10) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `leave_type` enum('Annual Leave','Sick Leave','Family Leave') NOT NULL,
  `reason` text NOT NULL,
  `status` enum('Pending','Approved','Denied') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leave_requests`
--

INSERT INTO `leave_requests` (`leave_id`, `e_id`, `start_date`, `end_date`, `leave_type`, `reason`, `status`, `created_at`) VALUES
(1, 2, '2024-10-07', '2024-10-14', 'Annual Leave', 'vacation', 'Approved', '2024-10-05 11:17:45'),
(2, 3, '2024-10-07', '2024-10-12', 'Sick Leave', 'asd', 'Approved', '2024-10-05 12:50:18'),
(3, 3, '2024-11-01', '2024-11-06', 'Annual Leave', 'asd', 'Approved', '2024-10-05 13:21:42'),
(4, 3, '2024-12-23', '2024-12-30', 'Family Leave', 'try', 'Approved', '2024-10-05 14:18:29'),
(5, 4, '2024-11-01', '2024-11-05', 'Family Leave', 'try', 'Denied', '2024-10-05 14:32:14'),
(6, 4, '2024-11-01', '2024-11-05', 'Family Leave', 'try', 'Approved', '2024-10-05 14:32:54'),
(7, 4, '2024-10-16', '2024-10-23', 'Annual Leave', 'ASD', 'Approved', '2024-10-05 14:37:41'),
(8, 4, '2024-10-07', '2024-10-12', 'Sick Leave', 'ret', 'Approved', '2024-10-05 14:41:09'),
(9, 4, '2024-10-05', '2024-10-08', 'Sick Leave', 'sa', 'Approved', '2024-10-05 15:41:27'),
(10, 1, '2024-10-07', '2024-10-12', 'Family Leave', 'try', 'Denied', '2024-10-06 04:08:44'),
(11, 1, '2024-10-07', '2024-10-11', 'Annual Leave', 'try', 'Pending', '2024-10-06 14:20:12'),
(12, 1, '2024-10-22', '2024-10-31', 'Annual Leave', 'sick', 'Pending', '2024-10-07 20:36:07'),
(13, 1, '2024-10-14', '2024-10-16', 'Annual Leave', 'try', 'Approved', '2024-10-08 09:21:17'),
(14, 1, '2024-10-14', '2024-10-16', 'Family Leave', 'try', 'Pending', '2024-10-08 09:23:49'),
(15, 1, '2024-12-24', '2024-12-28', 'Family Leave', 'try', 'Pending', '2024-10-08 09:32:29'),
(16, 1, '2024-10-15', '2024-11-02', 'Family Leave', 'try', 'Pending', '2024-10-08 14:45:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD PRIMARY KEY (`leave_id`),
  ADD KEY `e_id` (`e_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leave_requests`
--
ALTER TABLE `leave_requests`
  MODIFY `leave_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leave_requests`
--
ALTER TABLE `leave_requests`
  ADD CONSTRAINT `leave_requests_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `employee_register` (`e_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
