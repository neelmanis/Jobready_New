-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2016 at 01:16 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobready`
--

-- --------------------------------------------------------

--
-- Table structure for table `master_interest_area`
--

CREATE TABLE `master_interest_area` (
  `id` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL,
  `title` varchar(250) NOT NULL,
  `is_compulsory` enum('1','0') NOT NULL,
  `duration` int(15) NOT NULL,
  `limit` int(25) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_interest_area`
--

INSERT INTO `master_interest_area` (`id`, `post_date`, `modified_date`, `title`, `is_compulsory`, `duration`, `limit`, `status`) VALUES
(1, '2016-01-09 10:58:20', '2016-01-09 16:38:23', 'MATH', '1', 10, 2, 1),
(2, '2016-01-09 11:01:15', '2016-01-09 17:34:04', 'APTITUDE', '1', 10, 2, 1),
(3, '2016-01-09 11:01:15', '0000-00-00 00:00:00', 'ENGLISH', '1', 10, 2, 1),
(4, '2016-01-09 11:02:18', '0000-00-00 00:00:00', 'CHEMISTRY', '1', 10, 3, 1),
(5, '2016-01-09 11:02:45', '0000-00-00 00:00:00', 'HINDI', '1', 10, 2, 1),
(6, '2016-01-09 11:04:06', '0000-00-00 00:00:00', 'FINANCE', '0', 5, 1, 1),
(7, '2016-01-09 11:04:34', '0000-00-00 00:00:00', 'INSURANCE', '0', 5, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master_interest_area`
--
ALTER TABLE `master_interest_area`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master_interest_area`
--
ALTER TABLE `master_interest_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
