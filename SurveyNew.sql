-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 15, 2015 at 02:04 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `SurveyNew`
--

-- --------------------------------------------------------

--
-- Table structure for table `SV5`
--

CREATE TABLE IF NOT EXISTS `SV5` (
`id` int(10) NOT NULL,
  `1` varchar(50) NOT NULL,
  `12` varchar(50) NOT NULL,
  `13` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `SV6`
--

CREATE TABLE IF NOT EXISTS `SV6` (
`id` int(10) NOT NULL,
  `1` varchar(100) NOT NULL,
  `12` varchar(100) NOT NULL,
  `13` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SV6`
--

INSERT INTO `SV6` (`id`, `1`, `12`, `13`) VALUES
(1, '', '', ''),
(2, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `SV7`
--

CREATE TABLE IF NOT EXISTS `SV7` (
`id` int(10) NOT NULL,
  `12` varchar(100) NOT NULL,
  `13` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SV7`
--

INSERT INTO `SV7` (`id`, `12`, `13`) VALUES
(1, '99', '110'),
(2, '99,146', '110'),
(3, '99', '110'),
(4, '99', '110'),
(5, '99', '110');

-- --------------------------------------------------------

--
-- Table structure for table `SV8`
--

CREATE TABLE IF NOT EXISTS `SV8` (
`id` int(10) NOT NULL,
  `1` varchar(100) NOT NULL,
  `12` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `SV9`
--

CREATE TABLE IF NOT EXISTS `SV9` (
`id` int(10) NOT NULL,
  `12` varchar(100) NOT NULL,
  `1` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `SV10`
--

CREATE TABLE IF NOT EXISTS `SV10` (
`id` int(10) NOT NULL,
  `12` varchar(100) NOT NULL,
  `1` varchar(100) NOT NULL,
  `13` varchar(100) NOT NULL,
  `14` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SV10`
--

INSERT INTO `SV10` (`id`, `12`, `1`, `13`, `14`) VALUES
(1, '97,98', '102', '110', '129,130,131'),
(2, '97', '102', '110', '129');

-- --------------------------------------------------------

--
-- Table structure for table `SV11`
--

CREATE TABLE IF NOT EXISTS `SV11` (
`id` int(10) NOT NULL,
  `17` varchar(100) NOT NULL,
  `13` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `SV12`
--

CREATE TABLE IF NOT EXISTS `SV12` (
`id` int(10) NOT NULL,
  `12` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `SV13`
--

CREATE TABLE IF NOT EXISTS `SV13` (
`id` int(10) NOT NULL,
  `1` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `SV14`
--

CREATE TABLE IF NOT EXISTS `SV14` (
`id` int(10) NOT NULL,
  `12` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `SV15`
--

CREATE TABLE IF NOT EXISTS `SV15` (
`id` int(10) NOT NULL,
  `15` varchar(100) NOT NULL,
  `13` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `SV16`
--

CREATE TABLE IF NOT EXISTS `SV16` (
`id` int(10) NOT NULL,
  `17` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
`a_id` int(10) NOT NULL,
  `a_user` varchar(32) CHARACTER SET utf8 NOT NULL,
  `a_pass` varchar(32) CHARACTER SET utf8 NOT NULL,
  `a_name` text CHARACTER SET utf8
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`a_id`, `a_user`, `a_pass`, `a_name`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'Super admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_all_answer`
--

CREATE TABLE IF NOT EXISTS `tb_all_answer` (
`aa_id` int(20) NOT NULL,
  `aa_description` text NOT NULL,
  `aa_image` varchar(100) DEFAULT NULL,
  `aq_id_ref` int(5) NOT NULL,
  `type` int(2) NOT NULL,
  `active` varchar(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_all_answer`
--

INSERT INTO `tb_all_answer` (`aa_id`, `aa_description`, `aa_image`, `aq_id_ref`, `type`, `active`) VALUES
(97, 'ans 1', NULL, 12, 0, 'Y'),
(98, 'ans 2', NULL, 12, 0, 'Y'),
(99, 'ans 3', NULL, 12, 0, 'Y'),
(100, 'dfqef', NULL, 12, 0, 'N'),
(101, 'qefqefqefqef', NULL, 12, 0, 'N'),
(102, 'I play the football with my friends every night2.', NULL, 1, 0, 'Y'),
(103, 'I go to the beat with my family every year.', NULL, 1, 0, 'Y'),
(104, 'I do something with my girl friend!!', NULL, 1, 0, 'Y'),
(105, 'I don''t known because no the hobbies2.', NULL, 1, 0, 'Y'),
(106, 'aaa', NULL, 1, 0, 'Y'),
(107, 'bbb', NULL, 1, 0, 'Y'),
(108, 'ccc', NULL, 1, 0, 'Y'),
(109, 'ddd', NULL, 1, 0, 'Y'),
(110, 'ans1', NULL, 13, 0, 'Y'),
(111, 'ans2', NULL, 13, 0, 'Y'),
(112, 'ans3', NULL, 13, 0, 'Y'),
(113, 'ans4', NULL, 13, 0, 'Y'),
(114, 'ans5', NULL, 13, 0, 'Y'),
(129, 'ans1', NULL, 14, 0, 'Y'),
(130, 'ans2', NULL, 14, 0, 'Y'),
(131, 'ans3', NULL, 14, 0, 'Y'),
(132, 'ans4', NULL, 14, 0, 'Y'),
(133, 'ans1cc', NULL, 15, 0, 'Y'),
(134, 'ans2cc', NULL, 15, 0, 'Y'),
(135, 'ans3cc', NULL, 15, 0, 'Y'),
(136, 'ans4cc', NULL, 15, 0, 'Y'),
(137, 'ans5cc', NULL, 15, 0, 'Y'),
(138, 'ans6cc', NULL, 15, 0, 'Y'),
(139, '1', NULL, 16, 0, 'Y'),
(140, '4', NULL, 17, 0, 'Y'),
(141, 'test', NULL, 1, 0, 'Y'),
(142, 'tt', NULL, 18, 0, 'Y'),
(143, 'sdfsdf', NULL, 19, 0, 'Y'),
(144, 'sfgsfg', NULL, 20, 0, 'Y'),
(145, 'wrgwrgwrg', NULL, 21, 0, 'Y'),
(146, 't1', NULL, 12, 0, 'Y'),
(147, 'gggg', NULL, 1, 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_all_question`
--

CREATE TABLE IF NOT EXISTS `tb_all_question` (
`aq_id` int(5) NOT NULL,
  `aq_description` text NOT NULL,
  `aq_image` varchar(100) DEFAULT ' ',
  `active` varchar(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_all_question`
--

INSERT INTO `tb_all_question` (`aq_id`, `aq_description`, `aq_image`, `active`) VALUES
(1, 'What is your the hobbies?', NULL, 'Y'),
(12, 'The the question form mobile', 'The image path', 'Y'),
(13, 'Test1', NULL, 'Y'),
(14, 'Test2', NULL, 'Y'),
(15, 'To sleepcc', NULL, 'Y'),
(16, 'eee', NULL, 'Y'),
(17, 'bbb', NULL, 'Y'),
(18, 'ttt', NULL, 'Y'),
(19, 'dfsdf', NULL, 'Y'),
(20, 'sfgfsgsfg', NULL, 'Y'),
(21, 'sdgdsgsdg', NULL, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_survey_mapping`
--

CREATE TABLE IF NOT EXISTS `tb_survey_mapping` (
`sm_id` int(11) NOT NULL,
  `sm_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `sm_description` text CHARACTER SET utf8,
  `sm_table_code` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `sm_order_column` text NOT NULL,
  `sm_update_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_survey_mapping`
--

INSERT INTO `tb_survey_mapping` (`sm_id`, `sm_name`, `sm_description`, `sm_table_code`, `sm_order_column`, `sm_update_at`) VALUES
(5, 'Survey No. 4', 'description of survay no. 4', 'SV5', '12,1,13', '2015-09-07 23:58:51'),
(6, 'Survey No. 4', 'description of survay no. 4', 'SV6', '12,1,13', '2015-09-07 23:58:51'),
(7, 'Survey No. 4', 'description of survay no. 4', 'SV7', '12,13', '2015-09-09 00:49:35'),
(8, 'Survey No. 4', 'description of survay no. 4', 'SV8', '12,1', '2015-09-07 23:59:31'),
(9, 'Survey No. 4', 'description of survay no. 4', 'SV9', '12,1', '2015-09-08 22:36:54'),
(10, 'test_tonight4', 'test_tonight_detail4', 'SV10', '1,12,13,14', '2015-09-09 22:22:36'),
(12, 'gg', '', 'SV12', '12', '2015-09-09 09:05:38'),
(13, 'Test On Mobile1', 'Test On Mobile1 description 1', 'SV13', '1', '2015-09-14 02:14:22'),
(14, 'Test On Mobile2', 'Test On Mobile2 des', 'SV14', '12', '2015-09-14 02:14:36'),
(15, 'Test On Mobile3', 'Test On Mobile3', 'SV15', '15,13', '2015-09-14 02:14:50'),
(16, 'Test On Mobile4', 'Test On Mobile4 des', 'SV16', '17', '2015-09-14 02:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_history`
--

CREATE TABLE IF NOT EXISTS `tb_user_history` (
`h_id` int(10) NOT NULL,
  `u_id_ref` int(10) NOT NULL,
  `sm_id_ref` int(11) NOT NULL,
  `s_id_ref` int(10) NOT NULL,
  `h_timestamp` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user_history`
--

INSERT INTO `tb_user_history` (`h_id`, `u_id_ref`, `sm_id_ref`, `s_id_ref`, `h_timestamp`) VALUES
(1, 1, 10, 1, '2015-09-09 00:00:00'),
(2, 2, 7, 1, '2015-09-09 00:00:00'),
(3, 1, 7, 2, '2015-09-09 06:00:00'),
(4, 1, 10, 2, '2015-05-09 11:20:10'),
(5, 2, 7, 3, '2015-09-09 11:20:10'),
(6, 3, 7, 4, '2015-09-09 11:20:10'),
(7, 4, 7, 5, '2015-09-09 11:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_info`
--

CREATE TABLE IF NOT EXISTS `tb_user_info` (
`u_id` int(10) NOT NULL,
  `u_firstname` text NOT NULL,
  `u_surname` text NOT NULL,
  `u_sex` int(1) NOT NULL,
  `u_age` int(3) NOT NULL,
  `u_email` varchar(50) DEFAULT NULL,
  `u_tel` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user_info`
--

INSERT INTO `tb_user_info` (`u_id`, `u_firstname`, `u_surname`, `u_sex`, `u_age`, `u_email`, `u_tel`) VALUES
(1, 'Ammales', 'Yamsompong', 0, 23, 'ammales.y@gmail.com', '0824832318'),
(2, 'Apichaya', 'Boonsin', 1, 23, 'apichaya-2010@hotmail.com', '0824832317'),
(3, 'NEW_USER1', 'NEW_USER1', 0, 0, '', ''),
(4, 'NEW_USER2', 'NEW_USER2', 0, 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `SV5`
--
ALTER TABLE `SV5`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `SV6`
--
ALTER TABLE `SV6`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `SV7`
--
ALTER TABLE `SV7`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `SV8`
--
ALTER TABLE `SV8`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `SV9`
--
ALTER TABLE `SV9`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `SV10`
--
ALTER TABLE `SV10`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `SV11`
--
ALTER TABLE `SV11`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `SV12`
--
ALTER TABLE `SV12`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `SV13`
--
ALTER TABLE `SV13`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `SV14`
--
ALTER TABLE `SV14`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `SV15`
--
ALTER TABLE `SV15`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `SV16`
--
ALTER TABLE `SV16`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
 ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `tb_all_answer`
--
ALTER TABLE `tb_all_answer`
 ADD PRIMARY KEY (`aa_id`), ADD KEY `aq_id_ref` (`aq_id_ref`);

--
-- Indexes for table `tb_all_question`
--
ALTER TABLE `tb_all_question`
 ADD PRIMARY KEY (`aq_id`), ADD KEY `aq_id` (`aq_id`);

--
-- Indexes for table `tb_survey_mapping`
--
ALTER TABLE `tb_survey_mapping`
 ADD PRIMARY KEY (`sm_id`);

--
-- Indexes for table `tb_user_history`
--
ALTER TABLE `tb_user_history`
 ADD PRIMARY KEY (`h_id`), ADD KEY `u_id_ref` (`u_id_ref`), ADD KEY `sm_id_ref` (`sm_id_ref`), ADD KEY `s_id_ref` (`s_id_ref`);

--
-- Indexes for table `tb_user_info`
--
ALTER TABLE `tb_user_info`
 ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `SV5`
--
ALTER TABLE `SV5`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `SV6`
--
ALTER TABLE `SV6`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `SV7`
--
ALTER TABLE `SV7`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `SV8`
--
ALTER TABLE `SV8`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `SV9`
--
ALTER TABLE `SV9`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `SV10`
--
ALTER TABLE `SV10`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `SV11`
--
ALTER TABLE `SV11`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `SV12`
--
ALTER TABLE `SV12`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `SV13`
--
ALTER TABLE `SV13`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `SV14`
--
ALTER TABLE `SV14`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `SV15`
--
ALTER TABLE `SV15`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `SV16`
--
ALTER TABLE `SV16`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_all_answer`
--
ALTER TABLE `tb_all_answer`
MODIFY `aa_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=148;
--
-- AUTO_INCREMENT for table `tb_all_question`
--
ALTER TABLE `tb_all_question`
MODIFY `aq_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tb_survey_mapping`
--
ALTER TABLE `tb_survey_mapping`
MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tb_user_history`
--
ALTER TABLE `tb_user_history`
MODIFY `h_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_user_info`
--
ALTER TABLE `tb_user_info`
MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
