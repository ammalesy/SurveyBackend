<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Database extends CI_Model {

    function __construct()
    {
        parent::__construct();
        
    }
    function create($db_name){
      $this->load->dbforge();
      $this->load->database();
      if ($this->dbforge->create_database($db_name))
      {
          $newBase = array(
            'dsn' => '',
            'hostname' => 'localhost',
            'username' => 'root',
            'password' => '',
            'database' => $db_name,
            'dbdriver' => 'mysqli',
            'dbprefix' => '',
            'pconnect' => FALSE,
            'db_debug' => (ENVIRONMENT !== 'production'),
            'cache_on' => FALSE,
            'cachedir' => '',
            'char_set' => 'utf8',
            'dbcollat' => 'utf8_general_ci',
            'swap_pre' => '',
            'encrypt' => FALSE,
            'compress' => FALSE,
            'stricton' => FALSE,
            'failover' => array(),
            'save_queries' => TRUE
          );

          $base = $this->load->database($newBase,TRUE);

          /*=========================*/
          /*===== CREATE TABLE ======*/
          /*=========================*/
          $tb_all_answer = "CREATE TABLE IF NOT EXISTS `tb_all_answer` (
                `aa_id` int(20) NOT NULL,
                `aa_description` text NOT NULL,
                `aa_image` varchar(100) DEFAULT NULL,
                `aq_id_ref` int(5) NOT NULL,
                `type` int(2) NOT NULL,
                `active` varchar(1) NOT NULL DEFAULT 'Y',
                `aa_color` varchar(10) NOT NULL DEFAULT '#000000'
              ) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=utf8;";
          $base->query($tb_all_answer);

          $tb_all_question = "CREATE TABLE IF NOT EXISTS `tb_all_question` (
							`aq_id` int(5) NOT NULL,
							  `aq_description` text NOT NULL,
							  `aq_image` varchar(100) DEFAULT ' ',
							  `active` varchar(1) NOT NULL DEFAULT 'Y'
							) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;";
          $base->query($tb_all_question);

          $tb_survey_mapping = "CREATE TABLE IF NOT EXISTS `tb_survey_mapping` (
							`sm_id` int(11) NOT NULL,
							  `sm_name` varchar(100) CHARACTER SET utf8 NOT NULL,
							  `sm_description` text CHARACTER SET utf8,
							  `sm_table_code` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
							  `sm_order_column` text NOT NULL,
							  `sm_update_at` datetime NOT NULL,
                `sm_image` varchar(200) NOT NULL DEFAULT 'default.png'
							) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;";
          $base->query($tb_survey_mapping);

          $tb_user_history = "CREATE TABLE IF NOT EXISTS `tb_user_history` (
							`h_id` int(10) NOT NULL,
							  `u_id_ref` int(10) NOT NULL,
							  `sm_id_ref` int(11) NOT NULL,
							  `s_id_ref` int(10) NOT NULL,
							  `h_timestamp` datetime NOT NULL
							) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;";
          $base->query($tb_user_history);

          $tb_user_info = "CREATE TABLE IF NOT EXISTS `tb_user_info` (
							`u_id` int(10) NOT NULL,
							  `u_firstname` text NOT NULL,
							  `u_surname` text NOT NULL,
							  `u_sex` int(1) NOT NULL,
							  `u_age` int(3) NOT NULL,
							  `u_email` varchar(50) DEFAULT NULL,
							  `u_tel` varchar(20) DEFAULT NULL
							) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;";
          $base->query($tb_user_info);

          /*==========================*/
          /*===== ADD PRIME KEY ======*/
          /*==========================*/
          $tb_all_answer_key = "ALTER TABLE `tb_all_answer`
 						   ADD PRIMARY KEY (`aa_id`), ADD KEY `aq_id_ref` (`aq_id_ref`);";
          $base->query($tb_all_answer_key);

          $tb_all_question_key = "ALTER TABLE `tb_all_question`
 							ADD PRIMARY KEY (`aq_id`), ADD KEY `aq_id` (`aq_id`);";
          $base->query($tb_all_question_key);

          $tb_survey_mapping_key = "ALTER TABLE `tb_survey_mapping`
 								ADD PRIMARY KEY (`sm_id`);";
          $base->query($tb_survey_mapping_key);

          $tb_user_history_key = "ALTER TABLE `tb_user_history`
 								ADD PRIMARY KEY (`h_id`), ADD KEY `u_id_ref` (`u_id_ref`), 
 								ADD KEY `sm_id_ref` (`sm_id_ref`), ADD KEY `s_id_ref` (`s_id_ref`);";
          $base->query($tb_user_history_key);

          $tb_user_info_key = "ALTER TABLE `tb_user_info`
 									ADD PRIMARY KEY (`u_id`);";
          $base->query($tb_user_info_key);

          /*===============================*/
          /*===== DEFIND INCREATMENT ======*/
          /*===============================*/

          $tb_all_answer_inc = "ALTER TABLE `tb_all_answer`
							   MODIFY `aa_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=148;";
          $base->query($tb_all_answer_inc);

          $tb_all_question_inc = "ALTER TABLE `tb_all_question`
								MODIFY `aq_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;";
          $base->query($tb_all_question_inc);

          $tb_survey_mapping_inc = "ALTER TABLE `tb_survey_mapping`
								MODIFY `sm_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;";
          $base->query($tb_survey_mapping_inc);

          $tb_user_history_inc = "ALTER TABLE `tb_user_history`
								MODIFY `h_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;";
          $base->query($tb_user_history_inc);

          $tb_user_info_inc = "ALTER TABLE `tb_user_info`
								MODIFY `u_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;";
          $base->query($tb_user_info_inc);

          return TRUE;
      }else{
      	return FALSE;
      }
      
    }
    
}