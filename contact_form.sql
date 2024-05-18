-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2024 at 11:11 AM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `id` int(15) NOT NULL,
  `fullname` varchar(55) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `phonenumber` int(10) DEFAULT NULL,
  `subject` varchar(15) DEFAULT NULL,
  `message` varchar(25) DEFAULT NULL,
  `ip_address` varchar(25) DEFAULT NULL,
  `currentdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`id`, `fullname`, `email`, `phonenumber`, `subject`, `message`, `ip_address`, `currentdate`) VALUES
(63, 'test', 'dpkdiwaxxnjisss@gmail.com', 1234567890, 'details', 'zcds', '::1', '2024-05-17 18:30:00'),
(64, 'test', 'dpkdiwasssxxnjisss@gmail.com', 1234567890, 'details', 'xzczxc', '::1', '2024-05-17 18:30:00'),
(65, 'test', 'dpkdiwasssxxxcXnjisss@gmail.com', 1234567890, 'details', 'sdfsd', '::1', '2024-05-17 18:30:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
