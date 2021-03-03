-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 20, 2021 at 08:03 PM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codingmo_cricket`
--

-- --------------------------------------------------------

--
-- Table structure for table `cric_match`
--

CREATE TABLE `cric_match` (
  `id` int(11) NOT NULL,
  `team1` varchar(255) NOT NULL,
  `team2` varchar(255) NOT NULL,
  `run` varchar(255) NOT NULL,
  `wickets` varchar(255) NOT NULL,
  `batting` varchar(255) NOT NULL,
  `over_num` varchar(255) NOT NULL,
  `over_balls` varchar(6) NOT NULL,
  `team1Logo` varchar(255) NOT NULL,
  `team2Logo` varchar(255) NOT NULL,
  `ball` varchar(255) NOT NULL,
  `all_num` varchar(255) NOT NULL,
  `live_url` varchar(1000) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `extra` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cric_match`
--

INSERT INTO `cric_match` (`id`, `team1`, `team2`, `run`, `wickets`, `batting`, `over_num`, `over_balls`, `team1Logo`, `team2Logo`, `ball`, `all_num`, `live_url`, `pin`, `extra`) VALUES
(1, 'Ward No.4', 'Ward No. 7(A)', '144', '11', 'Ward No. 7(A)', '15', '4', 'WhatsApp Image 2021-01-26 at 6.49.20 PM.jpg', 'WhatsApp Image 2021-01-26 at 6.49.20 PM.jpeg', 'white', 'Wide', 'oYcQkdkSvPI', 'manu1234', 'this is demo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cric_match`
--
ALTER TABLE `cric_match`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cric_match`
--
ALTER TABLE `cric_match`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
