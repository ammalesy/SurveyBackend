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
-- Database: `thanliving`
--

-- --------------------------------------------------------

--
-- Table structure for table `SV17`
--

CREATE TABLE IF NOT EXISTS `SV17` (
  `id` int(10) NOT NULL,
  `22` varchar(2000) NOT NULL DEFAULT '[]',
  `23` varchar(2000) NOT NULL DEFAULT '[]',
  `24` varchar(2000) NOT NULL DEFAULT '[]',
  `25` varchar(2000) NOT NULL DEFAULT '[]',
  `26` varchar(2000) NOT NULL DEFAULT '[]',
  `27` varchar(2000) NOT NULL DEFAULT '[]',
  `28` varchar(2000) NOT NULL DEFAULT '[]'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `SV17`
--

INSERT INTO `SV17` (`id`, `22`, `23`, `24`, `25`, `26`, `27`, `28`) VALUES
(1, '[{"aa_id":"148","text":"name"},{"aa_id":"149","text":"surname"},{"aa_id":"150","text":"tel"},{"aa_id":"151","text":"address"},{"aa_id":"152","text":"soi"},{"aa_id":"153","text":"road"},{"aa_id":"154","text":"ampher"},{"aa_id":"155","text":"Samutprakr"}]', '[{"aa_id":"156"}]', '[{"aa_id":"158"}]', '[{"aa_id":"161"}]', '[{"aa_id":"172"},{"aa_id":"173","text":"ขายเตี๋ย"}]', '[]', '[]'),
(2, '[{"aa_id":"148","text":"name2"},{"aa_id":"149","text":"surname2"},{"aa_id":"150","text":"tel2"},{"aa_id":"151","text":"address2"},{"aa_id":"152","text":"soi2"},{"aa_id":"153","text":"road2"},{"aa_id":"154","text":"amoher2"},{"aa_id":"155","text":"samutprakran2"}]', '[{"aa_id":"157"}]', '[{"aa_id":"159"}]', '[{"aa_id":"162"}]', '[{"aa_id":"168"},{"aa_id":"169"},{"aa_id":"173","text":"kai kai"}]', '[]', '[]'),
(3, '[{"aa_id":"148","text":""},{"aa_id":"149","text":""},{"aa_id":"150","text":""},{"aa_id":"151","text":""},{"aa_id":"152","text":""},{"aa_id":"153","text":""},{"aa_id":"154","text":""},{"aa_id":"155","text":""}]', '[{"aa_id":"156"}]', '[{"aa_id":"158"}]', '[]', '[]', '[]', '[]'),
(4, '[{"aa_id":"148","text":""},{"aa_id":"149","text":""},{"aa_id":"150","text":""},{"aa_id":"151","text":""},{"aa_id":"152","text":""},{"aa_id":"153","text":""},{"aa_id":"154","text":""},{"aa_id":"155","text":""}]', '[{"aa_id":"157"}]', '[{"aa_id":"159"}]', '[{"aa_id":"162"}]', '[{"aa_id":"169"}]', '[{"aa_id":"176","text":"test2"},{"aa_id":"178"}]', '[]'),
(5, '[{"aa_id":"148","text":""},{"aa_id":"149","text":""},{"aa_id":"150","text":""},{"aa_id":"151","text":""},{"aa_id":"152","text":""},{"aa_id":"153","text":""},{"aa_id":"154","text":""},{"aa_id":"155","text":""}]', '[{"aa_id":"156"}]', '[{"aa_id":"158"}]', '[{"aa_id":"161"}]', '[]', '[{"aa_id":"175","text":""},{"aa_id":"181","text":""}]', '[{"aa_id":"182","text":""}]'),
(6, '[{"aa_id":"148","text":""},{"aa_id":"149","text":""},{"aa_id":"150","text":""},{"aa_id":"151","text":""},{"aa_id":"152","text":""},{"aa_id":"153","text":""},{"aa_id":"154","text":""},{"aa_id":"155","text":""}]', '[]', '[]', '[]', '[]', '[{"aa_id":"181","text":""}]', '[]'),
(7, '[{"text":"","aa_id":"148"},{"text":"","aa_id":"149"},{"text":"","aa_id":"150"},{"text":"","aa_id":"151"},{"text":"","aa_id":"152"},{"text":"","aa_id":"153"},{"text":"","aa_id":"154"},{"text":"","aa_id":"155"}]', '[]', '[]', '[]', '[]', '[{"text":"","aa_id":"181"}]', '[{"text":"","aa_id":"182"}]');

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
) ENGINE=InnoDB AUTO_INCREMENT=184 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_all_answer`
--

INSERT INTO `tb_all_answer` (`aa_id`, `aa_description`, `aa_image`, `aq_id_ref`, `type`, `active`, `aa_color`) VALUES
(148, 'ชื่อ', NULL, 22, 2, 'Y', '#'),
(149, 'นามสกุล', NULL, 22, 2, 'Y', '0'),
(150, 'โทรศัพท์', NULL, 22, 2, 'Y', '0'),
(151, 'ที่อยู่', NULL, 22, 2, 'Y', '0'),
(152, 'ซอย', NULL, 22, 2, 'Y', '0'),
(153, 'ถนน', NULL, 22, 2, 'Y', '0'),
(154, 'อำเภอ/เขต', NULL, 22, 2, 'Y', '0'),
(155, 'จังหวัด', NULL, 22, 2, 'Y', ''),
(156, 'ชาย', NULL, 23, 3, 'Y', '#000000'),
(157, 'หญิง', NULL, 23, 3, 'Y', '#000000'),
(158, 'โสด', NULL, 24, 3, 'Y', '#000000'),
(159, 'สมรส', NULL, 24, 3, 'Y', '#000000'),
(160, 'จำนวนบุตร', NULL, 24, 3, 'Y', '#000000'),
(161, 'ต่ำกว่า 25 ปี', NULL, 25, 3, 'Y', '#000000'),
(162, '25-30 ปี', NULL, 25, 3, 'Y', '#000000'),
(163, '31-35 ปี', NULL, 25, 3, 'Y', '#000000'),
(164, '36-40 ปี', NULL, 25, 3, 'Y', '#000000'),
(165, '41-45 ปี', NULL, 25, 3, 'Y', '#000000'),
(166, '46-50 ปี', NULL, 25, 3, 'Y', '#000000'),
(167, '50 ปีขึ้นไป', NULL, 25, 3, 'Y', '#000000'),
(168, 'ธุรกิจส่วนตัว', NULL, 26, 1, 'Y', '#'),
(169, 'ผู้บริหารระดับสูง', NULL, 26, 1, 'Y', '0'),
(170, 'แพทย์/พยาบาล', NULL, 26, 1, 'Y', '0'),
(171, 'ราชการ/รัฐวิสาหกิจ', NULL, 26, 1, 'Y', '0'),
(172, 'พนักงานบริษัทเอกชน', NULL, 26, 1, 'Y', '0'),
(173, 'อื่นๆ', NULL, 26, 4, 'Y', '0'),
(174, 'Test', NULL, 26, 4, 'Y', '0'),
(175, 'Test', NULL, 27, 5, 'Y', '#000000'),
(176, 'Test2', NULL, 27, 5, 'Y', '#000000'),
(177, 'Test3', NULL, 27, 5, 'Y', '#000000'),
(178, 'Test4', NULL, 27, 1, 'Y', '#000000'),
(179, 'Test5', NULL, 27, 3, 'Y', '#000000'),
(180, 'Test6', NULL, 27, 1, 'Y', '#000000'),
(181, 'Test7', NULL, 27, 2, 'Y', '#000000'),
(182, 'Q2', NULL, 28, 2, 'Y', '#000000'),
(183, 'Test6', NULL, 28, 1, 'Y', '#000000');

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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_all_question`
--

INSERT INTO `tb_all_question` (`aq_id`, `aq_description`, `aq_image`, `active`, `aq_auto_display`) VALUES
(22, 'ข้อมูลพื้นฐาน', ' ', 'Y', 1),
(23, 'เพศ', ' ', 'Y', 1),
(24, 'สถานภาพ', ' ', 'Y', 1),
(25, 'อายุ', ' ', 'Y', 1),
(26, 'อาชีพ', ' ', 'Y', 1),
(27, 'Test', ' ', 'Y', 0),
(28, 'Q2', ' ', 'Y', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_survey_mapping`
--

INSERT INTO `tb_survey_mapping` (`sm_id`, `sm_name`, `sm_description`, `sm_table_code`, `sm_order_column`, `sm_update_at`, `sm_image`) VALUES
(17, 'แบบสอบถามพื้นฐาน', 'แบบสอบถามพื้นฐาน', 'SV17', '22,23,24,25,26,27,28', '2015-10-23 23:17:42', '1445271112.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_history`
--

CREATE TABLE IF NOT EXISTS `tb_user_history` (
  `h_id` int(10) NOT NULL,
  `sm_id_ref` int(11) NOT NULL,
  `s_id_ref` int(10) NOT NULL,
  `h_timestamp` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user_history`
--

INSERT INTO `tb_user_history` (`h_id`, `sm_id_ref`, `s_id_ref`, `h_timestamp`) VALUES
(8, 17, 1, '2015-10-23 16:37:08'),
(9, 17, 2, '2015-10-23 16:49:11'),
(10, 17, 3, '2015-10-23 22:06:25'),
(11, 17, 4, '2015-10-23 22:49:24'),
(12, 17, 5, '2015-10-23 23:30:42'),
(13, 17, 6, '2015-10-23 23:31:44'),
(14, 17, 7, '2015-10-24 17:31:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `SV17`
--
ALTER TABLE `SV17`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `SV17`
--
ALTER TABLE `SV17`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_all_answer`
--
ALTER TABLE `tb_all_answer`
  MODIFY `aa_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=184;
--
-- AUTO_INCREMENT for table `tb_all_question`
--
ALTER TABLE `tb_all_question`
  MODIFY `aq_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tb_answer_style`
--
ALTER TABLE `tb_answer_style`
  MODIFY `as_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_survey_mapping`
--
ALTER TABLE `tb_survey_mapping`
  MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tb_user_history`
--
ALTER TABLE `tb_user_history`
  MODIFY `h_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
