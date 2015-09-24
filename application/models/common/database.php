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


          $this->load->helper('file');
          $queryString = read_file('./database_import/project_db.sql');
          $q = "CREATE TABLE IF NOT EXISTS `tb_all_answer` (
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

                ";
          $base->query($q);
      }
      
    }
    
}