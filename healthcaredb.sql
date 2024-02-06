-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2024 at 09:12 PM
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
-- Database: `healthcaredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `fld_appointmentID` int(11) NOT NULL,
  `fld_appointmentDate` date NOT NULL,
  `fld_appointmentTime` time NOT NULL,
  `fld_userID` int(11) NOT NULL,
  `fld_doctorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`fld_appointmentID`, `fld_appointmentDate`, `fld_appointmentTime`, `fld_userID`, `fld_doctorID`) VALUES
(1, '2024-02-01', '14:30:00', 10, 1),
(2, '2024-02-15', '09:45:00', 9, 2),
(3, '2024-02-04', '17:15:00', 8, 3),
(4, '2024-02-26', '11:20:00', 7, 4),
(5, '2024-02-08', '22:00:00', 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory`
--

CREATE TABLE `tbl_inventory` (
  `fld_itemID` int(11) NOT NULL,
  `fld_item` varchar(99) NOT NULL,
  `fld_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_inventory`
--

INSERT INTO `tbl_inventory` (`fld_itemID`, `fld_item`, `fld_quantity`) VALUES
(1, 'Surgical Masks', 500),
(2, 'IV Fluid Bags', 200),
(3, 'Antibiotics (Amoxicillin)', 1000),
(4, 'Bandages', 800),
(5, 'Thermometers', 150),
(6, 'Syringes', 400),
(7, 'Painkillers (Ibuprofen)', 600),
(8, 'Oxygen Tanks', 30),
(9, 'Electrocardiogram (ECG) Machines', 5),
(10, 'Blood Pressure Monitors', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prescription`
--

CREATE TABLE `tbl_prescription` (
  `fld_prescriptionID` int(11) NOT NULL,
  `fld_prescription` varchar(99) NOT NULL,
  `fld_prescriptionDate` date NOT NULL,
  `fld_prescriptionAmt` varchar(99) NOT NULL,
  `fld_frequency` varchar(99) NOT NULL,
  `fld_userID` int(11) NOT NULL,
  `fld_doctorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_prescription`
--

INSERT INTO `tbl_prescription` (`fld_prescriptionID`, `fld_prescription`, `fld_prescriptionDate`, `fld_prescriptionAmt`, `fld_frequency`, `fld_userID`, `fld_doctorID`) VALUES
(1, 'Acetaminophen', '2024-02-01', '500 mg', 'Twice daily', 6, 1),
(2, 'Amoxicillin', '2024-02-02', '250 mg', 'Three times daily', 6, 1),
(3, 'Lisinopril', '2024-02-03', '10 mg', 'Once daily', 7, 2),
(4, 'Atorvastatin', '2024-02-04', '20 mg', 'Nightly', 7, 2),
(5, 'Albuterol Inhaler', '2024-02-05', '2 puffs', 'As needed for shortness of breath', 8, 3),
(6, 'Omeprazole', '2024-02-06', '40 mg', 'Once daily before breakfast', 8, 3),
(7, 'Sertraline', '2024-02-07', '50 mg', 'Once daily', 9, 4),
(8, 'Naproxen', '2024-02-08', '220 mg', 'Twice daily with food', 9, 4),
(9, 'Metformin', '2024-02-09', '1000 mg', 'Twice daily with meals', 10, 5),
(10, 'Warfarin', '2024-02-10', '5 mg', 'Once daily in the evening', 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usergroup`
--

CREATE TABLE `tbl_usergroup` (
  `fld_groupID` int(11) NOT NULL,
  `fld_groupName` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_usergroup`
--

INSERT INTO `tbl_usergroup` (`fld_groupID`, `fld_groupName`) VALUES
(1, 'Doctor'),
(2, 'Patients');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `fld_userID` int(11) NOT NULL,
  `fld_userName` varchar(99) NOT NULL,
  `fld_address` varchar(99) NOT NULL,
  `fld_phone` bigint(20) NOT NULL,
  `fld_birth` date NOT NULL,
  `fld_gender` varchar(6) NOT NULL,
  `fld_email` varchar(99) NOT NULL,
  `fld_pass` varchar(99) NOT NULL,
  `fld_groupID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`fld_userID`, `fld_userName`, `fld_address`, `fld_phone`, `fld_birth`, `fld_gender`, `fld_email`, `fld_pass`, `fld_groupID`) VALUES
(1, 'Charles Campbell', 'Barangay San Roque, Cainta, Philippines', 9213495901, '2003-01-20', 'Male', 'charlescampbell@gmail.com', 'charlescampbell123', 1),
(2, 'Sophia Rodriguez', '123 Orchid Street, Barangay San Miguel, Makati City', 9123456789, '1995-04-20', 'Female', 'sophia.rodriguez@email.com', 'Sophia@2024', 1),
(3, 'Marcus Tan', '456 Sampaguita Avenue, Barangay Holy Spirit, Quezon City', 9209876543, '1988-09-15', 'Male', 'marcus.tan@email.com', 'Marcus#TaN89', 1),
(4, 'Isabella Santos', '789 Narra Lane, Barangay Poblacion, Davao City', 9351234567, '2000-12-03', 'Female', 'isabella.santos@email.com', 'Isabella_123', 1),
(5, 'Nathan Lim', '101 Acacia Drive, Barangay San Antonio, Pasig City', 9478765432, '1973-06-28', 'Male', 'nathan.lim@email.com', 'NathanL!m@456', 1),
(6, 'Olivia Rivera', '234 Sunflower Road, Barangay Mabolo, Cebu City', 9502345678, '1991-11-08', 'Female', 'olivia.rivera@email.com', 'OliviaRiv#20', 2),
(7, 'Elijah Cruz', '567 Mango Lane, Barangay Lahug, Iloilo City', 9667890123, '1985-02-14', 'Male', 'elijah.cruz@email.com', 'Elijah*Cruz78', 2),
(8, 'Ava Reyes', '890 Palma Street, Barangay Guadalupe, Zamboanga City', 9753456789, '1998-07-22', 'Female', 'ava.reyes@email.com', 'Ava_Reyes@2024', 2),
(9, 'Liam Fernandez', '112 Rizal Avenue, Barangay Sto. Niño, Bacolod City', 9812345678, '1979-10-11', 'Male', 'liam.fernandez@email.com', 'LiamFer_2022', 2),
(10, 'Mia Gonzales', '345 Balayang Street, Barangay Dalig, Antipolo City', 9987654321, '1982-03-17', 'Female', 'mia.gonzales@email.com', 'MiaGonz!456', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`fld_appointmentID`);

--
-- Indexes for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  ADD PRIMARY KEY (`fld_itemID`);

--
-- Indexes for table `tbl_prescription`
--
ALTER TABLE `tbl_prescription`
  ADD PRIMARY KEY (`fld_prescriptionID`),
  ADD KEY `fk_patient` (`fld_userID`),
  ADD KEY `fk_doctor` (`fld_doctorID`);

--
-- Indexes for table `tbl_usergroup`
--
ALTER TABLE `tbl_usergroup`
  ADD PRIMARY KEY (`fld_groupID`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`fld_userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `fld_appointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  MODIFY `fld_itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_prescription`
--
ALTER TABLE `tbl_prescription`
  MODIFY `fld_prescriptionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_usergroup`
--
ALTER TABLE `tbl_usergroup`
  MODIFY `fld_groupID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `fld_userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_prescription`
--
ALTER TABLE `tbl_prescription`
  ADD CONSTRAINT `fk_doctor` FOREIGN KEY (`fld_doctorID`) REFERENCES `tbl_users` (`fld_userID`),
  ADD CONSTRAINT `fk_patient` FOREIGN KEY (`fld_userID`) REFERENCES `tbl_users` (`fld_userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
