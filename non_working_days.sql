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
-- Table structure for table `non_working_days`
--

CREATE TABLE `non_working_days` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` enum('regular','irregular') DEFAULT 'irregular'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `non_working_days`
--

INSERT INTO `non_working_days` (`id`, `date`, `description`, `type`) VALUES
(1, '2019-01-01', 'New Year\'s Day', 'regular'),
(2, '2019-04-09', 'Araw ng Kagitingan', 'regular'),
(3, '2019-05-01', 'Labor Day', 'regular'),
(4, '2019-06-12', 'Independence Day', 'regular'),
(7, '2019-08-28', 'National Heroes Day', 'regular'),
(10, '2019-11-01', 'All Saint\'s Day', 'regular'),
(14, '2019-11-30', 'Bonifacio Day', 'regular'),
(20, '2019-12-25', 'Christmas Day', 'regular'),
(22, '2019-12-30', 'Rizal Day', 'regular'),
(26, '2020-01-01', 'New Year\'s Day', 'regular'),
(31, '2020-04-09', 'Araw ng Kagitingan', 'regular'),
(37, '2020-05-01', 'Labor Day', 'regular'),
(43, '2020-06-12', 'Independence Day', 'regular'),
(49, '2020-08-28', 'National Heroes Day', 'regular'),
(52, '2020-11-01', 'All Saint\'s Day', 'regular'),
(60, '2020-11-30', 'Bonifacio Day', 'regular'),
(62, '2020-12-25', 'Christmas Day', 'regular'),
(64, '2020-12-30', 'Rizal Day', 'regular'),
(72, '2021-01-01', 'New Year\'s Day', 'regular'),
(77, '2021-04-09', 'Araw ng Kagitingan', 'regular'),
(84, '2021-05-01', 'Labor Day', 'regular'),
(91, '2021-06-12', 'Independence Day', 'regular'),
(93, '2021-08-28', 'National Heroes Day', 'regular'),
(100, '2021-11-01', 'All Saint\'s Day', 'regular'),
(107, '2021-11-30', 'Bonifacio Day', 'regular'),
(110, '2021-12-25', 'Christmas Day', 'regular'),
(111, '2021-12-30', 'Rizal Day', 'regular'),
(117, '2022-01-01', 'New Year\'s Day', 'regular'),
(121, '2022-04-09', 'Araw ng Kagitingan', 'regular'),
(127, '2022-05-01', 'Labor Day', 'regular'),
(135, '2022-06-12', 'Independence Day', 'regular'),
(139, '2022-08-28', 'National Heroes Day', 'regular'),
(148, '2022-11-01', 'All Saint\'s Day', 'regular'),
(156, '2022-11-30', 'Bonifacio Day', 'regular'),
(157, '2022-12-25', 'Christmas Day', 'regular'),
(170, '2022-12-30', 'Rizal Day', 'regular'),
(176, '2023-01-01', 'New Year\'s Day', 'regular'),
(183, '2023-04-09', 'Araw ng Kagitingan', 'regular'),
(190, '2023-05-01', 'Labor Day', 'regular'),
(197, '2023-06-12', 'Independence Day', 'regular'),
(199, '2023-08-28', 'National Heroes Day', 'regular'),
(206, '2023-11-01', 'All Saint\'s Day', 'regular'),
(208, '2023-11-30', 'Bonifacio Day', 'regular'),
(215, '2023-12-25', 'Christmas Day', 'regular'),
(222, '2023-12-30', 'Rizal Day', 'regular'),
(229, '2024-01-01', 'New Year\'s Day', 'regular'),
(236, '2024-04-09', 'Araw ng Kagitingan', 'regular'),
(245, '2024-05-01', 'Labor Day', 'regular'),
(249, '2024-06-12', 'Independence Day', 'regular'),
(254, '2024-08-28', 'National Heroes Day', 'regular'),
(260, '2024-11-01', 'All Saint\'s Day', 'regular'),
(268, '2024-11-30', 'Bonifacio Day', 'regular'),
(274, '2024-12-25', 'Christmas Day', 'regular'),
(282, '2024-12-30', 'Rizal Day', 'regular'),
(289, '2025-01-01', 'New Year\'s Day', 'regular'),
(295, '2025-04-09', 'Araw ng Kagitingan', 'regular'),
(303, '2025-05-01', 'Labor Day', 'regular'),
(309, '2025-06-12', 'Independence Day', 'regular'),
(317, '2025-08-28', 'National Heroes Day', 'regular'),
(324, '2025-11-01', 'All Saint\'s Day', 'regular'),
(325, '2025-11-30', 'Bonifacio Day', 'regular'),
(334, '2025-12-25', 'Christmas Day', 'regular'),
(337, '2025-12-30', 'Rizal Day', 'regular'),
(338, '2026-01-01', 'New Year\'s Day', 'regular'),
(339, '2026-04-09', 'Araw ng Kagitingan', 'regular'),
(340, '2026-05-01', 'Labor Day', 'regular'),
(347, '2026-06-12', 'Independence Day', 'regular'),
(353, '2026-08-28', 'National Heroes Day', 'regular'),
(355, '2026-11-01', 'All Saint\'s Day', 'regular'),
(359, '2026-11-30', 'Bonifacio Day', 'regular'),
(366, '2026-12-25', 'Christmas Day', 'regular'),
(372, '2026-12-30', 'Rizal Day', 'regular'),
(379, '2027-01-01', 'New Year\'s Day', 'regular'),
(386, '2027-04-09', 'Araw ng Kagitingan', 'regular'),
(392, '2027-05-01', 'Labor Day', 'regular'),
(401, '2027-06-12', 'Independence Day', 'regular'),
(408, '2027-08-28', 'National Heroes Day', 'regular'),
(411, '2027-11-01', 'All Saint\'s Day', 'regular'),
(418, '2027-11-30', 'Bonifacio Day', 'regular'),
(425, '2027-12-25', 'Christmas Day', 'regular'),
(433, '2027-12-30', 'Rizal Day', 'regular'),
(438, '2028-01-01', 'New Year\'s Day', 'regular'),
(444, '2028-04-09', 'Araw ng Kagitingan', 'regular'),
(453, '2028-05-01', 'Labor Day', 'regular'),
(460, '2028-06-12', 'Independence Day', 'regular'),
(462, '2028-08-28', 'National Heroes Day', 'regular'),
(463, '2028-11-01', 'All Saint\'s Day', 'regular'),
(470, '2028-11-30', 'Bonifacio Day', 'regular'),
(478, '2028-12-25', 'Christmas Day', 'regular'),
(486, '2028-12-30', 'Rizal Day', 'regular'),
(493, '2029-01-01', 'New Year\'s Day', 'regular'),
(500, '2029-04-09', 'Araw ng Kagitingan', 'regular'),
(507, '2029-05-01', 'Labor Day', 'regular'),
(514, '2029-06-12', 'Independence Day', 'regular'),
(518, '2029-08-28', 'National Heroes Day', 'regular'),
(525, '2029-11-01', 'All Saint\'s Day', 'regular'),
(532, '2029-11-30', 'Bonifacio Day', 'regular'),
(534, '2029-12-25', 'Christmas Day', 'regular'),
(541, '2029-12-30', 'Rizal Day', 'regular'),
(1387, '2024-10-15', 'Birthday ni Thirdy', 'irregular');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `non_working_days`
--
ALTER TABLE `non_working_days`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `date` (`date`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `non_working_days`
--
ALTER TABLE `non_working_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2378;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
