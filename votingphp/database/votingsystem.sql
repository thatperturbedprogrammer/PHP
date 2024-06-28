-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2024 at 01:26 PM
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
-- Database: `votingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidatedocuments`
--

CREATE TABLE `candidatedocuments` (
  `id` int(255) NOT NULL,
  `candidatename` varchar(255) NOT NULL,
  `milestone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidatedocuments`
--

INSERT INTO `candidatedocuments` (`id`, `candidatename`, `milestone`) VALUES
(1, 'CandidateA', 'Acche din coming soon...'),
(2, 'Bapu', 'Satya ki rah pe chalna'),
(3, 'Middle Class Aadmi', 'Mai middle class ka representative hoon...'),
(4, 'Our Party', 'Let the ruling classes tremble at a Communistic revolution. '),
(5, 'CandidateX', ''),
(6, 'CandidateA', ''),
(7, 'CandidateB', ''),
(8, 'CandidateC', ''),
(9, 'CandidateD', ''),
(10, 'NOTA', '');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `standard` enum('candidate','voter') NOT NULL,
  `status` int(11) NOT NULL,
  `votes` int(200) NOT NULL,
  `verified` varchar(255) NOT NULL DEFAULT 'pending',
  `pdf` varchar(255) NOT NULL DEFAULT 'exampledoc.pdf'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`id`, `username`, `mobile`, `password`, `photo`, `standard`, `status`, `votes`, `verified`, `pdf`) VALUES
(15, 'CandidateA', '1234567890', '123456', 'candidateA.jpg', 'candidate', 1, 0, 'verified', 'ExampleCandidateDocument.pdf'),
(16, 'CandidateB', '1234567890', '123456', 'candidateB.jpg', 'candidate', 0, 0, 'verified', 'exampledoc.pdf'),
(17, 'CandidateC', '1234567890', '123456', 'candidateC.jpg', 'candidate', 0, 0, 'verified', 'exampledoc.pdf'),
(18, 'CandidateD', '1234567890', '123456', 'candidateD.jpg', 'candidate', 0, 0, 'verified', 'exampledoc.pdf'),
(19, 'NOTA', '1234567890', '123456', 'CandidateNOTA.jpg', 'candidate', 0, 1, 'verified', 'exampledoc.pdf'),
(21, 'ExampleVoter', '1234567890', '123456', 'defaultuserimage.jpeg', 'voter', 0, 0, 'verified', 'ExampleVoterDocument.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidatedocuments`
--
ALTER TABLE `candidatedocuments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidatedocuments`
--
ALTER TABLE `candidatedocuments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
