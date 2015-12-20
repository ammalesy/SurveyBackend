-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 24, 2015 at 03:48 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_owner`
--

INSERT INTO `tb_owner` (`w_id`, `a_id_ref`, `pj_id_ref`) VALUES
(46, 2, 21),
(47, 1, 18),
(48, 2, 18),
(49, 3, 18),
(50, 4, 18),
(51, 1, 20),
(52, 2, 20),
(53, 3, 20),
(54, 1, 19),
(55, 2, 19),
(56, 3, 19),
(57, 4, 19),
(58, 1, 21),
(59, 3, 21),
(60, 1, 22);

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_project`
--

INSERT INTO `tb_project` (`pj_id`, `pj_name`, `pj_description`, `pj_db_ref`, `pj_image`, `active`) VALUES
(18, 'Than living', 'Than living Rama9-Airport link', 'thanliving', 'thanliving1445269058.jpg', 'Y'),
(19, 'Lumpini ville', 'คอนโดในชุมชนน่าอยู่ ย่านประชาชื่น', 'lumpiniville', 'lumpiniville1445269582.jpg', 'Y'),
(20, 'Sansiri', 'คอนโดคุณภาพแสนสิริ', 'sansiri', '1445269978.jpg', 'Y'),
(21, 'AP Condo', 'คอนโด ริทึ่ม สุขุมวิท 42 RHYTHM SUKHUMVIT 42', 'apcondo', 'apcondo1445270113.jpg', 'Y'),
(22, 'dummy', 'dummy', 'dummy', 'default.png', 'Y');

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
  MODIFY `w_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `tb_permission`
--
ALTER TABLE `tb_permission`
  MODIFY `pm_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_project`
--
ALTER TABLE `tb_project`
  MODIFY `pj_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
