-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2016 at 06:16 AM
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
-- Table structure for table `admin_master`
--

CREATE TABLE `admin_master` (
  `id` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `contact_name` varchar(255) NOT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `status` int(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`id`, `post_date`, `contact_name`, `email_id`, `password`, `role`, `mobile_no`, `status`, `address`) VALUES
(1, '2015-10-15 06:15:02', 'Mukesh', 'mukesh@kwebmaker.com', '12345', 'Super Admin', '7498949490', 1, '25,26 Basement AC Market Tardeo\\r\\n\\r\\nKWEBMAKER'),
(2, '2015-09-03 23:51:13', 'Neel', 'neelmani@kwebmaker.com', '12345', 'Super Admin', '9619662253', 1, '25,26 Basement AC Market Tardeo\\r\\n\\r\\nKWEBMAKER'),
(3, '2015-10-15 06:16:49', 'kweb', 'kweb@kwebmaker.com', '12345', 'Admin', '0223652', 1, '25,26 Basement AC Market Tardeo\\r\\n\\r\\nKWEBMAKER'),
(11, '2016-02-01 10:01:15', 'Jobready', 'jobreadyadmin', 'jobready@2015', 'Super Admin', '8956230147', 1, 'Mumbai');

-- --------------------------------------------------------

--
-- Table structure for table `job_area_of_interest`
--

CREATE TABLE `job_area_of_interest` (
  `id` int(11) NOT NULL,
  `registration_id` int(11) NOT NULL,
  `area_of_interest` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_area_of_interest`
--

INSERT INTO `job_area_of_interest` (`id`, `registration_id`, `area_of_interest`) VALUES
(7, 47, 7),
(8, 57, 8),
(50, 60, 6),
(51, 60, 7),
(52, 60, 8),
(60, 62, 6),
(61, 62, 7),
(73, 65, 8),
(103, 67, 6),
(104, 68, 6),
(133, 59, 7),
(134, 59, 8),
(144, 45, 6),
(145, 69, 8),
(154, 63, 6),
(155, 63, 8),
(156, 64, 7),
(157, 70, 6);

-- --------------------------------------------------------

--
-- Table structure for table `job_education_profile`
--

CREATE TABLE `job_education_profile` (
  `id` int(11) NOT NULL,
  `registration_id` int(11) NOT NULL,
  `education` int(11) NOT NULL,
  `education_others` varchar(200) NOT NULL,
  `college` int(11) NOT NULL,
  `college_other` varchar(200) NOT NULL,
  `specialization` varchar(200) NOT NULL,
  `year_of_completion` varchar(21) NOT NULL,
  `percentage` varchar(21) NOT NULL,
  `post_date` datetime NOT NULL,
  `ip_address` varchar(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_education_profile`
--

INSERT INTO `job_education_profile` (`id`, `registration_id`, `education`, `education_others`, `college`, `college_other`, `specialization`, `year_of_completion`, `percentage`, `post_date`, `ip_address`) VALUES
(3, 47, 2, '', 3, '', 'science', '1987', '60', '2016-01-11 02:37:02', '::1'),
(4, 48, 3, '', 5, '', 'commerce', '1996', '8', '2016-01-13 09:36:31', '122.161.20.62'),
(6, 57, 1, '', 1, '', 'Finance', '2004', '87', '2016-01-14 12:35:59', '116.72.138.210'),
(8, 60, 4, '', 3, '', 'sales', '1991', '50', '2016-01-20 01:33:22', '122.170.116.61'),
(9, 60, 4, '', 3, '', 'marketig', '1998', '65', '2016-01-20 01:33:43', '122.170.116.61'),
(10, 63, 2, '', 7, '', 'Finance', '2004', '85', '2016-01-21 02:42:28', '::1'),
(11, 64, 9, '', 6, '', 'Finaince', '2012', '78', '2016-01-21 02:49:54', '::1'),
(12, 65, 5, '', 1, '', 'Business', '2010', '98', '2016-01-21 03:04:31', '::1'),
(14, 67, 9, '', 4, '', 'Banking', '2003', '86', '2016-01-22 11:57:34', '::1'),
(15, 68, 2, '', 3, '', 'Accounts', '1988', '89', '2016-01-27 11:51:59', '127.0.0.1'),
(18, 59, 2, '', 1, '', 'Acc', '1988', '90', '2016-01-27 02:55:46', '127.0.0.1'),
(27, 69, 1, '', 6, '', 'fdhdfh', '1991', '34', '2016-01-27 07:07:23', '127.0.0.1'),
(28, 69, 2, '', 2, '', 'sdg', '1987', '556', '2016-01-27 07:07:40', '127.0.0.1'),
(52, 45, 12, '', 10, '', 'eeee', '1994', '34', '2016-01-28 11:48:48', '127.0.0.1'),
(55, 45, 12, '', 9, '', 'yyyyy', '1991', '56', '2016-01-28 11:52:36', '127.0.0.1'),
(56, 45, 1, '', 3, '', 'ghgh', '1988', '33', '2016-01-28 11:57:28', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `job_profile`
--

CREATE TABLE `job_profile` (
  `id` int(11) NOT NULL,
  `registration_id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `company_name` varchar(251) NOT NULL,
  `company_profile` text NOT NULL,
  `company_contact_email` varchar(21) NOT NULL,
  `comapny_landline` varchar(51) NOT NULL,
  `gender` varchar(21) NOT NULL,
  `mobile` varchar(21) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `address3` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `pincode` varchar(51) NOT NULL,
  `brief_profile` text NOT NULL,
  `preffered_location` varchar(251) NOT NULL,
  `keyword_skill` text NOT NULL,
  `upload_cv` varchar(200) NOT NULL,
  `post_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(51) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_profile`
--

INSERT INTO `job_profile` (`id`, `registration_id`, `fname`, `designation`, `company_name`, `company_profile`, `company_contact_email`, `comapny_landline`, `gender`, `mobile`, `dob`, `address1`, `address2`, `address3`, `city`, `pincode`, `brief_profile`, `preffered_location`, `keyword_skill`, `upload_cv`, `post_date`, `modified_date`, `ip_address`, `status`) VALUES
(1, 45, 'mukesh', '', '', '', '', '', 'Male', '9870002681', '05-03-1990', '6/25 geeta colony', 'delhi-110031', 'mumbai 400101', '2', '400007', 'hi\r\nku\r\nki\r\nii\r\n', '3', 'php,jquery', 'mukesh_new.docx', '2016-01-09 08:15:20', '2016-01-09 08:15:20', '', '1'),
(2, 46, 'mukesh', '', 'kweb', 'Working since 1990', 'sachin@kwebmaker.com', '', '', '9870002681', '', 'C-405, DHARAM PALACE', '100-103 N.S. PATKAR MARG', '', '', '400007', '', '', '', '', '2016-01-11 02:11:48', '2016-01-11 02:11:48', '', '1'),
(5, 47, 'Sachin', '', '', '', '', '', 'Male', '9987753814', '06-01-2016', '25,26 basement', 'tardeo ac market', '', '3', '110005', 'I have 14 yrs of exp', 'delhi', 'php,magento,javascript', '', '2016-01-11 01:06:06', '2016-01-11 01:06:06', '', '1'),
(6, 48, '1111', '', '', '', '', '', 'Male', '1234567890', '06-01-1987', '11', '111', '11111', '3', '123456', '', '', '', '', '2016-01-13 09:00:36', '2016-01-13 09:00:36', '', '1'),
(7, 49, 'P', '', 'E1', 'w3eirwifiw\nwerwrw\ndvd\nrhrhrvdnvkdnbnsknkbsnknknbkr\nreegdbdnenbnebb\negeg\negegvddge\nbeg\nege\nt\nete\nh\neg\ne\nhr\ne\nyervdknvneklnle\nbe\nbeb\nebenkvnenivever\neleknbebieibdjnbvkjxg\nnvennvebvbsb\neniebiuguioigw\nvnenwiufwg\nwefewvw', 'p@e1.com', '1111111111', '', '1111111111', '', '11', '11', '11', '', '1111111', '', '', '', '', '2016-01-13 09:52:00', '2016-01-13 09:52:00', '', '1'),
(15, 57, 'Neel', '', '', '', '', '', 'Male', '9656235698', '07-01-1988', 'Mumbai', 'Girgaon', 'Mumbai', '3', '400001', 'Hello', 'Pune', 'Finance,Banks', '', '2016-01-14 12:34:42', '0000-00-00 00:00:00', '', '1'),
(16, 58, 'Deepen', '', 'Tech', 'Software Development', 'deepen@gmail.com', '022-235689', '', '9966895623', '', 'Fort', 'Library', 'Mumbai', '', '400001', '', '', '', '', '2016-01-14 12:36:45', '2016-01-14 12:36:45', '', '1'),
(17, 59, 'Student 1', '', '', '', '', '', 'Male', '9123456780', '15-01-1986', 'qqqqq', '1111', '', '4', '1220001', 'Hellllo\r\nkumat\r\n\r\n\r\ng\r\ngfh\r\n', 'Ambala', 'Charted Accounted', 'gjepc.txt', '2016-01-14 06:53:35', '2016-01-14 06:53:35', '', '1'),
(18, 60, 'maukesh123', '', '', '', '', '', 'Male', '9870002691', '20-01-2016', '7089/10, FIRST FLOOOR', 'RAMESHWARI NEHRU NAGAR', '', '3', '400034', 'this is job', 'mumbai', 'php,java', 'mukesh.docx', '2016-01-20 01:04:07', '2016-01-20 01:04:07', '', '1'),
(19, 61, 'hussain', '', 'kweb', 'its digital agency', 'hussin@kwebmaker.com', '', '', '5656565662', '', '7089/10, FIRST FLOOOR', 'RAMESHWARI NEHRU NAGAR', '', '', '400034', '', '', '', '', '2016-01-20 01:58:57', '2016-01-20 01:58:57', '', '1'),
(20, 62, 'pankaj', '', '', '', '', '', 'Male', '9999999898', '15-01-1986', 'qqqqq', '1111', '', '2', '1220001', '', '', '', '', '2016-01-21 12:56:30', '2016-01-21 12:56:30', '', '1'),
(21, 63, 'Deepen', '', '', '', '', '', 'Male', '1111111111', '23-01-1979', 'Mulund', 'East', 'Mumbai', '7', '400078', 'Looking Traine', '3', 'java,html', '', '2016-01-21 02:40:26', '2016-01-21 02:40:26', '', '1'),
(22, 64, 'kalpesh Kumar', '', '', '', '', '', 'Male', '2222222222', '21-01-1990', 'Vashi', 'Near  Station', 'Mumbai', '7', '402115', 'Hello', '5', 'html,css,Jquery,Charted Accountant,Bus Driver', 'CV (1).docx', '2016-01-21 02:48:19', '2016-01-21 02:48:19', '', '1'),
(23, 65, 'Neelmani Gupta', '', '', '', '', '', 'Male', '0056232568', '07-03-1988', 'Khetwadi', 'Girgaon', 'Mumbai', '3', '400001', 'helli', 'Mumbai', 'php,jquery,opencart,html', '021445_holding-statement-1.docx', '2016-01-21 03:02:25', '2016-01-21 03:02:25', '', '1'),
(24, 66, 'Sanjay', '', 'Farasbee', 'Hardware Development', 'sanjay@gmail.com', '022-235689', '', '', '', 'Andheri marol', 'Near Metro', 'Mumbai', '', '401254', '', '', '', '', '2016-01-21 03:38:49', '2016-01-21 03:38:49', '', '1'),
(25, 67, 'Heena K', '', '', '', '', '', 'Female', '', '22-01-1990', 'Mumbai Central', 'East', 'Mumbai', '8', '40003', 'hi\r\nhi\r\nhi\r\nhi\r\nhi\r\nhi\r\n', 'Mumbai', 'Charted Accountant,Bus Conductor,Java,mysql,Php', '003_holding-statement-1.doc', '2016-01-22 11:54:39', '2016-01-22 11:54:39', '', '1'),
(26, 68, 'Mithun Kumar Yadav', '', '', '', '', '', 'Male', '', '27-01-1990', 'Goregan East Near Station', 'Fruit Market', 'Mumbai', '3', '400125', 'Hello i m looking job', 'Pune', 'php,mysql,finance,Charted Accounted', 'catalogB.pdf', '2016-01-27 11:48:19', '2016-01-27 11:48:19', '', '1'),
(27, 69, 'K K Yadav', '', '', '', '', '', 'Male', '', '23-01-2016', 'Jesij Chauraha', 'Near Line bazar ', 'Jaunpur', '4', '220025', 'Hello', '1', 'java,Accounts,Charted Accounts', 'cv.pdf', '2016-01-27 04:47:29', '2016-01-27 04:47:29', '', '1'),
(28, 70, 'Neelmani Gupta', '', '', '', '', '', 'Male', '', '07-03-1988', 'Khetwadi', 'Girgaon', 'Mumbai', '3', '400001', 'Hello i m looking job', '2', 'finance,java script', 'cv.pdf', '2016-01-29 10:56:30', '2016-01-29 10:56:30', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `job_registration`
--

CREATE TABLE `job_registration` (
  `id` int(11) NOT NULL,
  `type_of_actor` enum('O','S','T','F') NOT NULL DEFAULT 'O',
  `registration_type` enum('SA','A') NOT NULL,
  `refer_registration_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `post_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(21) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `Fuid` varchar(250) NOT NULL,
  `oauth_uid` varchar(250) NOT NULL,
  `gpluslink` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_registration`
--

INSERT INTO `job_registration` (`id`, `type_of_actor`, `registration_type`, `refer_registration_id`, `email`, `password`, `mobile_no`, `post_date`, `modified_date`, `ip_address`, `status`, `Fuid`, `oauth_uid`, `gpluslink`) VALUES
(45, 'S', 'SA', 0, 'mukesh@kwebmaker.com', 'e10adc3949ba59abbe56e057f20f883e', 9870002691, '2016-01-09 08:15:20', '2016-01-09 08:15:20', '122.170.116.61', '1', '', '', ''),
(46, 'F', 'SA', 0, 'mukesh1@kwebmaker.com', 'e10adc3949ba59abbe56e057f20f883e', 7498949490, '2016-01-11 02:11:48', '2016-01-11 02:11:48', '127.0.0.1', '1', '', '', ''),
(47, 'T', 'SA', 0, 'mukesh2@kwebmaker.com', 'e10adc3949ba59abbe56e057f20f883e', 8989898989, '2016-01-11 01:06:06', '2016-01-11 01:06:06', '::1', '1', '', '', ''),
(48, 'S', 'SA', 0, '11@222.com', '01cfcd4f6b8770febfb40cb906715822', 1234567890, '2016-01-13 09:00:36', '2016-01-13 09:00:36', '122.161.20.62', '1', '', '', ''),
(49, 'F', 'SA', 0, 'E1@e1.com', 'e10adc3949ba59abbe56e057f20f883e', 1111111111, '2016-01-13 09:52:00', '2016-01-13 09:52:00', '122.161.20.62', '1', '', '', ''),
(57, 'T', 'SA', 0, 'gupta_neelmani@rediffmail.com', '', 0, '2016-01-14 12:34:42', '2016-01-14 12:36:27', '116.72.138.210', '1', '1034551103268994', '', ''),
(58, 'F', 'SA', 0, 'gupta.neel1@gmail.com', '', 0, '2016-01-14 12:36:45', '2016-01-14 12:38:11', '116.72.138.210', '1', '', '102066298405863387806', 'https://plus.google.com/102066298405863387806'),
(59, 'S', 'SA', 0, 'S1@SS.com', 'e10adc3949ba59abbe56e057f20f883e', 9123456780, '2016-01-14 06:53:35', '2016-01-14 06:53:35', '122.161.20.62', '1', '', '', ''),
(60, 'S', 'SA', 0, '11@ss.com', '827ccb0eea8a706c4c34a16891f84e7b', 1234568090, '2016-01-20 01:04:07', '2016-01-27 10:39:44', '122.170.116.61', '1', '', '', ''),
(61, 'F', 'SA', 0, 'sp@e.com', '827ccb0eea8a706c4c34a16891f84e7b', 7666660996, '2016-01-20 01:58:57', '2016-01-20 01:58:57', '122.170.116.61', '1', '', '', ''),
(62, 'S', 'SA', 0, 'neelmani1@kwebmaker.com', 'e10adc3949ba59abbe56e057f20f883e', 8520123654, '2016-01-21 12:56:30', '2016-01-21 12:56:30', '1.39.32.42', '1', '', '', ''),
(63, 'T', 'SA', 0, 'deepen@techno.com', '827ccb0eea8a706c4c34a16891f84e7b', 8956230145, '2016-01-21 02:40:26', '2016-01-21 02:40:26', '::1', '1', '', '', ''),
(64, 'S', 'SA', 0, 'kalpesh@kwebmaker.com', '827ccb0eea8a706c4c34a16891f84e7b', 8956301574, '2016-01-21 02:48:19', '2016-01-21 02:48:19', '::1', '1', '', '', ''),
(65, 'S', 'SA', 0, 'neel@kwebmaker.com', '827ccb0eea8a706c4c34a16891f84e7b', 9966230158, '2016-01-21 03:02:25', '2016-01-21 03:02:25', '::1', '1', '', '', ''),
(66, 'F', 'SA', 0, 'sanjay@farasbee.com', '827ccb0eea8a706c4c34a16891f84e7b', 9562256000, '2016-01-21 03:38:49', '2016-01-21 03:38:49', '::1', '1', '', '', ''),
(67, 'S', 'SA', 0, 'heena@yahoo.com', '827ccb0eea8a706c4c34a16891f84e7b', 8956348301, '2016-01-22 11:54:39', '2016-01-22 11:54:39', '::1', '1', '', '', ''),
(68, 'S', 'SA', 0, 'mithun@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 8956201458, '2016-01-27 11:48:19', '2016-01-27 11:48:19', '127.0.0.1', '1', '', '', ''),
(69, 'S', 'SA', 0, 'kumar_singh@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 8956238145, '2016-01-27 04:47:29', '2016-01-27 04:47:29', '127.0.0.1', '1', '', '', ''),
(70, 'S', 'SA', 0, 'neelmani@kwebmaker.com', 'e10adc3949ba59abbe56e057f20f883e', 8956230945, '2016-01-29 10:56:30', '2016-01-29 10:56:30', '127.0.0.1', '1', '', '', '');

--
-- Triggers `job_registration`
--
DELIMITER $$
CREATE TRIGGER `user_registration` AFTER INSERT ON `job_registration` FOR EACH ROW BEGIN
INSERT INTO job_profile (registration_id,post_date,modified_date) VALUES (NEW.id,NEW.post_date,NEW.modified_date);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `job_student_job_interest`
--

CREATE TABLE `job_student_job_interest` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `employer_registraion_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `registration_id` int(11) NOT NULL COMMENT 'Student Registration Id',
  `employer_acceptance` enum('P','Y','N') NOT NULL,
  `candidate_interviewed` enum('P','Y') NOT NULL,
  `candidate_offered` enum('P','Y') NOT NULL,
  `comment` varchar(250) NOT NULL,
  `post_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_student_job_interest`
--

INSERT INTO `job_student_job_interest` (`id`, `job_id`, `employer_registraion_id`, `admin_id`, `registration_id`, `employer_acceptance`, `candidate_interviewed`, `candidate_offered`, `comment`, `post_date`, `modified_date`) VALUES
(1, 2, 0, 2, 45, 'Y', 'P', 'P', '', '2016-01-11 02:09:46', '2016-01-21 16:13:41'),
(2, 21, 50, 0, 50, 'P', 'P', 'P', '', '2016-01-13 10:04:02', '2016-01-21 16:13:28'),
(3, 17, 0, 2, 60, 'P', 'P', 'P', '', '2016-01-20 01:40:38', '2016-01-21 16:13:28'),
(4, 22, 51, 0, 61, 'P', 'P', 'P', '', '2016-01-20 02:17:05', '2016-01-21 16:13:28'),
(5, 26, 46, 0, 45, 'Y', 'P', 'P', '', '2016-01-30 11:51:03', '2016-01-30 11:51:03'),
(6, 26, 46, 0, 69, 'Y', 'P', 'P', '', '2016-02-01 04:04:14', '2016-02-01 16:04:14'),
(7, 25, 66, 0, 69, 'Y', 'P', 'P', '', '2016-02-01 04:05:20', '2016-02-01 16:05:20'),
(8, 24, 61, 0, 69, 'P', 'P', 'P', '', '2016-02-01 04:07:27', '2016-02-01 16:07:27'),
(9, 26, 46, 0, 69, 'P', 'P', 'P', '', '2016-02-01 04:10:24', '2016-02-01 16:10:24'),
(10, 27, 46, 0, 68, 'P', 'P', 'P', '', '2016-02-01 04:12:44', '2016-02-01 16:12:44'),
(11, 27, 46, 0, 67, 'P', 'P', 'P', '', '2016-02-01 04:33:15', '2016-02-01 16:33:15'),
(12, 25, 66, 0, 67, 'P', 'P', 'P', '', '2016-02-01 04:41:41', '2016-02-01 16:41:41');

-- --------------------------------------------------------

--
-- Table structure for table `job_student_training_interest`
--

CREATE TABLE `job_student_training_interest` (
  `id` int(11) NOT NULL,
  `training_id` int(11) NOT NULL,
  `trainer_registraion_id` int(11) NOT NULL,
  `registration_id` int(11) NOT NULL COMMENT 'Student Registration Id',
  `trainer_acceptance` enum('P','Y','N') NOT NULL,
  `post_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_student_training_interest`
--

INSERT INTO `job_student_training_interest` (`id`, `training_id`, `trainer_registraion_id`, `registration_id`, `trainer_acceptance`, `post_date`) VALUES
(1, 0, 47, 60, 'P', '2016-01-20 01:47:12'),
(2, 0, 0, 69, 'P', '2016-02-01 04:02:50'),
(3, 0, 0, 67, 'P', '2016-02-01 04:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `job_training_list`
--

CREATE TABLE `job_training_list` (
  `id` int(11) NOT NULL,
  `registration_id` int(11) NOT NULL COMMENT 'Trainer Registration Id',
  `admin_id` int(11) NOT NULL,
  `area_of_interest` int(11) NOT NULL,
  `admin_trainer_name` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `doc` varchar(51) NOT NULL,
  `post_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_training_list`
--

INSERT INTO `job_training_list` (`id`, `registration_id`, `admin_id`, `area_of_interest`, `admin_trainer_name`, `title`, `description`, `doc`, `post_date`, `modified_date`, `status`) VALUES
(1, 47, 0, 6, '', '', 'Description', 'mukesh.docx', '2016-01-11 02:38:02', '0000-00-00 00:00:00', '1'),
(2, 0, 11, 1, 'Hyperion Training', '', 'hyperion', '123.txt.txt', '2016-01-14 09:10:09', '2016-01-30 13:41:57', '1'),
(3, 0, 1, 2, 'Magento training', 'Magento Training', 'Magento theme development', 'Registration process.docx', '2016-01-15 13:42:14', '2016-02-01 15:26:28', '1'),
(4, 63, 0, 6, '', '', 'FinanceStudent', 'CV.docx', '2016-01-21 02:43:09', '0000-00-00 00:00:00', '1'),
(5, 63, 0, 7, '', 'Insurance Training', 'Training For Insurance', 'CV (1).docx', '2016-01-21 02:44:08', '0000-00-00 00:00:00', '1'),
(6, 47, 0, 8, '', '', 'Banking Training', '021445_holding-statement-1.docx', '2016-01-21 02:46:07', '0000-00-00 00:00:00', '1'),
(7, 63, 0, 8, '', '', 'Bank PO JOBS', 'CV.docx', '2016-01-21 03:48:18', '0000-00-00 00:00:00', '1'),
(8, 63, 0, 6, '', 'finance traingn', 'ffffffffffff', 'cv.pdf', '2016-01-29 06:35:37', '0000-00-00 00:00:00', '1'),
(9, 0, 2, 2, 'BOB', 'Finace Seminar', 'Finance Live Training', 'JOB_READY_FINAlLIST.docx', '2016-01-30 12:01:47', '2016-02-01 15:30:08', '1'),
(10, 0, 2, 1, 'John', 'Banks PO', 'Bankpo job Training', 'CV - Copy.docx', '2016-01-30 12:16:59', '2016-02-01 15:30:22', '1'),
(11, 47, 0, 6, '', 'Training Finance', 'hello', 'exam_score.txt', '2016-02-01 11:17:34', '0000-00-00 00:00:00', '1'),
(12, 0, 1, 3, '', 'Php Trainng', 'Insurance Training', 'CV.docx', '2016-02-01 15:27:15', '0000-00-00 00:00:00', '1');

-- --------------------------------------------------------

--
-- Table structure for table `master_area_of_interest`
--

CREATE TABLE `master_area_of_interest` (
  `id` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL,
  `subject` varchar(250) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_area_of_interest`
--

INSERT INTO `master_area_of_interest` (`id`, `post_date`, `modified_date`, `subject`, `status`) VALUES
(1, '2016-01-22 13:09:57', '2016-01-22 18:45:09', 'BANKING', '1'),
(2, '2016-01-22 13:15:25', '0000-00-00 00:00:00', 'FINANCE', '1'),
(3, '2016-01-22 13:15:40', '0000-00-00 00:00:00', 'INSURANCE', '1');

-- --------------------------------------------------------

--
-- Table structure for table `master_city`
--

CREATE TABLE `master_city` (
  `id` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL,
  `city` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_city`
--

INSERT INTO `master_city` (`id`, `post_date`, `modified_date`, `city`, `status`) VALUES
(1, '2015-10-19 04:39:03', '2015-10-20 18:32:18', 'Varanasi', 1),
(2, '2015-10-19 04:39:03', '2015-10-19 15:50:38', 'Jaunpur', 1),
(3, '2015-10-19 04:44:08', '2015-10-19 16:36:51', 'Mumbai', 1),
(4, '2015-10-19 04:44:46', '0000-00-00 00:00:00', 'Ahmedabad', 1),
(5, '2015-10-19 04:45:47', '2016-01-27 13:19:19', 'Jaipur', 1),
(6, '2015-10-19 05:01:41', '2015-10-20 10:49:08', 'Jabalpur', 0),
(7, '2015-10-20 04:20:06', '0000-00-00 00:00:00', 'Ambala', 1),
(8, '2015-10-20 05:26:14', '2016-01-27 13:09:12', 'Nashik', 0),
(9, '2016-01-27 07:35:40', '0000-00-00 00:00:00', 'New Delhi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_education`
--

CREATE TABLE `master_education` (
  `id` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL,
  `education` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_education`
--

INSERT INTO `master_education` (`id`, `post_date`, `modified_date`, `education`, `status`) VALUES
(1, '2015-10-19 02:00:52', '2015-11-16 12:27:27', 'B.A.', 1),
(2, '2015-10-19 02:00:52', '2015-10-19 13:11:51', 'B.Sc', 1),
(3, '2015-10-19 03:27:04', '2015-10-19 14:29:07', 'C.A', 1),
(4, '2015-10-19 03:27:11', '2015-10-19 14:38:44', 'B.B.A', 1),
(5, '2015-10-19 03:38:27', '2015-10-20 10:48:20', 'B.E', 1),
(6, '2015-10-20 06:47:12', '2015-10-21 16:28:30', 'H.S.C', 0),
(7, '2015-10-20 23:22:54', '2015-10-21 16:28:35', 'S.S.C', 0),
(8, '2015-12-27 09:18:05', '0000-00-00 00:00:00', 'MBA', 1),
(9, '2015-12-27 09:18:16', '0000-00-00 00:00:00', 'BBA', 1),
(10, '2015-12-27 09:18:24', '0000-00-00 00:00:00', 'CA', 1),
(11, '2015-12-27 09:18:36', '0000-00-00 00:00:00', 'CIMA', 1),
(12, '2015-12-27 09:18:55', '0000-00-00 00:00:00', 'MBBS', 1),
(13, '2016-01-14 04:18:50', '0000-00-00 00:00:00', 'B. Com.', 1),
(14, '2016-01-14 04:19:12', '0000-00-00 00:00:00', 'ACCA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_events_list`
--

CREATE TABLE `master_events_list` (
  `id` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL,
  `events_date` varchar(100) NOT NULL,
  `title` varchar(250) NOT NULL,
  `desc` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_events_list`
--

INSERT INTO `master_events_list` (`id`, `post_date`, `modified_date`, `events_date`, `title`, `desc`, `type`, `status`) VALUES
(1, '2015-10-21 01:27:52', '2016-01-15 15:34:23', '20-10-2015', 'Wedding', '<p>Wedding&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummyLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indus', 'Workshops', '0'),
(2, '2015-10-21 01:33:53', '2016-01-15 15:34:33', '14-10-2015', 'Reception', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry&#39;s. Lorem Ipsum has been the industry standard dummyLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry neelsss m', 'Seminars', '0'),
(3, '2015-10-21 01:37:09', '2016-01-15 15:36:48', '16-10-2015', 'Sports', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry&#39;s. Lorem Ipsum has been the industry standard dummyLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry neelsss m', 'Workshops', '1'),
(4, '2015-10-21 02:39:32', '2016-01-15 15:32:52', '22-10-2015', 'Zym Training', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummyLorem Ipsum is simply dummy text of the printing and typesetting industry</p>', 'Training', '1'),
(5, '2015-10-21 02:42:33', '2016-01-15 15:31:57', '05-10-2015', 'Songs Events', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummyLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry neelsss m</p>', 'Training', '1'),
(6, '2015-10-21 04:21:18', '2016-01-15 15:34:55', '30-10-2015', 'Financial Controller', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummyLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry neelsss</p>', 'Seminars', '1'),
(7, '2015-10-22 23:56:10', '2016-01-15 15:35:07', '04-11-2015', 'Singing', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummyLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry neelsss m</p>', 'Seminars', '1'),
(8, '2015-10-26 04:48:24', '2016-01-15 15:35:44', '14-10-2015', 'Dance Competition', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry&#39;s. Lorem Ipsum has been the industry standard dummyLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry neelsss&l', 'Workshops', '1'),
(9, '2016-01-14 04:24:13', '2016-01-15 15:35:55', '29-01-2016', 'Seminar Job opportunities for youth in India', '<p>To discuss the available job opportunities in India for youths.</p>', 'Seminars', '1'),
(10, '2016-01-14 09:48:35', '2016-01-15 15:36:09', '04-02-2016', 'Aptitude Competetion', '<p>Aptitude exam</p>', 'Workshops', '1'),
(11, '2016-01-14 10:03:42', '2016-01-15 15:33:36', '27-01-2016', 'OBIEE training', '<p>4 day OBIEE training by PM</p>\r\n\r\n<p>call jobready helpline to register or enroll in training section</p>\r\n\r\n<p>&nbsp;</p>', 'Training', '1');

-- --------------------------------------------------------

--
-- Table structure for table `master_feedback`
--

CREATE TABLE `master_feedback` (
  `id` int(11) NOT NULL,
  `registration_id` int(11) NOT NULL COMMENT 'login_user_id',
  `trainer_id` int(11) NOT NULL,
  `feed_description` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_general_question`
--

CREATE TABLE `master_general_question` (
  `id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL,
  `question` varchar(250) NOT NULL,
  `option1` varchar(250) NOT NULL,
  `option2` varchar(250) NOT NULL,
  `option3` varchar(250) NOT NULL,
  `option4` varchar(250) NOT NULL,
  `true_ans` varchar(250) NOT NULL,
  `marks` varchar(250) NOT NULL,
  `duration` varchar(250) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_general_question`
--

INSERT INTO `master_general_question` (`id`, `sub_id`, `post_date`, `modified_date`, `question`, `option1`, `option2`, `option3`, `option4`, `true_ans`, `marks`, `duration`, `status`) VALUES
(1, 1, '2015-10-26 03:32:46', '2016-01-13 11:57:59', 'What is the difference between XML and HTML?', 'HTML can have user defined tags, XML cannot', 'HTML is used for exchanging data, XML is not.', 'XML is used for exchanging data, HTML is not', 'Both b and c above', '1', '3', '', '1'),
(2, 7, '2015-10-26 06:45:56', '2016-01-28 12:22:42', 'What is php ?', 'Script', 'Programmimg Language', 'Server', 'Object Oriented Language', '1', '8', '', '1'),
(3, 6, '2015-10-26 06:48:56', '2016-01-28 13:43:19', 'Geometry calculation Formula ?', '10', '2', '3', '8', '3', '8', '', '1'),
(4, 2, '2015-10-26 06:51:14', '2016-01-23 12:41:13', 'New York is ----- large city', 'a', 'an', 'the', 'Not Any', '3', '9', '', '1'),
(5, 1, '2015-10-26 07:42:26', '2015-10-27 14:46:55', 'Which tags are most commonly used by search engines?', 'Paragrah', 'Heading', 'Title', 'All of above', '3', '9', '6', '1'),
(6, 3, '2015-10-27 00:43:57', '2015-10-27 14:39:18', 'Where did India play its 1st one Day international match?', 'Lords', 'Headingley', 'Taunton', 'The Oval', '2', '7', '8', '1'),
(7, 2, '2015-10-27 00:44:43', '2015-10-29 11:11:08', 'Who was the 1st ODI captain for India?', 'Ajit Wadekar', 'Bishen Singh Bedi', 'Nawab Pataudi', 'Vinoo Mankad', '2', '9', '6', '1'),
(8, 3, '2015-10-27 04:48:59', '2015-10-29 11:10:50', 'The bankers gain of a certain sum due 2 years hence at 10% per annum is Rs. 24. The present worth is:', '48', '56', '99', '69', '3', '5', '3', '1'),
(9, 5, '2015-11-09 02:01:49', '0000-00-00 00:00:00', 'Wha it is chemistry ', 'Language', 'Religion', 'None', 'Subject', '4', '2', '1', '1'),
(10, 5, '2015-11-09 04:02:27', '0000-00-00 00:00:00', 'The nucleus of an atom consists of', 'electrons and neutrons', 'electrons and protons', 'protons and neutrons', 'All of the above', '1', '2', '1', '1'),
(11, 4, '2015-11-09 04:04:28', '0000-00-00 00:00:00', 'The number of moles of solute present in 1 kg of a solvent is called its', 'molality', 'molarity', 'normality', 'formality', '2', '3', '1', '1'),
(12, 4, '2015-11-09 04:05:36', '0000-00-00 00:00:00', 'The metallurgical process in which a metal is obtained in a fused state is called', 'smelting', 'roasting', 'calcinations', 'floatation', '3', '3', '1', '1'),
(13, 3, '2015-11-09 04:08:53', '0000-00-00 00:00:00', 'If one-third of one-fourth of a number is 15, then three-tenth of that number is:', '35', '45', '39', '47', '2', '2', '1', '1'),
(14, 3, '2015-11-09 04:09:29', '0000-00-00 00:00:00', 'A two-digit number is such that the product of the digits is 8. When 18 is added to the number, then the digits are reversed. The number is:', '18', '24', '42', '81', '4', '2', '1', '1'),
(15, 5, '2015-11-09 04:11:37', '0000-00-00 00:00:00', 'Which one of the following is incombustible ?', 'H2', 'CCl4', 'C2H2', 'S', '1', '3', '1', '1'),
(16, 1, '2015-11-09 04:51:06', '0000-00-00 00:00:00', '20 % of 2 is equal to ', '20', '4', '0.4', '0.2', '1', '2', '1', '1'),
(17, 1, '2015-12-18 06:15:12', '2016-01-23 12:31:46', 'Who is regarded as father of modern chemistry ?', 'Ruterford', 'Einstein', 'C.V. Raman', 'Lavoisier', '1', '3', '', '1'),
(18, 2, '2015-12-18 06:15:12', '2016-01-23 12:33:41', 'Poetry related With which Area ?', 'Accounting', 'Science', 'Art', 'English', '4', '3', '', '1'),
(19, 4, '2016-01-10 19:11:03', '0000-00-00 00:00:00', 'H20 mean??', 'water', 'earth', 'air', 'fire', '1', '2', '', '1'),
(20, 4, '2016-01-13 13:29:29', '2016-01-23 12:23:13', 'TEST FINANACE', 'right', 'left', 'up', 'down', '1', '2', '', '1'),
(21, 2, '2016-01-23 07:10:06', '0000-00-00 00:00:00', 'Are you attending ----- reception today', 'a', 'an', 'the', 'Not Any', '3', '2', '', '1'),
(22, 2, '2016-01-23 07:23:22', '0000-00-00 00:00:00', 'She wants to become ----- engineer', 'a', 'an', 'the', 'Not Anything', '2', '2', '', '1'),
(23, 7, '2016-01-28 07:48:42', '0000-00-00 00:00:00', 'mysql_connect( ) does not take following parameter', 'database host', 'User id', 'password', 'db name', '1', '12', '', '1'),
(24, 7, '2016-01-28 07:49:43', '2016-01-28 13:49:14', 'Which of the following delimiter syntax is PHP default delimiter syntax', 'Tag <?php ?>', 'echo', 'Tag of Java', 'Nothing', '1', '3', '', '1'),
(25, 6, '2016-01-28 07:50:58', '0000-00-00 00:00:00', 'Which of following function return 1 when output is successful?', 'echo ( )', 'print ( )', 'both', 'None', '1', '5', '', '1'),
(26, 6, '2016-01-28 07:51:53', '0000-00-00 00:00:00', 'Which of the following function can assign the output to a string variable', 'echo ( )', 'print ( )', 'print f ( )', 's print f ( )', '1', '5', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `master_institution`
--

CREATE TABLE `master_institution` (
  `id` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL,
  `institution` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_institution`
--

INSERT INTO `master_institution` (`id`, `post_date`, `modified_date`, `institution`, `status`) VALUES
(1, '2015-10-19 00:35:35', '2015-10-20 17:46:50', 'AIMT', 1),
(2, '2015-10-19 00:35:35', '2015-10-21 16:01:51', 'PMT', 1),
(3, '2015-10-19 01:11:14', '2015-10-19 12:19:44', 'SIKKIM Manipal University', 1),
(4, '2015-10-19 01:25:38', '2015-10-20 10:46:23', 'New Public school', 1),
(5, '2015-10-19 03:26:13', '2015-10-20 16:25:52', 'BBA', 1),
(6, '2015-12-27 08:56:04', '0000-00-00 00:00:00', 'B I E T Jhansi', 1),
(7, '2015-12-27 08:56:22', '0000-00-00 00:00:00', 'I E T Lucknow', 1),
(8, '2015-12-27 08:56:50', '0000-00-00 00:00:00', 'M N R E C Allahabad', 1),
(9, '2015-12-27 08:57:39', '2016-01-28 11:53:52', 'M M M E C Kanpur', 1),
(10, '2015-12-27 08:57:40', '0000-00-00 00:00:00', 'M M M E C Gorakhpur', 1),
(11, '2016-01-14 04:17:56', '0000-00-00 00:00:00', 'NSIT Delhi', 1),
(12, '2016-01-14 04:18:16', '0000-00-00 00:00:00', 'AMU Aligarh', 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_interest_area`
--

CREATE TABLE `master_interest_area` (
  `id` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL,
  `area_of_interest` varchar(250) NOT NULL,
  `is_compulsory` enum('1','0') NOT NULL,
  `duration` int(15) NOT NULL,
  `limit` int(25) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_interest_area`
--

INSERT INTO `master_interest_area` (`id`, `post_date`, `modified_date`, `area_of_interest`, `is_compulsory`, `duration`, `limit`, `status`) VALUES
(1, '2016-01-09 10:58:20', '2016-01-13 21:15:21', 'MATH', '1', 100, 2, 1),
(2, '2016-01-09 11:01:15', '2016-01-10 23:07:10', 'APTITUDE', '1', 50, 2, 1),
(3, '2016-01-09 11:01:15', '0000-00-00 00:00:00', 'ENGLISH', '1', 10, 2, 1),
(4, '2016-01-09 11:02:18', '2016-01-10 23:07:35', 'CHEMISTRY', '1', 40, 3, 1),
(5, '2016-01-09 11:02:45', '0000-00-00 00:00:00', 'HINDI', '1', 10, 2, 1),
(6, '2016-01-09 11:04:06', '2016-01-10 23:07:21', 'FINANCE', '0', 40, 1, 1),
(7, '2016-01-09 11:04:34', '2016-01-10 23:07:27', 'INSURANCE', '0', 50, 1, 1),
(8, '2016-01-13 15:46:56', '0000-00-00 00:00:00', 'Banking', '0', 1800, 30, 1),
(9, '2016-01-13 15:47:21', '2016-01-13 21:17:42', 'IT Basics', '1', 1800, 30, 1),
(10, '2016-01-22 12:58:49', '0000-00-00 00:00:00', 'BANKING', '', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_job`
--

CREATE TABLE `master_job` (
  `id` int(11) NOT NULL,
  `registration_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL,
  `job_code` varchar(250) NOT NULL,
  `designation` varchar(250) NOT NULL,
  `keyword` varchar(250) NOT NULL,
  `job_desc` varchar(250) NOT NULL,
  `co_profile` varchar(250) NOT NULL,
  `salary_from` varchar(250) NOT NULL,
  `salary_to` varchar(250) NOT NULL,
  `job_from` varchar(250) NOT NULL,
  `job_to` varchar(250) NOT NULL,
  `area_of_interest` varchar(250) NOT NULL,
  `job_location` varchar(250) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_job`
--

INSERT INTO `master_job` (`id`, `registration_id`, `admin_id`, `post_date`, `modified_date`, `job_code`, `designation`, `keyword`, `job_desc`, `co_profile`, `salary_from`, `salary_to`, `job_from`, `job_to`, `area_of_interest`, `job_location`, `status`) VALUES
(1, 0, 2, '2015-12-02 03:32:24', '2016-02-01 18:09:35', 'php01', 'Php Developer', 'Php,Mysql,Ajax,HTML,CSS', 'Php Developer opening in Indiamart', 'Indiamart is B2B sales Company', '5500', '8000', '13-04-2012', 'Shakti', '7', 'Delhi', '0'),
(2, 0, 2, '2015-11-02 04:12:17', '2016-01-15 16:26:09', 'HTML02', 'HTML Developer', 'HTML Develoer, php', 'HTML DeveloerHTML DeveloerHTML DeveloerHTML DeveloerHTML Develoer', 'technoinfotech', '3000', '5000', '13-01-2014', 'Akash', '2', 'Jaipur', '1'),
(3, 0, 2, '2015-11-02 04:17:03', '2016-02-01 18:08:49', 'Php02', 'Php, Mysql Developer', 'Php, Mysql,CSS', 'Excellent Php Developer', 'Flipkart Urgent Opening', '18000', '25000', '22-12-2015', 'Menu Singh', '4', 'Pune', '1'),
(4, 0, 1, '2015-11-03 00:32:05', '2016-02-01 18:09:42', 'HTML 01', 'HTML DEVELOPER', 'HTML,JQUERY', 'HTML DEVELOPER', 'HTML DEVELOPER Webinfomedia.com', '3000', '4500', '16-01-2016', 'Kumar', '2', 'Mumbai', '0'),
(5, 0, 1, '2016-02-01 00:40:22', '2016-01-15 16:29:02', 'OC01', 'Opencart Developer', 'Opencart,Php', 'Opencart Developer', 'Ecommerce Development Company in Mumbai', '5600', '8900', '05-01-2016', 'Sangeeta', '2', 'Nashik', '1'),
(6, 0, 1, '2015-11-03 01:02:58', '2016-01-15 16:29:24', 'JAVA02', 'Java Developer', 'Java,Orcale', 'Java Developer Urgent Opening', 'Company Leading Software Co.', '5622', '8000', '03-01-2014', 'Mukesh', '4', 'Kolhapur', '0'),
(7, 0, 1, '2015-11-03 01:15:12', '2016-01-15 16:29:47', 'Jquery02', 'Jquery Developer', 'Jquery,HTML', 'Jquery Developer', 'Jquery Developer in Mumbai', '4500', '5500', '04-01-2013', 'Sachin', '1', 'Satara', '1'),
(8, 0, 1, '2015-11-03 01:18:19', '2016-02-01 18:08:18', 'Android05', 'Android Developer', 'Android,Linux', 'Android Developer Urgent Opening', 'Android Developer in Infomedia', '6230', '7800', '01-01-2014', 'Kalpesh', '2', 'Varanasi', '1'),
(9, 0, 1, '2015-11-03 05:17:22', '2016-01-15 16:30:30', 'Support02', 'Database Admin', 'Mysql,Orcale', 'Database Administrator', 'We are leading IT Co.', '5000', '6000', '14-01-2015', 'Rohan', '4', 'Mumbai', '1'),
(10, 0, 1, '2015-11-04 00:03:01', '2016-01-15 16:30:47', 'DE05', 'Desktop Engineer', 'Linux,Hardware,OS', 'Desktop Engineer Urgent Vacancy', 'Infomedia has urgent vacancy For Desktop Engineer', '9800', '1500', '10-01-2016', 'Mithun', '4', 'Pune', '1'),
(11, 11, 0, '2015-11-21 06:21:05', '2016-01-15 16:31:36', 'JOB101', 'Ajax Devepoer', 'php,java', 'THIS IS TEST...', 'KWEB IS BAEST', '230818', '280331', '21-11-2015', 'Girish', '2', 'Mumbai', '1'),
(12, 11, 0, '2015-11-20 22:03:37', '2016-01-15 16:31:59', 'JOB101', 'PO Job', 'php,java', 'THIS IS TEST...', 'KWEB IS Software Development Co.', '200000', '300000', '21-11-2015', 'Santosh', '2', 'Banglore', '1'),
(13, 11, 0, '2015-11-20 22:04:29', '2016-01-15 16:32:22', 'JOB101', 'Wordpress Developer', 'php,java,wordpress', 'Wordpress Developer Urgent Opening', 'Infotech Looking job', '200000', '300000', '21-11-2015', 'Neel', '2', 'Pune', '1'),
(14, 0, 2, '2016-01-08 01:39:45', '2016-01-15 16:31:09', 'Php002', 'Php Developer', 'php ,Mysql,html,css', 'Urgent Opening For Php Developer', 'Company in Software Development', '15000', '25000', '05-01-2016', 'Neel', '4', 'Agra', '1'),
(15, 0, 2, '2015-12-16 07:39:58', '2016-01-15 16:32:55', 'Php002', 'Php Developer', 'php ,Mysql,html,css', 'Urgent Opening For Php Developer', 'Company in Software Development', '15000', '25000', '14-01-2015', 'Sachin', '4', 'Jaipur', '1'),
(16, 26, 0, '2015-12-31 21:24:48', '2016-01-15 16:33:17', '001tkt', 'TTE', 'Ticket,Online,E-ticket,Platform', 'Urgent Opening  For TTE', 'Company Deals In Ticket Reservation', '100000', '126695', '18-12-2015', 'Kalpi', '4', 'Lucknow', '1'),
(17, 0, 2, '2015-12-18 09:32:34', '2016-01-15 16:33:46', 'DB009', 'Database Admin', 'mysql ,sql,apache', 'Urgent Opening for Database Admin', 'Company In Software Development', '8500', '12500', '14-01-2016', 'Heena', '4', 'Hyderabad', '1'),
(18, 0, 2, '2015-12-24 07:41:38', '2016-01-15 16:40:36', 'Sys12', 'System Engineer', 'java,sql,apache', 'Looking job in System Engineer', 'Company in IT Industry', '15000', '25000', '12-01-2016', 'Suman', '3', 'Lucknow', '0'),
(19, 43, 0, '2015-12-01 01:01:00', '2016-01-15 16:35:52', 'JC1323', 'Project Manager', 'Project,Manager,Datawarehouse,dw', 'Looking for a seasoned project manager for DW project Looking for a seasoned project manager for DW projectLooking for a seasoned project manager for DW projectLooking for a seasoned project manager for DW project dfgetgetetgv', 'One of the best organization', '200000', '300000', '30-12-2015', 'Yukta', '2', 'kanpur', '1'),
(20, 43, 0, '2015-12-01 01:01:06', '2016-01-15 16:37:27', 'JC132', 'Developer', 'Java,Oracle,Linux', 'Java developer with Oracle RDBMS experience', 'Best place to work', '595270', '800000', '14-01-2016', 'Geeta', '4', 'Delhi', '1'),
(21, 50, 0, '2016-01-13 04:31:21', '2016-01-15 16:25:10', 'JC1111', 'Team Lead', 'team,lead,.Net', 'Person with strong team leading experience to deliver the .net based projects.', 'sddfdsf', '1000000', '1500000', '31-01-2016', 'PM', '7', 'UT', '1'),
(22, 51, 0, '2016-01-12 20:33:29', '2016-01-15 16:24:39', 'KWEB01', 'Copywriter', 'hussain', 'Job description is coming.', 'Digital Agency', '35000', '40000', '31-01-2016', 'KK', '6', 'Mumbai', '1'),
(23, 0, 2, '2016-01-15 10:50:52', '0000-00-00 00:00:00', 'Sys12', 'System Analyst', 'linux,apache,windows', 'Looking Senior System Analyst having 5 years exeperience', 'Reputed IT Company', '26000', '35500', '14-01-2016', 'Mahesh', '7', 'Pune', '1'),
(24, 61, 0, '2016-01-19 20:45:27', '2016-01-21 15:00:23', 'A101', 'developer', 'phph,java', 'this is for development', 'its digital agency', '10', '50', '21-01-2016', 'hussain', '7', 'Noida', '1'),
(25, 66, 0, '2016-01-20 22:15:48', '0000-00-00 00:00:00', 'ME', 'Mechanical Engineer', 'php,mysql,opencart,jquery', 'looking Mechanical Engineer', 'Hardware Development', '25000', '35000', '21-01-2016', 'Sunita', '6', '3', '1'),
(26, 46, 0, '2016-01-30 06:20:33', '0000-00-00 00:00:00', 'JQ05', 'Jquery Developer', 'javascript', 'Hello', 'Working since 1990', '5600', '8956', '30-01-2016', 'sdedg', '6', '2', '1'),
(27, 46, 0, '2016-02-01 06:43:03', '0000-00-00 00:00:00', 'php04', 'Php Developer', 'php,html', 'PHP DEVELOPER', 'Working since 1990', '5230', '9630', '17-02-2016', 'kumar', '6', '9', '1');

-- --------------------------------------------------------

--
-- Table structure for table `master_subject_list`
--

CREATE TABLE `master_subject_list` (
  `id` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL,
  `subject` varchar(250) NOT NULL,
  `is_compulsory` enum('1','0') NOT NULL,
  `duration` int(15) NOT NULL,
  `limit` int(25) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_subject_list`
--

INSERT INTO `master_subject_list` (`id`, `post_date`, `modified_date`, `subject`, `is_compulsory`, `duration`, `limit`, `status`) VALUES
(1, '2016-01-23 05:39:19', '2016-01-23 11:34:12', 'CHEMISTRY', '1', 30, 3, 1),
(2, '2016-01-23 05:55:47', '0000-00-00 00:00:00', 'ENGLISH', '1', 30, 3, 1),
(3, '2016-01-23 06:01:53', '2016-01-23 11:33:02', 'PHYSICS', '1', 30, 4, 1),
(4, '2016-01-23 06:03:59', '0000-00-00 00:00:00', 'APTITUDE', '1', 30, 3, 1),
(5, '2016-01-23 06:08:44', '2016-01-23 11:39:25', 'HINDI', '1', 25, 2, 1),
(6, '2016-01-28 06:38:02', '2016-01-28 13:07:19', 'JAVA', '0', 30, 2, 1),
(7, '2016-01-28 06:38:21', '2016-01-28 13:46:28', 'PHP', '0', 30, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_success_story`
--

CREATE TABLE `master_success_story` (
  `id` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL,
  `title` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `desc` varchar(250) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_success_story`
--

INSERT INTO `master_success_story` (`id`, `post_date`, `modified_date`, `title`, `image`, `desc`, `status`) VALUES
(1, '2015-10-30 05:56:21', '2016-01-15 16:47:51', 'Maria', '546331 (1).jpg', '<p>Superb Amazing Website For Jobready</p>', '1'),
(2, '2015-10-30 06:16:47', '2016-01-15 16:48:13', 'Bob', '89010michael-wilson.jpg', '<p>Job Ready Success ful story</p>', '1'),
(3, '2015-10-31 01:41:05', '2015-10-31 13:08:57', 'Sushant Singh', '81903Profile_Story_1.jpg', '<p>Well done jobready Cool..</p>', '0'),
(4, '2015-10-31 02:00:48', '2016-01-14 16:03:55', 'Rita', '78013facebook-profile-pictures6.jpg', '<p>Spuerb job provided</p>', '0'),
(5, '2015-12-16 10:43:12', '0000-00-00 00:00:00', 'Sushi', '35275dummy_doctor.png', '<p>Superb</p>', '1');

-- --------------------------------------------------------

--
-- Table structure for table `master_video`
--

CREATE TABLE `master_video` (
  `id` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL,
  `title` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_video`
--

INSERT INTO `master_video` (`id`, `post_date`, `modified_date`, `title`, `link`, `status`) VALUES
(1, '2015-10-20 05:54:11', '2015-11-16 12:28:04', 'New Video', '<iframe width="50" height="40" src="https://www.youtube.com/embed/ZEXhSIQB2vA" frameborder="0" allowfullscreen></iframe>', '1'),
(2, '2015-10-20 05:54:11', '2015-10-20 17:23:56', 'Job Promo', '<iframe width="50" height="40" src="https://www.youtube.com/embed/ZEXhSIQB2vA" frameborder="0" allowfullscreen></iframe>', '0'),
(3, '2015-10-20 06:32:40', '2015-10-20 18:32:44', 'Songs', '<iframe width="560" height="315" src="https://www.youtube.com/embed/nCD2hj6zJEc" frameborder="0" allowfullscreen></iframe>', '0'),
(4, '2015-10-20 06:41:17', '2015-10-20 17:45:54', 'New songs', '<iframe width="560" height="315" src="https://www.youtube.com/embed/aFpcRF-Lmng" frameborder="0" allowfullscreen></iframe>', '1'),
(5, '2015-10-20 23:25:46', '0000-00-00 00:00:00', 'Job New', '<iframe width="560" height="315" src="https://www.youtube.com/embed/B3M3A6V1GRo" frameborder="0" allowfullscreen></iframe>', '1');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `registration_id` int(11) NOT NULL,
  `attempt_id` int(11) NOT NULL,
  `exam_type` varchar(250) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `right_answer` int(11) NOT NULL,
  `wrong_answer` int(11) NOT NULL,
  `unanswered` int(11) NOT NULL,
  `total_question` int(250) NOT NULL,
  `total_marks_obtain` int(250) NOT NULL,
  `total_marks` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `post_date`, `registration_id`, `attempt_id`, `exam_type`, `subject_id`, `right_answer`, `wrong_answer`, `unanswered`, `total_question`, `total_marks_obtain`, `total_marks`) VALUES
(1, '2016-01-28 11:34:22', 45, 1, 'interest', 6, 0, 2, 0, 2, 0, 10),
(2, '2016-01-28 11:34:44', 45, 2, 'interest', 7, 2, 1, 0, 3, 15, 23),
(3, '2016-01-28 11:36:03', 45, 3, 'gen', 1, 2, 1, 0, 3, 5, 14),
(4, '2016-01-28 11:36:03', 45, 3, 'gen', 2, 0, 3, 0, 3, 0, 14),
(5, '2016-01-28 11:36:03', 45, 3, 'gen', 3, 0, 0, 4, 4, 0, 16),
(6, '2016-01-28 11:36:03', 45, 3, 'gen', 4, 0, 0, 3, 3, 0, 7),
(7, '2016-01-28 11:36:04', 45, 3, 'gen', 5, 0, 0, 2, 2, 0, 5),
(8, '2016-01-28 11:36:49', 45, 4, 'gen', 1, 1, 2, 0, 3, 2, 14),
(9, '2016-01-28 11:36:49', 45, 4, 'gen', 2, 0, 3, 0, 3, 0, 14),
(10, '2016-01-28 11:36:50', 45, 4, 'gen', 3, 2, 2, 0, 4, 9, 16),
(11, '2016-01-28 11:36:50', 45, 4, 'gen', 4, 1, 1, 1, 3, 3, 8),
(12, '2016-01-28 11:36:50', 45, 4, 'gen', 5, 0, 2, 0, 2, 0, 5),
(13, '2016-01-28 11:39:10', 45, 5, 'interest', 6, 1, 1, 0, 2, 5, 13),
(14, '2016-02-01 08:23:56', 45, 6, 'gen', 1, 0, 0, 3, 3, 0, 14),
(15, '2016-02-01 08:23:56', 45, 6, 'gen', 2, 0, 0, 3, 3, 0, 13),
(16, '2016-02-01 08:23:56', 45, 6, 'gen', 3, 0, 0, 4, 4, 0, 16),
(17, '2016-02-01 08:23:56', 45, 6, 'gen', 4, 0, 0, 3, 3, 0, 7),
(18, '2016-02-01 08:23:56', 45, 6, 'gen', 5, 0, 0, 2, 2, 0, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_master`
--
ALTER TABLE `admin_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_area_of_interest`
--
ALTER TABLE `job_area_of_interest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registration_id` (`registration_id`);

--
-- Indexes for table `job_education_profile`
--
ALTER TABLE `job_education_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registration_id` (`registration_id`);

--
-- Indexes for table `job_profile`
--
ALTER TABLE `job_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registration_id` (`registration_id`);

--
-- Indexes for table `job_registration`
--
ALTER TABLE `job_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_student_job_interest`
--
ALTER TABLE `job_student_job_interest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_student_training_interest`
--
ALTER TABLE `job_student_training_interest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_training_list`
--
ALTER TABLE `job_training_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_area_of_interest`
--
ALTER TABLE `master_area_of_interest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_city`
--
ALTER TABLE `master_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_education`
--
ALTER TABLE `master_education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_events_list`
--
ALTER TABLE `master_events_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_feedback`
--
ALTER TABLE `master_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_general_question`
--
ALTER TABLE `master_general_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_institution`
--
ALTER TABLE `master_institution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_interest_area`
--
ALTER TABLE `master_interest_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_job`
--
ALTER TABLE `master_job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_subject_list`
--
ALTER TABLE `master_subject_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_success_story`
--
ALTER TABLE `master_success_story`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_video`
--
ALTER TABLE `master_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_master`
--
ALTER TABLE `admin_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `job_area_of_interest`
--
ALTER TABLE `job_area_of_interest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;
--
-- AUTO_INCREMENT for table `job_education_profile`
--
ALTER TABLE `job_education_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `job_profile`
--
ALTER TABLE `job_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `job_registration`
--
ALTER TABLE `job_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `job_student_job_interest`
--
ALTER TABLE `job_student_job_interest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `job_student_training_interest`
--
ALTER TABLE `job_student_training_interest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `job_training_list`
--
ALTER TABLE `job_training_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `master_area_of_interest`
--
ALTER TABLE `master_area_of_interest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `master_city`
--
ALTER TABLE `master_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `master_education`
--
ALTER TABLE `master_education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `master_events_list`
--
ALTER TABLE `master_events_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `master_feedback`
--
ALTER TABLE `master_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_general_question`
--
ALTER TABLE `master_general_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `master_institution`
--
ALTER TABLE `master_institution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `master_interest_area`
--
ALTER TABLE `master_interest_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `master_job`
--
ALTER TABLE `master_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `master_subject_list`
--
ALTER TABLE `master_subject_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `master_success_story`
--
ALTER TABLE `master_success_story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `master_video`
--
ALTER TABLE `master_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `job_area_of_interest`
--
ALTER TABLE `job_area_of_interest`
  ADD CONSTRAINT `job_area_of_interest_ibfk_1` FOREIGN KEY (`registration_id`) REFERENCES `job_registration` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_education_profile`
--
ALTER TABLE `job_education_profile`
  ADD CONSTRAINT `job_education_profile_ibfk_1` FOREIGN KEY (`registration_id`) REFERENCES `job_registration` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_profile`
--
ALTER TABLE `job_profile`
  ADD CONSTRAINT `job_profile_ibfk_1` FOREIGN KEY (`registration_id`) REFERENCES `job_registration` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
