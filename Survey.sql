-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 07, 2015 at 04:29 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `Survey`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;

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
(138, 'ans6cc', NULL, 15, 0, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_all_question`
--

CREATE TABLE IF NOT EXISTS `tb_all_question` (
`aq_id` int(5) NOT NULL,
  `aq_description` text NOT NULL,
  `aq_image` varchar(100) DEFAULT NULL,
  `active` varchar(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_all_question`
--

INSERT INTO `tb_all_question` (`aq_id`, `aq_description`, `aq_image`, `active`) VALUES
(1, 'What is your the hobbies?', NULL, 'Y'),
(12, 'The the question form mobile', 'The image path', 'Y'),
(13, 'Test1', NULL, 'Y'),
(14, 'Test2', NULL, 'Y'),
(15, 'To sleepcc', NULL, 'Y');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_all_answer`
--
ALTER TABLE `tb_all_answer`
MODIFY `aa_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=139;
--
-- AUTO_INCREMENT for table `tb_all_question`
--
ALTER TABLE `tb_all_question`
MODIFY `aq_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
