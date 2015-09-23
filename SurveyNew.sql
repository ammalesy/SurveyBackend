-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 23, 2015 at 07:14 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

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
(1, '', '110'),
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SV10`
--

INSERT INTO `SV10` (`id`, `12`, `1`, `13`, `14`) VALUES
(1, '97,98', '102', '110', '129,130,131'),
(2, '97', '102', '110', '129'),
(3, '98', '102,103', '110,111', '130'),
(4, '97,98', '102,103,104,105,107', '111', '130');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SV16`
--

INSERT INTO `SV16` (`id`, `17`) VALUES
(1, '140'),
(2, '140'),
(3, '140'),
(4, '140'),
(5, '140');

-- --------------------------------------------------------

--
-- Table structure for table `SV17`
--

CREATE TABLE IF NOT EXISTS `SV17` (
  `id` int(10) NOT NULL,
  `1` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SV17`
--

INSERT INTO `SV17` (`id`, `1`) VALUES
(1, ''),
(2, ''),
(3, '102,103'),
(4, '102,103');

-- --------------------------------------------------------

--
-- Table structure for table `SV18`
--

CREATE TABLE IF NOT EXISTS `SV18` (
  `id` int(10) NOT NULL,
  `12` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SV18`
--

INSERT INTO `SV18` (`id`, `12`) VALUES
(1, '97,98'),
(2, '97,98'),
(3, '97');

-- --------------------------------------------------------

--
-- Table structure for table `SV19`
--

CREATE TABLE IF NOT EXISTS `SV19` (
  `id` int(10) NOT NULL,
  `1` varchar(100) NOT NULL,
  `18` varchar(100) NOT NULL,
  `15` varchar(100) NOT NULL,
  `12` varchar(100) NOT NULL,
  `14` varchar(100) NOT NULL,
  `13` varchar(100) NOT NULL,
  `21` varchar(100) NOT NULL,
  `20` varchar(100) NOT NULL,
  `16` varchar(100) NOT NULL,
  `19` varchar(100) NOT NULL,
  `17` varchar(100) NOT NULL,
  `24` varchar(100) NOT NULL,
  `23` varchar(100) NOT NULL,
  `30` varchar(100) NOT NULL,
  `29` varchar(100) NOT NULL,
  `22` varchar(100) NOT NULL,
  `28` varchar(100) NOT NULL,
  `25` varchar(100) NOT NULL,
  `26` varchar(100) NOT NULL,
  `31` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SV19`
--

INSERT INTO `SV19` (`id`, `1`, `18`, `15`, `12`, `14`, `13`, `21`, `20`, `16`, `19`, `17`, `24`, `23`, `30`, `29`, `22`, `28`, `25`, `26`, `31`) VALUES
(1, '102,103', '142', '135', '99,146', '130', '112,113', '145', '144', '', '143', '', '150', '', '156', '', '148', '154', '151', '152', '157'),
(2, '102', '142', '135,137', '146', '129,130', '110', '145', '', '139', '143', '140', '', '', '156', '155', '148', '154', '', '152', '157');

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
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=utf8;

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
(147, 'gggg', NULL, 1, 0, 'Y'),
(148, 'r', NULL, 22, 0, 'Y'),
(149, 'v', NULL, 23, 0, 'Y'),
(150, 'b', NULL, 24, 0, 'Y'),
(151, 'n', NULL, 25, 0, 'Y'),
(152, 'gt', NULL, 26, 0, 'Y'),
(153, 'er', NULL, 27, 0, 'Y'),
(154, 'nb', NULL, 28, 0, 'Y'),
(155, 'ert', NULL, 29, 0, 'Y'),
(156, 'tre', NULL, 30, 0, 'Y'),
(157, 'qret', NULL, 31, 0, 'Y'),
(158, 'a', NULL, 32, 0, 'Y'),
(159, 's', NULL, 32, 0, 'Y'),
(160, 'z', NULL, 32, 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_all_question`
--

CREATE TABLE IF NOT EXISTS `tb_all_question` (
  `aq_id` int(5) NOT NULL,
  `aq_description` text NOT NULL,
  `aq_image` varchar(100) DEFAULT ' ',
  `active` varchar(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

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
(21, 'sdgdsgsdg', NULL, 'Y'),
(22, 'r', ' ', 'Y'),
(23, 'v', ' ', 'Y'),
(24, 'b', ' ', 'Y'),
(25, 'n', ' ', 'Y'),
(26, 'gt', ' ', 'Y'),
(27, 'er', ' ', 'Y'),
(28, 'nb', ' ', 'Y'),
(29, 'ert', ' ', 'Y'),
(30, 'tre', ' ', 'Y'),
(31, 'qrt', ' ', 'Y'),
(32, 'testq', ' ', 'Y');

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

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
(16, 'Test On Mobile4', 'Test On Mobile4 des', 'SV16', '17', '2015-09-14 02:15:08'),
(17, 'testsurvey', 'The survey', 'SV17', '1', '2015-09-19 18:21:25'),
(18, 'testsurvey2', 'testsurvey2', 'SV18', '12', '2015-09-19 19:31:16'),
(19, 'testOverflow', 'testOverflow', 'SV19', '1,18,15,12,14,13,21,20,16,19,17,24,23,30,29,22,28,25,26,31', '2015-09-19 21:39:05');

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

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
(7, 4, 7, 5, '2015-09-09 11:20:10'),
(8, 1, 17, 1, '2015-09-19 18:42:19'),
(9, 1, 17, 2, '2015-09-19 18:42:19'),
(10, 5, 16, 1, '2015-09-19 18:56:13'),
(11, 1, 10, 3, '2015-09-19 19:01:46'),
(12, 1, 16, 2, '2015-09-19 19:12:48'),
(13, 1, 16, 3, '2015-09-19 19:14:13'),
(14, 1, 16, 4, '2015-09-19 19:15:31'),
(15, 1, 16, 5, '2015-09-19 19:16:35'),
(16, 6, 17, 3, '2015-09-19 19:24:12'),
(17, 2, 18, 1, '2015-09-19 19:33:33'),
(18, 7, 18, 2, '2015-09-19 19:42:20'),
(19, 8, 18, 3, '2015-09-19 19:42:57'),
(20, 9, 17, 4, '2015-09-19 19:52:08'),
(21, 10, 19, 1, '2015-09-19 23:31:50'),
(22, 11, 19, 2, '2015-09-19 23:42:30'),
(23, 12, 10, 4, '2015-09-20 12:23:30');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user_info`
--

INSERT INTO `tb_user_info` (`u_id`, `u_firstname`, `u_surname`, `u_sex`, `u_age`, `u_email`, `u_tel`) VALUES
(1, 'Ammales', 'Yamsompong', 0, 23, 'ammales.y@gmail.com', '0824832317'),
(2, 'Apichaya', 'Boonsin', 0, 23, 'themail@mail.com', '0898767654'),
(3, 'NEW_USER1', 'NEW_USER1', 0, 0, '', ''),
(4, 'NEW_USER2', 'NEW_USER2', 0, 0, '', ''),
(5, 'theTest', 'theTestSurname', 0, 23, 'ammales_2007@hotmail.com', '0989878700'),
(6, 'TheDemoF', 'TheDomoS', 0, 0, '', ''),
(7, 'bot', 'bot', 0, 0, '', ''),
(8, 'MM', 'MM', 0, 0, '', ''),
(9, 'Test', 'Test', 0, 0, '', ''),
(10, 'อัมเรศ', 'แย้มสมพงษ์', 0, 16, 'amm@email.com', '0824382318'),
(11, 'ทดสอบ', 'ทดลอง', 0, 100, '', '0824382318'),
(12, 'aaa', 'aaaaa', 0, 0, '', '');

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
-- Indexes for table `SV17`
--
ALTER TABLE `SV17`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `SV18`
--
ALTER TABLE `SV18`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `SV19`
--
ALTER TABLE `SV19`
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
  ADD PRIMARY KEY (`aa_id`),
  ADD KEY `aq_id_ref` (`aq_id_ref`);

--
-- Indexes for table `tb_all_question`
--
ALTER TABLE `tb_all_question`
  ADD PRIMARY KEY (`aq_id`),
  ADD KEY `aq_id` (`aq_id`);

--
-- Indexes for table `tb_survey_mapping`
--
ALTER TABLE `tb_survey_mapping`
  ADD PRIMARY KEY (`sm_id`);

--
-- Indexes for table `tb_user_history`
--
ALTER TABLE `tb_user_history`
  ADD PRIMARY KEY (`h_id`),
  ADD KEY `u_id_ref` (`u_id_ref`),
  ADD KEY `sm_id_ref` (`sm_id_ref`),
  ADD KEY `s_id_ref` (`s_id_ref`);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `SV17`
--
ALTER TABLE `SV17`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `SV18`
--
ALTER TABLE `SV18`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `SV19`
--
ALTER TABLE `SV19`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_all_answer`
--
ALTER TABLE `tb_all_answer`
  MODIFY `aa_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=161;
--
-- AUTO_INCREMENT for table `tb_all_question`
--
ALTER TABLE `tb_all_question`
  MODIFY `aq_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tb_survey_mapping`
--
ALTER TABLE `tb_survey_mapping`
  MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tb_user_history`
--
ALTER TABLE `tb_user_history`
  MODIFY `h_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tb_user_info`
--
ALTER TABLE `tb_user_info`
  MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
