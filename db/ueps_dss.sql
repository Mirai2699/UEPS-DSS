-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2019 at 01:51 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ueps_dss`
--

-- --------------------------------------------------------

--
-- Table structure for table `r_city`
--

CREATE TABLE `r_city` (
  `city_ID` int(10) NOT NULL,
  `city_name` varchar(225) NOT NULL,
  `city_active_stat` varchar(10) NOT NULL DEFAULT 'Active',
  `city_timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_city`
--

INSERT INTO `r_city` (`city_ID`, `city_name`, `city_active_stat`, `city_timestamp`) VALUES
(1, 'Quezon City', 'Active', '2019-05-15 00:00:00'),
(2, 'Makati City', 'Active', '2019-05-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `r_event_type`
--

CREATE TABLE `r_event_type` (
  `evt_ID` int(10) NOT NULL,
  `evt_desc` varchar(100) NOT NULL,
  `evt_active_stat` varchar(10) NOT NULL DEFAULT 'Active',
  `evt_timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_event_type`
--

INSERT INTO `r_event_type` (`evt_ID`, `evt_desc`, `evt_active_stat`, `evt_timestamp`) VALUES
(1, 'Seminar', 'Active', '2019-05-15 00:00:00'),
(2, 'Concert', 'Active', '2019-05-15 00:00:00'),
(3, 'Youth Camp', 'Active', '2019-05-15 00:00:00'),
(4, 'Youth Marathon', 'Active', '2019-05-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `r_university`
--

CREATE TABLE `r_university` (
  `uni_ID` int(10) NOT NULL,
  `uni_name` varchar(225) NOT NULL,
  `uni_city` int(10) NOT NULL,
  `uni_address` varchar(225) NOT NULL,
  `uni_desc` varchar(225) NOT NULL,
  `uni_picture` varchar(225) NOT NULL,
  `uni_active_stat` varchar(10) NOT NULL DEFAULT 'Active',
  `uni_timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_university`
--

INSERT INTO `r_university` (`uni_ID`, `uni_name`, `uni_city`, `uni_address`, `uni_desc`, `uni_picture`, `uni_active_stat`, `uni_timestamp`) VALUES
(1, 'Polytechnic University of the Philippines', 1, 'Don Fabian', 'Sintang Paaralan', 'picture', 'Active', '2019-05-15 00:00:00'),
(2, 'University of the Philippines', 1, 'Diliman QC', 'Iskolar ng bayan', 'picture', 'Active', '2019-05-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `r_user_role`
--

CREATE TABLE `r_user_role` (
  `usr_ID` int(10) NOT NULL,
  `usr_desc` varchar(50) NOT NULL,
  `usr_stat` bit(1) NOT NULL,
  `usr_timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_user_role`
--

INSERT INTO `r_user_role` (`usr_ID`, `usr_desc`, `usr_stat`, `usr_timestamp`) VALUES
(1, 'Administrator', b'1', '2019-05-15 00:00:00'),
(2, 'Event Admin', b'1', '2019-05-15 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_admin_accounts`
--

CREATE TABLE `t_admin_accounts` (
  `acc_ID` int(10) NOT NULL,
  `acc_userID` int(10) NOT NULL,
  `acc_username` varchar(100) NOT NULL,
  `acc_password` varchar(100) NOT NULL,
  `acc_user_role` int(10) NOT NULL,
  `acc_picture` varchar(255) NOT NULL DEFAULT 'default.png',
  `acc_active_flag` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_admin_accounts`
--

INSERT INTO `t_admin_accounts` (`acc_ID`, `acc_userID`, `acc_username`, `acc_password`, `acc_user_role`, `acc_picture`, `acc_active_flag`) VALUES
(2, 1, 'jean', 'jean', 2, 'default.png', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `t_admin_users`
--

CREATE TABLE `t_admin_users` (
  `u_ID` int(10) NOT NULL,
  `u_lastname` varchar(100) NOT NULL,
  `u_middlename` varchar(100) DEFAULT NULL,
  `u_firstname` varchar(100) NOT NULL,
  `u_university` int(10) NOT NULL,
  `u_designation` varchar(50) NOT NULL,
  `u_picture` varchar(255) NOT NULL DEFAULT 'default.png',
  `u_active_flag` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_admin_users`
--

INSERT INTO `t_admin_users` (`u_ID`, `u_lastname`, `u_middlename`, `u_firstname`, `u_university`, `u_designation`, `u_picture`, `u_active_flag`) VALUES
(1, 'Ramos', NULL, 'Jean Ann', 1, 'Event Admin', 'default.png', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `t_data_mine_log`
--

CREATE TABLE `t_data_mine_log` (
  `dm_ID` int(10) NOT NULL,
  `dm_no` varchar(20) NOT NULL,
  `dm_timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_events`
--

CREATE TABLE `t_events` (
  `ev_ID` int(10) NOT NULL,
  `ev_name` varchar(100) NOT NULL,
  `ev_desc` varchar(225) NOT NULL,
  `ev_typeID` int(10) NOT NULL,
  `ev_date_start` date NOT NULL,
  `ev_date_end` date NOT NULL,
  `ev_venue` varchar(225) NOT NULL,
  `ev_city` int(10) NOT NULL,
  `ev_fee_type` varchar(30) NOT NULL,
  `ev_fee_amount` decimal(10,2) DEFAULT NULL,
  `ev_status` varchar(20) NOT NULL,
  `ev_by_university` int(10) NOT NULL,
  `ev_by_event_admin` int(10) NOT NULL,
  `ev_active_stat` varchar(10) NOT NULL,
  `ev_timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_event_activities`
--

CREATE TABLE `t_event_activities` (
  `ev_act_ID` int(10) NOT NULL,
  `ev_act_description` varchar(225) NOT NULL,
  `ev_act_time_start` time NOT NULL,
  `ev_act_eventID` int(10) NOT NULL,
  `ev_act_active_stat` varchar(10) NOT NULL DEFAULT 'Active',
  `ev_act_timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_student`
--

CREATE TABLE `t_student` (
  `s_ID` int(10) NOT NULL,
  `s_lastname` varchar(100) NOT NULL,
  `s_middlename` varchar(100) DEFAULT NULL,
  `s_firstname` varchar(100) NOT NULL,
  `s_gender` varchar(10) NOT NULL,
  `s_birthdate` date NOT NULL,
  `s_city_location` int(10) NOT NULL,
  `s_university` int(10) NOT NULL,
  `s_picture` varchar(255) NOT NULL DEFAULT 'default.png',
  `s_active_flag` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_student_interest`
--

CREATE TABLE `t_student_interest` (
  `si_ID` int(10) NOT NULL,
  `si_stud_ID` int(10) NOT NULL,
  `si_evt_ID` int(10) NOT NULL,
  `si_active_stat` varchar(10) NOT NULL DEFAULT 'Active',
  `si_timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_student_sentiment`
--

CREATE TABLE `t_student_sentiment` (
  `ss_ID` int(10) NOT NULL,
  `ss_stud_ID` int(10) NOT NULL,
  `ss_status` varchar(10) NOT NULL,
  `ss_active_stat` varchar(10) NOT NULL,
  `ss_timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_stud_accounts`
--

CREATE TABLE `t_stud_accounts` (
  `ac_stud_ID` int(10) NOT NULL,
  `ac_stud_userID` int(10) NOT NULL,
  `ac_stud_username` varchar(100) NOT NULL,
  `ac_stud_password` varchar(100) NOT NULL,
  `ac_stud_user_role` int(10) NOT NULL,
  `ac_stud_picture` varchar(255) NOT NULL DEFAULT 'default.png',
  `ac_stud_active_flag` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_users_log`
--

CREATE TABLE `t_users_log` (
  `log_No` int(200) NOT NULL,
  `log_userID` int(10) NOT NULL,
  `log_usertype` int(10) NOT NULL,
  `log_datestamp` date NOT NULL,
  `log_timestamp` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_users_log`
--

INSERT INTO `t_users_log` (`log_No`, `log_userID`, `log_usertype`, `log_datestamp`, `log_timestamp`) VALUES
(1, 2, 2, '2019-05-15', '19:22:52'),
(2, 2, 2, '2019-05-15', '19:22:59'),
(3, 2, 2, '2019-05-15', '19:23:56'),
(4, 2, 2, '2019-05-15', '19:24:25'),
(5, 2, 2, '2019-05-15', '19:47:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `r_city`
--
ALTER TABLE `r_city`
  ADD PRIMARY KEY (`city_ID`);

--
-- Indexes for table `r_event_type`
--
ALTER TABLE `r_event_type`
  ADD PRIMARY KEY (`evt_ID`);

--
-- Indexes for table `r_university`
--
ALTER TABLE `r_university`
  ADD PRIMARY KEY (`uni_ID`),
  ADD KEY `FK_city` (`uni_city`);

--
-- Indexes for table `r_user_role`
--
ALTER TABLE `r_user_role`
  ADD PRIMARY KEY (`usr_ID`);

--
-- Indexes for table `t_admin_accounts`
--
ALTER TABLE `t_admin_accounts`
  ADD PRIMARY KEY (`acc_ID`),
  ADD KEY `FK_acc_role` (`acc_user_role`),
  ADD KEY `FK_acc_emp` (`acc_userID`);

--
-- Indexes for table `t_admin_users`
--
ALTER TABLE `t_admin_users`
  ADD PRIMARY KEY (`u_ID`),
  ADD KEY `FK_university_emp` (`u_university`);

--
-- Indexes for table `t_data_mine_log`
--
ALTER TABLE `t_data_mine_log`
  ADD PRIMARY KEY (`dm_ID`);

--
-- Indexes for table `t_events`
--
ALTER TABLE `t_events`
  ADD PRIMARY KEY (`ev_ID`),
  ADD KEY `FK_evetype` (`ev_typeID`),
  ADD KEY `FK_cityID` (`ev_city`),
  ADD KEY `FK_university` (`ev_by_university`),
  ADD KEY `FK_ev_admin` (`ev_by_event_admin`);

--
-- Indexes for table `t_event_activities`
--
ALTER TABLE `t_event_activities`
  ADD PRIMARY KEY (`ev_act_ID`),
  ADD KEY `FK_act_evtID` (`ev_act_eventID`);

--
-- Indexes for table `t_student`
--
ALTER TABLE `t_student`
  ADD PRIMARY KEY (`s_ID`),
  ADD KEY `FK_university_stu` (`s_university`);

--
-- Indexes for table `t_student_interest`
--
ALTER TABLE `t_student_interest`
  ADD PRIMARY KEY (`si_ID`),
  ADD KEY `FK_si_studID` (`si_stud_ID`),
  ADD KEY `FK_si_eventID` (`si_evt_ID`);

--
-- Indexes for table `t_student_sentiment`
--
ALTER TABLE `t_student_sentiment`
  ADD PRIMARY KEY (`ss_ID`),
  ADD KEY `FK_ss_studID` (`ss_stud_ID`);

--
-- Indexes for table `t_stud_accounts`
--
ALTER TABLE `t_stud_accounts`
  ADD PRIMARY KEY (`ac_stud_ID`),
  ADD KEY `FK_acc_stud` (`ac_stud_userID`);

--
-- Indexes for table `t_users_log`
--
ALTER TABLE `t_users_log`
  ADD PRIMARY KEY (`log_No`),
  ADD KEY `FK_loguserID` (`log_userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `r_city`
--
ALTER TABLE `r_city`
  MODIFY `city_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_event_type`
--
ALTER TABLE `r_event_type`
  MODIFY `evt_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `r_university`
--
ALTER TABLE `r_university`
  MODIFY `uni_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `r_user_role`
--
ALTER TABLE `r_user_role`
  MODIFY `usr_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_admin_accounts`
--
ALTER TABLE `t_admin_accounts`
  MODIFY `acc_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_admin_users`
--
ALTER TABLE `t_admin_users`
  MODIFY `u_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t_data_mine_log`
--
ALTER TABLE `t_data_mine_log`
  MODIFY `dm_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_events`
--
ALTER TABLE `t_events`
  MODIFY `ev_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_event_activities`
--
ALTER TABLE `t_event_activities`
  MODIFY `ev_act_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_student`
--
ALTER TABLE `t_student`
  MODIFY `s_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_student_interest`
--
ALTER TABLE `t_student_interest`
  MODIFY `si_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_student_sentiment`
--
ALTER TABLE `t_student_sentiment`
  MODIFY `ss_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_stud_accounts`
--
ALTER TABLE `t_stud_accounts`
  MODIFY `ac_stud_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_users_log`
--
ALTER TABLE `t_users_log`
  MODIFY `log_No` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `r_university`
--
ALTER TABLE `r_university`
  ADD CONSTRAINT `FK_city` FOREIGN KEY (`uni_city`) REFERENCES `r_city` (`city_ID`);

--
-- Constraints for table `t_admin_accounts`
--
ALTER TABLE `t_admin_accounts`
  ADD CONSTRAINT `FK_acc_emp` FOREIGN KEY (`acc_userID`) REFERENCES `t_admin_users` (`u_ID`),
  ADD CONSTRAINT `FK_acc_role` FOREIGN KEY (`acc_user_role`) REFERENCES `r_user_role` (`usr_ID`);

--
-- Constraints for table `t_admin_users`
--
ALTER TABLE `t_admin_users`
  ADD CONSTRAINT `FK_university_emp` FOREIGN KEY (`u_university`) REFERENCES `r_university` (`uni_ID`);

--
-- Constraints for table `t_events`
--
ALTER TABLE `t_events`
  ADD CONSTRAINT `FK_cityID` FOREIGN KEY (`ev_city`) REFERENCES `r_city` (`city_ID`),
  ADD CONSTRAINT `FK_ev_admin` FOREIGN KEY (`ev_by_event_admin`) REFERENCES `t_admin_accounts` (`acc_ID`),
  ADD CONSTRAINT `FK_evetype` FOREIGN KEY (`ev_typeID`) REFERENCES `r_event_type` (`evt_ID`),
  ADD CONSTRAINT `FK_university` FOREIGN KEY (`ev_by_university`) REFERENCES `r_university` (`uni_ID`);

--
-- Constraints for table `t_event_activities`
--
ALTER TABLE `t_event_activities`
  ADD CONSTRAINT `FK_act_evtID` FOREIGN KEY (`ev_act_eventID`) REFERENCES `t_events` (`ev_ID`);

--
-- Constraints for table `t_student`
--
ALTER TABLE `t_student`
  ADD CONSTRAINT `FK_university_stu` FOREIGN KEY (`s_university`) REFERENCES `r_university` (`uni_ID`);

--
-- Constraints for table `t_student_interest`
--
ALTER TABLE `t_student_interest`
  ADD CONSTRAINT `FK_si_eventID` FOREIGN KEY (`si_evt_ID`) REFERENCES `r_event_type` (`evt_ID`),
  ADD CONSTRAINT `FK_si_studID` FOREIGN KEY (`si_stud_ID`) REFERENCES `t_student` (`s_ID`);

--
-- Constraints for table `t_student_sentiment`
--
ALTER TABLE `t_student_sentiment`
  ADD CONSTRAINT `FK_ss_studID` FOREIGN KEY (`ss_stud_ID`) REFERENCES `t_student` (`s_ID`);

--
-- Constraints for table `t_stud_accounts`
--
ALTER TABLE `t_stud_accounts`
  ADD CONSTRAINT `FK_acc_stud` FOREIGN KEY (`ac_stud_userID`) REFERENCES `t_student` (`s_ID`);

--
-- Constraints for table `t_users_log`
--
ALTER TABLE `t_users_log`
  ADD CONSTRAINT `FK_loguserID` FOREIGN KEY (`log_userID`) REFERENCES `t_admin_accounts` (`acc_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
