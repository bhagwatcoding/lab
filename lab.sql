-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 06:30 AM
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
-- Database: `lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `cbc`
--

CREATE TABLE `cbc` (
  `cbc_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `cbc_total_rbc_count` int(11) NOT NULL,
  `cbc_total_platelets` int(11) NOT NULL,
  `total_wbc_count` int(11) NOT NULL,
  `neutrophils` int(11) NOT NULL,
  `lymphocytes` int(11) NOT NULL,
  `eosinophils` int(11) NOT NULL,
  `monocytes` int(11) NOT NULL,
  `basophils` int(11) NOT NULL,
  `hemoglobin` int(11) NOT NULL,
  `hct` int(11) NOT NULL,
  `mcv` int(11) NOT NULL,
  `mch` int(11) NOT NULL,
  `mchc` int(11) NOT NULL,
  `mpv` int(11) NOT NULL,
  `rdw%` int(11) NOT NULL,
  `rdwa` int(11) NOT NULL,
  `cbc_add_reoprt` date NOT NULL,
  `cbc_update_report` date NOT NULL,
  `cbc_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usecbc`
--

CREATE TABLE `usecbc` (
  `cbc_unit_id` int(11) NOT NULL,
  `hematology` varchar(255) NOT NULL,
  `normal_value` varchar(255) NOT NULL,
  `si_unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usecbc`
--

INSERT INTO `usecbc` (`cbc_unit_id`, `hematology`, `normal_value`, `si_unit`) VALUES
(1, 'TOTAL RBC COUNT', '4-6', 'mill/cmm'),
(2, 'TOTAL PLATELETS', '1.5-3.5', 'lakh/cmm'),
(3, 'TOTAL WBC COUNT', '4000-1000', '/cmm'),
(4, 'NEUTROPHILS', '50-70', '%'),
(5, 'LYMPHOCYTES', '20-40', '%'),
(6, 'EOSINOPHILS', '01-04', '%'),
(7, 'MONOCYTES', '02-10', '%'),
(8, 'BASOPHILS', '00-01', '%'),
(9, 'HEMOGLOBIN', '14.6 gm/dl=100', '%'),
(10, 'HCT', 'M=40-54%, F=37-47', '%'),
(11, 'MCV', '74-96', 'fl'),
(12, 'MCH', '27-32', 'pg'),
(13, 'MCHC', '00-35', '%'),
(14, 'MPV', '6.5-12.0', 'fl'),
(15, 'RDW%', '11.6-14.4', '%'),
(16, 'RDWA', '35.1-43.9', 'fl'),
(17, 'LPCR', '15-35', '%'),
(18, 'ESR', '04-08', 'mm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cbc`
--
ALTER TABLE `cbc`
  ADD PRIMARY KEY (`cbc_id`);

--
-- Indexes for table `usecbc`
--
ALTER TABLE `usecbc`
  ADD PRIMARY KEY (`cbc_unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cbc`
--
ALTER TABLE `cbc`
  MODIFY `cbc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usecbc`
--
ALTER TABLE `usecbc`
  MODIFY `cbc_unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
