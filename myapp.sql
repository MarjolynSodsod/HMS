-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2024 at 06:40 AM
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
-- Database: `myapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoint`
--

CREATE TABLE `appoint` (
  `patients_name` varchar(250) NOT NULL,
  `doctors_name` varchar(250) NOT NULL,
  `nurse_name` varchar(250) NOT NULL,
  `service_id` int(11) NOT NULL,
  `creat_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appoint`
--

INSERT INTO `appoint` (`patients_name`, `doctors_name`, `nurse_name`, `service_id`, `creat_at`) VALUES
('Joshua Cotez', 'Unknown 01', 'Unknown 01', 1, '2024-06-13 07:26:00'),
('Aumalyn Cubas', 'Unknown 02', 'Unknown 02', 2, '2024-06-13 07:27:00'),
('Nicole Bañez', 'Unknown 03', 'Unknown 03', 3, '2024-06-13 07:28:00'),
('James Garabiles', 'Unknown 04', 'Unknown 04', 4, '2024-06-13 07:29:00'),
('Kenlie Quitasol', 'Unknown 05', 'Unknown 05', 5, '2024-06-13 07:30:00'),
('John Paul Diano', 'Unknown 06', 'Unknown 06', 6, '2024-06-13 07:31:00'),
('Marjolyn Sodsod', 'Unknown 07', 'Unknown 07', 7, '2024-06-13 07:32:00'),
('Ruth Ann Gaygay-ed', 'Unknown 08', 'Unknown 08', 8, '2024-06-13 07:32:00'),
('Bryan Kent Sabuquel', 'Unknown 09', 'Unknown 09', 9, '2024-06-13 07:33:00'),
('Alexis Joseph Tabao', 'Unknown 10', 'Unknown 10', 10, '2024-06-13 07:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `special` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone_num` varchar(250) DEFAULT NULL,
  `fee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `full_name`, `special`, `address`, `phone_num`, `fee`) VALUES
(1, 'Bryan Sabuquel', 'Physician', 'Lid-lidda, Ilocos Sur', '0998 765 4321', 1000),
(2, 'Elijah', 'Physician', 'Alilem, Ilocos Sur', '0945 962 3154', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `nurses`
--

CREATE TABLE `nurses` (
  `id` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `special` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nurses`
--

INSERT INTO `nurses` (`id`, `full_name`, `special`, `address`) VALUES
(1, 'Marjolyn Sossod', 'Neurosurgeons', 'Sta. Lucia, Ilocos Sur');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `birthday` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `contact_num` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `full_name`, `birthday`, `address`, `contact_num`) VALUES
(1, 'Kuraizawa Kei', '2001/04/24', 'Candon, Ilocos Sur', '0994 644 2919');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `desc1` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `desc1`) VALUES
(1, 'Administrators', 'Manages the day-to-day operations of the hospital including budgeting and more.');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `desc1` varchar(250) NOT NULL,
  `fee` int(11) DEFAULT NULL,
  `hour` time DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `desc1`, `fee`, `hour`) VALUES
(1, 'Administrator', 'Manages the day-to-day operations of the hospital including budgeting and more.', 500, '10:19:44');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `phone_number` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `username`, `full_name`, `phone_number`, `address`) VALUES
(3, 'admin01', 'Ayanokoji Kiyotaka', '0963 377 9096', 'Candon, Ilocos Sur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appoint`
--
ALTER TABLE `appoint`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurses`
--
ALTER TABLE `nurses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appoint`
--
ALTER TABLE `appoint`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12346;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nurses`
--
ALTER TABLE `nurses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
