-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2015 at 06:29 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jobready`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE IF NOT EXISTS `admin_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `contact_name` varchar(255) NOT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `status` int(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`id`, `post_date`, `contact_name`, `email_id`, `password`, `role`, `mobile_no`, `status`, `address`) VALUES
(1, '2015-10-15 11:45:02', 'Mukesh', 'mukesh@kwebmaker.com', '12345', 'Super Admin', '7498949490', 1, '25,26 Basement AC Market Tardeo\\r\\n\\r\\nKWEBMAKER'),
(2, '2015-09-04 05:21:13', 'Neel', 'neelmani@kwebmaker.com', '12345', 'Super Admin', '9619662253', 1, '25,26 Basement AC Market Tardeo\\r\\n\\r\\nKWEBMAKER'),
(3, '2015-10-15 11:46:49', 'kweb', 'kweb@kwebmaker.com', '12345', 'Admin', '0223652', 1, '25,26 Basement AC Market Tardeo\\r\\n\\r\\nKWEBMAKER');

-- --------------------------------------------------------

--
-- Table structure for table `area_of_interest_master`
--

CREATE TABLE IF NOT EXISTS `area_of_interest_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL,
  `areas_of_interest` varchar(100) NOT NULL,
  `status` enum('1','0') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `area_of_interest_master`
--

INSERT INTO `area_of_interest_master` (`id`, `post_date`, `modified_date`, `areas_of_interest`, `status`) VALUES
(1, '2015-10-19 07:16:12', '2015-10-26 18:11:40', 'Finance', '1'),
(2, '2015-10-19 07:16:12', '2015-10-20 10:43:31', 'Banking', '1'),
(3, '2015-10-19 07:16:50', '2015-10-20 17:24:54', 'Insurance', '1'),
(4, '2015-10-19 07:16:50', '2015-10-26 11:48:51', 'Information Technology (IT)', '1'),
(5, '2015-10-19 07:16:59', '2015-10-27 15:50:56', 'Media', '1'),
(6, '2015-10-19 07:22:59', '2015-10-20 16:25:40', 'Human Resource', '0'),
(7, '2015-10-19 07:29:35', '2015-10-19 13:00:00', 'Marketing', '1');

-- --------------------------------------------------------

--
-- Table structure for table `job_area_of_interest`
--

CREATE TABLE IF NOT EXISTS `job_area_of_interest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration_id` int(11) NOT NULL,
  `area_of_interest` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `registration_id` (`registration_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `job_area_of_interest`
--

INSERT INTO `job_area_of_interest` (`id`, `registration_id`, `area_of_interest`) VALUES
(1, 10, 'Science,Physics,Chemistry'),
(2, 9, 'Maths'),
(3, 11, 'English,Math'),
(4, 12, 'Computer Graphics, Algorithm'),
(5, 13, 'History, Geography');

-- --------------------------------------------------------

--
-- Table structure for table `job_education_profile`
--

CREATE TABLE IF NOT EXISTS `job_education_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration_id` int(11) NOT NULL,
  `qualification` varchar(250) NOT NULL,
  `qualification_others` varchar(200) NOT NULL,
  `college` varchar(200) NOT NULL,
  `college_other` varchar(200) NOT NULL,
  `specialization` varchar(200) NOT NULL,
  `year_of_completion` varchar(21) NOT NULL,
  `percentage` varchar(21) NOT NULL,
  `post_date` datetime NOT NULL,
  `ip_address` varchar(21) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `registration_id` (`registration_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `job_education_profile`
--

INSERT INTO `job_education_profile` (`id`, `registration_id`, `qualification`, `qualification_others`, `college`, `college_other`, `specialization`, `year_of_completion`, `percentage`, `post_date`, `ip_address`) VALUES
(1, 9, 'MCA', 'Bsc', 'LTT', 'HHHR', 'MCA', '2000', '65', '2015-09-05 00:00:00', ''),
(2, 10, 'B.Tech', 'Inter', 'AIMT', 'HSP', 'CSE', '2008', '85', '1999-11-30 00:00:00', ''),
(3, 11, 'BBA', 'BCA', 'SSPU', 'NSSU', 'Physics', '2014', '89', '1899-11-01 00:00:00', ''),
(4, 12, 'BSC', 'MSC', 'New Public', 'DU', 'Computer', '2011', '78', '1899-11-30 00:00:00', ''),
(5, 13, 'MA', 'B.Ed', 'Saraswati Public School', 'A.P.T.U', 'History', '2010', '88', '1899-11-30 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `job_profile`
--

CREATE TABLE IF NOT EXISTS `job_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `registration_id` int(11) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `mname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `company_name` varchar(251) NOT NULL,
  `comapny_landline` varchar(51) NOT NULL,
  `gender` varchar(21) NOT NULL,
  `mob` int(250) NOT NULL,
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
  `status` enum('1','0') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `registration_id` (`registration_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `job_profile`
--

INSERT INTO `job_profile` (`id`, `registration_id`, `fname`, `mname`, `lname`, `company_name`, `comapny_landline`, `gender`, `mob`, `dob`, `address1`, `address2`, `address3`, `city`, `pincode`, `brief_profile`, `preffered_location`, `keyword_skill`, `upload_cv`, `post_date`, `modified_date`, `ip_address`, `status`) VALUES
(9, 9, 'Mukesh', 'K', 'Singh', 'Kweb', '022562366', 'M', 895623014, '15-05-1990', '25/26 AC MARKET MUMBAI CENTRAL', 'Mumbai central', '', 'Mumbai', '40018', 'Hello Check', 'VARANASI', 'Java,Php', '', '2015-08-28 08:31:35', '2015-08-28 08:31:35', '', '1'),
(10, 10, 'Neel', 'mani', 'Gupta', 'Kweb', '022326', 'M', 76196622, '07-03-1987', 'Mumbai', 'Mumbai', 'Mumbai', 'Mumbai', '400002', 'Hello Everyone', 'Pune', 'Php,Html,Css', '', '2015-09-04 00:00:00', '2015-09-04 00:00:00', '', '1'),
(11, 11, 'Tech', 'o', 'Web', 'Techno', '022356236', 'M', 85236987, '08-09-2000', 'Pune', 'Pune', 'Pune', 'Pune', '423012', 'Punenenenene', 'Mumbai', 'Css', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '1'),
(12, 12, 'Shubh', 'R', 'Gupta', 'Farasbee', '22229595', 'M', 895623, '0-09-1997', 'Jaunpur', '', '', 'Jaunpur', '222001', 'hhhhhhhh', 'Mumbai', 'HTML,CSS,C++', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '1'),
(13, 13, 'Yo', 'yo', 'Kumar', 'yooyo', '055626', 'F', 7845, '02-03-1891', 'Shop No. D-001, Purnima Apartments, 23 Peddar Road, Opp Film Division', 'hfgh', '', '', '400523', 'Hello how are you', 'Thane', 'Javascript,Php', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `job_registration`
--

CREATE TABLE IF NOT EXISTS `job_registration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_of_actor` enum('O','S','T','F') NOT NULL DEFAULT 'O',
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `post_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `ip_address` varchar(21) NOT NULL,
  `status` enum('1','0') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `job_registration`
--

INSERT INTO `job_registration` (`id`, `type_of_actor`, `email`, `password`, `mobile_no`, `post_date`, `modified_date`, `ip_address`, `status`) VALUES
(9, 'T', 'mukesh@kwebmaker.com', '12345', 9870002691, '2015-08-28 08:31:35', '2015-10-26 18:11:33', '::1', '1'),
(10, 'F', 'neel@gmail.com', '12345', 9619662253, '2015-09-04 00:00:00', '2015-10-26 18:11:34', '', '1'),
(11, 'S', 'tech@gmail.com', '12345', 8956230147, '2014-11-14 00:00:00', '2015-10-26 11:47:39', '', '1'),
(12, 'S', 'subh@gmail.com', '12345', 7894561201, '2011-11-30 08:21:20', '2015-10-26 11:45:44', '', '1'),
(13, 'T', 'yay@gmail.com', '12345', 8452102547, '2015-11-30 07:12:30', '0000-00-00 00:00:00', '', '1');

--
-- Triggers `job_registration`
--
DROP TRIGGER IF EXISTS `user_registration`;
DELIMITER //
CREATE TRIGGER `user_registration` AFTER INSERT ON `job_registration`
 FOR EACH ROW BEGIN
INSERT INTO job_profile (registration_id,post_date,modified_date) VALUES (NEW.id,NEW.post_date,NEW.modified_date);
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `master_city`
--

CREATE TABLE IF NOT EXISTS `master_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL,
  `city` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `master_city`
--

INSERT INTO `master_city` (`id`, `post_date`, `modified_date`, `city`, `status`) VALUES
(1, '2015-10-19 10:09:03', '2015-10-20 18:32:18', 'Varanasi', 0),
(2, '2015-10-19 10:09:03', '2015-10-19 15:50:38', 'Jaunpur', 1),
(3, '2015-10-19 10:14:08', '2015-10-19 16:36:51', 'Mumbai', 0),
(4, '2015-10-19 10:14:46', '0000-00-00 00:00:00', 'Ahmedabad', 0),
(5, '2015-10-19 10:15:47', '2015-10-19 15:52:02', 'Jaipur', 0),
(6, '2015-10-19 10:31:41', '2015-10-20 10:49:08', 'Jabalpur', 0),
(7, '2015-10-20 09:50:06', '0000-00-00 00:00:00', 'Ambala', 1),
(8, '2015-10-20 10:56:14', '0000-00-00 00:00:00', 'Nashik', 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_education`
--

CREATE TABLE IF NOT EXISTS `master_education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL,
  `education` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `master_education`
--

INSERT INTO `master_education` (`id`, `post_date`, `modified_date`, `education`, `status`) VALUES
(1, '2015-10-19 07:30:52', '2015-10-21 16:04:02', 'B.A.', 0),
(2, '2015-10-19 07:30:52', '2015-10-19 13:11:51', 'B.Sc', 1),
(3, '2015-10-19 08:57:04', '2015-10-19 14:29:07', 'C.A', 1),
(4, '2015-10-19 08:57:11', '2015-10-19 14:38:44', 'B.B.A', 1),
(5, '2015-10-19 09:08:27', '2015-10-20 10:48:20', 'B.E', 1),
(6, '2015-10-20 12:17:12', '2015-10-21 16:28:30', 'H.S.C', 0),
(7, '2015-10-21 04:52:54', '2015-10-21 16:28:35', 'S.S.C', 0);

-- --------------------------------------------------------

--
-- Table structure for table `master_events_list`
--

CREATE TABLE IF NOT EXISTS `master_events_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL,
  `events_date` varchar(100) NOT NULL,
  `title` varchar(250) NOT NULL,
  `desc` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `status` enum('1','0') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `master_events_list`
--

INSERT INTO `master_events_list` (`id`, `post_date`, `modified_date`, `events_date`, `title`, `desc`, `type`, `status`) VALUES
(1, '2015-10-21 06:57:52', '2015-10-30 16:58:03', '20/10/2015', 'wedding', '<p>Wedding&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummyLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the indus', 'Workshops', '0'),
(2, '2015-10-21 07:03:53', '2015-10-21 15:22:07', '14/10/2015', 'Reception', '<p>Reception</p>', 'Seminars', '1'),
(3, '2015-10-21 07:07:09', '2015-10-21 15:41:05', '16/10/2015', 'Sports', '<p>sports</p>', 'Workshops', '0'),
(4, '2015-10-21 08:09:32', '2015-10-21 16:41:54', '20/10/2015', 'Finance Executive', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummyLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s.</p', 'Training', '1'),
(5, '2015-10-21 08:12:33', '2015-10-21 14:56:50', '05/10/2015', 'songs', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummyLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry neelsss m', 'Training', '1'),
(6, '2015-10-21 09:51:18', '0000-00-00 00:00:00', '30/10/2015', 'Financial Controller', '<p>Financial ControllerFinancial ControllerFinancial ControllerFinancial ControllerFinancial ControllerFinancial ControllerFinancial ControllerFinancial ControllerFinancial ControllerFinancial ControllerFinancial ControllerFinancial ControllerFinanci', 'Seminars', '1'),
(7, '2015-10-23 05:26:10', '0000-00-00 00:00:00', '30/10/2015', 'Sports', '<p>Sportststs</p>', 'Seminars', '1'),
(8, '2015-10-26 10:18:24', '0000-00-00 00:00:00', '14/10/2015', 'tttt', '<p>ttt</p>', 'Training', '1');

-- --------------------------------------------------------

--
-- Table structure for table `master_general_question`
--

CREATE TABLE IF NOT EXISTS `master_general_question` (
  `gque_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `status` enum('1','0') NOT NULL,
  PRIMARY KEY (`gque_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `master_general_question`
--

INSERT INTO `master_general_question` (`gque_id`, `sub_id`, `post_date`, `modified_date`, `question`, `option1`, `option2`, `option3`, `option4`, `true_ans`, `marks`, `duration`, `status`) VALUES
(1, 1, '2015-10-26 09:02:46', '2015-10-29 11:14:59', 'What is the difference between XML and HTML?', 'HTML can have user defined tags, XML cannot', 'HTML is used for exchanging data, XML is not.', 'XML is used for exchanging data, HTML is not', 'Both b and c above', 'b', '5', '2', '1'),
(2, 3, '2015-10-26 12:15:56', '2015-10-29 11:14:39', 'What Is php ?', 'Script', 'Programmimg Language', 'Server', 'Object', 'a', '8', '2', '0'),
(3, 3, '2015-10-26 12:18:56', '2015-10-29 11:02:45', 'Geometry calculation Formula ?', '1', '2', '3', '8', 'c', '8', '9', '0'),
(4, 2, '2015-10-26 12:21:14', '2015-10-27 14:46:12', 'Well formed XML document means', 'it contains a root element.', 'it contain an element.', 'it contains one or more elements.', 'must contain one or more elements and root element must contain all other elements.', 'c', '9', '3', '1'),
(5, 1, '2015-10-26 13:12:26', '2015-10-27 14:46:55', 'Which tags are most commonly used by search engines?', 'Paragrah', 'Heading', 'Title', 'All of above', 'c', '9', '6', '1'),
(6, 3, '2015-10-27 06:13:57', '2015-10-27 14:39:18', 'Where did India play its 1st one Day international match?', 'Lords', 'Headingley', 'Taunton', 'The Oval', 'b', '7', '8', '1'),
(7, 2, '2015-10-27 06:14:43', '2015-10-29 11:11:08', 'Who was the 1st ODI captain for India?', 'Ajit Wadekar', 'Bishen Singh Bedi', 'Nawab Pataudi', 'Vinoo Mankad', 'b', '9', '6', '1'),
(8, 3, '2015-10-27 10:18:59', '2015-10-29 11:10:50', 'The bankers gain of a certain sum due 2 years hence at 10% per annum is Rs. 24. The present worth is:', '48', '56', '99', '69', 'c', '5', '3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `master_institution`
--

CREATE TABLE IF NOT EXISTS `master_institution` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL,
  `institution` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `master_institution`
--

INSERT INTO `master_institution` (`id`, `post_date`, `modified_date`, `institution`, `status`) VALUES
(1, '2015-10-19 06:05:35', '2015-10-26 18:27:19', 'AIMT', 1),
(2, '2015-10-19 06:05:35', '2015-10-26 11:49:59', 'PMT', 1),
(3, '2015-10-19 06:41:14', '2015-10-27 14:29:29', 'V.B.S.P.U', 0),
(4, '2015-10-19 06:55:38', '2015-10-20 10:46:23', 'New Public school', 0),
(5, '2015-10-19 08:56:13', '2015-10-20 16:25:52', 'BBA', 0),
(6, '2015-10-26 10:18:51', '0000-00-00 00:00:00', 'AMU', 1),
(7, '2015-10-26 10:19:15', '0000-00-00 00:00:00', 'DU', 1),
(8, '2015-10-26 12:57:31', '0000-00-00 00:00:00', 'BHU', 1);

-- --------------------------------------------------------

--
-- Table structure for table `master_interest_question`
--

CREATE TABLE IF NOT EXISTS `master_interest_question` (
  `ib_id` int(11) NOT NULL AUTO_INCREMENT,
  `ai_id` int(11) NOT NULL,
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
  `status` enum('1','0') NOT NULL,
  PRIMARY KEY (`ib_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `master_interest_question`
--

INSERT INTO `master_interest_question` (`ib_id`, `ai_id`, `post_date`, `modified_date`, `question`, `option1`, `option2`, `option3`, `option4`, `true_ans`, `marks`, `duration`, `status`) VALUES
(1, 1, '2015-10-27 09:44:18', '2015-10-29 11:01:25', 'A train running at the speed of 60 km/hr crosses a pole in 9 seconds. What is the length of the train?', '120 metres', '100 metres', '220 metres', '128 metres', 'c', '5', '3', '0'),
(2, 1, '2015-10-27 10:09:30', '2015-10-27 17:46:30', 'The true discount on a bill of Rs. 540 is Rs. 90. The banker''s discount is:', 'Rs. 260', 'Rs. 40', 'Rs. 160', 'Rs. 60', 'b', '9', '6', '1'),
(3, 2, '2015-10-27 10:13:18', '2015-10-29 11:01:51', 'The banker discount on a sum of money for 1 years is Rs. 558 and the true discount on the same sum for 2 years is Rs. 600. The rate percent is', '10%', '20%', '5%', '90%', 'b', '2', '3', '1'),
(4, 1, '2015-10-27 10:14:47', '0000-00-00 00:00:00', 'The banker gain on a sum due 3 years hence at 12% per annum is Rs. 270. The banker discount is:', 'Rs. 960', 'Rs. 160', 'Rs. 460', 'Rs. 1060', 'b', '2', '3', '1'),
(5, 3, '2015-10-27 10:17:31', '0000-00-00 00:00:00', 'The banker''s gain of a certain sum due 2 years hence at 10% per annum is Rs. 24. The present worth is:', 'Rs. 480', 'Rs. 180', 'Rs. 280', 'Rs. 80', 'd', '3', '1', '1'),
(6, 7, '2015-10-27 10:25:50', '2015-10-27 15:57:36', 'A vendor bought toffees at 6 for a rupee. How many for a rupee must he sell to gain 20%?', '3', '4', '5', '7', 'b', '3', '5', '0');

-- --------------------------------------------------------

--
-- Table structure for table `master_job`
--

CREATE TABLE IF NOT EXISTS `master_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
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
  `dept` varchar(250) NOT NULL,
  `status` enum('1','0') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `master_job`
--

INSERT INTO `master_job` (`id`, `reg_id`, `admin_id`, `post_date`, `modified_date`, `job_code`, `designation`, `keyword`, `job_desc`, `co_profile`, `salary_from`, `salary_to`, `job_from`, `job_to`, `area_of_interest`, `dept`, `status`) VALUES
(1, 0, 0, '2015-10-31 09:02:24', '0000-00-00 00:00:00', 'php01', 'Php Developer', 'Php,Mysql,Ajax,HTML,CSS', 'Php Developer opening in Indiamart', 'Indiamart is B2B sales Company', '5500', '8000', '2015-10-30', '2015-11-30', 'Finance', 'Computer Science', '1');

-- --------------------------------------------------------

--
-- Table structure for table `master_subject_list`
--

CREATE TABLE IF NOT EXISTS `master_subject_list` (
  `sub_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL,
  `subject` varchar(250) NOT NULL,
  `status` enum('1','0') NOT NULL,
  PRIMARY KEY (`sub_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `master_subject_list`
--

INSERT INTO `master_subject_list` (`sub_id`, `post_date`, `modified_date`, `subject`, `status`) VALUES
(1, '2015-10-26 06:04:47', '2015-10-27 12:59:04', 'MATH', '1'),
(2, '2015-10-26 06:04:47', '2015-10-26 18:11:47', 'ENGLISH', '1'),
(3, '2015-10-26 06:05:13', '2015-10-26 11:49:41', 'APTITUDE', '1');

-- --------------------------------------------------------

--
-- Table structure for table `master_success_story`
--

CREATE TABLE IF NOT EXISTS `master_success_story` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL,
  `title` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `desc` varchar(250) NOT NULL,
  `status` enum('1','0') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `master_success_story`
--

INSERT INTO `master_success_story` (`id`, `post_date`, `modified_date`, `title`, `image`, `desc`, `status`) VALUES
(1, '2015-10-30 11:26:21', '2015-10-31 13:08:20', 'Maria', '546331 (1).jpg', '<p>Superb Amazing Website For Jobready</p>', '1'),
(2, '2015-10-30 11:46:47', '2015-10-31 13:08:22', 'Bob', '89010michael-wilson.jpg', '<p><strong>Job Ready Success ful story</strong></p>', '1'),
(3, '2015-10-31 07:11:05', '2015-10-31 13:08:57', 'Sushant Singh', '81903Profile_Story_1.jpg', '<p>Well done jobready Cool..</p>', '0'),
(4, '2015-10-31 07:30:48', '2015-10-31 13:09:02', 'Rita', '78013facebook-profile-pictures6.jpg', '<p>Spuerb job provided</p>', '1');

-- --------------------------------------------------------

--
-- Table structure for table `master_video`
--

CREATE TABLE IF NOT EXISTS `master_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` datetime NOT NULL,
  `title` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL,
  `status` enum('1','0') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `master_video`
--

INSERT INTO `master_video` (`id`, `post_date`, `modified_date`, `title`, `link`, `status`) VALUES
(1, '2015-10-20 11:24:11', '2015-10-21 16:19:56', 'New Video', '<iframe width="50" height="40" src="https://www.youtube.com/embed/ZEXhSIQB2vA" frameborder="0" allowfullscreen></iframe>', '1'),
(2, '2015-10-20 11:24:11', '2015-10-20 17:23:56', 'Job Promo', '<iframe width="50" height="40" src="https://www.youtube.com/embed/ZEXhSIQB2vA" frameborder="0" allowfullscreen></iframe>', '0'),
(3, '2015-10-20 12:02:40', '2015-10-20 18:32:44', 'Songs', '<iframe width="560" height="315" src="https://www.youtube.com/embed/nCD2hj6zJEc" frameborder="0" allowfullscreen></iframe>', '0'),
(4, '2015-10-20 12:11:17', '2015-10-20 17:45:54', 'New songs', '<iframe width="560" height="315" src="https://www.youtube.com/embed/aFpcRF-Lmng" frameborder="0" allowfullscreen></iframe>', '1'),
(5, '2015-10-21 04:55:46', '0000-00-00 00:00:00', 'Job New', '<iframe width="560" height="315" src="https://www.youtube.com/embed/B3M3A6V1GRo" frameborder="0" allowfullscreen></iframe>', '1');

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
