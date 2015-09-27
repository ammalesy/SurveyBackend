-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 27, 2015 at 05:51 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CommonSurvey`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `a_id` int(10) NOT NULL,
  `a_user` varchar(32) NOT NULL,
  `a_pass` varchar(32) NOT NULL,
  `a_name` text,
  `a_permission` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`a_id`, `a_user`, `a_pass`, `a_name`, `a_permission`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Lead Administrator', '1'),
(2, 'manager', '5f4dcc3b5aa765d61d8327deb882cf99', 'Manager', '2'),
(3, 'user1', '5f4dcc3b5aa765d61d8327deb882cf99', 'User No.1', '3'),
(4, 'user2', '5f4dcc3b5aa765d61d8327deb882cf99', 'User No.2', '3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_owner`
--

CREATE TABLE IF NOT EXISTS `tb_owner` (
  `w_id` int(10) NOT NULL,
  `a_id_ref` int(10) NOT NULL,
  `pj_id_ref` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_owner`
--

INSERT INTO `tb_owner` (`w_id`, `a_id_ref`, `pj_id_ref`) VALUES
(1, 1, 1),
(13, 2, 1),
(14, 3, 1),
(15, 4, 1),
(22, 1, 16),
(23, 2, 16),
(24, 3, 16),
(25, 1, 15),
(26, 2, 15),
(27, 4, 15),
(28, 4, 14),
(29, 1, 14),
(30, 2, 14),
(31, 3, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tb_permission`
--

CREATE TABLE IF NOT EXISTS `tb_permission` (
  `pm_id` int(10) NOT NULL,
  `pm_name` varchar(50) NOT NULL,
  `question_mgnt` varchar(3) NOT NULL,
  `survey_mgnt` varchar(3) NOT NULL,
  `survey_result_mgnt` varchar(3) NOT NULL,
  `admin_mgnt` varchar(3) NOT NULL,
  `project_mgnt` varchar(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_permission`
--

INSERT INTO `tb_permission` (`pm_id`, `pm_name`, `question_mgnt`, `survey_mgnt`, `survey_result_mgnt`, `admin_mgnt`, `project_mgnt`) VALUES
(1, 'superadmin', 'rw', 'rw', 'rw', 'rw', 'rw'),
(2, 'manager', 'rw', 'rw', 'rw', 'n', 'n'),
(3, 'user', 'r', 'rw', 'rw', 'n', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_project`
--

CREATE TABLE IF NOT EXISTS `tb_project` (
  `pj_id` int(10) NOT NULL,
  `pj_name` varchar(100) NOT NULL,
  `pj_description` text,
  `pj_db_ref` varchar(32) NOT NULL,
  `pj_image` varchar(100) DEFAULT 'default.png',
  `active` varchar(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_project`
--

INSERT INTO `tb_project` (`pj_id`, `pj_name`, `pj_description`, `pj_db_ref`, `pj_image`, `active`) VALUES
(1, 'The real condo', 'The real condo survey. if you are manager you can manages the role user and add some question.', 'SurveyNew', 'banner_1.png', 'Y'),
(14, 'Batman condo', 'The batman condo is a super hero to be protect persons that want to help.', 'batman_condo', 'batman_condo1443274487.jpg', 'Y'),
(15, 'The Jocker condo', 'The dark condo is a smile only. but it has a lot of murdor.', 'the_k_condo', 'the_k_condo1443274608.jpg', 'Y'),
(16, 'The sukumvit condo', 'The five star premium condo . such as free drive a lambroghini , wave 125. ', 'the_sk_condo', '1443292795.jpg', 'Y'),
(17, 'test_performance', 'test_performance', 'test_performance', 'test_performance1443292060.jpg', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `tb_owner`
--
ALTER TABLE `tb_owner`
  ADD PRIMARY KEY (`w_id`);

--
-- Indexes for table `tb_permission`
--
ALTER TABLE `tb_permission`
  ADD PRIMARY KEY (`pm_id`);

--
-- Indexes for table `tb_project`
--
ALTER TABLE `tb_project`
  ADD PRIMARY KEY (`pj_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_owner`
--
ALTER TABLE `tb_owner`
  MODIFY `w_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tb_permission`
--
ALTER TABLE `tb_permission`
  MODIFY `pm_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_project`
--
ALTER TABLE `tb_project`
  MODIFY `pj_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
