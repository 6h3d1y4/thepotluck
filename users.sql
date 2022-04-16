-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2022 at 06:05 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipe`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `acc_start_date` datetime DEFAULT current_timestamp(),
  `freecode1` varchar(50) NOT NULL,
  `freecode2` varchar(50) NOT NULL,
  `freecode3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `phone`, `is_admin`, `acc_start_date`, `freecode1`, `freecode2`, `freecode3`) VALUES
(1, 'Oluwaseyi', 'Aborisade', 'seyi', 'o.aborisade@rgu.ac.uk', 'pass@123', 10001, 0, '0000-00-00 00:00:00', '', '', ''),
(2, 'Olayinka', 'Banjoko', 'olayinka', 'o.banjoko1@rgu.ac.uk', 'pass@123', 10002, 0, '0000-00-00 00:00:00', '', '', ''),
(3, 'Osazenaye', 'Efosa-Agho', 'naye', 'o.efosa-agho@rgu.ac.uk', 'pass@123', 10003, 0, '0000-00-00 00:00:00', '', '', ''),
(4, 'Valency', 'Goncalves', 'valency', 'v.goncalves@rgu.ac.uk', 'pass@123', 10004, 0, '0000-00-00 00:00:00', '', '', ''),
(5, 'Light', 'Nwokocha', 'light', 'l.nwokocha@rgu.ac.uk', 'pass@123', 10005, 0, '0000-00-00 00:00:00', '', '', ''),
(6, 'Nneka', 'Okeke', 'nneka', 'n.okeke@rgu.ac.uk', 'pass@123', 10006, 0, '0000-00-00 00:00:00', '', '', ''),
(7, 'Rohan', 'Sasidharan Nair', 'rohan', 'r.sasidharan-nair@rgu.ac.uk', 'pass@123', 10007, 1, '0000-00-00 00:00:00', '', '', ''),
(25, 'dummy', 'user', 'dummyuser', 'dummy@user.com', '$2y$10$HyqczegtPLlhqcXqX75nGO2fvYnCUY6qjlRjOHi1sVb', 1234567890, 0, '2022-03-14 11:42:07', '', '', ''),
(26, 'test', 'testing', 'tester', 'test@test.com', '$2y$10$IARw5vNRmdEvlyQYdpvMZ./chl3/uRlT2Chp/mP8w/7', 1234567890, 0, '2022-03-14 12:16:22', '', '', ''),
(27, 'test', 'test', 'tester1', 'test@test.com', '$2y$10$zgbmXU7m1y0hTPCa1SkZjeF3K9m9xkF8497c7XQ1MSf', 123456789, 0, '2022-03-15 12:36:44', '', '', ''),
(28, 'user', 'lastname', 'username', 'user@user.com', '$2y$10$Kd7WZp.GK5ErgqPCi6q02emWeSMfb/r8dytxYgyPm50', 123456789, 0, '2022-03-17 15:02:51', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
