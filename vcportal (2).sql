-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2018 at 12:13 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vcportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `mobile` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `name`, `email`, `mobile`, `password`) VALUES
(1, 'charan', 'charan.saithana@gmail.com', '9951448589', 'Charan@14'),
(2, 'srikanth', 'srikanth.dunna2@gmail.com', '9701147071', 'sri1234');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `aid` int(11) NOT NULL,
  `nid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`aid`, `nid`, `uid`, `time`) VALUES
(1, 6, 5, '2018-03-28'),
(2, 5, 5, '2018-03-28'),
(3, 6, 3, '2018-03-28'),
(4, 4, 3, '2018-03-28'),
(5, 5, 3, '2018-03-28'),
(6, 5, 6, '2018-03-30'),
(7, 6, 6, '2018-03-30'),
(8, 4, 6, '2018-03-30'),
(9, 3, 6, '2018-03-30'),
(10, 3, 3, '2018-03-30'),
(11, 8, 3, '2018-03-31'),
(12, 12, 3, '2018-03-31'),
(13, 16, 3, '2018-03-31'),
(14, 14, 3, '2018-03-31'),
(15, 3, 5, '2018-03-31'),
(16, 12, 5, '2018-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `did` int(10) NOT NULL,
  `dept_code` text NOT NULL,
  `username` text NOT NULL,
  `dept_name` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`did`, `dept_code`, `username`, `dept_name`, `password`) VALUES
(1, 'HLT', 'Health', 'Health', 'Health'),
(2, 'EDU', 'Education', 'Education', 'Education'),
(3, 'BUS', 'Employment', 'Employment/Bussiness', 'Employment'),
(4, 'HSG', 'Housing', 'Housing', 'Housing'),
(5, 'AC', 'AntiCorruption', 'Anti Corruption', 'AntiCorruption'),
(6, 'LO', 'Law', 'Law & Order', 'Law'),
(7, 'SC', 'SeniorCitizen', 'Senior Citizen', 'SeniorCitizen'),
(8, 'HC', 'Home', 'Home & Community', 'Home'),
(9, 'TT', 'Travel', 'Travel & Tourism', 'Travel'),
(10, 'TRN', 'Transport', 'Transport', 'Transport'),
(11, 'TF', 'Tax', 'Taxes & Finance', 'Tax');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `nid` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`nid`, `title`, `content`, `date`) VALUES
(1, 'workshop notification', '	DeGS 04 Days training workshop on “PRINCE II - project Management” at Bhubaneswar, Odisha from 25 to 28 January 2018', '29-03-2018'),
(2, 'RTI Act', 'Intimation regarding Comprehension Test on RTI Act, 2005 for the year-2016 to beheld on 17.02.2017 (Friday)', '22-03-2018'),
(3, 'Department Info', 'How to make Citizen Charter\r\n(Workshop for Senior Officers\r\nand functionaries of PSD\r\nDepartments)', '2018-03-24'),
(4, 'nomination notification', 'Interpersonal Skills :\r\nUnderstanding DOs andDON’Ts\r\nin the Workplace', '2018-03-25'),
(5, 'nomination completed', 'training programme \"Incident Command SystemPlanning\r\nand Management in\r\ncase of Disaster\" completed', '2018-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `nominations`
--

CREATE TABLE `nominations` (
  `nid` int(11) NOT NULL,
  `title` text NOT NULL,
  `eligibility` text NOT NULL,
  `experience` text NOT NULL,
  `description` text NOT NULL,
  `status` text NOT NULL,
  `date_of_session` text NOT NULL,
  `date` text NOT NULL,
  `last_date_apply` text NOT NULL,
  `allocated` text NOT NULL,
  `dept` text NOT NULL,
  `session_duration` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nominations`
--

INSERT INTO `nominations` (`nid`, `title`, `eligibility`, `experience`, `description`, `status`, `date_of_session`, `date`, `last_date_apply`, `allocated`, `dept`, `session_duration`) VALUES
(3, 'Empowering Women', 'Btech', '1', 'Empowering Women-Self\r\nDefence Skills-Level I', '1 Members Selected', '2018-03-08', '2018-03-27', '2018-04-07', '6', 'Education', '3'),
(4, 'Pay Fixation', 'Mtech', '3', 'Pay Fixation (Fixation and\r\nRevision of Pay, MACP, Income\r\ntax, NPS and Audit)', 'Pending', '2018-03-16', '2018-03-21', '2018-03-30', 'N', 'Taxes & Finance', '3'),
(5, 'RTI Act', 'Phd', '2', 'Capacity Building for\r\nGovernment Employees\r\n', 'Closed', '2018-01-04', '2018-03-29', '2018-10-30', 'N', 'Law And Order', '4'),
(6, 'artificial intelligence', 'Mtech', '4', 'need to give a presentation with 30 slides. time limit is 4 hours', '2 Members Selected', '2018-04-07', '2018-03-22', '2018-03-31', '5,3', 'Education', '5'),
(8, 'Training for Nurses', 'Bsc', '4', 'This training  is for Nurses regarding the new medicines and its dosage', 'Pending', '2018-04-12', '2018-03-25', '2018-04-05', 'N', 'Health', '3'),
(12, 'Bio Technology For Jr\'s', 'B Pharmacy', '0 Years', 'This session will give the required inputs for the Jr Doctors on the latest hospital equipment.', 'Pending', '2018-04-19', '2018-03-31', '2018-04-12', 'N', 'Health', '2 Days'),
(14, 'Training program for Nurses in latest bio tech', 'btech', '1', 'Nurses should be trained to use the latest bio technology components.', 'Pending', '2018-04-20', '2018-03-31', '2018-04-17', 'N', 'Health', '5'),
(15, 'Training program for Nurses in latest bio tech', 'btech', '1', 'Nurses should be trained to use the latest bio technology components.', 'Pending', '2018-04-20', '2018-03-31', '2018-04-17', 'N', 'Health', '5'),
(16, 'Foundation Training', 'BTech', '2', 'Foundation Training for Principals of Delhi Government Schools (Proposed).\nBudget Preparations- Executions', 'Pending', '2018-05-09', '', '2018-05-01', 'N', 'Anti Corruption', '4'),
(17, 'Foundation Training', 'BTech', '2', 'Foundation Training for Principals of Delhi Government Schools (Proposed).\nBudget Preparations- Executions', 'Pending', '2018-05-09', '', '2018-05-01', 'N', 'HSG', '4'),
(18, 'Foundation Training', 'BTech', '2', 'Foundation Training for Principals of Delhi Government Schools (Proposed).\nBudget Preparations- Executions', 'Pending', '2018-05-09', '', '2018-05-01', 'N', 'HSG', '4'),
(19, 'Hindi Teaching for the non Hindi employees', 'SSC', '1', 'Hindi Teaching for the non Hindi employees in order to break the communication in the workplaces. And to build a more vibrant community.', 'Pending', '2018-04-14', '', '2018-04-06', 'N', 'Anti Corruption', '5'),
(20, 'Hindi Teaching for the non Hindi employees', 'SSC', '1', 'Hindi Teaching for the non Hindi employees in order to break the communication in the workplaces. And to build a more vibrant community.', 'Pending', '2018-04-14', '', '2018-04-06', 'N', 'Senior Citizen', '5'),
(21, 'Hindi Teaching for the non Hindi employees', 'SSC', '1', 'Hindi Teaching for the non Hindi employees in order to break the communication in the workplaces. And to build a more vibrant community.', 'Pending', '2018-04-14', '', '2018-04-06', 'N', 'TRN', '5'),
(22, 'Hindi Teaching for the non Hindi employees', 'SSC', '1', 'Hindi Teaching for the non Hindi employees in order to break the communication in the workplaces. And to build a more vibrant community.', 'Pending', '2018-04-14', '', '2018-04-06', 'N', 'Employement/Bussiness', '5'),
(23, 'Hindi Teaching for the non Hindi employees', 'SSC', '1', 'Hindi Teaching for the non Hindi employees in order to break the communication in the workplaces. And to build a more vibrant community.', 'Pending', '2018-04-14', '', '2018-04-06', 'N', 'TRN', '5'),
(24, 'Hindi Teaching for the non Hindi employees', 'SSC', '1', 'Hindi Teaching for the non Hindi employees in order to break the communication in the workplaces. And to build a more vibrant community.', 'Pending', '2018-04-14', '', '2018-04-06', 'N', 'Travel & Tourism', '5'),
(25, 'Hindi Teaching for the non Hindi employees', 'SSC', '1', 'Hindi Teaching for the non Hindi employees in order to break the communication in the workplaces. And to build a more vibrant community.', 'Pending', '2018-04-14', '', '2018-04-06', 'N', 'TRN', '5'),
(26, 'Hindi Teaching for the non Hindi employees', 'SSC', '1', 'Hindi Teaching for the non Hindi employees in order to break the communication in the workplaces. And to build a more vibrant community.', 'Pending', '2018-04-14', '', '2018-04-06', 'N', 'Senior Citizen', '5'),
(27, 'Hindi Teaching for the non Hindi employees', 'SSC', '1', 'Hindi Teaching for the non Hindi employees in order to break the communication in the workplaces. And to build a more vibrant community.', 'Pending', '2018-04-14', '', '2018-04-06', 'N', 'TRN', '5'),
(28, 'Hindi Teaching for the non Hindi employees', 'SSC', '1', 'Hindi Teaching for the non Hindi employees in order to break the communication in the workplaces. And to build a more vibrant community.', 'Pending', '2018-04-14', '', '2018-04-06', 'N', 'TRN', '5'),
(29, 'Hindi Teaching for the non Hindi employees', 'SSC', '1', 'Hindi Teaching for the non Hindi employees in order to break the communication in the workplaces. And to build a more vibrant community.', 'Pending', '2018-04-14', '', '2018-04-06', 'N', 'Travel & Tourism', '5'),
(30, 'test', 'btest', '2', 'test', 'Pending', '2018-04-01', '', '2018-04-14', 'N', 'HLT', '2');

-- --------------------------------------------------------

--
-- Table structure for table `nomination_request`
--

CREATE TABLE `nomination_request` (
  `nid` int(11) NOT NULL,
  `title` text NOT NULL,
  `eligibility` text NOT NULL,
  `experience` text NOT NULL,
  `description` text NOT NULL,
  `status` text NOT NULL,
  `date` text NOT NULL,
  `date_of_session` text NOT NULL,
  `last_date_apply` text NOT NULL,
  `allocated` text NOT NULL,
  `dept` text NOT NULL,
  `session_duration` text NOT NULL,
  `verify` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nomination_request`
--

INSERT INTO `nomination_request` (`nid`, `title`, `eligibility`, `experience`, `description`, `status`, `date`, `date_of_session`, `last_date_apply`, `allocated`, `dept`, `session_duration`, `verify`) VALUES
(1, 'Training program for Nurses in latest bio tech', 'btech', '1', 'Nurses should be trained to use the latest bio technology components.', 'Pending', '2018-03-31', '2018-04-20', '2018-04-17', '', 'Health', '5', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `sid` int(11) NOT NULL,
  `email` text NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`sid`, `email`, `time`) VALUES
(1, 'charan.saithana@gmail.com', '2018-03-30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `mobile` text NOT NULL,
  `gender` text NOT NULL,
  `experience` text NOT NULL,
  `qualification` text NOT NULL,
  `dept` text NOT NULL,
  `rating` text NOT NULL,
  `designation` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `verify` text NOT NULL,
  `count` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `email`, `mobile`, `gender`, `experience`, `qualification`, `dept`, `rating`, `designation`, `username`, `password`, `verify`, `count`) VALUES
(3, 'Saithana Sri Charan', 'charan.saithana@gmail.com', '9951448589', 'M', '9', 'Phd', '', '0', 'professor', 'charan14', 'jem8avFrYztp8b9gLawqDw==', 'N', ''),
(4, 'S Narendra', 'narendra123@gmail.com', '7075997266', '', '', '', '', '0', '', '', 'Jc2YwhxL4f8OcpfyveXe1A==', 'N', ''),
(5, 'srikanth dunna', 'srikanth.dunna2@gmail.com', '9701147071', 'M', '3', 'Btech', '', '0', 'student', 'sri', 'DkDFvCSJZ24vZkh0CsgPmA==', 'N', ''),
(6, 'sneha chowdary', 'sindhuravadaga@gmail.com', '9701123121', 'F', '5', 'Phd', '', '', 'professor', 'sneha', 'MTeOwA5ACoADhd6heh1EUA==', 'N', ''),
(7, 'p r', 'p@r', 'ew3455', '', '', '', '', '', '', '', 'DkDFvCSJZ24vZkh0CsgPmA==', 'N', ''),
(8, 'p o', 'dff', 'cbn', '', '', '', '', '', '', '', 'DkDFvCSJZ24vZkh0CsgPmA==', 'N', ''),
(9, 'Charan Sri', 'chat', 'jkhkhkhkcvbnm', '', '', '', '', '', '', '', 'J70o4jslxHMZShsFGn/ubA==', 'N', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `nominations`
--
ALTER TABLE `nominations`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `nomination_request`
--
ALTER TABLE `nomination_request`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `did` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nominations`
--
ALTER TABLE `nominations`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `nomination_request`
--
ALTER TABLE `nomination_request`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
