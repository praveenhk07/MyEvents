-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2025 at 05:51 AM
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
-- Database: `event_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked_events`
--

CREATE TABLE `booked_events` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_type` varchar(100) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `guests` int(11) DEFAULT NULL,
  `budget` decimal(10,2) DEFAULT NULL,
  `requirements` text DEFAULT NULL,
  `catering` varchar(20) DEFAULT NULL,
  `decoration` varchar(50) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending','Approved','Rejected') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booked_events`
--

INSERT INTO `booked_events` (`id`, `user_id`, `event_type`, `event_date`, `start_time`, `end_time`, `location`, `guests`, `budget`, `requirements`, `catering`, `decoration`, `message`, `created_at`, `status`) VALUES
(3, 11, 'Birthday Party', '2025-09-17', '12:00:00', '12:00:00', 'UVCE Boys Hostel', 20, 500.00, '0', 'Yes', 'Classic', '', '2025-09-17 05:22:03', 'Approved'),
(4, 11, 'Wedding', '2025-09-17', '08:59:00', '05:59:00', 'UVCE banglore 560001', 8585, 99999999.99, '0', 'Yes', 'Modern', 'notjign ', '2025-09-17 07:05:24', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `submitted_at`) VALUES
(1, 'praveen', 'praveenhkori07@gmail.com', 'hi', '2025-09-16 17:21:58'),
(2, 'praveen', 'praveenhkori07@gmail.com', 'hi', '2025-09-16 17:23:29'),


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `contact`, `password`, `role`, `created_at`) VALUES
(5, 'PRAVEEN H K', 'PKORI', 'Admin@MyEvents.com', '8884060972', '$2y$10$uU9gWZfKxJXJZzW9GvZkUuY9Q9gWZfKxJXJZzW9GvZkUuY9Q9gWZf', 'admin', '2025-09-17 05:25:14'),
(11, 'Praveen h kori', 'phkori', 'praveenhkori07@gmail.com', '12345678990', '$2y$10$0SAjKqkB34bW36ybkNZ8tu9T0rsL0VGuM972Qs4gEUD7UEGXG9GSi', 'customer', '2025-09-16 15:59:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked_events`
--
ALTER TABLE `booked_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked_events`
--
ALTER TABLE `booked_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked_events`
--
ALTER TABLE `booked_events`
  ADD CONSTRAINT `booked_events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
