-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2025 at 10:20 PM
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
-- Database: `cohtechobubra_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_tb`
--

CREATE TABLE `student_tb` (
  `registration_id` int(11) NOT NULL,
  `transaction_id` varchar(10) NOT NULL,
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
  `attestation_1` varchar(70) NOT NULL,
  `attestation_2` varchar(70) NOT NULL,
  `date_of_payment` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `mat_no` varchar(100) NOT NULL,
  `password` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_tb`
--

INSERT INTO `student_tb` (`registration_id`, `transaction_id`, `course_of_study`, `first_name`, `surname`, `other_names`, `gender`, `date_of_birth`, `marital_status`, `state_of_origin`, `lga`, `nationality`, `phone_no`, `email`, `religion`, `contact_address`, `nok_name`, `nok_relationship`, `nok_phone_no`, `nok_contact_address`, `nok_occupation`, `attestation_1`, `attestation_2`, `date_of_payment`, `mat_no`, `password`) VALUES
(1, '1', 'Software Engineering\r\n\r\n', 'David', 'Okonkwo', 'Chukwuebuka', 'Male', '2005-07-22', 'Single', 'Anambra', 'Idemili South ', 'Nigeria', '08083308641', 'david123@gmail.com', 'Christian', 'Plot 140D, Byazhin Road, Near Water Board,\r\nByazhin, Kubwa, Bwari Area Council,\r\nAbuja, FCT, Nigeria', 'Emeka Nwankwo', 'Father', '08012345678', 'Address: Plot 140D, Byazhin, Kubwa, Abuja;', 'Civil Engineer', ' David Okonkwo Chukwuebuka, hereby attest that the information provide', 'I, Emeka Nwankwo, confirm that I am the father of David Okonkwo Chukwu', '2025-04-09 20:00:03', 'sean123', '1234-sean');

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
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
