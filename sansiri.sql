-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 24, 2015 at 03:49 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sansiri`
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
  `active` varchar(1) NOT NULL DEFAULT 'Y',
  `aa_color` varchar(10) NOT NULL DEFAULT '#000000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_all_question`
--

CREATE TABLE IF NOT EXISTS `tb_all_question` (
  `aq_id` int(5) NOT NULL,
  `aq_description` text NOT NULL,
  `aq_image` varchar(100) DEFAULT ' ',
  `active` varchar(1) NOT NULL DEFAULT 'Y',
  `aq_auto_display` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_answer_style`
--

CREATE TABLE IF NOT EXISTS `tb_answer_style` (
  `as_id` int(10) NOT NULL,
  `as_name` varchar(100) NOT NULL,
  `as_description` varchar(200) NOT NULL,
  `as_text_color` varchar(10) NOT NULL,
  `as_identifier` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_answer_style`
--

INSERT INTO `tb_answer_style` (`as_id`, `as_name`, `as_description`, `as_text_color`, `as_identifier`) VALUES
(1, 'Checkbox', 'Checkbox', '#000000', '0'),
(2, 'TextBox', 'TextBox', '#000000', '1'),
(3, 'Radio button', 'Radio button', '#000000', '2'),
(4, 'CheckBox with Textbox', 'CheckBox with Textbox', '#000000', '3'),
(5, 'Radio button with Textbox', 'Radio button with Textbox', '#000000', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tb_survey_mapping`
--

CREATE TABLE IF NOT EXISTS `tb_survey_mapping` (
  `sm_id` int(11) NOT NULL,
  `sm_name` varchar(100) NOT NULL,
  `sm_description` text,
  `sm_table_code` varchar(50) DEFAULT NULL,
  `sm_order_column` text NOT NULL,
  `sm_update_at` datetime NOT NULL,
  `sm_image` varchar(200) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_history`
--

CREATE TABLE IF NOT EXISTS `tb_user_history` (
  `h_id` int(10) NOT NULL,
  `sm_id_ref` int(11) NOT NULL,
  `s_id_ref` int(10) NOT NULL,
  `h_timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `tb_answer_style`
--
ALTER TABLE `tb_answer_style`
  ADD PRIMARY KEY (`as_id`);

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
  ADD KEY `sm_id_ref` (`sm_id_ref`),
  ADD KEY `s_id_ref` (`s_id_ref`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_all_answer`
--
ALTER TABLE `tb_all_answer`
  MODIFY `aa_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_all_question`
--
ALTER TABLE `tb_all_question`
  MODIFY `aq_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_answer_style`
--
ALTER TABLE `tb_answer_style`
  MODIFY `as_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_survey_mapping`
--
ALTER TABLE `tb_survey_mapping`
  MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_user_history`
--
ALTER TABLE `tb_user_history`
  MODIFY `h_id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
