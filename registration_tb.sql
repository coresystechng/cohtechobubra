-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2025 at 03:10 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `cohtechobubra_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration_tb`
--

CREATE TABLE `registration_tb` (
  `registration_id` int(10) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='This table stores the data from the registration form';

--
-- Dumping data for table `registration_tb`
--

INSERT INTO `registration_tb` (`registration_id`, `first_name`, `surname`, `other_names`, `gender`, `date_of_birth`, `marital_status`, `state_of_origin`, `lga`, `nationality`, `phone_no`, `email`, `religion`, `contact_address`, `nok_name`, `nok_relationship`, `nok_phone_no`, `nok_contact_address`, `nok_occupation`, `attestation_1`, `attestation_2`, `date_of_registration`) VALUES
(1, 'Collins', 'Okoroafor', 'Chidozie', 'female', 'Mar 19, 2025', 'single', 'Edo', 'Edo-East', 'Nigerian', '09024364876', 'collins.okoroafor@yahoo.com', 'christianity', '15 John Street, Wuse Abuja FCT', 'Joe Illiya', 'Father', '09088776655', '15 John Street, Wuse Abuja FCT', 'Farmer', 'yes', 'yes', '2025-03-17 14:07:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration_tb`
--
ALTER TABLE `registration_tb`
  ADD PRIMARY KEY (`registration_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration_tb`
--
ALTER TABLE `registration_tb`
  MODIFY `registration_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
