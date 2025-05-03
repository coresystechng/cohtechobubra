-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2025 at 10:40 AM
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
-- Table structure for table `student_tb`
--

CREATE TABLE `student_tb` (
  `registration_id` int(11) NOT NULL,
  `course_of_study` varchar(100) NOT NULL,
  `first_name` varchar(38) NOT NULL,
  `surname` varchar(40) NOT NULL,
  `other_names` varchar(39) NOT NULL,
  `gender` varchar(19) NOT NULL,
  `date_of_birth` varchar(30) NOT NULL,
  `marital_status` varchar(35) NOT NULL,
  `state_of_origin` varchar(30) NOT NULL,
  `lga` varchar(30) NOT NULL,
  `nationality` varchar(40) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  `religion` varchar(29) NOT NULL,
  `contact_address` varchar(100) NOT NULL,
  `nok_name` varchar(50) NOT NULL,
  `nok_relationship` varchar(45) NOT NULL,
  `nok_phone_no` varchar(19) NOT NULL,
  `nok_contact_address` varchar(100) NOT NULL,
  `nok_occupation` varchar(50) NOT NULL,
  `attestation_1` tinyint(1) NOT NULL,
  `attestation_2` tinyint(1) NOT NULL,
  `date_of_payment` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mat_no` varchar(100) NOT NULL,
  `password` varchar(220) NOT NULL,
  `verify_password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_tb`
--

INSERT INTO `student_tb` (`registration_id`, `course_of_study`, `first_name`, `surname`, `other_names`, `gender`, `date_of_birth`, `marital_status`, `state_of_origin`, `lga`, `nationality`, `phone_no`, `email`, `religion`, `contact_address`, `nok_name`, `nok_relationship`, `nok_phone_no`, `nok_contact_address`, `nok_occupation`, `attestation_1`, `attestation_2`, `date_of_payment`, `mat_no`, `password`, `verify_password`) VALUES
(1, 'Software Engineering\r\n\r\n', 'David', 'Okonkwo', 'Chukwuebuka', 'Male', '2005-07-22', 'Single', 'Anambra', 'Idemili South ', 'Nigeria', '08083308641', 'david123@gmail.com', 'Christian', 'Plot 140D, Byazhin Road, Near Water Board,\r\nByazhin, Kubwa, Bwari Area Council,\r\nAbuja, FCT, Nigeria', 'Emeka Nwankwo', 'Father', '08012345678', 'Address: Plot 140D, Byazhin, Kubwa, Abuja;', 'Civil Engineer', 1, 1, '2025-04-14 19:59:38', 'sean123', '1234-sean', ''),
(28, 'Environmental Health Technician', 'sean', 'Obot', 'klougvhgc', 'Male', 'Apr 07, 2025', 'Single', 'Adamawa', 'owan east', 'Nigeria', '08766576565656', 'seanadamosi@gmail.com', 'Islam', ' plot 141, chikakore before champion church, byazhin, kubwa, abuja', 'Mark Gbadamosi', 'Father', '08037003298', ' plot 141, chikakore before champion church, byazhin, kubwa, abuja', 'Engineer', 1, 1, '2025-04-16 23:41:32', 'seanobot44', '1234', '1234'),
(29, 'Community Health', 'Collins', 'Okoroafor', 'Chidozie', 'Male', 'Apr 16, 2005', 'Single', 'Delta', 'Bissau', 'Nigerian', '09012345678', 'collins.okoroafor@outlook.com', 'Christianity', '2, Genevive Street, Calabar, Cross River State', 'John James', 'Father', '09088776655', '2, Genevive Street, Calabar, Cross River State', 'Farmer', 1, 1, '2025-04-17 12:03:16', 'collinsokoroafor84', '12345678', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_tb`
--
ALTER TABLE `student_tb`
  ADD PRIMARY KEY (`registration_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_tb`
--
ALTER TABLE `student_tb`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;
