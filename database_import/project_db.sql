CREATE TABLE IF NOT EXISTS `tb_all_answer` (
`aa_id` int(20) NOT NULL,
  `aa_description` text NOT NULL,
  `aa_image` varchar(100) DEFAULT NULL,
  `aq_id_ref` int(5) NOT NULL,
  `type` int(2) NOT NULL,
  `active` varchar(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `tb_all_question` (
`aq_id` int(5) NOT NULL,
  `aq_description` text NOT NULL,
  `aq_image` varchar(100) DEFAULT ' ',
  `active` varchar(1) NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tb_survey_mapping` (
`sm_id` int(11) NOT NULL,
  `sm_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `sm_description` text CHARACTER SET utf8,
  `sm_table_code` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `sm_order_column` text NOT NULL,
  `sm_update_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tb_user_history` (
`h_id` int(10) NOT NULL,
  `u_id_ref` int(10) NOT NULL,
  `sm_id_ref` int(11) NOT NULL,
  `s_id_ref` int(10) NOT NULL,
  `h_timestamp` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS `tb_user_info` (
`u_id` int(10) NOT NULL,
  `u_firstname` text NOT NULL,
  `u_surname` text NOT NULL,
  `u_sex` int(1) NOT NULL,
  `u_age` int(3) NOT NULL,
  `u_email` varchar(50) DEFAULT NULL,
  `u_tel` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

ALTER TABLE `tb_all_answer`
 ADD PRIMARY KEY (`aa_id`), ADD KEY `aq_id_ref` (`aq_id_ref`);

ALTER TABLE `tb_all_question`
 ADD PRIMARY KEY (`aq_id`), ADD KEY `aq_id` (`aq_id`);

ALTER TABLE `tb_survey_mapping`
 ADD PRIMARY KEY (`sm_id`);

ALTER TABLE `tb_user_history`
 ADD PRIMARY KEY (`h_id`), ADD KEY `u_id_ref` (`u_id_ref`), ADD KEY `sm_id_ref` (`sm_id_ref`), ADD KEY `s_id_ref` (`s_id_ref`);

ALTER TABLE `tb_user_info`
 ADD PRIMARY KEY (`u_id`);

ALTER TABLE `tb_all_answer`
MODIFY `aa_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=148;

ALTER TABLE `tb_all_question`
MODIFY `aq_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;

ALTER TABLE `tb_survey_mapping`
MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;

ALTER TABLE `tb_user_history`
MODIFY `h_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;

ALTER TABLE `tb_user_info`
MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;

