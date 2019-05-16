-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 16, 2019 at 05:50 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `letter_tracking`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `article_no` bigint(20) NOT NULL,
  `article_date` date DEFAULT NULL,
  `article_type` varchar(100) DEFAULT NULL,
  `article_subject` varchar(1000) DEFAULT NULL,
  `article_sender` varchar(1000) DEFAULT NULL,
  `article_receiver` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`article_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_no`, `article_date`, `article_type`, `article_subject`, `article_sender`, `article_receiver`) VALUES
(2, '2019-02-13', 'Application', 'Application for leave', '1', '2'),
(3, '2019-05-15', 'LetterResponse', 'Response of letter', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `article_employee`
--

DROP TABLE IF EXISTS `article_employee`;
CREATE TABLE IF NOT EXISTS `article_employee` (
  `serial_no` bigint(20) DEFAULT NULL,
  `person_id` bigint(20) DEFAULT NULL,
  `remarks` varchar(1000) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `department_id` bigint(20) NOT NULL,
  `department_name` varchar(1000) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `description`) VALUES
(1, 'Department of Computer Science', 'a test department'),
(2, 'computer science', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `dispatch_info`
--

DROP TABLE IF EXISTS `dispatch_info`;
CREATE TABLE IF NOT EXISTS `dispatch_info` (
  `dispatch_id` bigint(20) NOT NULL,
  `article_no` bigint(20) DEFAULT NULL,
  `dispatch_date` date DEFAULT NULL,
  `dispatcher_id` bigint(20) DEFAULT NULL,
  `forwarded_to` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`dispatch_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dispatch_info`
--

INSERT INTO `dispatch_info` (`dispatch_id`, `article_no`, `dispatch_date`, `dispatcher_id`, `forwarded_to`) VALUES
(1, 2, '2019-05-15', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `person_id` bigint(20) NOT NULL,
  `person_name` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `person_address` varchar(255) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `cnic` char(15) DEFAULT NULL,
  `phone_no` char(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `picture` varchar(1000) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `department_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`person_id`),
  KEY `department_id` (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`person_id`, `person_name`, `father_name`, `dob`, `person_address`, `designation`, `cnic`, `phone_no`, `email`, `picture`, `nationality`, `department_id`) VALUES
(1, 'Sajid Iqbal', 'Sadiq Muhammad', '2019-05-13', 'multan', 'Assistant Professor', '87878989898', '0980808', 'sajid@bzu.edu.pk', '', 'Pakistan', 1),
(2, 'Mohadisa', 'Father of Mohadisa', '2021-07-13', 'opiu', 'Assistant Professor', '898989898989', '0980808', 'sajid@bzu.edu.pk', '', 'Pakistan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_recieved_info`
--

DROP TABLE IF EXISTS `employee_recieved_info`;
CREATE TABLE IF NOT EXISTS `employee_recieved_info` (
  `person_id` bigint(20) NOT NULL,
  `recieved_id` bigint(20) NOT NULL,
  PRIMARY KEY (`person_id`,`recieved_id`),
  UNIQUE KEY `person_id` (`person_id`,`recieved_id`),
  KEY `recieved_id` (`recieved_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

DROP TABLE IF EXISTS `file`;
CREATE TABLE IF NOT EXISTS `file` (
  `file_no` bigint(20) NOT NULL,
  `scholarships` varchar(1000) DEFAULT NULL,
  `registration_letters` varchar(1000) DEFAULT NULL,
  `controller_of_examination` varchar(1000) DEFAULT NULL,
  `visiting_faculty_letters` varchar(1000) DEFAULT NULL,
  `establishment_branch` varchar(1000) DEFAULT NULL,
  `treasurer_office` varchar(1000) DEFAULT NULL,
  `vc_office_approvals` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`file_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recieved_info`
--

DROP TABLE IF EXISTS `recieved_info`;
CREATE TABLE IF NOT EXISTS `recieved_info` (
  `recieved_id` bigint(20) NOT NULL,
  `person_id` bigint(20) DEFAULT NULL,
  `recieved_date` date DEFAULT NULL,
  `recieved_time` datetime DEFAULT NULL,
  `recieved_by` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`recieved_id`),
  KEY `person_id` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_article`
--

DROP TABLE IF EXISTS `tbl_article`;
CREATE TABLE IF NOT EXISTS `tbl_article` (
  `serial_no` bigint(20) NOT NULL,
  `file_no` bigint(20) DEFAULT NULL,
  `article_date` date DEFAULT NULL,
  `article_time` datetime DEFAULT NULL,
  `article_subject` varchar(1000) DEFAULT NULL,
  `article_disposal` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`serial_no`),
  KEY `file_no` (`file_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_article_department`
--

DROP TABLE IF EXISTS `tbl_article_department`;
CREATE TABLE IF NOT EXISTS `tbl_article_department` (
  `serial_no` bigint(20) DEFAULT NULL,
  `department_id` bigint(20) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  KEY `serial_no` (`serial_no`),
  KEY `department_id` (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_article_employee`
--

DROP TABLE IF EXISTS `tbl_article_employee`;
CREATE TABLE IF NOT EXISTS `tbl_article_employee` (
  `serial_no` bigint(20) DEFAULT NULL,
  `person_id` bigint(20) DEFAULT NULL,
  `remarks` varchar(1000) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  KEY `person_id` (`person_id`),
  KEY `serial_no` (`serial_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

DROP TABLE IF EXISTS `tbl_department`;
CREATE TABLE IF NOT EXISTS `tbl_department` (
  `department_id` bigint(20) NOT NULL,
  `department_name` varchar(1000) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dispatch_info`
--

DROP TABLE IF EXISTS `tbl_dispatch_info`;
CREATE TABLE IF NOT EXISTS `tbl_dispatch_info` (
  `dispatch_id` bigint(20) NOT NULL,
  `person_id` bigint(20) DEFAULT NULL,
  `dipatch_date` date DEFAULT NULL,
  `dispatch_time` datetime DEFAULT NULL,
  `dispatched_by` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`dispatch_id`),
  KEY `person_id` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

DROP TABLE IF EXISTS `tbl_employee`;
CREATE TABLE IF NOT EXISTS `tbl_employee` (
  `person_id` bigint(20) NOT NULL,
  `person_name` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `person_address` varchar(255) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `cnic` char(15) DEFAULT NULL,
  `phone_no` char(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `picture` varchar(1000) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `department_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`person_id`),
  KEY `department_id` (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_dispatch_info`
--

DROP TABLE IF EXISTS `tbl_employee_dispatch_info`;
CREATE TABLE IF NOT EXISTS `tbl_employee_dispatch_info` (
  `person_id` bigint(20) NOT NULL,
  `dispatch_id` bigint(20) NOT NULL,
  PRIMARY KEY (`person_id`,`dispatch_id`),
  UNIQUE KEY `person_id` (`person_id`,`dispatch_id`),
  KEY `dispatch_id` (`dispatch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee_recieved_info`
--

DROP TABLE IF EXISTS `tbl_employee_recieved_info`;
CREATE TABLE IF NOT EXISTS `tbl_employee_recieved_info` (
  `person_id` bigint(20) NOT NULL,
  `recieved_id` bigint(20) NOT NULL,
  PRIMARY KEY (`person_id`,`recieved_id`),
  UNIQUE KEY `person_id` (`person_id`,`recieved_id`),
  KEY `recieved_id` (`recieved_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file`
--

DROP TABLE IF EXISTS `tbl_file`;
CREATE TABLE IF NOT EXISTS `tbl_file` (
  `file_no` bigint(20) NOT NULL,
  `scholarships` varchar(1000) DEFAULT NULL,
  `registration_letters` varchar(1000) DEFAULT NULL,
  `controller_of_examination` varchar(1000) DEFAULT NULL,
  `visiting_faculty_letters` varchar(1000) DEFAULT NULL,
  `establishment_branch` varchar(1000) DEFAULT NULL,
  `treasurer_office` varchar(1000) DEFAULT NULL,
  `vc_office_approvals` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`file_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recieved_info`
--

DROP TABLE IF EXISTS `tbl_recieved_info`;
CREATE TABLE IF NOT EXISTS `tbl_recieved_info` (
  `recieved_id` bigint(20) NOT NULL,
  `person_id` bigint(20) DEFAULT NULL,
  `recieved_date` date DEFAULT NULL,
  `recieved_time` datetime DEFAULT NULL,
  `recieved_by` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`recieved_id`),
  KEY `person_id` (`person_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `employee_recieved_info`
--
ALTER TABLE `employee_recieved_info`
  ADD CONSTRAINT `employee_recieved_info_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `employee` (`person_id`),
  ADD CONSTRAINT `employee_recieved_info_ibfk_2` FOREIGN KEY (`recieved_id`) REFERENCES `recieved_info` (`recieved_id`);

--
-- Constraints for table `recieved_info`
--
ALTER TABLE `recieved_info`
  ADD CONSTRAINT `recieved_info_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `employee` (`person_id`);

--
-- Constraints for table `tbl_article`
--
ALTER TABLE `tbl_article`
  ADD CONSTRAINT `tbl_article_ibfk_1` FOREIGN KEY (`file_no`) REFERENCES `tbl_file` (`file_no`);

--
-- Constraints for table `tbl_article_department`
--
ALTER TABLE `tbl_article_department`
  ADD CONSTRAINT `tbl_article_department_ibfk_1` FOREIGN KEY (`serial_no`) REFERENCES `tbl_article` (`serial_no`),
  ADD CONSTRAINT `tbl_article_department_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `tbl_department` (`department_id`);

--
-- Constraints for table `tbl_article_employee`
--
ALTER TABLE `tbl_article_employee`
  ADD CONSTRAINT `tbl_article_employee_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `tbl_employee` (`person_id`),
  ADD CONSTRAINT `tbl_article_employee_ibfk_2` FOREIGN KEY (`serial_no`) REFERENCES `tbl_article` (`serial_no`);

--
-- Constraints for table `tbl_dispatch_info`
--
ALTER TABLE `tbl_dispatch_info`
  ADD CONSTRAINT `tbl_dispatch_info_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `tbl_employee` (`person_id`);

--
-- Constraints for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD CONSTRAINT `tbl_employee_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `tbl_department` (`department_id`);

--
-- Constraints for table `tbl_employee_dispatch_info`
--
ALTER TABLE `tbl_employee_dispatch_info`
  ADD CONSTRAINT `tbl_employee_dispatch_info_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `tbl_employee` (`person_id`),
  ADD CONSTRAINT `tbl_employee_dispatch_info_ibfk_2` FOREIGN KEY (`dispatch_id`) REFERENCES `tbl_dispatch_info` (`dispatch_id`);

--
-- Constraints for table `tbl_employee_recieved_info`
--
ALTER TABLE `tbl_employee_recieved_info`
  ADD CONSTRAINT `tbl_employee_recieved_info_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `tbl_employee` (`person_id`),
  ADD CONSTRAINT `tbl_employee_recieved_info_ibfk_2` FOREIGN KEY (`recieved_id`) REFERENCES `tbl_recieved_info` (`recieved_id`);

--
-- Constraints for table `tbl_recieved_info`
--
ALTER TABLE `tbl_recieved_info`
  ADD CONSTRAINT `tbl_recieved_info_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `tbl_employee` (`person_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
