-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 21, 2025 at 11:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cohtechobubra_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration_tb`
--

CREATE TABLE `registration_tb` (
  `registration_id` int(10) NOT NULL,
  `transaction_id` varchar(255) NOT NULL,
  `course_details` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `other_names` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `date_of_birth` varchar(20) NOT NULL,
  `marital_status` varchar(50) NOT NULL,
  `state_of_origin` varchar(50) NOT NULL,
  `lga` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `religion` varchar(20) NOT NULL,
  `contact_address` varchar(250) NOT NULL,
  `nok_name` varchar(50) NOT NULL,
  `nok_relationship` varchar(50) NOT NULL,
  `nok_phone_no` varchar(50) NOT NULL,
  `nok_contact_address` varchar(250) NOT NULL,
  `nok_occupation` varchar(50) NOT NULL,
  `attestation_1` varchar(10) NOT NULL,
  `attestation_2` varchar(10) NOT NULL,
  `date_of_registration` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='This table stores the data from the registration form';

--
-- Dumping data for table `registration_tb`
--

INSERT INTO `registration_tb` (`registration_id`, `transaction_id`, `course_details`, `first_name`, `surname`, `other_names`, `gender`, `date_of_birth`, `marital_status`, `state_of_origin`, `lga`, `nationality`, `phone_no`, `email`, `religion`, `contact_address`, `nok_name`, `nok_relationship`, `nok_phone_no`, `nok_contact_address`, `nok_occupation`, `attestation_1`, `attestation_2`, `date_of_registration`) VALUES
(1, '', 'Community Health', 'Collins', 'Okoroafor', 'Chidozie', 'female', 'Mar 19, 2025', 'single', 'Edo', 'Edo-East', 'Nigerian', '09024364876', 'collins.okoroafor@yahoo.com', 'christianity', '15 John Street, Wuse Abuja FCT', 'Joe Illiya', 'Father', '09088776655', '15 John Street, Wuse Abuja FCT', 'Farmer', 'yes', 'yes', '2025-03-21 19:10:19'),
(9, '', 'Medicine', 'Alana', 'Steele', 'Jacob Clemons', 'female', 'Nov 13, 2013', 'Married', 'Jigawa', 'Unde laborum earum p', 'Dolore amet quis ex', '08136763185', 'lomeezehi@gmail.com', 'christianity', 'lokogoma', 'Norman Yates', 'Autem veritatis aliq', '08136763185', 'Qui id ex neque odit', 'In id eveniet adipi', 'yes', 'yes', '2025-03-21 19:10:19'),
(10, '', 'Public Health', 'Keegan', 'Wheeler', 'Miriam Tillman', 'male', 'Feb 22, 2010', 'divorced', 'Oyo', 'Elit obcaecati modi', 'Fugiat error aut lab', '08136763185', 'lomeezehi@gmail.com', 'christianity', 'lokogoma', 'Moses Cherry', 'Eveniet eos aliqua', '08136763185', 'Ullamco voluptatum s', 'Voluptatem suscipit ', 'yes', 'yes', '2025-03-21 19:10:19'),
(11, '', 'Medical Laboratory', 'Emerald', 'Kirkland', 'Blake Valdez', 'male', 'Nov 12, 2011', 'divorced', 'Rivers', 'Exercitation autem s', 'Aliquam deserunt vol', '08136763185', 'lomeezehi@gmail.com', 'islam', 'lokogoma', 'Autumn Ortiz', 'Obcaecati facere asp', '08136763185', 'Harum consequatur n', 'Minus ut nesciunt e', 'yes', 'yes', '2025-03-21 19:10:19'),
(12, '', 'X-ray Technician', 'Duncan', 'Haynes', 'Barrett Fletcher', 'male', 'Jun 21, 2007', 'divorced', 'Kaduna', 'Eveniet quisquam la', 'Magna molestiae ex v', '08136763185', 'lomeezehi@gmail.com', 'other', 'lokogoma', 'Alden Curtis', 'Quam adipisci ullam ', '08136763185', 'Consectetur qui qui', 'Officia culpa conse', 'yes', 'yes', '2025-03-21 19:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'user',
  `first_name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`, `usertype`, `first_name`, `surname`) VALUES
(1, 'Admin', 'admin@example.com', '$2y$12$w1q3OqwFROdFL7RCp8LUUOWKpJhrmuncXjv3EmH1RJLJicIQB4nYG', '2025-03-08 08:29:20', '2025-03-08 08:29:20', 'admin', 'John ', 'Doe'),
(2, 'John', 'test@example.com', '$2y$12$w1q3OqwFROdFL7RCp8LUUOWKpJhrmuncXjv3EmH1RJLJicIQB4nYG', '2025-03-08 10:33:08', '2025-03-08 10:33:08', 'admin', 'me', 'found');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration_tb`
--
ALTER TABLE `registration_tb`
  ADD PRIMARY KEY (`registration_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration_tb`
--
ALTER TABLE `registration_tb`
  MODIFY `registration_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
