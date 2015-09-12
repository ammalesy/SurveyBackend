<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tb_survey_mapping extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    function record($array)
    {
      $this->load->database();
      $this->db->insert('tb_survey_mapping', $array);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    }
    function record_survey_table($table,$array)
    {
      $this->load->database();
      $this->db->insert($table, $array);
      $insert_id = $this->db->insert_id();
      return  $insert_id;
    }
    function update($array,$sm_id)
    {
      $this->load->database();
      $this->db->where('sm_id', $sm_id);
      $this->db->update('tb_survey_mapping', $array); 
    }
    function fetchAll(){

      $this->load->database();
      $query = $this->db->query("select * from tb_survey_mapping order by sm_id DESC");
      return $query->result();
    }
    function count(){
      return $this->db->count_all_results('tb_survey_mapping');
    }
    function get($sm_id){

      $this->load->database();
      $query = $this->db->query("select * from tb_survey_mapping where sm_id = '".$sm_id."'");
      return $query->first_row();
    }
    function get_on_table($sm_table_code,$id){

      $this->load->database();
      //SELECT ALL COLUMN NAME
      $sql = "SELECT `COLUMN_NAME` 
              FROM `INFORMATION_SCHEMA`.`COLUMNS` 
              WHERE `TABLE_SCHEMA`='".$this->db->database."' 
              AND `TABLE_NAME`='".$sm_table_code."';";
      $query = $this->db->query($sql);
      $exist_columns = $query->result();

      //GENERATE NORMAL ARRAY
      $sql_column = 'id ';
      $exist_columns_r = array();
      for($i = 0; $i < count($exist_columns); $i++){
        if($i == 0) continue;
        $exist_columns_r[] = $exist_columns[$i]->COLUMN_NAME;
        $sql_column .= ",`".$exist_columns[$i]->COLUMN_NAME."` as 'q_".$exist_columns[$i]->COLUMN_NAME."'";
      }


      $query = $this->db->query("select ".$sql_column." from ".$sm_table_code." where id = '".$id."'");
   
      return $query->first_row();
    }
    
    function fetch_all_on_table($sm_table_code){
      $this->load->database();
      $query = $this->db->query("select * from ".$sm_table_code." order by id DESC");
      return $query->result();
    }
    function create_table_survey($sm_table_code,$columns){
      $this->load->database();

      $sql = "CREATE TABLE IF NOT EXISTS `".$sm_table_code."` (";
      $sql .= "`id` int(10) NOT NULL";
      foreach ($columns as $column) {
        $sql .= ",`".$column."` varchar(100) NOT NULL";
      }
      $sql .= ") ENGINE=InnoDB DEFAULT CHARSET=utf8;";
      $this->db->query($sql);
      
      $sql = "ALTER TABLE `".$sm_table_code."` ADD PRIMARY KEY (`id`);";
      $this->db->query($sql);

      $sql = "ALTER TABLE `".$sm_table_code."` MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;";
      $this->db->query($sql);
    }
    function update_table_survey($sm_table_code,$columns){
      $this->load->database();
      //SELECT ALL COLUMN NAME
      $sql = "SELECT `COLUMN_NAME` 
              FROM `INFORMATION_SCHEMA`.`COLUMNS` 
              WHERE `TABLE_SCHEMA`='".$this->db->database."' 
              AND `TABLE_NAME`='".$sm_table_code."';";
      $query = $this->db->query($sql);
      $exist_columns = $query->result();

      //GENERATE NORMAL ARRAY
      $exist_columns_r = array();
      for($i = 0; $i < count($exist_columns); $i++){
        if($i == 0) continue;
        $exist_columns_r[] = $exist_columns[$i]->COLUMN_NAME;
      }

      //DETECT ADD COLUMN
      for($i = 0; $i < count($columns); $i++){
        if (!in_array($columns[$i], $exist_columns_r)) {
          $this->db->query("ALTER TABLE `".$sm_table_code."` ADD `".$columns[$i]."` varchar(100) NOT NULL ;");
        }
      }

      //DETECT DELETE COLUMN
      for($i = 0; $i < count($exist_columns_r); $i++){
        if (!in_array($exist_columns_r[$i], $columns)) {
          $this->db->query("ALTER TABLE `".$sm_table_code."` DROP `".$exist_columns_r[$i]."`;");
        }
      }
    }
}